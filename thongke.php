<?php
ob_start();
if(!isset($_SESSION)){
   session_start();
}
echo"<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
</head>
<style type=\"text/css\">
@media print {
	.noprint {display:none};
	}
.table1
{
	border:1px solid black;
	border-left:1px ;
    border-right:1px; 
	border-collapse:collapse
}
p
{
line-height:1pt
}
.th2
{
	border:1px solid black;
	border-left:0px ;
	border-right:0px;
	height:30       	
}
.table2 
{
border:2px solid black;
border-collapse:collapse
}
.th1
{
	border:1px solid black;
}
.td1
{
	border:1px solid black;
}
.td2
{
	border:0px solid black;
	border-left:0px ;
        border-right:0px ;
}
.table3
{
border-collapse:collapse;
margin-left:20px;
border:1px solid black;
width:1150px;
}
.table3 td
{
	border:1px solid black;
	text-align:left;
	height: 30px
}
.table3 th 
{
border:1px solid black;
text-align:left;
font-weight: bold;
height:50px;
background-color:#A7C942;
}
.table3 tr.alt td 
{
color:#000000;
background-color:#EAF2D3;
}
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
background-color:#87CEEB;
}

.table6
{
border-collapse:collapse;
margin-left: 75px;
margin-right: 50px;
width:1125;
}
.table6 td
{
border:1px solid black;
text-align:left;
height: 30px
}
.table6 th 
{
border:1px solid black;
font-weight: bold;
height:50px;
}

.table7
{
border-collapse:collapse;
width:100%;
}
.table7 td
{
border:1px solid black;
text-align:left;
height: 30px
}
.table7 th 
{
border:1px solid black;
color:#ffffff;
font-weight: bold;
height:50px;
background-color: #6495ED;
}

</style>

</head>";
// Connect to Database
include ("select_data.php") ;
include ("myfunctions.php") ;
//$username = isset($_POST['username']) ? $_POST['username'] : '';
//$password = isset($_POST['password']) ? $_POST['password'] : '';
$timkiem = isset($_POST['timkiem']) ? $_POST['timkiem'] : '';
$baocao = isset($_POST['baocao']) ? $_POST['baocao'] : '';
$curyear = date("Y");
if(($timkiem=="")&&($baocao=="")){
echo "	<html lang=\"vi\">
<html lang=\"vi\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
<SCRIPT LANGUAGE=\"JavaScript\" SRC=\"java/CalendarPopup.js\"></SCRIPT>
<SCRIPT LANGUAGE=\"JavaScript\">
var cal = new CalendarPopup();
</SCRIPT>
</head>
<body>
<font size=\"+1\"><center><b> THỐNG KÊ VIỆC THỰC HIỆN BD-SC<br/>Xưởng sửa chữa và chuẩn chỉnh máy địa vật lý </center></b></font>
<form action=\"thongke.php\" method=\"post\" name=\"example\">
<br/>
						<input type=hidden name='n' value='ngaykt'>
						<select name='month' style='width:200px;border: 1px solid #000'>  
						<option value=\"1\"> Tháng 1 </option>
						<option value=\"2\"> Tháng 2 </option>
						<option value=\"3\"> Tháng 3 </option>
						<option value=\"4\"> Tháng 4 </option>
						<option value=\"5\"> Tháng 5 </option>
						<option value=\"6\"> Tháng 6 </option>
						<option value=\"7\"> Tháng 7 </option>
						<option value=\"8\"> Tháng 8 </option>
						<option value=\"9\"> Tháng 9 </option>
						<option value=\"10\"> Tháng 10 </option>
						<option value=\"11\"> Tháng 11 </option>
						<option value=\"12\"> Tháng 12 </option>
						<option value=\"I\"> Quý I </option>
						<option value=\"II\"> Quý II </option>
						<option value=\"III\"> Quý III </option>
						<option value=\"IV\"> Quý IV </option>
						<option value=\"\">  Chọn năm </option>
						</select>
						<select name='year' style='width:100px;border: 1px solid #000'>  
						<option value=\"2016\"> Năm 2016 </option>
						<option value=\"2017\"> Năm 2017 </option>
						<option value=\"2018\"> Năm 2018 </option>
						<option value=\"2019\"> Năm 2019 </option>
						<option value=\"2020\"> Năm 2020 </option>
						<option value=\"2021\"> Năm 2021 </option>
						<option value=\"2022\"> Năm 2022 </option>
						<option value=\"2023\"> Năm 2023 </option>
						<option value=\"2024\"> Năm 2024 </option>
						<option value=\"2025\"> Năm 2025 </option>
						<option value=\"2026\"> Năm 2026 </option>
						<option value=\"2027\"> Năm 2027 </option>
						<option value=\"2028\"> Năm 2028 </option>
						<option value=\"2029\"> Năm 2029 </option>
						<option value=\"2030\"> Năm 2030 </option>
						<option value=\"2031\"> Năm 2031 </option>
						<option value=\"2032\"> Năm 2032 </option>
						<option value=\"2033\"> Năm 2033 </option>
						<option value=\"2034\"> Năm 2034 </option>
						<option value=\"2035\"> Năm 2035 </option>
						<option value=\"2036\"> Năm 2036 </option>
						<option value=\"2037\"> Năm 2037 </option>
						<option value=\"2038\"> Năm 2038 </option>
						<option value=\"2039\"> Năm 2039 </option>
						<option value=\"2040\"> Năm 2040 </option>
						</select>
           
<input type=submit name=timkiem value=\"Tìm kiếm\" style='width:80px; border: 1px solid #000'> 
<br/>
<br/>
<table class=\"table7\" >
<tr>
<th style=\"text-align:center;font-size: 15;width:30px; \"> THÁNG</th>
<th style=\"text-align:center;font-size: 15;width:140px;\">TỔNG SỐ MÁY ĐÃ THỰC HIỆN </th>
<th style=\"text-align:center;font-size: 15;width:80px;\"> DƯỚI 30 NGÀY LÀM VIỆC </th>
<th style=\"text-align:center;font-size: 15;width:80px;\"> TRÊN 30 NGÀY LÀM VIỆC  </th>
<th style=\"text-align:center;font-size: 15;width:60px;\"> % THỰC HIỆN DƯỚI 30 NGÀY</th>
<th style=\"text-align:center;font-size: 15 ;width:180px;\"> GHI CHÚ</th>
</ul>
</tr>";

echo"
<tr>
<td  style=\"text-align:center;color:black;font-size: 15;\"> </td>
<td style=\"padding-left:10px;color:black;font-size: 15;\">  </td>
<td style=\"text-align:center;color:black;font-size: 15;\"> </td>
<td style=\"text-align:center;color:black;font-size: 15;\"> </td>
<td style=\"text-align:center;color:black;font-size: 15;\">  </td>
<td style=\"text-align:center;color:black;font-size: 15;\"> </td>
</tr>";
		
echo"</table> 	
<br/>
</form>
</body>
</html>";
}

if($timkiem=="Tìm kiếm")
{

$month = isset($_POST['month']) ? $_POST['month'] : '';
$year = isset($_POST['year']) ? $_POST['year'] : '';
echo "<html lang=\"vi\">
<html lang=\"vi\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
<SCRIPT LANGUAGE=\"JavaScript\" SRC=\"java/Chart.min.js\"></SCRIPT>
<SCRIPT LANGUAGE=\"JavaScript\" SRC=\"java/CalendarPopup.js\"></SCRIPT>
<SCRIPT LANGUAGE=\"JavaScript\">
var cal = new CalendarPopup();
</SCRIPT>
</head>
<body>

<form action=\"thongke.php\" method=\"post\" name=\"example\">
<font size=\"+1\"><center><b>THỐNG KÊ VIỆC THỰC HIỆN BD-SC<br/> Xưởng sửa chữa và chuẩn chỉnh máy địa vật lý năm $curyear</center></b></font>
<br/>
<div class=\"noprint\">	
						
						<select name='month' style='width:200px;border: 1px solid #000'>";
						if($month==""){
							echo"<option value=\"$month\"> Chọn năm </option>";
							for($i=1;$i<=12;$i++){
								echo"<option value=\"$i\"> Tháng $i </option>";
							}
							echo"<option value=\"I\"> Quý I </option>
							<option value=\"II\"> Quý II </option>
							<option value=\"III\"> Quý III </option>
							<option value=\"IV\"> Quý IV </option>";
						}
						if($month>="1"&&$month<="12"){
							echo"<option value=\"$month\"> Tháng $month </option>";
							for($i=1;$i<=12;$i++){
								if($i!=$month){
								echo"<option value=\"$i\"> Tháng $i </option>";
								}
							}
							echo"<option value=\"I\"> Quý I </option>
							<option value=\"II\"> Quý II </option>
							<option value=\"III\"> Quý III </option>
							<option value=\"IV\"> Quý IV </option>
							<option value=\"\"> Chọn năm </option>";
						}
						if($month=="I"){
							echo"<option value=\"$month\"> Quý $month </option>";
						        for($i=1;$i<=12;$i++){
						  	echo"<option value=\"$i\"> Tháng $i </option>";	
							}
							echo"
							<option value=\"II\"> Quý II </option>
							<option value=\"III\"> Quý III </option>
							<option value=\"IV\"> Quý IV </option>
							<option value=\"\"> Chọn năm </option>";
						}
						if($month=="II"){
							echo"<option value=\"$month\"> Quý $month </option>";
							for($i=1;$i<=12;$i++){
								echo"<option value=\"$i\"> Tháng $i </option>";	
							}
							echo"
							<option value=\"I\"> Quý I </option>
							<option value=\"III\"> Quý III </option>
							<option value=\"IV\"> Quý IV </option>
							<option value=\"\"> Chọn năm </option>";
						}
						if($month=="III"){
							echo"<option value=\"$month\"> Quý $month </option>";
							for($i=1;$i<=12;$i++){
								echo"<option value=\"$i\"> Tháng $i </option>";	
							}
							echo"
							<option value=\"I\"> Quý I </option>
							<option value=\"II\"> Quý II </option>
							<option value=\"IV\"> Quý IV </option>
							<option value=\"\"> Chọn năm </option>";
						}
						if($month=="IV"){
							echo"<option value=\"$month\"> Quý $month </option>";
							for($i=1;$i<=12;$i++){
								echo"<option value=\"$i\"> Tháng $i </option>";}	
							
							echo"
							<option value=\"I\"> Quý I </option>
							<option value=\"II\"> Quý II </option>
							<option value=\"III\"> Quý III </option>
							<option value=\"\"> Chọn năm </option>";
						}
						echo"</select>
						<select name='year' style='width:100px;border: 1px solid #000'>  
						<option value=\"$year\"> Năm $year </option>
						<option value=\"2016\"> Năm 2016 </option>
						<option value=\"2017\"> Năm 2017 </option>
						<option value=\"2018\"> Năm 2018 </option>
						<option value=\"2019\"> Năm 2019 </option>
						<option value=\"2020\"> Năm 2020 </option>
						<option value=\"2021\"> Năm 2021 </option>
						<option value=\"2022\"> Năm 2022 </option>
						<option value=\"2023\"> Năm 2023 </option>
						<option value=\"2024\"> Năm 2024 </option>
						<option value=\"2025\"> Năm 2025 </option>
						<option value=\"2026\"> Năm 2026 </option>
						<option value=\"2027\"> Năm 2027 </option>
						<option value=\"2028\"> Năm 2028 </option>
						<option value=\"2029\"> Năm 2029 </option>
						<option value=\"2030\"> Năm 2030 </option>
						<option value=\"2031\"> Năm 2031 </option>
						<option value=\"2032\"> Năm 2032 </option>
						<option value=\"2033\"> Năm 2033 </option>
						<option value=\"2034\"> Năm 2034 </option>
						<option value=\"2035\"> Năm 2035 </option>
						<option value=\"2036\"> Năm 2036 </option>
						<option value=\"2037\"> Năm 2037 </option>
						<option value=\"2038\"> Năm 2038 </option>
						<option value=\"2039\"> Năm 2039 </option>
						<option value=\"2040\"> Năm 2040 </option>
						</select>
						<input type=submit name=timkiem value=\"Tìm kiếm\" style=\"width:100px;border: 1px solid #000\">
						<br/>
						</div>
<table class=\"table7\" >
<tr>
<th style=\"text-align:center;font-size: 15;width:30px; \"> THÁNG</th>
<th style=\"text-align:center;font-size: 15;width:80px;\">TỔNG SỐ MÁY ĐÃ THỰC HIỆN </th>
<th style=\"text-align:center;font-size: 15;width:80px;\"> DƯỚI 30 NGÀY LÀM VIỆC </th>
<th style=\"text-align:center;font-size: 15;width:80px;\"> TRÊN 30 NGÀY LÀM VIỆC  </th>
<th style=\"text-align:center;font-size: 15;width:80px;\"> % THỰC HIỆN DƯỚI 30 NGÀY</th>
<th style=\"text-align:center;font-size: 15;width:80px;\"> % TRÊN 30 NGÀY LÀM VIỆC</th>
<th style=\"text-align:center;font-size: 15 ;width:100px;\">MÁY HỎNG KHÔNG KHẮC PHỤC ĐƯỢC</th>
</ul>
</tr>";
$number=0;
$number1=0;
$number2=0;
$ghichu="";
		if($month>=1&&$month<=12){
		$result1 = mysql_query("SELECT count(*) as sum FROM hososcbd_iso WHERE ngaykt BETWEEN '$year-$month-1 00:00:00' AND '$year-$month-31 00:00:00'") ;
		while($row = mysql_fetch_array($result1))
		{
			$sum =$row['sum'];	
		}
		$result2 = mysql_query("SELECT datediff(ngaykt,ngayth) as date,ghichu,ttktafter,ngaykt,ngayth FROM hososcbd_iso WHERE ngaykt BETWEEN '$year-$month-1 00:00:00' AND '$year-$month-31 00:00:00'") ;
		while($row = mysql_fetch_array($result2))
		{
			$value =$row['date'];
			$ngaykt =$row['ngaykt'];
			$ngayth =$row['ngayth'];	
			$ttktafter =$row['ttktafter'];	

		    $ngfrom = date("d",strtotime("$ngayth"));
		    $thfrom = date("m",strtotime("$ngayth"));
		    $namfrom = date("Y",strtotime("$ngayth"));	 
		    $ngto = date("d",strtotime("$ngaykt"));
		    $thto = date("m",strtotime("$ngaykt"));
		    $namto = date("Y",strtotime("$ngaykt"));
		    $ngsunandsat=getsunandsat ($ngfrom,$thfrom,$namfrom,$ngto,$thto,$namto);
		    $ngayle=getholiday ($ngfrom,$thfrom,$namfrom,$ngto,$thto,$namto);
		    $date=$value-$ngsunandsat-$ngayle+1;
			if($date>=30){
				$ghichu =$row['ghichu'];
			}
			if($ttktafter=="Hỏng") 
			{
				$ghichu="";
				$number2++;
			}
			if($date>=30) $number++; 
			if($date<30) $number1++; 	
		}
		     
			if($sum!=0){
				$percent = round($number1/$sum*100,2);
				$percent1=round($number2/$sum*100,2);
				$percent2=round($number/$sum*100,2);
			}else{
				$percent = "0.00";
				$percent1 = "0.00";
				$percent2 = "0.00";
			}
			echo"
			<tr>
			<td style=\"text-align:center;color:black;font-size: 15;\"> Tháng $month </td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $sum </td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $number1 </td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $number</td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $percent%</td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $percent2%</td>
	                <td style=\"text-align:center;color:black;font-size: 15;\"> $number2</td>
			</tr>";
			echo"</table>"; 
			
		}else if($month=="I") {
		$ts=0;
		for($i=1;$i<=3;$i++){	
		$n[$i]=0;
		$n1[$i]=0;
		$n2[$i]=0;
		$s[$i]=0;
		$ghichu="";
		$result1 = mysql_query("SELECT count(*) as sum FROM hososcbd_iso WHERE ngaykt BETWEEN '$year-$i-1 00:00:00' AND '$year-$i-31 00:00:00' ") ;
		while($row = mysql_fetch_array($result1))
		{
			$s[$i] =$row['sum'];	
		}
		$result2 = mysql_query("SELECT datediff(ngaykt,ngayth) as date,ghichu,ttktafter,ngaykt,ngayth FROM hososcbd_iso WHERE ngaykt BETWEEN '$year-$i-1 00:00:00' AND '$year-$i-31 00:00:00'") ;
		while($row = mysql_fetch_array($result2))
		{
			$value =$row['date'];
			$ngaykt =$row['ngaykt'];
			$ngayth =$row['ngayth'];	
			$ttktafter =$row['ttktafter'];	

		    $ngfrom = date("d",strtotime("$ngayth"));
		    $thfrom = date("m",strtotime("$ngayth"));
		    $namfrom = date("Y",strtotime("$ngayth"));	 
		    $ngto = date("d",strtotime("$ngaykt"));
		    $thto = date("m",strtotime("$ngaykt"));
		    $namto = date("Y",strtotime("$ngaykt"));
		    $ngsunandsat=getsunandsat ($ngfrom,$thfrom,$namfrom,$ngto,$thto,$namto);
		    $ngayle=getholiday ($ngfrom,$thfrom,$namfrom,$ngto,$thto,$namto);
		    $date=$value-$ngsunandsat-$ngayle+1;
			
			if($date>=30){
				$ghichu =$row['ghichu'];
			}
			if($ttktafter=="Hỏng") {
				$ghichu="";
				$n2[$i]++;
			}
			if($date>=30) $n[$i]++; 
			if($date<30) $n1[$i]++; 	
		}
			if($s[$i]!=0){
				$per[$i] = round($n1[$i]/$s[$i]*100,2);
				$per1[$i] = round($n2[$i]/$s[$i]*100,2);
				$per2[$i] = round($n[$i]/$s[$i]*100,2);
			}else{
				$per[$i]="0.00";
				$per1[$i]="0.00";
				$per2[$i]="0.00";
			}
			$ts= $ts+$s[$i];
			$number1= $number1+$n1[$i];
			$number = $number +$n[$i];
			$number2 = $number2 +$n2[$i];
			
			
			echo"
			<tr>
			<td style=\"text-align:center;color:black;font-size: 15;\">Tháng $i </td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $s[$i] </td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $n1[$i] </td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $n[$i]</td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $per[$i]%</td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $per2[$i]%</td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $n2[$i] </td>
			</tr>";
			
		}
			if($ts!=0){
				$percent= round($number1/$ts*100,2);
				$percent1= round($number2/$ts*100,2);
				$percent2= round($number/$ts*100,2);
			}else{
				$percent="0.00";
				$percent1="0.00";
				$percent2="0.00";
			}
			echo"
			<tr>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\">Quý $month </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $ts </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $number1 </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $number </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $percent%</td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $percent2%</td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $number2</td>
			</tr>";
			echo"</table>"; 
		}else if($month=="II"){
		$ts=0;
		for($i=4;$i<=6;$i++){	
		$n[$i]=0;
		$n1[$i]=0;
		$n2[$i]=0;
		$s[$i]=0;
		$ghichu="";
		$result1 = mysql_query("SELECT count(*) as sum FROM hososcbd_iso WHERE ngaykt BETWEEN '$year-$i-1 00:00:00' AND '$year-$i-31 00:00:00'") ;
		while($row = mysql_fetch_array($result1))
		{
			$s[$i] =$row['sum'];	
		}
		$result2 = mysql_query("SELECT datediff(ngaykt,ngayth) as date,ghichu,ttktafter,ngaykt,ngayth FROM hososcbd_iso WHERE ngaykt BETWEEN '$year-$i-1 00:00:00' AND '$year-$i-31 00:00:00'") ;
		while($row = mysql_fetch_array($result2))
		{
			$value =$row['date'];
			$ngaykt =$row['ngaykt'];
			$ngayth =$row['ngayth'];	
			$ttktafter =$row['ttktafter'];	

		    $ngfrom = date("d",strtotime("$ngayth"));
		    $thfrom = date("m",strtotime("$ngayth"));
		    $namfrom = date("Y",strtotime("$ngayth"));	 
		    $ngto = date("d",strtotime("$ngaykt"));
		    $thto = date("m",strtotime("$ngaykt"));
		    $namto = date("Y",strtotime("$ngaykt"));
		    $ngsunandsat=getsunandsat ($ngfrom,$thfrom,$namfrom,$ngto,$thto,$namto);
		    $ngayle=getholiday ($ngfrom,$thfrom,$namfrom,$ngto,$thto,$namto);
		    $date=$value-$ngsunandsat-$ngayle+1;
			if($date>=30){
				$ghichu =$row['ghichu'];
			}
			if($ttktafter=="Hỏng") {
				$ghichu="";
				$n2[$i]++;
		        }
			if($date>=30) $n[$i]++; 
			if($date<30) $n1[$i]++; 	
		}
			if($s[$i]!=0){
				$per[$i] = round($n1[$i]/$s[$i]*100,2);
				$per1[$i] = round($n2[$i]/$s[$i]*100,2);
				$per2[$i] = round($n[$i]/$s[$i]*100,2);
			}else{
				$per[$i]="0.00";
				$per1[$i]="0.00";
				$per2[$i]="0.00";
			}
			$ts= $ts+$s[$i];
			$number1= $number1+$n1[$i];
			$number = $number +$n[$i];
			$number2 = $number2 +$n2[$i];
			
			
			echo"
			<tr>
			<td style=\"text-align:center;color:black;font-size: 15;\">Tháng $i </td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $s[$i] </td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $n1[$i] </td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $n[$i]</td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $per[$i]%</td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $per2[$i]%</td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $n2[$i] </td>
			</tr>";
			
		}
			if($ts!=0){
				$percent= round($number1/$ts*100,2);
				$percent1= round($number2/$ts*100,2);
				$percent2= round($number/$ts*100,2);
			}else{
				$percent="0.00";
				$percent1="0.00";
				$percent2="0.00";
			}
			echo"
			<tr>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\">Quý $month </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $ts </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $number1 </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $number </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $percent%</td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $percent2%</td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $number2</td>
			</tr>";
			echo"</table>"; 
		}else if($month=="III"){
		$ts=0;
		for($i=7;$i<=9;$i++){	
		$n[$i]=0;
		$n1[$i]=0;
		$n2[$i]=0;
		$s[$i]=0;
		$ghichu="";
		$result1 = mysql_query("SELECT count(*) as sum FROM hososcbd_iso WHERE ngaykt BETWEEN '$year-$i-1 00:00:00' AND '$year-$i-31 00:00:00'") ;
		while($row = mysql_fetch_array($result1))
		{
			$s[$i] =$row['sum'];	
		}
		$result2 = mysql_query("SELECT datediff(ngaykt,ngayth) as date,ghichu,ttktafter,ngaykt,ngayth FROM hososcbd_iso WHERE ngaykt BETWEEN '$year-$i-1 00:00:00' AND '$year-$i-31 00:00:00'") ;
		while($row = mysql_fetch_array($result2))
		{
			$value =$row['date'];
			$ngaykt =$row['ngaykt'];
			$ngayth =$row['ngayth'];	
			$ttktafter =$row['ttktafter'];	

		    $ngfrom = date("d",strtotime("$ngayth"));
		    $thfrom = date("m",strtotime("$ngayth"));
		    $namfrom = date("Y",strtotime("$ngayth"));	 
		    $ngto = date("d",strtotime("$ngaykt"));
		    $thto = date("m",strtotime("$ngaykt"));
		    $namto = date("Y",strtotime("$ngaykt"));
		    $ngsunandsat=getsunandsat ($ngfrom,$thfrom,$namfrom,$ngto,$thto,$namto);
		    $ngayle=getholiday ($ngfrom,$thfrom,$namfrom,$ngto,$thto,$namto);
		    $date=$value-$ngsunandsat-$ngayle+1;	
			
			if($date>=30){
				$ghichu =$row['ghichu'];
			}
			if($ttktafter=="Hỏng") {
				$ghichu="";
				$n2[$i]++;
			}
			if($date>=30) $n[$i]++; 
			if($date<30) $n1[$i]++; 	
		}
			if($s[$i]!=0){
				$per[$i] = round($n1[$i]/$s[$i]*100,2);
				$per1[$i] = round($n2[$i]/$s[$i]*100,2);
				$per2[$i] = round($n[$i]/$s[$i]*100,2);
			}else{
				$per[$i]="0.00";
				$per1[$i]="0.00";
				$per2[$i]="0.00";
			}
			$ts= $ts+$s[$i];
			$number1= $number1+$n1[$i];
			$number = $number +$n[$i];
			$number2 = $number2 +$n2[$i];
			
			
			echo"
			<tr>
			<td style=\"text-align:center;color:black;font-size: 15;\">Tháng $i </td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $s[$i] </td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $n1[$i] </td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $n[$i]</td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $per[$i]%</td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $per2[$i]%</td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $n2[$i] </td>
			</tr>";
			
		}
			if($ts!=0){
				$percent= round($number1/$ts*100,2);
				$percent1= round($number2/$ts*100,2);
				$percent2= round($number/$ts*100,2);
			}else{
				$percent="0.00";
				$percent1="0.00";
				$percent2="0.00";
			}
			echo"
			<tr>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\">Quý $month </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $ts </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $number1 </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $number </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $percent%</td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $percent2%</td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $number2</td>
			</tr>";
			echo"</table>"; 
		}else if($month=="IV"){
		$ts=0;
		for($i=10;$i<=12;$i++){	
		$n[$i]=0;
		$n1[$i]=0;
		$n2[$i]=0;
		$s[$i]=0;
		$ghichu="";
		$result1 = mysql_query("SELECT count(*) as sum FROM hososcbd_iso WHERE ngaykt BETWEEN '$year-$i-1 00:00:00' AND '$year-$i-31 00:00:00'") ;
		while($row = mysql_fetch_array($result1))
		{
			$s[$i] =$row['sum'];	
		}
		$result2 = mysql_query("SELECT datediff(ngaykt,ngayth) as date,ghichu,ttktafter,ngaykt,ngayth FROM hososcbd_iso WHERE ngaykt BETWEEN '$year-$i-1 00:00:00' AND '$year-$i-31 00:00:00'") ;
		while($row = mysql_fetch_array($result2))
		{
			$value =$row['date'];
			$ngaykt =$row['ngaykt'];
			$ngayth =$row['ngayth'];	
			$ttktafter =$row['ttktafter'];	

		    $ngfrom = date("d",strtotime("$ngayth"));
		    $thfrom = date("m",strtotime("$ngayth"));
		    $namfrom = date("Y",strtotime("$ngayth"));	 
		    $ngto = date("d",strtotime("$ngaykt"));
		    $thto = date("m",strtotime("$ngaykt"));
		    $namto = date("Y",strtotime("$ngaykt"));
		    $ngsunandsat=getsunandsat ($ngfrom,$thfrom,$namfrom,$ngto,$thto,$namto);
		    $ngayle=getholiday ($ngfrom,$thfrom,$namfrom,$ngto,$thto,$namto);
		    $date=$value-$ngsunandsat-$ngayle+1;	
			
			if($date>=30){
				$ghichu =$row['ghichu'];
			}
			if($ttktafter=="Hỏng") {
				$ghichu="";
				$n2[$i]++;
			}
			if($date>=30) $n[$i]++; 
			if($date<30) $n1[$i]++; 	
		}
			if($s[$i]!=0){
				$per[$i] = round($n1[$i]/$s[$i]*100,2);
				$per1[$i] = round($n2[$i]/$s[$i]*100,2);
				$per2[$i] = round($n[$i]/$s[$i]*100,2);
			}else{
				$per[$i]="0.00";
				$per1[$i]="0.00";
				$per2[$i]="0.00";
			}
			$ts= $ts+$s[$i];
			$number1= $number1+$n1[$i];
			$number = $number +$n[$i];
			$number2 = $number2 +$n2[$i];
			
			
			echo"
			<tr>
			<td style=\"text-align:center;color:black;font-size: 15;\">Tháng $i </td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $s[$i] </td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $n1[$i] </td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $n[$i]</td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $per[$i]%</td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $per2[$i]%</td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $n2[$i] </td>
			</tr>";
			
		}
			if($ts!=0){
				$percent= round($number1/$ts*100,2);
				$percent1= round($number2/$ts*100,2);
				$percent2= round($number/$ts*100,2);
			}else{
				$percent="0.00";
				$percent1="0.00";
				$percent2="0.00";
			}
			echo"
			<tr>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\">Quý $month </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $ts </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $number1 </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $number </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $percent%</td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $percent2%</td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $number2</td>
			</tr>";
			echo"</table>"; 
		}else if($month==""){
		$ts=0;
		for($i=1;$i<=12;$i++){	
		$n[$i]=0;
		$n1[$i]=0;
		$n2[$i]=0;
		$s[$i]=0;
		$ghichu="";
		$result1 = mysql_query("SELECT count(*) as sum FROM hososcbd_iso WHERE ngaykt BETWEEN '$year-$i-1 00:00:00' AND '$year-$i-31 00:00:00'") ;
		while($row = mysql_fetch_array($result1))
		{
			$s[$i] =$row['sum'];	
		}
		$result2 = mysql_query("SELECT datediff(ngaykt,ngayth) as date,ghichu,ttktafter,ngaykt,ngayth FROM hososcbd_iso WHERE ngaykt BETWEEN '$year-$i-1 00:00:00' AND '$year-$i-31 00:00:00'") ;
		while($row = mysql_fetch_array($result2))
		{
			$value =$row['date'];
			$ngaykt =$row['ngaykt'];
			$ngayth =$row['ngayth'];	
			$ttktafter =$row['ttktafter'];	

		    $ngfrom = date("d",strtotime("$ngayth"));
		    $thfrom = date("m",strtotime("$ngayth"));
		    $namfrom = date("Y",strtotime("$ngayth"));	 
		    $ngto = date("d",strtotime("$ngaykt"));
		    $thto = date("m",strtotime("$ngaykt"));
		    $namto = date("Y",strtotime("$ngaykt"));
		    $ngsunandsat=getsunandsat ($ngfrom,$thfrom,$namfrom,$ngto,$thto,$namto);
		    $ngayle=getholiday ($ngfrom,$thfrom,$namfrom,$ngto,$thto,$namto);
		    $date=$value-$ngsunandsat-$ngayle+1;	
			
			if($date>=30){
				$ghichu =$row['ghichu'];
			}
			if($ttktafter=="Hỏng") {
				$ghichu="";
				$n2[$i]++;
			}
			if($date>=30) $n[$i]=$n[$i]+1; 
			if($date<30) $n1[$i]++; 	
		}
			if($s[$i]!=0){
				$per[$i] = round($n1[$i]/$s[$i]*100,2);
				$per1[$i] = round($n2[$i]/$s[$i]*100,2);
				$per2[$i] = round($n[$i]/$s[$i]*100,2);
			}else{
				$per[$i]="0.00";
				$per1[$i]="0.00";
				$per2[$i]="0.00";
			}
			$ts= $ts+$s[$i];
			$number1= $number1+$n1[$i];
			$number = $number +$n[$i];
			$number2 = $number2 +$n2[$i];
			
			
			echo"
			<tr>
			<td style=\"text-align:center;color:black;font-size: 15;\">Tháng $i </td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $s[$i] </td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $n1[$i] </td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $n[$i]</td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $per[$i]% </td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $per2[$i]% </td>
			<td style=\"text-align:center;color:black;font-size: 15;\"> $n2[$i] </td>
			</tr>";
			
			if($i==3){
		        $ts1=$s[1]+$s[2]+$s[3];
			$ns1=$n1[1]+$n1[2]+$n1[3];
			$nt1=$n[1]+$n[2]+$n[3];
			$nk1=$n2[1]+$n2[2]+$n2[3];
			if($ts1!=0){
				$percent1 = round($ns1/$ts1*100,2);
				$percent2 = round($nt1/$ts1*100,2);
				$percent3 = round($nk1/$ts1*100,2);
			}else{
				$percent1="0.00";
				$percent2="0.00";
				$percent3="0.00";
			}
			echo"<tr>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\">Quý I</td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $ts1 </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $ns1 </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $nt1</td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $percent1% </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $percent2% </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $nk1</td>
			</tr>";
			}
			if($i==6){
		        $ts2=$s[4]+$s[5]+$s[6];
			$ns2=$n1[4]+$n1[5]+$n1[6];
			$nt2=$n[4]+$n[5]+$n[6];
			$nk2=$n2[4]+$n2[5]+$n2[6];
			if($ts2!=0){
				$percent1 = round($ns2/$ts2*100,2);
				$percent2 = round($nt2/$ts2*100,2);
				$percent3 = round($nk2/$ts2*100,2);
			}else{
				$percent1="0.00";
				$percent2="0.00";
				$percent3="0.00";
			}
			echo"<tr>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\">Quý II</td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $ts2 </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $ns2 </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $nt2</td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $percent1% </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $percent2% </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $nk2</td>
			</tr>";
			}else if($i==9){
			$ts3=$s[7]+$s[8]+$s[9];
			$ns3=$n1[7]+$n1[8]+$n1[9];
			$nt3=$n[7]+$n[8]+$n[9];
			$nk3=$n2[7]+$n2[8]+$n2[9];
			if($ts3!=0){
				$percent1 = round($ns3/$ts3*100,2);
				$percent2 = round($nt3/$ts3*100,2);
				$percent3 = round($nk3/$ts3*100,2);
			}else{
				$percent1="0.00";
				$percent2="0.00";
				$percent3="0.00";
			}
			echo"<tr>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\">Quý III</td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $ts3 </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $ns3 </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $nt3</td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $percent1% </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $percent2% </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $nk3</td>
			</tr>";
			}else if($i==12){
			$ts4=$s[10]+$s[11]+$s[12];
			$ns4=$n1[10]+$n1[11]+$n1[12];
			$nt4=$n[10]+$n[11]+$n[12];
			$nk4=$n2[10]+$n2[11]+$n2[12];
			if($ts4!=0){
				$percent1 = round($ns4/$ts4*100,2);
				$percent2 = round($nt4/$ts4*100,2);
				$percent3 = round($nk4/$ts4*100,2);
			}else{
				$percent1="0.00";
				$percent2="0.00";
				$percent3="0.00";
			}
			echo"<tr>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\">Quý IV</td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $ts4 </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $ns4 </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $nt4</td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $percent1% </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $percent2% </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $nk4</td>
			</tr>";
			}
		}
			if($ts!=0){
				$percent = round($number1/$ts*100,2);
				$percent1 = round($number2/$ts*100,2);
				$percent2 = round($number/$ts*100,2);
			}else{
				$percent="0.00";
				$percent1="0.00";
				$percent2="0.00";
			}	
			echo"
			<tr>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\">Năm $year</td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $ts </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $number1 </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $number </td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $percent%</td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $percent2%</td>
			<td style=\"text-align:center;color:black;font-size: 15;font-weight:bold;\"> $number2</td>
			</tr></table></form>";
for($i=1;$i<=12;$i++){
$result1 = mysql_query("SELECT count(*) as sum FROM hososcbd_iso WHERE ngaykt BETWEEN '$year-$i-1 00:00:00' AND '$year-$i-31 00:00:00'") ;
	while($row = mysql_fetch_array($result1))
	{
		$s[$i] =$row['sum'];	
	}
}
echo" 
<!-- pie chart canvas element -->
<br/>
<br/>
<br/>
<canvas id=\"buyers\" width=\"600\" height=\"400\"></canvas>
<canvas id=\"countries\" width=\"600\" height=\"400\"> </canvas><br/>
<font style=\"padding-left:50px;\" size=\"+1\" ><b>Biểu đồ BD/SC theo tháng</b></font>
<font style=\"padding-left:543px;\" size=\"+1\" color=\"#878BB6\"><b>Số thiết bị dưới 30 ngày làm việc</b></font>
<font style=\"padding-left:800px;\" size=\"+1\" color=\"#4ACAB4\"><b>Số thiết bị trên 30 ngày làm việc </b><br/></font>
<font style=\"padding-left:800px;\" size=\"+1\" color=\"#FF8153\"><b>Số thiết bị hỏng</b><br/></font>

<script>

// line chart data
	var buyerData = {
		labels : [\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\"],
		datasets : [
		{
				fillColor : \"rgba(172,194,132,0.4)\",
				strokeColor : \"#ACC26D\",
				pointColor : \"#fff\",
				pointStrokeColor : \"#9DB86D\",
				data : [$s[1],$s[2],$s[3],$s[4],$s[5],$s[6],$s[7],$s[8],$s[9],$s[10],$s[11],$s[12]]
			}
		]
	}
	
	// get line chart canvas
	var buyers = document.getElementById('buyers').getContext('2d');

	// draw line chart
	new Chart(buyers).Line(buyerData);


	// pie chart data
	var pieData = [
		{
			value: $number1,
			color:\"#878BB6\"
		},
		{
			value : $number,
			color : \"#4ACAB4\"
		},
		{
			value : $number2,
			color : \"#FF8153\"
		}
		
	];

	// pie chart options
	var pieOptions = {
		segmentShowStroke : false,
		animateScale : true
	}
	
	// get pie chart canvas
	var countries= document.getElementById(\"countries\").getContext(\"2d\");
	
	// draw pie chart
	new Chart(countries).Pie(pieData, pieOptions);
	
</script>";

		}
       

	echo" 	
	<br/>
	</body>
	</html>";
}
if($baocao=="Xuất File Word"){

$month = isset($_POST['month']) ? $_POST['month'] : '';
$year = isset($_POST['year']) ? $_POST['year'] : '';

for($i=1;$i<=12;$i++){
$n[$i]=0;
$n1[$i]=0;
$ghichu[$i]="";
$result1 = mysql_query("SELECT count(*) as sum FROM hososcbd_iso WHERE ngaykt BETWEEN '$year-$i-1 00:00:00' AND '$year-$i-31 00:00:00' AND ttktafter!='Hỏng'") ;
	while($row = mysql_fetch_array($result1))
	{
		$s[$i] =$row['sum'];	
	}

$result2 = mysql_query("SELECT datediff(ngaykt,ngayth) as date,ghichu,ttktafter FROM hososcbd_iso WHERE ngaykt BETWEEN '$year-$i-1 00:00:00' AND '$year-$i-31 00:00:00'") ;
	while($row = mysql_fetch_array($result2))
	{
		$date =$row['date'];
		$ttktafter =$row['ttktafter'];	
		if($date>=30){
		$ghichu[$i] =$row['ghichu'];
		}
		if($ttktafter=="Hỏng") $ghichu[$i]="";
		if($ttktafter=="Chờ vật tư thay thế") $ghichu[$i]="Chờ vật tư thay thế";			
		if($date>=30) $n[$i]++; 
		if($date<30) $n1[$i]++; 	
	}
	if($s[$i]!=0){   $percent[$i]=round($n1[$i]/$s[$i]*100,2); }
	else $percent[$i]="0.00";
}
echo"
<font size=\"+1\"><center><b> THỐNG KÊ VIỆC THỰC HIỆN BD-SC MÁY NĂM $year <br/> xưởng sửa chữa và chuẩn chỉnh máy địa vật lý </b></center></font>
<br/>
<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:solid black .5pt;
 mso-border-themecolor:text1;mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:26.5pt'>
  <td width=85 rowspan=2 style='width:63.9pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:26.5pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><b style='mso-bidi-font-weight:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>Tháng</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
  \"Times New Roman\",\"serif\"'><o:p></o:p></span></b></p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'><o:p>&nbsp;</o:p></span></b></p>
  </td>
  <td width=240 colspan=3 style='width:2.5in;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:26.5pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><b style='mso-bidi-font-weight:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>S&#7889;</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
  \"Times New Roman\",\"serif\"'> <span class=SpellE>l&#432;&#7907;ng</span> <span
  class=SpellE>máy</span><o:p></o:p></span></b></p>
  </td>
  <td width=90 rowspan=2 style='width:67.5pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:26.5pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>% <span
  class=SpellE>th&#7921;c</span> <span class=SpellE>hi&#7879;n</span> <span
  class=SpellE>d&#432;&#7899;i</span> 15 <span class=SpellE>ngày</span><o:p></o:p></span></b></p>
  </td>
  <td width=201 rowspan=2 style='width:150.75pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:26.5pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><b style='mso-bidi-font-weight:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>Ghi</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
  \"Times New Roman\",\"serif\"'> <span class=SpellE>chú</span><o:p></o:p></span></b></p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'><o:p>&nbsp;</o:p></span></b></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;height:53.5pt'>
  <td width=84 style='width:63.0pt;border-top:none;border-left:none;border-bottom:
  solid black 1.0pt;mso-border-bottom-themecolor:text1;border-right:solid black 1.0pt;
  mso-border-right-themecolor:text1;mso-border-top-alt:solid black .5pt;
  mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:53.5pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><b style='mso-bidi-font-weight:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>T&#7893;ng</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
  \"Times New Roman\",\"serif\"'> <span class=SpellE>s&#7889;</span> <span
  class=SpellE>máy</span> <span class=SpellE>&#273;ã</span> <span class=SpellE>th&#7921;c</span>
  <span class=SpellE>hi&#7879;n</span><o:p></o:p></span></b></p>
  </td>
  <td width=78 style='width:58.5pt;border-top:none;border-left:none;border-bottom:
  solid black 1.0pt;mso-border-bottom-themecolor:text1;border-right:solid black 1.0pt;
  mso-border-right-themecolor:text1;mso-border-top-alt:solid black .5pt;
  mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:53.5pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><b style='mso-bidi-font-weight:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>D&#432;&#7899;i</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
  \"Times New Roman\",\"serif\"'> 15 <span class=SpellE>ngày</span> <span
  class=SpellE>làm</span> <span class=SpellE>vi&#7879;c</span><o:p></o:p></span></b></p>
  </td>
  <td width=78 style='width:58.5pt;border-top:none;border-left:none;border-bottom:
  solid black 1.0pt;mso-border-bottom-themecolor:text1;border-right:solid black 1.0pt;
  mso-border-right-themecolor:text1;mso-border-top-alt:solid black .5pt;
  mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:53.5pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><b style='mso-bidi-font-weight:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>Trên</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
  \"Times New Roman\",\"serif\"'> 14 <span class=SpellE>ngày</span> <span
  class=SpellE>làm</span> <span class=SpellE>vi&#7879;c</span><o:p></o:p></span></b></p>
  </td>
 </tr>";
 for($i=1;$i<=12;$i++){
 echo"<tr style='mso-yfti-irow:2;height:25.6pt'>
  <td width=85 valign=top style='width:63.9pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;
  mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:25.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>Tháng</span></span><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'> $i<o:p></o:p></span></p>
  </td>
  <td width=84 valign=top style='width:63.0pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:25.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:12.0pt;
  font-family:\"Times New Roman\",\"serif\"'>$s[$i]<o:p></o:p></span></p>
  </td>
  <td width=78 valign=top style='width:58.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:25.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:12.0pt;
  font-family:\"Times New Roman\",\"serif\"'>$n1[$i]<o:p></o:p></span></p>
  </td>
  <td width=78 valign=top style='width:58.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:25.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:12.0pt;
  font-family:\"Times New Roman\",\"serif\"'>$n[$i]<o:p></o:p></span></p>
  </td>
  <td width=90 valign=top style='width:67.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:25.6pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span style='font-size:12.0pt;
  font-family:\"Times New Roman\",\"serif\"'>$percent[$i]%<o:p></o:p></span></p>
  </td>
  <td width=201 valign=top style='width:150.75pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:25.6pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'><o:p>&nbsp;$ghichu[$i]</o:p></span></p>
  </td>
 </tr>";
 
 if($i==3){
 $tongso[1]=$s[1]+$s[2]+$s[3];
 $a[1]=$n1[1]+$n1[2]+$n1[3];
 $b[1]=$n[1]+$n[2]+$n[3];
 if($tongso[1]!=0) { $p[1]=round($a[1]/$tongso[1]*100,2);}
 else	$p[1]="0.00";
 echo"

 <tr style='mso-yfti-irow:5;height:22.0pt'>
  <td width=85 valign=top style='width:63.9pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;
  mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:22.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><b style='mso-bidi-font-weight:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>Quý</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
  \"Times New Roman\",\"serif\"'> I<o:p></o:p></span></b></p>
  </td>
  <td width=84 valign=top style='width:63.0pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:22.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>$tongso[1]<o:p></o:p></span></b></p>
  </td>
  <td width=78 valign=top style='width:58.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:22.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>$a[1]<o:p></o:p></span></b></p>
  </td>
  <td width=78 valign=top style='width:58.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:22.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>$b[1]<o:p></o:p></span></b></p>
  </td>
  <td width=90 valign=top style='width:67.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:22.0pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>$p[1]%<o:p></o:p></span></b></p>
  </td>
  <td width=201 valign=top style='width:150.75pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:22.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>";
 }
  if($i==6){
 $tongso[2]=$s[4]+$s[5]+$s[6];
 $a[2]=$n1[4]+$n1[5]+$n1[6];
 $b[2]=$n[4]+$n[5]+$n[6];
 if($tongso[2]!=0) { $p[2]=round($a[2]/$tongso[2]*100,2);}
 else	$p[2]="0.00";
 echo"
 <tr style='mso-yfti-irow:5;height:22.0pt'>
  <td width=85 valign=top style='width:63.9pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;
  mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:22.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><b style='mso-bidi-font-weight:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>Quý</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
  \"Times New Roman\",\"serif\"'> II<o:p></o:p></span></b></p>
  </td>
  <td width=84 valign=top style='width:63.0pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:22.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'> $tongso[2]<o:p></o:p></span></b></p>
  </td>
  <td width=78 valign=top style='width:58.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:22.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>$a[2]<o:p></o:p></span></b></p>
  </td>
  <td width=78 valign=top style='width:58.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:22.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>$b[2]<o:p></o:p></span></b></p>
  </td>
  <td width=90 valign=top style='width:67.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:22.0pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>$p[2]%<o:p></o:p></span></b></p>
  </td>
  <td width=201 valign=top style='width:150.75pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:22.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>";
 }
  if($i==9){
 $tongso[3]=$s[7]+$s[8]+$s[9];
 $a[3]=$n1[7]+$n1[8]+$n1[9];
 $b[3]=$n[7]+$n[8]+$n[9];
 if($tongso[3]!=0) { $p[3]=round($a[3]/$tongso[3]*100,2);}
 else	$p[3]="0.00";
 echo"
 <tr style='mso-yfti-irow:5;height:22.0pt'>
  <td width=85 valign=top style='width:63.9pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;
  mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:22.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><b style='mso-bidi-font-weight:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>Quý</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
  \"Times New Roman\",\"serif\"'> III<o:p></o:p></span></b></p>
  </td>
  <td width=84 valign=top style='width:63.0pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:22.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>$tongso[3]<o:p></o:p></span></b></p>
  </td>
  <td width=78 valign=top style='width:58.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:22.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>$a[3]<o:p></o:p></span></b></p>
  </td>
  <td width=78 valign=top style='width:58.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:22.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>$b[3]<o:p></o:p></span></b></p>
  </td>
  <td width=90 valign=top style='width:67.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:22.0pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>$p[3]%<o:p></o:p></span></b></p>
  </td>
  <td width=201 valign=top style='width:150.75pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:22.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>";
 }
  if($i==12){
 $tongso[4]=$s[10]+$s[11]+$s[12];
 $a[4]=$n1[10]+$n1[11]+$n1[12];
 $b[4]=$n[10]+$n[11]+$n[12];
 if($tongso[4]!=0) { $p[4]=round($a[4]/$tongso[4]*100,2);}
 else	$p[4]="0.00";
 echo"
 <tr style='mso-yfti-irow:5;height:22.0pt'>
  <td width=85 valign=top style='width:63.9pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;
  mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:22.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><b style='mso-bidi-font-weight:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>Quý</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
  \"Times New Roman\",\"serif\"'> IV<o:p></o:p></span></b></p>
  </td>
  <td width=84 valign=top style='width:63.0pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:22.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'> $tongso[4]<o:p></o:p></span></b></p>
  </td>
  <td width=78 valign=top style='width:58.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:22.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>$a[4]<o:p></o:p></span></b></p>
  </td>
  <td width=78 valign=top style='width:58.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:22.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>$b[4]<o:p></o:p></span></b></p>
  </td>
  <td width=90 valign=top style='width:67.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:22.0pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>$p[4]%<o:p></o:p></span></b></p>
  </td>
  <td width=201 valign=top style='width:150.75pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:22.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>";
 }
 }
 
	$ts = $tongso[1]+$tongso[2]+$tongso[3]+$tongso[4];
	$ta = $a[1]+$a[2]+$a[3]+$a[4];
	$tb = $b[1]+$b[2]+$b[3]+$b[4];
	$tp = round($ta/$ts*100,2);
echo" 
 <tr style='mso-yfti-irow:18;mso-yfti-lastrow:yes;height:22.0pt'>
  <td width=85 valign=top style='width:63.9pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;
  mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:22.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><b style='mso-bidi-font-weight:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>N&#259;m</span></b></span><b
  style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;font-family:
  \"Times New Roman\",\"serif\"'>&nbsp;$year<o:p></o:p></span></b></p>
  </td>
  <td width=84 valign=top style='width:63.0pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:22.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>$ts<o:p></o:p></span></b></p>
  </td>
  <td width=78 valign=top style='width:58.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:22.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>$ta<o:p></o:p></span></b></p>
  </td>
  <td width=78 valign=top style='width:58.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:22.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>$tb<o:p></o:p></span></b></p>
  </td>
  <td width=90 valign=top style='width:67.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:22.0pt'>
  <p class=MsoNormal align=right style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'>$tp%<o:p></o:p></span></b></p>
  </td>
  <td width=201 valign=top style='width:150.75pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:22.0pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
</table>";

echo" <p align=\"right\" style=\"font-style:italic;margin-right:20px;\"> Vũng Tàu, ngày &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; tháng &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; năm &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
<p style=\"margin-right:80px;\" align=\"right\"> Người thực hiện </p><br/>
";

header("Content-Disposition:attchment;filename=\"TK.doc\""); 
exit;	
}
?>
