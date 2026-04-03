<?php
// File xuất Excel cho Kế hoạch Hiệu chuẩn/Kiểm định thiết bị

$year = isset($_GET['year']) ? $_GET['year'] : date("Y");

// Kết nối database trực tiếp
$hostname = 'localhost';
$usernamehost = 'diavatly';
$passwordhost = 'cntt2019';
$databasename = 'diavatly_db';

$link = mysqli_connect($hostname, $usernamehost, $passwordhost, $databasename);
if (!$link) {
    die("Can't connect to server: " . mysqli_connect_error());
}
mysqli_set_charset($link, 'utf8');

// Set Excel headers BEFORE any HTML output
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"KeHoachHCKD-$year.xls\"");
header("Pragma: no-cache");
header("Expires: 0");

echo "<head>
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
<style type=\"text/css\">
.table1 {
    border-collapse:collapse;
    width:100%;
    border:1px dotted black;
}
.table1 td {
    border:1px dotted black;
    text-align:left;
    padding:5px;
}
.table1 th {
    border:1px dotted black;
    font-weight: bold;
    background-color:#87CEEB;
    padding:5px;
}
body,td,th {
    font-family: Times New Roman, Times, serif;
}
</style>
</head>";

echo "<body>";
echo "<center><b>KẾ HOẠCH HIỆU CHUẨN/KIỂM ĐỊNH THIẾT BỊ;<br/>";
echo "KIỂM TRA MẪU CHUẨN/VẬT CHUẨN, THIẾT BỊ ĐO LƯỜNG CHUYỂN DỤNG<br/>";
echo "XÍ NGHIỆP ĐỊA VẬT LÝ GIẾNG KHOAN<br/>";
echo "<u>NĂM $year</u></b></center>";
echo "<br/>";

// Đếm tổng số bản ghi
$r1 = mysqli_query($link, "SELECT COUNT(*) as sum FROM kehoach_iso WHERE namkh='$year'");
while($row = mysqli_fetch_array($r1)){
    $total_records = $row['sum'];
}

echo "<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" class=\"table1\">";
echo "<tr>
<th width=\"4%\" rowspan=\"2\">Stt</th>
<th width=\"10%\" rowspan=\"2\">Tên thiết bị, mẫu chuẩn/vật chuẩn</th>
<th width=\"5%\" rowspan=\"2\">Ký/Mã hiệu</th>
<th width=\"5%\" rowspan=\"2\">Số máy</th>
<th width=\"3%\" rowspan=\"2\">Nước/Hãng SX</th>
<th width=\"10%\" rowspan=\"2\">Nơi thực hiện</th>
<th width=\"4%\" rowspan=\"2\">Tháng</th>
<th width=\"7%\" colspan=\"12\">THÁNG</th>
<th width=\"5%\" rowspan=\"2\">Chủ sở hữu</th>
</tr>
<tr>
<th width=\"3%\">1</th>
<th width=\"3%\">2</th>
<th width=\"3%\">3</th>
<th width=\"3%\">4</th>
<th width=\"3%\">5</th>
<th width=\"3%\">6</th>
<th width=\"3%\">7</th>
<th width=\"3%\">8</th>
<th width=\"3%\">9</th>
<th width=\"3%\">10</th>
<th width=\"3%\">11</th>
<th width=\"3%\">12</th>
</tr>";

echo "<tr>
<td colspan=\"20\" style=\"padding-left:10px;background:#CCCCCC;\"><b>Thiết bị theo dõi và đo lường, máy bắn mìn, máy kiểm tra kíp mìn, máy đo độ lệch do Liên bang Nga sản xuất</b></td>
</tr>";

$number = 1;
$sql1 = mysqli_query($link, "SELECT stt,tenthietbi,mahieu,somay,hangsx,noithuchien,thang,namkh,loaitb,ghichu 
                     FROM kehoach_iso 
                     WHERE namkh='$year' AND ghichu='DK' 
                     ORDER BY thang ASC, noithuchien ASC, tenthietbi ASC");

while($row = mysqli_fetch_array($sql1)){
    $mahieu = $row['mahieu'];
    $sm = $row['somay'];
    $noith = $row['noithuchien'];
    $thang = $row['thang'];
    $tentb = $row['tenthietbi'];
    $hangsanxuat = $row['hangsx'];
    $loaitb = $row['loaitb'];
    $stt = $row['stt'];
    
    $r19 = mysqli_query($link, "SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$mahieu'");
    while($row2 = mysqli_fetch_array($r19)){
        $tenvt1 = $row2['tenviettat'];
        $bophansh = $row2['bophansh'];
        $chusohuu = $row2['chusohuu'];
    }
    
    echo "<tr>";
    echo "<td style=\"text-align:center;\">$number</td>";
    echo "<td style=\"padding-left:10px;\">$tentb</td>";
    echo "<td style=\"padding-left:10px;\">$tenvt1</td>";
    echo "<td style=\"padding-left:10px;\">$sm</td>";
    echo "<td style=\"text-align:center;\">$hangsanxuat</td>";
    
    // Nơi thực hiện
    echo "<td style=\"padding-left:10px;\">";
    if($noith == "TT3"){
        echo "Trung tâm 3";
    } elseif($noith == "MN"){
        echo "CT TNHH DV & giám định MN";
    } elseif($noith == "XNKT"){
        echo "Xí nghiệp KT";
    } elseif($noith == "XNĐVLGK"){
        echo "XNĐVLGK";
    }
    echo "</td>";
    
    // Hiển thị cột Tháng
    echo "<td style=\"text-align:center;\">$thang</td>";
    
    // Hiển thị tháng với màu xanh - tháng DB là tháng cuối
    // Ví dụ: tháng=3 thì tô tháng 1,2,3
    for($i = 1; $i <= 12; $i++){
        // Tính 2 tháng trước tháng cuối
        $thang_1 = $thang - 2;
        $thang_2 = $thang - 1;
        
        // Xử lý vòng tháng (wrap around)
        if($thang_1 <= 0) $thang_1 += 12;
        if($thang_2 <= 0) $thang_2 += 12;
        
        if($i == $thang_1 || $i == $thang_2 || $i == $thang){
            echo "<td bgcolor=\"#6699CC\"></td>";
        } else {
            echo "<td></td>";
        }
    }
    
    // Chủ sở hữu
    echo "<td style=\"padding-left:10px;\">";
    if($bophansh == "XDT"){
        echo $chusohuu;
    } else {
        echo $bophansh;
    }
    echo "</td>";
    echo "</tr>";
    
    $number++;
}

// Thiết bị đột xuất
echo "<tr>
<td colspan=\"20\" style=\"padding-left:10px;background:#CCCCCC;\"><b>Thiết bị phải hiệu chuẩn/kiểm định đột xuất</b></td>
</tr>";

$sql2 = mysqli_query($link, "SELECT stt,tenthietbi,mahieu,somay,hangsx,noithuchien,thang,namkh,loaitb,ghichu
                     FROM kehoach_iso 
                     WHERE namkh='$year' AND ghichu='DX' 
                     ORDER BY thang ASC, noithuchien ASC, tenthietbi ASC");

while($row = mysqli_fetch_array($sql2)){
    $mahieu = $row['mahieu'];
    $sm = $row['somay'];
    $noith = $row['noithuchien'];
    $thang = $row['thang'];
    $tentb = $row['tenthietbi'];
    $hangsanxuat = $row['hangsx'];
    $loaitb = $row['loaitb'];
    
    $r19 = mysqli_query($link, "SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$mahieu'");
    while($row2 = mysqli_fetch_array($r19)){
        $tenvt1 = $row2['tenviettat'];
        $bophansh = $row2['bophansh'];
        $chusohuu = $row2['chusohuu'];
    }
    
    echo "<tr>";
    echo "<td style=\"text-align:center;\">$number</td>";
    echo "<td style=\"padding-left:10px;\">$tentb</td>";
    echo "<td style=\"padding-left:10px;\">$tenvt1</td>";
    echo "<td style=\"padding-left:10px;\">$sm</td>";
    echo "<td style=\"text-align:center;\">$hangsanxuat</td>";
    
    echo "<td style=\"padding-left:10px;\">";
    if($noith == "TT3"){
        echo "Trung tâm 3";
    } elseif($noith == "MN"){
        echo "CT TNHH DV & giám định MN";
    } elseif($noith == "XNKT"){
        echo "Xí nghiệp KT";
    } elseif($noith == "XNĐVLGK"){
        echo "XNĐVLGK";
    }
    echo "</td>";
    
    // Hiển thị cột Tháng
    echo "<td style=\"text-align:center;\">$thang</td>";
    
    // Hiển thị tháng với màu xanh - tháng DB là tháng cuối
    // Ví dụ: tháng=3 thì tô tháng 1,2,3
    for($i = 1; $i <= 12; $i++){
        // Tính 2 tháng trước tháng cuối
        $thang_1 = $thang - 2;
        $thang_2 = $thang - 1;
        
        // Xử lý vòng tháng (wrap around)
        if($thang_1 <= 0) $thang_1 += 12;
        if($thang_2 <= 0) $thang_2 += 12;
        
        if($i == $thang_1 || $i == $thang_2 || $i == $thang){
            echo "<td bgcolor=\"#6699CC\"></td>";
        } else {
            echo "<td></td>";
        }
    }
    
    echo "<td style=\"padding-left:10px;\">";
    if($bophansh == "XDT"){
        echo $chusohuu;
    } else {
        echo $bophansh;
    }
    echo "</td>";
    echo "</tr>";
    
    $number++;
}

echo "</table>";
echo "</body>";
exit;
?>
