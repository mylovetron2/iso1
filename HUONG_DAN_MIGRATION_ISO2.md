# 🔄 HƯỚNG DẪN MIGRATION ISO1 → ISO2  
**Event-Sourcing Pattern cho chức năng Tạm dừng/Tiếp tục**

---

## 📋 TỔNG QUAN

Chuyển từ:
- **ISO1**: UPDATE record in-place khi tiếp tục (1 record/cycle)
- **ISO2**: INSERT record mới khi tiếp tục (2 records/cycle, full timeline)

**LƯU Ý**: Migration này **GIỮ LẠI TẤT CẢ DỮ LIỆU** hiện có!

---

## ✅ BƯỚC 1: BACKUP DATABASE

```sql
-- Chạy trong phpMyAdmin hoặc MySQL client
-- Backup toàn bộ database trước khi bắt đầu
mysqldump -u username -p database_name > backup_before_iso2_migration.sql
```

---

## ✅ BƯỚC 2: CHẠY MIGRATION SQL

### 2.1. Chạy file `MIGRATE_ISO1_TO_ISO2.sql`

```bash
# Trong phpMyAdmin: Import file MIGRATE_ISO1_TO_ISO2.sql
# HOẶC:
mysql -u username -p database_name < MIGRATE_ISO1_TO_ISO2.sql
```

**Kết quả:**
- ✅ Bảng backup: `hososcbd_tamdung_backup_iso1`
- ✅ Bảng tạm: `hososcbd_tamdung_iso2_temp`
- ⚠️ Bảng chính: Chưa sửa (cần verify trước)

### 2.2. VERIFY migration trong bảng tạm

```sql
-- Kiểm tra số lượng records
SELECT 'Before (ISO1)' AS stage, COUNT(*) AS total FROM hososcbd_tamdung_backup_iso1
UNION ALL
SELECT 'After (ISO2)', COUNT(*) FROM hososcbd_tamdung_iso2_temp;

-- Kiểm tra timeline từng hồ sơ
SELECT 
    hoso,
    COUNT(*) AS events_count,
    GROUP_CONCAT(trangthai ORDER BY ngay_thuchien SEPARATOR ' → ') AS timeline
FROM hososcbd_tamdung_iso2_temp
GROUP BY hoso
ORDER BY hoso;
```

**Kỳ vọng:**
- Mỗi hồ sơ đã tiếp tục: 2 records (pause + resume)
- Mỗi hồ sơ đang tạm dừng: 1 record (pause)
- Timeline: `dang_tam_dung → da_tiep_tuc` (cho hồ sơ hoàn thành)

### 2.3. APPLY migration (thay thế bảng chính)

**⚠️ CHỈ CHẠY KHI ĐÃ VERIFY KỸ BƯỚC 2.2!**

Uncomment BƯỚC 5 trong file `MIGRATE_ISO1_TO_ISO2.sql`:

```sql
-- 5A. Xóa bảng cũ
DROP TABLE hososcbd_tamdung;

-- 5B. Rename bảng mới
RENAME TABLE hososcbd_tamdung_iso2_temp TO hososcbd_tamdung;
```

---

## ✅ BƯỚC 3: TẠO VIEW HELPER

Chạy file `create_iso2_helper_view.sql`:

```sql
mysql -u username -p database_name < create_iso2_helper_view.sql
```

**Kết quả:**
- ✅ View: `v_hososcbd_tamdung_current` (lấy record mới nhất của mỗi hồ sơ)

---

## ✅ BƯỚC 4: UPDATE BACKEND CODE

### 4.1. File formsc.php - TIẾP TỤC handler (✅ ĐÃ SỬA)

**Dòng ~759-818:** Đã được update từ UPDATE sang INSERT

**Trước (ISO1):**
```php
$update_tieptuc = "UPDATE hososcbd_tamdung SET trangthai='da_tiep_tuc' WHERE...";
```

**Sau (ISO2):**
```php
$insert_tieptuc = "INSERT INTO hososcbd_tamdung (...) VALUES (...)";
```

### 4.2. File formsc.php - CHECK trạng thái (✅ ĐÃ SỬA PARTIAL)

**Dòng ~714:** Check trước khi tạm dừng - ĐÃ SỬA

**Trước:**
```php
$check_tamdung = mysql_query("SELECT COUNT(*) as cnt FROM hososcbd_tamdung 
    WHERE hoso='$hosomay' AND trangthai='dang_tam_dung'");
if ($row_check['cnt'] > 0) {...}
```

**Sau:**
```php
$check_tamdung = mysql_query("SELECT trangthai FROM hososcbd_tamdung 
    WHERE hoso='$hosomay' ORDER BY id DESC LIMIT 1");
if ($row_check && $row_check['trangthai'] == 'dang_tam_dung') {...}
```

### 4.3. File formsc.php - PERMISSION queries (⚠️ CẦN SỬA THỦ CÔNG)

Tìm kiếm và thay thế:

**SEARCH:**
```
FROM hososcbd_tamdung WHERE trangthai='dang_tam_dung'
```

**REPLACE:**
```
FROM v_hososcbd_tamdung_current WHERE trangthai='dang_tam_dung'
```

**Các vị trí cần sửa:**
- Line ~905, 907 (Dropdown phiếu)
- Line ~5661, 5663 (Dropdown mã quản lý)
- Line ~6153 (Dropdown permissions)
- Line ~14751 (Edit mode dropdown)

**⚠️ LƯU Ý:** CHỈ thay ở SELECT queries, KHÔNG thay ở INSERT queries!

### 4.4. File formsc.php - DISPLAY alert (✅ ĐÃ SỬA)

**Dòng ~6014 và ~14544:**

**⚠️ BUGFIX QUAN TRỌNG:** Phải dùng `ORDER BY id DESC` thay vì `ORDER BY ngay_tamdung DESC`!

**SAI (gây bug - cảnh báo vẫn hiển thị sau khi tiếp tục):**
```php
$check_tamdung_sql = mysql_query("SELECT * FROM hososcbd_tamdung 
    WHERE hoso='$edithoso' AND trangthai='dang_tam_dung' 
    ORDER BY ngay_tamdung DESC LIMIT 1");  // ❌ SAI!
```

**ĐÚNG (đã sửa):**
```php
// ISO2: ORDER BY id DESC để lấy EVENT MỚI NHẤT
$check_tamdung_sql = mysql_query("SELECT * FROM hososcbd_tamdung 
    WHERE hoso='$edithoso' AND trangthai='dang_tam_dung' 
    ORDER BY id DESC LIMIT 1");  // ✅ ĐÚNG!
```

**Giải thích:**
- ISO2 có nhiều records cho 1 hồ sơ (pause, resume, pause lại...)
- Pause record và Resume record có CÙNG `ngay_tamdung` (resume copy từ pause)
- `ORDER BY ngay_tamdung` không phân biệt được event nào mới nhất
- `ORDER BY id DESC` lấy record có ID lớn nhất = event mới nhất

**Alternative: Dùng VIEW**
```php
$check_tamdung_sql = mysql_query("SELECT * FROM v_hososcbd_tamdung_current 
    WHERE hoso='$edithoso' AND trangthai='dang_tam_dung'");
```

---

## ✅ BƯỚC 5: UPDATE REPORTS

### 5.1. File baocao_tamdung.php

**⚠️ KHÔNG cần sửa queries chính** - vẫn hiển thị tất cả events

**Nhưng CẦN thêm filter "Chỉ xem trạng thái hiện tại":**

```php
// Thêm option trong filter
<select name="filter_view_mode">
    <option value="all">Tất cả events (timeline đầy đủ)</option>
    <option value="current">Chỉ trạng thái hiện tại</option>
</select>

// Trong query
if ($filter_view_mode == 'current') {
    // Chỉ lấy record mới nhất
    $sql = "SELECT * FROM v_hososcbd_tamdung_current WHERE ...";
} else {
    // Lấy tất cả (default)
    $sql = "SELECT * FROM hososcbd_tamdung WHERE ...";
}
```

---

## ✅ BƯỚC 6: TESTING

### 6.1. Test CREATE pause event

1. Mở hồ sơ chưa tạm dừng
2. Click "Tạm dừng hồ sơ"
3. Verify: 1 record INSERT với `trangthai='dang_tam_dung'`

```sql
SELECT * FROM hososcbd_tamdung WHERE hoso='XXX' ORDER BY id DESC;
-- Expected: 1 record mới với trangthai='dang_tam_dung'
```

### 6.2. Test RESUME

1. Mở hồ sơ đang tạm dừng
2. Click "Tiếp tục hồ sơ"
3. Verify: 1 record INSERT MỚI với `trangthai='da_tiep_tuc'`
4. Record cũ (pause) GIỮ NGUYÊN

```sql
SELECT * FROM hososcbd_tamdung WHERE hoso='XXX' ORDER BY id DESC;
-- Expected: 2 records
-- - Record 1 (mới nhất): trangthai='da_tiep_tuc'
-- - Record 2 (cũ): trangthai='dang_tam_dung'
```

### 6.3. Test PERMISSION (user thường)

1. Login user thường
2. Tạo hồ sơ, hoàn thành (set ngày kết thúc)
3. Verify: User KHÔNG thấy hồ sơ trong dropdown
4. Admin tạm dừng hồ sơ
5. Verify: User THẤY hồ sơ trong dropdown (vì đang tạm dừng)
6. User mở và sửa
7. User tiếp tục hồ sơ
8. Verify: User KHÔNG thấy hồ sơ nữa (vì đã hoàn thành)

### 6.4. Test MULTIPLE cycles

1. Tạm dừng → Tiếp tục → Tạm dừng lại → Tiếp tục lại
2. Verify: 4 records trong database

```sql
SELECT 
    id,
    trangthai,
    ngay_thuchien,
    CASE trangthai 
        WHEN 'dang_tam_dung' THEN '⏸ Pause'
        WHEN 'da_tiep_tuc' THEN '▶ Resume'
    END AS action
FROM hososcbd_tamdung 
WHERE hoso='XXX' 
ORDER BY id;

-- Expected timeline:
-- id=1 ⏸ Pause  (2024-04-14 10:00)
-- id=2 ▶ Resume (2024-04-14 11:00)
-- id=3 ⏸ Pause  (2024-04-14 14:00)
-- id=4 ▶ Resume (2024-04-14 16:00)
```

---

## 🔥 ROLLBACK (nếu có vấn đề)

```sql
-- Khôi phục về dữ liệu gốc ISO1
DROP TABLE IF EXISTS hososcbd_tamdung;
RENAME TABLE hososcbd_tamdung_backup_iso1 TO hososcbd_tamdung;

-- Drop VIEW
DROP VIEW IF EXISTS v_hososcbd_tamdung_current;

-- Drop temp table
DROP TABLE IF EXISTS hososcbd_tamdung_iso2_temp;

SELECT '✅ ROLLBACK COMPLETED - Đã khôi phục ISO1' AS status;
```

**⚠️ SAU KHI ROLLBACK:**
- Cần restore code `formsc.php` về version cũ (ISO1)
- Hoặc comment lại code ISO2, uncomment code ISO1

---

## 📊 CHECKLIST HOÀN THÀNH

### Database
- [ ] Backup database hoàn tất
- [ ] Chạy `MIGRATE_ISO1_TO_ISO2.sql`
- [ ] Verify data trong `hososcbd_tamdung_iso2_temp`
- [ ] Apply migration (replace bảng chính)
- [ ] Tạo VIEW `v_hososcbd_tamdung_current`

### Backend Code (formsc.php)
- [x] Update TIẾP TỤC handler (line ~759): UPDATE → INSERT
- [x] Update CHECK trước khi tạm dừng (line ~714)
- [x] **BUGFIX:** UPDATE display alert queries (line ~6014, ~14544): ORDER BY id DESC
- [ ] Update permission query line ~905, 907
- [ ] Update permission query line ~5661, 5663  
- [ ] Update permission query line ~6153
- [ ] Update permission query line ~14751

### Reports (baocao_tamdung.php)
- [ ] Thêm filter "Chỉ xem trạng thái hiện tại"
- [ ] Test hiển thị timeline đầy đủ

### Testing
- [ ] Test pause event (INSERT)
- [ ] Test resume event (INSERT mới)
- [ ] Test permission user thường
- [ ] Test multiple pause/resume cycles
- [ ] Test hiển thị alert cảnh báo
- [ ] Test báo cáo lịch sử

### Cleanup (sau khi ổn định 1 tuần)
- [ ] Drop bảng backup: `DROP TABLE hososcbd_tamdung_backup_iso1;`
- [ ] Drop bảng temp (nếu còn): `DROP TABLE hososcbd_tamdung_iso2_temp;`

---

## 🎯 KẾT QUẢ MONG ĐỢI

**ISO1 (trước):**
```
hoso='ABC' → 1 record:
  - id=5, pause=14/04 10:00, resume=14/04 15:00, trangthai='da_tiep_tuc'
  
→ NẾU pause/resume lại → OVERWRITE record 5
→ KHÔNG còn lịch sử cũ
```

**ISO2 (sau):**
```
hoso='ABC' → 2 records:
  - id=5, pause=14/04 10:00, trangthai='dang_tam_dung'
  - id=6, resume=14/04 15:00, trangthai='da_tiep_tuc'

→ NẾU pause/resume lại → INSERT 2 records mới (id=7, 8)
→ GIỮ LẠI toàn bộ timeline
```

---

## 📞 HỖ TRỢ

Nếu gặp vấn đề:
1. Kiểm tra lỗi trong error_log PHP
2. Kiểm tra MySQL error log  
3. Chạy ROLLBACK nếu cần
4. Review lại từng bước trong document này

**File quan trọng:**
- `MIGRATE_ISO1_TO_ISO2.sql` - Migration script
- `create_iso2_helper_view.sql` - VIEW helper
- `HUONG_DAN_MIGRATION_ISO2.md` - Document này
- `formsc.php` - Code backend (đã sửa một phần)
- `hososcbd_tamdung_backup_iso1` - Backup table
