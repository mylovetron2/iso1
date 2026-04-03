<?php
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
<Span class=\"printspan\"><center>XƯỞNG SỬA CHỮA VÀ CHUẨN CHỈNH MÁY<br/>THÔNG BÁO BẢO DƯỠNG ĐỊNH KỲ</center></span>
<div class=\"noprint\">
<section class=\"tabs\">
<input id=\"tab-2\" type=\"radio\" name=\"radio-set\" class=\"tab-selector-2\" onClick=\"window.location.href='thongkebaoduong.php'\" checked=\"checked\"/>
<label for=\"tab-2\" class=\"tab-label-2\">BẢO DƯỠNG ĐỊNH KỲ CHO ĐỘI</label>
<div class=\"clear-shadow\"></div>
</section></div>";
require_once("mte/mte_thongkebaoduong_cnc.php");
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
$tabledit->fields_in_list_view = array('stt','mavt','somay','ngaykt','ngaybdtt','madv','ngaycl');


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
	'maql' => 'Mã Quản Lý',
	'hoso' => 'Số Hồ Sơ',
	'mavt' => 'Tên Máy',
	'somay' => 'Số Máy',
    	'cv'  =>'Công Việc',
	'ngaykt' => 'Ngày Bảo Dưỡng',
	'honghoc'  =>'Loại Hỏng Hóc',
	'khacphuc'=>'Khắc Phục',
    	'ngth'=>'Nhân Viên',
    	'ttktafter' => 'Tình Trạng Kỹ Thuật',
    	'nhomsc' =>'Nhóm Sửa Chữa',  
	'ghichu' =>'Ghi Chú', 
	'lydo' =>'Lý do',
	'ngayyc' =>'Ngày Yêu Cầu',
	'madv' =>'Đơn vị',
	'phieu' =>'Số Phiếu',
	'solg' =>'Số Lượng',
	'ngyeucau'  =>'Người Yêu Cầu',
	'ngnhyeucau'  =>'Người Nhận Yêu Cầu',
	'ttktbefore'  =>'Tình Trạng Kỹ Thuật Thiết Bị Trước Khi Sửa Chữa',
	'honghoc'  =>'Hỏng Hóc',
	'vattusc'  =>'Vật Tư Sửa Chữa',
	'ndbaoduong'  =>'Nội Dung Bảo Dưỡng',
	'tbdosc'  =>'Thiết Bị Hỗ Trợ',
	'serialtbdosc'  =>'Số Serial Number',
	'tbdosc1'  =>'Thiết Bị Hỗ Trợ 1',
	'serialtbdosc1'  =>'Số Serial Number 1',
	'tbdosc2'  =>'Thiết Bị Hỗ Trợ 2',
	'serialtbdosc2'  =>'Số Serial Number 2',
	'tbdosc3'  =>'Thiết Bị Hỗ Trợ 3',
	'serialtbdosc3'  =>'Số Serial Number 3',
	'tbdosc4'  =>'Thiết Bị Hỗ Trợ 4',
	'serialtbdosc4'  =>'Số Serial Number 4',
	'ngaycl'  =>'Số ngày còn lại</br> ( làm việc)',
	'ngaybdtt'  =>'Ngày Bảo Dưỡng </br>Tiếp Theo'
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
