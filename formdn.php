<?php
echo "
<html lang=\"vi\">
	<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
</head>
	<body width =\"100%\">
		<center>
<h2><img  src=\"images/logo2.png\" style=\"margin-left:10px\">
	  		<img  src=\"images/logo.png\"></h2><hr/><br/>
			<form action=\"index.php\" method=\"post\">
				<table style=\"border: solid 1px #257fd7;\"  width=\"350\" height=\"170\">
        <tr>
		<td align=\"center\"><span style=\"font-weight: bold;\"><span style=\"color: rgb(102, 0, 204);\">Đăng nhập hệ thống</span></span></td>
	</tr>		
	<tr>	
	<td>				
	<table >
		<tr>	
			<td valign=\"top\"><img src=\"upload/key.jpg\" width=\"40\" height=\"40\" border=\"0\" alt=\"key\" /></td>
			<td ><label for=\"username\">Tên hiển thị: </label></td>
			<td ><input type=\"text\" name=\"username\" id=\"username\" style=\"width:150px\"></td>
		</tr>
		<tr>
                        <td></td>  
			<td ><label for=\"password\">Mật khẩu: </label></td>
			<td ><input type=\"password\" name=\"password\" id=\"password\" style=\"width:150px\"></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<input type=\"hidden\" name=\"width\" value=\"$width\" />
			<input type=\"hidden\" name=\"height\" value=\"$height\" />
			<input type=\"hidden\" name=\"submit\" value=\"\" />
			<td><input type=\"image\" name=\"submit\" value =\"login\" src=\"upload/dangnhap.gif\" alt=\"loggin\" onclick=\"this.form.submit.value = this.value\"/></td>
                        
		</tr>	
	</table>
</td>
</tr>
</table>
</center>
	
</form>
</body>
</html> ";
?>
