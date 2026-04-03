-- ==========================================
-- TẠO BẢNG THIETBI_STATUS 
-- Lưu trữ tình trạng máy hiện tại
-- Không cần sửa bảng thietbi_iso gốc
-- ==========================================

-- Bước 1: Tạo bảng thietbi_status để lưu status (KHÔNG có foreign key trước)
DROP TABLE IF EXISTS `thietbi_status`;

CREATE TABLE `thietbi_status` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `stt_thietbi` INT NOT NULL COMMENT 'Liên kết tới thietbi_iso.stt',
  `status` VARCHAR(100) DEFAULT NULL COMMENT 'Tình trạng máy: Đang hoạt động, Bảo dưỡng, Hỏng hóc, Dừng hoạt động, v.v.',
  `nguoi_capnhat` VARCHAR(100) DEFAULT NULL COMMENT 'Người cập nhật status',
  `ngay_capnhat` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Ngày cập nhật status',
  `ghichu` TEXT DEFAULT NULL COMMENT 'Ghi chú về tình trạng',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_thietbi` (`stt_thietbi`),
  KEY `idx_status` (`status`),
  KEY `idx_stt_thietbi` (`stt_thietbi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Bảng lưu trữ tình trạng thiết bị';

-- Bước 1b: Thêm Foreign Key Constraint (tùy chọn, có thể bỏ qua nếu lỗi)
-- Chỉ chạy dòng này nếu bảng thietbi_iso đã có và cột stt là PRIMARY KEY
-- Nếu gặp lỗi, có thể bỏ qua - bảng vẫn hoạt động bình thường

-- Xóa constraint cũ nếu có
ALTER TABLE `thietbi_status` DROP FOREIGN KEY IF EXISTS `fk_thietbi_status`;

-- Thêm constraint mới (nếu được)
ALTER TABLE `thietbi_status`
ADD CONSTRAINT `fk_thietbi_status` 
FOREIGN KEY (`stt_thietbi`) REFERENCES `thietbi_iso` (`stt`) 
ON DELETE CASCADE ON UPDATE CASCADE;

-- Bước 2: Tạo VIEW để JOIN thietbi_iso với thietbi_status
CREATE OR REPLACE VIEW `view_thietbi_full` AS
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
  COALESCE(st.status, 'Chưa xác định') AS status,
  st.nguoi_capnhat,
  st.ngay_capnhat,
  st.ghichu AS status_ghichu
FROM 
  `thietbi_iso` tb
LEFT JOIN 
  `thietbi_status` st ON tb.stt = st.stt_thietbi;

-- Bước 3: Insert dữ liệu mặc định cho các thiết bị hiện có (tùy chọn)
-- Bỏ comment dòng dưới nếu muốn tất cả thiết bị hiện có có status mặc định
-- INSERT INTO thietbi_status (stt_thietbi, status, nguoi_capnhat)
-- SELECT stt, 'Đang hoạt động', 'System' FROM thietbi_iso 
-- WHERE stt NOT IN (SELECT stt_thietbi FROM thietbi_status);

-- ==========================================
-- HƯỚNG DẪN SỬ DỤNG
-- ==========================================

-- 1. Thêm/cập nhật status cho thiết bị:
-- INSERT INTO thietbi_status (stt_thietbi, status, nguoi_capnhat, ghichu)
-- VALUES (1, 'Đang hoạt động', 'Admin', 'Máy hoạt động bình thường')
-- ON DUPLICATE KEY UPDATE 
--   status = VALUES(status),
--   nguoi_capnhat = VALUES(nguoi_capnhat),
--   ghichu = VALUES(ghichu);

-- 2. Truy vấn thiết bị kèm status:
-- SELECT * FROM view_thietbi_full;

-- 3. Lọc thiết bị theo status:
-- SELECT * FROM view_thietbi_full WHERE status = 'Đang hoạt động';

-- 4. Xem lịch sử thay đổi status (nếu cần, tạo bảng thêm):
-- (Có thể tạo bảng thietbi_status_history để lưu lịch sử thay đổi)
