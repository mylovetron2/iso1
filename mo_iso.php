<?php
include ("select_data.php");
if(!isset($_SESSION)){
   session_start();
}
require_once("mte/mte_mo.php");
$tabledit = new MySQLtabledit();
#username

# database settings:
$tabledit->database = "$databasename";
$tabledit->host = "$hostname";
$tabledit->user = "$usernamehost";
$tabledit->pass = "$passwordhost";

# table of the database
$tabledit->table = 'mo_iso';

# the primary key of the table (must be AUTO_INCREMENT)
$tabledit->primary_key = 'stt';

# the fields you want to see in "list view"
$tabledit->fields_in_list_view = array('stt','mamo','tenmo');


		#####################
		# optional settings #
		#####################

# language (en of nl)
$tabledit->language = 'vi';

# numbers of rows/records in "list view"
$tabledit->num_rows_list_view = 10;

# required fields in edit or add record
$tabledit->fields_required = array('mamo');

# help text 
# visible name of the fields
$tabledit->show_text = array(
	'stt' => 'STT',
	'mamo' => 'Mã Mỏ',
	'tenmo' => 'Tên Mỏ',
);

$tabledit->width_editor = '100%';
$tabledit->width_input_fields = '450px';
$tabledit->width_text_fields = '298px';
$tabledit->height_text_fields = '100px';

# warning no .htacces ('on' or 'off')
$tabledit->no_htaccess_warning = 'on';


		####################################
		# connect, show editor, disconnect #
		####################################


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

echo "<Span class=\"printspan\"><center>XƯỞNG SỬA CHỮA VÀ CHUẨN CHỈNH MÁY<br/>DANH MỤC CÁC THIẾT BỊ HỖ TRỢ</center></br></span>
<div class=\"noprint\">	
<section class=\"tabs\">
<input id=\"tab-1\" type=\"radio\" name=\"radio-set\" class=\"tab-selector-1\"  onClick=\"window.location.href='mo_iso.php'\"/>
<label for=\"tab-1\" class=\"tab-label-1\">NHẬP MỎ</label>
<div class=\"clear-shadow\"></div>
</section></div>";

$tabledit->database_connect();


$tabledit->do_it();

echo "
	</body>
	</html>";

$tabledit->database_disconnect();
?>
