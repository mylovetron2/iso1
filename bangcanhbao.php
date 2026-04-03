<?php
include ("select_data.php") ;
include ("myfunctions.php") ;
ob_start();
$n=0;
$m="";
//$con=mysqli_connect("localhost",$usernamehost,$passwordhost,$databasename);
$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$nhapdl = isset($_POST['nhapdl']) ? $_POST['nhapdl'] : '';
$print = isset($_POST['print']) ? $_POST['print'] : '';
$phieuyc = isset($_POST['phieuyc']) ? $_POST['phieuyc'] : '';
$phieukt = isset($_POST['phieukt']) ? $_POST['phieukt'] : '';
$phieumn = isset($_POST['phieumn']) ? $_POST['phieumn'] : '';


if(isset($_GET['username'])){
$_SESSION['username'] = $_GET['username'];
//$username=$_GET['username'];

}
if(isset($_GET['password'])){
$_SESSION['password'] = $_GET['password'];
//$password=$_GET['password'];
}

if(isset($_GET['hosohc'])){
$hosohc = $_GET['hosohc'];
}else{
$hosohc = isset($_POST['hosohc']) ? $_POST['hosohc'] : '';
}

if(isset($_GET['tenthietbi'])){
$tenthietbi = $_GET['tenthietbi'];
}else{
$tenthietbi="";
}
if(isset($_GET['namkh'])){
$namkh = $_GET['namkh'];
}else{
$namkh="";
}
if(isset($_GET['tenthietbi'])){
$tenthietbi = $_GET['tenthietbi'];
}else{
$tenthietbi = isset($_POST['tenthietbi']) ? $_POST['tenthietbi'] : '';
}

if(isset($_GET['search'])){
$search = $_GET['search'];
}else{
$search = isset($_POST['search']) ? $_POST['search'] : '';
}

if(isset($_GET['find'])){
$find = $_GET['find'];
}else{
$find = isset($_POST['find']) ? $_POST['find'] : '';
}

if(isset($_GET['them'])){
$them = $_GET['them'];
}else{
$them = isset($_POST['them']) ? $_POST['them'] : '';
}

if(isset($_GET['del'])){
$del = $_GET['del'];
}else{
$del = isset($_POST['del']) ? $_POST['del'] : '';
}

?><head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">
<!--
.table1
{
border-collapse:collapse;
width:100%;
border:1px solid #CCCCCC;
}
.table1 td
{
border:1px solid #CCCCCC;
text-align:left;
height: 50px;
}
.table1 th 
{
border:1px solid black;
font-weight: bold;
height:50px;
background-color:#87CEEB;
}

.table2 th 
{
border:none;
font-weight: bold;
height:50px;
background-color:#87CEEB;
}

.table2
{
border-collapse:collapse;
width:100%;
}
.table2 td
{
border:none;
text-align:left;
height: 30px;
}


.table3
{
border-collapse:collapse;
width:694;
border:1px solid black;
}

.table3 td
{
border:1px solid black;
text-align:left;

}

body,td,th {
	font-family: Times New Roman, Times, serif;
}
.datetime {
font-size: 14px;
width:450px;
height:30px;
border:1px solid black;
background-clip: padding-box;
padding-left:8px; 
}
#searchid
{
    width:300px;
    border:solid 1px #000;
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

.up_text{ text-transform: uppercase;}
.style2 {font-size: 18px; font-weight: bold; color: #FFFFFF; }
.select_box{
border: 1px solid black;
width:450px;
height:30px;
font-size:14px;
padding-left:5px;

}
.p{
height:10px;
}
.CSSTableGenerator{width:100%;box-shadow:10px 10px 5px #888;border:1px solid #000;-moz-border-radius-bottomleft:0;-webkit-border-bottom-left-radius:0;border-bottom-left-radius:0;-moz-border-radius-bottomright:0;-webkit-border-bottom-right-radius:0;border-bottom-right-radius:0;-moz-border-radius-topright:0;-webkit-border-top-right-radius:0;border-top-right-radius:0;-moz-border-radius-topleft:0;-webkit-border-top-left-radius:0;border-top-left-radius:0;margin:0;padding:0}
.CSSTableGenerator table{width:100%;height:50px;margin:0;padding:0}
.CSSTableGenerator tr:last-child td:last-child{-moz-border-radius-bottomright:0;-webkit-border-bottom-right-radius:0;border-bottom-right-radius:0;border-width:0}
.CSSTableGenerator table tr:first-child td:first-child{-moz-border-radius-topleft:0;-webkit-border-top-left-radius:0;border-top-left-radius:0}
.CSSTableGenerator table tr:first-child td:last-child{-moz-border-radius-topright:0;-webkit-border-top-right-radius:0;border-top-right-radius:0}
.CSSTableGenerator tr:last-child td:first-child{-moz-border-radius-bottomleft:0;-webkit-border-bottom-left-radius:0;border-bottom-left-radius:0}

.CSSTableGenerator td{vertical-align:middle;border:1px solid #000;text-align:left;font-size:16px;font-family:"Times New Roman", Times, serif;font-weight:400;color:#000;border-width:0 1px 1px 0;padding:7px}
.CSSTableGenerator tr:last-child td{border-width:0 1px 0 0}
.CSSTableGenerator tr:first-child td{filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#005fbf",endColorstr="#003f7f");background:0;background-color:#005fbf;border:0 solid #000;text-align:center;font-size:16px;font-family:"Times New Roman", Times, serif;font-weight:700;color:#fff;border-width:0 0 1px 1px}
.CSSTableGenerator tr:first-child:hover td{filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#005fbf",endColorstr="#003f7f");background:0;background-color:#005fbf}
.CSSTableGenerator tr:first-child td:last-child{border-width:0 0 1px 1px}
.CSSTableGenerator tr td:last-child,.CSSTableGenerator tr:first-child td:first-child{border-width:0 0 1px}
.style13 {font-size: 16px}
.style16 {font-size: 16; color: #FFFFFF; }
</style>
</head>


<link rel="stylesheet" type="text/css" href="select2.css">
<link rel="stylesheet" type="text/css" href="demo.css">
<script src="jquery-1.8.0.min.js"></script>
<script src="select2.js"></script>
<script src="myselect.js"></script>

<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script src="date.js"></script>

<script type="text/javascript">
    function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
		var backButton = document.getElementById("back");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
		backButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        //Set the print button to 'visible' again 
        //[Delete this line if you want it to stay hidden after printing]
        printButton.style.visibility = 'visible';
		backButton.style.visibility = 'visible';
    }
</script>
<script type="text/javascript">
function check_checkbox(isChecked) {
	if(isChecked) {
		$('input[name="chkstt[]"]').each(function() { 
			this.checked = true; 
		});
	} else {
		$('input[name="chkstt[]"]').each(function() {
			this.checked = false;
		});
	}
}

$('#tbl').find('input:checkbox[id$="chkDelete"]').click(function() {
    var isChecked = $(this).prop("checked");
    var $selectedRow = $(this).parent("td").parent("tr");

    if (isChecked) $selectedRow.css({
        "background-color": "#D4FFAA",
        "color": "GhostWhite"
    });
    else $selectedRow.css({
        "background-color": '',
        "color": "black"
    });
});
</script>
<body>
<?php if($hosohc=="canhbao"){

if(isset($_GET['month'])){
$m = $_GET['month'];
}else{
$m=(int)date('m');
}
 

$y=date('Y');
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
?>
<form method="post" action="bangcanhbao.php" enctype="multipart/form-data">
<div align="center"><strong><font size="+1">BẢNG THÔNG BÁO HIỆU CHUẨN KIỂM ĐỊNH </br>THÁNG <?php echo $m; ?> NĂM <?php echo $y; ?></font></strong></div>

<p> Chọn tháng <select name='month'>
<option value='<?php echo $m;?>'> Tháng <?php echo $m;?> </option>
<option value='1'> Tháng 1 </option>
<option value='2'> Tháng 2 </option>
<option value='3'> Tháng 3 </option>
<option value='4'> Tháng 4 </option>
<option value='5'> Tháng 5 </option>
<option value='6'> Tháng 6 </option>
<option value='7'> Tháng 7 </option>
<option value='8'> Tháng 8 </option>
<option value='9'> Tháng 9 </option>
<option value='10'> Tháng 10 </option>
<option value='11'> Tháng 11 </option>
<option value='12'> Tháng 12 </option>
</select>
<input type=submit name='find' value='Tìm kiếm'>

</p>

<?php 

$delete1="DELETE FROM kehoach_temp";
mysql_query($delete1) or die(mysql_error());

$r1=mysql_query("select count(*)as sum from kehoach_iso where thang='$m' and namkh='$y'");
while($row=mysql_fetch_array($r1)){
	$rows=$row['sum'];
}
$row_per_page=10; //Số dòng trên 1 trang
//tính số dòng cần hiển thị
//$rows=mysql_num_rows($tin);
//tính số trang cần để hiển thị
if ($rows>$row_per_page) $page=ceil($rows/$row_per_page); 
else $page=1; //nếu số dòng trong CSDL nhỏ hơn hoặc bằng số dòng trên 1 trang thì chỉ có 1 trang để hiển thị

if(isset($_GET['start']) && (int)$_GET['start'])
     $start=$_GET['start']; //dòng bắt đầu từ nơi ta muốn lấy
else $start=0;

$insert="insert into kehoach_temp(tenthietbi,mahieu,somay,hangsx,noithuchien,thang,namkh,loaitb,ghichu) select tenthietbi,mahieu,somay,hangsx,noithuchien,thang,namkh,loaitb,ghichu from kehoach_iso where thang='$m' and namkh='$y' order by noithuchien asc,loaitb asc"; 
mysql_query($insert) or die(mysql_error());

$sql=mysql_query("select * from kehoach_temp limit $start,$row_per_page"); //bắt đầu lấy dữ liệu (^)_(^)


?>
 <br/> <?php $stt=$start+1; ?>
   <div class="CSSTableGenerator">
  <table  border="0" cellpadding="0" cellspacing="0" class="table1">
    <tr bgcolor="#FF9900">
      <td width="60" height="82" bgcolor="#0000FF"><div align="center" class="style2">STT </div></td>
	  <td width="159" nowrap="nowrap" bgcolor="#0000FF"><div align="center" class="style2">SỐ HỒ SƠ</div></td>
      <td width="159" nowrap="nowrap" bgcolor="#0000FF"><div align="center" class="style2">TÊN MÁY</div></td>
      <td width="139" bgcolor="#0000FF"> <div align="center" class="style2">SỐ MÁY </div></td>
      <td width="101" bgcolor="#0000FF"><div align="center" class="style2">CÔNG VIỆC</div></td>
	   <td width="136" bgcolor="#0000FF"><div align="center" class="style2">NTH </div></td>
      <td width="152" bgcolor="#0000FF"><div align="center" class="style2">NHÂN VIÊN </div></td>
      <td width="147" bgcolor="#0000FF"><div align="center" class="style2">NƠI THỰC HIỆN </div></td>
      <td width="127" bgcolor="#0000FF"><div align="center" class="style2">CHỦ SỞ HỮU </div></td>
     
    </tr>
<?php while($row=mysql_fetch_array($sql)){
			$tenthietbi[$stt] =$row['tenthietbi'];
			$tenmay[$stt] =$row['mahieu'];
			$somay[$stt] =$row['somay'];
			$noithuchien[$stt] =$row['noithuchien'];
			
			
			$r19=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$tenmay[$stt]'");
			while($row=mysql_fetch_array($r19)){
					$tenviettat[$stt]=$row['tenviettat'];
					$bophansh[$stt] =$row['bophansh'];
					$chusohuu[$stt] =$row['chusohuu'];
			}
			$sohs[$stt]="";
			$congviec[$stt]="";
			$ngayth[$stt]="";
			$nhanvien[$stt]="";
			$ttkt[$stt]="";
			$r20=mysql_query("SELECT DISTINCT * FROM hosohckd_iso WHERE tenmay='$tenmay[$stt]' and namkh='$y'");
			while($row=mysql_fetch_array($r20)){
					$sohs[$stt]=$row['sohs'];
					$congviec[$stt]=$row['congviec'];
					$ngayth[$stt]=$row['ngayhc'];
					$nhanvien[$stt]=$row['nhanvien'];
					$ttkt[$stt] =$row['ttkt'];	
					
			}
			if($ngayth[$stt]==""){
					$bkground="#FFFFFF";
			}else{
				if($ttkt[$stt]=="Tốt"){
					$bkground="#A0FFFF";
				}elseif($ttkt[$stt]=="Hỏng"){
					$bkground="#FFA0A0";
				}
			}
			
	 ?>  
 <tr bgcolor="<?php echo $bkground; ?>">
      <td height="49" style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo $stt; ?></div></td>
       <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php if($ttkt[$stt]=="Tốt"){echo $sohs[$stt];} ?></div></td>
	  <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center">
	 
	   <a href="bangcanhbao.php?hosohc=hoso&&tenthietbi=<?php echo $tenmay[$stt]; ?>&&nam=<?php echo $y;?>&&thang=<?php echo $m;?>&&ngayhc=<?php echo $ngayth[$stt];?>&&noithuchien=<?php echo $noithuchien[$stt];?>&&username=<?php echo $username; ?>&&password=<?php echo $password;?>"><?php echo $tenviettat[$stt]; ?></a>
	  
</div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo $somay[$stt]; ?></div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php  echo $congviec[$stt]; ?></div></td>
	   <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php if($ttkt[$stt]=="Tốt"){echo date("d-m-Y", strtotime($ngayth[$stt]));} ?></div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php if($ttkt[$stt]=="Tốt"){echo mb_convert_case($nhanvien[$stt], MB_CASE_TITLE, "UTF-8"); } ?></div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo $noithuchien[$stt]; ?></div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php if($bophansh[$stt]!="XDT"){echo $bophansh[$stt];}else{echo $chusohuu[$stt];} ?><?php if($ttkt[$stt]=="Hỏng"){ echo "(".$ttkt[$stt].")";   }?></div></td>
	 
    </tr>
   <?php 
   $stt++;} ?>

   
</table>
 </div>
<div class="footer" style="border:1px solid #666666;background:#CCCCCC">
<?php
//b?t d?u phân trang

$page_cr=($start/$row_per_page)+1;

for($i=1;$i<=$page;$i++)
{
 if ($page_cr!=$i) echo "<a href='bangcanhbao.php?start=".$row_per_page*($i-1)."&&username=$username&&password=$password&&month=$m&&hosohc=canhbao'>$i&nbsp;</a>";
 else echo $i." ";
}
?>
</div>


<?php //bang table1 ?>

</form>
<?php }?>

<?php if($hosohc=="hoso"){

if(isset($_GET['username'])){
$username = $_GET['username'];
}else{
$username = isset($_POST['username']) ? $_POST['username'] : '';
}

if(isset($_GET['password'])){
$password = $_GET['password'];
}else{
$password = isset($_POST['password']) ? $_POST['password'] : '';
}


if(isset($_GET['nam'])){
$y = $_GET['nam'];
}
if(isset($_GET['ngayhc'])){
$ngayhc = $_GET['ngayhc'];
}

if(isset($_GET['noithuchien'])){
$noithuchien = $_GET['noithuchien'];
}else{
$noithuchien = "XNĐVLGK";
}

if(isset($_GET['thang'])){
$m = $_GET['thang'];
}


$r2=mysql_query("SELECT * FROM thietbihckd_iso WHERE mavattu='$tenthietbi'");
while($row = mysql_fetch_array($r2))
{
	$loaitb=$row['loaitb'];
}

?>

<?php 
/*if($noithuchien=="MN"||$noithuchien=="XNKT") { 

$r15=mysql_query("SELECT DISTINCT *,date_format(`ngayhc`,'%d/%m/%Y') as ngayhc FROM hosohckd_iso WHERE tenmay='$tenthietbi'");
while($row = mysql_fetch_array($r15))
{
	$sohs =$row['sohs'];
	$congviec =$row['congviec'];
	$ngayth =$row['ngayhc'];
	$nhanvien =$row['nhanvien'];
	$ttkt =$row['ttkt'];
}

<form method="post" action="bangcanhbao.php" enctype="multipart/form-data">
<div align="center"><strong><font size="+2">NHẬP THÔNG TIN HIỆU CHUẨN/KIỂM ĐỊNH<br/></font></strong>
<br/>
<table border="0" align="center">
<tr>
 <td width="300" bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF"> SỐ HỒ SƠ </td>
<td><input type="text" name="sohoso"  class="select_box" value="<?php if(isset($sohs)){ echo $sohs; }?>"></td>
</tr>
<tr>
<td bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF"> TÊN MÁY </td>
<td> <select name="tenthietbi" style="width:450px;height:30px;"  id="tenthietbi" >
	<option value="<?php echo $tenthietbi; ?>"><?php echo $tenthietbi; ?></option>
	<?php $r1=mysql_query("SELECT DISTINCT tenthietbi FROM thietbihckd_iso ");
		while($row = mysql_fetch_array($r1))
		{
			$tentb=$row['tenthietbi']; ?>
	
	<optgroup style="display:table-row;" label="<?php echo $tentb; ?>">
	 <?php $r4=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE tenthietbi='$tentb'");
		while($row = mysql_fetch_array($r4))
		{
			$mavt =$row['mavattu'];
			$tenvt =$row['tenviettat'];
			$sm=$row['somay'];
			?>
			<option value="<?php echo $mavt; ?>"> <?php echo $tenvt;?>  <?php echo $sm;?> </option>
		<?php }}?> 
		</optgroup>
		</select></td>
</tr>
<tr>
<td bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF"> CÔNG VIỆC </td>
<td><input type="text" name="congviec" class="select_box" value="<?php if(isset($congviec)){ echo $congviec; }?>"></td>
</tr>
<tr>
<td bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF"> NGÀY THỰC HIỆN </td>
<td><input name="ngayth" type="date" id="ngayth"  value="<?php if(isset($ngayth)){ echo $ngayth;}?>" class="datetime"></td>
</tr>
<tr>
<td bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF"> NHÂN VIÊN </td>
<td><select name="nhanvien" id="nhanvien" class="select_box" /> 
	   <option value="<?php echo $nhanvien; ?>"><?php if(isset($nhanvien)){ echo mb_convert_case($nhanvien, MB_CASE_TITLE, "UTF-8");}?></option>  
	     <?php $r5=mysql_query("SELECT DISTINCT * FROM resume WHERE donvi LIKE '%Xưởng sửa chữa và chuẩn chỉnh%' ");
		while($row = mysql_fetch_array($r5))
		{
			$hoten =$row['hoten'];
			$chucdanh = $row['chucdanh'];
			$hoten = mb_convert_case($hoten, MB_CASE_LOWER, "UTF-8");
			$hoten1 = mb_convert_case($hoten, MB_CASE_TITLE, "UTF-8");
			?>
          <option value="<?php echo $hoten; ?>"><?php echo $hoten1;  ?></option>
          <?php } ?>
      </select>      
	     
        </td>
</tr>
<tr>
<td bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF"> TÌNH TRẠNG KỸ THUẬT </td>
<td><select name="ttkt" class="select_box">
<option value="<?php if(isset($ttkt)){ echo $ttkt; }?>"> <?php if(isset($ttkt)){ echo $ttkt; }?></option>
<?php if($ttkt=="Tốt"){ ?>
<option value="Hỏng"> Hỏng </option>
<?php }elseif($ttkt=="Hỏng"){?>
<option value="Tốt"> Tốt</option>
<?php }elseif($ttkt==""){ ?>
<option value="Tốt"> Tốt</option>
<option value="Hỏng"> Hỏng </option>
<?php } ?>
</select></td>
</tr>

</table>
<br/>
<input type=hidden name=username value="<?php echo $username; ?>">
<input type=hidden name=password value="<?php echo $password;?>">
 <center><input type="image" name="nhapdl" src="upload/nhapdl1.jpg" value ="Nhập dữ liệu"alt="Xem" onClick="this.form.nhapdl.value = this.value"/>
	<input type=hidden name=nhapdl value=""></center>
	<input type=hidden name=noithuchien value="<?php echo $noithuchien; ?>">
	</form>
 */
?>
<?php 
//}elseif($noithuchien=="XNĐVLGK"){
 

$y=date('y');
if ($m=="")
	$m=date('m');
if ($namkh=="")
	$Y=date('Y');
else
	$Y=$namkh;

	$danchuan ="";
	$mauchuan ="";
	$dinhky ="";
	$dotxuat =""; 
	$nhanvien ="";
 if($tenthietbi!=""){
 $r10=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$tenthietbi'");
 while($row = mysql_fetch_array($r10))
 {
	$type =$row['tenviettat'];
	$somay =$row['somay'];
	$hangsx =$row['hangsx'];
	$chusohuu =$row['chusohuu'];
	$bophansh =$row['bophansh'];
 }
 $r12=mysql_query("SELECT DISTINCT *,date_format(`ngayhc`,'%Y-%m-%d') as ngayhc,date_format(`ngayhctt`,'%Y-%m-%d') as ngayhctt FROM hosohckd_iso WHERE tenmay='$tenthietbi' and ngayhc='$ngayhc'");
 while($row = mysql_fetch_array($r12))
 {
	$sohoso =$row['sohs'];
	$ngayhc =$row['ngayhc'];
	$ngayhctt =$row['ngayhctt'];
	$nhanvien =$row['nhanvien'];
	$noithuchien =$row['noithuchien'];
	//$chusohuu =$row['chusohuu'];
	$thietbidc[1] =$row['thietbidc1'];
	$thietbidc[2] =$row['thietbidc2'];
	$thietbidc[3] =$row['thietbidc3'];
	$thietbidc[4] =$row['thietbidc4'];
	$thietbidc[5] =$row['thietbidc5'];
	$ttkt =$row['ttkt'];
	$danchuan =$row['danchuan'];
	$mauchuan =$row['mauchuan'];
	$dinhky =$row['dinhky'];
	$dotxuat =$row['dotxuat'];
 }
 }else{
 	$type="";
 	$somay="";
 	$hangsx="";
	$chusohuu="";
	$bophansh="";
 }
 
/* $r11=mysql_query("SELECT DISTINCT * FROM hosohckd_iso WHERE  ngayhc between '$Y-$m-01' and '$Y-$m-31'");
 while($row = mysql_fetch_array($r11))
 {
		$sohs =$row['sohs'];
 }
 */ 
  
 if(!isset($sohoso)){
	if($m>=1&&$m<=9){
 		$sohs1="$y-T0$m-01";
	}else{
		$sohs1="$y-T$m-01";
	}
 }else{
 		if(isset($sohoso)){
 			$sohs1=$sohoso;
		}else{
		for($i=0;$i<=strlen($sohs);$i++) {
			$p = stripos($sohs,"-") ; 	
		if ($i== 1) {
			$thangs = trim (substr($sohs,0,$p)) ;
		} 	
		if ($i== 2) {
			$ngays = trim ($sohs,$p) ;
			$ngays = rtrim ($ngays," ") ;
		} 	
			$p++ ;
			$stt = substr($sohs,$p);
			$stt++;
		}
		$sohs1="$thangs-$stt";
		}
		
 }



 ?>
<div align="center"><strong><font size="+2">CHỨNG NHẬN HIỆU CHUẨN<br/></font></strong>

</div>
<br/>
<form method="post" action="bangcanhbao.php" enctype="multipart/form-data">
<table width="800" align="center">
<tr>
 <td  bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF">Số hồ sơ</em></td>
  <td height="30"><input type="text" name="sohoso" size="50" class="select_box" style="font-size:14px;padding-left:10px;" value="<?php if($tenthietbi!=""){echo $sohs1;} ?>"></td>
  </tr>
<tr>
 <td width="400" bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF">  Phương tiện đo / <em>Instrument</em>  </td>
  <td height="30">	 <select name="tenthietbi" style="width:450px;height:30px;font-size:14px;"  id="tenthietbi"  onChange="this.form.submit()">
	<option value="<?php echo $tenthietbi; ?>"><?php echo $tenthietbi; ?></option>
	<?php $r1=mysql_query("SELECT DISTINCT tenthietbi FROM thietbihckd_iso ");
		while($row = mysql_fetch_array($r1))
		{
			$tentb=$row['tenthietbi']; ?>
	
	<optgroup style="display:table-row;" label="<?php echo $tentb; ?>">
	 <?php $r4=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE tenthietbi='$tentb'");
		while($row = mysql_fetch_array($r4))
		{
			$mavt =$row['mavattu'];
			$tenvt =$row['tenviettat'];
			$sm=$row['somay'];
			?>
			<option value="<?php echo $mavt; ?>"> <?php echo $tenvt;?>  <?php echo $sm;?> </option>
		<?php }}?> 
		</optgroup>
		</select>
	  </td>
	</tr>
<tr>
 <td width="300" bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF"> Nước / Hãng sản xuất /<em> Manufacture</em>  </td>
  <td height="30"><input type="text" name="hangsx" style="width:450px;height:30px;border:1px solid black;font-size:14px;padding-left:10px;" value="<?php echo $hangsx; ?>"> </td>
 </tr>
 <tr>
 <td  bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF"> Kiểu / <em>Type</em>   </td>
  <td height="30"><input type="text" name="type" style="width:450px;height:30px;border:1px solid black;font-size:14px;padding-left:10px;" value="<?php echo $type; ?>"> </td>
</tr>
<tr>
 <td  bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF"> Số/ Serial<em> №</em>  </td>
  <td height="30"><input type="text" name="somay" style="width:450px;height:30px;border:1px solid black;font-size:14px;padding-left:10px;" value="<?php echo $somay; ?>"> </td>
</tr>
 <tr>
 <td  bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF"> Chủ phương tiện / <em>Client</em> </td>
   <td height="30"><input type="text" name="chusohuu" style="width:450px;height:30px;border:1px solid black;font-size:14px;padding-left:10px;"  value="<?php echo $bophansh; ?>"> </td>
</tr>
 <tr>
 <td  bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF"> Phương pháp chuẩn / <em>Method of calibration </em></td>
 <td height="30" style="border:1px solid black;padding-left:10px;"> <?php if($danchuan=="on"){?> <input type="checkbox" name="danchuan" checked> <?php }else{ ?><input type="checkbox" name="danchuan"> <?php } ?> <font size="+0">Dẫn chuẩn  <?php if($mauchuan=="on"){?> <input type="checkbox" name="mauchuan" checked> <?php }else{ ?><input type="checkbox" name="mauchuan"> <?php } ?> Chuẩn qua mẫu chuẩn 
   <p> <?php if($dinhky=="on"){?> <input type="checkbox" name="dinhky" checked> <?php }else{ ?><input type="checkbox" name="dinhky"> <?php } ?> Định kỳ  <?php if($dotxuat=="on"){?> <input type="checkbox" name="dotxuat" checked> <?php }else{ ?><input type="checkbox" name="dotxuat"> <?php } ?> Đột xuất  </p></font></td>
</tr>
 <tr>
 <td  bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"> <font color="#FFFFFF">Thiết bị dẫn chuẩn, mẫu chuẩn /<em> Means of calibration</em></font>
 </td>
  <td height="30">
  <?php for($i=1;$i<=5;$i++){ ?>
<select name="thietbidanchuan<?php echo $i; ?>" style="width:450px;height:30px;border:1px solid black;padding-left:5px;">
<?php if($thietbidc[$i]!=""){ ?>
<option value="<?php echo $thietbidc[$i];?>"><?php echo $thietbidc[$i];?> </option>
<?php } ?>
<option value=""> </option>
<?php $r2=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE loaitb=1 and danchuan=1");
		while($row = mysql_fetch_array($r2))
		{
			$mavattu=$row['mavattu'];
			$tenvietat=$row['tenviettat'];
			$sm=$row['somay']; ?>
			
			<option value="<?php echo $mavattu; ?>"><?php echo $tenvietat; ?>-<?php echo $sm; ?> </option>
		<?php }?>

</select><br/>
<?php } ?>
 </td>
</tr>

   <tr>
 <td  bgcolor="#005fbf" style="padding-left:10px;"> <span class="style13"> <font color="#FFFFFF">Ngày hiệu chuẩn / <em>Date of calibration</em></font></td>
  <td height="30"><input type="date" name="ngayth"  class="datetime" value="<?php  if(isset($ngayhc)){ echo $ngayhc;} ?>"></td>
  </tr>
   <tr>
 <td  bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF"> Ngày hiệu chuẩn tiếp theo / <em>Recalibration date</td>
   <td height="30"><input type="date" name="ngaythtt" class="datetime" value="<?php if(isset($ngayhctt)){ echo $ngayhctt; }?>"> </td>
   </tr>
      <tr>
 <td  bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF"> Nơi hiệu chuẩn / <em>Place of calibration</em></td>
  <td height="30"><select name="noithuchien" style="width:450px;height:30px;border:1px solid black;padding-left:5px;">
<option value="<?php echo $noithuchien; ?>"><?php echo $noithuchien; ?></option>
<option value="XSCCMDVL">XSCTBĐVL   </option>
<option value="MN">MN </option>
<option value="XNKT">XNKT</option>
</select> </td>
  </tr>
       <tr>
 <td  bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF">Người hiệu chuẩn / <em>Operator in charge</em> </td>
  <td height="30"><select name="nhanvien" id="nhanvien" class="select_box" /> 
	   <option value="<?php echo $nhanvien; ?>"><?php echo $nhanvien; ?></option>  
	     <?php $r5=mysql_query("SELECT DISTINCT * FROM resume WHERE donvi LIKE '%Xưởng sửa chữa và chuẩn chỉnh%' and nghiviec !='yes'");
		while($row = mysql_fetch_array($r5))
		{
			$hoten =$row['hoten'];
			$chucdanh = $row['chucdanh'];
			$hoten = mb_convert_case($hoten, MB_CASE_LOWER, "UTF-8");
			$hoten1 = mb_convert_case($hoten, MB_CASE_TITLE, "UTF-8");
			?>
          <option value="<?php echo $hoten; ?>"><?php echo $hoten1; ?></option>
          <?php } ?>
      </select>    
	     
     </td>
  </tr>
  <tr>
<td bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF"> Tình Trạng Kỹ Thuật </td>
<td><select name="ttkt" class="select_box">
<option value="<?php if(isset($ttkt)){ echo $ttkt; }?>"> <?php if(isset($ttkt)){ echo $ttkt; }?></option>
<?php if($ttkt=="Tốt"){ ?>
<option value="Hỏng"> Hỏng </option>
<?php }elseif($ttkt=="Hỏng"){?>
<option value="Tốt"> Tốt</option>
<?php }elseif($ttkt==""){ ?>
<option value="Tốt"> Tốt</option>
<option value="Hỏng"> Hỏng </option>
<?php } ?>></td>
</tr>
</table><br>
 <center>
<input type=hidden name=username value="<?php echo $username; ?>">
<input type=hidden name=password value="<?php echo $password;?>">
 <input type="image" name="nhapdl" src="upload/nhapdl1.jpg" value ="Nhập dữ liệu"alt="Xem" onClick="this.form.nhapdl.value = this.value"/>
	<input type=hidden name=nhapdl value=""></center>
</form>


 <?php //} ?>
<?php } ?>
<?php if($hosohc=="hosokt"){ ?>

<form method="post" action="bangcanhbao.php" enctype="multipart/form-data">
<div align="center"><strong><font size="+2">NHẬP THÔNG TIN HIỆU CHUẨN/KIỂM ĐỊNH<br/></font></strong>
<br/>
<table border="0" align="center">
<tr>
 <td width="300" bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF"> SỐ HỒ SƠ </td>
<td><input type="text" name="sohoso"  class="select_box"></td>
</tr>
<tr>
<td bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF"> TÊN MÁY </td>
<td> <select name="tenthietbi" style="width:450px;height:30px;"  id="tenthietbi" >
	<option value=""></option>
	<?php $r1=mysql_query("SELECT DISTINCT tenthietbi FROM thietbihckd_iso ");
		while($row = mysql_fetch_array($r1))
		{
			$tentb=$row['tenthietbi']; ?>
	
	<optgroup style="display:table-row;" label="<?php echo $tentb; ?>">
	 <?php $r4=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE tenthietbi='$tentb'");
		while($row = mysql_fetch_array($r4))
		{
			$mavt =$row['mavattu'];
			$tenvt =$row['tenviettat'];
			$sm=$row['somay'];
			?>
			<option value="<?php echo $mavt; ?>"> <?php echo $tenvt;?>  <?php echo $sm;?> </option>
		<?php }}?> 
		</optgroup>
		</select></td>
</tr>
<tr>
<td bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF"> CÔNG VIỆC </td>
<td><input type="text" name="congviec" class="select_box"></td>
</tr>
<tr>
<td bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF"> NGÀY THỰC HIỆN </td>
<td><input name="ngayth" type="date" id="ngayth" class="datetime"></td>
</tr>
<tr>
<td bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF"> NHÂN VIÊN </td>
<td><input type=text name="nhanvien" id="nhanvien" class="select_box">  
	     
        </td>
</tr>
<tr>
<td bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF"> NƠI THỰC HIỆN </td>
<td><select name="noithuchien" id="noithuchien" class="select_box"> 
 <option value="MN"> MN  </option>
 <option value="XNKT"> XNKT  </option>  
        </td>
</tr>
<tr>
<td bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF"> TÌNH TRẠNG KỸ THUẬT </td>
<td><select name="ttkt" class="select_box">
<option value=""> </option>
<?php if($ttkt=="Tốt"){ ?>
<option value="Hỏng"> Hỏng </option>
<?php }elseif($ttkt=="Hỏng"){?>
<option value="Tốt"> Tốt</option>
<?php }elseif($ttkt==""){ ?>
<option value="Tốt"> Tốt</option>
<option value="Hỏng"> Hỏng </option>
<?php } ?>
</select></td>
</tr>

</table>
<br/>
<input type=hidden name=username value="<?php echo $username; ?>">
<input type=hidden name=password value="<?php echo $password;?>">
 <center><input type="image" name="nhapdl" src="upload/nhapdl1.jpg" value ="Nhập dữ liệu"alt="Xem" onClick="this.form.nhapdl.value = this.value"/>
	<input type=hidden name=nhapdl value=""></center>
	
</form>


<?php } ?>
<?php if($hosohc=="phieuyeucau"){

$delete1="DELETE FROM kehoach_temp";
mysql_query($delete1) or die(mysql_error());

if(isset($_GET['thang'])){
$m = $_GET['thang'];
}else{
$m =(int)date('m');
}

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

 ?>

<div align="center"><strong><font size="+1">DANH SÁCH HIỆU CHUẨN / KIỂM ĐỊNH </font></strong></div>
<form method="post" action="bangcanhbao.php" enctype="multipart/form-data">

<p style="margin-left:50px;">Chọn tháng <select name='thang' style="width:150px;height:30px;border:1px solid #CCCCCC;">
<option value="<?php echo $m; ?>">Tháng <?php echo $m; ?> </option>
<option value="1">Tháng 1 </option>
<option value="2">Tháng 2 </option>
<option value="3">Tháng 3 </option>
<option value="4">Tháng 4 </option>
<option value="5">Tháng 5 </option>
<option value="6">Tháng 6 </option>
<option value="7">Tháng 7 </option>
<option value="8">Tháng 8 </option>
<option value="9">Tháng 9 </option>
<option value="10">Tháng 10 </option>
<option value="11">Tháng 11 </option>
<option value="12">Tháng 12 </option>
</select>
<input type="submit" name="search" value="Tìm kiếm">
</p>
<p style="margin-left:50px;">
Tên thiết bị
 <select name="tenthietbi" style="width:600px;height:30px;border:none;"  id="states1">
	<option value=""></option> 
	<?php $r1=mysql_query("SELECT DISTINCT tenthietbi FROM thietbihckd_iso ");
		while($row = mysql_fetch_array($r1))
		{
			$tentb=$row['tenthietbi']; ?>
	
	<optgroup style="display:table-row;" label="<?php echo $tentb; ?>">
	 <?php $r4=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE tenthietbi='$tentb'");
		while($row = mysql_fetch_array($r4))
		{
			$mavt =$row['mavattu'];
			$tenvt =$row['tenviettat'];
			$sm=$row['somay'];
			?>
			<option value="<?php echo $mavt; ?>"> <?php echo $tenvt;?>  <?php echo $sm;?> </option>
		<?php }}?> 
		</optgroup>
		</select>
	Nơi thực hiện 
	<select name="noith" style="width:200px;height:30px;border:1px solid #CCCCCC;" >
	<option value="MN">Giám định Miền Nam</option>
	<option value="XNKT">Xí nghiệp Khai Thác</option>
	<option value="XNĐVLGK">Xí nghiệp Địa vật lý Giếng khoan</option>
	</select>	
<input type="submit" name="them" value="Thêm thiết bị">
</p>
<?php 

$y=date('Y');


$r1=mysql_query("select count(*)as sum from kehoach_iso where thang='$m' and namkh='$y'");
while($row=mysql_fetch_array($r1)){
	$rows=$row['sum'];
}
$row_per_page=10; //Số dòng trên 1 trang
//tính số dòng cần hiển thị
//$rows=mysql_num_rows($tin);
//tính số trang cần để hiển thị
if ($rows>$row_per_page) $page=ceil($rows/$row_per_page); 
else $page=1; //nếu số dòng trong CSDL nhỏ hơn hoặc bằng số dòng trên 1 trang thì chỉ có 1 trang để hiển thị

if(isset($_GET['start']) && (int)$_GET['start'])
     $start=$_GET['start']; //dòng bắt đầu từ nơi ta muốn lấy
else $start=0;

$insert1="insert into kehoach_temp(tenthietbi,mahieu,somay,hangsx,noithuchien,thang,namkh,loaitb,ghichu) select tenthietbi,mahieu,somay,hangsx,noithuchien,thang,namkh,loaitb,ghichu from kehoach_iso where thang='$m' and namkh='$y' order by noithuchien asc"; 
mysql_query($insert1) or die(mysql_error());
$sql=mysql_query("select * from kehoach_temp limit $start,$row_per_page"); //bắt đầu lấy dữ liệu (^)_(^)


?>
 <br/> <?php $stt=$start+1; ?>
 <div class="CSSTableGenerator">
  <table  border="0" cellpadding="0" cellspacing="0" class="table1">
    <tr bgcolor="#FF9900">
	  <td width="80" bgcolor="#0000FF"></td>
      <td width="40" bgcolor="#0000FF"><div align="center" class="style2">STT </div></td>
	  <td width="160" nowrap="nowrap" bgcolor="#0000FF"><div align="center" class="style2">TÊN THIẾT BỊ</div></td>
      <td width="100" nowrap="nowrap" bgcolor="#0000FF"><div align="center" class="style2">MÃ HIỆU</div></td>
      <td width="139" bgcolor="#0000FF"> <div align="center" class="style2">SỐ MÁY </div></td>
      <td width="101" bgcolor="#0000FF"><div align="center" class="style2">CÔNG VIỆC</div></td>
      <td width="147" bgcolor="#0000FF"><div align="center" class="style2">NƠI THỰC HIỆN </div></td>
      <td width="127" bgcolor="#0000FF"><div align="center" class="style2">CHỦ SỞ HỮU </div></td>
	   <td width="140" bgcolor="#0000FF"><div align="center" class="style2">GHI CHÚ </div></td>
    </tr>
<?php 
$i=0;
while($row=mysql_fetch_array($sql)){

			$tenthietbi[$i] =$row['tenthietbi'];
			$tenmay[$i] =$row['mahieu'];
			$somay[$i] =$row['somay'];
			$noithuchien[$i] =$row['noithuchien'];
			$ghichu[$i] =$row['ghichu'];
			
			$r19=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$tenmay[$i]'");
			while($row=mysql_fetch_array($r19)){
					$tenviettat[$i]=$row['tenviettat'];
					$bophansh[$i] =$row['bophansh'];
					$chusohuu[$i] =$row['chusohuu'];
			}
			$sohs[$i]="";
			$congviec[$i]="";
			$ngayth[$i]="";
			$nhanvien[$i]="";
			$ttkt[$i]="";
			$r20=mysql_query("SELECT DISTINCT *,date_format(`ngayhc`,'%d/%m/%Y') as ngayhc FROM hosohckd_iso WHERE tenmay='$tenmay[$i]' and namkh='$y' ");
			while($row=mysql_fetch_array($r20)){
					$sohs[$i]=$row['sohs'];
					$congviec[$i]=$row['congviec'];
					$ngayth[$i]=$row['ngayhc'];
					$ttkt[$i] =$row['ttkt'];		
			}
			/*if($noithuchien[$i]=="MN"){
				$bkground="#F5A9A9";
			}elseif($noithuchien[$i]=="XNKT"){
				$bkground="#FFFFE0";
			}else{
				$bkground="#A0FFFF";
			}*/
			
?>  
 <tr bgcolor="<?php echo $bkground; ?>">
  <td height="30" style="font:'Times New Roman', Times, serif;font-size:15px;">  
	  <?php if($ghichu[$i]=="DX"){ ?>
	  <input type="checkbox" name="chkDel[]" value="<?php echo $tenmay[$i]; ?>">
	 <input type="submit" name="del" WIDTH=20 HEIGHT=16 BORDER=0 ALT='' style="border:none;background:url(images/del.png) no-repeat;" value="&nbsp;&nbsp;&nbsp;Xóa" >
	  <?php }else{ ?>
	  <input type="checkbox" name="chkDel[]" value="<?php echo $tenmay[$i]; ?>" disabled="disabled">
	  <input type="submit" name="del" WIDTH=20 HEIGHT=16 BORDER=0 ALT='' style="border:none;background:url(images/del.png) no-repeat;" value="&nbsp;&nbsp;&nbsp;Xóa" disabled="disabled" >
	 <?php } ?>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo $stt; ?></div></td>
	    <td style="font:'Times New Roman', Times, serif;font-size:15px;padding-left:20px;"><?php echo $tenthietbi[$i]; ?></td>
	  <td style="font:'Times New Roman', Times, serif;font-size:15px;padding-left:20px;"><?php echo $tenviettat[$i]; ?></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo $somay[$i]; ?></div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo "HC/KĐ";  ?></div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo $noithuchien[$i]; ?></div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php if($bophansh[$i]!="XDT"){ echo $bophansh[$i]; }else{ echo $chusohuu[$i]; }?></div></td>
     <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php if($ghichu[$i]=="DK"){ ?> <input type="checkbox"name="dinhky" value="1" checked="checked"> Định kỳ <input type="checkbox"name="dotxuat" value="0"> Đột xuất <?php }else{ ?><input type="checkbox"name="dinhky" value="0"> Định kỳ<input type="checkbox"name="dotxuat" value="1" checked="checked"> Đột xuất
	   <?php } ?></div></td>
    </tr>
   <?php $i++;
   $stt++;} ?>
   
</table>
 </div>
   <div class="footer" style="border:1px solid #666666;background:#CCCCCC">
<?php
//b?t d?u phân trang

$page_cr=($start/$row_per_page)+1;

for($i=1;$i<=$page;$i++)
{
 if ($page_cr!=$i) echo "<a href='bangcanhbao.php?start=".$row_per_page*($i-1)."&&username=$username&&password=$password&&hosohc=phieuyeucau&&thang=$m'>$i&nbsp;</a>";
 else echo $i." ";
}
?>
</div>

<?php //bang table1 ?>
<br/>
<table align="center">
<tr>	<input type="hidden" name="submit" value="">
<td>	<input type="image" name="submit" src="upload/phieuyc.jpg" value ="Phiếu yêu cầu" onClick="this.form.submit.value = this.value" /></td>
<td><input type="image" name="submit" src="upload/phieukt.jpg" value ="Phiếu XNKT" onClick="this.form.submit.value = this.value"/></td>
<td><input type="image" name="submit" src="upload/phieuMN.jpg" value ="Phiếu GĐMN" onClick="this.form.submit.value = this.value"/></td>
	
</form>
<form action="index.php" method="post">
  <input type=hidden name=username value="<?php echo $username;?>">
<input type=hidden name=password value="<?php echo $password;?>">
   <input type=hidden name="submit" value="Hồ sơ HC/KD">
 <td>	<input type="image" id="back" src="upload/backkh.jpg" /></td>
</form>
</tr>
</table>
<?php //bang table1 ?>
<input type=hidden name=username value="<?php echo $username;?>">
<input type=hidden name=password value="<?php echo $password;?>">
</form>


<?php } ?>
<?php if($tenthietbi!=""&&$hosohc==""&&$nhapdl==""&&$them==""){
if(isset($_GET['username'])){
$username = $_GET['username'];
}else{
$username = isset($_POST['username']) ? $_POST['username'] : '';
}

if(isset($_GET['password'])){
$password = $_GET['password'];
}else{
$password = isset($_POST['password']) ? $_POST['password'] : '';
}


$sohoso = isset($_POST['sohoso']) ? $_POST['sohoso'] : '';


 $r10=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$tenthietbi'");
 while($row = mysql_fetch_array($r10))
 {
	$type =$row['tenviettat'];
	$somay =$row['somay'];
	$hangsx =$row['hangsx'];
	$chusohuu =$row['chusohuu'];
	$bophansh =$row['bophansh'];
 } 
 ?>
<div align="center"><strong><font size="+2">CHỨNG NHẬN HIỆU CHUẨN<br/></font></strong>
<font size="+1">CERTIFICATE OF  CALIBRATION</font><br/>
</div>
<br/>
<form method="post" action="bangcanhbao.php" enctype="multipart/form-data">
<table width="800" align="center">
<tr>
 <td  bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF">Số hồ sơ</em></td>
  <td height="30"><input type="text" name="sohoso" size="50" class="select_box" style="font-size:14px;padding-left:10px;" value="<?php echo $sohoso; ?>"></td>
  </tr>
<tr>
 <td width="400" bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF">  Phương tiện đo / <em>Instrument</em> : </td>
  <td height="30">	 <select name="tenthietbi" style="width:450px;height:30px;font-size:14px;"  id="tenthietbi"  onChange="this.form.submit()">
	<option value="<?php echo $tenthietbi; ?>"><?php echo $tenthietbi; ?></option>
	<?php $r1=mysql_query("SELECT DISTINCT tenthietbi FROM thietbihckd_iso ");
		while($row = mysql_fetch_array($r1))
		{
			$tentb=$row['tenthietbi']; ?>
	
	<optgroup style="display:table-row;" label="<?php echo $tentb; ?>">
	 <?php $r4=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE tenthietbi='$tentb'");
		while($row = mysql_fetch_array($r4))
		{
			$mavt =$row['mavattu'];
			$tenvt =$row['tenviettat'];
			$sm=$row['somay'];
			?>
			<option value="<?php echo $mavt; ?>"> <?php echo $tenvt;?>  <?php echo $sm;?> </option>
		<?php }}?> 
		</optgroup>
		</select>
	  </td>
	</tr>
<tr>
 <td width="300" bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF"> Nước / Hãng sản xuất /<em> Manufacture</em>  </td>
  <td height="30"><input type="text" name="hangsx" style="width:450px;height:30px;border:1px solid black;font-size:14px;padding-left:10px;" value="<?php echo $hangsx; ?>"> </td>
 </tr>
 <tr>
 <td  bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF"> Kiểu / <em>Type</em>   </td>
  <td height="30"><input type="text" name="type" style="width:450px;height:30px;border:1px solid black;font-size:14px;padding-left:10px;" value="<?php echo $type; ?>"> </td>
</tr>
<tr>
 <td  bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF"> Số/ Serial №:  </td>
  <td height="30"><input type="text" name="somay" style="width:450px;height:30px;border:1px solid black;font-size:14px;padding-left:10px;" value="<?php echo $somay; ?>"> </td>
</tr>
 <tr>
 <td  bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF"> Chủ phương tiện / <em>Client</em> :</td>
   <td height="30"><input type="text" name="chusohuu" style="width:450px;height:30px;border:1px solid black;font-size:14px;padding-left:10px;"  value="<?php echo $bophansh; ?>"> </td>
</tr>
 <tr>
 <td  bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF"> Phương pháp chuẩn / <em>Method of calibration </em>:</td>
   <td height="30" style="border:1px solid black;padding-left:10px;"><input type="checkbox" name="danchuan"><font size="+0">Dẫn chuẩn <input type="checkbox" name="mauchuan"> Chuẩn qua mẫu chuẩn 
   <p><input type="checkbox" name="dinhky">Định kỳ  <input type="checkbox" name="dotxuat">Đột xuất  </p></font></td>
</tr>
 <tr>
 <td  bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF">Thiết bị dẫn chuẩn, mẫu chuẩn /<em> Means of calibration</em>
 </td>
  <td height="30">
 <?php for($i=1;$i<=5;$i++){ ?>
<select name="thietbidanchuan<?php echo $i; ?>" style="width:450px;height:30px;border:1px solid black;padding-left:5px;">
<option value=""> </option>
<?php $r2=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE loaitb=1");
		while($row = mysql_fetch_array($r2))
		{
			$tenvietat=$row['tenviettat'];
			$sm=$row['somay']; ?>
			
			<option value="<?php echo $tenvietat; ?>"><?php echo $tenvietat; ?>-<?php echo $sm; ?> </option>
		<?php }?>

</select><br/>
<?php } ?>
 </td>
</tr>

  
   <tr>
 <td  bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF">Ngày hiệu chuẩn / <em>Date of calibration</em></td>
  <td height="30"><input type="date" name="ngayth"  class="datetime"></td>
  </tr>
   <tr>
 <td  bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF">Ngày hiệu chuẩn tiếp theo / <em>Recalibration date</td>
   <td height="30"><input type="date" name="ngaythtt" class="datetime"> </td>
   </tr>
      <tr>
 <td  bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF">Nơi hiệu chuẩn / <em>Place of calibration</em></td>
  <td height="30"><select name="noithuchien" style="width:450px;height:30px;border:1px solid black;padding-left:5px;">
<option value="XSCCMDVL">XSCTBĐVL   </option>
<option value="MN">MN </option>
<option value="XNKT">XNKT</option>
</select>  </td>
  </tr>
       <tr>
 <td  bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF">Người hiệu chuẩn / <em>Operator in charge</em> </td>
  <td height="30"><select name="nhanvien" id="nhanvien" class="select_box" /> 
	   <option value=""></option>  
	   <option value="MN">MN</option>  
	   <option value="XNKT">XNKT</option>  
	     <?php $r5=mysql_query("SELECT DISTINCT * FROM resume WHERE donvi LIKE '%Xưởng sửa chữa và chuẩn chỉnh%' and nghiviec !='yes' ");
		while($row = mysql_fetch_array($r5))
		{
			$hoten =$row['hoten'];
			$chucdanh = $row['chucdanh'];
			
			$hoten = mb_convert_case($hoten, MB_CASE_LOWER, "UTF-8");
			$hoten1 = mb_convert_case($hoten, MB_CASE_TITLE, "UTF-8");
			?>
          <option value="<?php echo $hoten; ?>"><?php echo $hoten1; ?></option>
          <?php } ?>
      </select> </td>
  </tr>
  <tr>
<td bgcolor="#005fbf" style="padding-left:10px;"><span class="style13"><font color="#FFFFFF"> Tình Trạng Kỹ Thuật </td>
<td><select name="ttkt" class="select_box">
<option value="Tốt"> Tốt</option>
<option value="Hỏng"> Hỏng </option>
</select></td>
</tr>
</table>
<br/>
<center>
<input type=hidden name=username value="<?php echo $username; ?>">
<input type=hidden name=password value="<?php echo $password;?>">
 <input type="image" name="nhapdl" src="upload/nhapdl1.jpg" value ="Nhập dữ liệu"alt="Xem" onClick="this.form.nhapdl.value = this.value"/>
	<input type=hidden name=nhapdl value="">
  </center>
</form>

<?php } ?>


<?php if($nhapdl!=""){
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$y=date('Y');
$sohoso = isset($_POST['sohoso']) ? $_POST['sohoso'] : '';
$tenthietbi = isset($_POST['tenthietbi']) ? $_POST['tenthietbi'] : '';
$congviec = isset($_POST['congviec']) ? $_POST['congviec'] : '';
$ngayth = isset($_POST['ngayth']) ? $_POST['ngayth'] : '';
$nhanvien = isset($_POST['nhanvien']) ? $_POST['nhanvien'] : '';
$noithuchien = isset($_POST['noithuchien']) ? $_POST['noithuchien'] : '';
$ngaythtt = isset($_POST['ngaythtt']) ? $_POST['ngaythtt'] : '';
$danchuan = isset($_POST['danchuan']) ? $_POST['danchuan'] : '';
$mauchuan = isset($_POST['mauchuan']) ? $_POST['mauchuan'] : '';
$dinhky = isset($_POST['dinhky']) ? $_POST['dinhky'] : '';
$dotxuat = isset($_POST['dotxuat']) ? $_POST['dotxuat'] : '';
$ttkt = isset($_POST['ttkt']) ? $_POST['ttkt'] : '';

for($i=1;$i<=5;$i++)
{
$thietbidc[$i] = isset($_POST["thietbidanchuan$i"]) ? $_POST["thietbidanchuan$i"] : '';
$r2=mysql_query("SELECT DISTINCT * FROM hosohckd_iso WHERE tenmay='$thietbidc[$i]'");
while($row = mysql_fetch_array($r2))
{
	$ngaydc[$i]=$row['ngayhc'];
	$noidc[$i]=$row['noithuchien']; 
		
}	
$r3=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$thietbidc[$i]'");
while($row = mysql_fetch_array($r3))
{
	$tenthietbidc[$i]=$row['tenthietbi'];
	$tendc[$i]=$row['tenviettat'];
	$smdc[$i]=$row['somay'];	
}
}


$r12=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$tenthietbi'");
while($row = mysql_fetch_array($r12))
{
	$tentb=$row['tenthietbi'];
	$hangsx=$row['hangsx'];
	$tenviettat=$row['tenviettat']; 
	$somay=$row['somay']; 
	$chush=$row['chusohuu'];
	$bophansh=$row['bophansh'];
	$loaitb=$row['loaitb'];
}
$r4=mysql_query("SELECT DISTINCT * FROM donvi_iso WHERE madv='$bophansh'");
while($row = mysql_fetch_array($r4))
{
	$tensohuu=$row['tendv'];
}
if($congviec==""){
if($tenviettat=="KIT"||$tenviettat=="DL/60"||$tenviettat=="DL/76"||$tenviettat=="KITA"||$tenviettat=="KITB"||$tenviettat=="ION"||$loaitb=='5'||$loaitb=='6') {
$congviec="CM";
}else{
$congviec="HC";
}		
}
$check=0;
$r8=mysql_query("SELECT DISTINCT * FROM hosohckd_iso WHERE  tenmay='$tenthietbi' and ngayhc='$ngayth'");
while($row = mysql_fetch_array($r8))
{
	$tenmay=$row['tenmay'];
	if($tenmay!="")  $check=1;
	
}	

//if($ttkt=="Hỏng"){
//$sohoso="";
//}
if($check==0){
$insert = "insert into hosohckd_iso(
sohs,
tenmay,
congviec,
thietbidc1,
thietbidc2,
thietbidc3,
thietbidc4,
thietbidc5,
danchuan,
mauchuan,
dinhky,
dotxuat,
ngayhc,
ngayhctt,
nhanvien,
noithuchien,
ttkt,
namkh
) values (
'$sohoso',
'$tenthietbi',
'$congviec',
'$thietbidc[1]',
'$thietbidc[2]',
'$thietbidc[3]',
'$thietbidc[4]',
'$thietbidc[5]',
'$danchuan',
'$mauchuan',
'$dinhky',
'$dotxuat',
'$ngayth',
'$ngaythtt',
'$nhanvien',
'$noithuchien',
'$ttkt',
'$y'
)" ;
mysql_query($insert) or die(mysql_error());

/*}else{

$insert = "insert into hosohckd_iso(
sohs,
tenmay,
congviec,
thietbidc1,
thietbidc2,
thietbidc3,
thietbidc4,
thietbidc5,
danchuan,
mauchuan,
dinhky,
dotxuat,
ngayhc,
ngayhctt,
nhanvien,
noithuchien,
ttkt,
namkh
) values (
'',
'$tenthietbi',
'$congviec',
'',
'',
'',
'',
'',
'',
'',
'',
'',
'$ngayth',
'',
'',
'$noithuchien',
'$ttkt',
'$y'
)" ;
mysql_query($insert) or die(mysql_error());

}*/
}else{

$update = "update hosohckd_iso SET  
sohs='$sohoso',
thietbidc1='$thietbidc[1]',
thietbidc2='$thietbidc[2]',
thietbidc3='$thietbidc[3]',
thietbidc4='$thietbidc[4]',
thietbidc5='$thietbidc[5]',
danchuan='$danchuan',
congviec='$congviec',
mauchuan='$mauchuan',
dinhky='$dinhky',
dotxuat='$dotxuat',
ngayhc='$ngayth',
ngayhctt='$ngaythtt',
nhanvien='$nhanvien',
noithuchien='$noithuchien',
ttkt='$ttkt'
WHERE tenmay='$tenthietbi' and ngayhc='$ngayth'" ;

mysql_query($update) or die(mysql_error());
}

?>
<?php if($noithuchien=="XSCCMDVL"&&$ttkt=="Tốt"){ 
if($tenviettat=="KIT"||$tenviettat=="DL/60"||$tenviettat=="DL/76"||$tenviettat=="KITA"||$tenviettat=="KITB"||$tenviettat=="ION"||$loaitb=='5'||$loaitb=='6') { ?>

<form method="post" action="bangcanhbao.php" enctype="multipart/form-data">


<table class="table3" align="center">
  <tr height="120">
  <td>
 <span style='mso-ignore:vglayout;
  position:absolute;z-index:1;margin-left:1px;margin-top:4px;width:108px;
  height:77px'><img width=108 height=77
  src="images/logo.jpg"
  alt="Logo DVL" v:shapes="_x0000_s1027"></span><![endif]><b><span
  style='mso-spacerun:yes;margin-left:120px;'></span>LD VI&#7878;T - NGA
  VIETSOVPTRO </b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Add:105 LÊ L&#7906;I</p>
  <p style="margin-left:120px;height:10px;"><b>XN &#272;&#7882;A V&#7852;T LÝ G/K </b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vũng
  Tàu - VN</p>
  <p style="margin-left:120px;height:10px;"><b>Logging &amp; Testing Division </b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tel :064- 3839871</p>
  <p style="margin-left:440px;height:10px;">Fax:064- 3839857</p>
  </td>
  </tr>
 <tr>
  <td> 
  <p><center><strong><font size="+2">BIÊN BẢN CHUẨN MÁY</font></strong><br/><font size="+1">AKT ЭТАЛОНИРОВКИ АППАРАТУРЫ </font><br/>
 <b> Số hồ sơ: № </b> <?php echo $sohoso; ?></center>
  <p style="margin-left:10px;height:10px;"> 1. Tên thiết bị / Оборудование:  <b> <?php echo $tentb; ?></b></p>
  <p style="margin-left:10px;height:10px;"> 2. Nước / Hãng sản xuất / Страна – Производства :    <?php echo $hangsx; ?>
  <p style="margin-left:10px;height:10px;"> 3. Kiểu / Тип:   &nbsp;<?php echo $tenviettat; ?>___________№ &nbsp;<?php echo $somay; ?></p>
  <p style="margin-left:10px;height:10px;">4. Chủ thiết bị / Отряд:   :<?php echo $tensohuu; if($chush!=""){?>(<?php echo $chush; ?>) <?php } ?></p>
  <p style="margin-left:10px;height:10px;">5. Phương pháp chuẩn / Метр . Метод :     Dẫn chuẩn :<?php if($danchuan=="on"){ ?> <input type="checkbox" name="danchuan" checked="checked"> <?php }else{ ?> <input type="checkbox" name="danchuan"> <?php } ?>Chuẩn qua mẫu chuẩn <?php if($mauchuan=="on"){ ?>  <input type="checkbox" name="mauchuan" checked="checked"><?php }else{ ?><input type="checkbox" name="mauchuan"> <?php } ?>
   <p style="margin-left:260px;height:10px;"> Định kỳ  <?php if($dinhky=="on"){ ?> <input type="checkbox" name="dinhky" checked="checked"><?php }else{ ?>  <input type="checkbox" name="dinhky"> <?php } ?>  Đột xuất :  <?php if($dotxuat=="on"){ ?><input type="checkbox" name="dotxuat" checked="checked"><?php }else{ ?><input type="checkbox" name="dotxuat"> <?php } ?>
   <p style="margin-left:10px;height:30px;"> 6. Thiết bị dẫn chuẩn, mẫu chuẩn / Образцовая аппаратура : Thiết bị đo này được chuẩn bằng cách so sánh / đo trong các mẫu chuẩn được truyền chuẩn từ chuẩn Quốc tế :</p>
  
  <?php for($i=1;$i<=5;$i++) { 
  if($thietbidc[$i]!=""){
  ?>
 <p style="margin-left:10px;height:10px;">6.<?php echo $i; ?> <span style='font-size:11.0pt;font-family:VNI-Times'><span
  style='mso-spacerun:yes'> </span></span><span style='font-size:11.0pt'>Theo
  chu&#7849;n <?php echo $tenthietbidc[$i]; ?>&nbsp;<?php echo $tendc[$i]; ?>-<span
  style='mso-spacerun:yes'>No:<?php echo $smdc[$i]; ?>  </span>-<?php if(isset($noidc[$i])){ echo $noidc[$i];} ?>&nbsp;HC&nbsp;<?php if(isset($ngaydc[$i])){ echo date("d/m/Y", strtotime($ngaydc[$i])); } ?>  <o:p></o:p></span></p>
  <?php }} ?>
  <p style="margin-left:10px;height:10px;">7. Điều kiện chuẩn / Условие провед. калибровки     </p>
  <p style="margin-left:340px;height:30px;">+ Nhiệt độ môi trường (26±2)°C<br/>
     + Áp suất môi trường : Môi trường</p>
 
  <p style="margin-left:10px;height:10px;">8 . Ngày chuẩn / Дата :   <?php echo date("d/m/Y", strtotime($ngayth)); ?></span></p>
  <p style="margin-left:10px;height:10px;">9 . Nơi chuẩn / Место проведения : <?php if($noithuchien=="XSCCMDVL"){echo "XN Địa vật lý GK";} ?> </p>
  <p style="margin-left:10px;height:10px;">10. Người chuẩn máy / Ответственный испольнитель :   <?php echo $nhanvien; ?></p>
  <p style="margin-left:10px;height:10px;">11. Kết quả chuẩn: (Có tài liệu kèm theo) Có hồ sơ kèm theo
  <p style="margin-left:15px;height:10px;"><b> Kết luận : Đạt </b></p>

  <p class=MsoNormal><span style='mso-spacerun:yes'>   </span><b>Người kiểm tra / Контролер<span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Người chuẩn máy / Испольнитель <o:p></o:p></b></p>
  <p class=MsoNormal><span style='mso-spacerun:yes'>              
  </span>(Chữ ký, họ tên)<span
  style='mso-spacerun:yes'>                                                                 
  </span>(Chữ ký, họ tên)<span
  style='mso-spacerun:yes'>                   </span></p>
  <p class=MsoNormal><o:p>&nbsp;</o:p></p>
 
  <p class=MsoNormal><span style='mso-spacerun:yes'>       </span><span
  style='mso-spacerun:yes'>  </span><span style='mso-spacerun:yes'> </span><span
  style='mso-spacerun:yes'>     </span>Vũ Anh Đức<span
  style='mso-spacerun:yes'>                                                     
  </span><span style='mso-spacerun:yes'>      </span><span
  style='mso-spacerun:yes'>  </span><span
  style='mso-spacerun:yes'>      </span><?php echo $nhanvien; ?></p>
  </td>
 </tr>
</table>
<br/>
<br/>
<br/>
<div class=\"noprint\">
<table align="center">
<tr>
<td> <input type="image" name="print" src="upload/print.jpg" value ="In hồ sơ" alt="Xem" onClick="this.form.print.value = this.value"/>
 <input type=hidden name=print value="">
 </td>
  <input type=hidden name=sohoso value="<?php echo $sohoso; ?>">
</form>
<form action="index.php" method="post">
  <input type=hidden name=username value="<?php echo $username;?>">
<input type=hidden name=password value="<?php echo $password;?>">
   <input type=hidden name="submit" value="Hồ sơ HC/KD">
 <td>	<input type="image" id="back" src="upload/backkh.jpg" /></td>

</form>
   </tr>
   </table>
</div>
</center>
</body>
</html>
<?php }else{ ?>

<form method="post" action="bangcanhbao.php" enctype="multipart/form-data">


<table class="table3" align="center">
  <tr height="100">
  <td>
 <span style='mso-ignore:vglayout;
  position:absolute;z-index:1;margin-left:1px;margin-top:4px;width:108px;
  height:77px'><img width=108 height=77
  src="images/logo.jpg"
  alt="Logo DVL" v:shapes="_x0000_s1027"></span><![endif]><b><span
  style='mso-spacerun:yes;margin-left:120px;'></span>LD VI&#7878;T - NGA
  VIETSOVPTRO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Add:105 LÊ L&#7906;I</p>
  <p style="margin-left:120px;height:10px;">XN &#272;&#7882;A V&#7852;T LÝ G/K &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vũng
  Tàu - VN</p>
  <p style="margin-left:120px;height:10px;">Logging &amp; Testing Division &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tel :064- 3839871</p>
  <p style="margin-left:440px;height:10px;">Fax:064- 3839857</p>
  </td>
  </tr>
 <tr>
  <td> 
  <p><center><strong><font size="+2">CHỨNG NHẬN HIỆU CHUẨN</font></strong><br/><font size="+1">CERTIFICATE OF CALIBRATION </font><br/>
  Số hồ sơ: <?php echo $sohoso; ?></center>
  <p style="margin-left:10px;height:10px;"> 1. Phương tiện đo / <i>Instrument</i>: ………<b> <?php echo $tentb; ?></b></p>
  <p style="margin-left:10px;height:10px;"> 2<i>. </i>Nước / Hãng sản xuất / <i>Manufacture: </i>………<?php echo $hangsx; ?>
  <p style="margin-left:10px;height:10px;"> 3. Kiểu / <i>Type</i>:&nbsp;<?php echo $tenviettat; ?>……………… Số/<i> Serial:</i> &nbsp;<?php echo $somay; ?></p>
  <p style="margin-left:10px;height:10px;">4. Chủ phương tiện <i>/ Client</i> :………<?php echo $tensohuu; if($chush!=""){?>(<?php echo $chush; ?>) <?php } ?></p>
  <p style="margin-left:10px;height:10px;">5. Phương pháp dẫn chuẩn / <i>Method of calibration </i>: Dẫn chuẩn :<?php if($danchuan=="on"){ ?> <input type="checkbox" name="danchuan" checked="checked"> <?php }else{ ?> <input type="checkbox" name="danchuan"> <?php } ?>Chuẩn qua mẫu chuẩn <?php if($mauchuan=="on"){ ?>  <input type="checkbox" name="mauchuan" checked="checked"><?php }else{ ?><input type="checkbox" name="mauchuan"> <?php } ?>
   <p style="margin-left:330px;height:10px;"> Định kỳ  <?php if($dinhky=="on"){ ?> <input type="checkbox" name="dinhky" checked="checked"><?php }else{ ?>  <input type="checkbox" name="dinhky"> <?php } ?>  Đột xuất :  <?php if($dotxuat=="on"){ ?><input type="checkbox" name="dotxuat" checked="checked"><?php }else{ ?><input type="checkbox" name="dotxuat"> <?php } ?>
   <p style="margin-left:10px;height:30px;"> 6.  Thiết bị dẫn chuẩn, mẫu chuẩn / <i> Means of calibration</i> : Phương tiện đo này được hiệu chuẩn bằng cách so sánh với thiết bị chuẩn được truyền chuẩn từ chuẩn Quốc gia / Quốc tế :</p>
  
  <?php for($i=1;$i<=5;$i++) { 
  if($thietbidc[$i]!=""){
  ?>
 <p style="margin-left:10px;height:10px;">6.<?php echo $i; ?> <span style='font-size:11.0pt;font-family:VNI-Times'><span
  style='mso-spacerun:yes'> </span></span><span style='font-size:11.0pt'>Theo
  chu&#7849;n <?php if(isset($tenthietbidc[$i])){ echo $tenthietbidc[$i]; }?>&nbsp;<?php if(isset($tendc[$i])){ echo $tendc[$i]; } ?>-<span
  style='mso-spacerun:yes'>No:<?php if(isset($smdc[$i])){ echo $smdc[$i]; } ?>  </span>-<?php if(isset($noidc[$i])){ echo $noidc[$i]; } ?>&nbsp;HC&nbsp;<?php if(isset($ngaydc[$i])){ echo date("d/m/Y", strtotime($ngaydc[$i])); }?>  <o:p></o:p></span></p>
  <?php }} ?>
  <p style="margin-left:10px;height:10px;">7. Điều kiện môi trường / <i>Environment condition:</i> </p>
  <p style="margin-left:340px;height:30px;">+ Nhiệt độ /<i> Ambient temperature:</i> (25 ± 2)°C<br/>
      + Độ ẩm /<i> Humidity :</i> (64 ± 2)%</p>
  <p style="margin-left:10px;height:30px;">8 . Số liệu thu được và sai số cho phép / <i>Results of calibration :</i> Bảng kết quả kèm theo / Results of calibration attached 
  </p>
  <p style="margin-left:10px;height:10px;">9 . Ngày hiệu chuẩn /<i> Date of calibration: </i> <?php echo date("d/m/Y", strtotime($ngayth)); ?></span></p>
  <p style="margin-left:10px;height:10px;">10. Ngày hiệu chuẩn tiếp theo /<i> Recalibration date: </i><?php echo date("d/m/Y", strtotime($ngaythtt)); ?></p>
  <p style="margin-left:10px;height:10px;">11. Nơi hiệu chuẩn /<i> Place of calibration:</i>  <?php if($noithuchien=="XSCCMDVL"){echo "XSCTB ĐỊA VẬT LÝ";} ?> </p>
  <p style="margin-left:10px;height:10px;">12. Người hiệu chuẩn / <i>Operator in charge:</i> <?php echo $nhanvien; ?></p>
  <p style="margin-left:10px;height:10px;">13. K&#7871;t lu&#7853;n
  :……………………………………&#272;&#7841;t……………………………………………</p>
  <p class=MsoNormal style='line-height:115%;margin-left:30px;'>………………………………………………………………………………….…………………</p>
  <p class=MsoNormal style='line-height:115%;margin-left:30px;'>……………………………………………………………………………………………………</p>
  <p class=MsoNormal style='line-height:115%;margin-left:30px;'>……………………………………………………………………………………………………</p>

  <p class=MsoNormal><span style='mso-spacerun:yes'>               </span><b>Người kiểm tra<span
  style='mso-spacerun:yes'>                                                               
  </span>Người chuẩn máy<o:p></o:p></b></p>
  <p class=MsoNormal><span style='mso-spacerun:yes'>              
  </span>(Chữ ký, họ tên)<span
  style='mso-spacerun:yes'>                                                                 
  </span>(Chữ ký, họ tên)<span
  style='mso-spacerun:yes'>                   </span></p>

  <p class=MsoNormal style='tab-stops:160.75pt'><span style='mso-tab-count:
  1'>                                                      </span></p>
  <p class=MsoNormal><span style='mso-spacerun:yes'>       </span><span
  style='mso-spacerun:yes'>  </span><span style='mso-spacerun:yes'> </span><span
  style='mso-spacerun:yes'>     </span>     Vũ Anh Đức<span
  style='mso-spacerun:yes'>                                                     
  </span><span style='mso-spacerun:yes'>      </span><span
  style='mso-spacerun:yes'>  </span><span
  style='mso-spacerun:yes'>      </span>&nbsp;&nbsp;<?php echo $nhanvien; ?></p>
  </td>
 </tr>
</table>

<br/>

<table align="center">
<tr>
<td> <input type="image" name="print" src="upload/print.jpg" value ="In hồ sơ" alt="Xem" onClick="this.form.print.value = this.value"/>
 <input type=hidden name=print value="">
 </td>
  <input type=hidden name=sohoso value="<?php echo $sohoso; ?>">
</form>
<form action="index.php" method="post">
  <input type=hidden name=username value="<?php echo $username;?>">
<input type=hidden name=password value="<?php echo $password;?>">
   <input type=hidden name="submit" value="Hồ sơ HC/KD">
 <td>	<input type="image" id="back" src="upload/backkh.jpg" /></td>
</form>
   </tr>
   </table>
</center>
<?php } ?>
<?php }else{?>
<center><br/>
<strong> Chúc mừng đã nhập thành công </strong>

<form action="index.php" method="post">
  <input type=hidden name=username value="<?php echo $username;?>">
<input type=hidden name=password value="<?php echo $password;?>">
   <input type=hidden name="submit" value="Hồ sơ HC/KD">
 <td>	<input type="image" id="back" src="upload/backkh.jpg" /></td>
  </form>
</center>
<?php } ?>
<?php } ?>

<?php if($print!=""){ 
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$sohoso = isset($_POST['sohoso']) ? $_POST['sohoso'] : '';
$r5=mysql_query("SELECT DISTINCT *,date_format(`ngayhc`,'%d/%m/%Y') as ngayhc FROM hosohckd_iso WHERE sohs='$sohoso'");
while($row = mysql_fetch_array($r5))
{
	$tenmay=$row['tenmay'];
	$thietbidc[1]=$row['thietbidc1'];
	$thietbidc[2]=$row['thietbidc2'];
	$thietbidc[3]=$row['thietbidc3'];
	$thietbidc[4]=$row['thietbidc4'];
	$thietbidc[5]=$row['thietbidc5'];
	$danchuan=$row['danchuan']; 
	$mauchuan=$row['mauchuan']; 
	$dinhky=$row['dinhky'];
	$dotxuat=$row['dotxuat'];
	$ngayth=$row['ngayhc'];
	$ngaythtt=$row['ngayhctt'];
	$nhanvien=$row['nhanvien'];
	$noithuchien=$row['noithuchien'];
	$chush=$row['chush'];
}
for($i=1;$i<=5;$i++){
$r6=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$thietbidc[$i]'");
while($row = mysql_fetch_array($r6))
{
	$tenthietbidc[$i]=$row['tenthietbi'];
	$tendc[$i]=$row['tenviettat'];
	$smdc[$i]=$row['somay'];	
}
$r8=mysql_query("SELECT DISTINCT * FROM hosohckd_iso WHERE tenmay='$thietbidc[$i]'");
while($row = mysql_fetch_array($r8))
{
	$ngaydc[$i]=$row['ngayhc'];
	$noidc[$i]=$row['noithuchien']; 
		
}
}

$r7=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$tenmay'");
while($row = mysql_fetch_array($r7))
{
	$tentb=$row['tenthietbi'];
	$hangsx=$row['hangsx'];
	$tenviettat=$row['tenviettat']; 
	$somay=$row['somay']; 
	$chush=$row['chusohuu'];
	$bophansh=$row['bophansh'];
}
$r9=mysql_query("SELECT DISTINCT * FROM donvi_iso WHERE madv='$bophansh'");
while($row = mysql_fetch_array($r9))
{
	$tensohuu=$row['tendv'];
}
$ngaystemp=$ngayth;
for($i=0;$i<=strlen($ngaystemp);$i++) {
			$p = stripos($ngaystemp,"/") ;
		if ($i== 0) {
			$ngayh = trim (substr($ngaystemp,0,$p)) ;
		} 	
		if ($i== 1) {
			$thangh = trim (substr($ngaystemp,0,$p)) ;
		} 	
		if ($i== 2) {
			$namh = trim ($ngaystemp,$p) ;
		} 	
			$p++ ;
			$ngaystemp = substr($ngaystemp,$p);
		}
?>
<?php if($tenviettat=="KIT"||$tenviettat=="DL/60"||$tenviettat=="DL/76"||$tenviettat=="KITA"||$tenviettat=="KITB") { 
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
?>

<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
xmlns:st1="urn:schemas-microsoft-com:office:smarttags"
xmlns="http://www.w3.org/TR/REC-html40">
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 12">
<meta name=Originator content="Microsoft Word 12">
<link rel=File-List href="KIT-335_T6-2016_files/filelist.xml">
<link rel=Edit-Time-Data href="KIT-335_T6-2016_files/editdata.mso">

<title>LD VIỆT - NGA VIETSOVPTRO                   Add :  105 LÊ LỢI</title>
<o:SmartTagType namespaceuri="urn:schemas-microsoft-com:office:smarttags"
 name="place"/>
<o:SmartTagType namespaceuri="urn:schemas-microsoft-com:office:smarttags"
 name="country-region"/>


<link rel=themeData href="KIT-335_T6-2016_files/themedata.thmx">
<link rel=colorSchemeMapping href="KIT-335_T6-2016_files/colorschememapping.xml">

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
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:-536870145 1107305727 0 0 415 0;}
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
	{font-family:Times;
	panose-1:2 2 6 3 5 4 5 2 3 4;
	mso-font-charset:0;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:-536859905 -1073711039 9 0 511 0;}
@font-face
	{font-family:VNI-Times;
	panose-1:0 0 0 0 0 0 0 0 0 0;
	mso-font-charset:0;
	mso-generic-font-family:auto;
	mso-font-pitch:variable;
	mso-font-signature:7 0 0 0 19 0;}
@font-face
	{font-family:VNTime;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
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
@font-face
	{font-family:"Segoe UI";
	panose-1:2 11 5 2 4 2 4 2 2 3;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-520084737 -1073683329 41 0 479 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:13.0pt;
	font-family:VNI-Times;
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:VNI-Times;}
h1
	{mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-link:"Heading 1 Char";
	mso-style-next:Normal;
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:1;
	font-size:14.0pt;
	font-family:VNI-Times;
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:VNI-Times;
	mso-font-kerning:0pt;
	text-decoration:underline;
	text-underline:single;}
h2
	{mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-link:"Heading 2 Char";
	mso-style-next:Normal;
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:2;
	font-size:13.0pt;
	font-family:VNI-Times;
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:VNI-Times;
	text-decoration:underline;
	text-underline:single;}
h3
	{mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-link:"Heading 3 Char";
	mso-style-next:Normal;
	margin:0in;
	margin-bottom:.0001pt;
	text-align:center;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:3;
	font-size:13.0pt;
	font-family:VNI-Times;
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:VNI-Times;}
h4
	{mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-link:"Heading 4 Char";
	mso-style-next:Normal;
	margin:0in;
	margin-bottom:.0001pt;
	text-align:center;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:4;
	font-size:14.0pt;
	font-family:VNI-Times;
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:VNI-Times;
	color:black;}
h5
	{mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-link:"Heading 5 Char";
	mso-style-next:Normal;
	margin:0in;
	margin-bottom:.0001pt;
	text-align:center;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:5;
	font-size:11.0pt;
	font-family:VNI-Times;
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:VNI-Times;
	color:black;}
h6
	{mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-link:"Heading 6 Char";
	mso-style-next:Normal;
	margin:0in;
	margin-bottom:.0001pt;
	text-align:center;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:6;
	font-size:12.0pt;
	font-family:VNI-Times;
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:VNI-Times;}
p.MsoHeading7, li.MsoHeading7, div.MsoHeading7
	{mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-link:"Heading 7 Char";
	mso-style-next:Normal;
	margin:0in;
	margin-bottom:.0001pt;
	text-align:center;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:7;
	font-size:20.0pt;
	font-family:VNI-Times;
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:VNI-Times;
	font-weight:bold;}
p.MsoHeading8, li.MsoHeading8, div.MsoHeading8
	{mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-link:"Heading 8 Char";
	mso-style-next:Normal;
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:8;
	font-size:12.0pt;
	font-family:VNI-Times;
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:VNI-Times;
	color:black;
	font-weight:bold;}
p.MsoHeading9, li.MsoHeading9, div.MsoHeading9
	{mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-link:"Heading 9 Char";
	mso-style-next:Normal;
	margin:0in;
	margin-bottom:.0001pt;
	text-align:center;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:9;
	font-size:14.0pt;
	font-family:VNI-Times;
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:VNI-Times;
	font-weight:bold;}
p.MsoHeader, li.MsoHeader, div.MsoHeader
	{mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-link:"Header Char";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	tab-stops:center 3.0in right 6.0in;
	font-size:13.0pt;
	font-family:VNI-Times;
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:VNI-Times;}
p.MsoFooter, li.MsoFooter, div.MsoFooter
	{mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-link:"Footer Char";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	tab-stops:center 3.0in right 6.0in;
	font-size:13.0pt;
	font-family:VNI-Times;
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:VNI-Times;}
p.MsoCaption, li.MsoCaption, div.MsoCaption
	{mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-next:Normal;
	margin:0in;
	margin-bottom:.0001pt;
	text-align:center;
	mso-pagination:widow-orphan;
	font-size:14.0pt;
	font-family:VNI-Times;
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:VNI-Times;
	color:black;
	font-weight:bold;}
p.MsoTitle, li.MsoTitle, div.MsoTitle
	{mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-link:"Title Char";
	margin:0in;
	margin-bottom:.0001pt;
	text-align:center;
	mso-pagination:widow-orphan;
	font-size:13.0pt;
	font-family:"VNTimeH","sans-serif";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:VNTimeH;
	font-weight:bold;}
p.MsoBodyText, li.MsoBodyText, div.MsoBodyText
	{mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-link:"Body Text Char";
	margin:0in;
	margin-bottom:.0001pt;
	text-align:center;
	mso-pagination:widow-orphan;
	font-size:13.0pt;
	font-family:VNI-Times;
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:VNI-Times;}
p.MsoBodyTextIndent, li.MsoBodyTextIndent, div.MsoBodyTextIndent
	{mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-link:"Body Text Indent Char";
	margin:0in;
	margin-bottom:.0001pt;
	text-align:justify;
	mso-pagination:widow-orphan;
	font-size:13.0pt;
	font-family:"VNTime","sans-serif";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:VNTime;}
p.MsoBodyText2, li.MsoBodyText2, div.MsoBodyText2
	{mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-link:"Body Text 2 Char";
	margin:0in;
	margin-bottom:.0001pt;
	text-align:justify;
	mso-pagination:widow-orphan;
	font-size:13.0pt;
	font-family:"VNTime","sans-serif";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:VNTime;}
p.MsoBodyText3, li.MsoBodyText3, div.MsoBodyText3
	{mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-link:"Body Text 3 Char";
	margin:0in;
	margin-bottom:.0001pt;
	text-align:center;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"VNTimeH","sans-serif";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:VNTimeH;
	font-weight:bold;}
p.MsoBlockText, li.MsoBlockText, div.MsoBlockText
	{mso-style-priority:99;
	mso-style-unhide:no;
	margin-top:0in;
	margin-right:-5.8pt;
	margin-bottom:0in;
	margin-left:-3.35pt;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:13.0pt;
	font-family:"VNTime","sans-serif";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:VNTime;}
a:link, span.MsoHyperlink
	{mso-style-unhide:no;
	mso-style-locked:yes;
	color:blue;
	text-decoration:underline;
	text-underline:single;}
a:visited, span.MsoHyperlinkFollowed
	{mso-style-unhide:no;
	mso-style-locked:yes;
	color:purple;
	text-decoration:underline;
	text-underline:single;}
p.MsoDocumentMap, li.MsoDocumentMap, div.MsoDocumentMap
	{mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-link:"Document Map Char";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	background:navy;
	font-size:13.0pt;
	font-family:"Tahoma","sans-serif";
	mso-fareast-font-family:"Times New Roman";}
p.MsoAcetate, li.MsoAcetate, div.MsoAcetate
	{mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-locked:yes;
	mso-style-link:"Balloon Text Char";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:8.0pt;
	font-family:"Tahoma","sans-serif";
	mso-fareast-font-family:"Times New Roman";}
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
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:VNI-Times;}
span.Heading1Char
	{mso-style-name:"Heading 1 Char";
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Heading 1";
	mso-ansi-font-size:10.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:VNI-Times;
	mso-ascii-font-family:VNI-Times;
	mso-hansi-font-family:VNI-Times;
	mso-bidi-font-family:VNI-Times;
	font-weight:bold;
	text-decoration:underline;
	text-underline:single;}
span.Heading2Char
	{mso-style-name:"Heading 2 Char";
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Heading 2";
	mso-ansi-font-size:10.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:VNI-Times;
	mso-ascii-font-family:VNI-Times;
	mso-hansi-font-family:VNI-Times;
	mso-bidi-font-family:VNI-Times;
	font-weight:bold;
	text-decoration:underline;
	text-underline:single;}
span.Heading3Char
	{mso-style-name:"Heading 3 Char";
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Heading 3";
	mso-ansi-font-size:10.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:VNI-Times;
	mso-ascii-font-family:VNI-Times;
	mso-hansi-font-family:VNI-Times;
	mso-bidi-font-family:VNI-Times;
	font-weight:bold;}
span.Heading4Char
	{mso-style-name:"Heading 4 Char";
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Heading 4";
	mso-ansi-font-size:10.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:VNI-Times;
	mso-ascii-font-family:VNI-Times;
	mso-hansi-font-family:VNI-Times;
	mso-bidi-font-family:VNI-Times;
	color:black;
	layout-grid-mode:line;
	font-weight:bold;}
span.Heading5Char
	{mso-style-name:"Heading 5 Char";
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Heading 5";
	mso-ansi-font-size:10.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:VNI-Times;
	mso-ascii-font-family:VNI-Times;
	mso-hansi-font-family:VNI-Times;
	mso-bidi-font-family:VNI-Times;
	color:black;
	layout-grid-mode:line;
	font-weight:bold;}
span.Heading6Char
	{mso-style-name:"Heading 6 Char";
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Heading 6";
	mso-ansi-font-size:10.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:VNI-Times;
	mso-ascii-font-family:VNI-Times;
	mso-hansi-font-family:VNI-Times;
	mso-bidi-font-family:VNI-Times;
	font-weight:bold;}
span.Heading7Char
	{mso-style-name:"Heading 7 Char";
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Heading 7";
	mso-ansi-font-size:10.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:VNI-Times;
	mso-ascii-font-family:VNI-Times;
	mso-hansi-font-family:VNI-Times;
	mso-bidi-font-family:VNI-Times;
	font-weight:bold;}
span.Heading8Char
	{mso-style-name:"Heading 8 Char";
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Heading 8";
	mso-ansi-font-size:10.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:VNI-Times;
	mso-ascii-font-family:VNI-Times;
	mso-hansi-font-family:VNI-Times;
	mso-bidi-font-family:VNI-Times;
	color:black;
	layout-grid-mode:line;
	font-weight:bold;}
span.Heading9Char
	{mso-style-name:"Heading 9 Char";
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Heading 9";
	mso-ansi-font-size:10.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:VNI-Times;
	mso-ascii-font-family:VNI-Times;
	mso-hansi-font-family:VNI-Times;
	mso-bidi-font-family:VNI-Times;
	font-weight:bold;}
span.HeaderChar
	{mso-style-name:"Header Char";
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:Header;
	mso-ansi-font-size:10.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:VNI-Times;
	mso-ascii-font-family:VNI-Times;
	mso-hansi-font-family:VNI-Times;
	mso-bidi-font-family:VNI-Times;}
span.FooterChar
	{mso-style-name:"Footer Char";
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:Footer;
	mso-ansi-font-size:10.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:VNI-Times;
	mso-ascii-font-family:VNI-Times;
	mso-hansi-font-family:VNI-Times;
	mso-bidi-font-family:VNI-Times;}
span.BodyTextChar
	{mso-style-name:"Body Text Char";
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Body Text";
	mso-ansi-font-size:10.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:VNI-Times;
	mso-ascii-font-family:VNI-Times;
	mso-hansi-font-family:VNI-Times;
	mso-bidi-font-family:VNI-Times;}
span.DocumentMapChar
	{mso-style-name:"Document Map Char";
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Document Map";
	mso-ansi-font-size:10.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Tahoma","sans-serif";
	mso-ascii-font-family:Tahoma;
	mso-hansi-font-family:Tahoma;
	mso-bidi-font-family:Tahoma;
	background:navy;}
span.BodyText2Char
	{mso-style-name:"Body Text 2 Char";
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Body Text 2";
	mso-ansi-font-size:10.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"VNTime","sans-serif";
	mso-ascii-font-family:VNTime;
	mso-hansi-font-family:VNTime;
	mso-bidi-font-family:VNTime;}
span.BodyText3Char
	{mso-style-name:"Body Text 3 Char";
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Body Text 3";
	mso-ansi-font-size:10.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"VNTimeH","sans-serif";
	mso-ascii-font-family:VNTimeH;
	mso-hansi-font-family:VNTimeH;
	mso-bidi-font-family:VNTimeH;
	font-weight:bold;}
span.BodyTextIndentChar
	{mso-style-name:"Body Text Indent Char";
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Body Text Indent";
	mso-ansi-font-size:10.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"VNTime","sans-serif";
	mso-ascii-font-family:VNTime;
	mso-hansi-font-family:VNTime;
	mso-bidi-font-family:VNTime;}
span.TitleChar
	{mso-style-name:"Title Char";
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:Title;
	mso-ansi-font-size:10.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"VNTimeH","sans-serif";
	mso-ascii-font-family:VNTimeH;
	mso-hansi-font-family:VNTimeH;
	mso-bidi-font-family:VNTimeH;
	font-weight:bold;}
span.apple-style-span
	{mso-style-name:apple-style-span;
	mso-style-unhide:no;}
span.BalloonTextChar
	{mso-style-name:"Balloon Text Char";
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Balloon Text";
	mso-ansi-font-size:8.0pt;
	mso-bidi-font-size:8.0pt;
	font-family:"Tahoma","sans-serif";
	mso-ascii-font-family:Tahoma;
	mso-fareast-font-family:"Times New Roman";
	mso-hansi-font-family:Tahoma;
	mso-bidi-font-family:Tahoma;}
.MsoChpDefault
	{mso-style-type:export-only;
	mso-default-props:yes;
	mso-ascii-font-family:Calibri;
	mso-fareast-font-family:Calibri;
	mso-hansi-font-family:Calibri;}
 /* Page Definitions */
 @page
	{mso-footnote-separator:url("KIT-335_T6-2016_files/header.htm") fs;
	mso-footnote-continuation-separator:url("KIT-335_T6-2016_files/header.htm") fcs;
	mso-endnote-separator:url("KIT-335_T6-2016_files/header.htm") es;
	mso-endnote-continuation-separator:url("KIT-335_T6-2016_files/header.htm") ecs;}
@page Section1
	{size:595.35pt 842.0pt;
	margin:45.0pt .5in 40.5pt 45.0pt;
	mso-header-margin:.5in;
	mso-footer-margin:15.65pt;
	mso-footer:url("KIT-335_T6-2016_files/header.htm") f1;
	mso-paper-source:0;}
div.Section1
	{page:Section1;}
@page Section2
	{size:595.35pt 842.0pt;
	margin:40.5pt 28.1pt 13.6pt 70.55pt;
	mso-header-margin:.5in;
	mso-footer-margin:20.1pt;
	mso-footer:url("KIT-335_T6-2016_files/header.htm") f2;
	mso-paper-source:0;}
div.Section2
	{page:Section2;}
 /* List Definitions */
 @list l0
	{mso-list-id:144708887;
	mso-list-type:hybrid;
	mso-list-template-ids:1975026736 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l0:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Segoe UI","sans-serif";}
@list l0:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l0:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l0:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l0:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l0:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l0:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l0:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l0:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l1
	{mso-list-id:198325650;
	mso-list-template-ids:1373284020;}
@list l1:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	mso-ansi-font-weight:bold;
	mso-bidi-font-weight:bold;}
@list l1:level2
	{mso-level-legal-format:yes;
	mso-level-text:"%1\.%2";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:39.0pt;
	text-indent:-21.0pt;
	mso-ansi-font-weight:bold;
	mso-bidi-font-weight:bold;}
@list l1:level3
	{mso-level-legal-format:yes;
	mso-level-text:"%1\.%2\.%3";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.5in;
	mso-ansi-font-weight:bold;
	mso-bidi-font-weight:bold;}
@list l1:level4
	{mso-level-legal-format:yes;
	mso-level-text:"%1\.%2\.%3\.%4";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.5in;
	mso-ansi-font-weight:bold;
	mso-bidi-font-weight:bold;}
@list l1:level5
	{mso-level-legal-format:yes;
	mso-level-text:"%1\.%2\.%3\.%4\.%5";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.75in;
	mso-ansi-font-weight:bold;
	mso-bidi-font-weight:bold;}
@list l1:level6
	{mso-level-legal-format:yes;
	mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.25in;
	text-indent:-1.0in;
	mso-ansi-font-weight:bold;
	mso-bidi-font-weight:bold;}
@list l1:level7
	{mso-level-legal-format:yes;
	mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.25in;
	text-indent:-1.0in;
	mso-ansi-font-weight:bold;
	mso-bidi-font-weight:bold;}
@list l1:level8
	{mso-level-legal-format:yes;
	mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.5in;
	text-indent:-1.25in;
	mso-ansi-font-weight:bold;
	mso-bidi-font-weight:bold;}
@list l1:level9
	{mso-level-legal-format:yes;
	mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.5in;
	text-indent:-1.25in;
	mso-ansi-font-weight:bold;
	mso-bidi-font-weight:bold;}
@list l2
	{mso-list-id:212351905;
	mso-list-type:hybrid;
	mso-list-template-ids:-1286172924 67698689 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l2:level1
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l2:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l2:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l2:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l2:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l2:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l2:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l2:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l2:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l3
	{mso-list-id:307516515;
	mso-list-type:hybrid;
	mso-list-template-ids:-601471896 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l3:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Segoe UI","sans-serif";}
@list l3:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l3:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l3:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l3:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l3:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l3:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l3:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l3:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l4
	{mso-list-id:425271250;
	mso-list-type:hybrid;
	mso-list-template-ids:-1021384566 67698713 1007580060 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l4:level1
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l4:level2
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l4:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l4:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l4:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l4:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l4:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l4:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l4:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l5
	{mso-list-id:440417588;
	mso-list-type:hybrid;
	mso-list-template-ids:573624624 67698713 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l5:level1
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l5:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l5:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l5:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l5:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l5:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l5:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l5:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l5:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l6
	{mso-list-id:565804228;
	mso-list-type:hybrid;
	mso-list-template-ids:-2043501418 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l6:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Segoe UI","sans-serif";}
@list l6:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l6:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l6:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l6:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l6:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l6:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l6:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l6:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l7
	{mso-list-id:618148372;
	mso-list-type:hybrid;
	mso-list-template-ids:-282166522 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l7:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Segoe UI","sans-serif";}
@list l7:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l7:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l7:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l7:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l7:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l7:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l7:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l7:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l8
	{mso-list-id:782849263;
	mso-list-type:hybrid;
	mso-list-template-ids:1203139284 -1832880768 1712776884 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l8:level1
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	mso-ansi-font-weight:bold;
	mso-bidi-font-weight:bold;}
@list l8:level2
	{mso-level-start-at:2;
	mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-fareast-font-family:"Times New Roman";}
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
	{mso-list-id:916330241;
	mso-list-type:hybrid;
	mso-list-template-ids:1536867988 1007580060 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l9:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.25in;}
@list l9:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.25in;}
@list l9:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	margin-left:1.25in;
	text-indent:-9.0pt;}
@list l9:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.75in;
	text-indent:-.25in;}
@list l9:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.25in;
	text-indent:-.25in;}
@list l9:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	margin-left:2.75in;
	text-indent:-9.0pt;}
@list l9:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:3.25in;
	text-indent:-.25in;}
@list l9:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:3.75in;
	text-indent:-.25in;}
@list l9:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	margin-left:4.25in;
	text-indent:-9.0pt;}
@list l10
	{mso-list-id:954751789;
	mso-list-type:hybrid;
	mso-list-template-ids:1213472776 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l10:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Segoe UI","sans-serif";}
@list l10:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l10:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l10:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l10:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l10:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l10:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l10:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l10:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l11
	{mso-list-id:1023897208;
	mso-list-type:hybrid;
	mso-list-template-ids:-699522860 67698697 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l11:level1
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l11:level2
	{mso-level-number-format:bullet;

	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l11:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l11:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l11:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l11:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l11:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l11:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l11:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l12
	{mso-list-id:1264220165;
	mso-list-type:hybrid;
	mso-list-template-ids:-485305024 67698713 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l12:level1
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l12:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l12:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l12:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l12:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l12:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l12:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l12:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l12:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l13
	{mso-list-id:1343817520;
	mso-list-type:hybrid;
	mso-list-template-ids:-106647496 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l13:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Segoe UI","sans-serif";}
@list l13:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l13:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l13:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l13:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l13:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l13:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l13:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l13:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l14
	{mso-list-id:1429540574;
	mso-list-type:hybrid;
	mso-list-template-ids:-113444498 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l14:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Segoe UI","sans-serif";}
@list l14:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l14:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l14:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l14:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l14:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l14:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l14:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l14:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l15
	{mso-list-id:1484128657;
	mso-list-type:hybrid;
	mso-list-template-ids:484359456 1391332658 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l15:level1
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:63.0pt;
	text-indent:-.25in;}
@list l15:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:99.0pt;
	text-indent:-.25in;}
@list l15:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	margin-left:135.0pt;
	text-indent:-9.0pt;}
@list l15:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:171.0pt;
	text-indent:-.25in;}
@list l15:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:207.0pt;
	text-indent:-.25in;}
@list l15:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	margin-left:243.0pt;
	text-indent:-9.0pt;}
@list l15:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:279.0pt;
	text-indent:-.25in;}
@list l15:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:315.0pt;
	text-indent:-.25in;}
@list l15:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	margin-left:351.0pt;
	text-indent:-9.0pt;}
@list l16
	{mso-list-id:1518345912;
	mso-list-type:hybrid;
	mso-list-template-ids:1678557098 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l16:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Segoe UI","sans-serif";}
@list l16:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l16:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l16:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l16:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l16:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l16:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l16:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l16:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l17
	{mso-list-id:1577544246;
	mso-list-type:hybrid;
	mso-list-template-ids:-905287692 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l17:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Segoe UI","sans-serif";}
@list l17:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l17:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l17:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l17:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l17:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l17:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l17:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l17:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l18
	{mso-list-id:1670474548;
	mso-list-type:hybrid;
	mso-list-template-ids:45261044 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l18:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Segoe UI","sans-serif";}
@list l18:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l18:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l18:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l18:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l18:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l18:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l18:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l18:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l19
	{mso-list-id:1973290062;
	mso-list-template-ids:-1507425740;}
@list l19:level1
	{mso-level-start-at:5;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:19.5pt;
	text-indent:-19.5pt;
	mso-ansi-font-weight:bold;
	mso-bidi-font-weight:bold;}
@list l19:level2
	{mso-level-text:"%1\.%2\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.5in;}
@list l19:level3
	{mso-level-text:"%1\.%2\.%3\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.5in;}
@list l19:level4
	{mso-level-text:"%1\.%2\.%3\.%4\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.25in;
	text-indent:-.75in;}
@list l19:level5
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.75in;
	text-indent:-.75in;}
@list l19:level6
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:3.5in;
	text-indent:-1.0in;}
@list l19:level7
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:4.0in;
	text-indent:-1.0in;}
@list l19:level8
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:4.75in;
	text-indent:-1.25in;}
@list l19:level9
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:5.25in;
	text-indent:-1.25in;}
ol
	{margin-bottom:0in;}
ul
	{margin-bottom:0in;}
-->
</style>

</head>

<body lang=EN-US link=blue vlink=purple style='tab-interval:.5in'>

<div class=Section1>

<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 align=left
 width=694 style='width:520.4pt;border-collapse:collapse;border:none;
 mso-border-alt:solid windowtext .5pt;mso-yfti-tbllook:480;mso-table-lspace:
 9.0pt;margin-left:6.75pt;mso-table-rspace:9.0pt;margin-right:6.75pt;
 mso-table-anchor-vertical:paragraph;mso-table-anchor-horizontal:margin;
 mso-table-left:left;mso-table-top:6.7pt;mso-padding-alt:0in 5.4pt 0in 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:65.35pt'>
  <td width=694 style='width:520.4pt;border:solid windowtext 1.0pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:65.35pt'>
  <p class=MsoNormal style='mso-element:frame;mso-element-frame-hspace:9.0pt;
  mso-element-wrap:around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:
  margin;mso-element-top:6.7pt;mso-height-rule:exactly'>
  <![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:1;margin-left:-1px;margin-top:1px;width:108px;
  height:77px'><img width=108 height=77 src="KIT-335_T6-2016_files/image002.jpg"
  alt="Logo DVL" v:shapes="_x0000_s1048"></span><![endif]><b><span
  style='mso-spacerun:yes'>                           </span>LD VIỆT - NGA </b><b><span
  style='font-family:"Times New Roman","serif"'>VIETSOVPTRO</span></b><span
  style='font-family:"Times New Roman","serif"'><span
  style='mso-spacerun:yes'>                   </span>Add :<span
  style='mso-spacerun:yes'>  </span>105 LÊ LỢI<o:p></o:p></span></p>
  <p class=MsoNormal style='mso-element:frame;mso-element-frame-hspace:9.0pt;
  mso-element-wrap:around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:
  margin;mso-element-top:6.7pt;mso-height-rule:exactly'><span style='font-family:
  "Times New Roman","serif"'><span
  style='mso-spacerun:yes'>                           </span><b>XN ĐỊA VẬT LÝ
  G/K</b><span style='mso-spacerun:yes'>                                      
  </span>Vũng Tàu - VN<o:p></o:p></span></p>
  <p class=MsoNormal style='mso-element:frame;mso-element-frame-hspace:9.0pt;
  mso-element-wrap:around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:
  margin;mso-element-top:6.7pt;mso-height-rule:exactly'><span style='font-family:
  "Times New Roman","serif"'><span
  style='mso-spacerun:yes'>                           </span><b>Logging &amp;
  Testing Division</b><span style='mso-spacerun:yes'>                </span><span
  style='mso-spacerun:yes'>               </span>Tel :<span
  style='mso-spacerun:yes'>    </span>064- 3839871<o:p></o:p></span></p>
  <p class=MsoNormal style='mso-element:frame;mso-element-frame-hspace:9.0pt;
  mso-element-wrap:around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:
  margin;mso-element-top:6.7pt;mso-height-rule:exactly'><span style='font-family:
  "Times New Roman","serif"'><span
  style='mso-spacerun:yes'>                                                                                                         
  </span>Fax:<span style='mso-spacerun:yes'>    </span>064- 3839857</span><span
  style='mso-bidi-font-family:"Times New Roman"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes;height:606.0pt'>
  <td width=694 valign=top style='width:520.4pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:606.0pt'>
  <p class=MsoNormal style='mso-element:frame;mso-element-frame-hspace:9.0pt;
  mso-element-wrap:around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:
  margin;mso-element-top:6.7pt;mso-height-rule:exactly'><span style='mso-bidi-font-family:
  "Times New Roman"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='line-height:115%;tab-stops:143.15pt center 254.8pt;
  mso-element:frame;mso-element-frame-hspace:9.0pt;mso-element-wrap:around;
  mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:margin;
  mso-element-top:6.7pt;mso-height-rule:exactly'><b><span style='font-size:
  19.0pt;line-height:115%;mso-bidi-font-family:"Times New Roman"'><span
  style='mso-tab-count:1'>                                </span></span></b><b><span
  style='font-size:18.0pt;line-height:115%;mso-bidi-font-family:"Times New Roman"'><span
  style='mso-tab-count:1'>  </span></span></b><b><span style='font-size:18.0pt;
  line-height:115%;font-family:"Times New Roman","serif"'>BIÊN BẢN CHUẨN MÁY<o:p></o:p></span></b></p>
  <p class=MsoNormal align=center style='text-align:center;line-height:115%;
  mso-element:frame;mso-element-frame-hspace:9.0pt;mso-element-wrap:around;
  mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:margin;
  mso-element-top:6.7pt;mso-height-rule:exactly'>AKT <span lang=RU
  style='font-family:"Times New Roman","serif";mso-ansi-language:RU'>ЭТАЛОНИРОВКИ</span><span
  lang=RU> </span><span lang=RU style='font-family:"Times New Roman","serif";
  mso-ansi-language:RU'>АППАРАТУРЫ</span><span style='mso-bidi-font-family:
  "Times New Roman"'><o:p></o:p></span></p>
  <p class=MsoNormal align=center style='text-align:center;line-height:115%;
  mso-element:frame;mso-element-frame-hspace:9.0pt;mso-element-wrap:around;
  mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:margin;
  mso-element-top:6.7pt;mso-height-rule:exactly'><b>Số hồ sơ </b></span>: </b><b><span
  style='font-family:"Times","serif"'>№ </b><?php echo $sohoso; ?> </span></p><br/>
  <p class=MsoNormal style='line-height:150%;mso-element:frame;mso-element-frame-hspace:
  9.0pt;mso-element-wrap:around;mso-element-anchor-vertical:paragraph;
  mso-element-anchor-horizontal:margin;mso-element-top:6.7pt;mso-height-rule:
  exactly'>1 . <span style='font-family:"Times New Roman","serif"'>Tên thiết bị
  / </span><span lang=RU style='font-family:"Times New Roman","serif";
  mso-ansi-language:RU'>Оборудование</span><span style='font-family:"Times New Roman","serif"'>:
  <b><?php echo $tentb; ?></b><o:p></o:p></span></p>
  <p class=MsoNormal style='line-height:150%;mso-element:frame;mso-element-frame-hspace:
  9.0pt;mso-element-wrap:around;mso-element-anchor-vertical:paragraph;
  mso-element-anchor-horizontal:margin;mso-element-top:6.7pt;mso-height-rule:
  exactly'><span lang=RU style='font-family:"Times New Roman","serif";
  mso-ansi-language:RU'>2 . Nước / Hãng sản xuất / Страна
  – Производства : <span style='font-family:"Times New Roman","serif"'> <?php echo $hangsx; ?></span></st1:country-region></st1:place>
  </p>
 <p class=MsoNormal style='line-height:150%;mso-element:frame;mso-element-frame-hspace:
  9.0pt;mso-element-wrap:around;mso-element-anchor-vertical:paragraph;
  mso-element-anchor-horizontal:margin;mso-element-top:6.7pt;mso-height-rule:
  exactly'><span lang=RU style='font-family:"Times New Roman","serif";
  mso-ansi-language:RU'>3 . Kiểu / Тип: <span style='mso-spacerun:yes'>  <?php echo $tenviettat; ?>__________<span
  style='mso-spacerun:yes'>  </span>№  <?php echo $somay; ?><o:p></o:p></span></p>
  <p class=MsoNormal style='line-height:150%;mso-element:frame;mso-element-frame-hspace:
  9.0pt;mso-element-wrap:around;mso-element-anchor-vertical:paragraph;
  mso-element-anchor-horizontal:margin;mso-element-top:6.7pt;mso-height-rule:
  exactly'><span lang=RU style='font-family:"Times New Roman","serif";
  mso-ansi-language:RU'>4 . Chủ thiết bị / Отряд: </span><span
  style='font-family:"Times New Roman","serif"'><?php echo $tensohuu; ?><o:p></o:p></span></p>
  <p class=MsoNormal style='line-height:150%;mso-element:frame;mso-element-frame-hspace:
  9.0pt;mso-element-wrap:around;mso-element-anchor-vertical:paragraph;
  mso-element-anchor-horizontal:margin;mso-element-top:6.7pt;mso-height-rule:
  exactly'><span lang=RU style='font-family:"Times New Roman","serif";
  mso-ansi-language:RU'>5 . Phương pháp chuẩn / Метр .Метод: &nbsp;&nbsp;&nbsp;&nbsp;Dẫn</span><span
  style='font-family:"Times New Roman","serif";mso-ansi-language:RU'> </span><span
  style='font-family:"Times New Roman","serif"'>chuẩn</span><span lang=RU
  style='font-family:"Times New Roman","serif";mso-ansi-language:RU'>: <span
  style='mso-spacerun:yes'>  </span></span><span lang=RU style='font-family:
  Wingdings;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:"Times New Roman";
  mso-bidi-font-family:"Times New Roman";mso-ansi-language:RU;mso-char-type:
  symbol;mso-symbol-font-family:Wingdings'><span style='mso-char-type:symbol;
  mso-symbol-font-family:Wingdings'>¨</span></span><span lang=RU
  style='font-family:"Times New Roman","serif";mso-ansi-language:RU'><span
  style='mso-spacerun:yes'>        </span></span><span style='font-family:"Times New Roman","serif"'>Chuẩn qua mẫu chuẩn: </span><span lang=RU
  style='font-family:Wingdings;mso-ascii-font-family:"Times New Roman";
  mso-hansi-font-family:"Times New Roman";mso-bidi-font-family:"Times New Roman";
  mso-ansi-language:RU;mso-char-type:symbol;mso-symbol-font-family:Wingdings'><span
  style='mso-char-type:symbol;mso-symbol-font-family:Wingdings'>¨</span></span><span
  lang=RU style='font-family:"Times New Roman","serif";mso-ansi-language:RU'><span
  style='mso-spacerun:yes'>  </span><o:p></o:p></span></p>
  <p class=MsoNormal style='line-height:150%;mso-element:frame;mso-element-frame-hspace:
  9.0pt;mso-element-wrap:around;mso-element-anchor-vertical:paragraph;
  mso-element-anchor-horizontal:margin;mso-element-top:6.7pt;mso-height-rule:
  exactly'><span lang=RU style='font-family:"Times New Roman","serif";
  mso-ansi-language:RU'>                                                                    
  </span>Định kỳ</span><span lang=RU
  style='font-family:"Times New Roman","serif";mso-ansi-language:RU'> : <span
  style='mso-spacerun:yes'> </span></span><span style='font-family:"Times New Roman","serif"'><span
  style='mso-spacerun:yes'>    </span></span><span lang=RU style='font-family:
  Wingdings;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:"Times New Roman";
  mso-bidi-font-family:"Times New Roman";mso-ansi-language:RU;mso-char-type:
  symbol;mso-symbol-font-family:Wingdings'><span style='mso-char-type:symbol;
  mso-symbol-font-family:Wingdings'>¨</span></span><span lang=RU
  style='font-family:"Times New Roman","serif";mso-ansi-language:RU'><span
  style='mso-spacerun:yes'>  </span><span style='mso-spacerun:yes'>  </span><span
  style='mso-spacerun:yes'>   </span></span><span lang=RU style='font-family:
  "Times New Roman","serif"'><span style='mso-spacerun:yes'> </span></span><span
  lang=RU style='font-family:"Times New Roman","serif";mso-ansi-language:RU'><span
  style='mso-spacerun:yes'> </span>Đột xuất</span><span lang=RU
  style='font-family:"Times New Roman","serif";mso-ansi-language:RU'> :<span
  style='mso-spacerun:yes'>                     </span></span><span lang=RU
  style='font-family:Wingdings;mso-ascii-font-family:"Times New Roman";
  mso-hansi-font-family:"Times New Roman";mso-bidi-font-family:"Times New Roman";
  mso-ansi-language:RU;mso-char-type:symbol;mso-symbol-font-family:Wingdings'><span
  style='mso-char-type:symbol;mso-symbol-font-family:Wingdings'>¨</span></span><span
  lang=RU style='font-family:"Times New Roman","serif";mso-ansi-language:RU'><span
  style='mso-spacerun:yes'>  </span><o:p></o:p></span></p>
  <p class=MsoNormal style='line-height:150%;mso-element:frame;mso-element-frame-hspace:
  9.0pt;mso-element-wrap:around;mso-element-anchor-vertical:paragraph;
  mso-element-anchor-horizontal:margin;mso-element-top:6.7pt;mso-height-rule:
  exactly'><span lang=RU style='font-family:"Times New Roman","serif";
  mso-ansi-language:RU'>6.Thiết bị dẫn chuẩn, mẫu chuẩn / Образцовая
  аппаратура<i> </i>: Thiết bị đo này được chuẩn bằng cách so sánh / đo trong các mẫu chuẩn được truyền chuẩn từ chuẩn Quốc tế:<o:p></o:p></span></p>
  <p class=MsoNormal style='line-height:150%;mso-element:frame;mso-element-frame-hspace:
  9.0pt;mso-element-wrap:around;mso-element-anchor-vertical:paragraph;
  mso-element-anchor-horizontal:margin;mso-element-top:6.7pt;mso-height-rule:
  exactly'><span lang=RU style='font-family:"Times New Roman","serif";
  mso-ansi-language:RU'>
  <?php for($i=1;$i<=5;$i++){ 
  if($thietbidc[$i]!=""){
  ?>
  6.<?php echo $i;?>. </span><span style='font-family:"Times New Roman","serif"'><?php echo $tenthietbidc[$i];?>&nbsp;&nbsp;<?php echo $tendc[$i];?>: № <?php echo $smdc[$i];?> theo chuẩn ngày <?php if(isset($ngaydc[$i])){echo date("d/m/Y", strtotime($ngaydc[$i]));}?></span></p>
  <?php }} ?>
  <p class=MsoNormal style='line-height:150%;mso-element:frame;mso-element-frame-hspace:
  9.0pt;mso-element-wrap:around;mso-element-anchor-vertical:paragraph;
  mso-element-anchor-horizontal:margin;mso-element-top:6.7pt;mso-height-rule:
  exactly'><span style='font-family:"Times New Roman","serif"'>7 . Điều kiện chuẩn
  / Условие провед калибровки <span
  style='mso-spacerun:yes'>    </span></span></i><span style='font-family:"Times New Roman","serif"'>+
  Nhiệt độ môi trường (26±2)°C<o:p></o:p></span></p>
  <p class=MsoNormal style='line-height:150%;mso-element:frame;mso-element-frame-hspace:
  9.0pt;mso-element-wrap:around;mso-element-anchor-vertical:paragraph;
  mso-element-anchor-horizontal:margin;mso-element-top:6.7pt;mso-height-rule:
  exactly'><span style='font-family:"Times New Roman","serif"'><span
  style='mso-spacerun:yes'>                                                                                       
  </span></span><span lang=RU style='font-family:"Times New Roman","serif";
  mso-ansi-language:RU'>+ Áp suất môi trường : Môi trường</span></p>
  <p class=MsoNormal style='line-height:150%;mso-element:frame;mso-element-frame-hspace:
  9.0pt;mso-element-wrap:around;mso-element-anchor-vertical:paragraph;
  mso-element-anchor-horizontal:margin;mso-element-top:6.7pt;mso-height-rule:
  exactly'><span lang=RU style='font-family:"Times New Roman","serif";
  mso-ansi-language:RU'>8 . Ngày chuẩn / Дата : <?php echo $ngayth; ?><o:p></o:p></span></p>
  <p class=MsoNormal style='line-height:150%;mso-element:frame;mso-element-frame-hspace:
  9.0pt;mso-element-wrap:around;mso-element-anchor-vertical:paragraph;
  mso-element-anchor-horizontal:margin;mso-element-top:6.7pt;mso-height-rule:
  exactly'><span lang=RU style='font-family:"Times New Roman","serif";
  mso-ansi-language:RU'>9 . Nơi chuẩn  / Место
  проведения : <?php if($noithuchien=="XSCCMDVL"){echo "XN Địa vật lý GK";} ?></span></p>
  <p class=MsoNormal style='line-height:150%;mso-element:frame;mso-element-frame-hspace:
  9.0pt;mso-element-wrap:around;mso-element-anchor-vertical:paragraph;
  mso-element-anchor-horizontal:margin;mso-element-top:6.7pt;mso-height-rule:
  exactly'><span lang=RU style='font-family:"Times New Roman","serif";
  mso-ansi-language:RU'>10. Người chuẩn máy /
  Ответственный испольнитель : <?php echo mb_convert_case($nhanvien, MB_CASE_TITLE,"UTF-8"); ?></span></p>
  <p class=MsoNormal style='line-height:150%;mso-element:frame;mso-element-frame-hspace:
  9.0pt;mso-element-wrap:around;mso-element-anchor-vertical:paragraph;
  mso-element-anchor-horizontal:margin;mso-element-top:6.7pt;mso-height-rule:
  exactly'><span lang=RU style='font-family:"Times New Roman","serif";
  mso-ansi-language:RU'>11. Kết quả chuẩn: (Có tài liệu kèm theo) Có hồ sơ kèm theo</span></p>
  <p class=MsoNormal style='line-height:150%;mso-element:frame;mso-element-frame-hspace:
  9.0pt;mso-element-wrap:around;mso-element-anchor-vertical:paragraph;
  mso-element-anchor-horizontal:margin;mso-element-top:6.7pt;mso-height-rule:
  exactly'><span lang=RU style='font-family:"Times New Roman","serif";
  mso-ansi-language:RU'><span style='mso-spacerun:yes'>     </span></span><b><span
  style='font-family:"Times New Roman","serif"'>Kết luận : Đạt</b> </span></p>
  <p class=MsoNormal style='mso-element:frame;mso-element-frame-hspace:9.0pt;
  mso-element-wrap:around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:
  margin;mso-element-top:6.7pt;mso-height-rule:exactly'><span lang=RU
  style='font-family:"Times New Roman","serif";mso-ansi-language:RU'><span
  style='mso-spacerun:yes'>       </span></span><b><span style='font-family:
  "Times New Roman","serif"'>Người kiểm tra </b> / Контролер<span
  style='mso-spacerun:yes'>                                          </span></span><b><span
  style='font-family:"Times New Roman","serif"'><span style='font-family:"Times New Roman","serif"'>Người chuẩn máy  </b>/
  Испольнитель <o:p></o:p></span></p>
  <p class=MsoNormal style='mso-element:frame;mso-element-frame-hspace:9.0pt;
  mso-element-wrap:around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:
  margin;mso-element-top:6.7pt;mso-height-rule:exactly'><span lang=RU
  style='font-family:"Times New Roman","serif";mso-ansi-language:RU'><span
  style='mso-spacerun:yes'>              </span><span
  style='mso-spacerun:yes'> </span>(Chữ ký, họ tên)<span
  style='mso-spacerun:yes'>                                                                   
  </span>(Chữ ký, họ tên)<span
  style='mso-spacerun:yes'>                   </span><o:p></o:p></span></p>
  <p class=MsoNormal style='mso-element:frame;mso-element-frame-hspace:9.0pt;
  mso-element-wrap:around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:
  margin;mso-element-top:6.7pt;mso-height-rule:exactly'><span style='font-family:
  "Times New Roman","serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal align=center style='text-align:center;mso-element:frame;
  mso-element-frame-hspace:9.0pt;mso-element-wrap:around;mso-element-anchor-vertical:
  paragraph;mso-element-anchor-horizontal:margin;mso-element-top:6.7pt;
  mso-height-rule:exactly'><span style='font-family:"Times New Roman","serif"'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='mso-element:frame;mso-element-frame-hspace:9.0pt;
  mso-element-wrap:around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:
  margin;mso-element-top:6.7pt;mso-height-rule:exactly'><span style='mso-bidi-font-family:
  "Times New Roman"'><span style='mso-spacerun:yes'>                </span></span><span
  style='font-family:"Times New Roman","serif"'>Vũ Anh Đức<span
  style='mso-spacerun:yes'>                                              
  </span><span style='mso-spacerun:yes'>                 </span><span
  style='mso-spacerun:yes'> </span><span style='mso-spacerun:yes'> </span><span
  style='mso-spacerun:yes'> </span><span style='mso-spacerun:yes'>      </span><?php echo mb_convert_case($nhanvien, MB_CASE_TITLE,"UTF-8"); ?><o:p></o:p></span></p>
  <p class=MsoNormal style='tab-stops:138.15pt;mso-element:frame;mso-element-frame-hspace:
  9.0pt;mso-element-wrap:around;mso-element-anchor-vertical:paragraph;
  mso-element-anchor-horizontal:margin;mso-element-top:6.7pt;mso-height-rule:
  exactly'><span style='mso-spacerun:yes'>                    </span><span
  style='mso-spacerun:yes'>      </span><span style='mso-tab-count:1'>                    </span><span
  style='mso-bidi-font-family:"Times New Roman"'><o:p></o:p></span></p>
  <p class=MsoNormal style='mso-element:frame;mso-element-frame-hspace:9.0pt;
  mso-element-wrap:around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:
  margin;mso-element-top:6.7pt;mso-height-rule:exactly'><span
  style='mso-spacerun:yes'>                                      </span></p>
  </td>
 </tr>
</table>

</div>
<p class=MsoNormal>BM.14.04</p>

<p class=MsoNormal>02/01/2014</p>
<span style='font-size:13.0pt;font-family:VNI-Times;mso-fareast-font-family:
"Times New Roman";mso-bidi-font-family:"Times New Roman";mso-ansi-language:
EN-US;mso-fareast-language:EN-US;mso-bidi-language:AR-SA'><br clear=all
style='page-break-before:always;mso-break-type:section-break'>
</span>

<div class=Section2>


<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal style='tab-stops:300.75pt'><span style='mso-tab-count:1'>                                                                                                    </span></p>

</div>

</body>

</html>


<?php }else{ ?>
<center>
<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
xmlns:st1="urn:schemas-microsoft-com:office:smarttags"
xmlns="http://www.w3.org/TR/REC-html40">
<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 12">
<meta name=Originator content="Microsoft Word 12">
<link rel=File-List href="&#272;H%20S&#7889;%20Fluke%201587-T6-2016_files/filelist.xml">
<link rel=Edit-Time-Data
href="&#272;H%20S&#7889;%20Fluke%201587-T6-2016_files/editdata.mso">

<link rel=themeData href="&#272;H%20S&#7889;%20Fluke%201587-T6-2016_files/themedata.thmx">
<link rel=colorSchemeMapping
href="&#272;H%20S&#7889;%20Fluke%201587-T6-2016_files/colorschememapping.xml">

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
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:-536870145 1107305727 0 0 415 0;}
@font-face
	{font-family:Tahoma;
	panose-1:2 11 6 4 3 5 4 4 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-520081665 -1073717157 41 0 66047 0;}
@font-face
	{font-family:VNI-Times;
	panose-1:0 0 0 0 0 0 0 0 0 0;
	mso-font-charset:0;
	mso-generic-font-family:auto;
	mso-font-pitch:variable;
	mso-font-signature:7 0 0 0 19 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";}
p.MsoHeader, li.MsoHeader, div.MsoHeader
	{mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-link:"Header Char";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	tab-stops:center 3.25in right 6.5in;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";}
p.MsoFooter, li.MsoFooter, div.MsoFooter
	{mso-style-priority:99;
	mso-style-link:"Footer Char";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	tab-stops:center 3.25in right 6.5in;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";}
p.MsoAcetate, li.MsoAcetate, div.MsoAcetate
	{mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-link:"Balloon Text Char";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:8.0pt;
	font-family:"Tahoma","sans-serif";
	mso-fareast-font-family:"Times New Roman";}
span.HeaderChar
	{mso-style-name:"Header Char";
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:Header;
	mso-ansi-font-size:12.0pt;
	mso-bidi-font-size:12.0pt;}
span.FooterChar
	{mso-style-name:"Footer Char";
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:Footer;
	mso-ansi-font-size:12.0pt;
	mso-bidi-font-size:12.0pt;}
span.BalloonTextChar
	{mso-style-name:"Balloon Text Char";
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Balloon Text";
	mso-ansi-font-size:8.0pt;
	mso-bidi-font-size:8.0pt;
	font-family:"Tahoma","sans-serif";
	mso-ascii-font-family:Tahoma;
	mso-hansi-font-family:Tahoma;
	mso-bidi-font-family:Tahoma;}
 /* Page Definitions */
 @page
	{mso-footnote-separator:url("\0110H%20S\1ED1%20Fluke%201587-T6-2016_files/header.htm") fs;
	mso-footnote-continuation-separator:url("\0110H%20S\1ED1%20Fluke%201587-T6-2016_files/header.htm") fcs;
	mso-endnote-separator:url("\0110H%20S\1ED1%20Fluke%201587-T6-2016_files/header.htm") es;
	mso-endnote-continuation-separator:url("\0110H%20S\1ED1%20Fluke%201587-T6-2016_files/header.htm") ecs;}
@page Section1
	{size:595.35pt 842.0pt;
	margin:1.0in 1.0in 4.5pt 1.0in;
	mso-header-margin:.5in;
	mso-footer-margin:.5in;
	mso-footer:url("\0110H%20S\1ED1%20Fluke%201587-T6-2016_files/header.htm") f1;
	mso-paper-source:0;}
div.Section1
	{page:Section1;}
-->
</style>

</head>

<body lang=EN-US style='tab-interval:.5in'>

<div class=Section1>
<form method="post" action="bangcanhbao.php" enctype="multipart/form-data">

<p class=MsoNormal><span style='font-family:VNI-Times'><o:p>&nbsp;</o:p></span></p>
<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 width=673
 style='width:504.9pt;border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
 mso-yfti-tbllook:480;mso-padding-alt:0in 5.4pt 0in 5.4pt;mso-border-insideh:
 .5pt solid windowtext;mso-border-insidev:.5pt solid windowtext'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:65.35pt'>
  <td width=673 style='width:504.9pt;border:solid windowtext 1.0pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:65.35pt'>
  <p class=MsoNormal><!--[if gte vml 1]><v:shapetype id="_x0000_t75"
   coordsize="21600,21600" o:spt="75" o:preferrelative="t" path="m@4@5l@4@11@9@11@9@5xe"
   filled="f" stroked="f">
   <v:stroke joinstyle="miter"/>
   <v:formulas>
    <v:f eqn="if lineDrawn pixelLineWidth 0"/>
    <v:f eqn="sum @0 1 0"/>
    <v:f eqn="sum 0 0 @1"/>
    <v:f eqn="prod @2 1 2"/>
    <v:f eqn="prod @3 21600 pixelWidth"/>
    <v:f eqn="prod @3 21600 pixelHeight"/>
    <v:f eqn="sum @0 0 1"/>
    <v:f eqn="prod @6 1 2"/>
    <v:f eqn="prod @7 21600 pixelWidth"/>
    <v:f eqn="sum @8 21600 0"/>
    <v:f eqn="prod @7 21600 pixelHeight"/>
    <v:f eqn="sum @10 21600 0"/>
   </v:formulas>
   <v:path o:extrusionok="f" gradientshapeok="t" o:connecttype="rect"/>
   <o:lock v:ext="edit" aspectratio="t"/>
  </v:shapetype><v:shape id="_x0000_s1027" type="#_x0000_t75" alt="Logo DVL"
   style='position:absolute;margin-left:.25pt;margin-top:2.7pt;width:81.35pt;
   height:57.75pt;z-index:1;visibility:visible'>
   <v:imagedata src="&#272;H%20S&#7889;%20Fluke%201587-T6-2016_files/image001.png"
    o:title=""/>
  </v:shape><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:1;margin-left:1px;margin-top:4px;width:108px;
  height:77px'><img width=108 height=77
  src="&#272;H%20S&#7889;%20Fluke%201587-T6-2016_files/image002.jpg"
  alt="Logo DVL" v:shapes="_x0000_s1027"></span><![endif]><b><span
  style='mso-spacerun:yes'>                           </span>LD VI&#7878;T - NGA
  VIETSOVPTRO</b><span style='mso-spacerun:yes'>                    </span>Add
  :<span style='mso-spacerun:yes'>  </span>105 LÊ L&#7906;I</p>
  <p class=MsoNormal><span style='mso-spacerun:yes'>                          
  </span><b>XN &#272;&#7882;A V&#7852;T LÝ G/K</b><span
  style='mso-spacerun:yes'>                                        </span>V&#361;ng
  Tàu - VN</p>
  <p class=MsoNormal><span style='mso-spacerun:yes'>                          
  </span><b>Logging &amp; Testing Division</b><span
  style='mso-spacerun:yes'>             </span><span
  style='mso-spacerun:yes'>                  </span><span
  style='mso-spacerun:yes'> </span>Tel :<span style='mso-spacerun:yes'>   
  </span>064- 3839871</p>
  <p class=MsoNormal><span
  style='mso-spacerun:yes'>                                                                         
  </span><span style='mso-spacerun:yes'>                              </span><span
  style='mso-spacerun:yes'> </span><span style='mso-spacerun:yes'> </span>Fax:<span
  style='mso-spacerun:yes'>    </span>064- 3839857</p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes;height:570.4pt'>
  <td width=673 valign=top style='width:504.9pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:570.4pt'>
  <p class=MsoNormal><b><span style='font-size:17.0pt'><o:p>&nbsp;</o:p></span></b></p>
  <p class=MsoNormal align=center style='text-align:center;line-height:115%'><b><span
  style='font-size:18.0pt;line-height:115%'>CH&#7912;NG NH&#7852;N HI&#7878;U
  CHU&#7848;N<o:p></o:p></span></b></p>
  <p class=MsoNormal align=center style='text-align:center;line-height:115%'><span
  style='font-size:15.0pt;line-height:115%'>CERTIFICATE OF<span
  style='mso-spacerun:yes'>  </span>CALIBRATION<o:p></o:p></span></p>
  <p class=MsoNormal align=center style='text-align:center;line-height:115%'><b>S&#7889;
  h&#7891; s&#417;: </b><?php echo $sohoso; ?><b><o:p></o:p></b></p>
  <p class=MsoNormal align=center style='text-align:center'><o:p>&nbsp;</o:p></p>
  <p class=MsoNormal>1. Ph&#432;&#417;ng ti&#7879;n &#273;o / <i>Instrument</i>
  : ………<b> <?php echo $tentb; ?></b></p>
  <p class=MsoNormal style='line-height:115%'>2<i>. </i>N&#432;&#7899;c / Hãng
  s&#7843;n xu&#7845;t / <i>Manufacture …<st1:country-region w:st="on"><st1:place
   w:st="on"><?php echo $hangsx; ?></st1:place></st1:country-region></i></p>
  <p class=MsoNormal style='line-height:115%'>3. Ki&#7875;u / <i>Type</i>
  :<span style='mso-spacerun:yes'>  </span><?php echo $tenviettat; ?>……………… S&#7889;/ Serial <span
  style='font-size:11.0pt;line-height:115%'>&#8470;:</span> <?php echo $somay; ?></p>
  <p class=MsoNormal style='line-height:115%'>4. Ch&#7911; ph&#432;&#417;ng
  ti&#7879;n <i>/ Client</i> :………<?php echo $tensohuu; if($chush!=""){?>(<?php echo $chush; ?>) <?php } ?></p>
 <p class=MsoNormal style='line-height:115%'>5. Ph&#432;&#417;ng pháp
  chu&#7849;n / <i>Method of calibration </i>: D&#7851;n chu&#7849;n : <span
  style='font-family:Wingdings;mso-ascii-font-family:"Times New Roman";
  mso-hansi-font-family:"Times New Roman";mso-char-type:symbol;mso-symbol-font-family:
  Wingdings'><span style='mso-char-type:symbol;mso-symbol-font-family:Wingdings'>¨</span></span><span
  style='mso-spacerun:yes'>          </span>Chu&#7849;n qua m&#7851;u
  chu&#7849;n : <span style='font-family:Wingdings;mso-ascii-font-family:"Times New Roman";
  mso-hansi-font-family:"Times New Roman";mso-char-type:symbol;mso-symbol-font-family:
  Wingdings'><span style='mso-char-type:symbol;mso-symbol-font-family:Wingdings'>¨</span></span><span
  lang=EN-GB style='mso-ansi-language:EN-GB'><o:p></o:p></span></p>
  <p class=MsoNormal style='line-height:115%'><span
  style='mso-spacerun:yes'>                                             
  </span><span style='mso-spacerun:yes'>                               </span>&#272;&#7883;nh
  k&#7923; :<span style='mso-spacerun:yes'>     </span><span style='font-family:
  Wingdings;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:"Times New Roman";
  mso-char-type:symbol;mso-symbol-font-family:Wingdings'><span
  style='mso-char-type:symbol;mso-symbol-font-family:Wingdings'>¨</span></span><span
  style='mso-spacerun:yes'>          </span>&#272;&#7897;t xu&#7845;t :<span
  style='mso-spacerun:yes'>                      </span><span
  style='mso-spacerun:yes'> </span><span style='font-family:Wingdings;
  mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:"Times New Roman";
  mso-char-type:symbol;mso-symbol-font-family:Wingdings'><span
  style='mso-char-type:symbol;mso-symbol-font-family:Wingdings'>¨</span></span><span
  lang=EN-GB style='mso-ansi-language:EN-GB'><o:p></o:p></span></p>
  <p class=MsoNormal style='line-height:115%'>6. Thi&#7871;t b&#7883; d&#7851;n
  chu&#7849;n, m&#7851;u chu&#7849;n / <i>Means of calibration </i>:
  Ph&#432;&#417;ng ti&#7879;n &#273;o này &#273;&#432;&#7907;c hi&#7879;u
  chu&#7849;n b&#7857;ng cách so sánh v&#7899;i thi&#7871;t b&#7883;
  chu&#7849;n &#273;&#432;&#7907;c truy&#7873;n chu&#7849;n t&#7915;
  chu&#7849;n Qu&#7889;c gia / Qu&#7889;c t&#7871; :</p>
  <p class=MsoNormal>
  <?php for($i=1;$i<=5;$i++) { 
  if($thietbidc[$i]!=""){
  ?>
  6.<?php echo $i; ?> <span style='font-size:11.0pt;font-family:VNI-Times'><span
  style='mso-spacerun:yes'> </span></span><span style='font-size:11.0pt'>Theo
  chu&#7849;n <?php if(isset($tenthietbidc[$i])){ echo $tenthietbidc[$i];} ?>&nbsp;<?php if(isset($tendc[$i])){ echo $tendc[$i]; } ?>-<span
  style='mso-spacerun:yes'>No:<?php if(isset($smdc[$i])){ echo $smdc[$i]; } ?>  </span>-<?php if(isset($noidc[$i])){ echo $noidc[$i]; } ?>&nbsp;HC&nbsp;<?php if(isset($ngaydc[$i])){ echo date("d/m/Y", strtotime($ngaydc[$i])); } ?>  <o:p></o:p></span></p>
  <?php }} ?>
  <p class=MsoNormal style='line-height:115%'>7 . &#272;i&#7873;u ki&#7879;n
  môi tr&#432;&#7901;ng <i>/ Environment condition&nbsp;</i>:</p>
  <p class=MsoNormal><span
  style='mso-spacerun:yes'>                                                                                
  </span>+ Nhi&#7879;t &#273;&#7897; / <i>Ambient temperature:</i><span
  lang=FR style='mso-ansi-language:FR'> (26 ± 2)°C<o:p></o:p></span></p>
  <p class=MsoNormal style='line-height:115%'><span
  style='mso-spacerun:yes'>                 </span><span
  style='mso-spacerun:yes'>                                                                </span>+
  &#272;&#7897; &#7849;m <i>/ Humidity</i>&nbsp;:<span lang=FR
  style='mso-ansi-language:FR'> (64 ± 2)% </span></p>
  <p class=MsoNormal style='line-height:115%'>8 . S&#7889; li&#7879;u thu
  &#273;&#432;&#7907;c và sai s&#7889; cho phép / <i>Results of calibration</i>&nbsp;:
  B&#7843;ng k&#7871;t qu&#7843; kèm theo / <i>Results of</i> <i>calibration&nbsp;attached</i>
  </p>
  <p class=MsoNormal style='line-height:115%'>9 . Ngày hi&#7879;u chu&#7849;n /
  <i>Date of calibration</i><span style='mso-bidi-font-style:italic'>: <?php echo $ngayth; ?></span></p>
  <p class=MsoNormal style='line-height:115%'>10. Ngày hi&#7879;u chu&#7849;n
  ti&#7871;p theo / <i>Recalibration date: </i><span style='mso-bidi-font-style:
  italic'><?php echo date("d/m/Y", strtotime($ngaythtt)); ?></span></p>
  <p class=MsoNormal style='line-height:115%'>11. N&#417;i hi&#7879;u
  chu&#7849;n / <i>Place of calibration</i>: <?php if($noithuchien=="XSCCMDVL"){echo "XSCTB ĐỊA VẬT LÝ";} ?> </p>
  <p class=MsoNormal style='line-height:115%'>12. Ng&#432;&#7901;i hi&#7879;u
  chu&#7849;n / <i>Operator in charge: </i><span style='mso-bidi-font-style:
  italic'><span style='mso-spacerun:yes'> </span><?php echo mb_convert_case($nhanvien, MB_CASE_TITLE,"UTF-8"); ?></span></p>
  <p class=MsoNormal style='line-height:115%'>13. K&#7871;t lu&#7853;n
  :……………………………………&#272;&#7841;t……………………………………………</p>
  <p class=MsoNormal style='line-height:115%'>………………………………………………………………………………….…………………</p>
  <p class=MsoNormal style='line-height:115%'>……………………………………………………………………………………………………</p>
  <p class=MsoNormal style='line-height:115%'>……………………………………………………………………………………………………</p>
  <p class=MsoNormal><o:p>&nbsp;</o:p></p>
  <p class=MsoNormal><span style='mso-spacerun:yes'>               </span><b>Ng&#432;&#7901;i
  ki&#7875;m tra<span
  style='mso-spacerun:yes'>                                                               
  </span><span style='mso-spacerun:yes'>     </span>Ng&#432;&#7901;i chu&#7849;n máy<o:p></o:p></b></p>
  <p class=MsoNormal><span style='mso-spacerun:yes'>              
  </span>(Ch&#7919; ký, h&#7885; tên)<span
  style='mso-spacerun:yes'>                                                                 
  </span><span style='mso-spacerun:yes'>     </span>(Ch&#7919; ký, h&#7885; tên)<span
  style='mso-spacerun:yes'>                   </span></p>
  <p class=MsoNormal><o:p>&nbsp;</o:p></p>
  <p class=MsoNormal><span
  style='mso-spacerun:yes'>                                                                
  </span></p>
  <p class=MsoNormal style='tab-stops:160.75pt'><span style='mso-tab-count:
  1'>                                                      </span></p>
  <p class=MsoNormal><span style='mso-spacerun:yes'>       </span><span
  style='mso-spacerun:yes'>  </span><span style='mso-spacerun:yes'> </span><span
  style='mso-spacerun:yes'>     </span>     Vũ Anh Đức<span
  style='mso-spacerun:yes'>                                                     
  </span><span style='mso-spacerun:yes'>      </span><span
  style='mso-spacerun:yes'>  </span><span
  style='mso-spacerun:yes'>      </span>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo mb_convert_case($nhanvien, MB_CASE_TITLE, "UTF-8"); ?></p>
  </td>
 </tr>
</table>

<p class=MsoNormal>BM.14.05</p>

<p class=MsoNormal>02/01/2014</p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><o:p>&nbsp;</o:p></b></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><o:p>&nbsp;</o:p></b></p>

<p class=MsoNormal style='margin-left:2.5in;text-indent:.5in;line-height:150%'>





</body>

<?php } ?>



<?php 
header("Content-Type: application/msword");
header("Content-Disposition:attchment;filename=\"$tenmay-T$thangh-$namh.doc\""); 
header("Pragma: no-cache");
header("Expires: 0");
exit;
} ?>


<?php if($search!=""){ 

$delete1="DELETE FROM kehoach_temp";
mysql_query($delete1) or die(mysql_error());

if(isset($_GET['thang'])){
$m = $_GET['thang'];
}else{
$m = isset($_POST['thang']) ? $_POST['thang'] : '';
}

$y=date('Y');
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';


?>

<div align="center"><strong><font size="+1">DANH SÁCH HIỆU CHUẨN / KIỂM ĐỊNH </font></strong></div>

<form method="post" action="bangcanhbao.php" enctype="multipart/form-data">
<p style="margin-left:50px;">Chọn tháng <select name='thang' style="width:150px;height:30px;border:1px solid #CCCCCC;">
<option value="<?php echo $m; ?>">Tháng <?php echo $m; ?> </option>
<option value="1">Tháng 1 </option>
<option value="2">Tháng 2 </option>
<option value="3">Tháng 3 </option>
<option value="4">Tháng 4 </option>
<option value="5">Tháng 5 </option>
<option value="6">Tháng 6 </option>
<option value="7">Tháng 7 </option>
<option value="8">Tháng 8 </option>
<option value="9">Tháng 9 </option>
<option value="10">Tháng 10 </option>
<option value="11">Tháng 11 </option>
<option value="12">Tháng 12 </option>
</select>
<input type="submit" name="search" value="Tìm kiếm">
</p>
<p style="margin-left:50px;">
Tên thiết bị
 <select name="tenthietbi" style="width:600px;height:30px;border:none;"  id="states1">
	<option value=""></option> 
	<?php $r1=mysql_query("SELECT DISTINCT tenthietbi FROM thietbihckd_iso ");
		while($row = mysql_fetch_array($r1))
		{
			$tentb=$row['tenthietbi']; ?>
	
	<optgroup style="display:table-row;" label="<?php echo $tentb; ?>">
	 <?php $r4=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE tenthietbi='$tentb'");
		while($row = mysql_fetch_array($r4))
		{
			$mavt =$row['mavattu'];
			$tenvt =$row['tenviettat'];
			$sm=$row['somay'];
			?>
			<option value="<?php echo $mavt; ?>"> <?php echo $tenvt;?>  <?php echo $sm;?> </option>
		<?php }}?> 
		</optgroup>
		</select>
	Nơi thực hiện 
	<select name="noith" style="width:200px;height:30px;border:1px solid #CCCCCC;" >
	<option value="MN">Giám định Miền Nam</option>
	<option value="XNKT">Xí nghiệp Khai Thác</option>
	<option value="XNĐVLGK">Xí nghiệp Địa vật lý Giếng khoan</option>
	</select>	
<input type="submit" name="them" value="Thêm thiết bị">
</p>
<?php 


$r1=mysql_query("select count(*)as sum from kehoach_iso where thang='$m' and namkh='$y'");
while($row=mysql_fetch_array($r1)){
	$rows=$row['sum'];
}
$row_per_page=10; //Số dòng trên 1 trang
//tính số dòng cần hiển thị
//$rows=mysql_num_rows($tin);
//tính số trang cần để hiển thị
if ($rows>$row_per_page) $page=ceil($rows/$row_per_page); 
else $page=1; //nếu số dòng trong CSDL nhỏ hơn hoặc bằng số dòng trên 1 trang thì chỉ có 1 trang để hiển thị

if(isset($_GET['start']) && (int)$_GET['start'])
     $start=$_GET['start']; //dòng bắt đầu từ nơi ta muốn lấy
else $start=0;

$insert1="insert into kehoach_temp(tenthietbi,mahieu,somay,hangsx,noithuchien,thang,namkh,loaitb,ghichu) select tenthietbi,mahieu,somay,hangsx,noithuchien,thang,namkh,loaitb,ghichu from kehoach_iso where thang='$m' and namkh='$y' order by noithuchien asc,loaitb asc"; 
mysql_query($insert1) or die(mysql_error());
$sql=mysql_query("select * from kehoach_temp limit $start,$row_per_page"); //bắt đầu lấy dữ liệu (^)_(^)
$i=1;

?>
 <br/> <?php $stt=$start+1; ?>
   <div class="CSSTableGenerator">
  <table  border="0" cellpadding="0" cellspacing="0" class="table1">
    <tr bgcolor="#FF9900">
	  <td width="80" height="82" bgcolor="#0000FF"></td>
      <td width="40" height="82" bgcolor="#0000FF"><div align="center" class="style2">STT </div></td>
	  <td width="160" nowrap="nowrap" bgcolor="#0000FF"><div align="center" class="style2">TÊN THIẾT BỊ</div></td>
      <td width="100" nowrap="nowrap" bgcolor="#0000FF"><div align="center" class="style2">MÃ HIỆU</div></td>
      <td width="139" bgcolor="#0000FF"> <div align="center" class="style2">SỐ MÁY </div></td>
      <td width="101" bgcolor="#0000FF"><div align="center" class="style2">CÔNG VIỆC</div></td>
      <td width="147" bgcolor="#0000FF"><div align="center" class="style2">NƠI THỰC HIỆN </div></td>
      <td width="127" bgcolor="#0000FF"><div align="center" class="style2">CHỦ SỞ HỮU </div></td>
	  <td width="140" bgcolor="#0000FF"><div align="center" class="style2">GHI CHÚ </div></td>
    </tr>
<?php while($row=mysql_fetch_array($sql)){
		 	
			$tenthietbi[$i] =$row['tenthietbi'];
			$tenmay[$i] =$row['mahieu'];
			$somay[$i] =$row['somay'];
			$noithuchien[$i] =$row['noithuchien'];
			$ghichu[$i] =$row['ghichu'];
			
			$r19=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$tenmay[$i]'");
			while($row=mysql_fetch_array($r19)){
					$tenviettat[$i]=$row['tenviettat'];
					$bophansh[$i] =$row['bophansh'];
					$chusohuu[$i] =$row['chusohuu'];
			}
			$sohs[$i]="";
			$congviec[$i]="";
			$ngayth[$i]="";
			$nhanvien[$i]="";
			$ttkt[$i]="";
			$r20=mysql_query("SELECT DISTINCT *,date_format(`ngayhc`,'%d/%m/%Y') as ngayhc FROM hosohckd_iso WHERE tenmay='$tenmay[$i]' and namkh='$y' ");
			while($row=mysql_fetch_array($r20)){
					$sohs[$i]=$row['sohs'];
					$congviec[$i]=$row['congviec'];
					$ngayth[$i]=$row['ngayhc'];
					$ttkt[$i] =$row['ttkt'];		
			}
			
?>  
 <tr>
   <td height="49" style="font:'Times New Roman', Times, serif;font-size:15px;">  
	  <?php if($ghichu[$i]=="DX"){ ?>
	  <input type="checkbox" name="chkDel[]" value="<?php echo $tenmay[$i]; ?>">
	 <input type="submit" name="del" WIDTH=20 HEIGHT=16 BORDER=0 ALT='' style="border:none;background:url(images/del.png) no-repeat;" value="&nbsp;&nbsp;&nbsp;Xóa" >
	  <?php }else{ ?>
	  <input type="checkbox" name="chkDel[]" value="<?php echo $tenmay[$i]; ?>" disabled="disabled">
	  <input type="submit" name="del" WIDTH=20 HEIGHT=16 BORDER=0 ALT='' style="border:none;background:url(images/del.png) no-repeat;" value="&nbsp;&nbsp;&nbsp;Xóa" disabled="disabled" >
	 <?php } ?>
	 </td>
      <td height="49" style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo $stt; ?></div></td>
	    <td style="font:'Times New Roman', Times, serif;font-size:15px;padding-left:20px;"><?php echo $tenthietbi[$i]; ?></td>
	  <td style="font:'Times New Roman', Times, serif;font-size:15px;padding-left:20px;"><?php echo $tenviettat[$i]; ?></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo $somay[$i]; ?></div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo "HC/KĐ";  ?></div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo $noithuchien[$i]; ?></div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php if($bophansh[$i]!="XDT"){ echo $bophansh[$i]; }else{ echo $chusohuu[$i]; }?></div></td>
	   <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php if($ghichu[$i]=="DK"){ ?> <input type="checkbox"name="dinhky" value="1" checked="checked"> Định kỳ <input type="checkbox"name="dotxuat" value="0"> Đột xuất <?php }else{ ?><input type="checkbox"name="dinhky" value="0"> Định kỳ<input type="checkbox"name="dotxuat" value="1" checked="checked"> Đột xuất
	   <?php } ?></div></td>
    </tr>
   <?php $i++;
   $stt++;} ?>

   
</table>
 </div>

 
  <div class="footer" style="border:1px solid #666666;background:#CCCCCC">
<?php
//b?t d?u phân trang

$page_cr=($start/$row_per_page)+1;

for($i=1;$i<=$page;$i++)
{
 if ($page_cr!=$i) echo "<a href='bangcanhbao.php?start=".$row_per_page*($i-1)."&&username=$username&&password=$password&&search=Tìm kiếm&&thang=$m'>$i&nbsp;</a>";
 else echo $i." ";
}
?>
</div>

<?php //bang table1 ?>
<br/>

<table align="center">
<tr>	<input type="hidden" name="submit" value="">
<td>	<input type="image" name="submit" src="upload/phieuyc.jpg" value ="Phiếu yêu cầu" onClick="this.form.submit.value = this.value" /></td>
<td><input type="image" name="submit" src="upload/phieukt.jpg" value ="Phiếu XNKT" onClick="this.form.submit.value = this.value"/></td>
<td><input type="image" name="submit" src="upload/phieuMN.jpg" value ="Phiếu GĐMN" onClick="this.form.submit.value = this.value"/></td>


</form>
<form action="index.php" method="post">
  <input type=hidden name=username value="<?php echo $username;?>">
<input type=hidden name=password value="<?php echo $password;?>">
   <input type=hidden name="submit" value="Hồ sơ HC/KD">
 <td>	<input type="image" id="back" src="upload/backkh.jpg" /></td>
</form>
</tr>
</table>
<?php } ?>

<?php if($submit=="Phiếu yêu cầu"&&$search==""&&$them==""){ 

if(isset($_GET['thang'])){
$m = $_GET['thang'];
}else{
$m = isset($_POST['thang']) ? $_POST['thang'] : '';
}
$y=date(Y);
echo $m;
?>

<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 12">
<meta name=Originator content="Microsoft Word 12">
<link rel=File-List href="GOI_T9_2016_files/filelist.xml">
<title>PHIEÁU YEÂU CAÀU CAÙC BOÄ PHAÄN LIEÂN QUAN ÑÖA MAÙY VAØ THIEÁT BÒ MAØ</title>

<link rel=themeData href="GOI_T9_2016_files/themedata.thmx">
<link rel=colorSchemeMapping href="GOI_T9_2016_files/colorschememapping.xml">

<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:-536870145 1107305727 0 0 415 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";}
p.MsoHeader, li.MsoHeader, div.MsoHeader
	{mso-style-unhide:no;
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	tab-stops:center 233.85pt right 467.75pt;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";}
p.MsoFooter, li.MsoFooter, div.MsoFooter
	{mso-style-unhide:no;
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	tab-stops:center 233.85pt right 467.75pt;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";}
 /* Page Definitions */
 @page
	{mso-footnote-separator:url("GOI_T9_2016_files/header.htm") fs;
	mso-footnote-continuation-separator:url("GOI_T9_2016_files/header.htm") fcs;
	mso-endnote-separator:url("GOI_T9_2016_files/header.htm") es;
	mso-endnote-continuation-separator:url("GOI_T9_2016_files/header.htm") ecs;}
@page Section1
	{size:595.3pt 841.9pt;
	margin:1.0in 1.0in 1.0in 1.0in;
	mso-header-margin:.5in;
	mso-footer-margin:.5in;
	mso-paper-source:0;}
div.Section1
	{page:Section1;}
-->
</style>
<!--[if gte mso 10]>
<style>
 /* Style Definitions */
 table.MsoNormalTable
	{mso-style-name:"Table Normal";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-noshow:yes;
	mso-style-unhide:no;
	mso-style-parent:"";
	mso-padding-alt:0in 5.4pt 0in 5.4pt;
	mso-para-margin:0in;
	mso-para-margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Times New Roman","serif";}
table.MsoTableGrid
	{mso-style-name:"Table Grid";
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
	font-family:"Times New Roman","serif";}
</style>
<![endif]--><!--[if gte mso 9]><xml>
 <o:shapedefaults v:ext="edit" spidmax="2050"/>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <o:shapelayout v:ext="edit">
  <o:idmap v:ext="edit" data="1"/>
 </o:shapelayout></xml><![endif]-->
</head>

<body lang=EN-US style='tab-interval:.5in'>

<div class=Section1>

<p class=MsoNormal><span lang=NL style='mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal align=center style='text-align:center'><b style='mso-bidi-font-weight:
normal'><span lang=NL style='mso-ansi-language:NL'>PHI&#7870;U YÊU C&#7846;U G&#7916;I
CÁC B&#7896; PH&#7852;N LIÊN QUAN &#272;&#431;A MÁY VÀ THI&#7870;T B&#7882; V&#7872;<o:p></o:p></span></b></p>

<p class=MsoNormal align=center style='text-align:center'><b style='mso-bidi-font-weight:
normal'><span lang=NL style='mso-ansi-language:NL'><span
style='mso-spacerun:yes'> </span><span style='mso-spacerun:yes'> </span>X&#431;&#7902;NG
SCTB ĐỊA VẬT LÝ<span style='mso-spacerun:yes'> </span>&#272;&#7874; LÀM
TH&#7910; T&#7908;C &#272;&#431;A &#272;I <o:p></o:p></span></b></p>

<p class=MsoNormal align=center style='text-align:center'><b style='mso-bidi-font-weight:
normal'><span lang=NL style='mso-ansi-language:NL'><span
style='mso-spacerun:yes'> </span><span style='mso-spacerun:yes'> 
</span>KI&#7874;M &#272;&#7882;NH / HI&#7878;U CHU&#7848;N TRONG THÁNG <?php echo $m; ?>&nbsp;
N&#258;M <?php echo $y; ?><o:p></o:p></span></b></p>

<p class=MsoNormal align=center style='text-align:center'><b style='mso-bidi-font-weight:
normal'><span lang=NL style='mso-ansi-language:NL'>S&#7889; : &#8470; 04
XSC&#272;T<o:p></o:p></span></b></p>

<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 align=left
 width=750 style='width:562.5pt;border-collapse:collapse;border:none;
 mso-border-alt:solid windowtext .5pt;mso-yfti-tbllook:480;mso-table-lspace:
 9.0pt;margin-left:6.75pt;mso-table-rspace:9.0pt;margin-right:6.75pt;
 mso-table-anchor-vertical:paragraph;mso-table-anchor-horizontal:margin;
 mso-table-left:-47.75pt;mso-table-top:9.4pt;mso-padding-alt:0in 5.4pt 0in 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=42 valign=top style='width:31.5pt;border:solid windowtext 1.0pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center;mso-element:frame;
  mso-element-frame-hspace:9.0pt;mso-element-wrap:around;mso-element-anchor-vertical:
  paragraph;mso-element-anchor-horizontal:margin;mso-element-left:-47.7pt;
  mso-element-top:9.4pt;mso-height-rule:exactly'><b style='mso-bidi-font-weight:
  normal'><span lang=NL style='mso-ansi-language:NL'>stt<o:p></o:p></span></b></p>
  </td>
  <td width=156 valign=top style='width:117.0pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center;mso-element:frame;
  mso-element-frame-hspace:9.0pt;mso-element-wrap:around;mso-element-anchor-vertical:
  paragraph;mso-element-anchor-horizontal:margin;mso-element-left:-47.7pt;
  mso-element-top:9.4pt;mso-height-rule:exactly'><b style='mso-bidi-font-weight:
  normal'><span lang=NL style='mso-ansi-language:NL'>Tên thi&#7871;t b&#7883;<o:p></o:p></span></b></p>
  </td>
  <td width=132 valign=top style='width:99.0pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center;mso-element:frame;
  mso-element-frame-hspace:9.0pt;mso-element-wrap:around;mso-element-anchor-vertical:
  paragraph;mso-element-anchor-horizontal:margin;mso-element-left:-47.7pt;
  mso-element-top:9.4pt;mso-height-rule:exactly'><b style='mso-bidi-font-weight:
  normal'><span lang=NL style='mso-ansi-language:NL'>Mã/Hi&#7879;u<o:p></o:p></span></b></p>
  </td>
  <td width=108 valign=top style='width:81.0pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center;mso-element:frame;
  mso-element-frame-hspace:9.0pt;mso-element-wrap:around;mso-element-anchor-vertical:
  paragraph;mso-element-anchor-horizontal:margin;mso-element-left:-47.7pt;
  mso-element-top:9.4pt;mso-height-rule:exactly'><b style='mso-bidi-font-weight:
  normal'><span lang=NL style='mso-ansi-language:NL'>S&#7889; máy<o:p></o:p></span></b></p>
  </td>
  <td width=126 valign=top style='width:94.5pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center;mso-element:frame;
  mso-element-frame-hspace:9.0pt;mso-element-wrap:around;mso-element-anchor-vertical:
  paragraph;mso-element-anchor-horizontal:margin;mso-element-left:-47.7pt;
  mso-element-top:9.4pt;mso-height-rule:exactly'><b style='mso-bidi-font-weight:
  normal'><span lang=NL style='mso-ansi-language:NL'>V&#7883; trí<o:p></o:p></span></b></p>
  </td>
  <td width=126 valign=top style='width:94.5pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center;mso-element:frame;
  mso-element-frame-hspace:9.0pt;mso-element-wrap:around;mso-element-anchor-vertical:
  paragraph;mso-element-anchor-horizontal:margin;mso-element-left:-47.7pt;
  mso-element-top:9.4pt;mso-height-rule:exactly'><b style='mso-bidi-font-weight:
  normal'><span lang=NL style='mso-ansi-language:NL'>Ch&#7911; nhân<o:p></o:p></span></b></p>
  </td>
  <td width=60 valign=top style='width:45.0pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center;mso-element:frame;
  mso-element-frame-hspace:9.0pt;mso-element-wrap:around;mso-element-anchor-vertical:
  paragraph;mso-element-anchor-horizontal:margin;mso-element-left:-47.7pt;
  mso-element-top:9.4pt;mso-height-rule:exactly'><b style='mso-bidi-font-weight:
  normal'><span lang=NL style='mso-ansi-language:NL'>Ghi chú<o:p></o:p></span></b></p>
  </td>
 </tr>
 
 <?php $stt=1;
 		$r2=mysql_query("SELECT DISTINCT * FROM kehoach_iso a INNER JOIN thietbihckd_iso b ON b.mavattu=a.mahieu WHERE a.thang='$m' and a.namkh='$y' AND b.bophansh!='XDT'");
		while($row = mysql_fetch_array($r2))
		{
			$tenthietbi=$row['tenthietbi'];
			$mahieu=$row['mahieu'];
			$sm=$row['somay']; 
			
		
			$r10=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$mahieu'");
			while($row = mysql_fetch_array($r10))
			{
				$tenviettat=$row['tenviettat'];
				$bophansh=$row['bophansh'];
				$chusohuu=$row['chusohuu'];
			}
			$r3=mysql_query("SELECT DISTINCT * FROM donvi_iso WHERE madv='$bophansh'");
			while($row = mysql_fetch_array($r3))
			{
				$tendv=$row['tendv'];
			}
			?>
 <tr style='mso-yfti-irow:1'>
  <td width=42 valign=top style='width:31.5pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center;mso-element:frame;
  mso-element-frame-hspace:9.0pt;mso-element-wrap:around;mso-element-anchor-vertical:
  paragraph;mso-element-anchor-horizontal:margin;mso-element-left:-47.7pt;
  mso-element-top:9.4pt;mso-height-rule:exactly'><span lang=NL
  style='mso-ansi-language:NL'><?php echo $stt; ?><o:p></o:p></span></p>
  </td>
  <td width=156 valign=top style='width:117.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='mso-element:frame;mso-element-frame-hspace:9.0pt;
  mso-element-wrap:around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:
  margin;mso-element-left:-47.7pt;mso-element-top:9.4pt;mso-height-rule:exactly'><span
  lang=NL style='mso-ansi-language:NL'> <?php echo $tenthietbi; ?> <o:p></o:p></span></p>
  </td>
  <td width=132 valign=top style='width:99.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='mso-element:frame;mso-element-frame-hspace:9.0pt;
  mso-element-wrap:around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:
  margin;mso-element-left:-47.7pt;mso-element-top:9.4pt;mso-height-rule:exactly'><?php echo $tenviettat; ?></p>
  </td>
  <td width=108 valign=top style='width:81.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='mso-element:frame;mso-element-frame-hspace:9.0pt;
  mso-element-wrap:around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:
  margin;mso-element-left:-47.7pt;mso-element-top:9.4pt;mso-height-rule:exactly'><?php echo $sm; ?></p>
  </td>
  <td width=126 valign=top style='width:94.5pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='mso-element:frame;mso-element-frame-hspace:9.0pt;
  mso-element-wrap:around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:
  margin;mso-element-left:-47.7pt;mso-element-top:9.4pt;mso-height-rule:exactly'><span
  lang=NL style='mso-ansi-language:NL'><?php echo $bophansh; ?><o:p></o:p></span></p>
  </td>
  <td width=126 valign=top style='width:94.5pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='mso-element:frame;mso-element-frame-hspace:9.0pt;
  mso-element-wrap:around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:
  margin;mso-element-left:-47.7pt;mso-element-top:9.4pt;mso-height-rule:exactly'><span
  lang=NL style='mso-ansi-language:NL'><?php echo $bophansh; ?><o:p></o:p></span></p>
  </td>
  <td width=60 valign=top style='width:45.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='mso-element:frame;mso-element-frame-hspace:9.0pt;
  mso-element-wrap:around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:
  margin;mso-element-left:-47.7pt;mso-element-top:9.4pt;mso-height-rule:exactly'><span
  lang=NL style='mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>

<?php $stt++;} ?>
</table>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal align=center style='text-align:center'><b style='mso-bidi-font-weight:
normal'><u><span lang=NL style='font-size:14.0pt;mso-ansi-language:NL'>Yêu
c&#7847;u</span></u></b><span lang=NL style='mso-ansi-language:NL'> <b
style='mso-bidi-font-weight:normal'>mang v&#7873; tr&#432;&#7899;c ngày 12
tháng <?php echo $m; ?> n&#259;m <?php echo $y; ?><o:p></o:p></b></span></p>

<p class=MsoNormal align=center style='text-align:center'><b style='mso-bidi-font-weight:
normal'><span lang=NL style='mso-ansi-language:NL'>Không giao &#273;úng h&#7865;n
– X&#432;&#7903;ng SCTB Địa vật lý không ch&#7883;u trách nhi&#7879;m !<o:p></o:p></span></b></p>

<p class=MsoNormal align=center style='text-align:center'><b style='mso-bidi-font-weight:
normal'><span lang=NL style='mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal align=center style='text-align:center'><i style='mso-bidi-font-style:
normal'><span lang=NL style='mso-ansi-language:NL'>V&#361;ng Tàu, ngày 29 tháng
<?php echo ($m-1); ?> n&#259;m <?php echo $y;?><o:p></o:p></span></i></p>

<p class=MsoNormal align=center style='text-align:center'><span lang=NL
style='mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=NL style='mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='mso-ansi-language:NL'><span style='mso-spacerun:yes'> </span><span
style='mso-spacerun:yes'> </span>Ng&#432;&#7901;i l&#7853;p phi&#7871;u<span
style='mso-spacerun:yes'>                            </span><span
style='mso-spacerun:yes'>  </span><span
style='mso-spacerun:yes'>                              </span>Lãnh &#273;&#7841;o
X&#432;&#7903;ng <span style='mso-spacerun:yes'> </span>SCTBĐVL<span
style='mso-spacerun:yes'>                                                  
</span><o:p></o:p></span></b></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='mso-ansi-language:NL'><span
style='mso-spacerun:yes'>                                                                                       
</span><span style='mso-spacerun:yes'>                                </span><o:p></o:p></span></b></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='mso-ansi-language:NL'><span style='mso-spacerun:yes'>              
</span><o:p></o:p></span></b></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='mso-ansi-language:NL'><span style='mso-spacerun:yes'> </span><span
style='mso-spacerun:yes'> </span><span style='mso-spacerun:yes'> 
</span>V&#361; Anh &#272;&#7913;c<span style='mso-spacerun:yes'>              
</span><span style='mso-spacerun:yes'>                </span><span
style='mso-spacerun:yes'>          </span><span
style='mso-spacerun:yes'>                              </span><span
style='mso-spacerun:yes'>    </span>Tr&#432;&#417;ng Ng&#7885;c Sang<span
style='mso-spacerun:yes'>                       </span><span
style='mso-spacerun:yes'>                            </span><o:p></o:p></span></b></p>

<p class=MsoNormal><span lang=NL style='mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=NL style='font-size:11.0pt;mso-ansi-language:
NL'>N&#417;i g&#7917;i :<o:p></o:p></span></p>


<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='font-size:10.0pt;mso-ansi-language:NL'><span
style='mso-spacerun:yes'>              </span>L&#432;u x&#432;&#7903;ng
SCTBĐVL</span></b><span lang=NL style='font-size:10.0pt;mso-ansi-language:
NL'><o:p></o:p></span></p>

</div>

</body>

</html>

<?php 
header("Content-Type: application/msword");
header("Content-Disposition:attchment;filename=\"GOI_T$m.doc\""); 
header("Pragma: no-cache");
header("Expires: 0");
exit;

 } ?>

<?php if($submit=="Phiếu XNKT"&&$search==""&&$them==""){ 

$m = isset($_POST['thang']) ? $_POST['thang'] : '';
$y=date(Y);

?>

<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 12">
<meta name=Originator content="Microsoft Word 12">
<link rel=File-List href="XNKT_T4-2016_TV_files/filelist.xml">
<title>XNLD VIETSOVPETRO</title>

<link rel=themeData href="XNKT_T4-2016_TV_files/themedata.thmx">
<link rel=colorSchemeMapping href="XNKT_T4-2016_TV_files/colorschememapping.xml">

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
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:-536870145 1107305727 0 0 415 0;}
@font-face
	{font-family:VNI-Times;
	panose-1:0 0 0 0 0 0 0 0 0 0;
	mso-font-charset:0;
	mso-generic-font-family:auto;
	mso-font-pitch:variable;
	mso-font-signature:7 0 0 0 19 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";}
p.MsoHeader, li.MsoHeader, div.MsoHeader
	{mso-style-unhide:no;
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	tab-stops:center 233.85pt right 467.75pt;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";}
p.MsoFooter, li.MsoFooter, div.MsoFooter
	{mso-style-unhide:no;
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	tab-stops:center 233.85pt right 467.75pt;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";}
 /* Page Definitions */
 @page
	{mso-footnote-separator:url("XNKT_T4-2016_TV_files/header.htm") fs;
	mso-footnote-continuation-separator:url("XNKT_T4-2016_TV_files/header.htm") fcs;
	mso-endnote-separator:url("XNKT_T4-2016_TV_files/header.htm") es;
	mso-endnote-continuation-separator:url("XNKT_T4-2016_TV_files/header.htm") ecs;}
@page Section1
	{size:595.35pt 841.95pt;
	margin:1.0in 1.0in 1.0in 1.0in;
	mso-header-margin:.5in;
	mso-footer-margin:.5in;
	mso-paper-source:0;}
div.Section1
	{page:Section1;}
 /* List Definitions */
 @list l0
	{mso-list-id:694691670;
	mso-list-type:hybrid;
	mso-list-template-ids:686569282 -321483044 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l0:level1
	{mso-level-start-at:0;
	mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:63.0pt;
	mso-level-number-position:left;
	margin-left:63.0pt;
	text-indent:-.25in;
	mso-ansi-font-size:12.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";}
@list l1
	{mso-list-id:1100612604;
	mso-list-type:hybrid;
	mso-list-template-ids:1274446622 699678044 68747267 68747269 68747265 68747267 68747269 68747265 68747267 68747269;}
@list l1:level1
	{mso-level-start-at:0;
	mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:80.25pt;
	mso-level-number-position:left;
	margin-left:80.25pt;
	text-indent:-.25in;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";}
@list l2
	{mso-list-id:1623803354;
	mso-list-type:hybrid;
	mso-list-template-ids:808990996 1544869562 68747267 68747269 68747265 68747267 68747269 68747265 68747267 68747269;}
@list l2:level1
	{mso-level-start-at:0;
	mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:80.25pt;
	mso-level-number-position:left;
	margin-left:80.25pt;
	text-indent:-.25in;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";}
@list l3
	{mso-list-id:2094007840;
	mso-list-type:hybrid;
	mso-list-template-ids:1289243560 -1944130220 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l3:level1
	{mso-level-start-at:250;
	mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:39.0pt;
	mso-level-number-position:left;
	margin-left:39.0pt;
	text-indent:-.25in;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";}
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
	{mso-style-name:"Table Normal";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-noshow:yes;
	mso-style-unhide:no;
	mso-style-parent:"";
	mso-padding-alt:0in 5.4pt 0in 5.4pt;
	mso-para-margin:0in;
	mso-para-margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Times New Roman","serif";}
table.MsoTableGrid
	{mso-style-name:"Table Grid";
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
	font-family:"Times New Roman","serif";}
</style>
<![endif]--><!--[if gte mso 9]><xml>
 <o:shapedefaults v:ext="edit" spidmax="2050"/>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <o:shapelayout v:ext="edit">
  <o:idmap v:ext="edit" data="1"/>
 </o:shapelayout></xml><![endif]-->
</head>

<body lang=EN-US style='tab-interval:.5in'>

<div class=Section1>

<p class=MsoNormal><span style='mso-ansi-language:NL'><span
style='mso-spacerun:yes'> </span><span lang=NL>LIÊN DOANH VI&#7878;T-NGA<b
style='mso-bidi-font-weight:normal'> </b><span
style='mso-spacerun:yes'>           </span><b style='mso-bidi-font-weight:normal'>C&#7896;NG
HÒA XÃ H&#7896;I CH&#7910; NGH&#296;A VI&#7878;T NAM</b><span
style='mso-spacerun:yes'>                                                          
</span><span style='mso-spacerun:yes'>     </span><span
style='mso-spacerun:yes'>                                                                                                            </span><span
style='mso-spacerun:yes'>                  </span><span
style='mso-spacerun:yes'>       </span><b style='mso-bidi-font-weight:normal'><span
style='mso-spacerun:yes'> </span></b><span style='mso-spacerun:yes'>   </span><span
style='mso-spacerun:yes'> </span><span style='mso-spacerun:yes'> </span><span
style='mso-spacerun:yes'> </span><span style='mso-spacerun:yes'>     </span><o:p></o:p></span></span></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='mso-ansi-language:NL'><span style='mso-spacerun:yes'>       </span></span></b><span
lang=NL style='mso-ansi-language:NL'>VIETSOVPETRO<b style='mso-bidi-font-weight:
normal'> </b><span style='mso-spacerun:yes'>              </span><span
style='mso-spacerun:yes'>                     </span><span
style='mso-spacerun:yes'>  </span><b style='mso-bidi-font-weight:normal'><u>&#272;&#7897;c
l&#7853;p – T&#7921; do – H&#7841;nh phúc</u></b><span
style='mso-spacerun:yes'>   </span><o:p></o:p></span></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='mso-ansi-language:NL'>XN &#272;&#7883;a v&#7853;t lý-Gi&#7871;ng khoan</span></b><span
lang=NL style='mso-ansi-language:NL'><o:p></o:p></span></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='mso-ansi-language:NL'><span style='mso-spacerun:yes'> </span></span></b><span
lang=NL style='mso-ansi-language:NL'><o:p></o:p></span></p>

<p class=MsoNormal><span lang=NL style='mso-ansi-language:NL'><span
style='mso-spacerun:yes'>      </span>_______________<o:p></o:p></span></p>

<p class=MsoNormal><span lang=NL style='mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><i style='mso-bidi-font-style:normal'><span lang=NL
style='mso-ansi-language:NL'>S&#7889; CV</span></i><span lang=NL
style='mso-ansi-language:NL'> : ......... /&#272;VL-NG<span
style='mso-spacerun:yes'>                    </span><span
style='mso-spacerun:yes'>      </span><span style='mso-spacerun:yes'>  </span><i
style='mso-bidi-font-style:normal'>V&#361;ng Tàu, ngày <?php echo date('d');?><span
style='mso-spacerun:yes'>  </span>tháng <?php echo date('m');?> n&#259;m <?php echo date('Y');; ?><span
style='mso-spacerun:yes'>   </span><span style='mso-spacerun:yes'> </span><span
style='mso-spacerun:yes'>    </span></i><span style='mso-spacerun:yes'> </span><span
style='mso-spacerun:yes'>              </span><span
style='mso-spacerun:yes'>   </span><span style='mso-spacerun:yes'>  </span><i
style='mso-bidi-font-style:normal'>V/v: HC/K&#272; thi&#7871;t b&#7883; &#273;o
l&#432;&#7901;ng<span style='mso-spacerun:yes'>                    </span><span
style='mso-spacerun:yes'>     </span><span
style='mso-spacerun:yes'>           </span></i><u><o:p></o:p></u></span></p>

<p class=MsoNormal><span lang=NL style='mso-ansi-language:NL'><span
style='mso-tab-count:4'>                                                </span><span
style='mso-spacerun:yes'>   </span><span style='mso-spacerun:yes'> </span><u>Kính
g&#7917;i</u><b style='mso-bidi-font-weight:normal'> :<span
style='mso-spacerun:yes'>  </span><span style='mso-spacerun:yes'> </span>Ông Trịnh
Hoàng Linh<o:p></o:p></b></span></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='mso-ansi-language:NL'><span style='mso-tab-count:5'>                                                            </span><span
style='mso-spacerun:yes'>       </span><span
style='mso-spacerun:yes'>   </span>&nbsp;Giám &#273;&#7889;c Xí nghi&#7879;p Cơ Điện<o:p></o:p></span></b></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></b></p>

<?php 
$r7=mysql_query("SELECT count(*) as soluong FROM kehoach_iso WHERE thang='$m' and namkh='$y' and noithuchien='XNKT'");
while($row = mysql_fetch_array($r7))
{
		$soluong=$row['soluong'];
}
?>


<p class=MsoNormal style='text-align:justify'><span lang=NL style='mso-ansi-language:
NL'><span style='mso-spacerun:yes'>      </span><span
style='mso-spacerun:yes'>  </span>Xí nghi&#7879;p &#272;&#7883;a v&#7853;t lý
gi&#7871;ng khoan hi&#7879;n &#273;ang s&#7917; d&#7909;ng m&#7897;t s&#7889;
thi&#7871;t b&#7883; &#273;o l&#432;&#7901;ng &#273;ã &#273;&#7871;n k&#7923;
h&#7841;n c&#7847;n ph&#7843;i &#273;&#432;&#7907;c hi&#7879;u chu&#7849;n /
ki&#7875;m &#273;&#7883;nh &#273;&#7875; ph&#7909;c v&#7909; s&#7843;n
xu&#7845;t. Kính &#273;&#7873; ngh&#7883; Ông xem xét và ch&#7881; th&#7883; cho
b&#7897; ph&#7853;n ch&#7913;c n&#259;ng Hi&#7879;u chu&#7849;n/Ki&#7875;m
&#273;&#7883;nh <?php echo $soluong; ?> (<?php if($soluong==1){ echo "Một";}elseif($soluong==2){ echo "Hai";}elseif($soluong==3){ echo "Ba";}elseif($soluong==4){ echo "Bốn";}elseif($soluong==5){ echo "Năm";}elseif($soluong==6){ echo "Sáu";}elseif($soluong==7){ echo "Bảy";}elseif($soluong==8){ echo "Tám";}elseif($soluong==9){ echo "Chín";}elseif($soluong==10){ echo "Mười";}elseif($soluong==11){ echo "Mười một";}elseif($soluong==12){ echo "Mười hai";}elseif($soluong==13){ echo "Mười ba";}elseif($soluong==14){ echo "Mười bốn";}elseif($soluong==15){ echo "Mười năm";}elseif($soluong==16){ echo "Mười sáu";}elseif($soluong==17){ echo "Mười bảy";}elseif($soluong==18){ echo "Mười tám";}elseif($soluong==2){ echo "Mười chín";}elseif($soluong==20){ echo "Hai mươi";}elseif($soluong==21){ echo "Hai mươi mốt";}elseif($soluong==22){ echo "Hai mươi hai";}elseif($soluong==23){ echo "Hai mươi ba";}elseif($soluong==24){ echo "Hai mươi bốn";}elseif($soluong==25){ echo "Hai mươi năm";}elseif($soluong==26){ echo "Hai mươi sáu";}elseif($soluong==27){ echo "Hai mươi bảy";}elseif($soluong==28){ echo "Hai mươi tám";}elseif($soluong==29){ echo "Hai mươi chín";}elseif($soluong==30){ echo "Ba mươi";}elseif($soluong==31){ echo "Ba mươi mốt";}elseif($soluong==32){ echo "Ba mươi hai";}elseif($soluong==33){ echo "Ba mươi ba";}elseif($soluong==34){ echo "Ba mươi tư";}elseif($soluong==35){ echo "Ba mươi năm";}elseif($soluong==36){ echo "Ba mươi sáu";}elseif($soluong==37){ echo "Ba mươi bảy";}elseif($soluong==38){ echo "Ba mươi tám";}elseif($soluong==39){ echo "Ba mươi chín";}elseif($soluong==40){ echo "Bốn mươi";} ?>) thiết bị được mô t&#7843; d&#432;&#7899;i &#273;ây :<o:p></o:p></span></p>

<p class=MsoNormal style='text-align:justify'><span lang=NL style='mso-ansi-language:
NL'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='text-align:justify'><span lang=NL style='mso-ansi-language:
NL'><o:p>&nbsp;</o:p></span></p>

<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 width=726
 style='width:544.7pt;margin-left:-42.6pt;border-collapse:collapse;border:none;
 mso-border-alt:solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:
 0in 5.4pt 0in 5.4pt;mso-border-insideh:.5pt solid windowtext;mso-border-insidev:
 .5pt solid windowtext'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:13.9pt'>
  <td width=40 valign=top style='width:30.0pt;border:solid windowtext 1.0pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:13.9pt'>
  <p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
  style='mso-ansi-language:NL'>Stt<o:p></o:p></span></b></p>
  </td>
  <td width=162 valign=top style='width:121.5pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:13.9pt'>
  <p class=MsoNormal align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span lang=NL style='mso-ansi-language:
  NL'>Tên thi&#7871;t b&#7883;<o:p></o:p></span></b></p>
  </td>
  <td width=108 valign=top style='width:81.0pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:13.9pt'>
  <p class=MsoNormal align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span lang=NL style='mso-ansi-language:
  NL'>Ký mã hi&#7879;u<o:p></o:p></span></b></p>
  </td>
  <td width=108 valign=top style='width:81.0pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:13.9pt'>
  <p class=MsoNormal align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span lang=NL style='mso-ansi-language:
  NL'>S&#7889; máy<o:p></o:p></span></b></p>
  </td>
 
  <td width=75 valign=top style='width:56.6pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:13.9pt'>
  <p class=MsoNormal align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span lang=NL style='mso-ansi-language:
  NL'>Yêu c&#7847;u<o:p></o:p></span></b></p>
  </td>
  <td width=96 valign=top style='width:1.0in;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:13.9pt'>
  <p class=MsoNormal align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span lang=NL style='mso-ansi-language:
  NL'>S&#7903; h&#7919;u<o:p></o:p></span></b></p>
  </td>
  <td width=78 valign=top style='width:58.7pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:13.9pt'>
  <p class=MsoNormal align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span lang=NL style='mso-ansi-language:
  NL'>Ghi chú<o:p></o:p></span></b></p>
  <p class=MsoNormal align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span lang=NL style='mso-ansi-language:
  NL'><o:p>&nbsp;</o:p></span></b></p>
  </td>
 </tr>
 <?php 
  $stt=1;
 		$r5=mysql_query("SELECT DISTINCT * FROM kehoach_iso WHERE thang='$m' and namkh='$y' and noithuchien='XNKT'");
		while($row = mysql_fetch_array($r5))
		{
			$tenthietbi=$row['tenthietbi'];
			$mahieu=$row['mahieu'];
			$sm=$row['somay']; 
			
			
			$r10=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$mahieu'");
			while($row = mysql_fetch_array($r10))
			{
				$tenviettat=$row['tenviettat'];
				$bophansh=$row['bophansh'];
				$chusohuu=$row['chusohuu'];
			}
			$r3=mysql_query("SELECT DISTINCT * FROM donvi_iso WHERE madv='$bophansh'");
			while($row = mysql_fetch_array($r3))
			{
				$tendv=$row['tendv'];
			}
			?>

 <tr style='mso-yfti-irow:1'>
  <td width=40 valign=top style='width:30.0pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><span lang=NL
  style='mso-ansi-language:NL'><?php echo $stt; ?><o:p></o:p></span></p>
  </td>
  <td width=162 valign=top style='width:121.5pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span lang=NL style='mso-ansi-language:NL'><?php echo $tenthietbi; ?><o:p></o:p></span></p>
  </td>
  <td width=108 valign=top style='width:81.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span lang=NL style='mso-ansi-language:NL'><?php echo $tenviettat; ?><o:p></o:p></span></p>
  </td>
  <td width=108 valign=top style='width:81.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span lang=NL style='mso-ansi-language:NL'>№ <?php echo $sm; ?><o:p></o:p></span></p>
  </td>
 
  <td width=75 valign=top style='width:56.6pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><span lang=NL
  style='mso-ansi-language:NL'>K&#272;/HC<o:p></o:p></span></p>
  </td>
  <td width=96 valign=top style='width:1.0in;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span lang=NL style='mso-ansi-language:NL'><?php echo $tendv; ?><o:p></o:p></span></p>
  </td>
  <td width=78 valign=top style='width:58.7pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span lang=NL style='mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>

<?php $stt++;}?>
</table>

<p class=MsoNormal><span lang=NL style='mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=NL style='mso-ansi-language:NL'>T&#7915;ng m&#7909;c
trên : XN &#272;&#7883;a v&#7853;t lý gi&#7871;ng khoan c&#7847;n có k&#7871;t
qu&#7843; b&#7857;ng v&#259;n b&#7843;n &#273;&#7875; l&#432;u tr&#7919; ph&#7909;c
v&#7909; cho công vi&#7879;c &#273;ánh giá ISO. R&#7845;t mong b&#7897;
ph&#7853;n th&#7921;c hi&#7879;n K&#272;/HC làm giúp!<o:p></o:p></span></p>

<p class=MsoNormal><span lang=NL style='mso-ansi-language:NL'><span
style='mso-spacerun:yes'>    </span><span style='mso-spacerun:yes'>     </span>Trân
tr&#7885;ng !<span style='mso-tab-count:1'>        </span><o:p></o:p></span></p>

<p class=MsoNormal><span lang=NL style='mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=NL style='mso-ansi-language:NL'><span
style='mso-tab-count:7'>                                                                                    </span><span
style='mso-spacerun:yes'>         </span><span
style='mso-spacerun:yes'>      </span><b style='mso-bidi-font-weight:normal'>Giám
&#273;&#7889;c XN &#272;&#7883;a v&#7853;t lý G/K<span style='mso-tab-count:
1'>        </span><o:p></o:p></b></span></p>

<p class=MsoNormal><span lang=NL style='mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=NL style='mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=NL style='mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=NL style='mso-ansi-language:NL'><span
style='mso-spacerun:yes'>         </span><span
style='mso-spacerun:yes'>                                                          </span><span
style='mso-spacerun:yes'>                               </span><span
style='mso-spacerun:yes'>          </span><span
style='mso-spacerun:yes'> </span><b style='mso-bidi-font-weight:normal'>Tạ Tương Hoan</b><span style='mso-spacerun:yes'>               </span><b
style='mso-bidi-font-weight:normal'><o:p></o:p></b></span></p>

<p class=MsoNormal><span lang=NL style='mso-ansi-language:NL'><span
style='mso-spacerun:yes'>                                     </span><o:p></o:p></span></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><i style='mso-bidi-font-style:
normal'><span lang=NL style='mso-ansi-language:NL'><span
style='mso-spacerun:yes'>         </span>N&#417;i g&#7917;i :<o:p></o:p></span></i></b></p>

<p class=MsoNormal><span lang=NL style='mso-ansi-language:NL'><span
style='mso-spacerun:yes'>          </span><span
style='mso-spacerun:yes'>            </span><span
style='mso-spacerun:yes'>  </span><span style='mso-spacerun:yes'> </span>- Nh&#432;
trên<span style='mso-spacerun:yes'>  </span><span
style='mso-spacerun:yes'> </span><span style='mso-spacerun:yes'>  </span><o:p></o:p></span></p>

<p class=MsoNormal><span lang=NL style='mso-ansi-language:NL'><span
style='mso-spacerun:yes'>          </span><span
style='mso-spacerun:yes'>            </span><span
style='mso-spacerun:yes'>  </span><span style='mso-spacerun:yes'> </span>- L&#432;u
X&#432;&#7903;ng SCTBĐVL<span style='mso-tab-count:1'>        </span><o:p></o:p></span></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><i style='mso-bidi-font-style:
normal'><span lang=NL style='mso-ansi-language:NL'><span
style='mso-spacerun:yes'>          </span>Ký t&#7855;t:</span></i></b><span
lang=NL style='mso-ansi-language:NL'><o:p></o:p></span></p>

<p class=MsoNormal><span lang=NL style='mso-ansi-language:NL'><span
style='mso-spacerun:yes'>          </span><span
style='mso-spacerun:yes'>            </span><span
style='mso-spacerun:yes'>  </span><span style='mso-spacerun:yes'> </span>- Trương Ngọc Sang: .................<span
style='mso-spacerun:yes'>  </span><o:p></o:p></span></p>

<p class=MsoNormal><span lang=NL style='mso-ansi-language:NL'><span
style='mso-spacerun:yes'>         </span><span
style='mso-spacerun:yes'>                 </span><span
style='mso-spacerun:yes'> </span>Thực hiện : Vũ Anh Đức - 0989953656  <o:p></o:p></span></p>

<p class=MsoNormal><span lang=NL style='mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></p>

</div>

</body>

</html>


<?php 
header("Content-Type: application/msword");
header("Content-Disposition:attchment;filename=\"XNCĐ_T$m$y.doc\""); 
header("Pragma: no-cache");
header("Expires: 0");
exit;

 } ?>

<?php if($submit=="Phiếu GĐMN"&&$search==""&&$them==""){ 

if(isset($_GET['thang'])){
$m = $_GET['thang'];
}else{
$m = isset($_POST['thang']) ? $_POST['thang'] : '';
}
$y=date(Y);
?>

<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 12">
<meta name=Originator content="Microsoft Word 12">
<link rel=File-List href="GUIKDMNT7_files/filelist.xml">
<title>C&#7896;NG HOÀ XÃ H&#7896;I CH&#7910; NGH&#296;A VI&#7878;T NAM</title>
<!--[if gte mso 9]><xml>
 <o:DocumentProperties>
  <o:Author>Dong</o:Author>
  <o:Template>Normal</o:Template>
  <o:LastAuthor>Admin</o:LastAuthor>
  <o:Revision>2</o:Revision>
  <o:TotalTime>155</o:TotalTime>
  <o:LastPrinted>2016-07-27T08:20:00Z</o:LastPrinted>
  <o:Created>2016-09-13T04:01:00Z</o:Created>
  <o:LastSaved>2016-09-13T04:01:00Z</o:LastSaved>
  <o:Pages>2</o:Pages>
  <o:Words>767</o:Words>
  <o:Characters>4377</o:Characters>
  <o:Lines>36</o:Lines>
  <o:Paragraphs>10</o:Paragraphs>
  <o:CharactersWithSpaces>5134</o:CharactersWithSpaces>
  <o:Version>12.00</o:Version>
 </o:DocumentProperties>
</xml><![endif]-->
<link rel=themeData href="GUIKDMNT7_files/themedata.thmx">
<link rel=colorSchemeMapping href="GUIKDMNT7_files/colorschememapping.xml">
<!--[if gte mso 9]><xml>
 <w:WordDocument>
  <w:TrackMoves>false</w:TrackMoves>
  <w:TrackFormatting/>
  <w:PunctuationKerning/>
  <w:DrawingGridHorizontalSpacing>6.5 pt</w:DrawingGridHorizontalSpacing>
  <w:DrawingGridVerticalSpacing>0.7 pt</w:DrawingGridVerticalSpacing>
  <w:DisplayHorizontalDrawingGridEvery>2</w:DisplayHorizontalDrawingGridEvery>
  <w:DisplayVerticalDrawingGridEvery>2</w:DisplayVerticalDrawingGridEvery>
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
   <w:UseWord2002TableStyleRules/>
   <w:DontUseIndentAsNumberingTabStop/>
   <w:FELineBreak11/>
   <w:WW11IndentRules/>
   <w:DontAutofitConstrainedTables/>
   <w:AutofitLikeWW11/>
   <w:HangulWidthLikeWW11/>
   <w:UseNormalStyleForList/>
  </w:Compatibility>
  <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>
  <m:mathPr>
   <m:mathFont m:val="Cambria Math"/>
   <m:brkBin m:val="before"/>
   <m:brkBinSub m:val="--"/>
   <m:smallFrac m:val="off"/>
   <m:dispDef/>
   <m:lMargin m:val="0"/>
   <m:rMargin m:val="0"/>
   <m:defJc m:val="centerGroup"/>
   <m:wrapIndent m:val="1440"/>
   <m:intLim m:val="subSup"/>
   <m:naryLim m:val="undOvr"/>
  </m:mathPr></w:WordDocument>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="false"
  DefSemiHidden="false" DefQFormat="false" LatentStyleCount="267">
  <w:LsdException Locked="false" QFormat="true" Name="Normal"/>
  <w:LsdException Locked="false" QFormat="true" Name="heading 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   QFormat="true" Name="heading 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   QFormat="true" Name="heading 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   QFormat="true" Name="heading 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   QFormat="true" Name="heading 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   QFormat="true" Name="heading 6"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   QFormat="true" Name="heading 7"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   QFormat="true" Name="heading 8"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   QFormat="true" Name="heading 9"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   QFormat="true" Name="caption"/>
  <w:LsdException Locked="false" QFormat="true" Name="Title"/>
  <w:LsdException Locked="false" QFormat="true" Name="Subtitle"/>
  <w:LsdException Locked="false" QFormat="true" Name="Strong"/>
  <w:LsdException Locked="false" QFormat="true" Name="Emphasis"/>
  <w:LsdException Locked="false" Priority="99" SemiHidden="true"
   Name="Placeholder Text"/>
  <w:LsdException Locked="false" Priority="1" QFormat="true" Name="No Spacing"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 1"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 1"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 1"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 1"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 1"/>
  <w:LsdException Locked="false" Priority="99" SemiHidden="true" Name="Revision"/>
  <w:LsdException Locked="false" Priority="34" QFormat="true"
   Name="List Paragraph"/>
  <w:LsdException Locked="false" Priority="29" QFormat="true" Name="Quote"/>
  <w:LsdException Locked="false" Priority="30" QFormat="true"
   Name="Intense Quote"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 1"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 1"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 1"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 1"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 1"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 1"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 2"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 2"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 2"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 2"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 2"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 2"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 2"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 2"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 3"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 3"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 3"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 3"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 3"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 3"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 3"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 3"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 4"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 4"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 4"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 4"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 4"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 4"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 4"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 4"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 5"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 5"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 5"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 5"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 5"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 5"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 5"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 5"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 6"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 6"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 6"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 6"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 6"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 6"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 6"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 6"/>
  <w:LsdException Locked="false" Priority="19" QFormat="true"
   Name="Subtle Emphasis"/>
  <w:LsdException Locked="false" Priority="21" QFormat="true"
   Name="Intense Emphasis"/>
  <w:LsdException Locked="false" Priority="31" QFormat="true"
   Name="Subtle Reference"/>
  <w:LsdException Locked="false" Priority="32" QFormat="true"
   Name="Intense Reference"/>
  <w:LsdException Locked="false" Priority="33" QFormat="true" Name="Book Title"/>
  <w:LsdException Locked="false" Priority="37" SemiHidden="true"
   UnhideWhenUsed="true" Name="Bibliography"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="TOC Heading"/>
 </w:LatentStyles>
</xml><![endif]-->
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:-536870145 1107305727 0 0 415 0;}
@font-face
	{font-family:VNI-Times;
	panose-1:0 0 0 0 0 0 0 0 0 0;
	mso-font-charset:0;
	mso-generic-font-family:auto;
	mso-font-pitch:variable;
	mso-font-signature:7 0 0 0 19 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:13.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";}
p.MsoHeader, li.MsoHeader, div.MsoHeader
	{mso-style-unhide:no;
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	tab-stops:center 233.85pt right 467.75pt;
	font-size:13.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";}
p.MsoFooter, li.MsoFooter, div.MsoFooter
	{mso-style-unhide:no;
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	tab-stops:center 233.85pt right 467.75pt;
	font-size:13.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";}
a:link, span.MsoHyperlink
	{mso-style-unhide:no;
	color:blue;
	text-decoration:underline;
	text-underline:single;}
a:visited, span.MsoHyperlinkFollowed
	{mso-style-unhide:no;
	color:purple;
	mso-themecolor:followedhyperlink;
	text-decoration:underline;
	text-underline:single;}
 /* Page Definitions */
 @page
	{mso-footnote-separator:url("GUIKDMNT7_files/header.htm") fs;
	mso-footnote-continuation-separator:url("GUIKDMNT7_files/header.htm") fcs;
	mso-endnote-separator:url("GUIKDMNT7_files/header.htm") es;
	mso-endnote-continuation-separator:url("GUIKDMNT7_files/header.htm") ecs;}
@page Section1
	{size:595.3pt 841.9pt;
	margin:.7in .8in .2in 1.2in;
	mso-header-margin:.3in;
	mso-footer-margin:.3in;
	mso-paper-source:15;}
div.Section1
	{page:Section1;}
-->
</style>
<!--[if gte mso 10]>
<style>
 /* Style Definitions */
 table.MsoNormalTable
	{mso-style-name:"Table Normal";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-noshow:yes;
	mso-style-unhide:no;
	mso-style-parent:"";
	mso-padding-alt:0in 5.4pt 0in 5.4pt;
	mso-para-margin:0in;
	mso-para-margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Times New Roman","serif";}
table.MsoTableGrid
	{mso-style-name:"Table Grid";
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
	font-family:"Times New Roman","serif";}
</style>
<![endif]--><!--[if gte mso 9]><xml>
 <o:shapedefaults v:ext="edit" spidmax="2050"/>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <o:shapelayout v:ext="edit">
  <o:idmap v:ext="edit" data="1"/>
 </o:shapelayout></xml><![endif]-->
</head>

<body lang=EN-US link=blue vlink=purple style='tab-interval:.5in'>

<div class=Section1>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='font-size:12.0pt;mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='font-size:12.0pt;mso-ansi-language:NL'>XN &#272;&#7882;A V&#7852;T LÝ
G/K<span style='mso-spacerun:yes'>               </span><span style='mso-spacerun:yes'>       </span>C&#7896;NG HÒA XÃ
H&#7896;I CH&#7910; NGH&#296;A VI&#7878;T NAM<o:p></o:p></span></b></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='font-size:12.0pt;mso-ansi-language:NL'>X&#432;&#7903;ng SCTB ĐỊA VẬT LÝ</span></b><span
lang=NL style='font-size:12.0pt;mso-ansi-language:NL'><span
style='mso-spacerun:yes'>                                 </span><b
style='mso-bidi-font-weight:normal'><u>&#272;&#7897;c l&#7853;p - T&#7921; do -
H&#7841;nh phúc</u></b><o:p></o:p></span></p>

<p class=MsoNormal><span lang=NL style='font-size:12.0pt;mso-ansi-language:
NL'><span
style='mso-spacerun:yes'>                                                                     
</span><o:p></o:p></span></p>

<p class=MsoNormal><span lang=NL style='font-size:12.0pt;mso-ansi-language:
NL'><span style='mso-spacerun:yes'>                                       
</span><span style='mso-spacerun:yes'>                          </span><i
style='mso-bidi-font-style:normal'>V&#361;ng Tàu, ngày <?php echo date('d'); ?> tháng <?php echo date('m') ?> n&#259;m <?php echo date('Y'); ?><o:p></o:p></i></span></p>

<p class=MsoNormal><span lang=NL style='font-size:12.0pt;mso-ansi-language:
NL'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=NL style='font-size:12.0pt;mso-ansi-language:
NL'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=NL style='font-size:12.0pt;mso-ansi-language:
NL'><span
style='mso-spacerun:yes'>                                                     
</span><b style='mso-bidi-font-weight:normal'><u>Kính g&#7917;i</u></b>&nbsp;<b
style='mso-bidi-font-weight:normal'>: Ông Tạ Tương Hoan<o:p></o:p></b></span></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='font-size:12.0pt;mso-ansi-language:NL'><span
style='mso-spacerun:yes'>                                                    
</span><span style='mso-spacerun:yes'>                   </span>Giám &#273;&#7889;c
XN &#272;&#7883;a v&#7853;t lý G/K<o:p></o:p></span></b></p>

<p class=MsoNormal><span lang=NL style='font-size:12.0pt;mso-ansi-language:
NL'><o:p>&nbsp;</o:p></span></p>
<?php 
$r15=mysql_query("SELECT count(*) as soluong FROM kehoach_iso WHERE thang='$m' and namkh='$y' and noithuchien='MN'");
while($row = mysql_fetch_array($r15))
{
	$soluong=$row['soluong'];
}			
?>
<p class=MsoNormal style='text-align:justify'><span lang=NL style='font-size:
12.0pt;mso-ansi-language:NL'><span style='mso-spacerun:yes'>       </span><span
style='mso-spacerun:yes'> </span>C&#259;n c&#7913; vào h&#7907;p
&#273;&#7891;ng s&#7889;: 011/15-&#272;VL1/MI&#7872;N NAM - <i
style='mso-bidi-font-style:normal'>D&#7883;ch v&#7909; “Hi&#7879;u chu&#7849;n
và ki&#7875;m &#273;&#7883;nh thi&#7871;t b&#7883; &#273;o l&#432;&#7901;ng” ký
ngày 22 tháng 07 n&#259;m 2015 . </i>X&#432;&#7903;ng s&#7917;a ch&#7919;a thiết bị &#272;&#7883;a v&#7853;t lý s&#7869; ti&#7871;n hành
g&#7917;i &#273;i <?php echo $soluong; ?>  (<?php if($soluong==1){ echo "Một";}elseif($soluong==2){ echo "Hai";}elseif($soluong==3){ echo "Ba";}elseif($soluong==4){ echo "Bốn";}elseif($soluong==5){ echo "Năm";}elseif($soluong==6){ echo "Sáu";}elseif($soluong==7){ echo "Bảy";}elseif($soluong==8){ echo "Tám";}elseif($soluong==9){ echo "Chín";}elseif($soluong==10){ echo "Mười";}elseif($soluong==11){ echo "Mười một";}elseif($soluong==12){ echo "Mười hai";}elseif($soluong==13){ echo "Mười ba";}elseif($soluong==14){ echo "Mười bốn";}elseif($soluong==15){ echo "Mười năm";}elseif($soluong==16){ echo "Mười sáu";}elseif($soluong==17){ echo "Mười bảy";}elseif($soluong==18){ echo "Mười tám";}elseif($soluong==2){ echo "Mười chín";}elseif($soluong==20){ echo "Hai mươi";}elseif($soluong==21){ echo "Hai mươi mốt";}elseif($soluong==22){ echo "Hai mươi hai";}elseif($soluong==23){ echo "Hai mươi ba";}elseif($soluong==24){ echo "Hai mươi bốn";}elseif($soluong==25){ echo "Hai mươi năm";}elseif($soluong==26){ echo "Hai mươi sáu";}elseif($soluong==27){ echo "Hai mươi bảy";}elseif($soluong==28){ echo "Hai mươi tám";}elseif($soluong==29){ echo "Hai mươi chín";}elseif($soluong==30){ echo "Ba mươi";}elseif($soluong==31){ echo "Ba mươi mốt";}elseif($soluong==32){ echo "Ba mươi hai";}elseif($soluong==33){ echo "Ba mươi ba";}elseif($soluong==34){ echo "Ba mươi tư";}elseif($soluong==35){ echo "Ba mươi năm";}elseif($soluong==36){ echo "Ba mươi sáu";}elseif($soluong==37){ echo "Ba mươi bảy";}elseif($soluong==38){ echo "Ba mươi tám";}elseif($soluong==39){ echo "Ba mươi chín";}elseif($soluong==40){ echo "Bốn mươi";} ?>) thi&#7871;t b&#7883; &#273;ã &#273;&#7871;n
k&#7923; h&#7841;n ki&#7875;m &#273;&#7883;nh/hi&#7879;u chu&#7849;n t&#7899;i<span
style='mso-spacerun:yes'>  </span>CÔNG TY TNHH TH&#431;&#416;NG M&#7840;I &amp;
D&#7882;CH V&#7908; GIÁM &#272;&#7882;NH MI&#7872;N NAM (CT TNHH TM &amp; DV
G&#272; MN) &#273;&#7875; th&#7921;c hi&#7879;n theo danh sách d&#432;&#7899;i &#273;ây&nbsp;:<o:p></o:p></span></p>

<p class=MsoNormal align=center style='text-align:center'><b style='mso-bidi-font-weight:
normal'><span lang=NL style='font-size:12.0pt;mso-ansi-language:NL'>THI&#7870;T
B&#7882; &#272;O L&#431;&#7900;NG XN &#272;&#7882;A V&#7852;T LÝ GI&#7870;NG
KHOAN<o:p></o:p></span></b></p>

<p class=MsoNormal align=center style='text-align:center'><b style='mso-bidi-font-weight:
normal'><span lang=NL style='font-size:12.0pt;mso-ansi-language:NL'>KI&#7874;M &#272;&#7882;NH/HI&#7878;U
CHU&#7848;N T&#7840;I (CT TNHH TM &amp; DV G&#272; MN)<o:p></o:p></span></b></p>

<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 width=700
 style='width:561.95pt;margin-left:-63.2pt;border-collapse:collapse;border:
 none;mso-border-alt:solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:
 0in 5.4pt 0in 5.4pt;mso-border-insideh:.5pt solid windowtext;mso-border-insidev:
 .5pt solid windowtext'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=35 valign=top style='width:25.9pt;border:solid windowtext 1.0pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span lang=NL style='font-size:12.0pt;
  mso-ansi-language:NL'>Stt<o:p></o:p></span></b></p>
  </td>
  <td width=225 valign=top style='width:168.7pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span lang=NL style='font-size:12.0pt;
  mso-ansi-language:NL'>Tên thi&#7871;t b&#7883; <o:p></o:p></span></b></p>
  </td>
  <td width=90 valign=top style='width:67.5pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span lang=NL style='font-size:12.0pt;
  mso-ansi-language:NL'>Ký hi&#7879;u<o:p></o:p></span></b></p>
  </td>
  <td width=108 valign=top style='width:81.0pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span lang=NL style='font-size:12.0pt;
  mso-ansi-language:NL'>S&#7889; máy<o:p></o:p></span></b></p>
  </td>
  <td width=150 valign=top style='width:112.5pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span lang=NL style='font-size:12.0pt;
  mso-ansi-language:NL'>B&#7897; ph&#7853;n s&#7917; d&#7909;ng<o:p></o:p></span></b></p>
  </td>
  <td width=72 valign=top style='width:.75in;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span lang=NL style='font-size:12.0pt;
  mso-ansi-language:NL'>Yêu c&#7847;u<o:p></o:p></span></b></p>
  </td>
  <td width=70 valign=top style='width:52.35pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span lang=NL style='font-size:12.0pt;
  mso-ansi-language:NL'>Ghi chú<o:p></o:p></span></b></p>
  </td>
 </tr>
 <?php  $stt=1;
 		$r8=mysql_query("SELECT DISTINCT * FROM kehoach_iso WHERE thang='$m' and namkh='$y' and noithuchien='MN'");
		while($row = mysql_fetch_array($r8))
		{
			$tenthietbi=$row['tenthietbi'];
			$mahieu=$row['mahieu'];
			$sm=$row['somay']; 
			
			
			$r10=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$mahieu'");
			while($row = mysql_fetch_array($r10))
			{
				$tenviettat=$row['tenviettat'];
				$bophansh=$row['bophansh'];
				$chusohuu=$row['chusohuu'];
			}
			$r3=mysql_query("SELECT DISTINCT * FROM donvi_iso WHERE madv='$bophansh'");
			while($row = mysql_fetch_array($r3))
			{
				$tendv=$row['tendv'];
			}
			?>
 <tr style='mso-yfti-irow:1'>
  <td width=35 valign=top style='width:25.9pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><span lang=NL
  style='font-size:12.0pt;mso-ansi-language:NL'><?php echo $stt; ?><o:p></o:p></span></p>
  </td>
  <td width=225 valign=top style='width:168.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span lang=NL style='font-size:12.0pt;mso-ansi-language:
  NL'><?php echo $tenthietbi; ?> <span style='mso-spacerun:yes'> </span><o:p></o:p></span></p>
  </td>
  <td width=90 valign=top style='width:67.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span lang=NL style='font-size:12.0pt;mso-ansi-language:
  NL'><?php echo $tenviettat; ?><o:p></o:p></span></p>
  </td>
  <td width=108 valign=top style='width:81.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span lang=NL style='font-size:12.0pt;mso-ansi-language:
  NL'>&#8470;</span><span lang=NL style='font-size:12.0pt;font-family:VNI-Times;
  mso-ansi-language:NL'> </span><span style='font-size:12.0pt'><?php echo $sm; ?></span><span
  lang=NL style='font-size:12.0pt;font-family:VNI-Times;mso-ansi-language:NL'><o:p></o:p></span></p>
  </td>
  <td width=150 valign=top style='width:112.5pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span lang=NL style='font-size:12.0pt;font-family:VNI-Times;
  mso-ansi-language:NL'><?php echo $tendv; ?>
	</span><span
  style='font-size:12.0pt'><o:p></o:p></span></p>
  </td>
  <td width=72 valign=top style='width:.75in;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><span lang=NL
  style='font-size:12.0pt;font-family:VNI-Times;mso-ansi-language:NL'>H/C<o:p></o:p></span></p>
  </td>
  <td width=70 valign=top style='width:52.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><span lang=NL
  style='font-size:12.0pt;font-family:VNI-Times;mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <?php $stt++; } ?>
</table>

<p class=MsoNormal style='text-align:justify'><span lang=NL style='font-size:
12.0pt;mso-ansi-language:NL'><span style='mso-spacerun:yes'>     </span>Đề nghị ông cho phép Công ty TNHH TM & DV GIÁM ĐỊNH MIỀN NAM đưa các thiết bị đi HC/KĐ. 
D&#7921; ki&#7871;n &#273;&#432;a các thi&#7871;t b&#7883; trên &#273;i vào ngày &nbsp;&nbsp;&nbsp;/<?php echo $m;?>/<?php echo $y;?>&nbsp;
và nh&#7853;n l&#7841;i vào ngày &nbsp;&nbsp;&nbsp;/<?php echo $m;?>/<?php echo $y;?><o:p></o:p></span></p>

<p class=MsoNormal style='text-align:justify'><span lang=NL style='font-size:
12.0pt;mso-ansi-language:NL'><span style='mso-spacerun:yes'>     </span>V&#7853;y,
Kính mong Ông gi&#7843;i quy&#7871;t!<o:p></o:p></span></p>

<p class=MsoNormal><span lang=NL style='font-size:12.0pt;mso-ansi-language:
NL'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=NL style='font-size:12.0pt;mso-ansi-language:
NL'><span style='mso-spacerun:yes'>     </span>Trân tr&#7885;ng&nbsp;!<o:p></o:p></span></p>

<p class=MsoNormal><span lang=NL style='font-size:12.0pt;mso-ansi-language:
NL'><span style='mso-spacerun:yes'> </span><o:p></o:p></span></p>

<p class=MsoNormal><span lang=NL style='font-size:12.0pt;mso-ansi-language:
NL'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='font-size:12.0pt;mso-ansi-language:NL'><span
style='mso-spacerun:yes'>                                       </span><span
style='mso-spacerun:yes'>                                        </span><span
style='mso-spacerun:yes'>  </span><span style='mso-spacerun:yes'>  </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;X&#432;&#7903;ng SCTBĐVL<o:p></o:p></span></b></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='font-size:12.0pt;mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='font-size:12.0pt;mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='font-size:12.0pt;mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='font-size:12.0pt;mso-ansi-language:NL'><span
style='mso-spacerun:yes'>                                                                     
</span><span style='mso-spacerun:yes'>                        </span><span
style='mso-spacerun:yes'> </span>Trương Ngọc Sang<span
style='mso-spacerun:yes'>     </span><o:p></o:p></span></b></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='font-size:12.0pt;mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal><span lang=NL style='font-size:10.0pt;mso-ansi-language:
NL'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='font-size:12.0pt;mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='font-size:12.0pt;mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='font-size:12.0pt;mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='font-size:12.0pt;mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='font-size:12.0pt;mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='font-size:12.0pt;mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='font-size:12.0pt;mso-ansi-language:NL'>XN &#272;&#7882;A V&#7852;T LÝ
G/K</span></b><span lang=NL style='font-size:12.0pt;mso-ansi-language:NL'><span
style='mso-spacerun:yes'>               </span><span style='mso-spacerun:yes'>       </span><b style='mso-bidi-font-weight:
normal'>C&#7896;NG HÒA XÃ H&#7896;I CH&#7910; NGH&#296;A VI&#7878;T NAM</b><o:p></o:p></span></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='font-size:12.0pt;mso-ansi-language:NL'>X&#432;&#7903;ng SCTB ĐỊA VẬT LÝ</span></b><span lang=NL style='font-size:12.0pt;mso-ansi-language:
NL'><span style='mso-spacerun:yes'>                        </span><span
style='mso-spacerun:yes'>         </span><b style='mso-bidi-font-weight:normal'><u>&#272;&#7897;c
l&#7853;p - T&#7921; do - H&#7841;nh phúc</u></b><o:p></o:p></span></p>

<p class=MsoNormal><span lang=NL style='font-size:12.0pt;mso-ansi-language:
NL'><span
style='mso-spacerun:yes'>                                                                     
</span><o:p></o:p></span></p>

<p class=MsoNormal><span lang=NL style='font-size:12.0pt;mso-ansi-language:
NL'><span
style='mso-spacerun:yes'>                                                                 
</span><i style='mso-bidi-font-style:normal'>V&#361;ng Tàu, ngày <?php echo date('d'); ?> tháng <?php echo date('m') ?> n&#259;m <?php echo date('Y'); ?><o:p></o:p></i></span></p>

<p class=MsoNormal><span lang=NL style='font-size:10.0pt;mso-ansi-language:
NL'><span style='mso-spacerun:yes'> </span><o:p></o:p></span></p>

<p class=MsoNormal style='margin-left:1.0in;text-indent:.5in'><b
style='mso-bidi-font-weight:normal'><i style='mso-bidi-font-style:normal'><u><span
lang=NL style='font-size:12.0pt;mso-ansi-language:NL'>Kính g&#7917;i</span></u></i></b><b
style='mso-bidi-font-weight:normal'><span lang=NL style='font-size:12.0pt;
mso-ansi-language:NL'>:<span style='mso-spacerun:yes'>  </span>B&#7897;
ph&#7853;n nh&#7853;n m&#7851;u<o:p></o:p></span></b></p>

<p class=MsoNormal style='margin-left:1.5in'><b style='mso-bidi-font-weight:
normal'><i style='mso-bidi-font-style:normal'><span lang=NL style='font-size:
12.0pt;mso-ansi-language:NL'><span style='mso-spacerun:yes'>     </span></span></i></b><b
style='mso-bidi-font-weight:normal'><span lang=NL style='font-size:12.0pt;
mso-ansi-language:NL'><span style='mso-spacerun:yes'>           </span><span
style='mso-spacerun:yes'>  </span>Công ty TNHH TM &amp; DV GIÁM &#272;&#7882;NH
MI&#7872;N NAM<o:p></o:p></span></b></p>

<p class=MsoNormal style='margin-left:1.0in'><b style='mso-bidi-font-weight:
normal'><span lang=NL style='font-size:12.0pt;mso-ansi-language:NL'><span
style='mso-spacerun:yes'>                              </span>&#272;&#7883;a
ch&#7881;: 213/3/7 Lê H&#7891;ng Phong-F8-V&#361;ng Tàu<o:p></o:p></span></b></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='font-size:12.0pt;mso-ansi-language:NL'><span
style='mso-spacerun:yes'>                 </span><span style='mso-tab-count:
3'>                               </span><span
style='mso-spacerun:yes'>     </span><span
style='mso-spacerun:yes'> </span>Tel: 064 3592402 ; Fax: 064 3592402<o:p></o:p></span></b></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='font-size:12.0pt;mso-ansi-language:NL'><span
style='mso-spacerun:yes'>                                                     
</span>Mobil: 0983977909<o:p></o:p></span></b></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='font-size:12.0pt;mso-ansi-language:NL'><span
style='mso-spacerun:yes'>       </span><span
style='mso-spacerun:yes'>                                               </span>Email:
viethungsic@gmail.com<o:p></o:p></span></b></p>

<p class=MsoNormal style='text-align:justify'><span lang=NL style='font-size:
12.0pt;mso-ansi-language:NL'><span style='mso-spacerun:yes'>        </span>X&#432;&#7903;ng
s&#7917;a ch&#7919;a thiết bị Địa v&#7853;t lý
(X&#432;&#7903;ng SCTBĐVL) - Xí nghi&#7879;p &#272;&#7883;a
v&#7853;t lý gi&#7871;ng khoan-Liên doanh Vi&#7879;t-Nga Vietsovpetro g&#7917;i
&#273;&#7871;n Công ty TNHH TH&#431;&#416;NG M&#7840;I &amp; DV GIÁM
&#272;&#7882;NH MI&#7872;N NAM (Công ty TNHH TM &amp; DV G&#272; MN) g&#7891;m  <?php echo $soluong; ?>  (<?php if($soluong==1){ echo "Một";}elseif($soluong==2){ echo "Hai";}elseif($soluong==3){ echo "Ba";}elseif($soluong==4){ echo "Bốn";}elseif($soluong==5){ echo "Năm";}elseif($soluong==6){ echo "Sáu";}elseif($soluong==7){ echo "Bảy";}elseif($soluong==8){ echo "Tám";}elseif($soluong==9){ echo "Chín";}elseif($soluong==10){ echo "Mười";}elseif($soluong==11){ echo "Mười một";}elseif($soluong==12){ echo "Mười hai";}elseif($soluong==13){ echo "Mười ba";}elseif($soluong==14){ echo "Mười bốn";}elseif($soluong==15){ echo "Mười năm";}elseif($soluong==16){ echo "Mười sáu";}elseif($soluong==17){ echo "Mười bảy";}elseif($soluong==18){ echo "Mười tám";}elseif($soluong==2){ echo "Mười chín";}elseif($soluong==20){ echo "Hai mươi";}elseif($soluong==21){ echo "Hai mươi mốt";}elseif($soluong==22){ echo "Hai mươi hai";} ?>)
 thi&#7871;t b&#7883; &#273;&#7875; Hi&#7879;u
chu&#7849;n theo danh sách d&#432;&#7899;i &#273;ây :<o:p></o:p></span></p>

<p class=MsoNormal align=center style='text-align:center'><span lang=NL
style='font-size:12.0pt;mso-ansi-language:NL'><b>THI&#7870;T B&#7882; &#272;O
L&#431;&#7900;NG C&#7910;A XÍ NGHI&#7878;P &#272;&#7882;A V&#7852;T LÝ
GI&#7870;NG KHOAN YÊU C&#7846;U</b><b style='mso-bidi-font-weight:normal'><o:p></o:p></b></span></p>

<p class=MsoNormal align=center style='text-align:center'><span lang=NL
style='font-size:12.0pt;mso-ansi-language:NL'><b>HI&#7878;U CHU&#7848;N T&#7840;I
Công ty TNHH TM &amp; DV G&#272; MN</b><o:p></o:p></span></p>

<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 width=744
 style='width:557.9pt;margin-left:-61.8pt;border-collapse:collapse;border:none;
 mso-border-alt:solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:
 0in 5.4pt 0in 5.4pt;mso-border-insideh:.5pt solid windowtext;mso-border-insidev:
 .5pt solid windowtext'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=36 valign=top style='width:26.7pt;border:solid windowtext 1.0pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span lang=NL style='font-size:12.0pt;
  mso-ansi-language:NL'>Stt<o:p></o:p></span></b></p>
  </td>
  <td width=222 valign=top style='width:166.5pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span lang=NL style='font-size:12.0pt;
  mso-ansi-language:NL'>Tên thi&#7871;t b&#7883; <o:p></o:p></span></b></p>
  </td>
  <td width=84 valign=top style='width:63.0pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span lang=NL style='font-size:12.0pt;
  mso-ansi-language:NL'>Ký hi&#7879;u<o:p></o:p></span></b></p>
  </td>
  <td width=108 valign=top style='width:81.0pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span lang=NL style='font-size:12.0pt;
  mso-ansi-language:NL'>S&#7889; máy<o:p></o:p></span></b></p>
  </td>
  <td width=150 valign=top style='width:112.5pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span lang=NL style='font-size:12.0pt;
  mso-ansi-language:NL'>B&#7897; ph&#7853;n s&#7917; d&#7909;ng<o:p></o:p></span></b></p>
  </td>
  <td width=72 valign=top style='width:.75in;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span lang=NL style='font-size:12.0pt;
  mso-ansi-language:NL'>Yêu c&#7847;u<o:p></o:p></span></b></p>
  </td>
  <td width=72 valign=top style='width:54.2pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span lang=NL style='font-size:12.0pt;
  mso-ansi-language:NL'>Ghi chú<o:p></o:p></span></b></p>
  </td>
 </tr>
 <?php 
 $stt=1;
 		$r8=mysql_query("SELECT DISTINCT * FROM kehoach_iso WHERE thang='$m' and namkh='$y' and noithuchien='MN'");
		while($row = mysql_fetch_array($r8))
		{
			$tenthietbi=$row['tenthietbi'];
			$mahieu=$row['mahieu'];
			$sm=$row['somay']; 
			

			$r10=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$mahieu'");
			while($row = mysql_fetch_array($r10))
			{
				$tenviettat=$row['tenviettat'];
				$bophansh=$row['bophansh'];
				$chusohuu=$row['chusohuu'];
			}
			$r3=mysql_query("SELECT DISTINCT * FROM donvi_iso WHERE madv='$bophansh'");
			while($row = mysql_fetch_array($r3))
			{
				$tendv=$row['tendv'];
			}
			?>
 <tr style='mso-yfti-irow:1'>
  <td width=35 valign=top style='width:25.9pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><span lang=NL
  style='font-size:12.0pt;mso-ansi-language:NL'><?php echo $stt; ?><o:p></o:p></span></p>
  </td>
  <td width=225 valign=top style='width:168.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span lang=NL style='font-size:12.0pt;mso-ansi-language:
  NL'><?php echo $tenthietbi; ?> <span style='mso-spacerun:yes'> </span><o:p></o:p></span></p>
  </td>
  <td width=90 valign=top style='width:67.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span lang=NL style='font-size:12.0pt;mso-ansi-language:
  NL'><?php echo $tenviettat; ?><o:p></o:p></span></p>
  </td>
  <td width=108 valign=top style='width:81.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span lang=NL style='font-size:12.0pt;mso-ansi-language:
  NL'>&#8470;</span><span lang=NL style='font-size:12.0pt;font-family:VNI-Times;
  mso-ansi-language:NL'> </span><span style='font-size:12.0pt'><?php echo $sm; ?></span><span
  lang=NL style='font-size:12.0pt;font-family:VNI-Times;mso-ansi-language:NL'><o:p></o:p></span></p>
  </td>
  <td width=150 valign=top style='width:112.5pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span lang=NL style='font-size:12.0pt;font-family:VNI-Times;
  mso-ansi-language:NL'><?php echo $tendv; ?></span><span
  style='font-size:12.0pt'><o:p></o:p></span></p>
  </td>
  <td width=72 valign=top style='width:.75in;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><span lang=NL
  style='font-size:12.0pt;font-family:VNI-Times;mso-ansi-language:NL'>H/C<o:p></o:p></span></p>
  </td>
  <td width=70 valign=top style='width:52.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><span lang=NL
  style='font-size:12.0pt;font-family:VNI-Times;mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <?php $stt++; } ?>
</table>

<p class=MsoNormal style='text-align:justify'><span lang=NL style='font-size:
12.0pt;mso-ansi-language:NL'><span style='mso-spacerun:yes'>     
</span>-Th&#7901;i gian giao thi&#7871;t b&#7883;&nbsp;: Ngày &nbsp;&nbsp;&nbsp;/<?php echo $m;?>/<?php echo $y;?><o:p></o:p></span></p>

<p class=MsoNormal style='text-align:justify'><span lang=NL style='font-size:
12.0pt;mso-ansi-language:NL'><span style='mso-spacerun:yes'>      </span>-Th&#7901;i
gian tr&#7843; l&#7841;i thi&#7871;t b&#7883;&nbsp;: Ngày &nbsp;&nbsp;&nbsp;/<?php echo $m;?>/<?php echo $y;?> <span
style='mso-spacerun:yes'> </span><span style='mso-spacerun:yes'> </span><o:p></o:p></span></p>

<p class=MsoNormal style='text-align:justify'><span lang=NL style='font-size:
12.0pt;mso-ansi-language:NL'><span style='mso-spacerun:yes'>     
</span>-Ph&#432;&#417;ng th&#7913;c thanh toán&nbsp;b&#7857;ng chuy&#7875;n
kho&#7843;n nh&#432; &#273;ã ký k&#7871;t trong h&#7907;p &#273;&#7891;ng
gi&#7919;a XN &#272;&#7883;a v&#7853;t lý gi&#7871;ng khoan v&#7899;i Công ty
TNHH TM &amp; DV G&#272; MN khi nh&#7853;n l&#7841;i thi&#7871;t b&#7883; và
h&#7891; s&#417; k&#7871;t qu&#7843; b&#7857;ng v&#259;n b&#7843;n c&#7911;a
t&#7915;ng thi&#7871;t b&#7883; &#273;ã hi&#7879;u chu&#7849;n <b
style='mso-bidi-font-weight:normal'>.<o:p></o:p></b></span></p>

<p class=MsoNormal style='text-align:justify'><b style='mso-bidi-font-weight:
normal'><span lang=NL style='font-size:12.0pt;mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal><span lang=NL style='font-size:12.0pt;mso-ansi-language:
NL'><span style='mso-spacerun:yes'>      </span>Trân tr&#7885;ng&nbsp;!<o:p></o:p></span></p>

<p class=MsoNormal><span lang=NL style='font-size:12.0pt;mso-ansi-language:
NL'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=NL style='font-size:12.0pt;mso-ansi-language:
NL'><span style='mso-spacerun:yes'>       </span><o:p></o:p></span></p>

<p class=MsoNormal><span lang=NL style='font-size:12.0pt;mso-ansi-language:
NL'><span style='mso-spacerun:yes'>            </span><span
style='mso-spacerun:yes'>  </span><span style='mso-spacerun:yes'>       </span><span
style='mso-spacerun:yes'> </span><b style='mso-bidi-font-weight:normal'><u>Bên
nh&#7853;n</u></b> <span style='mso-spacerun:yes'>   </span><span
style='mso-spacerun:yes'>                                                                 </span><b
style='mso-bidi-font-weight:normal'><u>Bên giao</u></b><span
style='mso-spacerun:yes'>  </span><o:p></o:p></span></p>

<p class=MsoNormal><span lang=NL style='font-size:12.0pt;mso-ansi-language:
NL'><span style='mso-spacerun:yes'>                                            
</span><span style='mso-spacerun:yes'>                      </span><span
style='mso-spacerun:yes'> </span><span style='mso-spacerun:yes'> </span><b
style='mso-bidi-font-weight:normal'><o:p></o:p></b></span></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='font-size:12.0pt;mso-ansi-language:NL'>Công ty TNHH TM&amp;DV G&#272; MN<span
style='mso-spacerun:yes'>                                </span><span
style='mso-spacerun:yes'>    </span><span
style='mso-spacerun:yes'> </span><span style='mso-spacerun:yes'> </span>X&#432;&#7903;ng SCTBĐVL<o:p></o:p></span></b></p>

<p class=MsoNormal><span lang=NL style='font-size:12.0pt;mso-ansi-language:
NL'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=NL style='font-size:12.0pt;mso-ansi-language:
NL'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=NL style='font-size:12.0pt;mso-ansi-language:
NL'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
style='font-size:12.0pt;mso-ansi-language:NL'><span
style='mso-spacerun:yes'>         </span><span
style='mso-spacerun:yes'>      </span><span style='mso-spacerun:yes'>   </span>Phan
Vi&#7871;t Hùng<span
style='mso-spacerun:yes'>                                                
</span><span style='mso-spacerun:yes'>     </span><span
style='mso-spacerun:yes'> </span><span style='mso-spacerun:yes'>       </span>V&#361;
Anh &#272;&#7913;c<o:p></o:p></span></b></p>

<p class=MsoNormal><span lang=NL style='font-size:12.0pt;mso-ansi-language:
NL'><span style='mso-spacerun:yes'>                         </span><o:p></o:p></span></p>

<p class=MsoNormal><span lang=NL style='font-size:12.0pt;mso-ansi-language:
NL'><span
style='mso-spacerun:yes'>                                                                             
</span><o:p></o:p></span></p>

<p class=MsoNormal><span lang=NL style='font-size:12.0pt;mso-ansi-language:
NL'><span style='mso-spacerun:yes'> </span></span><span lang=NL
style='font-size:10.0pt;mso-ansi-language:NL'>N&#417;i g&#7917;i&nbsp;:</span><span
lang=NL style='font-size:12.0pt;mso-ansi-language:NL'><o:p></o:p></span></p>

<p class=MsoNormal><span lang=NL style='font-size:10.0pt;mso-ansi-language:
NL'><span style='mso-spacerun:yes'>           </span><span
style='mso-spacerun:yes'>      </span><span
style='mso-spacerun:yes'> </span>Nh&#432; trên<o:p></o:p></span></p>

<p class=MsoNormal><span lang=NL style='font-size:10.0pt;mso-ansi-language:
NL'><span style='mso-spacerun:yes'>            </span><span
style='mso-spacerun:yes'>     </span><span style='mso-spacerun:yes'> </span>L&#432;u
X&#432;&#7903;ng SCTBĐVL<o:p></o:p></span></p>

<p class=MsoNormal><span lang=NL style='font-size:10.0pt;mso-ansi-language:
NL'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=NL style='font-size:10.0pt;mso-ansi-language:
NL'><o:p>&nbsp;</o:p></span></p>

</div>

</body>

</html>


 
  
<?php

header("Content-Type: application/msword");
header("Content-Disposition:attchment;filename=\"GKDMNT$m.doc\""); 
header("Pragma: no-cache");
header("Expires: 0");
exit;

 } ?>
 
 <?php if($find!=""){
if(isset($_GET['month'])){
$m = $_GET['month'];
}else{
$m = isset($_POST['month']) ? $_POST['month'] : '';
}
 
$y=date('Y');
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
?>
<form method="post" action="bangcanhbao.php" enctype="multipart/form-data">
<div align="center"><strong><font size="+1">BẢNG THÔNG BÁO HIỆU CHUẨN KIỂM ĐỊNH </br>THÁNG <?php echo $m; ?> NĂM <?php echo $y; ?></font></strong></div>

<p> Chọn tháng <select name='month'>
<option value='<?php echo $m;?>'> Tháng <?php echo $m;?> </option>
<option value='1'> Tháng 1 </option>
<option value='2'> Tháng 2 </option>
<option value='3'> Tháng 3 </option>
<option value='4'> Tháng 4 </option>
<option value='5'> Tháng 5 </option>
<option value='6'> Tháng 6 </option>
<option value='7'> Tháng 7 </option>
<option value='8'> Tháng 8 </option>
<option value='9'> Tháng 9 </option>
<option value='10'> Tháng 10 </option>
<option value='11'> Tháng 11 </option>
<option value='12'> Tháng 12 </option>
</select>
<input type=submit name='find' value='Tìm kiếm'>

</p>

<?php 
$delete1="DELETE FROM kehoach_temp";
mysql_query($delete1) or die(mysql_error());

$result =mysql_query("select count(stt)as sum from kehoach_iso where thang='$m' and namkh='$y'");
while($row=mysql_fetch_array($result)){
	$total_records=$row['sum'];
}
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$row_per_page=10; //Số dòng trên 1 trang
//tính số dòng cần hiển thị
//$rows=mysql_num_rows($tin);
//tính số trang cần để hiển thị
$page=ceil($total_records/$row_per_page); 
 //nếu số dòng trong CSDL nhỏ hơn hoặc bằng số dòng trên 1 trang thì chỉ có 1 trang để hiển thị


if ($current_page > $page){
       $current_page = $page;
}
else if ($current_page < 1){
      $current_page = 1;
}
$start = ($current_page - 1) * $row_per_page;


$insert1="insert into kehoach_temp(tenthietbi,mahieu,somay,hangsx,noithuchien,thang,namkh,loaitb,ghichu) select tenthietbi,mahieu,somay,hangsx,noithuchien,thang,namkh,loaitb,ghichu from kehoach_iso where thang='$m' and namkh='$y' order by noithuchien asc,loaitb asc"; 
mysql_query($insert1) or die(mysql_error());

$sql=mysql_query("select * from kehoach_temp LIMIT $start,$row_per_page"); //bắt đầu lấy dữ liệu (^)_(^)


?>
 <br/> <?php $stt=$start+1; ?>
   <div class="CSSTableGenerator">
  <table  border="0" cellpadding="0" cellspacing="0" class="table1">
    <tr bgcolor="#FF9900">
      <td width="60" height="82" bgcolor="#0000FF"><div align="center" class="style2">STT </div></td>
	  <td width="159" nowrap="nowrap" bgcolor="#0000FF"><div align="center" class="style2">SỐ HỒ SƠ</div></td>
      <td width="159" nowrap="nowrap" bgcolor="#0000FF"><div align="center" class="style2">TÊN MÁY</div></td>
      <td width="139" bgcolor="#0000FF"> <div align="center" class="style2">SỐ MÁY </div></td>
      <td width="101" bgcolor="#0000FF"><div align="center" class="style2">CÔNG VIỆC</div></td>
	   <td width="136" bgcolor="#0000FF"><div align="center" class="style2">NTH </div></td>
      <td width="152" bgcolor="#0000FF"><div align="center" class="style2">NHÂN VIÊN </div></td>
      <td width="147" bgcolor="#0000FF"><div align="center" class="style2">NƠI THỰC HIỆN </div></td>
      <td width="127" bgcolor="#0000FF"><div align="center" class="style2">CHỦ SỞ HỮU </div></td>
     
    </tr>

<?php
$th=0;
$ch1=0;
while($row=mysql_fetch_array($sql)){
		 	
			$tenthietbi[$stt] =$row['tenthietbi'];
			$tenmay[$stt] =$row['mahieu'];
			$somay[$stt] =$row['somay'];
			$noithuchien[$stt] =$row['noithuchien'];
			$thang[$stt] =$row['thang'];
			
			
			
			$r19=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$tenmay[$stt]'");
			while($row=mysql_fetch_array($r19)){
					$tenviettat[$stt]=$row['tenviettat'];
					$bophansh[$stt] =$row['bophansh'];
					$chusohuu[$stt] =$row['chusohuu'];
			}
			$sohs[$stt]="";
			$congviec[$stt]="";
			$ngayth[$stt]="";
			$nhanvien[$stt]="";
			$ttkt[$stt]="";
		//	$r20=mysql_query("SELECT DISTINCT * FROM hosohckd_iso WHERE tenmay='$tenmay[$stt]' and namkh='$y' and dotxuat!='on'");
			$r20=mysql_query("SELECT DISTINCT * FROM hosohckd_iso WHERE tenmay='$tenmay[$stt]' and namkh='$y'");
			while($row=mysql_fetch_array($r20)){
					$sohs[$stt]=$row['sohs'];
					$congviec[$stt]=$row['congviec'];
					$ngayth[$stt]=$row['ngayhc'];
					$nhanvien[$stt]=$row['nhanvien'];
					$ttkt[$stt] =$row['ttkt'];
					//$th=date("m", strtotime($ngayth[$stt]));
				 	
			}
			if($ngayth[$stt]==""){
				$bkground="#FFFFFF";
			}else{
				if($ttkt[$stt]=="Tốt"){
					$bkground="#A0FFFF";
				}elseif($ttkt[$stt]=="Hỏng"){
					$bkground="#FFA0A0";
				}
			}
			
?> 
 <tr bgcolor="<?php echo $bkground; ?>">
      <td height="49" style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo $stt; ?></div></td>
       <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php if($ttkt[$stt]=="Tốt"){echo $sohs[$stt]; } ?></div></td>
	  <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center">
	 
	   <a href="bangcanhbao.php?hosohc=hoso&&tenthietbi=<?php echo $tenmay[$stt]; ?>&&nam=<?php echo $y;?>&&thang=<?php echo $m;?>&&ngayhc=<?php echo $ngayth[$stt];?>&&noithuchien=<?php echo $noithuchien[$stt];?>&&username=<?php echo $username; ?>&&password=<?php echo $password;?>"><?php echo $tenviettat[$stt]; ?></a>
	  
</div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo $somay[$stt]; ?></div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php  echo $congviec[$stt]; ?></div></td>
	   <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php if($ttkt[$stt]=="Tốt"){echo date("d-m-Y", strtotime($ngayth[$stt]));} ?></div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php if($ttkt[$stt]=="Tốt"){echo mb_convert_case($nhanvien[$stt], MB_CASE_TITLE, "UTF-8"); } ?></div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo $noithuchien[$stt]; ?></div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php if($bophansh[$stt]!="XDT"){echo $bophansh[$stt];}else{echo $chusohuu[$stt];} ?><?php if($ttkt[$stt]=="Hỏng"){ echo "(".$ttkt[$stt].")";   }?></div></td>
	 
    </tr>
   <?php 
   $stt++;} ?>

   
</table>
 </div>
<div class="footer" style="border:1px solid #666666;background:#CCCCCC">

 <?php 
   // PHẦN HIỂN THỊ PHÂN TRANG
   // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
   // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
   if ($current_page > 1 && $page > 1){
         echo '<a href="bangcanhbao.php?page='.($current_page-1).'&&username='.$username.'&&password='.$password.'&&find=Tìm kiếm&&month='.$m.'">Prev</a> | ';
   }
 
   // Lặp khoảng giữa
   for ($i = 1; $i <= $page; $i++){
         // Nếu là trang hiện tại thì hiển thị thẻ span
         // ngược lại hiển thị thẻ a
         if ($i == $current_page){
                echo '<span>'.$i.'</span> | ';
    }
    else{
             echo '<a href="bangcanhbao.php?page='.$i.'&&username='.$username.'&&password='.$password.'&&find=Tìm kiếm&&month='.$m.'">'.$i.'</a> | ';
        }
    }
 
     // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
     if ($current_page < $page && $page > 1){
           echo '<a href="bangcanhbao.php?page='.($current_page+1).'&&username='.$username.'&&password='.$password.'&&find=Tìm kiếm&&month='.$m.'">Next</a> | ';
  }
?>


</div>

<?php //bang table1 ?>

</form> 
 

 <?php } ?>
<?php if($them!=""&&$search==""){
$delete1="DELETE FROM kehoach_temp";
mysql_query($delete1) or die(mysql_error());

$y=date('Y');
$tenthietbi = isset($_POST['tenthietbi']) ? $_POST['tenthietbi'] : '';
$noith = isset($_POST['noith']) ? $_POST['noith'] : '';
if(isset($_GET['thang'])){
$m = $_GET['thang'];
}else{
$m = isset($_POST['thang']) ? $_POST['thang'] : '';
}
 
$r19=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$tenthietbi'");
while($row=mysql_fetch_array($r19)){
	$tentb=$row['tenthietbi'];
	$sm =$row['somay'];
	$hsx =$row['hangsx'];
	$ltb =$row['loaitb'];
}
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
if($tenthietbi!=""){
$insert = "insert into kehoach_iso(
tenthietbi,
mahieu,
somay,
hangsx,
noithuchien,
thang,
namkh,
loaitb,
ghichu
) values (
'$tentb',
'$tenthietbi',
'$sm',
'$hsx',
'$noith',
'$m',
'$y',
'$ltb',
'DX'
)" ;
mysql_query($insert) or die(mysql_error()); 
 }
  ?> 
 <div align="center"><strong><font size="+1">DANH SÁCH HIỆU CHUẨN / KIỂM ĐỊNH </font></strong></div>

<form method="post" action="bangcanhbao.php" enctype="multipart/form-data">
<p style="margin-left:50px;">Chọn tháng <select name='thang' style="width:150px;height:30px;border:1px solid #CCCCCC;">
<option value="<?php echo $m; ?>">Tháng <?php echo $m; ?> </option>
<option value="1">Tháng 1 </option>
<option value="2">Tháng 2 </option>
<option value="3">Tháng 3 </option>
<option value="4">Tháng 4 </option>
<option value="5">Tháng 5 </option>
<option value="6">Tháng 6 </option>
<option value="7">Tháng 7 </option>
<option value="8">Tháng 8 </option>
<option value="9">Tháng 9 </option>
<option value="10">Tháng 10 </option>
<option value="11">Tháng 11 </option>
<option value="12">Tháng 12 </option>
</select>
<input type="submit" name="search" value="Tìm kiếm">
</p>
<p style="margin-left:50px;">
Tên thiết bị
 <select name="tenthietbi" style="width:600px;height:30px;border:none;"  id="states1">
	<option value=""></option> 
	<?php $r1=mysql_query("SELECT DISTINCT tenthietbi FROM thietbihckd_iso ");
		while($row = mysql_fetch_array($r1))
		{
			$tentb=$row['tenthietbi']; ?>
	
	<optgroup style="display:table-row;" label="<?php echo $tentb; ?>">
	 <?php $r4=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE tenthietbi='$tentb'");
		while($row = mysql_fetch_array($r4))
		{
			$mavt =$row['mavattu'];
			$tenvt =$row['tenviettat'];
			$sm=$row['somay'];
			?>
			<option value="<?php echo $mavt; ?>"> <?php echo $tenvt;?>  <?php echo $sm;?> </option>
		<?php }}?> 
		</optgroup>
		</select>
	Nơi thực hiện 
	<select name="noith" style="width:200px;height:30px;border:1px solid #CCCCCC;" >
	<option value="MN">Giám định Miền Nam</option>
	<option value="XNKT">Xí nghiệp Khai Thác</option>
	<option value="XNĐVLGK">Xí nghiệp Địa vật lý Giếng khoan</option>
	</select>	
<input type="submit" name="them" value="Thêm thiết bị">
</p>
<?php 



$r1=mysql_query("select count(*)as sum from kehoach_iso where thang='$m' and namkh='$y'");
while($row=mysql_fetch_array($r1)){
	$rows=$row['sum'];
}
$row_per_page=10; //Số dòng trên 1 trang
//tính số dòng cần hiển thị
//$rows=mysql_num_rows($tin);
//tính số trang cần để hiển thị
if ($rows>$row_per_page) $page=ceil($rows/$row_per_page); 
else $page=1; //nếu số dòng trong CSDL nhỏ hơn hoặc bằng số dòng trên 1 trang thì chỉ có 1 trang để hiển thị

if(isset($_GET['start']) && (int)$_GET['start'])
     $start=$_GET['start']; //dòng bắt đầu từ nơi ta muốn lấy
else $start=0;

$insert1="insert into kehoach_temp(tenthietbi,mahieu,somay,hangsx,noithuchien,thang,namkh,loaitb,ghichu) select tenthietbi,mahieu,somay,hangsx,noithuchien,thang,namkh,loaitb,ghichu from kehoach_iso where thang='$m' and namkh='$y' order by noithuchien asc,loaitb asc"; 
mysql_query($insert1) or die(mysql_error());

$sql=mysql_query("select * from kehoach_temp LIMIT $start,$row_per_page"); //bắt đầu lấy dữ liệu (^)_(^)

$i=1;

?>
 <br/> <?php $stt=$start+1; ?>
  <div class="CSSTableGenerator">
  <table  border="0" cellpadding="0" cellspacing="0" class="table1">
    <tr bgcolor="#FF9900">
	  <td width="80" bgcolor="#0000FF"></td>
      <td width="40" bgcolor="#0000FF"><div align="center" class="style2">STT </div></td>
	  <td width="160" nowrap="nowrap" bgcolor="#0000FF"><div align="center" class="style2">TÊN THIẾT BỊ</div></td>
      <td width="100" nowrap="nowrap" bgcolor="#0000FF"><div align="center" class="style2">MÃ HIỆU</div></td>
      <td width="139" bgcolor="#0000FF"> <div align="center" class="style2">SỐ MÁY </div></td>
      <td width="101" bgcolor="#0000FF"><div align="center" class="style2">CÔNG VIỆC</div></td>
      <td width="147" bgcolor="#0000FF"><div align="center" class="style2">NƠI THỰC HIỆN </div></td>
      <td width="127" bgcolor="#0000FF"><div align="center" class="style2">CHỦ SỞ HỮU </div></td>
	  <td width="140" bgcolor="#0000FF"><div align="center" class="style2">GHI CHÚ </div></td>
    </tr>
<?php while($row=mysql_fetch_array($sql)){
		 	
			$tenthietbihc[$i] =$row['tenthietbi'];
			$tenmayhc[$i] =$row['mahieu'];
			$somayhc[$i] =$row['somay'];
			$noithuchienhc[$i] =$row['noithuchien'];
			$ghichuhc[$i] =$row['ghichu'];
			
			$r19=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$tenmayhc[$i]'");
			while($row=mysql_fetch_array($r19)){
					$tenviettathc[$i]=$row['tenviettat'];
					$bophanshhc[$i] =$row['bophansh'];
					$chusohuuhc[$i] =$row['chusohuu'];
			}
			$sohshc[$i]="";
			$congviechc[$i]="";
			$ngaythhc[$i]="";
			$nhanvienhc[$i]="";
			$ttkthc[$i]="";
			$r20=mysql_query("SELECT DISTINCT *,date_format(`ngayhc`,'%d/%m/%Y') as ngayhc FROM hosohckd_iso WHERE tenmay='$tenmayhc[$i]' and namkh='$y' ");
			while($row=mysql_fetch_array($r20)){
					$sohshc[$i]=$row['sohs'];
					$congviechc[$i]=$row['congviec'];
					$ngaythhc[$i]=$row['ngayhc'];
					$ttkthc[$i] =$row['ttkt'];		
			}
			
			
?>  
 <tr>
      <td height="49" style="font:'Times New Roman', Times, serif;font-size:15px;">  
	  <?php if($ghichuhc[$i]=="DX"){ ?>
	  <input type="checkbox" name="chkDel[]" value="<?php echo $tenmayhc[$i]; ?>">
	 <input type="submit" name="del" WIDTH=20 HEIGHT=16 BORDER=0 ALT='' style="border:none;background:url(images/del.png) no-repeat;" value="&nbsp;&nbsp;&nbsp;Xóa" >
	  <?php }else{ ?>
	  <input type="checkbox" name="chkDel[]" value="<?php echo $tenmayhc[$i]; ?>" disabled="disabled">
	  <input type="submit" name="del" WIDTH=20 HEIGHT=16 BORDER=0 ALT='' style="border:none;background:url(images/del.png) no-repeat;" value="&nbsp;&nbsp;&nbsp;Xóa" disabled="disabled" >
	 <?php } ?>
	 </td>
      <td height="49" style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo $stt; ?></div></td>
	    <td style="font:'Times New Roman', Times, serif;font-size:15px;padding-left:20px;"><?php echo $tenthietbihc[$i]; ?></td>
	  <td style="font:'Times New Roman', Times, serif;font-size:15px;padding-left:20px;"><?php echo $tenviettathc[$i]; ?></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo $somayhc[$i]; ?></div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo "HC/KĐ";  ?></div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo $noithuchienhc[$i]; ?></div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php if($bophanshhc[$i]!="XDT"){ echo $bophanshhc[$i]; }else{ echo $chusohuuhc[$i]; }?></div></td>
	   <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php if($ghichuhc[$i]=="DK"){ ?> <input type="checkbox"name="dinhky" value="1" checked="checked"> Định kỳ <input type="checkbox"name="dotxuat" value="0"> Đột xuất <?php }else{ ?><input type="checkbox"name="dinhky" value="0"> Định kỳ<input type="checkbox"name="dotxuat" value="1" checked="checked"> Đột xuất
	   <?php } ?></div></td>
    </tr>
   <?php $i++;
   $stt++;} ?>

   
</table>
 </div>

 
  <div class="footer" style="border:1px solid #666666;background:#CCCCCC">
<?php
//b?t d?u phân trang

$page_cr=($start/$row_per_page)+1;

for($i=1;$i<=$page;$i++)
{
 if ($page_cr!=$i) echo "<a href='bangcanhbao.php?start=".$row_per_page*($i-1)."&&username=$username&&password=$password&&them=Thêm thiết bị&&thang=$m'>$i&nbsp;</a>";
 else echo $i." ";
}
?>
</div>

<?php //bang table1 ?>
<br/>

<table align="center">
<tr>	<input type="hidden" name="submit" value="">
<td>	<input type="image" name="submit" src="upload/phieuyc.jpg" value ="Phiếu yêu cầu" onClick="this.form.submit.value = this.value" /></td>
<td><input type="image" name="submit" src="upload/phieukt.jpg" value ="Phiếu XNKT" onClick="this.form.submit.value = this.value"/></td>
<td><input type="image" name="submit" src="upload/phieuMN.jpg" value ="Phiếu GĐMN" onClick="this.form.submit.value = this.value"/></td>


	
</form>
<form action="index.php" method="post">
  <input type=hidden name=username value="<?php echo $username;?>">
<input type=hidden name=password value="<?php echo $password;?>">
   <input type=hidden name="submit" value="Hồ sơ HC/KD">
 <td>	<input type="image" id="back" src="upload/backkh.jpg" /></td>
</form>
</tr>
</table>
 <?php } ?>
 <?php if($del!=""){ 
 
 $delete1="DELETE FROM kehoach_temp";
mysql_query($delete1) or die(mysql_error());
$y=date('Y');
$tenthietbi = isset($_POST['tenthietbi']) ? $_POST['tenthietbi'] : '';
$noith = isset($_POST['noith']) ? $_POST['noith'] : '';
if(isset($_GET['thang'])){
$m = $_GET['thang'];
}else{
$m = isset($_POST['thang']) ? $_POST['thang'] : '';
}
 
$r19=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$tenthietbi'");
while($row=mysql_fetch_array($r19)){
	$tentb=$row['tenthietbi'];
	$sm =$row['somay'];
	$hsx =$row['hangsx'];
	$ltb =$row['loaitb'];
}
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if(!empty($_POST["chkDel"])){
for($i=0;$i<count($_POST["chkDel"]);$i++)
{
	if($_POST["chkDel"][$i] != "")
	{
		$strSQL = "DELETE FROM kehoach_iso ";
		$strSQL .="WHERE mahieu = '".$_POST["chkDel"][$i]."' AND namkh = '$y'";
		$objQuery = mysql_query($strSQL);

		$strSQL1 = "DELETE FROM hosohckd_iso ";
		$strSQL1 .="WHERE tenmay = '".$_POST["chkDel"][$i]."' AND namkh = '$y'";
		$objQuery1 = mysql_query($strSQL1);
	} 
}
} 
 ?>
 
  <div align="center"><strong><font size="+1">DANH SÁCH HIỆU CHUẨN / KIỂM ĐỊNH </font></strong></div>

<form method="post" action="bangcanhbao.php" enctype="multipart/form-data">
<p style="margin-left:50px;">Chọn tháng <select name='thang' style="width:150px;height:30px;border:1px solid #CCCCCC;">
<option value="<?php echo $m; ?>">Tháng <?php echo $m; ?> </option>
<option value="1">Tháng 1 </option>
<option value="2">Tháng 2 </option>
<option value="3">Tháng 3 </option>
<option value="4">Tháng 4 </option>
<option value="5">Tháng 5 </option>
<option value="6">Tháng 6 </option>
<option value="7">Tháng 7 </option>
<option value="8">Tháng 8 </option>
<option value="9">Tháng 9 </option>
<option value="10">Tháng 10 </option>
<option value="11">Tháng 11 </option>
<option value="12">Tháng 12 </option>
</select>
<input type="submit" name="search" value="Tìm kiếm">
</p>
<p style="margin-left:50px;">
Tên thiết bị
 <select name="tenthietbi" style="width:600px;height:30px;border:none;"  id="states1">
	<option value=""></option> 
	<?php $r1=mysql_query("SELECT DISTINCT tenthietbi FROM thietbihckd_iso ");
		while($row = mysql_fetch_array($r1))
		{
			$tentb=$row['tenthietbi']; ?>
	
	<optgroup style="display:table-row;" label="<?php echo $tentb; ?>">
	 <?php $r4=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE tenthietbi='$tentb'");
		while($row = mysql_fetch_array($r4))
		{
			$mavt =$row['mavattu'];
			$tenvt =$row['tenviettat'];
			$sm=$row['somay'];
			?>
			<option value="<?php echo $mavt; ?>"> <?php echo $tenvt;?>  <?php echo $sm;?> </option>
		<?php }}?> 
		</optgroup>
		</select>
	Nơi thực hiện 
	<select name="noith" style="width:200px;height:30px;border:1px solid #CCCCCC;" >
	<option value="MN">Giám định Miền Nam</option>
	<option value="XNKT">Xí nghiệp Khai Thác</option>
	<option value="XNĐVLGK">Xí nghiệp Địa vật lý Giếng khoan</option>
	</select>	
<input type="submit" name="them" value="Thêm thiết bị">
</p>
<?php 



$r1=mysql_query("select count(*)as sum from kehoach_iso where thang='$m' and namkh='$y'");
while($row=mysql_fetch_array($r1)){
	$rows=$row['sum'];
}
$row_per_page=10; //Số dòng trên 1 trang
//tính số dòng cần hiển thị
//$rows=mysql_num_rows($tin);
//tính số trang cần để hiển thị
if ($rows>$row_per_page) $page=ceil($rows/$row_per_page); 
else $page=1; //nếu số dòng trong CSDL nhỏ hơn hoặc bằng số dòng trên 1 trang thì chỉ có 1 trang để hiển thị

if(isset($_GET['start']) && (int)$_GET['start'])
     $start=$_GET['start']; //dòng bắt đầu từ nơi ta muốn lấy
else $start=0;

$insert1="insert into kehoach_temp(tenthietbi,mahieu,somay,hangsx,noithuchien,thang,namkh,loaitb,ghichu) select tenthietbi,mahieu,somay,hangsx,noithuchien,thang,namkh,loaitb,ghichu from kehoach_iso where thang='$m' and namkh='$y' order by noithuchien asc,loaitb asc"; 
mysql_query($insert1) or die(mysql_error());

$sql=mysql_query("select * from kehoach_temp LIMIT $start,$row_per_page"); //bắt đầu lấy dữ liệu (^)_(^)
$i=1;

?>
 <br/> <?php $stt=$start+1; ?>
  <div class="CSSTableGenerator">
  <table  border="0" cellpadding="0" cellspacing="0" class="table1">
    <tr bgcolor="#FF9900">
	  <td width="80" bgcolor="#0000FF"></td>
      <td width="40" bgcolor="#0000FF"><div align="center" class="style2">STT </div></td>
	  <td width="160" nowrap="nowrap" bgcolor="#0000FF"><div align="center" class="style2">TÊN THIẾT BỊ</div></td>
      <td width="100" nowrap="nowrap" bgcolor="#0000FF"><div align="center" class="style2">MÃ HIỆU</div></td>
      <td width="139" bgcolor="#0000FF"> <div align="center" class="style2">SỐ MÁY </div></td>
      <td width="101" bgcolor="#0000FF"><div align="center" class="style2">CÔNG VIỆC</div></td>
      <td width="147" bgcolor="#0000FF"><div align="center" class="style2">NƠI THỰC HIỆN </div></td>
      <td width="127" bgcolor="#0000FF"><div align="center" class="style2">CHỦ SỞ HỮU </div></td>
	  <td width="140" bgcolor="#0000FF"><div align="center" class="style2">GHI CHÚ </div></td>
    </tr>
<?php while($row=mysql_fetch_array($sql)){
		 	
			$tenthietbihc[$i] =$row['tenthietbi'];
			$tenmayhc[$i] =$row['mahieu'];
			$somayhc[$i] =$row['somay'];
			$noithuchienhc[$i] =$row['noithuchien'];
			$ghichuhc[$i] =$row['ghichu'];
			
			$r19=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$tenmayhc[$i]'");
			while($row=mysql_fetch_array($r19)){
					$tenviettathc[$i]=$row['tenviettat'];
					$bophanshhc[$i] =$row['bophansh'];
					$chusohuuhc[$i] =$row['chusohuu'];
			}
			$sohshc[$i]="";
			$congviechc[$i]="";
			$ngaythhc[$i]="";
			$nhanvienhc[$i]="";
			$ttkthc[$i]="";
			$r20=mysql_query("SELECT DISTINCT *,date_format(`ngayhc`,'%d/%m/%Y') as ngayhc FROM hosohckd_iso WHERE tenmay='$tenmayhc[$i]' and namkh='$y' ");
			while($row=mysql_fetch_array($r20)){
					$sohshc[$i]=$row['sohs'];
					$congviechc[$i]=$row['congviec'];
					$ngaythhc[$i]=$row['ngayhc'];
					$ttkthc[$i] =$row['ttkt'];		
			}
		
?>  
 <tr>
      <td height="49" style="font:'Times New Roman', Times, serif;font-size:15px;">  
	  <?php if($ghichuhc[$i]=="DX"){ ?>
	  <input type="checkbox" name="chkDel[]" value="<?php echo $tenmayhc[$i]; ?>">
	 <input type="submit" name="del" WIDTH=20 HEIGHT=16 BORDER=0 ALT='' style="border:none;background:url(images/del.png) no-repeat;" value="&nbsp;&nbsp;&nbsp;Xóa" >
	  <?php }else{ ?>
	  <input type="checkbox" name="chkDel[]" value="<?php echo $tenmayhc[$i]; ?>" disabled="disabled">
	  <input type="submit" name="del" WIDTH=20 HEIGHT=16 BORDER=0 ALT='' style="border:none;background:url(images/del.png) no-repeat;" value="&nbsp;&nbsp;&nbsp;Xóa" disabled="disabled" >
	 <?php } ?>
	 </td>
      <td height="49" style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo $stt; ?></div></td>
	    <td style="font:'Times New Roman', Times, serif;font-size:15px;padding-left:20px;"><?php echo $tenthietbihc[$i]; ?></td>
	  <td style="font:'Times New Roman', Times, serif;font-size:15px;padding-left:20px;"><?php echo $tenviettathc[$i]; ?></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo $somayhc[$i]; ?></div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo "HC/KĐ";  ?></div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo $noithuchienhc[$i]; ?></div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php if($bophanshhc[$i]!="XDT"){ echo $bophanshhc[$i]; }else{ echo $chusohuuhc[$i]; }?></div></td>
	   <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php if($ghichuhc[$i]=="DK"){ ?> <input type="checkbox"name="dinhky" value="1" checked="checked"> Định kỳ <input type="checkbox"name="dotxuat" value="0"> Đột xuất <?php }else{ ?><input type="checkbox"name="dinhky" value="0"> Định kỳ<input type="checkbox"name="dotxuat" value="1" checked="checked"> Đột xuất
	   <?php } ?></div></td>
    </tr>
   <?php $i++;
   $stt++;} ?>

   
</table>
 </div>

 
  <div class="footer" style="border:1px solid #666666;background:#CCCCCC">
<?php
//b?t d?u phân trang

$page_cr=($start/$row_per_page)+1;

for($i=1;$i<=$page;$i++)
{
 if ($page_cr!=$i) echo "<a href='bangcanhbao.php?start=".$row_per_page*($i-1)."&&username=$username&&password=$password&&del=Xóa&&thang=$m'>$i&nbsp;</a>";
 else echo $i." ";
}
?>
</div>

<?php //bang table1 ?>
<br/>

<table align="center">
<tr>	<input type="hidden" name="submit" value="">
<td>	<input type="image" name="submit" src="upload/phieuyc.jpg" value ="Phiếu yêu cầu" onClick="this.form.submit.value = this.value" /></td>
<td><input type="image" name="submit" src="upload/phieukt.jpg" value ="Phiếu XNKT" onClick="this.form.submit.value = this.value"/></td>
<td><input type="image" name="submit" src="upload/phieuMN.jpg" value ="Phiếu GĐMN" onClick="this.form.submit.value = this.value"/></td>


</form>
<form action="index.php" method="post">
  <input type=hidden name=username value="<?php echo $username;?>">
<input type=hidden name=password value="<?php echo $password;?>">
   <input type=hidden name="submit" value="Hồ sơ HC/KD">
 <td>	<input type="image" id="back" src="upload/backkh.jpg" /></td>
</form>
</tr>
</table>
 
 <?php } ?>
 
</body>
<?php 
ob_flush();

?>




 


