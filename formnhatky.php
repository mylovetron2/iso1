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
$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
$hoso = isset($_POST['hoso']) ? $_POST['hoso'] : '';
$solan = isset($_POST['solan']) ? $_POST['solan'] : '';
$nhap = isset($_POST['nhap']) ? $_POST['nhap'] : '';
$button = isset($_POST['button']) ? $_POST['button'] : '';
$suaxoa = isset($_POST['suaxoa']) ? $_POST['suaxoa'] : '';
$suadl = isset($_POST['suadl']) ? $_POST['suadl'] : '';
$xoadl = isset($_POST['xoadl']) ? $_POST['xoadl'] : '';
$phieu = isset($_POST['phieu']) ? $_POST['phieu'] : '';
$next = isset($_POST['next']) ? $_POST['next'] : '';

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
// NHAP NHAT KY CONG VIEC HANG NGAY
if(($submit == "nhapdulieu")&&($hoso== "nhatky")) {
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
<h2> <span style=\"color:blue;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VIẾT NHẬT KÝ CÔNG VIỆC HÀNG NGÀY </span> 
</h2>
</td>
</tr>
</table>";
$curday = date("d/m/Y");
$donvi="chuẩn chỉnh máy địa vật lý";
echo"<form method=\"post\" action=\"formnhatky.php\" enctype=\"multipart/form-data\" name=\"example\">
	<br/>
	<table style=\"margin-left:50px;width:950px;\">
	<tr bgcolor=\"#FFA500\">	
	<td style=\"text-align:center;font-size: 15;width:30%;\">	<b> NGÀY   </b></td>
	<td style=\"text-align:center;font-size: 15;width:45%;\"><b> HỌ VÀ TÊN</b></td>
	</tr>
	<tr>
	<td>
	<input  name=\"ngay\" size=\"20\" type=\"text\" value =\"$curday\" style=\"width:90%;background:#8adaa5;height:25px;\" />
	<A HREF=\"#\" onClick=\"cal.select(document.forms['example'].ngay,'anchor1','dd/MM/yyyy'); return false;\"
    NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A></td>
	";
	$r2 = mysql_query("SELECT DISTINCT hoten  FROM users where username='$username'");
	while($row = mysql_fetch_array($r2))
	{
		$hoten =$row['hoten'];
	}
	echo"<td><input type=text name=\"hoten\" value =\"$hoten\" style=\"width:100%;background:#8adaa5;height:25px;text-align:center;\"></td>";
	echo"
	
	</tr>
	</table>
	<br/>
		<br/>
		<table class=\"table1\" >
		<tr>
		<th style=\"text-align:center;font-size: 15;width:90px;\"> GIỜ LÀM VIỆC</th>
		<th style=\"text-align:center;font-size: 15;width:300px;\">NỘI DUNG CÔNG VIỆC</th>
		<th style=\"text-align:center;font-size: 15 ;width:170px;\">TÊN THIẾT BỊ/CÔNG VIỆC</th>
		<th style=\"text-align:center;font-size: 15 ;width:80px;\">GHI CHÚ</th>
		</tr>";
$i =1 ;
while($i<=5){
	echo"
		<tr>
		<td><input type=text name=\"gio$i\" style=\"border-style:none;width:100%;text-align:center;\"></td>
		<td><textarea rows='5' cols='58' style=\"font_family:Times New Roman;font-size:14;margin-left:1px;\" name=\"noidungcv$i\"/></textarea> </td>
		<td><textarea rows='5' cols='20' style=\"font_family:Times New Roman;font-size:14;margin-left:1px;\" name=\"tentbcv$i\"/></textarea> </td>
	    <td><textarea rows='5' cols='20' style=\"font_family:Times New Roman;font-size:14;margin-left:1px;\" name=\"ghichu$i\"/></textarea> </td>
		</tr>";
		$i++;		
}
echo " </table>";
echo"<br/><table>
		<tr>
		<td><input type=\"image\" name=\"button\" value =\"them\"  src=\"buttonadd_files/add.jpg\" alt=\"Thêm\" 
		onclick=\"this.form.button.value = this.value\" style=\"margin-left:50px;\" /></td></tr>
		<input type=hidden name=button value=\"\"></td></tr></table>
	<table>	
	<tr>
	<td >
	<input type=\"image\" name=\"nhap\" value=\"nhapnk\" src=\"upload/nhapdl.png\" alt=\"Nhap\" 
	onclick=\"this.form.nhap.value=this.value\" style=\"margin-left:450px;\"/></td>
	</tr>
	</table>
	<input type=hidden name=nhap value=\"\">	
	<input type=hidden name=username value=$username>
	<input type=hidden name=password value=$password>
	
	</form>
	</body>
	</html> " ;
}

// SUA NHAT KY CONG VIEC HANG NGAY
if(($submit == "nhapdulieu")&&($hoso== "suanhatky")) {
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
<h2> <span style=\"color:blue;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CHỌN NGÀY ĐỂ SỬA NHẬT KÝ </span> 
</h2>
</td>
</tr>
</table>";
$curday = date("d/m/Y");
$donvi="chuẩn chỉnh máy địa vật lý";
echo"<form method=\"post\" action=\"formnhatky.php\" enctype=\"multipart/form-data\" name=\"example\">
	<br/>
	<table style=\"margin-left:50px;width:950px;\">
	<tr bgcolor=\"#FFA500\">	
	<td style=\"text-align:center;font-size: 15;width:30%;\">	<b> NGÀY   </b></td>
	<td style=\"text-align:center;font-size: 15;width:45%;\"><b> HỌ VÀ TÊN</b></td>
	</tr>
	<tr>
	<td>
	<input  name=\"ngay\" size=\"20\" type=\"text\" value =\"$curday\" style=\"width:90%;background:#8adaa5;height:25px;\" />
	<A HREF=\"#\" onClick=\"cal.select(document.forms['example'].ngay,'anchor1','dd/MM/yyyy'); return false;\"
    NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A></td>
	";
	$r2 = mysql_query("SELECT DISTINCT hoten  FROM users where username='$username'");
	while($row = mysql_fetch_array($r2))
	{
		$hoten =$row['hoten'];
	}
	echo"<td><input type=text name=\"hoten\" value =\"$hoten\" style=\"width:100%;background:#8adaa5;height:25px;text-align:center;\"></td>";
	echo"
	
	</tr>
	</table>
	<br/>
	<table>	
	<tr>
	<td >
	<input type=\"image\" name=\"next\" value=\"next\" src=\"upload/next.jpg\" alt=\"Next\" 
	onclick=\"this.form.next.value=this.value\" style=\"margin-left:450px;\"/></td>
	</tr>
	</table>
	<input type=hidden name=next value=\"\">	
	<input type=hidden name=username value=$username>
	<input type=hidden name=password value=$password>
	</form>
	</body>
	</html> " ;
}
//xu ly Next
if($next=="next")
{	

$ngay=isset($_POST['ngay']) ? $_POST['ngay'] : '';
$hoten=isset($_POST['hoten']) ? $_POST['hoten'] : '';
if ($solan=="") $solan=0;

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
$ngaysua="$nams-$thangs-$ngays";
$checkhoso=0;
$r3="SELECT ngaynk FROM nhatky_iso where hoten='$hoten'";
$result=mysqli_query($con,$r3);
if(mysqli_num_rows($result)>0){
$r3=mysql_query("SELECT ngaynk FROM nhatky_iso where hoten='$hoten'");
while($row = mysql_fetch_array($r3))
{
	$ngaynktemp =$row['ngaynk'];
	if ($ngaynktemp==$ngaysua) {
		$checkhoso=1;
		break;
	}
}
}
if($checkhoso==0) echo " </br></br></br><center> <span style=\"color:red;\">NHẬT KÝ NGÀY $ngays/$thangs/$nams CỦA $hoten KHÔNG CÓ </span></center>" ;
else {
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
<h2> <span style=\"color:blue;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VIẾT NHẬT KÝ CÔNG VIỆC HÀNG NGÀY </span> 
</h2>
</td>
</tr>
</table>";
//$donvi="chuẩn chỉnh máy địa vật lý";
echo"<form method=\"post\" action=\"formnhatky.php\" enctype=\"multipart/form-data\" name=\"example\">
	<br/>
	<table style=\"margin-left:50px;width:950px;\">
	<tr bgcolor=\"#FFA500\">	
	<td style=\"text-align:center;font-size: 15;width:30%;\">	<b> NGÀY   </b></td>
	<td style=\"text-align:center;font-size: 15;width:45%;\"><b> HỌ VÀ TÊN</b></td>
	</tr>
	<tr>
	<td>
	<input  name=\"ngay\" size=\"20\" type=\"text\" value =\"$ngay\" style=\"width:90%;background:#8adaa5;height:25px;\" />
	<A HREF=\"#\" onClick=\"cal.select(document.forms['example'].ngay,'anchor1','dd/MM/yyyy'); return false;\"
    NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A></td>
	";
/*	$r2 = mysql_query("SELECT DISTINCT hoten  FROM users where username='$username'");
	while($row = mysql_fetch_array($r2))
	{
		$hoten =$row['hoten'];
	}
	*/
	echo"<td><input type=text name=\"hoten\" value =\"$hoten\" style=\"width:100%;background:#8adaa5;height:25px;text-align:center;\"></td>";
	echo"
	
	</tr>
	</table>
	<br/>
		<br/>
		<table class=\"table1\" >
		<tr>
		<th style=\"text-align:center;font-size: 15;width:90px;\"> GIỜ LÀM VIỆC</th>
		<th style=\"text-align:center;font-size: 15;width:300px;\">NỘI DUNG CÔNG VIỆC</th>
		<th style=\"text-align:center;font-size: 15 ;width:170px;\">TÊN THIẾT BỊ/CÔNG VIỆC</th>
		<th style=\"text-align:center;font-size: 15 ;width:80px;\">GHI CHÚ</th>
		</tr>";
    $i=1;
	$solan=0;
	$r4 = mysql_query("SELECT *  FROM nhatky_iso where ngaynk='$ngaysua' and hoten='$hoten'");
	while($row = mysql_fetch_array($r4))
	{
		while ($i<=10) {
	 $gio[$i] =$row["gio$i"];
     if($gio[$i] !=NULL) {
	 $solan++;
	 $noidungcv[$i] =$row["noidungcv$i"];
	 $tentbcv[$i] =$row["tentbcv$i"];
	 $ghichu[$i] =$row["ghichu$i"];
	echo"
		<tr>
		<td><input type=text name=\"gio$i\" value =\"$gio[$i]\" style=\"border-style:none;width:100%;text-align:center;\"></td>
		<td><textarea rows='5' cols='56'  style=\"font_family:Times New Roman;font-size:14;margin-left:1px;\" name=\"noidungcv$i\"/  > $noidungcv[$i]</textarea> </td>
		<td><textarea rows='5' cols='20'  style=\"font_family:Times New Roman;font-size:14;margin-left:1px;\" name=\"tentbcv$i\"/  >$tentbcv[$i]</textarea> </td>
	    <td><textarea rows='5' cols='20'  style=\"font_family:Times New Roman;font-size:14;margin-left:1px;\" name=\"ghichu$i\"/ >$ghichu[$i]</textarea> </td>
		</tr>";
	 }
	 $i++;
	}
}
$solan=$solan-5;
echo " </table>";
echo"<br/><table>
		<tr>
		<td><input type=\"image\" name=\"button\" value =\"them\"  src=\"buttonadd_files/add.jpg\" alt=\"Thêm\" 
		onclick=\"this.form.button.value = this.value\" style=\"margin-left:50px;\" />
		<input type=hidden name=button value=\"\"></td></tr></table>
	<table>
	<tr>
	<td >
	<input type=\"image\" name=\"suadl\" value=\"suadl\" src=\"upload/suadulieu.jpg\" alt=\"Nhap\" 
	onclick=\"this.form.suadl.value=this.value\" style=\"margin-left:450px;\"/></td>
	</tr>
	</table>
	<input type=hidden name=suadl value=\"\">	
	<input type=hidden name=username value=$username>
	<input type=hidden name=password value=$password>
	<input type=hidden name=solan value=\"$solan\">
	<input type=hidden name=ngaycu value=\"$ngay\">
	<input type=hidden name=hoso value=\"suanhatky\">
	</form>
	</body>
	</html> " ;

}
}
//xu ly button
if($button=="them")
{	
$ngaycu=isset($_POST['ngaycu']) ? $_POST['ngaycu'] : '';
$ngay=isset($_POST['ngay']) ? $_POST['ngay'] : '';
$hoten=isset($_POST['hoten']) ? $_POST['hoten'] : '';
if ($solan=="") $solan=0;
$solan++;
if($solan>5) $solan=5;
for($i=1;$i<=5+$solan;$i++){
    $gio[$i]=isset($_POST["gio$i"]) ? $_POST["gio$i"] : '';
    $noidungcv[$i]=isset($_POST["noidungcv$i"]) ? $_POST["noidungcv$i"] : '';
    $tentbcv[$i]=isset($_POST["tentbcv$i"]) ? $_POST["tentbcv$i"] : '';
	$ghichu[$i]=isset($_POST["ghichu$i"]) ? $_POST["ghichu$i"] : '';
}
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
<h2> <span style=\"color:blue;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VIẾT NHẬT KÝ CÔNG VIỆC HÀNG NGÀY </span> 
</h2>
</td>
</tr>
</table>";
$curday = date("d/m/Y");
$donvi="chuẩn chỉnh máy địa vật lý";
echo"<form method=\"post\" action=\"formnhatky.php\" enctype=\"multipart/form-data\" name=\"example\">
	<br/>
	<table style=\"margin-left:50px;width:950px;\">
	<tr bgcolor=\"#FFA500\">	
	<td style=\"text-align:center;font-size: 15;width:30%;\">	<b> NGÀY   </b></td>
	<td style=\"text-align:center;font-size: 15;width:45%;\"><b> HỌ VÀ TÊN</b></td>
	</tr>
	<tr>
	<td>
	<input  name=\"ngay\" size=\"20\" type=\"text\" value =\"$ngay\" style=\"width:90%;background:#8adaa5;height:25px;\" />
	<A HREF=\"#\" onClick=\"cal.select(document.forms['example'].ngay,'anchor1','dd/MM/yyyy'); return false;\"
    NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A></td>
	";
	$r2 = mysql_query("SELECT DISTINCT hoten  FROM users where username='$username'");
	while($row = mysql_fetch_array($r2))
	{
		$hoten =$row['hoten'];
	}
	echo"<td><input type=text name=\"hoten\" value =\"$hoten\" style=\"width:100%;background:#8adaa5;height:25px;text-align:center;\"></td>";
	echo"
	
	</tr>
	</table>
	<br/>
		<br/>
		<table class=\"table1\" >
		<tr>
		<th style=\"text-align:center;font-size: 15;width:90px;\"> GIỜ LÀM VIỆC</th>
		<th style=\"text-align:center;font-size: 15;width:300px;\">NỘI DUNG CÔNG VIỆC</th>
		<th style=\"text-align:center;font-size: 15 ;width:170px;\">TÊN THIẾT BỊ/CÔNG VIỆC</th>
		<th style=\"text-align:center;font-size: 15 ;width:80px;\">GHI CHÚ</th>
		</tr>";
$i =1 ;
while($i<=5+$solan){
	echo"
		<tr>
		<td><input type=text name=\"gio$i\" value =\"$gio[$i]\" style=\"border-style:none;width:100%;text-align:center;\"></td>
		<td><textarea rows='5' cols='56'  style=\"font_family:Times New Roman;font-size:14;margin-left:1px;\" name=\"noidungcv$i\"/  > $noidungcv[$i]</textarea> </td>
		<td><textarea rows='5' cols='20'  style=\"font_family:Times New Roman;font-size:14;margin-left:1px;\" name=\"tentbcv$i\"/  >$tentbcv[$i]</textarea> </td>
	    <td><textarea rows='5' cols='20'  style=\"font_family:Times New Roman;font-size:14;margin-left:1px;\" name=\"ghichu$i\"/ >$ghichu[$i]</textarea> </td>
		</tr>";
		$i++;
}
echo " </table>";
echo"<br/><table>
		<tr>
		<td><input type=\"image\" name=\"button\" value =\"them\"  src=\"buttonadd_files/add.jpg\" alt=\"Thêm\" 
		onclick=\"this.form.button.value = this.value\" style=\"margin-left:50px;\" />
		<input type=hidden name=button value=\"\"></td></tr></table>
	<table>
	<tr>
	<td >";
	if($hoso=="suanhatky")
	echo"<input type=\"image\" name=\"suadl\" value=\"suadl\" src=\"upload/suadulieu.jpg\" alt=\"Suadl\" 
	onclick=\"this.form.suadl.value=this.value\" style=\"margin-left:450px;\"/>
	<input type=hidden name=suadl value=\"\"></td>
	</tr>";
	else 
	echo"<input type=\"image\" name=\"nhap\" value=\"nhapnk\" src=\"upload/nhapdl.png\" alt=\"Nhap\" 
	onclick=\"this.form.nhap.value=this.value\" style=\"margin-left:450px;\"/>
	<input type=hidden name=nhap value=\"\"></td>
	</tr>";
	echo"</table>
		
	<input type=hidden name=username value=$username>
	<input type=hidden name=password value=$password>
	<input type=hidden name=solan value=$solan>
	<input type=hidden name=ngaycu value=\"$ngaycu\">
	<input type=hidden name=hoso value='suanhatky'>
	
	</form>
	</body>
	</html> " ;


}
// nhat ky
if(($nhap=="nhapnk")||($suadl=="suadl"))
{
$ngaycu=isset($_POST['ngaycu']) ? $_POST['ngaycu'] : '';
$ngay=isset($_POST['ngay']) ? $_POST['ngay'] : '';
$hoten=isset($_POST['hoten']) ? $_POST['hoten'] : '';
if ($solan=="") $solan=0;
for($i=1;$i<=10;$i++){
    $gio[$i]=isset($_POST["gio$i"]) ? $_POST["gio$i"] : '';
    $noidungcv[$i]=isset($_POST["noidungcv$i"]) ? $_POST["noidungcv$i"] : '';
    $tentbcv[$i]=isset($_POST["tentbcv$i"]) ? $_POST["tentbcv$i"] : '';
	$ghichu[$i]=isset($_POST["ghichu$i"]) ? $_POST["ghichu$i"] : '';
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
// ngay cu
if($ngaycu !='') {
	$ngaystemp = $ngaycu;
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
	$ngayc = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 1) {
	$thangc = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 2) {
	$namc = trim ($ngaystemp) ;
} 	
$p++ ;
$ngaystemp = substr($ngaystemp,$p);
}
}else {
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	$p = stripos($ngaystemp,"-") ;

if ($i== 0) {
	$namc = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 1) {
	$thangc = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 2) {
	$ngayc = trim ($ngaystemp) ;
} 	
$p++ ;
$ngaystemp = substr($ngaystemp,$p);
}
}
}
//////
$r3="SELECT max(stt) as tt FROM nhatky_iso";
$result=mysqli_query($con,$r3);
if(mysqli_num_rows($result)>0){
$r3=mysql_query("SELECT max(stt) as tt FROM nhatky_iso");
while($row = mysql_fetch_array($r3))
{
	$recc =$row['tt'];
}
}else $recc=0;
$recc++;

$curdate=date("Y-m-d H:i:s");
$ip_address= $_SERVER['REMOTE_ADDR'];
$bg=0;
$checkhoso=0;
$manhatky="$nams$thangs$ngays-$hoten";
$r3="SELECT manhatky FROM nhatky_iso";
$result=mysqli_query($con,$r3);
if(mysqli_num_rows($result)>0){
$r3=mysql_query("SELECT manhatky FROM nhatky_iso");
while($row = mysql_fetch_array($r3))
{
	$nhatkytemp =$row['manhatky'];
	if ($nhatkytemp==$manhatky) {
		$checkhoso=1;
		break;
	}
}
}
if ($checkhoso==1) {
if ($suadl=="suadl") {
	// Update data
	$i=1;
	if ($ngay != $ngaycu) {
	echo " </br></br></br><center> <span style=\"color:red;\">NHẬT KÝ NGÀY $ngays/$thangs/$nams CỦA $hoten ĐÃ ĐƯỢC NHẬP </span></center>" ;
        exit;
	}	
$update = "update nhatky_iso SET
	gio1='$gio[1]',
	gio2='$gio[2]',
	gio3='$gio[3]',
	gio4='$gio[4]',
	gio5='$gio[5]',
	gio6='$gio[6]',
	gio7='$gio[7]',
	gio8='$gio[8]',
	gio9='$gio[9]',
	gio10='$gio[10]',
    noidungcv1='$noidungcv[1]',
	noidungcv2='$noidungcv[2]',
	noidungcv3='$noidungcv[3]',
	noidungcv4='$noidungcv[4]',
	noidungcv5='$noidungcv[5]',
	noidungcv6='$noidungcv[6]',
	noidungcv7='$noidungcv[7]',
	noidungcv8='$noidungcv[8]',
	noidungcv9='$noidungcv[9]',
	noidungcv10='$noidungcv[10]',
	tentbcv1='$tentbcv[1]',
	tentbcv2='$tentbcv[2]',
	tentbcv3='$tentbcv[3]',
	tentbcv4='$tentbcv[4]',
	tentbcv5='$tentbcv[5]',
	tentbcv6='$tentbcv[6]',
	tentbcv7='$tentbcv[7]',
	tentbcv8='$tentbcv[8]',
	tentbcv9='$tentbcv[9]',
	tentbcv10='$tentbcv[10]',
	ghichu1='$ghichu[1]',
	ghichu2='$ghichu[2]',
	ghichu3='$ghichu[3]',
	ghichu4='$ghichu[4]',
	ghichu5='$ghichu[5]',
	ghichu6='$ghichu[6]',
	ghichu7='$ghichu[7]',
	ghichu8='$ghichu[8]',
	ghichu9='$ghichu[9]',
	ghichu10='$ghichu[10]'
	where  manhatky='$manhatky'";
mysql_query($update) or die(mysql_error());

}else{
echo " </br></br></br><center> <span style=\"color:red;\">NHẬT KÝ NGÀY $ngays/$thangs/$nams CỦA $hoten ĐÃ ĐƯỢC NHẬP </span></center>" ;
exit;	
}	
}else{
	if ($suadl=="suadl") { // Doi ngay
		
		$delete = " DELETE FROM nhatky_iso WHERE ngaynk = '$namc-$thangc-$ngayc' and hoten='$hoten' " ;
		$result = mysql_query("$delete") or die(mysql_error());
	}
//Insert data to MySQL
$manhatky="$nams$thangs$ngays-$hoten";
$insert = "insert into nhatky_iso(
stt,
manhatky,
ngaynk,
hoten,
gio1,
gio2,
gio3,
gio4,
gio5,
gio6,
gio7,
gio8,
gio9,
gio10,
noidungcv1,
noidungcv2,
noidungcv3,
noidungcv4,
noidungcv5,
noidungcv6,
noidungcv7,
noidungcv8,
noidungcv9,
noidungcv10,
tentbcv1,
tentbcv2,
tentbcv3,
tentbcv4,
tentbcv5,
tentbcv6,
tentbcv7,
tentbcv8,
tentbcv9,
tentbcv10,
ghichu1,
ghichu2,
ghichu3,
ghichu4,
ghichu5,
ghichu6,
ghichu7,
ghichu8,
ghichu9,
ghichu10
) values (
'$recc',
'$manhatky',
'$nams-$thangs-$ngays',
'$hoten',
'$gio[1]',
'$gio[2]',
'$gio[3]',
'$gio[4]',
'$gio[5]',
'$gio[6]',
'$gio[7]',
'$gio[8]',
'$gio[9]',
'$gio[10]',
'$noidungcv[1]',
'$noidungcv[2]',
'$noidungcv[3]',
'$noidungcv[4]',
'$noidungcv[5]',
'$noidungcv[6]',
'$noidungcv[7]',
'$noidungcv[8]',
'$noidungcv[9]',
'$noidungcv[10]',
'$tentbcv[1]',
'$tentbcv[2]',
'$tentbcv[3]',
'$tentbcv[4]',
'$tentbcv[5]',
'$tentbcv[6]',
'$tentbcv[7]',
'$tentbcv[8]',
'$tentbcv[9]',
'$tentbcv[10]',
'$ghichu[1]',
'$ghichu[2]',
'$ghichu[3]',
'$ghichu[4]',
'$ghichu[5]',
'$ghichu[6]',
'$ghichu[7]',
'$ghichu[8]',
'$ghichu[9]',
'$ghichu[10]'
)" ;
mysql_query($insert) or die(mysql_error());
}

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
<h2> <span style=\"color:red;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; NHẬT KÝ ĐÃ ĐƯỢC NHẬP </span> 
</h2>
</td>
</tr>
</table>";
$curday = date("d/m/Y");
$donvi="chuẩn chỉnh máy địa vật lý";
echo"
	<br/>
	<table style=\"margin-left:50px;width:950px;\">
	<tr bgcolor=\"#FFA500\">	
	<td style=\"text-align:center;font-size: 15;width:30%;\">	<b> NGÀY   </b></td>
	<td style=\"text-align:center;font-size: 15;width:45%;\"><b> HỌ VÀ TÊN</b></td>
	</tr>
	<tr>
	<td>
	<input  name=\"ngay\" size=\"20\" type=\"text\" value =\"$ngay\" style=\"width:90%;background:#8adaa5;height:25px;\" />
	<A HREF=\"#\" onClick=\"cal.select(document.forms['example'].ngay,'anchor1','dd/MM/yyyy'); return false;\"
    NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A></td>
	";
	$r2 = mysql_query("SELECT DISTINCT hoten  FROM users where username='$username'");
	while($row = mysql_fetch_array($r2))
	{
		$hoten =$row['hoten'];
	}
	echo"<td><input type=text name=\"hoten\" value =\"$hoten\" style=\"width:100%;background:#8adaa5;height:25px;text-align:center;\"></td>";
	echo"
	
	</tr>
	</table>
	<br/>
		<br/>
		<table class=\"table1\" >
		<tr>
		<th style=\"text-align:center;font-size: 15;width:90px;\"> GIỜ LÀM VIỆC</th>
		<th style=\"text-align:center;font-size: 15;width:300px;\">NỘI DUNG CÔNG VIỆC</th>
		<th style=\"text-align:center;font-size: 15 ;width:170px;\">TÊN THIẾT BỊ/CÔNG VIỆC</th>
		<th style=\"text-align:center;font-size: 15 ;width:80px;\">GHI CHÚ</th>
		</tr>";
$i =1 ;
while($i<=5+$solan){
	
	echo"
		<tr>
		<td><input type=text name=\"gio$i\" value =\"$gio[$i]\" style=\"border-style:none;width:100%;text-align:center;\" readonly></td>
		<td><textarea rows='5' cols='56'  style=\"font_family:Times New Roman;font-size:14;margin-left:1px;\" name=\"noidungcv$i\"/ readonly > $noidungcv[$i]</textarea> </td>
		<td><textarea rows='5' cols='20'  style=\"font_family:Times New Roman;font-size:14;margin-left:1px;\" name=\"tentbcv$i\"/ readonly >$tentbcv[$i]</textarea> </td>
	    <td><textarea rows='5' cols='20'  style=\"font_family:Times New Roman;font-size:14;margin-left:1px;\" name=\"ghichu$i\"/ readonly>$ghichu[$i]</textarea> </td>
		</tr>";
		$i++;		
}
echo " </table></br>";
echo"
<table>

<tr>";
echo"	
	<form action=\"index.php\" method=\"post\">
    <input type=hidden name=username value=$username>
	<input type=hidden name=password value=$password>
  	<input type=hidden name=\"submit\" value=\"Viết nhật ký\">
	<td><input style=\"margin-left:450px;\" type=\"image\" src=\"upload/back.jpg\"  /></td>";
echo"
	</tr>
	</form>
	</table>
	
	</body>
	</html> ";
}
ob_flush();
?>
