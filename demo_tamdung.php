<?php
/**
 * FILE DEMO - CHỨC NĂNG TẠM DỪNG/TIẾP TỤC
 * 
 * File này là ví dụ đơn giản, đầy đủ để test chức năng tạm dừng
 * Có thể chạy standalone để kiểm tra trước khi tích hợp vào project chính
 * 
 * Yêu cầu:
 * - Database MySQL đã có bảng hososcbd_tamdung
 * - Session đã được start
 */

session_start();

// ============================================
// 1. CẤU HÌNH DATABASE (SỬA PHẦN NÀY)
// ============================================
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "your_database";

// Kết nối database
$conn = mysql_connect($db_host, $db_user, $db_pass);
mysql_select_db($db_name, $conn);

// Set username mẫu (thực tế lấy từ session)
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = 'demo_user';
}
$username = $_SESSION['username'];

// ============================================
// 2. XỬ LÝ BACKEND (SUBMIT FORM)
// ============================================
$action_tamdung = isset($_POST['action_tamdung']) ? $_POST['action_tamdung'] : '';
$message = '';

if ($action_tamdung == 'tamdung') {
    $lydo_tamdung = isset($_POST['lydo_tamdung']) ? trim($_POST['lydo_tamdung']) : '';
    $hosomay = isset($_POST['hosomay']) ? $_POST['hosomay'] : '';
    
    if (empty($lydo_tamdung)) {
        $message = "<div style='color:red; padding:10px; background:#ffebee;'>❌ Lỗi: Lý do tạm dừng không được để trống!</div>";
    } elseif (empty($hosomay)) {
        $message = "<div style='color:red; padding:10px; background:#ffebee;'>❌ Lỗi: Mã hồ sơ không hợp lệ!</div>";
    } else {
        $nguoi_thuchien = $username;
        $ngay_thuchien = date('Y-m-d H:i:s');
        
        $insert_sql = "INSERT INTO hososcbd_tamdung (hoso, trangthai, nguoi_thuchien, ngay_thuchien, lydo_tamdung) 
                       VALUES ('$hosomay', 'tamdung', '$nguoi_thuchien', '$ngay_thuchien', '$lydo_tamdung')";
        
        if (mysql_query($insert_sql)) {
            $message = "<div style='color:green; padding:10px; background:#e8f5e9;'>✅ Đã tạm dừng hồ sơ <strong>$hosomay</strong> thành công!</div>";
        } else {
            $message = "<div style='color:red; padding:10px; background:#ffebee;'>❌ Lỗi database: " . mysql_error() . "</div>";
        }
    }
}

if ($action_tamdung == 'tieptuc') {
    $ghichu_tieptuc = isset($_POST['ghichu_tieptuc']) ? trim($_POST['ghichu_tieptuc']) : '';
    $hosomay = isset($_POST['hosomay']) ? $_POST['hosomay'] : '';
    
    $nguoi_thuchien = $username;
    $ngay_thuchien = date('Y-m-d H:i:s');
    
    $insert_sql = "INSERT INTO hososcbd_tamdung (hoso, trangthai, nguoi_thuchien, ngay_thuchien, ghichu_tieptuc) 
                   VALUES ('$hosomay', 'tieptuc', '$nguoi_thuchien', '$ngay_thuchien', '$ghichu_tieptuc')";
    
    if (mysql_query($insert_sql)) {
        $message = "<div style='color:green; padding:10px; background:#e8f5e9;'>✅ Đã tiếp tục hồ sơ <strong>$hosomay</strong> thành công!</div>";
    } else {
        $message = "<div style='color:red; padding:10px; background:#ffebee;'>❌ Lỗi database: " . mysql_error() . "</div>";
    }
}

// ============================================
// 3. KIỂM TRA TRẠNG THÁI HỒ SƠ MẪU
// ============================================
$test_hoso = isset($_GET['hoso']) ? $_GET['hoso'] : 'HS_DEMO_001';

$check_tamdung_sql = mysql_query("SELECT * FROM hososcbd_tamdung WHERE hoso='$test_hoso' ORDER BY ngay_thuchien DESC LIMIT 1");
$is_tamdung = false;
$tamdung_info = null;

if ($check_tamdung_sql && mysql_num_rows($check_tamdung_sql) > 0) {
    $last_record = mysql_fetch_array($check_tamdung_sql);
    if ($last_record['trangthai'] == 'tamdung') {
        $is_tamdung = true;
        $tamdung_info = $last_record;
    }
}

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo - Tạm Dừng/Tiếp Tục Hồ Sơ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #1976d2;
            border-bottom: 3px solid #1976d2;
            padding-bottom: 10px;
        }
        .info-box {
            background: #e3f2fd;
            padding: 15px;
            border-left: 4px solid #2196f3;
            margin: 20px 0;
        }
        .alert-tamdung {
            background-color: #fff3cd;
            border: 2px solid #ffc107;
            border-left: 5px solid #ff9800;
            padding: 15px 20px;
            margin: 20px 0;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .alert-tamdung h3 {
            color: #856404;
            margin-top: 0;
        }
        .alert-tamdung p {
            color: #856404;
            margin: 8px 0;
        }
        .form-section {
            margin: 30px 0;
            padding: 20px;
            background: #f5f5f5;
            border-radius: 5px;
        }
        .toggle-btn {
            background-color: #dc3545;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            margin: 10px 0;
        }
        .toggle-btn:hover {
            background-color: #c82333;
        }
        .btn-tamdung {
            background-color: #ff9800;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 15px;
            font-weight: bold;
            margin-top: 10px;
        }
        .btn-tamdung:hover {
            background-color: #f57c00;
        }
        .btn-tieptuc {
            background-color: #4caf50;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 15px;
            font-weight: bold;
            margin-top: 10px;
        }
        .btn-tieptuc:hover {
            background-color: #45a049;
        }
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin-top: 5px;
        }
        label {
            font-weight: bold;
            color: #333;
        }
        .required {
            color: red;
        }
        .history-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .history-table th {
            background: #1976d2;
            color: white;
            padding: 10px;
            text-align: left;
        }
        .history-table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .history-table tr:hover {
            background: #f5f5f5;
        }
        .status-tamdung {
            color: #ff9800;
            font-weight: bold;
        }
        .status-tieptuc {
            color: #4caf50;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔧 DEMO - Chức Năng Tạm Dừng/Tiếp Tục Hồ Sơ</h1>
        
        <div class="info-box">
            <strong>📌 Hồ sơ demo:</strong> <?php echo $test_hoso; ?><br>
            <strong>👤 User:</strong> <?php echo $username; ?><br>
            <strong>🕐 Thời gian:</strong> <?php echo date('d/m/Y H:i:s'); ?>
        </div>

        <?php if ($message): ?>
            <?php echo $message; ?>
        <?php endif; ?>

        <!-- CẢNH BÁO NẾU ĐANG TẠM DỪNG -->
        <?php if ($is_tamdung && $tamdung_info): ?>
            <?php
            $ngay_tamdung = date('d/m/Y H:i', strtotime($tamdung_info['ngay_thuchien']));
            $nguoi_tamdung = $tamdung_info['nguoi_thuchien'];
            $lydo_tamdung = $tamdung_info['lydo_tamdung'];
            
            $now = new DateTime();
            $tamdung_time = new DateTime($tamdung_info['ngay_thuchien']);
            $diff = $now->diff($tamdung_time);
            $thoigian_td_ngay = $diff->days;
            $thoigian_td_gio = $diff->h + ($diff->days * 24);
            ?>
            
            <div class="alert-tamdung">
                <h3>⚠️ CẢNH BÁO: HỒ SƠ ĐANG TẠM DỪNG</h3>
                <p><strong>Thời gian tạm dừng:</strong> <?php echo $ngay_tamdung; ?></p>
                <p><strong>Người tạm dừng:</strong> <?php echo $nguoi_tamdung; ?></p>
                <p><strong>Lý do tạm dừng:</strong> <?php echo $lydo_tamdung; ?></p>
                <p><strong>Đã tạm dừng:</strong> <span style="color:#e74c3c;font-weight:bold;"><?php echo $thoigian_td_ngay; ?> ngày (<?php echo $thoigian_td_gio; ?> giờ)</span></p>
            </div>
        <?php endif; ?>

        <!-- NÚT TOGGLE -->
        <button class="toggle-btn" onclick="toggleQuanLyTrangThai()">
            <span id="toggle-icon">▼</span> Quản lý trạng thái hồ sơ (Tạm dừng/Tiếp tục)
        </button>

        <!-- FORM TẠM DỪNG/TIẾP TỤC -->
        <div id="quan-ly-trang-thai" class="form-section" style="display:none;">
            <?php if ($is_tamdung): ?>
                <!-- FORM TIẾP TỤC -->
                <h3 style="color:#e65100;">⏸ Hồ sơ đang tạm dừng - Bạn có muốn tiếp tục?</h3>
                <form method="post" onsubmit="return confirmTieptuc();">
                    <input type="hidden" name="hosomay" value="<?php echo $test_hoso; ?>">
                    <input type="hidden" name="action_tamdung" value="tieptuc">
                    
                    <label for="ghichu_tieptuc">Ghi chú khi tiếp tục:</label><br/>
                    <textarea name="ghichu_tieptuc" id="ghichu_tieptuc" class="no-tinymce" rows="3" 
                              placeholder="Nhập ghi chú (không bắt buộc)"></textarea><br/>
                    
                    <button type="submit" class="btn-tieptuc">▶ TIẾP TỤC HỒ SƠ</button>
                </form>
            <?php else: ?>
                <!-- FORM TẠM DỪNG -->
                <h3 style="color:#1976d2;">⚙️ Quản lý trạng thái hồ sơ</h3>
                <form method="post" onsubmit="return confirmTamdung();">
                    <input type="hidden" name="hosomay" value="<?php echo $test_hoso; ?>">
                    <input type="hidden" name="action_tamdung" value="tamdung">
                    
                    <label for="lydo_tamdung">Lý do tạm dừng: <span class="required">*</span></label><br/>
                    <textarea name="lydo_tamdung" id="lydo_tamdung" class="no-tinymce" rows="3" 
                              placeholder="VD: Chờ linh kiện, chờ phê duyệt, thiếu nhân lực..."></textarea><br/>
                    
                    <button type="submit" class="btn-tamdung">⏸ TẠM DỪNG HỒ SƠ</button>
                </form>
            <?php endif; ?>
        </div>

        <!-- LỊCH SỬ -->
        <h2 style="margin-top:40px;">📋 Lịch sử tạm dừng/tiếp tục</h2>
        <?php
        $history_sql = mysql_query("SELECT * FROM hososcbd_tamdung WHERE hoso='$test_hoso' ORDER BY ngay_thuchien DESC LIMIT 10");
        if (mysql_num_rows($history_sql) > 0):
        ?>
        <table class="history-table">
            <tr>
                <th>STT</th>
                <th>Trạng thái</th>
                <th>Người thực hiện</th>
                <th>Ngày thực hiện</th>
                <th>Lý do/Ghi chú</th>
            </tr>
            <?php 
            $stt = 1;
            while ($history = mysql_fetch_array($history_sql)):
                $status_class = $history['trangthai'] == 'tamdung' ? 'status-tamdung' : 'status-tieptuc';
                $status_text = $history['trangthai'] == 'tamdung' ? '⏸ TẠM DỪNG' : '▶ TIẾP TỤC';
                $lydo_ghichu = $history['trangthai'] == 'tamdung' ? $history['lydo_tamdung'] : $history['ghichu_tieptuc'];
            ?>
            <tr>
                <td><?php echo $stt++; ?></td>
                <td class="<?php echo $status_class; ?>"><?php echo $status_text; ?></td>
                <td><?php echo $history['nguoi_thuchien']; ?></td>
                <td><?php echo date('d/m/Y H:i', strtotime($history['ngay_thuchien'])); ?></td>
                <td><?php echo $lydo_ghichu; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
        <?php else: ?>
        <p style="color:#999; font-style:italic;">Chưa có lịch sử tạm dừng/tiếp tục cho hồ sơ này.</p>
        <?php endif; ?>

        <!-- HƯỚNG DẪN -->
        <div style="margin-top:40px; padding:20px; background:#e8f5e9; border-radius:5px;">
            <h3 style="color:#2e7d32;">💡 Hướng dẫn sử dụng</h3>
            <ol>
                <li>Click nút <strong>"Quản lý trạng thái hồ sơ"</strong> để mở form</li>
                <li>Nhập lý do tạm dừng (bắt buộc) hoặc ghi chú tiếp tục (không bắt buộc)</li>
                <li>Click nút <strong>TẠM DỪNG</strong> hoặc <strong>TIẾP TỤC</strong></li>
                <li>Xác nhận trong popup</li>
                <li>Kiểm tra lịch sử bên dưới</li>
            </ol>
            <p><strong>Test với hồ sơ khác:</strong> Thêm <code>?hoso=HS_XXX</code> vào URL</p>
            <p>VD: <a href="?hoso=HS_DEMO_002">?hoso=HS_DEMO_002</a></p>
        </div>
    </div>

    <script>
        // Toggle hiển thị form
        function toggleQuanLyTrangThai() {
            var element = document.getElementById('quan-ly-trang-thai');
            var icon = document.getElementById('toggle-icon');
            if (element.style.display === 'none') {
                element.style.display = 'block';
                icon.innerHTML = '▲';
            } else {
                element.style.display = 'none';
                icon.innerHTML = '▼';
            }
        }

        // Confirm tiếp tục
        function confirmTieptuc() {
            return confirm('Bạn có chắc muốn tiếp tục hồ sơ này?\n\nHồ sơ sẽ được đánh dấu là đã tiếp tục và bạn có thể làm việc bình thường.');
        }

        // Confirm và validate tạm dừng
        function confirmTamdung() {
            var textarea = document.getElementById('lydo_tamdung');
            if (!textarea) {
                alert('Lỗi: Không tìm thấy textarea. Vui lòng refresh trang.');
                return false;
            }
            
            var lydo = textarea.value.trim();
            if (lydo === '' || lydo.length === 0) {
                alert('Vui lòng nhập lý do tạm dừng!');
                textarea.focus();
                return false;
            }
            
            return confirm('Bạn có chắc muốn tạm dừng hồ sơ này?\n\nLý do: ' + lydo + '\n\nHồ sơ sẽ được đánh dấu là đang tạm dừng.');
        }
    </script>
</body>
</html>
