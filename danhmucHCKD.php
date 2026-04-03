<?php
include ("select_data.php");

		#####################
		# required settings #
		#####################

if(!isset($_SESSION)){
   session_start();
}
require_once("mte/mte_danhmucHCKD.php");
$tabledit = new MySQLtabledit();
					
# database settings:
$tabledit->database = "$databasename";
$tabledit->host = "$hostname";
$tabledit->user = "$usernamehost";
$tabledit->pass = "$passwordhost";

# table of the database
$tabledit->table = 'thietbihckd_iso';

# the primary key of the table (must be AUTO_INCREMENT)
$tabledit->primary_key = 'stt';

# the fields you want to see in "list view"
$tabledit->fields_in_list_view = array('stt','tenviettat','tenthietbi','somay','hangsx','bophansh','chusohuu','thoihankd','ngayktnghiemthu','tlkt','danchuan');


		#####################
		# optional settings #
		#####################


# language (en of nl)
$tabledit->language = 'vi';

# numbers of rows/records in "list view"
$tabledit->num_rows_list_view = 15;

# required fields in edit or add record
$tabledit->fields_required = array('somay');

# help text 
# visible name of the fields
$tabledit->show_text = array(
	'stt' => 'STT',
	'tenviettat' => 'Tên viết tắt',
	'tenthietbi' => 'Tên thiết bị',
	'mavattu' => 'Mã vật tư',
	'somay' => 'Số máy',
	'hangsx' => 'Hãng sản xuất',
	'bophansh' => 'Bộ phận sở hữu',
	'chusohuu' => 'Chủ sở hữu',
	'thoihankd' => 'Thời hạn kiểm định',
	'ngayktnghiemthu' => 'Ngày kiểm tra <BR/>nghiệm thu',
	'loaitb' => 'Loại thiết bị',
	'tlkt' => 'TLKT',
	'danchuan' => 'Dẫn chuẩn'
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


echo "
<div class=\"noprint\">		
<section class=\"tabs\">
<input id=\"tab-1\" type=\"radio\" name=\"radio-set\" class=\"tab-selector-1\" checked=\"checked\"  onClick=\"window.location.href='danhmucHCKD.php'\"/>
<label for=\"tab-1\" class=\"tab-label-1\">DANH MỤC THIẾT BỊ HC-KĐ</label>

<div class=\"clear-shadow\"></div>
</section></div>";
$tabledit->database_connect();

$tabledit->do_it();

echo "
	</body>
	</html>";
$tabledit->database_disconnect();
?>
