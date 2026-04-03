<?php
include ("select_data.php") ;
include ("myfunctions.php") ;
ob_start();
$readhoso = isset($_GET['readhoso']) ? $_GET['readhoso'] : '';
$tenthietbisql9 = mysql_query("SELECT * FROM hososcbd_iso WHERE hoso='$readhoso'") ;
while($row = mysql_fetch_array($tenthietbisql9))
{
	$mavattu=$row['mavt'];
	$ngaykt=$row['ngaykt'];
	$somay=$row['somay'];
	$model=$row['model'];
	$nhomsc=$row['nhomsc'];
	$dong=$row['dong'];
	$noidung=$row['noidung'];
	$dong=$row['dong'];
	$ketluan=$row['ketluan'];
	$tbdosc[1]=$row['tbdosc'];
	$serialtbdosc[1]=$row['serialtbdosc'];
	$tbdosc[2]=$row['tbdosc1'];
	$serialtbdosc[2]=$row['serialtbdosc1'];
	$tbdosc[3]=$row['tbdosc2'];
	$serialtbdosc[3]=$row['serialtbdosc2'];
	$tbdosc[4]=$row['tbdosc3'];
	$serialtbdosc[4]=$row['serialtbdosc3'];
	$tbdosc[5]=$row['tbdosc4'];
	$serialtbdosc[5]=$row['serialtbdosc4'];
}
$sql=mysql_query("SELECT dienap,homay  FROM thietbi_iso WHERE mavt='$mavattu' and somay='$somay' and model='$model' ");
    while($row= mysql_fetch_array($sql))
	{
		$dienap = $row['dienap'];
		$homay = $row['homay'];
	}
    if ($nhomsc=="CNC") $hoten="";
    else $hoten="";
        /*$hoten="";
$sqlng=mysql_query("SELECT hoten  FROM ngthuchien_iso WHERE mahoso='$readhoso' ORDER BY stt ASC LIMIT 1");
    while($row= mysql_fetch_array($sqlng))
	{
		$hoten = $row['hoten'];
	}*/

    //$ngaystemp=date("d-m-Y");
   $ngaystemp=date("d-m-Y", strtotime($ngaykt)); 
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	$p = stripos($ngaystemp,"-") ;

if ($i== 0) {
	$ngayt = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 1) {
	$thangt = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 2) {
	$namt = trim ($ngaystemp) ;
} 	
$p++ ;
$ngaystemp = substr($ngaystemp,$p);
}

if($model==""){
	$mavattuht=$mavattu;
}else{
	$mavattuht="$mavattu-$model";
}



echo"
<html >
<head>
<meta http-equiv=Content-Type content=\"text/html;charset=UTF-8\">
<head>
    <style>
@media print {
.footer {
    bottom: 0;
    position: fixed;
}

  .page-break{ page-break-before:always; }
}
    </style>
  </head>
<body style=\"padding-bottom:50px\">
";
//echo"<div class=\"wrapper\">";
echo"<span lang=VI
style='font-size:14.0pt;'><b >&nbsp;&nbsp;&nbsp;XN Địa vật lý GK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PHIẾU KIỂM TRA TÌNH TRẠNG KỸ THUẬT </b></span></br>

<b><span lang=VI
style='font-size:14.0pt;color:black;mso-themecolor:text1;mso-ansi-language:
VI'>&nbsp;&nbsp;&nbsp;X&#432;&#7903;ng SCTBĐVL<span style='mso-tab-count:4'></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CỦA THIẾT BỊ SAU KHI BD/SC<o:p></o:p></span></b></br>

<span lang=VI
style='font-size:12.0pt;color:black;mso-themecolor:text1;mso-ansi-language:
VI'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Số hồ sơ: </span><span style='font-weight:bold;font-size:12pt'>$readhoso</span></br>
<table>
<tr><td style=\"font-size:12pt;width:380px;\">1. Tên máy: <span style=\"font-size:12pt;font-weight:bold\">&nbsp;&nbsp;&nbsp;$mavattuht</span></td><td style=\"font-size:12pt\">Số máy: <span style=\"font-size:12pt;font-weight:bold\">&nbsp;&nbsp;&nbsp;$somay</span></td>

<tr><td style=\"font-size:12pt;width:380px;\">2. Họ máy: <span style=\"font-size:12pt;font-weight:bold\">&nbsp;&nbsp;&nbsp;$homay</span></td><td style=\"font-size:12pt\">Model: <span style=\"font-size:12pt;font-weight:bold\">&nbsp;&nbsp;&nbsp;$model</span></td>

<tr><td style=\"font-size:12pt;width:380px;\">3. Điện áp nuôi: <span style=\"font-size:12pt;font-weight:bold\">&nbsp;&nbsp;&nbsp;$dienap</span></td><td style=\"font-size:12pt\">Dòng tiêu thụ: <span style=\"font-size:12pt;font-weight:bold\">&nbsp;&nbsp;&nbsp;$dong</span></td>

<tr><td style=\"font-size:12pt;width:380px;\">4. Các thiết bị và phần mềm phụ trợ: </td>
</table>";

echo"<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 width=680
 style='width:488pt;margin-left:11pt;border-collapse:collapse;border:none;
 mso-border-alt:solid windowtext .5pt;mso-yfti-tbllook:1184;mso-padding-alt:
 0in 5.4pt 0in 5.4pt;mso-border-insideh:.5pt solid windowtext;mso-border-insidev:
 .5pt solid windowtext'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:12.95pt'>
  <td width=53 valign=top style='width:40.0pt;border:solid windowtext 1.0pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:12.95pt'>
  <p class=MsoNormal align=center style='margin-top:0in;margin-right:-5.4pt;
  margin-bottom:0in;margin-left:2.15pt;margin-bottom:.0001pt;text-align:center;
  text-indent:-2.15pt'><span style='font-size:12.0pt;color:black;mso-themecolor:
  text1'>STT<o:p></o:p></span></p>
  </td>
  <td width=319 valign=top style='width:239.0pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:12.95pt'>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:12.0pt;color:black;mso-themecolor:text1'>Tên thiết bị hoặc phần mềm<o:p></o:p></span></p>
  </td>
  <td width=308 valign=top style='width:200.95pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:12.95pt'>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:12.0pt;color:black;mso-themecolor:text1'>Số thiết bị<o:p></o:p></span></p>
  </td>
  </tr>";
  for ($i=1;$i<6;$i++) {
	  if ($tbdosc[$i]!="") {
  echo"<tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes;height:13.6pt'>
  <td width=53 valign=top style='width:40.0pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:13.6pt'>
  <p class=MsoNormal><span style='font-size:12.0pt;color:black;mso-themecolor:
  text1'><o:p>$i</o:p></span></p>
  </td>
  <td width=319 valign=top style='width:239.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:13.6pt'>
  <p class=MsoNormal><span style='font-size:12.0pt;color:black;mso-themecolor:
  text1'><o:p>$tbdosc[$i]</o:p></span></p>
  </td>
  <td width=308 valign=top style='width:200.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:13.6pt'>
  <p class=MsoNormal><span style='font-size:12.0pt;color:black;mso-themecolor:
  text1'><o:p>$serialtbdosc[$i]</o:p></span></p>
  </td>
  </tr>";
	  }
  }
  echo"</table></br>";
  echo"<span style='margin-left:5px'>5. Nội dung kiểm tra:</span></br>";
  if($noidung!=""){ 
  $noidung= str_replace("<p>","<p style='margin:0in;margin-bottom:.0001pt'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;","$noidung");
  echo"	<span style='font-size:12.0pt;color:black;'>$noidung </span>";
  }
	if (file_exists("./TLKT/$mavattu/finaltest.jpg"))
	echo"&nbsp;&nbsp;&nbsp;<img src=\"./TLKT/$mavattu/finaltest.jpg\">";
  if ($ketluan!="")
  	  $ketluan= str_replace("<p>","<p style='margin:0in;margin-bottom:.0001pt'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;","$ketluan");


echo"</br><span style='margin-left:5px'>6.&nbsp;&nbsp;B&#7843;ng s&#7889; li&#7879;u ho&#7863;c file
d&#7919; li&#7879;u c&#7911;a &#273;&#432;&#7901;ng log (Nếu có).</span></br>";
$sqlsl=mysql_query("SELECT link  FROM bangsolieu_iso WHERE sohoso='$readhoso' ");
    while($row= mysql_fetch_array($sqlsl))
	{
		$link = $row['link'];
		echo"<span style='font-size:12.0pt;line-height:150%;color:black;mso-themecolor:text1'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;File đính kèm: $link</span></br>";

	}

echo"<span style='margin-left:5px'>7.&nbsp;&nbsp;K&#7871;t lu&#7853;n:</span>$ketluan ";
echo"</br></br>";
echo"<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 width=680
 style='width:488pt;margin-left:11pt;border-collapse:collapse;border:none;
 mso-border-alt:solid windowtext .5pt;mso-yfti-tbllook:1184;mso-padding-alt:
 0in 5.4pt 0in 5.4pt;mso-border-insideh:.5pt solid windowtext;mso-border-insidev:
 .5pt solid windowtext'>
  <td width=113 style='width:85.1pt;border:solid windowtext 1.0pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:36.9pt'>
  <p class=MsoNormal style='margin-right:-5.85pt'><span style='font-size:12.0pt;
  color:black;mso-themecolor:text1'>Ng&#432;&#7901;i th&#7921;c hi&#7879;n<o:p></o:p></span></p>
  </td>
  <td width=276 style='width:206.95pt;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:36.9pt'>
  <p class=MsoNormal style='margin-right:-5.35pt'><span style='font-size:12.0pt;
  color:black;mso-themecolor:text1'>H&#7885; và tên:<sub> ………………………………..……...…...…</sub><o:p></o:p></span></p>
  </td>
  <td width=158 style='width:118.7pt;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:36.9pt'>
  <p class=MsoNormal style='margin-right:-5.75pt'><span style='font-size:12.0pt;
  color:black;mso-themecolor:text1'>Ch&#7919; ký:<sub> …………………….<o:p></o:p></sub></span></p>
  </td>
  <td width=132 valign=top style='width:98.75pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:36.9pt'>
  <p class=MsoNormal><span style='font-size:13.0pt;color:black;mso-themecolor:
  text1'>Ngày:</span><sub><span style='font-size:12.0pt;color:black;mso-themecolor:
  text1'> ………/………/………</span></sub><span style='font-size:12.0pt;color:black;
  mso-themecolor:text1'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes;height:36.9pt'>
  <td width=113 style='width:85.1pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:36.9pt'>
  <p class=MsoNormal style='margin-right:-5.85pt'><span style='font-size:12.0pt;
  color:black;mso-themecolor:text1'>Ng&#432;&#7901;i ki&#7875;m tra<o:p></o:p></span></p>
  </td>
  <td width=276 style='width:206.95pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:36.9pt'>
  <p class=MsoNormal style='margin-right:-5.35pt'><span style='font-size:12.0pt;
  color:black;mso-themecolor:text1'>H&#7885; và tên: <sub>…………….………………………….……</sub><o:p></o:p></span></p>
  </td>
  <td width=158 style='width:118.7pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:36.9pt'>
  <p class=MsoNormal style='margin-right:-5.75pt'><span style='font-size:12.0pt;
  color:black;mso-themecolor:text1'>Ch&#7919; ký:<sub> ……………………</sub><o:p></o:p></span></p>
  </td>
  <td width=132 valign=top style='width:98.75pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:36.9pt'>
  <p class=MsoNormal><span style='font-size:13.0pt;color:black;mso-themecolor:
  text1'>Ngày:</span><sub><span style='font-size:12.0pt;color:black;mso-themecolor:
  text1'> ………/………/………</span></sub><span style='font-size:12.0pt;color:black;
  mso-themecolor:text1'><o:p></o:p></span></p>
  </td>
 </tr>
</table>";
 //echo"<div class=\"page-break\"></div>";
 echo "</br></br></br></br>";
 echo"<div class=\"footer\">BM.25.04</br>01/01/2024</div>
</body>

</html>";
/*header("Content-Type: application/msword");
header("Content-Disposition:attchment;filename=\"$readhoso-PKTSC.doc\""); 
header("Pragma: no-cache");
header("Expires: 0");
exit;
 */
ob_flush();
?>
