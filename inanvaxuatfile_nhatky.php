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
    
	$in_search="";

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
			$month_string  = "WHERE ngaynk BETWEEN '$yfrom-$mfrom-$dfrom 00:00:00' AND '$yto-$mto-$dto 00:00:00' ";
			if($in_search=="") $temp="All"; 
			else $temp=$in_search;
			$tenfile="thongkenhatky_$in_search";
			$ngayt="$dfrom/$mfrom/$yfrom";
			$ngayd="$dto/$mto/$yto";
		}else{	
			$m = date('m');
			$y = date('Y');
			$month_string = "WHERE ngaynk BETWEEN '$y-$m-01 00:00:00' AND '$y-$m-31 00:00:00'";
			if($in_search=="") $temp="All"; 
			else $temp=$in_search;
			$tenfile="thongkenhatky_$in_search";
			$ngayt="01/$m/$y";
			$ngayd="31/$m/$y";
		}
		
echo"<body>

&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <b> THỐNG KÊ NHẬT KÝ HÀNG NGÀY - XƯỞNG SCTB ĐỊA VẬT LÝ</b>
<br/>
<br/>
<br/>";
if($in_search!="") {
echo"<b>Họ Tên : $in_search</b>";

echo"<table width=\"1100\" height=\"160\" border=\"1\" class=\"table1\">
  <tr>
    <th width=\"50\" height=\"60\">STT</th>
    <th width=\"120\">Ngày/Tháng/Năm</th>
    <th width=\"100\">Giờ</th>
    <th width=\"930\"><center>Nội dung công việc</center></th>  
  </tr>";
    
$stt=0;	
$sql="SELECT `ngaynk`, `gio1`, `noidungcv1` ,`gio2`,`noidungcv2`,`gio3`, `noidungcv3` ,`gio4`,`noidungcv4`,`gio5` ,`noidungcv5`,`gio6` ,`noidungcv6`,`gio7` ,`noidungcv7`,`gio8` ,`noidungcv8`,`gio9` ,`noidungcv9`,`gio10` ,`noidungcv10`  FROM `nhatky_iso`  $month_string $where_search order by ngaynk";
$result = mysql_query($sql);

while($row = mysql_fetch_array($result))
{
$stt++;
$ngaynk=$row['ngaynk'];
$ngaynk=date_create($ngaynk);
$ngaynk=  date_format($ngaynk,"d/m/Y");
$gio1=$row["gio1"];
$noidungcv1=$row["noidungcv1"];
echo"<tr>    
	<td style=\"text-align:left;padding-left:8px\">$stt</td>
	<td style=\"text-align:left;padding-left:8px\">$ngaynk</td>
	<td style=\"text-align:left;padding-left:8px\">$gio1</td>
	<td style=\"text-align:left;padding-left:8px\">$noidungcv1</td>
	</tr>";
for($i=2;$i<=10;$i++) {
$gio[$i]=$row["gio$i"];
$noidungcv[$i]=$row["noidungcv$i"];
if($gio[$i]!="") {
echo"<tr>    
	<td style='border:0px solid white'></td><td style='border:0px solid white'></td><td style=\"text-align:left;padding-left:8px\">$gio[$i]</td>
	<td style=\"text-align:left;padding-left:8px\">$noidungcv[$i]</td>
	</tr>";
}
}
}
	}else {
		echo"<table width=\"1100\" height=\"160\" border=\"1\" class=\"table1\">
  <tr>
    <th width=\"50\" height=\"60\">STT</th>
	<th width=\"150\">Họ Tên</th>
    <th width=\"120\">Ngày/Tháng/Năm</th>
    <th width=\"100\">Giờ</th>
    <th width=\"880\"><center>Nội dung công việc</center></th>  
  </tr>";
    
$stt=0;	
$sql="SELECT `hoten`,`ngaynk`, `gio1`, `noidungcv1` ,`gio2`,`noidungcv2`,`gio3`, `noidungcv3` ,`gio4`,`noidungcv4`,`gio5` ,`noidungcv5`,`gio6` ,`noidungcv6`,`gio7` ,`noidungcv7`,`gio8` ,`noidungcv8`,`gio9` ,`noidungcv9`,`gio10` ,`noidungcv10`  FROM `nhatky_iso`  $month_string $where_search order by ngaynk";
$result = mysql_query($sql);

while($row = mysql_fetch_array($result))
{
$stt++;
$ngaynk=$row['ngaynk'];
$ngaynk=date_create($ngaynk);
$ngaynk=  date_format($ngaynk,"d/m/Y");
$gio1=$row["gio1"];
$hoten=$row["hoten"];
$noidungcv1=$row["noidungcv1"];
echo"<tr>    
	<td style=\"text-align:left;padding-left:8px\">$stt</td>
	<td style=\"text-align:left;padding-left:8px\">$hoten</td>
	<td style=\"text-align:left;padding-left:8px\">$ngaynk</td>
	<td style=\"text-align:left;padding-left:8px\">$gio1</td>
	<td style=\"text-align:left;padding-left:8px\">$noidungcv1</td>
	</tr>";
for($i=2;$i<=10;$i++) {
$gio[$i]=$row["gio$i"];
$noidungcv[$i]=$row["noidungcv$i"];
if($gio[$i]!="") {
echo"<tr>    
	<td style='border:0px solid white'></td><td style='border:0px solid white'></td><td style='border:0px solid white'></td><td style=\"text-align:left;padding-left:8px\">$gio[$i]</td>
	<td style=\"text-align:left;padding-left:8px\">$noidungcv[$i]</td>
	</tr>";
}
}
}
	}

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
