-- ==========================================
-- TẠO BẢNG DANH MỤC STATUS THIẾT BỊ
-- Quản lý tập trung các tình trạng thiết bị
-- ==========================================

-- Bước 1: Tạo bảng danh mục status
CREATE TABLE IF NOT EXISTS `danhmuc_status` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ma_status` VARCHAR(50) NOT NULL COMMENT 'Mã status (viết tắt, không dấu)',
  `ten_status` VARCHAR(100) NOT NULL COMMENT 'Tên đầy đủ của status',
  `mau_hienthi` VARCHAR(20) DEFAULT '#007bff' COMMENT 'Mã màu hiển thị (hex color)',
  `muc_do` ENUM('normal', 'warning', 'danger', 'success', 'info') DEFAULT 'normal' COMMENT 'Mức độ nghiêm trọng',
  `mo_ta` TEXT DEFAULT NULL COMMENT 'Mô tả chi tiết về status',
  `thu_tu` INT DEFAULT 0 COMMENT 'Thứ tự hiển thị',
  `kich_hoat` TINYINT(1) DEFAULT 1 COMMENT '1: Đang sử dụng, 0: Không sử dụng',
  `ngay_tao` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `ngay_capnhat` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_ma_status` (`ma_status`),
  KEY `idx_kich_hoat` (`kich_hoat`),
  KEY `idx_thu_tu` (`thu_tu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Danh mục tình trạng thiết bị';

-- Bước 2: Insert dữ liệu mặc định - Các status chuẩn
-- Dùng INSERT IGNORE để tránh lỗi duplicate khi chạy lại
INSERT IGNORE INTO `danhmuc_status` (`ma_status`, `ten_status`, `mau_hienthi`, `muc_do`, `mo_ta`, `thu_tu`) VALUES
('TOT', 'Tốt', '#28a745', 'success', 'Thiết bị hoạt động tốt, không có vấn đề', 1),
('DANG_HOAT_DONG', 'Đang hoạt động', '#17a2b8', 'info', 'Thiết bị đang trong quá trình vận hành', 2),
('DANG_SUA_CHUA', 'Đang sửa chữa', '#ffc107', 'warning', 'Thiết bị đang được sửa chữa, bảo dưỡng', 3),
('TAM_DUNG_CHO_SC', 'Tạm dừng chờ sửa chữa', '#fd7e14', 'warning', 'Thiết bị tạm dừng hoạt động, chờ sửa chữa', 4),
('HONG_KHAC_PHUC', 'Hỏng không khắc phục được', '#dc3545', 'danger', 'Thiết bị hỏng hoàn toàn, không thể sửa chữa', 5),
('BAO_DUONG_DK', 'Bảo dưỡng định kỳ', '#6610f2', 'info', 'Thiết bị đang bảo dưỡng theo kế hoạch', 6),
('CHO_PHUYET_LY', 'Chờ phuyệt lý', '#e83e8c', 'warning', 'Chờ phê duyệt phương án xử lý', 7),
('CHO_LINH_KIEN', 'Chờ linh kiện', '#fd7e14', 'warning', 'Chờ linh kiện thay thế', 8),
('DUNG_HOAT_DONG', 'Dừng hoạt động', '#6c757d', 'normal', 'Thiết bị ngưng hoạt động (lý do khác)', 9),
('THANH_LY', 'Thanh lý', '#343a40', 'danger', 'Thiết bị đã được thanh lý', 10),
('CHUA_XAC_DINH', 'Chưa xác định', '#adb5bd', 'normal', 'Chưa cập nhật tình trạng', 99);

-- Bước 3: Sửa bảng thietbi_status (nếu đã tồn tại) để liên kết với danh mục
-- Thêm cột ma_status (nếu chưa có)
ALTER TABLE `thietbi_status` 
ADD COLUMN `ma_status` VARCHAR(50) DEFAULT NULL COMMENT 'Mã status từ danhmuc_status' AFTER `status`;

-- Thêm foreign key (nếu chưa có)
ALTER TABLE `thietbi_status`
ADD CONSTRAINT `fk_status_danhmuc` 
FOREIGN KEY (`ma_status`) REFERENCES `danhmuc_status` (`ma_status`) 
ON UPDATE CASCADE ON DELETE SET NULL;

-- Bước 4: Cập nhật VIEW để hiển thị đầy đủ thông tin status
DROP VIEW IF EXISTS `view_thietbi_full`;

CREATE VIEW `view_thietbi_full` AS
SELECT 
  tb.stt,
  tb.mamay,
  tb.somay,
  tb.tenvt,
  tb.mavt,
  tb.madv,
  tb.model,
  tb.thongtincb,
  tb.bdtime,
  tb.loaidau,
  tb.mucdau,
  tb.tlkt,
  tb.hosomay,
  tb.ngayktsd,
  tb.dienap,
  tb.homay,
  -- Thông tin status từ bảng thietbi_status
  COALESCE(st.status, 'Chưa xác định') AS status,
  st.ma_status,
  st.nguoi_capnhat,
  st.ngay_capnhat,
  st.ghichu AS status_ghichu,
  -- Thông tin từ danh mục status
  dm.ten_status AS status_ten_day_du,
  dm.mau_hienthi AS status_mau,
  dm.muc_do AS status_muc_do,
  dm.mo_ta AS status_mo_ta
FROM 
  `thietbi_iso` tb
LEFT JOIN 
  `thietbi_status` st ON tb.stt = st.stt_thietbi
LEFT JOIN
  `danhmuc_status` dm ON st.ma_status = dm.ma_status;

-- Bước 5: Tạo stored procedure để cập nhật status với mã status
DELIMITER $$

DROP PROCEDURE IF EXISTS `sp_update_thietbi_status` $$

CREATE PROCEDURE `sp_update_thietbi_status`(
  IN p_stt_thietbi INT,
  IN p_ma_status VARCHAR(50),
  IN p_nguoi_capnhat VARCHAR(100),
  IN p_ghichu TEXT
)
BEGIN
  DECLARE v_ten_status VARCHAR(100);
  
  -- Lấy tên status từ danh mục
  SELECT ten_status INTO v_ten_status 
  FROM danhmuc_status 
  WHERE ma_status = p_ma_status AND kich_hoat = 1
  LIMIT 1;
  
  -- Nếu không tìm thấy mã status, báo lỗi
  IF v_ten_status IS NULL THEN
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'Mã status không tồn tại hoặc đã bị vô hiệu hóa';
  END IF;
  
  -- Insert hoặc update status
  INSERT INTO thietbi_status (stt_thietbi, status, ma_status, nguoi_capnhat, ghichu)
  VALUES (p_stt_thietbi, v_ten_status, p_ma_status, p_nguoi_capnhat, p_ghichu)
  ON DUPLICATE KEY UPDATE 
    status = v_ten_status,
    ma_status = p_ma_status,
    nguoi_capnhat = p_nguoi_capnhat,
    ghichu = p_ghichu,
    ngay_capnhat = CURRENT_TIMESTAMP;
    
END $$

DELIMITER ;

-- Bước 6: Tạo bảng lịch sử thay đổi status (tùy chọn)
CREATE TABLE IF NOT EXISTS `thietbi_status_history` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `stt_thietbi` INT NOT NULL COMMENT 'STT thiết bị',
  `ma_status_cu` VARCHAR(50) DEFAULT NULL COMMENT 'Mã status cũ',
  `ten_status_cu` VARCHAR(100) DEFAULT NULL COMMENT 'Tên status cũ',
  `ma_status_moi` VARCHAR(50) NOT NULL COMMENT 'Mã status mới',
  `ten_status_moi` VARCHAR(100) NOT NULL COMMENT 'Tên status mới',
  `nguoi_thaydoi` VARCHAR(100) DEFAULT NULL COMMENT 'Người thực hiện thay đổi',
  `ghichu` TEXT DEFAULT NULL COMMENT 'Ghi chú lý do thay đổi',
  `ngay_thaydoi` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_stt_thietbi` (`stt_thietbi`),
  KEY `idx_ngay_thaydoi` (`ngay_thaydoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Lịch sử thay đổi tình trạng thiết bị';

-- Bước 7: Tạo trigger tự động lưu lịch sử khi thay đổi status
DELIMITER $$

DROP TRIGGER IF EXISTS `trg_before_status_update` $$

CREATE TRIGGER `trg_before_status_update`
AFTER UPDATE ON `thietbi_status`
FOR EACH ROW
BEGIN
  IF (OLD.ma_status IS NULL AND NEW.ma_status IS NOT NULL) OR 
     (OLD.ma_status != NEW.ma_status) THEN
    INSERT INTO thietbi_status_history (
      stt_thietbi, 
      ma_status_cu, 
      ten_status_cu,
      ma_status_moi, 
      ten_status_moi,
      nguoi_thaydoi,
      ghichu
    )
    VALUES (
      NEW.stt_thietbi,
      OLD.ma_status,
      OLD.status,
      NEW.ma_status,
      NEW.status,
      NEW.nguoi_capnhat,
      NEW.ghichu
    );
  END IF;
END $$

DELIMITER ;

-- ==========================================
-- HƯỚNG DẪN SỬ DỤNG
-- ==========================================

-- 1. Xem danh sách status đang hoạt động:
-- SELECT * FROM danhmuc_status WHERE kich_hoat = 1 ORDER BY thu_tu;

-- 2. Thêm status mới:
-- INSERT INTO danhmuc_status (ma_status, ten_status, mau_hienthi, muc_do, mo_ta, thu_tu)
-- VALUES ('MAY_MOI', 'Máy mới chưa sử dụng', '#00ff00', 'success', 'Thiết bị mới mua chưa đưa vào sử dụng', 11);

-- 3. Cập nhật status cho thiết bị (dùng stored procedure):
-- CALL sp_update_thietbi_status(1, 'TOT', 'Admin', 'Máy hoạt động bình thường');

-- 4. Xem lịch sử thay đổi status của thiết bị:
-- SELECT * FROM thietbi_status_history WHERE stt_thietbi = 1 ORDER BY ngay_thaydoi DESC;

-- 5. Thống kê số lượng thiết bị theo status:
-- SELECT dm.ten_status, COUNT(st.stt_thietbi) as so_luong
-- FROM danhmuc_status dm
-- LEFT JOIN thietbi_status st ON dm.ma_status = st.ma_status
-- WHERE dm.kich_hoat = 1
-- GROUP BY dm.id, dm.ten_status
-- ORDER BY dm.thu_tu;
