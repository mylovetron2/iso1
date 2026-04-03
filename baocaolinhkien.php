<?php
include ("select_data.php");
include ("myfunctions.php");

		#####################
		# required settings #
		#####################
if(!isset($_SESSION)){
   session_start();
}
$vattu = isset($_POST['vattu']) ? $_POST['vattu'] : '';
if ($vattu=="lichsu")    header("Location: baocaolinhkien.php");
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
<div class=\"noprint\">
<section class=\"tabs\">
<input id=\"tab-1\" type=\"radio\" name=\"radio-set\" class=\"tab-selector-1\"  onClick=\"window.location.href='baocaolinhkien.php'\" checked=\"checked\"/>
<label for=\"tab-1\" class=\"tab-label-1\">LỊCH SỬ LINH KIỆN</label>
<div class=\"clear-shadow\"></div>
</section></div><br/>";    
require_once("mte/mte_baocaolinhkien.php");
$tabledit = new MySQLtabledit();

# database settings:
$tabledit->database = "$databasename";
$tabledit->host = "$hostname";
$tabledit->user = "$usernamehost";
$tabledit->pass = "$passwordhost";
# table of the database
$tabledit->table = 'nhapxuat_iso';

# the primary key of the table (must be AUTO_INCREMENT)
$tabledit->primary_key = 'stt';

# the fields you want to see in "list view"
$tabledit->fields_in_list_view = array('stt','tenviettat','pn','ngaygui','nguoigui','soluong','ghichu');
//$tabledit->fields_in_list_view = array('stt','tenviettat','pn','ngaygui','nguoigui','soluong','ghichu');
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
	'tenviettat' => 'TÊN VIẾT TẮT',
	'tenmota' => 'TÊN MÔ TẢ',
	'pn' => 'PN',
	'soluong' => 'SỐ LƯỢNG',
	'ghichu' => 'LÝ DO XUẤT',
	'ngaygui' => 'NGÀY XUẤT',
	'nguoigui' => 'NGƯỜI XUẤT',
        'tlkt' => 'TLKT',
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
/*include ("select_data.php");

		#####################
		# required settings #
		#####################
session_start();
require_once("mte/mte_baocaolinhkien.php");
$tabledit = new MySQLtabledit();

# database settings:
$tabledit->database = "$databasename";
$tabledit->host = "$hostname";
$tabledit->user = "$usernamehost";
$tabledit->pass = "$passwordhost";
# table of the database
$tabledit->table = 'nhapxuat_iso';

# the primary key of the table (must be AUTO_INCREMENT)
$tabledit->primary_key = 'stt';

# the fields you want to see in "list view"
$tabledit->fields_in_list_view = array('stt','tenviettat','tenmota','pn','ngaygui','nguoigui','soluong','ghichu','tlkt');
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
	'tenviettat' => 'TÊN VIẾT TẮT',
	'tenmota' => 'TÊN MÔ TẢ',
	'pn' => 'PN',
	'soluong' => 'SỐ LƯỢNG',
	'ghichu' => 'LÝ DO XUẤT',
	'thongsokythuat' => 'THÔNG SỐ KT',
	'ngaygui' => 'NGAỲ XUẤT',
	'nguoigui' => 'NGƯỜI XUẤT',
        'tlkt' => 'TLKT',
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
echo "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
<html>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
<link rel=\"stylesheet\" type=\"text/css\" href=\"css3/demo.css\" />
<link rel=\"stylesheet\" type=\"text/css\" href=\"css3/style3.css\" />	
<script type=\"text/javascript\" src=\"js3/modernizr.custom.04022.js\"></script>
</head>
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
<body>";
$tabledit->database_connect();
$tabledit->do_it();
echo "
	</body>
	</html>";
$tabledit->database_disconnect();
 */
?>
