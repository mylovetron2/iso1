<?php
/**
 * FILE TEST - Kiểm tra lỗi
 */

// Bật hiển thị lỗi
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>Test 1: Include select_data.php</h2>";
include("select_data.php");
echo "✓ select_data.php loaded OK<br>";

echo "<h2>Test 2: Include manage_thietbi_status.php</h2>";
include("manage_thietbi_status.php");
echo "✓ manage_thietbi_status.php loaded OK<br>";

echo "<h2>Test 3: Kiểm tra kết nối database</h2>";
if (function_exists('mysql_query')) {
    echo "✓ MySQL functions available<br>";
} else {
    echo "✗ MySQL functions NOT available<br>";
}

echo "<h2>Test 4: Kiểm tra bảng danhmuc_status</h2>";
$result = mysql_query("SELECT COUNT(*) as total FROM danhmuc_status");
if ($result) {
    $row = mysql_fetch_assoc($result);
    echo "✓ Bảng danhmuc_status có {$row['total']} dòng<br>";
} else {
    echo "✗ Lỗi: " . mysql_error() . "<br>";
}

echo "<h2>Test 5: Kiểm tra bảng thietbi_status</h2>";
$result = mysql_query("SHOW COLUMNS FROM thietbi_status");
if ($result) {
    echo "✓ Bảng thietbi_status tồn tại<br>";
    echo "Các cột: ";
    while ($row = mysql_fetch_assoc($result)) {
        echo $row['Field'] . ", ";
    }
    echo "<br>";
} else {
    echo "✗ Lỗi: " . mysql_error() . "<br>";
}

echo "<h2>Test 6: Kiểm tra function get_all_status_list()</h2>";
if (function_exists('get_all_status_list')) {
    $list = get_all_status_list(true);
    echo "✓ Function exists. Số status: " . count($list) . "<br>";
    if (count($list) > 0) {
        echo "Status đầu tiên: " . $list[0]['ten_status'] . "<br>";
    }
} else {
    echo "✗ Function get_all_status_list() không tồn tại<br>";
}

echo "<h2>Test 7: Kiểm tra VIEW view_thietbi_full</h2>";
$result = mysql_query("SELECT COUNT(*) as total FROM view_thietbi_full");
if ($result) {
    $row = mysql_fetch_assoc($result);
    echo "✓ VIEW tồn tại. Có {$row['total']} thiết bị<br>";
} else {
    echo "✗ Lỗi: " . mysql_error() . "<br>";
}

echo "<h2>✅ Tất cả test HOÀN THÀNH</h2>";
echo "<a href='quanly_tinhtrang_thietbi.php'>→ Thử mở quanly_tinhtrang_thietbi.php</a>";
?>
