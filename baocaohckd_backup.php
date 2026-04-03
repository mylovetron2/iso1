<?php
include ("select_data.php") ;
include ("myfunctions.php") ;
$n=0;
$mavt =  isset($_GET['mavt']) ? $_GET['mavt'] : '';
$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
if(isset($_GET['mavattu'])){
$_SESSION['mavattu'] = $_GET['mavattu'];
$mavt=$_GET['mavattu'];
}
if(isset($_GET['baocao'])){
$baocao=$_GET['baocao'];
}else{
$baocao = isset($_POST['baocao']) ? $_POST['baocao'] : '';
}
if ($baocao=="thongkehckd")    header("Location: thongkehckd.php"); 
if(isset($_GET['xemkh'])){
$xemkh=$_GET['xemkh'];
}else{
$xemkh = isset($_POST['xemkh']) ? $_POST['xemkh'] : '';
}
?><head>
          <meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
.style17 {color: #FFFFFF}
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
height: 30px;
}
.table1 th 
{
border:1px solid black;
font-weight: bold;
height:50px;
background-color:#87CEEB;
}
.table2
{
border-collapse:collapse;
width:100%;
border:1px solid black;
}
.table2 td
{
border:1px solid black;
text-align:left;
height: 30px;
}
.table2 th 
{
border:1px solid black;
font-weight: bold;
}
.datetime {
font-size: 14px;
width:600px;
height:30px;
border:1px solid #aaa;
background-clip: padding-box;
padding-left:8px; 
}
.datetime1 {
font-size: 14px;
width:600px;
height:30px;
border:1px solid #aaa;
background-clip: padding-box;
padding-left:8px; 
color:#FF0000;
}
.select_box{
border: 1px solid #aaa;
width:600px;
height:30px;
font-size:14px;
padding-left:5px;
}
</style>
</head>
<body>
<?php 
if($baocao=="kehoach"){
if(($xemkh!="")||($xemkh=="")){ 
if(isset($_GET['year'])){
$year=$_GET['year'];
}else{
$year = isset($_POST['year']) ? $_POST['year'] : '';
}
if ($xemkh=="") $year=$year=date("Y");
?>
<center><b> KẾ HOẠCH HIỆU CHUẨN/KIỂM ĐỊNH THIẾT BỊ THIẾT BỊ;<br/> KIỂM TRA MẪU CHUẨN /VẬT CHUẨN, THIẾT BỊ ĐO LƯỜNG CHUYỂN DỤNG <BR/>XÍ NGHIỆP ĐỊA VẬT LÝ GIẾNG KHOAN <br/> <u>NĂM <?php echo $year; ?></u> </b></center>
<br/>
<br/>
<form method="post" action="baocaohckd.php" enctype="multipart/form-data">
<table>
<tr>
<td>
NĂM <select name="year" style="width:150px;border:1px solid black;height:30px;">
<option value="<?php echo $year;?>"> <?php echo $year;?> </option>
<option value="2010"> 2010 </option>
<option value="2011"> 2011 </option>
<option value="2012"> 2012 </option>
<option value="2013"> 2013 </option>
<option value="2014"> 2014 </option>
<option value="2015"> 2015 </option>
<option value="2016"> 2016 </option>
<option value="2017"> 2017 </option>
<option value="2018"> 2018 </option>
<option value="2019"> 2019 </option>
<option value="2020"> 2020 </option>
<option value="2021"> 2021 </option>
<option value="2022"> 2022 </option>
<option value="2023"> 2023 </option>
<option value="2024"> 2024 </option>
<option value="2025"> 2025 </option>
<option value="2026"> 2026 </option>
<option value="2027"> 2027 </option>
<option value="2028"> 2028 </option>
<option value="2029"> 2029 </option>
<option value="2030"> 2030 </option>
</select>
</td>
<td><input type="image" name="xemkh" value ="Xem" src="upload/xemkh.jpg" alt="xem" onClick="this.form.xemkh.value = this.value"/>
    <input type=hidden name=xemkh value="">
    <input type=hidden name=baocao value="kehoach">
</td>
</tr>
</table>
<?php 
$r1=mysql_query("select count(*) as sum from kehoach_iso where namkh='$year'");
while($row=mysql_fetch_array($r1)){
	$total_records=$row['sum'];
}
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$row_per_page=20; //Số dòng trên 1 trang
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
//$sql1=mysql_query("select distinct * from kehoach_iso WHERE namkh='$year' order by thang asc  limit $start,$row_per_page"); 

?>
<br/>
<table width="100%" cellpadding="0" cellspacing="0" class="table1" id="dataTable">
<tr>
<th width="4%" rowspan="2"> Stt </th>
<th width="10%" rowspan="2">Tên thiết bị,mẫu chuẩn/vật chuẩn </th>
<th width="5%" rowspan="2">Ký/Mã hiệu </th>
<th width="5%" rowspan="2">Số máy </th>
<th width="3%" rowspan="2">Nước/Hãng SX </th>
<th width="10%" rowspan="2">Nơi thực hiện </th>
<th width="7%" colspan="12">THÁNG</th>
<th width="5%" rowspan="2"> Chủ sở hữu</th>
</tr>
<tr>
<th width="3%"> 1</th>
<th width="3%"> 2</th>
<th width="3%"> 3</th>
<th width="3%"> 4 </th>
<th width="3%"> 5</th>
<th width="3%"> 6</th>
<th width="3%"> 7</th>
<th width="3%"> 8</th>
<th width="3%"> 9</th>
<th width="3%"> 10</th>
<th width="3%"> 11</th>
<th width="3%"> 12</th>
</tr>
<tr>
<td colspan="19" style="padding-left:10px;background:#CCCCCC;"><b> Thiết bị theo dõi và đo lường, máy bắn mìn, máy kiểm tra kíp mìn, máy đo độ lệch do Liên bang Nga sản xuất </b></td>
</tr>
<?php    $number=$start+1;
	$sql1=mysql_query("select stt,tenthietbi,mahieu,somay,hangsx,noithuchien,thang,namkh,loaitb,ghichu from kehoach_iso WHERE namkh='$year' and ghichu='DK' order by thang asc,noithuchien asc,tenthietbi asc "); 
	while($row=mysql_fetch_array($sql1)){
	
	$mahieu=$row['mahieu'];
	$sm= $row['somay'];
	$noith= $row['noithuchien'];
	$thang=$row['thang'];
	$tentb =$row['tenthietbi'];
	$hangsanxuat =$row['hangsx'];
	$loaitb =$row['loaitb'];
	$stt =$row['stt'];
	
	$r19=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$mahieu'");
	while($row=mysql_fetch_array($r19)){
		$tenvt1=$row['tenviettat'];
		$bophansh =$row['bophansh'];
		$chusohuu =$row['chusohuu'];
	}
	
	
    ?>
	 <tr>
	
	<td height="76" style="text-align:center;"> <?php echo $number; ?> </td>
	<td style="padding-left:10px;"> <?php echo $tentb; ?></td>
	<td style="padding-left:10px;"> <?php echo $tenvt1; ?></td>
	<td style="padding-left:10px;"><?php echo $sm; ?> </td>
	<td style="text-align:center;"> <?php echo $hangsanxuat; ?></td>
	<td style="padding-left:10px;"> 
	<?php if($noith=="TT3"){
		?><b><font size="-1"><?php echo "Trung tâm 3"; ?></font></b>
	 <?php }elseif($noith=="MN"){
		?><b><font size="-1"><?php echo "CT TNHH DV&giám định MN"; ?></font></b>
	 <?php }elseif($noith=="XNKT"){ ?>
	  <b><?php	echo "Xí nghiệp KT"; ?></b>
	 <?php }elseif($noith=="XNĐVLGK"){?>
	  <b><?php  echo "XNĐVLGK";?></b>
	 <?php } ?>
</td>
<?php 
if($thang==1){ ?>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<?php }elseif($thang==2){?>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<?php  }elseif($thang==3){?>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<?php }elseif($thang==4){?>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<?php }elseif($thang==5){?>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==6){?>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==7){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==8){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==9){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==10){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td > </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==11){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td> 
<?php }elseif($thang==12){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td> 
<?php } ?>
<td style="padding-left:10px;"> <?php if($bophansh!="XDT"){echo $bophansh;}else{echo $chusohuu;} ?> </td>
</tr>
   <?php $number++; } ?>

</table>
  <div class="footer" style="border:1px solid #666666;background:#CCCCCC">
<?php
/*  if ($current_page > 1 && $page > 1){
         echo '<a href="baocaohckd.php?page='.($current_page-1).'&&xemkh=Xem&&year='.$year.'&&baocao=kehoach">Prev</a> | ';
   }
     for ($i = 1; $i <= $page; $i++){
         // Nếu là trang hiện tại thì hiển thị thẻ span
         // ngược lại hiển thị thẻ a
         if ($i == $current_page){
                echo '<span>'.$i.'</span> | ';
    }
    else{
             echo '<a href="baocaohckd.php?page='.$i.'&&xemkh=Xem&&year='.$year.'&&baocao=kehoach">'.$i.'</a> | ';
        }
    }
 
    // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
     if ($current_page < $page && $page > 1){
           echo '<a href="baocaohckd.php?page='.($current_page+1).'&&xemkh=Xem&&year='.$year.'&&baocao=kehoach">Next</a> | ';
  }*/
?>
</div>

<br/>
<?php } ?>
<?php } ?>
<?php if($baocao=="lietke"){ 
		?>
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script> 
<script src="java/polyfiller.js"></script>
<script>
webshims.setOptions('forms-ext', {types: 'date'});
webshims.polyfill('forms forms-ext');
$.webshims.formcfg = {
en: {
    dFormat: '/',
    dateSigns: '/',
    patterns: {
    d: "dd/mm/yy"
    }
}
};
</script>
<?php 
//session_start();
include ("select_data.php");
require_once("mte/mte_baocaohckd.php");
$tabledit = new MySQLtabledit();
# database settings:
$tabledit->database = "$databasename";
$tabledit->host = "$hostname";
$tabledit->user = "$usernamehost";
$tabledit->pass = "$passwordhost";
# table of the database
$tabledit->table = 'hosohckd_iso';
# the primary key of the table (must be AUTO_INCREMENT)
$tabledit->primary_key = 'stt';
# the fields you want to see in "list view"
$tabledit->fields_in_list_view = array('stt','sohs','tenthietbi','tenmay','somay','ngayhc','nghctt','ttkt','dkdx','bophansh');
# language (en of nl)
$tabledit->language = 'vi';

# numbers of rows/records in "list view"
$tabledit->num_rows_list_view = 20;

# required fields in edit or add record
$tabledit->fields_required = array('STT');

# help text 
$tabledit->help_text = array(
	// content here
);

# visible name of the fields
$tabledit->show_text = array(
	'stt' => 'STT',
	'sohs' => 'Số Hồ Sơ',
	'tenmay' => 'Ký/Mã hiệu',
	'somay' => 'Số Máy',
	'tenthietbi' => 'Tên thiết bị',
	'ngayhc' => 'Ngày Thực Hiện',
	'nghctt' => 'Ngày tiếp theo',
    	'nhanvien'  =>'Nhân Viên',
	'noithuchien'  =>'Nơi Thực Hiện',
	'bophansh'  =>'Chủ Sở Hữu',
	'dkdx'  =>'Định kì /</br> Đột xuất',
	'ttkt'  =>'Tình Trạng KT',
	'ghichu'  =>'Ghi chú'
);
$tabledit->width_editor = '100%';
$tabledit->width_input_fields = '500px';
$tabledit->width_text_fields = '298px';
$tabledit->height_text_fields = '100px';
$tabledit->no_htaccess_warning = 'on';
echo "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
	<html>
	<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
        <link rel=\"stylesheet\" type=\"text/css\" href=\"css3/demo.css\" />
        <link rel=\"stylesheet\" type=\"text/css\" href=\"css3/style3.css\" />	
	<script type=\"text/javascript\" src=\"js3/modernizr.custom.04022.js\"></script>
	</head>
	<body>";
echo "  
<section class=\"tabs\">
<input id=\"tab-1\" type=\"radio\" name=\"radio-set\" class=\"tab-selector-1\" checked=\"checked\" onClick=\"window.location.href='baocaothongke.php'\"/>
<label for=\"tab-1\" class=\"tab-label-1\">LIỆT KÊ CÔNG TÁC HC - KĐ</label>
<div class=\"clear-shadow\"></div>
</section>";
$tabledit->database_connect();
$tabledit->do_it();
echo "</body></html>";
$tabledit->database_disconnect();
?>
<?php } ?>
</body>
