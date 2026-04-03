<?php
/**
 * QUẢN LÝ TÌNH TRẠNG THIẾT BỊ
 * File này cung cấp các functions để quản lý status của thiết bị
 * mà không cần sửa bảng thietbi_iso
 */

// Không include select_data.php ở đây vì file gọi sẽ include

/**
 * Thêm hoặc cập nhật status cho thiết bị (dùng mã status)
 * 
 * @param int $stt_thietbi - STT của thiết bị từ bảng thietbi_iso
 * @param string $ma_status - Mã status từ danh mục (ví dụ: 'TOT', 'DANG_SUA_CHUA')
 * @param string $nguoi_capnhat - Người cập nhật
 * @param string $ghichu - Ghi chú (không bắt buộc)
 * @return bool - Thành công hay thất bại
 */
function update_thietbi_status($stt_thietbi, $ma_status, $nguoi_capnhat, $ghichu = '') {
    $stt_thietbi = mysql_real_escape_string($stt_thietbi);
    $ma_status = mysql_real_escape_string($ma_status);
    $nguoi_capnhat = mysql_real_escape_string($nguoi_capnhat);
    $ghichu = mysql_real_escape_string($ghichu);
    
    // Lấy tên status từ danh mục
    $sql_get = "SELECT ten_status FROM danhmuc_status WHERE ma_status = '$ma_status' AND kich_hoat = 1 LIMIT 1";
    $result_get = mysql_query($sql_get);
    
    if (!$result_get || mysql_num_rows($result_get) == 0) {
        // Không tìm thấy mã status, dùng mã làm tên
        $ten_status = $ma_status;
    } else {
        $row = mysql_fetch_assoc($result_get);
        $ten_status = $row['ten_status'];
    }
    
    // Insert hoặc update status
    $sql = "INSERT INTO thietbi_status (stt_thietbi, status, ma_status, nguoi_capnhat, ghichu)
            VALUES ('$stt_thietbi', '$ten_status', '$ma_status', '$nguoi_capnhat', '$ghichu')
            ON DUPLICATE KEY UPDATE 
                status = '$ten_status',
                ma_status = '$ma_status',
                nguoi_capnhat = '$nguoi_capnhat',
                ghichu = '$ghichu',
                ngay_capnhat = CURRENT_TIMESTAMP";
    
    $result = mysql_query($sql);
    return $result ? true : false;
}

/**
 * Thêm hoặc cập nhật status cho thiết bị (dùng tên status - legacy)
 * Hàm này để tương thích ngược với code cũ
 * 
 * @param int $stt_thietbi - STT của thiết bị
 * @param string $status - Tên tình trạng máy
 * @param string $nguoi_capnhat - Người cập nhật
 * @param string $ghichu - Ghi chú (không bắt buộc)
 * @return bool - Thành công hay thất bại
 */
function update_thietbi_status_by_name($stt_thietbi, $status, $nguoi_capnhat, $ghichu = '') {
    $stt_thietbi = mysql_real_escape_string($stt_thietbi);
    $status = mysql_real_escape_string($status);
    $nguoi_capnhat = mysql_real_escape_string($nguoi_capnhat);
    $ghichu = mysql_real_escape_string($ghichu);
    
    // Tìm mã status từ tên
    $sql_find = "SELECT ma_status FROM danhmuc_status WHERE ten_status = '$status' AND kich_hoat = 1 LIMIT 1";
    $result_find = mysql_query($sql_find);
    
    if ($result_find && mysql_num_rows($result_find) > 0) {
        $row = mysql_fetch_assoc($result_find);
        $ma_status = $row['ma_status'];
        return update_thietbi_status($stt_thietbi, $ma_status, $nguoi_capnhat, $ghichu);
    }
    
    // Nếu không tìm thấy trong danh mục, insert trực tiếp (fallback)
    $sql = "INSERT INTO thietbi_status (stt_thietbi, status, nguoi_capnhat, ghichu)
            VALUES ('$stt_thietbi', '$status', '$nguoi_capnhat', '$ghichu')
            ON DUPLICATE KEY UPDATE 
                status = VALUES(status),
                nguoi_capnhat = VALUES(nguoi_capnhat),
                ghichu = VALUES(ghichu),
                ngay_capnhat = CURRENT_TIMESTAMP";
    
    $result = mysql_query($sql);
    return $result ? true : false;
}

/**
 * Lấy status của thiết bị
 * 
 * @param int $stt_thietbi - STT của thiết bị
 * @return array - Thông tin status hoặc null
 */
function get_thietbi_status($stt_thietbi) {
    $stt_thietbi = mysql_real_escape_string($stt_thietbi);
    
    $sql = "SELECT * FROM thietbi_status WHERE stt_thietbi = '$stt_thietbi'";
    $result = mysql_query($sql);
    
    if ($result && mysql_num_rows($result) > 0) {
        return mysql_fetch_assoc($result);
    }
    return null;
}

/**
 * Lấy danh sách thiết bị kèm status (sử dụng VIEW)
 * 
 * @param string $where_clause - Điều kiện WHERE (không bắt buộc)
 * @param string $order_by - Sắp xếp (không bắt buộc)
 * @return resource - MySQL result
 */
function get_thietbi_with_status($where_clause = '', $order_by = 'stt ASC') {
    $sql = "SELECT * FROM view_thietbi_full";
    
    if (!empty($where_clause)) {
        $sql .= " WHERE " . $where_clause;
    }
    
    if (!empty($order_by)) {
        $sql .= " ORDER BY " . $order_by;
    }
    
    return mysql_query($sql);
}

/**
 * Lấy danh sách thiết bị theo status
 * 
 * @param string $status - Status cần lọc
 * @return resource - MySQL result
 */
function get_thietbi_by_status($status) {
    $status = mysql_real_escape_string($status);
    return get_thietbi_with_status("status = '$status'");
}

/**
 * Xóa status của thiết bị
 * 
 * @param int $stt_thietbi - STT của thiết bị
 * @return bool - Thành công hay thất bại
 */
function delete_thietbi_status($stt_thietbi) {
    $stt_thietbi = mysql_real_escape_string($stt_thietbi);
    
    $sql = "DELETE FROM thietbi_status WHERE stt_thietbi = '$stt_thietbi'";
    $result = mysql_query($sql);
    return $result ? true : false;
}

/**
 * Lấy danh sách các status từ danh mục
 * 
 * @param bool $only_active - Chỉ lấy status đang kích hoạt (mặc định: true)
 * @return array - Danh sách status
 */
function get_all_status_list($only_active = true) {
    $where = $only_active ? "WHERE kich_hoat = 1" : "";
    $sql = "SELECT * FROM danhmuc_status $where ORDER BY thu_tu, ten_status";
    $result = mysql_query($sql);
    
    $status_list = array();
    while ($row = mysql_fetch_assoc($result)) {
        $status_list[] = $row;
    }
    return $status_list;
}

/**
 * Lấy thông tin chi tiết của một status từ danh mục
 * 
 * @param string $ma_status - Mã status
 * @return array|null - Thông tin status hoặc null
 */
function get_status_info($ma_status) {
    $ma_status = mysql_real_escape_string($ma_status);
    $sql = "SELECT * FROM danhmuc_status WHERE ma_status = '$ma_status' LIMIT 1";
    $result = mysql_query($sql);
    
    if ($result && mysql_num_rows($result) > 0) {
        return mysql_fetch_assoc($result);
    }
    return null;
}

/**
 * Thêm status mới vào danh mục
 * 
 * @param string $ma_status - Mã status (viết hoa, không dấu)
 * @param string $ten_status - Tên đầy đủ
 * @param string $mau_hienthi - Mã màu hex (mặc định: #007bff)
 * @param string $muc_do - Mức độ: normal, warning, danger, success, info
 * @param string $mo_ta - Mô tả chi tiết
 * @param int $thu_tu - Thứ tự hiển thị
 * @return bool - Thành công hay thất bại
 */
function add_status_to_danhmuc($ma_status, $ten_status, $mau_hienthi = '#007bff', $muc_do = 'normal', $mo_ta = '', $thu_tu = 0) {
    $ma_status = mysql_real_escape_string($ma_status);
    $ten_status = mysql_real_escape_string($ten_status);
    $mau_hienthi = mysql_real_escape_string($mau_hienthi);
    $muc_do = mysql_real_escape_string($muc_do);
    $mo_ta = mysql_real_escape_string($mo_ta);
    $thu_tu = intval($thu_tu);
    
    $sql = "INSERT INTO danhmuc_status (ma_status, ten_status, mau_hienthi, muc_do, mo_ta, thu_tu)
            VALUES ('$ma_status', '$ten_status', '$mau_hienthi', '$muc_do', '$mo_ta', $thu_tu)";
    
    $result = mysql_query($sql);
    return $result ? true : false;
}

/**
 * Cập nhật thông tin status trong danh mục
 * 
 * @param int $id - ID của status cần cập nhật
 * @param array $data - Mảng dữ liệu cần cập nhật
 * @return bool - Thành công hay thất bại
 */
function update_status_danhmuc($id, $data) {
    $id = intval($id);
    $set_parts = array();
    
    $allowed_fields = array('ma_status', 'ten_status', 'mau_hienthi', 'muc_do', 'mo_ta', 'thu_tu', 'kich_hoat');
    
    foreach ($data as $field => $value) {
        if (in_array($field, $allowed_fields)) {
            $value = mysql_real_escape_string($value);
            $set_parts[] = "`$field` = '$value'";
        }
    }
    
    if (empty($set_parts)) {
        return false;
    }
    
    $sql = "UPDATE danhmuc_status SET " . implode(', ', $set_parts) . " WHERE id = $id";
    $result = mysql_query($sql);
    return $result ? true : false;
}

/**
 * Xóa hoặc vô hiệu hóa status trong danh mục
 * 
 * @param int $id - ID của status
 * @param bool $soft_delete - True: vô hiệu hóa, False: xóa hẳn (mặc định: true)
 * @return bool - Thành công hay thất bại
 */
function delete_status_danhmuc($id, $soft_delete = true) {
    $id = intval($id);
    
    if ($soft_delete) {
        $sql = "UPDATE danhmuc_status SET kich_hoat = 0 WHERE id = $id";
    } else {
        $sql = "DELETE FROM danhmuc_status WHERE id = $id";
    }
    
    $result = mysql_query($sql);
    return $result ? true : false;
}

/**
 * Lấy lịch sử thay đổi status của thiết bị
 * 
 * @param int $stt_thietbi - STT của thiết bị
 * @param int $limit - Số lượng bản ghi (mặc định: 10)
 * @return resource - MySQL result
 */
function get_status_history($stt_thietbi, $limit = 10) {
    $stt_thietbi = mysql_real_escape_string($stt_thietbi);
    $limit = intval($limit);
    
    $sql = "SELECT * FROM thietbi_status_history 
            WHERE stt_thietbi = '$stt_thietbi' 
            ORDER BY ngay_thaydoi DESC 
            LIMIT $limit";
    
    return mysql_query($sql);
}

/**
 * Đếm số lượng thiết bị theo từng status
 * 
 * @return array - Mảng [status => count]
 */
function count_thietbi_by_status() {
    $sql = "SELECT status, COUNT(*) as total 
            FROM view_thietbi_full 
            GROUP BY status";
    $result = mysql_query($sql);
    
    $counts = array();
    while ($row = mysql_fetch_assoc($result)) {
        $counts[$row['status']] = $row['total'];
    }
    return $counts;
}

// ============================================
// VÍ DỤ SỬ DỤNG
// ============================================

/*
// 1. Cập nhật status cho thiết bị có stt = 1
if (update_thietbi_status(1, 'Đang hoạt động', $_SESSION['username'], 'Máy hoạt động tốt')) {
    echo "Cập nhật status thành công";
}

// 2. Lấy status của thiết bị
$status_info = get_thietbi_status(1);
if ($status_info) {
    echo "Tình trạng: " . $status_info['status'];
    echo "Cập nhật lúc: " . $status_info['ngay_capnhat'];
}

// 3. Lấy tất cả thiết bị kèm status
$result = get_thietbi_with_status();
while ($row = mysql_fetch_assoc($result)) {
    echo $row['tenvt'] . " - " . $row['status'];
}

// 4. Lấy thiết bị đang bảo dưỡng
$result = get_thietbi_by_status('Bảo dưỡng');

// 5. Thống kê số lượng theo status
$counts = count_thietbi_by_status();
foreach ($counts as $status => $total) {
    echo "$status: $total thiết bị<br>";
}
*/

?>
