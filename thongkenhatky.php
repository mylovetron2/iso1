<?php

		#####################
		# required settings #
		#####################
if(!isset($_SESSION)){
   session_start();
}
 
include ("select_data.php");
include ("myfunctions.php");
 
$thongkenhatky = isset($_POST['thongkenhatky']) ? $_POST['thongkenhatky'] : '';

echo "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
	<html>
	<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
        <link rel=\"stylesheet\" type=\"text/css\" href=\"css3/demo.css\" />
	<link rel=\"stylesheet\" type=\"text/css\" href=\"css3/style3.css\" />
	<style type=\"text/css\">
	@media print {
		.noprint {display:none};
		}
	@media screen {
		.printspan {display:none};
		
		}
        </style>	
	<style type=\"text/css\" media=\"print\">
		.printspan {
		display:inline;
		font-size:18px;
		color:black;
		margin-left:180px;
		font-family:Times New Roman;
		font-weight:bold
		}
        </style>	
		<script type=\"text/javascript\" src=\"js3/modernizr.custom.04022.js\"></script>
        <SCRIPT LANGUAGE=\"JavaScript\" SRC=\"java/CalendarPopup.js\"></SCRIPT>
	<SCRIPT LANGUAGE=\"JavaScript\">
	var cal = new CalendarPopup();
	</SCRIPT>
	</head>
	<body>";
echo "
<Span class=\"printspan\"><center>XƯỞNG SỬA CHỮA THIẾT BỊ ĐỊA VẬT LÝ <br/>NHẬT KÝ CÔNG VIỆC HÀNG NGÀY</center></span>
<div class=\"noprint\">
<section class=\"tabs\">
<input id=\"tab-1\" type=\"radio\" name=\"radio-set\" class=\"tab-selector-1\"  onClick=\"window.location.href='thongkenhatky.php'\" checked=\"checked\"/>
<label for=\"tab-1\" class=\"tab-label-1\">THỐNG KÊ NHẬT KÝ</label>
<div class=\"clear-shadow\"></div>
</section></div>";    
require_once("mte/mte_thongkenhatky.php");
$tabledit = new MySQLtabledit();

# database settings:
$tabledit->database = "$databasename";
$tabledit->host = "$hostname";
$tabledit->user = "$usernamehost";
$tabledit->pass = "$passwordhost";

# table of the database
$tabledit->table = 'nhatky_iso';

# the primary key of the table (must be AUTO_INCREMENT)
$tabledit->primary_key = 'stt';

# the fields you want to see in "list view"
$tabledit->fields_in_list_view = array('stt','ngaynk','hoten','gio1','gio2','gio3','gio4','gio5','gio6','gio7','gio8','gio9','gio10','noidungcv1','noidungcv2','noidungcv3','noidungcv4','noidungcv5','noidungcv6','noidungcv7','noidungcv8','noidungcv9','noidungcv10');
//$tabledit->fields_in_list_view = array('stt','ngaynk','hoten','gio1','noidungcv1');

		#####################
		# optional settings #
		#####################

# language (en of nl)
$tabledit->language = 'vi';

# numbers of rows/records in "list view"
$tabledit->num_rows_list_view = 10;

# required fields in edit or add record
$tabledit->fields_required = array('STT');

# help text 
# visible name of the fields
$tabledit->show_text = array(
	'stt' => 'STT',
	'hoten' => 'Họ tên',
	'ngaynk' => 'Ngày-Tháng',
	'gio1' => 'Giờ',
	'noidungcv1' => 'Nội dung công việc',
);

$tabledit->width_editor = '100%';
$tabledit->width_input_fields = '500px';
$tabledit->width_text_fields = '298px';
$tabledit->height_text_fields = '100px';

# warning no .htacces ('on' or 'off')
$tabledit->no_htaccess_warning = 'on';
		####################################
		# connect, show editor, disconnect #
		####################################
$tabledit->database_connect();
$tabledit->do_it();
echo "
	</body>
	</html>";
$tabledit->database_disconnect();
?>
