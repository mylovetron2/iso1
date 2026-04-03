<?php
// Test kết nối và kiểm tra user
include("select_data.php");

echo "<!DOCTYPE html><html><head><meta charset='UTF-8'></head><body>";
echo "<h2>🔍 KIỂM TRA HỆ THỐNG ĐĂNG NHẬP</h2>";
echo "<hr>";

// Test kết nối
echo "<h3>1. Kiểm tra kết nối Database</h3>";
if ($link) {
    echo "<p style='color:green;font-weight:bold;'>✓ Kết nối thành công!</p>";
    echo "<ul>";
    echo "<li>Host: " . $hostname . "</li>";
    echo "<li>Database: " . $databasename . "</li>";
    echo "<li>User: " . $usernamehost . "</li>";
    echo "</ul>";
} else {
    echo "<p style='color:red;'>✗ Kết nối thất bại!</p>";
    exit;
}

// Kiểm tra bảng users
echo "<h3>2. Kiểm tra bảng 'users'</h3>";
$check_table = mysqli_query($link, "SHOW TABLES LIKE 'users'");
if (mysqli_num_rows($check_table) > 0) {
    echo "<p style='color:green;font-weight:bold;'>✓ Bảng 'users' tồn tại</p>";
    
    // Đếm số users
    $count = mysqli_query($link, "SELECT COUNT(*) as total FROM users");
    $total = mysqli_fetch_assoc($count);
    echo "<p>Tổng số users: <strong>" . $total['total'] . "</strong></p>";
    
} else {
    echo "<p style='color:red;font-weight:bold;'>✗ Bảng 'users' KHÔNG tồn tại!</p>";
    
    // Hiển thị các bảng có sẵn
    echo "<h4>Các bảng hiện có:</h4>";
    $tables = mysqli_query($link, "SHOW TABLES");
    echo "<ul>";
    while ($row = mysqli_fetch_array($tables)) {
        echo "<li>" . $row[0] . "</li>";
    }
    echo "</ul>";
    exit;
}

// Hiển thị users
echo "<h3>3. Danh sách Users</h3>";
$result = mysqli_query($link, "SELECT stt, username, email, madv, nhom, phanquyen, hoten, LENGTH(password) as pass_len FROM users ORDER BY stt");

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1' style='border-collapse:collapse;width:100%;'>";
    echo "<thead style='background:#1976d2;color:white;'>";
    echo "<tr>";
    echo "<th>STT</th>";
    echo "<th>Username</th>";
    echo "<th>Email</th>";
    echo "<th>Mã ĐV</th>";
    echo "<th>Nhóm</th>";
    echo "<th>Phân quyền</th>";
    echo "<th>Họ tên</th>";
    echo "<th>Pass Length</th>";
    echo "<th>Trạng thái</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    
    while ($row = mysqli_fetch_assoc($result)) {
        $can_login = ($row['madv'] == 'XDT');
        $bg_color = $can_login ? '#e8f5e9' : '#ffebee';
        $status = $can_login ? '✓ CÓ THỂ ĐĂNG NHẬP' : '✗ KHÔNG THỂ ĐĂNG NHẬP';
        $status_color = $can_login ? 'green' : 'red';
        
        echo "<tr style='background:$bg_color'>";
        echo "<td align='center'>" . $row['stt'] . "</td>";
        echo "<td><strong>" . htmlspecialchars($row['username']) . "</strong></td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td><strong>" . htmlspecialchars($row['madv']) . "</strong></td>";
        echo "<td>" . htmlspecialchars($row['nhom']) . "</td>";
        echo "<td align='center'>" . $row['phanquyen'] . "</td>";
        echo "<td>" . htmlspecialchars($row['hoten']) . "</td>";
        echo "<td align='center'>" . $row['pass_len'] . "</td>";
        echo "<td style='color:$status_color;font-weight:bold;'>" . $status . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    
    echo "<div style='margin-top:20px;padding:15px;background:#fff3cd;border-left:4px solid #ffc107;'>";
    echo "<strong>Lưu ý:</strong>";
    echo "<ul>";
    echo "<li>Chỉ user có <strong>madv = 'XDT'</strong> mới đăng nhập được</li>";
    echo "<li>Password length > 60 ký tự = đã bị mã hóa (hash)</li>";
    echo "<li>Password length < 20 ký tự = plain text (không mã hóa)</li>";
    echo "</ul>";
    echo "</div>";
    
} else {
    echo "<p style='color:orange;'>Chưa có user nào trong hệ thống.</p>";
}

// Form test đăng nhập
echo "<hr>";
echo "<h3>4. Test Đăng Nhập</h3>";

if (isset($_POST['test_login'])) {
    $test_user = mysqli_real_escape_string($link, $_POST['test_username']);
    $test_pass = mysqli_real_escape_string($link, $_POST['test_password']);
    
    echo "<div style='background:#f5f5f5;padding:20px;border-radius:5px;'>";
    echo "<h4>Kết quả kiểm tra:</h4>";
    
    // Bước 1: Tìm user
    echo "<p><strong>Bước 1:</strong> Tìm username '<strong>$test_user</strong>'</p>";
    $check = mysqli_query($link, "SELECT * FROM users WHERE username='$test_user'");
    
    if (mysqli_num_rows($check) == 0) {
        echo "<p style='color:red;'>❌ Username không tồn tại!</p>";
        echo "<p>→ Thông báo lỗi: <em>Tên đăng nhập hoặc mật khẩu không đúng</em></p>";
    } else {
        echo "<p style='color:green;'>✓ Username tồn tại</p>";
        
        $user = mysqli_fetch_assoc($check);
        
        // Bước 2: Kiểm tra password
        echo "<p><strong>Bước 2:</strong> So sánh password</p>";
        echo "<table border='1' style='border-collapse:collapse;'>";
        echo "<tr><td>Password nhập vào:</td><td><code>" . htmlspecialchars($test_pass) . "</code></td></tr>";
        echo "<tr><td>Password trong DB:</td><td><code>" . htmlspecialchars($user['password']) . "</code></td></tr>";
        echo "<tr><td>So sánh (==):</td><td>" . (($user['password'] == $test_pass) ? 'TRUE' : 'FALSE') . "</td></tr>";
        echo "</table>";
        
        if ($user['password'] != $test_pass) {
            echo "<p style='color:red;'>❌ Password không khớp!</p>";
            echo "<p>→ Thông báo lỗi: <em>Tên đăng nhập hoặc mật khẩu không đúng</em></p>";
        } else {
            echo "<p style='color:green;'>✓ Password khớp</p>";
            
            // Bước 3: Kiểm tra quyền
            echo "<p><strong>Bước 3:</strong> Kiểm tra phân quyền</p>";
            echo "<ul>";
            echo "<li>Mã đơn vị: <strong>" . $user['madv'] . "</strong></li>";
            echo "<li>Phân quyền: <strong>" . $user['phanquyen'] . "</strong></li>";
            echo "</ul>";
            
            if ($user['madv'] != 'XDT') {
                echo "<p style='color:red;'>❌ Mã đơn vị không phải 'XDT'!</p>";
                echo "<p>→ Thông báo lỗi: <em>Tài khoản của bạn không có quyền đăng nhập vào chương trình này</em></p>";
                echo "<p><strong>Giải pháp:</strong></p>";
                echo "<pre>UPDATE users SET madv='XDT' WHERE username='$test_user';</pre>";
            } else {
                echo "<p style='color:green;font-weight:bold;font-size:18px;'>✓✓✓ ĐĂNG NHẬP THÀNH CÔNG!</p>";
            }
        }
    }
    
    echo "</div>";
}

echo "<form method='post' style='background:#e3f2fd;padding:20px;border-radius:5px;margin-top:20px;'>";
echo "<p><label>Username: <input type='text' name='test_username' value='admin' required></label></p>";
echo "<p><label>Password: <input type='password' name='test_password' required></label></p>";
echo "<p><button type='submit' name='test_login' style='background:#1976d2;color:white;padding:10px 20px;border:none;border-radius:5px;cursor:pointer;'>Test Đăng Nhập</button></p>";
echo "</form>";

echo "<hr>";
echo "<div style='text-align:center;margin:20px;'>";
echo "<a href='index.php' style='display:inline-block;background:#4caf50;color:white;padding:12px 24px;text-decoration:none;border-radius:5px;font-weight:bold;'>← Quay lại trang đăng nhập</a>";
echo "</div>";

mysqli_close($link);
echo "</body></html>";
?>
