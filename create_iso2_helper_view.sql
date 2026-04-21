-- =====================================================
-- ISO2 HELPER VIEW: Current Pause Status
-- =====================================================
-- Tạo VIEW để query current state dễ dàng hơn
-- Thay vì check trangthai='dang_tam_dung' ở mọi nơi,
-- chỉ cần JOIN với view này
-- =====================================================

-- Drop view nếu đã tồn tại
DROP VIEW IF EXISTS v_hososcbd_tamdung_current;

-- Tạo view lấy RECORD MỚI NHẤT của mỗi hồ sơ
CREATE VIEW v_hososcbd_tamdung_current AS
SELECT t1.*
FROM hososcbd_tamdung t1
INNER JOIN (
    SELECT hoso, MAX(id) AS max_id
    FROM hososcbd_tamdung
    GROUP BY hoso
) t2 ON t1.hoso = t2.hoso AND t1.id = t2.max_id;

-- Test view
SELECT 
    '✅ VIEW CỦA BẠN:' AS info,
    hoso,
    trangthai,
    ngay_tamdung,
    ngay_tieptuc,
    CASE 
        WHEN trangthai = 'dang_tam_dung' THEN '⏸ Đang tạm dừng'
        WHEN trangthai = 'da_tiep_tuc' THEN '▶ Đã tiếp tục'
    END AS status_display
FROM v_hososcbd_tamdung_current
ORDER BY id DESC
LIMIT 10;

-- =====================================================
-- HƯỚNG DẪN SỬ DỤNG VIEW
-- =====================================================
/*
1. THAY VÌ:
   SELECT hoso FROM hososcbd_tamdung WHERE trangthai='dang_tam_dung'
   
   DÙNG:
   SELECT hoso FROM v_hososcbd_tamdung_current WHERE trangthai='dang_tam_dung'

2. VD TRONG PERMISSION QUERY:
   -- Cũ (ISO1):
   WHERE hoso IN (SELECT hoso FROM hososcbd_tamdung WHERE trangthai='dang_tam_dung')
   
   -- Mới (ISO2 với VIEW):
   WHERE hoso IN (SELECT hoso FROM v_hososcbd_tamdung_current WHERE trangthai='dang_tam_dung')

3. LỢI ÍCH:
   - Không cần subquery phức tạp với MAX(id)
   - Code ngắn gọn, dễ đọc
   - Chỉ cần sửa tên bảng → tên view ở các queries
   - View tự động lấy record mới nhất

4. PERFORMANCE:
   - MySQL sẽ tối ưu view tốt
   - Đã có index trên hoso và id
   - Nhanh hơn nested subquery
*/
