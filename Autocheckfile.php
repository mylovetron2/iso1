<?php
//path to directory to scan
////$directory = "D:\www\diavatly\luong";

//get all php files with a .php extension.
$fix_date="10-12-2023";
$fix_date=strtotime($fix_date);

echo "<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
		<style type=\"text/css\">
.table3
{
border-collapse:collapse;
width 1000px ;
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
	</head>" ;
echo "<table class=\"table3\";>";
echo "<thead><tr>";
echo "<th> File Name </th>";
echo "<th> Last modifiled date </th>";
echo "<th> File Size </th>";
echo "</thead></tr>";
$rootpath = '.';
$fileinfos = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootpath)
);
foreach($fileinfos as $pathname => $fileinfo) {
	if (!$fileinfo->isFile()) continue;
	$ext = pathinfo($pathname, PATHINFO_EXTENSION);
        $filesize = filesize($fileinfo);	
		$mod_date=date("d-m-Y", filemtime($pathname));
	  $mod_date_tmp=strtotime($mod_date);
	  //if ($ext=="php") {
	  if ($mod_date_tmp > $fix_date) {
		  
		  echo "<tr>";
		  echo "<td>";
		  echo "$pathname";
		  echo "</td>";
		  echo "<td>";
		  echo "$mod_date";
		  echo "</td>";
		  echo "<td>";
		  echo "$filesize";
		  echo "</td>";
		  echo "</tr>";
	}
}
echo "</table>";

/*
$phpfile = glob( "*.php");
// get last modified date
$fix_date="08/04/2010";
$fix_date=strtotime($fix_date);
echo "<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
		<style type=\"text/css\">
.table3
{
border-collapse:collapse;
width 800px ;
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
</head>" ;
echo "<table class=\"table3\";>";
echo "<thead><tr>";
echo "<th> File Name </th>";
echo "<th> Last modifiled date </th>";
echo "</thead></tr>";
foreach($phpfile as $file) 
{
  if(is_file($file))
  {
	  $mod_date=date("m/d/Y", filemtime($file));
	  $mod_date_tmp=strtotime($mod_date);
	  
	  if ($mod_date_tmp > $fix_date) {
		  
		  echo "<tr>";
		  echo "<td>";
		  echo "$file";
		  echo "</td>";
		  echo "<td>";
		  echo "$mod_date";
		  echo "</td>";
		  echo "</tr>";
	  }
	 

  }
  else
  {
    echo "<br>$file is not a correct file";
  }
}
echo "</table>";
 */
?>
