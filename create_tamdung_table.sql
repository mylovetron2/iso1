-- ==========================================
-- TẠO BẢNG LỊCH SỬ TẠM DỪNG SỬA CHỮA
-- Quản lý các lần tạm dừng/tiếp tục công việc sửa chữa
-- ==========================================

-- Bước 1: Tạo bảng lưu lịch sử tạm dừng
DROP TABLE IF EXISTS `hososcbd_tamdung`;

CREATE TABLE `hososcbd_tamdung` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `hoso` VARCHAR(50) NOT NULL COMMENT 'Số hồ sơ',
  `mavt` VARCHAR(50) NOT NULL COMMENT 'Mã thiết bị',
  `somay` VARCHAR(50) DEFAULT NULL COMMENT 'Số máy',
  `model` VARCHAR(100) DEFAULT NULL COMMENT 'Model thiết bị',
  `maql` VARCHAR(100) DEFAULT NULL COMMENT 'Mã quản lý',
  
  -- Thông tin tạm dừng
  `ngay_tamdung` DATETIME NOT NULL COMMENT 'Ngày giờ tạm dừng',
  `nguoi_tamdung` VARCHAR(100) DEFAULT NULL COMMENT 'Người thực hiện tạm dừng',
  `lydo_tamdung` TEXT COMMENT 'Lý do tạm dừng',
  
  -- Thông tin tiếp tục
  `ngay_tieptuc` DATETIME DEFAULT NULL COMMENT 'Ngày giờ tiếp tục (NULL = đang tạm dừng)',
  `nguoi_tieptuc` VARCHAR(100) DEFAULT NULL COMMENT 'Người tiếp tục công việc',
  `ghichu_tieptuc` TEXT COMMENT 'Ghi chú khi tiếp tục',
  
  -- Thời gian tạm dừng
  `thoigian_tamdung_gio` INT DEFAULT NULL COMMENT 'Số giờ tạm dừng (tự động tính)',
  `thoigian_tamdung_ngay` DECIMAL(10,2) DEFAULT NULL COMMENT 'Số ngày tạm dừng (tự động tính)',
  
  -- Trạng thái
  `trangthai` ENUM('dang_tam_dung', 'da_tiep_tuc') DEFAULT 'dang_tam_dung' COMMENT 'Trạng thái hiện tại',
  
  -- Metadata
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  
  PRIMARY KEY (`id`),
  KEY `idx_hoso` (`hoso`),
  KEY `idx_trangthai` (`trangthai`),
  KEY `idx_ngay_tamdung` (`ngay_tamdung`),
  KEY `idx_mavt_somay` (`mavt`, `somay`),
  KEY `idx_maql` (`maql`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Lịch sử tạm dừng sửa chữa bảo dưỡng';

-- Bước 2: Tạo VIEW để xem thông tin tạm dừng kèm thông tin thiết bị
CREATE OR REPLACE VIEW `view_hososcbd_tamdung` AS
SELECT 
  td.id,
  td.hoso,
  td.mavt,
  td.somay,
  td.model,
  td.maql,
  -- Thông tin thiết bị
  tb.mamay,
  tb.tenvt,
  tb.madv,
  -- Thông tin tạm dừng
  td.ngay_tamdung,
  td.nguoi_tamdung,
  td.lydo_tamdung,
  -- Thông tin tiếp tục
  td.ngay_tieptuc,
  td.nguoi_tieptuc,
  td.ghichu_tieptuc,
  -- Thời gian
  td.thoigian_tamdung_gio,
  td.thoigian_tamdung_ngay,
  -- Tính thời gian tạm dừng (nếu chưa tiếp tục)
  CASE 
    WHEN td.trangthai = 'dang_tam_dung' THEN 
      TIMESTAMPDIFF(HOUR, td.ngay_tamdung, NOW())
    ELSE 
      td.thoigian_tamdung_gio
  END AS thoigian_hientai_gio,
  CASE 
    WHEN td.trangthai = 'dang_tam_dung' THEN 
      ROUND(TIMESTAMPDIFF(HOUR, td.ngay_tamdung, NOW()) / 24, 2)
    ELSE 
      td.thoigian_tamdung_ngay
  END AS thoigian_hientai_ngay,
  -- Trạng thái
  td.trangthai,
  -- Thông tin hồ sơ
  hs.cv AS cong_viec,
  hs.ngayth AS ngay_batdau,
  hs.ngaykt AS ngay_ketthuc,
  hs.nhomsc AS nhom_suachua
FROM 
  `hososcbd_tamdung` td
LEFT JOIN 
  `thietbi_iso` tb ON td.mavt = tb.mavt AND td.somay = tb.somay AND td.model = tb.model
LEFT JOIN
  `hososcbd_iso` hs ON td.hoso = hs.hoso;

-- Bước 3: Tạo Stored Procedure để tạm dừng hồ sơ
DELIMITER $$

DROP PROCEDURE IF EXISTS `sp_tamdung_hoso` $$

CREATE PROCEDURE `sp_tamdung_hoso`(
  IN p_hoso VARCHAR(50),
  IN p_mavt VARCHAR(50),
  IN p_somay VARCHAR(50),
  IN p_model VARCHAR(100),
  IN p_maql VARCHAR(100),
  IN p_nguoi_tamdung VARCHAR(100),
  IN p_lydo_tamdung TEXT
)
BEGIN
  DECLARE v_count INT;
  
  -- Kiểm tra xem hồ sơ có đang tạm dừng không
  SELECT COUNT(*) INTO v_count 
  FROM hososcbd_tamdung 
  WHERE hoso = p_hoso AND trangthai = 'dang_tam_dung';
  
  IF v_count > 0 THEN
    -- Nếu đang tạm dừng rồi, báo lỗi
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'Hồ sơ này đang trong trạng thái tạm dừng';
  ELSE
    -- Insert bản ghi tạm dừng mới
    INSERT INTO hososcbd_tamdung (
      hoso, mavt, somay, model, maql,
      ngay_tamdung, nguoi_tamdung, lydo_tamdung,
      trangthai
    ) VALUES (
      p_hoso, p_mavt, p_somay, p_model, p_maql,
      NOW(), p_nguoi_tamdung, p_lydo_tamdung,
      'dang_tam_dung'
    );
  END IF;
END $$

DELIMITER ;

-- Bước 4: Tạo Stored Procedure để tiếp tục hồ sơ
DELIMITER $$

DROP PROCEDURE IF EXISTS `sp_tieptuc_hoso` $$

CREATE PROCEDURE `sp_tieptuc_hoso`(
  IN p_hoso VARCHAR(50),
  IN p_nguoi_tieptuc VARCHAR(100),
  IN p_ghichu_tieptuc TEXT
)
BEGIN
  DECLARE v_count INT;
  
  -- Kiểm tra xem hồ sơ có đang tạm dừng không
  SELECT COUNT(*) INTO v_count 
  FROM hososcbd_tamdung 
  WHERE hoso = p_hoso AND trangthai = 'dang_tam_dung';
  
  IF v_count = 0 THEN
    -- Nếu không đang tạm dừng, báo lỗi
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'Hồ sơ này không trong trạng thái tạm dừng';
  ELSE
    -- Cập nhật bản ghi tạm dừng gần nhất
    UPDATE hososcbd_tamdung 
    SET 
      ngay_tieptuc = NOW(),
      nguoi_tieptuc = p_nguoi_tieptuc,
      ghichu_tieptuc = p_ghichu_tieptuc,
      trangthai = 'da_tiep_tuc',
      thoigian_tamdung_gio = TIMESTAMPDIFF(HOUR, ngay_tamdung, NOW()),
      thoigian_tamdung_ngay = ROUND(TIMESTAMPDIFF(HOUR, ngay_tamdung, NOW()) / 24, 2)
    WHERE hoso = p_hoso 
      AND trangthai = 'dang_tam_dung'
    ORDER BY ngay_tamdung DESC 
    LIMIT 1;
  END IF;
END $$

DELIMITER ;

-- Bước 5: Tạo Function kiểm tra hồ sơ có đang tạm dừng không
DELIMITER $$

DROP FUNCTION IF EXISTS `fn_check_tamdung` $$

CREATE FUNCTION `fn_check_tamdung`(p_hoso VARCHAR(50))
RETURNS TINYINT(1)
DETERMINISTIC
BEGIN
  DECLARE v_count INT;
  
  SELECT COUNT(*) INTO v_count 
  FROM hososcbd_tamdung 
  WHERE hoso = p_hoso AND trangthai = 'dang_tam_dung';
  
  RETURN IF(v_count > 0, 1, 0);
END $$

DELIMITER ;

-- ==========================================
-- HƯỚNG DẪN SỬ DỤNG
-- ==========================================

-- 1. Tạm dừng hồ sơ:
-- CALL sp_tamdung_hoso('HS001', 'MAY001', 'SM001', 'MODEL-X', 'QL-2024-001', 'Nguyen Van A', 'Chờ linh kiện');

-- 2. Tiếp tục hồ sơ:
-- CALL sp_tieptuc_hoso('HS001', 'Nguyen Van A', 'Đã có linh kiện, tiếp tục sửa chữa');

-- 3. Kiểm tra hồ sơ có đang tạm dừng không:
-- SELECT fn_check_tamdung('HS001');

-- 4. Xem danh sách hồ sơ đang tạm dừng:
-- SELECT * FROM view_hososcbd_tamdung WHERE trangthai = 'dang_tam_dung' ORDER BY ngay_tamdung DESC;

-- 5. Xem lịch sử tạm dừng của một hồ sơ:
-- SELECT * FROM view_hososcbd_tamdung WHERE hoso = 'HS001' ORDER BY ngay_tamdung DESC;

-- 6. Thống kê số lượng hồ sơ đang tạm dừng:
-- SELECT COUNT(*) as so_luong FROM hososcbd_tamdung WHERE trangthai = 'dang_tam_dung';

-- 7. Thống kê thời gian tạm dừng trung bình:
-- SELECT 
--   AVG(thoigian_tamdung_gio) as tb_gio,
--   AVG(thoigian_tamdung_ngay) as tb_ngay
-- FROM hososcbd_tamdung 
-- WHERE trangthai = 'da_tiep_tuc';
