<?php
// Connet to Database
include ("select_data.php") ;
include ("myfunctions.php") ;
echo"<html lang=\"vi\"> 
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
		<style type=\"text/css\">
.table3
{
font-family:Arial, Helvetica, sans-serif;
border-collapse:collapse;
width 100% ;
}
.table3 td
{
text-align:left;
border:1px solid black;
height: 40px
}
.table3 th 
{
border:2px solid black;
background-color:#A7C942;
color:#ffffff;
font-weight: bold;
}
.table4
{
border-collapse:collapse;
width 100% ;
}
.table4 th 
{
border:1px solid black;
background-color:#A7C942;
color:#ffffff;
font-weight: bold;
}
.td1
{
text-align:left;
border-right:1px solid black;
border-top:1px solid black;
border-bottom:1px solid black;
height: 30px
}
.td3
{
text-align:left;
border-left:1px solid black;
border-top:1px solid black;
border-bottom:1px solid black;
height: 30px
}
.td2
{
text-align:left;
border:1px solid black;
height: 30px
}
.td4
{
text-align:left;
border-top:1px solid black;
border-bottom:1px solid black;
height: 30px
}
.td5
{
text-align:left;
border-left:1px solid black;
height: 30px
}
.td6
{
text-align:left;
border-right:1px solid black;
height: 30px
}
</style>
<style type='text/css'>
thead{display:table-header-group}
</style>
</head>";
// Declare Variables
$donvinhap   =  $_POST['donvinhap'] ;
$chucdanhnhap   =  $_POST['chucdanhnhap'] ;
$dochai   =  $_POST['dochai'] ;
$danhso   =  $_POST['danhso'] ;
$image =	$_FILES["file"]["name"];
$imagebc1 =	$_FILES["file"]["name"];
$imagebc2 =	$_FILES["file"]["name"];
$imagebc3 =	$_FILES["file"]["name"];
$hoten  = $_POST['hoten'] ;
$hoten = trim($hoten);
$gioitinh =  $_POST['gioitinh'] ;
$hotenkhac  = $_POST['hotenkhac']; 
$ngaysinh = $_POST['ngaysinh'] ;
$thangsinh  = $_POST['thangsinh'];
$namsinh  = $_POST['namsinh'];
$noisinh  = $_POST['noisinh'];
$qsonha  = $_POST['qsonha'] ;
$qduongpho  = $_POST['qduongpho'] ;
$qphuong  = $_POST['qphuong'] ;
$qhuyenquan  = $_POST['qhuyenquan'] ;
$qtinhtp  = $_POST['qtinhtp'] ;
$dsonha  = $_POST['dsonha'] ;
$dduongpho  = $_POST['dduongpho'] ;
$dphuong  = $_POST['dphuong'] ;
$dhuyenquan  = $_POST['dhuyenquan'] ;
$dtinhtp  = $_POST['dtinhtp'] ;
$dantoc  = $_POST['dantoc'];
$tongiao = $_POST['tongiao'];
$tpgdxt  = $_POST['tpgdxt'];
$ngtd    = $_POST['ngtd']; 
$odau   = $_POST['odau'];
$ngvaodk = $_POST['ngvaodk'] ;
$ngvaold = $_POST['ngvaold'] ; 
$ngvaodvl = $_POST['ngvaodvl'] ; 
$ngvaodv = $_POST['ngvaodv'] ; 
$ngvaodang = $_POST['ngvaodang'];
$ngct = $_POST['ngct'];
$ngvaotc = $_POST['ngvaotc'];
$tochuc  = $_POST['tochuc'];
$trinhdovh = $_POST['trinhdovh'];
$hocham = $_POST['hocham'];
$tdcm  = $_POST['tdcm']; 
$chnganh = $_POST['chnganh'];
$nhai = $_POST['nhai'];
$nkhac = $_POST['nkhac'];
$llctri  = $_POST['llctri'];
$ngoaingu1 = $_POST['ngoaingu1'];
$bangcap1  = $_POST['bangcap1']; 
$damthoai1 = $_POST['damthoai1'];
$docviet1 = $_POST['docviet1'];
$ngoaingu2 = $_POST['ngoaingu2'];
$bangcap2  = $_POST['bangcap2']; 
$damthoai2 = $_POST['damthoai2'];
$docviet2 = $_POST['docviet2'];
$ngoaingu3 = $_POST['ngoaingu3'];
$bangcap3  = $_POST['bangcap3']; 
$damthoai3 = $_POST['damthoai3'];
$docviet3 = $_POST['docviet3'];
$chucdanh = $_POST['chucdanh'] ;
$donvi   = $_POST['donvi'];
$ngcongchuc = $_POST['ngcongchuc'];
$maso = $_POST['maso'];
$hesoluong = $_POST['hesoluong'];
$thang = $_POST['thang'];
$nam = $_POST['nam'];
$sotrcongtac = $_POST['sotrcongtac'];
$cvdlln = $_POST['cvdlln'];
$khenthuong = $_POST['khenthuong'];
$kyluat =	$_POST['kyluat'];
$suckhoe = $_POST['suckhoe'];
$cao = $_POST['cao'];
$cannang = $_POST['cannang'];
$nhommau = $_POST['nhommau'];
$cmnd = $_POST['cmnd'] ;
$ngaycap = $_POST['ngaycap'] ;
$noicap  = $_POST['noicap'] ;
$thuongbinh = $_POST['thuongbinh'];
$gdlietsy = $_POST['gdlietsy'];
$dangvien  = $_POST['dangvien']; 
$ngll = $_POST['ngll'] ;
$ncl = $_POST['ncl'] ;
$dtcq = $_POST['dtcq'] ;
$dtnr = $_POST['dtnr'] ;
$dtdd  = $_POST['dtdd'] ;
$lanhdao  = $_POST['lanhdao']; 
$noilv  = $_POST['noilv']; 
$nghiviec  = $_POST['nghiviec']; 
$tentruongpt1 = $_POST['tentruongpt1'];
$tenloppt1 = $_POST['tenloppt1'];
$thoigianhocpt1 = $_POST['thoigianhocpt1']; 
$hinhthuchocpt1 = $_POST['hinhthuchocpt1'];
$bangcappt1 = $_POST['bangcappt1'];
$tentruongdh1 = $_POST['tentruongdh1'];
$tenlopdh1 = $_POST['tenlopdh1'];
$thoigianhocdh1 = $_POST['thoigianhocdh1']; 
$hinhthuchocdh1 = $_POST['hinhthuchocdh1'];
$bangcapdh1 = $_POST['bangcapdh1'];
$tentruongpt2 = $_POST['tentruongpt2'];
$tenloppt2 = $_POST['tenloppt2'];
$thoigianhocpt2 = $_POST['thoigianhocpt2']; 
$hinhthuchocpt2 = $_POST['hinhthuchocpt2'];
$bangcappt2 = $_POST['bangcappt2'];
$tentruongdh2 = $_POST['tentruongdh2'];
$tenlopdh2 = $_POST['tenlopdh2'];
$thoigianhocdh2 = $_POST['thoigianhocdh2']; 
$hinhthuchocdh2 = $_POST['hinhthuchocdh2'];
$bangcapdh2 = $_POST['bangcapdh2'];
$tentruongpt3 = $_POST['tentruongpt3'];
$tenloppt3 = $_POST['tenloppt3'];
$thoigianhocpt3 = $_POST['thoigianhocpt3']; 
$hinhthuchocpt3 = $_POST['hinhthuchocpt3'];
$bangcappt3 = $_POST['bangcappt3'];
$tentruongdh3 = $_POST['tentruongdh3'];
$tenlopdh3 = $_POST['tenlopdh3'];
$thoigianhocdh3 = $_POST['thoigianhocdh3']; 
$hinhthuchocdh3 = $_POST['hinhthuchocdh3'];
$bangcapdh3 = $_POST['bangcapdh3'];
$tentruongpt4 = $_POST['tentruongpt4'];
$tenloppt4 = $_POST['tenloppt4'];
$thoigianhocpt4 = $_POST['thoigianhocpt4']; 
$hinhthuchocpt4 = $_POST['hinhthuchocpt4'];
$bangcappt4 = $_POST['bangcappt4'];
$tentruongdh4 = $_POST['tentruongdh4'];
$tenlopdh4 = $_POST['tenlopdh4'];
$thoigianhocdh4 = $_POST['thoigianhocdh4']; 
$hinhthuchocdh4 = $_POST['hinhthuchocdh4'];
$bangcapdh4 = $_POST['bangcapdh4'];
$tentruongpt5 = $_POST['tentruongpt5'];
$tenloppt5 = $_POST['tenloppt5'];
$thoigianhocpt5 = $_POST['thoigianhocpt5']; 
$hinhthuchocpt5 = $_POST['hinhthuchocpt5'];
$bangcappt5 = $_POST['bangcappt5'];
$tentruongdh5 = $_POST['tentruongdh5'];
$tenlopdh5 = $_POST['tenlopdh5'];
$thoigianhocdh5 = $_POST['thoigianhocdh5']; 
$hinhthuchocdh5 = $_POST['hinhthuchocdh5'];
$bangcapdh5 = $_POST['bangcapdh5'];
$tentruongdt1 = $_POST['tentruongdt1'];
$tenlopdt1 = $_POST['tenlopdt1'];
$thoigianhocdt1 = $_POST['thoigianhocdt1'] ; 
$hinhthuchocdt1 = $_POST['hinhthuchocdt1'];
$bangcapdt1 = $_POST['bangcapdt1']; 
$tentruongdt2 = $_POST['tentruongdt2'];
$tenlopdt2 = $_POST['tenlopdt2'];
$thoigianhocdt2 = $_POST['thoigianhocdt2'] ; 
$hinhthuchocdt2 = $_POST['hinhthuchocdt2'];
$bangcapdt2 = $_POST['bangcapdt2']; 
$tentruongdt3 = $_POST['tentruongdt3'];
$tenlopdt3 = $_POST['tenlopdt3'];
$thoigianhocdt3 = $_POST['thoigianhocdt3'] ; 
$hinhthuchocdt3 = $_POST['hinhthuchocdt3'];
$bangcapdt3 = $_POST['bangcapdt3']; 
$tentruongdt4 = $_POST['tentruongdt4'];
$tenlopdt4 = $_POST['tenlopdt4'];
$thoigianhocdt4 = $_POST['thoigianhocdt4'] ; 
$hinhthuchocdt4 = $_POST['hinhthuchocdt4'];
$bangcapdt4 = $_POST['bangcapdt4']; 
$tentruongdt5 = $_POST['tentruongdt5'];
$tenlopdt5 = $_POST['tenlopdt5'];
$thoigianhocdt5 = $_POST['thoigianhocdt5'] ; 
$hinhthuchocdt5 = $_POST['hinhthuchocdt5'];
$bangcapdt5 = $_POST['bangcapdt5']; 
$tentruongdt6 = $_POST['tentruongdt6'];
$tenlopdt6 = $_POST['tenlopdt6'];
$thoigianhocdt6 = $_POST['thoigianhocdt6'] ; 
$hinhthuchocdt6 = $_POST['hinhthuchocdt6'];
$bangcapdt6 = $_POST['bangcapdt6']; 
$tentruongdt7 = $_POST['tentruongdt7'];
$tenlopdt7 = $_POST['tenlopdt7'];
$thoigianhocdt7 = $_POST['thoigianhocdt7'] ; 
$hinhthuchocdt7 = $_POST['hinhthuchocdt7'];
$bangcapdt7 = $_POST['bangcapdt7']; 
$tentruongdt8 = $_POST['tentruongdt8'];
$tenlopdt8 = $_POST['tenlopdt8'];
$thoigianhocdt8 = $_POST['thoigianhocdt8'] ; 
$hinhthuchocdt8 = $_POST['hinhthuchocdt8'];
$bangcapdt8 = $_POST['bangcapdt8']; 
$tentruongdt9 = $_POST['tentruongdt9'];
$tenlopdt9 = $_POST['tenlopdt9'];
$thoigianhocdt9 = $_POST['thoigianhocdt9'] ; 
$hinhthuchocdt9 = $_POST['hinhthuchocdt9'];
$bangcapdt9 = $_POST['bangcapdt9']; 
$tentruongdt10 = $_POST['tentruongdt10'];
$tenlopdt10 = $_POST['tenlopdt10'];
$thoigianhocdt10 = $_POST['thoigianhocdt10'] ; 
$hinhthuchocdt10 = $_POST['hinhthuchocdt10'];
$bangcapdt10 = $_POST['bangcapdt10']; 
$tentruongdt11 = $_POST['tentruongdt11'];
$tenlopdt11 = $_POST['tenlopdt11'];
$thoigianhocdt11 = $_POST['thoigianhocdt11'] ; 
$hinhthuchocdt11 = $_POST['hinhthuchocdt11'];
$bangcapdt11 = $_POST['bangcapdt11']; 
$tentruongdt12 = $_POST['tentruongdt12'];
$tenlopdt12 = $_POST['tenlopdt12'];
$thoigianhocdt12 = $_POST['thoigianhocdt12'] ; 
$hinhthuchocdt12 = $_POST['hinhthuchocdt12'];
$bangcapdt12 = $_POST['bangcapdt12']; 
$tentruongdt13 = $_POST['tentruongdt13'];
$tenlopdt13 = $_POST['tenlopdt13'];
$thoigianhocdt13 = $_POST['thoigianhocdt13'] ; 
$hinhthuchocdt13 = $_POST['hinhthuchocdt13'];
$bangcapdt13 = $_POST['bangcapdt13']; 
$tentruongdt14 = $_POST['tentruongdt14'];
$tenlopdt14 = $_POST['tenlopdt14'];
$thoigianhocdt14 = $_POST['thoigianhocdt14'] ; 
$hinhthuchocdt14 = $_POST['hinhthuchocdt14'];
$bangcapdt14 = $_POST['bangcapdt14']; 
$tentruongdt15 = $_POST['tentruongdt15'];
$tenlopdt15 = $_POST['tenlopdt15'];
$thoigianhocdt15 = $_POST['thoigianhocdt15'] ; 
$hinhthuchocdt15 = $_POST['hinhthuchocdt15'];
$bangcapdt15 = $_POST['bangcapdt15']; 
$tentruongdt16 = $_POST['tentruongdt16'];
$tenlopdt16 = $_POST['tenlopdt16'];
$thoigianhocdt16 = $_POST['thoigianhocdt16'] ; 
$hinhthuchocdt16 = $_POST['hinhthuchocdt16'];
$bangcapdt16 = $_POST['bangcapdt16']; 
$tentruongdt17 = $_POST['tentruongdt17'];
$tenlopdt17 = $_POST['tenlopdt17'];
$thoigianhocdt17 = $_POST['thoigianhocdt17'] ; 
$hinhthuchocdt17 = $_POST['hinhthuchocdt17'];
$bangcapdt17 = $_POST['bangcapdt17']; 
$tentruongdt18 = $_POST['tentruongdt18'];
$tenlopdt18 = $_POST['tenlopdt18'];
$thoigianhocdt18 = $_POST['thoigianhocdt18'] ; 
$hinhthuchocdt18 = $_POST['hinhthuchocdt18'];
$bangcapdt18 = $_POST['bangcapdt18']; 
$tentruongdt19 = $_POST['tentruongdt19'];
$tenlopdt19 = $_POST['tenlopdt19'];
$thoigianhocdt19 = $_POST['thoigianhocdt19'] ; 
$hinhthuchocdt19 = $_POST['hinhthuchocdt19'];
$bangcapdt19 = $_POST['bangcapdt19']; 
$tentruongdt20 = $_POST['tentruongdt20'];
$tenlopdt20 = $_POST['tenlopdt20'];
$thoigianhocdt20 = $_POST['thoigianhocdt20'] ; 
$hinhthuchocdt20 = $_POST['hinhthuchocdt20'];
$bangcapdt20 = $_POST['bangcapdt20']; 
$ttqtctdatefrom1 = $_POST['ttqtctdatefrom1'];
$ttqtctdateto1 = $_POST['ttqtctdateto1'];
$ttqtctdonvi1 = $_POST['ttqtctdonvi1'];
$ttqtctchucdanh1 = $_POST['ttqtctchucdanh1'];
$ttqtctdatefrom2 = $_POST['ttqtctdatefrom2'];
$ttqtctdateto2 = $_POST['ttqtctdateto2'];
$ttqtctdonvi2 = $_POST['ttqtctdonvi2'];
$ttqtctchucdanh2 = $_POST['ttqtctchucdanh2'];
$ttqtctdatefrom3 = $_POST['ttqtctdatefrom3'];
$ttqtctdateto3 = $_POST['ttqtctdateto3'];
$ttqtctdonvi3 = $_POST['ttqtctdonvi3'];
$ttqtctchucdanh3 = $_POST['ttqtctchucdanh3'];
$ttqtctdatefrom4 = $_POST['ttqtctdatefrom4'];
$ttqtctdateto4 = $_POST['ttqtctdateto4'];
$ttqtctdonvi4 = $_POST['ttqtctdonvi4'];
$ttqtctchucdanh4 = $_POST['ttqtctchucdanh4'];
$ttqtctdatefrom5 = $_POST['ttqtctdatefrom5'];
$ttqtctdateto5 = $_POST['ttqtctdateto5'];
$ttqtctdonvi5 = $_POST['ttqtctdonvi5'];
$ttqtctchucdanh5 = $_POST['ttqtctchucdanh5'];
$ttqtctdatefrom6 = $_POST['ttqtctdatefrom6'];
$ttqtctdateto6 = $_POST['ttqtctdateto6'];
$ttqtctdonvi6 = $_POST['ttqtctdonvi6'];
$ttqtctchucdanh6 = $_POST['ttqtctchucdanh6'];
$ttqtctdatefrom7 = $_POST['ttqtctdatefrom7'];
$ttqtctdateto7 = $_POST['ttqtctdateto7'];
$ttqtctdonvi7 = $_POST['ttqtctdonvi7'];
$ttqtctchucdanh7 = $_POST['ttqtctchucdanh7'];
$ttqtctdatefrom8 = $_POST['ttqtctdatefrom8'];
$ttqtctdateto8 = $_POST['ttqtctdateto8'];
$ttqtctdonvi8 = $_POST['ttqtctdonvi8'];
$ttqtctchucdanh8 = $_POST['ttqtctchucdanh8'];
$ttqtctdatefrom9 = $_POST['ttqtctdatefrom9'];
$ttqtctdateto9 = $_POST['ttqtctdateto9'];
$ttqtctdonvi9 = $_POST['ttqtctdonvi9'];
$ttqtctchucdanh9 = $_POST['ttqtctchucdanh9'];
$ttqtctdatefrom10 = $_POST['ttqtctdatefrom10'];
$ttqtctdateto10 = $_POST['ttqtctdateto10'];
$ttqtctdonvi10 = $_POST['ttqtctdonvi10'];
$ttqtctchucdanh10 = $_POST['ttqtctchucdanh10'];
$ttqtctdatefrom11 = $_POST['ttqtctdatefrom11'];
$ttqtctdateto11 = $_POST['ttqtctdateto11'];
$ttqtctdonvi11 = $_POST['ttqtctdonvi11'];
$ttqtctchucdanh11 = $_POST['ttqtctchucdanh11'];
$ttqtctdatefrom12 = $_POST['ttqtctdatefrom12'];
$ttqtctdateto12 = $_POST['ttqtctdateto12'];
$ttqtctdonvi12 = $_POST['ttqtctdonvi12'];
$ttqtctchucdanh12 = $_POST['ttqtctchucdanh12'];
$ttqtctdatefrom13 = $_POST['ttqtctdatefrom13'];
$ttqtctdateto13 = $_POST['ttqtctdateto13'];
$ttqtctdonvi13 = $_POST['ttqtctdonvi13'];
$ttqtctchucdanh13 = $_POST['ttqtctchucdanh13'];
$ttqtctdatefrom14 = $_POST['ttqtctdatefrom14'];
$ttqtctdateto14 = $_POST['ttqtctdateto14'];
$ttqtctdonvi14 = $_POST['ttqtctdonvi14'];
$ttqtctchucdanh14 = $_POST['ttqtctchucdanh14'];
$ttqtctdatefrom15 = $_POST['ttqtctdatefrom15'];
$ttqtctdateto15 = $_POST['ttqtctdateto15'];
$ttqtctdonvi15 = $_POST['ttqtctdonvi15'];
$ttqtctchucdanh15 = $_POST['ttqtctchucdanh15'];
$ttqtctdatefrom16 = $_POST['ttqtctdatefrom16'];
$ttqtctdateto16 = $_POST['ttqtctdateto16'];
$ttqtctdonvi16 = $_POST['ttqtctdonvi16'];
$ttqtctchucdanh16 = $_POST['ttqtctchucdanh16'];
$hvtbode = $_POST['hvtbode'];
$namsinhbode = $_POST['namsinhbode'];
$ngnghiepbode = $_POST['ngnghiepbode'];
$hvtmede = $_POST['hvtmede'];
$namsinhmede = $_POST['namsinhmede'];
$ngnghiepmede = $_POST['ngnghiepmede'];
$hvtboka = $_POST['hvtboka'];
$namsinhboka = $_POST['namsinhboka'];
$ngnghiepboka = $_POST['ngnghiepboka'];
$hvtmeka = $_POST['hvtmeka'];
$namsinhmeka = $_POST['namsinhmeka'];
$ngnghiepmeka = $_POST['ngnghiepmeka'];
$hvtvo = $_POST['hvtvo'];
$namsinhvo = $_POST['namsinhvo'];
$ngnghiepvo = $_POST['ngnghiepvo'];
$hvtcon1 = $_POST['hvtcon1'];
$namsinhcon1 = $_POST['namsinhcon1'];
$ngnghiepcon1 = $_POST['ngnghiepcon1'];
$hvtcon2 = $_POST['hvtcon2'];
$namsinhcon2 = $_POST['namsinhcon2'];
$ngnghiepcon2 = $_POST['ngnghiepcon2'];
$hvtcon3 = $_POST['hvtcon3'];
$namsinhcon3 = $_POST['namsinhcon3'];
$ngnghiepcon3 = $_POST['ngnghiepcon3'];
$hvtcon4 = $_POST['hvtcon4'];
$namsinhcon4 = $_POST['namsinhcon4'];
$ngnghiepcon4 = $_POST['ngnghiepcon4'];
$hvtcon5 = $_POST['hvtcon5'];
$namsinhcon5 = $_POST['namsinhcon5'];
$ngnghiepcon5 = $_POST['ngnghiepcon5'];
$hvtanhchi1 = $_POST['hvtanhchi1'];
$namsinhanhchi1 = $_POST['namsinhanhchi1'];
$ngnghiepanhchi1 = $_POST['ngnghiepanhchi1'];
$hvtanhchi2 = $_POST['hvtanhchi2'];
$namsinhanhchi2 = $_POST['namsinhanhchi2'];
$ngnghiepanhchi2 = $_POST['ngnghiepanhchi2'];
$hvtanhchi3 = $_POST['hvtanhchi3'];
$namsinhanhchi3 = $_POST['namsinhanhchi3'];
$ngnghiepanhchi3 = $_POST['ngnghiepanhchi3'];
$hvtanhchi4 = $_POST['hvtanhchi4'];
$namsinhanhchi4 = $_POST['namsinhanhchi4'];
$ngnghiepanhchi4 = $_POST['ngnghiepanhchi4'];
$hvtanhchi5 = $_POST['hvtanhchi5'];
$namsinhanhchi5 = $_POST['namsinhanhchi5'];
$ngnghiepanhchi5 = $_POST['ngnghiepanhchi5'];
$hvtanhchi6 = $_POST['hvtanhchi6'];
$namsinhanhchi6 = $_POST['namsinhanhchi6'];
$ngnghiepanhchi6 = $_POST['ngnghiepanhchi6'];
$hvtanhchi7 = $_POST['hvtanhchi7'];
$namsinhanhchi7 = $_POST['namsinhanhchi7'];
$ngnghiepanhchi7 = $_POST['ngnghiepanhchi7'];
$hvtanhchi8 = $_POST['hvtanhchi8'];
$namsinhanhchi8 = $_POST['namsinhanhchi8'];
$ngnghiepanhchi8 = $_POST['ngnghiepanhchi8'];
$hvtanhchi9 = $_POST['hvtanhchi9'];
$namsinhanhchi9 = $_POST['namsinhanhchi9'];
$ngnghiepanhchi9 = $_POST['ngnghiepanhchi9'];
$hvtanhchi10 = $_POST['hvtanhchi10'];
$namsinhanhchi10 = $_POST['namsinhanhchi10'];
$ngnghiepanhchi10 = $_POST['ngnghiepanhchi10'];
$hvtbovo = $_POST['hvtbovo'];
$namsinhbovo = $_POST['namsinhbovo'];
$ngnghiepbovo = $_POST['ngnghiepbovo'];
$hvtmevo = $_POST['hvtmevo'];
$namsinhmevo = $_POST['namsinhmevo'];
$ngnghiepmevo = $_POST['ngnghiepmevo'];
$hvtanhchivo1 = $_POST['hvtanhchivo1'];
$namsinhanhchivo1 = $_POST['namsinhanhchivo1'];
$ngnghiepanhchivo1 = $_POST['ngnghiepanhchivo1'];
$hvtanhchivo2 = $_POST['hvtanhchivo2'];
$namsinhanhchivo2 = $_POST['namsinhanhchivo2'];
$ngnghiepanhchivo2 = $_POST['ngnghiepanhchivo2'];
$hvtanhchivo3 = $_POST['hvtanhchivo3'];
$namsinhanhchivo3 = $_POST['namsinhanhchivo3'];
$ngnghiepanhchivo3 = $_POST['ngnghiepanhchivo3'];
$hvtanhchivo4 = $_POST['hvtanhchivo4'];
$namsinhanhchivo4 = $_POST['namsinhanhchivo4'];
$ngnghiepanhchivo4 = $_POST['ngnghiepanhchivo4'];
$hvtanhchivo5 = $_POST['hvtanhchivo5'];
$namsinhanhchivo5 = $_POST['namsinhanhchivo5'];
$ngnghiepanhchivo5 = $_POST['ngnghiepanhchivo5'];
$hvtanhchivo6 = $_POST['hvtanhchivo6'];
$namsinhanhchivo6 = $_POST['namsinhanhchivo6'];
$ngnghiepanhchivo6 = $_POST['ngnghiepanhchivo6'];
$hvtanhchivo7 = $_POST['hvtanhchivo7'];
$namsinhanhchivo7 = $_POST['namsinhanhchivo7'];
$ngnghiepanhchivo7 = $_POST['ngnghiepanhchivo7'];
$hvtanhchivo8 = $_POST['hvtanhchivo8'];
$namsinhanhchivo8 = $_POST['namsinhanhchivo8'];
$ngnghiepanhchivo8 = $_POST['ngnghiepanhchivo8'];
$hvtanhchivo9 = $_POST['hvtanhchivo9'];
$namsinhanhchivo9 = $_POST['namsinhanhchivo9'];
$ngnghiepanhchivo9 = $_POST['ngnghiepanhchivo9'];
$hvtanhchivo10 = $_POST['hvtanhchivo10'];
$namsinhanhchivo10 = $_POST['namsinhanhchivo10'];
$ngnghiepanhchivo10 = $_POST['ngnghiepanhchivo10'];
$ctnndate1 =  $_POST['ctnndate1'];
$ctnntennuoc1 =  $_POST['ctnntennuoc1'];
$ctnnlydo1 =  $_POST['ctnnlydo1'];
$ctnndate2 =  $_POST['ctnndate2'];
$ctnntennuoc2 =  $_POST['ctnntennuoc2'];
$ctnnlydo2 =  $_POST['ctnnlydo2'];
$ctnndate3 =  $_POST['ctnndate3'];
$ctnntennuoc3 =  $_POST['ctnntennuoc3'];
$ctnnlydo3 =  $_POST['ctnnlydo3'];
$ctnndate4 =  $_POST['ctnndate4'];
$ctnntennuoc4 =  $_POST['ctnntennuoc4'];
$ctnnlydo4 =  $_POST['ctnnlydo4'];
$ctnndate5 =  $_POST['ctnndate5'];
$ctnntennuoc5 =  $_POST['ctnntennuoc5'];
$ctnnlydo5 =  $_POST['ctnnlydo5'];
$ctnndate6 =  $_POST['ctnndate6'];
$ctnntennuoc6 =  $_POST['ctnntennuoc6'];
$ctnnlydo6 =  $_POST['ctnnlydo6'];
$ctnndate7 =  $_POST['ctnndate7'];
$ctnntennuoc7 =  $_POST['ctnntennuoc7'];
$ctnnlydo7 =  $_POST['ctnnlydo7'];
$ctnndate8 =  $_POST['ctnndate8'];
$ctnntennuoc8 =  $_POST['ctnntennuoc8'];
$ctnnlydo8 =  $_POST['ctnnlydo8'];
$ctnndate9 =  $_POST['ctnndate9'];
$ctnntennuoc9 =  $_POST['ctnntennuoc9'];
$ctnnlydo9 =  $_POST['ctnnlydo9'];
$ctnndate10 =  $_POST['ctnndate10'];
$ctnntennuoc10 =  $_POST['ctnntennuoc10'];
$ctnnlydo10 =  $_POST['ctnnlydo10'];
$hcktdate1 = $_POST['hcktdate1'];
$bac1 = $_POST['bac1'];   
$muc1 = $_POST['muc1'];
$heso1 = $_POST['heso1'];
$hcktdate2 = $_POST['hcktdate2'];
$bac2 = $_POST['bac2'];   
$muc2 = $_POST['muc2'];
$heso2 = $_POST['heso2'];
$hcktdate3 = $_POST['hcktdate3'];
$bac3 = $_POST['bac3'];   
$muc3 = $_POST['muc3'];
$heso3 = $_POST['heso3'];
$hcktdate4 = $_POST['hcktdate4'];
$bac4 = $_POST['bac4'];   
$muc4 = $_POST['muc4'];
$heso4 = $_POST['heso4'];
$hcktdate5 = $_POST['hcktdate5'];
$bac5 = $_POST['bac5'];   
$muc5 = $_POST['muc5'];
$heso5 = $_POST['heso5'];
$hcktdate6 = $_POST['hcktdate6'];
$bac6 = $_POST['bac6'];   
$muc6 = $_POST['muc6'];
$heso6 = $_POST['heso6'];
$hcktdate7 = $_POST['hcktdate7'];
$bac7 = $_POST['bac7'];   
$muc7 = $_POST['muc7'];
$heso7 = $_POST['heso7'];
$hcktdate8 = $_POST['hcktdate8'];
$bac8 = $_POST['bac8'];   
$muc8 = $_POST['muc8'];
$heso8 = $_POST['heso8'];
$luong   = $_POST['luong'] ;
$nguonkhac = $_POST['nguonkhac'] ;
$nhacap = $_POST['nhacap'] ;
$dtnhcap = $_POST['dtnhcap'] ;
$nhamua = $_POST['nhamua'] ;
$dtnhmua = $_POST['dtnhmua'] ;
$dtdatcap = $_POST['dtdatcap'] ;
$dtdatmua  = $_POST['dtdatmua'] ;
$datsx = $_POST['datsx'];
$taisan = $_POST['taisan'];   	
$ngayd = $_POST['ngayd'] ;
$thangm  = $_POST['thangm'];
$namy  = $_POST['namy'];

$ds =           $_POST['ds'];
$username =  $_POST['username'] ;
$password =  $_POST['password'] ;
// Prepare for searching 
$name=  strrchr($hoten," ") ;
$name= utf8_to_ascii($name);
$hotenkd= utf8_to_ascii($hoten);
$chnganhkd= utf8_to_ascii($chnganh);
$nhaikd= utf8_to_ascii($nhai);
$nkhackd= utf8_to_ascii($nkhac);
$tenlopdtkd1= utf8_to_ascii($tenlopdt1);
$tenlopdtkd2= utf8_to_ascii($tenlopdt2);
$tenlopdtkd3= utf8_to_ascii($tenlopdt3);
$tenlopdtkd4= utf8_to_ascii($tenlopdt4);
$tenlopdtkd5= utf8_to_ascii($tenlopdt5);
$tenlopdtkd6= utf8_to_ascii($tenlopdt6);
$tenlopdtkd7= utf8_to_ascii($tenlopdt7);
$tenlopdtkd8= utf8_to_ascii($tenlopdt8);
$tenlopdtkd9= utf8_to_ascii($tenlopdt9);
$tenlopdtkd10= utf8_to_ascii($tenlopdt10);
$tenlopdtkd11= utf8_to_ascii($tenlopdt11);
$tenlopdtkd12= utf8_to_ascii($tenlopdt12);
$tenlopdtkd13= utf8_to_ascii($tenlopdt13);
$tenlopdtkd14= utf8_to_ascii($tenlopdt14);
$tenlopdtkd15= utf8_to_ascii($tenlopdt15);
$sotrcongtackd= utf8_to_ascii($sotrcongtac);

if($_POST['submit'] == "Sửa Dữ Liệu" ) {
// Prepare for update donvi
if ($donvi == "other") {
	$donvi = $donvinhap ;
}	
// Prepare for update chucdanh
if ($chucdanh == "other") {
	$chucdanh = $chucdanhnhap ;
	$chucdanh =trim($chucdanh);
}	
// Chuc danh in lower case and khong dau
$chucdanhkd= utf8_to_ascii($chucdanh);
$chucdanhkd = trim($chucdanhkd);
// Prepate insert level
	switch ($chucdanhkd)
{
case "giam doc xn":
  $level = 0;  // giam doc to nhat
  $leveldv = 0;  
  break;
case "giam doc":
  $level = 0;  // giam doc to nhat
  $leveldv = 0;  
  break;
case "pgd ve cong nghe": // pho giam doc to  nhi
  $level = 100000;
  $leveldv =100000;  
  break;
case "pho giam doc": // pho giam doc to  nhi
  $level = 100000;
  $leveldv =100000;  
  break;
case "pgd kinh doanh": // pho giam doc to  ba
  $level = 200000;
  $leveldv =200000;  
  break;
case "chanh ky su":
  $level = 300000; 
  $leveldv = 400000; 
  break;
case "truong phong ktsx":
  $level = 600000; 
  $leveldv = 400000; 
  break;
case "truong trung tam ptxltl":
  $level = 600000; 
  $leveldv = 400000; 
  break;
case "chanh ke toan":
  $level = 600000; 
  $leveldv = 400000; 
  break;
case "doi truong":
  $level = 600000; 
  $leveldv = 400000; 
  break;
case "truong phong":
  $level = 600000; 
  $leveldv = 400000; 
  break;
case "xuong truong":
  $level = 600000; 
  $leveldv = 400000; 
  break;
case "truong phong ktkh":
  $level = 600000; 
  $leveldv = 400000; 
  break;
case "doi pho":
  $level = 600000; 
  $leveldv = 500000; 
  break;
case "pho phong":
  $level = 600000; 
  $leveldv = 500000; 
  break;
case "xuong pho":
  $level = 600000; 
  $leveldv = 500000; 
  break;
case "pho trung tam ptxltl":
  $level = 600000; 
  $leveldv = 500000; 
  break;
case "pho chanh ke toan":
  $level = 600000; 
  $leveldv = 500000; 
  break;
case "pho phong ktsx":
  $level = 600000; 
  $leveldv = 500000; 
  break;
default:
  $level = 600000; // linh lac khong co level
  $leveldv = 600000; 
}
// Tinh tong level + danh so 
$level_ds_sum = ($level + $danhso) ;
// tinh tong level_dv + danh so
$level_dv_sum = ($leveldv + $danhso) ;
$update = "update resume SET  
hoten  = '$hoten',
chucdanh = '$chucdanh',
donvi   = '$donvi',
nghiviec  = '$nghiviec', 
chucdanhkd='$chucdanhkd',
luong='$luong',
level_ds_sum='$level_ds_sum',
level_dv_sum='$level_dv_sum'
WHERE danhso='$danhso'" ;

mysql_query($update) or die(mysql_error());
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
