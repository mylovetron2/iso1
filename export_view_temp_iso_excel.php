<?php
include("select_data.php");
$filename = "baocaothang_view_temp_iso_" . date("Ymd_His") . ".xls";
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Pragma: no-cache");
header("Expires: 0");

echo "<html><head><meta charset='UTF-8'>
<style>
.table1 { border-collapse:collapse; width:100%; border:1px dotted black; }
.table1 td, .table1 th { border:1px dotted black; text-align:left; }
.table1 th { font-weight:bold; background-color:#87CEEB; }
body,td,th { font-family: Times New Roman, Times, serif; }
</style>
</head><body>";

echo "<b>LIỆT KÊ CÔNG TÁC BẢO DƯỠNG, SỬA CHỮA, CHUẨN CHỈNH THIẾT BỊ</b><br/><br/>";
echo "<table class='table1'>";
echo "<tr>
<th>Stt</th>
<th>Số HS</th>
<th>Tên TB</th>
<th>Số</th>
<th>C.Việc</th>
<th>Ngày thực hiện</th>
<th>Ngày hoàn thành</th>
<th>Nhân viên</th>
<th>Tình trạng KT</th>
<th>Hỏng hóc</th>
<th>TS.GIỜ</th>
<th>Bộ phận</th>
</tr>";

// Lấy dữ liệu và group theo Số HS (hoso)
$sql = mysql_query("SELECT * FROM view_temp_iso_3 ORDER BY maql, ngayth, ds_hoten");
$stt = 1;
$last_hoso = null;
while ($row = mysql_fetch_assoc($sql)) {
    echo "<tr>";
    echo "<td>" . $stt . "</td>";
    // Group theo Số HS, chỉ in hoso khi khác lần trước
    if ($row['maql'] !== $last_hoso) {
        echo "<td>" . htmlspecialchars($row['maql']) . "</td>";
        $last_hoso = $row['maql'];
    } else {
        echo "<td></td>";
    }
    echo "\n";
    echo "<td>" . htmlspecialchars($row['hoso']) . "</td>";
    echo "<td>" . htmlspecialchars($row['tenvt']) . "</td>";
   
    echo "<td>" . htmlspecialchars($row['cv']) . "</td>";
    echo "<td>" . htmlspecialchars($row['ngayth']) . "</td>";
    echo "<td>" . htmlspecialchars($row['ngaykt']) . "</td>";
    echo "<td>" . htmlspecialchars($row['ds_hoten']) . "</td>";
    echo "<td>" . htmlspecialchars($row['ttktafter']) . "</td>";
    echo "<td>" . htmlspecialchars($row['honghoc']) . "</td>";
    echo "<td>" . htmlspecialchars($row['tong_giolv']) . "</td>";
    echo "<td>" . htmlspecialchars($row['madv']) . "</td>";
    echo "</tr>";
    $stt++;
}
echo "</table></body></html>";
exit;