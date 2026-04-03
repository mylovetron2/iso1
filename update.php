<?php
include ("select_data.php") ;
include 'calendar.php';
include ("header_index.php") ;
$cmonth = date("m",time());
$cyear = date("Y",time()); 
$post =  $_POST['post'] ;
$username =  $_POST['username'] ;
$password =  $_POST['password'] ;
if(($post=="")&&($_POST['submit']=="")) {
	$danhso = $_GET['danhso'];
	$donvi = $_GET['donvi'];
	$year1 = $_GET['year'];
	$month1 = $_GET['month'];
	$monthfirst =  $_GET['monthfirst'] ;
	$yearfirst =  $_GET['yearfirst'] ;
	if($month1=="1") {
		$premonth=12;
		$preyear=$year1-1;
	}else{
	$premonth =  $month1-1 ;
	$preyear =  $year1 ;
	}
	$result2 = mysql_query("SELECT  giocongdinhmuc FROM chamcong_giocongdm where month='$month1' and year='$year1'") ;
		while($row = mysql_fetch_array($result2))
		{
		$giocongdinhmuc =$row['giocongdinhmuc'];
		}
}
else {
$danhso =  $_POST['danhso'] ;
$hoten =  $_POST['hoten'] ;
$donvi =  $_POST['donvi'] ;
$month1 =  $_POST['month'] ;
$year1 =  $_POST['year'] ;
if($_POST['first']=="first") {
$monthfirst =  $_POST['month'] ;
$yearfirst =  $_POST['year'] ;
}else{
$monthfirst =  $_POST['monthfirst'] ;
$yearfirst =  $_POST['yearfirst'] ;
}
	if($month1=="1") {
		$premonth=12;
		$preyear=$year1-1;
	}else{
	$premonth =  $month1-1 ;
	$preyear =  $year1 ;
	}
$submit =  $_POST['submit'] ;
$giocongthangtruocchuyenthangnay =  $_POST['giocongthangtruocchuyenthangnay'] ;
if($giocongthangtruocchuyenthangnay=="") $giocongthangtruocchuyenthangnay=0;
$ngaycongthucte =  $_POST['ngaycongthucte'] ;
$giocongthucte =  $_POST['giocongthucte'] ;
//$giocongdinhmuc =  $_POST['giocongdinhmuc'] ;
	$result2 = mysql_query("SELECT  giocongdinhmuc FROM chamcong_giocongdm where month='$month1' and year='$year1'") ;
		while($row = mysql_fetch_array($result2))
		{
		$giocongdinhmuc =$row['giocongdinhmuc'];
		}
$giocongthanhtoanthangnay =  $_POST['giocongthanhtoanthangnay'] ;
$giocongvuotmucchuyenthangsau =  $_POST['giocongvuotmucchuyenthangsau'] ;
$ngayconglamviectrenbo =  $_POST['ngayconglamviectrenbo'] ;
$congbienthangtruoc =  $_POST['congbienthangtruoc'] ;
if($congbienthangtruoc=="") $congbienthangtruoc=0;
$congbienthangnay =  $_POST['congbienthangnay'] ;
$congbiendochai =  $_POST['congbiendochai'] ;
if($congbiendochai=="") $congbiendochai=0;
$lamdemthangtruoc =  $_POST['lamdemthangtruoc'] ;
if($lamdemthangtruoc=="") $lamdemthangtruoc=0;
$lamdemthangnay =  $_POST['lamdemthangnay'] ;
if($lamdemthangnay=="") $lamdemthangnay=0;
$lamthemgio150 =  $_POST['lamthemgio150'] ;
if($lamthemgio150=="") $lamthemgio150=0;
$lamthemgio200 =  $_POST['lamthemgio200'] ;
if($lamthemgio200=="") $lamthemgio200=0;
$ngaylethangtruoc =  $_POST['ngaylethangtruoc'] ;
if($ngaylethangtruoc=="") $ngaylethangtruoc=0;
$ngaylethangnay =  $_POST['ngaylethangnay'] ;
if($ngaylethangnay=="") $ngaylethangnay=0;
$congomthangtruoc =  $_POST['congomthangtruoc'] ;
if($congomthangtruoc=="") $congomthangtruoc=0;
$congomthangnay =  $_POST['congomthangnay'] ;
$songaynghipheptrongthang =  $_POST['songaynghipheptrongthang'] ;
$thoigiandiphep =  $_POST['thoigiandiphep'] ;
$tongsogiovuotmucthangtruoc =  $_POST['tongsogiovuotmucthangtruoc'] ;
$tongsogiovuotmucthangnay =  $_POST['tongsogiovuotmucthangnay'] ;
$ghichu =  $_POST['ghichu'] ;
$ngaycongdinhmuc =  $giocongdinhmuc/8 ;
}
 $index_old =  $_POST['index_old'] ;
if ($index_old=="") $index_old=0;

$result2 = mysql_query("SELECT  hoten FROM resume where danhso='$danhso'") ;
		while($row = mysql_fetch_array($result2))
		{
		$hoten =$row['hoten'];
		}	
		$ngaycongthucte=0;
		for ($i=1;$i<42;$i++) {
			$chamcong =  $_POST["chamcong$i"] ;
			if(($chamcong=="congbien")||($chamcong=="8")||($chamcong=="congtac"))
				$ngaycongthucte++;
			if(($chamcong=="4.5")||($chamcong=="3.5"))
				$ngaycongthucte=$ngaycongthucte +0.5;
                       }
			$giocongthucte=0;
			$temp=0;
			$temp1=0;
			$temp2=0;
		for ($j=1;$j<42;$j++) {
			$chamcong =  $_POST["chamcong$j"] ;
			if(($chamcong=="congbien")||($chamcong=="8")||($chamcong=="congtac")){
				$temp++;
			}
			        
			if($chamcong=="4.5") {
				$temp1++;
			}
			if($chamcong=="3.5") {
				$temp2++;
			}
                       }
			$giocongthucte=$temp*8 +$temp1*4.5 +$temp2*3.5;
		if ($ngaycongthucte>$ngaycongdinhmuc) 
			$giocongthanhtoanthangnay=$giocongdinhmuc;
		else $giocongthanhtoanthangnay=$ngaycongthucte*8;

		if ($giocongthucte>$giocongthanhtoanthangnay) 
			$giocongvuotmucchuyenthangsau=$giocongthucte-$giocongthanhtoanthangnay;
		else $giocongvuotmucchuyenthangsau=0;

		$ngayconglamviectrenbo=0;
		for ($k=1;$k<42;$k++) {
			$chamcong =  $_POST["chamcong$k"] ;
			if(($chamcong=="8")||($chamcong=="4.5"))
				$ngayconglamviectrenbo++;
                       }
		$congbienthangnay=0;
		for ($l=1;$l<42;$l++) {
			$chamcong =  $_POST["chamcong$l"] ;
			if($chamcong=="congbien")
				$congbienthangnay++;
                       }
		$congomthangnay=0;
		for ($l=1;$l<42;$l++) {
			$chamcong =  $_POST["chamcong$l"] ;
			if($chamcong=="nghiom")
				$congomthangnay++;
                       }
		$songaynghipheptrongthang=0;
		for ($l=1;$l<42;$l++) {
			$chamcong =  $_POST["chamcong$l"] ;
			if($chamcong=="nghiphep")
				$songaynghipheptrongthang++;
		}
		$result2 = mysql_query("SELECT tongsogiovuotmucthangnay FROM chamcong where danhso='$danhso' and month='$premonth'and year='$preyear'") ;
		while($row = mysql_fetch_array($result2))
		{
			$tongsogiovuotmucthangtruoc =$row['tongsogiovuotmucthangnay'];
		}
			if($tongsogiovuotmucthangtruoc=="") $tongsogiovuotmucthangtruoc=0;
		$tongsogiovuotmucthangnay=$tongsogiovuotmucthangtruoc-$giocongthangtruocchuyenthangnay+$giocongvuotmucchuyenthangsau;
		// Apply to database
		if(($monthfirst!=$month1)||($_POST['first']=="first")||($_POST['post']=="")||($submit=="Next")||($submit=="Skip")) {	
		$result2 = mysql_query("SELECT * FROM chamcong where danhso='$danhso' and month='$month1'and year='$year1'") ;
		while($row = mysql_fetch_array($result2))
		{
			$giocongthangtruocchuyenthangnay =  $row['giocongthangtruocchuyenthangnay'] ;
			$ngaycongthucte =  $row['ngaycongthucte'] ;
			$giocongthucte =  $row['giocongthucte'] ;
			$giocongdinhmuc =  $row['giocongdinhmuc'] ;
			$giocongthanhtoanthangnay =  $row['giocongthanhtoanthangnay'] ;
			$giocongvuotmucchuyenthangsau =  $row['giocongvuotmucchuyenthangsau'] ;
			$ngayconglamviectrenbo =  $row['ngayconglamviectrenbo'] ;
			$congbienthangtruoc =  $row['congbienthangtruoc'] ;
			$congbienthangnay =  $row['congbienthangnay'] ;
			$congbiendochai =  $row['congbiendochai'] ;
			$lamdemthangtruoc =  $row['lamdemthangtruoc'] ;
			$lamdemthangnay =  $row['lamdemthangnay'] ;
			$lamthemgio150 =  $row['lamthemgio150'] ;
			$lamthemgio200 =  $row['lamthemgio200'] ;
			$ngaylethangtruoc =  $row['ngaylethangtruoc'] ;
			$ngaylethangnay =  $row['ngaylethangnay'] ;
			$congomthangtruoc =  $row['congomthangtruoc'] ;
			$congomthangnay =  $row['congomthangnay'] ;
			$songaynghipheptrongthang =  $row['songaynghipheptrongthang'] ;
			$thoigiandiphep =  $row['thoigiandiphep'] ;
			$tongsogiovuotmucthangtruoc =  $row['tongsogiovuotmucthangtruoc'] ;
			$tongsogiovuotmucthangnay =  $row['tongsogiovuotmucthangnay'] ;
			$ghichu =  $row['ghichu'] ;
			$ngaycongdinhmuc =  $giocongdinhmuc/8 ;
		}  
		}
if($submit=="Next") {
		$result2 = mysql_query("SELECT hoten FROM chamcong where danhso ='$danhso' and month='$month1'and year='$year1'") ;
		while($row = mysql_fetch_array($result2))
		{
			$hoten1 =  $row['hoten'] ;
		}
		if ($hoten1=="") {
			echo " <span font-color:red>Bảng chấm công của CBCNV danh số: $danhso tháng $month1 năm $year1 chưa được nhập, Phải nhập trước khi sửa dữ liệu</span>";
			exit;
		}
			$j=0;
	for ($i=1;$i<42;$i++) {
		if ( $_POST["chamcong$i"] !="") {
			$j++;
			$chamcong[$j] =  $_POST["chamcong$i"] ;
			
		}
}
if ($giocongdinhmuc=="") {
	echo " <span font-color:red>Giờ công định mức  chưa được nhập, vui lòng nhập lại</span>";
	exit;
}
else {
$update = "update chamcong SET
chamcong1 = '$chamcong[1]',
chamcong2 = '$chamcong[2]',
chamcong3 = '$chamcong[3]',
chamcong4 = '$chamcong[4]',
chamcong5 = '$chamcong[5]',
chamcong6 = '$chamcong[6]',
chamcong7 = '$chamcong[7]',
chamcong8 = '$chamcong[8]',
chamcong9 = '$chamcong[9]',
chamcong10 = '$chamcong[10]',
chamcong11 = '$chamcong[11]',
chamcong12 = '$chamcong[12]',
chamcong13 = '$chamcong[13]',
chamcong14 = '$chamcong[14]',
chamcong15 = '$chamcong[15]',
chamcong16 = '$chamcong[16]',
chamcong17 = '$chamcong[17]',
chamcong18 = '$chamcong[18]',
chamcong19 = '$chamcong[19]',
chamcong20 = '$chamcong[20]',
chamcong21 = '$chamcong[21]',
chamcong22 = '$chamcong[22]',
chamcong23 = '$chamcong[23]',
chamcong24 = '$chamcong[24]',
chamcong25 = '$chamcong[25]',
chamcong26 = '$chamcong[26]',
chamcong27 = '$chamcong[27]',
chamcong28 = '$chamcong[28]',
chamcong29 = '$chamcong[29]',
chamcong30 = '$chamcong[30]',
chamcong31 = '$chamcong[31]',
ngaycongthucte= '$ngaycongthucte',
giocongthucte= '$ngaycongthucte',
giocongthangtruocchuyenthangnay= '$giocongthangtruocchuyenthangnay',
giocongthanhtoanthangnay= '$giocongthanhtoanthangnay',
giocongvuotmucchuyenthangsau = '$giocongvuotmucchuyenthangsau',
ngayconglamviectrenbo = '$ngayconglamviectrenbo',
congbienthangtruoc= '$congbienthangtruoc',
congbienthangnay= '$congbienthangnay',
congbiendochai= '$congbiendochai',
lamdemthangtruoc= '$lamdemthangtruoc',
lamdemthangnay= '$lamdemthangnay',
lamthemgio150= '$lamthemgio150',
lamthemgio200= '$lamthemgio200',
ngaylethangtruoc= '$ngaylethangtruoc',
ngaylethangnay= '$ngaylethangnay',
congomthangtruoc= '$congomthangtruoc',
congomthangnay= '$congomthangnay',
songaynghipheptrongthang= '$songaynghipheptrongthang',
thoigiandiphep= '$thoigiandiphep',
tongsogiovuotmucthangtruoc= '$tongsogiovuotmucthangtruoc',
tongsogiovuotmucthangnay= '$tongsogiovuotmucthangnay',
giocongdinhmuc= '$giocongdinhmuc',
ngaycongdinhmuc= '$ngaycongdinhmuc',
ghichu= '$ghichu'
WHERE danhso='$danhso'and month='$month1' and year='$year1'" ;
mysql_query($update) or die(mysql_error());
/*echo"   <html>
	<head>
        <meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
        </head>
	<body>	
   	<form action=\"index.php\" method=\"post\">
	<center>
	<input type=hidden name=username value=$username>
        <input type=hidden name=password value=$password>
        <input type=hidden name=\"submit\" value=\"login\">
        <input type=\"image\" src=\"upload/back.gif\" width=\"120\" height=\"35\" /></form></center>
        </form>
        </center> 
        </body>
        </html> " ;
 */
$result2 = mysql_query("SELECT  level_dv_sum FROM resume where danhso='$danhso'") ;
		while($row = mysql_fetch_array($result2))
		{
			$level_dv_sum_init=$row['level_dv_sum'];
		}	
$result2 = mysql_query("SELECT  hoten,danhso,level_dv_sum FROM resume where donvi='$donvi' and nghiviec!='yes' ORDER by level_dv_sum ") ;
		$index=0;
		while($row = mysql_fetch_array($result2))
		{
			$level_dv_sum=$row['level_dv_sum'];
			if (($danhso !=$row['danhso'])&&($level_dv_sum>$level_dv_sum_init)) {
			$danhso=$row['danhso'];
			$hoten =$row['hoten'];
			break;
			}
		}	
		$result2 = mysql_query("SELECT * FROM chamcong where danhso='$danhso' and month='$month1'and year='$year1'") ;
		while($row = mysql_fetch_array($result2))
		{
			$giocongthangtruocchuyenthangnay =  $row['giocongthangtruocchuyenthangnay'] ;
			$ngaycongthucte =  $row['ngaycongthucte'] ;
			$giocongthucte =  $row['giocongthucte'] ;
			$giocongdinhmuc =  $row['giocongdinhmuc'] ;
			$giocongthanhtoanthangnay =  $row['giocongthanhtoanthangnay'] ;
			$giocongvuotmucchuyenthangsau =  $row['giocongvuotmucchuyenthangsau'] ;
			$ngayconglamviectrenbo =  $row['ngayconglamviectrenbo'] ;
			$congbienthangtruoc =  $row['congbienthangtruoc'] ;
			$congbienthangnay =  $row['congbienthangnay'] ;
			$congbiendochai =  $row['congbiendochai'] ;
			$lamdemthangtruoc =  $row['lamdemthangtruoc'] ;
			$lamdemthangnay =  $row['lamdemthangnay'] ;
			$lamthemgio150 =  $row['lamthemgio150'] ;
			$lamthemgio200 =  $row['lamthemgio200'] ;
			$ngaylethangtruoc =  $row['ngaylethangtruoc'] ;
			$ngaylethangnay =  $row['ngaylethangnay'] ;
			$congomthangtruoc =  $row['congomthangtruoc'] ;
			$congomthangnay =  $row['congomthangnay'] ;
			$songaynghipheptrongthang =  $row['songaynghipheptrongthang'] ;
			$thoigiandiphep =  $row['thoigiandiphep'] ;
			$tongsogiovuotmucthangtruoc =  $row['tongsogiovuotmucthangtruoc'] ;
			$tongsogiovuotmucthangnay =  $row['tongsogiovuotmucthangnay'] ;
			$ghichu =  $row['ghichu'] ;
			$ngaycongdinhmuc =  $giocongdinhmuc/8 ;
		}  

 
}
}
if ($submit=="Skip") {
$result2 = mysql_query("SELECT  level_dv_sum FROM resume where danhso='$danhso'") ;
		while($row = mysql_fetch_array($result2))
		{
			$level_dv_sum_init=$row['level_dv_sum'];
		}	
$result2 = mysql_query("SELECT  hoten,danhso,level_dv_sum FROM resume where donvi='$donvi' and nghiviec!='yes' ORDER by level_dv_sum ") ;
		$index=0;
		while($row = mysql_fetch_array($result2))
		{
			$level_dv_sum=$row['level_dv_sum'];
			if (($danhso !=$row['danhso'])&&($level_dv_sum>$level_dv_sum_init)) {
			$danhso=$row['danhso'];
			$hoten =$row['hoten'];
			break;
			}
		}	
		$result2 = mysql_query("SELECT * FROM chamcong where danhso='$danhso' and month='$month1'and year='$year1'") ;
		while($row = mysql_fetch_array($result2))
		{
			$giocongthangtruocchuyenthangnay =  $row['giocongthangtruocchuyenthangnay'] ;
			$ngaycongthucte =  $row['ngaycongthucte'] ;
			$giocongthucte =  $row['giocongthucte'] ;
			$giocongdinhmuc =  $row['giocongdinhmuc'] ;
			$giocongthanhtoanthangnay =  $row['giocongthanhtoanthangnay'] ;
			$giocongvuotmucchuyenthangsau =  $row['giocongvuotmucchuyenthangsau'] ;
			$ngayconglamviectrenbo =  $row['ngayconglamviectrenbo'] ;
			$congbienthangtruoc =  $row['congbienthangtruoc'] ;
			$congbienthangnay =  $row['congbienthangnay'] ;
			$congbiendochai =  $row['congbiendochai'] ;
			$lamdemthangtruoc =  $row['lamdemthangtruoc'] ;
			$lamdemthangnay =  $row['lamdemthangnay'] ;
			$lamthemgio150 =  $row['lamthemgio150'] ;
			$lamthemgio200 =  $row['lamthemgio200'] ;
			$ngaylethangtruoc =  $row['ngaylethangtruoc'] ;
			$ngaylethangnay =  $row['ngaylethangnay'] ;
			$congomthangtruoc =  $row['congomthangtruoc'] ;
			$congomthangnay =  $row['congomthangnay'] ;
			$songaynghipheptrongthang =  $row['songaynghipheptrongthang'] ;
			$thoigiandiphep =  $row['thoigiandiphep'] ;
			$tongsogiovuotmucthangtruoc =  $row['tongsogiovuotmucthangtruoc'] ;
			$tongsogiovuotmucthangnay =  $row['tongsogiovuotmucthangnay'] ;
			$ghichu =  $row['ghichu'] ;
			$ngaycongdinhmuc =  $giocongdinhmuc/8 ;
		}  
}
echo "<html>
<head>   
<link href=\"calendar.css\" type=\"text/css\" rel=\"stylesheet\" />
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
<style>
table1
{
	border:1px solid black;
	width:300px;
border-collapse:collapse
}
.td2
{
text-align:center;
border:1px solid black;
height: 20px
}
</style> 
</head>
<body>";
echo " 
          <div id=\"main\">	
               <div id=\"head\">	
	            <center>
	  		<EMBED src=\"upload/adv1.swf\" width=\"610\" height=\"110\" type=\"application/x-shockwave-flash\" quality=\"high\"  
	   		wmode=\"transparent\" align=\"center\">
		</div>

			<div id=\"head-link\">
			<MARQUEE SCROLLDELAY=100 DIRECTION=\"left\" > <span style=\"font-style:bold;color:red;font-size:14px;\">
		 	XÍ NGHIỆP ĐỊA VẬT LÝ GIẾNG KHOAN - PHẦN MỀM CHẤM CÔNG QUA MẠNG</span></MARQUEE>
       		</div></center>";
echo "<form action=\"update.php\" method=\"post\" enctype=\"multipart/form-data\" name=\"example\">";
echo"<center>";
echo "<table cellspacing=\"20px\">";
echo "<tr><td valign=\"top\">";
echo "<table>
	<tr><td >Danh số :</td>
	<td> <input readonly style=\"font_family:Times New Roman \"  name=\"danhso\" size=\"25\" value =\"$danhso\" type=\"text\"/></td>
	  
         	</tr>
                <tr><td >Họ và tên :</td>
		<td> <input  readonly style=\"font_family:Times New Roman \"  name=\"hoten\" size=\"25\"  value =\"$hoten\" type=\"text\"/></td>
		</tr>";
echo"   <tr><td >Giờ công định mức:</td>
		<td> <input  style=\"font_family:Times New Roman; text-align:center\"  name=\"giocongdinhmuc\" size=\"25\" value =\"$giocongdinhmuc\"  type=\"text\"/></td>
		</tr>";
echo "	<tr><td >Ngày công định mức:</td>
	<td> <input readonly  style=\"font_family:Times New Roman; text-align:center\"  name=\"ngaycongdinhmuc\"  size=\"25\"  value =\"$ngaycongdinhmuc\" 
	type=\"text\"/></td></tr>";
echo "
	<tr><td >Ngày công thực tế :</td>";
echo "	<td> <input  readonly style=\"font_family:Times New Roman;text-align:center \"   name=\"ngaycongthucte\"  size=\"25\"   value =\"$ngaycongthucte\" 
	type=\"text\"/></td></tr>";
echo "  <tr><td >Giờ công thực tế :</td>";
echo "	<td> <input  readonly style=\"font_family:Times New Roman;text-align:center \"   name=\"giocongthucte\"  size=\"25\"   value =\"$giocongthucte\" 
	type=\"text\"/></td></tr>";
echo"   <tr><td >Giờ công tháng trước chuyển thanh toán tháng này :</td>
	<td> <input  style=\"font_family:Times New Roman; text-align:center \"  name=\"giocongthangtruocchuyenthangnay\" size=\"25\" value =\"$giocongthangtruocchuyenthangnay\" type=\"text\"/></td>
        </tr>";
echo"   <tr><td >Giờ công thanh toán tháng này :</td>
	<td> <input  readonly style=\"font_family:Times New Roman;text-align:center \"   name=\"giocongthanhtoanthangnay\"  size=\"25\"   value =\"$giocongthanhtoanthangnay\" type=\"text\"/></td></tr>";
echo"   <tr><td >Giờ công vượt mức chuyển sang tháng sau :</td>
	<td> <input  readonly style=\"font_family:Times New Roman;text-align:center \"   name=\"giocongvuotmucchuyenthangsau\"  size=\"25\"   value =\"$giocongvuotmucchuyenthangsau\" type=\"text\"/></td></tr>";
echo"   <tr><td> Ngày công làm việc trên bờ :</td>
	<td> <input  readonly style=\"font_family:Times New Roman;text-align:center \"   name=\"ngayconglamviectrenbo\"  size=\"25\"   value =\"$ngayconglamviectrenbo\" type=\"text\"/></td></tr>";
echo"   <tr><td >Công biển tháng trước :</td>
	<td> <input  style=\"font_family:Times New Roman; text-align:center \"  name=\"congbienthangtruoc\" size=\"25\"  value =\"$congbienthangtruoc\"   type=\"text\"/></td>
        </tr>";
echo"   <tr><td> Công biển tháng này :</td>
	<td> <input  readonly style=\"font_family:Times New Roman;text-align:center \"   name=\"congbienthangnay\"  size=\"25\"   value =\"$congbienthangnay\" type=\"text\"/></td></tr>";
echo"   <tr><td >Công biển độc hại :</td>
	<td> <input  style=\"font_family:Times New Roman; text-align:center \"  name=\"congbiendochai\" size=\"25\" value =\"$congbiendochai\"  type=\"text\"/></td>
        </tr>";
echo"   <tr><td >Làm đêm tháng trước :</td>
	<td> <input  style=\"font_family:Times New Roman; text-align:center \"  name=\"lamdemthangtruoc\" size=\"25\" value =\"$lamdemthangtruoc\" type=\"text\"/></td>
        </tr>";
echo"   <tr><td >Làm đêm tháng này :</td>
	<td> <input  style=\"font_family:Times New Roman; text-align:center \"  name=\"lamdemthangnay\" size=\"25\" value =\"$lamdemthangnay\" type=\"text\"/></td>
        </tr>";
echo"   <tr><td >Làm thêm giờ 150% :</td>
	<td> <input  style=\"font_family:Times New Roman; text-align:center \"  name=\"lamthemgio150\" size=\"25\"  value =\"$lamthemgio150\" type=\"text\"/></td>
        </tr>";
echo"   <tr><td >Làm thêm giờ 200% :</td>
	<td> <input  style=\"font_family:Times New Roman; text-align:center \"  name=\"lamthemgio200\" size=\"25\"  value =\"$lamthemgio200\" type=\"text\"/></td>
        </tr>";
echo"   <tr><td >Làm ngày lễ tháng trước :</td>
	<td> <input  style=\"font_family:Times New Roman; text-align:center \"  name=\"ngaylethangtruoc\" size=\"25\" value =\"$ngaylethangtruoc\" type=\"text\"/></td>
        </tr>";
echo"   <tr><td >Làm ngày lễ tháng  này  :</td>
	<td> <input  style=\"font_family:Times New Roman; text-align:center \"  name=\"ngaylethangnay\" size=\"25\" value =\"$ngaylethangnay\" type=\"text\"/></td>
        </tr>";
echo"   <tr><td >Công ốm tháng trước :</td>
	<td> <input  style=\"font_family:Times New Roman; text-align:center \"  name=\"congomthangtruoc\" size=\"25\" value =\"$congomthangtruoc\" type=\"text\"/></td>
        </tr>";
echo"   <tr><td >Công ốm tháng  này  :</td>
	<td> <input  readonly style=\"font_family:Times New Roman;text-align:center \"   name=\"congomthangnay\"  size=\"25\"   value =\"$congomthangnay\" type=\"text\"/></td></tr>";
echo"   <tr><td >Số ngày nghỉ phép trong tháng  :</td>
	<td> <input  readonly style=\"font_family:Times New Roman;text-align:center \"   name=\"songaynghipheptrongthang\"  size=\"25\"   value =\"$songaynghipheptrongthang\" type=\"text\"/></td></tr>";
echo"   <tr><td >Thời gian đi phép (từ ngày-đến ngày) :</td>
	<td> <input  style=\"font_family:Times New Roman; text-align:center \"  name=\"thoigiandiphep\" size=\"25\" value =\"$thoigiandiphep\" type=\"text\"/></td>
        </tr>";
echo"   <tr><td >Tổng số giờ vượt  định mức công dồn tháng trước :</td>
	<td> <input  readonly style=\"font_family:Times New Roman;text-align:center \"   name=\"tongsogiovuotmucthangtruoc\"  size=\"25\"   value =\"$tongsogiovuotmucthangtruoc\" type=\"text\"/></td></tr>";
echo"   <tr><td >Tổng số giờ vượt  định mức công dồn tháng này :</td>
	<td> <input  readonly style=\"font_family:Times New Roman;text-align:center \"   name=\"tongsogiovuotmucthangnay\"  size=\"25\"   value =\"$tongsogiovuotmucthangnay\" type=\"text\"/></td></tr>";
echo"<tr></tr>";
echo"<tr></tr>";
echo"<tr></tr>";
echo"</table>";
echo"<table>";
echo"   <tr>";
//echo"   <td height=\"20px\"> <input   style=\"font_family:Times New Roman;width:6em;color:blue \"  name=\"submit\" class=\"button\"  value =\"Home\" 
//	type=\"submit\"/></td>";
if(($monthfirst==$month1)&&($yearfirst==$year1)) {
echo"	<td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td>
	<td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td>
	<td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td>
	<td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td>
	<td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td>
	<td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td>
	<td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td>
	<td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td>
	<td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td>
	<td ></td><td ></td><td ></td><td ></td><td ></td><td ></td>
	
	<td height=\"20px\"> <input   style=\"font_family:Times New Roman;width:5.8em \"  name=\"submit\" class=\"button\"  value =\"Next\" 
	type=\"submit\"/></td><td ></td><td ></td><td ></td>
	";
echo"   
	<td height=\"20px\"> <input   style=\"font_family:Times New Roman;width:6em \"  name=\"submit\" class=\"button\"  value =\"Skip\" 
	type=\"submit\"/></td>";
}
echo "</tr>";
echo "</table>";
echo "  <input type=hidden name=username value=$username>
	<input type=hidden name=password value=$password> 
	<input type=hidden name=donvi value=\"$donvi\">
	<input type=hidden name=post value=\"post\">
	<input type=hidden name=ngaycongthucte value=\"$ngaycongthucte\">
	<input type=hidden name=giocongthucte value=\"$giocongthucte\">
	<input type=hidden name=giocongthanhtoanthangnay value=\"$giocongthanhtoanthangnay\">
	<input type=hidden name=giocongvuotmucchuyenthangsau value=\"$giocongvuotmucchuyenthangsau\">
	<input type=hidden name=ngayconglamviectrenbo value=\"$ngayconglamviectrenbo\">
	<input type=hidden name=congbienthangnay value=\"$congbienthangnay\">
	<input type=hidden name=congomthangnay value=\"$congomthangnay\">
	<input type=hidden name=songaynghipheptrongthang value=\"$songaynghipheptrongthang\">
	<input type=hidden name=tongsogiovuotmucthangtruoc value=\"$tongsogiovuotmucthangtruoc\">
	<input type=hidden name=tongsogiovuotmucthangnay value=\"$tongsogiovuotmucthangnay\">
	<input type=hidden name=index_old value=$index_old>
	<input type=hidden name=monthfirst value=$monthfirst>
	<input type=hidden name=yearfirst value=$yearfirst>
        ";
echo "</td>";
echo "<td  valign=\"top\">";
echo "<table>";
/*echo"	<tr>
	<td >Ngày chấm công trong tháng :</td></tr>
	";
echo "<tr></tr>";
 */ 
echo "<tr>";
echo "<td>";
$calendar = new Calendar();
 
echo $calendar->show();
echo "</td>";
echo "<td></td>";
echo "<td></td>";
echo "<td>";
echo $calendar->showchamcong();
echo "</td></tr>";
echo "</table>";
echo "<table>";
echo"   
	<tr><td height=\"20px\"> <input   style=\"font_family:Times New Roman;width:8em \"  name=\"submit\" class=\"button\"  value =\"Update\" 
	type=\"submit\"/></td></tr>	
	<tr><td ><span style=\"color:blue;font-weight:italic;font-size:14px\">Sau khi chấm công xong bấm vào  nut Update để cập nhật dữ liệu</span></td></tr>
	<tr><td >Ghi chú :</td></tr>
	<tr><td> <textarea rows='4' cols='65' style=\"font_family:Times New Roman \" name=\"ghichu\"/>$ghichu</textarea></td>
	</tr>";
echo "</table>";
echo "<span style=\"color:blue;font-weight:bold\">Các ký hiệu chấm công :</span>";
echo "<table class=\"table1\" style=\"width:300px\" >";
echo"   
	<tr>
	<td style=\"height:10px\" >Công biển: </td>
	<td  style=\"height:10px\">M</td>
	</tr>
	<tr>
	<td  style=\"height:10px\">Công bờ: </td>
	<td  style=\"height:10px\">8</td>
	</tr>
	<tr>
	<td  style=\"height:10px\">Công bờ (Buổi sáng): </td>
	<td  style=\"height:10px\">4.5</td>
	</tr>
	<tr>
	<td  style=\"height:10px\">Công bờ (Buổi chiều): </td>
	<td  style=\"height:10px\">3.5</td>
	</tr>
	<tr>
	<td  style=\"height:10px\">Nghỉ phép: </td>
	<td  style=\"height:10px\">&#1054;</td>
	</tr>
	<tr>
	<td  style=\"height:10px\">Nghỉ bù: </td>
	<td  style=\"height:10px\">&#1054;&#1090;</td>
	</tr>
	<tr>
	<td  style=\"height:10px\">Nghỉ ốm: </td>
	<td  style=\"height:10px\">&#1041;</td>
	</tr>
	<tr>
	<td  style=\"height:10px\">Công tác: </td>
	<td  style=\"height:10px\">&#1050;</td>
	</tr>
	<tr>
	<td  style=\"height:10px\">Chủ Nhật: </td>
	<td  style=\"height:10px\">Bx</td>
	</tr>
	<tr>
	<td  style=\"height:10px\">Thứ bảy: </td>
	<td  style=\"height:10px\">--</td>
	</tr>
	<tr>
	<td  style=\"height:10px\">Ngày lễ: </td>
	<td  style=\"height:10px\">&#1055;</td>
	</tr>
	";
echo "</table>";
echo "</td></tr>";
echo "</table>";
echo"</center>";
echo"</form>";
echo "
</body>
</html>";
echo"<table>";
echo"   <tr>";
echo "<form action=\"index.php\" method=\"post\">
	<input type=hidden name=username value=$username>
	<input type=hidden name=password value=$password>
	<td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td>
	<td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td>
	<td ></td><td ></td><td ></td><td ></td><td ></td><td ></td><td ></td>
        <td height=\"20px\"> <input   style=\"font_family:Times New Roman;width:6em;color:blue \"  name=\"submit\" class=\"button\"  value =\"Home\" 
	type=\"submit\"/></td>
        <input type=hidden name=\"submit\" value=\"login\">
        </form>
         ";
echo "</table>";
echo "</td>";
?> 
