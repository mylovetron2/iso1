<?php
include "select_data.php";
echo"
	<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\"/>
<style type=\"text/css\">
.table1
{
border-collapse:collapse;
margin-left:20px;
width:1150px;
}
.table1 td
{
border:1px solid black;
text-align:left;
height: 30px;
}
.table1 th 
{
border:1px solid black;
font-weight: bold;
height:50px;

}
.table3
{
border-collapse:collapse;
width: 80% ;
}
.table3 td
{
text-align:left;
border:1px solid black;
height: 30px
}
.table3 th 
{
border:1px solid black;
background-color:#A7C942;
color:#ffffff;
font-weight: bold;
}
</style>
</head>
<body> ";


///////////////////////////////////////////////////////////////////////////////
	
	error_reporting('E_ALL & ~E_NOTICE ~E_WARNING');
	session_start();
	if(isset($_GET['mavttlkt'])){
	echo "<center><h2> Tài liệu kỹ thuật </h2></center><br/>";
		$_SESSION['mavttlkt'] = $_GET['mavttlkt'];
	$mavttlkt=$_GET['mavttlkt'];
echo "<center>";	
echo "<table class=\"table3\";>";
echo "<thead><tr>";
echo"<th> Tên Tài Liệu </th>";
echo"<th> Link Tài Liệu </th>";
echo "</thead></tr>";
$rootpath = "./data_sheet/$mavttlkt" ;
$fileinfos = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootpath)
);

foreach($fileinfos as $pathname => $fileinfo) {
	if (!$fileinfo->isFile()) continue;
	$ext = pathinfo($pathname, PATHINFO_EXTENSION);
	$namefile = pathinfo($pathname,PATHINFO_BASENAME);
	
		/*  echo "<tr>";
		  echo "<td>";
		  echo "<a href='$rootpath/$namefile'>$namefile</a>";
		  echo "</td>";
		  echo "</tr>";
		 */
		echo"<tr>
		<td style=\"padding-left:10px;\"> $namefile</td>
		<td style=\"padding-left:10px;\"> <a href='$rootpath/$namefile'> download </a></td>
		</tr>";
}
echo "</table>";
echo "</center>";	
	}
	if(isset($_GET['mavthosomay'])){
	echo "<center><h2> Hồ sơ máy </h2></center><br/>";
	$_SESSION['mavthosomay'] = $_GET['mavthosomay'];
	$mavthosomay=$_GET['mavthosomay'];

for ($i=0;$i<=strlen($mavthosomay);$i++) {
	$p = stripos($mavthosomay,"/") ;

if ($i== 0) {
	$mavt = trim (substr($mavthosomay,0,$p)) ;
} 	
if ($i== 1) {
	$somay = trim ($mavthosomay) ;
} 	
$p++ ;
$mavthosomay = substr($mavthosomay,$p);
}
echo "<center>";	
echo "<table class=\"table3\";>";
echo "<thead><tr>";
echo"<th> Tên Tài Liệu </th>";
echo"<th> Link Tài Liệu </th>";
echo "</thead></tr>";
$rootpath = "./HOSM/$mavt/$somay" ;
$fileinfos = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootpath)
);

foreach($fileinfos as $pathname => $fileinfo) {
	if (!$fileinfo->isFile()) continue;
	$ext = pathinfo($pathname, PATHINFO_EXTENSION);
	$namefile = pathinfo($pathname,PATHINFO_BASENAME);
	
		/*  echo "<tr>";
		  echo "<td>";
		  echo "<a href='$rootpath/$namefile'>$namefile</a>";
		  echo "</td>";
		  echo "</tr>";
		 */
		echo"<tr>
		<td style=\"padding-left:10px;\"> $namefile</td>
		<td style=\"padding-left:10px;\"> <a href='$rootpath/$namefile'> download </a></td>
		</tr>";
}
echo "</table>";
echo "</center>";	
	}
	

	///////////////////////////////////////////////////////////////////
	if(isset($_GET['hoso'])){
	echo "<center><h2> Bảng số liệu kỹ thuật </h2></center><br/>";
		$_SESSION['hoso'] = $_GET['hoso'];
	//if(isset($_GET['hoso'])){$_SESSION['hoso'] = $_GET['hoso'];}

	// Connect to MySQL

	$link =mysql_connect($hostname,$usernamehost,$passwordhost) or die("Can't connect to server");

	// Using Database
		
	mysql_select_db($databasename,$link) or die("Can't select database");
	
	$hoso=$_GET['hoso'];
	$mavt=$_GET['mavt'];
if ($hoso!="") {	
	echo 
"<table class=\"table1\">
<tr>
<th> Tên Tài Liệu </th>
<th> Link Tài Liệu </th>
</tr>";
	
    $sql=mysql_query("SELECT `tentailieu`,`link` FROM `bangsolieu_iso` WHERE `sohoso`='$hoso'");
    while($row= mysql_fetch_array($sql))
	{
		$tentl = $row['tentailieu'];
		$link = $row['link'];
		echo"<tr>
		<td style=\"padding-left:10px;\"> $tentl</td>
		<td style=\"padding-left:10px;\"> <a href='./hoso/$hoso/$link'> $link </a></td>
		</tr>";
	}

echo"</table>
</body>
</html>
";
}
if ($mavt!="") {	
	echo 
"<table class=\"table1\">
<tr>
<th> Tên Tài Liệu </th>
<th> Link Tài Liệu </th>
</tr>";
	
    $sql=mysql_query("SELECT `thongtincb`  FROM `thietbi_iso` WHERE `mavt`='$mavt'");
    while($row= mysql_fetch_array($sql))
	{
		$thongtincb = $row['thongtincb'];
		echo"<tr>
		<td style=\"padding-left:10px;\"> $thongtincb</td>
		<td style=\"padding-left:10px;\"><a href='TLKT/$mavt'  title='TLKT' ><span style=\"color:blue;\">Download</span></a></td>
		</tr>";
	}

echo"</table>
</body>
</html>
";
}
	}
?> 
