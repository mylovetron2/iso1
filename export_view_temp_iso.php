<?php
// File: export_view_temp_iso.php
// Chức năng: Xuất toàn bộ dữ liệu từ bảng view_temp_iso ra file Excel (dạng HTML table)

include ("select_data.php");

$filename = "view_temp_iso_export_" . date("Ymd_His") . ".xls";

header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Pragma: no-cache");
header("Expires: 0");

echo "<html><head><meta charset='UTF-8'></head><body>";
echo "<table border='1' style='border-collapse:collapse;'>";

// Lấy danh sách cột tự động
$result = mysql_query("SELECT * FROM view_temp_iso LIMIT 1");
$fields = array();
echo "<tr>";
if ($result && mysql_num_fields($result) > 0) {
    for ($i = 0; $i < mysql_num_fields($result); $i++) {
        $field = mysql_field_name($result, $i);
        $fields[] = $field;
        echo "<th>" . htmlspecialchars($field) . "</th>";
    }
}
echo "</tr>";

// Lấy toàn bộ dữ liệu
$result = mysql_query("SELECT * FROM view_temp_iso");
while ($row = mysql_fetch_assoc($result)) {
    echo "<tr>";
    foreach ($fields as $field) {
        echo "<td>" . htmlspecialchars($row[$field]) . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
echo "</body></html>";
exit;
