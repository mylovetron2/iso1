<?php
ob_start();
// Connect to Database
include ("select_data.php") ;
include ("myfunctions.php") ;
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
$vattu = isset($_POST['vattu']) ? $_POST['vattu'] : '';
$tenviettat1 = isset($_POST['tenviettat1']) ? $_POST['tenviettat1'] : '';
$them = isset($_POST['them']) ? $_POST['them'] : '';
$solan = isset($_POST['solan']) ? $_POST['solan'] : '';
$nhap = isset($_POST['nhap']) ? $_POST['nhap'] : ''


?><head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<link rel="stylesheet" type="text/css" href="select2.css">
<link rel="stylesheet" type="text/css" href="demo.css">
<script src="jquery-1.8.0.min.js"></script>
<script src="select2.js"></script>
<script src="myselect.js"></script>
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script src="date.js"></script>
<style type="text/css">
body{ 
    font-family:Times New Roman;
    font-size:18px;
}

#searchid
{
    width:600px;
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

.style3 {font-weight: bold}

.table1
{
border-collapse:collapse;
width:100%;
border:1px solid #CCCCCC;
font-size:16px;
}
.table1 td
{
border:1px solid #CCCCCC;
text-align:left;
height: 30px;
}
.table1 th 
{
border:1px solid #CCCCCC;
font-weight: bold;
height:50px;
background-color:#87CEEB;
}

.container {
display: table;	 
width: 100%;
}
.column {
	 display: table-cell;	
}
.style5 {font-size: 26px}
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


.CSSTableGenerator{width:97%;box-shadow:10px 10px 5px #888;border:1px solid #000;-moz-border-radius-bottomleft:0;-webkit-border-bottom-left-radius:0;border-bottom-left-radius:0;-moz-border-radius-bottomright:0;-webkit-border-bottom-right-radius:0;border-bottom-right-radius:0;-moz-border-radius-topright:0;-webkit-border-top-right-radius:0;border-top-right-radius:0;-moz-border-radius-topleft:0;-webkit-border-top-left-radius:0;border-top-left-radius:0;margin:0;padding:0}
.CSSTableGenerator table{width:100%;height:100%;margin:0;padding:0}
.CSSTableGenerator tr:last-child td:last-child{-moz-border-radius-bottomright:0;-webkit-border-bottom-right-radius:0;border-bottom-right-radius:0;border-width:0}
.CSSTableGenerator table tr:first-child td:first-child{-moz-border-radius-topleft:0;-webkit-border-top-left-radius:0;border-top-left-radius:0}
.CSSTableGenerator table tr:first-child td:last-child{-moz-border-radius-topright:0;-webkit-border-top-right-radius:0;border-top-right-radius:0}
.CSSTableGenerator tr:last-child td:first-child{-moz-border-radius-bottomleft:0;-webkit-border-bottom-left-radius:0;border-bottom-left-radius:0}
.CSSTableGenerator tr:nth-child(odd){background-color:#fff}
.CSSTableGenerator tr:nth-child(even){background-color:#fff}
.CSSTableGenerator td{vertical-align:middle;border:1px solid #000;text-align:left;font-size:16px;font-family:"Times New Roman", Times, serif;font-weight:400;color:#000;border-width:0 1px 1px 0;padding:7px}
.CSSTableGenerator tr:last-child td{border-width:0 1px 0 0}
.CSSTableGenerator tr:first-child td{filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#005fbf",endColorstr="#003f7f");background:0;background-color:#005fbf;border:0 solid #000;text-align:center;font-size:16px;font-family:"Times New Roman", Times, serif;font-weight:700;color:#fff;border-width:0 0 1px 1px}
.CSSTableGenerator tr:first-child:hover td{filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#005fbf",endColorstr="#003f7f");background:0;background-color:#005fbf}
.CSSTableGenerator tr:first-child td:last-child{border-width:0 0 1px 1px}
.CSSTableGenerator tr td:last-child,.CSSTableGenerator tr:first-child td:first-child{border-width:0 0 1px}
.style13 {font-size: 16px}
.style16 {font-size: 16; color: #FFFFFF; }
</style>

<body>

<?php

if($vattu=="xuatlinhkien"){

$solan=0;
?>

 <p class="style5" align="center">PHIẾU XUẤT LINH KIỆN VẬT TƯ</p>

<form action="formlinhkien.php" method="post" enctype="multipart/form-data" name="form1" id="form1"/>
<table width="100%" border="0" align="left">
  
    <tr>
      <td width="273" bgcolor="#005fbf" ><span class="style13"><font color="#FFFFFF">&nbsp;&nbsp;Ngày xuất</font> </span></td>
       <td width="724" >  <input name="ngaygui" type="date" id="ngaygui"  value="<?php echo date("d/m/Y");?>" class="datetime"></td>
    </tr>
    
    <tr>
      <td bgcolor="#005fbf" ><span class="style13"><font color="#FFFFFF">&nbsp;&nbsp;Người xuất</font> </span></td>
      <td> <select name="nguoigui" id="nguoigui" class="select_box"/> 
	  	 <option value=""></option> 
	     <?php $r3=mysql_query("SELECT DISTINCT * FROM resume WHERE donvi LIKE '%Xưởng sửa chữa và chuẩn chỉnh máy địa vật lý%' ");
		while($row = mysql_fetch_array($r3))
		{
			$hoten =$row['hoten'];
			$chucdanh = $row['chucdanh'];
			
			?>
          <option value="<?php echo $hoten; ?>" ><?php echo $hoten; ?></option>
          <?php } ?>
      </select>      </td></tr>
    <tr>
      <td bgcolor="#005fbf"><span class="style13"><font color="#FFFFFF">&nbsp;&nbsp;Lý do xuất</font> </span></td>
      <td>        <input name="ghichu" type="text" id="ghichu" style="border:1px solid #aaa;background-clip: padding-box;width:600px;height:30px;font-size:14px;padding-left:8px;"  />        </td></tr>
  
  <tr>
  <td colspan="2"> 
 </td>
  </tr>
  <tr>
   <td colspan="2">
   <div class="CSSTableGenerator">
  <table width="100%" cellpadding="0" cellspacing="0" class="table1" id="dataTable">
    <tr height="50">
	
	 <td width="5%" height="33" bgcolor="#99CCFF" ><div align="center">Stt</div></td>
      <td width="38%" bgcolor="#99CCFF"><div align="center">Tên vật tư <br/> 
       </div></td>
      <td width="23%" bgcolor="#99CCFF"><div align="center">Số P/N <br/> 
        </div></td>
      <td width="22%" bgcolor="#99CCFF"><div align="center">Số lượng <br/> 
        </div></td>
    </tr>
	<?php $i=1;

	while($i<=5){ ?>
	
     <tr height="30">

	 <td> <div align="center"><?php echo $i; ?></div></td>
	 <td style="padding-left:10px;"><select name="tenviettat<?php echo $i; ?>" style="width:100%;height:100%;border:none;"  onChange="this.form.submit()">
	  <option value=""></option>  
	     <?php 
		 $r11=mysql_query("SELECT DISTINCT loaivattu FROM linhkien_iso ORDER BY loaivattu ASC");
		 while($row = mysql_fetch_array($r11))
		 {
			$loailk=$row['loaivattu'];  ?>
			<optgroup style="display:table-row;" label="<?php echo $loailk; ?>"> 
		 <?php
		 $r5=mysql_query("SELECT DISTINCT * FROM linhkien_iso WHERE loaivattu='$loailk'");
		while($row = mysql_fetch_array($r5))
		{
			$tenviettat =$row['tenviettat'];
			$tenmota =$row['tenmota'];
			$pn = $row['pn'];
			
			?>
          <option value="<?php echo $tenviettat; ?>"><?php echo $tenmota; ?> <?php echo $pn; ?></option>
          <?php } ?>
		  </optgroup> <?php } ?>
	 </select>
	 </td>
	 <td><input type="text" name="pn<?php echo $i; ?>" style="width:100%;height:100%;border:none;text-align:center;" readonly="readonly"> </td>
	 <td><input type="text" name="soluong<?php echo $i; ?>" style="width:100%;height:100%;border:none;text-align:center;" ></td>
	 </tr>
   <?php $i++; } ?>

  </table>
</div>
<input name="solan" type="hidden" value="<?php echo $solan; ?>" /> 
<br/>
	<input type="submit" name="them" value="Thêm" alt"Them" ></td>
	
 
<br/>
      <table width="133" height="32" align="center">
<tr>
   <td width="64">
   <input name=nhap type="submit" id="nhap" value="Nhập dữ liệu" /></form></td>
 
 <form action="index.php" method="post">
 <input type="hidden" name="username" value="<?php echo $username; ?>">
 <input type="hidden" name="password" value="<?php echo $password; ?>">
 <input type="hidden" name="submit" value="Nhập xuất linh kiện"  />
<td><input type="submit"  value="Quay lại trang chủ"/>
  </td>
	</tr>
	</table>	</td>
	</tr>
</table>
</form>
<?php } ?>

<?php if($tenviettat1!=""&&$them==""&&$nhap==""){ 

$ngaygui = isset($_POST['ngaygui']) ? $_POST['ngaygui'] : '';
$nguoigui = isset($_POST['nguoigui']) ? $_POST['nguoigui'] : '';
$ngaynhan = isset($_POST['ngaynhan']) ? $_POST['ngaynhan'] : '';
$nguoinhan = isset($_POST['nguoinhan']) ? $_POST['nguoinhan'] : '';
$ghichu = isset($_POST['ghichu']) ? $_POST['ghichu'] : '';
$solan = isset($_POST['solan']) ? $_POST['solan'] : '';

for($i=1;$i<=5+$solan;$i++){
$tenviettat[$i] = isset($_POST["tenviettat$i"]) ? $_POST["tenviettat$i"] : '';
$soluong[$i] = isset($_POST["soluong$i"]) ? $_POST["soluong$i"] : '';
}

?>


 <p class="style5" align="center">PHIẾU XUẤT LINH KIỆN VẬT TƯ</p>

	<form action="formlinhkien.php" method="post" enctype="multipart/form-data" name="form1" id="form1"/>
	<table width="100%" border="0" align="left">
  
    <tr>
      <td width="273" bgcolor="#005fbf" ><span class="style13"><font color="#FFFFFF">&nbsp;&nbsp;Ngày xuất</font> </span></td>
       <td width="724">  <input name="ngaygui" type="date" id="ngaygui"  value="<?php echo $ngaygui;?>" class="datetime"></td>
    </tr>
    
    <tr>
      <td bgcolor="#005fbf" ><span class="style13"><font color="#FFFFFF">&nbsp;&nbsp;Người xuất</font> </span></td>
      <td>        <select name="nguoigui" id="nguoigui" class="select_box"/> 
	   <option value="<?php echo $nguoigui;?>"><?php echo $nguoigui;?></option> 
	     <?php $r3=mysql_query("SELECT DISTINCT * FROM resume WHERE donvi LIKE '%Xưởng sửa chữa và chuẩn chỉnh máy địa vật lý%' ");
		while($row = mysql_fetch_array($r3))
		{
			$hoten =$row['hoten'];
			$chucdanh = $row['chucdanh'];
			
			?>
          <option value="<?php echo $hoten; ?>" ><?php echo $hoten; ?></option>
          <?php } ?>
      </select>      </td></tr>
    <tr>
      <td bgcolor="#005fbf"><span class="style13"><font color="#FFFFFF">&nbsp;&nbsp;Lý do xuất</font> </span></td>
      <td>        <input name="ghichu" type="text" id="ghichu" style="border:1px solid #aaa;background-clip: padding-box;width:600px;height:30px;font-size:14px;padding-left:8px;" value="<?php echo $ghichu;?>" />        </td></tr>
  
  <tr>
  <td colspan="2"> 
 </td>
  </tr>
  <tr>
   <td colspan="2">
   <div class="CSSTableGenerator">
  <table width="100%" cellpadding="0" cellspacing="0" class="table1" id="dataTable">
    <tr height="50">
	
	 <td width="5%" height="33" bgcolor="#99CCFF"><div align="center">Stt</div></td>
      <td width="38%" bgcolor="#99CCFF"><div align="center">Tên vật tư <br/> 
       </div></td>
      <td width="23%" bgcolor="#99CCFF"><div align="center">Số P/N <br/> 
        </div></td>
      <td width="22%" bgcolor="#99CCFF"><div align="center">Số lượng <br/> 
        </div></td>
    </tr>
	<?php $i=1;

	while($i<=5+$solan){ ?>
	
     <tr height="30">

	 <td> <div align="center"><?php echo $i; ?></div></td>
	 <td style="padding-left:10px;"><select name="tenviettat<?php echo $i; ?>" style="width:100%;height:100%;border:none;"  onChange="this.form.submit()">
	 <?php 
	   	  if($tenviettat[$i]!=""){
	 	  		 $r13=mysql_query("SELECT * FROM linhkien_iso WHERE tenviettat='$tenviettat[$i]'");
		 		 while($row = mysql_fetch_array($r13))
		 		 {
					$tenloailk[$i]=$row['tenmota']; 
		 		 }?>
		<?php }else{ $tenloailk[$i]=""; }?>
	 	 <option value="<?php echo $tenviettat[$i]; ?>"><?php echo $tenloailk[$i]; ?></option>
		 <?php
		 $r10=mysql_query("SELECT DISTINCT loaivattu FROM linhkien_iso ORDER BY loaivattu ASC");
		 while($row = mysql_fetch_array($r10))
		 {
			$loailk=$row['loaivattu'];  ?>
			<optgroup style="display:table-row;" label="<?php echo $loailk; ?>"> 
	     <?php $r5=mysql_query("SELECT DISTINCT * FROM linhkien_iso WHERE loaivattu='$loailk'");
		while($row = mysql_fetch_array($r5))
		{
			$mavt =$row['tenviettat'];
			$tenlk =$row['tenmota'];
			$partnumber =$row['pn'];
			
			?>
          <option value="<?php echo $mavt; ?>"><?php echo $tenlk; ?> <?php echo $partnumber; ?></option>
          <?php } ?>
		  </optgroup>   <?php } ?>
	 </select>
	 </td>
	 <td>
	   <?php 
	   if($tenviettat[$i]!=""){
	   $r6=mysql_query("SELECT DISTINCT * FROM linhkien_iso WHERE tenviettat='$tenviettat[$i]'");
		while($row = mysql_fetch_array($r6))
		{
			$pn[$i] =$row['pn'];
		}
		}else{
			$pn[$i]="";
		}?>
	 <input type="text" name="pn<?php echo $i; ?>" style="width:100%;height:100%;border:none;text-align:center;" value="<?php echo $pn[$i]; ?>" readonly="readonly">  </td>
	 <td><input type="text" name="soluong<?php echo $i; ?>" style="width:100%;height:100%;border:none;text-align:center;" value="<?php echo $soluong[$i]; ?>"></td>
	 </tr>
   <?php $i++; } ?>

 
  </table>
  
</div>
<input name="solan" type="hidden" value="<?php echo $solan; ?>" /> 
<br/>
  <input type="submit" value="Thêm" name="them" />
<br/>
     <table width="133" height="32" align="center">
<tr>
   <td width="64">
   <input name=nhap type="submit" id="nhap" value="Nhập dữ liệu" /></form></td>
   <td>
 
 <form action="index.php" method="post">
 <input type="hidden" name="username" value="<?php echo $username; ?>">
 <input type="hidden" name="password" value="<?php echo $password; ?>">
 <input type="hidden" name="submit" value="Nhập xuất linh kiện"  />
<td><input type="submit"  value="Quay lại trang chủ"/>
  </td>
	</tr>
	</table>	</td>
	</tr>
</table>
</form>
<?php } ?>

<?php if($them!=""){ 

$ngaygui = isset($_POST['ngaygui']) ? $_POST['ngaygui'] : '';
$nguoigui = isset($_POST['nguoigui']) ? $_POST['nguoigui'] : '';
$ngaynhan = isset($_POST['ngaynhan']) ? $_POST['ngaynhan'] : '';
$nguoinhan = isset($_POST['nguoinhan']) ? $_POST['nguoinhan'] : '';
$ghichu = isset($_POST['ghichu']) ? $_POST['ghichu'] : '';
$solan++;
for($i=1;$i<=5+$solan;$i++){
$tenviettat[$i] = isset($_POST["tenviettat$i"]) ? $_POST["tenviettat$i"] : '';
$soluong[$i] = isset($_POST["soluong$i"]) ? $_POST["soluong$i"] : '';
}


?>


 <p class="style5" align="center">PHIẾU XUẤT LINH KIỆN VẬT TƯ</p>

<form action="formlinhkien.php" method="post" enctype="multipart/form-data" name="form1" id="form1"/>
<table width="100%" border="0" align="left">
  
    <tr>
      <td width="273" bgcolor="#005fbf" ><span class="style13"><font color="#FFFFFF">&nbsp;&nbsp;Ngày xuất</font> </span></td>
       <td width="724">  <input name="ngaygui" type="date" id="ngaygui"  value="<?php echo date("d/m/Y");?>" class="datetime" value="<?php echo $ngaygui; ?>"></td>
    </tr>
    
    <tr>
      <td bgcolor="#005fbf" ><span class="style13"><font color="#FFFFFF">&nbsp;&nbsp;Người xuất</font> </span></td>
      <td>        <select name="nguoigui" id="nguoigui" class="select_box"/> 
	   <option value="<?php echo $nguoigui; ?>"><?php echo $nguoigui; ?></option> 
	     <?php $r3=mysql_query("SELECT DISTINCT * FROM resume WHERE donvi LIKE '%Xưởng sửa chữa và chuẩn chỉnh máy địa vật lý%' ");
		while($row = mysql_fetch_array($r3))
		{
			$hoten =$row['hoten'];
			$chucdanh = $row['chucdanh'];
			
			?>
          <option value="<?php echo $hoten; ?>" ><?php echo $hoten; ?></option>
          <?php } ?>
      </select>      </td></tr>
    <tr>
      <td bgcolor="#005fbf"><span class="style13"><font color="#FFFFFF">&nbsp;&nbsp;Lý do xuất</font> </span></td>
      <td>        <input name="ghichu" type="text" id="ghichu" style="border:1px solid #aaa;background-clip: padding-box;width:600px;height:30px;font-size:14px;padding-left:8px;"  value="<?php echo $ghichu; ?>"/>        </td></tr>
  
  <tr>
  <td colspan="2"> 
 </td>
  </tr>
  <tr>
   <td colspan="2">
   <div class="CSSTableGenerator">
  <table width="100%" cellpadding="0" cellspacing="0" class="table1" id="dataTable">
    <tr height="50">
	
	 <td width="5%" height="33" bgcolor="#99CCFF"><div align="center">Stt</div></td>
      <td width="38%" bgcolor="#99CCFF"><div align="center">Tên vật tư <br/> 
       </div></td>
      <td width="23%" bgcolor="#99CCFF"><div align="center">Số P/N <br/> 
        </div></td>
      <td width="22%" bgcolor="#99CCFF"><div align="center">Số lượng <br/> 
        </div></td>
    </tr>
	<?php $i=1;

	while($i<=5+$solan){ ?>
	
     <tr height="30">

	 <td> <div align="center"><?php echo $i; ?></div></td>
	 <td style="padding-left:10px;"><select name="tenviettat<?php echo $i; ?>" style="width:100%;height:100%;border:none;"  onChange="this.form.submit()">
	 <?php 
	   	  if($tenviettat[$i]!=""){
	 	  		 $r13=mysql_query("SELECT * FROM linhkien_iso WHERE tenviettat='$tenviettat[$i]'");
		 		 while($row = mysql_fetch_array($r13))
		 		 {
					$tenloailk[$i]=$row['tenmota']; 
		 		 }?>
		<?php }else{ $tenloailk[$i]=""; }?>
	 	 <option value="<?php echo $tenviettat[$i]; ?>"><?php echo $tenloailk[$i]; ?></option>
		 <?php
		 $r10=mysql_query("SELECT DISTINCT loaivattu FROM linhkien_iso ORDER BY loaivattu ASC");
		 while($row = mysql_fetch_array($r10))
		 {
			$loailk=$row['loaivattu'];  ?>
			<optgroup style="display:table-row;" label="<?php echo $loailk; ?>"> 
	     <?php $r5=mysql_query("SELECT DISTINCT * FROM linhkien_iso WHERE loaivattu='$loailk'");
		while($row = mysql_fetch_array($r5))
		{
			$mavt =$row['tenviettat'];
			$tenlk =$row['tenmota'];
			$partnumber =$row['pn'];
			
			?>
          <option value="<?php echo $mavt; ?>"><?php echo $tenlk; ?> <?php echo $partnumber; ?></option>
          <?php } ?>
		  </optgroup>   <?php } ?>
	 </select>
	 </td>
	 <td>
	   <?php 
	   if($tenviettat[$i]!=""){
	   $r6=mysql_query("SELECT DISTINCT * FROM linhkien_iso WHERE tenviettat='$tenviettat[$i]'");
		while($row = mysql_fetch_array($r6))
		{
			$pn[$i] =$row['pn'];
		}
		}else{
			$pn[$i]="";
		}?>
	 <input type="text" name="pn<?php echo $i; ?>" style="width:100%;height:100%;border:none;text-align:center;" value="<?php echo $pn[$i]; ?>" readonly="readonly">  </td>
	 <td><input type="text" name="soluong<?php echo $i; ?>" style="width:100%;height:100%;border:none;text-align:center;" value="<?php echo $soluong[$i]; ?>"></td>
	 </tr>
   <?php $i++; } ?>

 
  </table>
  
</div>
<input name="solan" type="hidden" value="<?php echo $solan; ?>" /> 
<br/>
  <input type="submit" value="Thêm" name="them" />
<br/>
     <table width="133" height="32" align="center">
<tr>
   <td width="64">
   <input name=nhap type="submit" id="nhap" value="Nhập dữ liệu" /></form></td>
   <td>
 
 
 <form action="index.php" method="post">
 <input type="hidden" name="username" value="<?php echo $username; ?>">
 <input type="hidden" name="password" value="<?php echo $password; ?>">
 <input type="hidden" name="submit" value="Nhập xuất linh kiện"  />
<td><input type="submit"  value="Quay lại trang chủ"/>
  </td>
	</tr>
	</table>	</td>
	</tr>
</table>
</form>

<?php } ?>

<?php if($nhap=="Nhập dữ liệu"){ 

$ngaygui = isset($_POST['ngaygui']) ? $_POST['ngaygui'] : '';
$nguoigui = isset($_POST['nguoigui']) ? $_POST['nguoigui'] : '';
$ghichu = isset($_POST['ghichu']) ? $_POST['ghichu'] : '';
for($i=1;$i<=5+$solan;$i++){
$tenviettat[$i] = isset($_POST["tenviettat$i"]) ? $_POST["tenviettat$i"] : '';
$soluong[$i] = isset($_POST["soluong$i"]) ? $_POST["soluong$i"] : '';
$pn[$i] = isset($_POST["pn$i"]) ? $_POST["pn$i"] : '';

if($tenviettat[$i]!=NULL){	

$insert = "insert into nhapxuat_iso(
ngaygui,
nguoigui,
ghichu,
tenviettat,
soluong,
pn
) values (
'$ngaygui',
'$nguoigui',
'$ghichu',
'$tenviettat[$i]',
'$soluong[$i]',
'$pn[$i]'
)" ;
mysql_query($insert) or die(mysql_error());
}
}
?>
<p><center> <strong>Chúc mừng đã nhập thành công </strong>  </p>
 <form action="index.php" method="post">
 <input type="hidden" name="username" value="<?php echo $username; ?>">
 <input type="hidden" name="password" value="<?php echo $password; ?>">
 <input type="hidden" name="submit" value="Nhập xuất linh kiện"  />
<input type="submit"  value="Quay lại trang chủ"/>
</center> 

<?php } ?>
