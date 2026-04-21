# 🔄 MIGRATION ISO1 → ISO2: EVENT-SOURCING PATTERN

> **Chuyển từ UPDATE in-place sang INSERT event timeline**  
> **Ngày tạo:** 14/04/2026  
> **Trạng thái:** GIỮ LẠI TẤT CẢ DỮ LIỆU HIỆN CÓ

---

## 📦 PACKAGE NÀY GỒM CÁC FILE

### 1. Migration Scripts (SQL)
- **`MIGRATE_ISO1_TO_ISO2.sql`** ⭐ 
  - Migrate dữ liệu từ ISO1 sang ISO2
  - Tự động duplicate records đã tiếp tục thành 2 records (pause + resume)
  - Tạo backup table: `hososcbd_tamdung_backup_iso1`
  - Kết quả: Bảng tạm `hososcbd_tamdung_iso2_temp` để verify trước khi apply

- **`create_iso2_helper_view.sql`**
  - Tạo VIEW `v_hososcbd_tamdung_current` 
  - Lấy record mới nhất (current state) của mỗi hồ sơ
  - Dùng cho permission queries đơn giản hơn

### 2. Documentation
- **`HUONG_DAN_MIGRATION_ISO2.md`** 📘 - READ THIS FIRST!
  - Hướng dẫn chi tiết từng bước migration
  - Checklist đầy đủ
  - Testing guide
  - Rollback procedure

- **`XAC_NHAN_CHUC_NANG_TAM_DUNG.md`** 📄
  - Báo cáo phân tích ISO1 vs ISO2
  - So sánh ưu nhược điểm
  - Database schema comparison

### 3. Auto-Patch Tools
- **`PATCH_ISO2_PERMISSIONS.php`** 🔧
  - Script tự động update permission queries
  - Thay `hososcbd_tamdung` → `v_hososcbd_tamdung_current`
  - Tạo file patched để review trước khi apply

### 4. Backend Code (Updated)
- **`formsc.php`** ✏️ (PARTIAL UPDATE)
  - Line ~759-818: Tiếp tục handler - ✅ ĐÃ SỬA (UPDATE → INSERT)
  - Line ~714: Check trạng thái - ✅ ĐÃ SỬA (lấy record mới nhất)
  - Line ~6014, ~14544: Display alert - ✅ ĐÃ SỬA (ORDER BY id DESC - **BUGFIX**)
  - Permission queries (line ~905, ~5661, ~6153, ~14751): ⚠️ CẦN CHẠY PATCH SCRIPT

**🐛 BUGFIX quan trọng:** Đã sửa cảnh báo vẫn hiển thị sau khi tiếp tục (xem [BUGFIX_PAUSE_ALERT_STILL_SHOWS.md](BUGFIX_PAUSE_ALERT_STILL_SHOWS.md))

---

## 🚀 QUICK START (3 BƯỚC)

### BƯỚC 1: BACKUP
```bash
# Backup database
mysqldump -u username -p database_name > backup_$(date +%Y%m%d).sql
```

### BƯỚC 2: RUN MIGRATIONS
```bash
# 1. Migrate dữ liệu
mysql -u username -p database_name < MIGRATE_ISO1_TO_ISO2.sql

# 2. Verify trong phpMyAdmin:
#    - Kiểm tra bảng: hososcbd_tamdung_iso2_temp
#    - So sánh với: hososcbd_tamdung_backup_iso1

# 3. Nếu OK, uncomment BƯỚC 5 trong MIGRATE_ISO1_TO_ISO2.sql và chạy lại

# 4. Tạo VIEW
mysql -u username -p database_name < create_iso2_helper_view.sql
```

### BƯỚC 3: PATCH CODE
```bash
# Chạy auto-patch script
php PATCH_ISO2_PERMISSIONS.php

# Review diff
# (Dùng VS Code: Right-click formsc.php → Select for Compare, 
#  then right-click formsc_iso2_patched.php → Compare with Selected)

# Nếu OK, apply patch:
cp formsc.php formsc_before_iso2.php.bak
cp formsc_iso2_patched.php formsc.php
```

---

## 🔍 KHÁC BIỆT ISO1 vs ISO2

### ISO1 (Hiện tại - UPDATE Pattern)
```
Hồ sơ "ABC" tạm dừng lúc 10:00, tiếp tục lúc 15:00:

Database:
┌────┬──────┬──────────┬──────────┬─────────────┐
│ id │ hoso │ pause_at │resume_at │ trangthai   │
├────┼──────┼──────────┼──────────┼─────────────┤
│ 5  │ ABC  │ 10:00    │ 15:00    │ da_tiep_tuc │ ← 1 record (UPDATE)
└────┴──────┴──────────┴──────────┴─────────────┘

NẾU tạm dừng/tiếp tục lại:
→ OVERWRITE record 5 → MẤT lịch sử cũ ❌
```

### ISO2 (Sau migration - INSERT Pattern)
```
Hồ sơ "ABC" tạm dừng lúc 10:00, tiếp tục lúc 15:00:

Database:
┌────┬──────┬──────────┬──────────┬────────────────┐
│ id │ hoso │ event_at │ note     │ trangthai      │
├────┼──────┼──────────┼──────────┼────────────────┤
│ 5  │ ABC  │ 10:00    │ Pause    │ dang_tam_dung  │ ← Record 1 (INSERT)
│ 6  │ ABC  │ 15:00    │ Resume   │ da_tiep_tuc    │ ← Record 2 (INSERT)
└────┴──────┴──────────┴──────────┴────────────────┘

NẾU tạm dừng/tiếp tục lại:
→ INSERT 2 records mới (id=7, 8) → GIỮ timeline ✅

Timeline đầy đủ:
ABC: pause(10:00) → resume(15:00) → pause(16:00) → resume(17:00)
```

---

## ✅ ƯU ĐIỂM ISO2

### 1. Audit Trail Hoàn chỉnh
- ✅ Lưu lại TẤT CẢ lịch sử pause/resume
- ✅ Có thể tạm dừng/tiếp tục nhiều lần
- ✅ Phục vụ audit, báo cáo, compliance

### 2. Data Integrity
- ✅ Không bao giờ mất data (immutable events)
- ✅ Có thể rollback/undo
- ✅ Debug dễ hơn (xem full timeline)

### 3. Reporting Power
- ✅ Báo cáo timeline đầy đủ
- ✅ Thống kê số lần tạm dừng
- ✅ Tính trung bình thời gian mỗi lần tạm dừng

### 4. Future-Proof
- ✅ Dễ mở rộng thêm event types
- ✅ Phù hợp với event-sourcing architecture
- ✅ Chuẩn bị cho real-time notifications

---

## ⚠️ TRADE-OFFS

### ISO1 (đơn giản)
- ✅ 1 record/cycle → ít storage
- ✅ Query đơn giản
- ❌ Mất lịch sử khi pause/resume nhiều lần

### ISO2 (full audit)
- ✅ Timeline đầy đủ
- ❌ 2 records/cycle → nhiều storage hơn
- ❌ Query phức tạp hơn (cần lấy record mới nhất)
- ✅ Đã có VIEW helper để đơn giản hóa

---

## 🧪 TESTING CHECKLIST

- [ ] **Test 1:** Tạm dừng hồ sơ mới
  - Expected: 1 record INSERT với `trangthai='dang_tam_dung'`
  
- [ ] **Test 2:** Tiếp tục hồ sơ
  - Expected: 1 record INSERT MỚI với `trangthai='da_tiep_tuc'`
  - Record pause cũ GIỮ NGUYÊN
  
- [ ] **Test 3:** Tạm dừng/tiếp tục nhiều lần
  - Expected: 4 records (pause → resume → pause → resume)
  
- [ ] **Test 4:** Permission user thường
  - Hồ sơ hoàn thành + không tạm dừng: ❌ Không thấy
  - Hồ sơ hoàn thành + đang tạm dừng: ✅ Thấy
  - Hồ sơ chưa hoàn thành: ✅ Thấy
  
- [ ] **Test 5:** Alert cảnh báo
  - Mở hồ sơ đang tạm dừng → Hiển thị warning box vàng
  
- [ ] **Test 6:** Báo cáo
  - Filter "Đang tạm dừng": Chỉ show records mới nhất có trangthai='dang_tam_dung'
  - Timeline: Show ALL events theo thứ tự thời gian

---

## 🔥 ROLLBACK PROCEDURE

Nếu có vấn đề SAU KHI apply migration:

```sql
-- 1. Restore database
DROP TABLE IF EXISTS hososcbd_tamdung;
RENAME TABLE hososcbd_tamdung_backup_iso1 TO hososcbd_tamdung;

-- 2. Drop VIEW
DROP VIEW IF EXISTS v_hososcbd_tamdung_current;

-- Success message
SELECT '✅ ROLLBACK COMPLETED - Restored to ISO1' AS status;
```

```bash
# 3. Restore code
cp formsc_before_iso2.php.bak formsc.php
```

---

## 📞 SUPPORT & TROUBLESHOOTING

### Lỗi thường gặp:

#### 1. "Table hososcbd_tamdung_iso2_temp not found"
→ Chưa chạy `MIGRATE_ISO1_TO_ISO2.sql`

#### 2. "View v_hososcbd_tamdung_current not found"
→ Chưa chạy `create_iso2_helper_view.sql`

#### 3. "Cannot insert into view"
→ Script patch nhầm INSERT query. Check `PATCH_ISO2_PERMISSIONS.php`

#### 4. User thường không thấy hồ sơ đang tạm dừng
→ Permission query chưa được update. Chạy patch script lại.

#### 5. Hiển thị nhiều cảnh báo "đang tạm dừng" cho 1 hồ sơ
→ Query display alert chưa có `ORDER BY id DESC LIMIT 1`

### Debug queries:

```sql
-- Kiểm tra current status của hồ sơ
SELECT * FROM v_hososcbd_tamdung_current 
WHERE hoso = 'ABC';

-- Xem full timeline
SELECT 
    id, 
    trangthai,
    ngay_thuchien,
    CASE trangthai 
        WHEN 'dang_tam_dung' THEN '⏸ Pause'
        WHEN 'da_tiep_tuc' THEN '▶ Resume'
    END AS action
FROM hososcbd_tamdung 
WHERE hoso = 'ABC'
ORDER BY id;
```

---

## 📝 FILES SUMMARY

| File | Mục đích | Khi nào dùng |
|------|----------|--------------|
| `MIGRATE_ISO1_TO_ISO2.sql` | Migrate dữ liệu | Một lần duy nhất |
| `create_iso2_helper_view.sql` | Tạo VIEW helper | Một lần duy nhất |
| `PATCH_ISO2_PERMISSIONS.php` | Auto-patch queries | Một lần duy nhất |
| `HUONG_DAN_MIGRATION_ISO2.md` | Hướng dẫn chi tiết | Đọc trước khi bắt đầu |
| `README_MIGRATION_ISO2.md` | File này | Tổng quan nhanh |
| `XAC_NHAN_CHUC_NANG_TAM_DUNG.md` | Phân tích kỹ thuật | Tham khảo |

---

## 🎯 TIMELINE DỰ KIẾN

| Bước | Thời gian | Ghi chú |
|------|-----------|---------|
| Backup database | 5 phút | Critical |
| Chạy migration SQL | 10 phút | Tùy số lượng records |
| Verify data | 15 phút | Quan trọng! |
| Tạo VIEW | 1 phút | |
| Patch code | 5 phút | Auto script |
| Testing | 30 phút | Comprehensive |
| **TỔNG** | **~1 giờ** | Trên dev environment |

**⚠️ LƯU Ý:** Test KỸ trên dev trước khi apply lên production!

---

## ✅ READY TO START?

1. **ĐỌC:** `HUONG_DAN_MIGRATION_ISO2.md`
2. **BACKUP:** Database + code
3. **RUN:** 3 bước Quick Start ở trên
4. **TEST:** Checklist đầy đủ
5. **MONITOR:** Trong 1 tuần đầu
6. **CLEANUP:** Xóa backup tables sau khi ổn định

**Good luck! 🚀**
