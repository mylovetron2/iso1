-- =============================================
-- CÁC QUERY MẪU CHO CHỨC NĂNG TẠM DỪNG
-- =============================================

-- -----------------------------------------------
-- 1. TRUY VẤN CƠ BẢN
-- -----------------------------------------------

-- Lấy tất cả lịch sử tạm dừng
SELECT * FROM hososcbd_tamdung ORDER BY ngay_thuchien DESC;

-- Lấy lịch sử của 1 hồ sơ cụ thể
SELECT * FROM hososcbd_tamdung WHERE hoso = 'HS001' ORDER BY ngay_thuchien DESC;

-- Đếm số lần tạm dừng của từng hồ sơ
SELECT hoso, COUNT(*) as so_lan_tamdung
FROM hososcbd_tamdung
WHERE trangthai = 'tamdung'
GROUP BY hoso
ORDER BY so_lan_tamdung DESC;


-- -----------------------------------------------
-- 2. TRẠNG THÁI HIỆN TẠI
-- -----------------------------------------------

-- Lấy trạng thái mới nhất của TẤT CẢ hồ sơ
SELECT 
    hoso,
    trangthai,
    nguoi_thuchien,
    ngay_thuchien,
    CASE 
        WHEN trangthai = 'tamdung' THEN lydo_tamdung
        ELSE ghichu_tieptuc
    END as noi_dung
FROM hososcbd_tamdung t1
WHERE id = (
    SELECT MAX(id) 
    FROM hososcbd_tamdung t2 
    WHERE t2.hoso = t1.hoso
)
ORDER BY hoso;

-- Lấy CHỈNH hồ sơ đang tạm dừng
SELECT 
    t.hoso,
    t.nguoi_thuchien,
    t.ngay_thuchien,
    t.lydo_tamdung,
    h.mavt,
    h.somay,
    h.maql
FROM hososcbd_tamdung t
LEFT JOIN hososcbd_iso h ON t.hoso = h.hoso
WHERE t.id IN (
    SELECT MAX(id) FROM hososcbd_tamdung GROUP BY hoso
)
AND t.trangthai = 'tamdung'
ORDER BY t.ngay_thuchien DESC;


-- -----------------------------------------------
-- 3. KIỂM TRA HỒ SƠ CỤ THỂ
-- -----------------------------------------------

-- Function: Kiểm tra hồ sơ có đang tạm dừng không
-- (Dùng cho PHP)
SELECT 
    CASE 
        WHEN trangthai = 'tamdung' THEN 1
        ELSE 0
    END as is_tamdung,
    trangthai,
    DATE_FORMAT(ngay_thuchien, '%Y-%m') as thang_tamdung,
    lydo_tamdung
FROM hososcbd_tamdung
WHERE hoso = 'HS001'
ORDER BY ngay_thuchien DESC
LIMIT 1;


-- -----------------------------------------------
-- 4. BÁO CÁO THỐNG KÊ
-- -----------------------------------------------

-- Số lượng hồ sơ tạm dừng theo tháng
SELECT 
    DATE_FORMAT(ngay_thuchien, '%Y-%m') as thang,
    COUNT(DISTINCT hoso) as so_ho_so_tamdung
FROM hososcbd_tamdung
WHERE trangthai = 'tamdung'
GROUP BY thang
ORDER BY thang DESC;

-- Thời gian trung bình tạm dừng (ngày)
SELECT 
    td.hoso,
    td.ngay_thuchien as ngay_tamdung,
    tt.ngay_thuchien as ngay_tieptuc,
    DATEDIFF(tt.ngay_thuchien, td.ngay_thuchien) as so_ngay_tamdung
FROM hososcbd_tamdung td
INNER JOIN hososcbd_tamdung tt ON td.hoso = tt.hoso AND tt.trangthai = 'tieptuc'
WHERE td.trangthai = 'tamdung'
AND tt.ngay_thuchien > td.ngay_thuchien
AND tt.ngay_thuchien = (
    SELECT MIN(ngay_thuchien)
    FROM hososcbd_tamdung
    WHERE hoso = td.hoso
    AND trangthai = 'tieptuc'
    AND ngay_thuchien > td.ngay_thuchien
);

-- Top lý do tạm dừng
SELECT 
    lydo_tamdung,
    COUNT(*) as so_lan,
    COUNT(DISTINCT hoso) as so_ho_so
FROM hososcbd_tamdung
WHERE trangthai = 'tamdung'
AND lydo_tamdung IS NOT NULL
GROUP BY lydo_tamdung
ORDER BY so_lan DESC
LIMIT 10;


-- -----------------------------------------------
-- 5. DỮ LIỆU KẾT HỢP
-- -----------------------------------------------

-- Hồ sơ đang tạm dừng + thông tin thiết bị
SELECT 
    t.hoso,
    h.maql,
    h.mavt,
    h.somay,
    h.model,
    t.nguoi_thuchien,
    t.ngay_thuchien,
    DATEDIFF(NOW(), t.ngay_thuchien) as so_ngay_tamdung,
    t.lydo_tamdung
FROM hososcbd_tamdung t
INNER JOIN hososcbd_iso h ON t.hoso = h.hoso
WHERE t.id IN (
    SELECT MAX(id) FROM hososcbd_tamdung GROUP BY hoso
)
AND t.trangthai = 'tamdung'
ORDER BY t.ngay_thuchien ASC;

-- Lịch sử đầy đủ của hồ sơ
SELECT 
    t.hoso,
    t.trangthai,
    t.nguoi_thuchien,
    t.ngay_thuchien,
    CASE 
        WHEN t.trangthai = 'tamdung' THEN t.lydo_tamdung
        ELSE t.ghichu_tieptuc
    END as noi_dung,
    h.mavt,
    h.somay
FROM hososcbd_tamdung t
LEFT JOIN hososcbd_iso h ON t.hoso = h.hoso
WHERE t.hoso = 'HS001'
ORDER BY t.ngay_thuchien DESC;


-- -----------------------------------------------
-- 6. XÓA DỮ LIỆU
-- -----------------------------------------------

-- Xóa lịch sử của 1 hồ sơ cụ thể
-- DELETE FROM hososcbd_tamdung WHERE hoso = 'HS001';

-- Xóa lịch sử cũ hơn 1 năm
-- DELETE FROM hososcbd_tamdung WHERE ngay_thuchien < DATE_SUB(NOW(), INTERVAL 1 YEAR);

-- Xóa toàn bộ (cẩn thận!)
-- TRUNCATE TABLE hososcbd_tamdung;


-- -----------------------------------------------
-- 7. QUERY CHO BÁO CÁO THÁNG
-- -----------------------------------------------

-- Kiểm tra hồ sơ có nên loại trừ khỏi báo cáo tháng không
-- Logic: 
--   - Nếu đang tạm dừng VÀ tạm dừng từ tháng trước → loại trừ
--   - Nếu tạm dừng trong cùng tháng báo cáo → vẫn hiển thị (ngoại lệ)

SELECT 
    h.hoso,
    h.maql,
    h.mavt,
    h.somay,
    t.trangthai,
    t.ngay_thuchien,
    DATE_FORMAT(t.ngay_thuchien, '%Y-%m') as thang_tamdung,
    CASE
        WHEN t.trangthai = 'tamdung' 
             AND DATE_FORMAT(t.ngay_thuchien, '%Y-%m') = '2026-04'
        THEN 'HIỂN THỊ (Tạm dừng cùng tháng)'
        WHEN t.trangthai = 'tamdung'
        THEN 'LOẠI TRỪ (Tạm dừng từ tháng trước)'
        ELSE 'HIỂN THỊ (Không tạm dừng)'
    END as action
FROM hososcbd_iso h
LEFT JOIN (
    SELECT hoso, trangthai, ngay_thuchien
    FROM hososcbd_tamdung
    WHERE id IN (SELECT MAX(id) FROM hososcbd_tamdung GROUP BY hoso)
) t ON h.hoso = t.hoso
WHERE DATE_FORMAT(h.ngayth, '%Y-%m') = '2026-04'
ORDER BY h.maql, h.mavt;
