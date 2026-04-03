<?php
// File mới xuất báo cáo bảo dưỡng/sửa chữa, clone từ baocaothang_2.php
include ("select_data.php") ;
include ("myfunctions.php") ;
ob_start();
echo"<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
<style type=\"text/css\">
.table1 { border-collapse:collapse; width:100%; border:1px dotted black; }
.table1 td { border:1px dotted black; text-align:left; }
.table1 th { border:1px dotted black; font-weight: bold; background-color:#87CEEB; }
body,td,th { font-family: Times New Roman, Times, serif; }
.style1 { font-size: 18px; font-weight: bold; }
.datetime { font-size: 14px; width:150px; height:30px; border:1px dotted #aaa; background-clip: padding-box; padding-left:8px; }
#searchid { width:300px; border:dotted 1px #000; padding:5px; font-size:12px; }
#result { position:absolute; width:300px; padding:10px; display: block; margin-top:-1px; border-top:0px; overflow:hidden; border:1px #CCC dotted; background-color: white; }
.show { padding:10px; border-bottom:1px #999 dashed; font-size:15px; height:20px; }
.show:hover { background:#4c66a4; color:#FFF; cursor:pointer; }
</style>
</head>\n\n<body>\n";
// ...existing code logic from baocaothang_2.php...
// Để sử dụng, copy toàn bộ phần xử lý logic từ baocaothang_2.php vào đây hoặc chỉnh sửa theo nhu cầu mới.
?>
