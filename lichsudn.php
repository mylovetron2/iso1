<?php
		#####################
		# required settings #
		#####################

include ("select_data.php");
include ("myfunctions.php");
session_start();
require_once("mte/mte_lichsudn.php");
$tabledit = new MySQLtabledit();
$_SECTION['username']=isset($_POST['username']) ? $_POST['username'] : '';
$_SECTION['password']=isset($_POST['password']) ? $_POST['password'] : '';
#username

# database settings:
$tabledit->database = "$databasename";
$tabledit->host = "$hostname";
$tabledit->user = "$usernamehost";
$tabledit->pass = "$passwordhost";

# table of the database
$tabledit->table = 'lichsudn_iso';

# the primary key of the table (must be AUTO_INCREMENT)
$tabledit->primary_key = 'stt';

# the fields you want to see in "list view"
$tabledit->fields_in_list_view = array('stt','username','madv','nhom','curdate','ip_address','maql');


		#####################
		# optional settings #
		#####################

# language (en of nl)
$tabledit->language = 'vi';

# numbers of rows/records in "list view"
$tabledit->num_rows_list_view = 10;

# required fields in edit or add record
$tabledit->fields_required = array('tenthietbi');

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
	'username' => 'Username',
	'madv' => 'Đơn vị',
	'nhomsc' => 'Nhóm',
	'curdate' => 'Ngày',
	'ip_address' => 'Địa chỉ IP',
	'maql' => 'Mã quản lý',
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
<script type=\"text/javascript\" src=\"js3/modernizr.custom.04022.js\"></script>
</head>
<body>";

echo " 
<section class=\"tabs\">
<input id=\"tab-1\" type=\"radio\" name=\"radio-set\" class=\"tab-selector-1\"  onClick=\"window.location.href='quanlyuser.php'\" />
<label for=\"tab-1\" class=\"tab-label-1\">QUẢN LÝ USER</label>
<input id=\"tab-2\" type=\"radio\" name=\"radio-set\" class=\"tab-selector-2\" onClick=\"window.location.href='lichsudn.php'\"  checked=\"checked\"/>
<label for=\"tab-2\" class=\"tab-label-2\"> LỊCH SỬ ĐĂNG NHẬP</label>
<div class=\"clear-shadow\"></div>
</section>";

$tabledit->database_connect();


$tabledit->do_it();

echo "
	</body>
	</html>";

$tabledit->database_disconnect();
?>
