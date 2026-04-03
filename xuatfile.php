<?php
ob_start();
// Connet to Database
include ("select_data.php") ;
include ("myfunctions.php") ;?>

<?php

if ($_GET['from'] && $_GET['to']){
if(isset($_GET['from'])){
$from = $_GET['from'];
}
if(isset($_GET['to'])){
$to = $_GET['to'];
}
}else{
$m = date('m');
$y = date('Y');
$from ="$y-$m-01";
$d=cal_days_in_month(CAL_GREGORIAN,$m,$y);
$to ="$y-$m-$d";
}


$ngaystemp = $from;
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	$p = stripos($ngaystemp,"-") ;

if ($i== 0) {
	$nams = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 1) {
	$thangs = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i== 2) {
	$ngays = trim ($ngaystemp) ;
} 	
$p++ ;
$ngaystemp = substr($ngaystemp,$p);
}

$ngaystemp1 = $to;
for ($i=0;$i<=strlen($ngaystemp1);$i++) {
	$p = stripos($ngaystemp1,"-") ;

if ($i== 0) {
	$namp = trim (substr($ngaystemp1,0,$p)) ;
} 	
if ($i== 1) {
	$thangp = trim (substr($ngaystemp1,0,$p)) ;
} 	
if ($i== 2) {
	$ngayp = trim ($ngaystemp1) ;
} 	
$p++ ;
$ngaystemp1 = substr($ngaystemp1,$p);
}

if ($_GET['search'] && $_GET['field']) {

			$in_search = addslashes(stripslashes($_GET['search']));
			$in_search_field = $_GET['field'];

			if($in_search_field == "chusohuu"){
				$where_search = "WHERE t.bophansh = '$in_search' ";
			}elseif($in_search_field == "somay"){
				$where_search = "WHERE t.somay = '$in_search' ";
			}elseif($in_search_field == "tenmay"){
				$where_search = "WHERE t.tenviettat = '$in_search' ";
			}elseif($in_search_field == "ghichu"){
				$where_search = "INNER JOIN kehoach_iso k ON h.tenmay = k.mahieu and k.namkh BETWEEN '$nams' AND '$namp' AND k.thang BETWEEN '$thangs' AND '$thangp' WHERE k.ghichu = '$in_search' ";
			}else{
				$where_search = "WHERE h.$in_search_field LIKE '%$in_search%' ";
			}

}else{ $where_search=""; }



	if($where_search==""){
		$month_string  = "WHERE h.`ngayhc` BETWEEN '$nams-$thangs-$ngays 00:00:00' AND '$namp-$thangp-$ngayp 00:00:00'";
	}else{
		$month_string  = "AND h.`ngayhc` BETWEEN '$nams-$thangs-$ngays 00:00:00' AND '$namp-$thangp-$ngayp 00:00:00'";
	}
	$tenfile="baocaothang-$from-$to";
	



?>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
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
<link rel=File-List href="HCKD-T07-2016_files/filelist.xml">

<link rel=dataStoreItem href="HCKD-T07-2016_files/item0001.xml"
target="HCKD-T07-2016_files/props0002.xml">
<link rel=themeData href="HCKD-T07-2016_files/themedata.thmx">
<link rel=colorSchemeMapping href="HCKD-T07-2016_files/colorschememapping.xml">

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
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-520092929 1073786111 9 0 415 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin-top:0in;
	margin-right:0in;
	margin-bottom:10.0pt;
	margin-left:0in;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";
	mso-fareast-font-family:Calibri;
	mso-bidi-font-family:"Times New Roman";}
p.MsoHeader, li.MsoHeader, div.MsoHeader
	{mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-link:"Header Char";
	margin-top:0in;
	margin-right:0in;
	margin-bottom:10.0pt;
	margin-left:0in;
	line-height:115%;
	mso-pagination:widow-orphan;
	tab-stops:center 3.25in right 6.5in;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";
	mso-fareast-font-family:Calibri;
	mso-bidi-font-family:"Times New Roman";}
p.MsoFooter, li.MsoFooter, div.MsoFooter
	{mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-link:"Footer Char";
	margin-top:0in;
	margin-right:0in;
	margin-bottom:10.0pt;
	margin-left:0in;
	line-height:115%;
	mso-pagination:widow-orphan;
	tab-stops:center 3.25in right 6.5in;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";
	mso-fareast-font-family:Calibri;
	mso-bidi-font-family:"Times New Roman";}
span.HeaderChar
	{mso-style-name:"Header Char";
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:Header;
	mso-ansi-font-size:11.0pt;
	mso-bidi-font-size:11.0pt;}
span.FooterChar
	{mso-style-name:"Footer Char";
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:Footer;
	mso-ansi-font-size:11.0pt;
	mso-bidi-font-size:11.0pt;}
.MsoChpDefault
	{mso-style-type:export-only;
	mso-default-props:yes;
	mso-ascii-font-family:Calibri;
	mso-fareast-font-family:Calibri;
	mso-hansi-font-family:Calibri;}
 /* Page Definitions */
 @page
	{mso-footnote-separator:url("HCKD-T07-2016_files/header.htm") fs;
	mso-footnote-continuation-separator:url("HCKD-T07-2016_files/header.htm") fcs;
	mso-endnote-separator:url("HCKD-T07-2016_files/header.htm") es;
	mso-endnote-continuation-separator:url("HCKD-T07-2016_files/header.htm") ecs;}
@page Section1
	{size:11.0in 8.5in;
	mso-page-orientation:landscape;
	margin:1.0in 1.0in 1.0in 1.0in;
	mso-header-margin:.5in;
	mso-footer-margin:.5in;
	mso-paper-source:0;}
div.Section1
	{page:Section1;}
-->
</style>

</head>



<body lang=EN-US style='tab-interval:.5in'>


<div class=Section1>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt'><b
style='mso-bidi-font-weight:normal'><span style='font-family:"Times New Roman","serif"'>XN
&#272;&#7883;a V&#7853;t Lý GK<span style='mso-tab-count:1'>    </span><span
style='mso-tab-count:2'>                        </span><span
style='mso-spacerun:yes'>             </span></span></b><span style='font-size:
14.0pt;line-height:115%;font-family:"Times New Roman","serif"'>Li&#7879;t<span
style='mso-spacerun:yes'>  </span>Kê Công Tác Hi&#7879;u Chu&#7849;n Thi&#7871;t
B&#7883;</span><i style='mso-bidi-font-style:normal'><span style='font-size:
18.0pt;line-height:115%;font-family:"Times New Roman","serif"'><span
style='mso-tab-count:1'>    </span></span></i><span style='font-size:18.0pt;
line-height:115%;font-family:"Times New Roman","serif"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt'><b
style='mso-bidi-font-weight:normal'><span style='font-family:"Times New Roman","serif"'>X&#432;&#7903;ng
SC&amp;CCM&#272;VL <span style='mso-tab-count:3'>                                  </span><span
style='mso-spacerun:yes'>                 </span>T&#7915; <?php echo date("d-m-y", strtotime($from)); ?> &#273;&#7871;n
 <?php echo date("d-m-y", strtotime($to));; ?><o:p></o:p></span></b></p>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;tab-stops:
144.75pt'><b style='mso-bidi-font-weight:normal'><span style='font-family:"Times New Roman","serif"'><span
style='mso-tab-count:1'>                                                </span><o:p></o:p></span></b></p>

<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
 mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt;mso-border-insideh:
 .5pt solid windowtext'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:24.25pt'>
  <td width=44 style='width:32.8pt;border:solid windowtext 1.0pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:24.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:10.0pt;line-height:115%;font-family:"Times New Roman","serif"'>STT<o:p></o:p></span></b></p>
  </td>
  <td width=89 style='width:66.4pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:none;
  mso-border-left-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-bottom-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:24.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:10.0pt;line-height:115%;font-family:"Times New Roman","serif"'>S&#7888;
  H&#7890; S&#416;<o:p></o:p></span></b></p>
  </td>
  <td width=124 style='width:93.0pt;border:solid windowtext 1.0pt;border-right:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
  height:24.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:10.0pt;line-height:115%;font-family:"Times New Roman","serif"'>TÊN
  MÁY<o:p></o:p></span></b></p>
  </td>
  <td width=80 style='width:59.7pt;border:solid windowtext 1.0pt;border-right:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
  height:24.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:10.0pt;line-height:115%;font-family:"Times New Roman","serif"'>S&#7888;
  MÁY<o:p></o:p></span></b></p>
  </td>
  <td width=72 style='width:54.1pt;border:solid windowtext 1.0pt;border-right:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
  height:24.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:10.0pt;line-height:115%;font-family:"Times New Roman","serif"'>C.VI&#7878;C<o:p></o:p></span></b></p>
  </td>
  <td width=133 style='width:99.9pt;border:solid windowtext 1.0pt;border-right:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
  height:24.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:10.0pt;line-height:115%;font-family:"Times New Roman","serif"'>NTH<o:p></o:p></span></b></p>
  </td>
  <td width=132 style='width:99.2pt;border:solid windowtext 1.0pt;border-right:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
  height:24.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:10.0pt;line-height:115%;font-family:"Times New Roman","serif"'>NH.VIÊN<o:p></o:p></span></b></p>
  </td>
  <td width=90 style='width:67.8pt;border:solid windowtext 1.0pt;border-right:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
  height:24.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:10.0pt;line-height:115%;font-family:"Times New Roman","serif"'>N&#416;I.TH<o:p></o:p></span></b></p>
  </td>
  <td width=101 style='width:76.0pt;border:solid windowtext 1.0pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:24.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:10.0pt;line-height:115%;font-family:"Times New Roman","serif"'>SH<o:p></o:p></span></b></p>
  </td>
 </tr>

 <?php  
 
 		$i=1;
 		$sql= mysql_query("SELECT h.`stt`,h.`sohs`,t.`tenviettat` as tenmay,t.`somay`,h.`congviec`,h.`ngayhc`,h.`nhanvien`,h.`noithuchien`,date_format(h.`ngayhc`,'%d/%m/%Y') as ngayhc,h.`ttkt`,t.`bophansh`,t.`chusohuu` FROM `hosohckd_iso` h INNER JOIN thietbihckd_iso t ON h.tenmay = t.mavattu $where_search $month_string order by h.`noithuchien` asc,h.`ttkt` desc,h.`ngayhc` asc,h.`sohs` asc");
 		while($row = mysql_fetch_array($sql))
		{
			$sohs =$row['sohs'];
			$tenmay =$row['tenmay'];	
			$congviec =$row['congviec'];
			$ngayhc =$row['ngayhc'];	
			$nhanvien =$row['nhanvien'];
			$noithuchien =$row['noithuchien'];
			$ttkt =$row['ttkt'];
			$bophansh =$row['bophansh'];
			$chusohuu =$row['chusohuu'];
			$tenvt =$row['tenthietbi'];
			$somay =$row['somay'];		
			$r5=mysql_query("SELECT DISTINCT * FROM donvi_iso WHERE madv='$bophansh'");
			while($row = mysql_fetch_array($r5))
			{
				$tendv =$row['tendv'];
			}
		
			if($noithuchien=='XSCCMDVL'){
				$noithuchien="XDT";
			}
			
 ?>
 <tr style='mso-yfti-irow:1;height:22.3pt'>
  <td width=44 style='width:32.8pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:22.3pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center'><span style='font-family:"Times New Roman","serif";
  color:black'><?php echo $i;?><o:p></o:p></span></p>
  </td>
  <td width=89 style='width:66.4pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
  height:22.3pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center'><span style='font-family:"Times New Roman","serif";
  mso-bidi-font-weight:bold'><?php if($ttkt=="Tốt"){ echo $sohs; }?></span><span style='font-family:"Times New Roman","serif";
  color:red'><o:p></o:p></span></p>
  </td>
  <td width=124 style='width:93.0pt;border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:solid windowtext 1.0pt;border-right:none;mso-border-top-alt:
  solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:
  solid windowtext .5pt;mso-border-bottom-alt:solid windowtext .5pt;padding:
  0in 5.4pt 0in 5.4pt;height:22.3pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Times New Roman","serif"'><?php echo $tenmay;?><span
  style='color:red'><o:p></o:p></span></span></p>
  </td>
  <td width=80 style='width:59.7pt;border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:solid windowtext 1.0pt;border-right:none;mso-border-top-alt:
  solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:
  solid windowtext .5pt;mso-border-bottom-alt:solid windowtext .5pt;padding:
  0in 5.4pt 0in 5.4pt;height:22.3pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt'><span
  style='font-family:"Times New Roman","serif"'><?php echo $somay;?><span style='color:
  red'><o:p></o:p></span></span></p>
  </td>
  <td width=72 style='width:54.1pt;border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:solid windowtext 1.0pt;border-right:none;mso-border-top-alt:
  solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:
  solid windowtext .5pt;mso-border-bottom-alt:solid windowtext .5pt;padding:
  0in 5.4pt 0in 5.4pt;height:22.3pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center'><span style='font-family:"Times New Roman","serif";
  color:black'><?php echo $congviec;?><o:p></o:p></span></p>
  </td>
  <td width=133 style='width:99.9pt;border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:solid windowtext 1.0pt;border-right:none;mso-border-top-alt:
  solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:
  solid windowtext .5pt;mso-border-bottom-alt:solid windowtext .5pt;padding:
  0in 5.4pt 0in 5.4pt;height:22.3pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center'><span style='font-family:"Times New Roman","serif";
  color:black'><?php  if($ttkt=="Tốt"){ echo $ngayhc; }?><o:p></o:p></span></p>
  </td>
  <td width=132 style='width:99.2pt;border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:solid windowtext 1.0pt;border-right:none;mso-border-top-alt:
  solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:
  solid windowtext .5pt;mso-border-bottom-alt:solid windowtext .5pt;padding:
  0in 5.4pt 0in 5.4pt;height:22.3pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Times New Roman","serif";
  color:black'><?php if($ttkt=="Tốt"){ echo mb_convert_case($nhanvien, MB_CASE_TITLE, "UTF-8"); }  ?><o:p></o:p></span></p>
  </td>
  <td width=90 style='width:67.8pt;border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:solid windowtext 1.0pt;border-right:none;mso-border-top-alt:
  solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:
  solid windowtext .5pt;mso-border-bottom-alt:solid windowtext .5pt;padding:
  0in 5.4pt 0in 5.4pt;height:22.3pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Times New Roman","serif";
  color:black'><?php echo $noithuchien;?></span><span style='font-family:"Times New Roman","serif";
  color:red'><o:p></o:p></span></p>
  </td>
  <td width=101 style='width:76.0pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:22.3pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Times New Roman","serif";
  color:black'><?php if($bophansh=="XDT"){ echo $chusohuu; }else{ echo $tendv;} ?> <?php if($ttkt=="Hỏng"){ echo "(".$ttkt.")"; } ?><o:p></o:p></span></p>
  </td>
</tr>
 <?php $i++; } ?>
</table>

<p class=MsoNormal style='tab-stops:225.5pt'><span style='mso-tab-count:1'>                                                                                                    </span></p>

</div>

</body>

</html>
<?php 
header("Content-Type: application/msword");
header("Content-Disposition:attchment;filename=\"$tenfile.doc\""); 
header("Pragma: no-cache");
header("Expires: 0");
exit;
 ?>
<?php 
ob_flush();

?>
