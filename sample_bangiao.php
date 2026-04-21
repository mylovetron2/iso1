<?php
/**
 * =====================================================
 * SAMPLE CODE: XU?T BIÊN B?N BÀN GIAO THI?T B?
 * =====================================================
 * File này là m?u minh h?a ?? implement l?i logic bàn giao
 * ? project khác, s? d?ng MySQLi ho?c PDO
 * =====================================================
 */

// ----------------------------------------------------
// 1. KẾT NỐI DATABASE
// ----------------------------------------------------

// S? d?ng MySQLi
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'iso_database';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");

// HO?C s? d?ng PDO (recommended)
/*
try {
    $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
*/

// ----------------------------------------------------
// 2. START SESSION VÀ AUTHENTICATION
// ----------------------------------------------------

session_start();

// Ki?m tra ?ã ??ng nh?p
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$current_username = $_SESSION['username'];
$is_admin = $_SESSION['phanquyen'] ?? 0;
$user_nhom = $_SESSION['nhom'] ?? '';

// ----------------------------------------------------
// 3. NH?N INPUT T? FORM
// ----------------------------------------------------

$action = $_POST['action'] ?? $_GET['action'] ?? '';
$username = $_POST['username'] ?? $current_username;
$password = $_POST['mk'] ?? '';

// ----------------------------------------------------
// BƯ?C 1: HI?N TH? FORM CH?N THI?T B? BÀN GIAO
// ----------------------------------------------------

if ($action == 'hien_thi_form_bangiao') {
    
    // Lấy số phiếu mới nhất
    $sql_max_phieu = "SELECT MAX(CAST(phieu AS UNSIGNED)) as max_phieu 
                      FROM hososcbd_iso";
    if ($is_admin != 1) {
        $sql_max_phieu .= " WHERE nhomsc = ?";
    }
    
    if ($is_admin != 1) {
        $stmt = $conn->prepare($sql_max_phieu);
        $stmt->bind_param("s", $user_nhom);
        $stmt->execute();
        $result = $stmt->get_result();
    } else {
        $result = $conn->query($sql_max_phieu);
    }
    
    $row = $result->fetch_assoc();
    $max_phieu = $row['max_phieu'] ?? 0;
    
    // Format số phiếu
    if ($max_phieu <= 9) {
        $phieu_hientai = str_pad($max_phieu, 4, '0', STR_PAD_LEFT);
    } elseif ($max_phieu <= 99) {
        $phieu_hientai = str_pad($max_phieu, 4, '0', STR_PAD_LEFT);
    } elseif ($max_phieu <= 999) {
        $phieu_hientai = str_pad($max_phieu, 4, '0', STR_PAD_LEFT);
    } else {
        $phieu_hientai = $max_phieu;
    }
    
    if ($max_phieu == 0) {
        echo "<center><p style='color:red;font-size:18px'>Không có hồ sơ</p></center>";
        exit;
    }
    
    // Lấy thông tin hồ sơ
    $sql_info = "SELECT * FROM hososcbd_iso WHERE phieu = ? LIMIT 1";
    $stmt = $conn->prepare($sql_info);
    $stmt->bind_param("s", $phieu_hientai);
    $stmt->execute();
    $info_result = $stmt->get_result();
    $info = $info_result->fetch_assoc();
    
    $maquanly = $info['maql'] ?? '';
    $ngay_yc = $info['ngayyc'] ?? '';
    $don_vi = $info['madv'] ?? '';
    $nguoi_yc = $info['ngyeucau'] ?? '';
    $nguoi_nhan_yc = $info['ngnhyeucau'] ?? '';
    
    $today = date("d/m/Y");
    
    // Lấy danh sách thiết bị
    $sql_devices = "SELECT h.*, t.tenvt 
                    FROM hososcbd_iso h
                    LEFT JOIN thietbi_iso t ON h.mavt = t.mavt 
                                            AND h.somay = t.somay 
                                            AND h.model = t.model
                    WHERE h.phieu = ?";
    $stmt_devices = $conn->prepare($sql_devices);
    $stmt_devices->bind_param("s", $phieu_hientai);
    $stmt_devices->execute();
    $devices_result = $stmt_devices->get_result();
    
    $co_thietbi_cho_bangiao = false;
    
    ?>
    <!DOCTYPE html>
    <html lang="vi">
    <head>
        <meta charset="UTF-8">
        <title>Biên bản bàn giao thiết bị</title>
        <style>
            .table1 {
                border-collapse: collapse;
                width: 100%;
            }
            .table1 th, .table1 td {
                border: 1px solid #000;
                padding: 8px;
                text-align: center;
            }
            .disabled-checkbox {
                cursor: not-allowed;
                opacity: 0.5;
            }
        </style>
    </head>
    <body>
        <h2 style="text-align:center; color:blue;">BIÊN BẢN BÀN GIAO THIẾT BỊ</h2>
        
        <form method="post" action="">
            <input type="hidden" name="action" value="xuat_bienban">
            <input type="hidden" name="username" value="<?= htmlspecialchars($username) ?>">
            
            <table style="margin-left:50px;">
                <tr>
                    <td>Mã quản lý:</td>
                    <td><input type="text" name="maquanly" value="<?= htmlspecialchars($maquanly) ?>" readonly></td>
                </tr>
                <tr>
                    <td>Số hồ sơ:</td>
                    <td><input type="text" name="sohoso" value="<?= htmlspecialchars($phieu_hientai) ?>"></td>
                </tr>
                <tr>
                    <td>Ngày:</td>
                    <td><input type="text" name="ngay" value="<?= $today ?>"></td>
                </tr>
                <tr>
                    <td>Đơn vị:</td>
                    <td><input type="text" name="donvi" value="<?= htmlspecialchars($don_vi) ?>" readonly></td>
                </tr>
                <tr>
                    <td>Bên nhận:</td>
                    <td><input type="text" name="khachhang" value=""></td>
                </tr>
                <tr>
                    <td>Bên giao:</td>
                    <td><input type="text" name="nhanvien" value="<?= htmlspecialchars($nguoi_nhan_yc) ?>"></td>
                </tr>
            </table>
            
            <br>
            
            <table class="table1" style="margin-left:50px; width:800px;">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên thiết bị</th>
                        <th>Số máy</th>
                        <th>Tình trạng kỹ thuật</th>
                        <th>BG</th>
                        <th>Ghi chú</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i = 1;
                    while ($device = $devices_result->fetch_assoc()) {
                        $hoso = $device['hoso'];
                        $mavt = $device['mavt'];
                        $model = $device['model'];
                        $somay = $device['somay'];
                        $tenvt = $device['tenvt'];
                        $ngaykt = $device['ngaykt'];
                        $bg = $device['bg'];
                        $ttktafter = $device['ttktafter'];
                        
                        $mamay = empty($model) ? $mavt : "$mavt-$model";
                        
                        // XÁC ĐỊNH TRẠNG THÁI VÀ CHECKBOX
                        $checked = '';
                        $disabled = '';
                        $ghichu = '';
                        $link_color = 'blue';
                        
                        if ($ngaykt == '0000-00-00') {
                            // Chưa có ngày kết thúc
                            $disabled = 'disabled';
                            $ghichu = 'Hồ sơ chưa có ngày kết thúc';
                        } else {
                            // Đã có ngày kết thúc
                            $link_color = 'red';
                            
                            if ($bg == 1) {
                                // Đã bàn giao
                                $checked = 'checked';
                                $ghichu = 'Máy đã bàn giao';
                                
                                if ($is_admin != 1) {
                                    $disabled = 'disabled';
                                }
                            } else {
                                // Chưa bàn giao
                                $ghichu = 'Máy đã làm xong đang chờ bàn giao';
                                $co_thietbi_cho_bangiao = true;
                            }
                        }
                        
                        $checkbox_class = $disabled ? 'disabled-checkbox' : '';
                        
                        echo "<tr>";
                        echo "<td>$i</td>";
                        echo "<td><span style='color:$link_color;'>$mamay - $tenvt</span></td>";
                        echo "<td>$somay</td>";
                        echo "<td>$ttktafter</td>";
                        echo "<td><input type='checkbox' name='bg$i' value='$hoso' $checked $disabled class='$checkbox_class'></td>";
                        echo "<td style='color:red;'>$ghichu</td>";
                        echo "</tr>";
                        
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
            
            <br>
            
            <?php if ($co_thietbi_cho_bangiao): ?>
                <div style="text-align:center;">
                    <button type="submit" name="submit_xuat" style="padding:10px 20px; font-size:16px;">
                        Xuất biên bản bàn giao
                    </button>
                </div>
            <?php else: ?>
                <div style="text-align:center;">
                    <button type="submit" name="submit_in_lai" formaction="?action=in_lai_bienban" 
                            style="padding:10px 20px; font-size:16px;">
                        In lại biên bản
                    </button>
                </div>
            <?php endif; ?>
        </form>
    </body>
    </html>
    <?php
    
    exit;
}

// ----------------------------------------------------
// BƯ?C 2: X? LÝ XU?T BIÊN B?N
// ----------------------------------------------------

if ($action == 'xuat_bienban' && isset($_POST['submit_xuat'])) {
    
    // Nhận dữ liệu
    $maquanly = $_POST['maquanly'];
    $sohoso = $_POST['sohoso'];
    $ngay = $_POST['ngay'];
    $khachhang = $_POST['khachhang'];
    $nhanvien = $_POST['nhanvien'];
    $donvi = $_POST['donvi'];
    
    // Lấy số lượng thiết bị
    $sql_count = "SELECT COUNT(*) as number FROM hososcbd_iso WHERE maql = ?";
    $stmt = $conn->prepare($sql_count);
    $stmt->bind_param("s", $maquanly);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $number = $row['number'];
    
    // Kiểm tra checkbox
    $danh_sach_bangiao = [];
    $co_chon = false;
    
    for ($i = 1; $i <= $number; $i++) {
        if (isset($_POST["bg$i"]) && !empty($_POST["bg$i"])) {
            $danh_sach_bangiao[] = $_POST["bg$i"];
            $co_chon = true;
        }
    }
    
    if (!$co_chon) {
        echo "<script>alert('CHƯA CHỌN THIẾT BỊ ĐỂ BÀN GIAO'); history.back();</script>";
        exit;
    }
    
    // BẮT ĐẦU TRANSACTION
    $conn->begin_transaction();
    
    try {
        // 1. Tăng slbg
        $sql_get_slbg = "SELECT slbg FROM hososcbd_iso WHERE maql = ? LIMIT 1";
        $stmt = $conn->prepare($sql_get_slbg);
        $stmt->bind_param("s", $maquanly);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $slbg = $row['slbg'] ?? 0;
        $slbg++;
        
        $sql_update_slbg = "UPDATE hososcbd_iso SET slbg = ? WHERE maql = ?";
        $stmt = $conn->prepare($sql_update_slbg);
        $stmt->bind_param("is", $slbg, $maquanly);
        $stmt->execute();
        
        // 2. Cập nhật bg = 1 cho thiết bị được chọn
        $placeholders = implode(',', array_fill(0, count($danh_sach_bangiao), '?'));
        $sql_update_bg = "UPDATE hososcbd_iso SET bg = 1 WHERE hoso IN ($placeholders)";
        $stmt = $conn->prepare($sql_update_bg);
        $stmt->bind_param(str_repeat('s', count($danh_sach_bangiao)), ...$danh_sach_bangiao);
        $stmt->execute();
        
        // 3. Ghi log
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $curdate = date("Y-m-d H:i:s");
        
        $sql_get_user = "SELECT madv, nhom FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql_get_user);
        $stmt->bind_param("s", $current_username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user_info = $result->fetch_assoc();
        $madv = $user_info['madv'] ?? '';
        $nhom_user = $user_info['nhom'] ?? '';
        
        $sql_log = "INSERT INTO lichsudn_iso 
                    (username, madv, nhom, curdate, ip_address, maql, action) 
                    VALUES (?, ?, ?, ?, ?, ?, 'BANG_GIAO')";
        $stmt = $conn->prepare($sql_log);
        $stmt->bind_param("ssssss", $current_username, $madv, $nhom_user, $curdate, $ip_address, $maquanly);
        $stmt->execute();
        
        // COMMIT
        $conn->commit();
        
        // 4. Chuyển sang trang in biên bản
        header("Location: ?action=in_bienban&maquanly=$maquanly&sohoso=$sohoso&slbg=$slbg&ngay=$ngay&khachhang=$khachhang&nhanvien=$nhanvien&donvi=$donvi");
        exit;
        
    } catch (Exception $e) {
        $conn->rollback();
        echo "<script>alert('Lỗi: " . $e->getMessage() . "'); history.back();</script>";
        exit;
    }
}

// ----------------------------------------------------
// BƯ?C 3: IN BIÊN B?N
// ----------------------------------------------------

if ($action == 'in_bienban') {
    
    $maquanly = $_GET['maquanly'];
    $sohoso = $_GET['sohoso'];
    $slbg = $_GET['slbg'];
    $ngay = $_GET['ngay'];
    $khachhang = $_GET['khachhang'];
    $nhanvien = $_GET['nhanvien'];
    $donvi = $_GET['donvi'];
    
    // Tách ngày
    list($ngays, $thangs, $nams) = explode('/', $ngay);
    
    // Lấy danh sách thiết bị đã bàn giao
    $sql_devices = "SELECT h.*, t.tenvt 
                    FROM hososcbd_iso h
                    LEFT JOIN thietbi_iso t ON h.mavt = t.mavt 
                                            AND h.somay = t.somay 
                                            AND h.model = t.model
                    WHERE h.maql = ? AND h.bg = 1";
    $stmt = $conn->prepare($sql_devices);
    $stmt->bind_param("s", $maquanly);
    $stmt->execute();
    $devices_result = $stmt->get_result();
    
    ?>
    <!DOCTYPE html>
    <html lang="vi">
    <head>
        <meta charset="UTF-8">
        <title>Biên bản bàn giao - <?= $sohoso ?>-<?= $slbg ?></title>
        <style>
            body { font-family: "Times New Roman", serif; }
            .table6 {
                border-collapse: collapse;
                width: 100%;
                margin: 20px auto;
            }
            .table6 th, .table6 td {
                border: 1px solid #000;
                padding: 8px;
            }
            @media print {
                .no-print { display: none; }
            }
        </style>
    </head>
    <body>
        <table style="width:100%;">
            <tr>
                <td style="padding-left:80px; font-size:16px;">
                    XN Địa Vật Lý GK<br>
                    <strong>Xưởng SCTB ĐVL</strong>
                </td>
                <td style="text-align:center;">
                    <strong>BIÊN BẢN BÀN GIAO THIẾT BỊ</strong><br>
                    Số hồ sơ: <strong><?= $sohoso ?>-<?= $slbg ?></strong> &nbsp;&nbsp;&nbsp; Ngày: <?= $ngay ?>
                </td>
            </tr>
        </table>
        
        <br>
        
        <table style="width:100%; font-size:16px;">
            <tr>
                <td style="width:60%; padding-left:80px;">
                    1. Đại diện bên giao: &nbsp;&nbsp; <strong><?= htmlspecialchars($nhanvien) ?></strong>
                </td>
                <td style="width:40%;">
                    Đơn vị: &nbsp;&nbsp; <strong>Xưởng SCTB ĐVL</strong>
                </td>
            </tr>
            <tr>
                <td style="padding-left:80px;">
                    2. Đại diện bên nhận: &nbsp;&nbsp; <strong><?= htmlspecialchars($khachhang) ?></strong>
                </td>
                <td>
                    Đơn vị: &nbsp;&nbsp; <strong><?= htmlspecialchars($donvi) ?></strong>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding-left:80px;">
                    3. Sau khi kiểm tra đã cùng nhau giao nhận các thiết bị sau:
                </td>
            </tr>
        </table>
        
        <br>
        
        <table class="table6" style="width:90%; margin-left:80px;">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên thiết bị</th>
                    <th>Số</th>
                    <th>Tình trạng kỹ thuật của thiết bị</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $k = 1;
                while ($device = $devices_result->fetch_assoc()) {
                    $mavt = $device['mavt'];
                    $model = $device['model'];
                    $somay = $device['somay'];
                    $ttktafter = $device['ttktafter'];
                    
                    $modelmay = empty($model) ? $mavt : "$mavt-$model";
                    
                    echo "<tr>";
                    echo "<td style='text-align:center;'>$k</td>";
                    echo "<td style='padding-left:10px;'>$modelmay</td>";
                    echo "<td style='text-align:center;'>$somay</td>";
                    echo "<td style='text-align:center;'>$ttktafter</td>";
                    echo "</tr>";
                    
                    $k++;
                }
                ?>
            </tbody>
        </table>
        
        <br><br>
        
        <table style="width:90%; margin-left:80px; font-size:16px;">
            <tr>
                <td style="width:50%; text-align:center;">
                    <strong>Bên giao</strong><br>
                    (Ký, ghi rõ họ tên)
                </td>
                <td style="width:50%; text-align:center;">
                    <strong>Bên nhận</strong><br>
                    (Ký, ghi rõ họ tên)
                </td>
            </tr>
        </table>
        
        <br><br>
        
        <div class="no-print" style="text-align:center;">
            <button onclick="window.print()" style="padding:10px 20px; font-size:16px;">
                In biên bản
            </button>
            <button onclick="window.location.href='?action=hien_thi_form_bangiao'" 
                    style="padding:10px 20px; font-size:16px; margin-left:10px;">
                Quay lại
            </button>
        </div>
    </body>
    </html>
    <?php
    
    exit;
}

// ----------------------------------------------------
// ĐÓNG KẾT NỐI
// ----------------------------------------------------

$conn->close();

?>
