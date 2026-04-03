<?php
		#####################
		# required settings #
		#####################
session_start();
//if($_SESSION['username']!=""){

 
echo "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
	<html>
	<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
        <link rel=\"stylesheet\" type=\"text/css\" href=\"css3/demo.css\" />
        <link rel=\"stylesheet\" type=\"text/css\" href=\"css3/style3.css\" />	
	<script type=\"text/javascript\" src=\"js3/modernizr.custom.04022.js\"></script>
	<script type=\"text/javascript\" src=\"js3/modernizr.custom.04022.js\"></script>
	<script type=\"text/javascript\" src=\"http://code.jquery.com/jquery-2.1.4.min.js\"></script> 
<script src=\"//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js\"></script>
<script type=\"text/javascript\" src=\"http://code.jquery.com/jquery-2.1.4.min.js\"></script> 
<script src=\"//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js\"></script>
<script>
webshims.setOptions('forms-ext', {types: 'date'});
webshims.polyfill('forms forms-ext');
$.webshims.formcfg = {
en: {
    dFormat: '/',
    dateSigns: '/',
    patterns: {
    d: \"dd/mm/yy\"
    }
}
};
</script>
	</head>
	<body>
<div class=\"noprint\">
<section class=\"tabs\">
<input id=\"tab-1\" type=\"radio\" name=\"radio-set\" class=\"tab-selector-1\"  onClick=\"window.location.href='lichsuthietbi.php'\" checked=\"checked\"/>
<label for=\"tab-1\" class=\"tab-label-1\">BÁO CÁO LUÂN CHUYỂN THIẾT BỊ</label>
<input id=\"tab-2\" type=\"radio\" name=\"radio-set\" class=\"tab-selector-2\" onClick=\"window.location.href='lichsulamviec.php'\"/>
<label for=\"tab-2\" class=\"tab-label-2\">BÁO CÁO THEO DÕI THIẾT BỊ</label>
<input id=\"tab-3\" type=\"radio\" name=\"radio-set\" class=\"tab-selector-3\" onClick=\"window.location.href='lichsusuachua.php'\"  />
<label for=\"tab-3\" class=\"tab-label-3\">BÁO CÁO SỬA CHỮA THIẾT BỊ</label>
<div class=\"clear-shadow\"></div>
</section></div>	
	
	
	";
    
require_once("mte/mte_lichsulamviec.php");
include ("select_data.php") ;
$tabledit = new MySQLtabledit();

# database settings:
$tabledit->database = $databasename;
$tabledit->host = 'localhost';
$tabledit->user = $usernamehost;
$tabledit->pass = $passwordhost;

# table of the database
$tabledit->table = 'lamviectb_ktkt';

# the primary key of the table (must be AUTO_INCREMENT)
$tabledit->primary_key = 'stt';

# the fields you want to see in "list view"
$tabledit->fields_in_list_view = array('stt','mahoso','mathietbi','magieng','noinhan','ngaydo','nguoido','congviec','nhietdo','apsuat','thoigian','sophieu');


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
	'mahoso' => 'MÃ HỒ SƠ',
	'sophieu' => 'SỐ ĐƠN HÀNG',
	'magntb' => 'MÃ QUẢN LÝ',
	'mathietbi' => 'TÊN THIẾT BỊ',
	'model' => 'MODEL',
	'magieng' => 'TÊN GIẾNG',
	'ngaygui' => 'NGÀY GỬI',
	'noigui' => 'NƠI GỬI',
    'nguoigui'  =>'NGƯỜI GỬI',
	'ngaynhan'  =>'NGÀY NHẬN',
	'noinhan'  =>'TÊN GIÀN',
    'nguoinhan'=>'NGƯỜI NHẬN',
	'nguoido'=>'NGƯỜI ĐO',
	'ngaydo'=>'NGÀY ĐO',
	'nhietdo'=>'NHIỆT ĐỘ',
	'apsuat'=>'ÁP SUẤT',
	'taikhoan'=>'TÀI KHOẢN',
	'thoigian'=>'THỜI GIAN',
	'congviec'=>'CÔNG VIỆC',
	'ghichu' =>'GHI CHÚ', 
	'malv' =>'MÃ LÀM VIỆC'
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
/*}else{
header ("Location: /login.htm");
exit ;
}*/
?>
