<?php
ob_start();
// ==========================================
// BÁO CÁO DANH SÁCH HỒ SƠ ĐANG TẠM DỪNG
// Hiển thị các hồ sơ sửa chữa đang tạm dừng
// ==========================================

echo "<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
<style type=\"text/css\">
body {
    font-family: 'Arial', 'Times New Roman', sans-serif;
    margin: 20px;
}
.header-title {
    text-align: center;
    color: #2c3e50;
    margin-bottom: 30px;
}
.header-title h2 {
    color: #e74c3c;
    margin: 5px 0;
}
.filter-section {
    background-color: #ecf0f1;
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 5px;
}
.filter-section table {
    width: 100%;
}
.filter-section td {
    padding: 5px;
}
.filter-section input, .filter-section select {
    padding: 5px;
    border: 1px solid #bdc3c7;
    border-radius: 3px;
}
.table-container {
    overflow-x: auto;
}
.table-main {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}
.table-main th {
    background-color: #3498db;
    color: white;
    padding: 12px 8px;
    text-align: center;
    font-weight: bold;
    border: 1px solid #2980b9;
    font-size: 14px;
}
.table-main td {
    padding: 10px 8px;
    border: 1px solid #ddd;
    text-align: left;
    font-size: 13px;
}
.table-main tr:nth-child(even) {
    background-color: #f9f9f9;
}
.table-main tr:hover {
    background-color: #e8f4f8;
}
.status-warning {
    background-color: #fff3cd;
    color: #856404;
    padding: 2px 8px;
    border-radius: 3px;
    font-weight: bold;
}
.status-danger {
    background-color: #f8d7da;
    color: #721c24;
    padding: 2px 8px;
    border-radius: 3px;
    font-weight: bold;
}
.btn {
    padding: 8px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    margin: 2px;
}
.btn-primary {
    background-color: #3498db;
    color: white;
}
.btn-primary:hover {
    background-color: #2980b9;
}
.btn-success {
    background-color: #27ae60;
    color: white;
}
.btn-success:hover {
    background-color: #229954;
}
.btn-info {
    background-color: #17a2b8;
    color: white;
}
.btn-info:hover {
    background-color: #138496;
}
.btn-back {
    background-color: #95a5a6;
    color: white;
}
.btn-back:hover {
    background-color: #7f8c8d;
}
.summary-box {
    background-color: #fff3e0;
    padding: 15px;
    margin-bottom: 20px;
    border-left: 4px solid #ff9800;
    border-radius: 4px;
}
.summary-box h3 {
    margin-top: 0;
    color: #e65100;
}
.text-center {
    text-align: center;
}
.text-right {
    text-align: right;
}
.text-danger {
    color: #e74c3c;
    font-weight: bold;
}
.text-warning {
    color: #f39c12;
    font-weight: bold;
}
</style>
</head>";

// Kết nối Database
include("select_data.php");

// Lấy thông tin user
$username = isset($_POST['username']) ? $_POST['username'] : (isset($_GET['username']) ? $_GET['username'] : '');
$password = isset($_POST['password']) ? $_POST['password'] : (isset($_GET['mk']) ? $_GET['mk'] : '');
$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
$tieptuc_action = isset($_POST['tieptuc_action']) ? $_POST['tieptuc_action'] : '';
$hoso_tieptuc = isset($_POST['hoso_tieptuc']) ? $_POST['hoso_tieptuc'] : '';
$ghichu_tieptuc = isset($_POST['ghichu_tieptuc']) ? $_POST['ghichu_tieptuc'] : '';

// Xử lý tiếp tục hồ sơ
if ($tieptuc_action == 'tieptuc' && $hoso_tieptuc != '') {
    $hoso_esc = mysql_real_escape_string($hoso_tieptuc);
    $username_esc = mysql_real_escape_string($username);
    $ghichu_esc = mysql_real_escape_string($ghichu_tieptuc);
    
    // Cập nhật trạng thái tiếp tục
    $update_sql = "UPDATE hososcbd_tamdung 
                   SET ngay_tieptuc = NOW(),
                       nguoi_tieptuc = '$username_esc',
                       ghichu_tieptuc = '$ghichu_esc',
                       trangthai = 'da_tiep_tuc',
                       thoigian_tamdung_gio = TIMESTAMPDIFF(HOUR, ngay_tamdung, NOW()),
                       thoigian_tamdung_ngay = ROUND(TIMESTAMPDIFF(HOUR, ngay_tamdung, NOW()) / 24, 2)
                   WHERE hoso = '$hoso_esc' 
                     AND trangthai = 'dang_tam_dung'
                   ORDER BY ngay_tamdung DESC 
                   LIMIT 1";
    
    if (mysql_query($update_sql)) {
        echo "<script>alert('Đã tiếp tục hồ sơ $hoso_tieptuc thành công!');</script>";
    } else {
        echo "<script>alert('Lỗi khi tiếp tục hồ sơ: " . mysql_error() . "');</script>";
    }
}

// Lấy tham số lọc
$filter_nhom = isset($_POST['filter_nhom']) ? $_POST['filter_nhom'] : '';
$filter_mavt = isset($_POST['filter_mavt']) ? $_POST['filter_mavt'] : '';
$filter_maql = isset($_POST['filter_maql']) ? $_POST['filter_maql'] : '';
$filter_trangthai = isset($_POST['filter_trangthai']) ? $_POST['filter_trangthai'] : 'dang_tam_dung'; // Mặc định hiển thị đang tạm dừng

// Xác định tiêu đề báo cáo
if ($filter_trangthai == 'da_tiep_tuc') {
    $report_title = "LỊCH SỬ HỒ SƠ ĐÃ TIẾP TỤC";
    $report_subtitle = "(Các hồ sơ đã được tiếp tục sau khi tạm dừng)";
} else {
    $report_title = "DANH SÁCH HỒ SƠ ĐANG TẠM DỪNG";
    $report_subtitle = "(Các hồ sơ đang trong trạng thái tạm dừng)";
}

// Header
echo "<div class=\"header-title\">
    <h1>XN ĐỊA VẬT LÝ GK</h1>
    <h2>BÁO CÁO $report_title</h2>
    <p style=\"font-size:14px; color:#7f8c8d;\">$report_subtitle</p>
    <p>Ngày xuất báo cáo: " . date('d/m/Y H:i:s') . "</p>
</div>";

// Form lọc
echo "<form method=\"post\" action=\"baocao_tamdung.php\">
<input type=\"hidden\" name=\"username\" value=\"$username\">
<input type=\"hidden\" name=\"password\" value=\"$password\">
<div class=\"filter-section\">
    <h3 style=\"margin-top:0;\">Bộ lọc</h3>
    <table>
        <tr>
            <td colspan=\"4\" style=\"background-color:#fff; padding:10px; border-radius:3px; margin-bottom:10px;\">
                <strong>Trạng thái hồ sơ:</strong> &nbsp;&nbsp;
                <label style=\"margin-right:20px; cursor:pointer;\">
                    <input type=\"radio\" name=\"filter_trangthai\" value=\"dang_tam_dung\" " . ($filter_trangthai == 'dang_tam_dung' ? 'checked' : '') . " onchange=\"this.form.submit()\">
                    <span style=\"color:#e74c3c; font-weight:bold;\">⚠️ Đang tạm dừng</span>
                </label>
                <label style=\"cursor:pointer;\">
                    <input type=\"radio\" name=\"filter_trangthai\" value=\"da_tiep_tuc\" " . ($filter_trangthai == 'da_tiep_tuc' ? 'checked' : '') . " onchange=\"this.form.submit()\">
                    <span style=\"color:#27ae60; font-weight:bold;\">✅ Lịch sử (đã tiếp tục)</span>
                </label>
            </td>
        </tr>
        <tr>
            <td style=\"width:150px;\"><strong>Nhóm sửa chữa:</strong></td>
            <td>
                <select name=\"filter_nhom\" style=\"width:200px;\">
                    <option value=\"\">-- Tất cả --</option>
                    <option value=\"RDNGA\" " . ($filter_nhom == 'RDNGA' ? 'selected' : '') . ">Nhóm RDNGA</option>
                    <option value=\"CNC\" " . ($filter_nhom == 'CNC' ? 'selected' : '') . ">Nhóm CNC</option>
                </select>
            </td>
            <td style=\"width:150px;\"><strong>Mã thiết bị:</strong></td>
            <td>
                <input type=\"text\" name=\"filter_mavt\" value=\"$filter_mavt\" placeholder=\"Nhập mã thiết bị\" style=\"width:200px;\">
            </td>
        </tr>
        <tr>
            <td><strong>Mã quản lý:</strong></td>
            <td>
                <input type=\"text\" name=\"filter_maql\" value=\"$filter_maql\" placeholder=\"Nhập mã quản lý\" style=\"width:200px;\">
            </td>
            <td colspan=\"2\">
                <button type=\"submit\" name=\"submit\" value=\"filter\" class=\"btn btn-primary\">🔍 Lọc dữ liệu</button>
                <a href=\"baocao_tamdung.php?username=$username&mk=$password\" class=\"btn btn-info\">🔄 Xóa bộ lọc</a>
            </td>
        </tr>
    </table>
</div>
</form>";

// Tạo điều kiện WHERE cho query
$where_conditions = array("td.trangthai = '" . mysql_real_escape_string($filter_trangthai) . "'");

if ($filter_nhom != '') {
    $filter_nhom_esc = mysql_real_escape_string($filter_nhom);
    $where_conditions[] = "hs.nhomsc = '$filter_nhom_esc'";
}

if ($filter_mavt != '') {
    $filter_mavt_esc = mysql_real_escape_string($filter_mavt);
    $where_conditions[] = "(td.mavt LIKE '%$filter_mavt_esc%' OR tb.mamay LIKE '%$filter_mavt_esc%')";
}

if ($filter_maql != '') {
    $filter_maql_esc = mysql_real_escape_string($filter_maql);
    $where_conditions[] = "td.maql LIKE '%$filter_maql_esc%'";
}

$where_clause = implode(' AND ', $where_conditions);

// Query lấy dữ liệu hồ sơ theo trạng thái
$query = "SELECT 
    td.id,
    td.hoso,
    td.mavt,
    td.somay,
    td.model,
    td.maql,
    tb.mamay,
    tb.tenvt,
    tb.madv,
    td.ngay_tamdung,
    td.nguoi_tamdung,
    td.lydo_tamdung,
    td.ngay_tieptuc,
    td.nguoi_tieptuc,
    td.ghichu_tieptuc,
    td.thoigian_tamdung_gio,
    td.thoigian_tamdung_ngay,";

// Nếu đang tạm dừng, tính thời gian real-time, còn nếu đã tiếp tục thì lấy từ DB
if ($filter_trangthai == 'dang_tam_dung') {
    $query .= "
    TIMESTAMPDIFF(HOUR, td.ngay_tamdung, NOW()) as thoigian_gio,
    ROUND(TIMESTAMPDIFF(HOUR, td.ngay_tamdung, NOW()) / 24, 2) as thoigian_ngay,";
} else {
    $query .= "
    td.thoigian_tamdung_gio as thoigian_gio,
    td.thoigian_tamdung_ngay as thoigian_ngay,";
}

$query .= "
    hs.cv as cong_viec,
    hs.ngayth as ngay_batdau,
    hs.ngaykt as ngay_ketthuc,
    hs.nhomsc as nhom_suachua
FROM hososcbd_tamdung td
LEFT JOIN thietbi_iso tb ON td.mavt = tb.mavt AND td.somay = tb.somay AND COALESCE(td.model, '') = COALESCE(tb.model, '')
LEFT JOIN hososcbd_iso hs ON td.hoso = hs.hoso
WHERE $where_clause
ORDER BY td.ngay_tamdung DESC";

$result = mysql_query($query);
$total_rows = mysql_num_rows($result);

// Hiển thị thống kê
if ($filter_trangthai == 'dang_tam_dung') {
    echo "<div class=\"summary-box\">
        <h3>📊 THỐNG KÊ TỔNG QUAN</h3>
        <p><strong>Tổng số hồ sơ đang tạm dừng:</strong> <span class=\"text-danger\">$total_rows</span> hồ sơ</p>
    </div>";
} else {
    echo "<div class=\"summary-box\">
        <h3>📊 THỐNG KÊ TỔNG QUAN</h3>
        <p><strong>Tổng số hồ sơ đã tiếp tục:</strong> <span class=\"text-warning\">$total_rows</span> hồ sơ</p>
    </div>";
}

if ($total_rows > 0) {
    echo "<div class=\"table-container\">
    <table class=\"table-main\">
        <thead>
            <tr>
                <th style=\"width:40px;\">STT</th>
                <th style=\"width:100px;\">Số hồ sơ</th>
                <th style=\"width:120px;\">Mã quản lý</th>
                <th style=\"width:100px;\">Mã máy</th>
                <th style=\"width:150px;\">Tên thiết bị</th>
                <th style=\"width:80px;\">Số máy</th>
                <th style=\"width:80px;\">Nhóm SC</th>
                <th style=\"width:120px;\">Ngày tạm dừng</th>
                <th style=\"width:100px;\">Người tạm dừng</th>
                <th style=\"width:200px;\">Lý do tạm dừng</th>";
    
    // Thêm cột cho lịch sử (đã tiếp tục)
    if ($filter_trangthai == 'da_tiep_tuc') {
        echo "
                <th style=\"width:120px;\">Ngày tiếp tục</th>
                <th style=\"width:100px;\">Người tiếp tục</th>
                <th style=\"width:200px;\">Ghi chú tiếp tục</th>";
    }
    
    echo "
                <th style=\"width:100px;\">Thời gian<br/>tạm dừng</th>
                <th style=\"width:80px;\">Trạng thái</th>
                <th style=\"width:120px;\">Thao tác</th>
            </tr>
        </thead>
        <tbody>";
    
    $stt = 1;
    mysql_data_seek($result, 0); // Reset pointer
    
    while ($row = mysql_fetch_array($result)) {
        $hoso = $row['hoso'];
        $maql = $row['maql'];
        $mavt = $row['mavt'];
        $mamay = $row['mamay'] ? $row['mamay'] : $mavt;
        $tenvt = $row['tenvt'];
        $somay = $row['somay'];
        $nhom_suachua = $row['nhom_suachua'];
        $ngay_tamdung = date('d/m/Y H:i', strtotime($row['ngay_tamdung']));
        $nguoi_tamdung = $row['nguoi_tamdung'];
        $lydo_tamdung = $row['lydo_tamdung'];
        $thoigian_gio = $row['thoigian_gio'];
        $thoigian_ngay = $row['thoigian_ngay'];
        
        // Thông tin tiếp tục (nếu có)
        $ngay_tieptuc = $row['ngay_tieptuc'] ? date('d/m/Y H:i', strtotime($row['ngay_tieptuc'])) : '';
        $nguoi_tieptuc = $row['nguoi_tieptuc'];
        $ghichu_tieptuc = $row['ghichu_tieptuc'];
        
        // Định dạng thời gian tạm dừng
        if ($thoigian_ngay >= 1) {
            $thoigian_display = "<span class=\"text-danger\">" . number_format($thoigian_ngay, 1) . " ngày</span>";
            $status_class = "status-danger";
            $status_text = "TẠM DỪNG";
        } else {
            $thoigian_display = "<span class=\"text-warning\">$thoigian_gio giờ</span>";
            $status_class = "status-warning";
            $status_text = "TẠM DỪNG";
        }
        
        // Trạng thái cho lịch sử
        if ($filter_trangthai == 'da_tiep_tuc') {
            $status_class = "status-warning";
            $status_text = "ĐÃ TIẾP TỤC";
            // Với lịch sử, hiển thị thời gian tạm dừng đã lưu
            $thoigian_display = number_format($thoigian_ngay, 1) . " ngày<br/>($thoigian_gio giờ)";
        }
        
        echo "<tr>
            <td class=\"text-center\">$stt</td>
            <td class=\"text-center\"><strong>$hoso</strong></td>
            <td class=\"text-center\">$maql</td>
            <td class=\"text-center\">$mamay</td>
            <td>$tenvt</td>
            <td class=\"text-center\">$somay</td>
            <td class=\"text-center\">$nhom_suachua</td>
            <td class=\"text-center\">$ngay_tamdung</td>
            <td>$nguoi_tamdung</td>
            <td>$lydo_tamdung</td>";
        
        // Hiển thị thông tin tiếp tục (chỉ cho lịch sử)
        if ($filter_trangthai == 'da_tiep_tuc') {
            echo "
            <td class=\"text-center\">$ngay_tieptuc</td>
            <td>$nguoi_tieptuc</td>
            <td>$ghichu_tieptuc</td>";
        }
        
        echo "
            <td class=\"text-center\">$thoigian_display</td>
            <td class=\"text-center\"><span class=\"$status_class\">$status_text</span></td>";
        
        // Hiển thị thao tác (chỉ cho đang tạm dừng)
        if ($filter_trangthai == 'dang_tam_dung') {
            echo "
            <td class=\"text-center\">
                <a href=\"formsc.php?edithoso=$hoso&username=$username&mk=$password\" class=\"btn btn-info\" title=\"Xem/Sửa hồ sơ\">📝 Sửa</a>
                <form method=\"post\" action=\"baocao_tamdung.php\" style=\"display:inline;\" onsubmit=\"return confirm('Bạn có chắc muốn tiếp tục hồ sơ này không?');\">
                    <input type=\"hidden\" name=\"username\" value=\"$username\">
                    <input type=\"hidden\" name=\"password\" value=\"$password\">
                    <input type=\"hidden\" name=\"hoso_tieptuc\" value=\"$hoso\">
                    <input type=\"hidden\" name=\"tieptuc_action\" value=\"tieptuc\">
                    <input type=\"hidden\" name=\"ghichu_tieptuc\" value=\"Tiếp tục từ báo cáo\">
                    <input type=\"hidden\" name=\"filter_trangthai\" value=\"$filter_trangthai\">
                    <input type=\"hidden\" name=\"filter_nhom\" value=\"$filter_nhom\">
                    <input type=\"hidden\" name=\"filter_mavt\" value=\"$filter_mavt\">
                    <input type=\"hidden\" name=\"filter_maql\" value=\"$filter_maql\">
                    <button type=\"submit\" class=\"btn btn-success\" title=\"Tiếp tục hồ sơ\">▶ Tiếp tục</button>
                </form>
            </td>";
        } else {
            // Cho lịch sử, chỉ hiển thị nút xem
            echo "
            <td class=\"text-center\">
                <a href=\"formsc.php?edithoso=$hoso&username=$username&mk=$password\" class=\"btn btn-info\" title=\"Xem hồ sơ\">👁 Xem</a>
            </td>";
        }
        
        echo "</tr>";
        
        $stt++;
    }
    
    echo "</tbody>
    </table>
    </div>";
} else {
    if ($filter_trangthai == 'dang_tam_dung') {
        echo "<div style=\"text-align:center; padding:40px; background-color:#d4edda; color:#155724; border-radius:5px;\">
            <h3>✅ KHÔNG CÓ HỒ SƠ NÀO ĐANG TẠM DỪNG</h3>
            <p>Tất cả các hồ sơ sửa chữa đang được thực hiện bình thường.</p>
        </div>";
    } else {
        echo "<div style=\"text-align:center; padding:40px; background-color:#fff3cd; color:#856404; border-radius:5px;\">
            <h3>📝 CHƯA CÓ LỊCH SỬ TẠM DỪNG/TIẾP TỤC</h3>
            <p>Chưa có hồ sơ nào được tạm dừng và tiếp tục.</p>
        </div>";
    }
}

// Nút quay lại
echo "<br/><br/>
<form action=\"index.php\" method=\"post\">
    <input type=\"hidden\" name=\"username\" value=\"$username\">
    <input type=\"hidden\" name=\"password\" value=\"$password\">
    <button type=\"submit\" class=\"btn btn-back\">⬅ Quay lại trang chủ</button>
</form>";

ob_end_flush();
?>
