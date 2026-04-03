<?php
ob_start();
include ("select_data.php") ;
include ("myfunctions.php") ;


$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
$hosobd = isset($_POST['hosobd']) ? $_POST['hosobd'] : '';
if ($submit=="") {
$width = isset($_GET['width']) ? $_GET['width'] : '';
$height = isset($_GET['height']) ? $_GET['height'] : '';
} else {
$width = isset($_POST['width']) ? $_POST['width'] : '';
$height = isset($_POST['height']) ? $_POST['height'] : '';
}
$browser = get_user_browser();
if ($browser=="ie")  {
	$font_size="80%";
	$wc=$width-345;
	$px="px";
	$wc="$wc$px";
	$mt="môi trường";
	$ws= $width-75;
	$ws="$ws$px";
	$wl="265px";
	$wsl="90%";
}
else 
{
	$font_size="100%";
	$wc=$width-325;
	$px="px";
	$wc="$wc$px";
	$mt="môi trường";
	$ws= $width-55;
	$ws="$ws$px";
	$wl="260px";
	$wsl="";

}
if($width=="") {
	$ws="98%";
	$wc="76.4%";
}
include ("header_index.php") ;
$admin = "
<!DOCTYPE html>
<html lang=\"vi\">
     <head>
          <meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
     </head>
     <body>
          <div id=\"main\">	
               <div id=\"head\">	
	  		<img  src=\"images/logo2.png\" style=\"margin-left:10px\">
	  		<img  src=\"images/logo.png\">
		</div>
		    <div id=\"head-link\">
			<MARQUEE SCROLLDELAY=100 DIRECTION=\"left\" > <span style=\"font-style:bold;color:red;font-size:14px;\">
		 	XÍ NGHIỆP ĐỊA VẬT LÝ GIẾNG KHOAN - PHẦN MỀM TÍCH HỢP ISO-OHSAS-VẬT TƯ TÀI SẢN </span></MARQUEE>
        	    </div>
		<div id=\"left\">
     		<form action=\"index.php\" method=\"post\">
		   <ul class="accordion">
					   <li id="one" class="files">
			   <a href="#one"><img id="mbi_mblightblue_1" src="index_files/cn.jpg" name="chucnang" 
			   border="0" alt="Home" class="imagehome" /></a>
			   </li>
				   <li id="linkkhac" class="other">
			   <a href="#linkkhac"><img id="mbi_mblightblue_9" src="index_files/linkkhac.jpg" name="linkkhac" border="0" alt="Link khác" class="image" /></a>
			   <ul class="sub-menu">
				   <li><img src="lightblue_files/sc.png" ><a class="hvr-fade" href="https://www.google.com" target="_blank">Google</a></li>
				   <li><img src="lightblue_files/sc.png" ><a class="hvr-fade" href="https://www.vietnamnet.vn" target="_blank">Vietnamnet</a></li>
				   <li><img src="lightblue_files/sc.png" ><a class="hvr-fade" href="https://www.github.com" target="_blank">Github</a></li>
			   </ul>
			   </li>
				   <li id="two" class="cloud">
					<a href=\"#two\"> <img id=\"mbi_mblightblue_2\" src=\"index_files/suachua.jpg\" name=\"suachua\" 
					 border=\"0\" alt=\"Sua chua bao duong\" class=\"image\" /></a>
		
        			    <ul class=\"sub-menu\">
					<li><img src=\"lightblue_files/sc.png\" ><a class=\"hvr-fade\"><input type=\"submit\" class=\"submitLink\"  name=\"submit\"
					value =\"Hồ sơ SC/BD\">  </a></li>

					<li><img  src=\"lightblue_files/sc.png\" ><a class=\"hvr-fade\"><input type=\"submit\" class=\"submitLink\"  name=\"submit\"  
					value =\"Thống kê - Báo cáo\">  </a></li>
		
					<li><img src=\"lightblue_files/sc.png\" ><a class=\"hvr-fade\"><input type=\"submit\" class=\"submitLink\"  name=\"submit\" 
					value =\"Danh mục thiết bị\">  </a></li>
					
					
					<li><img src=\"lightblue_files/sc.png\" ><a class=\"hvr-fade\"><input type=\"submit\" class=\"submitLink\"  name=\"submit\" 
					value =\"Bảo dưỡng định kỳ\">  </a></li>
					<li><img src=\"lightblue_files/sc.png\" ><a class=\"hvr-fade\"><input type=\"submit\" class=\"submitLink\"  name=\"submit\" 
					value =\"Ý kiến phản hồi KH\">  </a></li>

        			    </ul>
				</li>

				<li id=\"three\" class=\"mail\">
					<a href=\"#three\"> <img id=\"mbi_mblightblue_5\" src=\"index_files/hieuchuan.jpg\" name=\"hieuchuan\" 
					 border=\"0\" alt=\"Hieu chuan KD\" class=\"image\" /></a>
		
        			    <ul class=\"sub-menu\">
					<ul class=\"sub-menu\">
					<li><img src=\"lightblue_files/sc.png\" ><a class=\"hvr-fade\"><input type=\"submit\" class=\"submitLink\"  name=\"submit\"
					value =\"Danh mục HC/KĐ\">  </a></li>
			
					<li><img src=\"lightblue_files/sc.png\" ><a  class=\"hvr-fade\"><input type=\"submit\" class=\"submitLink\"  name=\"submit\" 
					value =\"Kế hoạch HC/KD\">  </a></li>

					<li><img  src=\"lightblue_files/sc.png\" ><a  class=\"hvr-fade\"><input type=\"submit\" class=\"submitLink\"  name=\"submit\"
					value =\"Thống kê - Báo cáo HC/KD\">  </a></li>
		
					<li><img src=\"lightblue_files/sc.png\" ><a  class=\"hvr-fade\"><input type=\"submit\" class=\"submitLink\"  name=\"submit\"
					value =\"Hồ sơ HC/KD\">  </a></li>

        			    </ul>

        			    </ul>
				</li>
			        <a href=\"tiendocongviec.php?user=$username\" target=\"_blank\"><img id=\"mbi_mblightblue_2\" src=\"index_files/tiendo.jpg\" name=\"tiendo\" 
			        border=\"0\" alt=\"Tien do cong viec\" class=\"image\" style=\"margin-left:5px\"  /></a>


      				<li id=\"four\" class=\"sign\">
					<a href=\"#four\"><img id=\"mbi_mblightblue_3\" src=\"index_files/nhatki.jpg\" name=\"nhatky\" 
					 border=\"0\" alt=\"NHATKY\" class=\"image\" /></a>

        			    <ul class=\"sub-menu\">
	                                <li><img src=\"lightblue_files/sc.png\" ><a  class=\"hvr-fade\"><input type=\"submit\" class=\"submitLink\"  name=\"submit\"
					value =\"Viết nhật ký\">  </a></li>
					<li><img src=\"lightblue_files/sc.png\" ><a  class=\"hvr-fade\"><input type=\"submit\" class=\"submitLink\"  name=\"submit\"
					value =\"Thống kê nhật ký\">  </a></li>
	
                                    </ul>
				    
 
	      

                                	<li id=\"five\" class=\"manage\">
					<a href=\"#five\"><img id=\"mbi_mblightblue_5\" src=\"index_files/sangkien.jpg\" name=\"sangkien\" 
					  border=\"0\" alt=\"Dao Tao\" class=\"image\" /></a>
	 			   <ul class=\"sub-menu\">

				    	<li><img src=\"lightblue_files/sc.png\" ><a class=\"hvr-fade\"><input type=\"submit\" class=\"submitLink\"  name=\"submit\"
					value =\"Các khóa đào tạo\">  </a></li>
			
					<li><img src=\"lightblue_files/sc.png\" ><a class=\"hvr-fade\"><input type=\"submit\" class=\"submitLink\"  name=\"submit\"
					value =\"Thống kê - Báo cáo\">  </a></li>

					<li><img  src=\"lightblue_files/sc.png\" ><a class=\"hvr-fade\"><input type=\"submit\" class=\"submitLink\"  name=\"submit\" 
					value =\"Cập nhật dữ liệu\">  </a></li>
		
					<li><img src=\"lightblue_files/sc.png\" ><a class=\"hvr-fade\"><input type=\"submit\" class=\"submitLink\"  name=\"submit\" 
					value =\"Thông tin cá nhân\">  </a></li>

					<li><img src=\"lightblue_files/sc.png\" ><a class=\"hvr-fade\"><input type=\"submit\" class=\"submitLink\"  name=\"submit\"
					value =\"Matrix đào tạo\">  </a></li>
     				   </ul>
				   </li>
					
				<li id=\"six\" class=\"mail\">
					<a href=\"#six\"> <img id=\"mbi_mblightblue_5\" src=\"index_files/iso.jpg\" name=\"iso\" 
					  border=\"0\" alt=\"ISO\" class=\"image\" /></a>
		
        			    <ul class=\"sub-menu\">
				        <li><img src=\"lightblue_files/sc.png\" ><a class=\"hvr-fade\"><input type=\"submit\" class=\"submitLink\"  name=\"submit\" 
					value =\"Mục tiêu chất lượng\">  </a></li>
			
					<li><img src=\"lightblue_files/sc.png\" ><a class=\"hvr-fade\"><input type=\"submit\" class=\"submitLink\"  name=\"submit\" 
					value =\"Kế hoạch thực hiện\">  </a></li>
			
					<li><img src=\"lightblue_files/sc.png\" ><a class=\"hvr-fade\"><input type=\"submit\" class=\"submitLink\"  name=\"submit\" 
					value =\"Các tài liệu hệ thống \">  </a></li>
					<li><img src=\"lightblue_files/sc.png\" ><a class=\"hvr-fade\"><input type=\"submit\" class=\"submitLink\"  name=\"submit\" 
					value =\"Bảng đánh giá rủi ro $mt\">  </a></li>
					<li><img src=\"lightblue_files/sc.png\" ><a class=\"hvr-fade\"><input type=\"submit\" class=\"submitLink\"  name=\"submit\" 
					value =\"Báo cáo- biên bản\">  </a></li>

					<li><img src=\"lightblue_files/sc.png\" ><a class=\"hvr-fade\"><input type=\"submit\" class=\"submitLink\"  name=\"submit\" 
					value =\"Kết quả đo kiểm tra $mt\">  </a></li>	
        			    </ul>
				</li>
					<li id=\"seven\" class=\"mail\">
					<a href=\"#seven\"> <img id=\"mbi_mblightblue_5\" src=\"index_files/bucxa.jpg\" name=\"atbx\" 
					  border=\"0\" alt=\"ATBX\" class=\"image\" /></a>
		
        			    <ul class=\"sub-menu\">
					
        			    </ul>
				</li>
					<li id=\"eight\" class=\"mail\">
					<a href=\"#eight\"> <img id=\"mbi_mblightblue_5\" src=\"index_files/taisan.jpg\" name=\"taisan\" 
					  border=\"0\" alt=\"Tai San\" class=\"image\" /></a>
		
        			    <ul class=\"sub-menu\">
					<li><img src=\"lightblue_files/sc.png\" ><a class=\"hvr-fade\"><input type=\"submit\" class=\"submitLink\"  name=\"submit\" 
					value =\"Kho linh kiện vật tư\">  </a></li>
        			    </ul>
				    </li>
			       <li id=\"nine\" class=\"mail\">
					<a href=\"#nine\"> <img id=\"mbi_mblightblue_5\" src=\"index_files/congviec.jpg\" name=\"cvk\" 
					 border=\"0\" alt=\"CVK\" class=\"image\" /></a>
		
        			    <ul class=\"sub-menu\">
					

        			    </ul>
				    </li>";
$nhomck="
	<!DOCTYPE html>
<html lang=\"vi\">
     <head>
          <meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
     </head>
     <body>
          <div id=\"main\">	
               <div id=\"head\">	
	  		<img  src=\"images/logo2.png\" style=\"margin-left:10px\">
	  		<img  src=\"images/logo.png\">
		</div>
		    <div id=\"head-link\">
			<MARQUEE SCROLLDELAY=100 DIRECTION=\"left\" > <span style=\"font-style:bold;color:red;font-size:14px;\">
		 	XÍ NGHIỆP ĐỊA VẬT LÝ GIẾNG KHOAN - PHẦN MỀM TÍCH HỢP ISO-OHSAS-VẬT TƯ TÀI SẢN </span></MARQUEE>
        	    </div>
		<div id=\"left\">
     		<form action=\"index.php\" method=\"post\">
		<ul class=\"accordion\">
            	    <li id=\"one\" class=\"files\">
			<a href=\"#one\"><img id=\"mbi_mblightblue_1\" src=\"index_files/cn.jpg\" name=\"chucnang\" 
			border=\"0\" alt=\"Home\" class=\"imagehome\" /></a>
			</li>
        	    	       <li id=\"two\" class=\"cloud\">
					<a href=\"#two\"><img id=\"mbi_mblightblue_3\" src=\"index_files/nhatki.jpg\" name=\"nhatky\" 
					 border=\"0\" alt=\"NHATKY\" class=\"image\" /></a>

        			    <ul class=\"sub-menu\">
	                                <li><img src=\"lightblue_files/sc.png\" ><a  class=\"hvr-fade\"><input type=\"submit\" class=\"submitLink\"  name=\"submit\"
					value =\"Viết nhật ký\">  </a></li>
					<li><img src=\"lightblue_files/sc.png\" ><a  class=\"hvr-fade\"><input type=\"submit\" class=\"submitLink\"  name=\"submit\"
					value =\"Thống kê nhật ký\">  </a></li>
	
                                    </ul>
				</li>
	";
	$doi="
	<!DOCTYPE html>
<html lang=\"vi\">
     <head>
          <meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
     </head>
     <body>
          <div id=\"main\">	
               <div id=\"head\">	
	  		<img  src=\"images/logo2.png\" style=\"margin-left:10px\">
	  		<img  src=\"images/logo.png\">
		</div>
		    <div id=\"head-link\">
			<MARQUEE SCROLLDELAY=100 DIRECTION=\"left\" > <span style=\"font-style:bold;color:red;font-size:14px;\">
		 	XÍ NGHIỆP ĐỊA VẬT LÝ GIẾNG KHOAN - PHẦN MỀM TÍCH HỢP ISO-OHSAS-VẬT TƯ TÀI SẢN </span></MARQUEE>
        	    </div>
		<div id=\"left\">
     		<form action=\"index.php\" method=\"post\">
		<ul class=\"accordion\">
            	    <li id=\"one\" class=\"files\">
			<a href=\"#one\"><img id=\"mbi_mblightblue_1\" src=\"index_files/cn.jpg\" name=\"chucnang\" 
			border=\"0\" alt=\"Home\" class=\"imagehome\" /></a>
			</li>
        	    	       <li id=\"two\" class=\"cloud\">
					<a href=\"#two\"> <img id=\"mbi_mblightblue_2\" src=\"index_files/suachua.jpg\" name=\"suachua\" 
					 border=\"0\" alt=\"Sua chua bao duong\" class=\"image\" /></a>
		
					 <ul class=\"sub-menu\">
					 <li><img src=\"lightblue_files/sc.png\" ><a class=\"hvr-fade\"><input type=\"submit\" class=\"submitLink\"  name=\"submit\" 
					 value =\"Bảo dưỡng định kỳ\">  </a></li>
					 </ul>
				</li>
	";
$adminuser="			       <li id=\"ten\" class=\"mail\">
					<a href=\"#ten\"> <img id=\"mbi_mblightblue_5\" src=\"index_files/user.jpg\" name=\"user\" 
					 border=\"0\" alt=\"USER\" class=\"image\" /></a>
		
        			    <ul class=\"sub-menu\">
					<li><img src=\"lightblue_files/sc.png\" ><a class=\"hvr-fade\"><input type=\"submit\" class=\"submitLink\"  name=\"submit\" 
					value =\"Quản lý users\">  </a></li>
			
        			    </ul>
				</li>";
$qluser="			       <li id=\"ten\" class=\"mail\">
					<a href=\"#ten\"> <img id=\"mbi_mblightblue_5\" src=\"index_files/user.jpg\" name=\"user\" 
					 border=\"0\" alt=\"USER\" class=\"image\" /></a>
		
        			    <ul class=\"sub-menu\">
					<li><img src=\"lightblue_files/sc.png\" ><a class=\"hvr-fade\"><input type=\"submit\" class=\"submitLink\"  name=\"submit\" 
					value =\"Sửa password\">  </a></li>
        			    </ul>
				</li>";

$adminnext="	 		  	<li >
					<input  class=\"imagelout\" type=\"image\"  src=\"index_files/logout.jpg\" name=\"submit\" 
					value =\"logout\" 
					onclick=\"this.form.submit.value = this.value\"/> 
				</li>
</ul>
		<input type=hidden name=username value=$username>
		<input type=hidden name=password value=$password>
		<input type=hidden name=width value=$width>
		<input type=hidden name=height value=$height>
		</form>
</div>
		";

switch ($submit)
{	
case 'login':
{	
// Check if a person has filled every form.
if(empty($_POST['username']) || empty($_POST['password'])) {
// Display the error message.

	include ("formdn.php") ;
	echo "<center><span style=\"color: red; font-weight:bold\">Tên đăng nhập hoặc mật khẩu  không đúng</span></center>";
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
include ("formdn.php") ;
echo "<center><span style=\"color: red; font-weight:bold\">Tên đăng nhập hoặc mật khẩu  không đúng</span></center>";
} else {
	// Now create an object from the data you've retrieved.
$result = mysql_query("SELECT password FROM users WHERE username='$username' ") ;

	$row = mysql_fetch_object($result);
// For example now the password is checked if they're equal.
if($row->password != $password) {
	include ("formdn.php") ;
	echo "<center><span style=\"color: red; font-weight:bold\">Tên đăng nhập hoặc mật khẩu  không đúng</span></center>";
} else {
	$r2 = mysql_query("SELECT madv,phanquyen FROM users WHERE username='$username' ") ;
        while($row = mysql_fetch_array($r2))
		{
			$madv =$row['madv'];
			$phanquyen =$row['phanquyen'];
		}
	if ($madv=="XDT") {
		
	if ($phanquyen=='3') echo $nhomck;
	else echo $admin ;	
	//if (($username=="doicnc")||($username=="doith")||($username=="doiktkt")) echo $doi;
	//else echo $admin ;
	if ($username=="admin") echo $adminuser;
	else echo $qluser;
	echo $adminnext;
		echo "
		<div id=\"content\">
		<div id=\"content-head\">
		<img src=\"lightblue_files/home.png\" > <span>  Hệ thống  </span>
		<script type=\"text/javascript\" src=\"button_files/mbjsmbbutton.js\"></script>
		</div>
		";
		if ($browser=="ie")
		echo "
		      <p></p></br>	
		      <p></p></br>	
		      <p></p></br>	
		      <center>
			<span style=\"color: brown; font-weight:bold\">Phần mềm hoạt động tốt trên Firefox  
			hoặc Chrome download Firefox  <a href=\"https://www.mozilla.org/en-US/firefox/new/\" target=\"_blank\">tại đây</a> hoặc Chrome <a href=\"https://www.google.com/chrome/browser/desktop/\"  target=\"_blank\">tại đây</a></span>
			</center>
		      <p></p></br>	
		      <p></p></br>	
		      <p></p></br>	
		      <p></p></br>	
		      <p></p></br>	
		      <p></p></br>	
		      <p></p></br>	
		      <p></p></br>	
		      <p></p></br>	
		      <p></p></br>	
		      <p></p></br>	
		      <p></p></br>	
		      <p></p></br>	
		      <p></p></br>	
		      <p></p></br>	
		      <p></p></br>	
		      <p></p></br>	
		      <p></p></br>	
		      <p></p></br>	
		      <p></p></br>	
		      <p></p></br>	
		      <p></p></br>	
		      <p></p></br>	
		      <p></p></br>	
		      <p></p></br>	
		      <p></p></br>	
			";
		else 
		echo "
		      <p></p></br>	
		      <p></p></br>	
		      <p></p></br>	
		      <center>
			<span style=\"color: brown; font-weight:bold\">Phần mềm hoạt động tốt trên Firefox  
			hoặc Chrome download Firefox  <a href=\"https://www.mozilla.org/en-US/firefox/new/\"  target=\"_blank\">tại đây</a> hoặc Chrome <a href=\"https://www.google.com/chrome/browser/desktop/\" target=\"_blank\">tại đây</a></span>
			</center>";
		echo "
		</div>	
                </div>
	        </body>
		</html>";
	}else { 
		echo "<center><span style=\"color: red; font-weight:bold\">Tài khoản của bạn không có quyền đăng nhập vào chương trình này</span></center>";
		exit;
	}	}	
	}
break ;
} 

case 'logout':
{
	// Close DataBase
	mysql_close($link);
	//session_destroy();
	include ("formdn.php");
	exit ;
} 
case 'huongdan':
{
	include ("huongdan.htm");
}
/*
case "Tiến độ công việc":
	{

		echo $admin ;
		if ($username=="admin") echo $adminuser;
		else echo $qluser;
		echo $adminnext;
		
		echo"
		<div id=\"content\">
		<div id=\"content-head\">
		<img src=\"lightblue_files/home.png\" > <span>  Hồ sơ sửa chữa bảo dưỡng   </span>
		<script type=\"text/javascript\" src=\"button_files/mbjsmbbutton.js\"></script>
                </div>
                <center>
		<div id=\"content-main\">
                <form target=\"_blank\" action=\"Tiendocv.php\" method=\"post\" enctype=\"multipart/form-data\" name=\"example\">
		<br/>
		<br/>
		<br/>
                <table align=\"center\">
                <tr><td>Chọn danh mục &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
		<td>
		<select name=\"tiendocv\">
	
		<option value=\"listthang\"> Danh sách thiết bị Sửa chữa - Bảo dưỡng </option>
	
		</select>	    
		</td>
		</tr>
		<tr><td></td></tr>
		<tr>
		<td></td>
		<td>
		<input type=hidden name=username value=$username>
		<input type=hidden name=password value=$password>
		<input type=hidden name=suachua value=Hososuachuabaoduong>
		<input type=hidden name=submit value=\"Hồ sơ SC/BD\">
		<input type=\"image\" name=\"submit\" value =\"Hồ sơ SC/BD\" src=\"upload/next.jpg\" alt=\"nhap\" />
		 </td>
		</tr>	
		</table>	
		</form>
		</center>
		</div>
		</div>
		</body>
		</html>";
	
break;
	}
 */ 
case "Danh mục thiết bị":
	{
		echo $admin ;
	if ($username=="admin") echo $adminuser;
	else echo $qluser;
	echo $adminnext;
	echo"
		<div id=\"content\">
		<div id=\"content-head\">
		<img src=\"lightblue_files/home.png\" > <span>  Danh mục thiết bị  </span>
		<script type=\"text/javascript\" src=\"button_files/mbjsmbbutton.js\"></script>
		</div>
		<center>
		<div id=\"content-main\">
		<form target=\"_blank\" action=\"Danhmucsc.php\" method=\"post\" enctype=\"multipart/form-data\" name=\"example\">
		<br/>
		<br/>
		<br/>
		<table align=\"center\">
                <tr>
		<td> Chọn danh mục  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>
		<select name=\"thietbi\">
		<option value=\"nhapthietbi\"> Nhập danh mục thiết bị   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
		<option value=\"nhapthietbido\"> Nhập danh mục thiết bị hỗ trợ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
		</select>
                </td>
		</tr>
		<tr><td></td></tr>
		<tr>
		<td> </td>
		<td><input type=hidden name=suachua value=danhmucthietbi>
		<input type=hidden name=username value=$username>
		<input type=hidden name=password value=$password>
		<input type=hidden name=submit value=OK>
		<input type=\"image\" name=\"submit\" value =\"OK\" src=\"upload/tieptuc.jpg\" alt=\"tieptuc\" /> </center> </td>
		</tr>
		</table>
		</form>
		</center>
		</div>
		</div>";

break;
	}	
	case "Viết nhật ký":
	{
		$r2 = mysql_query("SELECT madv,phanquyen FROM users WHERE username='$username' ") ;
        while($row = mysql_fetch_array($r2))
		{
			$madv =$row['madv'];
			$phanquyen =$row['phanquyen'];
		}
	if ($phanquyen=='3') echo $nhomck;
	else echo $admin ;	
	if ($username=="admin") echo $adminuser;
	else echo $qluser;
	echo $adminnext;
		echo"
		<div id=\"content\">
		<div id=\"content-head\">
		<img src=\"lightblue_files/home.png\" > <span>  Hồ sơ sửa chữa bảo dưỡng   </span>
		<script type=\"text/javascript\" src=\"button_files/mbjsmbbutton.js\"></script>
                </div>
                <center>
		<div id=\"content-main\">
                <form  action=\"formnhatky.php\" method=\"post\" enctype=\"multipart/form-data\" name=\"example\">
		<br/>
		<br/>
		<br/>
                <table align=\"center\">
                <tr><td>Chọn danh mục &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
		<td>
		<select name=\"hoso\">
		<option value=\"nhatky\"> Viết nhật ký  </option>
		<option value=\"suanhatky\"> Sửa nhật ký  </option>
		</select>	    
		</td>
		</tr>
		<tr><td></td></tr>
		<tr>
		<td></td>
		<td>
		<input type=hidden name=username value=$username>
		<input type=hidden name=password value=$password>
		<input type=hidden name=phanquyen value=$phanquyen>
		<input type=hidden name=width value=$width>
		<input type=hidden name=height value=$height>
		<input type=hidden name=submit value=\"nhapdulieu\">
		<input type=\"image\" name=\"submit\" value =\"nhapdulieu\" src=\"upload/next.jpg\" alt=\"nhap\" />
		 </td>
		</tr>	
		</table>	
		</form>
		</center>
		</div>
		</div>
		</body>
		</html>";
break;
}	
case "Sửa nhật ký":
	{
		$r2 = mysql_query("SELECT madv,phanquyen FROM users WHERE username='$username' ") ;
        while($row = mysql_fetch_array($r2))
		{
			$madv =$row['madv'];
			$phanquyen =$row['phanquyen'];
		}
	if ($phanquyen=='3') echo $nhomck;
	else echo $admin ;	
	if ($username=="admin") echo $adminuser;
	else echo $qluser;
	echo $adminnext;
		echo"
		<div id=\"content\">
		<div id=\"content-head\">
		<img src=\"lightblue_files/home.png\" > <span>  Hồ sơ sửa chữa bảo dưỡng   </span>
		<script type=\"text/javascript\" src=\"button_files/mbjsmbbutton.js\"></script>
                </div>
                <center>
		<div id=\"content-main\">
                <form  action=\"formnhatky.php\" method=\"post\" enctype=\"multipart/form-data\" name=\"example\">
		<br/>
		<br/>
		<br/>
                <table align=\"center\">
                <tr><td>Chọn danh mục &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
		<td>
		<select name=\"hoso\">
		<option value=\"nhatky\"> Viết nhật ký  </option>
		<option value=\"suanhatky\"> Sửa nhật ký  </option>
		
		</select>	    
		</td>
		</tr>
		<tr><td></td></tr>
		<tr>
		<td></td>
		<td>
		<input type=hidden name=username value=$username>
		<input type=hidden name=password value=$password>
		<input type=hidden name=width value=$width>
		<input type=hidden name=height value=$height>
		<input type=hidden name=submit value=\"nhapdulieu\">
		<input type=\"image\" name=\"submit\" value =\"nhapdulieu\" src=\"upload/next.jpg\" alt=\"nhap\" />
		 </td>
		</tr>	
		</table>	
		</form>
		</center>
		</div>
		</div>
		</body>
		</html>";
break;
}	
case "Thống kê nhật ký":
	{
		$r2 = mysql_query("SELECT madv,phanquyen FROM users WHERE username='$username' ") ;
        while($row = mysql_fetch_array($r2))
		{
			$madv =$row['madv'];
			$phanquyen =$row['phanquyen'];
		}
	if ($phanquyen=='3') echo $nhomck;
	else echo $admin ;	
	if ($username=="admin") echo $adminuser;
	else echo $qluser;
	echo $adminnext;
		echo"
		<div id=\"content\">
		<div id=\"content-head\">
		<img src=\"lightblue_files/home.png\" > <span>  Hồ sơ sửa chữa bảo dưỡng   </span>
		<script type=\"text/javascript\" src=\"button_files/mbjsmbbutton.js\"></script>
                </div>
                <center>
		<div id=\"content-main\">
                <form target=\"_blank\" action=\"thongkenhatky.php\" method=\"post\" enctype=\"multipart/form-data\" name=\"example\">
		<br/>
		<br/>
		<br/>
                <table align=\"center\">
                <tr><td>Chọn danh mục &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
		<td>
		<select name=\"thongkenhatky\">
		<option value=\"nhatky\"> Thống kê nhật ký  </option>
		</select>	    
		</td>
		</tr>
		<tr><td></td></tr>
		<tr>
		<td></td>
		<td>
		<input type=hidden name=username value=$username>
		<input type=hidden name=password value=$password>
		<input type=hidden name=width value=$width>
		<input type=hidden name=height value=$height>
		<input type=hidden name=submit value=\"nhapdulieu\">
		<input type=\"image\" name=\"submit\" value =\"nhapdulieu\" src=\"upload/next.jpg\" alt=\"nhap\" />
		 </td>
		</tr>	
		</table>	
		</form>
		</center>
		</div>
		</div>
		</body>
		</html>";
break;
}	
case "Hồ sơ SC/BD":
	{
		echo $admin ;
	if ($username=="admin") echo $adminuser;
	else echo $qluser;
	echo $adminnext;
		echo"
		<div id=\"content\">
		<div id=\"content-head\">
		<img src=\"lightblue_files/home.png\" > <span>  Hồ sơ sửa chữa bảo dưỡng   </span>
		<script type=\"text/javascript\" src=\"button_files/mbjsmbbutton.js\"></script>
                </div>
                <center>
		<div id=\"content-main\">
                <form action=\"formsc.php\" method=\"post\" enctype=\"multipart/form-data\" name=\"example\">
		<br/>
		<br/>
		<br/>
                <table align=\"center\">
                <tr><td>Chọn danh mục &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
		<td>
		<select name=\"hoso\">
		<option value=\"phieuscbd\"> Nhập phiếu yêu cầu dịch vụ  </option>
		<option value=\"phieusuachua\"> Nhập phiếu thực hiện công việc</option>
		<option value=\"bienbanscbd\"> Xuất biên bản bàn giao </option>
		</select>	    
		</td>
		</tr>
		<tr><td></td></tr>
		<tr>
		<td></td>
		<td>
		<input type=hidden name=username value=$username>
		<input type=hidden name=password value=$password>
		<input type=hidden name=width value=$width>
		<input type=hidden name=height value=$height>
		<input type=hidden name=suachua value=Hososuachuabaoduong>
		<input type=hidden name=submit value=\"nhapdulieu\">
		<input type=\"image\" name=\"submit\" value =\"nhapdulieu\" src=\"upload/next.jpg\" alt=\"nhap\" />
		 </td>
		</tr>	
		</table>	
		</form>
		</center>
		</div>
		</div>
		</body>
		</html>";
break;
}	
case "Bảo dưỡng định kỳ":
{
        $flagdoi=0;
	if (($username=="doicnc")||($username=="doith")||($username=="doiktkt")) {echo $doi;$flagdoi=1;}
	else echo $admin ;
	if ($username=="admin") echo $adminuser;
	else echo $qluser;
	echo $adminnext;
	echo"
		<div id=\"content\">
		<div id=\"content-head\">
		<img src=\"lightblue_files/home.png\" > <span>  Bảo dưỡng định kỳ   </span>
		<script type=\"text/javascript\" src=\"button_files/mbjsmbbutton.js\"></script>
                </div>
                <center>
		<div id=\"content-main\">";
                if ($username=="doicnc") 
			echo"<form  action=\"thongkebaoduong_doi_cnc.php\" method=\"post\" enctype=\"multipart/form-data\" name=\"example\">";
		elseif($username=="doith")
			echo"<form  action=\"thongkebaoduong_doi_th.php\" method=\"post\" enctype=\"multipart/form-data\" name=\"example\">";
		elseif($username=="doiktkt")
			echo"<form  action=\"thongkebaoduong_doi_ktkt.php\" method=\"post\" enctype=\"multipart/form-data\" name=\"example\">";
		else
			echo"<form target=\"_blank\" action=\"baoduongxuong.php\" method=\"post\" enctype=\"multipart/form-data\" name=\"example\">";
		echo"<br/>
		<br/>
		<br/>
                <table align=\"center\">
                <tr><td>Chọn danh mục &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
		<td>
		<select name=\"baoduong\">";
                if(!$flagdoi)
		echo"<option value=\"baoduongxuong\" >Bảo dưỡng định kỳ cho Xưởng</option>
		<option value=\"baoduongdoi\" >Bảo dưỡng định kỳ cho đội</option>
		<option value=\"thietbidau\">Bảo dưỡng các thiết bị có sử dụng dầu</option>
		";
		else
		echo"
		<option value=\"baoduongdoi\" >Bảo dưỡng định kỳ cho đội</option>
		";
		echo"</select>	    
		</td>
		</tr>
		<tr><td></td></tr>
		<tr>
		<td></td>
		<td>
		<input type=hidden name=username value=$username>
		<input type=hidden name=password value=$password>
		<input type=hidden name=suachua value=Hososuachuabaoduong>
		<input type=hidden name=submit value=\"Hồ sơ SC/BD\">
		<input type=\"image\" name=\"submit\" value =\"Hồ sơ SC/BD\" src=\"upload/next.jpg\" alt=\"nhap\" />
		 </td>
		</tr>	
		</table>	
		</form>
		</center>
		</div>
		</div>
		</body>
		</html>";
	break;

}

case "Thống kê - Báo cáo":
	{

	echo $admin ;
	if ($username=="admin") {
		echo $adminuser;
	}
	else echo $qluser;
	echo $adminnext;
		echo"
		<div id=\"content\">
		<div id=\"content-head\">
		<img src=\"lightblue_files/home.png\" > <span>  Hồ sơ sửa chữa bảo dưỡng   </span>
		<script type=\"text/javascript\" src=\"button_files/mbjsmbbutton.js\"></script>
                </div>
                <center>
		<div id=\"content-main\">
                <form target=\"_blank\" action=\"baocaothongke.php\" method=\"post\" enctype=\"multipart/form-data\" name=\"example\">
		<br/>
		<br/>
		<br/>
                <table align=\"center\">
                <tr><td>Chọn danh mục &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
		<td>
		<select name=\"baocao\">
		<option value=\"baocaothongke\" > Liệt kê công tác bảo dưỡng Sửa chữa </option>
		<option value=\"tkhonghoc\" >Thống kê hỏng hóc</option>
		<option value=\"tkscbd\">Thống kê sửa chữa bảo dưỡng theo phần trăm</option>
		<option value=\"lkvattu\" >Thống kê linh kiện vật tư</option>
		
		";
	echo"	</select>	    
		</td>
		</tr>
		<tr><td></td></tr>
		<tr>
		<td></td>
		<td>
		<input type=hidden name=username value=$username>
		<input type=hidden name=password value=$password>
		<input type=hidden name=suachua value=Hososuachuabaoduong>
		<input type=hidden name=submit value=\"Hồ sơ SC/BD\">
		<input type=\"image\" name=\"submit\" value =\"Thống kê - Báo cáo\" src=\"upload/next.jpg\" alt=\"nhap\" />
		 </td>
		</tr>	
		</table>	
		</form>
		</center>
		</div>
		</div>
		</body>
		</html>";
	break;
}	
case "Sửa password":
	{

	if (($username=="doicnc")||($username=="doith")||($username=="doiktkt")) echo $doi;
	else echo $admin ;
	if ($username=="admin") echo $adminuser;
	else echo $qluser;
	echo $adminnext;
		echo"
		<div id=\"content\">
		<div id=\"content-head\">
		<img src=\"lightblue_files/home.png\" > <span>  Hồ sơ sửa chữa bảo dưỡng   </span>
		<script type=\"text/javascript\" src=\"button_files/mbjsmbbutton.js\"></script>
                </div>
                <center>
		<div id=\"content-main\">
                <form  action=\"updatepass.php\" method=\"post\" enctype=\"multipart/form-data\" name=\"example\">
		<br/>
		<br/>
		<br/>
                <table align=\"center\">
                <tr>	
	<td align=\"right\"> <label for=\"username\">Tên hiển thị: </label></td>
	<td align=\"right\"><input type=\"text\" name=\"username\" id=\"username\" style=\"width:150px\"></td>
	</tr>
	<tr>
	<td align=\"right\"><label for=\"password\">Mật khẩu: </label></td>
	<td align=\"right\"><input type=\"password\" name=\"password\" id=\"password\" style=\"width:150px\"></td>
	</tr>
	<tr>
	<td align=\"right\"><label for=\"password1\">Mật khẩu mới: </label></td>
	<td align=\"right\"><input type=\"password\" name=\"password1\" id=\"password1\" style=\"width:150px\"></td>
	</tr>
	<tr>
	<td align=\"right\"><label for=\"password2\">Xác nhận mật khẩu mới: </label></td>
	<td align=\"right\"><input type=\"password\" name=\"password2\" id=\"password2\" style=\"width:150px\"></td>
	</tr>
	<tr>
		<tr><td></td></tr>
		<tr>
		<td></td>
		<td>
		<input type=\"image\" name=\"submit\" value =\"submit\" src=\"upload/next.jpg\" alt=\"nhap\" />
		 </td>
		</tr>	
		</table>	
		</form>
		</center>
		</div>
		</div>
		</body>
		</html>";
	break;
}	
case "Quản lý users":
	{
	echo $admin ;
	if ($username=="admin") echo $adminuser;
	else echo $qluser;
	echo $adminnext;
		echo"
		<div id=\"content\">
		<div id=\"content-head\">
		<img src=\"lightblue_files/home.png\" > <span>  Hồ sơ sửa chữa bảo dưỡng   </span>
		<script type=\"text/javascript\" src=\"button_files/mbjsmbbutton.js\"></script>
                </div>
                <center>
		<div id=\"content-main\">
                <form target=\"_blank\" action=\"quanlyuser.php\" method=\"post\" enctype=\"multipart/form-data\" name=\"example\">
		<br/>
		<br/>
		<br/>
                <table align=\"center\">
                <tr><td>Chọn danh mục &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
		<td>
		<select name=\"quanlyuser\">
		<option value=\"quanlyuser\" >Quản lý users</option>
		<option value=\"lichsudn\" >Lịch sử đăng nhập</option>
		</select>	    
		</td>
		</tr>
		<tr><td></td></tr>
		<tr>
		<td></td>
		<td>
		<input type=hidden name=username value=$username>
		<input type=hidden name=password value=$password>
		<input type=\"image\" name=\"submit\" value =\"Quản lý users\" src=\"upload/next.jpg\" alt=\"nhap\" />
		</td>
		</tr>	
		</table>	
		</form>
		</center>
		</div>
		</div>
		</body>
		</html>";
	break;

	}
case "Danh mục HC/KĐ":
	{

	echo $admin ;
	if ($username=="admin") echo $adminuser;
	else echo $qluser;
	echo $adminnext;
	echo"
		<div id=\"content\">
		<div id=\"content-head\">
		<img src=\"lightblue_files/home.png\" > <span>  Danh mục thiết bị  </span>
		<script type=\"text/javascript\" src=\"button_files/mbjsmbbutton.js\"></script>
		</div>
		<center>
		<div id=\"content-main\">
		<form target=\"_blank\" action=\"danhmucHCKD.php\" method=\"post\" enctype=\"multipart/form-data\" name=\"example\">
		<br/>
		<br/>
		<br/>
		<table align=\"center\">
                <tr>
		<td> Chọn danh mục  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>
		<select name=\"thietbi\">
		<option value=\"nhapthietbi\">Nhập Danh mục thiết bị HC/KĐ</option>
		</select>
                </td>
		</tr>
		<tr><td></td></tr>
		<tr>
		<td> </td>
		<td>
		<input type=hidden name=username value=$username>
		<input type=hidden name=password value=$password>
		<input type=hidden name=submit value=OK>
		<input type=\"image\" name=\"submit\" value =\"OK\" src=\"upload/tieptuc.jpg\" alt=\"tieptuc\" /> </center> </td>
		</tr>
		</table>
		</form>
		</center>
		</div>
		</div>";	
	break;
}	

case "Kế hoạch HC/KD":
	{

	echo $admin ;
	if ($username=="admin") echo $adminuser;
	else echo $qluser;
	echo $adminnext;
	echo"
		<div id=\"content\">
		<div id=\"content-head\">
		<img src=\"lightblue_files/home.png\" > <span>  Kế hoạch hiệu chuẩn/kiểm định  </span>
		<script type=\"text/javascript\" src=\"button_files/mbjsmbbutton.js\"></script>
		</div>
		<center>
		<div id=\"content-main\">
		<form target=\"_blank\" action=\"KehoachKD.php\" method=\"post\" enctype=\"multipart/form-data\" name=\"example\">
		<br/>
		<br/>
		<br/>
		<table align=\"center\">
                <tr>
		<td> Chọn danh mục  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>
		<select name=\"kehoach\">
		<option value=\"lapkehoach\">Lập kế hoạch hiệu chuẩn/kiểm định </option>
	        <option value=\"copykehoach\">Copy kế hoạch hiệu chuẩn/kiểm định </option>
		</select>
                </td>
		</tr>
		<tr><td></td></tr>
		<tr>
		<td> </td>
		<td>
		<input type=hidden name=username value=$username>
		<input type=hidden name=password value=$password>
		<input type=hidden name=submit value=OK>
		<input type=\"image\" name=\"submit\" value =\"OK\" src=\"upload/tieptuc.jpg\" alt=\"tieptuc\" /> </center> </td>
		</tr>
		</table>
		</form>
		</center>
		</div>
		</div>";
	break;
}

case "Hồ sơ HC/KD":
	{

		echo $admin ;
		if ($username=="admin") echo $adminuser;
		else echo $qluser;
		echo $adminnext;
		echo"
		<div id=\"content\">
		<div id=\"content-head\">
		<img src=\"lightblue_files/home.png\" > <span>  Hồ sơ HC/KD  </span>
		<script type=\"text/javascript\" src=\"button_files/mbjsmbbutton.js\"></script>
		</div>
		<center>
		<div id=\"content-main\">
		<form target=\"_blank\" action=\"bangcanhbao.php\" method=\"post\" enctype=\"multipart/form-data\" name=\"example\">
		<br/>
		<br/>
		<br/>
		<table align=\"center\">
                <tr>
		<td> Chọn danh mục  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>
		<select name='hosohc'>
		<option value=\"canhbao\">Bảng cảnh báo hiệu chuẩn/kiểm định </option>
	    	<option value=\"hoso\">Nhập Hồ sơ hiệu chuẩn/kiểm định </option>
		<option value=\"phieuyeucau\">Xuất phiếu yêu cầu gửi bộ phận/XNKT/GĐMN </option>
		</select>
		</select>
                </td>
		</tr>
		<tr><td></td></tr>
		<tr>
		<td> </td>
		<td>
		<input type=hidden name=username value=$username>
		<input type=hidden name=password value=$password>
		<input type=hidden name=submit value=OK>
		<input type=\"image\" name=\"submit\" value =\"OK\" src=\"upload/tieptuc.jpg\" alt=\"tieptuc\" /> </center> </td>
		</tr>
		</table>
		</form>
		</center>
		</div>
		</div>";
		
	break;
}

case "Thống kê - Báo cáo HC/KD":
	{

	echo $admin ;
		if ($username=="admin") echo $adminuser;
		else echo $qluser;
		echo $adminnext;
		echo"
		<div id=\"content\">
		<div id=\"content-head\">
		<img src=\"lightblue_files/home.png\" > <span>  Thống kê - Báo cáo HC/KD  </span>
		<script type=\"text/javascript\" src=\"button_files/mbjsmbbutton.js\"></script>
		</div>
		<center>
		<div id=\"content-main\">
		<form target=\"_blank\" action=\"baocaohckd.php\" method=\"post\" enctype=\"multipart/form-data\" name=\"example\">
		<br/>
		<br/>
		<br/>
		<table align=\"center\">
                <tr>
		<td> Chọn danh mục  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>
		<select name='baocao'>
		<option value=\"kehoach\">Kế hoạch hiệu chuẩn/kiểm định thiết bị </option>
	    	<option value=\"lietke\">Liệt kê hiệu chuẩn/kiểm định thiết bị</option>
	    	<option value=\"thongkehckd\">Thống kê số liệu</option>
		</select>
		</select>
                </td>
		</tr>
		<tr><td></td></tr>
		<tr>
		<td> </td>
		<td>
		<input type=hidden name=username value=$username>
		<input type=hidden name=password value=$password>
		<input type=hidden name=submit value=OK>
		<input type=\"image\" name=\"submit\" value =\"OK\" src=\"upload/tieptuc.jpg\" alt=\"tieptuc\" /> </center> </td>
		</tr>
		</table>
		</form>
		</center>
		</div>
		</div>";
		
break;
	}
case "Kho linh kiện vật tư":
	{
echo $admin ;
		if ($username=="admin") echo $adminuser;
		else echo $qluser;
		echo $adminnext;
		echo"
		<div id=\"content\">
		<div id=\"content-head\">
		<img src=\"lightblue_files/home.png\" > <span>  Quản lý vật tư - thiết bị  </span>
		<script type=\"text/javascript\" src=\"button_files/mbjsmbbutton.js\"></script>
		</div>
		<center>
		<div id=\"content-main\">
		<form target=\"_blank\" action=\"danhmuclk.php\" method=\"post\" enctype=\"multipart/form-data\" name=\"example\">
		<br/>
		<br/>
		<br/>
		<table align=\"center\">
                <tr>
		<td> Chọn danh mục  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>
		<select>
	
		<option value=\"\"> Kho linh kiện vật tư </option>
	
		</select>	
                </td>
		</tr>
		<tr><td></td></tr>
		<tr>
		<td> </td>
		<td>
		<input type=hidden name=username value=$username>
		<input type=hidden name=password value=$password>
		<input type=hidden name=submit value=OK>
		<input type=\"image\" name=\"submit\" value =\"Kho linh kiện vật tư\" src=\"upload/tieptuc.jpg\" alt=\"tieptuc\" /> </center> </td>
		</tr>
		</table>
		</form>
		</center>
		</div>
		</div>";
	break;
}	

case "Nhập xuất linh kiện":
	{
echo $admin ;
		if ($username=="admin") echo $adminuser;
		else echo $qluser;
		echo $adminnext;
		echo"
		<div id=\"content\">
		<div id=\"content-head\">
		<img src=\"lightblue_files/home.png\" > <span>  Quản lý vật tư - thiết bị  </span>
		<script type=\"text/javascript\" src=\"button_files/mbjsmbbutton.js\"></script>
		</div>
		<center>
		<div id=\"content-main\">
		<form target=\"_blank\" action=\"formlinhkien.php\" method=\"post\" enctype=\"multipart/form-data\" name=\"example\">
		<br/>
		<br/>
		<br/>
		<table align=\"center\">
                <tr>
		<td> Chọn danh mục  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>
		<select name='vattu'>
	
		<option value=\"xuatlinhkien\"> Nhập xuất linh kiện vật tư </option>
	
		</select>
                </td>
		</tr>
		<tr><td></td></tr>
		<tr>
		<td> </td>
		<td>
		<input type=hidden name=username value=$username>
		<input type=hidden name=password value=$password>
		<input type=hidden name=submit value=OK>
		<input type=\"image\" name=\"submit\" value =\"Nhập xuất linh kiện\" src=\"upload/tieptuc.jpg\" alt=\"tieptuc\" /> </center> </td>
		</tr>
		</table>
		</form>
		</center>
		</div>
		</div>";
	break;
}	

case "Thống kê báo cáo - vt":
	{
echo $admin ;
		if ($username=="admin") echo $adminuser;
		else echo $qluser;
		echo $adminnext;
		echo"
		<div id=\"content\">
		<div id=\"content-head\">
		<img src=\"lightblue_files/home.png\" > <span>  Quản lý vật tư - thiết bị  </span>
		<script type=\"text/javascript\" src=\"button_files/mbjsmbbutton.js\"></script>
		</div>
		<center>
		<div id=\"content-main\">
		<form target=\"_blank\" action=\"baocaolinhkien.php\" method=\"post\" enctype=\"multipart/form-data\" name=\"example\">
		<br/>
		<br/>
		<br/>
		<table align=\"center\">
                <tr>
		<td> Chọn danh mục  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>
		<td>
		<select name='vattu'>
	
		<option value=\"lichsu\"> Thống kê báo cáo linh kiện vật tư </option>
	
		</select>
                </td>
		</tr>
		<tr><td></td></tr>
		<tr>
		<td> </td>
		<td>
		<input type=hidden name=username value=$username>
		<input type=hidden name=password value=$password>
		<input type=hidden name=submit value=OK>
		<input type=\"image\" name=\"submit\" value =\"OK\" src=\"upload/tieptuc.jpg\" alt=\"tieptuc\" /> </center> </td>
		</tr>
		</table>
		</form>
		</center>
		</div>
		</div>";
	break;
}	
default:
	include ("formdn.php") ;
// End Switch
}	
ob_flush();
?>
