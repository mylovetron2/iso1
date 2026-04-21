-- =====================================================
-- CRITICAL FIX: Permission queries cho ISO2
-- =====================================================
-- Phải chạy NGAY để fix bug "vẫn thông báo tạm dừng"
-- =====================================================

-- Kiểm tra VIEW đã tồn tại chưa
SELECT 'Kiểm tra VIEW...' AS status;

SHOW CREATE VIEW v_hososcbd_tamdung_current;
-- Nếu lỗi "View not found", chạy tiếp:

-- Tạo VIEW lấy record MỚI NHẤT của mỗi hồ sơ
DROP VIEW IF EXISTS v_hososcbd_tamdung_current;

CREATE VIEW v_hososcbd_tamdung_current AS
SELECT t1.*
FROM hososcbd_tamdung t1
INNER JOIN (
    SELECT hoso, MAX(id) AS max_id
    FROM hososcbd_tamdung
    GROUP BY hoso
) t2 ON t1.hoso = t2.hoso AND t1.id = t2.max_id;

-- Test VIEW
SELECT '✅ VIEW đã tạo. Test thử:' AS status;

SELECT 
    hoso,
    trangthai,
    ngay_tamdung,
    ngay_tieptuc,
    CASE 
        WHEN trangthai = 'dang_tam_dung' THEN '⏸ ĐANG TẠM DỪNG'
        WHEN trangthai = 'da_tiep_tuc' THEN '▶ ĐÃ TIẾP TỤC'
    END AS status_display
FROM v_hososcbd_tamdung_current
ORDER BY id DESC
LIMIT 10;

-- Verify logic
SELECT 'Kiểm tra hồ sơ ĐÃ TIẾP TỤC không còn trong VIEW:' AS check_point;

-- Hồ sơ nào có record MỚI NHẤT = 'da_tiep_tuc' sẽ KHÔNG xuất hiện ở query này:
SELECT hoso 
FROM v_hososcbd_tamdung_current 
WHERE trangthai = 'dang_tam_dung';

-- ↑ Chỉ show hồ sơ đang tạm dừng (event mới nhất là pause)
-- ✅ Hồ sơ đã tiếp tục KHÔNG có trong list này

SELECT '✅ XONG! Bây giờ cần PATCH CODE formsc.php' AS next_step;
