<?php
include ("select_data.php") ;
include ("myfunctions.php") ;
ob_start();
if (isset($_POST['user']))
	$username = isset($_POST['user']) ? $_POST['user'] : '';
else
	$username = isset($_GET['user']) ? $_GET['user'] : '';
echo"<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\"/>";
?>
<style type="text/css">
<!--
.style1 {
	color: #F0F0F0;
	font-weight: bold;
}
.style2 {
	color: #FFFFFF;
	font-weight: bold;
}
-->

	</style>
<div align="center"><strong>TI&#7870;N &#272;&#7896; C&Ocirc;NG VI&#7878;C SỬA CHỮA BẢO DƯỠNG</strong></div>

<?php 

if(isset($_GET['start']) && (int)$_GET['start'])
     $start=$_GET['start']; //dòng bắt đầu từ nơi ta muốn lấy
else $start=0;
echo"<form method=\"post\" action=\"tiendocongviec.php\" enctype=\"multipart/form-data\" name=\"example\">";
if (isset($_POST['nhomsc']))
	$nhomsct = isset($_POST['nhomsc']) ? $_POST['nhomsc'] : '';
else 
	$nhomsct = isset($_GET['nhomsc']) ? $_GET['nhomsc'] : '';

$tin=mysql_query("select stt from hososcbd_iso where bg='0' and nhomsc like '%$nhomsct%'");
$row_per_page=15; //Số dòng trên 1 trang
//tính số dòng cần hiển thị
$rows=mysql_num_rows($tin);
//tính số trang cần để hiển thị
if ($rows>$row_per_page) $page=ceil($rows/$row_per_page); 
else $page=1; //nếu số dòng trong CSDL nhỏ hơn hoặc bằng số dòng trên 1 trang thì chỉ có 1 trang để hiển thị
?>
<?php 
if ($nhomsct=="") $ht="ALL";
if ($nhomsct=="RDNGA") $ht="RDNGA";
if ($nhomsct=="CNC") $ht="CNC";
if ($nhomsct=="DONE") $ht="Máy đã làm xong";
if ($nhomsct=="DO") $ht="Máy đang làm";
if ($nhomsct=="WDO") $ht="Máy chưa làm";
if ($nhomsct=="PEND") $ht="Máy chờ vật tư";
?>
 <br/>
  <table width="100%"  cellpadding="0" cellspacing="0" border=1 BORDERCOLOR=black>
   <tr bgcolor="#FF9900">
      <td width="30" height="38" bgcolor="#3399CC"><div align="center" class="style1">STT</div></td>
      <td width="120" nowrap="nowrap" bgcolor="#3399CC"><div align="center" class="style1">Tên Thiết Bị</div></td>
      <td width="100" bgcolor="#3399CC"> <div align="center" class="style2">Số Máy</div></td>
      <td width="79" bgcolor="#3399CC"><div align="center" class="style2">Số Hồ Sơ</div></td>
      <td width="90" bgcolor="#3399CC"><div align="center" class="style2">Ngày YCDV</div></td>
      <td width="90" bgcolor="#3399CC"><div align="center" class="style2">Ngày TH</div></td>
      <td width="90" bgcolor="#3399CC"><div align="center" class="style2">Ngày KT</div></td>
      <td width="90" bgcolor="#3399CC"><div align="center" class="style2">
<select name="nhomsc" onchange="this.form.submit()" style="border-style:none;width:100%;height:100%;">
             <?php  echo " <option value=$nhomsct> $nhomsct</option>" ; ?>
		<option value="">ALL</option>
		<option value="RDNGA"> Nhóm RDNGA </option>
		<option value="CNC"> Nhóm CNC</option>
		<option value="DONE"> Máy đã làm xong</option>
		<option value="DO"> Máy đang làm</option>
		<option value="WDO"> Máy chưa làm</option>
		<option value="PEND"> Máy chờ vật tư</option>
</select></div></td>
      <td width="120" bgcolor="#3399CC"><div align="center" class="style2">Tiến độ công việc</div></td>
      <td width="90" bgcolor="#3399CC"><div align="center" class="style2">Số ngày SC </br>(làm việc)</div></td>
      <td width="90" bgcolor="#3399CC"><div align="center" class="style2">Máy từ đâu </br>về Xưởng</div></td>
      <td width="100" bgcolor="#3399CC"><div align="center" class="style2">Phục vụ sản xuất </br>cho Lô - Giếng</div></td>
    </tr>
   <?php $stt=0; echo "<input type=hidden name= user value= $username>"; echo "</form>"; ?>
<?php 
if($nhomsct=="DONE")
	$sql=mysql_query("select mavt,somay,model,cv,date_format(`ngayyc`,'%d-%m-%Y') as ngayyc,date_format(`ngayth`,'%d-%m-%Y') as ngayth,hoso,nhomsc,date_format(`ngaykt`,'%d-%m-%Y') as ngaykt,ttktafter,vitrimaybd,lo,gieng,datediff(ngaykt,ngayth) as ngaysc from hososcbd_iso where bg='0' and ngaykt!='0000-00-00' order by stt desc limit $start,$row_per_page"); //bắt đầu lấy dữ liệu (^)_(^)
else 
	if($nhomsct=="DO")
	$sql=mysql_query("select mavt,somay,model,cv,date_format(`ngayyc`,'%d-%m-%Y') as ngayyc,date_format(`ngayth`,'%d-%m-%Y') as ngayth,hoso,nhomsc,date_format(`ngaykt`,'%d-%m-%Y') as ngaykt,ttktafter,vitrimaybd,lo,gieng,datediff(ngaykt,ngayth) as ngaysc from hososcbd_iso where bg='0' and ngayth!='0000-00-00' and ngaykt ='0000-00-00' order by stt desc limit $start,$row_per_page"); //bắt đầu lấy dữ liệu (^)_(^)
else
	if($nhomsct=="WDO")
	$sql=mysql_query("select mavt,somay,model,cv,date_format(`ngayyc`,'%d-%m-%Y') as ngayyc,date_format(`ngayth`,'%d-%m-%Y') as ngayth,hoso,nhomsc,date_format(`ngaykt`,'%d-%m-%Y') as ngaykt,ttktafter,vitrimaybd,lo,gieng,datediff(ngaykt,ngayth) as ngaysc from hososcbd_iso where bg='0' and ngayth='0000-00-00' and ngaykt ='0000-00-00' order by stt desc limit $start,$row_per_page"); //bắt đầu lấy dữ liệu (^)_(^)
else
	if($nhomsct=="PEND")
	$sql=mysql_query("select mavt,somay,model,cv,date_format(`ngayyc`,'%d-%m-%Y') as ngayyc,date_format(`ngayth`,'%d-%m-%Y') as ngayth,hoso,nhomsc,date_format(`ngaykt`,'%d-%m-%Y') as ngaykt,ttktafter,vitrimaybd,lo,gieng,datediff(ngaykt,ngayth) as ngaysc from hososcbd_iso where bg='0' and ngayth!='0000-00-00' and ngaykt ='0000-00-00' and ttktafter='Chờ vật tư thay thế'  order by stt desc limit $start,$row_per_page"); //bắt đầu lấy dữ liệu (^)_(^)
else	
$sql=mysql_query("select mavt,somay,model,cv,date_format(`ngayyc`,'%d-%m-%Y') as ngayyc,date_format(`ngayth`,'%d-%m-%Y') as ngayth,hoso,nhomsc,date_format(`ngaykt`,'%d-%m-%Y') as ngaykt,ttktafter,vitrimaybd,lo,gieng,datediff(ngaykt,ngayth) as ngaysc from hososcbd_iso where bg='0' and nhomsc like '%$nhomsct%' order by stt desc limit $start,$row_per_page"); //bắt đầu lấy dữ liệu (^)_(^)
while($row=mysql_fetch_array($sql)){
		 	 $mavt =$row['mavt'];
			 $somay =$row['somay'];
			 $model =$row['model'];
			 $ngayyc =$row['ngayyc'];
			 $hoso =$row['hoso'];
			 $ngayth =$row['ngayth'];
			 $ngaysc =$row['ngaysc'];
			 $nhomsc =$row['nhomsc'];
			 $ngaykt =$row['ngaykt'];
			 $ttktafter =$row['ttktafter'];
			 $vitri =$row['vitrimaybd'];
			 $lo =$row['lo'];
			 $gieng =$row['gieng'];
			 $cv =$row['cv'];
			 if ($model=="") $mamay=$mavt;else $mamay="$mavt-$model";
			 $result1 = mysql_query("SELECT tenvt FROM thietbi_iso WHERE mavt='$mavt' and somay='$somay' and model='$model' ") ;
				while($row = mysql_fetch_array($result1))
				{
				$tenvt =$row['tenvt'];
				}
			 $stt++;
			 if(($ngayth=="00-00-0000")&&($ngaykt=="00-00-0000")){  
					$bkcanhbao = '#FFFFFF' ;
					if ($cv=="KT")
						$tiendo = "Máy đang chờ kiểm tra ";	
						elseif ($cv=="BD")
						$tiendo = "Máy đang chờ bảo dưỡng ";	
					elseif ($cv=="SC")
					$tiendo = "Máy đang chờ sửa chữa ";	
					else
					$tiendo = "Chưa xác định công việc của máy";
					$ngayth="";
					$ngaykt="";
					$ngaylv="";
			 }
			 elseif($ngayth!=="00-00-0000"&&$ngaykt=="00-00-0000"){
			 
					$bkcanhbao = '#CEE3F6';
					if ($cv=="KT")
						$tiendo = "Máy đang kiểm tra ";	
						elseif ($cv=="BD")
						$tiendo = "Máy đang bảo dưỡng ";	
					elseif ($cv=="SC")
					$tiendo = "Máy đang sửa chữa ";	
					else
					$tiendo = "Chưa xác định công việc của máy";
				if($ttktafter=="Chờ vật tư thay thế") {
							$tiendo = "Máy đang chờ phụ tùng thay thế ";
					}
					$ngaykt=date("d-m-Y");
					$date1=date_create("$ngayth");
					$date2=date_create("$ngaykt");
					$ngaysc=date_diff($date1,$date2);
					$ngaysc=$ngaysc->format("%R%a");
				 $ngfrom = date("d",strtotime("$ngayth"));
				 $thfrom = date("m",strtotime("$ngayth"));
				 $namfrom = date("Y",strtotime("$ngayth"));	 
				 $ngto = date("d",strtotime("$ngaykt"));
				 $thto = date("m",strtotime("$ngaykt"));
				 $namto = date("Y",strtotime("$ngaykt"));
				 $ngsunandsat=getsunandsat ($ngfrom,$thfrom,$namfrom,$ngto,$thto,$namto);
				 $ngayle=getholiday ($ngfrom,$thfrom,$namfrom,$ngto,$thto,$namto);
				 $ngaylv=$ngaysc-$ngsunandsat-$ngayle+1;
				 $ngaykt="";
					
				
			 }
			 elseif(($ngayth!="00-00-0000")&&($ngaykt!="00-00-0000")){
					$bkcanhbao = '#00BFFF';
					if ($cv=="KT")
						$tiendo = "Máy đã KT xong chờ bàn giao ";	
						elseif ($cv=="BD")
						$tiendo = "Máy đã BD xong chờ bàn giao";	
					elseif ($cv=="SC")
					$tiendo = "Máy đã SC xong chờ bàn giao ";	
					else
					$tiendo = "Chưa xác định công việc của máy";
					
					if($ttktafter=="Hỏng") {
							$tiendo = "Máy hỏng không khắc phục được ";
					}
					if($ttktafter=="Chờ vật tư thay thế") {
							$tiendo = "Máy đang chờ phụ tùng thay thế ";
					}
				 $ngfrom = date("d",strtotime("$ngayth"));
				 $thfrom = date("m",strtotime("$ngayth"));
				 $namfrom = date("Y",strtotime("$ngayth"));	 
				 $ngto = date("d",strtotime("$ngaykt"));
				 $thto = date("m",strtotime("$ngaykt"));
				 $namto = date("Y",strtotime("$ngaykt"));
				 $ngsunandsat=getsunandsat ($ngfrom,$thfrom,$namfrom,$ngto,$thto,$namto);
				 $ngayle=getholiday ($ngfrom,$thfrom,$namfrom,$ngto,$thto,$namto);
				 $ngaylv=$ngaysc-$ngsunandsat-$ngayle+1;
				 
			 }
			 if($ngaylv<=15){
					$bkcanhbao = "#9AFFFF";
				}elseif(($ngaylv>15)&&($ngaylv<=30)){
					$bkcanhbao = "#FFFF9A";
				}else
					//$bkcanhbao = "#DC143C";
					$bkcanhbao = "#ff9a9a";
		  

?>  
 <tr bgcolor="<?php echo $bkcanhbao;?>">
      <td height="49" style="font:'Times New Roman', Times, serif;font-size:15px;padding-left:15px;"><?php echo $stt; ?></div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo "<a  href='download.php?mavttlkt=$mavt'  title='TLKT' ><span style=\"color:blue;\">$mamay-$tenvt</span></a>"; ?></div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo $somay; ?></div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo "<a href='formsc.php?edithoso=$hoso&username=$username'  title='Hosomay' >      <span style=\"color:blue;\">$hoso</span></a>" ?></div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo $ngayyc; ?></div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo $ngayth; ?></div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo $ngaykt; ?></div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo "<a href='thongkegiolv.php?f=mahoso&s=$hoso&from=all&to=all'  title='Hosomay' ><span style=\"color:blue;\">$nhomsc</span></a></div>"; ?></div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo $tiendo; ?></div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo $ngaylv; ?></div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo $vitri; ?></div></td>
      <td style="font:'Times New Roman', Times, serif;font-size:15px;"><div align="center"><?php echo "$lo / $gieng"; ?></div></td>
    </tr>
   <?php } ?>
  </table>
  <div class="footer" style="border:1px solid #666666;background:#CCCCCC">
<?php
$page_cr=($start/$row_per_page)+1;

for($i=1;$i<=$page;$i++)
{
 if ($page_cr!=$i) echo "<a href='tiendocongviec.php?start=".$row_per_page*($i-1)."&user=$username&nhomsc=$nhomsct'>$i&nbsp;</a>";
 else echo $i." ";
}
?>
</div>

  </table>
  <div class="footer" style="border:1px solid #666666;background:#CCCCCC">
</div>
<?php
/*echo"<p></p>
<div align=\"center\"><strong>TI&#7870;N &#272;&#7896; C&Ocirc;NG VI&#7878;C HIỆU CHUẨN KIỂM ĐỊNH</strong></div>
<p></p>
<p></p>
      <iframe src=\"HieuChuan_ISO/KiemDinhShow.php\" width=\"100%\" height=\"470\">
</div>
<p></p>"; 
 */
header("Content-Type: application/excel");
header("Content-Disposition:attchment;filename=\"tiendocongviec.xls\""); 
header("Pragma: no-cache");
header("Expires: 0");
exit;

ob_flush();
?>
