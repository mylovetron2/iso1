<?php
		#####################
		# required settings #
		#####################
include ("select_data.php");
include ("myfunctions.php");

		#####################
		# required settings #
		#####################
if(!isset($_SESSION)){
   session_start();
}
 
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
		color:red;
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
<Span class=\"printspan\"><center>XƯỞNG SỬA CHỮA VÀ CHUẨN CHỈNH MÁY<br/>THỐNG KÊ GIỜ CÔNG LÀM VIỆC</center></br></br></span>
<div class=\"noprint\">
<section class=\"tabs\">
<input id=\"tab-1\" type=\"radio\" name=\"radio-set\" class=\"tab-selector-1\"  onClick=\"window.location.href='baocaothongke.php'\" />
<label for=\"tab-1\" class=\"tab-label-1\">LIỆT KÊ CÔNG TÁC BD-SC</label>
<input id=\"tab-2\" type=\"radio\" name=\"radio-set\" class=\"tab-selector-2\" onClick=\"window.location.href='thongkehonghoc.php'\"/>
<label for=\"tab-2\" class=\"tab-label-2\">THỐNG KÊ HỎNG HÓC</label>
<input id=\"tab-3\" type=\"radio\" name=\"radio-set\" class=\"tab-selector-3\" onClick=\"window.location.href='dichvungoai.php'\"  />
<label for=\"tab-3\" class=\"tab-label-3\">THỐNG KÊ DỊCH VỤ NGOÀI</label>
<input id=\"tab-4\" type=\"radio\" name=\"radio-set\" class=\"tab-selector-4\" onClick=\"window.location.href='thongkegiolv.php'\" checked=\"checked\"/>
<label for=\"tab-4\" class=\"tab-label-4\">GIỜ CÔNG LÀM VIỆC</label>
<div class=\"clear-shadow\"></div>
</section></div>";    
require_once("mte/mte_thongkegiolv.php");
$tabledit = new MySQLtabledit();

# database settings:
$tabledit->database = "$databasename";
$tabledit->host = "$hostname";
$tabledit->user = "$usernamehost";
$tabledit->pass = "$passwordhost";

# table of the database
$tabledit->table = 'hososcbd_iso';

# the primary key of the table (must be AUTO_INCREMENT)
$tabledit->primary_key = 'stt';

# the fields you want to see in "list view"
$tabledit->fields_in_list_view = array('stt','hoten','mahoso','mamay','somay','giolv','ngayth','ngaykt','giolvt');


		#####################
		# optional settings #
		#####################

# language (en of nl)
$tabledit->language = 'vi';

# numbers of rows/records in "list view"
$tabledit->num_rows_list_view = 15;

# required fields in edit or add record
$tabledit->fields_required = array('STT');

# help text 
$tabledit->help_text = array(
	'employeeNumber' => "Don't edit this field",
	'active' => 'Active user, yes or no?',
	'firstName' => '',
	'lastName' => '',
	'email' => '',
	'jobTitle' => 'Please select!'
);

# visible name of the fields
$tabledit->show_text = array(
	'stt' => 'STT',
	'mahoso' => 'Số Hồ Sơ',
	'mamay' => 'Tên Máy',
	'hoten' => 'Họ tên',
	'somay' => 'Số Máy',
	'ngayth'  =>'Ngày TH',
	'ngaykt'  =>'Ngày KT',
    	'giolv' =>'Giờ công </br>làm việc',  
    	'giolvt' =>'Giờ công </br>trong tháng',  
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
