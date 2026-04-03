<?php
include ("select_data.php") ;
include ("myfunctions.php") ;
ob_start();
echo"<head>

<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />

<style type=\"text/css\">
<!--
.table1
{
border-collapse:collapse;
width:100%;
border:1px dotted black;
}
.table1 td
{
border:1px dotted black;
text-align:left;
}

.table1 th 
{
border:1px dotted black;
font-weight: bold;
background-color:#87CEEB;
}

body,td,th {
	font-family: Times New Roman, Times, serif;
}
.style1 {
	font-size: 18px;
	font-weight: bold;
}
.datetime {
font-size: 14px;
width:150px;
height:30px;
border:1px dotted #aaa;
background-clip: padding-box;
padding-left:8px; 
}
#searchid
{
    width:300px;
    border:dotted 1px #000;
    padding:5px;
    font-size:12px;
}
#result
    {
        position:absolute;
        width:300px;
        padding:10px;
        display: block;
        margin-top:-1px;
        border-top:0px;
        overflow:hidden;
        border:1px #CCC dotted;
        background-color: white;
	
    }
    .show
    {
        padding:10px; 
        border-bottom:1px #999 dashed;
        font-size:15px; 
        height:20px;
    }
    .show:hover
    {
        background:#4c66a4;
        color:#FFF;
        cursor:pointer;
    }


</style>


</head>


</script>

";
        $tenvt="";
	$cv="";
	$mavattu="";
	$somay="";
	$model="";
	$ngayth="";
	$ngaykt="";
	$hoso="";
	$ttktafter="";

if ($_GET['s'] && $_GET['f']) {

			$in_search = addslashes(stripslashes($_GET['s']));
			$in_search_field = $_GET['f'];
			$where_search = "and $in_search_field LIKE '%$in_search%'";
		}else $where_search="";
		if ($_GET['from'] && $_GET['to']){
			$from = $_GET['from'];
			$to = $_GET['to'];
			for ($i=0;$i<=strlen($from);$i++) {
			$p = stripos($from,"/") ;

			if ($i== 0) {
			$dfrom = trim (substr($from,0,$p)) ;
			} 	
			if ($i== 1) {
			$mfrom = trim (substr($from,0,$p)) ;
			} 	
			if ($i== 2) {
			$yfrom = trim ($from) ;
			} 	
			$p++ ;
			$from = substr($from,$p);
				}
			for ($i=0;$i<=strlen($to);$i++) {
			$p = stripos($to,"/") ;

			if ($i== 0) {
			$dto = trim (substr($to,0,$p)) ;
			} 	
			if ($i== 1) {
			$mto = trim (substr($to,0,$p)) ;
			} 	
			if ($i== 2) {
			$yto = trim ($to) ;
			} 	
			$p++ ;
			$to = substr($to,$p);
				}
			$month_string  = "WHERE ngaykt BETWEEN '$yfrom-$mfrom-$dfrom 00:00:00' AND '$yto-$mto-$dto 00:00:00' ";
			$tenfile="thongke";
			$ngayt="$dfrom/$mfrom/$yfrom";
			$ngayd="$dto/$mto/$yto";
		}else{	
			$m = date('m');
			$y = date('Y');
			$month_string = "WHERE ngaykt BETWEEN '$y-$m-01 00:00:00' AND '$y-$m-31 00:00:00'";
			$tenfile="thongke";
			$ngayt="01/$m/$y";
			$ngayd="31/$m/$y";
		}
echo"<body>

XN ĐỊA VẬ LÝ GK &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <b> LIỆT KÊ CÔNG TÁC BẢO DƯỠNG, SỬA CHỮA, CHUẨN CHỈNH THIẾT BỊ</b>
<br/>XƯỞNG SCTBDVL 

<br/>
<br/>
<table width=\"1100\" height=\"160\" border=\"1\" class=\"table1\">
  <tr>
     <th width=\"35\" height=\"61\">Stt</br>
    DV</th>
    <th width=\"60\">№ Yêu cầu DV</th>
    <th width=\"75\">Số HS </th>
    <th width=\"150\">Tên TB </th>
    <th width=\"83\">Số</th>
    <th width=\"58\">C.Việc</th>
    <th width=\"88\">Ngày hoàn thành </th>
    <th width=\"300\">Hỏng hóc</th>
    <th width=\"300\">Khắc phục</th>
    <th width=\"70\">Tình trạng KT </th>
  </tr>";
    $sqlmaql=mysql_query("SELECT DISTINCT maql  FROM hososcbd_iso  $month_string $where_search order by nhomsc desc");
		$stt=1;	
    while($row= mysql_fetch_array($sqlmaql))
	{
	$maql=$row['maql'];
echo"   <tr>
    <td style=\"text-align:center\">&nbsp;$stt </td>
    <td colspan=\"9\">&nbsp; $maql</td>
    </tr>";
    $stt++;
	        $tsum=0;	
    $sql="SELECT `maql`,`hoso`,`mavt`,`somay`,`madv`,`cv`,`model`,`honghoc`,`khacphuc`,date_format(`ngayth`,'%d/%m/%Y') as ngayth,date_format(`ngaykt`,'%d/%m/%Y') as ngaykt,datediff(ngaykt,ngayth) as ngaysc,`ttktafter` FROM `hososcbd_iso` $month_string and maql='$maql'  $where_search and ngaykt!='0000-00-00' ORDER by hoso";
$result = mysql_query($sql);
$i=1;
$ghichu="";
while($row = mysql_fetch_array($result))
{
	$hoso=$row['hoso'];
	$madv=$row['madv'];
	$cv=$row['cv'];
	$honghoc=$row['honghoc'];
	$khacphuc=$row['khacphuc'];
	$mavattu=$row['mavt'];
	$somay=$row['somay'];
	$model=$row['model'];
	$ngayth=$row['ngayth'];
	$ngaykt=$row['ngaykt'];
	$ngaysc=$row['ngaysc'];
	$ttktafter=$row['ttktafter'];
	if($cv=="SC") $honghoct=$honghoc; else $honghoct="";
$sql1=mysql_query("SELECT tenvt  FROM thietbi_iso WHERE mavt='$mavattu' and somay='$somay' and model='$model' ");
    while($row= mysql_fetch_array($sql1))
	{
		$tenvt = $row['tenvt'];
	}
    $sqlng=mysql_query("SELECT hoten,giolv  FROM ngthuchien_iso WHERE mahoso='$hoso' ");
    $sh="";
    $giolv="";
    $sum=0;
    while($row= mysql_fetch_array($sqlng))
	{
		$hoten = $row['hoten'];
		$ar=explode(" ",$hoten);
		$k=count($ar);
		if ($hoten=="VŨ ANH ĐỨC") $ar[$k-1]="A.ĐỨC";
		if ($hoten=="ĐOÀN MINH ĐỨC") $ar[$k-1]="M.ĐỨC";
		$temp= $ar[$k-1];
		$temp = mb_strtolower($temp, mb_detect_encoding($temp));
		$temp=ucfirst($temp);
		if ($temp=="A.đức") $temp="A.Đức";
		if ($temp=="M.đức") $temp="M.Đức";
		if($sh==""){
			$sh=$temp;
		}
		else {
			$sh=$sh.",".$temp;
		}
		$giolv = $row['giolv'];
		$sum=$sum + $giolv;

	}
    $tsum=$tsum+$sum;
    if (($giolv!="")&&($sh!="")) $ht="$sh:$giolv";
echo"    <tr>
    <td colspan=\"2\" style=\"text-align:right\">$i &nbsp;&nbsp;&nbsp;</td>
    	<td style=\"text-align:left;padding-left:8px\">$hoso</td>
    	<td style=\"text-align:left;padding-left:8px\">$mavattu-$tenvt</td>
	<td style=\"text-align:left;padding-left:8px\">$somay</td>
	<td style=\"text-align:left;padding-left:8px\">$cv</td>
	<td style=\"text-align:left;padding-left:8px\">$ngaykt</td>
	<td style=\"text-align:left;padding-left:8px\">$honghoc</td>
	<td style=\"text-align:left;padding-left:8px\">$khacphuc</td>
	<td style=\"text-align:left;padding-left:8px\">$ttktafter</td>
	</tr>";
    $i++;
    

}
$tongmay=$tongmay +$i-1;
	}
    $donhang=$donhang+$stt-1;
    echo "<tr>
          <td height=\"25\" colspan=\"10\">&nbsp;<b> Tổng số đơn hàng : $donhang</b></td>
	  </tr>";
    echo "<tr>
          <td height=\"25\" colspan=\"10\">&nbsp;<b> Tổng số máy : $tongmay</b></td>
	  </tr>";
echo"</table>";

echo "</body>
					";
 
header("Content-Type: application/excel");
header("Content-Disposition:attchment;filename=\"$tenfile.xls\""); 
header("Pragma: no-cache");
header("Expires: 0");
exit;

ob_flush();

?>
