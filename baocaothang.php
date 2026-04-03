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
			$tenfile="baocaothang-$mto-$yto";
			$ngayt="$dfrom/$mfrom/$yfrom";
			$ngayd="$dto/$mto/$yto";
			$ngaytt="$yfrom-$mfrom-$dfrom";
			$ngaydd="$yto-$mto-$dto";
		}else{	
			$m = date('m');
			$y = date('Y');
			$month_string = "WHERE ngaykt BETWEEN '$y-$m-01 00:00:00' AND '$y-$m-31 00:00:00'";
			$tenfile="baocaothang-$m-$y";
			$ngayt="01/$m/$y";
			$ngayd="31/$m/$y";
			$ngaytt="$y-$m-01";
			$ngaydd="$y-$m-31";
		}
echo"<body>

XN ĐỊA VẬ LÝ GK &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <b> LIỆT KÊ CÔNG TÁC BẢO DƯỠNG, SỬA CHỮA, CHUẨN CHỈNH THIẾT BỊ</b>
<br/>XƯỞNG SCTBĐVL &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Từ $ngayt đến $ngayd 

<br/>
<br/>
<table width=\"1100\" height=\"160\" border=\"1\" class=\"table1\">
  <tr>
     <th width=\"35\" height=\"61\">Stt</br>
    DV</th>
    <th width=\"60\">№ Yêu cầu DV</th>
    <th width=\"75\">Số HS </th>
    <th width=\"185\">Tên TB </th>
    <th width=\"83\">Số</th>
    <th width=\"58\">C.Việc</th>
    <th width=\"88\">Ngày thực hien </th>
    <th width=\"88\">Ngày hoàn thành </th>
    <th width=\"100\">Nhân viên </th>
    <th width=\"90\">Tình trạng KT </th>
    <th width=\"120\">Hỏng hóc</th>
    <th width=\"65\">TS.GIỜ</th>
    <th width=\"65\">Bộ phận</th>
  </tr>";
echo"  <tr>
       <td height=\"45\" colspan=\"10\">&nbsp;<b> Nhóm điện tử </b></td>
       </tr>";
		$donhang=0;
		$tongmay=0;  
	/*	
		$sqlmaql=mysql_query("SELECT DISTINCT maql  FROM hososcbd_iso  $month_string $where_search and nhomsc='RDNGA' ");
$stt=1;		
    while($row= mysql_fetch_array($sqlmaql))
	{
	$maql=$row['maql'];
echo"   <tr>
    <td style=\"text-align:center\">$stt</td>
    <td colspan=\"9\">&nbsp; $maql</td>
    </tr>";
    $stt++;
$sql="SELECT `hoso`,`mavt`,`somay`,`cv`,`model`,`honghoc`,date_format(`ngayth`,'%d-%m-%Y') as ngayth,date_format(`ngaykt`,'%d-%m-%Y') as ngaykt,datediff(ngaykt,ngayth) as ngaysc,`ttktafter` FROM `hososcbd_iso` $month_string and maql='$maql' and ngaykt!='0000-00-00' ORDER by hoso";
$result = mysql_query($sql);
$i=1;
$ghichu="";
while($row = mysql_fetch_array($result))
{
	$hoso=$row['hoso'];
	$cv=$row['cv'];
	$honghoc=$row['honghoc'];
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
		if ($hoten=="Saransev SN") $ar[$k-1]="Saransev";
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
		$sum=$sum+$giolv;
	}
    //if (($giolv!="")&&($sh!="")) $ht="$sh:$giolv";
echo"    <tr>
    	<td colspan=\"2\" style=\"text-align:right\">$i &nbsp;&nbsp;&nbsp;</td>
    	<td style=\"text-align:center\">$hoso</td>
    	<td style=\"text-align:left;padding-left:8px\">$mavattu-$tenvt</td>
	<td style=\"text-align:center\">$somay</td>
	<td style=\"text-align:center\">$cv</td>
	<td style=\"text-align:center\">$ngaykt</td>
	<td style=\"text-align:left;padding-left:8px\">$sh</td>
	<td style=\"text-align:center\">$ttktafter</td>
	<td style=\"text-align:left\">$honghoct</td>
	<td style=\"text-align:center\">$sum</td>
		 
	</tr>";
    $i++;
}
    $tongmay=$tongmay +$i-1;
	}
    $donhang=$stt-1;
echo"  <tr>
    <td height=\"45\" colspan=\"10\">&nbsp;<b> 2. Nhóm công nghệ cao </b></td>
    
    </tr>";
	 
    $sqlmaql=mysql_query("SELECT DISTINCT maql  FROM hososcbd_iso  $month_string $where_search and nhomsc='CNC' ");
	 */
    $sqlmaql=mysql_query("SELECT DISTINCT maql  FROM hososcbd_iso  $month_string $where_search or ngayth!='0000-00-00' and ngaykt ='0000-00-00' order by nhomsc desc,`hoso` desc");
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
			$sql="SELECT `maql`,`hoso`,`mavt`,`somay`,`madv`,`cv`,`model`,`honghoc`,`ghichufinal`,date_format(`ngayth`,'%d/%m/%Y') as ngayth,date_format(`ngaykt`,'%d/%m/%Y') as ngaykt,datediff(ngaykt,ngayth) as ngaysc,`ttktafter` FROM `hososcbd_iso` $month_string  and ngayth!='0000-00-00' and maql='$maql' $where_search or ngaykt='0000-00-00' and ngayth!='0000-00-00' and maql='$maql' $where_search ORDER by hoso";
//$sql="SELECT `maql`,`hoso`,`mavt`,`somay`,`madv`,`cv`,`model`,`honghoc`,date_format(`ngayth`,'%d/%m/%Y') as ngayth,date_format(`ngaykt`,'%d/%m/%Y') as ngaykt,datediff(ngaykt,ngayth) as ngaysc,`ttktafter` FROM `hososcbd_iso` $month_string and maql='$maql'  $where_search and ngaykt!='0000-00-00' ORDER by hoso";
//$sql="SELECT `maql`,`hoso`,`mavt`,`somay`,`madv`,`cv`,`model`,`honghoc`,date_format(`ngayth`,'%d/%m/%Y') as ngayth,date_format(`ngaykt`,'%d/%m/%Y') as ngaykt,datediff(ngaykt,ngayth) as ngaysc,`ttktafter` FROM `hososcbd_iso` $month_string and maql='$maql'  $where_search or ngayth!='0000-00-00' and ngaykt ='0000-00-00' ORDER by hoso";
$result = mysql_query($sql);
$i=1;
$ghichu="";
while($row = mysql_fetch_array($result))
{
	$hoso=$row['hoso'];
	$madv=$row['madv'];
	$cv=$row['cv'];
	$honghoc=$row['honghoc'];
	$mavattu=$row['mavt'];
	$somay=$row['somay'];
	$model=$row['model'];
	$ngayth=$row['ngayth'];
	$ngaykt=$row['ngaykt'];
	$ngaysc=$row['ngaysc'];
	$ttktafter=$row['ttktafter'];
	$ghichufinal=$row['ghichufinal'];
	if($cv=="SC") $honghoct=$honghoc; else $honghoct="";
	if ($ttktafter=="Chưa kết luận") $ttktafter=$ghichufinal;
	if ($ttktafter=="Tốt") $ttktafter="Đạt";
	if ($ttktafter=="Hỏng") $ttktafter="Hỏng-Không khắc phục được ";
    if($ngaykt=="00/00/0000") $ngaykt="Đang TH";
		
$sql1=mysql_query("SELECT tenvt  FROM thietbi_iso WHERE mavt='$mavattu' and somay='$somay' and model='$model' ");
    while($row= mysql_fetch_array($sql1))
	{
		$tenvt = $row['tenvt'];
	}
      $sqlng=mysql_query("SELECT hoten,giolv,giolv1,giolv2,giolv3,giolv4,giolv5,giolv6,giolv7,giolv8,giolv9,giolv10,giolv11,giolv12  FROM ngthuchien_iso WHERE mahoso='$hoso' ");
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
		if ($temp=="đạt") $temp="Đạt";
		if($sh==""){
			$sh=$temp;
		}
		else {
			$sh=$sh.",".$temp;
		}
	$giolv1 = $row['giolv1'];
		$giolv2 = $row['giolv2'];
		$giolv3 = $row['giolv3'];
		$giolv4 = $row['giolv4'];
		$giolv5 = $row['giolv5'];
		$giolv6 = $row['giolv6'];
		$giolv7 = $row['giolv7'];
		$giolv8 = $row['giolv8'];
		$giolv9 = $row['giolv9'];
		$giolv10 = $row['giolv10'];
		$giolv11 = $row['giolv11'];
		$giolv12 = $row['giolv12'];

			if($mto==12) {
	                if($giolv12==0)	
				$giolv=0;
			else 
				$giolv=$giolv12-($giolv11+$giolv10+$giolv9+$giolv8+$giolv7+$giolv6+$giolv5+$giolv4+$giolv3+$giolv2+$giolv1);
			}
			if($mto==11) {
	                if($giolv11==0)	
				$giolv=0;
			else 
				$giolv=$giolv11-($giolv10+$giolv9+$giolv8+$giolv7+$giolv6+$giolv5+$giolv4+$giolv3+$giolv2+$giolv1+$giolv12);
			}
			if($mto==10) {
	                if($giolv10==0)	
				$giolv=0;
			else 
				$giolv=$giolv10-($giolv9+$giolv8+$giolv7+$giolv6+$giolv5+$giolv4+$giolv3+$giolv2+$giolv1+$giolv12+$giolv11);
			}
			if($mto==9) {
	                if($giolv9==0)	
				$giolv=0;
			else 
				$giolv=$giolv9-($giolv8+$giolv7+$giolv6+$giolv5+$giolv4+$giolv3+$giolv2+$giolv1+$giolv12+$giolv11+$giolv10);
			}
			if($mto==8) {
	                if($giolv8==0)	
				$giolv=0;
			else 
				$giolv=$giolv8-($giolv7+$giolv6+$giolv5+$giolv4+$giolv3+$giolv2+$giolv1+$giolv12+$giolv11+$giolv10+$giolv9);
			}
			if($mto==7) {
	                if($giolv7==0)	
				$giolv=0;
			else 
				$giolv=$giolv7-($giolv6+$giolv5+$giolv4+$giolv3+$giolv2+$giolv1+$giolv12+$giolv11+$giolv10+$giolv9+$giolv8);
			}
			if($mto==6) {
	                if($giolv6==0)	
				$giolv=0;
			else 
				$giolv=$giolv6-($giolv5+$giolv4+$giolv3+$giolv2+$giolv1+$giolv12+$giolv11+$giolv10+$giolv9+$giolv8+$giolv7);
			}
			if($mto==5) {
	                if($giolv5==0)	
				$giolv=0;
			else 
				$giolv=$giolv5-($giolv4+$giolv3+$giolv2+$giolv1+$giolv12+$giolv11+$giolv10+$giolv9+$giolv8+$giolv7+$giolv6);
			}
			if($mto==4) {
	                if($giolv4==0)	
				$giolv=0;
			else 
				$giolv=$giolv4-($giolv3+$giolv2+$giolv1+$giolv12+$giolv11+$giolv10+$giolv9+$giolv8+$giolv7+$giolv6+$giolv5);
			}
			if($mto==3) {
	                if($giolv3==0)	
				$giolv=0;
			else 
				$giolv=$giolv3-($giolv2+$giolv1+$giolv12+$giolv11+$giolv10+$giolv9+$giolv8+$giolv7+$giolv6+$giolv5+$giolv4);
			}
			if($mto==2) {
	                if($giolv2==0)	
				$giolv=0;
			else 
				$giolv=$giolv2-($giolv1+$giolv12+$giolv11+$giolv10+$giolv9+$giolv8+$giolv7+$giolv6+$giolv5+$giolv4+$giolv3);
			}
			if($mto==1) {
	                if($giolv1==0)	
				$giolv=0;
			else 
				$giolv=$giolv1-($giolv12+$giolv11+$giolv10+$giolv9+$giolv8+$giolv7+$giolv6+$giolv5+$giolv4+$giolv3+$giolv2);
			}
			if($giolv<0) $giolv=0; 
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
	<td style=\"text-align:left;padding-left:8px\">$ngayth</td>
	<td style=\"text-align:left;padding-left:8px\">$ngaykt</td>
	<td style=\"text-align:left;padding-left:8px\">$sh</td>
	<td style=\"text-align:left;padding-left:8px\">$ttktafter</td>
	<td style=\"text-align:left\">$honghoct</td>
	<td style=\"text-align:center\">$sum</td>
	<td style=\"text-align:center\">$madv</td>
	</tr>";
    $i++;
    

}

$tongmay=$tongmay +$i-1;
if ($i>2) 
    echo "<tr>
	  <td></td>  
	  <td></td>  
	  <td></td>  
	  <td></td>  
	  <td></td>  
	  <td></td>  
	  <td></td>  
	  <td></td>  
	  <td></td>  
	  <td></td>  
          <td style=\"text-align:center\"><b> $tsum</b></td>
	  <td></td>  
	  </tr>"; 
	}
    $donhang=$donhang+$stt-1;
    echo "<tr>
          <td height=\"25\" colspan=\"10\">&nbsp;<b> Tổng số đơn hàng : $donhang</b></td>
	  </tr>";
    echo "<tr>
          <td height=\"25\" colspan=\"10\">&nbsp;<b> Tổng số máy : $tongmay</b></td>
	  </tr>";
echo"</table>

 <p>&nbsp;<b> 3. Công tác Hiệu chuẩn/ Kiểm định thiết bị </b></p>
    
 <table width=\"1100\" height=\"160\" border=\"1\" class=\"table1\">
  <tr>
    <th width=\"60\">STT</th>
    <th width=\"75\">SỐ HỒ S� </th>
    <th width=\"185\">TÊN MÁY </th>
    <th width=\"150\">SỐ MÁY </th>
    <th width=\"83\">C.VIỆC</th>
    <th width=\"58\">Ngày TH</th>
    <th width=\"100\">Ngày Tiếp Theo</th>
    <th width=\"88\">NH.VIÊN </th>
    <th width=\"157\">N�I.TH</th>
    <th width=\"90\">SH </th>
    <th width=\"75\">TTKT</th>
    <th width=\"100\">GHI CHÚ </th>
  </tr>";  
	$i=1;
	$sql1="SELECT `sohs`,`tenmay`,`congviec`,date_format(`ngayhc`,'%d/%m/%Y') as ngayhc,date_format(`ngayhctt`,'%d/%m/%Y') as ngayhctt,`nhanvien`,`noithuchien`,`ttkt` FROM `hosohckd_iso` WHERE ngayhc BETWEEN '$yfrom-$mfrom-$dfrom 00:00:00' AND '$yto-$mto-$dto 00:00:00' AND ttkt ='Tốt' order by `noithuchien` asc,`ttkt` desc,`ngayhc` asc,`sohs` asc";
	$result = mysql_query($sql1);
	while($row = mysql_fetch_array($result))
	{
		$sohs=$row['sohs'];
		$tenmay=$row['tenmay'];
		$congviec=$row['congviec'];
		$ngayhc=$row['ngayhc'];
		$ngayhctt=$row['ngayhctt'];
		$nhanvien=$row['nhanvien'];
		$noith=$row['noithuchien'];
		if($noith=="XNKT") $noith="XNCD";
		if($noith=="XSCCMDVL") $noith="XSCTBDVL";

		$tinhtrangkt =$row['ttkt'];
	$sql3=mysql_query("SELECT *  FROM thietbihckd_iso WHERE mavattu='$tenmay' ");
   	while($row= mysql_fetch_array($sql3))
	{
		$tenviettat = $row['tenviettat'];
		$somay = $row['somay'];
		$bophansh = $row['bophansh'];
		$chusohuu = $row['chusohuu'];
	}

	echo"    <tr>
   
    	<td style=\"text-align:center\">$i</td>
    	<td style=\"text-align:left;padding-left:8px\">"; if($tinhtrangkt=="Tốt"){ echo $sohs; } echo"</td>
	<td style=\"text-align:center\">$tenviettat</td>
	<td style=\"text-align:center\">$somay</td>
	<td style=\"text-align:center\">$congviec</td>
	<td style=\"text-align:center\"> "; if($tinhtrangkt=="Tốt"){ echo $ngayhc; } echo"</td>
	<td style=\"text-align:center\"> "; if($tinhtrangkt=="Tốt"){ echo $ngayhctt; } echo"</td>
	<td style=\"text-align:left;padding-left:8px\">"; if($tinhtrangkt=="Tốt"){ echo mb_convert_case($nhanvien, MB_CASE_TITLE, "UTF-8");  } echo"</td>
	<td style=\"text-align:center\">$noith</td>
	<td style=\"text-align:left\"> "; if($bophansh=="XDT"){ echo $chusohuu; }else{ echo $bophansh; } echo"</td>
	<td style=\"text-align:center\">$tinhtrangkt</td>
	<td style=\"text-align:center\"> "; if($tinhtrangkt=="Hỏng"){ echo $tinhtrangkt; } echo"</td>
	</tr>";
	 $i++; } 
echo "</body>
					";
 
header("Content-Type: application/excel");
header("Content-Disposition:attchment;filename=\"$tenfile.xls\""); 
header("Pragma: no-cache");
header("Expires: 0");
exit;

ob_flush();

?>
