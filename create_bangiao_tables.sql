-- =====================================================
-- SQL SCRIPT TẠO BẢNG CHO HỆ THỐNG BÀN GIAO THIẾT BỊ
-- =====================================================
-- Sử dụng khi migrate logic bàn giao sang project mới
-- =====================================================

-- Bảng 1: Hồ sơ sửa chữa/bảo dưỡng thiết bị
CREATE TABLE IF NOT EXISTS `hososcbd_iso` (
  `hoso` varchar(50) NOT NULL COMMENT 'Mã hồ sơ (PRIMARY KEY)',
  `phieu` varchar(10) DEFAULT NULL COMMENT 'Số phiếu (group các thiết bị cùng khách hàng)',
  `maql` varchar(50) DEFAULT NULL COMMENT 'Mã quản lý',
  `mavt` varchar(50) DEFAULT NULL COMMENT 'Mã vật tư/thiết bị',
  `somay` varchar(50) DEFAULT NULL COMMENT 'Số máy',
  `model` varchar(50) DEFAULT NULL COMMENT 'Model máy',
  `ngayyc` date DEFAULT NULL COMMENT 'Ngày yêu cầu',
  `ngayth` date DEFAULT NULL COMMENT 'Ngày thực hiện',
  `ngaykt` date DEFAULT '0000-00-00' COMMENT 'Ngày kết thúc',
  `solg` int(11) DEFAULT 1 COMMENT 'Số lượng',
  `ttktbefore` text COMMENT 'Tình trạng kỹ thuật trước sửa chữa',
  `ttktafter` text COMMENT 'Tình trạng kỹ thuật sau sửa chữa',
  `honghoc` text COMMENT 'Mô tả hỏng hóc',
  `khacphuc` text COMMENT 'Cách khắc phục',
  `bg` int(1) DEFAULT 0 COMMENT 'Cờ đã bàn giao (0=chưa, 1=đã giao)',
  `slbg` int(11) DEFAULT 0 COMMENT 'Số lần bàn giao (tăng dần)',
  `madv` varchar(100) DEFAULT NULL COMMENT 'Mã đơn vị khách hàng',
  `ngyeucau` varchar(100) DEFAULT NULL COMMENT 'Người yêu cầu (bên nhận)',
  `ngnhyeucau` varchar(100) DEFAULT NULL COMMENT 'Người nhận yêu cầu (bên giao)',
  `nhomsc` varchar(50) DEFAULT NULL COMMENT 'Nhóm sửa chữa',
  `cv` varchar(10) DEFAULT NULL COMMENT 'Công việc (KT/BD/SC)',
  `ketluan` text COMMENT 'Kết luận',
  `ghichufinal` text COMMENT 'Ghi chú cuối cùng',
  PRIMARY KEY (`hoso`),
  KEY `idx_phieu` (`phieu`),
  KEY `idx_maql` (`maql`),
  KEY `idx_bg` (`bg`),
  KEY `idx_ngaykt` (`ngaykt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Hồ sơ sửa chữa/bảo dưỡng thiết bị';

-- Bảng 2: Danh mục thiết bị
CREATE TABLE IF NOT EXISTS `thietbi_iso` (
  `stt` int(11) NOT NULL AUTO_INCREMENT COMMENT 'STT tự tăng',
  `mavt` varchar(50) NOT NULL COMMENT 'Mã vật tư',
  `somay` varchar(50) NOT NULL COMMENT 'Số máy',
  `model` varchar(50) DEFAULT NULL COMMENT 'Model',
  `tenvt` varchar(255) DEFAULT NULL COMMENT 'Tên vật tư/thiết bị',
  `homay` varchar(255) DEFAULT NULL COMMENT 'Họ máy',
  `dienap` varchar(50) DEFAULT NULL COMMENT 'Điện áp',
  PRIMARY KEY (`stt`),
  UNIQUE KEY `unique_device` (`mavt`,`somay`,`model`),
  KEY `idx_mavt` (`mavt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Danh mục thiết bị';

-- Bảng 3: Lịch sử động (audit log)
CREATE TABLE IF NOT EXISTS `lichsudn_iso` (
  `stt` int(11) NOT NULL AUTO_INCREMENT COMMENT 'STT tự tăng',
  `username` varchar(50) DEFAULT NULL COMMENT 'Tên đăng nhập',
  `madv` varchar(50) DEFAULT NULL COMMENT 'Mã đơn vị',
  `nhom` varchar(50) DEFAULT NULL COMMENT 'Nhóm',
  `curdate` datetime DEFAULT NULL COMMENT 'Thời gian thực hiện',
  `ip_address` varchar(50) DEFAULT NULL COMMENT 'Địa chỉ IP',
  `maql` varchar(50) DEFAULT NULL COMMENT 'Mã quản lý liên quan',
  `action` varchar(100) DEFAULT NULL COMMENT 'Hành động thực hiện',
  PRIMARY KEY (`stt`),
  KEY `idx_username` (`username`),
  KEY `idx_maql` (`maql`),
  KEY `idx_curdate` (`curdate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Lịch sử thao tác';

-- Bảng 4: Người thực hiện
CREATE TABLE IF NOT EXISTS `ngthuchien_iso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mahoso` varchar(50) NOT NULL COMMENT 'Mã hồ sơ',
  `stt` int(11) DEFAULT NULL COMMENT 'STT trong danh sách',
  `hoten` varchar(100) DEFAULT NULL COMMENT 'Họ tên người thực hiện',
  `giolv` decimal(5,2) DEFAULT 0.00 COMMENT 'Giờ làm việc',
  PRIMARY KEY (`id`),
  KEY `idx_mahoso` (`mahoso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Người thực hiện công việc';

-- Bảng 5: Thiết bị hỗ trợ
CREATE TABLE IF NOT EXISTS `thietbihotro_iso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mahoso` varchar(50) NOT NULL COMMENT 'Mã hồ sơ',
  `stt` int(11) DEFAULT NULL COMMENT 'STT trong danh sách',
  `tenthietbi` varchar(255) DEFAULT NULL COMMENT 'Tên thiết bị hỗ trợ',
  `serialnumber` varchar(100) DEFAULT NULL COMMENT 'Serial number',
  PRIMARY KEY (`id`),
  KEY `idx_mahoso` (`mahoso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Thiết bị hỗ trợ sửa chữa';

-- Bảng 6: Danh mục vật tư linh kiện
CREATE TABLE IF NOT EXISTS `danhmucvattu_iso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mahoso` varchar(50) DEFAULT NULL COMMENT 'Mã hồ sơ',
  `mavattu` varchar(50) DEFAULT NULL COMMENT 'Mã vật tư',
  `mota` text COMMENT 'Mô tả',
  `pn` varchar(100) DEFAULT NULL COMMENT 'Part number',
  `dvt` varchar(20) DEFAULT NULL COMMENT 'Đơn vị tính',
  `soluong` int(11) DEFAULT 1 COMMENT 'Số lượng',
  PRIMARY KEY (`id`),
  KEY `idx_mahoso` (`mahoso`),
  KEY `idx_mavattu` (`mavattu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Vật tư linh kiện sử dụng';

-- Bảng 7: Users (giản lược)
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL COMMENT 'Tên đăng nhập',
  `password` varchar(255) NOT NULL COMMENT 'Mật khẩu (md5 hoặc bcrypt)',
  `hoten` varchar(100) DEFAULT NULL COMMENT 'Họ tên',
  `nhom` varchar(50) DEFAULT NULL COMMENT 'Nhóm (CNC, KTKT, ...)',
  `madv` varchar(50) DEFAULT NULL COMMENT 'Mã đơn vị',
  `phanquyen` int(1) DEFAULT 0 COMMENT 'Phân quyền (0=user, 1=admin)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Người dùng hệ thống';

-- =====================================================
-- DỮ LIỆU MẪU (OPTIONAL)
-- =====================================================

-- Insert user admin mẫu
INSERT INTO `users` (`username`, `password`, `hoten`, `nhom`, `madv`, `phanquyen`) VALUES
('admin', MD5('admin123'), 'Quản trị viên', 'Admin', 'ADMIN', 1),
('user1', MD5('user123'), 'Nguyễn Văn A', 'CNC', 'XD', 0);

-- Insert thiết bị mẫu
INSERT INTO `thietbi_iso` (`mavt`, `somay`, `model`, `tenvt`, `homay`, `dienap`) VALUES
('GPS', '001', 'RTK-5', 'Máy định vị GPS', 'GPS', '12V'),
('MAG', '002', 'GSM-19', 'Máy từ kế', 'MAG', '12V');

-- =====================================================
-- INDEXES ĐỂ TỐI ƯU HÓA QUERY
-- =====================================================

-- Index cho việc tìm kiếm hồ sơ chưa bàn giao
CREATE INDEX idx_search_bangiao ON hososcbd_iso(bg, ngaykt, nhomsc);

-- Index cho việc group theo phiếu
CREATE INDEX idx_phieu_maql ON hososcbd_iso(phieu, maql);

-- =====================================================
-- VIEWS HỖ TRỢ
-- =====================================================

-- View: Danh sách thiết bị chờ bàn giao
CREATE OR REPLACE VIEW v_thietbi_cho_bangiao AS
SELECT 
    h.hoso,
    h.phieu,
    h.maql,
    h.mavt,
    h.somay,
    h.model,
    CONCAT(h.mavt, IF(h.model IS NULL OR h.model = '', '', CONCAT('-', h.model))) AS mamay,
    t.tenvt,
    h.ttktafter,
    h.ngaykt,
    h.bg,
    h.nhomsc,
    h.ngyeucau,
    h.madv
FROM hososcbd_iso h
LEFT JOIN thietbi_iso t ON h.mavt = t.mavt AND h.somay = t.somay AND h.model = t.model
WHERE h.ngaykt != '0000-00-00' 
  AND h.bg = 0
ORDER BY h.phieu DESC, h.hoso;

-- View: Lịch sử bàn giao
CREATE OR REPLACE VIEW v_lichsu_bangiao AS
SELECT 
    h.hoso,
    h.phieu,
    h.maql,
    CONCAT(h.mavt, IF(h.model IS NULL OR h.model = '', '', CONCAT('-', h.model))) AS mamay,
    h.somay,
    t.tenvt,
    h.ngaykt,
    h.slbg,
    h.ngyeucau AS ben_nhan,
    h.ngnhyeucau AS ben_giao,
    h.madv,
    l.curdate AS ngay_bangiao,
    l.username AS nguoi_bangiao
FROM hososcbd_iso h
LEFT JOIN thietbi_iso t ON h.mavt = t.mavt AND h.somay = t.somay AND h.model = t.model
LEFT JOIN lichsudn_iso l ON h.maql = l.maql
WHERE h.bg = 1
ORDER BY l.curdate DESC;

-- =====================================================
-- STORED PROCEDURES HỖ TRỢ (OPTIONAL)
-- =====================================================

DELIMITER //

-- Procedure: Lấy số phiếu tiếp theo
CREATE PROCEDURE sp_get_next_phieu(
    IN p_nhomsc VARCHAR(50),
    IN p_is_admin INT,
    OUT p_next_phieu VARCHAR(10)
)
BEGIN
    DECLARE max_phieu INT DEFAULT 0;
    
    IF p_is_admin = 1 THEN
        SELECT COALESCE(MAX(CAST(phieu AS UNSIGNED)), 0) INTO max_phieu
        FROM hososcbd_iso;
    ELSE
        SELECT COALESCE(MAX(CAST(phieu AS UNSIGNED)), 0) INTO max_phieu
        FROM hososcbd_iso
        WHERE nhomsc = p_nhomsc;
    END IF;
    
    SET max_phieu = max_phieu + 1;
    
    -- Format: 0001, 0010, 0100, 1000
    IF max_phieu <= 9 THEN
        SET p_next_phieu = LPAD(max_phieu, 4, '0');
    ELSEIF max_phieu <= 99 THEN
        SET p_next_phieu = LPAD(max_phieu, 4, '0');
    ELSEIF max_phieu <= 999 THEN
        SET p_next_phieu = LPAD(max_phieu, 4, '0');
    ELSE
        SET p_next_phieu = CAST(max_phieu AS CHAR);
    END IF;
END //

-- Procedure: Cập nhật bàn giao
CREATE PROCEDURE sp_update_bangiao(
    IN p_maql VARCHAR(50),
    IN p_list_hoso TEXT,
    IN p_username VARCHAR(50),
    IN p_ip_address VARCHAR(50),
    OUT p_success INT,
    OUT p_message VARCHAR(255)
)
BEGIN
    DECLARE v_slbg INT DEFAULT 0;
    DECLARE v_madv VARCHAR(50);
    DECLARE v_nhom VARCHAR(50);
    
    -- Bắt đầu transaction
    START TRANSACTION;
    
    -- Lấy slbg hiện tại
    SELECT COALESCE(MAX(slbg), 0) INTO v_slbg
    FROM hososcbd_iso
    WHERE maql = p_maql;
    
    -- Tăng slbg
    SET v_slbg = v_slbg + 1;
    
    -- Cập nhật slbg cho tất cả
    UPDATE hososcbd_iso 
    SET slbg = v_slbg
    WHERE maql = p_maql;
    
    -- Cập nhật bg = 1 cho các hồ sơ được chọn
    -- p_list_hoso format: "hoso1,hoso2,hoso3"
    UPDATE hososcbd_iso
    SET bg = 1
    WHERE FIND_IN_SET(hoso, p_list_hoso) > 0;
    
    -- Lấy thông tin user
    SELECT madv, nhom INTO v_madv, v_nhom
    FROM users
    WHERE username = p_username;
    
    -- Ghi log
    INSERT INTO lichsudn_iso (username, madv, nhom, curdate, ip_address, maql, action)
    VALUES (p_username, v_madv, v_nhom, NOW(), p_ip_address, p_maql, 'BANG_GIAO');
    
    -- Commit
    COMMIT;
    
    SET p_success = 1;
    SET p_message = 'Bàn giao thành công';
    
END //

DELIMITER ;

-- =====================================================
-- TRIGGERS (OPTIONAL - Audit automatically)
-- =====================================================

DELIMITER //

-- Trigger: Log khi cập nhật bg
CREATE TRIGGER trg_after_update_bg
AFTER UPDATE ON hososcbd_iso
FOR EACH ROW
BEGIN
    IF OLD.bg != NEW.bg THEN
        INSERT INTO lichsudn_iso (username, curdate, maql, action)
        VALUES (USER(), NOW(), NEW.maql, 
                CONCAT('Update bg: ', OLD.bg, ' -> ', NEW.bg));
    END IF;
END //

DELIMITER ;

-- =====================================================
-- KẾT THÚC SCRIPT
-- =====================================================
-- Kiểm tra lại bằng:
-- SHOW TABLES;
-- DESCRIBE hososcbd_iso;
-- SELECT * FROM v_thietbi_cho_bangiao;
