<?php
include ("select_data.php") ;
include ("myfunctions.php") ;
$readhoso = isset($_GET['readhoso']) ? $_GET['readhoso'] : '';
$tenthietbisql9 = mysql_query("SELECT mavt,date_format(`ngayyc`,'%d-%m-%Y') as ngayyc,date_format(`ngaykt`,'%d-%m-%Y') as ngaykt,ghichu,ttktafter,somay,phieu,madv,ngnhyeucau,ngyeucau,model,ghichufinal FROM hososcbd_iso WHERE hoso='$readhoso'") ;
while($row = mysql_fetch_array($tenthietbisql9))
{
	$ngayyc =$row['ngayyc'];	
	$ngaykt =$row['ngaykt'];
	$ghichu =$row['ghichufinal'];
	$ttktafter =$row['ttktafter'];
	$mavattu=$row['mavt'];
	$somay=$row['somay'];
	$model=$row['model'];
	$fieu=$row['phieu'];
	$madv=$row['madv'];
	$ngnhyeucau=$row['ngnhyeucau'];
	$ngyeucau=$row['ngyeucau'];
}
$sql=mysql_query("SELECT mamay  FROM thietbi_iso WHERE mavt='$mavattu' and somay='$somay' and model='$model' ");
    while($row= mysql_fetch_array($sql))
	{
		$mamay = $row['mamay'];
	}
    if ($model=="") $tenmay="$mavattu"; else
	    $tenmay="$mavattu-$model";
    $sqlng=mysql_query("SELECT hoten  FROM ngthuchien_iso WHERE mahoso='$readhoso' ORDER BY stt ASC LIMIT 1");
    while($row= mysql_fetch_array($sqlng))
	{
		$hoten = $row['hoten'];
	}
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
width: 380px ;
font-weight:bold;
}
.table3 td
{
text-align:left;
padding-left:5px;
border:1px solid black;
height: 36px
}
input[type=checkbox] {
      /* All browsers except webkit*/
      transform: scale(2);

      /* Webkit browsers*/
      -webkit-transform: scale(2);
    }

    .paddingClass{

        margin:20px;
        padding:5px;
    }

</style>
</head>
<body> "; 
echo "<center>";	
echo "<table class=\"table3\";>";
echo"<tr><td colspan=2 style='border-left:2px solid black;border-right:2px solid black;border-top:2px solid black;font-size:18;'><center>THẺ TÌNH TRẠNG THIẾT BỊ</center></td></tr>"; 
echo"<tr><td style='border-top:1px solid black;border-left:2px solid black;font-size:18;'>Tên TB: </td><td style='border-top:1px solid black;border-right:2px solid black;font-size:18;'>$tenmay</td></tr>";
echo"<tr><td style='border-left:2px solid black;font-size:18;'>Số Serial: </td><td style='border-right:2px solid black;font-size:18;'>$somay</td></tr>";
echo"<tr><td style='border-left:2px solid black;font-size:18;'>Số hồ sơ</td><td style='border-right:2px solid black;font-size:18;'>$readhoso</td></tr>";
echo"<tr><td style='border-left:2px solid black;font-size:18;'>Người thực hiện: </td><td style='border-right:2px solid black;font-size:18;'>$hoten</td>
</tr>";
echo"<tr><td style='border-left:2px solid black;font-size:18;'>Ngày kết thúc: </td><td style='border-right:2px solid black;font-size:18;'>$ngaykt</td></tr>";
echo"<tr><td rowspan=\"2\" style='border-left:2px solid black;font-size:18;'>Tình trạng kỹ thuật</br> của thiết bị</td>";
if (($ttktafter=="Tốt")||($ttktafter=="Đạt"))
	echo"<td style='border-right:2px solid black;font-size:18;'>ĐẠT &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"checkbox\" class=\"paddingClass\" checked></td></tr><tr><td style='border-right:2px solid black;font-size:18;'>KHÔNG ĐẠT &nbsp;&nbsp;&nbsp;<input type=\"checkbox\" class=\"paddingClass\"></td></tr>";
else 
	echo"<td style='border-right:2px solid black;font-size:18;'>ĐẠT &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"checkbox\" class=\"paddingClass\" ></td></tr><tr><td style='border-right:2px solid black;font-size:18;'>KHÔNG ĐẠT &nbsp;&nbsp;&nbsp;<input type=\"checkbox\" class=\"paddingClass\" checked></td></tr>";
echo"<tr><td style='border-left:2px solid black;font-size:18;border-right:0px;border-bottom:0px'>Ghi chú</br></td><td style='border-right:2px solid black;border-left:0px;font-size:18;border-bottom:0px'>$ghichu</td></tr>";
echo"<tr><td style='border-left:2px solid black;font-size:18;border-right:0px;border-top:0px;border-bottom:0px'></br></td><td style='border-right:2px solid black;border-left:0px;font-size:18;border-top:0px;border-bottom:0px'></td></tr>";
echo"<tr><td style='font-weight:normal;border-bottom:2px solid black;border-left:2px solid black;font-size:18;border-right:0px;border-top:0px;'>BM.25.05</br>01/09/2020</td><td style='border-bottom:2px solid black;border-right:2px solid black;font-size:18;border-left:0px;border-top:0px;'></td></tr>";
echo "</table></center>";	
?>
