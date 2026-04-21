-- =============================================
-- TẠO BẢNG HOSOSCBD_TAMDUNG
-- Lưu trữ lịch sử tạm dừng/tiếp tục hồ sơ
-- =============================================

-- Kiểm tra và xóa bảng cũ nếu cần
-- DROP TABLE IF EXISTS hososcbd_tamdung;

-- Tạo bảng mới
CREATE TABLE IF NOT EXISTS hososcbd_tamdung (
    id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'ID tự tăng',
    
    hoso VARCHAR(50) NOT NULL COMMENT 'Mã hồ sơ (foreign key)',
    
    trangthai ENUM('tamdung', 'tieptuc') NOT NULL COMMENT 'Trạng thái: tamdung hoặc tieptuc',
    
    nguoi_thuchien VARCHAR(100) NOT NULL COMMENT 'Tên người thực hiện hành động',
    
    ngay_thuchien DATETIME NOT NULL COMMENT 'Ngày giờ thực hiện hành động',
    
    lydo_tamdung TEXT COMMENT 'Lý do tạm dừng (bắt buộc khi trangthai=tamdung)',
    
    ghichu_tieptuc TEXT COMMENT 'Ghi chú khi tiếp tục (không bắt buộc)',
    
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm tạo record',
    
    -- Indexes để tối ưu truy vấn
    INDEX idx_hoso (hoso),
    INDEX idx_trangthai (trangthai),
    INDEX idx_ngay (ngay_thuchien),
    INDEX idx_composite (hoso, ngay_thuchien DESC)
    
    -- Foreign key constraint (bỏ comment nếu muốn dùng)
    -- FOREIGN KEY (hoso) REFERENCES hososcbd_iso(hoso) ON DELETE CASCADE
    
) ENGINE=InnoDB 
  DEFAULT CHARSET=utf8mb4 
  COLLATE=utf8mb4_unicode_ci
  COMMENT='Bảng lưu lịch sử tạm dừng/tiếp tục hồ sơ sửa chữa bảo dưỡng';

-- Kiểm tra bảng đã tạo
SHOW CREATE TABLE hososcbd_tamdung;

-- Hiển thị cấu trúc
DESCRIBE hososcbd_tamdung;
