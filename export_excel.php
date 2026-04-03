<?php
include("select_data.php");
header("Content-Type: application/vnd.ms-excel");
$from_month = isset($_GET['from_month']) ? intval($_GET['from_month']) : date('m');
$from_year = isset($_GET['from_year']) ? intval($_GET['from_year']) : date('Y');
$to_month = isset($_GET['to_month']) ? intval($_GET['to_month']) : date('m');
$to_year = isset($_GET['to_year']) ? intval($_GET['to_year']) : date('Y');
$date_from = sprintf('%04d-%02d-01', $from_year, $from_month);
$date_to = sprintf('%04d-%02d-31', $to_year, $to_month);
$where = "(ngayth <= '$date_to' AND ngaykt >= '$date_from')";
$search = isset($_GET['s']) ? trim($_GET['s']) : '';
if ($search !== '') {
    $search_sql = mysql_real_escape_string($search);
    $where .= " AND (hoso LIKE '%$search_sql%'";
    $where .= " OR EXISTS (SELECT 1 FROM ngthuchien_iso WHERE mahoso=hososcbd_iso.hoso AND hoten LIKE '%$search_sql%')";
    $where .= " OR EXISTS (SELECT 1 FROM thietbi_iso WHERE mavt=hososcbd_iso.mavt AND tenvt LIKE '%$search_sql%'))";
}
$tenfile = "baocao_giolamviec-".date('Ymd-His').".xls";
header("Content-Disposition: attachment;filename=\"$tenfile\"");
header("Pragma: no-cache");
header("Expires: 0");
echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
echo '<style>
.table1 { border-collapse:collapse; width:100%; border:1px dotted black; }
.table1 td { border:1px dotted black; text-align:left; }
.table1 th { border:1px dotted black; font-weight: bold; background-color:#87CEEB; }
body,td,th { font-family: Times New Roman, Times, serif; }
</style></head><body>';

$ngayt = date('d/m/Y', strtotime($date_from));
$ngayd = date('d/m/Y', strtotime($date_to));
echo 'XN ĐỊA VẬ LÝ GK &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <b> LIỆT KÊ CÔNG TÁC BẢO DƯỠNG, SỬA CHỮA, CHUẨN CHỈNH THIẾT BỊ</b>
<br/>XƯỞNG SCTBĐVL &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Từ '.$ngayt.' đến '.$ngayd.'
<br/>
<br/>';
echo '<table width="1100" height="160" border="1" class="table1">';
echo '<tr>
  <th width="35">Stt DV</th>
  <th width="60">№ Yêu cầu DV</th>
  <th width="75">Số HS</th>
  <th width="185">Tên TB</th>
  <th width="83">Số</th>
  <th width="58">C.Việc</th>
  <th width="88">Ngày thực hien</th>
  <th width="88">Ngày hoàn thành</th>
  <th width="70">Nhân viên</th>
  <th width="90">Tình trạng KT</th>
  <th width="120">Hỏng hóc</th>
  <th width="140">Mô tả công việc</th>
  <th width="100">Ghi chú</th>
  <th width="65">TS.GIỜ</th>
  <th width="65">Bộ phận</th>
</tr>';

// Lấy danh sách maql như baocao_giolamviec
$sql_maql = mysql_query("SELECT DISTINCT maql FROM hososcbd_iso WHERE $where ORDER BY CAST(SUBSTRING_INDEX(maql, '-', -1) AS UNSIGNED) DESC");
$tong_maql = 0;
$tong_somay = 0;
$tong_ts_gio = 0;
$stt = 1;
$tongmay = 0;
$donhang = 0;

while($row_maql = mysql_fetch_array($sql_maql)) {
  $maql = $row_maql['maql'];
  $sql_hoso = mysql_query("SELECT * FROM hososcbd_iso WHERE maql='".mysql_real_escape_string($maql)."' AND $where ORDER BY hoso");
  $maql_ts_gio = 0; // tổng TS.Giờ cho nhóm maql này
  $stt_maql = 1;
  $hoso_co_gio = array();
  $hoso_rows = array();
  while($row_hoso = mysql_fetch_array($sql_hoso)) {
    $hoso = $row_hoso['hoso'];
    $ngayth = $row_hoso['ngayth'];
    $ngaykt = $row_hoso['ngaykt'];
    $sql_nv = mysql_query("SELECT n.*, h.maql, h.mavt, h.somay, h.ttktafter, h.honghoc,h.khacphuc,h.ghichufinal, h.cv, h.madv FROM ngthuchien_iso n LEFT JOIN hososcbd_iso h ON n.mahoso = h.hoso WHERE n.mahoso='$hoso'");
    $tenvt = '';
    if (!empty($row_hoso['mavt'])) {
      $mavt_tmp = mysql_real_escape_string($row_hoso['mavt']);
      $rs_tenvt = mysql_query("SELECT tenvt FROM thietbi_iso WHERE mavt='$mavt_tmp' LIMIT 1");
      if ($row_tenvt = mysql_fetch_assoc($rs_tenvt)) {
        $tenvt = $row_tenvt['tenvt'];
      }
    }
    $tong_gio = 0;
    $ds_nv = [];
    $thang_ketthuc_hoso = (int)date('m', strtotime($ngaykt));
    $nam_ketthuc_hoso = (int)date('Y', strtotime($ngaykt));
    if ($nam_ketthuc_hoso < $from_year || ($nam_ketthuc_hoso == $from_year && $thang_ketthuc_hoso < $from_month)) {
      $tong_gio = 0;
    } else {
      while($row_nv = mysql_fetch_array($sql_nv)) {
        $hoten = $row_nv['hoten'];
        $maql_nv = isset($row_nv['maql']) ? $row_nv['maql'] : '';
        $mavt_nv = isset($row_nv['mavt']) ? $row_nv['mavt'] : '';
        $somay = isset($row_nv['somay']) ? $row_nv['somay'] : '';
        $cv = isset($row_nv['cv']) ? $row_nv['cv'] : '';
        $ttktafter = isset($row_nv['ttktafter']) ? $row_nv['ttktafter'] : '';
        $honghoc = isset($row_nv['honghoc']) ? $row_nv['honghoc'] : '';
        $khacphuc = isset($row_nv['khacphuc']) ? $row_nv['khacphuc'] : '';
        $ghichufinal = isset($row_nv['ghichufinal']) ? $row_nv['ghichufinal'] : '';
        $madv = isset($row_nv['madv']) ? $row_nv['madv'] : '';
        if ($nam_ketthuc_hoso < $to_year || ($nam_ketthuc_hoso == $to_year && $thang_ketthuc_hoso < $to_month)) {
          $field_end = 'giolv'.$thang_ketthuc_hoso;
        } else {
          $field_end = 'giolv'.$to_month;
        }
        if ($from_year == $to_year) {
          $field_start = 'giolv'.($from_month-1);
        } else {
          $field_start = 'giolv1';
        }
        $gio_end = (isset($row_nv[$field_end]) && $row_nv[$field_end] !== null) ? intval($row_nv[$field_end]) : 0;
        $gio_start = (isset($row_nv[$field_start]) && $row_nv[$field_start] !== null) ? intval($row_nv[$field_start]) : 0;
        $gio_nv = $gio_end - $gio_start;
        if($gio_nv < 0) $gio_nv = 0;
        $tong_gio += $gio_nv;
        if($gio_nv > 0 && $hoten != '') {
          $ds_nv[] = $hoten;
        }
      }
      $ds_nv = array_unique($ds_nv);
      $ds_nv_short = array();
      foreach ($ds_nv as $hoten) {
        $hoten = trim($hoten);
        if ($hoten == '') continue;
        $parts = explode(' ', $hoten);
        if (count($parts) == 3 &&
            (($parts[0] === 'VŨ' && $parts[1] === 'ANH' && mb_strtoupper($parts[2], 'UTF-8') === 'ĐỨC') ||
             ($parts[0] === 'ĐOÀN' && $parts[1] === 'MINH' && mb_strtoupper($parts[2], 'UTF-8') === 'ĐỨC'))) {
          $dem = $parts[1];
          $ten = $parts[2];
          $short = mb_substr($dem, 0, 1, 'UTF-8') . '.' . mb_strtoupper($ten, 'UTF-8');
          $ds_nv_short[] = $short;
        } else {
          $ds_nv_short[] = $parts[count($parts)-1];
        }
      }
    }
    if ($tong_gio > 0) {
      $hoso_co_gio[] = true;
      ob_start();
      $tong_somay++;
      $tong_ts_gio += $tong_gio;
      $maql_ts_gio += $tong_gio;
  echo '<tr>';
  echo '<td colspan="2" style="text-align:right">'.$stt_maql.'</td>';
  echo '<td style="text-align:center">'.$hoso.'</td>';
  echo '<td style="text-align:left;padding-left:8px">'.$row_hoso['mavt'].'-'.htmlspecialchars($tenvt).'</td>';
  echo '<td style="text-align:center">'.$row_hoso['somay'].'</td>';
  echo '<td style="text-align:center">'.$row_hoso['cv'].'</td>';
  echo '<td style="text-align:center">'.$ngayth.'</td>';
  echo '<td style="text-align:center">'.$ngaykt.'</td>';
  echo '<td style="text-align:left;padding-left:1px">'.htmlspecialchars(implode(", ", $ds_nv_short)).'</td>';
  echo '<td style="text-align:center">'.($row_hoso['ttktafter']=='Hỏng' ? 'Hỏng-Không khắc phục được' : $row_hoso['ttktafter']).'</td>';
  echo '<td style="text-align:left">'.$row_hoso['honghoc'].'</td>';
  echo '<td style="text-align:left">'.$row_hoso['khacphuc'].'</td>';
  echo '<td style="text-align:left">'.$row_hoso['ghichufinal'].'</td>';
  echo '<td style="text-align:center">'.$tong_gio.'</td>';
  echo '<td style="text-align:center">'.$row_hoso['madv'].'</td>';
      $hoso_rows[] = ob_get_clean();
      $stt_maql++;
      $tongmay++;
      $donhang++;
    }
  }
  if (count($hoso_co_gio) > 0) {
    $tong_maql++;
    echo '<tr>
            <td style="font-weight:bold;background:#e0f7fa;">'.$stt++.'</td>
            <td colspan="12" style="font-weight:bold;background:#e0f7fa;">'.htmlspecialchars($maql).'</td>
        </tr>';
    foreach($hoso_rows as $row) echo $row;
  }
}
echo '<br></br>';
echo '<tr><td colspan="13" style="font-weight:bold;text-align:left;background:#e0f7fa;">Tổng số đơn hàng (maql): '.$tong_maql.'</td></tr>';
echo '<tr><td colspan="13" style="font-weight:bold;text-align:left;background:#e0f7fa;">Tổng số máy: '.$tong_somay.'</td></tr>';
echo '<tr><td colspan="13" style="font-weight:bold;text-align:left;background:#e0f7fa;">Tổng TS.Giờ: '.$tong_ts_gio.'</td></tr>';




echo '</table>';



echo '<p>&nbsp;<b> 3. Công tác Hiệu chuẩn/ Kiểm định thiết bị </b></p>';

echo '<table width="1100" height="160" border="1" class="table1">
    <tr>
        <th width="60">STT</th>
        <th width="75">SỐ HỒ SƠ</th>
        <th width="185">TÊN MÁY</th>
        <th width="150">SỐ MÁY</th>
        <th width="83">C.VIỆC</th>
        <th width="58">Ngày TH</th>
        <th width="100">Ngày Tiếp Theo</th>
        <th width="88">NH.VIÊN</th>
        <th width="157">NƠI.TH</th>
        <th width="90">SH</th>
        <th width="75">TTKT</th>
        <th width="100">GHI CHÚ</th>
    </tr>';

$i = 1;
$yfrom = $from_year;
$mfrom = sprintf('%02d', $from_month);
$dfrom = '01';
$yto = $to_year;
$mto = sprintf('%02d', $to_month);
$dto = '31';

$sql1 = "SELECT `sohs`,`tenmay`,`congviec`,date_format(`ngayhc`,'%d/%m/%Y') as ngayhc,date_format(`ngayhctt`,'%d/%m/%Y') as ngayhctt,`nhanvien`,`noithuchien`,`ttkt` FROM `hosohckd_iso` WHERE ngayhc BETWEEN '$yfrom-$mfrom-$dfrom 00:00:00' AND '$yto-$mto-$dto 23:59:59' AND ttkt ='Tốt' order by `noithuchien` asc,`ttkt` desc,`ngayhc` asc,`sohs` asc";
$result = mysql_query($sql1);
while($row = mysql_fetch_array($result)) {
        $sohs = $row['sohs'];
        $tenmay = $row['tenmay'];
        $congviec = $row['congviec'];
        $ngayhc = $row['ngayhc'];
        $ngayhctt = $row['ngayhctt'];
        $nhanvien = $row['nhanvien'];
        $noith = $row['noithuchien'];
        if($noith == "XNKT") $noith = "XNCD";
        if($noith == "XSCCMDVL") $noith = "XSCTBDVL";
        $tinhtrangkt = $row['ttkt'];

        $tenviettat = '';
        $somay = '';
        $bophansh = '';
        $chusohuu = '';
        $sql3 = mysql_query("SELECT * FROM thietbihckd_iso WHERE mavattu='".mysql_real_escape_string($tenmay)."'");
        if($row3 = mysql_fetch_array($sql3)) {
                $tenviettat = $row3['tenviettat'];
                $somay = $row3['somay'];
                $bophansh = $row3['bophansh'];
                $chusohuu = $row3['chusohuu'];
        }

        echo '<tr>
                <td style="text-align:center">'.$i.'</td>
                <td style="text-align:left;padding-left:8px">'.($tinhtrangkt=="Tốt" ? $sohs : '').'</td>
                <td style="text-align:center">'.$tenviettat.'</td>
                <td style="text-align:center">'.$somay.'</td>
                <td style="text-align:center">'.$congviec.'</td>
                <td style="text-align:center">'.($tinhtrangkt=="Tốt" ? $ngayhc : '').'</td>
                <td style="text-align:center">'.($tinhtrangkt=="Tốt" ? $ngayhctt : '').'</td>
                <td style="text-align:left;padding-left:8px">'.($tinhtrangkt=="Tốt" ? mb_convert_case($nhanvien, MB_CASE_TITLE, "UTF-8") : '').'</td>
                <td style="text-align:center">'.$noith.'</td>
                <td style="text-align:left">'.($bophansh=="XDT" ? $chusohuu : $bophansh).'</td>
                <td style="text-align:center">'.$tinhtrangkt.'</td>
                <td style="text-align:center">'.($tinhtrangkt=="Hỏng" ? $tinhtrangkt : '').'</td>
        </tr>';
        $i++;
}
echo '</table>';




exit;
