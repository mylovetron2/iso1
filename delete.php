<?php
include ("select_data.php") ;
include ("header_index.php") ;
$danhso =  $_POST['danhso'] ;
$hoten =  $_POST['hoten'] ;
$month1 =  $_POST['month'] ;
$year1 =  $_POST['year'] ;
$username =  $_POST['username'] ;
$password =  $_POST['password'] ;
if($_POST['submit'] == "Xóa dữ liệu") 
{
	$result2 = mysql_query("SELECT  hoten FROM resume where danhso='$danhso'") ;
		while($row = mysql_fetch_array($result2))
		{
		$hoten =$row['hoten'];
		}	
	echo " <span font-color:red>Có chắc chắn xóa Bảng chấm công của CBCNV:	$hoten tháng 	$month1 năm 	$year1 </span>";
	echo "
	<html>
	<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
	</head>	
	<body>	
	<form action=\"delete.php\" method=\"post\">
	<center>
	<input type=hidden name=month value=$month1>
	<input type=hidden name=year value=$year1>
	<input type=hidden name=username value=$username>
	<input type=hidden name=password value=$password>
	<input type=\"submit\" name=\"submit\" value=\"CÓ\">
	<input type=\"hidden\" name=\"danhso\" value=\"$danhso\" >
	<input type=\"hidden\" name=\"hoten\" value=\"$hoten\" >
	<input type=\"submit\" name=\"submit\" value=\"KHÔNG\">
	</form>
	</center> 
	</body>
	</html> " ;
	exit;
}
if($_POST['submit'] == "CÓ") 
{	
$result2 = mysql_query("SELECT month,year FROM chamcong where danhso='$danhso'") ;
		while($row = mysql_fetch_array($result2))
		{
			$checkmonth=$row["month"];
			$checkyear=$row["year"];
if (($month1==$checkmonth)&&($year1==$checkyear)){
// Delete DATA
$search = " DELETE FROM chamcong WHERE danhso = '$danhso' and month = '$month1' and year = '$year1'" ;
$result = mysql_query("$search") or die(mysql_error());

echo " Đã xóa Bảng chấm công của CBCNV:$hoten tháng $month1 năm $year1" ;
echo "
	<html>
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
} else { 
	echo " DỮ LIỆU CẦN XÓA KHÔNG ĐÚNG " ;
echo "
	<html>
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

}
}
}
if($_POST['submit'] == "KHÔNG") {
echo "
	<html>
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
}
?> 
