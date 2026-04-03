<?php
// Connet to Database
include ("select_data.php") ;
include ("myfunctions.php") ;
echo "
	<html lang=\"vi\">
	<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
</head>
	<body >";
// Declare Variables
$username =           $_POST['username'];
$password =       	$_POST['password'];
$password1 =       	$_POST['password1'];
$password2 =       	$_POST['password2'];
// Prepare for sorting by name
// Check if a person has filled every form.
if((empty($_POST['username']) || empty($_POST['password'])) || (empty($_POST['password1']) || empty($_POST['password2']))) {
// Display the error message.

echo "<p style=\"text-align:center;color:blue;\">CÓ LỖI XẢI RA, CHƯA NHẬP ĐẦY ĐỦ CÁC THÔNG TIN, VUI LÒNG NHẬP LẠI<br/>";
exit;
}

$result = mysql_query("SELECT username FROM users ") ;
	while($row = mysql_fetch_array($result))
	{
		if ( $username == ""  . $row['username'] . "" ) {
			$check = "1" ;
			break;
		} else 
			$check = "0" ;
		 
	}
if ( $check =="0" ) 
{	
echo "Tên cần sửa không đúng";
} else {
	// Now create an object from the data you've retrieved.
$result = mysql_query("SELECT password FROM users WHERE username='$username' ") ;

	$row = mysql_fetch_object($result);
// For example now the password is checked if they're equal.
if($row->password != $password) {
echo "I am sorry, but the passwords are not equal.";
exit;
} else {
	if($password1 != $password2) {	
	echo "Mật khẩu xác nhận không đúng" ;
        exit;
	} else {
       	
	$update = "update users SET username='$username',password='$password1'  WHERE username='$username'" ;
        mysql_query($update) or die(mysql_error());	
	echo "
		<center>Đổi password thành công";
	echo "<form action=\"index.php\" method=\"post\">
         <input type=hidden name=username value=$username>
	 <input type=hidden name=password value=$password>
	 <input type=hidden name=\"submit\" value=\"Hồ sơ SC/BD\">
	 </br>
 	 <input type=\"image\" src=\"upload/back.jpg\"  />
         </form> </center>";
        }	
        }	
        }	
?>


