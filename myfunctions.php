<?php
// Convert UTF-8 code Vietnamese to English .
function utf8_to_ascii($str) {

$chars = array(

'a' => array('a','á','à','ả','ã','ạ','A','Á','À','Ả','Ã','Ạ','â','ấ','ầ','ẩ','ẫ','ậ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ','ă','ắ','ằ','ẳ','ẵ','ặ','Ă','Ắ','Ằ','Ẳ','Ẵ','Ặ'),

'e' => array('ế','ề','ể','ễ','ệ','Ế','Ề','Ể','Ễ','Ệ','é','è','ẻ','ẽ','ẹ','ê','É','È','Ẻ','Ẽ','Ẹ','Ê','E'),

'i' => array('í','ì','ỉ','i','ĩ','Í','Ì','ị','I','Ỉ','Ĩ','Ị'),

'o' => array('o','ó','ò','ỏ','õ','ọ','O','Ó','Ò','Ỏ','Õ','Ọ','ô','ố','ồ','ổ','ỗ','ộ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','ơ','ớ','ờ','ở','ỡ','ợ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ'),

'u' => array('u','ú','ù','ủ','ũ','ụ','U','Ú','Ù','Ủ','Ũ','Ụ','ư','ứ','ừ','ử','ữ','ự','Ư','Ứ','Ừ','Ử','Ữ','Ự'),

'y' => array('y','ý','ỳ','ỷ','ỹ','ỵ','Y','Ý','Ỳ','Ỷ','Ỹ','Ỵ'),

'd' => array('đ','Đ','D'),
'b' => array('B'),
'c' => array('C'),
'f' => array('F'),
'g' => array('G'),
'h' => array('H'),
'j' => array('J'),
'k' => array('K'),
'l' => array('L'),
'm' => array('M'),
'n' => array('N'),
'p' => array('P'),
'q' => array('Q'),
'r' => array('R'),
's' => array('S'),
't' => array('T'),
'v' => array('V'),
'w' => array('W'),
'x' => array('X'),
'z' => array('Z'),
);

foreach ($chars as $key => $arr)

foreach ($arr as $val)

$str = str_replace($val,$key,$str);

return $str;

}
function Vnam_to_Eng($str) {

$chars = array(

'a' => array('a','á','à','ả','ã','ạ','â','ấ','ầ','ẩ','ẫ','ậ','ă','ắ','ằ','ẳ','ẵ','ặ'),
'A' => array('A','Á','À','Ả','Ã','Ạ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ','Ă','Ắ','Ằ','Ẳ','Ẵ','Ặ'),
'e' => array('ế','ề','ể','ễ','ệ','é','è','ẻ','ẽ','ẹ','ê'),
'E' => array('Ế','Ề','Ể','Ễ','Ệ','É','È','Ẻ','Ẽ','Ẹ','Ê'),
'i' => array('í','ì','ỉ','i','ĩ','ị'),
'I' => array('Ì','Í','I','Ỉ','Ĩ','Ị'),
'o' => array('o','ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ'),
'O' => array('O','Ó','Ò','Ỏ','Õ','Ọ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ'),

'u' => array('u','ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự'),
'U' => array('U','Ú','Ù','Ủ','Ũ','Ụ','Ư','Ứ','Ừ','Ử','Ữ','Ự'),
'y' => array('y','ý','ỳ','ỷ','ỹ','ỵ'),
'Y' => array('Y','Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
'd' => array('đ'),
'D' => array('Đ'),

);

foreach ($chars as $key => $arr)

foreach ($arr as $val)

$str = str_replace($val,$key,$str);

return $str;

}
// Convert Uppercase to Lowercase Vietnamese
function up_to_low ($str) {

$chars = array(
'a' => array('A'),
'á' => array('Á'),
'à' => array('À'),
'ả' => array('Ả'),
'ã' => array('Ã'),
'ạ' => array('Ạ'),
'ă' => array('Ă'),
'ắ' => array('Ắ'),
'ằ' => array('Ằ'),
'ẳ' => array('Ẳ'),
'ẵ' => array('Ẵ'),
'ặ' => array('Ặ'),
'â' => array('Â'),
'ấ' => array('Ấ'),
'ầ' => array('Ầ'),
'ẩ' => array('Ẩ'),
'ẫ' => array('Ẫ'),
'ậ' => array('Ậ'),
'e' => array('E'),
'é' => array('É'),
'è' => array('È'),
'ẻ' => array('Ẻ'),
'ẽ' => array('Ẽ'),
'ẹ' => array('Ẹ'),
'ê' => array('Ê'),
'ế' => array('Ế'),
'ề' => array('Ề'),
'ể' => array('Ể'),
'ễ' => array('Ễ'),
'ệ' => array('Ệ'),
'i' => array('I'),
'í' => array('Í'),
'ì' => array('Ì'),
'ỉ' => array('Ỉ'),
'ĩ' => array('Ĩ'),
'ị' => array('Ị'),
'o' => array('O'),
'ó' => array('Ó'),
'ò' => array('Ò'),
'ỏ' => array('Ỏ'),
'õ' => array('Õ'),
'ọ' => array('Ọ'),
'ô' => array('Ô'),
'ố' => array('Ố'),
'ồ' => array('Ồ'),
'ổ' => array('Ỏ'),
'ỗ' => array('Õ'),
'ộ' => array('Ộ'),
'ơ' => array('Ơ'),
'ớ' => array('Ớ'),
'ờ' => array('Ờ'),
'ở' => array('Ở'),
'ỡ' => array('Ỡ'),
'ợ' => array('Ợ'),
'u' => array('U'),
'ú' => array('Ú'),
'ù' => array('Ù'),
'ủ' => array('Ủ'),
'ũ' => array('Ũ'),
'ụ' => array('Ụ'),
'ư' => array('Ư'),
'ứ' => array('Ứ'),
'ừ' => array('Ừ'),
'ử' => array('Ử'),
'ữ' => array('Ữ'),
'ự' => array('Ự'),
'y' => array('Y'),
'ý' => array('Ý'),
'ỳ' => array('Ỳ'),
'ỷ' => array('Ỷ'),
'ỹ' => array('Ỹ'),
'ỵ' => array('Ỵ'),
'd' => array('D'),
'đ' => array('Đ'),
);
foreach ($chars as $key => $arr)

foreach ($arr as $val)

$str = str_replace($val,$key,$str);

return $str;

}
// display good format for document
function display ($tieude,$bien,$maxlen) {
$arr = str_split($tieude);
$arr1 = str_split($bien);
$tieude = Vnam_to_Eng($tieude) ;
$bien = Vnam_to_Eng($bien) ;
$lentieude = 0;
foreach ($arr as $val)
{
		if (($val == "A")||($val == "B")||($val == "C")||($val == "D")||($val == "E")||($val == "F")||($val == "G")||($val == "H")||($val == "I")||($val == "J")||($val == "K")||($val == "L")||($val == "M")||($val == "N")||($val == "O")||($val == "P")||($val == "Q")||($val == "R")||($val == "S")||($val == "T")||($val == "U")||($val == "V")||($val == "W")||($val == "X")||($val == "Y")||($val == "Z")) 
		{
			$index = 3;
		} else {
			$index = 1 ;
		}
	$lentieude = $lentieude + $index ;
}	
$lenbien = 0;
foreach ($arr1 as $val)
{
		if (($val == "A")||($val == "B")||($val == "C")||($val == "D")||($val == "E")||($val == "F")||($val == "G")||($val == "H")||($val == "I")||($val == "J")||($val == "K")||($val == "L")||($val == "M")||($val == "N")||($val == "O")||($val == "P")||($val == "Q")||($val == "R")||($val == "S")||($val == "T")||($val == "U")||($val == "V")||($val == "W")||($val == "X")||($val == "Y")||($val == "Z")) 
		{
			$index = 3;
		} else {
			$index = 1 ;
		}
	$lenbien = $lenbien + $index ;
}
$lentieude = ceil($lentieude) ;
$lenbien = ceil($lenbien) ;
//$lentieude = strlen($tieude) ;
//$lenbien = strlen($bien) ;
$len = ($maxlen - $lentieude -$lenbien) ;
$remider = fmod($len,2) ;
if ($remider) {
	$len = ($len/2 - 0.5) ;
} else {
	$len = $len/2 ;
}	
$header = str_repeat(".",$len);
return $header ;
}
//sum date
function sumdate ($thfrom,$namfrom,$thto,$namto) {
$i =1 ;
$tongsng = 0;
if ($namto == $namfrom) {
	$th = ($thto - $thfrom) ;
}
if ($namto > $namfrom) {
	$th = ( 12 - $thfrom + $thto) ;
}
while ($i < $th) {
	$i++ ;
	$thfrom++;
if ($thfrom > 12) { 
	$thfrom = 1 ;
$d=cal_days_in_month(CAL_GREGORIAN,$thfrom,$namto);	
}else { 
	$thfrom = $thfrom;
	$d=cal_days_in_month(CAL_GREGORIAN,$thfrom,$namfrom);	
}
$tongsng = ($tongsng + $d );
}
return $tongsng ;
}

function minigetsunandsat ($ng,$th,$nam,$ngtbcn,$sum) {
$ngtbcn = $ngtbcn;
$ng = $ng;
while ($ng <= $sum) {
	$date = date("D", mktime(0,0,0,$th,$ng,$nam));
	if (($date == "Sun")||($date=="Sat")) {
	$ngtbcn++ ;
        }
	$ng++;
}
return $ngtbcn;
}

function getsunandsat ($ngfrom,$thfrom,$namfrom,$ngto,$thto,$namto) {
if (($namto == $namfrom)&&($thto == $thfrom)) {
$ngtbcn = minigetsunandsat($ngfrom,$thfrom,$namfrom,0,$ngto);
}
if (($namto == $namfrom)&&($thto > $thfrom)) {
//part 1
$d=cal_days_in_month(CAL_GREGORIAN,$thfrom,$namfrom);	
$ngtbcn = minigetsunandsat($ngfrom,$thfrom,$namfrom,0,$d);
// part 2
$th = $thfrom;
while ($th < ($thto-1)) {
	$th++;
$d=cal_days_in_month(CAL_GREGORIAN,$th,$namfrom);	
$ngtbcn = minigetsunandsat(1,$th,$namfrom,$ngtbcn,$d);
}
//part 3
$ngtbcn = minigetsunandsat(1,$thto,$namfrom,$ngtbcn,$ngto);
}
if ($namto > $namfrom) {
//part 1 namfrom
$d=cal_days_in_month(CAL_GREGORIAN,$thfrom,$namfrom);	
$ngtbcn = minigetsunandsat($ngfrom,$thfrom,$namfrom,0,$d);
//part 2 namfrom
$th = $thfrom;
while ($th < 12) {
	$th++;
$d=cal_days_in_month(CAL_GREGORIAN,$th,$namfrom);	
$ngtbcn = minigetsunandsat(1,$th,$namfrom,$ngtbcn,$d);
}
//part 2 namto
$th = 0; 
while ($th < ($thto-1)) {
	$th++;
$d=cal_days_in_month(CAL_GREGORIAN,$th,$namto);	
$ngtbcn = minigetsunandsat(1,$th,$namto,$ngtbcn,$d);
}
//part 3
$ngtbcn = minigetsunandsat(1,$thto,$namto,$ngtbcn,$ngto);
}
return $ngtbcn;
}
//Lich am
function INT($d) {
	return floor($d);
}

function jdFromDate($dd, $mm, $yy) {
	$a = INT((14 - $mm) / 12);
	$y = $yy + 4800 - $a;
	$m = $mm + 12 * $a - 3;
	$jd = $dd + INT((153 * $m + 2) / 5) + 365 * $y + INT($y / 4) - INT($y / 100) + INT($y / 400) - 32045;
	if ($jd < 2299161) {
		$jd = $dd + INT((153* $m + 2)/5) + 365 * $y + INT($y / 4) - 32083;
	}
	return $jd;
}

function jdToDate($jd) {
	if ($jd > 2299160) { // After 5/10/1582, Gregorian calendar
		$a = $jd + 32044;
		$b = INT((4*$a+3)/146097);
		$c = $a - INT(($b*146097)/4);
	} else {
		$b = 0;
		$c = $jd + 32082;
	}
	$d = INT((4*$c+3)/1461);
	$e = $c - INT((1461*$d)/4);
	$m = INT((5*$e+2)/153);
	$day = $e - INT((153*$m+2)/5) + 1;
	$month = $m + 3 - 12*INT($m/10);
	$year = $b*100 + $d - 4800 + INT($m/10);
	//echo "day = $day, month = $month, year = $year\n";
	return array($day, $month, $year);
}

function getNewMoonDay($k, $timeZone) {
	$T = $k/1236.85; // Time in Julian centuries from 1900 January 0.5
	$T2 = $T * $T;
	$T3 = $T2 * $T;
	$dr = M_PI/180;
	$Jd1 = 2415020.75933 + 29.53058868*$k + 0.0001178*$T2 - 0.000000155*$T3;
	$Jd1 = $Jd1 + 0.00033*sin((166.56 + 132.87*$T - 0.009173*$T2)*$dr); // Mean new moon
	$M = 359.2242 + 29.10535608*$k - 0.0000333*$T2 - 0.00000347*$T3; // Sun's mean anomaly
	$Mpr = 306.0253 + 385.81691806*$k + 0.0107306*$T2 + 0.00001236*$T3; // Moon's mean anomaly
	$F = 21.2964 + 390.67050646*$k - 0.0016528*$T2 - 0.00000239*$T3; // Moon's argument of latitude
	$C1=(0.1734 - 0.000393*$T)*sin($M*$dr) + 0.0021*sin(2*$dr*$M);
	$C1 = $C1 - 0.4068*sin($Mpr*$dr) + 0.0161*sin($dr*2*$Mpr);
	$C1 = $C1 - 0.0004*sin($dr*3*$Mpr);
	$C1 = $C1 + 0.0104*sin($dr*2*$F) - 0.0051*sin($dr*($M+$Mpr));
	$C1 = $C1 - 0.0074*sin($dr*($M-$Mpr)) + 0.0004*sin($dr*(2*$F+$M));
	$C1 = $C1 - 0.0004*sin($dr*(2*$F-$M)) - 0.0006*sin($dr*(2*$F+$Mpr));
	$C1 = $C1 + 0.0010*sin($dr*(2*$F-$Mpr)) + 0.0005*sin($dr*(2*$Mpr+$M));
	if ($T < -11) {
		$deltat= 0.001 + 0.000839*$T + 0.0002261*$T2 - 0.00000845*$T3 - 0.000000081*$T*$T3;
	} else {
		$deltat= -0.000278 + 0.000265*$T + 0.000262*$T2;
	};
	$JdNew = $Jd1 + $C1 - $deltat;
	//echo "JdNew = $JdNew\n";
	return INT($JdNew + 0.5 + $timeZone/24);
}

function getSunLongitude($jdn, $timeZone) {
	$T = ($jdn - 2451545.5 - $timeZone/24) / 36525; // Time in Julian centuries from 2000-01-01 12:00:00 GMT
	$T2 = $T * $T;
	$dr = M_PI/180; // degree to radian
	$M = 357.52910 + 35999.05030*$T - 0.0001559*$T2 - 0.00000048*$T*$T2; // mean anomaly, degree
	$L0 = 280.46645 + 36000.76983*$T + 0.0003032*$T2; // mean longitude, degree
	$DL = (1.914600 - 0.004817*$T - 0.000014*$T2)*sin($dr*$M);
	$DL = $DL + (0.019993 - 0.000101*$T)*sin($dr*2*$M) + 0.000290*sin($dr*3*$M);
	$L = $L0 + $DL; // true longitude, degree
	//echo "\ndr = $dr, M = $M, T = $T, DL = $DL, L = $L, L0 = $L0\n";
    // obtain apparent longitude by correcting for nutation and aberration
    $omega = 125.04 - 1934.136 * $T;
    $L = $L - 0.00569 - 0.00478 * sin($omega * $dr);
	$L = $L*$dr;
	$L = $L - M_PI*2*(INT($L/(M_PI*2))); // Normalize to (0, 2*PI)
	return INT($L/M_PI*6);
}

function getLunarMonth11($yy, $timeZone) {
	$off = jdFromDate(31, 12, $yy) - 2415021;
	$k = INT($off / 29.530588853);
	$nm = getNewMoonDay($k, $timeZone);
	$sunLong = getSunLongitude($nm, $timeZone); // sun longitude at local midnight
	if ($sunLong >= 9) {
		$nm = getNewMoonDay($k-1, $timeZone);
	}
	return $nm;
}

function getLeapMonthOffset($a11, $timeZone) {
	$k = INT(($a11 - 2415021.076998695) / 29.530588853 + 0.5);
	$last = 0;
	$i = 1; // We start with the month following lunar month 11
	$arc = getSunLongitude(getNewMoonDay($k + $i, $timeZone), $timeZone);
	do {
		$last = $arc;
		$i = $i + 1;
		$arc = getSunLongitude(getNewMoonDay($k + $i, $timeZone), $timeZone);
	} while ($arc != $last && $i < 14);
	return $i - 1;
}

/* Comvert solar date dd/mm/yyyy to the corresponding lunar date */
function convertSolar2Lunar($dd, $mm, $yy, $timeZone) {
	$dayNumber = jdFromDate($dd, $mm, $yy);
	$k = INT(($dayNumber - 2415021.076998695) / 29.530588853);
	$monthStart = getNewMoonDay($k+1, $timeZone);
	if ($monthStart > $dayNumber) {
		$monthStart = getNewMoonDay($k, $timeZone);
	}
	$a11 = getLunarMonth11($yy, $timeZone);
	$b11 = $a11;
	if ($a11 >= $monthStart) {
		$lunarYear = $yy;
		$a11 = getLunarMonth11($yy-1, $timeZone);
	} else {
		$lunarYear = $yy+1;
		$b11 = getLunarMonth11($yy+1, $timeZone);
	}
	$lunarDay = $dayNumber - $monthStart + 1;
	$diff = INT(($monthStart - $a11)/29);
	$lunarLeap = 0;
	$lunarMonth = $diff + 11;
	if ($b11 - $a11 > 365) {
		$leapMonthDiff = getLeapMonthOffset($a11, $timeZone);
		if ($diff >= $leapMonthDiff) {
			$lunarMonth = $diff + 10;
			if ($diff == $leapMonthDiff) {
				$lunarLeap = 1;
			}
		}
	}
	if ($lunarMonth > 12) {
		$lunarMonth = $lunarMonth - 12;
	}
	if ($lunarMonth >= 11 && $diff < 4) {
		$lunarYear -= 1;
	}
	return array($lunarDay, $lunarMonth, $lunarYear, $lunarLeap);
}

/* Convert a lunar date to the corresponding solar date */
function convertLunar2Solar($lunarDay, $lunarMonth, $lunarYear, $lunarLeap, $timeZone) {
	if ($lunarMonth < 11) {
		$a11 = getLunarMonth11($lunarYear-1, $timeZone);
		$b11 = getLunarMonth11($lunarYear, $timeZone);
	} else {
		$a11 = getLunarMonth11($lunarYear, $timeZone);
		$b11 = getLunarMonth11($lunarYear+1, $timeZone);
	}
	$k = INT(0.5 + ($a11 - 2415021.076998695) / 29.530588853);
	$off = $lunarMonth - 11;
	if ($off < 0) {
		$off += 12;
	}
	if ($b11 - $a11 > 365) {
		$leapOff = getLeapMonthOffset($a11, $timeZone);
		$leapMonth = $leapOff - 2;
		if ($leapMonth < 0) {
			$leapMonth += 12;
		}
		if ($lunarLeap != 0 && $lunarMonth != $leapMonth) {
			return array(0, 0, 0);
		} else if ($lunarLeap != 0 || $off >= $leapOff) {
			$off += 1;
		}
	}
	$monthStart = getNewMoonDay($k + $off, $timeZone);
	return jdToDate($monthStart + $lunarDay - 1);
}
function minigetholiday ($ng,$th,$nam,$ngle,$sum) {
$ngle = $ngle;
$ng = $ng;
while ($ng <= $sum) {
//Tet ta
$licham = convertSolar2Lunar($ng, $th, $nam,7) ;
	if (($licham[0] =="30")&&($licham[1] =="12")) {
        $ngle++;
        } 
	if (($licham[0] =="1")&&($licham[1] =="1")) {
        $ngle++;
        } 
	if (($licham[0] =="2")&&($licham[1] =="1")) {
        $ngle++;
        } 
	if (($licham[0] =="3")&&($licham[1] =="1")) {
        $ngle++;
	}
//Gio to       	
	if (($licham[0] =="10")&&($licham[1] =="3")) {
        $ngle++;
        } 
//30-4 	
	if (($ng =="30")&&($th =="4")) {
        $ngle++;
        } 
//1-5 	
	if (($ng =="1")&&($th =="5")) {
        $ngle++;
        } 
//2-9 	
	if (($ng =="2")&&($th =="9")) {
        $ngle++;
        } 
//Tet tay 	
	if (($ng =="1")&&($th =="1")) {
        $ngle++;
        } 
	$ng++;
}
return $ngle;
}
function getholiday ($ngfrom,$thfrom,$namfrom,$ngto,$thto,$namto) {
if (($namto == $namfrom)&&($thto == $thfrom)) {
$ngle = minigetholiday($ngfrom,$thfrom,$namfrom,0,$ngto);
}
if (($namto == $namfrom)&&($thto > $thfrom)) {
//part 1
$d=cal_days_in_month(CAL_GREGORIAN,$thfrom,$namfrom);	
$ngle = minigetholiday($ngfrom,$thfrom,$namfrom,0,$d);
// part 2
$th = $thfrom;
while ($th < ($thto-1)) {
	$th++;
$d=cal_days_in_month(CAL_GREGORIAN,$th,$namfrom);	
$ngle = minigetholiday(1,$th,$namfrom,$ngle,$d);
}
//part 3
$ngle = minigetholiday(1,$thto,$namfrom,$ngle,$ngto);
}
if ($namto > $namfrom) {
//part 1 namfrom
$d=cal_days_in_month(CAL_GREGORIAN,$thfrom,$namfrom);	
$ngle = minigetholiday($ngfrom,$thfrom,$namfrom,0,$d);
//part 2 namfrom
$th = $thfrom;
while ($th < 12) {
	$th++;
$d=cal_days_in_month(CAL_GREGORIAN,$th,$namfrom);	
$ngle = minigetholiday(1,$th,$namfrom,$ngle,$d);
}
//part 2 namto
$th = 0; 
while ($th < ($thto-1)) {
	$th++;
$d=cal_days_in_month(CAL_GREGORIAN,$th,$namto);	
$ngle = minigetholiday(1,$th,$namto,$ngle,$d);
}
//part 3
$ngle = minigetholiday(1,$thto,$namto,$ngle,$ngto);
}
return $ngle;

}
function get_user_browser()
{
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $ub = '';
    if(preg_match('/MSIE/i',$u_agent))
    {
        $ub = "ie";
    }
    elseif(preg_match('/Firefox/i',$u_agent))
    {
        $ub = "firefox";
    }
    elseif(preg_match('/Safari/i',$u_agent))
    {
        $ub = "safari";
    }
    elseif(preg_match('/Chrome/i',$u_agent))
    {
        $ub = "chrome";
    }
    elseif(preg_match('/Flock/i',$u_agent))
    {
        $ub = "flock";
    }
    elseif(preg_match('/Opera/i',$u_agent))
    {
        $ub = "opera";
    }

    return $ub;
}
?>
