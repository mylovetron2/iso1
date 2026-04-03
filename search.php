<?php
include ("select_data.php") ;
$connection = mysql_connect("$hostname","$usernamehost","$passwordhost") or die(mysql_error());
$database = mysql_select_db("$databasename") or die(mysql_error());
if($_POST)
{
	$username = isset($_GET['username']) ? $_GET['username'] : '';
        $password = isset($_GET['mk']) ? $_GET['mk'] : '';
        $hoso = isset($_GET['hs']) ? $_GET['hs'] : '';
	$q = mysql_real_escape_string($_POST['search']);
	$r2 = mysql_query("SELECT DISTINCT nhom,phanquyen  FROM users where username='$username'");
	while($row = mysql_fetch_array($r2))
	{
		$nhom =$row['nhom'];
		$phanquyen =$row['phanquyen'];
	}
	if ($phanquyen=="1")
		if ($hoso=="phieusuachua")
			$strSQL_Result = mysql_query("select DISTINCT maql from hososcbd_iso where maql like '%$q%' order by phieu LIMIT 10");
		else 
			$strSQL_Result = mysql_query("select DISTINCT phieu from hososcbd_iso where phieu like '%$q%' order by phieu LIMIT 10");
	else
		if ($hoso=="phieusuachua")
			$strSQL_Result = mysql_query("select DISTINCT maql from hososcbd_iso where maql like '%$q%' and nhomsc='$nhom'  order by phieu LIMIT 10");
		else
			$strSQL_Result = mysql_query("select DISTINCT phieu from hososcbd_iso where phieu like '%$q%' and nhomsc='$nhom'  order by phieu LIMIT 10");
	while($row=mysql_fetch_array($strSQL_Result))
	{
		if ($hoso=="phieusuachua") { 
		$maql   = $row['maql'];
		    echo"<div class=\"show\" align=\"left\">";
		    echo "<a href=\"formsc.php?search=$maql&username=$username&mk=$password&hs=$hoso\">$maql</a><br/>
			    </div>";
		}else {
		$fieu   = $row['phieu'];
		    echo"<div class=\"show\" align=\"left\">";
		    echo "<a href=\"formsc.php?search=$fieu&username=$username&mk=$password&hs=$hoso\">$fieu</a><br/>
			    </div>";
		}
	}
}
?>
