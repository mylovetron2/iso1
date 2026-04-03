<?php
include ("select_data.php") ;
include ("myfunctions.php") ;
$n=0;
//$con=mysqli_connect("localhost",$usernamehost,$passwordhost,$databasename);
//$mavt =  isset($_GET['mavt']) ? $_GET['mavt'] : '';
//$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
if(isset($_GET['tenviettat'])){
$mavt=isset($_GET['tenviettat']) ? $_GET['tenviettat'] : '';
$pn=isset($_GET['pn']) ? $_GET['pn'] : '';
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
width:80%;
border:1px solid blue;
}
.table1 td
{
border:1px solid blue;
text-align:left;
height: 30px;
}
.table1 th 
{
border:1px solid blue;
font-weight: bold;
height:50px;
background-color:#87CEEB;
}body,td,th {
	font-family: Times New Roman, Times, serif;
}
</style>
</head>



<body >

<?php 
$r5=mysql_query("SELECT *,date_format(ngaynhap,'%d/%m/%Y') as ngaynhap FROM linhkien_iso WHERE tenviettat='$mavt' and pn='$pn'");
while($row = mysql_fetch_array($r5))
{
	$tenlinhkien =$row['tenviettat'];
	$tenmota =$row['tenmota'];
	$ghichu = $row['ghichu'];
	$ngaynhap = $row['ngaynhap'];
	$giatien = $row['giatiendonvi'];
	$slbd = $row['soluongbandau'];
	$thongsokythuat = $row['thongsokythuat'];
	$hinhanh = $row['hinhanh'];
}			
$sl=0;
$r6=mysql_query("SELECT sum(soluong) as sl FROM nhapxuat_iso WHERE tenviettat='$mavt' and pn='$pn'");
while($row = mysql_fetch_array($r6))
{
	$sl =$row['sl'];	
}
$sltk=$slbd-$sl;
?>
<table align="left" width="80%" style="border:1px solid blue;">

<tr>
<td width="303">
<center><img src="<?php echo $rootpath = "./HINH/$mavt/$pn/$hinhanh" ; ?>" width="250" height="250" /></center>
</td>
<td>
<p><?php echo $tenmota; ?></font></p>
<p><font color="#0000FF">Số Serial Number: <strong><?php echo $pn; ?></strong> </font></p>
<p><font color="#0000FF"> Ngày nhập: <strong><?php echo $ngaynhap; ?></strong> </font></p>
<p><font color="#0000FF"> Giá tiền / đơn vị : <strong><?php echo $giatien; ?></strong> </font></p>
<p><font color="#0000FF"> Số lượng tồn kho : <strong><?php echo $sltk; ?></strong> </font></p>
<br/>
</td>
</tr>
</table>
<br/>
<table align="left"  class="table1">
<tr>
<th> <?php echo $tenmota; ?>  </th>
</tr>
<tr>
<td>
<br/>
<p ><font size="+1"><strong>Tính năng</strong> </font></p>
<p><?php echo $ghichu; ?> </p>
<p ><font size="+1"><strong>Thông số kỹ thuật</strong> </font></p>
<p ><?php echo $thongsokythuat; ?> </p>
<p ><font size="+1"><strong>Tài liệu kỹ thuật</strong> </font>&nbsp;&nbsp; <?php echo"<a  href='download.php?mavttlkt=$mavt'>Download</a>";?></p>
<p style="margin-left:50px;">
</p>
<br/>
</td>
</tr>
</table>
</body>






 
