-- =============================================
-- DỮ LIỆU MẪU CHO BẢNG HOSOSCBD_TAMDUNG
-- Để test chức năng
-- =============================================

-- Ví dụ 1: Hồ sơ HS001 - Tạm dừng rồi tiếp tục
INSERT INTO hososcbd_tamdung (hoso, trangthai, nguoi_thuchien, ngay_thuchien, lydo_tamdung)
VALUES ('HS001', 'tamdung', 'Nguyễn Văn A', '2026-03-15 10:30:00', 'Chờ linh kiện từ nhà cung cấp');

INSERT INTO hososcbd_tamdung (hoso, trangthai, nguoi_thuchien, ngay_thuchien, ghichu_tieptuc)
VALUES ('HS001', 'tieptuc', 'Nguyễn Văn A', '2026-03-20 14:00:00', 'Đã nhận được linh kiện, tiếp tục sửa chữa');


-- Ví dụ 2: Hồ sơ HS002 - Đang tạm dừng
INSERT INTO hososcbd_tamdung (hoso, trangthai, nguoi_thuchien, ngay_thuchien, lydo_tamdung)
VALUES ('HS002', 'tamdung', 'Trần Văn B', '2026-04-01 09:00:00', 'Chờ phê duyệt kinh phí sửa chữa');


-- Ví dụ 3: Hồ sơ HS003 - Nhiều lần tạm dừng/tiếp tục
INSERT INTO hososcbd_tamdung (hoso, trangthai, nguoi_thuchien, ngay_thuchien, lydo_tamdung)
VALUES ('HS003', 'tamdung', 'Lê Thị C', '2026-03-10 08:00:00', 'Thiếu nhân lực kỹ thuật');

INSERT INTO hososcbd_tamdung (hoso, trangthai, nguoi_thuchien, ngay_thuchien, ghichu_tieptuc)
VALUES ('HS003', 'tieptuc', 'Lê Thị C', '2026-03-12 10:00:00', 'Đã bổ sung nhân lực');

INSERT INTO hososcbd_tamdung (hoso, trangthai, nguoi_thuchien, ngay_thuchien, lydo_tamdung)
VALUES ('HS003', 'tamdung', 'Lê Thị C', '2026-03-25 16:00:00', 'Máy móc khác phải sửa gấp, ưu tiên trước');

INSERT INTO hososcbd_tamdung (hoso, trangthai, nguoi_thuchien, ngay_thuchien, ghichu_tieptuc)
VALUES ('HS003', 'tieptuc', 'Lê Thị C', '2026-04-05 07:30:00', 'Hoàn thành máy ưu tiên, quay lại HS003');


-- Kiểm tra dữ liệu
SELECT * FROM hososcbd_tamdung ORDER BY ngay_thuchien DESC;

-- Kiểm tra trạng thái hiện tại của từng hồ sơ
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
WHERE ngay_thuchien = (
    SELECT MAX(ngay_thuchien) 
    FROM hososcbd_tamdung t2 
    WHERE t2.hoso = t1.hoso
)
ORDER BY hoso;
