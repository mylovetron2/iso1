<?php
ob_start();
echo"<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
<style type=\"text/css\">
p
{
line-height:1pt
}
.th2
{
	border:1px solid black;
	border-left:0px ;
	border-right:0px;
	height:30       	
}
.table2 
{
border:2px solid black;
border-collapse:collapse
}
.th1
{
	border:1px solid black;
}
.td1
{
	border:1px solid black;
}
.td2
{
	border:0px solid black;
	border-left:0px ;
        border-right:0px ;
}
.table3
{
border-collapse:collapse;
margin-left:20px;
border:1px solid black;
width:1150px;
}
.table3 td
{
	border:1px solid black;
	text-align:left;
	height: 30px
}
.table3 th 
{
border:1px solid black;
text-align:left;
font-weight: bold;
height:50px;
background-color:#A7C942;
}
.table3 tr.alt td 
{
color:#000000;
background-color:#EAF2D3;
}
.table1
{
border-collapse:collapse;
margin-left:50px;
width:950px;
border:1px solid black;
}
.table1 td
{
border:1px solid black;
text-align:left;
height: 30px;
}
.table1 th 
{
border:1px solid black;
font-weight: bold;
height:50px;
background-color:#87CEEB;
}

.table6
{
border-collapse:collapse;
margin-left: 75px;
margin-right: 50px;
width:1125;
}
.table6 td
{
border:1px solid black;
text-align:left;
height: 30px
}
.table6 th 
{
border:1px solid black;
font-weight: bold;
height:50px;
}
.table7
{
border-collapse:collapse;
width:800px;
}
.table7 td
{
border:1px solid black;
text-align:left;
height: 30px
}
.table7 th 
{
border:1px solid black;
color:#ffffff;
font-weight: bold;
height:50px;
background-color: #6495ED;
}
.table8 
{
border:1px solid black;
color:#ffffff;
font-weight: bold;
width:600px
height:400px;
margin-top:100px;
background-color: #6495ED;
}
</style>
</head>";
// Connect to Database
include ("select_data.php") ;
include ("myfunctions.php") ;
echo "<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
</head>" ;
		
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$search = isset($_GET['search']) ? $_GET['search'] : '';
$readhoso = isset($_GET['readhoso']) ? $_GET['readhoso'] : '';
$edithoso = isset($_GET['edithoso']) ? $_GET['edithoso'] : '';
if ($edithoso!="") {
$username = isset($_GET['username']) ? $_GET['username'] : '';
$password = isset($_GET['mk']) ? $_GET['mk'] : '';
}
$readmavattu = isset($_GET['readmavattu']) ? $_GET['readmavattu'] : '';
$hoso = isset($_POST['hoso']) ? $_POST['hoso'] : '';
if ($search!="") {
$username = isset($_GET['username']) ? $_GET['username'] : '';
$password = isset($_GET['mk']) ? $_GET['mk'] : '';
$hoso = isset($_GET['hs']) ? $_GET['hs'] : '';
}
$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
$sohoso = isset($_POST['sohoso']) ? $_POST['sohoso'] : '';
$sophieubg = isset($_POST['sophieubg']) ? $_POST['sophieubg'] : '';
$savefile = isset($_POST['savefile']) ? $_POST['savefile'] : '';
$maqly = isset($_POST['maqly']) ? $_POST['maqly'] : '';
$mabaoduong = isset($_POST['mabaoduong']) ? $_POST['mabaoduong'] : '';
$mavtbd = isset($_POST['mavtbd']) ? $_POST['mavtbd'] : '';
$xuat = isset($_POST['xuat']) ? $_POST['xuat'] : '';
$thietbi1 = isset($_POST['thietbi1']) ? $_POST['thietbi1'] : '';
$thietbi6 = isset($_POST['thietbi6']) ? $_POST['thietbi6'] : '';
$them = isset($_POST['them']) ? $_POST['them'] : '';
$solan = isset($_POST['solan']) ? $_POST['solan'] : '';
$nhap = isset($_POST['nhap']) ? $_POST['nhap'] : '';
$button = isset($_POST['button']) ? $_POST['button'] : '';
$save = isset($_POST['save']) ? $_POST['save'] : '';
$hosomay = isset($_POST['hosomay']) ? $_POST['hosomay'] : '';
$hosomaycu = isset($_POST['hosomaycu']) ? $_POST['hosomaycu'] : '';
$xuatphieu = isset($_POST['xuatphieu']) ? $_POST['xuatphieu'] : '';
$savefilesc = isset($_POST['savefilesc']) ? $_POST['savefilesc'] : '';
$xuatphieubd = isset($_POST['xuatphieubd']) ? $_POST['xuatphieubd'] : '';
$inphieubd = isset($_POST['inphieubd']) ? $_POST['inphieubd'] : '';
$add = isset($_POST['add']) ? $_POST['add'] : '';
$nhapcvk = isset($_POST['nhapcvk']) ? $_POST['nhapcvk'] : '';
$sohscvk = isset($_POST['sohscvk']) ? $_POST['sohscvk'] : '';
$xuatcvk = isset($_POST['xuatcvk']) ? $_POST['xuatcvk'] : '';
$maquanlycvk = isset($_POST['maquanlycvk']) ? $_POST['maquanlycvk'] : '';
$mavattucvk = isset($_POST['mavattucvk']) ? $_POST['mavattucvk'] : '';
$kiemtra = isset($_POST['kiemtra']) ? $_POST['kiemtra'] : '';
$thietbihotro1 = isset($_POST['thietbihotro1']) ? $_POST['thietbihotro1'] : '';
$tenthietbihotrocvk1 = isset($_POST['tenthietbihotrocvk1']) ? $_POST['tenthietbihotrocvk1'] : '';
$xuatphieucvk = isset($_POST['xuatphieucvk']) ? $_POST['xuatphieucvk'] : '';
$addvt = isset($_POST['addvt']) ? $_POST['addvt'] : '';
$addcvk = isset($_POST['addcvk']) ? $_POST['addcvk'] : '';
$chonmay = isset($_POST['chonmay']) ? $_POST['chonmay'] : '';
$chonthietbi = isset($_POST['chonthietbi']) ? $_POST['chonthietbi'] : '';
$suaxoa = isset($_POST['suaxoa']) ? $_POST['suaxoa'] : '';
$suadl = isset($_POST['suadl']) ? $_POST['suadl'] : '';
$xoadl = isset($_POST['xoadl']) ? $_POST['xoadl'] : '';
$phieu = isset($_POST['phieu']) ? $_POST['phieu'] : '';
$next = isset($_POST['next']) ? $_POST['next'] : '';
$soluong=1;
	      
if ($hosomaycu!=""){
if ($hosomaycu!=$hosomay) $chonthietbi="";}
$donvi=isset($_POST['donvi']) ? $_POST['donvi'] : '';
$phanqsql = mysql_query("SELECT DISTINCT phanquyen  FROM users where username='$username'");
		while($row = mysql_fetch_array($phanqsql))
		{
			$phanquyen =$row['phanquyen'];
		}
echo'<script type="text/javascript" src="jquery-1.8.0.min.js"></script>';
echo'<script type="text/javascript">
$(function(){
$(".search").keyup(function() 
{ 
var searchid = $(this).val();
var dataString = \'search=\'+ searchid;
if(searchid!=\'\')
{
    $.ajax({
    type: "POST",';
echo"    url: \"search.php?username=$username&mk=$password&hs=$hoso\",";
echo'    data: dataString,
    cache: false,
    success: function(html)
    {
    $("#result").html(html).show();
    }
    });
}return false;    
});
';
echo'jQuery("#result").live("click",function(e){ 
    var $clicked = $(e.target);
    var $name = $clicked.find(\'.name\').html();
    var decoded = $("<div/>").html($name).text();
    $(\'#searchid\').val(decoded);
});
jQuery(document).live("click", function(e) { 
    var $clicked = $(e.target);
    if (! $clicked.hasClass("search")){
    jQuery("#result").fadeOut(); 
    }
});
$(\'#searchid\').click(function(){
    jQuery("#result").fadeIn();
});
});';
echo'</script>';
echo'
<style type="text/css">
	#result
    {
        position:absolute;
        width:210px;
        padding:10px;
        display:none;
        margin-top:-1px;
        border-top:0px;
        overflow:hidden;
        border:1px #CCC solid;
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
</style>';
$con=mysqli_connect("localhost","$usernamehost","$passwordhost","$databasename");
// NHAP THONG TIN HO SO SUA CHUA BAO DUONG
if(($submit == "nhapdulieu")&&($hoso== "phieuscbd")) {
echo "
<html lang=\"vi\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
<SCRIPT LANGUAGE=\"JavaScript\" SRC=\"java/CalendarPopup.js\"></SCRIPT>
<SCRIPT LANGUAGE=\"JavaScript\">
var cal = new CalendarPopup();
</SCRIPT>
</head>
<body>
<table style=\"margin-top:20px;width:100%;\">
<tr>
<td  style=\"padding-left:45px;width:30%;\"> XN Địa Vật Lý GK <br/>X&#432;&#7903;ng
SCTB&#272;VL </td>
<td>
<h2> <span style=\"color:blue;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NHẬP PHIẾU YÊU CẦU DỊCH VỤ </span> 
</h2>
</td>
</tr>
</table>";
$curday = date("d/m/Y");
$maxphieu=0;
		$r3 ="SELECT DISTINCT phieu  FROM hososcbd_iso";
		$result=mysqli_query($con,$r3);
		if(mysqli_num_rows($result)>0){
		$r3 =mysql_query("SELECT DISTINCT phieu  FROM hososcbd_iso");
		while($row = mysql_fetch_array($r3))
		{
			$phieu =$row['phieu'];
			$phieu=(int)$phieu;
			if ($phieu>=$maxphieu) $maxphieu=$phieu;
		}
		}
		$maxphieu++;
		if(($maxphieu>0)&&($maxphieu<=9)) $fieu="000$maxphieu";
		else if(($maxphieu>=10)&&($maxphieu<=99))  $fieu="00$maxphieu";
		else if(($maxphieu>=100)&&($maxphieu<=999))  $fieu="0$maxphieu";
		else $fieu="$maxphieu";
		$nhapdv = isset($_POST['nhapdv']) ? $_POST['nhapdv'] : '';
		if ($nhapdv=="yes") {
		$madv = isset($_POST['madv']) ? $_POST['madv'] : '';
		$tendv = isset($_POST['tendv']) ? $_POST['tendv'] : '';
                  $insert = "insert into donvi_iso(
			madv,
			tendv
			) values (
			'$madv',
			'$tendv'
			)" ;
		 mysql_query($insert) or die(mysql_error());
				}

echo"<form method=\"post\" action=\"formsc.php\" enctype=\"multipart/form-data\" name=\"example\">
	<br/>
	<table style=\"margin-left:50px;width:950px;\">
	<tr bgcolor=\"#FFA500\">	
	<td style=\"text-align:center;font-size: 15;width:25%;\"><b>   SỐ HỒ SƠ </b></td>
	<td style=\"text-align:center;font-size: 15;width:30%;\">	<b> NGÀY   </b></td>
	<td style=\"text-align:center;font-size: 15;width:45%;\"><b> ĐƠN VỊ  </b></td>
	</tr>
	<tr>
	<td>	
	<div class=\"content\">
	<input name=\"sohoso\" type=\"text\" class=\"search\" id=\"searchid\" style=\"text-align:center;width:100%;background:#8adaa5;height:25px;\"
	value=\"$fieu\" />
	<div id=\"result\"></div>
	</div>
	</td>
	<td>
	<input  name=\"ngay\" size=\"20\" type=\"text\" value =\"$curday\" style=\"width:90%;background:#8adaa5;height:25px;\" />
	<A HREF=\"#\" onClick=\"cal.select(document.forms['example'].ngay,'anchor1','dd/MM/yyyy'); return false;\"
    NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A></td>
	<td>
	<select name=\"donvi\" onchange=\"this.form.submit()\" style=\"background:#8adaa5;width:100.5%;height:25px;\" >
	<option value=\"\"></option>";
		$r3 = mysql_query("SELECT DISTINCT madv,tendv FROM donvi_iso");
		while($row = mysql_fetch_array($r3))
		{
			$madv =$row['madv'];
			$tendv = $row['tendv'];
			echo "<option value=\"$madv\">$madv - $tendv</option>";		                
		}		
	echo"<option value=\"other\">Thêm mới</option></select>
	</td>
	</tr>
	</table>
	<br/>
	<table>
		<tr><td style=\"height:30px;width:500px;padding-left:50px;\"><strong>KHÁCH HÀNG &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> &nbsp;&nbsp;&nbsp;&nbsp;
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"khachhang\" size=\"50\" type=\"text\"></td>
		<td style=\"height:30px;width:400px\"><strong>ĐIỆN THOẠI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> 
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"dienthoai\" size=\"25\" type=\"text\">       
		</td>			
	    </tr>
		<tr><td style=\"height:30px;padding-left:50px;width:600px;\"><strong>NHÂN VIÊN XƯỞNG &nbsp;&nbsp;</strong>
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"nhanvien\" size=\"50\" type=\"text\"></td>
		<td> </td>
	    </tr>
		<tr><td></td></tr>
		</table>
		<br/>
		<table class=\"table1\" >
		<tr>
		<th style=\"text-align:center;font-size: 15;width:30px; height:30px; \"> STT</th>
		<th style=\"text-align:center;font-size: 15;width:190px;\"> TÊN THIẾT BỊ</th>
		<th style=\"text-align:center;font-size: 15;width:90px;\"> SỐ MÁY</th>
		<th style=\"text-align:center;font-size: 15 ;width:300px;\"> TÌNH TRẠNG KỸ THUẬT </th>
		<th style=\"text-align:center;font-size: 15 ;width:80px;\"> NỘI DUNG </br>YÊU CẦU</th>
		<th style=\"text-align:center;font-size: 15 ;width:150px;\"> MÁY TỪ ĐÂU VỀ XƯỞNG</th>
		</tr>";
$i =1 ;
while($i<=5){
	echo"
		<tr>
		<td  style=\"text-align:center;color:black;font-size: 15;\"> $i </td>
		<td>"; 
		echo"<select name=\"thietbi$i\" onchange=\"this.form.submit()\" style=\"border-style:none;width:100%;height:30px;\">
		<option value=\"\"></option>" ;
		echo"</select>";
		echo"</td>
		<td><select name=\"somay$i\" style=\"border-style:none;width:100%;\">
		<option value=\"\"></option>
		</select> </td>	
		<td><input type=text name=\"tinhtrang$i\" style=\"border-style:none;width:100%;text-align:center;\"></td>
		<td><input type=text name=\"yeucau$i\" style=\"border-style:none;width:100%;text-align:center;\"> </td>";
		echo "<input type=hidden name=\"shs$i\">";
		echo "<input type=hidden name=\"model$i\">";
	    echo"<td>";	
		echo"<select name=\"vitri$i\"  style=\"border-style:none;width:100%;height:30px;\">
		<option value=\"\"></option>" ;
    	$tenthietbisql1 = mysql_query("SELECT DISTINCT mavitri,tenvitri FROM vitri_iso") ;
		while($row = mysql_fetch_array($tenthietbisql1))
		{
			$mavitri =$row['mavitri'];	
			$tenvitri =$row['tenvitri'];	
			echo "<option value=\"$mavitri\">$mavitri - $tenvitri</optiop>";
		}
		echo"</select>";
		echo"</td>";
		echo"</tr>";
		$i++;		
}
echo "<tr>
<th style=\"text-align:center;font-size: 15;width:40px;\"></th>
<th style=\"text-align:center;font-size: 15;width:180px;\"><a href=\"Danhmucsc.php?&start=0&ad=&sort=&s=&f=&mte_a=new\" target=\"_blank\">Thêm thiết bị mới</a></th>
<th style=\"text-align:center;font-size: 15;width:80px;\"></th>
<th style=\"text-align:center;font-size: 15 ;width:180px;\"></th>
<th style=\"text-align:center;font-size: 15 ;width:120px;\"></th>
<th style=\"text-align:center;font-size: 15 ;width:80px;\"><a href=\"vitri.php?&start=0&ad=&sort=&s=&f=&mte_a=new\" target=\"_blank\">Thêm vị trí mới</a></th>
</tr>";
echo " </table>";
echo"<br/><table>
	<tr><td style=\"height:30px;padding-left:50px;width:800px;\"><strong>CÁC YÊU CẦU KHÁC (NẾU CÓ) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
	<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"ycthemkh\" size=\"60\" type=\"text\" ></td>
	<td> </td>
	</tr>
		<tr><td style=\"height:30px;padding-left:50px;width:800px;\"><strong>XEM XÉT CỦA XƯỞNG &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"xemxetxuong\" size=\"60\" type=\"text\" >
		</td>
		<td> </td></tr>
		<tr><td style=\"height:30px;padding-left:50px;width:800px;\"><strong>PHỤC VỤ SẢN XUẤT CHO LÔ: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
		<select name=\"lo\"  style=\"border-style:none;width:50%;height:30px;font_family:Times New Roman;background:#8adaa5;height:25px;\">
		<option value=\"$lo\">$lo</option>";
		$sqllo = mysql_query("SELECT DISTINCT malo,tenlo FROM lo_iso") ;
		while($row = mysql_fetch_array($sqllo))
		{
			$malo =$row['malo'];	
			$tenlo =$row['tenlo'];	
			echo "<option value=\"$malo\">$malo - $tenlo</optiop>";
		}
		echo"</select>";
	echo"	</td>
		<td> </td></tr>
		<tr><td style=\"height:30px;padding-left:50px;width:800px;\"><strong>PHỤC VỤ SẢN XUẤT CHO MỎ :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong>
		<select name=\"mo\"  style=\"border-style:none;width:50%;height:30px;font_family:Times New Roman;background:#8adaa5;height:25px;\">
		<option value=\"$mo\">$mo</option>";
		$sqlmo = mysql_query("SELECT DISTINCT mamo,tenmo FROM mo_iso") ;
		while($row = mysql_fetch_array($sqlmo))
		{
			$mamo =$row['mamo'];	
			$tenmo =$row['tenmo'];	
			echo "<option value=\"$mamo\">$mamo - $tenmo</optiop>";
		}
		echo"</select>";
	echo"	</td>
		<td> </td></tr>
		<tr><td style=\"height:30px;padding-left:50px;width:800px;\"><strong>PHỤC VỤ SẢN XUẤT CHO GIẾNG : </strong>
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"gieng\" size=\"60\" type=\"text\" >
		</td>
		<td> </td></tr>
	<tr>
	<td >
	<input type=\"image\" name=\"nhap\" value=\"nhapphieudichvu\" src=\"upload/nhapdl.jpg\" alt=\"Nhap\" 
	onclick=\"this.form.nhap.value=this.value\" style=\"margin-left:450px;\"/></td>
	</tr>
	</table>
	<input type=hidden name=nhap value=\"\">	
	<input type=hidden name=username value=$username>
	<input type=hidden name=password value=$password>
	<input type=hidden name=chonmay value=yes>
	<input type=hidden name=hoso value=phieuscbd>
	</form>
	</body>
	</html> " ;
}
if(($submit == "nhapdulieu")&&($hoso== "bienbanscbd")) {
echo "
<html lang=\"vi\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
<SCRIPT LANGUAGE=\"JavaScript\" SRC=\"java/CalendarPopup.js\"></SCRIPT>
<SCRIPT LANGUAGE=\"JavaScript\">
var cal = new CalendarPopup();
</SCRIPT>
</head>
<body>
<table width=\"100%;\">
<tr>
<td  style=\"padding-left:50px;width:30%;\">XN Địa Vật Lý GK <br/>X&#432;&#7903;ng
SCTB&#272;VL </td>
<td>
<h2> <p style=\"color:blue;width:70%;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BIÊN BẢN BÀN GIAO THIẾT BỊ <br/></h2>
</p></td></tr></table>";
		$today = date("d/m/Y");
		$r2 = mysql_query("SELECT DISTINCT nhom  FROM users where username='$username'");
		while($row = mysql_fetch_array($r2))
		{
			$nhom =$row['nhom'];
		}
		$maxphieu=0;
		if ($phanquyen=="1") 
		$r3 = mysql_query("SELECT DISTINCT phieu  FROM hososcbd_iso");
		else
		$r3 = mysql_query("SELECT DISTINCT phieu  FROM hososcbd_iso where nhomsc='$nhom'");
		while($row = mysql_fetch_array($r3))
		{
			$phieu =$row['phieu'];
			$phieu=(int)$phieu;
			if ($phieu>=$maxphieu) $maxphieu=$phieu;
		}
		if(($maxphieu>0)&&($maxphieu<=9)) $fieu="000$maxphieu";
		else if(($maxphieu>=10)&&($maxphieu<=99))  $fieu="00$maxphieu";
		else if(($maxphieu>=100)&&($maxphieu<=999))  $fieu="0$maxphieu";
		else $fieu="$maxphieu";
		if ($maxphieu!=0) {
		$tenthietbisql4 = mysql_query("SELECT * FROM hososcbd_iso WHERE phieu='$fieu'") ;
		while($row = mysql_fetch_array($tenthietbisql4))
		{
				$maquanly =$row['maql'];
				$ngay = $row['ngayyc'];
				$donvi = $row['madv'];
				$khachhang = $row['ngyeucau'];
				$nhanvien = $row['ngnhyeucau'];
		}
		}else {
			echo"<center><p style=\"color:red;font-size:18px\">Không có hồ sơ</p></center>";
			Exit;
		}

echo"   <form method=\"post\" action=\"formsc.php\" enctype=\"multipart/form-data\" name=\"example\">
	<br/>
	<table style=\"margin-left:50px;\">
	<tr bgcolor=\"#FFA500\">
	<td  style=\"text-align:center;font-size: 15;width:230px;\"> <b>   MÃ QUẢN LÝ </b></td>
	<td style=\"text-align:center;font-size: 15;width:230px;\"><b>   SỐ HỔ SƠ </b></td>
	<td style=\"text-align:center;font-size: 15;width:190px;\">	<b> NGÀY   </b></td>
	<td style=\"text-align:center;font-size: 15;width:280px;\"><b> ĐƠN VỊ  </b></td>
	</tr>
	<tr>
	<td>
	<input name=\"maquanly\" style=\"width:100%;text-align:center;font_family:Times New Roman;background:#DCDCDC;height:25px;\" type=\"text\" 
	value=\"$maquanly\" readonly></td>";
	echo"
	<td>	
	<div class=\"content\">
	<input name=\"sohoso\" type=\"text\" class=\"search\" id=\"searchid\" style=\"text-align:center;width:100%;background:#8adaa5;height:25px;\"
	value=\"$fieu\" />
	<div id=\"result\"></div>
	</div>
	</td>";
	echo"<td>
	<input  name=\"ngay\" size=\"25\" type=\"text\" style=\"width:80%;background:#DCDCDC;text-align:center;height:25px;\" value=\"$today\" readonly />
	<A HREF=\"#\"
	onClick=\"cal.select(document.forms['example'].ngay,'anchor1','dd/MM/yyyy'); return false;\"
	NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A> </p>
	</td>
	<td>
	<input name=\"donvi\" style=\"width:100%;text-align:center;font_family:Times New Roman;background:#DCDCDC;height:25px;\" type=\"text\" 
	value=\"$donvi\" readonly> 
	</td>
	</tr>
	</table>
	<br/>
	<table>
	<tr><td style=\"height:30px;width:600px;padding-left:50px;\"><strong>BÊN NHẬN</strong> &nbsp;&nbsp;</strong> &nbsp;&nbsp;&nbsp;&nbsp;
	<input name=\"khachhang\" style=\"font_family:Times New Roman;background:#8adaa5;height:25px;width:350px;\"    type=\"text\" 
	value=\"\">
	</td>
    	</tr>
	<tr><td style=\"height:30px;padding-left:50px;\"><strong>BÊN GIAO</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input name=\"nhanvien\" style=\"font_family:Times New Roman;background:#8adaa5;height:25px;width:350px; \"  type=\"text\" value=\"$nhanvien\" >
	</td>
	<td> </td>
	</tr>
	<tr>
	</td>
	<td></td></tr>
	</table>
	<br/>
	<table class=\"table1\" style=\"margin-left:50px;\">
	<tr>
	<th style=\"text-align:center;font-size: 15;width:30px; height:30px; \"> STT</th>
	<th style=\"text-align:center;font-size: 15;width:180px;\"> TÊN THIẾT BỊ</th>
	<th style=\"text-align:center;font-size: 15;width:80px;\"> SỐ MÁY </th>
	<th style=\"text-align:center;font-size: 15 ;width:140px;\"> TÌNH TRẠNG KỸ THUẬT CỦA THIẾT BỊ</th>
	<th style=\"text-align:center;font-size: 15 ;width:50px;\"> BG</th>
	<th style=\"text-align:center;font-size: 15 ;width:100px;\">GHI CHÚ</th>
	</ul>
	</tr>";
	$i=1;
	$k=1;
		$tenthietbisql1 = mysql_query("SELECT * FROM hososcbd_iso WHERE phieu='$fieu'") ;
		while($row = mysql_fetch_array($tenthietbisql1))
		{
			$mavt =$row['mavt'];
			$bg =$row['bg'];
			$ngaykt =$row['ngaykt'];
			$hoso =$row['hoso'];
			$somay =$row['somay'];
			$model =$row['model'];
			$soluong =$row['solg'];	
			$ttktafter =$row['ttktafter'];	
		        if ($model=="") $mamay=$mavt;else $mamay="$mavt-$model";
		        
			$tenthietbisql6 = mysql_query("SELECT tenvt FROM thietbi_iso WHERE mavt='$mavt' and somay='$somay'") ;
			while($row = mysql_fetch_array($tenthietbisql6))
			{
				$tenvt=$row['tenvt'];
			}
			if ($bg==1) {
				$checkb='checked="checked"';
				$ghichu="Máy đã bàn giao";
				if ($phanquyen=="1") {
					$disable="";
					$k=1000;// admin co them edit
				}
				else
				$disable='disabled="disabled"';
			}else {
				$ghichu="Máy đã làm xong đang chờ bàn giao";
				$disable="";	
			}
			If ($ngaykt!="0000-00-00") {
				$link="<span style=\"color:red;\">$mamay - $tenvt</span>";
				//$checkb='checked="checked"';
				if ($bg!=1) {
					$k++;
					$checkb='';

				}
			}else {
				$checkb="";
			        $ghichu="Hồ sơ chưa có ngày kết thúc";	
				$disable='disabled="disabled"';
				$link="<a href='formsc.php?edithoso=$hoso&username=$username&mk=$password'  title='Hosomay' ><span style=\"color:blue;\">$mamay - $tenvt</span></a>";
			}	
			if ($phanquyen=="1") 	
			$link="<a href='formsc.php?edithoso=$hoso&username=$username&mk=$password'  title='Hosomay' ><span style=\"color:blue;\">$mamay - $tenvt</span></a>";
			echo"
			<tr>
			<td  style=\"text-align:center;color:black;font-size: 15;\"> $i </td>
			<td style=\"padding-left:10px;color:black;font-size: 15;\">$link</td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $somay </td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $ttktafter</td>
			<td> <center><input type=\"checkbox\" name=\"bg$i\" value=\"$hoso\" $checkb $disable > </center></td>
			<td  style=\"text-align:center;color:red;font-size: 15;\">$ghichu </td>
			</tr>";
			$i++;
		}	
	echo"</table></br>";	
		if ($k==1) {
			echo"<table><tr><td><input style=\"margin-left:450px;\" type=\"image\" name=\"savefile\" value =\"xuatfilebb\" src=\"upload/inbg.jpg\" alt=\"Xuat\" onclick=\"this.form.savefile.value = this.value\"/>
<input type=hidden name=savefile value=\"\"></td> </center>
	";
			echo"</form>";
			echo "<form action=\"index.php\" method=\"post\">
			<input type=hidden name=username value=$username>
			<input type=hidden name=password value=$password>
			<input type=hidden name=\"submit\" value=\"Hồ sơ SC/BD\">
			<input type=hidden name=\"hosobd\" value=\"phieukiemtra\">
			<td><input type=\"image\" src=\"upload/back.jpg\" /></td>";
			echo"</tr>
			</form>
			</table>
			</body>
			</html>";
			
		}else{
	echo"<br/>
	<table > 
	<tr> <td>
	<input type=\"image\" name=\"xuat\" value =\"xuatbienban\" style=\"margin-left:400px; alt=\"Xuat\" 
	src=\"upload/xuatdl.jpg\" onclick=\"this.form.xuat.value = this.value\"/></td>
	<input type=hidden name=xuat value=\"\">
	<input type=hidden name=username value=$username>
	<input type=hidden name=password value=$password>
	<input type=hidden name=hoso value=bienbanscbd>
	</form>
	<form action=\"index.php\" method=\"post\">
    		<input type=hidden name=username value=$username>
		<input type=hidden name=password value=$password>
  		<input type=hidden name=\"submit\" value=\"Hồ sơ SC/BD\">
		<td><input type=\"image\" src=\"upload/back.jpg\"/></td>
		</form>
   	</table>
	</body>
	</html> " ;
		}
}


if(($submit == "nhapdulieu")&&($hoso== "phieusuachua")) {
$r2 = mysql_query("SELECT DISTINCT nhom  FROM users where username='$username'");
		while($row = mysql_fetch_array($r2))
		{
			$nhom =$row['nhom'];
		}
		$maxphieu=0;
		if ($phanquyen=="1") 
		$r3 = mysql_query("SELECT DISTINCT phieu  FROM hososcbd_iso");
		else
		$r3 = mysql_query("SELECT DISTINCT phieu  FROM hososcbd_iso where nhomsc='$nhom'");
		while($row = mysql_fetch_array($r3))
		{
			$phieu =$row['phieu'];
			$phieu=(int)$phieu;
			if ($phieu>=$maxphieu) $maxphieu=$phieu;
		}
		if(($maxphieu>0)&&($maxphieu<=9)) $fieu="000$maxphieu";
		else if(($maxphieu>=10)&&($maxphieu<=99))  $fieu="00$maxphieu";
		else if(($maxphieu>=100)&&($maxphieu<=999))  $fieu="0$maxphieu";
		else $fieu="$maxphieu";

		
echo "
<html lang=\"vi\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
</head>
<body>
<table style=\"width:100%\">
<tr>
<td >
<h2> <p style=\"text-align:center;color:blue;\"> PHIẾU KIỂM TRA SỬA CHỮA THIẾT BỊ<br/></h2>
</p>
</td>
</tr>
</table>
<br/>";
if ($next=="next") {
$maql = isset($_POST['maquanly']) ? $_POST['maquanly'] : '';
		$r5 = mysql_query("SELECT DISTINCT phieu  FROM hososcbd_iso where maql='$maql'");
		while($row = mysql_fetch_array($r5))
		{
			$fieu =$row['phieu'];
		}
}else{
if ($maxphieu!=0) {
		$r4 = mysql_query("SELECT DISTINCT maql  FROM hososcbd_iso where phieu='$fieu'");
		while($row = mysql_fetch_array($r4))
		{
			$maql =$row['maql'];
		}
		}else {
			echo"<center><p style=\"color:red;font-size:18px\">Không có hồ sơ</p></center>";
			Exit;
		}
}
echo"<form action=\"formsc.php\" method=\"post\">
<table class=\"table7\" style=\"margin-left:50px;\">
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFE4B5;\"> <strong>Mã quản lý</strong> </td>
<td>	
<div class=\"content\">";
echo"<input name=\"maql\" type=\"text\" class=\"search\" id=\"searchid\" style=\"text-align:center;width:100%;background:#8adaa5;height:25px;\"
value=\"$maql\" />
<div id=\"result\"></div>
</div>
</td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#9966CC;\"> <strong>Mã thiết bị (Copy)<input type=\"checkbox\" name=\"copy\" value=\"1\"></strong> </td>";
//$result2 = mysql_query("SELECT ghichufinal FROM hososcbd_iso WHERE mavt='$mavt' and somay='$somay' and model='$model'") ;
$result2 = mysql_query("SELECT ghichufinal FROM hososcbd_iso WHERE hoso='$edithoso'") ;
while($row = mysql_fetch_array($result2))
				{
					if($row['ghichufinal']!="")
					$ghichufinal =$row['ghichufinal'];
				}
                if ($phanquyen=="1") {
			$tenthietbisql1 = mysql_query("SELECT DISTINCT mavt,somay,hoso,model FROM hososcbd_iso WHERE phieu='$fieu'") ;
		}

		else {
		$tenthietbisql1 = mysql_query("SELECT DISTINCT mavt,somay,hoso,model FROM hososcbd_iso WHERE phieu='$fieu' and ngaykt ='0000-00-00'") ;
		$tenthietbisql2 = mysql_query("SELECT DISTINCT mavt,somay,model FROM hososcbd_iso WHERE phieu='$fieu' and ngaykt !='0000-00-00' ") ;
			while($row = mysql_fetch_array($tenthietbisql2))
			{
			$mavt =$row['mavt'];	
			$somay =$row['somay'];
			$model =$row['model'];
			if ($model=="") $mamay=$mavt;else $mamay="$mavt-$model";
		echo "<span style=\"text-align:center;color:red;font-size: 18;padding-left:50px\">Chỉ có admin mới được sửa hồ sơ Máy:</span><span style=\"color:blue;font-size: 18;\"> $mamay </span><span style=\"color:red;font-size: 18;\">có ngày kết thúc</span></br>";
			}
		}
echo"<td> <select name=\"hosomay\" onchange=\"this.form.submit()\" style=\"border-style:none;width:100%;height:30px;\">
		<option value=\"all\"></option>";
		$ck=0;
		while($row = mysql_fetch_array($tenthietbisql1))
		{
			$mavt =$row['mavt'];	
			$somay =$row['somay'];
			$model =$row['model'];
			$hosom =$row['hoso'];
			$sqlmodel = mysql_query("SELECT DISTINCT mamay FROM thietbi_iso WHERE mavt='$mavt' and somay='$somay' and model='$model'") ;
			while($row = mysql_fetch_array($sqlmodel))
			{
			$mamay =$row['mamay'];
			}
			
			$ck=1;
			echo "<option value=\"$hosom\" style=\"background:#87CEEB;\"> $mamay</option>";
		}
echo"</select> </td></tr>";
		if ($ck==0) {
		echo "<span style=\"text-align:center;color:red;font-size: 18;;padding-left:50px\">Chỉ có admin mới được sửa hồ sơ có ngày kết thúc</span>";
			exit;
		}
echo"<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Nhóm sửa chữa</strong> </td>
<td>
<select name=\"nhomsc\" style=\"border-style:none;width:100%;height:100%;\">
		<option value=\"\"></option>
		<option value=\"RDNGA\"> Nhóm RDNGA </option>
		<option value=\"CNC\"> Nhóm CNC</option>
</select>
  </td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Số hồ sơ</strong> </td>
<td> <input style=\"border-style:none;width:100%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"sohs\" size=\"36\" type=\"text\" > </td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Ngày BĐ</strong> </td>
<td><input style=\"border-style:none;width:100%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"ngayth\" size=\"36\" type=\"text\" >  </td>
</tr>
</table>
";

echo "<p style=\"margin-left:50px;\"> <strong>I. NGƯỜI THỰC HIỆN </strong> <br/> <br/> </p>
<table class=\"table1\" style=\"margin-left:50px;width:800px;\">

	<tr>
<th style=\"text-align:center;font-size: 15;width:60px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:400px;\"> Họ tên</th>
<th style=\"text-align:center;font-size: 15;\"> Giờ làm việc</th>
</ul>
</tr>";
$i=1;
while($i<=8){
echo"<tr>
<td><center> $i </center> </td>
<td><input type=text name=\"hoten$i\" style=\"border-style:none;width:100%;\" </td>
<td><input type=text name=\"gio$i\" style=\"border-style:none;width:100%;\"> </td>
</tr>";
$i++;
}
echo"</table>";
echo "<p style=\"margin-left:50px;\"> <strong>II. CÁC THIẾT BỊ HỖ TRỢ </strong> <br/> <br/> </p>
<table class=\"table1\" style=\"margin-left:50px;width:800px;\">

	<tr>
<th style=\"text-align:center;font-size: 15;width:60px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:405px;\"> Tên viết tắt</th>
<th style=\"text-align:center;font-size: 15;width:335px\"> Serial Number</th>
</ul>
</tr>";
$i=1;
while($i<=5){
echo"<tr>
<td><center> $i </center> </td>
<td><select name=\"tenvt$i\" style=\"border-style:none;width:100%;height:30px;\">
		<option value=\"\"></option>
	</select></td>
<td><input type=text name=\"sn$i\" style=\"border-style:none;width:100%;\"> </td>
</tr>";
$i++;
}
echo"</table></table></br>";
/*
 echo"
<p style=\"margin-left:50px;\"> <strong>III. DANH MỤC VẬT TƯ</strong> <br/> <br/> </p>

<table class=\"table1\" style=\"margin-left:50px;width:800px;\">

	<tr>
<th style=\"text-align:center;font-size: 15;width:30px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:120px;\"> Mã Vật Tư</th>
<th style=\"text-align:center;font-size: 15;width:120px;\"> Mô tả</th>
<th style=\"text-align:center;font-size: 15;width:90px;\"> P/N</th>
<th style=\"text-align:center;font-size: 15 ;width:60px;\"> ĐVT </th>
<th style=\"text-align:center;font-size: 15 ;width:70px;\"> Số lượng </th>
</ul>
</tr>";
$i=1;
while($i<=5){
echo"<tr>
<td><center> $i </center> </td>
<td><input type=text name=\"malinhkien$i\" style=\"border-style:none;width:100%;\"> </td>
<td><input type=text name=\"mota$i\" style=\"border-style:none;width:100%;\"> </td>
<td><input type=text name=\"pn$i\" style=\"border-style:none;width:100%;\"> </td>
<td><input type=text name=\"dvt$i\" style=\"border-style:none;width:100%;\"> </td>
<td><input type=text name=\"soluong$i\" style=\"border-style:none;width:100%;\"> </td>
</tr>";
$i++;
}
echo"</table></br>";
*/
echo "  <span style=\"margin-left:50px;\"> <strong>IV. NỘI DUNG CÔNG VIỆC : </strong> KT<input type=\"checkbox\" name=\"cv\" value=\"KT\">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\" > 
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BDDK<input type=\"checkbox\" name=\"cv\" value=\"BDDK\" ></span>
	     <br><br>";
echo"<table class=\"table7\" style=\"margin-left:50px;\">
		<tr>
		<td  style=\"text-align:left;color:black;font-size: 18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Mô tả chi tiết tình trạng của thiết bị, các hỏng hóc (nếu có) do nhân viên xưởng kiểm tra, phát hiện</b> </td>
		<td><input type=text name=\"ttktbefore\" style=\"border-style:none;width:100%;height:100px;\"> </td>
		</tr>
		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Mô tả công việc thực hiện hoặc cách khắc phục hỏng hóc</b></td>
		<td><input type=text name=\"khacphuc\" style=\"border-style:none;width:100%;height:100px;\"> </td>
		</tr>";

echo"	
	<tr>
	<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Kiểm tra tình trạng kỹ thuật của thiết bị sau khi BD/SC</b></td>";
		echo"<td>";
echo "</td></tr>";

echo"		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Tình trạng kỹ thuật của thiết bị sau khi sửa chữa </b> </td>
		<td><select name=\"ttktafter\" style=\"border-style:none;width:100%;height:100px;\">
		<option value=\"\"></option>
		<option value=\"Đạt\">Đạt </option>
		<option value=\"Hỏng\">Hỏng (Không khắc phục được)</option>
		<option value=\"Chờ vật tư thay thế\">Chờ vật tư thay thế</option>
		<option value=\"Chưa kết luận\">Chưa kết luận</option>
		<option value=\"Đang sửa chữa\">Đang sửa chữa</option>
		<option value=\"TTKTDB\">TTKT Đặc biệt</option>
		</select>
		 </td>
		</tr>";
echo"<tr>
	<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Ghi chú tình trạng kỹ thuật</b></td>";
echo"<td><input type=text name=\"ghichufinal\" style=\"border-style:none;width:100%;height:100px;\">$ghichufinal</td></tr>";
echo"</table>";
echo"
<input type=hidden name=maqly value=\"$maqly\">
<input type=hidden name=username value=$username>
<input type=hidden name=password value=$password>
<input type=hidden name=hoso value=phieusuachua>
</form>
</body>
</html> " ;
}
if ($donvi=="other") {
	//header("Location: donvi.php");
	echo"	
	<form action=\"formsc.php\" method=\"post\">
	<table>
	<tr><td style=\"height:30px;width:600px;padding-left:50px;\"><strong>Mã đơn vị</strong></strong> &nbsp;&nbsp;&nbsp;
	<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"madv\" size=\"60\" type=\"text\" >             </td>
	</tr>
	<tr><td style=\"height:30px;padding-left:50px;\"><strong>Tên đơn vị</strong> &nbsp;&nbsp;
	<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"tendv\" size=\"60\" type=\"text\">
	<input type=hidden name=username value=$username>
	<input type=hidden name=password value=$password>
	<input type=hidden name=hoso value=phieuscbd>	
	<input type=hidden name=nhapdv value=yes>	
	</td>
	<td> </td>
	</tr>
	<tr><td style=\"height:30px;width:600px;padding-left:50px;\"><input type=\"submit\" name=\"submit\" value=\"nhapdulieu\"</td></tr>
	</table>
	</form>";
}
if(($nhap=="")&&($button=="")&&($save=="")&&($suadl=="")&&($xoadl=="")&&($donvi!="other")){
if(($solan=="")&&($chonmay=="yes")){
$sohoso=isset($_POST['sohoso']) ? $_POST['sohoso'] : '';
$ngay=isset($_POST['ngay']) ? $_POST['ngay'] : '';
$khachhang=isset($_POST['khachhang']) ? $_POST['khachhang'] : '';
$nhanvien=isset($_POST['nhanvien']) ? $_POST['nhanvien'] : '';
$donvi=isset($_POST['donvi']) ? $_POST['donvi'] : '';
$submit=isset($_POST['submit']) ? $_POST['submit'] : '';
$dienthoai=isset($_POST['dienthoai']) ? $_POST['dienthoai'] : '';
$i=0;
$soluong="";
for($i=1;$i<=5;$i++){
$tb[$i]=isset($_POST["thietbi$i"]) ? $_POST["thietbi$i"] : '';
	$tb[$i]=trim($tb[$i]," ");
	$p = stripos($tb[$i],".") ;
	$thietbi[$i] = trim (substr($tb[$i],0,$p)," ") ;
	$model[$i] = trim (substr($tb[$i],$p+1,strlen($tb[$i]))," ") ;
$somay[$i]=isset($_POST["somay$i"]) ? $_POST["somay$i"] : '';
$soluong[$i]=isset($_POST["soluong$i"]) ? $_POST["soluong$i"] : '';
if ($soluong[$i]=="") $soluong[$i]=1;
$tinhtrang[$i]=isset($_POST["tinhtrang$i"]) ? $_POST["tinhtrang$i"] : '';
$yeucau[$i]=isset($_POST["yeucau$i"]) ? $_POST["yeucau$i"] : '';
$vitri[$i]=isset($_POST["vitri$i"]) ? $_POST["vitri$i"] : '';
if($thietbi[$i]!=""){
$shs[$i]="$sohoso-$i";
}else{
$shs[$i]="";
}
}
$ycthemkh=isset($_POST['ycthemkh']) ? $_POST['ycthemkh'] : '';
$xemxetxuong=isset($_POST['xemxetxuong']) ? $_POST['xemxetxuong'] : '';
$lo=isset($_POST['lo']) ? $_POST['lo'] : '';
$gieng=isset($_POST['gieng']) ? $_POST['gieng'] : '';
$mo=isset($_POST['mo']) ? $_POST['mo'] : '';
echo "	<html lang=\"vi\">
	<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
	<SCRIPT LANGUAGE=\"JavaScript\" SRC=\"java/CalendarPopup.js\"></SCRIPT>
	<SCRIPT LANGUAGE=\"JavaScript\">
	var cal = new CalendarPopup();
	</SCRIPT>
	</head>
	<body>
	<table style=\"margin-top:20px;width:100%;\">
	<tr>
	<td  style=\"padding-left:50px;width:30%;\"> XN Địa Vật Lý GK <br/>X&#432;&#7903;ng
SCTB&#272;VL </td>
	<td>
	<h2> <span style=\"color:blue;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PHIẾU YÊU CẦU DỊCH VỤ </span> 
	</h2>
	</td> </tr> </table>";
echo"   <form method=\"post\" action=\"formsc.php\" enctype=\"multipart/form-data\" name=\"example\">
	<br/>
	<table style=\"margin-left:50px;width:950px;\">
	<tr bgcolor=\"#FFA500\">
	<td style=\"text-align:center;font-size: 15;width:25%;\"><b>   SỐ HỒ SƠ </b>
	</td>
	<td style=\"text-align:center;font-size: 15;width:30%;\">	<b> NGÀY   </b>
	</td>
	<td style=\"text-align:center;font-size: 15;width:45%;\"><b> ĐƠN VỊ  </b>
	</td></tr><tr><td>	
	<div class=\"content\">
	<input type=\"text\" name=\"sohoso\" class=\"search\" id=\"searchid\" style=\"width:100%;background:#8adaa5;height:25px;\"value=\"$sohoso\" />
	<div id=\"result\"></div>
	</div>
	</td><td>
	<input  name=\"ngay\" size=\"20\" type=\"text\" style=\"width:100px;background:#8adaa5;width:90%;height:25px;\" value=\"$ngay\" />
	<A HREF=\"#\" onClick=\"cal.select(document.forms['example'].ngay,'anchor1','dd/MM/yyyy'); return false;\"
	NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A>
	</td>
	<td>
	<select name=\"donvi\" onchange=\"this.form.submit()\" style=\"background:#8adaa5;width:100%;height:25px;\"  >
	        <option value=\"$donvi\">$donvi</option>";
		$r3 = mysql_query("SELECT DISTINCT madv,tendv FROM donvi_iso");
		while($row = mysql_fetch_array($r3))
		{
			$madv =$row['madv'];
			$tendv = $row['tendv'];
			echo "<option value=\"$madv\">$madv - $tendv</option>";
		}		
	echo"</select>
	</td>
	</tr>
	</table>
	<br/>
	<table>
	<tr><td style=\"height:30px;width:500px;padding-left:50px;\"><strong>KHÁCH HÀNG &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> &nbsp;&nbsp;&nbsp;&nbsp;
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"khachhang\" size=\"50\" type=\"text\"  value=\"$khachhang\"></td>
		<td style=\"height:30px;width:400px\"><strong>ĐIỆN THOẠI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> 
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"dienthoai\" size=\"25\" type=\"text\"  value=\"$dienthoai\">       
		</td>
			
			</tr>
		<tr><td style=\"height:30px;padding-left:50px;width:600px;\"><strong>NHÂN VIÊN XƯỞNG &nbsp;&nbsp;</strong>
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"nhanvien\" size=\"50\" type=\"text\"  value=\"$nhanvien\">
		</td>
		<td> </td>
	        </tr>";
	echo"<tr>
	<td></td></tr>
	</table>
	<br/>
	<table class=\"table1\" >
	<tr>
		<th style=\"text-align:center;font-size: 15;width:30px; height:30px; \"> STT</th>
		<th style=\"text-align:center;font-size: 15;width:190px;\"> TÊN THIẾT BỊ</th>
		<th style=\"text-align:center;font-size: 15;width:90px;\"> SỐ MÁY</th>
		
		<th style=\"text-align:center;font-size: 15 ;width:300px;\"> TÌNH TRẠNG KỸ THUẬT </th>
		<th style=\"text-align:center;font-size: 15 ;width:80px;\"> NỘI DUNG </br>YÊU CẦU</th>
		<th style=\"text-align:center;font-size: 15 ;width:150px;\"> MÁY TỪ ĐÂU VỀ XƯỞNG</th>
	</tr>";
$i =1 ;
while($i<=5){
	if($model[$i]=="") $modelmay=$thietbi[$i];else $modelmay="$thietbi[$i]-$model[$i]";
	echo"   <tr>
		<td  style=\"text-align:center;color:black;font-size: 15;\"> $i </td>
		<td> 
		<select name=\"thietbi$i\" onchange=\"this.form.submit()\" style=\"border-style:none;width:100%;height:30px;\">
		<option value=\"$thietbi[$i].$model[$i]\">$modelmay</option>
		<option value=\"\"></option>
		" ;
    		$tenthietbisql1 = mysql_query("SELECT DISTINCT mavt,tenvt,model FROM thietbi_iso where madv='$donvi' order by mavt") ;
		while($row = mysql_fetch_array($tenthietbisql1))
		{
			$mavt =$row['mavt'];	
			$tenvt =$row['tenvt'];
			$modelt =$row['model'];
			if($modelt=="") $modelmay=$mavt;else $modelmay="$mavt-$modelt";
			echo"<option  value=\"$mavt.$modelt\">$modelmay - $tenvt</option>";
			
		}
		echo"</select>
		</td>
		<td>
		<select name=\"somay$i\" style=\"border-style:none;width:100%;\">
		<option value=\"$somay[$i]\">$somay[$i] </option>
		<option value=\"\"></option>
		";

		$tenthietbisql2 = mysql_query("SELECT DISTINCT somay FROM thietbi_iso WHERE mavt='$thietbi[$i]' and model='$model[$i]'") ;
		while($row = mysql_fetch_array($tenthietbisql2))
		{
			$sm =$row['somay'];
			if($sm!=$somay[$i]){
				/*$searchbg = mysql_query("SELECT bg FROM hososcbd_iso WHERE mavt='$thietbi[$i]' and somay='$sm'") ;
                                	while($row = mysql_fetch_array($searchbg))
					{
							$bg =$row['bg'];
					}
					if($bg==1)
				 */			
				echo "<option value=\"$sm\"> $sm </option>";
			}
		}
		echo"</select>	</td>
		
		<td><input type=text name=\"tinhtrang$i\" style=\"border-style:none;width:100%;text-align:center;\"  value=\"$tinhtrang[$i]\"></td>";
	//	echo"<td><input type=text name=\"yeucau$i\" style=\"border-style:none;width:100%;text-align:center;\"  value=\"$yeucau[$i]\"> </td>";
	    echo"<td>";	
		echo"<select name=\"yeucau$i\"  style=\"border-style:none;width:100%;height:30px;\">
		<option value=\"$yeucau[$i]\">$yeucau[$i]</option>" ;
		echo "<option value=\"KT\">KT</optiop>";
		echo "<option value=\"BD\">BD</optiop>";
		echo "<option value=\"SC\">SC</optiop>";
		echo"</select>";
		echo"</td>";
		if($thietbi[$i]!=""){
		echo"<td>";	
		echo"<select name=\"vitri$i\"  style=\"border-style:none;width:100%;height:30px;\">
		<option value=\"$vitri[$i]\">$vitri[$i]</option>" ;
    		$tenthietbisql1 = mysql_query("SELECT DISTINCT mavitri,tenvitri FROM vitri_iso") ;
		while($row = mysql_fetch_array($tenthietbisql1))
		{
			$mavitri =$row['mavitri'];	
			$tenvitri =$row['tenvitri'];	
			echo "<option value=\"$mavitri\">$mavitri - $tenvitri</optiop>";
		}
		echo"</select>";
		echo"</td>";
		}else{
		echo"<td><input type=text style=\"border-style:none;width:100%;text-align:center;\" ></td>";
		}
		echo "<input type=hidden name=\"shs$i\" value=\"$shs[$i]\">";
		echo"</tr>";
		$i++;		
	}
		echo "<tr>
		<th style=\"text-align:center;font-size: 15;width:40px;\"></th>
		<th style=\"text-align:center;font-size: 15;width:180px;\"><a href=\"Danhmucsc.php?&start=0&ad=&sort=&s=&f=&mte_a=new\" target=\"_blank\">Thêm thiết bị mới</a></th>
		<th style=\"text-align:center;font-size: 15;width:80px;\"></th>
		
		<th style=\"text-align:center;font-size: 15 ;width:180px;\"></th>
		<th style=\"text-align:center;font-size: 15 ;width:120px;\"></th>
		<th style=\"text-align:center;font-size: 15 ;width:80px;\"><a href=\"vitri.php?&start=0&ad=&sort=&s=&f=&mte_a=new\" target=\"_blank\">Thêm vị trí mới</a></th>
		</tr>";
		echo"</table>
		</br>
		<table>
		<tr>
		<td><input type=\"image\" name=\"button\" value =\"them\"  src=\"buttonadd_files/add.jpg\" alt=\"Thêm\" 
		onclick=\"this.form.button.value = this.value\" style=\"margin-left:50px;\" /></td></tr>
		<tr><td style=\"height:30px;padding-left:50px;width:800px;\"><strong>CÁC YÊU CẦU KHÁC (NẾU CÓ) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"ycthemkh\" size=\"60\" type=\"text\" value=\"$ycthemkh\">
		</td>
		<td> </td>
		</tr>
		<tr><td style=\"height:30px;padding-left:50px;width:800px;\"><strong>XEM XÉT CỦA XƯỞNG &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"xemxetxuong\" size=\"60\" type=\"text\" value=\"$xemxetxuong\">
		</td>
		<td> </td>
		</tr>
		<tr><td style=\"height:30px;padding-left:50px;width:800px;\"><strong>PHỤC VỤ SẢN XUẤT CHO LÔ: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
		<select name=\"lo\"  style=\"border-style:none;width:50%;height:30px;font_family:Times New Roman;background:#8adaa5;height:25px;\">
		<option value=\"$lo\">$lo</option>";
		$sqllo = mysql_query("SELECT DISTINCT malo,tenlo FROM lo_iso") ;
		while($row = mysql_fetch_array($sqllo))
		{
			$malo =$row['malo'];	
			$tenlo =$row['tenlo'];	
			echo "<option value=\"$malo\">$malo - $tenlo</optiop>";
		}
		echo"</select>";
	echo"	</td>
		<td> </td></tr>
		<tr><td style=\"height:30px;padding-left:50px;width:800px;\"><strong>PHỤC VỤ SẢN XUẤT CHO MỎ :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong>
		<select name=\"mo\"  style=\"border-style:none;width:50%;height:30px;font_family:Times New Roman;background:#8adaa5;height:25px;\">
		<option value=\"$mo\">$mo</option>";
		$sqlmo = mysql_query("SELECT DISTINCT mamo,tenmo FROM mo_iso") ;
		while($row = mysql_fetch_array($sqlmo))
		{
			$mamo =$row['mamo'];	
			$tenmo =$row['tenmo'];	
			echo "<option value=\"$mamo\">$mamo - $tenmo</optiop>";
		}
		echo"</select>";
		echo"</td>
		<td> </td>
	    </tr>
		<tr><td style=\"height:30px;padding-left:50px;width:800px;\"><strong>PHỤC VỤ SẢN XUẤT CHO GIẾNG : </strong>
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"gieng\" size=\"60\" type=\"text\" value=\"$gieng\">
		</td>
		<td> </td>
	        </tr>
		</table>
		<table>
		<tr>
		<td><input type=hidden name=button value=\"\"></td>
		<td><input type=hidden name=username value=$username></td>
	 	<td><input type=hidden name=password value=$password></td>
		<td><input type=hidden name=chonmay value=yes></td>";
                if ($suaxoa!="yes")
		echo"<td >
		<input type=\"image\" name=\"nhap\" value=\"nhapphieudichvu\" src=\"upload/nhapdl.jpg\" alt=\"Nhap\" 
		onclick=\"this.form.nhap.value=this.value\" style=\"margin-left:430px;\"/></td>
		<input type=hidden name=nhap value=\"\">";
		else
		echo"<td >
		<input type=\"image\" name=\"suadl\" value=\"suayeucaudichvu\" src=\"upload/suadulieu.jpg\" alt=\"Sua\" 
		onclick=\"this.form.suadl.value=this.value\" style=\"margin-left:430px;\"/></td>
		<input type=hidden name=suadl value=\"\">
	        <input type=hidden name=suaxoa value=$suaxoa>
		";
		echo"</tr>
		</table>
	 	<input type=hidden name=hoso value=phieuscbd>
		</form>
		</body>
		</html> " ;
}
//if($thietbi6!=""){
if ($solan!="") {
$maquanly=isset($_POST['maquanly']) ? $_POST['maquanly'] : '';
$sohoso=isset($_POST['sohoso']) ? $_POST['sohoso'] : '';
$ngay=isset($_POST['ngay']) ? $_POST['ngay'] : '';
$khachhang=isset($_POST['khachhang']) ? $_POST['khachhang'] : '';
$nhanvien=isset($_POST['nhanvien']) ? $_POST['nhanvien'] : '';
$donvi=isset($_POST['donvi']) ? $_POST['donvi'] : '';
$submit=isset($_POST['submit']) ? $_POST['submit'] : '';
$dienthoai=isset($_POST['dienthoai']) ? $_POST['dienthoai'] : '';

for($i=1;$i<=5+$solan;$i++){
$tb[$i]=isset($_POST["thietbi$i"]) ? $_POST["thietbi$i"] : '';

        $tb[$i]=trim($tb[$i]," ");
	$p = stripos($tb[$i],".") ;
	$thietbi[$i] = trim (substr($tb[$i],0,$p)," ") ;
	$model[$i] = trim (substr($tb[$i],$p+1,strlen($tb[$i]))," ") ;

$somay[$i]=isset($_POST["somay$i"]) ? $_POST["somay$i"] : '';
$soluong[$i]=isset($_POST["soluong$i"]) ? $_POST["soluong$i"] : '';
if ($soluong[$i]=="") $soluong[$i]=1;
$tinhtrang[$i]=isset($_POST["tinhtrang$i"]) ? $_POST["tinhtrang$i"] : '';
$yeucau[$i]=isset($_POST["yeucau$i"]) ? $_POST["yeucau$i"] : '';
$vitri[$i]=isset($_POST["vitri$i"]) ? $_POST["vitri$i"] : '';
if($thietbi[$i]!=""){
$shs[$i]="$sohoso-$i";
}else{
$shs[$i]="";
}
}
$ycthemkh=isset($_POST['ycthemkh']) ? $_POST['ycthemkh'] : '';
$xemxetxuong=isset($_POST['xemxetxuong']) ? $_POST['xemxetxuong'] : '';
$lo=isset($_POST['lo']) ? $_POST['lo'] : '';
$gieng=isset($_POST['gieng']) ? $_POST['gieng'] : '';
$mo=isset($_POST['mo']) ? $_POST['mo'] : '';
echo "
<html lang=\"vi\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
<SCRIPT LANGUAGE=\"JavaScript\" SRC=\"java/CalendarPopup.js\"></SCRIPT>
<SCRIPT LANGUAGE=\"JavaScript\">
var cal = new CalendarPopup();
</SCRIPT>
</head>
<body>
<table style=\"margin-top:20px;width:100%;\">
<tr>
<td  style=\"padding-left:50px;width:30%;\"> XN Địa Vật Lý GK <br/>X&#432;&#7903;ng
SCTB&#272;VL</td>
<td>
<h2> <span style=\"color:blue;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PHIẾU YÊU CẦU DỊCH VỤ </span> 
</h2>
</td>
</tr>
</table>";
echo"   <form method=\"post\" action=\"formsc.php\" enctype=\"multipart/form-data\" name=\"example\">
	<br/>
	<table style=\"margin-left:50px;width:950px;\">
	<tr bgcolor=\"#FFA500\">
	
	<td style=\"text-align:center;font-size: 15;width:25%;\"><b>   SỐ HỒ SƠ </b>
	</td>
	<td style=\"text-align:center;font-size: 15;width:30%;\">	<b> NGÀY   </b>
	</td>
	<td style=\"text-align:center;font-size: 15;width:45%;\"><b> ĐƠN VỊ  </b>
	</td>
	</tr>
	<tr>
	<td>	
	<div class=\"content\">
	<input type=\"text\" name=\"sohoso\" class=\"search\" id=\"searchid\" style=\"width:100%;background:#8adaa5;height:25px;\"value=\"$sohoso\" />
	<div id=\"result\"></div>
	</div>
	</td>
	<td>
	<input  name=\"ngay\" size=\"20\" type=\"text\" style=\"width:100px;background:#8adaa5;width:90%;height:25px;\" value=\"$ngay\" />
	<A HREF=\"#\" onClick=\"cal.select(document.forms['example'].ngay,'anchor1','dd/MM/yyyy'); return false;\"
	NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A>
	</td>
	<td>
	<select name=\"donvi\" onchange=\"this.form.submit()\" style=\"background:#8adaa5;width:100%;height:25px;\"  >
	        <option value=\"$donvi\">$donvi</option>";
		$r3 = mysql_query("SELECT DISTINCT madv,tendv FROM donvi_iso");
		while($row = mysql_fetch_array($r3))
		{
			$madv =$row['madv'];
			$tendv = $row['tendv'];
			echo "<option  value=\"$madv\">$madv - $tendv</option>";
		}		
	echo"</select>
	</td>
	</tr>
	</table>
	<br/>
	<table>
		<tr><td style=\"height:30px;width:500px;padding-left:50px;\"><strong>KHÁCH HÀNG &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> &nbsp;&nbsp;&nbsp;&nbsp;
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"khachhang\" size=\"50\" type=\"text\"  value=\"$khachhang\"></td>
		<td style=\"height:30px;width:400px\"><strong>ĐIỆN THOẠI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> 
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"dienthoai\" size=\"25\" type=\"text\"  value=\"$dienthoai\">       
		</td>
			
			</tr>
		<tr><td style=\"height:30px;padding-left:50px;width:600px;\"><strong>NHÂN VIÊN XƯỞNG &nbsp;&nbsp;</strong>
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"nhanvien\" size=\"50\" type=\"text\"  value=\"$nhanvien\">
		</td>
		<td> </td>
	        </tr>";
	echo"<tr>
	<td></td></tr>
	</table>
	<br/>
	 <table class=\"table1\" >
	<tr>
	        <th style=\"text-align:center;font-size: 15;width:30px; height:30px; \"> STT</th>
		<th style=\"text-align:center;font-size: 15;width:190px;\"> TÊN THIẾT BỊ</th>
		<th style=\"text-align:center;font-size: 15;width:90px;\"> SỐ MÁY</th>
		
		<th style=\"text-align:center;font-size: 15 ;width:300px;\"> TÌNH TRẠNG KỸ THUẬT </th>
		<th style=\"text-align:center;font-size: 15 ;width:80px;\"> NỘI DUNG </br>YÊU CẦU</th>
		<th style=\"text-align:center;font-size: 15 ;width:150px;\"> MÁY TỪ ĐÂU VỀ XƯỞNG</th>
	</tr>";
$i =1 ;
while($i<=5+$solan){
	if($model[$i]=="") $modelmay=$thietbi[$i];else $modelmay="$thietbi[$i]-$model[$i]";
	echo"
		<tr>
		<td  style=\"text-align:center;color:black;font-size: 15;\"> $i </td>
		<td> 
		<select name=\"thietbi$i\" onchange=\"this.form.submit()\" style=\"border-style:none;width:100%;height:30px;\">
		<option value=\"$thietbi[$i].$model[$i]\">$modelmay</option>
		" ;
    		$tenthietbisql1 = mysql_query("SELECT DISTINCT mavt,tenvt,model FROM thietbi_iso where madv='$donvi' order by mavt") ;
		while($row = mysql_fetch_array($tenthietbisql1))
		{
			$mavt =$row['mavt'];	
			$tenvt =$row['tenvt'];
			$modelt =$row['model'];
			if($modelt=="") $modelmay=$mavt;else $modelmay="$mavt-$modelt";
			echo"<option  value=\"$mavt.$modelt\">$modelmay - $tenvt</option>";
			
		}
		echo"</select>
		</td>
		<td>
		<select name=\"somay$i\" style=\"border-style:none;width:100%;\">
		<option value=\"$somay[$i]\">$somay[$i] </option>
		";
		$tenthietbisql2 = mysql_query("SELECT DISTINCT somay FROM thietbi_iso WHERE mavt='$thietbi[$i]' and model='$model[$i]'") ;
		while($row = mysql_fetch_array($tenthietbisql2))
		{
			$sm =$row['somay'];
			if($sm!=$somay[$i]){	
				/*$searchbg = mysql_query("SELECT bg FROM hososcbd_iso WHERE mavt='$thietbi[$i]' and somay='$sm'") ;
                                	while($row = mysql_fetch_array($searchbg))
					{
							$bg =$row['bg'];
					}
					if($bg==1)
				 */			
				echo "<option value=\"$sm\"> $sm </option>";
			}
		}
		echo"</select>	</td>
		
		<td><input type=text name=\"tinhtrang$i\" style=\"border-style:none;width:100%;text-align:center;\"  value=\"$tinhtrang[$i]\"></td>";
	//	echo"<td><input type=text name=\"yeucau$i\" style=\"border-style:none;width:100%;text-align:center;\"  value=\"$yeucau[$i]\"> </td>";
	    echo"<td>";	
		echo"<select name=\"yeucau$i\"  style=\"border-style:none;width:100%;height:30px;\">
		<option value=\"$yeucau[$i]\">$yeucau[$i]</option>" ;
		echo "<option value=\"KT\">KT</optiop>";
		echo "<option value=\"BD\">BD</optiop>";
		echo "<option value=\"SC\">SC</optiop>";
		echo"</select>";
		echo"</td>";
		if($thietbi[$i]!=""){
		echo"<td>";	
		echo"<select name=\"vitri$i\"  style=\"border-style:none;width:100%;height:30px;\">
		<option value=\"$vitri[$i]\">$vitri[$i]</option>" ;
    		$tenthietbisql1 = mysql_query("SELECT DISTINCT mavitri,tenvitri FROM vitri_iso") ;
		while($row = mysql_fetch_array($tenthietbisql1))
		{
			$mavitri =$row['mavitri'];	
			$tenvitri =$row['tenvitri'];	
			echo "<option value=\"$mavitri\">$mavitri - $tenvitri</optiop>";
		}
		echo"</select>";
		echo"</td>";
		}else{
		echo"<td><input type=text style=\"border-style:none;width:100%;text-align:center;\" ></td>";
		}
		echo "<input type=hidden name=\"shs$i\" value=\"$shs[$i]\">";
		echo"</tr>";
		$i++;		
	}
		echo "<tr>
		<th style=\"text-align:center;font-size: 15;width:40px;\"></th>
		<th style=\"text-align:center;font-size: 15;width:180px;\"><a href=\"Danhmucsc.php?&start=0&ad=&sort=&s=&f=&mte_a=new\" target=\"_blank\">Thêm thiết bị mới</a></th>
		<th style=\"text-align:center;font-size: 15;width:80px;\"></th>
	
		<th style=\"text-align:center;font-size: 15 ;width:180px;\"></th>
		<th style=\"text-align:center;font-size: 15 ;width:120px;\"></th>
		<th style=\"text-align:center;font-size: 15 ;width:80px;\"><a href=\"vitri.php?&start=0&ad=&sort=&s=&f=&mte_a=new\" target=\"_blank\">Thêm vị trí mới</a></th>
		</tr>";
	 	echo"</table>
		</br>
		
		<table>
		<tr>
		<td><input type=\"image\" name=\"button\" value =\"them\"  src=\"buttonadd_files/add.jpg\" alt=\"Thêm\" 
		onclick=\"this.form.button.value = this.value\" style=\"margin-left:50px;\" /></td></tr></table>
		<table>
		<tr><td style=\"height:30px;padding-left:50px;width:800px;\"><strong>CÁC YÊU CẦU KHÁC (NẾU CÓ) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"ycthemkh\" size=\"60\" type=\"text\" value=\"$ycthemkh\">
		</td>
		<td> </td>
		</tr>
		<tr><td style=\"height:30px;padding-left:50px;width:800px;\"><strong>XEM XÉT CỦA XƯỞNG &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"xemxetxuong\" size=\"60\" type=\"text\" value=\"$xemxetxuong\">
		</td>
		<td> </td>
		</tr>
		<tr><td style=\"height:30px;padding-left:50px;width:800px;\"><strong>PHỤC VỤ SẢN XUẤT CHO LÔ: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
		<select name=\"lo\"  style=\"border-style:none;width:50%;height:30px;font_family:Times New Roman;background:#8adaa5;height:25px;\">
		<option value=\"$lo\">$lo</option>";
		$sqllo = mysql_query("SELECT DISTINCT malo,tenlo FROM lo_iso") ;
		while($row = mysql_fetch_array($sqllo))
		{
			$malo =$row['malo'];	
			$tenlo =$row['tenlo'];	
			echo "<option value=\"$malo\">$malo - $tenlo</optiop>";
		}
		echo"</select>";
	echo"	</td>
		<td> </td></tr>
		<tr><td style=\"height:30px;padding-left:50px;width:800px;\"><strong>PHỤC VỤ SẢN XUẤT CHO MỎ :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong>
		<select name=\"mo\"  style=\"border-style:none;width:50%;height:30px;font_family:Times New Roman;background:#8adaa5;height:25px;\">
		<option value=\"$mo\">$mo</option>";
		$sqlmo = mysql_query("SELECT DISTINCT mamo,tenmo FROM mo_iso") ;
		while($row = mysql_fetch_array($sqlmo))
		{
			$mamo =$row['mamo'];	
			$tenmo =$row['tenmo'];	
			echo "<option value=\"$mamo\">$mamo - $tenmo</optiop>";
		}
		echo"</select>";
		echo"</td>
		<td> </td>
	    </tr>
		<tr><td style=\"height:30px;padding-left:50px;width:800px;\"><strong>PHỤC VỤ SẢN XUẤT CHO GIẾNG : </strong>
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"gieng\" size=\"60\" type=\"text\" value=\"$gieng\">
		</td>
		<td> </td>
	        </tr>
		</table>
		<table>
		<tr>

		<td><input type=hidden name=button value=\"\"></td>
		<td><input type=hidden name=username value=$username></td>
		<td><input type=hidden name=password value=$password></td>";
                if ($suaxoa!="yes")
		echo"<td >
		<input type=\"image\" name=\"nhap\" value=\"nhapphieudichvu\" src=\"upload/nhapdl.jpg\" alt=\"Nhap\" 
		onclick=\"this.form.nhap.value=this.value\" style=\"margin-left:430px;\"/></td>
		<input type=hidden name=nhap value=\"\">";
		else
		echo"<td >
		<input type=\"image\" name=\"suadl\" value=\"suayeucaudichvu\" src=\"upload/suadulieu.jpg\" alt=\"Sua\" 
		onclick=\"this.form.suadl.value=this.value\" style=\"margin-left:430px;\"/></td>
		<input type=hidden name=suadl value=\"\">
	        <input type=hidden name=suaxoa value=$suaxoa>
		";   
		echo "</tr>
		</table>
		<input type=hidden name=solan value=$solan>
	 	<input type=hidden name=hoso value=phieuscbd>
		</form>
		</body>
		</html> " ;
	}
}
//xu ly button
if($button=="them")
{	
$sohoso=isset($_POST['sohoso']) ? $_POST['sohoso'] : '';
$ngay=isset($_POST['ngay']) ? $_POST['ngay'] : '';
$khachhang=isset($_POST['khachhang']) ? $_POST['khachhang'] : '';
$nhanvien=isset($_POST['nhanvien']) ? $_POST['nhanvien'] : '';
$donvi=isset($_POST['donvi']) ? $_POST['donvi'] : '';
$submit=isset($_POST['submit']) ? $_POST['submit'] : '';
$dienthoai=isset($_POST['dienthoai']) ? $_POST['dienthoai'] : '';
if ($solan=="") $solan=0;
$solan++;
for($i=1;$i<=5+$solan;$i++){
$tb[$i]=isset($_POST["thietbi$i"]) ? $_POST["thietbi$i"] : '';
        $tb[$i]=trim($tb[$i]," ");
	$p = stripos($tb[$i],".") ;
	$thietbi[$i] = trim (substr($tb[$i],0,$p)," ") ;
	$model[$i] = trim (substr($tb[$i],$p+1,strlen($tb[$i]))," ") ;

$somay[$i]=isset($_POST["somay$i"]) ? $_POST["somay$i"] : '';
$soluong[$i]=isset($_POST["soluong$i"]) ? $_POST["soluong$i"] : '';
if ($soluong[$i]=="") $soluong[$i]=1;
$tinhtrang[$i]=isset($_POST["tinhtrang$i"]) ? $_POST["tinhtrang$i"] : '';
$yeucau[$i]=isset($_POST["yeucau$i"]) ? $_POST["yeucau$i"] : '';
$vitri[$i]=isset($_POST["vitri$i"]) ? $_POST["vitri$i"] : '';
$shs[$i]=isset($_POST["shs$i"]) ? $_POST["shs$i"] : '';

}
$ycthemkh=isset($_POST['ycthemkh']) ? $_POST['ycthemkh'] : '';
$xemxetxuong=isset($_POST['xemxetxuong']) ? $_POST['xemxetxuong'] : '';
$lo=isset($_POST['lo']) ? $_POST['lo'] : '';
$gieng=isset($_POST['gieng']) ? $_POST['gieng'] : '';
$mo=isset($_POST['mo']) ? $_POST['mo'] : '';
echo "
<html lang=\"vi\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
<SCRIPT LANGUAGE=\"JavaScript\" SRC=\"java/CalendarPopup.js\"></SCRIPT>
<SCRIPT LANGUAGE=\"JavaScript\">
var cal = new CalendarPopup();
</SCRIPT>
</head>
<body>
<table style=\"margin-top:20px;width:100%;\">
<tr>
<td  style=\"padding-left:50px;width:30%;\"> XN Địa Vật Lý GK <br/>X&#432;&#7903;ng
SCTB&#272;VL </td>
<td>
<h2> <span style=\"color:blue;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PHIẾU YÊU CẦU DỊCH VỤ </span> 
</h2>
</td>
</tr>
</table>";
echo"   <form method=\"post\" action=\"formsc.php\" enctype=\"multipart/form-data\" name=\"example\">
	<br/>
	<table style=\"margin-left:50px;width:950px;\">
	<tr bgcolor=\"#FFA500\">
	
	<td style=\"text-align:center;font-size: 15;width:25%;\"><b>   SỐ HỒ SƠ </b>
	</td>
	<td style=\"text-align:center;font-size: 15;width:30%;\">	<b> NGÀY   </b>
	</td>
	<td style=\"text-align:center;font-size: 15;width:45%;\"><b> ĐƠN VỊ  </b>
	</td>
	</tr>
	<tr>
	<td>	
	<div class=\"content\">
	<input type=\"text\" name=\"sohoso\" class=\"search\" id=\"searchid\" style=\"width:100%;background:#8adaa5;height:25px;\"value=\"$sohoso\" />
	<div id=\"result\"></div>
	</div>
	</td>
	<td>
	<input  name=\"ngay\" size=\"20\" type=\"text\" style=\"width:100px;background:#8adaa5;width:90%;height:25px;\" value=\"$ngay\" />
	<A HREF=\"#\" onClick=\"cal.select(document.forms['example'].ngay,'anchor1','dd/MM/yyyy'); return false;\"
	NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A>
	</td>
	<td>
	<select name=\"donvi\" onchange=\"this.form.submit()\" style=\"background:#8adaa5;width:100%;height:25px;\"  >
	        <option value=\"$donvi\">$donvi</option>";
		$r3 = mysql_query("SELECT DISTINCT madv,tendv FROM donvi_iso");
		while($row = mysql_fetch_array($r3))
		{
			$madv =$row['madv'];
			$tendv = $row['tendv'];
			echo "<option  value=\"$madv\">$madv - $tendv</option>";
		}		
	echo"</select>
	</td>
	</tr>
	</table>
	<br/>
	<table>
	<tr><td style=\"height:30px;width:500px;padding-left:50px;\"><strong>KHÁCH HÀNG &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> &nbsp;&nbsp;&nbsp;&nbsp;
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"khachhang\" size=\"50\" type=\"text\"  value=\"$khachhang\"></td>
		<td style=\"height:30px;width:400px\"><strong>ĐIỆN THOẠI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> 
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"dienthoai\" size=\"25\" type=\"text\"  value=\"$dienthoai\">       
		</td>
			
			</tr>
		<tr><td style=\"height:30px;padding-left:50px;width:600px;\"><strong>NHÂN VIÊN XƯỞNG &nbsp;&nbsp;</strong>
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"nhanvien\" size=\"50\" type=\"text\"  value=\"$nhanvien\">
		</td>
		<td> </td>
	        </tr>";
	echo"<tr>
	<td></td></tr>
	</table>
	<br/>
	<table class=\"table1\" >
	<tr>
	        <th style=\"text-align:center;font-size: 15;width:30px; height:30px; \"> STT</th>
		<th style=\"text-align:center;font-size: 15;width:190px;\"> TÊN THIẾT BỊ</th>
		<th style=\"text-align:center;font-size: 15;width:90px;\"> SỐ MÁY</th>
		
		<th style=\"text-align:center;font-size: 15 ;width:300px;\"> TÌNH TRẠNG KỸ THUẬT </th>
		<th style=\"text-align:center;font-size: 15 ;width:80px;\"> NỘI DUNG </br>YÊU CẦU</th>
		<th style=\"text-align:center;font-size: 15 ;width:150px;\"> MÁY TỪ ĐÂU VỀ XƯỞNG</th>
	</tr>";
$i =1 ;
while($i<=5+$solan){
	if($model[$i]=="") $modelmay=$thietbi[$i];else $modelmay="$thietbi[$i]-$model[$i]";
	echo"
		<tr>
		<td  style=\"text-align:center;color:black;font-size: 15;\"> $i </td>
		<td> 
		<select name=\"thietbi$i\" onchange=\"this.form.submit()\" style=\"border-style:none;width:100%;height:30px;\">
		<option value=\"$thietbi[$i].$model[$i]\">$modelmay</option>
		" ;
    		$tenthietbisql1 = mysql_query("SELECT DISTINCT mavt,tenvt,model FROM thietbi_iso where madv='$donvi' order by mavt") ;
		while($row = mysql_fetch_array($tenthietbisql1))
		{
			$mavt =$row['mavt'];	
			$tenvt =$row['tenvt'];
			$modelt =$row['model'];
			if($modelt=="") $modelmay=$mavt;else $modelmay="$mavt-$modelt";
			echo"<option  value=\"$mavt.$modelt\">$modelmay - $tenvt</option>";
			
		}
		echo"</select>
		</td>
		<td>
		<select name=\"somay$i\" style=\"border-style:none;width:100%;\">
		<option value=\"$somay[$i]\">$somay[$i] </option>
		";
		$tenthietbisql2 = mysql_query("SELECT DISTINCT somay FROM thietbi_iso WHERE mavt='$thietbi[$i]' and model='$model[$i]'") ;
		while($row = mysql_fetch_array($tenthietbisql2))
		{
			$sm =$row['somay'];
			if($sm!=$somay[$i]){	
			/*$searchbg = mysql_query("SELECT bg FROM hososcbd_iso WHERE mavt='$thietbi[$i]' and somay='$sm'") ;
                                	while($row = mysql_fetch_array($searchbg))
					{
							$bg =$row['bg'];
					}
					if($bg==1)
			 */			
				echo "<option value=\"$sm\"> $sm </option>";
			}
		}
		echo"</select>	</td>
		
		<td><input type=text name=\"tinhtrang$i\" style=\"border-style:none;width:100%;text-align:center;\"  value=\"$tinhtrang[$i]\"></td>";
	//	echo"<td><input type=text name=\"yeucau$i\" style=\"border-style:none;width:100%;text-align:center;\"  value=\"$yeucau[$i]\"> </td>";
	    echo"<td>";	
		echo"<select name=\"yeucau$i\"  style=\"border-style:none;width:100%;height:30px;\">
		<option value=\"$yeucau[$i]\">$yeucau[$i]</option>" ;
		echo "<option value=\"KT\">KT</optiop>";
		echo "<option value=\"BD\">BD</optiop>";
		echo "<option value=\"SC\">SC</optiop>";
		echo"</select>";
		echo"</td>";	
		if($thietbi[$i]!=""){
		echo"<td>";	
		echo"<select name=\"vitri$i\"  style=\"border-style:none;width:100%;height:30px;\">
		<option value=\"$vitri[$i]\">$vitri[$i]</option>" ;
    		$tenthietbisql1 = mysql_query("SELECT DISTINCT mavitri,tenvitri FROM vitri_iso") ;
		while($row = mysql_fetch_array($tenthietbisql1))
		{
			$mavitri =$row['mavitri'];	
			$tenvitri =$row['tenvitri'];	
			echo "<option value=\"$mavitri\">$mavitri - $tenvitri</optiop>";
		}
		echo"</select>";
		echo"</td>";
		}else{
		echo"<td><input type=text style=\"border-style:none;width:100%;text-align:center;\" ></td>";
		}
		echo "<input type=hidden name=\"shs$i\" value=\"$shs[$i]\">";
		echo"</tr>";
		$i++;		
}
		echo "<tr>
		<th style=\"text-align:center;font-size: 15;width:40px;\"></th>
		<th style=\"text-align:center;font-size: 15;width:180px;\"><a href=\"Danhmucsc.php?&start=0&ad=&sort=&s=&f=&mte_a=new\" target=\"_blank\">Thêm thiết bị mới</a></th>
		<th style=\"text-align:center;font-size: 15;width:80px;\"></th>

		<th style=\"text-align:center;font-size: 15 ;width:180px;\"></th>
		<th style=\"text-align:center;font-size: 15 ;width:120px;\"></th>
		<th style=\"text-align:center;font-size: 15 ;width:80px;\"></th>
		</tr>";
		echo"</table>
		</br>
		<table>
		
		<tr>
		<td><input type=\"image\" name=\"button\" value =\"them\"  src=\"buttonadd_files/add.jpg\" alt=\"Thêm\" 
		onclick=\"this.form.button.value = this.value\" style=\"margin-left:50px;\" /></td></tr></table>
		<table>
		<tr><td style=\"height:30px;padding-left:50px;width:800px;\"><strong>CÁC YÊU CẦU KHÁC (NẾU CÓ) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"ycthemkh\" size=\"60\" type=\"text\" value=\"$ycthemkh\">
		</td>
		<td> </td>
		</tr>
		<tr><td style=\"height:30px;padding-left:50px;width:800px;\"><strong>XEM XÉT CỦA XƯỞNG &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"xemxetxuong\" size=\"60\" type=\"text\" value=\"$xemxetxuong\">
		</td>
		<td> </td>
		</tr>
		<tr><td style=\"height:30px;padding-left:50px;width:800px;\"><strong>PHỤC VỤ SẢN XUẤT CHO LÔ: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
		<select name=\"lo\"  style=\"border-style:none;width:50%;height:30px;font_family:Times New Roman;background:#8adaa5;height:25px;\">
		<option value=\"$lo\">$lo</option>";
		$sqllo = mysql_query("SELECT DISTINCT malo,tenlo FROM lo_iso") ;
		while($row = mysql_fetch_array($sqllo))
		{
			$malo =$row['malo'];	
			$tenlo =$row['tenlo'];	
			echo "<option value=\"$malo\">$malo - $tenlo</optiop>";
		}
		echo"</select>";
	echo"	</td>
		<td> </td></tr>
		<tr><td style=\"height:30px;padding-left:50px;width:800px;\"><strong>PHỤC VỤ SẢN XUẤT CHO MỎ :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong>
		<select name=\"mo\"  style=\"border-style:none;width:50%;height:30px;font_family:Times New Roman;background:#8adaa5;height:25px;\">
		<option value=\"$mo\">$mo</option>";
		$sqlmo = mysql_query("SELECT DISTINCT mamo,tenmo FROM mo_iso") ;
		while($row = mysql_fetch_array($sqlmo))
		{
			$mamo =$row['mamo'];	
			$tenmo =$row['tenmo'];	
			echo "<option value=\"$mamo\">$mamo - $tenmo</optiop>";
		}
		echo"</select>";
		echo"</td>
		<td> </td>
	        </tr>
		<tr><td style=\"height:30px;padding-left:50px;width:800px;\"><strong>PHỤC VỤ SẢN XUẤT CHO GIẾNG : </strong>
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"gieng\" size=\"60\" type=\"text\" value=\"$gieng\">
		</td>
		<td> </td>
	        </tr>
		</table>
		<table>
		<tr>
		<td><input type=hidden name=button value=\"\"></td>
		<td><input type=hidden name=username value=$username></td>
	 	<td><input type=hidden name=password value=$password></td>";
		if ($suaxoa!="yes")
		echo"<td >
		<input type=\"image\" name=\"nhap\" value=\"nhapphieudichvu\" src=\"upload/nhapdl.jpg\" alt=\"Nhap\" 
		onclick=\"this.form.nhap.value=this.value\" style=\"margin-left:430px;\"/></td>
		<input type=hidden name=nhap value=\"\">";
		else
		echo"<td >
		<input type=\"image\" name=\"suadl\" value=\"suayeucaudichvu\" src=\"upload/suadulieu.jpg\" alt=\"Sua\" 
		onclick=\"this.form.suadl.value=this.value\" style=\"margin-left:430px;\"/></td>
		<input type=hidden name=suadl value=\"\">
	        <input type=hidden name=suaxoa value=$suaxoa>
		";
		echo"</tr>
		</table>
		<input type=hidden name=solan value=$solan>
	 	<input type=hidden name=hoso value=phieuscbd>
		</form>
		</body>
		</html> " ;
}
if(($nhap=="nhapphieudichvu")||($suadl=="suayeucaudichvu"))
{

$sohoso=isset($_POST['sohoso']) ? $_POST['sohoso'] : '';
$ngay=isset($_POST['ngay']) ? $_POST['ngay'] : '';
$khachhang=isset($_POST['khachhang']) ? $_POST['khachhang'] : '';
$nhanvien=isset($_POST['nhanvien']) ? $_POST['nhanvien'] : '';
$donvi=isset($_POST['donvi']) ? $_POST['donvi'] : '';
$dienthoai=isset($_POST['dienthoai']) ? $_POST['dienthoai'] : '';
$ycthemkh=isset($_POST['ycthemkh']) ? $_POST['ycthemkh'] : '';
$xemxetxuong=isset($_POST['xemxetxuong']) ? $_POST['xemxetxuong'] : '';
$lo=isset($_POST['lo']) ? $_POST['lo'] : '';
$gieng=isset($_POST['gieng']) ? $_POST['gieng'] : '';
$mo=isset($_POST['mo']) ? $_POST['mo'] : '';
$r2 = mysql_query("SELECT DISTINCT nhom  FROM users where username='$username'");
	while($row = mysql_fetch_array($r2))
	{
		$nhom =$row['nhom'];
	}
$flag_again=0;
if($donvi==""){
echo"<center>
<font color=\"blue\"> NHẬP THÔNG TIN CÒN THIẾU TÊN ĐƠN VỊ . VUI LÒNG NHẬP ĐẦY ĐỦ</font></center>";
$flag_again=1;       
	}
if($khachhang==""){
echo"<center>
<font color=\"blue\"> NHẬP THÔNG TIN CÒN THIẾU TÊN KHÁCH HÀNG . VUI LÒNG NHẬP ĐẦY ĐỦ</font></center>";
$flag_again=1;       
	}
if($nhanvien==""){
echo"<center>
<font color=\"blue\"> NHẬP THÔNG TIN CÒN THIẾU TÊN NHÂN VIÊN. VUI LÒNG NHẬP ĐẦY ĐỦ</font></center>";
$flag_again=1;       
	}
if ($solan=="") $solan=0;
for($i=1;$i<=5+$solan;$i++){
$tb[$i]=isset($_POST["thietbi$i"]) ? $_POST["thietbi$i"] : '';
	$tb[$i]=trim($tb[$i]," ");
	$p = stripos($tb[$i],".") ;
	$thietbi[$i] = trim (substr($tb[$i],0,$p)," ") ;
	$model[$i] = trim (substr($tb[$i],$p+1,strlen($tb[$i]))," ") ;
$somay[$i]=isset($_POST["somay$i"]) ? $_POST["somay$i"] : '';
if (($thietbi[$i]!="")&&($somay[$i]=="")) {$flag_again=1;
echo"<center>
<font color=\"blue\"> NHẬP THÔNG TIN CÒN THIẾU SỐ MÁY CHO MÁY $thietbi[$i]. VUI LÒNG NHẬP ĐẦY ĐỦ</font></center>";
}
}
if ($flag_again==1) {

echo "
<html>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
</head>
<body>	
<center>
   <form action=\"formsc.php\" method=\"post\">
   <input type=hidden name=username value=$username>
   <input type=hidden name=password value=$password>
   <input type=hidden name=sohoso value=\"$sohoso\">
   <input type=hidden name=ngay value=\"$ngay\">
   <input type=hidden name=khachhang value=\"$khachhang\">
   <input type=hidden name=nhanvien value=\"$nhanvien\">
   <input type=hidden name=donvi value=\"$donvi\">
   <input type=hidden name=solan value=\"$solan\">
   <input type=hidden name=hoso value=\"phieuscbd\">
   <br/>
   <input type=\"submit\" value=\"Cancel\" />";
if ($suaxoa=="yes") echo "<input type=hidden name=suaxoa value=$suaxoa>";

for($i=1;$i<=5+$solan;$i++){
$tb[$i]=isset($_POST["thietbi$i"]) ? $_POST["thietbi$i"] : '';
//	$tb[$i]=trim($tb[$i]," ");
//	$p = stripos($tb[$i],".") ;
//	$thietbi[$i] = trim (substr($tb[$i],0,$p)," ") ;
//	$model[$i] = trim (substr($tb[$i],$p+1,strlen($tb[$i]))," ") ;
$somay[$i]=isset($_POST["somay$i"]) ? $_POST["somay$i"] : '';
$soluong[$i]=isset($_POST["soluong$i"]) ? $_POST["soluong$i"] : '';
if ($soluong[$i]=="") $soluong[$i]=1;
$tinhtrang[$i]=isset($_POST["tinhtrang$i"]) ? $_POST["tinhtrang$i"] : '';
$yeucau[$i]=isset($_POST["yeucau$i"]) ? $_POST["yeucau$i"] : '';
$vitri[$i]=isset($_POST["vitri$i"]) ? $_POST["vitri$i"] : '';
$shs[$i]=isset($_POST["shs$i"]) ? $_POST["shs$i"] : '';


echo"   <input type=hidden name=thietbi$i value=\"$tb[$i]\">
	<input type=hidden name=somay$i value=\"$somay[$i]\">
	<input type=hidden name=model$i value=\"$model[$i]\">
	
	<input type=hidden name=tinhtrang$i value=\"$tinhtrang[$i]\">
	<input type=hidden name=yeucau$i value=\"$yeucau[$i]\">	
	<input type=hidden name=vitri$i value=\"$vitri[$i]\">	
	<input type=hidden name=shs$i value=\"$shs[$i]\">";
}
echo"
	</form>
	</center>
	</body>
	</html>";
}else{
	

	$ngaystemp = $ngay;
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	if ($ngaystemp[$i]=="/") {
		$datetype=0;
		break;
	}elseif ($ngaystemp[$i]=="-") {
		$datetype=1;
		break;
	}
}
if ($datetype==0) {
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	$p = stripos($ngaystemp,"/") ;

if ($i== 0) {
	$ngays = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 1) {
	$thangs = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 2) {
	$nams = trim ($ngaystemp) ;
} 	
$p++ ;
$ngaystemp = substr($ngaystemp,$p);
}
}else {
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	$p = stripos($ngaystemp,"-") ;

if ($i== 0) {
	$nams = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 1) {
	$thangs = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 2) {
	$ngays = trim ($ngaystemp) ;
} 	
$p++ ;
$ngaystemp = substr($ngaystemp,$p);
}
}

$r3="SELECT max(stt) as tt FROM hososcbd_iso";
$result=mysqli_query($con,$r3);
if(mysqli_num_rows($result)>0){
$r3=mysql_query("SELECT max(stt) as tt FROM hososcbd_iso");
while($row = mysql_fetch_array($r3))
{
	$recc =$row['tt'];
}
}else $recc=0;
$recc++;
for($i=1;$i<=5+$solan;$i++){
$tb[$i]=isset($_POST["thietbi$i"]) ? $_POST["thietbi$i"] : '';
	$tb[$i]=trim($tb[$i]," ");
	$p = stripos($tb[$i],".") ;
	$thietbi[$i] = trim (substr($tb[$i],0,$p)," ") ;
	$model[$i] = trim (substr($tb[$i],$p+1,strlen($tb[$i]))," ") ;
$somay[$i]=isset($_POST["somay$i"]) ? $_POST["somay$i"] : '';
$soluong[$i]=isset($_POST["soluong$i"]) ? $_POST["soluong$i"] : '';
if ($soluong[$i]=="") $soluong[$i]=1;
$tinhtrang[$i]=isset($_POST["tinhtrang$i"]) ? $_POST["tinhtrang$i"] : '';
$yeucau[$i]=isset($_POST["yeucau$i"]) ? $_POST["yeucau$i"] : '';
$vitri[$i]=isset($_POST["vitri$i"]) ? $_POST["vitri$i"] : '';
$shs[$i]=isset($_POST["shs$i"]) ? $_POST["shs$i"] : '';
$searchbg="SELECT bg FROM hososcbd_iso WHERE mavt='$tb[$i]' and somay='$somay[$i]";
$result=mysqli_query($con,$searchbg);
if(mysqli_num_rows($result)>0){
$searchbg = mysql_query("SELECT bg FROM hososcbd_iso WHERE mavt='$tb[$i]' and somay='$somay[$i]'") ;
while($row = mysql_fetch_array($searchbg))
{
   $bg[$i] =$row['bg'];
}

if($bg[$i]==0) {
echo"<center>
<font color=\"blue\"> THIẾT BỊ $tb[$i] CÓ SỐ MÁY $somay[$i] CHƯA HOÀN THÀNH ĐƠN HÀNG VUI LÒNG KIỂM TRA LẠI</font></center>";
exit;
}
}
}
$curdate=date("Y-m-d H:i:s");
$ip_address= $_SERVER['REMOTE_ADDR'];
$bg=0;
$checkhoso=0;
$r3="SELECT phieu FROM hososcbd_iso";
$result=mysqli_query($con,$r3);
if(mysqli_num_rows($result)>0){
$r3=mysql_query("SELECT phieu FROM hososcbd_iso");
while($row = mysql_fetch_array($r3))
{
	$hosotemp =$row['phieu'];
	if ($hosotemp==$sohoso) {
		$checkhoso=1;
		break;
	}
}
}
if ($checkhoso==1) {
if ($suadl=="suayeucaudichvu") {
	// Update data
for($i=1;$i<=5+$solan;$i++){
	if($thietbi[$i]!=NULL){
	$checkmay=0;	
	$result2=mysql_query("SELECT hoso,maql FROM hososcbd_iso where phieu='$sohoso'");
	while($row = mysql_fetch_array($result2))
	{
		$hoso =$row['hoso'];
		$maql =$row['maql'];
		if ($hoso==$shs[$i]) {
		$checkmay=1;
		break;
	}
	}
	if ($checkmay==1) {
$update = "update hososcbd_iso SET
	mavt='$thietbi[$i]',
	somay='$somay[$i]',
	ngayyc='$nams-$thangs-$ngays',
	madv='$donvi',
        solg='1',
	cv='$yeucau[$i]',
	ngyeucau='$khachhang',
	ngnhyeucau='$nhanvien',
	ttktbefore='$tinhtrang[$i]',
	vitrimaybd='$vitri[$i]',
	dienthoai='$dienthoai',
	ycthemkh='$ycthemkh',
	xemxetxuong='$xemxetxuong',
	lo='$lo',
	gieng='$gieng',
	mo='$mo',
	model='$model[$i]'
	where phieu='$sohoso' and hoso='$shs[$i]'";
mysql_query($update) or die(mysql_error());
	}else {
//$maquanly="$nams$thangs$ngays-$donvi-$sohoso-N1";
$insert = "insert into hososcbd_iso(
stt,
maql,
mavt,
somay,
ngayyc,
madv,
phieu,
solg,
cv,
hoso,
ngyeucau,
ngnhyeucau,
ngaykt,
ttktbefore,
honghoc,
khacphuc,
ttktafter,
ghichu,
ngayth,
tbdosc,
nhomsc,
bg,
ngaybdtt,
vitrimaybd,
dienthoai,
ycthemkh,
xemxetxuong,
lo,
gieng,
mo,
model
) values (
'$recc',
'$maql',
'$thietbi[$i]',
'$somay[$i]',
'$nams-$thangs-$ngays',
'$donvi',
'$sohoso',
'1',
'$yeucau[$i]',
'$shs[$i]',
'$khachhang',
'$nhanvien',
'0000-00-00',
'$tinhtrang[$i]',
'',
'',
'',
'',
'0000-00-00',
'',
'$nhom',
'$bg',
'0000-00-00',
'$vitri[$i]',
'$dienthoai',
'$ycthemkh',
'$xemxetxuong',
'$lo',
'$gieng',
'$mo',
'$model[$i]'
)" ;
mysql_query($insert) or die(mysql_error());
$recc++;
	}
	}
}
}else{
	$maxphieu=$sohoso +1;
		if(($maxphieu>0)&&($maxphieu<=9)) $fieu="000$maxphieu";
		else if(($maxphieu>=10)&&($maxphieu<=99))  $fieu="00$maxphieu";
		else if(($maxphieu>=100)&&($maxphieu<=999))  $fieu="0$maxphieu";
		else $fieu="$maxphieu";
	echo "
<html>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
</head>
<body>	
<center>
   <form action=\"formsc.php\" method=\"post\">
   <input type=hidden name=username value=$username>
   <input type=hidden name=password value=$password>
   <input type=hidden name=sohoso value=\"$fieu\">
   <input type=hidden name=ngay value=\"$ngay\">
   <input type=hidden name=khachhang value=\"$khachhang\">
   <input type=hidden name=nhanvien value=\"$nhanvien\">
   <input type=hidden name=donvi value=\"$donvi\">
   <input type=hidden name=solan value=\"$solan\">
   <input type=hidden name=hoso value=\"phieuscbd\">
   <br/>
   <font color=\"red\">Hồ sơ đã tồn tại (Vừa mới có người nhập) </br>
   Bấm \"Nhap Lai\" số hồ sơ sẽ tự tăng</br></font>
   </br>
   <input type=\"submit\" value=\"Nhap Lai\" />";
if ($suaxoa=="yes") echo "<input type=hidden name=suaxoa value=$suaxoa>";

for($i=1;$i<=5+$solan;$i++){
$tb[$i]=isset($_POST["thietbi$i"]) ? $_POST["thietbi$i"] : '';
//	$tb[$i]=trim($tb[$i]," ");
//	$p = stripos($tb[$i],".") ;
//	$thietbi[$i] = trim (substr($tb[$i],0,$p)," ") ;
//	$model[$i] = trim (substr($tb[$i],$p+1,strlen($tb[$i]))," ") ;
$somay[$i]=isset($_POST["somay$i"]) ? $_POST["somay$i"] : '';
$soluong[$i]=isset($_POST["soluong$i"]) ? $_POST["soluong$i"] : '';
if ($soluong[$i]=="") $soluong[$i]=1;
$tinhtrang[$i]=isset($_POST["tinhtrang$i"]) ? $_POST["tinhtrang$i"] : '';
$yeucau[$i]=isset($_POST["yeucau$i"]) ? $_POST["yeucau$i"] : '';
$vitri[$i]=isset($_POST["vitri$i"]) ? $_POST["vitri$i"] : '';
$shs[$i]="$sohoso-$i";

echo"   <input type=hidden name=thietbi$i value=\"$tb[$i]\">
	<input type=hidden name=somay$i value=\"$somay[$i]\">
	<input type=hidden name=model$i value=\"$model[$i]\">
	<input type=hidden name=soluong$i value=\"$soluong[$i]\">
	<input type=hidden name=tinhtrang$i value=\"$tinhtrang[$i]\">
	<input type=hidden name=yeucau$i value=\"$yeucau[$i]\">	
	<input type=hidden name=vitri$i value=\"$vitri[$i]\">	
	<input type=hidden name=shs$i value=\"$shs[$i]\">";
}
echo"
	</form>
	</center>
	</body>
	</html>";
	exit;
}	
}else{
//Insert data to MySQL
for($i=1;$i<=5+$solan;$i++){
if($thietbi[$i]!=NULL){	
	$maql="$nams$thangs$ngays-$donvi-$sohoso";
$insert = "insert into hososcbd_iso(
stt,
maql,
mavt,
somay,
ngayyc,
madv,
phieu,
solg,
cv,
hoso,
ngyeucau,
ngnhyeucau,
ngaykt,
ttktbefore,
honghoc,
khacphuc,
ttktafter,
ghichu,
ngayth,
tbdosc,
nhomsc,
bg,
ngaybdtt,
vitrimaybd,
dienthoai,
ycthemkh,
xemxetxuong,
lo,
gieng,
mo,
model
) values (
'$recc',
'$maql',
'$thietbi[$i]',
'$somay[$i]',
'$nams-$thangs-$ngays',
'$donvi',
'$sohoso',
'1',
'$yeucau[$i]',
'$shs[$i]',
'$khachhang',
'$nhanvien',
'0000-00-00',
'$tinhtrang[$i]',
'',
'',
'',
'',
'0000-00-00',
'',
'$nhom',
'$bg',
'0000-00-00',
'$vitri[$i]',
'$dienthoai',
'$ycthemkh',
'$xemxetxuong',
'$lo',
'$gieng',
'$mo',
'$model[$i]'
)" ;
mysql_query($insert) or die(mysql_error());
$recc++;
}
}
}
	// luu lai dau vet khi tac dong den CSDL
$r3="SELECT max(stt) as tt FROM lichsudn_iso";
$result=mysqli_query($con,$r3);
if(mysqli_num_rows($result)>0){
$r3=mysql_query("SELECT max(stt) as tt FROM lichsudn_iso");
while($row = mysql_fetch_array($r3))
{
	$tt =$row['tt'];
}
}else $tt=0;
$tt++;
$r4=mysql_query("SELECT madv  FROM users where username='$username'");
while($row = mysql_fetch_array($r4))
{
	$madv =$row['madv'];
}
$insert = "insert into lichsudn_iso(
stt,
username,
madv,
nhom,
curdate,
ip_address,
maql
) values (
'$tt',
'$username',
'$madv',
'$nhom',
'$curdate',
'$ip_address',
'$maql'
)" ;
mysql_query($insert) or die(mysql_error());
echo"
<html lang=\"vi\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
</head>
<body>
<br/>
<table style=\"width:100%;\">
<tr>
<td style=\"padding-left:80px;font-size: 16;\"> XN Địa Vật Lý GK <br/> X&#432;&#7903;ng
SCTB&#272;VL </td>
<td style=\"font-size:20;\">  <b>&nbsp;&nbsp;&nbsp;&nbsp; PHIẾU YÊU CẦU DỊCH VỤ  </b><p style=\"font:Times New Roman;font-size: 16;\" ><b>Số hồ sơ: <input style=\"font_family:Times New Roman;text-align:center;border: 1px dotted;font-size:16; font-weight: bold;\"  name=\"sohoso\" size=\"15\" type=\"text\" readonly value=\"$sohoso\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ngày : </b> $ngay</p></td>
</tr>
</table>
<table>
<br/>
<table style=\"width:100%;margin-left:80px;\">
<tr>
<td style=\"width:50%;font-size:16;\"> 1. Người yêu cầu: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>$khachhang </b></td> 
</tr>
<tr>
<td style=\"width:50%;font-size:16;\">&nbsp;&nbsp;&nbsp; Đơn vị: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b> $donvi </b> </td>
<td style=\"width:50%;font-size:16;\"> Điện thoại: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>$dienthoai </b></td> 
</tr>
<tr>
<td style=\"font-size:16;\"> 2. Người nhận yêu cầu: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>$nhanvien </b></td>
<td> </td>
</tr>
<tr>
<td style=\"font-size:16;\"> 3. Nội dung: </td>
<td> </td>
</tr>
</table>
<table class=\"table6\">
<tr>
<th style=\"text-align:center;font-size:16;width:20px;font:Times New Roman;height:30px;\"> STT</th>
<th style=\"text-align:center;font-size:16;font:Times New Roman;width:120px;\"> Tên thiết bị</th>
<th style=\"text-align:center;font-size:16;font:Times New Roman;width:70px;\"> Số máy</th>

<th style=\"text-align:center;font-size:16;font:Times New Roman;width:200px;\"> Tình trạng kỹ thuật hiện tại của thiết bị</th>
<th style=\"text-align:center;font-size:16;font:Times New Roman;width:130px;\"> Nội dung yêu cầu</th>
<th style=\"text-align:center;font-size:16;font:Times New Roman;width:130px;\"> Máy từ đâu về Xưởng</th>
</tr>";
for($i=1;$i<=5+$solan;$i++){
$tb[$i]=isset($_POST["thietbi$i"]) ? $_POST["thietbi$i"] : '';
	$tb[$i]=trim($tb[$i]," ");
	$p = stripos($tb[$i],".") ;
	$thietbi[$i] = trim (substr($tb[$i],0,$p)," ") ;
	$model[$i] = trim (substr($tb[$i],$p+1,strlen($tb[$i]))," ") ;
$somay[$i]=isset($_POST["somay$i"]) ? $_POST["somay$i"] : '';
$soluong[$i]=isset($_POST["soluong$i"]) ? $_POST["soluong$i"] : '';
if ($soluong[$i]=="") $soluong[$i]=1;
$tinhtrang[$i]=isset($_POST["tinhtrang$i"]) ? $_POST["tinhtrang$i"] : '';
$yeucau[$i]=isset($_POST["yeucau$i"]) ? $_POST["yeucau$i"] : '';
$vitri[$i]=isset($_POST["vitri$i"]) ? $_POST["vitri$i"] : '';
$shs[$i]=isset($_POST["shs$i"]) ? $_POST["shs$i"] : '';

}
$i =1 ;
$stt=1;
while($i<=5+$solan){
	if($thietbi[$i]!=""){
		/*$tenthietbisql2 = mysql_query("SELECT tenvt FROM thietbi_iso WHERE mavt='$thietbi[$i]' ") ;
		while($row = mysql_fetch_array($tenthietbisql2))
		{
			$tenvt[$i] =$row['tenvt'];
		}
		 */
		if ($model[$i]=="") $modelmay=$thietbi[$i];else $modelmay="$thietbi[$i]-$model[$i]";
		echo"
		<tr>
		<td style=\"text-align:center;color:black;font-size:16;font:Times New Roman;\"> $stt </td>
		<td style=\"font:Times New Roman;font-size:16;\"> &nbsp; $modelmay</td>
		<td style=\"text-align:center;font:Times New Roman;font-size:16;\"> $somay[$i] </td>
		
		<td style=\"text-align:center;font:Times New Roman;font-size:16;\"> $tinhtrang[$i]</td>
		<td style=\"text-align:center;font:Times New Roman;font-size:16;\"> $yeucau[$i] </td>	
		<td style=\"text-align:center;font:Times New Roman;font-size:16;\"> $vitri[$i] </td>	
		</tr>";		
	}
	$i++;
	$stt++;
}
echo"</table> 
<br/>";
echo"
<form method=\"post\" action=\"formsc.php\" enctype=\"multipart/form-data\" name=\"example\">
<center>
<table>
<tr>
<td>
<input type=\"image\" name=\"save\" value =\"savefile\" src=\"upload/xuatdv.jpg\" alt=\"save\" onclick=\"this.form.save.value = this.value\"/></td>
<input type=hidden name=save value=\"\">
<input type=hidden name=sohoso value=\"$sohoso\">
<input type=hidden name=ngay value=\"$ngay\">
<input type=hidden name=khachhang value=\"$khachhang\">
<input type=hidden name=nhanvien value=\"$nhanvien\">
<input type=hidden name=donvi value=\"$donvi\">
<input type=hidden name=solan value=\"$solan\">
<input type=hidden name=dienthoai value=\"$dienthoai\">
<input type=hidden name=ycthemkh value=\"$ycthemkh\">
<input type=hidden name=xemxetxuong value=\"$xemxetxuong\">
<input type=hidden name=lo value=\"$lo\">
<input type=hidden name=gieng value=\"$gieng\">
<input type=hidden name=mo value=\"$mo\">
<input type=hidden name=username value=$username>
<input type=hidden name=password value=$password>";
for($i=1;$i<=5+$solan;$i++){
$thietbi[$i]=isset($_POST["thietbi$i"]) ? $_POST["thietbi$i"] : '';
$somay[$i]=isset($_POST["somay$i"]) ? $_POST["somay$i"] : '';
$model[$i]=isset($_POST["model$i"]) ? $_POST["model$i"] : '';
$soluong[$i]=isset($_POST["soluong$i"]) ? $_POST["soluong$i"] : '';
if ($soluong[$i]=="") $soluong[$i]=1;
$tinhtrang[$i]=isset($_POST["tinhtrang$i"]) ? $_POST["tinhtrang$i"] : '';
$yeucau[$i]=isset($_POST["yeucau$i"]) ? $_POST["yeucau$i"] : '';
$vitri[$i]=isset($_POST["vitri$i"]) ? $_POST["vitri$i"] : '';
$shs[$i]=isset($_POST["shs$i"]) ? $_POST["shs$i"] : '';
echo"   <input type=hidden name=thietbi$i value=\"$thietbi[$i]\">
	<input type=hidden name=somay$i value=\"$somay[$i]\">
	<input type=hidden name=model$i value=\"$model[$i]\">
	<input type=hidden name=soluong$i value=\"$soluong[$i]\">
	<input type=hidden name=tinhtrang$i value=\"$tinhtrang[$i]\">
	<input type=hidden name=yeucau$i value=\"$yeucau[$i]\">	
	<input type=hidden name=vitri$i value=\"$vitri[$i]\">	
	<input type=hidden name=shs$i value=\"$shs[$i]\">";

}
echo"</form>";
echo"
	<form method=\"post\" action=\"formsc.php\" enctype=\"multipart/form-data\" name=\"example\">
   	<input type=hidden name=sohoso value=\"$sohoso\">
   	<input type=hidden name=ngay value=\"$ngay\">
   	<input type=hidden name=khachhang value=\"$khachhang\">
   	<input type=hidden name=nhanvien value=\"$nhanvien\">
   	<input type=hidden name=donvi value=\"$donvi\">
	<input type=hidden name=solan value=\"$solan\">
	<input type=hidden name=dienthoai value=\"$dienthoai\">
	<input type=hidden name=ycthemkh value=\"$ycthemkh\">
	<input type=hidden name=xemxetxuong value=\"$xemxetxuong\">
	<input type=hidden name=lo value=\"$lo\">
	<input type=hidden name=gieng value=\"$gieng\">
	<input type=hidden name=mo value=\"$mo\">
	<input type=hidden name=username value=$username>
	<input type=hidden name=password value=$password>";
for($i=1;$i<=5+$solan;$i++){
$thietbi[$i]=isset($_POST["thietbi$i"]) ? $_POST["thietbi$i"] : '';
$somay[$i]=isset($_POST["somay$i"]) ? $_POST["somay$i"] : '';
$model[$i]=isset($_POST["model$i"]) ? $_POST["model$i"] : '';
$soluong[$i]=isset($_POST["soluong$i"]) ? $_POST["soluong$i"] : '';
if ($soluong[$i]=="") $soluong[$i]=1;
$tinhtrang[$i]=isset($_POST["tinhtrang$i"]) ? $_POST["tinhtrang$i"] : '';
$yeucau[$i]=isset($_POST["yeucau$i"]) ? $_POST["yeucau$i"] : '';
$vitri[$i]=isset($_POST["vitri$i"]) ? $_POST["vitri$i"] : '';
$shs[$i]=isset($_POST["shs$i"]) ? $_POST["shs$i"] : '';
echo"   <input type=hidden name=thietbi$i value=\"$thietbi[$i]\">
	<input type=hidden name=somay$i value=\"$somay[$i]\">
	<input type=hidden name=model$i value=\"$model[$i]\">

	<input type=hidden name=tinhtrang$i value=\"$tinhtrang[$i]\">
	<input type=hidden name=yeucau$i value=\"$yeucau[$i]\">	
	<input type=hidden name=vitri$i value=\"$vitri[$i]\">	
	<input type=hidden name=shs$i value=\"$shs[$i]\">";

}
if ($suaxoa=="yes") echo "<input type=hidden name=suaxoa value=$suaxoa>";
echo"
  	<input type=hidden name=\"submit\" value=\"Cancel\">";
//echo" 	<td><input type=\"image\" src=\"upload/nhaplai.jpg\"  />";
echo"	<input type=hidden name=\"hoso\" value=\"phieuscbd\">
	</td>";
echo"	</form>
	<form method=\"post\" action=\"formsc.php\" enctype=\"multipart/form-data\" name=\"example\">
	<input type=hidden name=\"hoso\" value=\"phieuscbd\">
	<input type=hidden name=\"submit\" value=\"nhapdulieu\">
	<input type=hidden name=username value=$username>
	<input type=hidden name=password value=$password>
	<td><input type=\"image\" src=\"upload/nhapmoi.jpg\"  /></td>
	</form>";
echo"	
	<form action=\"index.php\" method=\"post\">
    	<input type=hidden name=username value=$username>
	<input type=hidden name=password value=$password>
  	<input type=hidden name=\"submit\" value=\"Hồ sơ SC/BD\">
	<td><input type=\"image\" src=\"upload/back.jpg\"  /></td>";
echo"
	</tr>
	</table>
	</center>
	</form>
	</body>
	</html> ";
}
}
if($save=="savefile")
{
$sohoso=isset($_POST['sohoso']) ? $_POST['sohoso'] : '';
$ngay=isset($_POST['ngay']) ? $_POST['ngay'] : '';
$khachhang=isset($_POST['khachhang']) ? $_POST['khachhang'] : '';
$nhanvien=isset($_POST['nhanvien']) ? $_POST['nhanvien'] : '';
$donvi=isset($_POST['donvi']) ? $_POST['donvi'] : '';
if(($donvi=="TH")||($donvi=="CNC")) $donvi="DVLTH" ;
$dienthoai=isset($_POST['dienthoai']) ? $_POST['dienthoai'] : '';
$ycthemkh=isset($_POST['ycthemkh']) ? $_POST['ycthemkh'] : '';
$xemxetxuong=isset($_POST['xemxetxuong']) ? $_POST['xemxetxuong'] : '';
$lo=isset($_POST['lo']) ? $_POST['lo'] : '';
$gieng=isset($_POST['gieng']) ? $_POST['gieng'] : '';
$mo=isset($_POST['mo']) ? $_POST['mo'] : '';
for($i=1;$i<=5+$solan;$i++){
$tb[$i]=isset($_POST["thietbi$i"]) ? $_POST["thietbi$i"] : '';
	$tb[$i]=trim($tb[$i]," ");
	$p = stripos($tb[$i],".") ;
	$thietbi[$i] = trim (substr($tb[$i],0,$p)," ") ;
	$model[$i] = trim (substr($tb[$i],$p+1,strlen($tb[$i]))," ") ;
$somay[$i]=isset($_POST["somay$i"]) ? $_POST["somay$i"] : '';
$soluong[$i]=isset($_POST["soluong$i"]) ? $_POST["soluong$i"] : '';
if ($soluong[$i]=="") $soluong[$i]=1;
$tinhtrang[$i]=isset($_POST["tinhtrang$i"]) ? $_POST["tinhtrang$i"] : '';
$yeucau[$i]=isset($_POST["yeucau$i"]) ? $_POST["yeucau$i"] : '';
$vitri[$i]=isset($_POST["vitri$i"]) ? $_POST["vitri$i"] : '';
$shs[$i]=isset($_POST["shs$i"]) ? $_POST["shs$i"] : '';
}	 
echo"
<html xmlns:v=\"urn:schemas-microsoft-com:vml\"
xmlns:o=\"urn:schemas-microsoft-com:office:office\"
xmlns:w=\"urn:schemas-microsoft-com:office:word\"
xmlns:m=\"http://schemas.microsoft.com/office/2004/12/omml\"
xmlns=\"http://www.w3.org/TR/REC-html40\">

<head>
<meta http-equiv=Content-Type content=\"text/html; charset=UTF-8\">
<meta name=ProgId content=Word.Document>
<meta name=Generator content=\"Microsoft Word 12\">
<meta name=Originator content=\"Microsoft Word 12\">
<!--[if gte mso 9]><xml>
 <o:DocumentProperties>
  <o:Author>Ducop</o:Author>
  <o:Template>Normal</o:Template>
  <o:LastAuthor>Ducop</o:LastAuthor>
  <o:Revision>2</o:Revision>
  <o:TotalTime>2</o:TotalTime>
  <o:Created>2017-10-01T03:06:00Z</o:Created>
  <o:LastSaved>2017-10-01T03:06:00Z</o:LastSaved>
  <o:Pages>1</o:Pages>
  <o:Words>111</o:Words>
  <o:Characters>633</o:Characters>
  <o:Lines>5</o:Lines>
  <o:Paragraphs>1</o:Paragraphs>
  <o:CharactersWithSpaces>743</o:CharactersWithSpaces>
  <o:Version>12.00</o:Version>
 </o:DocumentProperties>
</xml><![endif]-->
<!--[if gte mso 9]><xml>
 <w:WordDocument>
  <w:Zoom>110</w:Zoom>
  <w:TrackMoves>false</w:TrackMoves>
  <w:TrackFormatting/>
  <w:DrawingGridHorizontalSpacing>6 pt</w:DrawingGridHorizontalSpacing>
  <w:DisplayHorizontalDrawingGridEvery>2</w:DisplayHorizontalDrawingGridEvery>
  <w:ValidateAgainstSchemas/>
  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>
  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>
  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>
  <w:DoNotPromoteQF/>
  <w:LidThemeOther>EN-US</w:LidThemeOther>
  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>
  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>
  <w:Compatibility>
   <w:BreakWrappedTables/>
   <w:SnapToGridInCell/>
   <w:WrapTextWithPunct/>
   <w:UseAsianBreakRules/>
   <w:DontGrowAutofit/>
   <w:SplitPgBreakAndParaMark/>
   <w:DontVertAlignCellWithSp/>
   <w:DontBreakConstrainedForcedTables/>
   <w:DontVertAlignInTxbx/>
   <w:Word11KerningPairs/>
   <w:CachedColBalance/>
  </w:Compatibility>
  <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>
  <m:mathPr>
   <m:mathFont m:val=\"Cambria Math\"/>
   <m:brkBin m:val=\"before\"/>
   <m:brkBinSub m:val=\"--\"/>
   <m:smallFrac m:val=\"off\"/>
   <m:dispDef/>
   <m:lMargin m:val=\"0\"/>
   <m:rMargin m:val=\"0\"/>
   <m:defJc m:val=\"centerGroup\"/>
   <m:wrapIndent m:val=\"1440\"/>
   <m:intLim m:val=\"subSup\"/>
   <m:naryLim m:val=\"undOvr\"/>
  </m:mathPr></w:WordDocument>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <w:LatentStyles DefLockedState=\"false\" DefUnhideWhenUsed=\"true\"
  DefSemiHidden=\"true\" DefQFormat=\"false\" DefPriority=\"99\"
  LatentStyleCount=\"267\">
  <w:LsdException Locked=\"false\" Priority=\"0\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Normal\"/>
  <w:LsdException Locked=\"false\" Priority=\"9\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"heading 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 7\"/>
  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 8\"/>
  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 9\"/>
  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 7\"/>
  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 8\"/>
  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 9\"/>
  <w:LsdException Locked=\"false\" Priority=\"35\" QFormat=\"true\" Name=\"caption\"/>
  <w:LsdException Locked=\"false\" Priority=\"10\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Title\"/>
  <w:LsdException Locked=\"false\" Priority=\"1\" Name=\"Default Paragraph Font\"/>
  <w:LsdException Locked=\"false\" Priority=\"11\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtitle\"/>
  <w:LsdException Locked=\"false\" Priority=\"22\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Strong\"/>
  <w:LsdException Locked=\"false\" Priority=\"20\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Emphasis\"/>
  <w:LsdException Locked=\"false\" Priority=\"59\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Table Grid\"/>
  <w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Placeholder Text\"/>
  <w:LsdException Locked=\"false\" Priority=\"1\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"No Spacing\"/>
  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Light Shading\"/>
  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Light List\"/>
  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Light Grid\"/>
  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium List 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium List 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Dark List\"/>
  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Colorful Shading\"/>
  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Colorful List\"/>
  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Colorful Grid\"/>
  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Light List Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 1\"/>
  <w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Revision\"/>
  <w:LsdException Locked=\"false\" Priority=\"34\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"List Paragraph\"/>
  <w:LsdException Locked=\"false\" Priority=\"29\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Quote\"/>
  <w:LsdException Locked=\"false\" Priority=\"30\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Quote\"/>
  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Light List Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Light List Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Light List Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Light List Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Light List Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"19\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Emphasis\"/>
  <w:LsdException Locked=\"false\" Priority=\"21\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Emphasis\"/>
  <w:LsdException Locked=\"false\" Priority=\"31\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Reference\"/>
  <w:LsdException Locked=\"false\" Priority=\"32\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Reference\"/>
  <w:LsdException Locked=\"false\" Priority=\"33\" SemiHidden=\"false\"
   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Book Title\"/>
  <w:LsdException Locked=\"false\" Priority=\"37\" Name=\"Bibliography\"/>
  <w:LsdException Locked=\"false\" Priority=\"39\" QFormat=\"true\" Name=\"TOC Heading\"/>
 </w:LatentStyles>
</xml><![endif]-->
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:Batang;
	panose-1:2 3 6 0 0 1 1 1 1 1;
	mso-font-alt:??;
	mso-font-charset:129;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:-1342176593 1775729915 48 0 524447 0;}
@font-face
	{font-family:\"Cambria Math\";
	panose-1:2 4 5 3 5 4 6 3 2 4;
	mso-font-charset:1;
	mso-generic-font-family:roman;
	mso-font-format:other;
	mso-font-pitch:variable;
	mso-font-signature:0 0 0 0 0 0;}
@font-face
	{font-family:Meiryo;
	panose-1:2 11 6 4 3 5 4 4 2 4;
	mso-font-charset:0;
	mso-generic-font-family:roman;
	mso-font-format:other;
	mso-font-pitch:auto;
	mso-font-signature:0 0 0 0 0 0;}
@font-face
	{font-family:\"\@Batang\";
	panose-1:2 3 6 0 0 1 1 1 1 1;
	mso-font-charset:129;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:-1342176593 1775729915 48 0 524447 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:\"\";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:\"Times New Roman\",\"serif\";
	mso-fareast-font-family:\"Times New Roman\";
	mso-fareast-theme-font:minor-fareast;}
p
	{mso-style-noshow:yes;
	mso-style-priority:99;
	mso-margin-top-alt:auto;
	margin-right:0in;
	mso-margin-bottom-alt:auto;
	margin-left:0in;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:\"Times New Roman\",\"serif\";
	mso-fareast-font-family:\"Times New Roman\";
	mso-fareast-theme-font:minor-fareast;}
.MsoChpDefault
	{mso-style-type:export-only;
	mso-default-props:yes;
	font-size:10.0pt;
	mso-ansi-font-size:10.0pt;
	mso-bidi-font-size:10.0pt;}
@page Section1
	{size:595.35pt 841.95pt;
	margin:1.0in .75in 1.0in .75in;
	mso-header-margin:.5in;
	mso-footer-margin:.5in;
	mso-footer: f1;
	mso-paper-source:0;}
div.Section1
	{page:Section1;}
-->
</style>
<style>
v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
w\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style>

<!--[if gte mso 10]>
<style>
 /* Style Definitions */
 table.MsoNormalTable
	{mso-style-name:\"Table Normal\";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-qformat:yes;
	mso-style-parent:\"\";
	mso-padding-alt:0in 5.4pt 0in 5.4pt;
	mso-para-margin:0in;
	mso-para-margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:\"Times New Roman\",\"serif\";}
table.MsoTableGrid
	{mso-style-name:\"Table Grid\";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-priority:59;
	mso-style-unhide:no;
	border:solid windowtext 1.0pt;
	mso-border-alt:solid windowtext .5pt;
	mso-padding-alt:0in 5.4pt 0in 5.4pt;
	mso-border-insideh:.5pt solid windowtext;
	mso-border-insidev:.5pt solid windowtext;
	mso-para-margin:0in;
	mso-para-margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:\"Times New Roman\",\"serif\";}
p.MsoFooter, li.MsoFooter, div.MsoFooter
{
    margin:0in;
    margin-bottom:.0001pt;
    mso-pagination:widow-orphan;
    tab-stops:center 3.0in right 6.0in;
    font-size:12.0pt;
}
table#hrdftrtbl{
    margin:0in 0in 0in 9in;
}
	
</style>
<![endif]--><!--[if gte mso 9]><xml>
 <o:shapedefaults v:ext=\"edit\" spidmax=\"2050\"/>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <o:shapelayout v:ext=\"edit\">
  <o:idmap v:ext=\"edit\" data=\"1\"/>
 </o:shapelayout></xml><![endif]-->
</head>
<body lang=EN-US style='tab-interval:.5in'>

<div class=Section1>

<table class=MsoNormalTable border=0 cellpadding=0 width=\"100%\"
 style='width:100.0%;mso-cellspacing:1.5pt;mso-yfti-tbllook:1184'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes'>
  <td style='padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal><span style='mso-fareast-font-family:\"Times New Roman\"'>XN
  Địa vật lý GK <br>
  X&#432;&#7903;ng
SCTB&#272;VL <o:p></o:p></span></p>
  </td>
  <td style='padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal><b><span style='mso-fareast-font-family:\"Times New Roman\"'>&nbsp;&nbsp;&nbsp;&nbsp;
  PHIẾU YÊU CẦU DỊCH VỤ</span></b><span style='mso-fareast-font-family:\"Times New Roman\"'><br><br>
  <strong>Số hồ sơ:</strong> <strong>$sohoso</strong>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Ngày, Датa:$ngay</strong>
  <o:p></o:p></span></p>
  </td>
 </tr>
</table>

<p class=MsoNormal><span lang=VI style='mso-fareast-font-family:\"Times New Roman\";
mso-ansi-language:VI'><o:p>&nbsp;</o:p></span></p>

<table class=MsoNormalTable border=0 cellpadding=0 width=\"100%\"
 style='width:100.0%;mso-cellspacing:1.5pt;mso-yfti-tbllook:1184'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=\"65%\" style='width:65.0%;padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal><span style='mso-fareast-font-family:\"Times New Roman\"'>1.
  Người yêu cầu/bàn giao TB,Сдал:&nbsp; <b>$khachhang</b><o:p></o:p></span></p>
  </td>
  <td width=\"40%\" style='width:40.0%;padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal><span style='mso-fareast-font-family:\"Times New Roman\"'>Ký tên(Сдал /Подпись): .........<o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1'>
  <td width=\"60%\" style='width:60.0%;padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal><span style='mso-fareast-font-family:\"Times New Roman\"'>&nbsp;&nbsp;&nbsp;&nbsp;Đơn vị,Подр: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>$donvi</b> <o:p></o:p></span></p>
  </td>
  <td width=\"40%\" style='width:40.0%;padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal><span style='mso-fareast-font-family:\"Times New Roman\"'>Điện thoại liên lạc (Tel):&nbsp; <b>$dienthoai</b><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=\"60%\" style='width:60.0%;padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal><span style='mso-fareast-font-family:\"Times New Roman\"'>2.
  Người nhận thiết bị, Принял:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>$nhanvien</b><o:p></o:p></span></p>
  </td>
  <td width=\"40%\" style='width:40.0%;padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal><span style='mso-fareast-font-family:\"Times New Roman\"'>Ký tên(Принял /Подпись): .........<o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2;mso-yfti-lastrow:yes'>
  <td style='padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal><span style='mso-fareast-font-family:\"Times New Roman\"'>3.
  Nội dung: <o:p></o:p></span></p>
  </td>
  <td style='padding:.75pt .75pt .75pt .75pt'></td>
 </tr>
</table>

<p class=MsoNormal><span lang=VI style='mso-fareast-font-family:\"Times New Roman\";
mso-ansi-language:VI'><o:p>&nbsp;</o:p></span></p>
<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 width=716
 style='width:536.7pt;margin-left:-12.6pt;border-collapse:collapse;border:none;
 mso-border-alt:solid windowtext .5pt;mso-yfti-tbllook:1184;mso-padding-alt:
 0in 5.4pt 0in 5.4pt;mso-border-insideh:.5pt solid windowtext;mso-border-insidev:
 .5pt solid windowtext'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:5.45pt'>
  <td width=41 style='width:30.9pt;border:solid windowtext 1.0pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:5.45pt'>
  <p class=MsoNormal align=center style='margin-top:0in;margin-right:-5.4pt;
  margin-bottom:0in;margin-left:5.4pt;margin-bottom:.0001pt;text-align:center;
  text-indent:-5.4pt'><b style='mso-bidi-font-weight:normal'><span
  style='color:black;mso-themecolor:text1'>STT<u1:p></u1:p></span></b></p>
  <p class=MsoNormal align=center style='margin-top:0in;margin-right:-5.4pt;
  margin-bottom:0in;margin-left:5.4pt;margin-bottom:.0001pt;text-align:center;
  text-indent:-5.4pt;mso-line-height-alt:5.45pt'><span style='color:black;
  mso-themecolor:text1'>П/П</span></p>
  </td>
  <td width=162 style='width:121.35pt;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:5.45pt'>
  <p class=MsoNormal align=center style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
  auto;text-align:center'><b style='mso-bidi-font-weight:normal'><span
  style='color:black;mso-themecolor:text1'>Tên thiết</span></b><b
  style='mso-bidi-font-weight:normal'><span style='color:black;mso-themecolor:
  text1;mso-ansi-language:RU'> </span><span style='color:black;mso-themecolor:
  text1'> bị</span></b><b style='mso-bidi-font-weight:normal'><span lang=RU
  style='color:black;mso-themecolor:text1;mso-ansi-language:RU'> - </span><span
  style='color:black;mso-themecolor:text1'>Model<u1:p></u1:p></span></b><span
  lang=RU style='mso-ansi-language:RU'><o:p></o:p></span></p>
  <p class=MsoNormal align=center style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
  auto;text-align:center;mso-line-height-alt:5.45pt'><span lang=RU
  style='color:black;mso-themecolor:text1;mso-ansi-language:RU'>Наим-е  оборудования</span><span
  lang=RU style='mso-ansi-language:RU'><u1:p></u1:p><o:p></o:p></span></p>
  </td>
  <td width=94 style='width:70.85pt;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:5.45pt'>
  <p class=MsoNormal align=center style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
  auto;text-align:center'><b style='mso-bidi-font-weight:normal'><span
  style='color:black;mso-themecolor:text1'>Số của thiết bị - Serial</span></b></p>
  <p class=MsoNormal align=center style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
  auto;text-align:center;mso-line-height-alt:5.45pt'><span style='color:black;
  mso-themecolor:text1'>Номер<u1:p></u1:p></span></p>
  </td>

  <td width=158 style='width:1.65in;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:5.45pt'>
  <p class=MsoNormal align=center style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
  auto;text-align:center'><b style='mso-bidi-font-weight:normal'><span
  style='color:black;mso-themecolor:text1'>Mô tả chi tiết tình trạng</span></b><b
  style='mso-bidi-font-weight:normal'><span style='font-family:\"Batang\",\"serif\";
  mso-bidi-font-family:Batang;color:black;mso-themecolor:text1'></span><span
  style='color:black;mso-themecolor:text1'> kỹ thuật của thiết bị trước khi đưa về Xưởng<u1:p></u1:p></span></b></p>
  <p class=MsoNormal align=center style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
  auto;text-align:center;mso-line-height-alt:5.45pt'><span lang=RU
  style='color:black;mso-themecolor:text1;mso-ansi-language:RU'>Тех</span><span
  style='color:black;mso-themecolor:text1'>. </span><span lang=RU
  style='color:black;mso-themecolor:text1;mso-ansi-language:RU'></span><span
  style='color:black;mso-themecolor:text1'>состояние<u1:p></u1:p></span></p>
  </td>
  <td width=97 style='width:72.65pt;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:5.45pt'>
  <p class=MsoNormal align=center style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
  auto;text-align:center'><b style='mso-bidi-font-weight:normal'><span
  style='color:black;mso-themecolor:text1'>Nội dung</span></b><b
  style='mso-bidi-font-weight:normal'><span style='font-family:\"Batang\",\"serif\";
  mso-bidi-font-family:Batang;color:black;mso-themecolor:text1;mso-ansi-language:
  RU'></span><span style='color:black;mso-themecolor:text1'> yêu cầu</span></b><span
  style='color:black;mso-themecolor:text1'><u1:p></u1:p><o:p></o:p></span></p>
  <p class=MsoNormal align=center style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
  auto;text-align:center;mso-line-height-alt:5.45pt'><span lang=RU
  style='color:black;mso-themecolor:text1;mso-ansi-language:RU'>Требование<u1:p></u1:p><o:p></o:p></span></p>
  </td>
  <td width=66 valign=top style='width:49.5pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:5.45pt'>
  <p class=MsoNormal align=center style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
  auto;text-align:center;mso-line-height-alt:5.45pt'><b style='mso-bidi-font-weight:
  normal'><span style='color:black;mso-themecolor:text1'>Thiết</span></b><b
  style='mso-bidi-font-weight:normal'><span style='color:black;mso-themecolor:
  text1;mso-ansi-language:RU'> </span><span style='color:black;mso-themecolor:
  text1'>bị</span></b><b style='mso-bidi-font-weight:normal'><span
  style='color:black;mso-themecolor:text1;mso-ansi-language:RU'> </span><span
  style='color:black;mso-themecolor:text1'>từ</span></b><b style='mso-bidi-font-weight:
  normal'><span lang=RU style='color:black;mso-themecolor:text1;mso-ansi-language:
  RU'></span></b><b style='mso-bidi-font-weight:normal'><span
  style='mso-ascii-font-family:Meiryo;mso-hansi-font-family:Meiryo;mso-bidi-font-family:
  Meiryo;color:black;mso-themecolor:text1;mso-ansi-language:RU'></span></b><b
  style='mso-bidi-font-weight:normal'><span lang=RU style='color:black;
  mso-themecolor:text1;mso-ansi-language:RU'> đâu đưa về Xưởng</span></b><span
  lang=RU style='color:black;mso-themecolor:text1;mso-ansi-language:RU'><u1:p></u1:p><o:p></o:p></span></p>
  </td>
 </tr>
";
  $i =1 ;
	while($i<=5+$solan){
		if($thietbi[$i]!=""){
			if ($model[$i]=="") $mamay="$thietbi[$i]"; else $mamay="$thietbi[$i]-$model[$i]";
 echo" <tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes;height:20.2pt'>
  <td width=41 style='width:30.9pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:20.2pt'>
  <p class=MsoNormal align=center style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
  auto;text-align:center;mso-line-height-alt:5.95pt'><span style='color:black;
  mso-themecolor:text1'>$i<u1:p></u1:p><o:p></o:p></span></p>
  </td>
  <td width=162 style='width:121.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:20.2pt'>
  <p class=MsoNormal align=center style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
  auto;text-align:center;mso-line-height-alt:5.95pt'><span style='color:black;
  mso-themecolor:text1'>$mamay<u1:p></u1:p></span></p>
  </td>
  <td width=94 style='width:70.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:20.2pt'>
  <p class=MsoNormal align=center style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
  auto;text-align:center;mso-line-height-alt:5.95pt'><span style='color:black;
  mso-themecolor:text1'>$somay[$i]<u1:p></u1:p></span></p>
  </td>
  <td width=158 style='width:1.65in;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:20.2pt'>
  <p class=MsoNormal align=center style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
  auto;text-align:center;mso-line-height-alt:5.95pt'><span style='color:black;
  mso-themecolor:text1'>$tinhtrang[$i]<u1:p></u1:p></span></p>
  </td>
  <td width=97 style='width:72.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:20.2pt'>
  <p class=MsoNormal align=center style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
  auto;text-align:center;mso-line-height-alt:5.95pt'><span style='color:black;
  mso-themecolor:text1'>$yeucau[$i]<u1:p></u1:p></span></p>
  </td>
  <td width=66 style='width:49.5pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:20.2pt'>
  <p class=MsoNormal align=center style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
  auto;text-align:center;mso-line-height-alt:5.95pt'><span style='color:black;
  mso-themecolor:text1'>$vitri[$i]<u1:p></u1:p></span></p>
  </td>
 </tr>
";
 	}
	$i++;
}
echo"</table>
<p class=MsoNormal style='margin-bottom:12.0pt'><span lang=VI style='mso-fareast-font-family:
\"Times New Roman\";mso-ansi-language:VI'><br>

<p><i><span lang=VI style='mso-ansi-language:VI;font-weight:italic'>Ghi chú: Cột “Nội dung yêu cầu” được ghi như sau: </span></i></span></br>
<i><span lang=VI style='mso-ansi-language:VI;font-weight:italic'>BD: Yêu cầu bảo dưỡng thiết bị / SC: Yêu cầu sửa chữa thiết bị bị hỏng / KT: Yêu cầu kiểm tra sự hoạt</span></i></span></br>
<i><span lang=VI style='mso-ansi-language:VI;font-weight:italic'>động của thiết bị mà không cần bảo dưỡng (VD như: KT để nghiệm thu TB mới, KT tình trạng của thiết bị</span></i></span></br>
<i><span lang=VI style='mso-ansi-language:VI;font-weight:italic'>đã được BD trước đây nhưng chưa thả đo trong giếng khoan, v.v.).</span></i></span></p>

<p><span lang=VI style='mso-ansi-language:VI'>4. Các yêu cầu khác (nếu có):...</span><span lang=VI style='mso-ansi-language:VI;font-weight:bold'>$ycthemkh<o:p></o:p></span></p>
<p><span lang=VI style='mso-ansi-language:VI'>5. Phục vụ sản xuất cho Lô/ Dịch vụ ngoài:...... </span><span lang=VI style='mso-ansi-language:VI;font-weight:bold'>$lo......<o:p></o:p></span></p>
<p><span lang=VI style='mso-ansi-language:VI'>Tên mỏ :.....</span><span lang=VI style='mso-ansi-language:VI;font-weight:bold'>$mo.....<o:p></o:p></span><span lang=VI style='mso-ansi-language:VI'>Tên giếng:......</span><span lang=VI style='mso-ansi-language:VI;font-weight:bold'>$gieng.....<o:p></o:p></span></p>

<p><span lang=VI style='mso-ansi-language:VI'>6. Xem xét của lãnh đạo Xưởng (nếu có):.....</span><span lang=VI style='mso-ansi-language:VI;font-weight:bold'>$xemxetxuong <o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:12.0pt'><span lang=VI style='mso-fareast-font-family:
\"Times New Roman\";mso-ansi-language:VI'><br>

<p><span lang=VI style='mso-ansi-language:VI'>Lãnh đạo Xưởng / Trưởng nhóm <i>(ký ghi rõ họ tên) </i><o:p></o:p></span></p>
<table id='hrdftrtbl' border='1' cellspacing='0' cellpadding='0'>
        <tr>
          <td>
            <div style='mso-element:footer' id=\"f1\">
                <p class=\"MsoFooter\">
                    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                        <tr>
                            <td  class=\"footer\">
                            <span lang=VI style='mso-ansi-language:VI'>BM.25.02<br>
	01/01/2024 <o:p></o:p></span>
                            </td>
                        </tr>
                    </table>
                </p>
            </div>
        </td>
    </tr>
    </table>



</div>

</body>

</html>";
echo"
</body>
</html> ";
header("Content-Type: application/msword");
header("Content-Disposition:attchment;filename=\"$sohoso-YCDV.doc\""); 
header("Pragma: no-cache");
header("Expires: 0");
exit;
}
if ($xoadl=="xoayeucaudichvu") {
	if ($submit=="") {
	echo "
	<html>
	<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
	</head>	
	<body>
	<center>
        <table class=\"table8\"><tr><td>	
	<form action=\"formsc.php\" method=\"post\" enctype=\"multipart/form-data\" name=\"example\">";
	$i=1;
	if(isset($_POST['check'])) {
		echo"Có chắc chắn xóa Không";
		foreach($_POST['check'] as $hoso) {
			echo"<input type=\"hidden\" name=\"hoso$i\" value=\"$hoso\" >";
			$i++;
		}
		echo"<input type=hidden name=username value=$username>
		<input type=hidden name=password value=$password>
		<br/><br/><center><input type=\"submit\" name=\"submit\" value=\"CÓ\">
		<input type=\"hidden\" name=\"sohoso\" value=\"$sohoso\" >
		<input type=\"hidden\" name=\"total\" value=\"$i\" >
		<input type=\"hidden\" name=\"xoadl\" value=\"xoayeucaudichvu\" >
		<input type=hidden name=\"hoso\" value=\"phieuscbd\">
		<input type=\"submit\" name=\"submit\" value=\"KHÔNG\">
		</center>
		</form>
		</tr></td>
		</table>
		</center> 
		</body>
		</html> " ;
		exit;
	}else  {
		echo "Chưa chọn hồ sơ máy để xóa ( Tick vào checkbox)";
		echo "<br/><br/><center><input type=\"submit\" name=\"back\" value=\"Quay lại  <--\"></center>";	
		echo"<input type=hidden name=username value=$username>
		<input type=hidden name=password value=$password>
		<input type=hidden name=\"hoso\" value=\"phieuscbd\">
		<input type=hidden name=\"submit\" value=\"nhapdulieu\">
		</form>
		</tr></td>
		</table>
		</center> 
		</body>
		</html> " ;
		exit;
	}
	}
if($submit == "CÓ") 
{	
	// Delete DATA
	echo"<html>
	<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
	</head>
	<body>	
	<center>
	<table class=\"table8\"><tr><td>";
	$total=isset($_POST['total']) ? $_POST['total'] : '';
	for($i=1;$i<$total;$i++){
		$hoso=isset($_POST["hoso$i"]) ? $_POST["hoso$i"] : '';
		$r5=mysql_query("SELECT maql  FROM hososcbd_iso where hoso='$hoso'");
		while($row = mysql_fetch_array($r5))
		{
			$maquanly =$row['maql'];
		}
		// Delete data from hososcbd
		$delete = " DELETE FROM hososcbd_iso WHERE hoso = '$hoso'" ;
		$result = mysql_query("$delete") or die(mysql_error());
		// Delete data from bangsolieu
		$delete = " DELETE FROM bangsolieu_iso WHERE sohoso = '$hoso'" ;
		$result = mysql_query("$delete") or die(mysql_error());
		// Delete data from danhmucvattu
		$delete = " DELETE FROM danhmucvattu_iso WHERE mahoso = '$hoso'" ;
		$result = mysql_query("$delete") or die(mysql_error());
		// Delete data from nguoi thuc hien
		$delete = " DELETE FROM ngthuchien_iso WHERE mahoso = '$hoso'" ;
		$result = mysql_query("$delete") or die(mysql_error());

		echo"Đã xóa hồ sơ máy số:$hoso </br>";
	}
	// luu lai dau vet khi tac dong den CSDL
$ip_address= $_SERVER['REMOTE_ADDR'];
$curdate=date("Y-m-d H:i:s");
$r3="SELECT max(stt) as tt FROM lichsudn_iso";
$result=mysqli_query($con,$r3);
if(mysqli_num_rows($result)>0){
$r3=mysql_query("SELECT max(stt) as tt FROM lichsudn_iso");
while($row = mysql_fetch_array($r3))
{
	$tt =$row['tt'];
}
}else $tt=0;
$tt++;
$r4=mysql_query("SELECT madv,nhom  FROM users where username='$username'");
while($row = mysql_fetch_array($r4))
{
	$madv =$row['madv'];
	$nhom =$row['nhom'];
}
$insert = "insert into lichsudn_iso(
stt,
username,
madv,
nhom,
curdate,
ip_address,
maql
) values (
'$tt',
'$username',
'$madv',
'$nhom',
'$curdate',
'$ip_address',
'$maquanly'
)" ;
mysql_query($insert) or die(mysql_error());
// Reset sohoso sau khi xoa.
$r6=mysql_query("SELECT phieu,hoso  FROM hososcbd_iso where maql='$maquanly'");
$i=1;
		while($row = mysql_fetch_array($r6))
		{
			$rhoso =$row['hoso'];
			$phieu =$row['phieu'];
			$nhoso="$phieu-$i";
			//hososcbd
			$update = "update hososcbd_iso SET  
			hoso='$nhoso'
			WHERE hoso='$rhoso'" ;
			mysql_query($update) or die(mysql_error());
			//bangsolieu
			$update = "update bangsolieu_iso SET  
			sohoso='$nhoso'
			WHERE sohoso='$rhoso'" ;
			mysql_query($update) or die(mysql_error());
			//danhmucvattu
			$update = "update danhmucvattu_iso SET  
			mahoso='$nhoso'
			WHERE mahoso='$rhoso'" ;
			mysql_query($update) or die(mysql_error());
			//nguoithuchien
			$update = "update ngthuchien_iso SET  
			mahoso='$nhoso'
			WHERE mahoso='$rhoso'" ;
			mysql_query($update) or die(mysql_error());
			$i++;
		}

echo "
	
	<form method=\"post\" action=\"formsc.php\" enctype=\"multipart/form-data\" name=\"example\">
	<input type=hidden name=\"hoso\" value=\"phieuscbd\">
	<input type=hidden name=\"submit\" value=\"nhapdulieu\">
	<input type=hidden name=username value=$username>
	<input type=hidden name=password value=$password>
	<br/><input type=\"submit\" name=\"back\" value=\"Quay lại  <--\">
	</form>
	</tr></td>
	</table>
	</center> 
	</body>
	</html> " ;
} else { 
echo "
	<html>
	<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
	</head>
	<body>	
	<center>
	<table class=\"table8\"><tr><td>
	Không xóa Yêu Cầu Dịch Vụ số : $sohoso
	<form method=\"post\" action=\"formsc.php\" enctype=\"multipart/form-data\" name=\"example\">
	<input type=hidden name=\"hoso\" value=\"phieuscbd\">
	<input type=hidden name=\"submit\" value=\"nhapdulieu\">
	<input type=hidden name=username value=$username>
	<input type=hidden name=password value=$password>
	<br/><input type=\"submit\" name=\"back\" value=\"Quay lại  <--\">
	</form>
	</tr></td>
	</table>
	</center> 
	</body>
	</html> " ;

}
}

if(($search!="")&&($xuat=="")&&($hoso=="bienbanscbd"))
{
$tenthietbisql4 = mysql_query("SELECT * FROM hososcbd_iso WHERE phieu='$search'") ;
while($row = mysql_fetch_array($tenthietbisql4))
{
		$maquanly =$row['maql'];
		$ngay = $row['ngayyc'];
		$donvi = $row['madv'];
		$khachhang = $row['ngyeucau'];
		$nhanvien = $row['ngnhyeucau'];
}

$today = date("d/m/Y");  
echo "
<html lang=\"vi\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
<SCRIPT LANGUAGE=\"JavaScript\" SRC=\"java/CalendarPopup.js\"></SCRIPT>
<SCRIPT LANGUAGE=\"JavaScript\">
var cal = new CalendarPopup();
</SCRIPT>
</head>
<body>
<table style=\"width:100%;\">
<tr>
<td style=\"padding-left:50px;width:30%;\">XN Địa Vật Lý GK <br/>X&#432;&#7903;ng
SCTB&#272;VL</td>
<td style=\"width:70%;\">
<h2><p style=\"color:blue;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BIÊN BẢN BÀN GIAO THIẾT BỊ <br/>
</h2></p>
</td>
</tr>
</table>";
echo"   <form action=\"formsc.php\" method=\"post\" name=\"example\">
	<br/>
	<table style=\"margin-left:50px;\">
	<tr bgcolor=\"#FFA500\">
	<td  style=\"text-align:center;font-size: 15;width:230px;\"> <b>   MÃ QUẢN LÝ </b>		
	</td>
	<td style=\"text-align:center;font-size: 15;width:230px;\"><b>   SỐ HỔ SƠ </b>
	</td>
	<td style=\"text-align:center;font-size: 15;width:190px;\">	<b> NGÀY   </b>
	</td>
	<td style=\"text-align:center;font-size: 15;width:280px;\"><b> ĐƠN VỊ  </b>
	</td>
	</tr>
	<td>
	<input name=\"maquanly\" style=\"width:100%;text-align:center;font_family:Times New Roman;background:#DCDCDC;height:25px;\" type=\"text\" 
	value=\"$maquanly\"readonly> 
	</td>
	<td>	
	<div class=\"content\">
	<input name=\"sohoso\" type=\"text\" class=\"search\" id=\"searchid\" style=\"text-align:center;width:100%;background:#8adaa5;height:25px;\"
	value=\"$search\" />
	<div id=\"result\"></div>
	</div>
	</td>
	<td>
	<input  name=\"ngay\" size=\"25\" type=\"text\" style=\"width:80%;background:#DCDCDC;text-align:center;height:25px;\" value=\"$today\" readonly />
	<A HREF=\"#\"
	onClick=\"cal.select(document.forms['example'].ngay,'anchor1','dd/MM/yyyy'); return false;\"
	NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A> </p>
	</td>
	<td>
	<input name=\"donvi\" style=\"width:100%;text-align:center;font_family:Times New Roman;background:#DCDCDC;height:25px;\" type=\"text\" 
	value=\"$donvi\" readonly> 
	</td>
	</tr>
	</table>
	<br/>
	<table>
	<tr><td style=\"height:30px;width:600px;padding-left:50px;\"><strong>BÊN NHẬN</strong> &nbsp;&nbsp;</strong> &nbsp;&nbsp;&nbsp;&nbsp;
	<input name=\"khachhang\" style=\"font_family:Times New Roman;background:#8adaa5;height:25px;width:350px;\"    type=\"text\" 
	value=\"\">
	</td>
    	</tr>
	<tr><td style=\"height:30px;padding-left:50px;\"><strong>BÊN GIAO</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input name=\"nhanvien\" style=\"font_family:Times New Roman;background:#8adaa5;height:25px;width:350px; \"  type=\"text\" value=\"$nhanvien\" >
	</td>
	<td> </td>
	</tr>
	<tr>
	</td>
	<td></td></tr>
	</table>
	<br/>
	<table class=\"table1\" style=\"margin-left:50px;\">
	<tr>
	<th style=\"text-align:center;font-size: 15;width:30px; height:30px; \"> STT</th>
	<th style=\"text-align:center;font-size: 15;width:180px;\"> TÊN THIẾT BỊ</th>
	<th style=\"text-align:center;font-size: 15;width:80px;\"> SỐ MÁY </th>
	<th style=\"text-align:center;font-size: 15 ;width:140px;\"> TÌNH TRẠNG KỸ THUẬT CỦA THIẾT BỊ</th>
	<th style=\"text-align:center;font-size: 15 ;width:50px;\"> BG</th>
	<th style=\"text-align:center;font-size: 15 ;width:100px;\">Ghi chú</th>
	</ul>
	</tr>";
	$i=1;
	$k=1;
		$tenthietbisql1 = mysql_query("SELECT * FROM hososcbd_iso WHERE phieu='$search'") ;
		while($row = mysql_fetch_array($tenthietbisql1))
		{
			$mavt =$row['mavt'];
			$bg =$row['bg'];
			$ngaykt =$row['ngaykt'];
			$hoso =$row['hoso'];
			$somay =$row['somay'];
			$model =$row['model'];
			$soluong =$row['solg'];	
			$ttktafter =$row['ttktafter'];
			if ($model=="") $mamay=$mavt;else $mamay="$mavt-$model";
			
			$tenthietbisql6 = mysql_query("SELECT * FROM thietbi_iso WHERE mavt='$mavt' and somay='$somay' and model='$model' ") ;
			while($row = mysql_fetch_array($tenthietbisql6))
			{
				$tenvt=$row['tenvt'];
			}
			if ($bg==1) {
				$checkb='checked="checked"';
				$ghichu="Máy đã bàn giao";
				if ($phanquyen=="1") {
					$disable="";
					$k=1000;// admin co them edit
				}
				else
				$disable='disabled="disabled"';
			}else {
				$ghichu="Máy đã làm xong đang chờ bàn giao";
				$disable="";	
			}
			If ($ngaykt!="0000-00-00") {
				$link="<span style=\"color:red;\">$mamay - $tenvt</span>";
				//$checkb='checked="checked"';
				if ($bg!=1) {
					$k++;
					$checkb='';

				}
			}else {
				$checkb="";
			        $ghichu="Hồ sơ chưa có ngày kết thúc";	
				$disable='disabled="disabled"';
				$link="<a href='formsc.php?edithoso=$hoso&username=$username&mk=$password'  title='Hosomay' ><span style=\"color:blue;\">$mamay - $tenvt</span></a>";
			}
		if ($phanquyen=="1") 	
			$link="<a href='formsc.php?edithoso=$hoso&username=$username&mk=$password'  title='Hosomay' ><span style=\"color:blue;\">$mamay - $tenvt</span></a>";		
			echo"
			<tr>
			<td  style=\"text-align:center;color:black;font-size: 15;\"> $i </td>
			<td style=\"padding-left:10px;color:black;font-size: 15;\">$link</td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $somay </td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $ttktafter</td>
			<td> <center><input type=\"checkbox\" name=\"bg$i\" value=\"$hoso\" $checkb $disable > </center></td>
			<td  style=\"text-align:center;color:red;font-size: 15;\">$ghichu </td>
			</tr>";
			$i++;
		}	
	echo"</table></br>";	
		if ($k==1) {
			echo"<table><tr><td><input style=\"margin-left:450px;\" type=\"image\" name=\"savefile\" value =\"xuatfilebb\" src=\"upload/inbg.jpg\" alt=\"Xuat\" onclick=\"this.form.savefile.value = this.value\"/>
<input type=hidden name=savefile value=\"\"></td> </center>
	";
			echo"</form>";
			echo "<form action=\"index.php\" method=\"post\">
			<input type=hidden name=username value=$username>
			<input type=hidden name=password value=$password>
			<input type=hidden name=\"submit\" value=\"Hồ sơ SC/BD\">
			<input type=hidden name=\"hosobd\" value=\"phieukiemtra\">
			<td><input type=\"image\" src=\"upload/back.jpg\" /></td>";
			echo"</tr>
			</form>
			</table>
			</body>
			</html>";
		}else{
	echo"<br/>
	<table > 
	<tr> <td>
	<input type=\"image\" name=\"xuat\" value =\"xuatbienban\" style=\"margin-left:450px; alt=\"Xuat\" 
	src=\"upload/xuatdl.jpg\" onclick=\"this.form.xuat.value = this.value\"/></td>
	<input type=hidden name=xuat value=\"\">
	<input type=hidden name=username value=$username>
	<input type=hidden name=password value=$password>
	<input type=hidden name=hoso value=bienbanscbd>
	</form>
	<form action=\"index.php\" method=\"post\">
    		<input type=hidden name=username value=$username>
		<input type=hidden name=password value=$password>
  		<input type=hidden name=\"submit\" value=\"Hồ sơ SC/BD\">
		<td><input type=\"image\" src=\"upload/back.jpg\"/></td>
		</form>
   	</table>
	</body>
	</html> " ;
		}

}


if($xuat=="xuatbienban")
{
$maquanly=isset($_POST['maquanly']) ? $_POST['maquanly'] : '';
$sohoso=isset($_POST['sohoso']) ? $_POST['sohoso'] : '';
$ngay=isset($_POST['ngay']) ? $_POST['ngay'] : '';
$khachhang=isset($_POST['khachhang']) ? $_POST['khachhang'] : '';
$nhanvien=isset($_POST['nhanvien']) ? $_POST['nhanvien'] : '';
$donvi=isset($_POST['donvi']) ? $_POST['donvi'] : '';
$tenthietbisql5 = mysql_query("SELECT COUNT(*) as number FROM hososcbd_iso WHERE maql='$maquanly'") ;
while($row = mysql_fetch_array($tenthietbisql5))
{
		$number =$row['number'];
}
$check=0;
for($i=1;$i<=$number;$i++){
	$bg[$i]=isset($_POST["bg$i"]) ? $_POST["bg$i"] : '';
	if ($bg[$i]!="") $check=1;
}
if ($check==0) echo"CHƯA CHỌN THIẾT BỊ ĐỂ BÀN GIAO";
else {
echo"
<html lang=\"vi\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
<SCRIPT LANGUAGE=\"JavaScript\" SRC=\"java/CalendarPopup.js\"></SCRIPT>
<SCRIPT LANGUAGE=\"JavaScript\">
var cal = new CalendarPopup();
</SCRIPT>
</head>
<body>
<br/>
<form action=\"formsc.php\" method=\"post\">
<table style=\"width:100%;\">
<tr>
<td style=\"padding-left:80px;font-size:16px;\">XN Địa Vật Lý GK <br/> <strong>X&#432;&#7903;ng
SCTB&#272;VL</strong> </td>
<td>  <b>BIÊN BẢN BÀN GIAO THIẾT BỊ </b> <br/>Số hồ sơ:<strong> $sohoso</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ngày : </b> $ngay</td>
</tr>
</table>
<table>
<br/>
<table style=\"width:100%;\">
<tr>
<td style=\"width:60%;font-size:16;padding-left:80px;\"> 1. Đại diện bên giao: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>$nhanvien</b></td> 
<td style=\"width:40%;font-size:16;\"> Đơn vị  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>X&#432;&#7903;ng
SCTB&#272;VL</strong></td> 
</tr>
<tr>
<td style=\"width:60%;font-size:16;padding-left:80px;\"> 2. Đại diện bên nhận: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>$khachhang</b></td>
<td style=\"width:40%;font-size:16;\"> Đơn vị &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>$donvi</strong></td> 
</tr>
<tr>
<td style=\"width:60%;font-size:16;padding-left:80px;\"> 3. Sau khi kiểm tra đã cùng nhau giao nhận các thiết bị sau: </b></td>
<td > </td>
</tr>
</table>
<p style=\"font-size:16;margin-left:30px;\">  
</p>
<br/>
<table class=\"table6\">
<tr>
<th style=\"text-align:center;font-size:15;width:30px; height:30px;\"> STT</th>
<th style=\"text-align:center;font-size:15;width:140px;\"> Tên thiết bị</th>
<th style=\"text-align:center;font-size:15;width:80px;\"> Số </th>
<th style=\"text-align:center;font-size:15;width:180px;\"> Tình trạng kỹ thuật của thiết bị</th>
</tr>";
$i=1;
$k=1;
		// while($i<=$number)
//{     
			$slbg=0;
			$tenthietbisql = mysql_query("SELECT slbg FROM hososcbd_iso WHERE maql='$maquanly'") ;
			while($row = mysql_fetch_array($tenthietbisql))
			{
				$slbg =$row['slbg'];
			}
			$slbg++;
				$update1 = "update hososcbd_iso SET
					slbg='$slbg'
				where maql='$maquanly'";
				mysql_query($update1) or die(mysql_error());

			 $tenthietbisql5 = mysql_query("SELECT hoso FROM hososcbd_iso WHERE maql='$maquanly'") ;
			while($row = mysql_fetch_array($tenthietbisql5))
			{
					$hoso =$row['hoso'];
			if($bg[$i]!=""){
				$update = "update hososcbd_iso SET
					bg='1'
				where hoso='$bg[$i]'";
				mysql_query($update) or die(mysql_error());
				$tenthietbisql1 = mysql_query("SELECT * FROM hososcbd_iso WHERE hoso='$bg[$i]'") ;
			while($row = mysql_fetch_array($tenthietbisql1))
			{
				$somay =$row['somay'];
				$mavt =$row['mavt'];
				$model =$row['model'];
				$soluong =$row['solg'];	
				$ttktafter =$row['ttktafter'];	
			}
			if ($model=="") $modelmay=$mavt;else $modelmay="$mavt-$model";
			$tenthietbisql6 = mysql_query("SELECT * FROM thietbi_iso WHERE mavt='$mavt' and somay='$somay' and model='$model' ") ;
			while($row = mysql_fetch_array($tenthietbisql6))
			{
				$tenvt=$row['tenvt'];
			}
			echo"
				<tr>
				<td style=\"text-align:center;color:black;font-size:15;\"> $k </td>
				<td style=\"padding-left:10px;color:black;font-size:15;\"> $modelmay</td>
				<td style=\"text-align:center;color:black;font-size:15;\"> $somay </td>
				<td style=\"text-align:center;color:black;font-size:15;\"> $ttktafter </td>
				</tr>";
			$k++;
			}else {
				if ($phanquyen=="1") {
				$update = "update hososcbd_iso SET
				bg='0'
				where hoso='$hoso'";
				mysql_query($update) or die(mysql_error());
				}
			 }
			$i++;
			}
	// luu lai dau vet khi tac dong den CSDL
$ip_address= $_SERVER['REMOTE_ADDR'];
$curdate=date("Y-m-d H:i:s");
$r3="SELECT max(stt) as tt FROM lichsudn_iso";
$result=mysqli_query($con,$r3);
if(mysqli_num_rows($result)>0){
$r3=mysql_query("SELECT max(stt) as tt FROM lichsudn_iso");
while($row = mysql_fetch_array($r3))
{
	$tt =$row['tt'];
}
}else $tt=0;
$tt++;
$r4=mysql_query("SELECT madv,nhom  FROM users where username='$username'");
while($row = mysql_fetch_array($r4))
{
	$madv =$row['madv'];
	$nhom =$row['nhom'];
}
$insert = "insert into lichsudn_iso(
stt,
username,
madv,
nhom,
curdate,
ip_address,
maql
) values (
'$tt',
'$username',
'$madv',
'$nhom',
'$curdate',
'$ip_address',
'$maquanly'
)" ;
mysql_query($insert) or die(mysql_error());
echo"</table></br>";
echo" <table align=\"center\">
<tr><td>
<input type=\"image\" name=\"savefile\" value =\"xuatfilebb\" src=\"upload/inbg.jpg\" alt=\"Xuat\" onclick=\"this.form.savefile.value = this.value\"/>
<input type=hidden name=savefile value=\"\"></td> </center>
	<input type=hidden name=maquanly value=\"$maquanly\">	
	<input type=hidden name=donvi value=\"$donvi\">	
	<input type=hidden name=sohoso value=\"$sohoso\">	
	<input type=hidden name=slbg value=\"$slbg\">	
	<input type=hidden name=ngay value=\"$ngay\">	
	<input type=hidden name=nhanvien value=\"$nhanvien\">
	<input type=hidden name=khachhang value=\"$khachhang\">";
	for($i=1;$i<=$number;$i++){
		echo"<input type=hidden name=bg$i value=\"$bg[$i]\">";
	}
	echo"</form>
	<form action=\"index.php\" method=\"post\">
    	<input type=hidden name=username value=$username>
	<input type=hidden name=password value=$password>
  	<td> <input type=hidden name=\"submit\" value=\"Hồ sơ SC/BD\">
 	<input type=\"image\" src=\"upload/back.jpg\"  /></td>
	</tr>
	</table>
	</form>
	</body>
	</html>";
}
}
if($savefile=="xuatfilebb")
{
$maquanly=isset($_POST['maquanly']) ? $_POST['maquanly'] : '';
$sohoso=isset($_POST['sohoso']) ? $_POST['sohoso'] : '';
$slbg=isset($_POST['slbg']) ? $_POST['slbg'] : '';
$ngay=isset($_POST['ngay']) ? $_POST['ngay'] : '';
$khachhang=isset($_POST['khachhang']) ? $_POST['khachhang'] : '';
$nhanvien=isset($_POST['nhanvien']) ? $_POST['nhanvien'] : '';
$donvi=isset($_POST['donvi']) ? $_POST['donvi'] : '';
if(($donvi=="TH")||($donvi=="CNC")) $donvi="DVLTH" ;
$tenthietbisql5 = mysql_query("SELECT COUNT(*) as number FROM hososcbd_iso WHERE maql='$maquanly'") ;
while($row = mysql_fetch_array($tenthietbisql5))
{
		$number =$row['number'];
}
$check=0;
for($i=1;$i<=$number;$i++){
	$bg[$i]=isset($_POST["bg$i"]) ? $_POST["bg$i"] : '';
	if ($bg[$i]!="") $check=1;
}
if (($check==0)&&($username!='admin')) {
$j=1;
$tenthietbisql4 = mysql_query("SELECT hoso  FROM hososcbd_iso WHERE maql='$maquanly' and bg='1'") ;
while($row = mysql_fetch_array($tenthietbisql4))
{
	$bg[$j] =$row['hoso'];
	$j++;
}
}
	$ngaystemp = $ngay;
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	if ($ngaystemp[$i]=="/") {
		$datetype=0;
		break;
	}elseif ($ngaystemp[$i]=="-") {
		$datetype=1;
		break;
	}
}
if ($datetype==0) {
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	$p = stripos($ngaystemp,"/") ;

if ($i== 0) {
	$ngays = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 1) {
	$thangs = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 2) {
	$nams = trim ($ngaystemp) ;
} 	
$p++ ;
$ngaystemp = substr($ngaystemp,$p);
}
}else {
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	$p = stripos($ngaystemp,"-") ;

if ($i== 0) {
	$nams = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 1) {
	$thangs = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 2) {
	$ngays = trim ($ngaystemp) ;
} 	
$p++ ;
$ngaystemp = substr($ngaystemp,$p);
}
}
echo"
<html xmlns:v=\"urn:schemas-microsoft-com:vml\"
xmlns:o=\"urn:schemas-microsoft-com:office:office\"
xmlns:w=\"urn:schemas-microsoft-com:office:word\"
xmlns:m=\"http://schemas.microsoft.com/office/2004/12/omml\"
xmlns=\"http://www.w3.org/TR/REC-html40\">

<head>
<meta http-equiv=Content-Type content=\"text/html; charset=windows-1252\">
<meta name=ProgId content=Word.Document>
<meta name=Generator content=\"Microsoft Word 12\">
<meta name=Originator content=\"Microsoft Word 12\">
<title>BBBG</title>
<!--[if gte mso 9]><xml>
 <o:DocumentProperties>
  <o:Author>sang</o:Author>
  <o:Template>Normal</o:Template>
  <o:LastAuthor>Ducop</o:LastAuthor>
  <o:Revision>2</o:Revision>
  <o:TotalTime>12</o:TotalTime>
  <o:LastPrinted>2017-10-01T08:02:00Z</o:LastPrinted>
  <o:Created>2017-10-01T08:27:00Z</o:Created>
  <o:LastSaved>2017-10-01T08:27:00Z</o:LastSaved>
  <o:Pages>1</o:Pages>
  <o:Words>125</o:Words>
  <o:Characters>714</o:Characters>
  <o:Company>LTD</o:Company>
  <o:Lines>5</o:Lines>
  <o:Paragraphs>1</o:Paragraphs>
  <o:CharactersWithSpaces>838</o:CharactersWithSpaces>
  <o:Version>12.00</o:Version>
 </o:DocumentProperties>
 <o:OfficeDocumentSettings>
  <o:RelyOnVML/>
  <o:AllowPNG/>
 </o:OfficeDocumentSettings>
</xml><![endif]-->
<!--[if gte mso 9]><xml>
 <w:WordDocument>
  <w:HideSpellingErrors/>
  <w:ActiveWritingStyle Lang=\"EN-US\" VendorID=\"64\" DLLVersion=\"131078\"
   NLCheck=\"1\">1</w:ActiveWritingStyle>
  <w:ActiveWritingStyle Lang=\"EN-GB\" VendorID=\"64\" DLLVersion=\"131078\"
   NLCheck=\"1\">1</w:ActiveWritingStyle>
  <w:ActiveWritingStyle Lang=\"FR\" VendorID=\"64\" DLLVersion=\"131078\" NLCheck=\"1\">1</w:ActiveWritingStyle>
  <w:TrackMoves>false</w:TrackMoves>
  <w:TrackFormatting/>
  <w:DrawingGridHorizontalSpacing>5 pt</w:DrawingGridHorizontalSpacing>
  <w:DisplayHorizontalDrawingGridEvery>2</w:DisplayHorizontalDrawingGridEvery>
  <w:ValidateAgainstSchemas/>
  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>
  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>
  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>
  <w:DoNotPromoteQF/>
  <w:LidThemeOther>EN-US</w:LidThemeOther>
  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>
  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>
  <w:Compatibility>
   <w:BreakWrappedTables/>
   <w:SnapToGridInCell/>
   <w:WrapTextWithPunct/>
   <w:UseAsianBreakRules/>
   <w:DontGrowAutofit/>
   <w:SplitPgBreakAndParaMark/>
   <w:DontVertAlignCellWithSp/>
   <w:DontBreakConstrainedForcedTables/>
   <w:DontVertAlignInTxbx/>
   <w:Word11KerningPairs/>
   <w:CachedColBalance/>
  </w:Compatibility>
  <m:mathPr>
   <m:mathFont m:val=\"Cambria Math\"/>
   <m:brkBin m:val=\"before\"/>
   <m:brkBinSub m:val=\"--\"/>
   <m:smallFrac/>
   <m:dispDef/>
   <m:lMargin m:val=\"0\"/>
   <m:rMargin m:val=\"0\"/>
   <m:defJc m:val=\"centerGroup\"/>
   <m:wrapIndent m:val=\"1440\"/>
   <m:intLim m:val=\"subSup\"/>
   <m:naryLim m:val=\"undOvr\"/>
  </m:mathPr></w:WordDocument>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <w:LatentStyles DefLockedState=\"false\" DefUnhideWhenUsed=\"false\"
  DefSemiHidden=\"false\" DefQFormat=\"false\" LatentStyleCount=\"267\">
  <w:LsdException Locked=\"false\" QFormat=\"true\" Name=\"Normal\"/>
  <w:LsdException Locked=\"false\" QFormat=\"true\" Name=\"heading 1\"/>
  <w:LsdException Locked=\"false\" QFormat=\"true\" Name=\"heading 2\"/>
  <w:LsdException Locked=\"false\" QFormat=\"true\" Name=\"heading 3\"/>
  <w:LsdException Locked=\"false\" QFormat=\"true\" Name=\"heading 4\"/>
  <w:LsdException Locked=\"false\" QFormat=\"true\" Name=\"heading 5\"/>
  <w:LsdException Locked=\"false\" QFormat=\"true\" Name=\"heading 6\"/>
  <w:LsdException Locked=\"false\" QFormat=\"true\" Name=\"heading 7\"/>
  <w:LsdException Locked=\"false\" QFormat=\"true\" Name=\"heading 8\"/>
  <w:LsdException Locked=\"false\" QFormat=\"true\" Name=\"heading 9\"/>
  <w:LsdException Locked=\"false\" Priority=\"99\" Name=\"header\"/>
  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"
   QFormat=\"true\" Name=\"caption\"/>
  <w:LsdException Locked=\"false\" QFormat=\"true\" Name=\"Title\"/>
  <w:LsdException Locked=\"false\" Priority=\"1\" Name=\"Default Paragraph Font\"/>
  <w:LsdException Locked=\"false\" QFormat=\"true\" Name=\"Subtitle\"/>
  <w:LsdException Locked=\"false\" QFormat=\"true\" Name=\"Strong\"/>
  <w:LsdException Locked=\"false\" QFormat=\"true\" Name=\"Emphasis\"/>
  <w:LsdException Locked=\"false\" Priority=\"99\" Name=\"No List\"/>
  <w:LsdException Locked=\"false\" Priority=\"99\" SemiHidden=\"true\"
   Name=\"Placeholder Text\"/>
  <w:LsdException Locked=\"false\" Priority=\"1\" QFormat=\"true\" Name=\"No Spacing\"/>
  <w:LsdException Locked=\"false\" Priority=\"60\" Name=\"Light Shading\"/>
  <w:LsdException Locked=\"false\" Priority=\"61\" Name=\"Light List\"/>
  <w:LsdException Locked=\"false\" Priority=\"62\" Name=\"Light Grid\"/>
  <w:LsdException Locked=\"false\" Priority=\"63\" Name=\"Medium Shading 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"64\" Name=\"Medium Shading 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"65\" Name=\"Medium List 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"66\" Name=\"Medium List 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"67\" Name=\"Medium Grid 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"68\" Name=\"Medium Grid 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"69\" Name=\"Medium Grid 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"70\" Name=\"Dark List\"/>
  <w:LsdException Locked=\"false\" Priority=\"71\" Name=\"Colorful Shading\"/>
  <w:LsdException Locked=\"false\" Priority=\"72\" Name=\"Colorful List\"/>
  <w:LsdException Locked=\"false\" Priority=\"73\" Name=\"Colorful Grid\"/>
  <w:LsdException Locked=\"false\" Priority=\"60\" Name=\"Light Shading Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"61\" Name=\"Light List Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"62\" Name=\"Light Grid Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"63\" Name=\"Medium Shading 1 Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"64\" Name=\"Medium Shading 2 Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"65\" Name=\"Medium List 1 Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"99\" SemiHidden=\"true\" Name=\"Revision\"/>
  <w:LsdException Locked=\"false\" Priority=\"99\" QFormat=\"true\"
   Name=\"List Paragraph\"/>
  <w:LsdException Locked=\"false\" Priority=\"29\" QFormat=\"true\" Name=\"Quote\"/>
  <w:LsdException Locked=\"false\" Priority=\"30\" QFormat=\"true\"
   Name=\"Intense Quote\"/>
  <w:LsdException Locked=\"false\" Priority=\"66\" Name=\"Medium List 2 Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"67\" Name=\"Medium Grid 1 Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"68\" Name=\"Medium Grid 2 Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"69\" Name=\"Medium Grid 3 Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"70\" Name=\"Dark List Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"71\" Name=\"Colorful Shading Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"72\" Name=\"Colorful List Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"73\" Name=\"Colorful Grid Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"60\" Name=\"Light Shading Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"61\" Name=\"Light List Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"62\" Name=\"Light Grid Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"63\" Name=\"Medium Shading 1 Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"64\" Name=\"Medium Shading 2 Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"65\" Name=\"Medium List 1 Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"66\" Name=\"Medium List 2 Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"67\" Name=\"Medium Grid 1 Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"68\" Name=\"Medium Grid 2 Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"69\" Name=\"Medium Grid 3 Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"70\" Name=\"Dark List Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"71\" Name=\"Colorful Shading Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"72\" Name=\"Colorful List Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"73\" Name=\"Colorful Grid Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"60\" Name=\"Light Shading Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"61\" Name=\"Light List Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"62\" Name=\"Light Grid Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"63\" Name=\"Medium Shading 1 Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"64\" Name=\"Medium Shading 2 Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"65\" Name=\"Medium List 1 Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"66\" Name=\"Medium List 2 Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"67\" Name=\"Medium Grid 1 Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"68\" Name=\"Medium Grid 2 Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"69\" Name=\"Medium Grid 3 Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"70\" Name=\"Dark List Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"71\" Name=\"Colorful Shading Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"72\" Name=\"Colorful List Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"73\" Name=\"Colorful Grid Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"60\" Name=\"Light Shading Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"61\" Name=\"Light List Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"62\" Name=\"Light Grid Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"63\" Name=\"Medium Shading 1 Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"64\" Name=\"Medium Shading 2 Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"65\" Name=\"Medium List 1 Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"66\" Name=\"Medium List 2 Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"67\" Name=\"Medium Grid 1 Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"68\" Name=\"Medium Grid 2 Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"69\" Name=\"Medium Grid 3 Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"70\" Name=\"Dark List Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"71\" Name=\"Colorful Shading Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"72\" Name=\"Colorful List Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"73\" Name=\"Colorful Grid Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"60\" Name=\"Light Shading Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"61\" Name=\"Light List Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"62\" Name=\"Light Grid Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"63\" Name=\"Medium Shading 1 Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"64\" Name=\"Medium Shading 2 Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"65\" Name=\"Medium List 1 Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"66\" Name=\"Medium List 2 Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"67\" Name=\"Medium Grid 1 Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"68\" Name=\"Medium Grid 2 Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"69\" Name=\"Medium Grid 3 Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"70\" Name=\"Dark List Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"71\" Name=\"Colorful Shading Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"72\" Name=\"Colorful List Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"73\" Name=\"Colorful Grid Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"60\" Name=\"Light Shading Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"61\" Name=\"Light List Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"62\" Name=\"Light Grid Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"63\" Name=\"Medium Shading 1 Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"64\" Name=\"Medium Shading 2 Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"65\" Name=\"Medium List 1 Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"66\" Name=\"Medium List 2 Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"67\" Name=\"Medium Grid 1 Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"68\" Name=\"Medium Grid 2 Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"69\" Name=\"Medium Grid 3 Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"70\" Name=\"Dark List Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"71\" Name=\"Colorful Shading Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"72\" Name=\"Colorful List Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"73\" Name=\"Colorful Grid Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"19\" QFormat=\"true\"
   Name=\"Subtle Emphasis\"/>
  <w:LsdException Locked=\"false\" Priority=\"21\" QFormat=\"true\"
   Name=\"Intense Emphasis\"/>
  <w:LsdException Locked=\"false\" Priority=\"31\" QFormat=\"true\"
   Name=\"Subtle Reference\"/>
  <w:LsdException Locked=\"false\" Priority=\"32\" QFormat=\"true\"
   Name=\"Intense Reference\"/>
  <w:LsdException Locked=\"false\" Priority=\"33\" QFormat=\"true\" Name=\"Book Title\"/>
  <w:LsdException Locked=\"false\" Priority=\"37\" SemiHidden=\"true\"
   UnhideWhenUsed=\"true\" Name=\"Bibliography\"/>
  <w:LsdException Locked=\"false\" Priority=\"39\" SemiHidden=\"true\"
   UnhideWhenUsed=\"true\" QFormat=\"true\" Name=\"TOC Heading\"/>
 </w:LatentStyles>
</xml><![endif]-->
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:Wingdings;
	panose-1:5 0 0 0 0 0 0 0 0 0;
	mso-font-charset:2;
	mso-generic-font-family:auto;
	mso-font-pitch:variable;
	mso-font-signature:0 268435456 0 0 -2147483648 0;}
@font-face
	{font-family:\"Cambria Math\";
	panose-1:2 4 5 3 5 4 6 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:-1610611985 1107304683 0 0 415 0;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-520092929 1073786111 9 0 415 0;}
@font-face
	{font-family:Tahoma;
	panose-1:2 11 6 4 3 5 4 4 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-520081665 -1073717157 41 0 66047 0;}
@font-face
	{font-family:\"Segoe UI\";
	panose-1:2 11 5 2 4 2 4 2 2 3;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-520084737 -1073683329 41 0 479 0;}
@font-face
	{font-family:VNI-Times;
	panose-1:0 0 0 0 0 0 0 0 0 0;
	mso-font-alt:\"Times New Roman\";
	mso-font-charset:0;
	mso-generic-font-family:auto;
	mso-font-pitch:variable;
	mso-font-signature:3 0 0 0 1 0;}
@font-face
	{font-family:VNTime;
	mso-font-alt:Arial;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:3 0 0 0 1 0;}
@font-face
	{font-family:VNI-Book;
	mso-font-alt:\"Times New Roman\";
	mso-font-charset:0;
	mso-generic-font-family:auto;
	mso-font-pitch:variable;
	mso-font-signature:3 0 0 0 1 0;}
@font-face
	{font-family:VNTimeH;
	panose-1:0 0 0 0 0 0 0 0 0 0;
	mso-font-alt:Arial;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-format:other;
	mso-font-pitch:variable;
	mso-font-signature:3 0 0 0 1 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:\"\";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:\"Times New Roman\",\"serif\";
	mso-fareast-font-family:\"Times New Roman\";}
h1
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-next:Normal;
	margin-top:0in;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:.4in;
	margin-bottom:.0001pt;
	text-align:center;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:1;
	font-size:13.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:VNI-Times;
	mso-font-kerning:0pt;
	mso-bidi-font-weight:normal;}
h2
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-next:Normal;
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:2;
	font-size:13.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:\"VNTime\",\"sans-serif\";
	mso-bidi-font-weight:normal;}
h3
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-next:Normal;
	margin:0in;
	margin-bottom:.0001pt;
	text-align:right;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:3;
	font-size:10.0pt;
	font-family:VNI-Book;
	color:black;
	layout-grid-mode:line;
	mso-bidi-font-weight:normal;}
h4
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-next:Normal;
	margin:0in;
	margin-bottom:.0001pt;
	text-align:center;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:4;
	font-size:10.0pt;
	font-family:VNI-Book;
	mso-bidi-font-weight:normal;}
h5
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-link:\"Heading 5 Char\";
	mso-style-next:Normal;
	margin:0in;
	margin-bottom:.0001pt;
	text-align:center;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:5;
	font-size:12.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:\"Times New Roman\",\"serif\";
	font-weight:normal;}
h6
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-link:\"Heading 6 Char\";
	mso-style-next:Normal;
	margin-top:0in;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:.3in;
	margin-bottom:.0001pt;
	text-indent:.1in;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:6;
	font-size:10.0pt;
	font-family:VNI-Book;
	mso-bidi-font-weight:normal;}
p.MsoHeading7, li.MsoHeading7, div.MsoHeading7
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-next:Normal;
	margin:0in;
	margin-bottom:.0001pt;
	text-align:center;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:7;
	font-size:14.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:VNI-Times;
	mso-fareast-font-family:\"Times New Roman\";
	mso-bidi-font-family:\"Times New Roman\";
	font-weight:bold;
	mso-bidi-font-weight:normal;}
p.MsoHeading8, li.MsoHeading8, div.MsoHeading8
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-next:Normal;
	margin:0in;
	margin-bottom:.0001pt;
	text-align:center;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:8;
	font-size:18.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:\"VNTimeH\",\"sans-serif\";
	mso-fareast-font-family:\"Times New Roman\";
	mso-bidi-font-family:\"Times New Roman\";
	font-weight:bold;
	mso-bidi-font-weight:normal;}
p.MsoHeading9, li.MsoHeading9, div.MsoHeading9
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-next:Normal;
	margin:0in;
	margin-bottom:.0001pt;
	text-align:justify;
	text-indent:.5in;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:9;
	font-size:13.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:VNI-Book;
	mso-fareast-font-family:\"Times New Roman\";
	mso-bidi-font-family:\"Times New Roman\";}
p.MsoHeader, li.MsoHeader, div.MsoHeader
	{mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-link:\"Header Char\";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	tab-stops:center 3.0in right 6.0in;
	font-size:10.0pt;
	font-family:\"Times New Roman\",\"serif\";
	mso-fareast-font-family:\"Times New Roman\";}
p.MsoFooter, li.MsoFooter, div.MsoFooter
	{mso-style-unhide:no;
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	tab-stops:center 242.2pt right 484.45pt;
	font-size:10.0pt;
	font-family:\"Times New Roman\",\"serif\";
	mso-fareast-font-family:\"Times New Roman\";}
p.MsoBodyText, li.MsoBodyText, div.MsoBodyText
	{mso-style-unhide:no;
	mso-style-link:\"Body Text Char\";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:VNI-Book;
	mso-fareast-font-family:\"Times New Roman\";
	mso-bidi-font-family:\"Times New Roman\";}
p.MsoBodyTextIndent, li.MsoBodyTextIndent, div.MsoBodyTextIndent
	{mso-style-unhide:no;
	margin-top:0in;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:.4in;
	margin-bottom:.0001pt;
	text-indent:.1in;
	mso-pagination:widow-orphan;
	font-size:13.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:VNI-Book;
	mso-fareast-font-family:\"Times New Roman\";
	mso-bidi-font-family:\"Times New Roman\";}
p.MsoBodyText3, li.MsoBodyText3, div.MsoBodyText3
	{mso-style-unhide:no;
	mso-style-link:\"Body Text 3 Char\";
	margin-top:0in;
	margin-right:0in;
	margin-bottom:6.0pt;
	margin-left:0in;
	mso-pagination:widow-orphan;
	font-size:8.0pt;
	font-family:\"Times New Roman\",\"serif\";
	mso-fareast-font-family:\"Times New Roman\";}
p.MsoBodyTextIndent2, li.MsoBodyTextIndent2, div.MsoBodyTextIndent2
	{mso-style-unhide:no;
	margin:0in;
	margin-bottom:.0001pt;
	text-align:justify;
	text-indent:.5in;
	mso-pagination:widow-orphan;
	font-size:13.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:VNI-Book;
	mso-fareast-font-family:\"Times New Roman\";
	mso-bidi-font-family:\"Times New Roman\";}
p.MsoBodyTextIndent3, li.MsoBodyTextIndent3, div.MsoBodyTextIndent3
	{mso-style-unhide:no;
	margin:0in;
	margin-bottom:.0001pt;
	text-align:justify;
	text-indent:.1in;
	mso-pagination:widow-orphan;
	font-size:13.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:VNI-Book;
	mso-fareast-font-family:\"Times New Roman\";
	mso-bidi-font-family:\"Times New Roman\";}
p.MsoAcetate, li.MsoAcetate, div.MsoAcetate
	{mso-style-unhide:no;
	mso-style-link:\"Balloon Text Char\";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:8.0pt;
	font-family:\"Tahoma\",\"sans-serif\";
	mso-fareast-font-family:\"Times New Roman\";}
p.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph
	{mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	margin-top:0in;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:.5in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:13.0pt;
	font-family:VNI-Times;
	mso-fareast-font-family:Calibri;
	mso-bidi-font-family:VNI-Times;}
span.BodyText3Char
	{mso-style-name:\"Body Text 3 Char\";
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:\"Body Text 3\";
	mso-ansi-font-size:8.0pt;
	mso-bidi-font-size:8.0pt;}
span.BalloonTextChar
	{mso-style-name:\"Balloon Text Char\";
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:\"Balloon Text\";
	mso-ansi-font-size:8.0pt;
	mso-bidi-font-size:8.0pt;
	font-family:\"Tahoma\",\"sans-serif\";
	mso-ascii-font-family:Tahoma;
	mso-hansi-font-family:Tahoma;
	mso-bidi-font-family:Tahoma;}
span.Heading6Char
	{mso-style-name:\"Heading 6 Char\";
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-parent:\"\";
	mso-style-link:\"Heading 6\";
	font-family:VNI-Book;
	mso-ascii-font-family:VNI-Book;
	mso-hansi-font-family:VNI-Book;
	font-weight:bold;
	mso-bidi-font-weight:normal;}
span.HeaderChar
	{mso-style-name:\"Header Char\";
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-parent:\"\";
	mso-style-link:Header;}
span.Heading5Char
	{mso-style-name:\"Heading 5 Char\";
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:\"Heading 5\";
	mso-ansi-font-size:12.0pt;}
span.BodyTextChar
	{mso-style-name:\"Body Text Char\";
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:\"Body Text\";
	mso-ansi-font-size:12.0pt;
	font-family:VNI-Book;
	mso-ascii-font-family:VNI-Book;
	mso-hansi-font-family:VNI-Book;}
.MsoChpDefault
	{mso-style-type:export-only;
	mso-default-props:yes;
	font-size:10.0pt;
	mso-ansi-font-size:10.0pt;
	mso-bidi-font-size:10.0pt;}
 /* Page Definitions */
@page Section1
	{size:595.35pt 842.0pt;
	margin:28.4pt .5in 28.4pt 56.7pt;
	mso-header-margin:21.3pt;
	mso-footer-margin:.5in;
	mso-page-numbers:4;
	mso-footer: f1;
	mso-paper-source:0;}
div.Section1
	{page:Section1;}
 /* List Definitions */
 @list l0
	{mso-list-id:185607839;
	mso-list-template-ids:89818734;}
@list l0:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l0:level2
	{mso-level-legal-format:yes;
	mso-level-text:\"%1\.%2\.\";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.5in;}
@list l0:level3
	{mso-level-legal-format:yes;
	mso-level-text:\"%1\.%2\.%3\.\";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.5in;}
@list l0:level4
	{mso-level-legal-format:yes;
	mso-level-text:\"%1\.%2\.%3\.%4\.\";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.75in;}
@list l0:level5
	{mso-level-legal-format:yes;
	mso-level-text:\"%1\.%2\.%3\.%4\.%5\.\";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.75in;}
@list l0:level6
	{mso-level-legal-format:yes;
	mso-level-text:\"%1\.%2\.%3\.%4\.%5\.%6\.\";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.25in;
	text-indent:-1.0in;}
@list l0:level7
	{mso-level-legal-format:yes;
	mso-level-text:\"%1\.%2\.%3\.%4\.%5\.%6\.%7\.\";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.25in;
	text-indent:-1.0in;}
@list l0:level8
	{mso-level-legal-format:yes;
	mso-level-text:\"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.\";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.5in;
	text-indent:-1.25in;}
@list l0:level9
	{mso-level-legal-format:yes;
	mso-level-text:\"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9\.\";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.5in;
	text-indent:-1.25in;}
@list l1
	{mso-list-id:193884964;
	mso-list-type:hybrid;
	mso-list-template-ids:-10212106 67698703 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l1:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l2
	{mso-list-id:197738179;
	mso-list-type:hybrid;
	mso-list-template-ids:623827798 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l2:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.25in;
	font-family:\"Segoe UI\",\"sans-serif\";
	mso-bidi-font-family:\"Times New Roman\";}
@list l3
	{mso-list-id:210772588;
	mso-list-type:hybrid;
	mso-list-template-ids:774927860 -763744972 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l3:level1
	{mso-level-number-format:bullet;
	mso-level-text:\F076;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-ansi-font-weight:bold;}
@list l4
	{mso-list-id:274288156;
	mso-list-type:hybrid;
	mso-list-template-ids:-1412283520 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l4:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:\"Segoe UI\",\"sans-serif\";
	mso-bidi-font-family:\"Times New Roman\";}
@list l5
	{mso-list-id:314989005;
	mso-list-type:hybrid;
	mso-list-template-ids:-978530038 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l5:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:\"Segoe UI\",\"sans-serif\";
	mso-bidi-font-family:\"Times New Roman\";}
@list l6
	{mso-list-id:356390375;
	mso-list-type:hybrid;
	mso-list-template-ids:-1991755058 -1289338640 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l6:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.5in;}
@list l7
	{mso-list-id:358699716;
	mso-list-type:hybrid;
	mso-list-template-ids:-388469424 1194741084 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l7:level1
	{mso-level-tab-stop:.25in;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;}
@list l8
	{mso-list-id:418986596;
	mso-list-type:hybrid;
	mso-list-template-ids:401738196 1468329486 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l8:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	mso-ansi-font-weight:bold;
	mso-bidi-font-weight:bold;}
@list l8:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l8:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l8:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l8:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l8:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l8:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l8:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l8:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l9
	{mso-list-id:429589473;
	mso-list-type:hybrid;
	mso-list-template-ids:153503786 67698697 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l9:level1
	{mso-level-number-format:bullet;
	mso-level-text:\F076;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;}
@list l10
	{mso-list-id:460078484;
	mso-list-type:hybrid;
	mso-list-template-ids:-218195662 1376445666 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l10:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.25in;}
@list l11
	{mso-list-id:507209580;
	mso-list-type:hybrid;
	mso-list-template-ids:1226498392 1935324468 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l11:level1
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:1.3in;
	mso-level-number-position:left;
	margin-left:1.3in;
	text-indent:-.25in;
	mso-ansi-font-size:13.0pt;
	mso-bidi-font-size:13.0pt;
	font-family:Symbol;}
@list l12
	{mso-list-id:571231589;
	mso-list-type:hybrid;
	mso-list-template-ids:1869642302 67698709 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l12:level1
	{mso-level-start-at:2;
	mso-level-number-format:alpha-upper;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;}
@list l13
	{mso-list-id:581767211;
	mso-list-type:simple;
	mso-list-template-ids:-923478506;}
@list l13:level1
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:.25in;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;}
@list l14
	{mso-list-id:592395358;
	mso-list-type:hybrid;
	mso-list-template-ids:1629138236 -763744972 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l14:level1
	{mso-level-number-format:bullet;
	mso-level-text:\F076;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:63.0pt;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-ansi-font-weight:bold;}
@list l15
	{mso-list-id:666788816;
	mso-list-type:simple;
	mso-list-template-ids:67698703;}
@list l15:level1
	{mso-level-tab-stop:.25in;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;}
@list l16
	{mso-list-id:688140400;
	mso-list-type:hybrid;
	mso-list-template-ids:-780781178 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l16:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.25in;
	font-family:\"Segoe UI\",\"sans-serif\";
	mso-bidi-font-family:\"Times New Roman\";}
@list l17
	{mso-list-id:690692504;
	mso-list-type:simple;
	mso-list-template-ids:1194741084;}
@list l17:level1
	{mso-level-tab-stop:.25in;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;}
@list l18
	{mso-list-id:713699184;
	mso-list-type:hybrid;
	mso-list-template-ids:-532787362 67698689 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l18:level1
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:.9in;
	mso-level-number-position:left;
	margin-left:.9in;
	text-indent:-.25in;
	font-family:Symbol;}
@list l19
	{mso-list-id:734625104;
	mso-list-type:hybrid;
	mso-list-template-ids:-1000177294 1404486684 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l19:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.25in;}
@list l20
	{mso-list-id:794906545;
	mso-list-type:hybrid;
	mso-list-template-ids:1209318548 67698703 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l20:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l21
	{mso-list-id:832263037;
	mso-list-type:hybrid;
	mso-list-template-ids:1897320752 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l21:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.25in;
	font-family:\"Segoe UI\",\"sans-serif\";
	mso-bidi-font-family:\"Times New Roman\";}
@list l22
	{mso-list-id:837381688;
	mso-list-type:hybrid;
	mso-list-template-ids:1723255994 -1346461856 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l22:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.25in;}
@list l23
	{mso-list-id:846099272;
	mso-list-template-ids:-255658220;}
@list l23:level1
	{mso-level-tab-stop:.25in;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;}
@list l24
	{mso-list-id:897323317;
	mso-list-type:hybrid;
	mso-list-template-ids:-1935264954 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l24:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:\"Segoe UI\",\"sans-serif\";
	mso-bidi-font-family:\"Times New Roman\";}
@list l24:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:\"Courier New\";}
@list l25
	{mso-list-id:1053381511;
	mso-list-type:hybrid;
	mso-list-template-ids:-1282773648 937964886 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l25:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.25in;
	text-indent:-.25in;}
@list l26
	{mso-list-id:1054700105;
	mso-list-type:simple;
	mso-list-template-ids:-534095918;}
@list l26:level1
	{mso-level-tab-stop:.25in;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;
	font-family:\"Times New Roman\",\"serif\";}
@list l27
	{mso-list-id:1101417596;
	mso-list-type:hybrid;
	mso-list-template-ids:1266829768 -1933020014 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l27:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l28
	{mso-list-id:1119029329;
	mso-list-template-ids:-1991755058;}
@list l28:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.5in;}
@list l29
	{mso-list-id:1230073191;
	mso-list-type:hybrid;
	mso-list-template-ids:-59088952 -1074097196 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l29:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l30
	{mso-list-id:1348486590;
	mso-list-type:hybrid;
	mso-list-template-ids:-139806138 2037781728 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l30:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.25in;}
@list l31
	{mso-list-id:1353342192;
	mso-list-type:hybrid;
	mso-list-template-ids:2035076664 -1991853152 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l31:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l32
	{mso-list-id:1381592527;
	mso-list-type:hybrid;
	mso-list-template-ids:-255658220 1194741084 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l32:level1
	{mso-level-tab-stop:.25in;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;}
@list l33
	{mso-list-id:1385176946;
	mso-list-type:hybrid;
	mso-list-template-ids:955678898 792493300 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l33:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.25in;}
@list l34
	{mso-list-id:1464542073;
	mso-list-type:hybrid;
	mso-list-template-ids:754481132 -667151738 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l34:level1
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:49.5pt;
	text-indent:-.25in;
	font-family:Symbol;
	color:windowtext;}
@list l35
	{mso-list-id:1519734429;
	mso-list-type:hybrid;
	mso-list-template-ids:913740958 1353471942 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l35:level1
	{mso-level-start-at:2;
	mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:63.0pt;
	text-indent:-.25in;
	font-family:\"Times New Roman\",\"serif\";}
@list l36
	{mso-list-id:1629777677;
	mso-list-type:hybrid;
	mso-list-template-ids:-742094904 2037781728 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l36:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.25in;}
@list l37
	{mso-list-id:1634944168;
	mso-list-type:hybrid;
	mso-list-template-ids:1298281942 67698689 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l37:level1
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:85.5pt;
	text-indent:-.25in;
	font-family:Symbol;}
@list l38
	{mso-list-id:1651128127;
	mso-list-type:hybrid;
	mso-list-template-ids:1790482348 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l38:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:\"Segoe UI\",\"sans-serif\";
	mso-bidi-font-family:\"Times New Roman\";}
@list l39
	{mso-list-id:1782141090;
	mso-list-type:hybrid;
	mso-list-template-ids:-1497177398 1823103132 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l39:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l40
	{mso-list-id:1819303548;
	mso-list-type:hybrid;
	mso-list-template-ids:171999078 67698689 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l40:level1
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.25in;
	font-family:Symbol;}
@list l41
	{mso-list-id:1876311096;
	mso-list-type:hybrid;
	mso-list-template-ids:-731602470 -763744972 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l41:level1
	{mso-level-number-format:bullet;
	mso-level-text:\F076;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:32.2pt;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-ansi-font-weight:bold;}
@list l42
	{mso-list-id:1942447516;
	mso-list-template-ids:1387009574;}
@list l42:level1
	{mso-level-tab-stop:.25in;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;
	font-family:\"Times New Roman\",\"serif\";}
@list l43
	{mso-list-id:1945532465;
	mso-list-type:hybrid;
	mso-list-template-ids:1648557478 67698689 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l43:level1
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:1.0in;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.25in;
	font-family:Symbol;}
@list l44
	{mso-list-id:1959529969;
	mso-list-type:hybrid;
	mso-list-template-ids:-1190735964 -937269770 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l44:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l45
	{mso-list-id:1977680538;
	mso-list-type:simple;
	mso-list-template-ids:-102484282;}
@list l45:level1
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:.25in;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;}
@list l46
	{mso-list-id:1978953021;
	mso-list-type:hybrid;
	mso-list-template-ids:1579028484 1007572572 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l46:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.25in;}
@list l47
	{mso-list-id:1979533303;
	mso-list-type:hybrid;
	mso-list-template-ids:809921652 242007448 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l47:level1
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:1.3in;
	mso-level-number-position:left;
	margin-left:1.3in;
	text-indent:-.25in;
	mso-ansi-font-size:13.0pt;
	mso-bidi-font-size:13.0pt;
	font-family:Symbol;
	mso-ansi-language:EN-US;}
@list l47:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:1.4in;
	mso-level-number-position:left;
	margin-left:1.4in;
	text-indent:-.25in;
	font-family:\"Courier New\";}
@list l48
	{mso-list-id:2072385664;
	mso-list-type:hybrid;
	mso-list-template-ids:-2005398066 67698689 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l48:level1
	{mso-level-start-at:0;
	mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:.5in;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-fareast-font-family:\"Times New Roman\";
	mso-bidi-font-family:\"Times New Roman\";}
ol
	{margin-bottom:0in;}
ul
	{margin-bottom:0in;}
-->
</style>
<!--[if gte mso 10]>
<style>
 /* Style Definitions */
 table.MsoNormalTable
	{mso-style-name:\"Table Normal\";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-qformat:yes;
	mso-style-parent:\"\";
	mso-padding-alt:0in 5.4pt 0in 5.4pt;
	mso-para-margin:0in;
	mso-para-margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:\"Times New Roman\",\"serif\";}
table.MsoTableGrid
	{mso-style-name:\"Table Grid\";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-unhide:no;
	border:solid windowtext 1.0pt;
	mso-border-alt:solid windowtext .5pt;
	mso-padding-alt:0in 5.4pt 0in 5.4pt;
	mso-border-insideh:.5pt solid windowtext;
	mso-border-insidev:.5pt solid windowtext;
	mso-para-margin:0in;
	mso-para-margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:\"Times New Roman\",\"serif\";}
p.MsoFooter, li.MsoFooter, div.MsoFooter
{
    margin:0in;
    margin-bottom:.0001pt;
    mso-pagination:widow-orphan;
    tab-stops:center 3.0in right 6.0in;
    font-size:12.0pt;
}
table#hrdftrtbl{
    margin:0in 0in 0in 9in;
}
</style>
<![endif]--><!--[if gte mso 9]><xml>
 <o:shapedefaults v:ext=\"edit\" spidmax=\"8194\">
  <v:stroke weight=\"4.5pt\" linestyle=\"thickThin\"/>
 </o:shapedefaults></xml><![endif]--><!--[if gte mso 9]><xml>
 <o:shapelayout v:ext=\"edit\">
  <o:idmap v:ext=\"edit\" data=\"1\"/>
 </o:shapelayout></xml><![endif]-->
</head>

<body lang=EN-US style='tab-interval:.5in'>

<div class=Section1>
<p class=MsoNormal><span lang=VI style='font-size:13.0pt;color:black;
mso-themecolor:text1;mso-ansi-language:VI'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=VI style='font-size:13.0pt;color:black;
mso-themecolor:text1;mso-ansi-language:VI'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span style='font-size:14.0pt;color:black;mso-themecolor:
text1'><span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;</span>XN &#272;&#7883;a
v&#7853;t lý GK</span><b><span lang=VI
style='font-size:14.0pt;color:black;mso-themecolor:text1;mso-ansi-language:
VI'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BIÊN B&#7842;N BÀN GIAO THI&#7870;T B&#7882;</span></b><b><span
style='font-size:14.0pt;color:black;mso-themecolor:text1'><o:p></o:p></span></b></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span
style='font-size:14.0pt;color:black;mso-themecolor:text1'>&nbsp;&nbsp;X&#432;&#7903;ng
SCTB&#272;VL<span style='mso-tab-count:12'></span></span></b><b
style='mso-bidi-font-weight:normal'><span style='font-size:13.0pt;color:black;
mso-themecolor:text1'><span style='mso-tab-count:1'>            </span></span></b><span
lang=VI style='font-size:13.0pt;color:black;mso-themecolor:text1;mso-ansi-language:
VI'>S&#7889; h</span><span style='font-size:13.0pt;color:black;mso-themecolor:
text1';font-weight:bold>&#7891; s&#417;: </span><span style='font-size:13.0pt;color:black;mso-themecolor:text1;mso-ansi-language:
VI;font-weight:bold'>...$sohoso-$slbg...</span><span
style='font-size:13.0pt;color:black;mso-themecolor:text1'><span
style='mso-tab-count:1'>      </span>Ngày:</span><span style='font-size:13.0pt;color:black;mso-themecolor:text1;mso-ansi-language:
VI;font-weight:bold'>...$ngays/$thangs/$nams...</span><b style='mso-bidi-font-weight:normal'><span
style='font-size:13.0pt;color:black;mso-themecolor:text1'><o:p></o:p></span></b></p>

<p class=MsoNormal><span lang=VI style='font-size:13.0pt;color:black;
mso-themecolor:text1;mso-ansi-language:VI'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='margin-left:.25in;text-indent:-.25in;line-height:
150%;mso-list:l6 level1 lfo22'><![if !supportLists]><span lang=VI
style='font-size:13.0pt;line-height:150%;color:black;mso-themecolor:text1;
mso-ansi-language:VI'><span style='mso-list:Ignore'>1.<span style='font:7.0pt \"Times New Roman\"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=VI style='font-size:13.0pt;
line-height:150%;color:black;mso-themecolor:text1;mso-ansi-language:VI'>Bên
giao,&#1057;&#1076;&#1072;&#1083;</span><span lang=VI style='font-size:13.0pt;
line-height:150%;color:black;mso-themecolor:text1;mso-ansi-language:VI;font-weight:bold'>...$nhanvien...</span><span
lang=VI style='font-size:13.0pt;line-height:150%;color:black;mso-themecolor:
text1;mso-ansi-language:VI'>&#272;&#417;n v&#7883;,
&#1055;&#1086;&#1076;&#1088;</span><span lang=VI style='font-size:13.0pt;
line-height:150%;color:black;mso-themecolor:text1;mso-ansi-language:VI;font-weight:bold'>..X&#432;&#7903;ng
SCTB&#272;VL..</span><span
lang=VI style='font-size:13.0pt;line-height:150%;color:black;mso-themecolor:
text1;mso-ansi-language:VI'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-left:.25in;text-indent:-.25in;line-height:
150%;mso-list:l6 level1 lfo22'><![if !supportLists]><span lang=VI
style='font-size:13.0pt;line-height:150%;color:black;mso-themecolor:text1;
mso-ansi-language:VI'><span style='mso-list:Ignore'>2.<span style='font:7.0pt \"Times New Roman\"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=VI style='font-size:13.0pt;
line-height:150%;color:black;mso-themecolor:text1;mso-ansi-language:VI'>Bên
nh&#7853;n,&#1055;&#1088;&#1080;&#1085;&#1103;&#1083;</span><span lang=VI
style='font-size:13.0pt;
line-height:150%;color:black;mso-themecolor:text1;mso-ansi-language:VI;font-weight:bold'>..$khachhang..</span><span
lang=VI style='font-size:13.0pt;line-height:150%;color:black;mso-themecolor:
text1;mso-ansi-language:VI'>&#272;&#417;n v&#7883;,
&#1055;&#1086;&#1076;&#1088;</span><span lang=VI style='font-size:13.0pt;
line-height:150%;color:black;mso-themecolor:text1;mso-ansi-language:VI;font-weight:bold'>..$donvi..</span><span
lang=VI style='font-size:13.0pt;line-height:150%;color:black;mso-themecolor:
text1;mso-ansi-language:VI'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-left:.25in;text-indent:-.25in;line-height:
150%;mso-list:l6 level1 lfo22'><![if !supportLists]><span lang=VI
style='font-size:13.0pt;line-height:150%;color:black;mso-themecolor:text1;
mso-ansi-language:VI'><span style='mso-list:Ignore'>3.<span style='font:7.0pt \"Times New Roman\"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=VI style='font-size:13.0pt;
line-height:150%;color:black;mso-themecolor:text1;mso-ansi-language:VI'>Nội dung: Bên nhận sau khi kiểm tra tình trạng kỹ thuật của thiết bị và đã thống nhất với bên giao cùng nhau giao nhận các thiết bị sau:<o:p></o:p></span></p>

<p class=MsoNormal><span lang=VI style='font-size:14.0pt;color:black;
mso-themecolor:text1;mso-ansi-language:VI'><o:p>&nbsp;</o:p></span></p>

<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 width=696
 style='width:7.25in;margin-left:-12.6pt;border-collapse:collapse;border:none;
 mso-border-alt:solid windowtext .5pt;mso-padding-alt:0in 5.4pt 0in 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=48 style='width:.5in;border:solid windowtext 1.0pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span lang=VI style='font-size:13.0pt;
  color:black;mso-themecolor:text1;mso-ansi-language:VI'>STT<o:p></o:p></span></b></p>
  <p class=MsoNormal align=center style='text-align:center'><span lang=VI
  style='font-size:13.0pt;color:black;mso-themecolor:text1;mso-ansi-language:
  VI'>&#1055;/&#1055;<o:p></o:p></span></p>
  </td>
  <td width=168 style='width:1.75in;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span lang=VI style='font-size:13.0pt;
  color:black;mso-themecolor:text1;mso-ansi-language:VI'>Tên thi&#7871;t
  b&#7883;<o:p></o:p></span></b></p>
  <p class=MsoNormal align=center style='text-align:center'><span lang=VI
  style='font-size:13.0pt;color:black;mso-themecolor:text1;mso-ansi-language:
  VI'>&#1053;&#1072;&#1080;&#1084;-&#1077; &#1086;&#1073;&#1086;&#1088;&#1091;&#1076;&#1086;&#1074;&#1072;&#1085;&#1080;&#1103;<o:p></o:p></span></p>
  </td>
  <td width=114 style='width:85.5pt;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span lang=VI style='font-size:13.0pt;
  color:black;mso-themecolor:text1;mso-ansi-language:VI'>Số của thiết bị - Serial<o:p></o:p></span></b></p>
  <p class=MsoNormal align=center style='text-align:center'><span lang=VI
  style='font-size:13.0pt;color:black;mso-themecolor:text1;mso-ansi-language:
  VI'>&#1053;&#1086;&#1084;&#1077;&#1088;<o:p></o:p></span></p>
  </td>
  
  <td width=180 style='width:135.0pt;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-size:13.0pt;color:black;
  mso-themecolor:text1'>Tình tr&#7841;ng k&#7929; thu&#7853;t c&#7911;a
  thi&#7871;t b&#7883;<o:p></o:p></span></b></p>
  <p class=MsoNormal align=center style='text-align:center'><span lang=RU
  style='font-size:13.0pt;color:black;mso-themecolor:text1;mso-ansi-language:
  RU'>&#1058;&#1077;&#1093;. &#1089;</span><span style='font-size:13.0pt;
  color:black;mso-themecolor:text1'>&#1086;&#1089;&#1090;&#1086;&#1103;&#1085;&#1080;&#1077;<o:p></o:p></span></p>
  </td>
  <td width=180 style='width:135.0pt;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-size:13.0pt;color:black;
  mso-themecolor:text1'>Ghi chú<o:p></o:p></span></b></p>
  </td>
 </tr>";
 	$i=1;
	$k=1;
		 while($i<=$number)
		 {
			if($bg[$i]!=""){
			
			$tenthietbisql1 = mysql_query("SELECT * FROM hososcbd_iso WHERE hoso='$bg[$i]'") ;
			while($row = mysql_fetch_array($tenthietbisql1))
			{
				$somay =$row['somay'];
				$mavt =$row['mavt'];
				$model =$row['model'];
				$ghichufinal =$row['ghichufinal'];	
				$ttktafter =$row['ttktafter'];				
			}
			if ($model=="") $mamay=$mavt;else $mamay="$mavt-$model";
		
			echo"
			 <tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes;height:21.95pt'>
  <td width=48 style='width:.5in;border:solid windowtext 1.0pt;border-top:none;
  mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:21.95pt'>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:13.0pt;color:black;mso-themecolor:text1'>$k<o:p></o:p></span></p>
  </td>
  <td width=168 style='width:1.75in;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:21.95pt'>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:13.0pt;color:black;mso-themecolor:text1'>$mamay<o:p></o:p></span></p>
  </td>
  <td width=114 style='width:85.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:21.95pt'>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:13.0pt;color:black;mso-themecolor:text1'>$somay<o:p></o:p></span></p>
  </td>
  <td width=180 style='width:135.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:21.95pt'>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:13.0pt;color:black;mso-themecolor:text1'>$ttktafter<o:p></o:p></span></p>
  </td>
  <td width=180 style='width:135.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:21.95pt'>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:13.0pt;color:black;mso-themecolor:text1'>$ghichufinal<o:p></o:p></span></p>
  </td>
 </tr>";
		$k++;
			}
			$i++;
		}
	echo"</table>
<p class=MsoNormal><span style='font-size:14.0pt;color:black;mso-themecolor:
text1'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='margin-left:.25in;text-indent:-.25in;mso-list:l6 level1 lfo22'><![if !supportLists]><span
style='font-size:14.0pt;color:black;mso-themecolor:text1'><span
style='mso-list:Ignore'>4.<span style='font:7.0pt \"Times New Roman\"'>&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span style='font-size:14.0pt;color:black;
mso-themecolor:text1'>Ghi chú:<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:6.0pt;
margin-left:.5in'><sub><span style='font-size:12.0pt'>………………………………………………………………………………………………………………<o:p></o:p></span></sub></p>

<p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:6.0pt;
margin-left:.5in'><sub><span style='font-size:12.0pt'>………………………………………………………………………………………………………………<o:p></o:p></span></sub></p>

<p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:6.0pt;
margin-left:.5in'><sub><span style='font-size:12.0pt'>………………………………………………………………………………………………………………<o:p></o:p></span></sub></p>

<p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:6.0pt;
margin-left:.5in'><sub><span style='font-size:12.0pt'>………………………………………………………………………………………………………………</span></sub><span
style='font-size:14.0pt;color:black;mso-themecolor:text1'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-left:3.0in;text-indent:-173.45pt'><span
style='font-size:7.0pt;mso-bidi-font-size:14.0pt;color:black;mso-themecolor:
text1'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='margin-left:3.0in;text-indent:-173.45pt'><b
style='mso-bidi-font-weight:normal'><span style='font-size:13.0pt;color:black;
mso-themecolor:text1'>B</span></b><b style='mso-bidi-font-weight:normal'><span
lang=RU style='font-size:13.0pt;color:black;mso-themecolor:text1;mso-ansi-language:
RU'>ê</span></b><b style='mso-bidi-font-weight:normal'><span style='font-size:
13.0pt;color:black;mso-themecolor:text1'>n giao </span></b><span lang=RU
style='font-size:13.0pt;color:black;mso-themecolor:text1;mso-ansi-language:
RU'>(&#1057;&#1076;&#1072;&#1083;
/&#1055;&#1086;&#1076;&#1087;&#1080;&#1089;&#1100;): </span><sub><span lang=RU
style='font-size:13.0pt;mso-ansi-language:RU'>………………………………………………</span></sub><i
style='mso-bidi-font-style:normal'><span lang=RU style='font-size:13.0pt;
color:black;mso-themecolor:text1;mso-ansi-language:RU'>(</span></i><i
style='mso-bidi-font-style:normal'><span style='font-size:13.0pt;color:black;
mso-themecolor:text1'>k</span></i><i style='mso-bidi-font-style:normal'><span
lang=RU style='font-size:13.0pt;color:black;mso-themecolor:text1;mso-ansi-language:
RU'>ý </span></i><i style='mso-bidi-font-style:normal'><span style='font-size:
13.0pt;color:black;mso-themecolor:text1'>t</span></i><i style='mso-bidi-font-style:
normal'><span lang=RU style='font-size:13.0pt;color:black;mso-themecolor:text1;
mso-ansi-language:RU'>ê</span></i><i style='mso-bidi-font-style:normal'><span
style='font-size:13.0pt;color:black;mso-themecolor:text1'>n</span></i><i
style='mso-bidi-font-style:normal'><span lang=RU style='font-size:13.0pt;
color:black;mso-themecolor:text1;mso-ansi-language:RU'>)</span></i><span
lang=RU style='font-size:13.0pt;color:black;mso-themecolor:text1;mso-ansi-language:
RU'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-left:3.0in;text-indent:-173.45pt'><span
lang=RU style='font-size:13.0pt;color:black;mso-themecolor:text1;mso-ansi-language:
RU'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='margin-left:3.0in;text-indent:-173.45pt'><b
style='mso-bidi-font-weight:normal'><span style='font-size:13.0pt;color:black;
mso-themecolor:text1'>B</span></b><b style='mso-bidi-font-weight:normal'><span
lang=RU style='font-size:13.0pt;color:black;mso-themecolor:text1;mso-ansi-language:
RU'>ê</span></b><b style='mso-bidi-font-weight:normal'><span style='font-size:
13.0pt;color:black;mso-themecolor:text1'>n nh&#7853;n </span></b><span lang=RU
style='font-size:13.0pt;color:black;mso-themecolor:text1;mso-ansi-language:
RU'>(&#1055;&#1088;&#1080;&#1085;&#1103;&#1083;
/&#1055;&#1086;&#1076;&#1087;&#1080;&#1089;&#1100;): </span><sub><span lang=RU
style='font-size:13.0pt;mso-ansi-language:RU'>…………………………………………</span></sub><i
style='mso-bidi-font-style:normal'><span lang=RU style='font-size:13.0pt;
color:black;mso-themecolor:text1;mso-ansi-language:RU'>(</span></i><i
style='mso-bidi-font-style:normal'><span style='font-size:13.0pt;color:black;
mso-themecolor:text1'>k</span></i><i style='mso-bidi-font-style:normal'><span
lang=RU style='font-size:13.0pt;color:black;mso-themecolor:text1;mso-ansi-language:
RU'>ý </span></i><i style='mso-bidi-font-style:normal'><span style='font-size:
13.0pt;color:black;mso-themecolor:text1'>t</span></i><i style='mso-bidi-font-style:
normal'><span lang=RU style='font-size:13.0pt;color:black;mso-themecolor:text1;
mso-ansi-language:RU'>ê</span></i><i style='mso-bidi-font-style:normal'><span
style='font-size:13.0pt;color:black;mso-themecolor:text1'>n</span></i><i
style='mso-bidi-font-style:normal'><span lang=RU style='font-size:13.0pt;
color:black;mso-themecolor:text1;mso-ansi-language:RU'>)</span></i><span
lang=RU style='font-size:13.0pt;color:black;mso-themecolor:text1;mso-ansi-language:
RU;layout-grid-mode:line'><o:p></o:p></span></p>

<p class=MsoNormal><a name=\"_GoBack\"></a><span lang=RU style='font-size:14.0pt;
color:black;mso-themecolor:text1;mso-ansi-language:RU'><o:p>&nbsp;</o:p></span></p>
	</br>
	</br>
	</br>
<table id='hrdftrtbl' border='1' cellspacing='0' cellpadding='0'>
        <tr>
          <td>
            <div style='mso-element:footer' id=\"f1\">
                <p class=\"MsoFooter\">
                    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                        <tr>
                            <td  class=\"footer\">
                            <span lang=VI style='mso-ansi-language:VI'>BM.25.07<br>
	01/01/2024 <o:p></o:p></span>
                            </td>
                        </tr>
                    </table>
                </p>
            </div>
        </td>
    </tr>
    </table>
    </div>

</body>

</html>";
header("Content-Type: application/msword");
header("Content-Disposition:attchment;filename=\"$nams$thangs$ngays-BG.doc\""); 
header("Pragma: no-cache");
header("Expires: 0");
exit;
}
if(($search!="")&&($hoso=="phieusuachua"))
{
echo "
<html lang=\"vi\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
</head>
<body>
<table style=\"width:100%\">
<tr>
<td>
<h2> <p style=\"text-align:center;color:blue;\"> PHIẾU THỰC HIỆN CÔNG VIỆC <br/></h2>
</p>
</td>
</tr>
</table>
<br/>
<form action=\"formsc.php\" method=\"post\">
<table class=\"table7\" style=\"margin-left:50px;\">
<tr>
<td style=\"text-align:left;color:black;font-size:18;width:300px;padding-left:20px;background-color:#FFE4B5;\"> <strong>Mã quản lý</strong> </td>
<td>
<div class=\"content\">
<input name=\"maql\" type=\"text\" class=\"search\" id=\"searchid\" style=\"text-align:center;width:100%;background:#8adaa5;height:25px;\"
value=\"$search\" />
<div id=\"result\"></div>
</div>
</td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size:18;width:300px;padding-left:20px;background-color:#9966CC;\"> <strong>Mã thiết bị  (Copy)<input type=\"checkbox\" name=\"copy\" value=\"1\"></strong> </td>";
//$result2 = mysql_query("SELECT ghichufinal FROM hososcbd_iso WHERE mavt='$mavt' and somay='$somay' and model='$model'") ;
$result2 = mysql_query("SELECT ghichufinal FROM hososcbd_iso WHERE hoso='$edithoso'") ;
				//$ghichufinal ="";
while($row = mysql_fetch_array($result2))
				{
					if($row['ghichufinal']!="")
					$ghichufinal =$row['ghichufinal'];
				}
if ($phanquyen=="1") {
			$tenthietbisql1 = mysql_query("SELECT DISTINCT mavt,somay,hoso,model FROM hososcbd_iso WHERE maql='$search'") ;
		}

		else {
		$tenthietbisql1 = mysql_query("SELECT DISTINCT mavt,somay,hoso,model FROM hososcbd_iso WHERE maql='$search' and ngaykt ='0000-00-00'") ;
		$tenthietbisql2 = mysql_query("SELECT DISTINCT mavt,somay,model FROM hososcbd_iso WHERE maql='$search' and ngaykt !='0000-00-00' ") ;
			while($row = mysql_fetch_array($tenthietbisql2))
			{
			$mavt =$row['mavt'];	
			$somay =$row['somay'];
			$model =$row['model'];
			if ($model=="") $mamay=$mavt;else $mamay="$mavt-$model";
			echo "<span style=\"text-align:center;color:red;font-size: 18;padding-left:50px\">Chỉ có admin mới được sửa hồ sơ Máy:</span><span style=\"color:blue;font-size: 18;\"> $mamay </span><span style=\"color:red;font-size: 18;\">có ngày kết thúc</span></br>";
			}
		}
echo"<td> <select name=\"hosomay\" onchange=\"this.form.submit()\" style=\"border-style:none;width:100%;height:30px;\">
		<option value=\"all\"></option>";
		$ck=0;
		while($row = mysql_fetch_array($tenthietbisql1))
		{
			$mavt =$row['mavt'];	
			$somay =$row['somay'];
			$model =$row['model'];
			$hosom =$row['hoso'];
			$sqlmodel = mysql_query("SELECT DISTINCT mamay FROM thietbi_iso WHERE mavt='$mavt' and somay='$somay' and model='$model'") ;
			while($row = mysql_fetch_array($sqlmodel))
			{
			$mamay =$row['mamay'];
			}
			
			$ck=1;
			echo "<option value=\"$hosom\" style=\"background:#87CEEB;\"> $mamay </option>";
		}
		echo"</select> </td></tr>";
		if ($ck==0) {
		echo "<span style=\"text-align:center;color:red;font-size: 18;;padding-left:50px\">Chỉ có admin mới được sửa hồ sơ có ngày kết thúc</span>";
			exit;
		}
echo"<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Nhóm sửa chữa</strong> </td>
<td>
<select name=\"nhomsc\" style=\"border-style:none;width:100%;height:100%;\">
		<option value=\"\"></option>
		<option value=\"RDNGA\"> Nhóm RDNGA </option>
		<option value=\"CNC\"> Nhóm CNC</option>
</select>
</td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Số hồ sơ</strong> </td>
<td> <input style=\"border-style:none;width:100%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"sohs\" size=\"36\" type=\"text\" > </td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Ngày BĐ</strong> </td>
<td><input style=\"border-style:none;width:100%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"ngayth\" size=\"36\" type=\"text\" ></td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Ngày Kết thúc </strong></td>
<td> <input style=\"border-style:none;width:100%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"ngaykt\" size=\"36\" type=\"text\"></td>
</tr>
</table>
<br/>";
echo "<p style=\"margin-left:50px;\"> <strong>I. NGƯỜI THỰC HIỆN </strong> <br/> <br/> </p>
<table class=\"table1\" style=\"margin-left:50px;width:800px;\">

	<tr>
<th style=\"text-align:center;font-size: 15;width:60px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:400px;\"> Họ tên</th>
<th style=\"text-align:center;font-size: 15;\"> Giờ làm việc</th>
</ul>
</tr>";
$i=1;
while($i<=5){
echo"<tr>
<td><center> $i </center> </td>
<td><input type=text name=\"hoten$i\" style=\"border-style:none;width:100%;\"</td>
<td><input type=text name=\"gio$i\" style=\"border-style:none;width:100%;\" </td>
</tr>";
$i++;
}
echo"</table>";

echo "<p style=\"margin-left:50px;\"> <strong>II. CÁC THIẾT BỊ HỖ TRỢ </strong> <br/> <br/> </p>
<table class=\"table1\" style=\"margin-left:50px;width:800px;\">
<tr>
<th style=\"text-align:center;font-size: 15;width:60px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:405px;\"> Tên viết tắt</th>
<th style=\"text-align:center;font-size: 15;width:335px\"> Serial Number</th>
</ul>
</tr>";
$i=1;
while($i<=5){
echo"<tr>
<td><center> $i </center> </td>
<td><select name=\"tenvt$i\" style=\"border-style:none;width:100%;height:30px;\">
<option value=\"\"></option>
</select></td>
<td><input type=text name=\"sn$i\" style=\"border-style:none;width:100%;\"> </td>
</tr>";
$i++;
}
echo"</table>
<br/>";
/*
echo"<p style=\"margin-left:50px;\"> <strong>III. DANH MỤC VẬT TƯ</strong> <br/> <br/> </p>
<table class=\"table1\" style=\"margin-left:50px;width:800px;\">
<tr>
<th style=\"text-align:center;font-size: 15;width:30px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:120px;\"> Mã Vật Tư</th>
<th style=\"text-align:center;font-size: 15;width:120px;\"> Mô tả</th>
<th style=\"text-align:center;font-size: 15;width:90px;\"> P/N</th>
<th style=\"text-align:center;font-size: 15 ;width:60px;\"> ĐVT </th>
<th style=\"text-align:center;font-size: 15 ;width:70px;\"> Số lượng </th>
</ul>
</tr>";
$i=1;
while($i<=5){
echo"<tr>
<td><center> $i </center> </td>
<td><input type=text name=\"malinhkien$i\" style=\"border-style:none;width:100%;\"> </td>
<td><input type=text name=\"mota$i\" style=\"border-style:none;width:100%;\"> </td>
<td><input type=text name=\"pn$i\" style=\"border-style:none;width:100%;\"> </td>
<td><input type=text name=\"dvt$i\" style=\"border-style:none;width:100%;\"> </td>
<td><input type=text name=\"soluong$i\" style=\"border-style:none;width:100%;\"> </td>
</tr>";
$i++;
}
echo "</table> 
<br/>";
*/
echo "  <span style=\"margin-left:50px;\"> <strong>IV. NỘI DUNG CÔNG VIỆC : </strong> KT<input type=\"checkbox\" name=\"cv\" value=\"KT\">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\" > 
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BDDK<input type=\"checkbox\" name=\"cv\" value=\"BDDK\" ></span>
	     <br><br>";
echo"<table class=\"table7\" style=\"margin-left:50px;\">
		<tr>
		<td  style=\"text-align:left;color:black;font-size: 18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Mô tả chi tiết tình trạng của thiết bị, các hỏng hóc (nếu có) do nhân viên xưởng kiểm tra, phát hiện</b> </td>
		<td><input type=text name=\"ttktbefore\" style=\"border-style:none;width:100%;height:100px;\"> </td>
		</tr>
		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b> Hỏng hóc </b> </td>
		<td><input type=text name=\"honghoc\" style=\"border-style:none;width:100%;height:100px;\"> </td>
		</tr>
		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Mô tả công việc thực hiện hoặc cách khắc phục hỏng hóc</b></td>
		<td><input type=text name=\"khacphuc\" style=\"border-style:none;width:100%;height:100px;\"> </td>
		</tr>";
		echo"		<tr>
			<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Kiểm tra tình trạng kỹ thuật của thiết bị sau khi BD/SC</b></td>";
		echo"<td>";
echo "</td></tr>";
echo"		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Tình trạng kỹ thuật của thiết bị sau khi sửa chữa </b> </td>
		<td><select name=\"ttktafter\" style=\"border-style:none;width:100%;height:100px;\">
		<option value=\"\"></option>
		<option value=\"Đạt\">Đạt </option>
		<option value=\"Hỏng\">Hỏng (Không khắc phục được)</option>
		<option value=\"Chờ vật tư thay thế\">Chờ vật tư thay thế</option>
		<option value=\"Chưa kết luận\">Chưa kết luận</option>
		<option value=\"Đang sửa chữa\">Đang sửa chữa</option>
		<option value=\"TTKTDB\">TTKT Đặc biệt</option>
		</select>
		 </td>
		</tr>";
echo"<tr>
	<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Ghi chú tình trạng kỹ thuật</b></td>";
echo"<td><input type=text name=\"ghichufinal\" style=\"border-style:none;width:100%;height:100px;\"></td></tr>";
echo "</table> 
<br/>";

echo"

<input type=hidden name=username value=$username>
<input type=hidden name=password value=$password>
<input type=hidden name=hoso value=phieusuachua>
</form>";
/*echo"<p style=\"margin-left:50px;\"> <b> IV. BẢNG SỐ LIỆU CẦN THIẾT (nếu có)</b> </p> 
<p style=\"margin-left:50px;\"> 
&nbsp;<a href='javascript:void(0)' > Upload File</a>";
 */
echo"
</body>
</html> " ;
}

if(($hosomay!="")&&($chonthietbi=="")&&($addvt=="")&&($xuatphieu=="")&&($savefilesc==""))
{
$maql=isset($_POST['maql']) ? $_POST['maql'] : '';
$copy=isset($_POST['copy']) ? $_POST['copy'] : '';
	$sql = mysql_query("SELECT mavt,somay,model,ngayth FROM hososcbd_iso WHERE hoso ='$hosomay'") ;
	while($row = mysql_fetch_array($sql))
	{
	$mavt_new=$row['mavt'];
	$somay_new=$row['somay'];
	$model_new=$row['model'];
	$ngayth_new=$row['ngayth'];
	}
	$sql1 = mysql_query("SELECT hoso,ngayth,mavt FROM hososcbd_iso WHERE maql='$maql' and hoso !='$hosomay'") ;
	$kt=0;
	$hoso_old="";
while($row = mysql_fetch_array($sql1))
{

	$ngayth_old =$row['ngayth'];
	$mavt_old=$row['mavt'];
	if ($mavt_new==$mavt_old)
		if (($ngayth_old !="0000-00-00")&&($ngayth_new =="0000-00-00")) {
			$hoso_old =$row['hoso'];
			$kt=1;	
			break;
		} else continue;
        	
}
$hoso_new=$hosomay;
if (($kt==1)&&($copy==1)) $hosomay=$hoso_old;
	$tenthietbisql9 = mysql_query("SELECT * FROM hososcbd_iso WHERE maql='$maql' and hoso='$hosomay'") ;
while($row = mysql_fetch_array($tenthietbisql9))
{

	$ngayth =$row['ngayth'];	
	$ngaykt =$row['ngaykt'];
	$ttktbefore =$row['ttktbefore'];
	$khacphuc =$row['khacphuc'];
	$ghichu =$row['ghichu'];
	$honghoc =$row['honghoc'];
	$ttktafter =$row['ttktafter'];
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
	$ghichu=$row['ghichu'];
	$nhomsc=$row['nhomsc'];
	$mavattu=$row['mavt'];
	$somay=$row['somay'];
	$model=$row['model'];
	$fieu=$row['phieu'];
	$ngnhyeucau=$row['ngnhyeucau'];
	$cv=$row['cv'];

	$dong=$row['dong'];
	$noidung=$row['noidung'];
	$ketluan=$row['ketluan'];
    $ghichufinal=$row['ghichufinal'];
		$ngaystemp = $ngayth;
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	if ($ngaystemp[$i]=="/") {
		$datetype=0;
		break;
	}elseif ($ngaystemp[$i]=="-") {
		$datetype=1;
		break;
	}
}
if ($datetype==0) {
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	$p = stripos($ngaystemp,"/") ;

if ($i== 0) {
	$ngays = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 1) {
	$thangs = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 2) {
	$nams = trim ($ngaystemp) ;
} 	
$p++ ;
$ngaystemp = substr($ngaystemp,$p);
}
}else {
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	$p = stripos($ngaystemp,"-") ;

if ($i== 0) {
	$nams = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 1) {
	$thangs = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 2) {
	$ngays = trim ($ngaystemp) ;
} 	
$p++ ;
$ngaystemp = substr($ngaystemp,$p);
}
}
	$ngaystemp = $ngaykt;
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	if ($ngaystemp[$i]=="/") {
		$datetype=0;
		break;
	}elseif ($ngaystemp[$i]=="-") {
		$datetype=1;
		break;
	}
}
if ($datetype==0) {
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	$p = stripos($ngaystemp,"/") ;

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
}else {
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	$p = stripos($ngaystemp,"-") ;

if ($i== 0) {
	$namt = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 1) {
	$thangt = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 2) {
	$ngayt = trim ($ngaystemp) ;
} 	
$p++ ;
$ngaystemp = substr($ngaystemp,$p);
}
}
}
$check=0;
$tenthietbisql12 = mysql_query("SELECT mahoso FROM danhmucvattu_iso") ;
while($row = mysql_fetch_array($tenthietbisql12))
{
	$mahoso =$row['mahoso'];
	if($mahoso==$hosomay)	$check=1;
}
$tenthietbisql13 = mysql_query("SELECT mamay,homay,dienap FROM thietbi_iso where mavt='$mavt_new' and somay='$somay_new' and model='$model_new'") ;
while($row = mysql_fetch_array($tenthietbisql13))
{
	$mamay=$row['mamay'];
	$homay=$row['homay'];
	$dienap=$row['dienap'];
}

$curday = date("d/m/Y");
echo "
<html lang=\"vi\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
<SCRIPT LANGUAGE=\"JavaScript\" SRC=\"java/CalendarPopup.js\"></SCRIPT>
<SCRIPT LANGUAGE=\"JavaScript\">
var cal = new CalendarPopup();
</SCRIPT>
<script src=\"tinymce/tinymce.min.js\"></script>
<script type=\"text/javascript\">
tinymce.init({
selector: \"textarea\"   
}); 
</script>
</head>
<body>
<table style=\"width:100%\">
<tr>
<td >
<h2> <p style=\"text-align:center;color:blue;\"> PHIẾU THỰC HIỆN CÔNG VIỆC <br/></h2>
</p>
</td>
</tr>
</table>
<br/>
<form method=\"post\" action=\"formsc.php\" enctype=\"multipart/form-data\" name=\"example\">
<table class=\"table7\" style=\"margin-left:50px;\">
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFE4B5;\"> <strong>Mã quản lý</strong> </td>
<td>
<div class=\"content\">
<input name=\"maql\" type=\"text\" class=\"search\" id=\"searchid\" style=\"text-align:center;width:100%;background:#8adaa5;height:25px;\"
value=\"$maql\" />
<div id=\"result\"></div>
</div>
</td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#9966CC;\"> <strong>Mã thiết bị</strong> </td>
<td> <select name=\"hosomay\" onchange=\"this.form.submit()\" style=\"border-style:none;width:100%;height:30px;\">";
echo"<option value=\"$hoso_new\">$mamay</option>";
//$result2 = mysql_query("SELECT ghichufinal FROM hososcbd_iso WHERE mavt='$mavt' and somay='$somay' and model='$model'") ;
$result2 = mysql_query("SELECT ghichufinal FROM hososcbd_iso WHERE hoso='$edithoso'") ;
while($row = mysql_fetch_array($result2))
				{
					if($row['ghichufinal']!="")
					$ghichufinal =$row['ghichufinal'];
				}
                if ($phanquyen=="1")
		$tenthietbisql1 = mysql_query("SELECT DISTINCT mavt,somay,hoso,model FROM hososcbd_iso WHERE phieu='$fieu'") ;
		else
		$tenthietbisql1 = mysql_query("SELECT DISTINCT mavt,somay,hoso,model FROM hososcbd_iso WHERE phieu='$fieu' and ngaykt ='0000-00-00'") ;
		$ck=0;
		while($row = mysql_fetch_array($tenthietbisql1))
		{
			$mavt =$row['mavt'];	
			$somayt =$row['somay'];
			$hosom =$row['hoso'];
			$modelt =$row['model'];
			$sqlmodel = mysql_query("SELECT DISTINCT mamay FROM thietbi_iso WHERE mavt='$mavt' and somay='$somayt' and model='$modelt'") ;
			while($row = mysql_fetch_array($sqlmodel))
			{
			$mamay =$row['mamay'];
			}
			
			$ck=1;
			echo "<option value=\"$hosom\" style=\"background:#87CEEB;\"> $mamay </option>";
		}
		echo"</select> </td></tr>";
		if ($ck==0) {
		echo "<span style=\"text-align:center;color:red;font-size: 18;;padding-left:50px\">Chỉ có admin mới được sửa hồ sơ có ngày kết thúc</span>";
			exit;
		}
echo"<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Nhóm sửa chữa</strong> </td>
<td>
<select name=\"nhomsc\" style=\"border-style:none;width:100%;height:100%;text-align:center;\">
		<option value=\"$nhomsc\">$nhomsc</option>
		<option value=\"RDNGA\"> Nhóm RDNGA </option>
		<option value=\"CNC\"> Nhóm CNC</option>
</select>
</td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Số hồ sơ</strong> </td>";
	echo"<td> <input style=\"border-style:none;width:100%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"hosomaycu\" size=\"36\" type=\"text\" value=\"$hoso_new\" > </td>";
echo"</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Ngày BĐ</strong> </td>";

if($ngayth!="0000-00-00"){
echo"<td>
   <input style=\"border-style:none;width:95%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"ngayth\" size=\"36\" type=\"text\" value=\"$ngays/$thangs/$nams\" readonly> 
<A HREF=\"#\"
                onClick=\"cal.select(document.forms['example'].ngayth,'anchor1','dd/MM/yyyy'); return false;\"
		NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A> </p> 
</td>";
}else{
echo"<td><input style=\"border-style:none;width:95%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"ngayth\" size=\"36\" type=\"text\" value=\"$curday\">
<A HREF=\"#\"
                onClick=\"cal.select(document.forms['example'].ngayth,'anchor1','dd/MM/yyyy'); return false;\"
		NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A> </p>
</td>";
}
echo"</tr>";
echo"
</table>";

echo "<p style=\"margin-left:50px;\"> <strong>I. NGƯỜI THỰC HIỆN </strong> <br/> <br/> </p>
<table class=\"table1\" style=\"margin-left:50px;width:800px;\">

	<tr>
<th style=\"text-align:center;font-size: 15;width:60px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:400px;\"> Họ tên</th>
<th style=\"text-align:center;font-size: 15;\"> Giờ làm việc</th>
</ul>
</tr>";
for ($k=1;$k<=8;$k++) {
	$hoten[$k]="";
	$gio[$k]="";
}
$ngthsql = mysql_query("SELECT hoten,giolv FROM ngthuchien_iso WHERE mahoso='$hosomay' ORDER BY stt ASC") ;
$j=1;
while($row = mysql_fetch_array($ngthsql))
{
	$hoten[$j]=$row['hoten'];
	$gio[$j]=$row['giolv'];
	$j++;
}
$i=1;
$donvi="chuẩn chỉnh máy địa vật lý";
while($i<=8){
if ($gio[$i]==0) $gio[$i]="";
echo"<tr>
<td><center> $i </center> </td>
<td><select name=\"hoten$i\" style=\"border-style:none;width:100%;height:30px;\"\">
<option value=\"$hoten[$i]\">$hoten[$i]</option>
<option value=\"\"></option>";
		$hotensql10 = mysql_query("SELECT hoten FROM resume where donvi like'%$donvi%' and nghiviec !='yes'") ;
		while($row = mysql_fetch_array($hotensql10))
		{
			$hotennv =$row['hoten'];	
			echo "<option value=\"$hotennv\" style=\"background:#87CEEB;\"> $hotennv </option>";
		}
echo"</select></td>
<td><input type=text name=\"gio$i\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$gio[$i]\"> </td>
</tr>";
$i++;
}
echo"</table>";

echo "<p style=\"margin-left:50px;\"> <strong>II. CÁC THIẾT BỊ HỖ TRỢ </strong> <br/> <br/> </p>
<table class=\"table1\" style=\"margin-left:50px;width:800px;\">
<tr>
<th style=\"text-align:center;font-size: 15;width:60px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:405px;\"> Tên viết tắt</th>
<th style=\"text-align:center;font-size: 15;width:335px\"> Serial Number</th>
</ul>
</tr>";
$i=1;
while($i<=5){
echo"<tr>
<td><center> $i </center> </td>
<td><select name=\"thietbihotro$i\" style=\"border-style:none;width:100%;height:30px;\" onchange=\"this.form.submit()\">
<option value=\"$tbdosc[$i]\">$tbdosc[$i]</option>
<option value=\"\"></option>";
		$tenthietbisql10 = mysql_query("SELECT DISTINCT tenthietbi FROM thietbihotro_iso where thly='0'") ;
		while($row = mysql_fetch_array($tenthietbisql10))
		{
			$tentb =$row['tenthietbi'];	
			$tenthietbisql11 = mysql_query("SELECT chusohuu FROM thietbihotro_iso where tenthietbi='$tentb' and thly='0'") ;
			$sh="";
	         	while($row = mysql_fetch_array($tenthietbisql11))
			{
				$chusohuu=$row['chusohuu'];
				$ar=explode(" ",$chusohuu);
				$k=count($ar);
				if ($sh=="")
				$sh=$ar[$k-1];
				else 
					$sh=$sh.",".$ar[$k-1];
			}
			 
			echo "<option value=\"$tentb\" style=\"background:#87CEEB;\"> $tentb-$sh</option>";
		}
echo"</select></td>
<td><input type=text name=\"serialnumber$i\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$serialtbdosc[$i]\"> </td>
</tr>";
$i++;
}
echo "<tr>
		<th style=\"text-align:center;font-size: 15;width:40px;\"></th>
		<th style=\"text-align:center;font-size: 15;width:180px;\"><a href=\"danhmuchotro.php?&start=0&ad=&sort=&s=&f=&mte_a=new\" target=\"_blank\">Thêm thiết bị mới</a></th>
		<th style=\"text-align:center;font-size: 15;width:80px;\"></th>
		</tr></table></br>";
/*		
echo"
<p style=\"margin-left:50px;\"> <strong>III. DANH MỤC VẬT TƯ</strong> <br/> <br/> </p>
<table class=\"table1\" style=\"margin-left:50px;width:800px;\">
<tr>
<th style=\"text-align:center;font-size: 15;width:30px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:250px;\"> Mã Vật Tư</th>
<th style=\"text-align:center;font-size: 15;width:120px;\"> Mô tả</th>
<th style=\"text-align:center;font-size: 15;width:90px;\"> P/N</th>
<th style=\"text-align:center;font-size: 15 ;width:60px;\"> ĐVT </th>
<th style=\"text-align:center;font-size: 15 ;width:70px;\"> Số lượng </th>
<th style=\"text-align:center;font-size: 15 ;width:50px;\">xóa</th>
</ul>
</tr>";
$i=1;
if($check==1){
$tenthietbisql15 = mysql_query("SELECT * FROM danhmucvattu_iso WHERE mahoso='$hosomay'") ;
while($row = mysql_fetch_array($tenthietbisql15))
{
	$malinhkien1 = $row['mavattu'];
	$mota1 =$row['mota'];
	$pn1 =$row['serialnumber'];	
	$dvt1 =$row['dvt'];
	$soluong1 =$row['soluong'];	
	echo"<tr>
	<td><center> $i </center> </td>
	<td><select name=\"mlkien$i\">
	<option value=\"$malinhkien1\">$malinhkien1</option>
	";
$tenthietbisql10 = mysql_query("SELECT DISTINCT mavattu FROM danhmucvattu_iso") ;
		while($row = mysql_fetch_array($tenthietbisql10))
		{
			$malinhkien =$row['mavattu'];	
			echo "<option value=\"$malinhkien\" style=\"background:#87CEEB;\"> $malinhkien </option>";
		}	
		echo"</select></td>";
	echo"<td><input type=text name=\"mota$i\" style=\"border-style:none;width:100%;padding-left:10px;\" value=\"$mota1\"> </td>
	<td><input type=text name=\"pn$i\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$pn1\"> </td>
	<td><input type=text name=\"dvt$i\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$dvt1\"> </td>
	<td><input type=text name=\"soluong$i\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$soluong1\"> </td>
	<td> <center><input type=\"checkbox\" name=\"sl$i\" value=\"$malinhkien1\" > </center></td>
	</tr>";
	$i++;
}
}else{
	for($j=1;$j<=5;$j++){
	echo"<tr>
	<td><center> $j </center> </td>
	<td><select name=\"mlkien$j\">
	<option value=\"other\">Nhập mới</option>";
$tenthietbisql10 = mysql_query("SELECT DISTINCT mavattu FROM danhmucvattu_iso") ;
		while($row = mysql_fetch_array($tenthietbisql10))
		{
			$malinhkien =$row['mavattu'];	
			echo "<option value=\"$malinhkien\" style=\"background:#87CEEB;\"> $malinhkien </option>";
		}	
	echo"</select><input type=text name=\"malinhkien$j\" style=\"border-style:none;padding-left:5px;\"> </td>
	<td><input type=text name=\"mota$j\" style=\"border-style:none;width:100%;padding-left:10px;\"> </td>
	<td><input type=text name=\"pn$j\" style=\"border-style:none;width:100%;text-align:center;\" > </td>
	<td><input type=text name=\"dvt$j\" style=\"border-style:none;width:100%;text-align:center;\" > </td>
	<td><input type=text name=\"soluong$j\" style=\"border-style:none;width:100%;text-align:center;\"> </td>
	<td> <center><input type=\"checkbox\" name=\"sl$j\" value=\"$malinhkien\" > </center></td>
	</tr>";
}
}
echo"</table>
<ul id=\"mbbuttonaddebul_table\" class=\"mbbuttonaddebul_menulist\" style=\"width: 197px; height: 29px;margin-left:10px;\">
<a><input type=\"image\" name=\"addvt\"  value =\"themvt\" id=\"mbi_mbbuttonadd_1\" src=\"buttonadd_files/add.jpg\" name=\"mbi_mbbuttonadd_1\" 
style=\"vertical-align: bottom;\" border=\"0\" alt=\"Thêm\" title=\"\" onclick=\"this.form.addvt.value = this.value\" /></a>
</ul>
<script type=\"text/javascript\" src=\"buttonadd_files/mbjsmbbuttonadd.js\"></script>
<input type=hidden name=addvt value=\"\">";
*/
if ($cv=="KT")
echo "  <span style=\"margin-left:50px;\"> <strong>IV. NỘI DUNG CÔNG VIỆC : </strong> KT<input type=\"checkbox\" name=\"cv\" value=\"KT\" checked>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\" > 
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BDDK<input type=\"checkbox\" name=\"cv\" value=\"BDDK\" >
		 </span>
	     <br><br>";
elseif ($cv=="BD")
		echo "  <span style=\"margin-left:50px;\"> <strong>IV. NỘI DUNG CÔNG VIỆC : </strong> KT<input type=\"checkbox\" name=\"cv\" value=\"KT\">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\" checked > 
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BDDK<input type=\"checkbox\" name=\"cv\" value=\"BDDK\" >
		 </span>
	     <br><br>"; 
elseif ($cv=="SC")
		echo "  <span style=\"margin-left:50px;\"> <strong>IV. NỘI DUNG CÔNG VIỆC : </strong> KT<input type=\"checkbox\" name=\"cv\" value=\"KT\">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\"  > 
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\" checked>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BDDK<input type=\"checkbox\" name=\"cv\" value=\"BDDK\" >
		 </span>
		 <br><br>";
elseif ($cv=="BDDK")
		echo "  <span style=\"margin-left:50px;\"> <strong>IV. NỘI DUNG CÔNG VIỆC : </strong> KT<input type=\"checkbox\" name=\"cv\" value=\"KT\">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\"  > 
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BDDK<input type=\"checkbox\" name=\"cv\" value=\"BDDK\"  checked>
		 </span>
	     <br><br>"; 
else
echo "  <span style=\"margin-left:50px;\"> <strong>IV. NỘI DUNG CÔNG VIỆC : </strong> KT<input type=\"checkbox\" name=\"cv\" value=\"KT\">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\"  > 
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\" checked>
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BDDK<input type=\"checkbox\" name=\"cv\" value=\"BDDK\">
		 </span>
	     <br><br>"; 
		 
//echo "</table>";
echo"<table class=\"table7\" style=\"margin-left:50px;\">
<tr>
<td  style=\"text-align:left;color:black;font-size: 18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b> 
Mô tả chi tiết tình trạng của thiết bị, các hỏng hóc (nếu có) do nhân viên xưởng kiểm tra, phát hiện</b> </td>
<td><textarea rows='3' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"honghoc\"/>$honghoc</textarea> </td>
</tr>
<tr>
<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b> 
Mô tả công việc thực hiện hoặc cách khắc phục hỏng hóc</b></td>
<td><textarea rows='3' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"khacphuc\"/>$khacphuc</textarea> </td>
</tr>";
echo"
<tr>
<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Kiểm tra tình trạng kỹ thuật của thiết bị sau khi BD/SC</b></td>
		<td> 1.Tên máy : .....<span  style=\"color:blue;\">$mavattu</span>.....Số máy :.....<span  style=\"color:blue;\">$somay</span>.....</br> <span>2.Họ máy :<input type=text name=\"homay\" style=\"border-style:none;\" value=\"$homay\"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Model: <input type=text name=\"model\" style=\"border-style:none;\" value=\"$model\"></span></br><span>3.Điện áp nuôi :<input type=text name=\"dienap\" style=\"border-style:none;\" value=\"$dienap\">Dòng tiêu thụ: <input type=text name=\"dong\" style=\"border-style:none;\" value=\"$dong\"></span></br><span>4.Nội dung kiểm tra: <textarea rows='8' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"noidung\" />$noidung </textarea></span></a></span></br></br>";

echo " <b> 5. BẢNG SỐ LIỆU CẦN THIẾT (nếu có)</b>
<table class=\"table1\" style=\"margin-left:5px;width:470px;\">
<tr>
<th> Tên Tài Liệu </th>
<th> Link Tài Liệu </th>
</tr>";
//set all variable to null
for ($i=1;$i<=10;$i++) {
	$tentailieu[$i] ="";
	$linktailieu[$i] ="";
}
$check1=0;
$tenthietbisql22 = mysql_query("SELECT * FROM bangsolieu_iso ") ;
$j=1;
while($row = mysql_fetch_array($tenthietbisql22))
{
	$sohoso =$row['sohoso'];
	if($sohoso==$hosomay)	{
	$check1=1;
	$tentailieu[$j] =$row['tentailieu'];
	$linktailieu[$j] =$row['link'];
	$j++;
	}
}
if ($j>5) $jj=$j; else $jj=5;
for($i=1;$i<=$jj;$i++){
	$tentailieu_s[$i]=isset($_POST["tentailieu$i"]) ? $_POST["tentailieu$i"] : '';
if($check1==0) {
	echo"<tr><td> <input type=text id=\"tentl\" name=\"tentailieu$i\" style=\"border-style:none;width:100%;padding-left:10px;\" 
	value=\"$tentailieu_s[$i]\"></td>";
	echo"<td><input type=\"file\" id=\"file\" name=\"files[]\" multiple=\"multiple\"/></td></tr>";
}else{
	if ($linktailieu[$i]!=""){
	echo"<tr><td> <input type=text id=\"tentl\" name=\"tentailieu$i\" style=\"border-style:none;width:100%;padding-left:10px;\" 
	value=\"$tentailieu[$i]\"></td>";
	echo"<td><a href=\"./hoso/$sohoso/$linktailieu[$i]\">linkdown</a> <span  style=\"padding-left:130px\" ><a href='xoafile.php?f=$linktailieu[$i]&s=$sohoso' TARGET=\"_blank\" title='Delete' >Delete</a></span></td></tr>";
	}else{ 
	echo"<tr><td> <input type=text id=\"tentl\" name=\"tentailieu$i\" style=\"border-style:none;width:100%;padding-left:10px;\" 
	value=\"$tentailieu_s[$i]\"></td>";
	echo"<td><input type=\"file\" id=\"file\" name=\"files[]\" multiple=\"multiple\" /></td></tr>";
	}
}
}
echo "</table><br/>";
echo"<span>6.Kết luận: <textarea rows='2' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"ketluan\" />$ketluan</textarea></span>";
echo "</td></tr>";
echo"		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Tình trạng kỹ thuật của thiết bị sau khi sửa chữa </b> </td>
		<td><select name=\"ttktafter\" style=\"border-style:none;width:100%;height:100px;\">
		<option value=\"$ttktafter\"> $ttktafter</option>
		<option value=\"Đạt\">Đạt </option>
		<option value=\"Hỏng\">Hỏng (Không khắc phục được)</option>
		<option value=\"Chờ vật tư thay thế\">Chờ vật tư thay thế</option>
		<option value=\"Chưa kết luận\">Chưa kết luận</option>
		<option value=\"Đang sửa chữa\">Đang sửa chữa</option>
		<option value=\"TTKTDB\">TTKT Đặc biệt</option>
		</select>
		 </td>
		</tr>";
echo"<tr>
	<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Ghi chú tình trạng kỹ thuật</b></td>";
echo"<td><span><textarea rows='2' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"ghichufinal\" />$ghichufinal</textarea></span></td></tr>";
echo"
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Ngày Kết thúc </strong></td>";
if($ngaykt!="0000-00-00"){
echo"<td> <input style=\"border-style:none;width:95%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"ngaykt\" size=\"36\" type=\"text\" value=\"$ngayt/$thangt/$namt\"> 
<A HREF=\"#\"
                onClick=\"cal.select(document.forms['example'].ngaykt,'anchor1','dd/MM/yyyy'); return false;\"
		NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A> </p>
</td>";
}else{
echo"<td> <input style=\"border-style:none;width:95%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"ngaykt\" size=\"36\" 
		type=\"text\" readonly> 
<A HREF=\"#\"
                onClick=\"cal.select(document.forms['example'].ngaykt,'anchor1','dd/MM/yyyy'); return false;\"
		NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A> </p>
</td>";
}
echo"</tr>";
/*echo "<tr>
<td style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b> 
Khuyến nghị </b></td>
<td><input type=text name=\"ghichu\" style=\"border-style:none;width:100%;height:100px;padding-left:10px;\" value=\"$ghichu\"> </td>
</tr>";
 */
echo "</table> 
<br/>";

echo"   <table><tr><td><input style=\"margin-left:380px;\"/ type=\"image\" name=\"xuatphieu\" value =\"phieukiemtra\" src=\"upload/xuatsc.jpg\" alt=\"Nhap\" 
	onclick=\"this.form.xuatphieu.value = this.value\"/></td></tr>
	</table>
	<input type=hidden name=xuatphieu value=\"\">
	<input type=hidden name=maql value=\"$maql\">
	<input type=hidden name=username value=$username>
	<input type=hidden name=password value=$password>
	<input type=hidden name=hoso value=phieusuachua>
	<input type=hidden name=chonthietbi value=yes>

</form>
</body>
</html>";
}

if($xuatphieu=="phieukiemtra")
{

$hosomay=isset($_POST['hosomay']) ? $_POST['hosomay'] : '';
$ngayth=isset($_POST['ngayth']) ? $_POST['ngayth'] : '';
$ngaykt=isset($_POST['ngaykt']) ? $_POST['ngaykt'] : '';
$yeucau=isset($_POST['yeucau']) ? $_POST['yeucau'] : '';
$ttktbefore=isset($_POST['ttktbefore']) ? $_POST['ttktbefore'] : '';
$khacphuc=isset($_POST['khacphuc']) ? $_POST['khacphuc'] : '';
$ttktafter=isset($_POST['ttktafter']) ? $_POST['ttktafter'] : '';
$honghoc=isset($_POST['honghoc']) ? $_POST['honghoc'] : '';
$ghichu=isset($_POST['ghichu']) ? $_POST['ghichu'] : '';
$nhomsc=isset($_POST['nhomsc']) ? $_POST['nhomsc'] : '';
$maql=isset($_POST['maql']) ? $_POST['maql'] : '';

$cv=isset($_POST['cv']) ? $_POST['cv'] : '';
$dong=isset($_POST['dong']) ? $_POST['dong'] : '';
$noidung=isset($_POST['noidung']) ? $_POST['noidung'] : '';
$ketluan=isset($_POST['ketluan']) ? $_POST['ketluan'] : '';
$ghichufinal=isset($_POST['ghichufinal']) ? $_POST['ghichufinal'] : '';


$tenthietbisql10 = mysql_query("SELECT max(stt) as stt FROM danhmucvattu_iso") ;
while($row = mysql_fetch_array($tenthietbisql10))
{
	$recc =$row['stt'];
}
$recc++;
for($i=1;$i<=5;$i++){
$thietbihotro[$i]=isset($_POST["thietbihotro$i"]) ? $_POST["thietbihotro$i"] : '';
$serialnumber[$i]=isset($_POST["serialnumber$i"]) ? $_POST["serialnumber$i"] : '';
}

$cm = date("m");
$cm=$cm-0;
for($i=1;$i<=8;$i++){
	$hoten[$i]=isset($_POST["hoten$i"]) ? $_POST["hoten$i"] : '';
	$gio[$i]=isset($_POST["gio$i"]) ? $_POST["gio$i"] : '';
	
}

$ngaystemp = $ngayth;
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	if ($ngaystemp[$i]=="/") {
		$datetype=0;
		break;
	}elseif ($ngaystemp[$i]=="-") {
		$datetype=1;
		break;
	}
}
if ($datetype==0) {
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	$p = stripos($ngaystemp,"/") ;

if ($i== 0) {
	$ngays = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 1) {
	$thangs = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 2) {
	$nams = trim ($ngaystemp) ;
} 	
$p++ ;
$ngaystemp = substr($ngaystemp,$p);
}
}else {
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	$p = stripos($ngaystemp,"-") ;

if ($i== 0) {
	$nams = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 1) {
	$thangs = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 2) {
	$ngays = trim ($ngaystemp) ;
} 	
$p++ ;
$ngaystemp = substr($ngaystemp,$p);
}
}
if ($ngaykt=="") $ngaykt="0000-00-00";
	$ngaystemp = $ngaykt;
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	if ($ngaystemp[$i]=="/") {
		$datetype=0;
		break;
	}elseif ($ngaystemp[$i]=="-") {
		$datetype=1;
		break;
	}
}
if ($datetype==0) {
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	$p = stripos($ngaystemp,"/") ;

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
}else {
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	$p = stripos($ngaystemp,"-") ;

if ($i== 0) {
	$namt = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 1) {
	$thangt = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 2) {
	$ngayt = trim ($ngaystemp) ;
} 	
$p++ ;
$ngaystemp = substr($ngaystemp,$p);
}
}
$tenthietbisql10 = mysql_query("SELECT somay,mavt,model FROM hososcbd_iso WHERE maql='$maql' and hoso='$hosomay'") ;
while($row = mysql_fetch_array($tenthietbisql10))
{
	$somay =$row['somay'];
	$mavt =$row['mavt'];
	$model =$row['model'];
}
$tenthietbisql13 = mysql_query("SELECT mamay,homay,dienap FROM thietbi_iso where mavt='$mavt' and somay='$somay' and model='$model'") ;
while($row = mysql_fetch_array($tenthietbisql13))
{
	$homay=$row['homay'];
	$mamay=$row['mamay'];
	$dienap=$row['dienap'];
}
// cap nhat thong tin phieu kiem tra sua chua
$in_sql="SELECT `bdtime` FROM `thietbi_iso` where mavt='$mavt' and somay='$somay' and model='$model'";
	$in_result=mysql_query($in_sql);
	while($row = mysql_fetch_array($in_result))
	{
		 $bdtime =$row['bdtime'];

	}
$yc_sql="SELECT `ngayyc` FROM `hososcbd_iso` WHERE maql='$maql' and hoso='$hosomay'";
	$in_result=mysql_query($yc_sql);
	while($row = mysql_fetch_array($in_result))
	{
		 $ngayyc =$row['ngayyc'];

	}	
	$ngaykt="$ngayt-$thangt-$namt";
	$ngayth= "$ngays-$thangs-$nams";
	if ($ngaykt !="00-00-0000") {
	if ( strtotime($ngaykt)< strtotime($ngayth)) {
		echo"Nhập ngày không phù hợp:</br>
			Ngày kết thúc:   $ngaykt </br>
			Ngày thực hiện: $ngayth";
	exit;
	}
	}
	$ngayyc=date('d-m-Y',strtotime($ngayyc));
	if ( strtotime($ngayth)< strtotime($ngayyc)) {
		echo"Nhập ngày không phù hợp:</br>
			Ngày yêu cầu:   $ngayyc </br>
			Ngày thực hiện: $ngayth";
	exit;
	}
$ngaybdtt = strtotime(date('d-m-Y', strtotime($ngaykt)) . " +$bdtime month");
$ngaybdtt = strftime('%d-%m-%Y',$ngaybdtt);
$ngaybdtt=date("Y-m-d",strtotime($ngaybdtt));
$curdate=date("Y-m-d H:i:s");
$ip_address= $_SERVER['REMOTE_ADDR'];
	// luu lai dau vet khi tac dong den CSDL
$r3="SELECT max(stt) as tt FROM lichsudn_iso";
$result=mysqli_query($con,$r3);
if(mysqli_num_rows($result)>0){
$r3=mysql_query("SELECT max(stt) as tt FROM lichsudn_iso");
while($row = mysql_fetch_array($r3))
{
	$tt =$row['tt'];
}
}else $tt=0;
$tt++;
//$madv="XDT";
$r4=mysql_query("SELECT madv  FROM users where username='$username'");
while($row = mysql_fetch_array($r4))
{
	$madv =$row['madv'];
}
$insert = "insert into lichsudn_iso(
stt,
username,
madv,
nhom,
curdate,
ip_address,
maql
) values (
'$tt',
'$username',
'$madv',
'$nhomsc',
'$curdate',
'$ip_address',
'$maql'
)" ;
mysql_query($insert) or die(mysql_error());
$update = "update hososcbd_iso SET  
ngayth= '$nams-$thangs-$ngays',
ngaykt= '$namt-$thangt-$ngayt',
hoso='$hosomay',
cv='$cv',
solg='1',
khacphuc='$khacphuc',
ttktafter='$ttktafter',
honghoc='$honghoc',
ghichu='$ghichu',
tbdosc='$thietbihotro[1]',
serialtbdosc='$serialnumber[1]',
tbdosc1='$thietbihotro[2]',
serialtbdosc1='$serialnumber[2]',
tbdosc2='$thietbihotro[3]',
serialtbdosc2='$serialnumber[3]',
tbdosc3='$thietbihotro[4]',
serialtbdosc3='$serialnumber[4]',
tbdosc4='$thietbihotro[5]',
serialtbdosc4='$serialnumber[5]',
nhomsc='$nhomsc',
dong='$dong',
noidung='$noidung',
ketluan='$ketluan',
ghichufinal='$ghichufinal',
ngaybdtt='$ngaybdtt'
WHERE maql='$maql' and hoso='$hosomay'" ;
mysql_query($update) or die(mysql_error());

// Xử lý cập nhật kế hoạch BDDK khi checkbox BDDK được chọn
if($cv == 'BDDK') {
	// Lấy thietbi_id từ bảng thietbi_iso
	$thietbi_id_query = mysql_query("SELECT stt FROM thietbi_iso WHERE mavt='$mavt' AND somay='$somay' AND model='$model'");
	if($thietbi_row = mysql_fetch_array($thietbi_id_query)) {
		$thietbi_id_bddk = $thietbi_row['stt'];
		
		// Xác định quý dựa trên tháng
		$thang_bd = (int)$thangs;
		$nam_bd = (int)$nams;
		$quy = ceil($thang_bd / 3); // Quý 1: 1-3, Quý 2: 4-6, Quý 3: 7-9, Quý 4: 10-12
		
		// Kiểm tra xem đã có kế hoạch cho năm này chưa
		$check_bddk = mysql_query("SELECT id FROM ke_hoach_bao_duong_dinh_ky_iso WHERE thietbi_id='$thietbi_id_bddk' AND nam='$nam_bd'");
		
		// Xác định trạng thái hoàn thành (nếu có ngày kết thúc)
		$hoantat = ($ngaykt != "0000-00-00" && $ngaykt != "00-00-0000") ? 1 : 0;
		
		if(mysql_num_rows($check_bddk) > 0) {
			// Đã có kế hoạch, UPDATE
			$bddk_row = mysql_fetch_array($check_bddk);
			$bddk_id = $bddk_row['id'];
			
			$update_bddk = "UPDATE ke_hoach_bao_duong_dinh_ky_iso SET 
				qui_$quy = 'TO',
				qui_{$quy}_hoantat = '$hoantat',
				nhomsc = '$nhomsc',
				updated_at = NOW()
				WHERE id = '$bddk_id'";
			mysql_query($update_bddk) or die(mysql_error());
		} else {
			// Chưa có kế hoạch, INSERT mới
			// Lấy tên thiết bị và số serial
			$tb_info = mysql_query("SELECT tenvt FROM thietbi_iso WHERE stt='$thietbi_id_bddk'");
			$ten_tb = "";
			if($tb_row = mysql_fetch_array($tb_info)) {
				$ten_tb = $tb_row['tenvt'];
			}
			
			$insert_bddk = "INSERT INTO ke_hoach_bao_duong_dinh_ky_iso (
				thietbi_id,
				nam,
				ten_thietbi,
				so_serial,
				qui_1,
				qui_2,
				qui_3,
				qui_4,
				qui_1_hoantat,
				qui_2_hoantat,
				qui_3_hoantat,
				qui_4_hoantat,
				nhomsc,
				created_by,
				created_at,
				updated_at
			) VALUES (
				'$thietbi_id_bddk',
				'$nam_bd',
				'$ten_tb',
				'$somay',
				".($quy == 1 ? "'TO'" : "NULL").",
				".($quy == 2 ? "'TO'" : "NULL").",
				".($quy == 3 ? "'TO'" : "NULL").",
				".($quy == 4 ? "'TO'" : "NULL").",
				".($quy == 1 ? "'$hoantat'" : "0").",
				".($quy == 2 ? "'$hoantat'" : "0").",
				".($quy == 3 ? "'$hoantat'" : "0").",
				".($quy == 4 ? "'$hoantat'" : "0").",
				'$nhomsc',
				'$username',
				NOW(),
				NOW()
			)";
			mysql_query($insert_bddk) or die(mysql_error());
		}
	}
}

$check=0;
$i=0;
$tenthietbisql12 = mysql_query("SELECT mahoso FROM danhmucvattu_iso") ;
while($row = mysql_fetch_array($tenthietbisql12))
{
	$mahoso =$row['mahoso'];
	if($mahoso==$hosomay)	{
		$check=1;
		break;
	}
}
for($i=1;$i<=20;$i++){
	$mlkien[$i]=isset($_POST["mlkien$i"]) ? $_POST["mlkien$i"] : '';
	$malinhkien[$i]=isset($_POST["malinhkien$i"]) ? $_POST["malinhkien$i"] : '';
	if ($mlkien[$i]!="other") $malinhkien[$i]=$mlkien[$i];
	$mota[$i]=isset($_POST["mota$i"]) ? $_POST["mota$i"] : '';
	$pn[$i]=isset($_POST["pn$i"]) ? $_POST["pn$i"] : '';
	$dvt[$i]=isset($_POST["dvt$i"]) ? $_POST["dvt$i"] : '';
	$soluong[$i]=isset($_POST["soluong$i"]) ? $_POST["soluong$i"] : '';
	if ($soluong[$i]=="") $soluong[$i]=1;
	$sl[$i]=isset($_POST["sl$i"]) ? $_POST["sl$i"] : '';
	if(($malinhkien[$i]=="")&&($mota[$i]!="")) $malinhkien[$i]="XDT$hosomay-$i";
	if(($mota[$i]!="")&&($check==0)){
		$insert = "insert into danhmucvattu_iso(
		stt,
		mahoso,
		mamay,
		somay,
		mavattu,
		mota,
		serialnumber,
		dvt,
		soluong,
		ngayth
		) values (
		'$recc',
		'$hosomay',
		'$mavt',
		'$somay',
		'$malinhkien[$i]',
		'$mota[$i]',
		'$pn[$i]',
		'$dvt[$i]',
		'$soluong[$i]',
		'$nams-$thangs-$ngays'
		)" ;
		mysql_query($insert) or die(mysql_error());
		$recc++;
	}
	if ($check==1) {
		$tenthietbisql12 = mysql_query("SELECT mavattu FROM danhmucvattu_iso where mahoso='$hosomay'") ;
		$checkvt=0;
		while($row = mysql_fetch_array($tenthietbisql12))
		{
			$mavattu =$row['mavattu'];
			if($mavattu==$malinhkien[$i]){
				$checkvt=1;
				break;
			}
		}
		if($checkvt==1) {
			$update1 = "update danhmucvattu_iso SET 
			mavattu= '$malinhkien[$i]', 
			mota= '$mota[$i]',
			serialnumber= '$pn[$i]',
			dvt='$dvt[$i]',
			soluong='$soluong[$i]',
			ngayth='$nams-$thangs-$ngays'
			WHERE mahoso='$hosomay' and mavattu='$mavattu'" ;
			mysql_query($update1) or die(mysql_error());
		}else{
			if($mota[$i]!="") {
			$insert = "insert into danhmucvattu_iso(
			stt,
			mahoso,
			mamay,
			somay,
			mavattu,
			mota,
			serialnumber,
			dvt,
			soluong,
			ngayth
			) values (
			'$recc',
			'$hosomay',
			'$mavt',
			'$somay',
			'$malinhkien[$i]',
			'$mota[$i]',
			'$pn[$i]',
			'$dvt[$i]',
			'$soluong[$i]',
			'$nams-$thangs-$ngays'
			)" ;
			mysql_query($insert) or die(mysql_error());
			$recc++;
			}
		}

	}
	
	if ($sl[$i]!="") {
	//	echo "$sl[$i] $hosomay</br>";
		
		$delete = " DELETE FROM danhmucvattu_iso WHERE mahoso = '$hosomay' and mavattu='$sl[$i]'" ;
		$result = mysql_query("$delete") or die(mysql_error());
	}	
}
/// end danhmucvattu
$r5=mysql_query("SELECT max(stt) as ttt FROM ngthuchien_iso");
while($row = mysql_fetch_array($r5))
{
	$ttt =$row['ttt'];
}
$ttt++;
$check=0;
$tenthietbisql12 = mysql_query("SELECT mahoso FROM ngthuchien_iso") ;
while($row = mysql_fetch_array($tenthietbisql12))
{
	$mahoso =$row['mahoso'];
	if($mahoso==$hosomay)	{
		$check=1;
		break;
	}
}
	for($i=1;$i<=8;$i++){
	if(($hoten[$i]!="")&&($check==0)){
		$insert = "insert into ngthuchien_iso(
		stt,
		mahoso,
		mamay,
		somay,
		hoten,
		giolv,
		ngayth,
		ngaykt,
	
		giolv$cm
		) values (
		'$ttt',
		'$hosomay',
		'$mavt',
		'$somay',
		'$hoten[$i]',
		'$gio[$i]',
		'$nams-$thangs-$ngays',
		'$namt-$thangt-$ngayt',
              
                '$gio[$i]' 
		)" ;
		mysql_query($insert) or die(mysql_error());
		$ttt++;
	}
	}
	if ($check==1) {
		$r9=mysql_query("SELECT stt  FROM ngthuchien_iso where mahoso='$hosomay' ORDER BY stt ASC");
		$j=1;
		while($row = mysql_fetch_array($r9))
		{
			$stt =$row['stt'];
			if ($hoten[$j]!="") {
			$update2 = "update ngthuchien_iso SET 
			hoten= '$hoten[$j]', 
			giolv= '$gio[$j]',
			mamay= '$mavt',
			somay= '$somay',
			ngayth='$nams-$thangs-$ngays',
			ngaykt='$namt-$thangt-$ngayt',
			
			giolv$cm='$gio[$j]'
			
			WHERE mahoso='$hosomay' and stt='$stt'" ;
			mysql_query($update2) or die(mysql_error());
			}else {
			$delete = " DELETE FROM ngthuchien_iso WHERE mahoso = '$hosomay' and stt='$stt'" ;
			$result = mysql_query("$delete") or die(mysql_error());
			}
			$j++;
		}
		for ($i=$j;$i<=8;$i++) {
			//Them moi ten
			if($hoten[$i]!="") {
			$insert = "insert into ngthuchien_iso(
			stt,
			mahoso,
			mamay,
			somay,
			hoten,
			giolv,
			ngayth,
			ngaykt,
		
			giolv$cm
			) values (
			'$ttt',
			'$hosomay',
			'$mavt',
			'$somay',
			'$hoten[$i]',
			'$gio[$i]',
			'$nams-$thangs-$ngays',
			'$namt-$thangt-$ngayt',
		
                        '$gio[$i]' 
			)" ;
			mysql_query($insert) or die(mysql_error());
			$ttt++;
			}
		}
	}
$tenthietbisql12 = mysql_query("SELECT stt FROM bangsolieu_iso where sohoso='$hosomay'") ;
for ($i=1;$i<10;$i++) {
	$tentailieu[$i]=isset($_POST["tentailieu$i"]) ? $_POST["tentailieu$i"] : '';
}
$num=1;
while($row = mysql_fetch_array($tenthietbisql12))
{
	$stt =$row['stt'];
	$update2 = "update bangsolieu_iso SET 
	tentailieu='$tentailieu[$num]'
	WHERE sohoso='$hosomay' and stt='$stt'" ;
	mysql_query($update2) or die(mysql_error());
	$num++;
}
$num=$num-1;
$max_file_size = 1024*1000*10; //10M
$i=1;
//if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
if(!empty($_FILES['files']['name'])){
	// Loop $_FILES to exeicute all files
	foreach ($_FILES['files']['name'] as $f => $name) {     
	    if ($_FILES['files']['error'][$f] == 4) {
	        continue; // Skip file if any error found
	    }	       
	    if ($_FILES['files']['error'][$f] == 0) {	           
	        if ($_FILES['files']['size'][$f] > $max_file_size) {
	            $message[] = "$name is too large!.";
	            continue; // Skip large files
		}
		else{ // No error found! Move uploaded files
			if (!file_exists("hoso/$hosomay/")) mkdir("hoso/$hosomay/");
		        $path= "hoso/$hosomay/";  	
			$target_file = $path.$name;
			if (file_exists($target_file)) {
				echo "File Upload Da Ton Tai:$name <br />";
				continue;
			}else{	
	            if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$name))
				$maxstt = mysql_query("SELECT max(stt) as tt FROM bangsolieu_iso ") ;
				while($row = mysql_fetch_array($maxstt))
				{
					$tt =$row['tt'];
				}
				$tt++;
				$j=$num+$i;
				$insert1 = " insert into bangsolieu_iso(stt,tentailieu,link,sohoso) values ('$tt','$tentailieu[$j]','$name','$hosomay')";
				mysql_query($insert1) or die(mysql_error());
	        }
	        }
	    }
	    $i++;
	}
}
if ($model=="") $mamay=$mavt;else $mamay="$mavt-$model";
if ($ngaykt=="00-00-0000") $ngayktt=""; else $ngayktt=$ngaykt;
echo "
<html lang=\"vi\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
<script src=\"tinymce/tinymce.min.js\"></script>
<script type=\"text/javascript\">
tinymce.init({
selector: \"textarea\"   
}); 
</script>
</head>
<body>
<form action=\"formsc.php\" method=\"post\">
<table style=\"margin-left:250px;\">
<tr>
<td style=\"width:30%;\">
XN Địa Vật Lý GK <br/>
X&#432;&#7903;ng
SCTB&#272;VL
</td>
<td>
<h2> PHIẾU THỰC HIỆN CÔNG VIỆC  </h2>
<p style=\"text-align:center;\"> Số hồ sơ:<b>$hosomay</b>&nbsp;&nbsp;&nbsp;&nbsp;Ngày Bắt đầu:<b>$ngayth</b>&nbsp;&nbsp;&nbsp;Ngày Kết thúc:<b>$ngayktt</b> </p> </td>
</tr>
</table>
<br/>
<table style=\"margin-left:250px;\">
<tr>
<td style=\"width:600px;\">1. Tên thiết bị :&nbsp;&nbsp;&nbsp;&nbsp; <b> $mamay</b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Số : <b> $somay </b> </td>
</tr>
</table>";
echo"<table style=\"margin-left:250px;\"><tr>
<td> <b>2. Người thực hiện </b></td>
</tr>
<tr>
<td> <table class=\"table7\" ; align=\"center\">
<tr>
<th style=\"text-align:center;font-size: 15;width:30px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:140px;\"> Họ Tên</th>
<th style=\"text-align:center;font-size: 15;width:80px;\"> Giờ làm vuệc </th>
</tr>";
$i=1;
while($i<=8){
	if($hoten[$i]!=""){
		echo"<tr>
		<td style=\"text-align:center;\"> $i </td>
		<td style=\"padding-left:20px;\"> $hoten[$i] </td>
		<td style=\"text-align:center;\"> $gio[$i] </td>
		</tr>";
	}
	$i++;
}
echo"</table></td>
</tr> </table>";
echo"<table style=\"margin-left:250px;\"><tr>
<td> <b>3. Các thiết bị hỗ trợ : </b></td>
</tr>
<tr>
<td> <table class=\"table7\" ;align=\"center\">
<tr>
<th style=\"text-align:center;font-size: 15;width:30px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:140px;\"> Tên thiết bị</th>
<th style=\"text-align:center;font-size: 15;width:80px;\"> Serial Number </th>
</tr>";
$i=1;
while($i<=5){
	if($thietbihotro[$i]!=""){
		echo"<tr>
		<td style=\"text-align:center;\"> $i </td>
		<td style=\"padding-left:20px;\"> $thietbihotro[$i] </td>
		<td style=\"text-align:center;\"> $serialnumber[$i] </td>
		</tr>";
	}
	$i++;
}
echo"</table></td>
	</tr> </table></br>";
echo"<table  align=\"center\" style=\"margin-left:250px;\"><tr><td>";
if ($cv=="KT")
echo "  <span > <strong>4. Nội dung công việc : </strong> KT<input type=\"checkbox\" name=\"cv\" value=\"KT\" checked>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\" > 
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\" >
		 </span>
	     <br><br>";
elseif ($cv=="BD")
		echo "  <span > <strong>4. Nội dung công việc : </strong> KT<input type=\"checkbox\" name=\"cv\" value=\"KT\">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\" checked > 
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\" >
		 </span>
	     <br><br>"; 
elseif ($cv=="SC")
		echo "  <span > <strong>4. Nội dung công việc : </strong> KT<input type=\"checkbox\" name=\"cv\" value=\"KT\">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\"  > 
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\" checked>
		 </span>
	     <br><br>"; 
else
echo "  <span > <strong>4. Nội dung công việc : </strong> KT<input type=\"checkbox\" name=\"cv\" value=\"KT\">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\"  > 
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\" checked>
		 </span>
	     <br><br>"; 
echo"</td></tr></table>";

echo"<table class=\"table7\" style=\"margin-left:250px;\">
<tr>
<td  style=\"text-align:left;color:black;font-size: 18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b> 
Mô tả chi tiết tình trạng của thiết bị, các hỏng hóc (nếu có) do nhân viên xưởng kiểm tra, phát hiện</b> </td>
<td><textarea rows='3' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"honghoc\"/>$honghoc</textarea> </td>
</tr>
<tr>
<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b> 
Mô tả công việc thực hiện hoặc cách khắc phục hỏng hóc</b></td>
<td><textarea rows='3' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"khacphuc\"/>$khacphuc</textarea> </td>
</tr>";
echo"
<tr>
<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Kiểm tra tình trạng kỹ thuật của thiết bị sau khi BD/SC</b></td>
		<td> 1.Tên máy : .....<span  style=\"color:blue;\">$mavt</span>.....Số máy :.....<span  style=\"color:blue;\">$somay</span>.....</br> <span>2.Họ máy :<input type=text name=\"homay\" style=\"border-style:none;\" value=\"$homay\"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Model: <input type=text name=\"model\" style=\"border-style:none;\" value=\"$model\"></span></br><span>3.Điện áp nuôi :<input type=text name=\"dienap\" style=\"border-style:none;\" value=\"$dienap\">Dòng tiêu thụ: <input type=text name=\"dong\" style=\"border-style:none;\" value=\"$dong\"></span></br><span>4.Nội dung kiểm tra: <textarea rows='8' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"noidung\" />$noidung </textarea></span></span></br></br>";

echo " <b> 5. BẢNG SỐ LIỆU CẦN THIẾT (nếu có)</b>
<table class=\"table1\" style=\"margin-left:5px;width:470px;\">
<tr>
<th> Tên Tài Liệu </th>
<th> Link Tài Liệu </th>
</tr>";
//set all variable to null
for ($i=1;$i<=10;$i++) {
	$tentailieu[$i] ="";
	$linktailieu[$i] ="";
}
$check1=0;
$tenthietbisql22 = mysql_query("SELECT * FROM bangsolieu_iso ") ;
$j=1;
while($row = mysql_fetch_array($tenthietbisql22))
{
	$sohoso =$row['sohoso'];
	if($sohoso==$hosomay)	{
	$check1=1;
	$tentailieu[$j] =$row['tentailieu'];
	$linktailieu[$j] =$row['link'];
	$j++;
	}
}
if ($j>5) $jj=$j; else $jj=5;
for($i=1;$i<=$jj;$i++){
	$tentailieu_s[$i]=isset($_POST["tentailieu$i"]) ? $_POST["tentailieu$i"] : '';
if($check1==0) {
	echo"<tr><td> <input type=text id=\"tentl\" name=\"tentailieu$i\" style=\"border-style:none;width:100%;padding-left:10px;\" 
	value=\"$tentailieu_s[$i]\"></td>";
	echo"<td><input type=\"file\" id=\"file\" name=\"files[]\" multiple=\"multiple\"/></td></tr>";
}else{
	if ($linktailieu[$i]!=""){
	echo"<tr><td> <input type=text id=\"tentl\" name=\"tentailieu$i\" style=\"border-style:none;width:100%;padding-left:10px;\" 
	value=\"$tentailieu[$i]\"></td>";
	echo"<td><a href=\"./hoso/$sohoso/$linktailieu[$i]\">linkdown</a></td></tr>";
	}else{ 
	echo"<tr><td> <input type=text id=\"tentl\" name=\"tentailieu$i\" style=\"border-style:none;width:100%;padding-left:10px;\" 
	value=\"$tentailieu_s[$i]\"></td>";
	echo"<td><input type=\"file\" id=\"file\" name=\"files[]\" multiple=\"multiple\" /></td></tr>";
	}
}
}
echo "</table><br/>";
echo"<span>6.Kết luận: <textarea rows='2' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"ketluan\" />$ketluan</textarea></span>";
echo "</td></tr>";
echo"		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Tình trạng kỹ thuật của thiết bị sau khi sửa chữa </b> </td>
		<td><select name=\"ttktafter\" style=\"border-style:none;width:100%;height:100px;\">
		<option value=\"$ttktafter\"> $ttktafter</option>
		<option value=\"Đạt\">Đạt </option>
		<option value=\"Hỏng\">Hỏng (Không khắc phục được)</option>
		<option value=\"Chờ vật tư thay thế\">Chờ vật tư thay thế</option>
		<option value=\"Chưa kết luận\">Chưa kết luận</option>
		<option value=\"Đang sửa chữa\">Đang sửa chữa</option>
		<option value=\"TTKTDB\">TTKT Đặc biệt</option>
		</select>
		 </td>
		</tr>";
echo"<tr>
	<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Ghi chú tình trạng kỹ thuật</b></td>";
echo"<td><span><textarea rows='2' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"ghichufinal\" />$ghichufinal</textarea></span></td></tr>";
echo "</table> 
	<br/>";
	/*
echo"<p style=\"margin-left:250px;\"> <b>3. Danh mục vật tư </b></p>
<table class=\"table7\" ; align=\"center\" style=\"margin-left:250px;\">
<tr>
<th style=\"text-align:center;font-size: 15;width:30px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:120px;\"> Mã Vật Tư</th>
<th style=\"text-align:center;font-size: 15;width:120px;\"> Mô tả</th>
<th style=\"text-align:center;font-size: 15;width:90px;\"> P/N</th>
<th style=\"text-align:center;font-size: 15 ;width:60px;\"> ĐVT </th>
<th style=\"text-align:center;font-size: 15 ;width:70px;\"> Số lượng </th>
</tr>";
$k=1;
for($j=1;$j<=20;$j++){
	$mota[$j]=isset($_POST["mota$j"]) ? $_POST["mota$j"] : '';
	if($mota[$j]!="") {
	$mlkien[$j]=isset($_POST["mlkien$j"]) ? $_POST["mlkien$j"] : '';
	$malinhkien[$j]=isset($_POST["malinhkien$j"]) ? $_POST["malinhkien$j"] : '';
	if ($mlkien[$j]!="other") $malinhkien[$j]=$mlkien[$j];
	$pn[$j]=isset($_POST["pn$j"]) ? $_POST["pn$j"] : '';
	$dvt[$j]=isset($_POST["dvt$j"]) ? $_POST["dvt$j"] : '';
	$soluong[$j]=isset($_POST["soluong$j"]) ? $_POST["soluong$j"] : '';
	echo"<tr>
	<td style=\"text-align:center;\"> $k </td>
	<td style=\"text-align:center;\"> $malinhkien[$j] </td>
	<td style=\"padding-left:20px;\"> $mota[$j] </td>
	<td style=\"text-align:center;\"> $pn[$j] </td>
	<td style=\"text-align:center;\"> $dvt[$j] </td>
	<td style=\"text-align:center;\"> $soluong[$j] </td>
	</tr>";
	$k++;
	}
}
echo"</table><br/>";
*/
echo"
<table align=\"center\">
<tr><td>
<input type=\"image\" name=\"savefilesc\" value =\"savesc\" src=\"upload/Insc.jpg\" alt=\"Xem\" onclick=\"this.form.savefilesc.value = this.value\"/></td>
<input type=hidden name=savefilesc value=\"\">
<input type=hidden name=hosomay value=\"$hosomay\">
<input type=hidden name=maquanly value=\"$maql\">
<input type=hidden name=username value=$username>
<input type=hidden name=password value=$password>
</form>
<td><a href='phieuktsc.php?readhoso=$hosomay'  title='Phieu KTSC' >
<img  src=\"upload/ktsc.gif\"></a></td>
<td><a href='temdand.php?readhoso=$hosomay'  title='Tem dan' >
<img  src=\"upload/tem.gif\"></a></td>

<form action=\"index.php\" method=\"post\">
<input type=hidden name=username value=$username>
<input type=hidden name=password value=$password>
<input type=hidden name=\"submit\" value=\"Hồ sơ SC/BD\">
<td><input type=\"image\" src=\"upload/back.jpg\"  /></td>
</form>
<form action=\"formsc.php\" method=\"post\">
<input type=hidden name=username value=$username>
<input type=hidden name=password value=$password>
<input type=hidden name=\"submit\" value=\"nhapdulieu\">
<input type=hidden name=\"hoso\" value=\"phieusuachua\">
<input type=hidden name=\"next\" value=\"next\">
<input type=hidden name=maquanly value=\"$maql\">
<td><input type=\"image\" src=\"upload/next.jpg\"  /></td>
</form>
</tr>
</table>
</body>
</html> " ;
}

if($savefilesc=="savesc")
{
for($i=1;$i<6;$i++) {
	$tbdosc[$i]="";
	$serialtbdosc[$i]="";
}

$maquanly=isset($_POST['maquanly']) ? $_POST['maquanly'] : '';
$tenthietbisql11 = mysql_query("SELECT * FROM hososcbd_iso WHERE maql='$maquanly' and hoso='$hosomay'") ;
while($row = mysql_fetch_array($tenthietbisql11))
{
	$ngayth =$row['ngayth'];	
	$ngaykt =$row['ngaykt'];
	$ttktbefore =$row['ttktbefore'];
	$khacphuc =$row['khacphuc'];
	$ghichu =$row['ghichu'];
	$honghoc =$row['honghoc'];
	$ttktafter =$row['ttktafter'];
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
	$ghichu=$row['ghichu'];
	$somay=$row['somay'];
	$mavtu=$row['mavt'];
	$model=$row['model'];
	$cv=$row['cv'];
	$noidung=$row['noidung'];
	$ketluan=$row['ketluan'];
	$ghichufinal=$row['ghichufinal'];
}
for($i=1;$i<9;$i++) {
	$hoten[$i]="";
	$giolv[$i]="";
}
$tenthietbisql12 = mysql_query("SELECT * FROM ngthuchien_iso WHERE  mahoso='$hosomay'") ;
$k=1;
while($row = mysql_fetch_array($tenthietbisql12))
{
	$hoten[$k]=$row['hoten'];
	$giolv[$k]=$row['giolv'];
	$k++;

}
$ngaystemp = $ngayth;
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	if ($ngaystemp[$i]=="/") {
		$datetype=0;
		break;
	}elseif ($ngaystemp[$i]=="-") {
		$datetype=1;
		break;
	}
}
if ($datetype==0) {
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	$p = stripos($ngaystemp,"/") ;

if ($i== 0) {
	$ngays = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 1) {
	$thangs = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 2) {
	$nams = trim ($ngaystemp) ;
} 	
$p++ ;
$ngaystemp = substr($ngaystemp,$p);
}
}else {
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	$p = stripos($ngaystemp,"-") ;

if ($i== 0) {
	$nams = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 1) {
	$thangs = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 2) {
	$ngays = trim ($ngaystemp) ;
} 	
$p++ ;
$ngaystemp = substr($ngaystemp,$p);
}
}
	$ngaystemp = $ngaykt;
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	if ($ngaystemp[$i]=="/") {
		$datetype=0;
		break;
	}elseif ($ngaystemp[$i]=="-") {
		$datetype=1;
		break;
	}
}
if ($datetype==0) {
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	$p = stripos($ngaystemp,"/") ;

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
}else {
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	$p = stripos($ngaystemp,"-") ;

if ($i== 0) {
	$namt = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 1) {
	$thangt = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 2) {
	$ngayt = trim ($ngaystemp) ;
} 	
$p++ ;
$ngaystemp = substr($ngaystemp,$p);
}
}


echo "
<html xmlns:v=\"urn:schemas-microsoft-com:vml\"
xmlns:o=\"urn:schemas-microsoft-com:office:office\"
xmlns:w=\"urn:schemas-microsoft-com:office:word\"
xmlns:m=\"http://schemas.microsoft.com/office/2004/12/omml\"
xmlns=\"http://www.w3.org/TR/REC-html40\">

<head>
<meta http-equiv=Content-Type content=\"text/html; charset=windows-1252\">
<meta name=ProgId content=Word.Document>
<meta name=Generator content=\"Microsoft Word 12\">
<meta name=Originator content=\"Microsoft Word 12\">
<title></title>
<!--[if gte mso 9]><xml>
 <o:DocumentProperties>
  <o:Author>sang</o:Author>
  <o:Template>Normal</o:Template>
  <o:LastAuthor>Ducop</o:LastAuthor>
  <o:Revision>2</o:Revision>
  <o:TotalTime>13</o:TotalTime>
  <o:LastPrinted>2017-10-01T08:02:00Z</o:LastPrinted>
  <o:Created>2017-10-01T03:20:00Z</o:Created>
  <o:LastSaved>2017-10-01T03:20:00Z</o:LastSaved>
  <o:Pages>1</o:Pages>
  <o:Words>111</o:Words>
  <o:Characters>638</o:Characters>
  <o:Company>LTD</o:Company>
  <o:Lines>5</o:Lines>
  <o:Paragraphs>1</o:Paragraphs>
  <o:CharactersWithSpaces>748</o:CharactersWithSpaces>
  <o:Version>12.00</o:Version>
 </o:DocumentProperties>
 <o:OfficeDocumentSettings>
  <o:RelyOnVML/>
  <o:AllowPNG/>
 </o:OfficeDocumentSettings>
</xml><![endif]-->
<!--[if gte mso 9]><xml>
 <w:WordDocument>
  <w:HideSpellingErrors/>
  <w:ActiveWritingStyle Lang=\"EN-US\" VendorID=\"64\" DLLVersion=\"131078\"
   NLCheck=\"1\">1</w:ActiveWritingStyle>
  <w:ActiveWritingStyle Lang=\"EN-GB\" VendorID=\"64\" DLLVersion=\"131078\"
   NLCheck=\"1\">1</w:ActiveWritingStyle>
  <w:ActiveWritingStyle Lang=\"FR\" VendorID=\"64\" DLLVersion=\"131078\" NLCheck=\"1\">1</w:ActiveWritingStyle>
  <w:TrackMoves>false</w:TrackMoves>
  <w:TrackFormatting/>
  <w:DrawingGridHorizontalSpacing>5 pt</w:DrawingGridHorizontalSpacing>
  <w:DisplayHorizontalDrawingGridEvery>2</w:DisplayHorizontalDrawingGridEvery>
  <w:ValidateAgainstSchemas/>
  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>
  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>
  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>
  <w:DoNotPromoteQF/>
  <w:LidThemeOther>EN-US</w:LidThemeOther>
  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>
  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>
  <w:Compatibility>
   <w:BreakWrappedTables/>
   <w:SnapToGridInCell/>
   <w:WrapTextWithPunct/>
   <w:UseAsianBreakRules/>
   <w:DontGrowAutofit/>
   <w:SplitPgBreakAndParaMark/>
   <w:DontVertAlignCellWithSp/>
   <w:DontBreakConstrainedForcedTables/>
   <w:DontVertAlignInTxbx/>
   <w:Word11KerningPairs/>
   <w:CachedColBalance/>
  </w:Compatibility>
  <m:mathPr>
   <m:mathFont m:val=\"Cambria Math\"/>
   <m:brkBin m:val=\"before\"/>
   <m:brkBinSub m:val=\"--\"/>
   <m:smallFrac/>
   <m:dispDef/>
   <m:lMargin m:val=\"0\"/>
   <m:rMargin m:val=\"0\"/>
   <m:defJc m:val=\"centerGroup\"/>
   <m:wrapIndent m:val=\"1440\"/>
   <m:intLim m:val=\"subSup\"/>
   <m:naryLim m:val=\"undOvr\"/>
  </m:mathPr></w:WordDocument>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <w:LatentStyles DefLockedState=\"false\" DefUnhideWhenUsed=\"false\"
  DefSemiHidden=\"false\" DefQFormat=\"false\" LatentStyleCount=\"267\">
  <w:LsdException Locked=\"false\" QFormat=\"true\" Name=\"Normal\"/>
  <w:LsdException Locked=\"false\" QFormat=\"true\" Name=\"heading 1\"/>
  <w:LsdException Locked=\"false\" QFormat=\"true\" Name=\"heading 2\"/>
  <w:LsdException Locked=\"false\" QFormat=\"true\" Name=\"heading 3\"/>
  <w:LsdException Locked=\"false\" QFormat=\"true\" Name=\"heading 4\"/>
  <w:LsdException Locked=\"false\" QFormat=\"true\" Name=\"heading 5\"/>
  <w:LsdException Locked=\"false\" QFormat=\"true\" Name=\"heading 6\"/>
  <w:LsdException Locked=\"false\" QFormat=\"true\" Name=\"heading 7\"/>
  <w:LsdException Locked=\"false\" QFormat=\"true\" Name=\"heading 8\"/>
  <w:LsdException Locked=\"false\" QFormat=\"true\" Name=\"heading 9\"/>
  <w:LsdException Locked=\"false\" Priority=\"99\" Name=\"header\"/>
  <w:LsdException Locked=\"false\" SemiHidden=\"true\" UnhideWhenUsed=\"true\"
   QFormat=\"true\" Name=\"caption\"/>
  <w:LsdException Locked=\"false\" QFormat=\"true\" Name=\"Title\"/>
  <w:LsdException Locked=\"false\" Priority=\"1\" Name=\"Default Paragraph Font\"/>
  <w:LsdException Locked=\"false\" QFormat=\"true\" Name=\"Subtitle\"/>
  <w:LsdException Locked=\"false\" QFormat=\"true\" Name=\"Strong\"/>
  <w:LsdException Locked=\"false\" QFormat=\"true\" Name=\"Emphasis\"/>
  <w:LsdException Locked=\"false\" Priority=\"99\" Name=\"No List\"/>
  <w:LsdException Locked=\"false\" Priority=\"99\" SemiHidden=\"true\"
   Name=\"Placeholder Text\"/>
  <w:LsdException Locked=\"false\" Priority=\"1\" QFormat=\"true\" Name=\"No Spacing\"/>
  <w:LsdException Locked=\"false\" Priority=\"60\" Name=\"Light Shading\"/>
  <w:LsdException Locked=\"false\" Priority=\"61\" Name=\"Light List\"/>
  <w:LsdException Locked=\"false\" Priority=\"62\" Name=\"Light Grid\"/>
  <w:LsdException Locked=\"false\" Priority=\"63\" Name=\"Medium Shading 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"64\" Name=\"Medium Shading 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"65\" Name=\"Medium List 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"66\" Name=\"Medium List 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"67\" Name=\"Medium Grid 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"68\" Name=\"Medium Grid 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"69\" Name=\"Medium Grid 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"70\" Name=\"Dark List\"/>
  <w:LsdException Locked=\"false\" Priority=\"71\" Name=\"Colorful Shading\"/>
  <w:LsdException Locked=\"false\" Priority=\"72\" Name=\"Colorful List\"/>
  <w:LsdException Locked=\"false\" Priority=\"73\" Name=\"Colorful Grid\"/>
  <w:LsdException Locked=\"false\" Priority=\"60\" Name=\"Light Shading Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"61\" Name=\"Light List Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"62\" Name=\"Light Grid Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"63\" Name=\"Medium Shading 1 Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"64\" Name=\"Medium Shading 2 Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"65\" Name=\"Medium List 1 Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"99\" SemiHidden=\"true\" Name=\"Revision\"/>
  <w:LsdException Locked=\"false\" Priority=\"99\" QFormat=\"true\"
   Name=\"List Paragraph\"/>
  <w:LsdException Locked=\"false\" Priority=\"29\" QFormat=\"true\" Name=\"Quote\"/>
  <w:LsdException Locked=\"false\" Priority=\"30\" QFormat=\"true\"
   Name=\"Intense Quote\"/>
  <w:LsdException Locked=\"false\" Priority=\"66\" Name=\"Medium List 2 Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"67\" Name=\"Medium Grid 1 Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"68\" Name=\"Medium Grid 2 Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"69\" Name=\"Medium Grid 3 Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"70\" Name=\"Dark List Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"71\" Name=\"Colorful Shading Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"72\" Name=\"Colorful List Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"73\" Name=\"Colorful Grid Accent 1\"/>
  <w:LsdException Locked=\"false\" Priority=\"60\" Name=\"Light Shading Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"61\" Name=\"Light List Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"62\" Name=\"Light Grid Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"63\" Name=\"Medium Shading 1 Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"64\" Name=\"Medium Shading 2 Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"65\" Name=\"Medium List 1 Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"66\" Name=\"Medium List 2 Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"67\" Name=\"Medium Grid 1 Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"68\" Name=\"Medium Grid 2 Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"69\" Name=\"Medium Grid 3 Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"70\" Name=\"Dark List Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"71\" Name=\"Colorful Shading Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"72\" Name=\"Colorful List Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"73\" Name=\"Colorful Grid Accent 2\"/>
  <w:LsdException Locked=\"false\" Priority=\"60\" Name=\"Light Shading Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"61\" Name=\"Light List Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"62\" Name=\"Light Grid Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"63\" Name=\"Medium Shading 1 Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"64\" Name=\"Medium Shading 2 Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"65\" Name=\"Medium List 1 Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"66\" Name=\"Medium List 2 Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"67\" Name=\"Medium Grid 1 Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"68\" Name=\"Medium Grid 2 Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"69\" Name=\"Medium Grid 3 Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"70\" Name=\"Dark List Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"71\" Name=\"Colorful Shading Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"72\" Name=\"Colorful List Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"73\" Name=\"Colorful Grid Accent 3\"/>
  <w:LsdException Locked=\"false\" Priority=\"60\" Name=\"Light Shading Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"61\" Name=\"Light List Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"62\" Name=\"Light Grid Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"63\" Name=\"Medium Shading 1 Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"64\" Name=\"Medium Shading 2 Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"65\" Name=\"Medium List 1 Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"66\" Name=\"Medium List 2 Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"67\" Name=\"Medium Grid 1 Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"68\" Name=\"Medium Grid 2 Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"69\" Name=\"Medium Grid 3 Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"70\" Name=\"Dark List Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"71\" Name=\"Colorful Shading Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"72\" Name=\"Colorful List Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"73\" Name=\"Colorful Grid Accent 4\"/>
  <w:LsdException Locked=\"false\" Priority=\"60\" Name=\"Light Shading Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"61\" Name=\"Light List Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"62\" Name=\"Light Grid Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"63\" Name=\"Medium Shading 1 Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"64\" Name=\"Medium Shading 2 Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"65\" Name=\"Medium List 1 Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"66\" Name=\"Medium List 2 Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"67\" Name=\"Medium Grid 1 Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"68\" Name=\"Medium Grid 2 Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"69\" Name=\"Medium Grid 3 Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"70\" Name=\"Dark List Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"71\" Name=\"Colorful Shading Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"72\" Name=\"Colorful List Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"73\" Name=\"Colorful Grid Accent 5\"/>
  <w:LsdException Locked=\"false\" Priority=\"60\" Name=\"Light Shading Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"61\" Name=\"Light List Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"62\" Name=\"Light Grid Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"63\" Name=\"Medium Shading 1 Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"64\" Name=\"Medium Shading 2 Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"65\" Name=\"Medium List 1 Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"66\" Name=\"Medium List 2 Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"67\" Name=\"Medium Grid 1 Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"68\" Name=\"Medium Grid 2 Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"69\" Name=\"Medium Grid 3 Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"70\" Name=\"Dark List Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"71\" Name=\"Colorful Shading Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"72\" Name=\"Colorful List Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"73\" Name=\"Colorful Grid Accent 6\"/>
  <w:LsdException Locked=\"false\" Priority=\"19\" QFormat=\"true\"
   Name=\"Subtle Emphasis\"/>
  <w:LsdException Locked=\"false\" Priority=\"21\" QFormat=\"true\"
   Name=\"Intense Emphasis\"/>
  <w:LsdException Locked=\"false\" Priority=\"31\" QFormat=\"true\"
   Name=\"Subtle Reference\"/>
  <w:LsdException Locked=\"false\" Priority=\"32\" QFormat=\"true\"
   Name=\"Intense Reference\"/>
  <w:LsdException Locked=\"false\" Priority=\"33\" QFormat=\"true\" Name=\"Book Title\"/>
  <w:LsdException Locked=\"false\" Priority=\"37\" SemiHidden=\"true\"
   UnhideWhenUsed=\"true\" Name=\"Bibliography\"/>
  <w:LsdException Locked=\"false\" Priority=\"39\" SemiHidden=\"true\"
   UnhideWhenUsed=\"true\" QFormat=\"true\" Name=\"TOC Heading\"/>
 </w:LatentStyles>
</xml><![endif]-->
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:Wingdings;
	panose-1:5 0 0 0 0 0 0 0 0 0;
	mso-font-charset:2;
	mso-generic-font-family:auto;
	mso-font-pitch:variable;
	mso-font-signature:0 268435456 0 0 -2147483648 0;}
@font-face
	{font-family:\"Cambria Math\";
	panose-1:2 4 5 3 5 4 6 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:-1610611985 1107304683 0 0 415 0;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-520092929 1073786111 9 0 415 0;}
@font-face
	{font-family:Tahoma;
	panose-1:2 11 6 4 3 5 4 4 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-520081665 -1073717157 41 0 66047 0;}
@font-face
	{font-family:\"Segoe UI\";
	panose-1:2 11 5 2 4 2 4 2 2 3;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-520084737 -1073683329 41 0 479 0;}
@font-face
	{font-family:VNI-Times;
	panose-1:0 0 0 0 0 0 0 0 0 0;
	mso-font-alt:\"Times New Roman\";
	mso-font-charset:0;
	mso-generic-font-family:auto;
	mso-font-pitch:variable;
	mso-font-signature:3 0 0 0 1 0;}
@font-face
	{font-family:VNTime;
	mso-font-alt:Arial;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:3 0 0 0 1 0;}
@font-face
	{font-family:VNI-Book;
	mso-font-alt:\"Times New Roman\";
	mso-font-charset:0;
	mso-generic-font-family:auto;
	mso-font-pitch:variable;
	mso-font-signature:3 0 0 0 1 0;}
@font-face
	{font-family:VNTimeH;
	panose-1:0 0 0 0 0 0 0 0 0 0;
	mso-font-alt:Arial;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-format:other;
	mso-font-pitch:variable;
	mso-font-signature:3 0 0 0 1 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:\"\";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:\"Times New Roman\",\"serif\";
	mso-fareast-font-family:\"Times New Roman\";}
h1
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-next:Normal;
	margin-top:0in;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:.4in;
	margin-bottom:.0001pt;
	text-align:center;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:1;
	font-size:13.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:VNI-Times;
	mso-font-kerning:0pt;
	mso-bidi-font-weight:normal;}
h2
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-next:Normal;
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:2;
	font-size:13.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:\"VNTime\",\"sans-serif\";
	mso-bidi-font-weight:normal;}
h3
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-next:Normal;
	margin:0in;
	margin-bottom:.0001pt;
	text-align:right;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:3;
	font-size:10.0pt;
	font-family:VNI-Book;
	color:black;
	layout-grid-mode:line;
	mso-bidi-font-weight:normal;}
h4
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-next:Normal;
	margin:0in;
	margin-bottom:.0001pt;
	text-align:center;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:4;
	font-size:10.0pt;
	font-family:VNI-Book;
	mso-bidi-font-weight:normal;}
h5
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-link:\"Heading 5 Char\";
	mso-style-next:Normal;
	margin:0in;
	margin-bottom:.0001pt;
	text-align:center;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:5;
	font-size:12.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:\"Times New Roman\",\"serif\";
	font-weight:normal;}
h6
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-link:\"Heading 6 Char\";
	mso-style-next:Normal;
	margin-top:0in;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:.3in;
	margin-bottom:.0001pt;
	text-indent:.1in;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:6;
	font-size:10.0pt;
	font-family:VNI-Book;
	mso-bidi-font-weight:normal;}
p.MsoHeading7, li.MsoHeading7, div.MsoHeading7
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-next:Normal;
	margin:0in;
	margin-bottom:.0001pt;
	text-align:center;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:7;
	font-size:14.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:VNI-Times;
	mso-fareast-font-family:\"Times New Roman\";
	mso-bidi-font-family:\"Times New Roman\";
	font-weight:bold;
	mso-bidi-font-weight:normal;}
p.MsoHeading8, li.MsoHeading8, div.MsoHeading8
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-next:Normal;
	margin:0in;
	margin-bottom:.0001pt;
	text-align:center;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:8;
	font-size:18.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:\"VNTimeH\",\"sans-serif\";
	mso-fareast-font-family:\"Times New Roman\";
	mso-bidi-font-family:\"Times New Roman\";
	font-weight:bold;
	mso-bidi-font-weight:normal;}
p.MsoHeading9, li.MsoHeading9, div.MsoHeading9
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-next:Normal;
	margin:0in;
	margin-bottom:.0001pt;
	text-align:justify;
	text-indent:.5in;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:9;
	font-size:13.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:VNI-Book;
	mso-fareast-font-family:\"Times New Roman\";
	mso-bidi-font-family:\"Times New Roman\";}
p.MsoHeader, li.MsoHeader, div.MsoHeader
	{mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-link:\"Header Char\";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	tab-stops:center 3.0in right 6.0in;
	font-size:10.0pt;
	font-family:\"Times New Roman\",\"serif\";
	mso-fareast-font-family:\"Times New Roman\";}
p.MsoFooter, li.MsoFooter, div.MsoFooter
	{mso-style-unhide:no;
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	tab-stops:center 242.2pt right 484.45pt;
	font-size:10.0pt;
	font-family:\"Times New Roman\",\"serif\";
	mso-fareast-font-family:\"Times New Roman\";}
p.MsoBodyText, li.MsoBodyText, div.MsoBodyText
	{mso-style-unhide:no;
	mso-style-link:\"Body Text Char\";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:VNI-Book;
	mso-fareast-font-family:\"Times New Roman\";
	mso-bidi-font-family:\"Times New Roman\";}
p.MsoBodyTextIndent, li.MsoBodyTextIndent, div.MsoBodyTextIndent
	{mso-style-unhide:no;
	margin-top:0in;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:.4in;
	margin-bottom:.0001pt;
	text-indent:.1in;
	mso-pagination:widow-orphan;
	font-size:13.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:VNI-Book;
	mso-fareast-font-family:\"Times New Roman\";
	mso-bidi-font-family:\"Times New Roman\";}
p.MsoBodyText3, li.MsoBodyText3, div.MsoBodyText3
	{mso-style-unhide:no;
	mso-style-link:\"Body Text 3 Char\";
	margin-top:0in;
	margin-right:0in;
	margin-bottom:6.0pt;
	margin-left:0in;
	mso-pagination:widow-orphan;
	font-size:8.0pt;
	font-family:\"Times New Roman\",\"serif\";
	mso-fareast-font-family:\"Times New Roman\";}
p.MsoBodyTextIndent2, li.MsoBodyTextIndent2, div.MsoBodyTextIndent2
	{mso-style-unhide:no;
	margin:0in;
	margin-bottom:.0001pt;
	text-align:justify;
	text-indent:.5in;
	mso-pagination:widow-orphan;
	font-size:13.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:VNI-Book;
	mso-fareast-font-family:\"Times New Roman\";
	mso-bidi-font-family:\"Times New Roman\";}
p.MsoBodyTextIndent3, li.MsoBodyTextIndent3, div.MsoBodyTextIndent3
	{mso-style-unhide:no;
	margin:0in;
	margin-bottom:.0001pt;
	text-align:justify;
	text-indent:.1in;
	mso-pagination:widow-orphan;
	font-size:13.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:VNI-Book;
	mso-fareast-font-family:\"Times New Roman\";
	mso-bidi-font-family:\"Times New Roman\";}
p.MsoAcetate, li.MsoAcetate, div.MsoAcetate
	{mso-style-unhide:no;
	mso-style-link:\"Balloon Text Char\";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:8.0pt;
	font-family:\"Tahoma\",\"sans-serif\";
	mso-fareast-font-family:\"Times New Roman\";}
p.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph
	{mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	margin-top:0in;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:.5in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:13.0pt;
	font-family:VNI-Times;
	mso-fareast-font-family:Calibri;
	mso-bidi-font-family:VNI-Times;}
span.BodyText3Char
	{mso-style-name:\"Body Text 3 Char\";
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:\"Body Text 3\";
	mso-ansi-font-size:8.0pt;
	mso-bidi-font-size:8.0pt;}
span.BalloonTextChar
	{mso-style-name:\"Balloon Text Char\";
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:\"Balloon Text\";
	mso-ansi-font-size:8.0pt;
	mso-bidi-font-size:8.0pt;
	font-family:\"Tahoma\",\"sans-serif\";
	mso-ascii-font-family:Tahoma;
	mso-hansi-font-family:Tahoma;
	mso-bidi-font-family:Tahoma;}
span.Heading6Char
	{mso-style-name:\"Heading 6 Char\";
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-parent:\"\";
	mso-style-link:\"Heading 6\";
	font-family:VNI-Book;
	mso-ascii-font-family:VNI-Book;
	mso-hansi-font-family:VNI-Book;
	font-weight:bold;
	mso-bidi-font-weight:normal;}
span.HeaderChar
	{mso-style-name:\"Header Char\";
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-parent:\"\";
	mso-style-link:Header;}
span.Heading5Char
	{mso-style-name:\"Heading 5 Char\";
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:\"Heading 5\";
	mso-ansi-font-size:12.0pt;}
span.BodyTextChar
	{mso-style-name:\"Body Text Char\";
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:\"Body Text\";
	mso-ansi-font-size:12.0pt;
	font-family:VNI-Book;
	mso-ascii-font-family:VNI-Book;
	mso-hansi-font-family:VNI-Book;}
.MsoChpDefault
	{mso-style-type:export-only;
	mso-default-props:yes;
	font-size:10.0pt;
	mso-ansi-font-size:10.0pt;
	mso-bidi-font-size:10.0pt;}
 /* Page Definitions */
@page Section1
	{size:595.35pt 842.0pt;
	margin:28.4pt .5in 28.4pt 56.7pt;
	mso-header-margin:21.3pt;
	mso-footer-margin:.5in;
	mso-page-numbers:4;
	mso-paper-source:0;
	mso-footer: f1;
        }
div.Section1
	{page:Section1;}
 /* List Definitions */
 @list l0
	{mso-list-id:185607839;
	mso-list-template-ids:89818734;}
@list l0:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l0:level2
	{mso-level-legal-format:yes;
	mso-level-text:\"%1\.%2\.\";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.5in;}
@list l0:level3
	{mso-level-legal-format:yes;
	mso-level-text:\"%1\.%2\.%3\.\";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.5in;}
@list l0:level4
	{mso-level-legal-format:yes;
	mso-level-text:\"%1\.%2\.%3\.%4\.\";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.75in;}
@list l0:level5
	{mso-level-legal-format:yes;
	mso-level-text:\"%1\.%2\.%3\.%4\.%5\.\";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.75in;}
@list l0:level6
	{mso-level-legal-format:yes;
	mso-level-text:\"%1\.%2\.%3\.%4\.%5\.%6\.\";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.25in;
	text-indent:-1.0in;}
@list l0:level7
	{mso-level-legal-format:yes;
	mso-level-text:\"%1\.%2\.%3\.%4\.%5\.%6\.%7\.\";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.25in;
	text-indent:-1.0in;}
@list l0:level8
	{mso-level-legal-format:yes;
	mso-level-text:\"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.\";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.5in;
	text-indent:-1.25in;}
@list l0:level9
	{mso-level-legal-format:yes;
	mso-level-text:\"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9\.\";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.5in;
	text-indent:-1.25in;}
@list l1
	{mso-list-id:193884964;
	mso-list-type:hybrid;
	mso-list-template-ids:-10212106 67698703 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l1:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l2
	{mso-list-id:197738179;
	mso-list-type:hybrid;
	mso-list-template-ids:623827798 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l2:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.25in;
	font-family:\"Segoe UI\",\"sans-serif\";
	mso-bidi-font-family:\"Times New Roman\";}
@list l3
	{mso-list-id:210772588;
	mso-list-type:hybrid;
	mso-list-template-ids:774927860 -763744972 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l3:level1
	{mso-level-number-format:bullet;
	mso-level-text:\F076;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-ansi-font-weight:bold;}
@list l4
	{mso-list-id:274288156;
	mso-list-type:hybrid;
	mso-list-template-ids:-1412283520 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l4:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:\"Segoe UI\",\"sans-serif\";
	mso-bidi-font-family:\"Times New Roman\";}
@list l5
	{mso-list-id:314989005;
	mso-list-type:hybrid;
	mso-list-template-ids:-978530038 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l5:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:\"Segoe UI\",\"sans-serif\";
	mso-bidi-font-family:\"Times New Roman\";}
@list l6
	{mso-list-id:356390375;
	mso-list-type:hybrid;
	mso-list-template-ids:-1991755058 -1289338640 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l6:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.5in;}
@list l7
	{mso-list-id:358699716;
	mso-list-type:hybrid;
	mso-list-template-ids:-388469424 1194741084 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l7:level1
	{mso-level-tab-stop:.25in;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;}
@list l8
	{mso-list-id:418986596;
	mso-list-type:hybrid;
	mso-list-template-ids:401738196 1468329486 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l8:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	mso-ansi-font-weight:bold;
	mso-bidi-font-weight:bold;}
@list l8:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l8:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l8:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l8:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l8:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l8:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l8:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l8:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l9
	{mso-list-id:429589473;
	mso-list-type:hybrid;
	mso-list-template-ids:153503786 67698697 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l9:level1
	{mso-level-number-format:bullet;
	mso-level-text:\F076;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;}
@list l10
	{mso-list-id:460078484;
	mso-list-type:hybrid;
	mso-list-template-ids:-218195662 1376445666 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l10:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.25in;}
@list l11
	{mso-list-id:507209580;
	mso-list-type:hybrid;
	mso-list-template-ids:1226498392 1935324468 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l11:level1
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:1.3in;
	mso-level-number-position:left;
	margin-left:1.3in;
	text-indent:-.25in;
	mso-ansi-font-size:13.0pt;
	mso-bidi-font-size:13.0pt;
	font-family:Symbol;}
@list l12
	{mso-list-id:571231589;
	mso-list-type:hybrid;
	mso-list-template-ids:1869642302 67698709 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l12:level1
	{mso-level-start-at:2;
	mso-level-number-format:alpha-upper;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;}
@list l13
	{mso-list-id:581767211;
	mso-list-type:simple;
	mso-list-template-ids:-923478506;}
@list l13:level1
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:.25in;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;}
@list l14
	{mso-list-id:592395358;
	mso-list-type:hybrid;
	mso-list-template-ids:1629138236 -763744972 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l14:level1
	{mso-level-number-format:bullet;
	mso-level-text:\F076;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:63.0pt;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-ansi-font-weight:bold;}
@list l15
	{mso-list-id:666788816;
	mso-list-type:simple;
	mso-list-template-ids:67698703;}
@list l15:level1
	{mso-level-tab-stop:.25in;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;}
@list l16
	{mso-list-id:688140400;
	mso-list-type:hybrid;
	mso-list-template-ids:-780781178 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l16:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.25in;
	font-family:\"Segoe UI\",\"sans-serif\";
	mso-bidi-font-family:\"Times New Roman\";}
@list l17
	{mso-list-id:690692504;
	mso-list-type:simple;
	mso-list-template-ids:1194741084;}
@list l17:level1
	{mso-level-tab-stop:.25in;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;}
@list l18
	{mso-list-id:713699184;
	mso-list-type:hybrid;
	mso-list-template-ids:-532787362 67698689 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l18:level1
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:.9in;
	mso-level-number-position:left;
	margin-left:.9in;
	text-indent:-.25in;
	font-family:Symbol;}
@list l19
	{mso-list-id:734625104;
	mso-list-type:hybrid;
	mso-list-template-ids:-1000177294 1404486684 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l19:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.25in;}
@list l20
	{mso-list-id:794906545;
	mso-list-type:hybrid;
	mso-list-template-ids:1209318548 67698703 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l20:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l21
	{mso-list-id:832263037;
	mso-list-type:hybrid;
	mso-list-template-ids:1897320752 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l21:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.25in;
	font-family:\"Segoe UI\",\"sans-serif\";
	mso-bidi-font-family:\"Times New Roman\";}
@list l22
	{mso-list-id:837381688;
	mso-list-type:hybrid;
	mso-list-template-ids:1723255994 -1346461856 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l22:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.25in;}
@list l23
	{mso-list-id:846099272;
	mso-list-template-ids:-255658220;}
@list l23:level1
	{mso-level-tab-stop:.25in;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;}
@list l24
	{mso-list-id:897323317;
	mso-list-type:hybrid;
	mso-list-template-ids:-1935264954 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l24:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:\"Segoe UI\",\"sans-serif\";
	mso-bidi-font-family:\"Times New Roman\";}
@list l24:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:\"Courier New\";}
@list l25
	{mso-list-id:1053381511;
	mso-list-type:hybrid;
	mso-list-template-ids:-1282773648 937964886 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l25:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.25in;
	text-indent:-.25in;}
@list l26
	{mso-list-id:1054700105;
	mso-list-type:simple;
	mso-list-template-ids:-534095918;}
@list l26:level1
	{mso-level-tab-stop:.25in;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;
	font-family:\"Times New Roman\",\"serif\";}
@list l27
	{mso-list-id:1101417596;
	mso-list-type:hybrid;
	mso-list-template-ids:1266829768 -1933020014 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l27:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l28
	{mso-list-id:1119029329;
	mso-list-template-ids:-1991755058;}
@list l28:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.5in;}
@list l29
	{mso-list-id:1230073191;
	mso-list-type:hybrid;
	mso-list-template-ids:-59088952 -1074097196 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l29:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l30
	{mso-list-id:1348486590;
	mso-list-type:hybrid;
	mso-list-template-ids:-139806138 2037781728 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l30:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.25in;}
@list l31
	{mso-list-id:1353342192;
	mso-list-type:hybrid;
	mso-list-template-ids:2035076664 -1991853152 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l31:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l32
	{mso-list-id:1381592527;
	mso-list-type:hybrid;
	mso-list-template-ids:-255658220 1194741084 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l32:level1
	{mso-level-tab-stop:.25in;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;}
@list l33
	{mso-list-id:1385176946;
	mso-list-type:hybrid;
	mso-list-template-ids:955678898 792493300 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l33:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.25in;}
@list l34
	{mso-list-id:1464542073;
	mso-list-type:hybrid;
	mso-list-template-ids:754481132 -667151738 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l34:level1
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:49.5pt;
	text-indent:-.25in;
	font-family:Symbol;
	color:windowtext;}
@list l35
	{mso-list-id:1519734429;
	mso-list-type:hybrid;
	mso-list-template-ids:913740958 1353471942 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l35:level1
	{mso-level-start-at:2;
	mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:63.0pt;
	text-indent:-.25in;
	font-family:\"Times New Roman\",\"serif\";}
@list l36
	{mso-list-id:1629777677;
	mso-list-type:hybrid;
	mso-list-template-ids:-742094904 2037781728 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l36:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.25in;}
@list l37
	{mso-list-id:1634944168;
	mso-list-type:hybrid;
	mso-list-template-ids:1298281942 67698689 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l37:level1
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:85.5pt;
	text-indent:-.25in;
	font-family:Symbol;}
@list l38
	{mso-list-id:1651128127;
	mso-list-type:hybrid;
	mso-list-template-ids:1790482348 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l38:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:\"Segoe UI\",\"sans-serif\";
	mso-bidi-font-family:\"Times New Roman\";}
@list l39
	{mso-list-id:1782141090;
	mso-list-type:hybrid;
	mso-list-template-ids:-1497177398 1823103132 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l39:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l40
	{mso-list-id:1819303548;
	mso-list-type:hybrid;
	mso-list-template-ids:171999078 67698689 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l40:level1
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.25in;
	font-family:Symbol;}
@list l41
	{mso-list-id:1876311096;
	mso-list-type:hybrid;
	mso-list-template-ids:-731602470 -763744972 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l41:level1
	{mso-level-number-format:bullet;
	mso-level-text:\F076;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:32.2pt;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-ansi-font-weight:bold;}
@list l42
	{mso-list-id:1942447516;
	mso-list-template-ids:1387009574;}
@list l42:level1
	{mso-level-tab-stop:.25in;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;
	font-family:\"Times New Roman\",\"serif\";}
@list l43
	{mso-list-id:1945532465;
	mso-list-type:hybrid;
	mso-list-template-ids:1648557478 67698689 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l43:level1
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:1.0in;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.25in;
	font-family:Symbol;}
@list l44
	{mso-list-id:1959529969;
	mso-list-type:hybrid;
	mso-list-template-ids:-1190735964 -937269770 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l44:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l45
	{mso-list-id:1977680538;
	mso-list-type:simple;
	mso-list-template-ids:-102484282;}
@list l45:level1
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:.25in;
	mso-level-number-position:left;
	margin-left:.25in;
	text-indent:-.25in;}
@list l46
	{mso-list-id:1978953021;
	mso-list-type:hybrid;
	mso-list-template-ids:1579028484 1007572572 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l46:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.25in;}
@list l47
	{mso-list-id:1979533303;
	mso-list-type:hybrid;
	mso-list-template-ids:809921652 242007448 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l47:level1
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:1.3in;
	mso-level-number-position:left;
	margin-left:1.3in;
	text-indent:-.25in;
	mso-ansi-font-size:13.0pt;
	mso-bidi-font-size:13.0pt;
	font-family:Symbol;
	mso-ansi-language:EN-US;}
@list l47:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:1.4in;
	mso-level-number-position:left;
	margin-left:1.4in;
	text-indent:-.25in;
	font-family:\"Courier New\";}
@list l48
	{mso-list-id:2072385664;
	mso-list-type:hybrid;
	mso-list-template-ids:-2005398066 67698689 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l48:level1
	{mso-level-start-at:0;
	mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:.5in;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-fareast-font-family:\"Times New Roman\";
	mso-bidi-font-family:\"Times New Roman\";}
ol
	{margin-bottom:0in;}
ul
	{margin-bottom:0in;}
-->
</style>
<!--[if gte mso 10]>
<style>
 /* Style Definitions */
 table.MsoNormalTable
	{mso-style-name:\"Table Normal\";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-qformat:yes;
	mso-style-parent:\"\";
	mso-padding-alt:0in 5.4pt 0in 5.4pt;
	mso-para-margin:0in;
	mso-para-margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:\"Times New Roman\",\"serif\";}
table.MsoTableGrid
	{mso-style-name:\"Table Grid\";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-unhide:no;
	border:solid windowtext 1.0pt;
	mso-border-alt:solid windowtext .5pt;
	mso-padding-alt:0in 5.4pt 0in 5.4pt;
	mso-border-insideh:.5pt solid windowtext;
	mso-border-insidev:.5pt solid windowtext;
	mso-para-margin:0in;
	mso-para-margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:\"Times New Roman\",\"serif\";}
	p.MsoFooter, li.MsoFooter, div.MsoFooter
{
    margin:0in;
    margin-bottom:.0001pt;
    mso-pagination:widow-orphan;
    tab-stops:center 3.0in right 6.0in;
    font-size:12.0pt;
}
table#hrdftrtbl{
    margin:0in 0in 0in 9in;
}
</style>
<![endif]--><!--[if gte mso 9]><xml>
 <o:shapedefaults v:ext=\"edit\" spidmax=\"11266\">
  <v:stroke weight=\"4.5pt\" linestyle=\"thickThin\"/>
 </o:shapedefaults></xml><![endif]--><!--[if gte mso 9]><xml>
 <o:shapelayout v:ext=\"edit\">
  <o:idmap v:ext=\"edit\" data=\"1\"/>
 </o:shapelayout></xml><![endif]-->
</head>

<body lang=EN-US style='tab-interval:.5in'>

<div class=Section1>
<p class=MsoNormal style='line-height:115%;tab-stops:133.25pt'><span
style='font-size:12.0pt;line-height:115%;color:black;mso-themecolor:text1'><span
style='mso-spacerun:yes'>� </span>&nbsp;&nbsp;&nbsp;&nbsp;XN Địa vật lý GK<span
style='mso-tab-count:2'></span><span style='mso-tab-count:1'></span><b>PHIẾU THỰC HIỆN CÔNG VIỆC</b><o:p></o:p></span></p>

<p class=MsoHeading8 align=left style='margin-top:6.0pt;margin-right:0in;
margin-bottom:6.0pt;margin-left:0in;text-align:left'><span style='font-size:
12.0pt;font-family:\"Times New Roman\",\"serif\";color:black;mso-themecolor:text1'>&nbsp;&nbsp;&nbsp;X&#432;&#7903;ng
SCTB&#272;VL<span style='mso-tab-count:1'>������� </span></span><span
style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\";color:black;
mso-themecolor:text1;font-weight:normal'><span style='mso-tab-count:1'>����������� </span><span
style='mso-tab-count:3'>����������������������������������� </span><span
style='mso-tab-count:1'>����������� </span>Ngày bắt đầu: &nbsp;$ngays/$thangs/$nams<o:p></o:p></span></p>

<p class=MsoHeading8 align=left style='margin-top:6.0pt;margin-right:0in;
margin-bottom:6.0pt;margin-left:1.5in;text-align:left;text-indent:.5in'><span
style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\";color:black;
mso-themecolor:text1;font-weight:normal'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;S&#7889; h&#7891; s&#417;: $hosomay<span style='mso-spacerun:yes'>� </span><span style='mso-tab-count:
2'>������������ </span>Ngày kết thúc: $ngayt/$thangt/$namt<o:p></o:p></span></p>

<p class=MsoNormal style='margin-left:14.2pt;text-indent:-14.2pt;line-height:
150%;mso-list:l20 level1 lfo21'><![if !supportLists]><span lang=RU
style='font-size:12.0pt;line-height:150%;color:black;mso-themecolor:text1;
mso-ansi-language:RU'><span style='mso-list:Ignore'>1.<span style='font:7.0pt \"Times New Roman\"'>&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span style='font-size:12.0pt;line-height:150%;
color:black;mso-themecolor:text1'>Tên thiết bị</span><span lang=RU style='font-size:12.0pt;line-height:150%;
color:black;mso-themecolor:text1;mso-ansi-language:RU'>: $mavtu-$model</span><span
style='font-size:12.0pt;line-height:150%;color:black;mso-themecolor:text1'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Số máy</span><span
lang=RU style='font-size:12.0pt;line-height:150%;color:black;mso-themecolor:
text1;mso-ansi-language:RU'>: &nbsp;&nbsp;&nbsp;&nbsp;$somay<o:p></o:p></span></p>

<p class=MsoNormal style='margin-left:14.2pt;text-indent:-14.2pt;line-height:
150%;mso-list:l20 level1 lfo21'><![if !supportLists]><span style='font-size:
12.0pt;line-height:150%;color:black;mso-themecolor:text1'><span
style='mso-list:Ignore'>2.<span style='font:7.0pt \"Times New Roman\"'>&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span style='font-size:12.0pt;line-height:150%;
color:black;mso-themecolor:text1'>Người tham gia thực hiện công việc: <o:p></o:p></span></p>";

echo"<div align=right>
	<br/>";
echo"<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 align=left
 width=680 style='width:509.95pt;border-collapse:collapse;border:none;
 mso-border-alt:solid windowtext .5pt;mso-yfti-tbllook:1184;mso-table-lspace:
 9.0pt;margin-left:6.75pt;mso-table-rspace:9.0pt;margin-right:6.75pt;
 mso-table-anchor-vertical:page;mso-table-anchor-horizontal:margin;mso-table-left:
 left;mso-table-top:150.8pt;mso-padding-alt:0in 5.4pt 0in 5.4pt;mso-border-insideh:
 .5pt solid windowtext;mso-border-insidev:.5pt solid windowtext'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;page-break-inside:avoid'>
  <td width=242 style='width:173.15pt;border:solid windowtext 1.0pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center;line-height:150%'><span
  style='font-size:12.0pt;line-height:150%;color:black;mso-themecolor:text1'>Họ và tên</span><span lang=RU
  style='font-size:12.0pt;line-height:150%;color:black;mso-themecolor:text1;
  mso-ansi-language:RU'><o:p></o:p></span></p>
  </td>
  <td width=113 style='width:85.05pt;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-top:0in;margin-right:-5.4pt;
  margin-bottom:0in;margin-left:5.4pt;margin-bottom:.0001pt;text-align:center;
  text-indent:-5.4pt;line-height:150%'><span style='font-size:12.0pt;
  line-height:150%;color:black;mso-themecolor:text1'>S&#7889; gi&#7901; tham gia</span><span
  lang=RU style='font-size:12.0pt;line-height:150%;color:black;mso-themecolor:
  text1;mso-ansi-language:RU'><o:p></o:p></span></p>
  </td>
  <td width=236 style='width:173.15pt;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center;line-height:150%'><span
  style='font-size:12.0pt;line-height:150%;color:black;mso-themecolor:text1'>Họ và tên</span><span lang=RU
  style='font-size:12.0pt;line-height:150%;color:black;mso-themecolor:text1;
  mso-ansi-language:RU'><o:p></o:p></span></p>
  </td>
  <td width=120 style='width:89.05pt;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-right:-.6pt;text-align:center;
  line-height:150%'><span style='font-size:12.0pt;line-height:150%;color:black;
  mso-themecolor:text1'>S&#7889; gi&#7901; tham gia</span><span lang=RU
  style='font-size:12.0pt;line-height:150%;color:black;mso-themecolor:text1;
  mso-ansi-language:RU'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;page-break-inside:avoid'>
  <td width=242 style='width:173.15pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%'><span lang=RU style='font-size:
  12.0pt;line-height:150%;color:black;mso-themecolor:text1;mso-ansi-language:
  RU'>1.$hoten[1]<o:p></o:p></span></p>
  </td>
  <td width=113 valign=top style='width:85.05pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%'><span lang=RU style='font-size:
  12.0pt;line-height:150%;color:black;mso-themecolor:text1;mso-ansi-language:
  RU'><o:p>$giolv[1]</o:p></span></p>
  </td>
  <td width=236 style='width:173.15pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%'><span lang=RU style='font-size:
  12.0pt;line-height:150%;color:black;mso-themecolor:text1;mso-ansi-language:
  RU'>2.$hoten[2]<o:p></o:p></span></p>
  </td>
  <td width=120 valign=top style='width:89.05pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%'><span lang=RU style='font-size:
  12.0pt;line-height:150%;color:black;mso-themecolor:text1;mso-ansi-language:
  RU'><o:p>$giolv[2]</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2;page-break-inside:avoid'>
  <td width=242 style='width:173.15pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%'><span lang=RU style='font-size:
  12.0pt;line-height:150%;color:black;mso-themecolor:text1;mso-ansi-language:
  RU'>3.$hoten[3]<o:p></o:p></span></p>
  </td>
  <td width=113 valign=top style='width:85.05pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%'><span lang=RU style='font-size:
  12.0pt;line-height:150%;color:black;mso-themecolor:text1;mso-ansi-language:
  RU'><o:p>$giolv[3]</o:p></span></p>
  </td>
  <td width=236 style='width:173.15pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%'><span lang=RU style='font-size:
  12.0pt;line-height:150%;color:black;mso-themecolor:text1;mso-ansi-language:
  RU'>4.$hoten[4]<o:p></o:p></span></p>
  </td>
  <td width=120 valign=top style='width:89.05pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%'><span lang=RU style='font-size:
  12.0pt;line-height:150%;color:black;mso-themecolor:text1;mso-ansi-language:
  RU'><o:p>$giolv[4]</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:3;page-break-inside:avoid'>
  <td width=242 style='width:173.15pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%'><span lang=RU style='font-size:
  12.0pt;line-height:150%;color:black;mso-themecolor:text1;mso-ansi-language:
  RU'>5.$hoten[5]<o:p></o:p></span></p>
  </td>
  <td width=113 valign=top style='width:85.05pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%'><span lang=RU style='font-size:
  12.0pt;line-height:150%;color:black;mso-themecolor:text1;mso-ansi-language:
  RU'><o:p>$giolv[5]</o:p></span></p>
  </td>
  <td width=236 style='width:173.15pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%'><span lang=RU style='font-size:
  12.0pt;line-height:150%;color:black;mso-themecolor:text1;mso-ansi-language:
  RU'>6.$hoten[6]<o:p></o:p></span></p>
  </td>
  <td width=120 valign=top style='width:89.05pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%'><span lang=RU style='font-size:
  12.0pt;line-height:150%;color:black;mso-themecolor:text1;mso-ansi-language:
  RU'><o:p>$giolv[6]</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:4;mso-yfti-lastrow:yes;page-break-inside:avoid'>
  <td width=242 style='width:177.15pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%'><span lang=RU style='font-size:
  12.0pt;line-height:150%;color:black;mso-themecolor:text1;mso-ansi-language:
  RU'>7.$hoten[7]<o:p></o:p></span></p>
  </td>
  <td width=113 valign=top style='width:85.05pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%'><span lang=RU style='font-size:
  12.0pt;line-height:150%;color:black;mso-themecolor:text1;mso-ansi-language:
  RU'><o:p>$giolv[7]</o:p></span></p>
  </td>
  <td width=236 style='width:173.15pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%'><span lang=RU style='font-size:
  12.0pt;line-height:150%;color:black;mso-themecolor:text1;mso-ansi-language:
  RU'>8.$hoten[8]<o:p></o:p></span></p>
  </td>
  <td width=120 valign=top style='width:89.05pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%'><span lang=RU style='font-size:
  12.0pt;line-height:150%;color:black;mso-themecolor:text1;mso-ansi-language:
  RU'><o:p>$giolv[8]</o:p></span></p>
  </td>
 </tr>
</table>
</div>";
echo"<p class=MsoNormal style='margin-left:14.2pt;line-height:150%'><span lang=RU
style='font-size:12.0pt;line-height:150%;color:black;mso-themecolor:text1;
mso-ansi-language:RU'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='margin-left:14.2pt;text-indent:-14.2pt;line-height:
150%;mso-list:l20 level1 lfo21'><![if !supportLists]><span lang=RU
style='font-size:12.0pt;line-height:150%;color:black;mso-themecolor:text1;
mso-ansi-language:RU'><span style='mso-list:Ignore'>3.<span style='font:7.0pt \"Times New Roman\"'>&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span style='font-size:12.0pt;line-height:150%;
color:black;mso-themecolor:text1'>Các thiết bị và phền mềm phụ trợ</span><span lang=RU
style='font-size:12.0pt;line-height:150%;color:black;mso-themecolor:text1;
mso-ansi-language:RU'>:<o:p></o:p></span></p>
	";
echo"<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 width=680
 style='width:509.95pt;margin-left:5.4pt;border-collapse:collapse;border:none;
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
  style='font-size:12.0pt;color:black;mso-themecolor:text1'>Tên viết tắt<o:p></o:p></span></p>
  </td>
  <td width=308 valign=top style='width:230.95pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:12.95pt'>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:12.0pt;color:black;mso-themecolor:text1'>Số serial <o:p></o:p></span></p>
  </td>
  </tr>";
  for ($i=1;$i<6;$i++) {
	  if($tbdosc[$i]!="") {
	
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
  <td width=308 valign=top style='width:230.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:13.6pt'>
  <p class=MsoNormal><span style='font-size:12.0pt;color:black;mso-themecolor:
  text1'><o:p>$serialtbdosc[$i]</o:p></span></p>
  </td>
  </tr>";
	  }
  }
 echo"</table>"; 
  if ($cv=="KT")
  echo"<p class=MsoNormal style='margin-left:14.2pt;line-height:150%'><span lang=RU
style='font-size:12.0pt;line-height:150%;color:black;mso-themecolor:text1;
mso-ansi-language:RU'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='margin-left:14.2pt;text-indent:-14.2pt;line-height:
150%;mso-list:l20 level1 lfo21'><![if !supportLists]><span style='font-size:
12.0pt;line-height:150%;color:black;mso-themecolor:text1'><span
style='mso-list:Ignore'>4.<span style='font:7.0pt \"Times New Roman\"'>&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span style='font-size:12.0pt;line-height:150%;
color:black;mso-themecolor:text1'>Nội dung công việc : KT<input type=\"checkbox\" name=\"cv\" value=\"KT\" checked>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\"> 
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\"  ></p>";
elseif ($cv=="BD")
  echo"<p class=MsoNormal style='margin-left:14.2pt;line-height:150%'><span lang=RU
style='font-size:12.0pt;line-height:150%;color:black;mso-themecolor:text1;
mso-ansi-language:RU'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='margin-left:14.2pt;text-indent:-14.2pt;line-height:
150%;mso-list:l20 level1 lfo21'><![if !supportLists]><span style='font-size:
12.0pt;line-height:150%;color:black;mso-themecolor:text1'><span
style='mso-list:Ignore'>4.<span style='font:7.0pt \"Times New Roman\"'>&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span style='font-size:12.0pt;line-height:150%;
color:black;mso-themecolor:text1'>Nội dung công việc : KT<input type=\"checkbox\" name=\"cv\" value=\"KT\">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\"  checked>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\"> </p>";
elseif ($cv=="SC")
  echo"<p class=MsoNormal style='margin-left:14.2pt;line-height:150%'><span lang=RU
style='font-size:12.0pt;line-height:150%;color:black;mso-themecolor:text1;
mso-ansi-language:RU'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='margin-left:14.2pt;text-indent:-14.2pt;line-height:
150%;mso-list:l20 level1 lfo21'><![if !supportLists]><span style='font-size:
12.0pt;line-height:150%;color:black;mso-themecolor:text1'><span
style='mso-list:Ignore'>4.<span style='font:7.0pt \"Times New Roman\"'>&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span style='font-size:12.0pt;line-height:150%;
color:black;mso-themecolor:text1'>Nội dung công việc : KT<input type=\"checkbox\" name=\"cv\" value=\"KT\">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\"> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\"  checked></p>";
else 
	echo"<p class=MsoNormal style='margin-left:14.2pt;line-height:150%'><span lang=RU
style='font-size:12.0pt;line-height:150%;color:black;mso-themecolor:text1;
mso-ansi-language:RU'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='margin-left:14.2pt;text-indent:-14.2pt;line-height:
150%;mso-list:l20 level1 lfo21'><![if !supportLists]><span style='font-size:
12.0pt;line-height:150%;color:black;mso-themecolor:text1'><span
style='mso-list:Ignore'>4.<span style='font:7.0pt \"Times New Roman\"'>&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span style='font-size:12.0pt;line-height:150%;
color:black;mso-themecolor:text1'>Nội dung công việc : KT<input type=\"checkbox\" name=\"cv\" value=\"KT\">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\"> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\"></p>";
echo"<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 width=680
 style='width:510.3pt;margin-left:5.4pt;border-collapse:collapse;border:none;
 mso-border-alt:solid windowtext .5pt;mso-padding-alt:0in 5.4pt 0in 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:98.35pt'>
  <td width=132 style='width:99.25pt;border:solid windowtext 1.0pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:98.35pt'>
  <p class=MsoNormal align=center style='margin-top:0in;margin-right:-5.4pt;
  margin-bottom:0in;margin-left:5.4pt;margin-bottom:.0001pt;text-align:center;
  text-indent:-5.4pt'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;color:black;mso-themecolor:text1'>Mô tả chi tiết tình trạng của thiết bị,các hỏng hóc (nếu có) do nhân viên Xưởng kiểm tra, phát hiện<o:p></o:p></span></b></p>
  </td>
  <td width=548 valign=top style='width:411.05pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:98.35pt'>
  <p class=MsoNormal><span style='font-size:12.0pt;color:black;mso-themecolor:
  text1'><o:p>$honghoc</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;height:56.6pt'>
  <td width=132 style='width:99.25pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:56.6pt'>
  <p class=MsoNormal align=center style='margin-top:0in;margin-right:-5.4pt;
  margin-bottom:0in;margin-left:5.4pt;margin-bottom:.0001pt;text-align:center;
  text-indent:-5.4pt'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;color:black;mso-themecolor:text1'>Mô tả công việc thực hiện hoặc cách khắc phục hỏng hó<o:p></o:p></span></b></p>
  <p class=MsoNormal style='margin-top:0in;margin-right:-5.4pt;margin-bottom:
  0in;margin-left:5.4pt;margin-bottom:.0001pt;text-indent:-5.4pt'><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;color:black;
  mso-themecolor:text1'><o:p>&nbsp;</o:p></span></b></p>
  </td>
  <td width=548 valign=top style='width:411.05pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:56.6pt'>
  <p class=MsoNormal><span style='font-size:12.0pt;color:black;mso-themecolor:
  text1'><o:p>$khacphuc</o:p></span></p>
  </td>
 </tr>
 </table>";
 /*
  echo"
	  <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:6.0pt;
margin-left:35.7pt;text-indent:-17.85pt;mso-list:l20 level1 lfo21'><![if !supportLists]><span
style='font-size:12.0pt;color:black;mso-themecolor:text1'><span
style='mso-list:Ignore'>5.<span style='font:7.0pt \"Times New Roman\"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span style='font-size:12.0pt;color:black;
mso-themecolor:text1'>Danh mục vật tư tiêu hao:<o:p></o:p></span></p>

<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
 style='margin-left:5.4pt;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=38 valign=top style='width:28.35pt;border:solid windowtext 1.0pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-top:0in;margin-right:-5.4pt;
  margin-bottom:0in;margin-left:2.15pt;margin-bottom:.0001pt;text-align:center;
  text-indent:-2.15pt'><span style='font-size:12.0pt;color:black;mso-themecolor:
  text1'>STT<o:p></o:p></span></p>
  </td>
  <td width=180 valign=top style='width:134.7pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:12.0pt;color:black;mso-themecolor:text1'>Mã vật tư (nếu có)<o:p></o:p></span></p>
  </td>
  <td width=265 valign=top style='width:198.45pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:12.0pt;color:black;mso-themecolor:text1'>Tên vật tư<o:p></o:p></span></p>
  </td>
  <td width=113 valign=top style='width:85.05pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:12.0pt;color:black;mso-themecolor:text1'>P/N  (nếu có)<o:p></o:p></span></p>
  </td>
  <td width=35 valign=top style='width:26.0pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:12.0pt;color:black;mso-themecolor:text1'>SL<o:p></o:p></span></p>
  </td>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:12.0pt;color:black;mso-themecolor:text1'>&#272;VT<o:p></o:p></span></p>
  </td>
  </tr>";
$tenthietbisql13 = mysql_query("SELECT * FROM danhmucvattu_iso WHERE  mahoso='$hosomay'") ;
$k=0;
while($row = mysql_fetch_array($tenthietbisql13))
{
	$k++;
//	$mavattu=$row['mavattu'];
	$tenvt=$row['mota'];
	$serialnumber=$row['serialnumber'];
	$dvt=$row['dvt'];
	$soluong=$row['soluong'];

  echo"<tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes'>
  <td width=38 valign=top style='width:28.35pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span style='font-size:12.0pt;color:black;mso-themecolor:
  text1'><o:p>$k</o:p></span></p>
  </td>
  <td width=180 valign=top style='width:134.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span style='font-size:12.0pt;color:black;mso-themecolor:
  text1'><o:p>$mavattu</o:p></span></p>
  </td>
  <td width=265 valign=top style='width:198.45pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span style='font-size:12.0pt;color:black;mso-themecolor:
  text1'><o:p>$tenvt</o:p></span></p>
  </td>
  <td width=113 valign=top style='width:85.05pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span style='font-size:12.0pt;color:black;mso-themecolor:
  text1'><o:p>$serialnumber</o:p></span></p>
  </td>
  <td width=35 valign=top style='width:26.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span style='font-size:12.0pt;color:black;mso-themecolor:
  text1'><o:p>$soluong</o:p></span></p>
  </td>
  <td width=47 valign=top style='width:35.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span style='font-size:12.0pt;color:black;mso-themecolor:
  text1'><o:p>$dvt</o:p></span></p>
  </td>
  </tr>";
}
*/
echo"</table>
<p class=MsoNormal style='margin-right:-7.65pt;line-height:115%'><b
style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;line-height:
115%;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></b></p>
<p class=MsoNormal style='margin-left:3.0in;text-indent:-173.45pt;line-height:
115%'><b style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;
line-height:115%;color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></b></p>
	</br>
<table id='hrdftrtbl' border='1' cellspacing='0' cellpadding='0'>
        <tr>
          <td>
            <div style='mso-element:footer' id=\"f1\">
                <p class=\"MsoFooter\">
                    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                        <tr>
                            <td  class=\"footer\">
                            <span lang=VI style='mso-ansi-language:VI'>BM.25.03<br>
	01/01/2024 <o:p></o:p></span>
                            </td>
                        </tr>
                    </table>
                </p>
            </div>
        </td>
    </tr>
    </table>
    </div>
</div>
</body>
</html>";
header("Content-Type: application/msword");
header("Content-Disposition:attchment;filename=\"$hosomay-$mavtu-$somay-SCBD.doc\"");
header("Pragma: no-cache");
header("Expires: 0");
exit;	
}

if($mabaoduong!="")
{

echo "
	<html lang=\"vi\">
	<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
</head>
<body>

<table style=\"width:100%\">
<tr>
<td>
<h2> <p style=\"text-align:center;color:blue;\"> BẢO DƯỠNG THIẾT BỊ <br/></h2>
</p>
</td>
</tr>
</table>
<br/>
<form action=\"formsc.php\" method=\"post\">
<table class=\"table7\">
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFE4B5;\"> <strong>Mã quản lý</strong> </td>
<td><select style=\"border-style:none;width:100%;background:#00FFFF;height:30px;\">
		<option value=\"$mabaoduong\">$mabaoduong</option>
    	</select></td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#9966CC;\"> <strong>Mã thiết bị</strong> </td>
<td> <select name=\"mavtbd\" onchange=\"this.form.submit()\" style=\"border-style:none;width:100%;background:#00FFFF;height:30px;\">
		<option value=\"\"> </option>" ;
    	$tenthietbisql2 = mysql_query("SELECT DISTINCT mavt FROM hososcbd_iso WHERE maql='$mabaoduong'") ;
		while($row = mysql_fetch_array($tenthietbisql2))
		{
			$mavt =$row['mavt'];	
			echo "<option value=\"$mavt\" style=\"background:#87CEEB;\"> $mavt </option>";
		}
		 echo"</select></option>
		</select> </td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Người TH</strong> </td>
<td><input style=\"border-style:none;width:100%;text-align:center;font_family:Times New Roman;background:#00FFFF;height:30px;\" name=\"ngth\" size=\"36\" type=\"text\">  </td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Số hồ sơ</strong> </td>
<td> <input style=\"border-style:none;width:100%;text-align:center;font_family:Times New Roman;background:#00FFFF;height:30px;\" name=\"sohs\" size=\"36\" type=\"text\" > </td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Ngày TH</strong> </td>
<td><input style=\"border-style:none;width:100%;text-align:center;font_family:Times New Roman;background:#00FFFF;height:30px;\" name=\"ngayth\" size=\"36\" type=\"text\" >  </td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Ngày KT </strong></td>
<td> <input style=\"border-style:none;width:100%;text-align:center;font_family:Times New Roman;background:#00FFFF;height:30px;\" name=\"ngaykt\" size=\"36\" type=\"text\"> </td>
</tr>
</table>

<br/>
<table class=\"table7\">
		<tr>
		<td  style=\"text-align:left;color:black;font-size: 18;width:300px;height:150px;padding-left:20px;background-color:#FFDAB9;\"><b> Tình trạng kỹ thuật ban đầu </b> </td>
		<td><input type=text name=\"ttktbefore\" style=\"border-style:none;width:100%;background:#00FFFF;height:150px;\"> </td>
		</tr>
		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:150px;padding-left:20px;background-color:#FFDAB9;\"><b> Yêu cầu khách hàng </b></td>
		<td><input type=text name=\"yeucau\" style=\"border-style:none;width:100%;background:#00FFFF;height:150px;\"> </td>
		</tr>
		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:150px;padding-left:20px;background-color:#FFDAB9;\"><b>Nội dung công việc </b></td>
		<td><input type=text name=\"noidungcv\" style=\"border-style:none;width:100%;background:#00FFFF;height:150px;\"> </td>
		</tr>
		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b> Ghi chú </b> </td>
		<td><input type=text name=\"ghichu\" style=\"border-style:none;width:100%;background:#00FFFF;height:100px;\"> </td>
		</tr>
		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b> Tình trạng </b> </td>
		<td><input type=text name=\"ttktafter\" style=\"border-style:none;width:100%;background:#00FFFF;height:100px;\"> </td>
		</tr>
</table> 
<input type=hidden name=mabaoduong1 value=\"$mabaoduong\">
</form>
</body>
</html> " ;
}

if($mavtbd!="")
{

$mabaoduong1=isset($_POST['mabaoduong1']) ? $_POST['mabaoduong1'] : '';

$tenthietbisql13 = mysql_query("SELECT * FROM hososcbd_iso WHERE maql='$mabaoduong1' and mavt='$mavtbd'") ;
while($row = mysql_fetch_array($tenthietbisql13))
{
	$ngayth =$row['ngayth'];	
	$ngaykt =$row['ngaykt'];
	$ttktbefore =$row['ttktbefore'];
	$ghichu =$row['ghichu'];
	$ttktafter =$row['ttktafter'];
	$ndbaoduong =$row['ndbaoduong'];
	$hoso =$row['hoso'];
}

echo "
	<html lang=\"vi\">
	<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
</head>
<body>
<table style=\"width:100%\">
<tr>
<td>
<h2> <p style=\"text-align:center;color:blue;\"> BẢO DƯỠNG THIẾT BỊ <br/></h2>
</p>
</td>
</tr>
</table>
<br/>
<form action=\"formsc.php\" method=\"post\">
<table class=\"table7\">
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFE4B5;\"> <strong>Mã quản lý</strong> </td>
<td><select style=\"border-style:none;width:100%;background:#00FFFF;height:30px;\">
		<option value=\"$mabaoduong1\">$mabaoduong1</option>
    	</select></td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#9966CC;\"> <strong>Mã thiết bị</strong> </td>
<td> <select style=\"border-style:none;width:100%;background:#00FFFF;height:30px;\">
		<option value=\"$mavtbd\"> $mavtbd</option>
		</select> </td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Người TH</strong> </td>
<td><input style=\"border-style:none;width:100%;text-align:center;font_family:Times New Roman;background:#00FFFF;height:30px;\" name=\"ngth\" size=\"36\" type=\"text\" value=\"$ngth\">  </td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Số hồ sơ</strong> </td>
<td> <input style=\"border-style:none;width:100%;text-align:center;font_family:Times New Roman;background:#00FFFF;height:30px;\" name=\"sohs\" size=\"36\" type=\"text\" value=\"$hoso\" > </td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Ngày TH</strong> </td>
<td><input style=\"border-style:none;width:100%;text-align:center;font_family:Times New Roman;background:#00FFFF;height:30px;\" name=\"ngayth\" size=\"36\" type=\"text\" value=\"$ngayth\">  </td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Ngày KT </strong></td>
<td> <input style=\"border-style:none;width:100%;text-align:center;font_family:Times New Roman;background:#00FFFF;height:30px;\" name=\"ngaykt\" size=\"36\" type=\"text\" value=\"$ngaykt\"> </td>
</tr>
</table>

<br/>
<table class=\"table7\">
		<tr>
		<td  style=\"text-align:left;color:black;font-size: 18;width:300px;height:150px;padding-left:20px;background-color:#FFDAB9;\"><b> Tình trạng kỹ thuật ban đầu </b> </td>
		<td><input type=text name=\"ttktbefore\" style=\"border-style:none;width:100%;background:#00FFFF;height:150px;\" value=\"$ttktbefore\"> </td>
		</tr>
		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:150px;padding-left:20px;background-color:#FFDAB9;\"><b> Yêu cầu khách hàng </b></td>
		<td><input type=text name=\"yeucau\" style=\"border-style:none;width:100%;background:#00FFFF;height:150px;\"> </td>
		</tr>
		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:150px;padding-left:20px;background-color:#FFDAB9;\"><b>Nội dung công việc </b></td>
		<td><input type=text name=\"ndbaoduong\" style=\"border-style:none;width:100%;background:#00FFFF;height:150px;\" value=\"$ndbaoduong\"> </td>
		</tr>
		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b> Ghi chú </b> </td>
		<td><input type=text name=\"ghichu\" style=\"border-style:none;width:100%;background:#00FFFF;height:100px;\" value=\"$ghichu\"> </td>
		</tr>
		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b> Tình trạng </b> </td>
		<td><input type=text name=\"ttktafter\" style=\"border-style:none;width:100%;background:#00FFFF;height:100px;\" value=\"$ttktafter\"> </td>
		</tr>
</table> 
<input type=hidden name=mabaoduong2 value=\"$mabaoduong1\">
<input type=hidden name=mavtbd1 value=\"$mavtbd\">
<br/>
	<input type=hidden name=username value=$username>
	<center><input type=\"image\" name=\"xuatphieubd\" value =\"phieubaoduongthietbi\" src=\"upload/xuatbd.jpg\" alt=\"Xem\" onclick=\"this.form.xuatphieubd.value = this.value\"/>
	<input type=hidden name=xuatphieubd value=\"\"></center>

</form>
</body>
</html> " ;
}

if($xuatphieubd=="phieubaoduongthietbi")
{

$sohs=isset($_POST['sohs']) ? $_POST['sohs'] : '';
$ngayth=isset($_POST['ngayth']) ? $_POST['ngayth'] : '';
$ngaykt=isset($_POST['ngaykt']) ? $_POST['ngaykt'] : '';
$yeucau=isset($_POST['yeucau']) ? $_POST['yeucau'] : '';
$ttktbefore=isset($_POST['ttktbefore']) ? $_POST['ttktbefore'] : '';
$ndbaoduong=isset($_POST['ndbaoduong']) ? $_POST['ndbaoduong'] : '';
$ttktafter=isset($_POST['ttktafter']) ? $_POST['ttktafter'] : '';
$ghichu=isset($_POST['ghichu']) ? $_POST['ghichu'] : '';
$mavtbd1=isset($_POST['mavtbd1']) ? $_POST['mavtbd1'] : '';

$mabaoduong2=isset($_POST['mabaoduong2']) ? $_POST['mabaoduong2'] : '';


// cap nhat thong tin phieu kiem tra sua chua
$update = "update hososcbd_iso SET  
ngayth= '$ngayth',
ngaykt= '$ngaykt',
ttktbefore='$ttktbefore',
ndbaoduong='$ndbaoduong',
ttktafter='$ttktafter',
ghichu='$ghichu'
WHERE maql='$mabaoduong2' and mavt='$mavtbd1'" ;

mysql_query($update) or die(mysql_error());

$tenthietbisql12 = mysql_query("SELECT * FROM hososcbd_iso WHERE maql='$mabaoduong2' and mavt='$mavtbd1'") ;
while($row = mysql_fetch_array($tenthietbisql12))
{
	$somay =$row['somay'];
}

echo "
	<html lang=\"vi\">
	<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
</head>
<body>

<form action=\"formsc.php\" method=\"post\">
<table style=\"margin-left:250px;\">
<tr>
<td style=\"width:30%;\">
XN Địa Vật Lý GK <br/>
X&#432;&#7903;ng
SCTB&#272;VL
</td>
<td style=\"width:70%;\">
<h2> <p style=\"text-align:center;\"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PHIẾU BẢO DƯỠNG THIẾT BỊ </p> </h2>
 <p style=\"text-align:center;\"> Thực hiện yêu cầu dịch vụ số:    $sohs     <b> Ngày: 03/12/12  </b> </p>
</td>
</tr>
</table>
	  <br/>
		
		<table style=\"margin-left:200px;\">
		<tr>
		<td style=\"width:500px;padding-left:50px;\">1. Nội dung </td>
	    </tr>
		</table>
	<table class=\"table1\" align=\"center\">
		<tr>
<th style=\"text-align:center;color:white;font-size: 15;width:30px; height:30px; \"> STT</th>
<th style=\"text-align:center;color:white;font-size: 15;width:140px;\"> Tên thiết bị</th>
<th style=\"text-align:center;color:white;font-size: 15;width:80px;\"> Số </th>
<th style=\"text-align:center;color:white;font-size: 15;width:80px;\"> Số hồ sơ </th>
<th style=\"text-align:center;color:white;font-size: 15;width:80px;\"> Ngày thực hiện</th>
<th style=\"text-align:center;color:white;font-size: 15 ;width:100px;\"> Người thực hiện</th>
<th style=\"text-align:center;color:white;font-size: 15 ;width:200px;\"> Nội dung công việc</th>
<th style=\"text-align:center;color:white;font-size: 15 ;width:80px;\">  Kết quả</th>
</ul>
</tr>";
$i=1;
	$tenthietbisql13 = mysql_query("SELECT * FROM hososcbd_iso WHERE maql='$mabaoduong2'") ;
	while($row = mysql_fetch_array($tenthietbisql13))
	{
		$mavt=$row['mavt'];
		$hoso=$row['hoso'];
		$ngth =$row['ngth'];
		$ngayth =$row['ngayth'];	
		$ngaykt =$row['ngaykt'];
		$ttktbefore =$row['ttktbefore'];
		$ghichu =$row['ghichu'];
		$ttktafter =$row['ttktafter'];
		$ndbaoduong =$row['ndbaoduong'];
		$somay =$row['somay'];
	
		
		echo"
		<tr>
		<td  style=\"text-align:center;font-size: 15;\"> $i </td>
		<td  style=\"text-align:left;font-size: 15;padding-left:20px;\">  $mavt </td>
		<td  style=\"text-align:center;font-size: 15;\">  $somay </td>
		<td  style=\"text-align:center;font-size: 15;\">  $hoso </td>
		<td  style=\"text-align:center;font-size: 15;\">  $ngayth </td>
		<td  style=\"text-align:center;font-size: 15;\">  $ngth </td>
		<td  style=\"text-align:center;font-size: 15;\">  $ndbaoduong</td>
		<td  style=\"text-align:center;font-size: 15;\">  $ttktafter </td>
		</tr>";
		$i++;
	}
			echo"
		</table> 
		<br/>
		<input type=hidden name=username value=$username>
		<center><input type=\"image\" name=\"inphieubd\" value =\"Inphieubaoduong\" src=\"upload/Insc.jpg\" alt=\"Xem\" onclick=\"this.form.inphieubd.value = this.value\"/>
	<input type=hidden name=inphieubd value=\"\"></center>
	
	<input type=hidden name=mavtbd2 value=\"$mavtbd1\">
	<input type=hidden name=mabaoduong3 value=\"$mabaoduong2\">
	
</form>
</body>
</html> " ;
}

if($inphieubd=="Inphieubaoduong")
{

$mavtbd2=isset($_POST['mavtbd2']) ? $_POST['mavtbd2'] : '';
$mabaoduong3=isset($_POST['mabaoduong3']) ? $_POST['mabaoduong3'] : '';

echo "
	<html lang=\"vi\">
	<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
</head>
<body>


<table width=\"100%\" >
<tr>
<td style=\"width:30%;\">
XN Địa Vật Lý GK <br/>
X&#432;&#7903;ng
SCTB&#272;VL
</td>
<td style=\"width:70%;\">
<center>  <strong>PHIẾU BẢO DƯỠNG THIẾT BỊ </strong> <br/>
 Thực hiện yêu cầu dịch vụ số:    $sohs     <b> Ngày: 03/12/12  </b> </center>
</td>
</tr>
</table>
	  <br/>
		
		<table>
		<tr>
		<td>1. Nội dung </td>
	    </tr>
		</table>
	<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:solid black .5pt;
 mso-border-themecolor:text1;mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:31.0pt'>
  <td width=43 valign=top style='width:.45in;border:solid black 1.0pt;
  mso-border-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:31.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:12.0pt;
  font-family:\"Times New Roman\",\"serif\"'>STT<o:p></o:p></span></p>
  </td>
  <td width=114 valign=top style='width:85.5pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:31.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>Tên</span></span><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'> <span
  class=SpellE>thi&#7871;t</span> <span class=SpellE>b&#7883;</span><o:p></o:p></span></p>
  </td>
  <td width=78 valign=top style='width:58.5pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:31.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>S&#7889;</span></span><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'><o:p></o:p></span></p>
  </td>
  <td width=114 valign=top style='width:85.5pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:31.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>S&#7889;</span></span><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'> <span
  class=SpellE>h&#7891;</span> <span class=SpellE>s&#417;</span><o:p></o:p></span></p>
  </td>
  <td width=108 valign=top style='width:81.0pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:31.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>Ngày</span></span><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'> <span
  class=SpellE>th&#7921;c</span> <span class=SpellE>hi&#7879;n</span><o:p></o:p></span></p>
  </td>
  <td width=114 valign=top style='width:85.5pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:31.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>Ng&#432;&#7901;i</span></span><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'> <span
  class=SpellE>th&#7921;c</span> <span class=SpellE>hi&#7879;n</span><o:p></o:p></span></p>
  </td>
  <td width=222 valign=top style='width:166.5pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:31.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>N&#7897;i</span></span><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'> dung <span
  class=SpellE>công</span> <span class=SpellE>vi&#7879;c</span><o:p></o:p></span></p>
  </td>
  <td width=85 valign=top style='width:63.9pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:31.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>K&#7871;t</span></span><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'> <span
  class=SpellE>qu&#7843;</span><o:p></o:p></span></p>
  </td>
 </tr>";
$i=1;
	$tenthietbisql13 = mysql_query("SELECT * FROM hososcbd_iso WHERE maql='$mabaoduong3'") ;
	while($row = mysql_fetch_array($tenthietbisql13))
	{
		$mavt=$row['mavt'];
		$hoso=$row['hoso'];
		$somay=$row['somay'];
		$ngth =$row['ngth'];
		$ngayth =$row['ngayth'];	
		$ngaykt =$row['ngaykt'];
		$ttktbefore =$row['ttktbefore'];
		$ghichu =$row['ghichu'];
		$ttktafter =$row['ttktafter'];
		$ndbaoduong =$row['ndbaoduong'];	
		
		echo"
		<tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes;height:40.0pt'>
  <td width=43 valign=top style='width:.45in;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;
  mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:40.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'> $i<o:p></o:p></span></p>
  </td>
  <td width=114 valign=top style='width:85.5pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:40.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'> $mavt<o:p></o:p></span></p>
  </td>
  <td width=78 valign=top style='width:58.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:40.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'> $somay<o:p></o:p></span></p>
  </td>
  <td width=114 valign=top style='width:85.5pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:40.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'> $hoso<o:p></o:p></span></p>
  </td>
  <td width=108 valign=top style='width:81.0pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:40.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>$ngayth<o:p></o:p></span></p>
  </td>
  <td width=114 valign=top style='width:85.5pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:40.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span class=SpellE><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>$ngth</span></span><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'><o:p></o:p></span></p>
  </td>
  <td width=222 valign=top style='width:166.5pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:40.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'><o:p> $ndbaoduong</o:p></span></p>
  </td>
  <td width=85 valign=top style='width:63.9pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:40.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span class=SpellE><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>$ttktafter</span></span><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'><o:p></o:p></span></p>
  </td>
 </tr>";
		$i++;
	}
			
		echo"</table>"; 
header("Content-Disposition:attchment;filename=\"vd.doc\""); 
exit;	
}

if($them!="")
{

$sophieu=isset($_POST['sophieu']) ? $_POST['sophieu'] : '';
$ngay=isset($_POST['ngay']) ? $_POST['ngay'] : '';
$khachhang=isset($_POST['khachhang']) ? $_POST['khachhang'] : '';
$donvi=isset($_POST['donvi']) ? $_POST['donvi'] : '';
$nhanvien=isset($_POST['nhanvien']) ? $_POST['nhanvien'] : '';

$add++;
for($i=1;$i<=5+(10*$add);$i++){
$tenthietbicvk[$i]=isset($_POST["tenthietbicvk$i"]) ? $_POST["tenthietbicvk$i"] : '';
$somaycvk[$i]=isset($_POST["somaycvk$i"]) ? $_POST["somaycvk$i"] : '';
$soluongcvk[$i]=isset($_POST["soluongcvk$i"]) ? $_POST["soluongcvk$i"] : '';
$tinhtrangcvk[$i]=isset($_POST["tinhtrangcvk$i"]) ? $_POST["tinhtrangcvk$i"] : '';
$ndyeucaucvk[$i]=isset($_POST["ndyeucaucvk$i"]) ? $_POST["ndyeucaucvk$i"] : '';

echo"<input type=hidden name=tenthietbicvk$i value=\"$tenthietbicvk[$i]\">
	<input type=hidden name=somaycvk$i value=\"$somaycvk[$i]\">
	<input type=hidden name=soluongcvk$i value=\"$soluongcvk[$i]\">
	<input type=hidden name=tinhtrangcvk$i value=\"$tinhtrangcvk[$i]\">
	<input type=hidden name=ndyeucaucvk$i value=\"$ndyeucaucvk[$i]\"> ";

}


echo "
	<html lang=\"vi\">
<html lang=\"vi\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
<SCRIPT LANGUAGE=\"JavaScript\" SRC=\"java/CalendarPopup.js\"></SCRIPT>
<SCRIPT LANGUAGE=\"JavaScript\">
var cal = new CalendarPopup();
</SCRIPT>
</head.
<body>
<form method=\"post\" action=\"formsc.php\" enctype=\"multipart/form-data\" name=\"example\">
<table width=\"100%\">
<tr>
<td  style=\"padding-left:50px;width:20%;\"> XN Địa Vật Lý GK <br/>X&#432;&#7903;ng
SCTB&#272;VL </td>
<td style=\"width:80%;\"> 
<h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PHIẾU YÊU CẦU DỊCH VỤ <br/></h2>
 

</td>
</tr>
</table>
<br/>
<table style=\"margin-left:50px;\">
<tr>
<td style=\"width:500px;\"> 1. Người yêu cầu   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\" size=\"50\" name=\"khachhang\" type=\"text\" value=\"$khachhang\">          </td>

<td style=\"width:300px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Đơn vị</strong> 
	<select name=\"donvi\" style=\"width:200px;background:#8adaa5;height:25px;\" >
	<option value=\"$donvi\">$donvi</option>";
		$r3 = mysql_query("SELECT DISTINCT madv,tendv FROM donvi_iso");
		while($row = mysql_fetch_array($r3))
		{
			$madv =$row['madv'];
			$tendv = $row['tendv'];
		  echo "<option style=\"display:table-row\"></option>
			<option style=\"display:table-cell;\" value=\"$madv\">$madv</option>		                
	        <option style=\"display:table-cell;\" value=\"$madv\">$tendv</option>";
		}		
	     echo"</select>
			
</td>
<td style=\"width:300px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Ngày</strong>  <input  name=\"ngay\" size=\"20\" type=\"text\" style=\"background:#8adaa5;height:25px;\" value=\"$ngay\"/>
		<A HREF=\"#\"
                onClick=\"cal.select(document.forms['example'].ngay,'anchor1','dd/MM/yyyy'); return false;\"
		NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A> </p> </td>
</tr>
<tr>
<td> 2. Người nhận yêu cầu   <input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\" size=\"50\"  name=\"nhanvien\"  type=\"text\" value=\"$nhanvien\">          </td>
<td> </td>
</tr>

<tr>
<td> 3. Nội dung:           </td>
<td> </td>
</tr>
</table>
<table class=\"table1\" style=\"margin-left:50px;\">

	<tr>
<th style=\"text-align:center;font-size: 15;width:30px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:140px;\"> TÊN THIẾT BỊ</th>
<th style=\"text-align:center;font-size: 15;width:80px;\"> SỐ MÁY</th>
<th style=\"text-align:center;font-size: 15 ;width:60px;\"> SỐ LƯỢNG </th>
<th style=\"text-align:center;font-size: 15 ;width:120px;\"> TÌNH TRẠNG KỸ THUẬT HIỆN TẠI CỦA THIẾT BỊ </th>
<th style=\"text-align:center;font-size: 15 ;width:180px;\"> NỘI DUNG YÊU CẦU</th>
</ul>
</tr>";
	
$i=1;
	while($i<=5+(10*$add)){
		if($tenthietbicvk[$i]!=""){
		echo"
		<tr>
		<td  style=\"text-align:center;color:black;font-size: 15;\"> $i </td>
		<td><input type=text name=\"tenthietbicvk$i\" style=\"border-style:none;width:100%;\" value=\"$tenthietbicvk[$i]\">  </td>
		<td><input type=text name=\"somaycvk$i\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$somaycvk[$i]\" \"></td>
		<td><input type=text name=\"soluongcvk$i\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$soluongcvk[$i]\"> </td>
		<td><input type=text name=\"tinhtrangcvk$i\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$tinhtrangcvk[$i]\"></td>
		<td><input type=text name=\"ndyeucaucvk$i\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$ndyeucaucvk[$i]\"> </td>	
		</tr>";
		}else{
			echo"
		<tr>
		<td  style=\"text-align:center;color:black;font-size: 15;\"> $i </td>
		<td><input type=text name=\"tenthietbicvk$i\" style=\"border-style:none;width:100%;\" >  </td>
		<td><input type=text name=\"somaycvk$i\" style=\"border-style:none;width:100%;text-align:center;\" \"></td>
		<td><input type=text name=\"soluongcvk$i\" style=\"border-style:none;width:100%;text-align:center;\" > </td>
		<td><input type=text name=\"tinhtrangcvk$i\" style=\"border-style:none;width:100%;text-align:center;\" </td>
		<td><input type=text name=\"ndyeucaucvk$i\" style=\"border-style:none;width:100%;text-align:center;\"> </td>	
		</tr>";
		}
		$i++;
	}
		
        echo"</table>
		 <ul id=\"mbbuttonaddebul_table\" class=\"mbbuttonaddebul_menulist\" style=\"width: 197px; height: 29px;margin-left:10px;\">
  <a><input type=\"image\" name=\"them\"  value =\"them\" id=\"mbi_mbbuttonadd_1\" src=\"buttonadd_files/add.jpg\" name=\"mbi_mbbuttonadd_1\" style=\"vertical-align: bottom;\" border=\"0\" alt=\"Thêm\" title=\"\" onclick=\"this.form.them.value = this.value\" /></a>
</ul>
<input type=hidden name=them value=\"\">
<script type=\"text/javascript\" src=\"buttonadd_files/mbjsmbbuttonadd.js\"></script>
		
	<table align=\"center\"> 
	<tr> <td>
	<input type=\"image\" name=\"nhapcvk\" value =\"nhapphieucvk\" src=\"upload/nhapdl.jpg\" alt=\"Nhap\" onclick=\"this.form.nhapcvk.value = this.value\"/></td>
	<input type=hidden name=nhapcvk value=\"\">
	<input type=hidden name=add value=\"$add\">
	</form>
	<form action=\"index.php\" method=\"post\">
    <input type=hidden name=username value=$username>
	 <input type=hidden name=password value=$password>
  	 <input type=hidden name=\"submit\" value=\"Hồ sơ SC/BD\">
 	<td><input type=\"image\" src=\"upload/back.jpg\"  /></td>
	</tr>
	</table>
   </form>
</body>
</html> " ;

}

if($nhapcvk=="nhapphieucvk")
{

$ngay=isset($_POST['ngay']) ? $_POST['ngay'] : '';
$khachhang=isset($_POST['khachhang']) ? $_POST['khachhang'] : '';
$donvi=isset($_POST['donvi']) ? $_POST['donvi'] : '';
$nhanvien=isset($_POST['nhanvien']) ? $_POST['nhanvien'] : '';


$ngaystemp = $ngay;
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	$p = stripos($ngaystemp,"/") ;

if ($i== 0) {
	$ngays = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 1) {
	$thangs = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 2) {
	$nams = trim ($ngaystemp) ;
} 	
$p++ ;
$ngaystemp = substr($ngaystemp,$p);
}

$sophieu="$nams$thangs$ngays";
for($i=1;$i<=5+(10*$add);$i++){
$tenthietbicvk[$i]=isset($_POST["tenthietbicvk$i"]) ? $_POST["tenthietbicvk$i"] : '';
$somaycvk[$i]=isset($_POST["somaycvk$i"]) ? $_POST["somaycvk$i"] : '';
$soluongcvk[$i]=isset($_POST["soluongcvk$i"]) ? $_POST["soluongcvk$i"] : '';
$tinhtrangcvk[$i]=isset($_POST["tinhtrangcvk$i"]) ? $_POST["tinhtrangcvk$i"] : '';
$ndyeucaucvk[$i]=isset($_POST["ndyeucaucvk$i"]) ? $_POST["ndyeucaucvk$i"] : '';
}

$result=mysql_query("SELECT max(stt) as tt FROM hosocvk_iso");
while($row = mysql_fetch_array($result))
{
	$recc =$row['tt'];
}
$recc++;

//Insert data to MySQL
for($i=1;$i<=5+(10*$add);$i++){

if($tenthietbicvk[$i]!=NULL){

$maquanly="$sophieu-$donvi";
$insert = "insert into hosocvk_iso(
stt,
maql,
tenvt,
sovt,
lydo,
ngayyc,
madv,
soycdv,
solg,
tiendocv,
tbdosc,
ngyeucau,
ngnhyeucau,
ngaykt,
ngth,
ttktbefore,
honghoc,
khacphuc,
ttktafter,
vattusc,
ndcv,
ghichu,
ngayth,
noith,
chiphi
) values (
'$recc',
'$maquanly',
'$tenthietbicvk[$i]',
'$somaycvk[$i]',
'1',
'$ngays/$thangs/$nams',
'$donvi',
'$sophieu',
'$soluongcvk[$i]',
'',
'',
'$khachhang',
'$nhanvien',
'',
'',
'$tinhtrangcvk[$i]',
'',
'',
'',
'',
'$ndyeucaucvk[$i]',
'',
'',
'',
''
)" ;
mysql_query($insert) or die(mysql_error());
$recc++;
}
}

echo"
<html lang=\"vi\">
<html lang=\"vi\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
<SCRIPT LANGUAGE=\"JavaScript\" SRC=\"java/CalendarPopup.js\"></SCRIPT>
<SCRIPT LANGUAGE=\"JavaScript\">
var cal = new CalendarPopup();
</SCRIPT>
</head>
<body>

<table style=\"width:100%;\">
<tr>
<td> XN Địa Vật Lý GK <br/> Xưởng  SC-CMĐVL </td>
<td>  <b>&nbsp;&nbsp;&nbsp;&nbsp; PHIẾU YÊU CẦU DỊCH VỤ </b> <br/><strong>Số hồ sơ:</strong> <strong>$sophieu</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Ngày :</strong> </b>$ngays/$thangs/$nams </td>
</tr>
</table
<br/>
<table style=\"width:100%;\">
<tr>
<td style=\"width:60%;\"> 1. Người yêu cầu,Сдал: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>$khachhang </b></td> 
<td style=\"width:40%;\"> Đơn vị: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b> $donvi </b> </td>
</tr>
<tr>
<td > 2. Người nhận yêu cầu,Принял: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>$nhanvien </b></td>
<td> </td>
</tr>
<tr>
<td > 3. Nội dung: </td>
<td> </td>
</tr>
</table>
<br/>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=619
 style='width:6.45in;border-collapse:collapse;border:none;mso-border-alt:solid black .5pt;
 mso-border-themecolor:text1;mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=45 valign=top style='width:33.5pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>STT<o:p></o:p></span></b></p>
  </td>
  <td width=143 valign=top style='width:106.9pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><b style='mso-bidi-font-weight:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>Tên</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
  \"Times New Roman\",\"serif\"'> <span class=SpellE>thi&#7871;t</span> <span
  class=SpellE>b&#7883;</span><o:p></o:p></span></b></p>
  </td>
  <td width=66 valign=top style='width:49.5pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><b style='mso-bidi-font-weight:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>S&#7889;</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
  \"Times New Roman\",\"serif\"'> <span class=SpellE>máy</span><o:p></o:p></span></b></p>
  </td>
  <td width=60 valign=top style='width:45.2pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><b style='mso-bidi-font-weight:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>S&#7889;</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
  \"Times New Roman\",\"serif\"'> <span class=SpellE>l&#432;&#7907;ng</span><o:p></o:p></span></b></p>
  </td>
  <td width=168 valign=top style='width:125.8pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><b style='mso-bidi-font-weight:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>Tình</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
  \"Times New Roman\",\"serif\"'> <span class=SpellE>tr&#7841;ng</span> <span
  class=SpellE>k&#7929;</span> <span class=SpellE>thu&#7853;t</span> <span
  class=SpellE>hi&#7879;n</span> <span class=SpellE>t&#7841;i</span> <span
  class=SpellE>c&#7911;a</span> <span class=SpellE>thi&#7871;t</span> <span
  class=SpellE>b&#7883;</span><o:p></o:p></span></b></p>
  </td>
  <td width=138 valign=top style='width:103.5pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><b style='mso-bidi-font-weight:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>N&#7897;i</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
  \"Times New Roman\",\"serif\"'> dung <span class=SpellE>yêu</span> <span
  class=SpellE>c&#7847;u</span><o:p></o:p></span></b></p>
  </td>
 </tr>";
 
  $i =1 ;
	while($i<=5+(10*$add)){
	if($tenthietbicvk[$i]!=""){
		
 echo"<tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes'>
  <td width=45 valign=top style='width:33.5pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;
  mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:12.0pt;
  font-family:\"Times New Roman\",\"serif\"'>$i<o:p></o:p></span></p>
  </td>
  <td width=143 valign=top style='width:106.9pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span class=SpellE><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>$tenthietbicvk[$i]<o:p></o:p></span></p>
  </td>
  <td width=66 valign=top style='width:49.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:12.0pt;
  font-family:\"Times New Roman\",\"serif\"'>$somaycvk[$i]<o:p></o:p></span></p>
  </td>
  <td width=60 valign=top style='width:45.2pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:12.0pt;
  font-family:\"Times New Roman\",\"serif\"'>$soluongcvk[$i]<o:p></o:p></span></p>
  </td>
  <td width=168 valign=top style='width:125.8pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>$tinhtrangcvk[$i]</span><o:p></o:p></span></p>
  </td>
  <td width=138 valign=top style='width:103.5pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:12.0pt;
  font-family:\"Times New Roman\",\"serif\"'>$ndyeucaucvk[$i] &nbsp;<o:p></o:p></span></p>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
";
 	}
	$i++;
}
 
echo"</table>

<br/>
<br/>
<br/>
<br/>


<p style=\"font:Times New Roman;\"> 4. Xem xét của Xưởng:    </p>
<br/>
<br/>
<br/>
<br/>
<p style=\"font:Times New Roman;\"> <strong>Người yêu cầu:</strong>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>(ký tên)</i> </p>
<p style=\"font:Times New Roman;\"> <strong>Người nhận yêu</strong> cầu:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i>(ký tên)</i> </p>
<p style=\"font:Times New Roman;\"> <strong>X.trưởng/X.phó/Nhóm</strong> trưởng:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>(ký tên) </i> </p>

<p style=\"font:Times New Roman;\"> BM.25.02 <br/>
01/01/2024 </p>

<br/>
</body>
</html> ";
header("Content-Type: application/msword");
header("Content-Disposition:attchment;filename=\"$nams$thangs$ngays-YCDV-CVK.doc\""); 
header("Pragma: no-cache");
header("Expires: 0");
exit;


}

if($sohscvk!="")
{

$tenthietbisql0 = mysql_query("SELECT * FROM hosocvk_iso WHERE soycdv='$sohscvk' ") ;
while($row = mysql_fetch_array($tenthietbisql0))
{
	$ngayyc =$row['ngayyc'];
	$madv =$row['madv'];	
	$ngyeucau =$row['ngyeucau'];
	$ngnhyeucau =$row['ngnhyeucau'];
}	

$ngaystamp = $ngayyc;
for($i=0;$i<=strlen($ngaystamp);$i++) {
		$p = stripos($ngaystamp,"/") ;
	if ($i== 0) {
		$ngays = trim (substr($ngaystamp,0,$p)) ;
	} 	
	if ($i== 1) {
		$thangs = trim (substr($ngaystamp,0,$p)) ;
	} 	
	if ($i== 2) {
		$nams = trim ($ngaystamp,$p) ;
	} 	
		$p++ ;
		$ngaystamp = substr($ngaystamp,$p);
}

$ngay=isset($_POST['ngay']) ? $_POST['ngay'] : '';
echo "
		<html lang=\"vi\">
<html lang=\"vi\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
<SCRIPT LANGUAGE=\"JavaScript\" SRC=\"java/CalendarPopup.js\"></SCRIPT>
<SCRIPT LANGUAGE=\"JavaScript\">
var cal = new CalendarPopup();
</SCRIPT>
</head.
<body>
<form method=\"post\" action=\"formsc.php\" enctype=\"multipart/form-data\" name=\"example\">
<table width=\"100%;\">
<tr>
<td  style=\"padding-left:50px;width:30%;\">XN Địa Vật Lý GK <br/>X&#432;&#7903;ng
SCTB&#272;VL </td>

<td>
<h2> <p style=\"color:blue;width:70%;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BIÊN BẢN BÀN GIAO THIẾT BỊ <br/></h2>
</p>
</td>
</tr>
</table>
<table align=\"center\">
<tr>
<td>
<strong>Số hồ sơ: $sohscvk  </strong>	</td>
 <td>
 <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Ngày: $ngay  </strong> 

</td>
</tr>
</table>
<br/>
<br/>
<table style=\"margin-left:50px;\">
<tr>
<td> 1. Đại diện bên giao:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong> $ngnhyeucau </strong>      </td>
<td> Đơn vị:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>X&#432;&#7903;ng
SCTB&#272;VL</strong> </td>
</tr>
<tr>
<td> 2. Đại diện bên nhận:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <strong>$ngyeucau  </strong>  </td>
<td> Đơn vị:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>$madv</strong> </td>
</tr>
<tr>
<td> 3. Nội dung: Sau khi kiểm tra đã cùng nhau giao nhận các thiết bị sau: </td>
<td> </td>
</tr>
</table>

<table class=\"table1\" style=\"margin-left:50px;\">

	<tr>
<th style=\"text-align:center;font-size: 15;width:30px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:140px;\"> TÊN THIẾT BỊ</th>
<th style=\"text-align:center;font-size: 15;width:80px;\"> SỐ MÁY</th>
<th style=\"text-align:center;font-size: 15 ;width:80px;\"> ĐƠN VỊ TÍNH</th>
<th style=\"text-align:center;font-size: 15 ;width:80px;\"> SỐ LƯỢNG </th>
<th style=\"text-align:center;font-size: 15 ;width:200px;\"> TÌNH TRẠNG KỸ THUẬT CỦA THIẾT BỊ </th>

</ul>
</tr>";
$i=1;	
	$tenthietbisql1 = mysql_query("SELECT * FROM hosocvk_iso WHERE soycdv='$sohscvk' ") ;
	while($row = mysql_fetch_array($tenthietbisql1))
	{
		$tenvt =$row['tenvt'];
		$sovt =$row['sovt'];	
		$solg =$row['solg'];
		$ttktafter =$row['ttktafter'];
		echo"
		<tr>
		<td style=\"text-align:center;color:black;font-size: 15;\"> $i </td>
		<td> &nbsp; $tenvt </td>
		<td style=\"text-align:center;color:black;font-size: 15;\"> $sovt </td>
		<td style=\"text-align:center;color:black;font-size: 15;\"> </td>
		<td style=\"text-align:center;color:black;font-size: 15;\"> $solg </td>
		<td style=\"text-align:center;color:black;font-size: 15;\"> $ttktafter </td>	
		</tr>";
		$i++;
	}
        echo"</table>
		<br/>
	 <input type=hidden name=username value=$username>
	 <input type=hidden name=password value=$password>
	 <input type=hidden name=sohscvk1 value=\"$sohscvk\">

	 
	<table align=\"center\"> 
	<tr> 
	<td>
	<input type=\"image\" name=\"xuatcvk\" value =\"xuatbbcvk\" src=\"upload/xuatdl.jpg\" alt=\"Nhap\" onclick=\"this.form.xuatcvk.value = this.value\"/></td>
	<input type=hidden name=xuatcvk value=\"\">
	<input type=hidden name=ngay1 value=\"$ngay\">
	</form>
	<form action=\"index.php\" method=\"post\">
         <input type=hidden name=username value=$username>
	 <input type=hidden name=password value=$password>
  	 <input type=hidden name=\"submit\" value=\"Hồ sơ SC/BD\">
 	<td><input type=\"image\" src=\"upload/back.jpg\"  /></td>
	</tr>
	</table>
   </form>
</body>
</html> " ;
}

if($xuatcvk=="xuatbbcvk")
{

$sohscvk1=isset($_POST['sohscvk1']) ? $_POST['sohscvk1'] : '';

$tenthietbisql14 = mysql_query("SELECT * FROM hosocvk_iso WHERE soycdv='$sohscvk1'") ;
while($row = mysql_fetch_array($tenthietbisql14))
{
	$ngayyc =$row['ngayyc'];
	$madv =$row['madv'];	
	$ngyeucau =$row['ngyeucau'];
	$ngnhyeucau =$row['ngnhyeucau'];
}	

$ngaystamp = $ngayyc;
for($i=0;$i<=strlen($ngaystamp);$i++) {
		$p = stripos($ngaystamp,"/") ;
	if ($i== 0) {
		$ngays = trim (substr($ngaystamp,0,$p)) ;
	} 	
	if ($i== 1) {
		$thangs = trim (substr($ngaystamp,0,$p)) ;
	} 	
	if ($i== 2) {
		$nams = trim ($ngaystamp,$p) ;
	} 	
		$p++ ;
		$ngaystamp = substr($ngaystamp,$p);
}
$ngay1=isset($_POST['ngay1']) ? $_POST['ngay1'] : '';
echo"
<html lang=\"vi\">
<html lang=\"vi\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
<SCRIPT LANGUAGE=\"JavaScript\" SRC=\"java/CalendarPopup.js\"></SCRIPT>
<SCRIPT LANGUAGE=\"JavaScript\">
var cal = new CalendarPopup();
</SCRIPT>
</head>
<body>

<table style=\"width:100%;\">
<tr>
<td>XN Địa Vật Lý GK <br/> <strong>X&#432;&#7903;ng
SCTB&#272;VL</strong> </td>
<td>  <b>&nbsp;&nbsp;&nbsp;&nbsp; BIÊN BẢN BÀN GIAO THIẾT BỊ </b> <br/> <b>Số hồ sơ: $sohscvk1 </b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Ngày :  $ngay1 </b></td>
</tr>
</table>
<table>
<br/>
<table style=\"width:100%;\">
<tr>
<td style=\"width:60%;\"> 1. Đại diện bên giao: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>$ngnhyeucau </b></td> 
<td style=\"width:40%;\"> Đơn vị  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>X&#432;&#7903;ng
SCTB&#272;VL</strong></td> 
</tr>
<tr>
<td style=\"width:60%;\"> 2. Đại diện bên nhận: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>$ngyeucau </b></td>
<td style=\"width:40%;\"> Đơn vị &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>$madv</strong></td> 
</tr>
</table>
<table>
<tr>
<td>3. Nội dung: Sau khi kiểm tra đã cùng nhau giao nhận các thiết bị sau:</td>
</tr>
</table>

 <br/>
 
   
 <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:solid black .5pt;
 mso-border-themecolor:text1;mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=43 valign=top style='width:.45in;border:solid black 1.0pt;
  mso-border-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>STT<o:p></o:p></span></b></p>
  </td>
  <td width=180 valign=top style='width:135.0pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><b style='mso-bidi-font-weight:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>Tên</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
  \"Times New Roman\",\"serif\"'> <span class=SpellE>thi&#7871;t</span> <span
  class=SpellE>b&#7883;</span><o:p></o:p></span></b></p>
  </td>
  <td width=96 valign=top style='width:1.0in;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><b style='mso-bidi-font-weight:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>S&#7889;</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
  \"Times New Roman\",\"serif\"'><o:p></o:p></span></b></p>
  </td>
  <td width=90 valign=top style='width:67.5pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><b style='mso-bidi-font-weight:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>&#272;&#417;n</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
  \"Times New Roman\",\"serif\"'> <span class=SpellE>v&#7883;</span> <span
  class=SpellE>tính</span><o:p></o:p></span></b></p>
  </td>
  <td width=54 valign=top style='width:40.5pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><b style='mso-bidi-font-weight:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>S&#7889;</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
  \"Times New Roman\",\"serif\"'> <span class=SpellE>l&#432;&#7907;ng</span><o:p></o:p></span></b></p>
  </td>
  <td width=175 valign=top style='width:131.4pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><b style='mso-bidi-font-weight:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>Tình</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
  \"Times New Roman\",\"serif\"'> <span class=SpellE>tr&#7841;ng</span> <span
  class=SpellE>k&#7929;</span> <span class=SpellE>thu&#7853;t</span> <span
  class=SpellE>c&#7911;a</span> <span class=SpellE>thi&#7871;t</span> <span
  class=SpellE>b&#7883;</span><o:p></o:p></span></b></p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'><o:p></o:p></span></b></p>
  </td>
 </tr>";
 
 	$i=1;
		$tenthietbisql17 = mysql_query("SELECT * FROM hosocvk_iso WHERE soycdv='$sohscvk1'") ;
		while($row = mysql_fetch_array($tenthietbisql17))
		{
			$tenvt =$row['tenvt'];
			$sovt =$row['sovt'];	
			$solg =$row['solg'];	
			$ttktafter =$row['ttktafter'];	
		
		
			echo"
			 <tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes;height:21.95pt'>
  <td width=43 valign=top style='width:.45in;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;
  mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:21.95pt'>
  <span class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:12.0pt;
  font-family:\"Times New Roman\",\"serif\"'> 2 <o:p></o:p></span></span>
  </td>
  <td width=180 valign=top style='width:135.0pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:21.95pt'>
  <span class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span class=SpellE><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'> $tenvt <o:p></o:p></span></span>
  </td>
  <td width=96 valign=top style='width:1.0in;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:21.95pt'>
  <span class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:12.0pt;
  font-family:\"Times New Roman\",\"serif\"'> $sovt <o:p></o:p></span></span>
  </td>
  <td width=90 valign=top style='width:67.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:21.95pt'>
  <span class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>  <o:p></o:p></span></span>
  </td>
  <td width=54 valign=top style='width:40.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:21.95pt'>
  <span class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:12.0pt;
  font-family:\"Times New Roman\",\"serif\"'>$solg <o:p></o:p></span></span>
  </td>
  <td width=175 valign=top style='width:131.4pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:21.95pt'>
  <span class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'></span></span><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'><o:p></o:p></span></span>
  <span class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:12.0pt;
  font-family:\"Times New Roman\",\"serif\"'><o:p>$ttktafter &nbsp; </o:p></span></span>
  </td>
 </tr>";
			$i++;
		}
	echo"</table>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<p style=\"font:Times New Roman;\"> 4. Ghi chú:    </p>

<br/>
<p style=\"font:Times New Roman;margin-left:80px;\"> <strong>Bên giao</strong>:	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>(ký tên)</i> </p>
<p style=\"font:Times New Roman;margin-left:80px;\"><strong> Bên nhận</strong>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>(ký tên)</i> </p>

<p style=\"font:Times New Roman;\"> BM.25.07 <br/>
  10/10/2012 </p>";

header("Content-Type: application/msword");
header("Content-Disposition:attchment;filename=\"$nams$thangs$ngays-BG-CVK.doc\""); 
header("Pragma: no-cache");
header("Expires: 0");
exit;
}

if($maquanlycvk!="")
{

echo "
	<html lang=\"vi\">
<html lang=\"vi\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
<SCRIPT LANGUAGE=\"JavaScript\" SRC=\"java/CalendarPopup.js\"></SCRIPT>
<SCRIPT LANGUAGE=\"JavaScript\">
var cal = new CalendarPopup();
</SCRIPT>
</head>
<body>


<table style=\"width:100%\">
<tr>
<td >
<h2> <p style=\"text-align:center;color:blue;\"> PHIẾU KIỂM TRA SỬA CHỮA THIẾT BỊ<br/></h2>
</p>
</td>
</tr>
</table>
<br/>
<form action=\"formsc.php\" method=\"post\">
<table class=\"table7\" style=\"margin-left:50px;\">
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFE4B5;\"> <strong>Mã quản lý</strong> </td>
<td><select style=\"border-style:none;width:100%;height:30px;\">
		<option value=\"$maquanlycvk\">$maquanlycvk</option>" ;
    	$tenthietbisql1 = mysql_query("SELECT DISTINCT maql FROM hosocvk_iso WHERE maql='$maquanlycvk'") ;
		while($row = mysql_fetch_array($tenthietbisql1))
		{
			$maql =$row['maql'];	
			echo "<option value=\"$maql\" style=\"background:#87CEEB;\"> $maql </option>";
		}
		 echo"</select></td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#9966CC;\"> <strong>Mã thiết bị</strong> </td>
<td> <select name=\"mavattucvk\" style=\"border-style:none;width:100%;height:30px;\" onchange=\"this.form.submit()\">
		<option value=\"\"></option>" ;
    	$tenthietbisql2 = mysql_query("SELECT DISTINCT tenvt FROM hosocvk_iso WHERE maql='$maquanlycvk'") ;
		while($row = mysql_fetch_array($tenthietbisql2))
		{
			$tenvt =$row['tenvt'];	
			echo "<option value=\"$tenvt\" style=\"background:#87CEEB;\"> $tenvt </option>";
		}
		echo"<option value=\"\"></option>
		</select> </td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Nhóm sửa chữa</strong> </td>
<td>
<select name=\"nhomsc\" style=\"border-style:none;width:100%;height:100%;\">
		<option value=\"\"></option>
		<option value=\"RDNGA\"> Nhóm RDNGA </option>
		<option value=\"CNC\"> Nhóm CNC</option>
</select>
  </td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Số hồ sơ</strong> </td>
<td> <input style=\"border-style:none;width:100%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"sohs\" size=\"36\" type=\"text\" > </td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Ngày BĐ</strong> </td>
<td><input style=\"border-style:none;width:100%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"ngayth\" size=\"36\" type=\"text\" >  </td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Ngày Kết thúc </strong></td>
<td> <input style=\"border-style:none;width:100%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"ngaykt\" size=\"36\" type=\"text\"> </td>
</tr>
</table>

<br/>
<table class=\"table7\" style=\"margin-left:50px;\">
		<tr>
		<td  style=\"text-align:left;color:black;font-size: 18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Mô tả chi tiết tình trạng của thiết bị, các hỏng hóc (nếu có) do nhân viên xưởng kiểm tra, phát hiện</b> </td>
		<td><input type=text name=\"ttktbefore\" style=\"border-style:none;width:100%;height:100px;\"> </td>
		</tr>
		<tr>
		<td  style=\"text-align:left;color:black;font-size: 18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b> Tiến độ công việc </b> </td>
		<td><input type=text name=\"tiendocv\" style=\"border-style:none;width:100%;height:100px;\"> </td>
		</tr>
		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b> Hỏng hóc </b> </td>
		<td><input type=text name=\"honghoc\" style=\"border-style:none;width:100%;height:100px;\"> </td>
		</tr>
		
		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Mô tả công việc thực hiện hoặc cách khắc phục hỏng hóc</b></td>
		<td><input type=text name=\"khacphuc\" style=\"border-style:none;width:100%;height:100px;\"> </td>
		</tr>";
		echo"		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Kiểm tra tình trạng kỹ thuật của thiết bị sau khi BD/SC</b></td>
		<td> 1.Tên máy : .....<span  style=\"color:blue;\">$mavt</span>.....Số máy :.....<span  style=\"color:blue;\">$somay</span>.....</br> <span>2.Họ máy :<input type=text name=\"homay\" style=\"border-style:none;\" value=\"$homay\"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Model: <input type=text name=\"model\" style=\"border-style:none;\" value=\"$model\"></span></br><span>3.Điện áp nuôi :<input type=text name=\"dienap\" style=\"border-style:none;\" value=\"$dienap\">Dòng tiêu thụ: <input type=text name=\"dong\" style=\"border-style:none;\" value=\"$dong\"></span></br><span>4.Nội dung kiểm tra: <textarea rows='8' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"noidung\"  value=\"$noidung\"/> </textarea></span></span></br></br>";

echo " <b> 5. BẢNG SỐ LIỆU CẦN THIẾT (nếu có)</b>
<table class=\"table1\" style=\"margin-left:5px;width:470px;\">
<tr>
<th> Tên Tài Liệu </th>
<th> Link Tài Liệu </th>
</tr>";
//set all variable to null
for ($i=1;$i<=10;$i++) {
	$tentailieu[$i] ="";
	$linktailieu[$i] ="";
}
$check1=0;
$tenthietbisql22 = mysql_query("SELECT * FROM bangsolieu_iso ") ;
$j=1;
while($row = mysql_fetch_array($tenthietbisql22))
{
	$sohoso =$row['sohoso'];
	if($sohoso==$hosomay)	{
	$check1=1;
	$tentailieu[$j] =$row['tentailieu'];
	$linktailieu[$j] =$row['link'];
	$j++;
	}
}
if ($j>5) $jj=$j; else $jj=5;
for($i=1;$i<=$jj;$i++){
	$tentailieu_s[$i]=isset($_POST["tentailieu$i"]) ? $_POST["tentailieu$i"] : '';
if($check1==0) {
	echo"<tr><td> <input type=text id=\"tentl\" name=\"tentailieu$i\" style=\"border-style:none;width:100%;padding-left:10px;\" 
	value=\"$tentailieu_s[$i]\"></td>";
	echo"<td><input type=\"file\" id=\"file\" name=\"files[]\" multiple=\"multiple\"/></td></tr>";
}else{
	if ($linktailieu[$i]!=""){
	echo"<tr><td> <input type=text id=\"tentl\" name=\"tentailieu$i\" style=\"border-style:none;width:100%;padding-left:10px;\" 
	value=\"$tentailieu[$i]\"></td>";
	echo"<td><a href=\"./hoso/$sohoso/$linktailieu[$i]\">linkdown</a></td></tr>";
	}else{ 
	echo"<tr><td> <input type=text id=\"tentl\" name=\"tentailieu$i\" style=\"border-style:none;width:100%;padding-left:10px;\" 
	value=\"$tentailieu_s[$i]\"></td>";
	echo"<td><input type=\"file\" id=\"file\" name=\"files[]\" multiple=\"multiple\" /></td></tr>";
	}
}
}
echo "</table><br/>";
echo"<span>6.Kết luận: <textarea rows='2' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"ketluan\"  value=\"$ketluan\"/> </textarea></span>";
echo "</td></tr>";
echo"		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Tình trạng kỹ thuật của thiết bị sau khi sửa chữa </b> </td>
		<td><select name=\"ttktafter\" style=\"border-style:none;width:100%;height:100px;\">
		<option value=\"$ttktafter\"> $ttktafter</option>
		<option value=\"Đạt\">Đạt </option>
		<option value=\"Hỏng\">Hỏng (Không khắc phục được)</option>
		<option value=\"Chờ vật tư thay thế\">Chờ vật tư thay thế</option>
		<option value=\"Chưa kết luận\">Chưa kết luận</option>
		<option value=\"Đang sửa chữa\">Đang sửa chữa</option>
		<option value=\"TTKTDB\">TTKT Đặc biệt</option>
		</select>
		 </td>
		</tr>";
echo"<tr>
	<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Ghi chú tình trạng kỹ thuật</b></td>";
echo"<td><span><textarea rows='2' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"ghichufinal\" />$ghichufinal</textarea></span></td></tr>";
echo"</table> 
<br/>
<p style=\"margin-left:50px;\"> <strong>I. CÁC THIẾT BỊ HỖ TRỢ </strong> <br/> <br/> </p>
<table class=\"table1\" style=\"margin-left:50px;width:800px;\">

	<tr>
<th style=\"text-align:center;font-size: 15;width:60px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:405px;\"> Tên viết tắt</th>
<th style=\"text-align:center;font-size: 15;width:335px\"> Serial Number</th>
</ul>
</tr>";
$i=1;
while($i<=5){
echo"<tr>
<td><center> $i </center> </td>
<td><select name=\"tenthietbihotro$i\" style=\"border-style:none;width:100%;height:30px;\">
		<option value=\"\"></option>
	</select></td>
<td><input type=text name=\"serialnumber$i\" style=\"border-style:none;width:100%;\"> </td>
</tr>";
$i++;
}
 echo"</table>
<br/>";
/*
echo"<p style=\"margin-left:50px;\"> <strong>II. DANH MỤC VẬT TƯ</strong> <br/> <br/> </p>

<table class=\"table1\" style=\"margin-left:50px;width:800px;\">

	<tr>
<th style=\"text-align:center;font-size: 15;width:30px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:140px;\"> Mô tả</th>
<th style=\"text-align:center;font-size: 15;width:80px;\"> P/N</th>
<th style=\"text-align:center;font-size: 15 ;width:60px;\"> ĐVT </th>
<th style=\"text-align:center;font-size: 15 ;width:120px;\"> Số lượng </th>
</ul>
</tr>";
$i=1;
while($i<=10){
echo"<tr>
<td><center> $i </center> </td>
<td> </td>
<td> </td>
<td></td>
<td></td>
</tr>";
$i++;
}
echo"</table>";
*/
  echo"   <input type=hidden name=username value=$username>
	 <input type=hidden name=password value=$password>
	 <input type=hidden name=maquanlycvk1 value=\"$maquanlycvk\">
</form>
</body>
</html> " ;
}

if($mavattucvk!="")
{

$maquanlycvk1=isset($_POST['maquanlycvk1']) ? $_POST['maquanlycvk1'] : '';
$tenthietbisql17 = mysql_query("SELECT * FROM hosocvk_iso WHERE maql='$maquanlycvk1' and tenvt='$mavattucvk'") ;
while($row = mysql_fetch_array($tenthietbisql17))
{
		$soycdv =$row['soycdv'];
		$ngayth =$row['ngayth'];
		$ngaykt =$row['ngaykt'];	
		$ngth =$row['ngth'];	
		$ttktbefore =$row['ttktbefore'];
		$honghoc =$row['honghoc'];
		$khacphuc =$row['khacphuc'];
		$ttktafter =$row['ttktafter'];
		$tiendocv =$row['tiendocv'];
		$tbdosc[1] =$row['tbdosc'];
		$serialnumbersc[1] =$row['serialnumbersc'];
		$tbdosc[2] =$row['tbdosc1'];
		$serialnumbersc[2] =$row['serialnumbersc1'];
		$tbdosc[3]=$row['tbdosc2'];
		$serialnumbersc[3]=$row['serialnumbersc2'];
		$tbdosc[4]=$row['tbdosc3'];
		$serialnumbersc[4] =$row['serialnumbersc3'];
		$tbdosc[5]=$row['tbdosc4'];
		$serialnumbersc[5] =$row['serialnumbersc4'];
		$nhomsc =$row['nhomsc'];
		$ghichu =$row['ghichu'];							
}
$ngaystamp = $ngayth;
for($i=0;$i<=strlen($ngaystamp);$i++) {
		$p = stripos($ngaystamp,"/") ;
	if ($i== 0) {
		$ngays = trim (substr($ngaystamp,0,$p)) ;
	} 	
	if ($i== 1) {
		$thangs = trim (substr($ngaystamp,0,$p)) ;
	} 	
	if ($i== 2) {
		$nams = trim ($ngaystamp,$p) ;
	} 	
		$p++ ;
		$ngaystamp = substr($ngaystamp,$p);
}
$ngaystamp1 = $ngaykt;
for($i=0;$i<=strlen($ngaystamp1);$i++) {
		$p = stripos($ngaystamp1,"/") ;
	if ($i== 0) {
		$ngayt = trim (substr($ngaystamp1,0,$p)) ;
	} 	
	if ($i== 1) {
		$thangt = trim (substr($ngaystamp1,0,$p)) ;
	} 	
	if ($i== 2) {
		$namt = trim ($ngaystamp1,$p) ;
	} 	
		$p++ ;
		$ngaystamp1 = substr($ngaystamp1,$p);
}

$check=0;
$tenthietbisql12 = mysql_query("SELECT * FROM danhmucvattu_iso") ;
while($row = mysql_fetch_array($tenthietbisql12))
{
	$mahoso =$row['mahoso'];
	if($mahoso==$soycdv)	$check=1;
}


echo "
		<html lang=\"vi\">
<html lang=\"vi\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
<SCRIPT LANGUAGE=\"JavaScript\" SRC=\"java/CalendarPopup.js\"></SCRIPT>
<SCRIPT LANGUAGE=\"JavaScript\">
var cal = new CalendarPopup();
</SCRIPT>
</head>
<body>


<table style=\"width:100%\">
<tr>
<td >
<h2> <p style=\"text-align:center;color:blue;\"> PHIẾU KIỂM TRA SỬA CHỮA THIẾT BỊ<br/></h2>
</p>
</td>
</tr>
</table>
<br/>
<form method=\"post\" action=\"formsc.php\" enctype=\"multipart/form-data\" name=\"example\">
<table class=\"table7\" style=\"margin-left:50px;\">
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFE4B5;\"> <strong>Mã quản lý</strong> </td>
<td><select style=\"border-style:none;width:100%;height:30px;color:blue;text-align:center;\">
		<option value=\"$maquanlycvk1\">$maquanlycvk1</option>" ;
    	$tenthietbisql1 = mysql_query("SELECT DISTINCT maql FROM hosocvk_iso WHERE maql='$maquanlycvk'") ;
		while($row = mysql_fetch_array($tenthietbisql1))
		{
			$maql =$row['maql'];	
			echo "<option value=\"$maql\" style=\"background:#87CEEB;\"> $maql </option>";
		}
		 echo"</select></td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#9966CC;\"> <strong>Mã thiết bị</strong> </td>
<td> <select style=\"border-style:none;width:100%;height:30px;color:blue;text-align:center;\">
		<option value=\"$mavattucvk\">$mavattucvk</option>" ;
    	$tenthietbisql2 = mysql_query("SELECT DISTINCT tenvt FROM hosocvk_iso WHERE maql='$maquanlycvk'") ;
		while($row = mysql_fetch_array($tenthietbisql2))
		{
			$tenvt =$row['tenvt'];	
			echo "<option value=\"$tenvt\" style=\"background:#87CEEB;\"> $tenvt </option>";
		}
		echo"<option value=\"\"></option>
		</select> </td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Nhóm sửa chữa</strong> </td>
<td>
<select name=\"nhomsc\" style=\"border-style:none;width:100%;height:100%;text-align:center;\">
		<option value=\"$nhomsc\">$nhomsc</option>
		<option value=\"RDNGA\"> Nhóm RDNGA </option>
		<option value=\"CNC\"> Nhóm CNC</option>
</select>
  </td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Số hồ sơ</strong> </td>
<td> <input style=\"border-style:none;width:100%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"sohs\" size=\"36\" type=\"text\" value=\"$soycdv\"> </td>
</tr>
";

if($ngayth!=""){
echo"<tr><td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Ngày BĐ</strong> </td>
<td><input style=\"border-style:none;width:95%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"ngayth\" size=\"36\" type=\"text\" value=\"$ngays/$thangs/$nams\" readonly>  
<A HREF=\"#\"
                onClick=\"cal.select(document.forms['example'].ngayth,'anchor1','dd/MM/yyyy'); return false;\"
		NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A> </p>
</td>
</tr>";
}else{
echo"<tr><td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Ngày BĐ</strong> </td>
<td><input style=\"border-style:none;width:95%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"ngayth\" size=\"36\" type=\"text\" readonly>  
<A HREF=\"#\"
                onClick=\"cal.select(document.forms['example'].ngayth,'anchor1','dd/MM/yyyy'); return false;\"
		NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A> </p> </td>
</tr>";
}
if($ngaykt!=""){
echo"<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Ngày Kết thúc </strong></td>
<td> <input style=\"border-style:none;width:95%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"ngaykt\" size=\"36\" type=\"text\" value=\"$ngayt/$thangt/$namt\">
<A HREF=\"#\"
                onClick=\"cal.select(document.forms['example'].ngaykt,'anchor1','dd/MM/yyyy'); return false;\"
		NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A> </p> 
 </td>
</tr>";
}else{
echo"<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Ngày Kết thúc </strong></td>
<td> <input style=\"border-style:none;width:95%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"ngaykt\" size=\"36\" type=\"text\" readonly> 
<A HREF=\"#\"
                onClick=\"cal.select(document.forms['example'].ngaykt,'anchor1','dd/MM/yyyy'); return false;\"
		NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A> </p> 
</td>
</tr>";
}
echo"</table>

<br/>
<table class=\"table7\" style=\"margin-left:50px;\">
		<tr>
		<td  style=\"text-align:left;color:black;font-size: 18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Mô tả chi tiết tình trạng của thiết bị, các hỏng hóc (nếu có) do nhân viên xưởng kiểm tra, phát hiện</b> </td>
		<td><input type=text name=\"ttktbefore\" style=\"border-style:none;width:100%;height:100px;padding-left:10px;\" value=\"$ttktbefore\"> </td>
		</tr>
		<tr>
		<td  style=\"text-align:left;color:black;font-size: 18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b> Tiến độ công việc </b> </td>
		<td><input type=text name=\"tiendocv\" style=\"border-style:none;width:100%;height:100px;padding-left:10px;\" value=\"$tiendocv\"> </td>
		</tr>
		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b> Hỏng hóc </b> </td>
		<td><input type=text name=\"honghoc\" style=\"border-style:none;width:100%;height:100px;padding-left:10px;\" value=\"$honghoc\"> </td>
		</tr>
		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Mô tả công việc thực hiện hoặc cách khắc phục hỏng hóc</b></td>
		<td><input type=text name=\"khacphuc\" style=\"border-style:none;width:100%;height:100px;padding-left:10px;\" value=\"$khacphuc\"> </td>
		</tr>";
echo"		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Kiểm tra tình trạng kỹ thuật của thiết bị sau khi BD/SC</b></td>
		<td> 1.Tên máy : .....<span  style=\"color:blue;\">$mavt</span>.....Số máy :.....<span  style=\"color:blue;\">$somay</span>.....</br> <span>2.Họ máy :<input type=text name=\"homay\" style=\"border-style:none;\" value=\"$homay\"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Model: <input type=text name=\"model\" style=\"border-style:none;\" value=\"$model\"></span></br><span>3.Điện áp nuôi :<input type=text name=\"dienap\" style=\"border-style:none;\" value=\"$dienap\">Dòng tiêu thụ: <input type=text name=\"dong\" style=\"border-style:none;\" value=\"$dong\"></span></br><span>4.Nội dung kiểm tra: <textarea rows='8' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"noidung\"  value=\"$noidung\"/> </textarea></span></span></br></br>";

echo " <b> 5. BẢNG SỐ LIỆU CẦN THIẾT (nếu có)</b>
<table class=\"table1\" style=\"margin-left:5px;width:470px;\">
<tr>
<th> Tên Tài Liệu </th>
<th> Link Tài Liệu </th>
</tr>";
//set all variable to null
for ($i=1;$i<=10;$i++) {
	$tentailieu[$i] ="";
	$linktailieu[$i] ="";
}
$check1=0;
$tenthietbisql22 = mysql_query("SELECT * FROM bangsolieu_iso ") ;
$j=1;
while($row = mysql_fetch_array($tenthietbisql22))
{
	$sohoso =$row['sohoso'];
	if($sohoso==$hosomay)	{
	$check1=1;
	$tentailieu[$j] =$row['tentailieu'];
	$linktailieu[$j] =$row['link'];
	$j++;
	}
}
if ($j>5) $jj=$j; else $jj=5;
for($i=1;$i<=$jj;$i++){
	$tentailieu_s[$i]=isset($_POST["tentailieu$i"]) ? $_POST["tentailieu$i"] : '';
if($check1==0) {
	echo"<tr><td> <input type=text id=\"tentl\" name=\"tentailieu$i\" style=\"border-style:none;width:100%;padding-left:10px;\" 
	value=\"$tentailieu_s[$i]\"></td>";
	echo"<td><input type=\"file\" id=\"file\" name=\"files[]\" multiple=\"multiple\"/></td></tr>";
}else{
	if ($linktailieu[$i]!=""){
	echo"<tr><td> <input type=text id=\"tentl\" name=\"tentailieu$i\" style=\"border-style:none;width:100%;padding-left:10px;\" 
	value=\"$tentailieu[$i]\"></td>";
	echo"<td><a href=\"./hoso/$sohoso/$linktailieu[$i]\">linkdown</a></td></tr>";
	}else{ 
	echo"<tr><td> <input type=text id=\"tentl\" name=\"tentailieu$i\" style=\"border-style:none;width:100%;padding-left:10px;\" 
	value=\"$tentailieu_s[$i]\"></td>";
	echo"<td><input type=\"file\" id=\"file\" name=\"files[]\" multiple=\"multiple\" /></td></tr>";
	}
}
}
echo "</table><br/>";
echo"<span>6.Kết luận: <textarea rows='2' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"ketluan\"  value=\"$ketluan\"/> </textarea></span>";
echo "</td></tr>";
echo"		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Tình trạng kỹ thuật của thiết bị sau khi sửa chữa </b> </td>
		<td><select name=\"ttktafter\" style=\"border-style:none;width:100%;height:100px;padding-left:10px;\">
		<option value=\"$ttktafter\">$ttktafter</option>
		<option value=\"Đạt\">Đạt </option>
		<option value=\"Hỏng\">Hỏng (Không khắc phục được)</option>
		<option value=\"Chờ vật tư thay thế\">Chờ vật tư thay thế</option>
		<option value=\"Trường hợp khác\">Trường hợp khác</option>
		<option value=\"Đang sửa chữa\">Đang sửa chữa</option>
		<option value=\"TTKTDB\">TTKT Đặc biệt</option>
		</select>
		 </td>
		</tr>
		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b> Khuyến nghị </b></td>
		<td><input type=text name=\"ghichu\" style=\"border-style:none;width:100%;height:100px;padding-left:10px;\" value=\"$ghichu\"> </td>
		</tr>
</table> 
<br/>
<p style=\"margin-left:50px;\"> <strong>I. CÁC THIẾT BỊ HỖ TRỢ </strong> <br/> <br/> </p>
<table class=\"table1\" style=\"margin-left:50px;width:800px;\">

	<tr>
<th style=\"text-align:center;font-size: 15;width:60px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:405px;\"> Tên viết tắt</th>
<th style=\"text-align:center;font-size: 15;width:335px\"> Serial Number</th>
</ul>
</tr>";
$i=1;
while($i<=5){
echo"<tr>
<td><center> $i </center> </td>
<td><select name=\"tenthietbihotrocvk$i\" style=\"border-style:none;width:100%;height:30px;\" onchange=\"this.form.submit()\">
		<option value=\"$tbdosc[$i]\">$tbdosc[$i]</option>";
		$tenthietbisql16 = mysql_query("SELECT DISTINCT * FROM thietbihotro_iso") ;
		while($row = mysql_fetch_array($tenthietbisql16))
		{
			$tenthietbi =$row['tenthietbi'];	
			echo "<option value=\"$tenthietbi\" style=\"background:#87CEEB;\"> $tenthietbi </option>";
		}
	echo"</select></td>
<td><input type=text name=\"serialnumbercvk$i\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$serialnumbersc[$i]\"> </td>
</tr>";
$i++;
}
 echo"</table>
<br/>";
/*
echo"<p style=\"margin-left:50px;\"> <strong>II. DANH MỤC VẬT TƯ</strong> <br/> <br/> </p>

<table class=\"table1\" style=\"margin-left:50px;width:800px;\">

	<tr>
<th style=\"text-align:center;font-size: 15;width:30px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:140px;\"> Mô tả</th>
<th style=\"text-align:center;font-size: 15;width:80px;\"> P/N</th>
<th style=\"text-align:center;font-size: 15 ;width:60px;\"> ĐVT </th>
<th style=\"text-align:center;font-size: 15 ;width:120px;\"> Số lượng </th>
</ul>
</tr>";
$i=1;

if($check==1){
$tenthietbisql15 = mysql_query("SELECT * FROM danhmucvattu_iso WHERE mahoso='$soycdv'") ;
while($row = mysql_fetch_array($tenthietbisql15))
{
	$stt=$row['stt'];
	$mota1 =$row['mota'];
	$pn1 =$row['serialnumber'];	
	$dvt1 =$row['dvt'];
	$soluong1 =$row['soluong'];	
	echo"<tr>
	<td><center> $i </center> </td>
	<td><input type=text name=\"mota$stt\" style=\"border-style:none;width:100%;padding-left:10px;\" value=\"$mota1\"> </td>
	<td><input type=text name=\"pn$stt\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$pn1\"> </td>
	<td><input type=text name=\"dvt$stt\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$dvt1\"> </td>
	<td><input type=text name=\"soluong$stt\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$soluong1\"> </td>
	</tr>";
	$i++;
}
}else{
while($i<=10){
	echo"<tr>
	<td><center> $i </center> </td>
	<td><input type=text name=\"mota$i\" style=\"border-style:none;width:100%;padding-left:10px;\" > </td>
	<td><input type=text name=\"pn$i\" style=\"border-style:none;width:100%;text-align:center;\" > </td>
	<td><input type=text name=\"dvt$i\" style=\"border-style:none;width:100%;text-align:center;\" > </td>
	<td><input type=text name=\"soluong$i\" style=\"border-style:none;width:100%;text-align:center;\" > </td>
	</tr>";
	$i++;
}
}

echo"</table>
 <ul id=\"mbbuttonaddebul_table\" class=\"mbbuttonaddebul_menulist\" style=\"width: 197px; height: 29px;margin-left:10px;\">
  <a><input type=\"image\" name=\"addcvk\"  value =\"themcvk\" id=\"mbi_mbbuttonadd_1\" src=\"buttonadd_files/add.jpg\" name=\"mbi_mbbuttonadd_1\" style=\"vertical-align: bottom;\" border=\"0\" alt=\"Thêm\" title=\"\" onclick=\"this.form.addcvk.value = this.value\" /></a>
</ul>";
*/
echo"<script type=\"text/javascript\" src=\"buttonadd_files/mbjsmbbuttonadd.js\"></script>
	<input type=hidden name=addcvk value=\"\">
   <input type=hidden name=username value=$username>
	 <input type=hidden name=password value=$password>
	 <input type=hidden name=mavattucvk1 value=\"$mavattucvk\">
	 <input type=hidden name=maquanlycvk2 value=\"$maquanlycvk1\">
	 <table align=\"center\">
	 <tr>
	 <td><input type=\"image\" name=\"xuatphieucvk\" value =\"phieuktcvk\" src=\"upload/xuatsc.jpg\" alt=\"Nhap\" onclick=\"this.form.xuatphieucvk.value = this.value\"/></td>
	<input type=hidden name=xuatphieucvk value=\"\">
	
</form>
 <form action=\"index.php\" method=\"post\">
    <input type=hidden name=username value=$username>
	<input type=hidden name=password value=$password>
  	<td> <input type=hidden name=\"submit\" value=\"Hồ sơ SC/BD\">
 	<input type=\"image\" src=\"upload/back.jpg\"  /></td>
	</tr>
	</table>
   </form>
</body>
</html> " ;
}

if($tenthietbihotrocvk1!=""&&$xuatphieucvk==""&&$addcvk=="")
{

$maquanlycvk2= isset($_POST['maquanlycvk2']) ? $_POST['maquanlycvk2'] : '';
$mavattucvk1= isset($_POST['mavattucvk1']) ? $_POST['mavattucvk1'] : '';


$sohs = isset($_POST['sohs']) ? $_POST['sohs'] : '';
$ngayth = isset($_POST['ngayth']) ? $_POST['ngayth'] : '';
$ngaykt = isset($_POST['ngaykt']) ? $_POST['ngaykt'] : '';
$ttktbefore = isset($_POST['ttktbefore']) ? $_POST['ttktbefore'] : '';
$honghoc = isset($_POST['honghoc']) ? $_POST['honghoc'] : '';
$khacphuc = isset($_POST['khacphuc']) ? $_POST['khacphuc'] : '';
$ttktafter = isset($_POST['ttktafter']) ? $_POST['ttktafter'] : '';
$ghichu = isset($_POST['ghichu']) ? $_POST['ghichu'] : '';
$nhomsc = isset($_POST['nhomsc']) ? $_POST['nhomsc'] : '';
$tiendocv = isset($_POST['tiendocv']) ? $_POST['tiendocv'] : '';

for($i=1;$i<=5;$i++){
$tenthietbihotrocvk[$i]=isset($_POST["tenthietbihotrocvk$i"]) ? $_POST["tenthietbihotrocvk$i"] : '';
$serialnumbercvk[$i]=isset($_POST["serialnumbercvk$i"]) ? $_POST["serialnumbercvk$i"] : '';
echo"<input type=hidden name=tenthietbihotrocvk$i value=\"$tenthietbihotrocvk[$i]\">
	<input type=hidden name=serialnumbercvk$i value=\"$serialnumbercvk[$i]\">";
}

$tenthietbisql22 = mysql_query("SELECT count(*) as sum FROM danhmucvattu_iso") ;
while($row = mysql_fetch_array($tenthietbisql22))
{
	$sum =$row['sum'];
}

$check=0;
$tenthietbisql12 = mysql_query("SELECT * FROM danhmucvattu_iso") ;
while($row = mysql_fetch_array($tenthietbisql12))
{
	$mahoso =$row['mahoso'];
	if($mahoso==$sohs)	$check=1;
}

for($i=1;$i<=10+$sum;$i++){
$mota[$i]=isset($_POST["mota$i"]) ? $_POST["mota$i"] : '';
$pn[$i]=isset($_POST["pn$i"]) ? $_POST["pn$i"] : '';
$dvt[$i]=isset($_POST["dvt$i"]) ? $_POST["dvt$i"] : '';
$soluong[$i]=isset($_POST["soluong$i"]) ? $_POST["soluong$i"] : '';
if ($soluong[$i]=="") $soluong[$i]=1;


echo"<input type=hidden name=mota$i value=\"$mota[$i]\">
	<input type=hidden name=pn$i value=\"$pn[$i]\">
	<input type=hidden name=dvt$i value=\"$dvt[$i]\">
	<input type=hidden name=soluong$i value=\"$soluong[$i]\">";
}
echo "
	<html lang=\"vi\">
	<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
</head>
<body>

<table style=\"width:100%\">
<tr>
<td >
<h2> <p style=\"text-align:center;color:blue;\"> PHIẾU KIỂM TRA SỬA CHỮA THIẾT BỊ<br/></h2>
</p>
</td>
</tr>
</table>
<br/>
<form method=\"post\" action=\"formsc.php\" enctype=\"multipart/form-data\" name=\"example\">
<table class=\"table7\" style=\"margin-left:50px;\">
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFE4B5;\"> <strong>Mã quản lý</strong> </td>
<td><select style=\"border-style:none;width:100%;height:30px;color:blue;text-align:center;\">
		<option value=\"$maquanlycvk2\">$maquanlycvk2</option>
</select></td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#9966CC;\"> <strong>Mã thiết bị</strong> </td>
<td> <select style=\"border-style:none;width:100%;height:30px;color:blue;text-align:center;\">
		<option value=\"$mavattucvk1\">$mavattucvk1</option>
  
		</select> </td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Nhóm sửa chữa</strong> </td>
<td>
<select name=\"nhomsc\" style=\"border-style:none;width:100%;height:100%;text-align:center;\">
		<option value=\"$nhomsc\">$nhomsc</option>
		<option value=\"RDNGA\"> Nhóm RDNGA </option>
		<option value=\"CNC\"> Nhóm CNC</option>
</select>
  </td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Số hồ sơ</strong> </td>
<td> <input style=\"border-style:none;width:100%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"sohs\" size=\"36\" type=\"text\" value=\"$sohs\"> </td>
</tr>

<tr><td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Ngày BĐ</strong> </td>
<td><input style=\"border-style:none;width:95%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"ngayth\" size=\"36\" type=\"text\" value=\"$ngayth\" readonly>  
</td>
</tr>

<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Ngày Kết thúc </strong></td>
<td> <input style=\"border-style:none;width:95%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"ngaykt\" size=\"36\" type=\"text\" value=\"$ngaykt\" readonly>
</td>
</tr>

</table>
<br/>
<table class=\"table7\" style=\"margin-left:50px;\">
		<tr>
		<td  style=\"text-align:left;color:black;font-size: 18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Mô tả chi tiết tình trạng của thiết bị, các hỏng hóc (nếu có) do nhân viên xưởng kiểm tra, phát hiện</b> </td>
		<td><input type=text name=\"ttktbefore\" style=\"border-style:none;width:100%;height:100px;padding-left:10px;\" value=\"$ttktbefore\"> </td>
		</tr>
		<tr>
		<td  style=\"text-align:left;color:black;font-size: 18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b> Tiến độ công việc </b> </td>
		<td><input type=text name=\"tiendocv\" style=\"border-style:none;width:100%;height:100px;padding-left:10px;\" value=\"$tiendocv\"> </td>
		</tr>
		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b> Hỏng hóc </b> </td>
		<td><input type=text name=\"honghoc\" style=\"border-style:none;width:100%;height:100px;padding-left:10px;\" value=\"$honghoc\"> </td>
		</tr>
		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Mô tả công việc thực hiện hoặc cách khắc phục hỏng hóc</b></td>
		<td><input type=text name=\"khacphuc\" style=\"border-style:none;width:100%;height:100px;padding-left:10px;\" value=\"$khacphuc\"> </td>
		</tr>";
echo"		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Kiểm tra tình trạng kỹ thuật của thiết bị sau khi BD/SC</b></td>
		<td> 1.Tên máy : .....<span  style=\"color:blue;\">$mavt</span>.....Số máy :.....<span  style=\"color:blue;\">$somay</span>.....</br> <span>2.Họ máy :<input type=text name=\"homay\" style=\"border-style:none;\" value=\"$homay\"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Model: <input type=text name=\"model\" style=\"border-style:none;\" value=\"$model\"></span></br><span>3.Điện áp nuôi :<input type=text name=\"dienap\" style=\"border-style:none;\" value=\"$dienap\">Dòng tiêu thụ: <input type=text name=\"dong\" style=\"border-style:none;\" value=\"$dong\"></span></br><span>4.Nội dung kiểm tra: <textarea rows='8' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"noidung\"  value=\"$noidung\"/> </textarea></span></span></br></br>";

echo " <b> 5. BẢNG SỐ LIỆU CẦN THIẾT (nếu có)</b>
<table class=\"table1\" style=\"margin-left:5px;width:470px;\">
<tr>
<th> Tên Tài Liệu </th>
<th> Link Tài Liệu </th>
</tr>";
//set all variable to null
for ($i=1;$i<=10;$i++) {
	$tentailieu[$i] ="";
	$linktailieu[$i] ="";
}
$check1=0;
$tenthietbisql22 = mysql_query("SELECT * FROM bangsolieu_iso ") ;
$j=1;
while($row = mysql_fetch_array($tenthietbisql22))
{
	$sohoso =$row['sohoso'];
	if($sohoso==$hosomay)	{
	$check1=1;
	$tentailieu[$j] =$row['tentailieu'];
	$linktailieu[$j] =$row['link'];
	$j++;
	}
}
if ($j>5) $jj=$j; else $jj=5;
for($i=1;$i<=$jj;$i++){
	$tentailieu_s[$i]=isset($_POST["tentailieu$i"]) ? $_POST["tentailieu$i"] : '';
if($check1==0) {
	echo"<tr><td> <input type=text id=\"tentl\" name=\"tentailieu$i\" style=\"border-style:none;width:100%;padding-left:10px;\" 
	value=\"$tentailieu_s[$i]\"></td>";
	echo"<td><input type=\"file\" id=\"file\" name=\"files[]\" multiple=\"multiple\"/></td></tr>";
}else{
	if ($linktailieu[$i]!=""){
	echo"<tr><td> <input type=text id=\"tentl\" name=\"tentailieu$i\" style=\"border-style:none;width:100%;padding-left:10px;\" 
	value=\"$tentailieu[$i]\"></td>";
	echo"<td><a href=\"./hoso/$sohoso/$linktailieu[$i]\">linkdown</a></td></tr>";
	}else{ 
	echo"<tr><td> <input type=text id=\"tentl\" name=\"tentailieu$i\" style=\"border-style:none;width:100%;padding-left:10px;\" 
	value=\"$tentailieu_s[$i]\"></td>";
	echo"<td><input type=\"file\" id=\"file\" name=\"files[]\" multiple=\"multiple\" /></td></tr>";
	}
}
}
echo "</table><br/>";
echo"<span>6.Kết luận: <textarea rows='2' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"ketluan\"  value=\"$ketluan\"/> </textarea></span>";
echo "</td></tr>";
echo"		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Tình trạng kỹ thuật của thiết bị sau khi sửa chữa </b> </td>
		<td><select name=\"ttktafter\" style=\"border-style:none;width:100%;height:100px;padding-left:10px;\">
		<option value=\"$ttktafter\">$ttktafter</option>
		<option value=\"Đạt\">Đạt </option>
		<option value=\"Hỏng\">Hỏng (Không khắc phục được)</option>
		<option value=\"Chờ vật tư thay thế\">Chờ vật tư thay thế</option>
		<option value=\"Trường hợp khác\">Trường hợp khác</option>
		<option value=\"Đang sửa chữa\">Đang sửa chữa</option>
		<option value=\"TTKTDB\">TTKT Đặc biệt</option>
		</select>
		 </td>
		</tr>
		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b> Khuyến nghị </b></td>
		<td><input type=text name=\"ghichu\" style=\"border-style:none;width:100%;height:100px;padding-left:10px;\" value=\"$ghichu\"> </td>
		</tr>
</table> 
<br/>
<p style=\"margin-left:50px;\"> <strong>I. CÁC THIẾT BỊ HỖ TRỢ </strong> <br/> <br/> </p>
<table class=\"table1\" style=\"margin-left:50px;width:800px;\">
<tr>
<th style=\"text-align:center;font-size: 15;width:60px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:405px;\"> Tên viết tắt</th>
<th style=\"text-align:center;font-size: 15;width:335px\"> Serial Number</th>
</ul>
</tr>";
$i=1;
while($i<=5){
echo"<tr>
<td><center> $i </center> </td>
<td><select name=\"tenthietbihotrocvk$i\" style=\"border-style:none;width:100%;height:30px;\"  onchange=\"this.form.submit()\">
		<option value=\"$tenthietbihotrocvk[$i]\">$tenthietbihotrocvk[$i]</option>";
		$tenthietbisql10 = mysql_query("SELECT DISTINCT tenthietbi FROM thietbihotro_iso") ;
		while($row = mysql_fetch_array($tenthietbisql10))
		{
			$tentb =$row['tenthietbi'];	
			echo "<option value=\"$tentb\" style=\"background:#87CEEB;\"> $tentb </option>";
		}
	echo"</select></td>
<td><select name=\"serialnumbercvk$i\" style=\"border-style:none;width:100%;height:30px;text-align:center;\" >
		<option value=\"$serialnumbercvk[$i]\">$serialnumbercvk[$i] </option>";
		$tenthietbisql11 = mysql_query("SELECT DISTINCT serialnumber FROM thietbihotro_iso WHERE tenthietbi='$tenthietbihotrocvk[$i]'") ;
		while($row = mysql_fetch_array($tenthietbisql11))
		{
			$sn =$row['serialnumber'];	
			echo "<option value=\"$sn\" style=\"background:#87CEEB;\"> $sn </option>";
		}
	echo"</select> </td>
</tr>";
$i++;
}
 echo"</table>
<br/>";
/*
echo"
<p style=\"margin-left:50px;\"> <strong>II. DANH MỤC VẬT TƯ</strong> <br/> <br/> </p>
<table class=\"table1\" style=\"margin-left:50px;width:800px;\">

<tr>
<th style=\"text-align:center;font-size: 15;width:30px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:140px;\"> Mô tả</th>

<th style=\"text-align:center;font-size: 15;width:80px;\"> P/N</th>
<th style=\"text-align:center;font-size: 15 ;width:60px;\"> ĐVT </th>
<th style=\"text-align:center;font-size: 15 ;width:120px;\"> Số lượng </th>
</ul>
</tr>";

if($check==1){
for($i=1;$i<=10+$sum;$i++)
{
	if($mota[$i]!=""){
	echo"<tr>
<td><center> $i </center> </td>
<td><input type=text name=\"mota$i\" style=\"border-style:none;width:100%;padding-left:10px;\" value=\"$mota[$i]\" > </td>
<td><input type=text name=\"pn$i\" style=\"border-style:none;width:100%;text-align:center;\"  value=\"$pn[$i]\"> </td>
<td><input type=text name=\"dvt$i\" style=\"border-style:none;width:100%;text-align:center;\"  value=\"$dvt[$i]\"> </td>
<td><input type=text name=\"soluong$i\" style=\"border-style:none;width:100%;text-align:center;\"  value=\"$soluong[$i]\"> </td>
</tr>";
	}
}
}else{
for($i=1;$i<=10;$i++)
{
	echo"<tr>
<td><center> $i </center> </td>
<td><input type=text name=\"mota$i\" style=\"border-style:none;width:100%;padding-left:10px;\" > </td>
<td><input type=text name=\"pn$i\" style=\"border-style:none;width:100%;text-align:center;\"  > </td>
<td><input type=text name=\"dvt$i\" style=\"border-style:none;width:100%;text-align:center;\" > </td>
<td><input type=text name=\"soluong$i\" style=\"border-style:none;width:100%;text-align:center;\" > </td>
</tr>";
}
}
echo"</table>
 <ul id=\"mbbuttonaddebul_table\" class=\"mbbuttonaddebul_menulist\" style=\"width: 197px; height: 29px;margin-left:10px;\">
  <a><input type=\"image\" name=\"addcvk\"  value =\"themcvk\" id=\"mbi_mbbuttonadd_1\" src=\"buttonadd_files/add.jpg\" name=\"mbi_mbbuttonadd_1\" style=\"vertical-align: bottom;\" border=\"0\" alt=\"Thêm\" title=\"\" onclick=\"this.form.addcvk.value = this.value\" /></a>
</ul>";
*/
echo"
<script type=\"text/javascript\" src=\"buttonadd_files/mbjsmbbuttonadd.js\"></script>
	<input type=hidden name=addcvk value=\"\">
   <input type=hidden name=username value=$username>
	 <input type=hidden name=password value=$password>
	 
	 <table align=\"center\">
	 <tr>
	 <td>
<input type=\"image\" name=\"xuatphieucvk\" value =\"phieuktcvk\" src=\"upload/xuatsc.jpg\" alt=\"Nhap\" onclick=\"this.form.xuatphieucvk.value = this.value\"/></td>
	<input type=hidden name=xuatphieucvk value=\"\">
	
	 <input type=hidden name=mavattucvk1 value=\"$mavattucvk1\">
	 <input type=hidden name=maquanlycvk2 value=\"$maquanlycvk2\">
</form>
<form action=\"index.php\" method=\"post\">
    <input type=hidden name=username value=$username>
	 <input type=hidden name=password value=$password>
  	 <input type=hidden name=\"submit\" value=\"Hồ sơ SC/BD\">
 	<td><input type=\"image\" src=\"upload/back.jpg\"  /></td>
	</tr>
	</table>
   </form>
</body>
</html> " ;

}

if($xuatphieucvk=="phieuktcvk")
{

$mavattucvk1=isset($_POST['mavattucvk1']) ? $_POST['mavattucvk1'] : '';
$maquanlycvk2=isset($_POST['maquanlycvk2']) ? $_POST['maquanlycvk2'] : '';

$sohs=isset($_POST['sohs']) ? $_POST['sohs'] : '';
$ngayth=isset($_POST['ngayth']) ? $_POST['ngayth'] : '';
$ngaykt=isset($_POST['ngaykt']) ? $_POST['ngaykt'] : '';
$ttktbefore=isset($_POST['ttktbefore']) ? $_POST['ttktbefore'] : '';
$khacphuc=isset($_POST['khacphuc']) ? $_POST['khacphuc'] : '';
$ttktafter=isset($_POST['ttktafter']) ? $_POST['ttktafter'] : '';
$honghoc=isset($_POST['honghoc']) ? $_POST['honghoc'] : '';
$ghichu=isset($_POST['ghichu']) ? $_POST['ghichu'] : '';
$nhomsc=isset($_POST['nhomsc']) ? $_POST['nhomsc'] : '';
$tiendocv=isset($_POST['tiendocv']) ? $_POST['tiendocv'] : '';


for($i=1;$i<=5;$i++){
$tenthietbihotrocvk[$i]=isset($_POST["tenthietbihotrocvk$i"]) ? $_POST["tenthietbihotrocvk$i"] : '';
$serialnumbercvk[$i]=isset($_POST["serialnumbercvk$i"]) ? $_POST["serialnumbercvk$i"] : '';
}

$tenthietbisql10 = mysql_query("SELECT max(stt) as stt FROM danhmucvattu_iso") ;
while($row = mysql_fetch_array($tenthietbisql10))
{
	$recc =$row['stt'];
}
$recc++;

$check=0;
$tenthietbisql12 = mysql_query("SELECT * FROM danhmucvattu_iso") ;
while($row = mysql_fetch_array($tenthietbisql12))
{
	$mahoso =$row['mahoso'];
	if($mahoso==$sohs)	$check=1;
}

$tenthietbisql22 = mysql_query("SELECT count(*) as sum FROM danhmucvattu_iso WHERE mahoso='$sohs'") ;
while($row = mysql_fetch_array($tenthietbisql22))
{
	$sum =$row['sum'];
}

$tenthietbisql23 = mysql_query("SELECT count(*) as sumcount FROM danhmucvattu_iso ") ;
while($row = mysql_fetch_array($tenthietbisql23))
{
	$sumc=$row['sumcount'];
}


$ngaystemp = $ngayth;
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	$p = stripos($ngaystemp,"/") ;

if ($i== 0) {
	$ngays = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 1) {
	$thangs = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 2) {
	$nams = trim ($ngaystemp) ;
} 	
$p++ ;
$ngaystemp = substr($ngaystemp,$p);
}

$ngaystemp1 = $ngaykt;
for ($i=0;$i<=strlen($ngaystemp1);$i++) {
	$p = stripos($ngaystemp1,"/") ;

if ($i== 0) {
	$ngayt = trim (substr($ngaystemp1,0,$p)) ;
} 	
if ($i== 1) {
	$thangt = trim (substr($ngaystemp1,0,$p)) ;
} 	
if ($i== 2) {
	$namt = trim ($ngaystemp1) ;
} 	
$p++ ;
$ngaystemp1 = substr($ngaystemp1,$p);
}


// cap nhat thong tin phieu kiem tra sua chua
$update = "update hosocvk_iso SET  
ngayth= '$ngays/$thangs/$nams',
ngaykt= '$ngayt/$thangt/$namt',
soycdv='$sohs',
tiendocv='$tiendocv',
ttktbefore='$ttktbefore',
khacphuc='$khacphuc',
ttktafter='$ttktafter',
honghoc='$honghoc',
ghichu='$ghichu',
tbdosc='$tenthietbihotrocvk[1]',
serialnumbersc='$serialnumbercvk[1]',
tbdosc1='$tenthietbihotrocvk[2]',
serialnumbersc1='$serialnumbercvk[2]',
tbdosc2='$tenthietbihotrocvk[3]',
serialnumbersc2='$serialnumbercvk[3]',
tbdosc3='$tenthietbihotrocvk[4]',
serialnumbersc3='$serialnumbercvk[4]',
tbdosc4='$tenthietbihotrocvk[5]',
serialnumbersc4='$serialnumbercvk[5]',
nhomsc='$nhomsc'
WHERE maql='$maquanlycvk2' and tenvt='$mavattucvk1'" ;

mysql_query($update) or die(mysql_error());


$checkvt=0;
for($i=1;$i<=10+$sum;$i++){
$mota[$i]=isset($_POST["mota$i"]) ? $_POST["mota$i"] : '';
$pn[$i]=isset($_POST["pn$i"]) ? $_POST["pn$i"] : '';
$dvt[$i]=isset($_POST["dvt$i"]) ? $_POST["dvt$i"] : '';
$soluong[$i]=isset($_POST["soluong$i"]) ? $_POST["soluong$i"] : '';
if ($soluong[$i]=="") $soluong[$i]=1;
if($mota[$i]!=""&&$check==0){
$insert = "insert into danhmucvattu_iso(
stt,
mahoso,
mota,
serialnumber,
dvt,
soluong
) values (
'$recc',
'$sohs',
'$mota[$i]',
'$pn[$i]',
'$dvt[$i]',
'$soluong[$i]'
)" ;
mysql_query($insert) or die(mysql_error());

$recc++;
}else  break;
}


$h=1;
while($h<=$sumc)
{
$mota1[$h]=isset($_POST["mota$h"]) ? $_POST["mota$h"] : '';
$pn1[$h]=isset($_POST["pn$h"]) ? $_POST["pn$h"] : '';
$dvt1[$h]=isset($_POST["dvt$h"]) ? $_POST["dvt$h"] : '';
$soluong1[$h]=isset($_POST["soluong$h"]) ? $_POST["soluong$h"] : '';
if($check==1&&$mota1[$h]!=""){
$update1 = "update danhmucvattu_iso SET  
mota= '$mota1[$h]',
serialnumber= '$pn1[$h]',
dvt='$dvt1[$h]',
soluong='$soluong1[$h]'
WHERE mahoso='$sohs' and stt='$h'" ;

mysql_query($update1) or die(mysql_error());

}
$h++;
}


for($k=$sum+1;$k<=10+$sum;$k++)
{	
$mota2[$k]=isset($_POST["mota$k"]) ? $_POST["mota$k"] : '';
$pn2[$k]=isset($_POST["pn$k"]) ? $_POST["pn$k"] : '';
$dvt2[$k]=isset($_POST["dvt$k"]) ? $_POST["dvt$k"] : '';
$soluong2[$k]=isset($_POST["soluong$k"]) ? $_POST["soluong$k"] : '';
if($check==1&&$mota2[$k]!=""){
$insert1 = "insert into danhmucvattu_iso(
stt,
mahoso,
mota,
serialnumber,
dvt,
soluong
) values (
'$recc',
'$sohs',
'$mota2[$k]',
'$pn2[$k]',
'$dvt2[$k]',
'$soluong2[$k]'
)" ;
mysql_query($insert1) or die(mysql_error());

$recc++;
}else  break;
}

$tenthietbisql10 = mysql_query("SELECT * FROM hosocvk_iso WHERE maql='$maquanlycvk2' and mavt='$mavattucvk1'") ;
while($row = mysql_fetch_array($tenthietbisql10))
{
	$sovt =$row['sovt'];
}



echo "
	<html lang=\"vi\">
	<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
</head>
<body>
<table>
<tr>
<td >
XN Địa Vật Lý GK <br/>
X&#432;&#7903;ng
SCTB&#272;VL
</td>
<td style=\"width:70%\">
 <p style=\"font-weight:bold;font-size=\"12\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PHIẾU THỰC HIỆN CÔNG VIỆC
 </td>
 </tr>
 </table>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Số:  <b>$sohs  </b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    Ngày bắt đầu : <b>$ngays/$thangs/$nams  </b>  Ngày kết thúc : <b>$ngayt/$thangt/$namt </b>

	  <br/>
	  <br/>
	  <br/>
		<table>
		<tr>
		<td>1. Tên thiết bị: <b> $mavattucvk1 </b>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Số : <b> $sovt </b>
		</td>
	    </tr>
		<tr>
		<td>2. Người thực hiện: <b> $ngth </b></td>
		</tr>
		<tr>
		<td>3. Các thiết bị hỗ trợ </td>
	    </tr>
		<tr>
		<td>
		<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:solid black .5pt;
 mso-border-themecolor:text1;mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=97 valign=top style='width:72.9pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>STT<o:p></o:p></span></b></p>
  </td>
  <td width=328 valign=top style='width:246.3pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><b style='mso-bidi-font-weight:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>Tên</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
  \"Times New Roman\",\"serif\"'> <span class=SpellE>thi&#7871;t</span> <span
  class=SpellE>b&#7883;</span><o:p></o:p></span></b></p>
  </td>
  <td width=213 valign=top style='width:159.6pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><b style='mso-bidi-font-weight:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>S&#7889;</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
  \"Times New Roman\",\"serif\"'> <span class=SpellE>máy</span><o:p></o:p></span></b></p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'><o:p></o:p></span></b></p>
  </td>
 </tr>";
 	$i=1;
	while($i<=5){
	if($tenthietbihotrocvk[$i]!=""){
 	echo"<tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes'>
  <td width=97 valign=top style='width:72.9pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;
  mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><o:p>&nbsp; $i</o:p></p>
  </td>
  <td width=328 valign=top style='width:246.3pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><o:p>&nbsp;$tenthietbihotrocvk[$i] </o:p></p>
  </td>
  <td width=213 valign=top style='width:159.6pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><o:p>&nbsp; $serialnumbercvk[$i]</o:p></p>
  </td>
 </tr>";
 	}
 $i++;
 }
echo"</table>
		
		  </td>
		</tr>
		<tr>
		<td>4. Nội dung công việc:  </td>
		</tr>
		</table>
		<br/>
	<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=634
 style='width:475.8pt;border-collapse:collapse;border:none;mso-border-alt:solid black .5pt;
 mso-border-themecolor:text1;mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:74.25pt'>
  <td style='border:solid black 1.0pt;mso-border-themecolor:text1;mso-border-alt:
  solid black .5pt;mso-border-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;
  height:74.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span class=SpellE><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>Tình</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
  \"Times New Roman\",\"serif\"'> <span class=SpellE>tr&#7841;ng</span> <span
  class=SpellE>c&#7911;a</span> <span class=SpellE>thi&#7871;t</span> <span
  class=SpellE>b&#7883;</span> <span class=SpellE>tr&#432;&#7899;c</span> <span
  class=SpellE>khi</span> <span class=SpellE>s&#7917;a</span> <span
  class=SpellE>ch&#7919;a</span><o:p></o:p></span></b></p>
  </td>
  <td width=317 style='width:237.9pt;border:solid black 1.0pt;mso-border-themecolor:
  text1;border-left:none;mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:
  text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:
  0in 5.4pt 0in 5.4pt;height:74.25pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span class=SpellE><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'></span></span><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'> <span
  class=SpellE></span> <span class=SpellE> $ttktbefore</span><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;height:63.85pt'>
  <td width=317 style='width:237.9pt;border:solid black 1.0pt;mso-border-themecolor:
  text1;border-top:none;mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:
  text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:
  0in 5.4pt 0in 5.4pt;height:63.85pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span class=SpellE><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>Tiến </span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
 \"Times New Roman\",\"serif\"'> <span class=SpellE>độ công việc</span><o:p></o:p></span></b></p>
  </td>
  <td width=317 style='width:237.9pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:63.85pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span class=SpellE><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'></span></span><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'> $tiendocv <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;height:63.85pt'>
  <td width=317 style='width:237.9pt;border:solid black 1.0pt;mso-border-themecolor:
  text1;border-top:none;mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:
  text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:
  0in 5.4pt 0in 5.4pt;height:63.85pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span class=SpellE><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>H&#7887;ng</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
 \"Times New Roman\",\"serif\"'> <span class=SpellE>hóc</span><o:p></o:p></span></b></p>
  </td>
  <td width=317 style='width:237.9pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:63.85pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span class=SpellE><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'></span></span><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'> $honghoc <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2;height:63.4pt'>
  <td width=317 style='width:237.9pt;border:solid black 1.0pt;mso-border-themecolor:
  text1;border-top:none;mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:
  text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:
  0in 5.4pt 0in 5.4pt;height:63.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span class=SpellE><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>Cách</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
  \"Times New Roman\",\"serif\"'> <span class=SpellE>kh&#7855;c</span> <span
  class=SpellE>ph&#7909;c</span><o:p></o:p></span></b></p>
  </td>
  <td width=317 style='width:237.9pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:63.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span class=SpellE><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'></span></span><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'> $khacphuc <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:3;height:70.6pt'>
  <td width=317 style='width:237.9pt;border:solid black 1.0pt;mso-border-themecolor:
  text1;border-top:none;mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:
  text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:
  0in 5.4pt 0in 5.4pt;height:70.6pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span class=SpellE><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>Tình</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
  \"Times New Roman\",\"serif\"'> <span class=SpellE>tr&#7841;ng</span> <span
  class=SpellE>k&#7929;</span> <span class=SpellE>thu&#7853;t</span> <span
  class=SpellE>c&#7911;a</span> <span class=SpellE>thi&#7871;t</span> <span
  class=SpellE>b&#7883;</span> <span class=SpellE>sau</span> <span
  class=SpellE>khi</span> <span class=SpellE>s&#7917;a</span> <span
  class=SpellE>ch&#7919;a</span><o:p></o:p></span></b></p>
  </td>
  <td width=317 style='width:237.9pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:70.6pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span class=SpellE><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>$ttktafter</span></span><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:4;mso-yfti-lastrow:yes;height:70.6pt'>
  <td width=317 style='width:237.9pt;border:solid black 1.0pt;mso-border-themecolor:
  text1;border-top:none;mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:
  text1;mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:
  0in 5.4pt 0in 5.4pt;height:70.6pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span class=SpellE><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>Khuy&#7871;n</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
  \"Times New Roman\",\"serif\"'> <span class=SpellE>ngh&#7883;</span><o:p></o:p></span></b></p>
  </td>
  <td width=317 style='width:237.9pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:70.6pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span class=SpellE><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>$ghichu</span></span><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'><o:p></o:p></span></p>
  </td>
 </tr>
</table>
	<br/>";
	/*
echo"	<p> 5. Danh mục vật tư </p>
	<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:solid black .5pt;
 mso-border-themecolor:text1;mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=61 valign=top style='width:45.9pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>STT<o:p></o:p></span></b></p>
  </td>
  <td width=168 valign=top style='width:1.75in;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><b style='mso-bidi-font-weight:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>Mô</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
  \"Times New Roman\",\"serif\"'> <span class=SpellE>t&#7843;</span><o:p></o:p></span></b></p>
  </td>
  <td width=126 valign=top style='width:94.5pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>P/N<o:p></o:p></span></b></p>
  </td>
  <td width=155 valign=top style='width:116.6pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><b style='mso-bidi-font-weight:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>&#272;&#417;n</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
  \"Times New Roman\",\"serif\"'> <span class=SpellE>v&#7883;</span> <span
  class=SpellE>tính</span><o:p></o:p></span></b></p>
  </td>
  <td width=128 valign=top style='width:95.8pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><b style='mso-bidi-font-weight:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>S&#7889;</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
  \"Times New Roman\",\"serif\"'> <span class=SpellE>l&#432;&#7907;ng</span><o:p></o:p></span></b></p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'><o:p></o:p></span></b></p>
  </td>
 </tr>";
 $j=1;
 $tenthietbisql19 = mysql_query("SELECT * FROM danhmucvattu_iso WHERE mahoso='$sohs'") ;
 while($row = mysql_fetch_array($tenthietbisql19))
 {
	$mota =$row['mota'];
	$serialnumber =$row['serialnumber'];	
	$dvt =$row['dvt'];
	$soluong =$row['soluong'];
	
	
 echo"<tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes'>
  <td width=61 valign=top style='width:45.9pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;
  mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:12.0pt;
  font-family:\"Times New Roman\",\"serif\"'>$j <o:p></o:p></span></p>
  </td>
  <td width=168 valign=top style='width:1.75in;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'><o:p>&nbsp; $mota</o:p></span></p>
  </td>
  <td width=126 valign=top style='width:94.5pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'><o:p>&nbsp;$serialnumber</o:p></span></p>
  </td>
  <td width=155 valign=top style='width:116.6pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'><o:p>&nbsp; $dvt</o:p></span></p>
  </td>
  <td width=128 valign=top style='width:95.8pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'><o:p>&nbsp; $soluong</o:p></span></p>
  </td>
 </tr>";
  $j++;
 }
 
echo"</table>	</br>";
*/
echo"		<p style=\"margin-left:30px;\"> <strong>Người thực hiện</strong>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<em>(ký tên)</em> </p>
	
		
<font size=2> BM.25.04 <br/>
10/10/2012 </font>
</body>
</html> " ;	
header("Content-Disposition:attchment;filename=\"$ngays$thangs$nams-CVK.doc\""); 
exit;	
}

if(($chonthietbi=="yes")&&($xuatphieu=="")&&($addvt=="")&&($savefilesc==""))
{
$maql= isset($_POST['maql']) ? $_POST['maql'] : '';
$hosomay = isset($_POST['hosomay']) ? $_POST['hosomay'] : '';
$ngayth = isset($_POST['ngayth']) ? $_POST['ngayth'] : '';
$ngaykt = isset($_POST['ngaykt']) ? $_POST['ngaykt'] : '';
$ttktbefore = isset($_POST['ttktbefore']) ? $_POST['ttktbefore'] : '';
$honghoc = isset($_POST['honghoc']) ? $_POST['honghoc'] : '';
$khacphuc = isset($_POST['khacphuc']) ? $_POST['khacphuc'] : '';
$ttktafter = isset($_POST['ttktafter']) ? $_POST['ttktafter'] : '';
$ghichu = isset($_POST['ghichu']) ? $_POST['ghichu'] : '';
$nhomsc = isset($_POST['nhomsc']) ? $_POST['nhomsc'] : '';

$homay = isset($_POST['homay']) ? $_POST['homay'] : '';
$dienap = isset($_POST['dienap']) ? $_POST['dienap'] : '';
$dong = isset($_POST['dong']) ? $_POST['dong'] : '';
$noidung = isset($_POST['noidung']) ? $_POST['noidung'] : '';
$ketluan = isset($_POST['ketluan']) ? $_POST['ketluan'] : '';
$ghichufinal = isset($_POST['ghichufinal']) ? $_POST['ghichufinal'] : '';
$cv = isset($_POST['cv']) ? $_POST['cv'] : '';

for($i=1;$i<=8;$i++){
$hoten[$i]=isset($_POST["hoten$i"]) ? $_POST["hoten$i"] : '';
$gio[$i]=isset($_POST["gio$i"]) ? $_POST["gio$i"] : '';
}

for($i=1;$i<=5;$i++){
$thietbihotro[$i]=isset($_POST["thietbihotro$i"]) ? $_POST["thietbihotro$i"] : '';
$serialnumber[$i]=isset($_POST["serialnumber$i"]) ? $_POST["serialnumber$i"] : '';
}
$tenthietbisql10 = mysql_query("SELECT DISTINCT mavt,somay,model FROM hososcbd_iso where hoso='$hosomay'") ;
		while($row = mysql_fetch_array($tenthietbisql10))
		{
			$mavt =$row['mavt'];	
			$somay =$row['somay'];	
			$model =$row['model'];	
		}
$tenthietbisql11 = mysql_query("SELECT DISTINCT mamay,homay,dienap FROM thietbi_iso where mavt='$mavt' and somay='$somay' and model='$model'") ;
		while($row = mysql_fetch_array($tenthietbisql11))
		{
			$mamay =$row['mamay'];	
			$homay=$row['homay'];
			$dienap=$row['dienap'];
		}
echo "
<html lang=\"vi\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
<SCRIPT LANGUAGE=\"JavaScript\" SRC=\"java/CalendarPopup.js\"></SCRIPT>
<SCRIPT LANGUAGE=\"JavaScript\">
var cal = new CalendarPopup();
</SCRIPT>
<script src=\"tinymce/tinymce.min.js\"></script>
<script type=\"text/javascript\">
tinymce.init({
selector: \"textarea\"   
}); 
</script>
</head>
<body>
<table style=\"width:100%\">
<tr>
<td >
<h2> <p style=\"text-align:center;color:blue;\"> PHIẾU THỰC HIỆN CÔNG VIỆC <br/></h2>
</p>
</td>
</tr>
</table>
<br/>
<form method=\"post\" action=\"formsc.php\" enctype=\"multipart/form-data\" name=\"example\">
<table class=\"table7\" style=\"margin-left:50px;\">
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFE4B5;\"> <strong>Mã quản lý</strong> </td>
<td>
<div class=\"content\">
<input name=\"maql\" type=\"text\" class=\"search\" id=\"searchid\" style=\"text-align:center;width:100%;background:#8adaa5;height:25px;\"
value=\"$maql\" />
<div id=\"result\"></div>
</div>
</td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#9966CC;\"> <strong>Mã thiết bị</strong> </td>
<td> <select style=\"border-style:none;width:100%;height:30px;color:blue;text-align:center;\">
		<option value=\"mavt1\">$mamay</option>";
echo"</select> </td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Số hồ sơ</strong> </td>
<td> <input style=\"border-style:none;width:100%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"hosomay\" size=\"36\" type=\"text\" value=\"$hosomay\" > </td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Nhóm sửa chữa</strong> </td>
<td>
<select name=\"nhomsc\" style=\"border-style:none;width:100%;height:100%;text-align:center;\">
		<option value=\"$nhomsc\">$nhomsc</option>
		<option value=\"RDNGA\"> Nhóm RDNGA </option>
		<option value=\"CNC\"> Nhóm CNC</option>
</select>
  </td>
  </tr>
  <tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Ngày BĐ</strong> </td>";
if($ngayth!="0000-00-00"){
echo"<td>
   <input style=\"border-style:none;width:95%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"ngayth\" size=\"36\" type=\"text\" value=\"$ngayth\" readonly> 
<A HREF=\"#\"
                onClick=\"cal.select(document.forms['example'].ngayth,'anchor1','dd/MM/yyyy'); return false;\"
		NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A> </p> 
</td>";
}else{
echo"<td><input style=\"border-style:none;width:95%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"ngayth\" size=\"36\" type=\"text\" value=\"$curday\">
<A HREF=\"#\"
                onClick=\"cal.select(document.forms['example'].ngayth,'anchor1','dd/MM/yyyy'); return false;\"
		NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A> </p>
</td>";
}
echo"</tr>";

echo"</table>";
echo "<p style=\"margin-left:50px;\"> <strong>I. NGƯỜI THỰC HIỆN </strong> <br/> <br/> </p>
<table class=\"table1\" style=\"margin-left:50px;width:800px;\">

	<tr>
<th style=\"text-align:center;font-size: 15;width:60px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:400px;\"> Họ tên</th>
<th style=\"text-align:center;font-size: 15;\"> Giờ làm việc</th>
</ul>
</tr>";
$i=1;
$donvi="chuẩn chỉnh máy địa vật lý";
while($i<=8){
if ($gio[$i]==0) $gio[$i]="";
echo"<tr>
<td><center> $i </center> </td>
<td><select name=\"hoten$i\" style=\"border-style:none;width:100%;height:30px;\"\">
<option value=\"$hoten[$i]\">$hoten[$i]</option>
<option value=\"\"></option>";
		$hotensql10 = mysql_query("SELECT hoten FROM resume where donvi like'%$donvi%' and nghiviec !='yes'") ;
		while($row = mysql_fetch_array($hotensql10))
		{
			$hotennv =$row['hoten'];	
			echo "<option value=\"$hotennv\" style=\"background:#87CEEB;\"> $hotennv </option>";
		}
echo"</select></td>
<td><input type=text name=\"gio$i\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$gio[$i]\"> </td>
</tr>";
$i++;
}
echo"</table>";
echo "<p style=\"margin-left:50px;\"> <strong>II. CÁC THIẾT BỊ HỖ TRỢ </strong> <br/> <br/> </p>
<table class=\"table1\" style=\"margin-left:50px;width:800px;\">
<tr>
<th style=\"text-align:center;font-size: 15;width:60px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:405px;\"> Tên viết tắt</th>
<th style=\"text-align:center;font-size: 15;width:335px\"> Serial Number</th>
</ul>
</tr>";
$i=1;
while($i<=5){
echo"<tr>
<td><center> $i </center> </td>
<td><select name=\"thietbihotro$i\" onchange=\"this.form.submit()\" style=\"border-style:none;width:100%;height:30px;\" >
<option value=\"$thietbihotro[$i]\">$thietbihotro[$i]</option>
<option value=\"\"></option>";
		$tenthietbisql10 = mysql_query("SELECT DISTINCT tenthietbi FROM thietbihotro_iso where thly='0'") ;
		while($row = mysql_fetch_array($tenthietbisql10))
		{
			$tentb =$row['tenthietbi'];	
			$tenthietbisql11 = mysql_query("SELECT chusohuu FROM thietbihotro_iso where tenthietbi='$tentb' and thly='0'") ;
			$sh="";
	         	while($row = mysql_fetch_array($tenthietbisql11))
			{
				$chusohuu=$row['chusohuu'];
				$ar=explode(" ",$chusohuu);
				$k=count($ar);
				if ($sh=="")
				$sh=$ar[$k-1];
				else 
					$sh=$sh.",".$ar[$k-1];
			}
			 
			echo "<option value=\"$tentb\" style=\"background:#87CEEB;\"> $tentb-$sh</option>";
		}
echo"</select></td>
<td><select name=\"serialnumber$i\" style=\"border-style:none;width:100%;height:30px;text-align:center;\" >
<option value=\"$serialnumber[$i]\">$serialnumber[$i] </option>
<option value=\"\"></option> ";
		$tenthietbisql11 = mysql_query("SELECT DISTINCT serialnumber FROM thietbihotro_iso WHERE tenthietbi='$thietbihotro[$i]' and thly='0'") ;
		while($row = mysql_fetch_array($tenthietbisql11))
		{
			$sn =$row['serialnumber'];	
			echo "<option value=\"$sn\" style=\"background:#87CEEB;\"> $sn </option>";
		}
echo"</select></td></tr>";
$i++;
}
echo "<tr>
		<th style=\"text-align:center;font-size: 15;width:40px;\"></th>
		<th style=\"text-align:center;font-size: 15;width:180px;\"><a href=\"danhmuchotro.php?&start=0&ad=&sort=&s=&f=&mte_a=new\" target=\"_blank\">Thêm thiết bị mới</a></th>
		<th style=\"text-align:center;font-size: 15;width:80px;\"></th>
		</tr>";
echo"</table></br>";
/*
echo"<p style=\"margin-left:50px;\"> <strong>III. DANH MỤC VẬT TƯ</strong> <br/> <br/> </p>
<table class=\"table1\" style=\"margin-left:50px;width:800px;\">
<tr>
<th style=\"text-align:center;font-size: 15;width:30px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:250px;\"> Mã Vật Tư</th>
<th style=\"text-align:center;font-size: 15;width:120px;\"> Mô tả</th>
<th style=\"text-align:center;font-size: 15;width:90px;\"> P/N</th>
<th style=\"text-align:center;font-size: 15 ;width:60px;\"> ĐVT </th>
<th style=\"text-align:center;font-size: 15 ;width:70px;\"> Số lượng </th>
<th style=\"text-align:center;font-size: 15 ;width:50px;\">xóa</th>
</tr>";
$sum=0;
for($j=1;$j<=20;$j++){
	$mota[$j]=isset($_POST["mota$j"]) ? $_POST["mota$j"] : '';
	if($mota[$j]!="") {
	$malinhkien[$j]=isset($_POST["malinhkien$j"]) ? $_POST["malinhkien$j"] : '';
	$mlkien[$j]=isset($_POST["mlkien$j"]) ? $_POST["mlkien$j"] : '';
	$pn[$j]=isset($_POST["pn$j"]) ? $_POST["pn$j"] : '';
	$dvt[$j]=isset($_POST["dvt$j"]) ? $_POST["dvt$j"] : '';
	$soluong[$j]=isset($_POST["soluong$j"]) ? $_POST["soluong$j"] : '';
	$sl[$j]=isset($_POST["sl$j"]) ? $_POST["sl$j"] : '';
        if ($sl[$j]!="") $checkb='checked="checked"'; else $checkb="";
	$stt=$sum+1;
	echo"<tr>
	<td><center> $stt </center> </td>
	<td><select name=\"mlkien$j\">
	<option value=\"$mlkien[$j]\" style=\"background:#87CEEB;\"> $mlkien[$j] </option>
	";
$tenthietbisql10 = mysql_query("SELECT DISTINCT mavattu FROM danhmucvattu_iso") ;
		while($row = mysql_fetch_array($tenthietbisql10))
		{
			$mlk =$row['mavattu'];	
			echo "<option value=\"$mlk\" style=\"background:#87CEEB;\"> $mlk </option>";
		}	

	//echo"<option value=\"xoa\" style=\"background:#87CEEB;\">Xóa hàng</option>";
	echo"</select>";
	if ($mlkien[$j]=="other")
	echo"<input type=text name=\"malinhkien$j\" style=\"border-style:none;padding-left:5px;\"  value=\"$malinhkien[$j]\">";
	echo"</td>";
	echo"<td><input type=text name=\"mota$j\" style=\"border-style:none;width:100%;padding-left:10px;\" value=\"$mota[$j]\"> </td>
	<td><input type=text name=\"pn$j\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$pn[$j]\"> </td>
	<td><input type=text name=\"dvt$j\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$dvt[$j]\"> </td>
	<td><input type=text name=\"soluong$j\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$soluong[$j]\"> </td>
	<td> <center><input type=\"checkbox\" name=\"sl$j\" value=\"$mlkien[$j]\" $checkb> </center></td>
	</tr>";
	$sum++;
	}
}
	if($sum==0) {
	for($j=1;$j<=5;$j++){
	echo"<tr>
	<td><center> $j </center> </td>
	<td><select name=\"mlkien$j\">
	<option value=\"other\" style=\"background:#87CEEB;\"> Nhập khác </option>
	";
$tenthietbisql10 = mysql_query("SELECT DISTINCT mavattu FROM danhmucvattu_iso") ;
		while($row = mysql_fetch_array($tenthietbisql10))
		{
			$malinhkien =$row['mavattu'];	
			echo "<option value=\"$malinhkien\" style=\"background:#87CEEB;\"> $malinhkien </option>";
		}	

	echo"</select><input type=text name=\"malinhkien$j\" style=\"border-style:none;padding-left:5px;\" > </td>
	<td><input type=text name=\"mota$j\" style=\"border-style:none;width:100%;padding-left:10px;\" > </td>
	<td><input type=text name=\"pn$j\" style=\"border-style:none;width:100%;text-align:center;\"> </td>
	<td><input type=text name=\"dvt$j\" style=\"border-style:none;width:100%;text-align:center;\"> </td>
	<td><input type=text name=\"soluong$j\" style=\"border-style:none;width:100%;text-align:center;\"> </td>
	<td> <center><input type=\"checkbox\" name=\"sl$j\" value=\"$malinhkien\" $checkb> </center></td>
	</tr>";
	}
	}
echo"</table>
<ul id=\"mbbuttonaddebul_table\" class=\"mbbuttonaddebul_menulist\" style=\"width: 197px; height: 29px;margin-left:10px;\">
<a><input type=\"image\" name=\"addvt\"  value =\"themvt\" id=\"mbi_mbbuttonadd_1\" src=\"buttonadd_files/add.jpg\" name=\"mbi_mbbuttonadd_1\" 
style=\"vertical-align: bottom;\" border=\"0\" alt=\"Thêm\" title=\"\" onclick=\"this.form.addvt.value = this.value\" /></a>
</ul>";
*/
echo"<script type=\"text/javascript\" src=\"buttonadd_files/mbjsmbbuttonadd.js\"></script>
<input type=hidden name=addvt value=\"\">";
if ($cv=="KT")
echo "  <span style=\"margin-left:50px;\"> <strong>IV. NỘI DUNG CÔNG VIỆC : </strong> KT<input type=\"checkbox\" name=\"cv\" value=\"KT\" checked>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\" > 
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BDDK<input type=\"checkbox\" name=\"cv\" value=\"BDDK\">
		 </span>
	     <br><br>";
elseif ($cv=="BD")
		echo "  <span style=\"margin-left:50px;\"> <strong>IV. NỘI DUNG CÔNG VIỆC : </strong> KT<input type=\"checkbox\" name=\"cv\" value=\"KT\">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\" checked > 
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BDDK<input type=\"checkbox\" name=\"cv\" value=\"BDDK\">
		 </span>
	     <br><br>"; 
elseif ($cv=="SC")
		echo "  <span style=\"margin-left:50px;\"> <strong>IV. NỘI DUNG CÔNG VIỆC : </strong> KT<input type=\"checkbox\" name=\"cv\" value=\"KT\">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\"  > 
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\" checked>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BDDK<input type=\"checkbox\" name=\"cv\" value=\"BDDK\">
		 </span>
	     <br><br>"; 
elseif ($cv=="BDDK")
		echo "  <span style=\"margin-left:50px;\"> <strong>IV. NỘI DUNG CÔNG VIỆC : </strong> KT<input type=\"checkbox\" name=\"cv\" value=\"KT\">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\"  > 
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BDDK<input type=\"checkbox\" name=\"cv\" value=\"BDDK\" checked>
		 </span>
	     <br><br>"; 
else
echo "  <span style=\"margin-left:50px;\"> <strong>IV. NỘI DUNG CÔNG VIỆC : </strong> KT<input type=\"checkbox\" name=\"cv\" value=\"KT\">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\"  > 
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\" checked>
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BDDK<input type=\"checkbox\" name=\"cv\" value=\"BDDK\">
		 </span>
	     <br><br>"; 
echo"
<table class=\"table7\" style=\"margin-left:50px;\">
<tr>
<td  style=\"text-align:left;color:black;font-size: 18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Mô tả chi tiết tình trạng của thiết bị, các hỏng hóc (nếu có) do nhân viên xưởng kiểm tra, phát hiện</b> </td>
<td><textarea rows='3' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"honghoc\"/>$honghoc</textarea> </td>
</tr>
<tr>
<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Mô tả công việc thực hiện hoặc cách khắc phục hỏng hóc</b></td>
<td><textarea rows='3' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"khacphuc\"/>$khacphuc</textarea> </td>
</tr> ";
echo"	
     <tr>
     <td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Kiểm tra tình trạng kỹ thuật của thiết bị sau khi BD/SC</b></td>
		<td> 1.Tên máy : .....<span  style=\"color:blue;\">$mavt</span>.....Số máy :.....<span  style=\"color:blue;\">$somay</span>.....</br> <span>2.Họ máy :<input type=text name=\"homay\" style=\"border-style:none;\" value=\"$homay\"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Model: <input type=text name=\"model\" style=\"border-style:none;\" value=\"$model\"></span></br><span>3.Điện áp nuôi :<input type=text name=\"dienap\" style=\"border-style:none;\" value=\"$dienap\">Dòng tiêu thụ: <input type=text name=\"dong\" style=\"border-style:none;\" value=\"$dong\"></span></br><span>4.Nội dung kiểm tra: <textarea rows='8' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"noidung\"/>$noidung</textarea></span></span></br></br>";

echo " <b> 5. BẢNG SỐ LIỆU CẦN THIẾT (nếu có)</b>
<table class=\"table1\" style=\"margin-left:5px;width:470px;\">
<tr>
<th> Tên Tài Liệu </th>
<th> Link Tài Liệu </th>
</tr>";
//set all variable to null
for ($i=1;$i<=10;$i++) {
	$tentailieu[$i] ="";
	$linktailieu[$i] ="";
}
$check1=0;
$tenthietbisql22 = mysql_query("SELECT * FROM bangsolieu_iso ") ;
$j=1;
while($row = mysql_fetch_array($tenthietbisql22))
{
	$sohoso =$row['sohoso'];
	if($sohoso==$hosomay)	{
	$check1=1;
	$tentailieu[$j] =$row['tentailieu'];
	$linktailieu[$j] =$row['link'];
	$j++;
	}
}
if ($j>5) $jj=$j; else $jj=5;
for($i=1;$i<=$jj;$i++){
	$tentailieu_s[$i]=isset($_POST["tentailieu$i"]) ? $_POST["tentailieu$i"] : '';
if($check1==0) {
	echo"<tr><td> <input type=text id=\"tentl\" name=\"tentailieu$i\" style=\"border-style:none;width:100%;padding-left:10px;\" 
	value=\"$tentailieu_s[$i]\"></td>";
	echo"<td><input type=\"file\" id=\"file\" name=\"files[]\" multiple=\"multiple\"/></td></tr>";
}else{
	if ($linktailieu[$i]!=""){
	echo"<tr><td> <input type=text id=\"tentl\" name=\"tentailieu$i\" style=\"border-style:none;width:100%;padding-left:10px;\" 
	value=\"$tentailieu[$i]\"></td>";
	echo"<td><a href=\"./hoso/$sohoso/$linktailieu[$i]\">linkdown</a><span  style=\"padding-left:130px\" ><a href='xoafile.php?f=$linktailieu[$i]&s=$sohoso' TARGET=\"_blank\" title='Delete' >Delete</a></span></td></tr>";
	}else{ 
	echo"<tr><td> <input type=text id=\"tentl\" name=\"tentailieu$i\" style=\"border-style:none;width:100%;padding-left:10px;\" 
	value=\"$tentailieu_s[$i]\"></td>";
	echo"<td><input type=\"file\" id=\"file\" name=\"files[]\" multiple=\"multiple\" /></td></tr>";
	}
}
}
echo "</table><br/>";
echo"<span>6.Kết luận: <textarea rows='2' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"ketluan\"/>$ketluan</textarea></span>";
echo "</td></tr>";

//Taiday
echo"		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Tình trạng kỹ thuật của thiết bị sau khi sửa chữa </b> </td>
		<td><select name=\"ttktafter\" style=\"border-style:none;width:100%;height:100px;\">
		<option value=\"$ttktafter\"> $ttktafter</option>
		<option value=\"Đạt\">Đạt </option>
		<option value=\"Hỏng\">Hỏng (Không khắc phục được)</option>
		<option value=\"Chờ vật tư thay thế\">Chờ vật tư thay thế</option>
		<option value=\"Chưa kết luận\">Chưa kết luận</option>
		<option value=\"Đang sửa chữa\">Đang sửa chữa</option>
		<option value=\"TTKTDB\">TTKT Đặc biệt</option>
		</select>
		 </td>
		</tr>";
echo"<tr>
	<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Ghi chú tình trạng kỹ thuật</b></td>";
echo"<td><span><textarea rows='2' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"ghichufinal\" />$ghichufinal</textarea></span></td></tr>";
echo"<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Ngày Kết thúc </strong></td>";
if($ngaykt!="0000-00-00"){
echo"<td> <input style=\"border-style:none;width:95%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"ngaykt\" size=\"36\" type=\"text\" value=\"$ngaykt\"> 
<A HREF=\"#\"
                onClick=\"cal.select(document.forms['example'].ngaykt,'anchor1','dd/MM/yyyy'); return false;\"
		NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A> </p>
</td>";
}else{
echo"<td> <input style=\"border-style:none;width:95%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"ngaykt\" size=\"36\" 
		type=\"text\" readonly> 
<A HREF=\"#\"
                onClick=\"cal.select(document.forms['example'].ngaykt,'anchor1','dd/MM/yyyy'); return false;\"
		NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A> </p>
</td>";
}
echo"</tr>";
/*echo "<tr>
<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b> Khuyến nghị </b></td>
<td><input type=text name=\"ghichu\" style=\"border-style:none;width:100%;height:100px;padding-left:10px;\" value=\"$ghichu\"> </td>
</tr>";
 */
echo"</table>";
echo"   <table><tr><td><input style=\"margin-left:380px;\"/ type=\"image\" name=\"xuatphieu\" value =\"phieukiemtra\" src=\"upload/xuatsc.jpg\" alt=\"Nhap\" 
	onclick=\"this.form.xuatphieu.value = this.value\"/></td></tr>
	</table>
	<input type=hidden name=xuatphieu value=\"\">
	<input type=hidden name=maql value=\"$maql\">
	<input type=hidden name=username value=$username>
	<input type=hidden name=password value=$password>
	<input type=hidden name=hoso value=phieusuachua>
	<input type=hidden name=chonthietbi value=yes>

</form>
</body>
</html>";
}
if($addvt=="themvt")
{

$maql= isset($_POST['maql']) ? $_POST['maql'] : '';
$hosomay = isset($_POST['hosomay']) ? $_POST['hosomay'] : '';
$ngayth = isset($_POST['ngayth']) ? $_POST['ngayth'] : '';
$ngaykt = isset($_POST['ngaykt']) ? $_POST['ngaykt'] : '';
$ttktbefore = isset($_POST['ttktbefore']) ? $_POST['ttktbefore'] : '';
$honghoc = isset($_POST['honghoc']) ? $_POST['honghoc'] : '';
$khacphuc = isset($_POST['khacphuc']) ? $_POST['khacphuc'] : '';
$ttktafter = isset($_POST['ttktafter']) ? $_POST['ttktafter'] : '';
$ghichu = isset($_POST['ghichu']) ? $_POST['ghichu'] : '';
$nhomsc = isset($_POST['nhomsc']) ? $_POST['nhomsc'] : '';
for($i=1;$i<=8;$i++){
$hoten[$i]=isset($_POST["hoten$i"]) ? $_POST["hoten$i"] : '';
$gio[$i]=isset($_POST["gio$i"]) ? $_POST["gio$i"] : '';
}
$homay = isset($_POST['homay']) ? $_POST['homay'] : '';
$dienap = isset($_POST['dienap']) ? $_POST['dienap'] : '';
$dong = isset($_POST['dong']) ? $_POST['dong'] : '';
$noidung = isset($_POST['noidung']) ? $_POST['noidung'] : '';
$ketluan = isset($_POST['ketluan']) ? $_POST['ketluan'] : '';
$cv = isset($_POST['cv']) ? $_POST['cv'] : '';

for($i=1;$i<=5;$i++){
$thietbihotro[$i]=isset($_POST["thietbihotro$i"]) ? $_POST["thietbihotro$i"] : '';
$serialnumber[$i]=isset($_POST["serialnumber$i"]) ? $_POST["serialnumber$i"] : '';
}
$tenthietbisql10 = mysql_query("SELECT DISTINCT mavt,somay,model FROM hososcbd_iso where hoso='$hosomay'") ;
		while($row = mysql_fetch_array($tenthietbisql10))
		{
			$mavt =$row['mavt'];	
			$somay =$row['somay'];	
			$model =$row['model'];	
		}
$tenthietbisql11 = mysql_query("SELECT DISTINCT mamay,homay,dienap FROM thietbi_iso where mavt='$mavt' and somay='$somay' and model='$model'") ;
		while($row = mysql_fetch_array($tenthietbisql11))
		{
			$mamay =$row['mamay'];
			$homay=$row['homay'];
			$dienap=$row['dienap'];	
		}
echo "
<html lang=\"vi\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
<SCRIPT LANGUAGE=\"JavaScript\" SRC=\"java/CalendarPopup.js\"></SCRIPT>
<SCRIPT LANGUAGE=\"JavaScript\">
var cal = new CalendarPopup();
</SCRIPT>
<script src=\"tinymce/tinymce.min.js\"></script>
<script type=\"text/javascript\">
tinymce.init({
selector: \"textarea\"   
}); 
</script>
</head>
<body>
<table style=\"width:100%\">
<tr>
<td >
<h2> <p style=\"text-align:center;color:blue;\"> PHIẾU THỰC HIỆN CÔNG VIỆC <br/></h2>
</p>
</td>
</tr>
</table>
<br/>
<form method=\"post\" action=\"formsc.php\" enctype=\"multipart/form-data\" name=\"example\">
<table class=\"table7\" style=\"margin-left:50px;\">
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFE4B5;\"> <strong>Mã quản lý</strong> </td>
<td>
<div class=\"content\">
<input name=\"maql\" type=\"text\" class=\"search\" id=\"searchid\" style=\"text-align:center;width:100%;background:#8adaa5;height:25px;\"
value=\"$maql\" />
<div id=\"result\"></div>
</div>
</td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#9966CC;\"> <strong>Mã thiết bị</strong> </td>
<td> <select style=\"border-style:none;width:100%;height:30px;color:blue;text-align:center;\">
		<option value=\"mavt\">$mamay</option>";
echo"</select></td></tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Số hồ sơ</strong> </td>
<td> <input style=\"border-style:none;width:100%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"hosomay\" size=\"36\" type=\"text\" 
value=\"$hosomay\" > </td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Nhóm sửa chữa</strong> </td>
<td>
<select name=\"nhomsc\" style=\"border-style:none;width:100%;height:100%;text-align:center;\">
		<option value=\"$nhomsc\">$nhomsc</option>
		<option value=\"RDNGA\"> Nhóm RDNGA </option>
		<option value=\"CNC\"> Nhóm CNC</option>
</select>
</td>
</tr>";
echo"<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Ngày BĐ</strong> </td>";

if($ngayth!="0000-00-00"){
echo"<td>
   <input style=\"border-style:none;width:95%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"ngayth\" size=\"36\" type=\"text\" value=\"$ngayth\" readonly> 
<A HREF=\"#\"
                onClick=\"cal.select(document.forms['example'].ngayth,'anchor1','dd/MM/yyyy'); return false;\"
		NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A> </p> 
</td>";
}else{
echo"<td><input style=\"border-style:none;width:95%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"ngayth\" size=\"36\" type=\"text\" value=\"$curday\">
<A HREF=\"#\"
                onClick=\"cal.select(document.forms['example'].ngayth,'anchor1','dd/MM/yyyy'); return false;\"
		NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A> </p>
</td>";
}
echo"</tr>";
echo "</table>";
echo "<p style=\"margin-left:50px;\"> <strong>I. NGƯỜI THỰC HIỆN </strong> <br/> <br/> </p>
<table class=\"table1\" style=\"margin-left:50px;width:800px;\">
<tr>
<th style=\"text-align:center;font-size: 15;width:60px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:400px;\"> Họ tên</th>
<th style=\"text-align:center;font-size: 15;\"> Giờ làm việc</th>
</ul>
</tr>";
$i=1;
$donvi="chuẩn chỉnh máy địa vật lý";
while($i<=8){
if ($gio[$i]==0) $gio[$i]="";
echo"<tr>
<td><center> $i </center> </td>
<td><select name=\"hoten$i\" style=\"border-style:none;width:100%;height:30px;\"\">
<option value=\"$hoten[$i]\">$hoten[$i]</option>
<option value=\"\"></option>";
		$hotensql10 = mysql_query("SELECT hoten FROM resume where donvi like'%$donvi%' and nghiviec !='yes'") ;
		while($row = mysql_fetch_array($hotensql10))
		{
			$hotennv =$row['hoten'];	
			echo "<option value=\"$hotennv\" style=\"background:#87CEEB;\"> $hotennv </option>";
		}
echo"</select></td>
<td><input type=text name=\"gio$i\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$gio[$i]\"> </td>
</tr>";
$i++;
}
echo"</table>";
echo "<p style=\"margin-left:50px;\"> <strong>II. CÁC THIẾT BỊ HỖ TRỢ </strong> <br/> <br/> </p>
<table class=\"table1\" style=\"margin-left:50px;width:800px;\"><tr>
<th style=\"text-align:center;font-size: 15;width:60px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:405px;\"> Tên viết tắt</th>
<th style=\"text-align:center;font-size: 15;width:335px\"> Serial Number</th>
</ul>
</tr>";
$i=1;
while($i<=5){
echo"<tr>
<td><center> $i </center> </td>
<td><select name=\"thietbihotro$i\" onchange=\"this.form.submit()\" style=\"border-style:none;width:100%;height:30px;\" >
<option value=\"$thietbihotro[$i]\">$thietbihotro[$i]</option>
<option value=\"\"></option>";
		$tenthietbisql10 = mysql_query("SELECT DISTINCT tenthietbi FROM thietbihotro_iso where thly='0'") ;
		while($row = mysql_fetch_array($tenthietbisql10))
		{
			$tentb =$row['tenthietbi'];	
			$tenthietbisql11 = mysql_query("SELECT chusohuu FROM thietbihotro_iso where tenthietbi='$tentb' and thly='0'") ;
			$sh="";
	         	while($row = mysql_fetch_array($tenthietbisql11))
			{
				$chusohuu=$row['chusohuu'];
				$ar=explode(" ",$chusohuu);
				$k=count($ar);
				if ($sh=="")
				$sh=$ar[$k-1];
				else 
					$sh=$sh.",".$ar[$k-1];
			}
			 
			echo "<option value=\"$tentb\" style=\"background:#87CEEB;\"> $tentb-$sh</option>";
		}
echo"</select></td>
<td><select name=\"serialnumber$i\" style=\"border-style:none;width:100%;height:30px;text-align:center;\" >
<option value=\"$serialnumber[$i]\">$serialnumber[$i] </option>
<option value=\"\"></option>";
		$tenthietbisql11 = mysql_query("SELECT DISTINCT serialnumber FROM thietbihotro_iso WHERE tenthietbi='$thietbihotro[$i]' and thly='0'") ;
		while($row = mysql_fetch_array($tenthietbisql11))
		{
			$sn =$row['serialnumber'];	
			echo "<option value=\"$sn\" style=\"background:#87CEEB;\"> $sn </option>";
		}
echo"</select></td></tr>";
		$i++;
}
echo "<tr>
		<th style=\"text-align:center;font-size: 15;width:40px;\"></th>
		<th style=\"text-align:center;font-size: 15;width:180px;\"><a href=\"danhmuchotro.php?&start=0&ad=&sort=&s=&f=&mte_a=new\" target=\"_blank\">Thêm thiết bị mới</a></th>
		<th style=\"text-align:center;font-size: 15;width:80px;\"></th>
		</tr>";
echo"</table></br>";
/*
echo"<p style=\"margin-left:50px;\"> <strong>III. DANH MỤC VẬT TƯ</strong> <br/> <br/> </p>
<table class=\"table1\" style=\"margin-left:50px;width:800px;\">
<tr>
<th style=\"text-align:center;font-size: 15;width:30px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:250px;\"> Mã Vật Tư</th>
<th style=\"text-align:center;font-size: 15;width:120px;\"> Mô tả</th>
<th style=\"text-align:center;font-size: 15;width:90px;\"> P/N</th>
<th style=\"text-align:center;font-size: 15 ;width:60px;\"> ĐVT </th>
<th style=\"text-align:center;font-size: 15 ;width:70px;\"> Số lượng </th>
<th style=\"text-align:center;font-size: 15 ;width:50px;\">xóa</th>
</ul>
</tr>";
$sum=1;
for($j=1;$j<=20;$j++){
	$mota[$j]=isset($_POST["mota$j"]) ? $_POST["mota$j"] : '';
	if($mota[$j]!="") {
	$malinhkien[$j]=isset($_POST["malinhkien$j"]) ? $_POST["malinhkien$j"] : '';
	$mlkien[$j]=isset($_POST["mlkien$j"]) ? $_POST["mlkien$j"] : '';
	$pn[$j]=isset($_POST["pn$j"]) ? $_POST["pn$j"] : '';
	$dvt[$j]=isset($_POST["dvt$j"]) ? $_POST["dvt$j"] : '';
	$soluong[$j]=isset($_POST["soluong$j"]) ? $_POST["soluong$j"] : '';
	$sl[$j]=isset($_POST["sl$j"]) ? $_POST["sl$j"] : '';
        if ($sl[$j]!="") $checkb='checked="checked"'; else $checkb="";
	echo"<tr>
	<td><center> $sum </center> </td>
	<td><select name=\"mlkien$j\">
	<option value=\"$mlkien[$j]\" style=\"background:#87CEEB;\"> $mlkien[$j] </option>
	";
$tenthietbisql10 = mysql_query("SELECT DISTINCT mavattu FROM danhmucvattu_iso") ;
		while($row = mysql_fetch_array($tenthietbisql10))
		{
			$mlk =$row['mavattu'];	
			echo "<option value=\"$mlk\" style=\"background:#87CEEB;\"> $mlk </option>";
		}	

	//echo"<option value=\"xoa\" style=\"background:#87CEEB;\">Xóa hàng </option>";
		echo"</select>";
		if ($mlkien[$j]=="other")
			echo"<input type=text name=\"malinhkien$j\" style=\"border-style:none;padding-left:5px;\"  value=\"$malinhkien[$j]\">";
		echo"</td>";
	echo"<td><input type=text name=\"mota$j\" style=\"border-style:none;width:100%;padding-left:10px;\" value=\"$mota[$j]\"> </td>
	<td><input type=text name=\"pn$j\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$pn[$j]\"> </td>
	<td><input type=text name=\"dvt$j\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$dvt[$j]\"> </td>
	<td><input type=text name=\"soluong$j\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$soluong[$j]\"> </td>
	<td> <center><input type=\"checkbox\" name=\"sl$j\" value=\"$mlkien[$j]\" $checkb> </center></td>
	</tr>";
	$sum++;
	}
}
$j=$sum;
while($j<=1+$sum){
	echo"<tr>
	<td><center> $j </center> </td>
	<td><select name=\"mlkien$j\">
	<option value=\"other\" style=\"background:#87CEEB;\"> Nhập khác </option>
	";
$tenthietbisql10 = mysql_query("SELECT DISTINCT mavattu FROM danhmucvattu_iso") ;
		while($row = mysql_fetch_array($tenthietbisql10))
		{
			$malinhkien =$row['mavattu'];	
			echo "<option value=\"$malinhkien\" style=\"background:#87CEEB;\"> $malinhkien </option>";
		}	

	echo"</select><input type=text name=\"malinhkien$j\" style=\"border-style:none;padding-left:5px;\" > </td>
	<td><input type=text name=\"mota$j\" style=\"border-style:none;width:100%;padding-left:10px;\" > </td>
	<td><input type=text name=\"pn$j\" style=\"border-style:none;width:100%;text-align:center;\"> </td>
	<td><input type=text name=\"dvt$j\" style=\"border-style:none;width:100%;text-align:center;\" > </td>
	<td><input type=text name=\"soluong$j\" style=\"border-style:none;width:100%;text-align:center;\" > </td>
	<td> <center><input type=\"checkbox\" name=\"sl$j\" value=\"$malinhkien\" $checkb> </center></td>
	</tr>";
$j++;
}
echo"</table>
<ul id=\"mbbuttonaddebul_table\" class=\"mbbuttonaddebul_menulist\" style=\"width: 197px; height: 29px;margin-left:10px;\">
<a><input type=\"image\" name=\"addvt\"  value =\"themvt\" id=\"mbi_mbbuttonadd_1\" src=\"buttonadd_files/add.jpg\" name=\"mbi_mbbuttonadd_1\" 
style=\"vertical-align: bottom;\" border=\"0\" alt=\"Thêm\" title=\"\" onclick=\"this.form.addvt.value = this.value\" /></a>
</ul>";
*/
echo "<script type=\"text/javascript\" src=\"buttonadd_files/mbjsmbbuttonadd.js\"></script>
<input type=hidden name=addvt value=\"\">";
if ($cv=="KT")
echo "  <span style=\"margin-left:50px;\"> <strong>IV. NỘI DUNG CÔNG VIỆC : </strong> KT<input type=\"checkbox\" name=\"cv\" value=\"KT\" checked>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\" > 
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BDDK<input type=\"checkbox\" name=\"cv\" value=\"BDDK\">
		 </span>
	     <br><br>";
elseif ($cv=="BD")
		echo "  <span style=\"margin-left:50px;\"> <strong>IV. NỘI DUNG CÔNG VIỆC : </strong> KT<input type=\"checkbox\" name=\"cv\" value=\"KT\">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\" checked > 
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BDDK<input type=\"checkbox\" name=\"cv\" value=\"BDDK\">
		 </span>
	     <br><br>"; 
elseif ($cv=="SC")
		echo "  <span style=\"margin-left:50px;\"> <strong>IV. NỘI DUNG CÔNG VIỆC : </strong> KT<input type=\"checkbox\" name=\"cv\" value=\"KT\">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\"  > 
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\" checked>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BDDK<input type=\"checkbox\" name=\"cv\" value=\"BDDK\">
		 </span>
	     <br><br>"; 
elseif ($cv=="BDDK")
		echo "  <span style=\"margin-left:50px;\"> <strong>IV. NỘI DUNG CÔNG VIỆC : </strong> KT<input type=\"checkbox\" name=\"cv\" value=\"KT\">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\"  > 
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BDDK<input type=\"checkbox\" name=\"cv\" value=\"BDDK\" checked>
		 </span>
	     <br><br>"; 
else
echo "  <span style=\"margin-left:50px;\"> <strong>IV. NỘI DUNG CÔNG VIỆC : </strong> KT<input type=\"checkbox\" name=\"cv\" value=\"KT\">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\"  > 
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\" checked>
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BDDK<input type=\"checkbox\" name=\"cv\" value=\"BDDK\">
		 </span>
	     <br><br>"; 

echo"
<table class=\"table7\" style=\"margin-left:50px;\">
		<tr>
		<td  style=\"text-align:left;color:black;font-size: 18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\">
		<b>Mô tả chi tiết tình trạng của thiết bị, các hỏng hóc (nếu có) do nhân viên xưởng kiểm tra, phát hiện</b> </td>
	      <td><textarea rows='3' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"honghoc\"/>$honghoc</textarea></td>
		</tr>
		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\">
		<b>Mô tả công việc thực hiện hoặc cách khắc phục hỏng hóc</b></td>
		<td><textarea rows='3' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"khacphuc\"/>$khacphuc</textarea> </td>
		</tr>";
echo"	
<tr>
<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Kiểm tra tình trạng kỹ thuật của thiết bị sau khi BD/SC</b></td>
		<td> 1.Tên máy : .....<span  style=\"color:blue;\">$mavt</span>.....Số máy :.....<span  style=\"color:blue;\">$somay</span>.....</br> <span>2.Họ máy :<input type=text name=\"homay\" style=\"border-style:none;\" value=\"$homay\"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Model: <input type=text name=\"model\" style=\"border-style:none;\" value=\"$model\"></span></br><span>3.Điện áp nuôi :<input type=text name=\"dienap\" style=\"border-style:none;\" value=\"$dienap\">Dòng tiêu thụ: <input type=text name=\"dong\" style=\"border-style:none;\" value=\"$dong\"></span></br><span>4.Nội dung kiểm tra: <textarea rows='8' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"noidung\"/>$noidung</textarea></span><</span></br></br>";

echo " <b> 5. BẢNG SỐ LIỆU CẦN THIẾT (nếu có)</b>
<table class=\"table1\" style=\"margin-left:5px;width:470px;\">
<tr>
<th> Tên Tài Liệu </th>
<th> Link Tài Liệu </th>
</tr>";
//set all variable to null
for ($i=1;$i<=10;$i++) {
	$tentailieu[$i] ="";
	$linktailieu[$i] ="";
}
$check1=0;
$tenthietbisql22 = mysql_query("SELECT * FROM bangsolieu_iso ") ;
$j=1;
while($row = mysql_fetch_array($tenthietbisql22))
{
	$sohoso =$row['sohoso'];
	if($sohoso==$hosomay)	{
	$check1=1;
	$tentailieu[$j] =$row['tentailieu'];
	$linktailieu[$j] =$row['link'];
	$j++;
	}
}
if ($j>5) $jj=$j; else $jj=5;
for($i=1;$i<=$jj;$i++){
	$tentailieu_s[$i]=isset($_POST["tentailieu$i"]) ? $_POST["tentailieu$i"] : '';
if($check1==0) {
	echo"<tr><td> <input type=text id=\"tentl\" name=\"tentailieu$i\" style=\"border-style:none;width:100%;padding-left:10px;\" 
	value=\"$tentailieu_s[$i]\"></td>";
	echo"<td><input type=\"file\" id=\"file\" name=\"files[]\" multiple=\"multiple\"/></td></tr>";
}else{
	if ($linktailieu[$i]!=""){
	echo"<tr><td> <input type=text id=\"tentl\" name=\"tentailieu$i\" style=\"border-style:none;width:100%;padding-left:10px;\" 
	value=\"$tentailieu[$i]\"></td>";
	echo"<td><a href=\"./hoso/$sohoso/$linktailieu[$i]\">linkdown</a><span  style=\"padding-left:130px\" ><a href='xoafile.php?f=$linktailieu[$i]&s=$sohoso' TARGET=\"_blank\" title='Delete' >Delete</a></span></td></tr>";
	}else{ 
	echo"<tr><td> <input type=text id=\"tentl\" name=\"tentailieu$i\" style=\"border-style:none;width:100%;padding-left:10px;\" 
	value=\"$tentailieu_s[$i]\"></td>";
	echo"<td><input type=\"file\" id=\"file\" name=\"files[]\" multiple=\"multiple\" /></td></tr>";
	}
}
}
echo "</table><br/>";
echo"<span>6.Kết luận: <textarea rows='2' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"ketluan\"/>$ketluan</textarea></span>";
echo "</td></tr>";
	echo"		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Tình trạng kỹ thuật của thiết bị sau khi sửa chữa </b> </td>
		<td><select name=\"ttktafter\" style=\"border-style:none;width:100%;height:100px;\">
		<option value=\"$ttktafter\"> $ttktafter</option>
		<option value=\"Đạt\">Đạt </option>
		<option value=\"Hỏng\">Hỏng (Không khắc phục được)</option>
		<option value=\"Chờ vật tư thay thế\">Chờ vật tư thay thế</option>
		<option value=\"Chưa kết luận\">Chưa kết luận</option>
		<option value=\"Đang sửa chữa\">Đang sửa chữa</option>
		<option value=\"TTKTDB\">TTKT Đặc biệt</option>
		</select>
		 </td>
		</tr>";
echo"<tr>
	<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Ghi chú tình trạng kỹ thuật</b></td>";
echo"<td><span><textarea rows='2' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"ghichufinal\" />$ghichufinal</textarea></span></td></tr>";
echo"<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Ngày Kết thúc </strong></td>";
if($ngaykt!="0000-00-00"){
echo"<td> <input style=\"border-style:none;width:95%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"ngaykt\" size=\"36\" type=\"text\" value=\"$ngaykt\"> 
<A HREF=\"#\"
                onClick=\"cal.select(document.forms['example'].ngaykt,'anchor1','dd/MM/yyyy'); return false;\"
		NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A> </p>
</td>";
}else{
echo"<td> <input style=\"border-style:none;width:95%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"ngaykt\" size=\"36\" 
		type=\"text\" readonly> 
<A HREF=\"#\"
                onClick=\"cal.select(document.forms['example'].ngaykt,'anchor1','dd/MM/yyyy'); return false;\"
		NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A> </p>
</td>";
}
echo"</tr>";
/*echo"		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\">
		<b> Khuyến nghị </b></td>
		<td><input type=text name=\"ghichu\" style=\"border-style:none;width:100%;height:100px;padding-left:10px;\" value=\"$ghichu\"></td>
		</tr>";
 */
echo"</table>";
echo"   <table><tr><td><input style=\"margin-left:380px;\"/ type=\"image\" name=\"xuatphieu\" value =\"phieukiemtra\" src=\"upload/xuatsc.jpg\" alt=\"Nhap\" 
	onclick=\"this.form.xuatphieu.value = this.value\"/></td></tr>
	</table>
	<input type=hidden name=xuatphieu value=\"\">
	<input type=hidden name=maql value=\"$maql\">
	<input type=hidden name=mavt value=\"$mavt\">
	<input type=hidden name=username value=$username>
	<input type=hidden name=password value=$password>
	<input type=hidden name=hoso value=phieusuachua>
	<input type=hidden name=chonthietbi value=yes>
</form>
</body>
</html>";
}

if($addcvk=="themcvk")
{
$maquanlycvk2= isset($_POST['maquanlycvk2']) ? $_POST['maquanlycvk2'] : '';
$mavattucvk1= isset($_POST['mavattucvk1']) ? $_POST['mavattucvk1'] : '';


$sohs = isset($_POST['sohs']) ? $_POST['sohs'] : '';
$ngayth = isset($_POST['ngayth']) ? $_POST['ngayth'] : '';
$ngaykt = isset($_POST['ngaykt']) ? $_POST['ngaykt'] : '';
$ttktbefore = isset($_POST['ttktbefore']) ? $_POST['ttktbefore'] : '';
$honghoc = isset($_POST['honghoc']) ? $_POST['honghoc'] : '';
$khacphuc = isset($_POST['khacphuc']) ? $_POST['khacphuc'] : '';
$ttktafter = isset($_POST['ttktafter']) ? $_POST['ttktafter'] : '';
$ghichu = isset($_POST['ghichu']) ? $_POST['ghichu'] : '';
$nhomsc = isset($_POST['nhomsc']) ? $_POST['nhomsc'] : '';
$tiendocv = isset($_POST['tiendocv']) ? $_POST['tiendocv'] : '';

$tenthietbisql22 = mysql_query("SELECT count(*) as sum FROM danhmucvattu_iso WHERE mahoso='$sohs'") ;
while($row = mysql_fetch_array($tenthietbisql22))
{
	$sum =$row['sum'];
}

for($i=1;$i<=5;$i++){
$tenthietbihotrocvk[$i]=isset($_POST["tenthietbihotrocvk$i"]) ? $_POST["tenthietbihotrocvk$i"] : '';
$serialnumbercvk[$i]=isset($_POST["serialnumbercvk$i"]) ? $_POST["serialnumbercvk$i"] : '';

echo"<input type=hidden name=tenthietbihotrocvk$i value=\"$tenthietbihotrocvk[$i]\">
	<input type=hidden name=serialnumbercvk$i value=\"$serialnumbercvk[$i]\">";
}

for($i=1;$i<=10+$sum;$i++){
$mota[$i]=isset($_POST["mota$i"]) ? $_POST["mota$i"] : '';
$pn[$i]=isset($_POST["pn$i"]) ? $_POST["pn$i"] : '';
$dvt[$i]=isset($_POST["dvt$i"]) ? $_POST["dvt$i"] : '';
$soluong[$i]=isset($_POST["soluong$i"]) ? $_POST["soluong$i"] : '';
if ($soluong[$i]=="") $soluong[$i]=1;

echo"<input type=hidden name=mota$i value=\"$mota[$i]\">
	<input type=hidden name=pn$i value=\"$pn[$i]\">
	<input type=hidden name=dvt$i value=\"$dvt[$i]\">
	<input type=hidden name=soluong$i value=\"$soluong[$i]\">";
}



echo "
		<html lang=\"vi\">
<html lang=\"vi\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
<SCRIPT LANGUAGE=\"JavaScript\" SRC=\"java/CalendarPopup.js\"></SCRIPT>
<SCRIPT LANGUAGE=\"JavaScript\">
var cal = new CalendarPopup();
</SCRIPT>
</head>
<body>


<table style=\"width:100%\">
<tr>
<td >
<h2> <p style=\"text-align:center;color:blue;\"> PHIẾU KIỂM TRA SỬA CHỮA THIẾT BỊ<br/></h2>
</p>
</td>
</tr>
</table>
<br/>
<form method=\"post\" action=\"formsc.php\" enctype=\"multipart/form-data\" name=\"example\">
<table class=\"table7\" style=\"margin-left:50px;\">
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFE4B5;\"> <strong>Mã quản lý</strong> </td>
<td><select style=\"border-style:none;width:100%;height:30px;color:blue;text-align:center;\">
		<option value=\"$maquanlycvk2\">$maquanlycvk2</option>
    
		</select></td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#9966CC;\"> <strong>Mã thiết bị</strong> </td>
<td> <select style=\"border-style:none;width:100%;height:30px;color:blue;text-align:center;\">
		<option value=\"$mavattucvk1\">$mavattucvk1</option>
   
		</select> </td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Nhóm sửa chữa</strong> </td>
<td>
<select name=\"nhomsc\" style=\"border-style:none;width:100%;height:100%;text-align:center;\">
		<option value=\"$nhomsc\">$nhomsc</option>
	
</select>
  </td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Số hồ sơ</strong> </td>
<td> <input style=\"border-style:none;width:100%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"sohs\" size=\"36\" type=\"text\" value=\"$sohs\"> </td>
</tr>
<tr><td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Ngày BĐ</strong> </td>
<td><input style=\"border-style:none;width:95%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"ngayth\" size=\"36\" type=\"text\" value=\"$ngayth\" readonly>  </td>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Ngày Kết thúc </strong></td>
<td> <input style=\"border-style:none;width:95%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"ngaykt\" size=\"36\" type=\"text\" value=\"$ngaykt\" readonly>
</td>
</tr>
</table>

<br/>
<table class=\"table7\" style=\"margin-left:50px;\">
		<tr>
		<td  style=\"text-align:left;color:black;font-size: 18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Mô tả chi tiết tình trạng của thiết bị, các hỏng hóc (nếu có) do nhân viên xưởng kiểm tra, phát hiện</b> </td>
		<td><input type=text name=\"ttktbefore\" style=\"border-style:none;width:100%;height:100px;padding-left:10px;\" value=\"$ttktbefore\"> </td>
		</tr>
		<tr>
		<td  style=\"text-align:left;color:black;font-size: 18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b> Tiến độ công việc </b> </td>
		<td><input type=text name=\"tiendocv\" style=\"border-style:none;width:100%;height:100px;padding-left:10px;\" value=\"$tiendocv\"> </td>
		</tr>
		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b> Hỏng hóc </b> </td>
		<td><input type=text name=\"honghoc\" style=\"border-style:none;width:100%;height:100px;padding-left:10px;\" value=\"$honghoc\"> </td>
		</tr>
		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Mô tả công việc thực hiện hoặc cách khắc phục hỏng hóc</b></td>
		<td><input type=text name=\"khacphuc\" style=\"border-style:none;width:100%;height:100px;padding-left:10px;\" value=\"$khacphuc\"> </td>
		</tr>";
echo"		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Kiểm tra tình trạng kỹ thuật của thiết bị sau khi BD/SC</b></td>
		<td> 1.Tên máy : .....<span  style=\"color:blue;\">$mavt</span>.....Số máy :.....<span  style=\"color:blue;\">$somay</span>.....</br> <span>2.Họ máy :<input type=text name=\"homay\" style=\"border-style:none;\" value=\"$homay\"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Model: <input type=text name=\"model\" style=\"border-style:none;\" value=\"$model\"></span></br><span>3.Điện áp nuôi :<input type=text name=\"dienap\" style=\"border-style:none;\" value=\"$dienap\">Dòng tiêu thụ: <input type=text name=\"dong\" style=\"border-style:none;\" value=\"$dong\"></span></br><span>4.Nội dung kiểm tra: <textarea rows='8' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"noidung\"  value=\"$noidung\"/> </textarea></span></span></br></br>";

echo " <b> 5. BẢNG SỐ LIỆU CẦN THIẾT (nếu có)</b>
<table class=\"table1\" style=\"margin-left:5px;width:470px;\">
<tr>
<th> Tên Tài Liệu </th>
<th> Link Tài Liệu </th>
</tr>";
//set all variable to null
for ($i=1;$i<=10;$i++) {
	$tentailieu[$i] ="";
	$linktailieu[$i] ="";
}
$check1=0;
$tenthietbisql22 = mysql_query("SELECT * FROM bangsolieu_iso ") ;
$j=1;
while($row = mysql_fetch_array($tenthietbisql22))
{
	$sohoso =$row['sohoso'];
	if($sohoso==$hosomay)	{
	$check1=1;
	$tentailieu[$j] =$row['tentailieu'];
	$linktailieu[$j] =$row['link'];
	$j++;
	}
}
if ($j>5) $jj=$j; else $jj=5;
for($i=1;$i<=$jj;$i++){
	$tentailieu_s[$i]=isset($_POST["tentailieu$i"]) ? $_POST["tentailieu$i"] : '';
if($check1==0) {
	echo"<tr><td> <input type=text id=\"tentl\" name=\"tentailieu$i\" style=\"border-style:none;width:100%;padding-left:10px;\" 
	value=\"$tentailieu_s[$i]\"></td>";
	echo"<td><input type=\"file\" id=\"file\" name=\"files[]\" multiple=\"multiple\"/></td></tr>";
}else{
	if ($linktailieu[$i]!=""){
	echo"<tr><td> <input type=text id=\"tentl\" name=\"tentailieu$i\" style=\"border-style:none;width:100%;padding-left:10px;\" 
	value=\"$tentailieu[$i]\"></td>";
	echo"<td><a href=\"./hoso/$sohoso/$linktailieu[$i]\">linkdown</a></td></tr>";
	}else{ 
	echo"<tr><td> <input type=text id=\"tentl\" name=\"tentailieu$i\" style=\"border-style:none;width:100%;padding-left:10px;\" 
	value=\"$tentailieu_s[$i]\"></td>";
	echo"<td><input type=\"file\" id=\"file\" name=\"files[]\" multiple=\"multiple\" /></td></tr>";
	}
}
}
echo "</table><br/>";
echo"<span>6.Kết luận: <textarea rows='2' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"ketluan\"  value=\"$ketluan\"/> </textarea></span>";
echo "</td></tr>";
echo"		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Tình trạng kỹ thuật của thiết bị sau khi sửa chữa </b> </td>
		<td><select name=\"ttktafter\" style=\"border-style:none;width:100%;height:100px;\">
		<option value=\"$ttktafter\"> $ttktafter</option>
		<option value=\"Đạt\">Đạt </option>
		<option value=\"Hỏng\">Hỏng (Không khắc phục được)</option>
		<option value=\"Chờ vật tư thay thế\">Chờ vật tư thay thế</option>
		<option value=\"Chưa kết luận\">Chưa kết luận</option>
		<option value=\"Đang sửa chữa\">Đang sửa chữa</option>
		<option value=\"TTKTDB\">TTKT Đặc biệt</option>
		</select>
		 </td>
		</tr>";
echo"<tr>
	<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Ghi chú tình trạng kỹ thuật</b></td>";
echo"<td><span><textarea rows='2' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"ghichufinal\" />$ghichufinal</textarea></span></td></tr>";
echo"</table> 
<br/>
<p style=\"margin-left:50px;\"> <strong>I. CÁC THIẾT BỊ HỖ TRỢ </strong> <br/> <br/> </p>
<table class=\"table1\" style=\"margin-left:50px;width:800px;\">

	<tr>
<th style=\"text-align:center;font-size: 15;width:60px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:405px;\"> Tên viết tắt</th>
<th style=\"text-align:center;font-size: 15;width:335px\"> Serial Number</th>
</ul>
</tr>";
$i=1;
while($i<=5){
if($tenthietbihotrocvk[$i]!=""){
echo"<tr>
<td><center> $i </center> </td>
<td><select name=\"tenthietbihotrocvk$i\" onchange=\"this.form.submit()\" style=\"border-style:none;width:100%;height:30px;\" >
		<option value=\"$tenthietbihotrocvk[$i]\">$tenthietbihotrocvk[$i]</option>
	
</select></td>
<td><select name=\"serialnumbercvk$i\" style=\"border-style:none;width:100%;height:30px;text-align:center;\" >
		<option value=\"$serialnumbercvk[$i]\">$serialnumbercvk[$i] </option>
	</select> </td>
	</tr>";
}
$i++;
}
 echo"</table>
<br/>";
/*
echo"<p style=\"margin-left:50px;\"> <strong>II. DANH MỤC VẬT TƯ</strong> <br/> <br/> </p>

<table class=\"table1\" style=\"margin-left:50px;width:800px;\">

	<tr>
<th style=\"text-align:center;font-size: 15;width:30px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:140px;\"> Mô tả</th>
<th style=\"text-align:center;font-size: 15;width:80px;\"> P/N</th>
<th style=\"text-align:center;font-size: 15 ;width:60px;\"> ĐVT </th>
<th style=\"text-align:center;font-size: 15 ;width:120px;\"> Số lượng </th>
</ul>
</tr>";
$i=1;

$tenthietbisql21 = mysql_query("SELECT * FROM danhmucvattu_iso WHERE mahoso='$sohs'") ;
while($row = mysql_fetch_array($tenthietbisql21))
{
	$mota1 =$row['mota'];
	$pn1 =$row['serialnumber'];	
	$dvt1 =$row['dvt'];
	$soluong1 =$row['soluong'];	
	echo"<tr>
	<td><center> $i </center> </td>
	<td><input type=text name=\"mota$i\" style=\"border-style:none;width:100%;padding-left:10px;\" value=\"$mota1\" readonly> </td>
	<td><input type=text name=\"pn$i\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$pn1\" readonly> </td>
	<td><input type=text name=\"dvt$i\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$dvt1\" readonly> </td>
	<td><input type=text name=\"soluong$i\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$soluong1\" readonly> </td>
	</tr>";
	$i++;
}

while($i<=10+$sum){
echo"<tr>
<td><center> $i </center> </td>
<td><input type=text name=\"mota$i\" style=\"border-style:none;width:100%;padding-left:10px;\" value=\"$mota[$i]\" > </td>
<td><input type=text name=\"pn$i\" style=\"border-style:none;width:100%;text-align:center;\"  value=\"$pn[$i]\"> </td>
<td><input type=text name=\"dvt$i\" style=\"border-style:none;width:100%;text-align:center;\"  value=\"$dvt[$i]\"> </td>
<td><input type=text name=\"soluong$i\" style=\"border-style:none;width:100%;text-align:center;\"  value=\"$soluong[$i]\"> </td>
</tr>";
$i++;
}
echo"</table>

 <ul id=\"mbbuttonaddebul_table\" class=\"mbbuttonaddebul_menulist\" style=\"width: 197px; height: 29px;margin-left:10px;\">
  <a><input type=\"image\" name=\"addcvk\"  value =\"themcvk\" id=\"mbi_mbbuttonadd_1\" src=\"buttonadd_files/add.jpg\" name=\"mbi_mbbuttonadd_1\" style=\"vertical-align: bottom;\" border=\"0\" alt=\"Thêm\" title=\"\" onclick=\"this.form.addcvk.value = this.value\" /></a>
</ul>";
*/
echo"
<script type=\"text/javascript\" src=\"buttonadd_files/mbjsmbbuttonadd.js\"></script>
	<input type=hidden name=addcvk value=\"\">
   <input type=hidden name=username value=$username>
	 <input type=hidden name=password value=$password>
	 <input type=hidden name=mavattucvk1 value=\"$mavattucvk1\">
	 <input type=hidden name=maquanlycvk2 value=\"$maquanlycvk2\">
	 <table align=\"center\">
	 <tr>
	 <td><input type=\"image\" name=\"xuatphieucvk\" value =\"phieuktcvk\" src=\"upload/xuatsc.jpg\" alt=\"Nhap\" onclick=\"this.form.xuatphieucvk.value = this.value\"/></td>
	<input type=hidden name=xuatphieucvk value=\"\">
 </form>
 <form action=\"index.php\" method=\"post\">
    <input type=hidden name=username value=$username>
	<input type=hidden name=password value=$password>
  	<td> <input type=hidden name=\"submit\" value=\"Hồ sơ SC/BD\">
 	<input type=\"image\" src=\"upload/back.jpg\"  /></td></td>
	</tr>
	</table>
   </form>
</body>
</html> " ;
}
if (($search!="")&&($hoso=="phieuscbd")) {
echo "
<html lang=\"vi\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
<SCRIPT LANGUAGE=\"JavaScript\" SRC=\"java/CalendarPopup.js\"></SCRIPT>
<SCRIPT LANGUAGE=\"JavaScript\">
var cal = new CalendarPopup();
$(document).ready(function() {
    $('#selectall').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class \"checkbox1\"               
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class \"checkbox1\"                       
            });         
        }
    });
    
});

</SCRIPT>
</head>
<body>
<table style=\"margin-top:20px;width:100%;\">
<tr>
<td  style=\"padding-left:50px;width:30%;\"> XN Địa Vật Lý GK <br/>X&#432;&#7903;ng
SCTB&#272;VL</td>
<td>
<h2> <span style=\"color:blue;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PHIẾU YÊU CẦU DỊCH VỤ </span> 
</h2>
</td>
</tr>
</table>";
		$r3 = mysql_query("SELECT dienthoai,ycthemkh,xemxetxuong,ngayyc,madv,ngyeucau,ngnhyeucau,lo,gieng,mo FROM hososcbd_iso where phieu='$search'");
		while($row = mysql_fetch_array($r3))
		{
			$madv =$row['madv'];
			$khachhang =$row['ngyeucau'];
			$nhanvien =$row['ngnhyeucau'];
			$ngayyc =$row['ngayyc'];
			$dienthoai =$row['dienthoai'];
			$ycthemkh =$row['ycthemkh'];
			$xemxetxuong =$row['xemxetxuong'];
			$lo =$row['lo'];
			$gieng =$row['gieng'];
			$mo =$row['mo'];
		}
		$donvi=$madv;
		$ngaystemp=$ngayyc;
		for ($i=0;$i<=strlen($ngaystemp);$i++) {
			$p = stripos($ngaystemp,"-") ;
			if ($i== 0) {
				$nams = trim (substr($ngaystemp,0,$p)) ;
			} 	
			if ($i== 1) {
				$thangs = trim (substr($ngaystemp,0,$p)) ;
			} 	
			if ($i== 2) {
				$ngays = trim ($ngaystemp) ;
			} 	
			$p++ ;
			$ngaystemp = substr($ngaystemp,$p);
		}
echo"   <form method=\"post\" action=\"formsc.php\" enctype=\"multipart/form-data\" name=\"example\">
	<br/>
	<table style=\"margin-left:50px;width:950px;\">
	<tr bgcolor=\"#FFA500\">
	<td style=\"text-align:center;font-size: 15;width:25%;\"><b>   SỐ HỒ SƠ </b>
	</td>
	<td style=\"text-align:center;font-size: 15;width:30%;\">	<b> NGÀY   </b>
	</td>
	<td style=\"text-align:center;font-size: 15;width:45%;\"><b> ĐƠN VỊ  </b>
	</td>
	</tr>
	<tr>
	<td>	
	<div class=\"content\">
	<input type=\"text\" name=\"sohoso\" class=\"search\" id=\"searchid\" style=\"width:100%;background:#8adaa5;height:25px;\"value=\"$search\" />
	<div id=\"result\"></div>
	</div>
	</td>
	<td>
	<input  name=\"ngay\" size=\"20\" type=\"text\" value =\"$ngays/$thangs/$nams\" style=\"width:90%;background:#8adaa5;height:25px;\" />
	<A HREF=\"#\" onClick=\"cal.select(document.forms['example'].ngay,'anchor1','dd/MM/yyyy'); return false;\"
        NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A>
	</td>
	<td>
	<select name=\"donvi\" onchange=\"this.form.submit()\" style=\"background:#8adaa5;width:100.5%;height:25px;\" >
	      <option value=\"$madv\">$madv</option>";

		$r3 = mysql_query("SELECT DISTINCT madv,tendv FROM donvi_iso");
		while($row = mysql_fetch_array($r3))
		{
			$madv =$row['madv'];
			$tendv = $row['tendv'];
			echo "<option value=\"$madv\">$madv - $tendv</option>";		                
		}		
	echo"</select>
	</td>
	</tr>
	</table>
	<br/>
	<table>
	<tr><td style=\"height:30px;width:500px;padding-left:50px;\"><strong>KHÁCH HÀNG &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> &nbsp;&nbsp;&nbsp;&nbsp;
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"khachhang\" size=\"50\" type=\"text\"  value=\"$khachhang\"></td>
		<td style=\"height:30px;width:400px\"><strong>ĐIỆN THOẠI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> 
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"dienthoai\" size=\"25\" type=\"text\"  value=\"$dienthoai\">       
		</td>
			
			</tr>
		<tr><td style=\"height:30px;padding-left:50px;width:600px;\"><strong>NHÂN VIÊN XƯỞNG &nbsp;&nbsp;</strong>
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"nhanvien\" size=\"50\" type=\"text\"  value=\"$nhanvien\">
		</td>
		<td> </td>
	        </tr>
		<tr>
		<td></td></tr>
		</table>
		<br/>
		<table class=\"table1\" >
		<tr>
		<th style=\"text-align:center;font-size: 15;width:30px; height:30px; \"> STT</th>
		<th style=\"text-align:center;font-size: 15;width:190px;\"> TÊN THIẾT BỊ</th>
		<th style=\"text-align:center;font-size: 15;width:90px;\"> SỐ MÁY</th>
		<th style=\"text-align:center;font-size: 15 ;width:300px;\"> TÌNH TRẠNG KỸ THUẬT </th>
		<th style=\"text-align:center;font-size: 15 ;width:80px;\"> NỘI DUNG </br>YÊU CẦU</th>
		<th style=\"text-align:center;font-size: 15 ;width:150px;\"> MÁY TỪ ĐÂU VỀ XƯỞNG</th>";
		$r3 = mysql_query("SELECT DISTINCT ngaykt FROM hososcbd_iso where phieu='$search'");
		$ckl=0;
		while($row = mysql_fetch_array($r3))
		{
			if ($row['ngaykt']!="0000-00-00") {$ckl=1;break;}
		}
		if ($phanquyen=="1"){
			echo"<th style=\"text-align:center;font-size: 15 ;width:100px;\">All<center><input type=\"checkbox\"  id=\"selectall\" </center></th></tr>";
		}else{
		if ($ckl==0)
			echo"<th style=\"text-align:center;font-size: 15 ;width:100px;\">All<center><input type=\"checkbox\"  id=\"selectall\"></center></th></tr>";
		else 
			echo"<th style=\"text-align:center;font-size: 15 ;width:100px;\">All<center><input type=\"checkbox\"  id=\"selectall\" disabled=disabled></center></th></tr>";
		}
	$i=1;
		$r4 = mysql_query("SELECT DISTINCT mavt,somay,solg,cv,hoso,ttktbefore,vitrimaybd,model,ngaykt FROM hososcbd_iso where phieu='$search'");
		
		while($row = mysql_fetch_array($r4))
		{
			$mavt =$row['mavt'];	
			$somay =$row['somay'];	
			$model =$row['model'];	
			$solg =$row['solg'];	
			$cv =$row['cv'];	
			$ngaykt =$row['ngaykt'];	
			$hoso =$row['hoso'];	
			$vitri =$row['vitrimaybd'];	
			$ttktbefore =$row['ttktbefore'];
			if($model=="") $modelmay1=$mavt;else $modelmay1="$mavt-$model";
			if($phanquyen=="1") {
				$readonly="";
				$disable="";
			}else{
				if ($ngaykt!="0000-00-00"){
					$readonly="readonly";
					$disable='disabled="disabled"';
				}else{
				$readonly="";
				$disable="";

				}
			}	
		echo"<tr>
		<td  style=\"text-align:center;color:black;font-size: 15;\"> $i </td>
		<td> 
		<select name=\"thietbi$i\" onchange=\"this.form.submit()\" style=\"border-style:none;width:100%;height:30px;\">
		<option value=\"$mavt.$model\">$modelmay1</option>
		" ;
			if($phanquyen=="1") {
    		$tenthietbisql1 = mysql_query("SELECT DISTINCT mavt,tenvt,model FROM thietbi_iso where madv='$donvi' order by mavt") ;
		while($row = mysql_fetch_array($tenthietbisql1))
		{
			$mavt1 =$row['mavt'];	
			$tenvt1 =$row['tenvt'];
			$modelt =$row['model'];
			if($modelt=="") $modelmay=$mavt1;else $modelmay="$mavt1-$modelt";
			echo "<option value=\"$mavt1.$modelt\">$modelmay - $tenvt1</optiop>";
		}
			}else{
		        if ($ngaykt=="0000-00-00"){
    		$tenthietbisql1 = mysql_query("SELECT DISTINCT mavt,tenvt,model FROM thietbi_iso where madv='$donvi' order by mavt") ;
		while($row = mysql_fetch_array($tenthietbisql1))
		{
			$mavt1 =$row['mavt'];	
			$tenvt1 =$row['tenvt'];
			$modelt =$row['model'];
			if($modelt=="") $modelmay=$mavt1;else $modelmay="$mavt1-$modelt";
			echo "<option value=\"$mavt1.$modelt\">$modelmay - $tenvt1</optiop>";
		}
				}
			}
		echo"</select>
		</td>
		<td><select name=\"somay$i\" style=\"border-style:none;width:100%;\">
		<option value=\"$somay\">$somay</option>
		";
			if($phanquyen=="1") {
		$tenthietbisql2 = mysql_query("SELECT DISTINCT somay FROM thietbi_iso WHERE mavt='$mavt' and model='$model' ") ;
		while($row = mysql_fetch_array($tenthietbisql2))
		{
			$sm =$row['somay'];
			if($sm!=$somay[$i]){	
			echo "<option value=\"$sm\"> $sm </option>";
			}
		}
			}else{
				if ($ngaykt=="0000-00-00"){
		$tenthietbisql2 = mysql_query("SELECT DISTINCT somay FROM thietbi_iso WHERE mavt='$mavt' and model='$model' ") ;
		while($row = mysql_fetch_array($tenthietbisql2))
		{
			$sm =$row['somay'];
			if($sm!=$somay[$i]){	
			echo "<option value=\"$sm\"> $sm </option>";
			}
		}
				}
			}
		echo"</select> </td>";
		echo"
		<td><input type=text name=\"tinhtrang$i\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$ttktbefore\" $readonly></td>";
		//<td><input type=text name=\"yeucau$i\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$cv\" $readonly> </td>";
		
	    echo"<td>";	
		echo"<select name=\"yeucau$i\"  style=\"border-style:none;width:100%;height:30px;\">
		<option value=\"$cv\">$cv</option>" ;
		echo "<option value=\"KT\">KT</optiop>";
		echo "<option value=\"BD\">BD</optiop>";
		echo "<option value=\"SC\">SC</optiop>";
		echo"</select>";
		echo"</td>";
		echo"<td>";	
		echo"<select name=\"vitri$i\"  style=\"border-style:none;width:100%;height:30px;\">
			<option value=\"$vitri\">$vitri</option>" ;
		if($phanquyen=="1") {
    		$tenthietbisql1 = mysql_query("SELECT DISTINCT mavitri,tenvitri FROM vitri_iso") ;
		while($row = mysql_fetch_array($tenthietbisql1))
		{
			$mavitri =$row['mavitri'];	
			$tenvitri =$row['tenvitri'];	
			echo "<option value=\"$mavitri\">$mavitri - $tenvitri</optiop>";
		}
		}else{
			if ($ngaykt=="0000-00-00"){
    		$tenthietbisql1 = mysql_query("SELECT DISTINCT mavitri,tenvitri FROM vitri_iso") ;
		while($row = mysql_fetch_array($tenthietbisql1))
		{
			$mavitri =$row['mavitri'];	
			$tenvitri =$row['tenvitri'];	
			echo "<option value=\"$mavitri\">$mavitri - $tenvitri</optiop>";
		}
			}
		}
		echo"</select>";
		echo"</td>";
		echo "<input type=hidden name=\"shs$i\" value=\"$hoso\">";	
		echo"<td><center><input class=\"checkbox1\" type=\"checkbox\" name=\"check[]\" value=\"$hoso\" $disable></center></td>
		</tr>";
		$i++;		
		}
                //if ($i<5) $solan=""; elseif (($i>=5)&&($i<15)) $solan=1;elseif  (($i>=15)&&($i<25))  $solan=2;else $solan=3;
                if ($i<5) $solan=""; elseif ($i>=5) $solan=$i-5;
		echo"<tr>
		<td  style=\"text-align:center;color:black;font-size: 15;\"> $i </td>
		<td> 
		<select name=\"thietbi$i\" onchange=\"this.form.submit()\" style=\"border-style:none;width:100%;height:30px;\">
		<option value=\"\"></option>
		" ;
    		$tenthietbisql1 = mysql_query("SELECT DISTINCT mavt,tenvt,model FROM thietbi_iso where madv='$donvi' order by mavt") ;
		while($row = mysql_fetch_array($tenthietbisql1))
		{
			$mavt1 =$row['mavt'];	
			$tenvt1 =$row['tenvt'];
			$modelt =$row['model'];
			if($modelt=="") $modelmay=$mavt1;else $modelmay="$mavt1-$modelt";
			echo "<option value=\"$mavt1.$modelt\">$modelmay - $tenvt1</optiop>";
		}
		echo"</select>
		</td>
		<td><select name=\"somay$i\" style=\"border-style:none;width:100%;\">
		<option value=\"\"></option>";
		echo"</select> </td>";
		echo"
		<td><input type=text name=\"tinhtrang$i\" style=\"border-style:none;width:100%;text-align:center;\" value=\"\"></td>
		<td><input type=text name=\"yeucau$i\" style=\"border-style:none;width:100%;text-align:center;\" value=\"\"> </td>";
		echo"<td><input type=text style=\"border-style:none;width:100%;text-align:center;\" ></td>";	
		echo"<input type=hidden name=\"shs$i\"  value=\"\"> </td>
		<td></td>
		</tr>";
		echo "<tr>
		<th style=\"text-align:center;font-size: 15;width:40px;\"></th>
		<th style=\"text-align:center;font-size: 15;width:180px;\"><a href=\"Danhmucsc.php?&start=0&ad=&sort=&s=&f=&mte_a=new\" target=\"_blank\">Thêm thiết bị mới</a></th>
		<th style=\"text-align:center;font-size: 15;width:80px;\"></th>
		
		<th style=\"text-align:center;font-size: 15 ;width:180px;\"></th>
		<th style=\"text-align:center;font-size: 15 ;width:120px;\"></th>
		<th style=\"text-align:center;font-size: 15 ;width:80px;\"><a href=\"vitri.php?&start=0&ad=&sort=&s=&f=&mte_a=new\" target=\"_blank\">Thêm vị trí mới</a></th>
		<th style=\"text-align:center;font-size: 15 ;width:100px;\"></th>
		</tr>";
		echo"</table>";
		$check_day=0;
		$r5 = mysql_query("SELECT DISTINCT ngaykt FROM hososcbd_iso where phieu='$search'");
		while($row = mysql_fetch_array($r5))
		{
			$ngaykt =$row['ngaykt'];
		        if ($ngaykt=="0000-00-00") {$check_day=1;break;}	

		}
		if ($check_day==0) {
			if ($phanquyen=="1") {
				
				echo"<br/><table>
					<tr>
		<td><input type=\"image\" name=\"button\" value =\"them\"  src=\"buttonadd_files/add.jpg\" alt=\"Thêm\" 
		onclick=\"this.form.button.value = this.value\" style=\"margin-left:50px;\" /></td></tr>
		<tr><td style=\"height:30px;padding-left:50px;width:800px;\"><strong>CÁC YÊU CẦU KHÁC (NẾU CÓ) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"ycthemkh\" size=\"60\" type=\"text\" value=\"$ycthemkh\">
		</td>
		<td> </td>
		</tr>
		<tr><td style=\"height:30px;padding-left:50px;width:800px;\"><strong>XEM XÉT CỦA XƯỞNG &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"xemxetxuong\" size=\"60\" type=\"text\" value=\"$xemxetxuong\">
		</td>
		<td> </td>
		</tr>
		<tr><td style=\"height:30px;padding-left:50px;width:800px;\"><strong>PHỤC VỤ SẢN XUẤT CHO LÔ: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
		<select name=\"lo\"  style=\"border-style:none;width:50%;height:30px;font_family:Times New Roman;background:#8adaa5;height:25px;\">
		<option value=\"$lo\">$lo</option>";
		$sqllo = mysql_query("SELECT DISTINCT malo,tenlo FROM lo_iso") ;
		while($row = mysql_fetch_array($sqllo))
		{
			$malo =$row['malo'];	
			$tenlo =$row['tenlo'];	
			echo "<option value=\"$malo\">$malo - $tenlo</optiop>";
		}
		echo"</select>";
	echo"	</td>
		<td> </td></tr>
		<tr><td style=\"height:30px;padding-left:50px;width:800px;\"><strong>PHỤC VỤ SẢN XUẤT CHO MỎ :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong>
		<select name=\"mo\"  style=\"border-style:none;width:50%;height:30px;font_family:Times New Roman;background:#8adaa5;height:25px;\">
		<option value=\"$mo\">$mo</option>";
		$sqlmo = mysql_query("SELECT DISTINCT mamo,tenmo FROM mo_iso") ;
		while($row = mysql_fetch_array($sqlmo))
		{
			$mamo =$row['mamo'];	
			$tenmo =$row['tenmo'];	
			echo "<option value=\"$mamo\">$mamo - $tenmo</optiop>";
		}
		echo"</select>";
		echo"</td>
		<td> </td>
	        </tr>
		<tr><td style=\"height:30px;padding-left:50px;width:800px;\"><strong>PHỤC VỤ SẢN XUẤT CHO GIẾNG : </strong>
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"gieng\" size=\"60\" type=\"text\" value=\"$gieng\">
		</td>
		<td> </td>
	        </tr>
		</table>
		<table>
	        <tr> 
		<td >
		<input type=\"image\" name=\"save\" value =\"savefile\" src=\"upload/xuatdv.jpg\" alt=\"save\" 
		onclick=\"this.form.save.value = this.value\" style=\"margin-left:320px;\"/></td>
		<input type=hidden name=save value=\"\">
		<input type=hidden name=\"hoso\" value=\"phieuscbd\">
		</form>";
		echo"<td>
		<input type=\"image\" name=\"suadl\" value=\"suayeucaudichvu\" src=\"upload/suadulieu.jpg\" alt=\"Sua\" 
		onclick=\"this.form.suadl.value=this.value\" /></td>
		<input type=hidden name=suadl value=\"\">
		<td >
		<input type=\"image\" name=\"xoadl\" value=\"xoayeucaudichvu\" src=\"upload/xoadulieu.jpg\" alt=\"Xoa\" 
		onclick=\"this.form.xoadl.value=this.value\"></td>
		<input type=hidden name=xoadl value=\"\">
		<input type=hidden name=username value=$username>
	 	<input type=hidden name=password value=$password>
	 	<input type=hidden name=chonmay value=yes>
	 	<input type=hidden name=suaxoa value=yes>
	 	<input type=hidden name=solan value=$solan>
		<input type=hidden name=\"hoso\" value=\"phieuscbd\">
		</form>
		<form action=\"index.php\" method=\"post\">
    		<input type=hidden name=username value=$username>
		<input type=hidden name=password value=$password>
  		<input type=hidden name=\"submit\" value=\"Hồ sơ SC/BD\">
		<td><input type=\"image\" src=\"upload/back.jpg\"/></td>
		</form>
		</tr>
		</table>
		";
			}else{
                echo"<br/>
			<font color=\"red\" style=\"margin-left:50px;\">HỒ SƠ ĐÃ HOÀN THÀNH CHỈ CÓ ADMIN MỚI CÓ THỂ SỬA HOẶC XÓA</font>
			<br/><br/>
			<input type=\"image\" name=\"save\" value =\"savefile\" src=\"upload/xuatdv.jpg\" alt=\"save\" 
			onclick=\"this.form.save.value = this.value\" style=\"margin-left:50px;\"/></td>
			<input type=hidden name=save value=\"\">
	 		<input type=hidden name=solan value=$solan>
			</form>";
	       echo"	
  	                <form action=\"index.php\" method=\"post\">
    			<input type=hidden name=username value=$username>
			<input type=hidden name=password value=$password>
  			<input type=hidden name=\"submit\" value=\"Hồ sơ SC/BD\">
			<input type=\"image\" src=\"upload/back.jpg\" style=\"margin-left:50px;\" /></form>";	
			}
		}else{
			
				echo"<br/><table>
					<tr>
		<td><input type=\"image\" name=\"button\" value =\"them\"  src=\"buttonadd_files/add.jpg\" alt=\"Thêm\" 
		onclick=\"this.form.button.value = this.value\" style=\"margin-left:50px;\" /></td></tr>
		<tr><td style=\"height:30px;padding-left:50px;width:800px;\"><strong>CÁC YÊU CẦU KHÁC (NẾU CÓ) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"ycthemkh\" size=\"60\" type=\"text\" value=\"$ycthemkh\">
		</td>
		<td> </td>
		</tr>
		<tr><td style=\"height:30px;padding-left:50px;width:800px;\"><strong>XEM XÉT CỦA XƯỞNG &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"xemxetxuong\" size=\"60\" type=\"text\" value=\"$xemxetxuong\">
		</td>
		<td> </td>
		</tr>
		<tr><td style=\"height:30px;padding-left:50px;width:800px;\"><strong>PHỤC VỤ SẢN XUẤT CHO LÔ: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
		<select name=\"lo\"  style=\"border-style:none;width:50%;height:30px;font_family:Times New Roman;background:#8adaa5;height:25px;\">
		<option value=\"$lo\">$lo</option>";
		$sqllo = mysql_query("SELECT DISTINCT malo,tenlo FROM lo_iso") ;
		while($row = mysql_fetch_array($sqllo))
		{
			$malo =$row['malo'];	
			$tenlo =$row['tenlo'];	
			echo "<option value=\"$malo\">$malo - $tenlo</optiop>";
		}
		echo"</select>";
	echo"	</td>
		<td> </td></tr>
		<tr><td style=\"height:30px;padding-left:50px;width:800px;\"><strong>PHỤC VỤ SẢN XUẤT CHO MỎ :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong>
		<select name=\"mo\"  style=\"border-style:none;width:50%;height:30px;font_family:Times New Roman;background:#8adaa5;height:25px;\">
		<option value=\"$mo\">$mo</option>";
		$sqlmo = mysql_query("SELECT DISTINCT mamo,tenmo FROM mo_iso") ;
		while($row = mysql_fetch_array($sqlmo))
		{
			$mamo =$row['mamo'];	
			$tenmo =$row['tenmo'];	
			echo "<option value=\"$mamo\">$mamo - $tenmo</optiop>";
		}
		echo"</select>";
		echo"</td>
		<td> </td>
	        </tr>
		<tr><td style=\"height:30px;padding-left:50px;width:800px;\"><strong>PHỤC VỤ SẢN XUẤT CHO GIẾNG : </strong>
		<input style=\"font_family:Times New Roman;background:#8adaa5;height:25px;\"  name=\"gieng\" size=\"60\" type=\"text\" value=\"$gieng\">
		</td>
		<td> </td>
	        </tr>
		</table>
		<table>
	        <tr> 
		<td >
		<input type=\"image\" name=\"save\" value =\"savefile\" src=\"upload/xuatdv.jpg\" alt=\"save\" 
		onclick=\"this.form.save.value = this.value\" style=\"margin-left:320px;\"/></td>
		<input type=hidden name=save value=\"\">
		<input type=hidden name=\"hoso\" value=\"phieuscbd\">
		</form>";
		echo"<td>
		<input type=\"image\" name=\"suadl\" value=\"suayeucaudichvu\" src=\"upload/suadulieu.jpg\" alt=\"Sua\" 
		onclick=\"this.form.suadl.value=this.value\"/></td>
		<input type=hidden name=suadl value=\"\">
		<td >
		<input type=\"image\" name=\"xoadl\" value=\"xoayeucaudichvu\" src=\"upload/xoadulieu.jpg\" alt=\"Xoa\" 
		onclick=\"this.form.xoadl.value=this.value\"></td>
		<input type=hidden name=xoadl value=\"\">
		<input type=hidden name=username value=$username>
	 	<input type=hidden name=password value=$password>
	 	<input type=hidden name=chonmay value=yes>
	 	<input type=hidden name=suaxoa value=yes>
		<input type=hidden name=\"hoso\" value=\"phieuscbd\">
	 	<input type=hidden name=solan value=$solan>
		</form>
		<form action=\"index.php\" method=\"post\">
    		<input type=hidden name=username value=$username>
		<input type=hidden name=password value=$password>
  		<input type=hidden name=\"submit\" value=\"Hồ sơ SC/BD\">
		<td><input type=\"image\" src=\"upload/back.jpg\"/></td>
		</form>
		</tr>
		</table>
		";
		}
	 echo"
	 </body>
	 </html> " ;
}
if($readhoso!="")
{
$tenthietbisql9 = mysql_query("SELECT * FROM hososcbd_iso WHERE hoso='$readhoso'") ;
while($row = mysql_fetch_array($tenthietbisql9))
{
	$ngayth =$row['ngayth'];	
	$ngaykt =$row['ngaykt'];
	$ttktbefore =$row['ttktbefore'];
	$khacphuc =$row['khacphuc'];
	$ghichu =$row['ghichu'];
	$honghoc =$row['honghoc'];
	$ttktafter =$row['ttktafter'];
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
	$ghichu=$row['ghichu'];
	$nhomsc=$row['nhomsc'];
	$mavattu=$row['mavt'];
	$somay=$row['somay'];
	$model=$row['model'];
	$fieu=$row['phieu'];
	$maql=$row['maql'];
	$ngnhyeucau=$row['ngnhyeucau'];

	$cv=$row['cv'];
	$dong=$row['dong'];
	$noidung=$row['noidung'];
	$ketluan=$row['ketluan'];
	$ghichufinal=$row['ghichufinal'];
}
$tenthietbisql13 = mysql_query("SELECT homay,mamay,dienap FROM thietbi_iso where mavt='$mavattu' and somay='$somay' and model='$model'") ;
while($row = mysql_fetch_array($tenthietbisql13))
{
	$homay=$row['homay'];
	$mamay=$row['mamay'];
	$dienap=$row['dienap'];
}
echo "
<html lang=\"vi\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
<SCRIPT LANGUAGE=\"JavaScript\" SRC=\"java/CalendarPopup.js\"></SCRIPT>
<SCRIPT LANGUAGE=\"JavaScript\">
var cal = new CalendarPopup();
</SCRIPT>
<script src=\"tinymce/tinymce.min.js\"></script>
<script type=\"text/javascript\">
tinymce.init({
selector: \"textarea\"   
}); 
</script>
</head>
<body>
<table style=\"width:100%\">
<tr>
<td >
<h2> <p style=\"text-align:center;color:blue;\"> PHIẾU THỰC HIỆN CÔNG VIỆC <br/></h2>
</p>
</td>
</tr>
</table>
<br/>
<table class=\"table7\" style=\"margin-left:50px;\">
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFE4B5;\"> <strong>Mã quản lý</strong> </td>
<td>
<div class=\"content\">
<input name=\"maql\" type=\"text\" class=\"search\" id=\"searchid\" style=\"text-align:center;width:100%;background:#8adaa5;height:25px;\"
value=\"$maql\" />
<div id=\"result\"></div>
</div>
</td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#9966CC;\"> <strong>Mã thiết bị</strong> </td>
<td> <select style=\"border-style:none;width:100%;height:30px;\">
		<option >$mamay</option>";
		echo"</select> </td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Nhóm sửa chữa</strong> </td>
<td>
<select name=\"nhomsc\" style=\"border-style:none;width:100%;height:100%;text-align:center;\">
		<option value=\"$nhomsc\">$nhomsc</option>
		<option value=\"RDNGA\"> Nhóm RDNGA </option>
		<option value=\"CNC\"> Nhóm CNC</option>
</select>
</td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Số hồ sơ</strong> </td>
<td> <input style=\"border-style:none;width:100%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"hosomaycu\" size=\"36\" type=\"text\" value=\"$readhoso\" > </td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Ngày BĐ</strong> </td>";

echo"<td>
   <input style=\"border-style:none;width:95%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"ngayth\" size=\"36\" type=\"text\" value=\"$ngayth\" readonly> 
<A HREF=\"#\"
                onClick=\"cal.select(document.forms['example'].ngayth,'anchor1','dd/MM/yyyy'); return false;\"
		NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A> </p> 
</td>";
echo"</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Ngày Kết thúc </strong></td>";
echo"<td> <input style=\"border-style:none;width:95%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"ngaykt\" size=\"36\" type=\"text\" value=\"$ngaykt\" readonly> 
<A HREF=\"#\"
                onClick=\"cal.select(document.forms['example'].ngaykt,'anchor1','dd/MM/yyyy'); return false;\"
		NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A> </p>
</td>";
echo"</tr>
</table>
<br/>";
echo "<p style=\"margin-left:50px;\"> <strong>I. NGƯỜI THỰC HIỆN </strong> <br/> <br/> </p>
<table class=\"table1\" style=\"margin-left:50px;width:800px;\">
<tr>
<th style=\"text-align:center;font-size: 15;width:60px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:400px;\"> Họ tên</th>
<th style=\"text-align:center;font-size: 15;\"> Giờ làm việc</th>
</ul>
</tr>";
for ($k=1;$k<=8;$k++) {
	$hoten[$k]="";
	$gio[$k]="";
}
$ngthsql = mysql_query("SELECT hoten,giolv FROM ngthuchien_iso WHERE mahoso='$readhoso' ORDER BY stt ASC") ;
$j=1;
while($row = mysql_fetch_array($ngthsql))
{
	$hoten[$j]=$row['hoten'];
	$gio[$j]=$row['giolv'];
	$j++;
}
$i=1;
$donvi="chuẩn chỉnh máy địa vật lý";
while($i<=8){
if ($gio[$i]==0) $gio[$i]="";
echo"<tr>
<td><center> $i </center> </td>
<td><select name=\"hoten$i\" style=\"border-style:none;width:100%;height:30px;\"\">
<option value=\"$hoten[$i]\">$hoten[$i]</option>
<option value=\"\"></option>";
		$hotensql10 = mysql_query("SELECT hoten FROM resume where donvi like'%$donvi%' and nghiviec !='yes'") ;
		while($row = mysql_fetch_array($hotensql10))
		{
			$hotennv =$row['hoten'];	
			echo "<option value=\"$hotennv\" style=\"background:#87CEEB;\"> $hotennv </option>";
		}
echo"</select></td>
<td><input type=text name=\"gio$i\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$gio[$i]\"> </td>
</tr>";
$i++;
}
echo"</table>";
echo "<p style=\"margin-left:50px;\"> <strong>II. CÁC THIẾT BỊ HỖ TRỢ </strong> <br/> <br/> </p>
<table class=\"table1\" style=\"margin-left:50px;width:800px;\">
<tr>
<th style=\"text-align:center;font-size: 15;width:60px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:405px;\"> Tên viết tắt</th>
<th style=\"text-align:center;font-size: 15;width:335px\"> Serial Number</th>
</ul>
</tr>";
$i=1;
while($i<=5){
echo"<tr>
<td><center> $i </center> </td>
<td><select name=\"thietbihotro$i\" style=\"border-style:none;width:100%;height:30px;\" onchange=\"this.form.submit()\">
<option value=\"$tbdosc[$i]\">$tbdosc[$i]</option>
<option value=\"\"></option>";
echo"</select></td>
<td><input type=text name=\"serialnumber$i\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$serialtbdosc[$i]\"> </td>
</tr>";
$i++;
}
echo"</table>
<br/>";
/*
echo"<p style=\"margin-left:50px;\"> <strong>III. DANH MỤC VẬT TƯ</strong> <br/> <br/> </p>
<table class=\"table1\" style=\"margin-left:50px;width:800px;\">
<tr>
<th style=\"text-align:center;font-size: 15;width:30px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:120px;\"> Mã Vật Tư</th>
<th style=\"text-align:center;font-size: 15;width:120px;\"> Mô tả</th>
<th style=\"text-align:center;font-size: 15;width:90px;\"> P/N</th>
<th style=\"text-align:center;font-size: 15 ;width:60px;\"> ĐVT </th>
<th style=\"text-align:center;font-size: 15 ;width:70px;\"> Số lượng </th>
</ul>
</tr>";
$i=1;
$tenthietbisql15 = mysql_query("SELECT * FROM danhmucvattu_iso WHERE mahoso='$readhoso'") ;
while($row = mysql_fetch_array($tenthietbisql15))
{
	$malinhkien1 = $row['mavattu'];
	$mota1 =$row['mota'];
	$pn1 =$row['serialnumber'];	
	$dvt1 =$row['dvt'];
	$soluong1 =$row['soluong'];	
	echo"<tr>
	<td><center> $i </center> </td>
	<td><input type=text name=\"malinhkien$i\" style=\"border-style:none;width:100%;padding-left:5px;\" value=\"$malinhkien1\"> </td>
	<td><input type=text name=\"mota$i\" style=\"border-style:none;width:100%;padding-left:10px;\" value=\"$mota1\"> </td>
	<td><input type=text name=\"pn$i\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$pn1\"> </td>
	<td><input type=text name=\"dvt$i\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$dvt1\"> </td>
	<td><input type=text name=\"soluong$i\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$soluong1\"> </td>
	</tr>";
	$i++;
}
echo"</table></br>";
*/if ($cv=="KT")
echo "  <span style=\"margin-left:50px;\"> <strong>IV. NỘI DUNG CÔNG VIỆC : </strong> KT<input type=\"checkbox\" name=\"cv\" value=\"KT\" checked>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\" > 
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BDDK<input type=\"checkbox\" name=\"cv\" value=\"BDDK\">
		 </span>
	     <br><br>";
elseif ($cv=="BD")
		echo "  <span style=\"margin-left:50px;\"> <strong>IV. NỘI DUNG CÔNG VIỆC : </strong> KT<input type=\"checkbox\" name=\"cv\" value=\"KT\">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\" checked > 
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BDDK<input type=\"checkbox\" name=\"cv\" value=\"BDDK\">
		 </span>
	     <br><br>"; 
elseif ($cv=="SC")
		echo "  <span style=\"margin-left:50px;\"> <strong>IV. NỘI DUNG CÔNG VIỆC : </strong> KT<input type=\"checkbox\" name=\"cv\" value=\"KT\">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\"  > 
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\" checked>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BDDK<input type=\"checkbox\" name=\"cv\" value=\"BDDK\">
		 </span>
	     <br><br>"; 
elseif ($cv=="BDDK")
		echo "  <span style=\"margin-left:50px;\"> <strong>IV. NỘI DUNG CÔNG VIỆC : </strong> KT<input type=\"checkbox\" name=\"cv\" value=\"KT\">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\"  > 
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BDDK<input type=\"checkbox\" name=\"cv\" value=\"BDDK\" checked>
		 </span>
	     <br><br>"; 
else
echo "  <span style=\"margin-left:50px;\"> <strong>IV. NỘI DUNG CÔNG VIỆC : </strong> KT<input type=\"checkbox\" name=\"cv\" value=\"KT\">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\"  > 
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\" checked>
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BDDK<input type=\"checkbox\" name=\"cv\" value=\"BDDK\">
		 </span>
	     <br><br>"; 

echo"<table class=\"table7\" style=\"margin-left:50px;\">
<tr>
<td  style=\"text-align:left;color:black;font-size: 18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b> 
Mô tả chi tiết tình trạng của thiết bị, các hỏng hóc (nếu có) do nhân viên xưởng kiểm tra, phát hiện</b> </td>
<td><textarea rows='3' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"honghoc\"/>$honghoc</textarea> </td>
</tr>
<tr>
<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b> 
Mô tả công việc thực hiện hoặc cách khắc phục hỏng hóc</b></td>
<td><textarea rows='3' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"khacphuc\"/>$khacphuc</textarea> </td>
</tr>";
echo"		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Kiểm tra tình trạng kỹ thuật của thiết bị sau khi BD/SC</b></td>
		<td> 1.Tên máy : .....<span  style=\"color:blue;\">$mavattu</span>.....Số máy :.....<span  style=\"color:blue;\">$somay</span>.....</br> <span>2.Họ máy :<input type=text name=\"homay\" style=\"border-style:none;\" value=\"$homay\"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Model: <input type=text name=\"model\" style=\"border-style:none;\" value=\"$model\"></span></br><span>3.Điện áp nuôi :<input type=text name=\"dienap\" style=\"border-style:none;\" value=\"$dienap\">Dòng tiêu thụ: <input type=text name=\"dong\" style=\"border-style:none;\" value=\"$dong\"></span></br><span>4.Nội dung kiểm tra: <textarea rows='8' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"noidung\"  />$noidung</textarea></span></span></br></br>";

echo " <b> 5. BẢNG SỐ LIỆU CẦN THIẾT (nếu có)</b>
<table class=\"table1\" style=\"margin-left:5px;width:470px;\">
<tr>
<th> Tên Tài Liệu </th>
<th> Link Tài Liệu </th>
</tr>";
//set all variable to null
for ($i=1;$i<=10;$i++) {
	$tentailieu[$i] ="";
	$linktailieu[$i] ="";
}
$check1=0;
$tenthietbisql22 = mysql_query("SELECT * FROM bangsolieu_iso ") ;
$j=1;
while($row = mysql_fetch_array($tenthietbisql22))
{
	$sohoso =$row['sohoso'];
	if($sohoso==$readhoso)	{
	$check1=1;
	$tentailieu[$j] =$row['tentailieu'];
	$linktailieu[$j] =$row['link'];
	$j++;
	}
}
if ($j>5) $jj=$j; else $jj=5;
for($i=1;$i<=$jj;$i++){
	$tentailieu_s[$i]=isset($_POST["tentailieu$i"]) ? $_POST["tentailieu$i"] : '';
if($check1==0) {
	echo"<tr><td> <input type=text id=\"tentl\" name=\"tentailieu$i\" style=\"border-style:none;width:100%;padding-left:10px;\" 
	value=\"$tentailieu_s[$i]\"></td>";
	echo"<td><input type=\"file\" id=\"file\" name=\"files[]\" multiple=\"multiple\"/></td></tr>";
}else{
	if ($linktailieu[$i]!=""){
	echo"<tr><td> <input type=text id=\"tentl\" name=\"tentailieu$i\" style=\"border-style:none;width:100%;padding-left:10px;\" 
	value=\"$tentailieu[$i]\"></td>";
	echo"<td><a href=\"./hoso/$sohoso/$linktailieu[$i]\">linkdown</a></td></tr>";
	}else{ 
	echo"<tr><td> <input type=text id=\"tentl\" name=\"tentailieu$i\" style=\"border-style:none;width:100%;padding-left:10px;\" 
	value=\"$tentailieu_s[$i]\"></td>";
	echo"<td><input type=\"file\" id=\"file\" name=\"files[]\" multiple=\"multiple\" /></td></tr>";
	}
}
}
echo "</table><br/>";
echo"<span>6.Kết luận: <textarea rows='2' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"ketluan\" />$ketluan</textarea></span>";
echo "</td></tr>";
echo"		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Tình trạng kỹ thuật của thiết bị sau khi sửa chữa </b> </td>
		<td><select name=\"ttktafter\" style=\"border-style:none;width:100%;height:100px;\">
		<option value=\"$ttktafter\"> $ttktafter</option>
		<option value=\"Đạt\">Đạt </option>
		<option value=\"Hỏng\">Hỏng (Không khắc phục được)</option>
		<option value=\"Chờ vật tư thay thế\">Chờ vật tư thay thế</option>
		<option value=\"Chưa kết luận\">Chưa kết luận</option>
		<option value=\"Đang sửa chữa\">Đang sửa chữa</option>
		<option value=\"TTKTDB\">TTKT Đặc biệt</option>
		</select>
		 </td>
		</tr>";
echo"<tr>
	<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Ghi chú tình trạng kỹ thuật</b></td>";
echo"<td><span><textarea rows='2' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"ghichufinal\" />$ghichufinal</textarea></span></td></tr>";
echo"
</table> 
<br/>";
echo"</body>
</html>";

}
if ($readmavattu!="") {
echo"<center><p style=\"margin-top:100px;\"> <strong>HỒ SƠ CỦA MÃ VẬT TƯ $readmavattu</strong> <br/> <br/> </p>
<table class=\"table1\" style=\"margin-left:50px;width:900px;\">
<tr>
<th style=\"text-align:center;font-size: 15;width:30px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:100px;\"> Mã hồ sơ</th>
<th style=\"text-align:center;font-size: 15;width:100px;\"> Mã máy</th>
<th style=\"text-align:center;font-size: 15;width:100px;\"> Số máy</th>
<th style=\"text-align:center;font-size: 15;width:150px;\"> Mã Vật Tư</th>
<th style=\"text-align:center;font-size: 15;width:200px;\"> Mô tả</th>
<th style=\"text-align:center;font-size: 15;width:90px;\"> P/N</th>
<th style=\"text-align:center;font-size: 15 ;width:60px;\"> ĐVT </th>
<th style=\"text-align:center;font-size: 15 ;width:70px;\"> Số lượng </th>
<th style=\"text-align:center;font-size: 15 ;width:90px;\">Ngày thực hiện</th>
</ul>
</tr>";
$i=1;
$tenthietbisql15 = mysql_query("SELECT * FROM danhmucvattu_iso WHERE mavattu='$readmavattu'") ;
while($row = mysql_fetch_array($tenthietbisql15))
{
	$mahoso = $row['mahoso'];
	$mamay = $row['mamay'];
	$somay = $row['somay'];
	$ngayth = $row['ngayth'];
	$malinhkien1 = $row['mavattu'];
	$mota1 =$row['mota'];
	$pn1 =$row['serialnumber'];	
	$dvt1 =$row['dvt'];
	$soluong1 =$row['soluong'];	
	echo"<tr>
	<td><center> $i </center> </td>
	<td>$mahoso </td>
	<td>$mamay </td>
	<td>$somay </td>
	<td>$malinhkien1 </td>
	<td>$mota1 </td>
	<td>$pn1 </td>
	<td><center>$dvt1 </center></td>
	<td><center>$soluong1</center> </td>
	<td><center>$ngayth</center> </td>
	</tr>";
	$i++;
}
echo"</table></center></br>";
}

if($edithoso!="")
{
$tenthietbisql9 = mysql_query("SELECT * FROM hososcbd_iso WHERE hoso='$edithoso'") ;
while($row = mysql_fetch_array($tenthietbisql9))
{

	$ngayth =$row['ngayth'];	
	$maql =$row['maql'];	
	$mavt =$row['mavt'];	
	$ngaykt =$row['ngaykt'];
	$ttktbefore =$row['ttktbefore'];
	$khacphuc =$row['khacphuc'];
	$ghichu =$row['ghichu'];
	$honghoc =$row['honghoc'];
	$ttktafter =$row['ttktafter'];
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
	$ghichu=$row['ghichu'];
	$nhomsc=$row['nhomsc'];
	$somay=$row['somay'];
	$model=$row['model'];
	$fieu=$row['phieu'];
	$ngnhyeucau=$row['ngnhyeucau'];
	$cv=$row['cv'];

	$dong=$row['dong'];
	$noidung=$row['noidung'];
	$ketluan=$row['ketluan'];
	$ghichufinal=$row['ghichufinal'];

		$ngaystemp = $ngayth;
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	if ($ngaystemp[$i]=="/") {
		$datetype=0;
		break;
	}elseif ($ngaystemp[$i]=="-") {
		$datetype=1;
		break;
	}
}
if ($datetype==0) {
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	$p = stripos($ngaystemp,"/") ;

if ($i== 0) {
	$ngays = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 1) {
	$thangs = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 2) {
	$nams = trim ($ngaystemp) ;
} 	
$p++ ;
$ngaystemp = substr($ngaystemp,$p);
}
}else {
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	$p = stripos($ngaystemp,"-") ;

if ($i== 0) {
	$nams = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 1) {
	$thangs = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 2) {
	$ngays = trim ($ngaystemp) ;
} 	
$p++ ;
$ngaystemp = substr($ngaystemp,$p);
}
}
	$ngaystemp = $ngaykt;
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	if ($ngaystemp[$i]=="/") {
		$datetype=0;
		break;
	}elseif ($ngaystemp[$i]=="-") {
		$datetype=1;
		break;
	}
}
if ($datetype==0) {
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	$p = stripos($ngaystemp,"/") ;

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
}else {
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	$p = stripos($ngaystemp,"-") ;

if ($i== 0) {
	$namt = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 1) {
	$thangt = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 2) {
	$ngayt = trim ($ngaystemp) ;
} 	
$p++ ;
$ngaystemp = substr($ngaystemp,$p);
}
}
}
$check=0;
$tenthietbisql12 = mysql_query("SELECT mahoso FROM danhmucvattu_iso") ;
while($row = mysql_fetch_array($tenthietbisql12))
{
	$mahoso =$row['mahoso'];
	if($mahoso==$edithoso)	$check=1;
}
$tenthietbisql11 = mysql_query("SELECT DISTINCT stt,mamay,homay,dienap FROM thietbi_iso where mavt='$mavt' and somay='$somay' and model='$model'") ;
		while($row = mysql_fetch_array($tenthietbisql11))
		{
			$thietbi_id =$row['stt'];
			$mamay =$row['mamay'];	
			$homay=$row['homay'];
			$dienap=$row['dienap'];
		}

$curday = date("d/m/Y");
echo "
<html lang=\"vi\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
<SCRIPT LANGUAGE=\"JavaScript\" SRC=\"java/CalendarPopup.js\"></SCRIPT>
<SCRIPT LANGUAGE=\"JavaScript\">
var cal = new CalendarPopup();
</SCRIPT>
<script src=\"tinymce/tinymce.min.js\"></script>
<script type=\"text/javascript\">
tinymce.init({
selector: \"textarea\"   
}); 
</script>
</head>
<body>
<table style=\"width:100%\">
<tr>
<td >
<h2> <p style=\"text-align:center;color:blue;\"> PHIẾU THỰC HIỆN CÔNG VIỆC <br/></h2>
</p>
</td>
</tr>
</table>
<br/>
<form method=\"post\" action=\"formsc.php\" enctype=\"multipart/form-data\" name=\"example\">
<table class=\"table7\" style=\"margin-left:50px;\">
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFE4B5;\"> <strong>Mã quản lý</strong> </td>
<td>
<div class=\"content\">
<input name=\"maql\" type=\"text\" class=\"search\" id=\"searchid\" style=\"text-align:center;width:100%;background:#8adaa5;height:25px;\"
value=\"$maql\" />
<div id=\"result\"></div>
</div>
</td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#9966CC;\"> <strong>Mã thiết bị</strong> </td>
<td> <select name=\"hosomay\" onchange=\"this.form.submit()\" style=\"border-style:none;width:100%;height:30px;\">
<option value=\"$edithoso\">$mamay</option>";

//$result2 = mysql_query("SELECT ghichufinal FROM hososcbd_iso WHERE mavt='$mavt' and somay='$somay' and model='$model'") ;
$result2 = mysql_query("SELECT ghichufinal FROM hososcbd_iso WHERE hoso='$edithoso'") ;
while($row = mysql_fetch_array($result2))
				{
					if($row['ghichufinal']!="")
					$ghichufinal =$row['ghichufinal'];
				}
                               if ($phanquyen=="1")
		$tenthietbisql1 = mysql_query("SELECT DISTINCT mavt,somay,hoso,model FROM hososcbd_iso WHERE phieu='$fieu'") ;
		else
		$tenthietbisql1 = mysql_query("SELECT DISTINCT mavt,somay,hoso,model FROM hososcbd_iso WHERE phieu='$fieu' and ngaykt ='0000-00-00'") ;
		$ck=0;
		while($row = mysql_fetch_array($tenthietbisql1))
		{
			$mavtt =$row['mavt'];	
			$somayt =$row['somay'];
			$hosom =$row['hoso'];
			$modelt =$row['model'];
			$sqlmodel = mysql_query("SELECT DISTINCT mamay FROM thietbi_iso WHERE mavt='$mavtt' and somay='$somayt' and model='$modelt'") ;
			while($row = mysql_fetch_array($sqlmodel))
			{
			$mamay =$row['mamay'];
			}
			
			$ck=1;
			echo "<option value=\"$hosom\" style=\"background:#87CEEB;\"> $mamay </option>";
		}
		echo"</select> </td></tr>";
		if ($ck==0) {
		echo "<span style=\"text-align:center;color:red;font-size: 18;;padding-left:50px\">Chỉ có admin mới được sửa hồ sơ có ngày kết thúc</span>";
			exit;
		}
echo"<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Nhóm sửa chữa</strong> </td>
<td>
<select name=\"nhomsc\" style=\"border-style:none;width:100%;height:100%;text-align:center;\">
		<option value=\"$nhomsc\">$nhomsc</option>
		<option value=\"RDNGA\"> Nhóm RDNGA </option>
		<option value=\"CNC\"> Nhóm CNC</option>
</select>
</td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Số hồ sơ</strong> </td>
<td> <input style=\"border-style:none;width:100%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"hosomaycu\" size=\"36\" type=\"text\" value=\"$edithoso\" > </td>
</tr>
<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Ngày BĐ</strong> </td>";

if($ngayth!="0000-00-00"){
echo"<td>
   <input style=\"border-style:none;width:95%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"ngayth\" size=\"36\" type=\"text\" value=\"$ngays/$thangs/$nams\" readonly> 
<A HREF=\"#\"
                onClick=\"cal.select(document.forms['example'].ngayth,'anchor1','dd/MM/yyyy'); return false;\"
		NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A> </p> 
</td>";
}else{
echo"<td><input style=\"border-style:none;width:95%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"ngayth\" size=\"36\" type=\"text\" value=\"$curday\">
<A HREF=\"#\"
                onClick=\"cal.select(document.forms['example'].ngayth,'anchor1','dd/MM/yyyy'); return false;\"
		NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A> </p>
</td>";
}
echo"</tr>";

echo"
</table>";

echo "<p style=\"margin-left:50px;\"> <strong>I. NGƯỜI THỰC HIỆN </strong> <br/> <br/> </p>
<table class=\"table1\" style=\"margin-left:50px;width:800px;\">

	<tr>
<th style=\"text-align:center;font-size: 15;width:60px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:400px;\"> Họ tên</th>
<th style=\"text-align:center;font-size: 15;\"> Giờ làm việc</th>
</ul>
</tr>";
for ($k=1;$k<=8;$k++) {
	$hoten[$k]="";
	$gio[$k]="";
}
$ngthsql = mysql_query("SELECT hoten,giolv FROM ngthuchien_iso WHERE mahoso='$edithoso' ORDER BY stt ASC") ;
$j=1;
while($row = mysql_fetch_array($ngthsql))
{
	$hoten[$j]=$row['hoten'];
	$gio[$j]=$row['giolv'];
	$j++;
}
$i=1;
$donvi="chuẩn chỉnh máy địa vật lý";
while($i<=8){
if ($gio[$i]==0) $gio[$i]="";
echo"<tr>
<td><center> $i </center> </td>
<td><select name=\"hoten$i\" style=\"border-style:none;width:100%;height:30px;\"\">
<option value=\"$hoten[$i]\">$hoten[$i]</option>
<option value=\"\"></option>";
		$hotensql10 = mysql_query("SELECT hoten FROM resume where donvi like'%$donvi%' and nghiviec !='yes'") ;
		while($row = mysql_fetch_array($hotensql10))
		{
			$hotennv =$row['hoten'];	
			echo "<option value=\"$hotennv\" style=\"background:#87CEEB;\"> $hotennv </option>";
		}
echo"</select></td>
<td><input type=text name=\"gio$i\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$gio[$i]\"> </td>
</tr>";
$i++;
}
echo"</table>";

echo "<p style=\"margin-left:50px;\"> <strong>II. CÁC THIẾT BỊ HỖ TRỢ </strong> <br/> <br/> </p>
<table class=\"table1\" style=\"margin-left:50px;width:800px;\">
<tr>
<th style=\"text-align:center;font-size: 15;width:60px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:405px;\"> Tên viết tắt</th>
<th style=\"text-align:center;font-size: 15;width:335px\"> Serial Number</th>
</ul>
</tr>";
$i=1;
while($i<=5){
echo"<tr>
<td><center> $i </center> </td>
<td><select name=\"thietbihotro$i\" style=\"border-style:none;width:100%;height:30px;\" onchange=\"this.form.submit()\">
<option value=\"$tbdosc[$i]\">$tbdosc[$i]</option>
<option value=\"\"></option>";
		$tenthietbisql10 = mysql_query("SELECT DISTINCT tenthietbi FROM thietbihotro_iso where thly='0'") ;
		while($row = mysql_fetch_array($tenthietbisql10))
		{
			$tentb =$row['tenthietbi'];	
			$tenthietbisql11 = mysql_query("SELECT chusohuu FROM thietbihotro_iso where tenthietbi='$tentb' and thly='0'") ;
			$sh="";
	         	while($row = mysql_fetch_array($tenthietbisql11))
			{
				$chusohuu=$row['chusohuu'];
				$ar=explode(" ",$chusohuu);
				$k=count($ar);
				if ($sh=="")
				$sh=$ar[$k-1];
				else 
					$sh=$sh.",".$ar[$k-1];
			}
			 
			echo "<option value=\"$tentb\" style=\"background:#87CEEB;\"> $tentb-$sh</option>";
		}
echo"</select></td>
<td><input type=text name=\"serialnumber$i\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$serialtbdosc[$i]\"> </td>
</tr>";
$i++;
}
echo "<tr>
		<th style=\"text-align:center;font-size: 15;width:40px;\"></th>
		<th style=\"text-align:center;font-size: 15;width:180px;\"><a href=\"danhmuchotro.php?&start=0&ad=&sort=&s=&f=&mte_a=new\" target=\"_blank\">Thêm thiết bị mới</a></th>
		<th style=\"text-align:center;font-size: 15;width:80px;\"></th>
		</tr>";
echo"</table></br>";
/*
echo"<p style=\"margin-left:50px;\"> <strong>III. DANH MỤC VẬT TƯ</strong> <br/> <br/> </p>
<table class=\"table1\" style=\"margin-left:50px;width:800px;\">
<tr>
<th style=\"text-align:center;font-size: 15;width:30px; height:30px; \"> STT</th>
<th style=\"text-align:center;font-size: 15;width:250px;\"> Mã Vật Tư</th>
<th style=\"text-align:center;font-size: 15;width:120px;\"> Mô tả</th>
<th style=\"text-align:center;font-size: 15;width:90px;\"> P/N</th>
<th style=\"text-align:center;font-size: 15 ;width:60px;\"> ĐVT </th>
<th style=\"text-align:center;font-size: 15 ;width:70px;\"> Số lượng </th>
<th style=\"text-align:center;font-size: 15 ;width:50px;\">xóa</th>
</ul>
</tr>";
$i=1;
if($check==1){
$tenthietbisql15 = mysql_query("SELECT * FROM danhmucvattu_iso WHERE mahoso='$edithoso'") ;
while($row = mysql_fetch_array($tenthietbisql15))
{
	$malinhkien1 = $row['mavattu'];
	$mota1 =$row['mota'];
	$pn1 =$row['serialnumber'];	
	$dvt1 =$row['dvt'];
	$soluong1 =$row['soluong'];	
	echo"<tr>
	<td><center> $i </center> </td>
	<td><select name=\"mlkien$i\">
	<option value=\"$malinhkien1\">$malinhkien1</option>
	";
$tenthietbisql10 = mysql_query("SELECT DISTINCT mavattu FROM danhmucvattu_iso") ;
		while($row = mysql_fetch_array($tenthietbisql10))
		{
			$malinhkien =$row['mavattu'];	
			echo "<option value=\"$malinhkien\" style=\"background:#87CEEB;\"> $malinhkien </option>";
		}	
//	echo"<option value=\"xoa\">Xóa Hàng</option>";
		echo"</select></td>";
//	echo"<input type=text name=\"malinhkien$i\" style=\"border-style:1px solid black;padding-left:10px;\" ></td>";
	echo"<td><input type=text name=\"mota$i\" style=\"border-style:none;width:100%;padding-left:10px;\" value=\"$mota1\"> </td>
	<td><input type=text name=\"pn$i\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$pn1\"> </td>
	<td><input type=text name=\"dvt$i\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$dvt1\"> </td>
	<td><input type=text name=\"soluong$i\" style=\"border-style:none;width:100%;text-align:center;\" value=\"$soluong1\"> </td>
	<td> <center><input type=\"checkbox\" name=\"sl$i\" value=\"$malinhkien1\" > </center></td>
	</tr>";
	$i++;
}
}else{
	for($j=1;$j<=5;$j++){
	echo"<tr>
	<td><center> $j </center> </td>
	<td><select name=\"mlkien$j\">
	<option value=\"other\">Nhập mới</option>";
$tenthietbisql10 = mysql_query("SELECT DISTINCT mavattu FROM danhmucvattu_iso") ;
		while($row = mysql_fetch_array($tenthietbisql10))
		{
			$malinhkien =$row['mavattu'];	
			echo "<option value=\"$malinhkien\" style=\"background:#87CEEB;\"> $malinhkien </option>";
		}	
	echo"</select><input type=text name=\"malinhkien$j\" style=\"border-style:none;padding-left:5px;\"> </td>
	<td><input type=text name=\"mota$j\" style=\"border-style:none;width:100%;padding-left:10px;\"> </td>
	<td><input type=text name=\"pn$j\" style=\"border-style:none;width:100%;text-align:center;\" > </td>
	<td><input type=text name=\"dvt$j\" style=\"border-style:none;width:100%;text-align:center;\" > </td>
	<td><input type=text name=\"soluong$j\" style=\"border-style:none;width:100%;text-align:center;\"> </td>
	<td> <center><input type=\"checkbox\" name=\"sl$j\" value=\"$malinhkien\" > </center></td>
	</tr>";
}
}
echo"</table>
<ul id=\"mbbuttonaddebul_table\" class=\"mbbuttonaddebul_menulist\" style=\"width: 197px; height: 29px;margin-left:10px;\">
<a><input type=\"image\" name=\"addvt\"  value =\"themvt\" id=\"mbi_mbbuttonadd_1\" src=\"buttonadd_files/add.jpg\" name=\"mbi_mbbuttonadd_1\" 
style=\"vertical-align: bottom;\" border=\"0\" alt=\"Thêm\" title=\"\" onclick=\"this.form.addvt.value = this.value\" /></a>
</ul>";
*/
echo"
<script type=\"text/javascript\" src=\"buttonadd_files/mbjsmbbuttonadd.js\"></script>
<input type=hidden name=addvt value=\"\">";
if ($cv=="KT")
echo "  <span style=\"margin-left:50px;\"> <strong>IV. NỘI DUNG CÔNG VIỆC : </strong> KT<input type=\"checkbox\" name=\"cv\" value=\"KT\" checked>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\" > 
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BDDK<input type=\"checkbox\" name=\"cv\" value=\"BDDK\">
		 </span>
	     <br><br>";
elseif ($cv=="BD")
		echo "  <span style=\"margin-left:50px;\"> <strong>IV. NỘI DUNG CÔNG VIỆC : </strong> KT<input type=\"checkbox\" name=\"cv\" value=\"KT\">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\" checked > 
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BDDK<input type=\"checkbox\" name=\"cv\" value=\"BDDK\">
		 </span>
	     <br><br>"; 
elseif ($cv=="SC")
		echo "  <span style=\"margin-left:50px;\"> <strong>IV. NỘI DUNG CÔNG VIỆC : </strong> KT<input type=\"checkbox\" name=\"cv\" value=\"KT\">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\"  > 
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\" checked>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BDDK<input type=\"checkbox\" name=\"cv\" value=\"BDDK\">
		 </span>
	     <br><br>"; 
elseif ($cv=="BDDK")
		echo "  <span style=\"margin-left:50px;\"> <strong>IV. NỘI DUNG CÔNG VIỆC : </strong> KT<input type=\"checkbox\" name=\"cv\" value=\"KT\">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\"  > 
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BDDK<input type=\"checkbox\" name=\"cv\" value=\"BDDK\" checked>
		 </span>
	     <br><br>"; 
else
echo "  <span style=\"margin-left:50px;\"> <strong>IV. NỘI DUNG CÔNG VIỆC : </strong> KT<input type=\"checkbox\" name=\"cv\" value=\"KT\">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BD<input type=\"checkbox\" name=\"cv\" value=\"BD\"  > 
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SC<input type=\"checkbox\" name=\"cv\" value=\"SC\" checked>
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BDDK<input type=\"checkbox\" name=\"cv\" value=\"BDDK\">
		 </span>
	     <br><br>"; 

// Hiển thị thông tin BDDK từ bảng ke_hoach_bao_duong_dinh_ky_iso
if(isset($thietbi_id) && $thietbi_id > 0) {
	$bddk_query = mysql_query("SELECT * FROM ke_hoach_bao_duong_dinh_ky_iso WHERE thietbi_id='$thietbi_id' ORDER BY nam DESC LIMIT 1");
	if($bddk_row = mysql_fetch_array($bddk_query)) {
		$nam_bddk = $bddk_row['nam'];
		$qui_1 = $bddk_row['qui_1'];
		$qui_2 = $bddk_row['qui_2'];
		$qui_3 = $bddk_row['qui_3'];
		$qui_4 = $bddk_row['qui_4'];
		$qui_1_ht = $bddk_row['qui_1_hoantat'];
		$qui_2_ht = $bddk_row['qui_2_hoantat'];
		$qui_3_ht = $bddk_row['qui_3_hoantat'];
		$qui_4_ht = $bddk_row['qui_4_hoantat'];
		$ghi_chu_bddk = $bddk_row['ghi_chu'];
		
		echo "<table class=\"table1\" style=\"margin-left:50px;width:800px;margin-top:10px;\">
		<tr>
		<th colspan=\"5\" style=\"text-align:center;font-size: 16;background-color:#20B2AA;\">THÔNG TIN BẢO DƯỠNG ĐỊNH KỲ - NĂM $nam_bddk</th>
		</tr>
		<tr>
		<th style=\"text-align:center;font-size: 15;width:100px;\">Quý 1</th>
		<th style=\"text-align:center;font-size: 15;width:100px;\">Quý 2</th>
		<th style=\"text-align:center;font-size: 15;width:100px;\">Quý 3</th>
		<th style=\"text-align:center;font-size: 15;width:100px;\">Quý 4</th>
		<th style=\"text-align:center;font-size: 15;width:400px;\">Ghi chú</th>
		</tr>
		<tr>
		<td style=\"text-align:center;".($qui_1 == 'TO' ? "background-color:#FFA500;" : "")."\">";
		if($qui_1 == 'TO') {
			if($qui_1_ht == 1) echo "<span style=\"color:green;font-size:18px;\">✓</span>";
			else echo "&nbsp;";
		} else {
			echo "-";
		}
		echo "</td>
		<td style=\"text-align:center;".($qui_2 == 'TO' ? "background-color:#FFA500;" : "")."\">";
		if($qui_2 == 'TO') {
			if($qui_2_ht == 1) echo "<span style=\"color:green;font-size:18px;\">✓</span>";
			else echo "&nbsp;";
		} else {
			echo "-";
		}
		echo "</td>
		<td style=\"text-align:center;".($qui_3 == 'TO' ? "background-color:#FFA500;" : "")."\">";
		if($qui_3 == 'TO') {
			if($qui_3_ht == 1) echo "<span style=\"color:green;font-size:18px;\">✓</span>";
			else echo "&nbsp;";
		} else {
			echo "-";
		}
		echo "</td>
		<td style=\"text-align:center;".($qui_4 == 'TO' ? "background-color:#FFA500;" : "")."\">";
		if($qui_4 == 'TO') {
			if($qui_4_ht == 1) echo "<span style=\"color:green;font-size:18px;\">✓</span>";
			else echo "&nbsp;";
		} else {
			echo "-";
		}
		echo "</td>
		<td style=\"padding-left:10px;\">$ghi_chu_bddk</td>
		</tr>
		</table><br/>";
	} else {
		$current_year = date("Y");
		echo "<table class=\"table1\" style=\"margin-left:50px;width:800px;margin-top:10px;\">
		<tr>
		<th style=\"text-align:center;font-size: 16;background-color:#20B2AA;\">THÔNG TIN BẢO DƯỠNG ĐỊNH KỲ - NĂM $current_year</th>
		</tr>
		<tr>
		<td style=\"text-align:center;color:red;font-size:16px;font-weight:bold;padding:20px;\">⚠ Không xác định được kế hoạch bảo dưỡng định kỳ</td>
		</tr>
		</table><br/>";
	}
}

//echo "</table>";
echo"<table class=\"table7\" style=\"margin-left:50px;\">
<tr>
<td  style=\"text-align:left;color:black;font-size: 18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b> 
Mô tả chi tiết tình trạng của thiết bị, các hỏng hóc (nếu có) do nhân viên xưởng kiểm tra, phát hiện</b> </td>
<td><textarea rows='3' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"honghoc\"/>$honghoc</textarea> </td>
</tr>
<tr>
<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b> 
Mô tả công việc thực hiện hoặc cách khắc phục hỏng hóc</b></td>
<td><textarea rows='3' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"khacphuc\"/>$khacphuc</textarea> </td>
</tr>";
echo"
<tr>
<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Kiểm tra tình trạng kỹ thuật của thiết bị sau khi BD/SC</b></td>
		<td> 1.Tên máy : .....<span  style=\"color:blue;\">$mavt</span>.....Số máy :.....<span  style=\"color:blue;\">$somay</span>.....</br> <span>2.Họ máy :<input type=text name=\"homay\" style=\"border-style:none;\" value=\"$homay\"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Model: <input type=text name=\"model\" style=\"border-style:none;\" value=\"$model\"></span></br><span>3.Điện áp nuôi :<input type=text name=\"dienap\" style=\"border-style:none;\" value=\"$dienap\">Dòng tiêu thụ: <input type=text name=\"dong\" style=\"border-style:none;\" value=\"$dong\"></span></br><span>4.Nội dung kiểm tra: <textarea rows='8' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"noidung\" />$noidung </textarea></span></span></br></br>";

echo " <b> 5. BẢNG SỐ LIỆU CẦN THIẾT (nếu có)</b>
<table class=\"table1\" style=\"margin-left:5px;width:470px;\">
<tr>
<th> Tên Tài Liệu </th>
<th> Link Tài Liệu </th>
</tr>";
//set all variable to null
for ($i=1;$i<=10;$i++) {
	$tentailieu[$i] ="";
	$linktailieu[$i] ="";
}
$check1=0;
$tenthietbisql22 = mysql_query("SELECT * FROM bangsolieu_iso ") ;
$j=1;
while($row = mysql_fetch_array($tenthietbisql22))
{
	$sohoso =$row['sohoso'];
	if($sohoso==$edithoso)	{
	$check1=1;
	$tentailieu[$j] =$row['tentailieu'];
	$linktailieu[$j] =$row['link'];
	$j++;
	}
}
if ($j>5) $jj=$j; else $jj=5;
for($i=1;$i<=$jj;$i++){
	$tentailieu_s[$i]=isset($_POST["tentailieu$i"]) ? $_POST["tentailieu$i"] : '';
if($check1==0) {
	echo"<tr><td> <input type=text id=\"tentl\" name=\"tentailieu$i\" style=\"border-style:none;width:100%;padding-left:10px;\" 
	value=\"$tentailieu_s[$i]\"></td>";
	echo"<td><input type=\"file\" id=\"file\" name=\"files[]\" multiple=\"multiple\"/></td></tr>";
}else{
	if ($linktailieu[$i]!=""){
	echo"<tr><td> <input type=text id=\"tentl\" name=\"tentailieu$i\" style=\"border-style:none;width:100%;padding-left:10px;\" 
	value=\"$tentailieu[$i]\"></td>";
	echo"<td><a href=\"./hoso/$sohoso/$linktailieu[$i]\">linkdown</a><span  style=\"padding-left:130px\" ><a href='xoafile.php?f=$linktailieu[$i]&s=$sohoso' TARGET=\"_blank\" title='Delete' >Delete</a></span></td></tr>";
	}else{ 
	echo"<tr><td> <input type=text id=\"tentl\" name=\"tentailieu$i\" style=\"border-style:none;width:100%;padding-left:10px;\" 
	value=\"$tentailieu_s[$i]\"></td>";
	echo"<td><input type=\"file\" id=\"file\" name=\"files[]\" multiple=\"multiple\" /></td></tr>";
	}
}
}
echo "</table><br/>";
echo"<span>6.Kết luận: <textarea rows='2' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"ketluan\" />$ketluan</textarea></span>";
echo "</td></tr>";
echo"		<tr>
		<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Tình trạng kỹ thuật của thiết bị sau khi sửa chữa </b> </td>
		<td><select name=\"ttktafter\" style=\"border-style:none;width:100%;height:100px;\">
		<option value=\"$ttktafter\"> $ttktafter</option>
		<option value=\"Đạt\">Đạt </option>
		<option value=\"Hỏng\">Hỏng (Không khắc phục được)</option>
		<option value=\"Chờ vật tư thay thế\">Chờ vật tư thay thế</option>
		<option value=\"Chưa kết luận\">Chưa kết luận</option>
		<option value=\"Đang sửa chữa\">Đang sửa chữa</option>
		<option value=\"TTKTDB\">TTKT Đặc biệt</option>
		</select>
		 </td>
		</tr>";
echo"<tr>
	<td  style=\"text-align:left;color:black;font-size:18;width:300px;height:100px;padding-left:20px;background-color:#FFDAB9;\"><b>Ghi chú tình trạng kỹ thuật</b></td>";
echo"<td><span><textarea rows='2' cols='56' style=\"font_family:Times New Roman;font-size:14;margin-left:5px;\" name=\"ghichufinal\" />$ghichufinal</textarea></span></td></tr>";
echo"<tr>
<td style=\"text-align:left;color:black;font-size: 18;width:300px;padding-left:20px;background-color:#FFDAB9;\"> <strong>Ngày Kết thúc </strong></td>";
if($ngaykt!="0000-00-00"){
echo"<td> <input style=\"border-style:none;width:95%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"ngaykt\" size=\"36\" type=\"text\" value=\"$ngayt/$thangt/$namt\"> 
<A HREF=\"#\"
                onClick=\"cal.select(document.forms['example'].ngaykt,'anchor1','dd/MM/yyyy'); return false;\"
		NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A> </p>
</td>";
}else{
echo"<td> <input style=\"border-style:none;width:95%;text-align:center;font_family:Times New Roman;height:30px;\" name=\"ngaykt\" size=\"36\" 
		type=\"text\" readonly> 
<A HREF=\"#\"
                onClick=\"cal.select(document.forms['example'].ngaykt,'anchor1','dd/MM/yyyy'); return false;\"
		NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A> </p>
</td>";
}
echo"</tr>";
echo "</table> 
<br/>";

echo"   <table><tr><td><input style=\"margin-left:380px;\"/ type=\"image\" name=\"xuatphieu\" value =\"phieukiemtra\" src=\"upload/xuatsc.jpg\" alt=\"Nhap\" 
	onclick=\"this.form.xuatphieu.value = this.value\"/></td></tr>
	</table>
	<input type=hidden name=xuatphieu value=\"\">
	<input type=hidden name=maql value=\"$maql\">
	<input type=hidden name=username value=$username>
	<input type=hidden name=password value=$password>
	<input type=hidden name=hoso value=phieusuachua>
	<input type=hidden name=chonthietbi value=yes>

</form>
</body>
</html>";
}
ob_flush();
?>
