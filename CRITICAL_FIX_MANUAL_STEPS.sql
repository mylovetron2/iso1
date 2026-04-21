-- =====================================================
-- QUICK FIX: SQL queries thay thế trực tiếp
-- =====================================================
-- Vì có vấn đề với whitespace trong code, dùng find/replace thủ công
-- =====================================================

-- 🚨 QUAN TRỌNG: Phải tạo VIEW trước
-- =====================================================

DROP VIEW IF EXISTS v_hososcbd_tamdung_current;

CREATE VIEW v_hososcbd_tamdung_current AS
SELECT t1.*
FROM hososcbd_tamdung t1
INNER JOIN (
    SELECT hoso, MAX(id) AS max_id
    FROM hososcbd_tamdung
    GROUP BY hoso
) t2 ON t1.hoso = t2.hoso AND t1.id = t2.max_id;

SELECT '✅ VIEW đã tạo!' AS status;

-- =====================================================
-- HƯỚNG DẪN SỬA CODE THỦ CÔNG
-- =====================================================

/*
Mở file formsc.php trong VS Code, nhấn Ctrl+H (Find & Replace):

BƯỚC 1: Find (EXACT):
FROM hososcbd_tamdung WHERE trangthai='dang_tam_dung'

BƯỚC 2: Replace with:
FROM v_hososcbd_tamdung_current WHERE trangthai='dang_tam_dung'

BƯỚC 3: Click "Replace All" (hoặc Replace từng cái để kiểm tra)

⚠️ LƯU Ý: CHỈ thay ở SELECT queries, KHÔNG thay ở INSERT queries!

Số lượng expected: ~6 replacements
- Line ~905, 907 (permission dropdowns - phiếu)
- Line ~5661, 5663 (permission dropdowns - mã quản lý)
- Line ~6154 (permission dropdown)
- Line ~14753 (edit mode dropdown)

CÁC QUERY KHÔNG ĐƯỢC THAY:
- Line ~766: SELECT ... FROM hososcbd_tamdung (trong INSERT handler - GIỮ NGUYÊN)
*/

-- Test VIEW hoạt động
SELECT 'Test VIEW:' AS test;

SELECT 
    hoso,
    trangthai,
    CASE 
        WHEN trangthai = 'dang_tam_dung' THEN '⏸ Pause'
        ELSE '▶ Resume'
    END AS status
FROM v_hososcbd_tamdung_current
LIMIT 5;

-- Verify: Hồ sơ đã tiếp tục KHÔNG có trong danh sách
SELECT 'Hồ sơ đang tạm dừng (current):' AS check;

SELECT hoso 
FROM v_hososcbd_tamdung_current 
WHERE trangthai = 'dang_tam_dung';

-- ↑ Danh sách này CHỈ có hồ sơ event mới nhất là 'dang_tam_dung'
-- ✅ Hồ sơ đã tiếp tục KHÔNG có trong list
