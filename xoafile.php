<?php
include ("select_data.php") ;
$sohoso = isset($_GET['s']) ? $_GET['s'] : '';
$file = isset($_GET['f']) ? $_GET['f'] : '';
echo"<html>
	<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
	</head>	
	<body>	";
if($sohoso != "") 
{
	echo " <span font-color:red>Có chắc chắn xóa File : $file</span>";
	echo "
	<form action=\"xoafile.php\" method=\"post\">
	<center>
	<input type=\"submit\" name=\"submit\" value=\"CÓ\">
	<input type=\"hidden\" name=\"s\" value=\"$sohoso\" >
	<input type=\"hidden\" name=\"f\" value=\"$file\" >
	<input type=\"submit\" name=\"submit\" value=\"KHÔNG\">
	</form>
	</center> 
	</body>
	</html> " ;
	exit;
}
if($_POST['submit'] == "CÓ") 
{	
$sohoso = isset($_POST['s']) ? $_POST['s'] : '';
$file = isset($_POST['f']) ? $_POST['f'] : '';
// Delete DATA
$search = " DELETE FROM bangsolieu_iso WHERE sohoso = '$sohoso' and link = '$file'" ;
$result = mysql_query("$search") or die(mysql_error());
$path="./hoso/$sohoso/$file";
if (file_exists("$path"))
{
    unlink("$path");
}

echo " Đã xóa File:$file" ;
}
if($_POST['submit'] == "KHÔNG") {
echo " KHÔNG xóa File:$file" ;
}
echo "</body>
	</html> " ;
?> 
