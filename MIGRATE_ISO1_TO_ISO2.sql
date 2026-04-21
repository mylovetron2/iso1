-- =====================================================
-- MIGRATION: ISO1 → ISO2 (Event-Sourcing)
-- Chuyển từ UPDATE in-place sang INSERT event history
-- =====================================================
-- Ngày tạo: 2026-04-14
-- Tác giả: GitHub Copilot AI
-- Mục đích: Giữ lại TẤT CẢ dữ liệu, tạo timeline đầy đủ
-- =====================================================

-- BƯỚC 1: Backup bảng hiện tại
-- =====================================================
DROP TABLE IF EXISTS hososcbd_tamdung_backup_iso1;

CREATE TABLE hososcbd_tamdung_backup_iso1 LIKE hososcbd_tamdung;

INSERT INTO hososcbd_tamdung_backup_iso1 
SELECT * FROM hososcbd_tamdung;

SELECT CONCAT('✅ Đã backup ', COUNT(*), ' records vào hososcbd_tamdung_backup_iso1') AS status
FROM hososcbd_tamdung_backup_iso1;


-- BƯỚC 2: Tạo bảng tạm để chứa records mới
-- =====================================================
DROP TABLE IF EXISTS hososcbd_tamdung_iso2_temp;

CREATE TABLE hososcbd_tamdung_iso2_temp LIKE hososcbd_tamdung;

-- BƯỚC 3: Migrate dữ liệu
-- =====================================================
-- Logic:
-- - Record đang tạm dừng (trangthai='dang_tam_dung'): Copy nguyên xi
-- - Record đã tiếp tục (trangthai='da_tiep_tuc'): Tách thành 2 records

-- 3A. Copy records ĐANG TẠM DỪNG (giữ nguyên)
INSERT INTO hososcbd_tamdung_iso2_temp
SELECT * FROM hososcbd_tamdung
WHERE trangthai = 'dang_tam_dung';

SELECT CONCAT('✅ Copied ', COUNT(*), ' paused records') AS status
FROM hososcbd_tamdung_iso2_temp
WHERE trangthai = 'dang_tam_dung';


-- 3B. Tách records ĐÃ TIẾP TỤC thành 2 records
-- Record 1: PAUSE event (chỉ giữ thông tin tạm dừng)
INSERT INTO hososcbd_tamdung_iso2_temp (
    hoso, mavt, somay, model, maql,
    ngay_tamdung, nguoi_tamdung, lydo_tamdung,
    ngay_tieptuc, nguoi_tieptuc, ghichu_tieptuc,
    thoigian_tamdung_gio, thoigian_tamdung_ngay,
    trangthai,
    nguoi_thuchien, ngay_thuchien,
    created_at, updated_at
)
SELECT 
    hoso, mavt, somay, model, maql,
    ngay_tamdung, nguoi_tamdung, lydo_tamdung,
    NULL AS ngay_tieptuc,           -- ❌ Xóa thông tin tiếp tục
    NULL AS nguoi_tieptuc,          -- ❌ Xóa thông tin tiếp tục
    NULL AS ghichu_tieptuc,         -- ❌ Xóa thông tin tiếp tục
    NULL AS thoigian_tamdung_gio,   -- ❌ Xóa thời gian tính toán
    NULL AS thoigian_tamdung_ngay,  -- ❌ Xóa thời gian tính toán
    'dang_tam_dung' AS trangthai,   -- ✅ Đổi lại thành đang tạm dừng
    nguoi_tamdung AS nguoi_thuchien,-- ✅ Người tạm dừng
    ngay_tamdung AS ngay_thuchien,  -- ✅ Ngày tạm dừng
    created_at,
    ngay_tamdung AS updated_at      -- ✅ Update time = pause time
FROM hososcbd_tamdung
WHERE trangthai = 'da_tiep_tuc'
  AND ngay_tieptuc IS NOT NULL;

SELECT CONCAT('✅ Created ', COUNT(*), ' PAUSE events from completed records') AS status
FROM hososcbd_tamdung_iso2_temp
WHERE trangthai = 'dang_tam_dung';


-- Record 2: RESUME event (chỉ giữ thông tin tiếp tục)
INSERT INTO hososcbd_tamdung_iso2_temp (
    hoso, mavt, somay, model, maql,
    ngay_tamdung, nguoi_tamdung, lydo_tamdung,
    ngay_tieptuc, nguoi_tieptuc, ghichu_tieptuc,
    thoigian_tamdung_gio, thoigian_tamdung_ngay,
    trangthai,
    nguoi_thuchien, ngay_thuchien,
    created_at, updated_at
)
SELECT 
    hoso, mavt, somay, model, maql,
    ngay_tamdung,                   -- ✅ Giữ reference đến pause event
    NULL AS nguoi_tamdung,          -- ❌ Xóa thông tin tạm dừng
    CONCAT('Tiếp tục từ ngày ', DATE_FORMAT(ngay_tamdung, '%d/%m/%Y %H:%i')) AS lydo_tamdung, -- ℹ️ Ghi chú reference
    ngay_tieptuc,                   -- ✅ Thời gian tiếp tục
    nguoi_tieptuc,                  -- ✅ Người tiếp tục
    ghichu_tieptuc,                 -- ✅ Ghi chú tiếp tục
    thoigian_tamdung_gio,           -- ✅ Thời gian tạm dừng (giữ lại)
    thoigian_tamdung_ngay,          -- ✅ Thời gian tạm dừng (giữ lại)
    'da_tiep_tuc' AS trangthai,     -- ✅ Đã tiếp tục
    nguoi_tieptuc AS nguoi_thuchien,-- ✅ Người tiếp tục
    ngay_tieptuc AS ngay_thuchien,  -- ✅ Ngày tiếp tục
    created_at,
    ngay_tieptuc AS updated_at      -- ✅ Update time = resume time
FROM hososcbd_tamdung
WHERE trangthai = 'da_tiep_tuc'
  AND ngay_tieptuc IS NOT NULL;

SELECT CONCAT('✅ Created ', COUNT(*), ' RESUME events from completed records') AS status
FROM hososcbd_tamdung_iso2_temp
WHERE trangthai = 'da_tiep_tuc';


-- BƯỚC 4: Kiểm tra kết quả migration
-- =====================================================
SELECT 
    '📊 MIGRATION SUMMARY' AS info,
    '===================' AS separator;

SELECT 
    'Before (ISO1)' AS stage,
    COUNT(*) AS total_records,
    SUM(CASE WHEN trangthai='dang_tam_dung' THEN 1 ELSE 0 END) AS paused,
    SUM(CASE WHEN trangthai='da_tiep_tuc' THEN 1 ELSE 0 END) AS resumed
FROM hososcbd_tamdung_backup_iso1;

SELECT 
    'After (ISO2)' AS stage,
    COUNT(*) AS total_records,
    SUM(CASE WHEN trangthai='dang_tam_dung' THEN 1 ELSE 0 END) AS paused,
    SUM(CASE WHEN trangthai='da_tiep_tuc' THEN 1 ELSE 0 END) AS resumed
FROM hososcbd_tamdung_iso2_temp;

-- Kiểm tra chi tiết từng hồ sơ
SELECT 
    '📋 PER-RECORD COMPARISON' AS info,
    '========================' AS separator;

SELECT 
    hoso,
    COUNT(*) AS events_count,
    GROUP_CONCAT(trangthai ORDER BY ngay_thuchien SEPARATOR ' → ') AS event_timeline
FROM hososcbd_tamdung_iso2_temp
GROUP BY hoso
ORDER BY hoso;


-- BƯỚC 5: Replace bảng chính (NGUY HIỂM - Uncommment khi đã kiểm tra kỹ)
-- =====================================================
-- ⚠️ CHỈ CHẠY KHI ĐÃ KIỂM TRA KỸ BƯỚC 4
-- ⚠️ Backup đã được tạo ở hososcbd_tamdung_backup_iso1

/*
-- 5A. Xóa bảng cũ
DROP TABLE hososcbd_tamdung;

-- 5B. Rename bảng mới
RENAME TABLE hososcbd_tamdung_iso2_temp TO hososcbd_tamdung;

-- 5C. Verify
SELECT 
    '✅ MIGRATION COMPLETED' AS status,
    COUNT(*) AS total_records,
    SUM(CASE WHEN trangthai='dang_tam_dung' THEN 1 ELSE 0 END) AS paused,
    SUM(CASE WHEN trangthai='da_tiep_tuc' THEN 1 ELSE 0 END) AS resumed
FROM hososcbd_tamdung;

SELECT '⚠️ Backup table: hososcbd_tamdung_backup_iso1' AS reminder;
*/


-- BƯỚC 6: ROLLBACK (nếu có vấn đề)
-- =====================================================
-- Nếu migration có vấn đề, chạy lệnh sau để rollback:

/*
DROP TABLE IF EXISTS hososcbd_tamdung;
RENAME TABLE hososcbd_tamdung_backup_iso1 TO hososcbd_tamdung;
SELECT '✅ ROLLBACK COMPLETED - Đã khôi phục dữ liệu gốc' AS status;
*/


-- =====================================================
-- HƯỚNG DẪN SỬ DỤNG
-- =====================================================
/*
1. KIỂM TRA TRƯỚC:
   - Chạy đến BƯỚC 4 để xem kết quả migration trong bảng tạm
   - Verify số lượng records và timeline
   
2. APPLY MIGRATION:
   - Uncomment BƯỚC 5 để apply migration vào bảng chính
   - Backup tự động được tạo ở hososcbd_tamdung_backup_iso1
   
3. ROLLBACK (nếu cần):
   - Uncomment BƯỚC 6 để rollback về dữ liệu gốc
   
4. SAU KHI MIGRATION:
   - Update backend code (formsc.php) để dùng INSERT thay vì UPDATE
   - Update queries để lấy current state: WHERE id = (SELECT MAX(id)...)
   - Test kỹ trước khi xóa backup table

5. XÓA BACKUP (khi đã ổn định):
   DROP TABLE hososcbd_tamdung_backup_iso1;
*/
