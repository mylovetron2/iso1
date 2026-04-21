# ✅ TÓM TẮT MIGRATION ISO1 → ISO2

**Ngày thực hiện:** 14/04/2026  
**Trạng thái:** Đã chuẩn bị đầy đủ scripts và documentation  
**Chiến lược:** GIỮ LẠI TẤT CẢ DỮ LIỆU, tạo full event timeline

---

## 📦 ĐÃ TẠO CÁC FILE

### ✅ Scripts chính (Cần chạy)
1. **MIGRATE_ISO1_TO_ISO2.sql** - Migration database
2. **create_iso2_helper_view.sql** - Tạo VIEW helper
3. **PATCH_ISO2_PERMISSIONS.php** - Auto-patch code

### ✅ Documentation
1. **README_MIGRATION_ISO2.md** - Tổng quan, quick start (ĐỌC ĐẦU TIÊN!)
2. **HUONG_DAN_MIGRATION_ISO2.md** - Chi tiết từng bước
3. **XAC_NHAN_CHUC_NANG_TAM_DUNG.md** - Phân tích ISO1 vs ISO2
4. **TOM_TAT_MIGRATION_ISO2.md** - File này

### ✅ Code đã update
- **formsc.php** (partial update):
  - ✅ Line ~759-818: Tiếp tục handler (UPDATE → INSERT)
  - ✅ Line ~714: Check trạng thái trước khi tạm dừng
  - ⚠️ Còn lại: Cần chạy patch script

---

## 🔄 LOGIC THAY ĐỔI

### TRƯỚC (ISO1):
```
TẠM DỪNG hồ sơ ABC lúc 10:00:
→ INSERT record id=5, trangthai='dang_tam_dung'

TIẾP TỤC hồ sơ ABC lúc 15:00:
→ UPDATE record id=5, SET trangthai='da_tiep_tuc', resume_at=15:00

Kết quả: 1 record (id=5)
Nếu pause/resume lại → OVERWRITE id=5 → MẤT lịch sử
```

### SAU (ISO2):
```
TẠM DỪNG hồ sơ ABC lúc 10:00:
→ INSERT record id=5, trangthai='dang_tam_dung'

TIẾP TỤC hồ sơ ABC lúc 15:00:
→ INSERT record id=6, trangthai='da_tiep_tuc'
  (record id=5 GIỮ NGUYÊN)

Kết quả: 2 records (id=5 pause, id=6 resume)
Nếu pause/resume lại → INSERT id=7,8 → GIỮ full timeline
```

---

## 📊 DATABASE CHANGES

### Bảng chính: `hososcbd_tamdung`
**KHÔNG thay đổi schema** - GIỮ NGUYÊN tất cả cột!
- Cột `ngay_tieptuc`, `nguoi_tieptuc`, `ghichu_tieptuc` vẫn tồn tại
- Nhưng với pairing: 
  - Pause event: Các cột này = NULL
  - Resume event: Các cột này có giá trị

### Bảng mới:
- `hososcbd_tamdung_backup_iso1` - Backup tự động
- `hososcbd_tamdung_iso2_temp` - Staging table (xóa sau khi apply)

### VIEW mới:
- `v_hososcbd_tamdung_current` - Lấy record mới nhất mỗi hồ sơ

---

## 🔧 MIGRATION PROCESS

### Migration SQL (MIGRATE_ISO1_TO_ISO2.sql) làm gì?

```sql
-- 1. Backup toàn bộ data
CREATE TABLE hososcbd_tamdung_backup_iso1 ...
INSERT INTO backup SELECT * FROM hososcbd_tamdung;

-- 2. Tạo bảng staging
CREATE TABLE hososcbd_tamdung_iso2_temp ...

-- 3. Copy records ĐANG TẠM DỪNG (không thay đổi)
INSERT INTO temp SELECT * FROM hososcbd_tamdung 
WHERE trangthai='dang_tam_dung';

-- 4. TÁCH records ĐÃ TIẾP TỤC thành 2 records:

-- 4a. Pause event (chỉ giữ thông tin pause)
INSERT INTO temp (hoso, ngay_tamdung, lydo_tamdung, trangthai, ...)
SELECT hoso, ngay_tamdung, lydo_tamdung, 'dang_tam_dung', ...
FROM hososcbd_tamdung 
WHERE trangthai='da_tiep_tuc';
-- → Set ngay_tieptuc=NULL, nguoi_tieptuc=NULL

-- 4b. Resume event (chỉ giữ thông tin resume)  
INSERT INTO temp (hoso, ngay_tieptuc, ghichu_tieptuc, trangthai, ...)
SELECT hoso, ngay_tieptuc, ghichu_tieptuc, 'da_tiep_tuc', ...
FROM hososcbd_tamdung 
WHERE trangthai='da_tiep_tuc';
```

**Ví dụ cụ thể:**

TRƯỚC (ISO1): 1 record
```
id=10 | hoso=ABC | pause=10:00 | resume=15:00 | trangthai=da_tiep_tuc
```

SAU (ISO2): 2 records
```
id=20 | hoso=ABC | pause=10:00 | resume=NULL  | trangthai=dang_tam_dung
id=21 | hoso=ABC | pause=10:00 | resume=15:00 | trangthai=da_tiep_tuc
```

---

## 🎯 BACKEND CODE CHANGES

### 1. Tiếp tục handler (formsc.php ~line 759)

**TRƯỚC:**
```php
$update_tieptuc = "UPDATE hososcbd_tamdung 
    SET ngay_tieptuc = NOW(),
        trangthai = 'da_tiep_tuc'
    WHERE hoso = '$hosomay' AND trangthai = 'dang_tam_dung'";
```

**SAU:**
```php
// Lấy thông tin pause event
$pause_info = mysql_query("SELECT * FROM hososcbd_tamdung 
    WHERE hoso='$hosomay' AND trangthai='dang_tam_dung' 
    ORDER BY id DESC LIMIT 1");

// INSERT record mới
$insert_tieptuc = "INSERT INTO hososcbd_tamdung (
    hoso, mavt, somay, model, maql,
    ngay_tamdung, ngay_tieptuc, ghichu_tieptuc,
    trangthai, nguoi_thuchien, ngay_thuchien
) VALUES (
    '$hosomay', ..., NOW(), '$ghichu', 
    'da_tiep_tuc', '$username', NOW()
)";
```

### 2. Check current status (multiple locations)

**TRƯỚC:**
```php
WHERE trangthai='dang_tam_dung'
```

**SAU (2 options):**

**Option A: Dùng VIEW (RECOMMENDED)**
```php
FROM v_hososcbd_tamdung_current WHERE trangthai='dang_tam_dung'
```

**Option B: Subquery**
```php
WHERE id = (SELECT MAX(id) FROM hososcbd_tamdung WHERE hoso='XXX')
  AND trangthai='dang_tam_dung'
```

---

## ⚙️ AUTO-PATCH SCRIPT

**File:** `PATCH_ISO2_PERMISSIONS.php`

**Làm gì:**
```php
// Find & Replace trong formsc.php:
"FROM hososcbd_tamdung WHERE trangthai='dang_tam_dung'"
→ 
"FROM v_hososcbd_tamdung_current WHERE trangthai='dang_tam_dung'"
```

**Vị trí:**
- Line ~905, 907 (Permission queries - dropdown phiếu)
- Line ~5661, 5663 (Permission queries - dropdown mã quản lý)
- Line ~6153 (Permission queries)
- Line ~14751 (Edit mode dropdown)

**Output:**
- `formsc_iso2_patched.php` - File đã patch

**⚠️ LƯU Ý:** Script kiểm tra KHÔNG patch nhầm INSERT queries!

---

## 🧪 TESTING MATRIX

| Test Case | Input | Expected Output | Status |
|-----------|-------|-----------------|--------|
| Pause hồ sơ mới | Click "Tạm dừng" | 1 INSERT, trangthai='dang_tam_dung' | ⏳ |
| Resume hồ sơ | Click "Tiếp tục" | 1 INSERT mới, pause record giữ nguyên | ⏳ |
| Multiple cycles | Pause→Resume→Pause→Resume | 4 records total | ⏳ |
| Permission: User thường + hồ sơ hoàn thành | Dropdown select | KHÔNG thấy hồ sơ | ⏳ |
| Permission: User thường + hồ sơ paused | Dropdown select | THẤY hồ sơ | ⏳ |
| Permission: Admin | Dropdown select | Thấy TẤT CẢ | ⏳ |
| Alert display | Mở hồ sơ đang pause | Hiển thị warning box vàng | ⏳ |
| Report: Current view | Filter "Đang tạm dừng" | Chỉ show record mới nhất | ⏳ |
| Report: Timeline view | Filter "Tất cả" | Show ALL events | ⏳ |

---

## 📋 EXECUTION CHECKLIST

### Phase 1: Preparation ✅
- [x] Tạo migration SQL script
- [x] Tạo VIEW helper script  
- [x] Tạo auto-patch script
- [x] Viết documentation đầy đủ
- [x] Update backend code (partial)

### Phase 2: Backup ⏳
- [ ] Backup database: `mysqldump > backup.sql`
- [ ] Backup code: `cp formsc.php formsc_backup.php`
- [ ] Verify backup integrity

### Phase 3: Database Migration ⏳
- [ ] Chạy `MIGRATE_ISO1_TO_ISO2.sql` (đến BƯỚC 4)
- [ ] Verify data trong `hososcbd_tamdung_iso2_temp`
- [ ] So sánh với `hososcbd_tamdung_backup_iso1`
- [ ] Uncomment BƯỚC 5, chạy lại để apply
- [ ] Chạy `create_iso2_helper_view.sql`
- [ ] Test VIEW: `SELECT * FROM v_hososcbd_tamdung_current;`

### Phase 4: Code Patching ⏳
- [ ] Chạy `php PATCH_ISO2_PERMISSIONS.php`
- [ ] Review `formsc_iso2_patched.php`
- [ ] Compare diff với formsc.php gốc
- [ ] Backup lần 2: `cp formsc.php formsc_before_patch.php`
- [ ] Apply: `cp formsc_iso2_patched.php formsc.php`

### Phase 5: Testing ⏳
- [ ] Test tất cả cases trong Testing Matrix
- [ ] Kiểm tra error logs
- [ ] Load testing (nếu cần)
- [ ] UAT with users

### Phase 6: Monitoring ⏳
- [ ] Monitor error logs trong 24h đầu
- [ ] Kiểm tra database size growth
- [ ] User feedback
- [ ] Performance metrics

### Phase 7: Cleanup (sau 1 tuần) ⏳
- [ ] Drop backup table: `DROP TABLE hososcbd_tamdung_backup_iso1;`
- [ ] Xóa file backup code cũ
- [ ] Archive migration scripts
- [ ] Update production documentation

---

## 🔥 ROLLBACK PLAN

**Khi nào rollback?**
- Migration thất bại ở bất kỳ bước nào
- Phát hiện bug nghiêm trọng trong 48h đầu
- Performance degradation > 20%
- User complaints > 5 tickets

**Cách rollback:**
```sql
-- 1. Restore database
DROP TABLE hososcbd_tamdung;
RENAME TABLE hososcbd_tamdung_backup_iso1 TO hososcbd_tamdung;
DROP VIEW IF EXISTS v_hososcbd_tamdung_current;
```

```bash
# 2. Restore code
cp formsc_before_patch.php formsc.php
# HOẶC
cp formsc_backup.php formsc.php
```

**Downtime:** < 5 phút

---

## 💡 BEST PRACTICES

1. **Làm trên DEV environment trước**
   - Test đầy đủ
   - Verify performance
   - Train users

2. **Schedule maintenance window**
   - Thông báo users trước 24h
   - Chọn thời gian ít traffic (2-4 AM)
   - Chuẩn bị rollback plan

3. **Monitor closely**
   - Real-time error logs
   - Database metrics
   - User feedback channels

4. **Keep backups**
   - Backup table tồn tại ít nhất 1 tuần
   - Code backups ít nhất 1 tháng
   - Full database backup daily

---

## 📞 CONTACTS & SUPPORT

**Technical Lead:** GitHub Copilot AI  
**Migration Date:** TBD  
**Rollback Authority:** DBA + Dev Lead

**Emergency Rollback Command:**
```bash
php rollback_iso2.php  # (TODO: Tạo script này)
```

---

## ✅ SIGN-OFF

Migration này đã được review và approved:

- [ ] **Database Designer:** _______________  
- [ ] **Backend Developer:** _______________  
- [ ] **QA Lead:** _______________  
- [ ] **DevOps:** _______________  
- [ ] **Product Owner:** _______________  

**Date:** _______________

---

**Prepared by:** GitHub Copilot AI  
**Version:** 1.0  
**Last Updated:** 14/04/2026
