<?php
ob_start();
include ("select_data.php") ;
include ("myfunctions.php") ;
$n=0;
//$con=mysqli_connect("localhost",$usernamehost,$passwordhost,$databasename);
$mavt =  isset($_GET['mavt']) ? $_GET['mavt'] : '';
$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
$button = isset($_POST['button']) ? $_POST['button'] : '';
$nhap = isset($_POST['nhap']) ? $_POST['nhap'] : '';
$solan = isset($_POST['solan']) ? $_POST['solan'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$search = isset($_GET['search']) ? $_GET['search'] : '';
$thietbihc1= isset($_POST['thietbihc1']) ? $_POST['thietbihc1'] : '';
$thietbihc10= isset($_POST['thietbihc10']) ? $_POST['thietbihc10'] : '';
$them = isset($_POST['them']) ? $_POST['them'] : '';
$lapkh = isset($_POST['lapkh']) ? $_POST['lapkh'] : '';
$savefile= isset($_POST['savefile']) ? $_POST['savefile'] : '';
$del = isset($_POST['del']) ? $_POST['del'] : '';
$kehoach = isset($_POST['kehoach']) ? $_POST['kehoach'] : '';
$copy = isset($_POST['copy']) ? $_POST['copy'] : '';
$delcopy = isset($_POST['delcopy']) ? $_POST['delcopy'] : '';
if(isset($_GET['mavattu'])){
$_SESSION['mavattu'] = $_GET['mavattu'];
$mavt=$_GET['mavattu'];

}

if(isset($_GET['lapkh'])){
$lapkh=$_GET['lapkh'];
}

if(isset($_GET['copy'])){
$copy=$_GET['copy'];
}

if(isset($_GET['kehoach'])){
$kehoach=$_GET['kehoach'];
}



?><head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
body{ 
    font-family:Times New Roman;
    font-size:18px;
}

#searchid
{
    width:600px;
    border:solid 1px #000;
    padding:5px;
    font-size:12px;
}
#result
    {
        position:absolute;
        width:300px;
        padding:10px;
        display: block;
        margin-top:-1px;
        border-top:0px;
        overflow:hidden;
        border:1px #CCC solid;
        background-color: white;
	
    }
    .show
    {
        padding:10px; 
        border-bottom:1px #999 dashed;
        font-size:15px; 
        height:20px;
    }
    .show:hover
    {
        background:#4c66a4;
        color:#FFF;
        cursor:pointer;
    }

.table1
{
border-collapse:collapse;
width:100%;
border:1px solid #CCCCCC;
}
.table1 td
{
border:1px solid #CCCCCC;
text-align:left;
height: 30px;
}
.table1 th 
{
border:1px solid black;
font-weight: bold;
height:50px;
background-color:#87CEEB;
}

.table2
{
border-collapse:collapse;
width:100%;
border:1px solid black;
}
.table2 td
{
border:1px solid black;
text-align:left;
height: 30px;
}
.table2 th 
{
border:1px solid black;
font-weight: bold;

}
.container {
	 display: table;	 
	 width: 100%;
}
.column {
	 display: table-cell;	
}
.datetime {
font-size: 14px;
width:600px;
height:30px;
border:1px solid #aaa;
background-clip: padding-box;
padding-left:8px; 
}
.datetime1 {
font-size: 14px;
width:600px;
height:30px;
border:1px solid #aaa;
background-clip: padding-box;
padding-left:8px; 
color:#FF0000;
}
 
.select_box{
border: 1px solid #aaa;
width:600px;
height:30px;
font-size:14px;
padding-left:5px;
}

.CSSTableGenerator{width:97%;box-shadow:10px 10px 5px #888;border:1px solid #000;-moz-border-radius-bottomleft:0;-webkit-border-bottom-left-radius:0;border-bottom-left-radius:0;-moz-border-radius-bottomright:0;-webkit-border-bottom-right-radius:0;border-bottom-right-radius:0;-moz-border-radius-topright:0;-webkit-border-top-right-radius:0;border-top-right-radius:0;-moz-border-radius-topleft:0;-webkit-border-top-left-radius:0;border-top-left-radius:0;margin:0;padding:0}
.CSSTableGenerator table{width:100%;height:100%;margin:0;padding:0}
.CSSTableGenerator tr:last-child td:last-child{-moz-border-radius-bottomright:0;-webkit-border-bottom-right-radius:0;border-bottom-right-radius:0;border-width:0}
.CSSTableGenerator table tr:first-child td:first-child{-moz-border-radius-topleft:0;-webkit-border-top-left-radius:0;border-top-left-radius:0}
.CSSTableGenerator table tr:first-child td:last-child{-moz-border-radius-topright:0;-webkit-border-top-right-radius:0;border-top-right-radius:0}
.CSSTableGenerator tr:last-child td:first-child{-moz-border-radius-bottomleft:0;-webkit-border-bottom-left-radius:0;border-bottom-left-radius:0}
.CSSTableGenerator tr:nth-child(odd){background-color:#aad4ff}
.CSSTableGenerator tr:nth-child(even){background-color:#fff}
.CSSTableGenerator td{vertical-align:middle;border:1px solid #000;text-align:left;font-size:16px;font-family:"Times New Roman", Times, serif;font-weight:400;color:#000;border-width:0 1px 1px 0;padding:7px}
.CSSTableGenerator tr:last-child td{border-width:0 1px 0 0}
.CSSTableGenerator tr:first-child td{filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#005fbf",endColorstr="#003f7f");background:0;background-color:#005fbf;border:0 solid #000;text-align:center;font-size:16px;font-family:"Times New Roman", Times, serif;font-weight:700;color:#fff;border-width:0 0 1px 1px}
.CSSTableGenerator tr:first-child:hover td{filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#005fbf",endColorstr="#003f7f");background:0;background-color:#005fbf}
.CSSTableGenerator tr:first-child td:last-child{border-width:0 0 1px 1px}
.CSSTableGenerator tr td:last-child,.CSSTableGenerator tr:first-child td:first-child{border-width:0 0 1px}
.style17 {
	color: #FFFFFF;
	font-weight: bold;
}
.style19 {color: #FFFFFF; }

@font-face
	{font-family:Helvetica;
	panose-1:2 11 5 4 2 2 2 2 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-format:other;
	mso-font-pitch:variable;
	mso-font-signature:3 0 0 0 1 0;}
@font-face
	{font-family:Courier;
	panose-1:2 7 4 9 2 2 5 2 4 4;
	mso-font-charset:0;
	mso-generic-font-family:modern;
	mso-font-format:other;
	mso-font-pitch:fixed;
	mso-font-signature:3 0 0 0 1 0;}
@font-face
	{font-family:"Tms Rmn";
	panose-1:2 2 6 3 4 5 5 2 3 4;
	mso-font-charset:0;
	mso-generic-font-family:roman;
	mso-font-format:other;
	mso-font-pitch:variable;
	mso-font-signature:3 0 0 0 1 0;}
@font-face
	{font-family:Helv;
	panose-1:2 11 6 4 2 2 2 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-format:other;
	mso-font-pitch:variable;
	mso-font-signature:3 0 0 0 1 0;}
@font-face
	{font-family:"New York";
	panose-1:2 4 5 3 6 5 6 2 3 4;
	mso-font-charset:0;
	mso-generic-font-family:roman;
	mso-font-format:other;
	mso-font-pitch:variable;
	mso-font-signature:3 0 0 0 1 0;}
@font-face
	{font-family:System;
	panose-1:0 0 0 0 0 0 0 0 0 0;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-format:other;
	mso-font-pitch:variable;
	mso-font-signature:3 0 0 0 1 0;}
@font-face
	{font-family:Wingdings;
	panose-1:5 0 0 0 0 0 0 0 0 0;
	mso-font-charset:2;
	mso-generic-font-family:auto;
	mso-font-pitch:variable;
	mso-font-signature:0 268435456 0 0 -2147483648 0;}
@font-face
	{font-family:"MS Mincho";
	panose-1:2 2 6 9 4 2 5 8 3 4;
	mso-font-alt:"\FF2D\FF33 \660E\671D";
	mso-font-charset:128;
	mso-generic-font-family:modern;
	mso-font-pitch:fixed;
	mso-font-signature:-536870145 1791491579 18 0 131231 0;}
@font-face
	{font-family:Batang;
	panose-1:2 3 6 0 0 1 1 1 1 1;
	mso-font-alt:\BC14\D0D5;
	mso-font-charset:129;
	mso-generic-font-family:auto;
	mso-font-format:other;
	mso-font-pitch:fixed;
	mso-font-signature:1 151388160 16 0 524288 0;}
@font-face
	{font-family:SimSun;
	panose-1:2 1 6 0 3 1 1 1 1 1;
	mso-font-alt:\5B8B\4F53;
	mso-font-charset:134;
	mso-generic-font-family:auto;
	mso-font-format:other;
	mso-font-pitch:variable;
	mso-font-signature:1 135135232 16 0 262144 0;}
@font-face
	{font-family:PMingLiU;
	panose-1:2 2 5 0 0 0 0 0 0 0;
	mso-font-alt:\65B0\7D30\660E\9AD4;
	mso-font-charset:136;
	mso-generic-font-family:auto;
	mso-font-format:other;
	mso-font-pitch:variable;
	mso-font-signature:1 134742016 16 0 1048576 0;}
@font-face
	{font-family:"MS Gothic";
	panose-1:2 11 6 9 7 2 5 8 2 4;
	mso-font-alt:"\FF2D\FF33 \30B4\30B7\30C3\30AF";
	mso-font-charset:128;
	mso-generic-font-family:modern;
	mso-font-format:other;
	mso-font-pitch:fixed;
	mso-font-signature:1 134676480 16 0 131072 0;}
@font-face
	{font-family:Dotum;
	panose-1:2 11 6 0 0 1 1 1 1 1;
	mso-font-alt:\B3CB\C6C0;
	mso-font-charset:129;
	mso-generic-font-family:modern;
	mso-font-format:other;
	mso-font-pitch:fixed;
	mso-font-signature:1 151388160 16 0 524288 0;}
@font-face
	{font-family:SimHei;
	panose-1:2 1 6 9 6 1 1 1 1 1;
	mso-font-alt:\9ED1\4F53;
	mso-font-charset:134;
	mso-generic-font-family:modern;
	mso-font-format:other;
	mso-font-pitch:fixed;
	mso-font-signature:1 135135232 16 0 262144 0;}
@font-face
	{font-family:MingLiU;
	panose-1:2 2 5 9 0 0 0 0 0 0;
	mso-font-alt:\7D30\660E\9AD4;
	mso-font-charset:136;
	mso-generic-font-family:modern;
	mso-font-format:other;
	mso-font-pitch:fixed;
	mso-font-signature:1 134742016 16 0 1048576 0;}
@font-face
	{font-family:Mincho;
	panose-1:2 2 6 9 4 3 5 8 3 5;
	mso-font-alt:\660E\671D;
	mso-font-charset:128;
	mso-generic-font-family:roman;
	mso-font-format:other;
	mso-font-pitch:fixed;
	mso-font-signature:1 134676480 16 0 131072 0;}
@font-face
	{font-family:Gulim;
	panose-1:2 11 6 0 0 1 1 1 1 1;
	mso-font-alt:\AD74\B9BC;
	mso-font-charset:129;
	mso-generic-font-family:roman;
	mso-font-format:other;
	mso-font-pitch:fixed;
	mso-font-signature:1 151388160 16 0 524288 0;}
@font-face
	{font-family:Century;
	panose-1:2 4 6 4 5 5 5 2 3 4;
	mso-font-charset:0;
	mso-generic-font-family:roman;
	mso-font-format:other;
	mso-font-pitch:variable;
	mso-font-signature:3 0 0 0 1 0;}
@font-face
	{font-family:"Angsana New";
	panose-1:2 2 6 3 5 4 5 2 3 4;
	mso-font-charset:222;
	mso-generic-font-family:roman;
	mso-font-format:other;
	mso-font-pitch:variable;
	mso-font-signature:16777217 0 0 0 65536 0;}
@font-face
	{font-family:"Cordia New";
	panose-1:2 11 3 4 2 2 2 2 2 4;
	mso-font-charset:222;
	mso-generic-font-family:roman;
	mso-font-format:other;
	mso-font-pitch:variable;
	mso-font-signature:16777217 0 0 0 65536 0;}
@font-face
	{font-family:Mangal;
	panose-1:2 4 5 3 5 2 3 3 2 2;
	mso-font-charset:1;
	mso-generic-font-family:roman;
	mso-font-format:other;
	mso-font-pitch:variable;
	mso-font-signature:8192 0 0 0 0 0;}
@font-face
	{font-family:Latha;
	panose-1:2 11 6 4 2 2 2 2 2 4;
	mso-font-charset:1;
	mso-generic-font-family:roman;
	mso-font-format:other;
	mso-font-pitch:variable;
	mso-font-signature:262144 0 0 0 0 0;}
@font-face
	{font-family:Sylfaen;
	panose-1:1 10 5 2 5 3 6 3 3 3;
	mso-font-charset:0;
	mso-generic-font-family:roman;
	mso-font-format:other;
	mso-font-pitch:variable;
	mso-font-signature:12583555 0 0 0 13 0;}
@font-face
	{font-family:Vrinda;
	panose-1:2 11 5 2 4 2 4 2 2 3;
	mso-font-charset:1;
	mso-generic-font-family:roman;
	mso-font-format:other;
	mso-font-pitch:variable;
	mso-font-signature:0 0 0 0 0 0;}
@font-face
	{font-family:Raavi;
	panose-1:2 11 5 2 4 2 4 2 2 3;
	mso-font-charset:1;
	mso-generic-font-family:roman;
	mso-font-format:other;
	mso-font-pitch:variable;
	mso-font-signature:0 0 0 0 0 0;}
@font-face
	{font-family:Shruti;
	panose-1:2 11 5 2 4 2 4 2 2 3;
	mso-font-charset:1;
	mso-generic-font-family:roman;
	mso-font-format:other;
	mso-font-pitch:variable;
	mso-font-signature:0 0 0 0 0 0;}
@font-face
	{font-family:Sendnya;
	panose-1:0 0 4 0 0 0 0 0 0 0;
	mso-font-charset:1;
	mso-generic-font-family:roman;
	mso-font-format:other;
	mso-font-pitch:variable;
	mso-font-signature:0 0 0 0 0 0;}
@font-face
	{font-family:Gautami;
	panose-1:2 11 5 2 4 2 4 2 2 3;
	mso-font-charset:1;
	mso-generic-font-family:roman;
	mso-font-format:other;
	mso-font-pitch:variable;
	mso-font-signature:0 0 0 0 0 0;}
@font-face
	{font-family:Tunga;
	panose-1:2 11 5 2 4 2 4 2 2 3;
	mso-font-charset:1;
	mso-generic-font-family:roman;
	mso-font-format:other;
	mso-font-pitch:variable;
	mso-font-signature:0 0 0 0 0 0;}
@font-face
	{font-family:"Estrangelo Edessa";
	panose-1:3 8 6 0 0 0 0 0 0 0;
	mso-font-charset:1;
	mso-generic-font-family:roman;
	mso-font-format:other;
	mso-font-pitch:variable;
	mso-font-signature:0 0 0 0 0 0;}
@font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:-536870145 1107305727 0 0 415 0;}
@font-face
	{font-family:"Arial Unicode MS";
	panose-1:2 11 6 4 2 2 2 2 2 4;
	mso-font-charset:0;
	mso-generic-font-family:roman;
	mso-font-format:other;
	mso-font-pitch:variable;
	mso-font-signature:3 0 0 0 1 0;}
@font-face
	{font-family:Cambria;
	panose-1:2 4 5 3 5 4 6 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:-536870145 1073743103 0 0 415 0;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-520092929 1073786111 9 0 415 0;}
@font-face
	{font-family:Tahoma;
	panose-1:2 11 6 4 3 5 4 4 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-format:other;
	mso-font-pitch:variable;
	mso-font-signature:3 0 0 0 1 0;}
@font-face
	{font-family:VNI-Aptima;
	panose-1:0 0 0 0 0 0 0 0 0 0;
	mso-font-charset:0;
	mso-generic-font-family:auto;
	mso-font-pitch:variable;
	mso-font-signature:3 0 0 0 1 0;}
@font-face
	{font-family:VNI-Times;
	panose-1:0 0 0 0 0 0 0 0 0 0;
	mso-font-charset:0;
	mso-generic-font-family:auto;
	mso-font-pitch:variable;
	mso-font-signature:7 0 0 0 19 0;}
@font-face
	{font-family:"Segoe UI";
	panose-1:2 11 5 2 4 2 4 2 2 3;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-520084737 -1073683329 41 0 479 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:13.0pt;
	font-family:VNI-Times;
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:VNI-Times;}
h1
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-link:"Heading 1 Char";
	mso-style-next:Normal;
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:1;
	font-size:10.0pt;
	font-family:VNI-Times;
	mso-bidi-font-family:VNI-Times;
	mso-font-kerning:0pt;
	text-decoration:underline;
	text-underline:single;}
h2
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-next:Normal;
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:2;
	font-size:13.0pt;
	font-family:VNI-Times;
	mso-bidi-font-family:VNI-Times;
	text-decoration:underline;
	text-underline:single;}
h3
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-next:Normal;
	margin-top:12.0pt;
	margin-right:0in;
	margin-bottom:3.0pt;
	margin-left:0in;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:3;
	font-size:13.0pt;
	font-family:"Arial","sans-serif";}
h4
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-next:Normal;
	margin:0in;
	margin-bottom:.0001pt;
	text-align:center;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:4;
	font-size:14.0pt;
	font-family:VNI-Times;
	mso-bidi-font-family:VNI-Times;
	color:black;}
p.MsoHeading9, li.MsoHeading9, div.MsoHeading9
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-next:Normal;
	margin:0in;
	margin-bottom:.0001pt;
	text-align:center;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:9;
	font-size:14.0pt;
	font-family:VNI-Times;
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:VNI-Times;
	font-weight:bold;}
p.MsoHeader, li.MsoHeader, div.MsoHeader
	{mso-style-unhide:no;
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	tab-stops:center 3.0in right 6.0in;
	font-size:13.0pt;
	font-family:VNI-Times;
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:VNI-Times;}
p.MsoFooter, li.MsoFooter, div.MsoFooter
	{mso-style-unhide:no;
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	tab-stops:center 3.0in right 6.0in;
	font-size:13.0pt;
	font-family:VNI-Times;
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:VNI-Times;}
p.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	margin-top:0in;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:.5in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:13.0pt;
	font-family:VNI-Times;
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:VNI-Times;}
span.Heading1Char
	{mso-style-name:"Heading 1 Char";
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Heading 1";
	font-family:VNI-Times;
	mso-ascii-font-family:VNI-Times;
	mso-hansi-font-family:VNI-Times;
	mso-bidi-font-family:VNI-Times;
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;
	mso-bidi-language:AR-SA;
	font-weight:bold;
	text-decoration:underline;
	text-underline:single;}
span.apple-style-span
	{mso-style-name:apple-style-span;
	mso-style-unhide:no;}
span.msoIns
	{mso-style-type:export-only;
	mso-style-name:"";
	text-decoration:underline;
	text-underline:single;
	color:teal;}
span.msoDel
	{mso-style-type:export-only;
	mso-style-name:"";
	text-decoration:line-through;
	color:red;}
 /* Page Definitions */
 @page
	{mso-footnote-separator:url("TH2016_OK_files/header.htm") fs;
	mso-footnote-continuation-separator:url("TH2016_OK_files/header.htm") fcs;
	mso-endnote-separator:url("TH2016_OK_files/header.htm") es;
	mso-endnote-continuation-separator:url("TH2016_OK_files/header.htm") ecs;}
@page Section1
	{size:842.0pt 595.35pt;
	mso-page-orientation:landscape;
	margin:45.0pt .2in .5in .2in;
	mso-header-margin:.5in;
	mso-footer-margin:15.65pt;
	mso-header:url("TH2016_OK_files/header.htm") h1;
	mso-footer:url("TH2016_OK_files/header.htm") f1;
	mso-paper-source:0;}
div.Section1
	{page:Section1;}
@page Section2
	{size:842.0pt 595.35pt;
	mso-page-orientation:landscape;
	margin:45.0pt .2in .5in .2in;
	mso-header-margin:.5in;
	mso-footer-margin:15.65pt;
	mso-header:url("TH2016_OK_files/header.htm") h1;
	mso-footer:url("TH2016_OK_files/header.htm") f2;
	mso-paper-source:0;}
div.Section2
	{page:Section2;}
@page Section3
	{size:842.0pt 595.35pt;
	mso-page-orientation:landscape;
	margin:.5in .2in .5in .2in;
	mso-header-margin:.5in;
	mso-footer-margin:15.65pt;
	mso-header:url("TH2016_OK_files/header.htm") h1;
	mso-footer:url("TH2016_OK_files/header.htm") f2;
	mso-paper-source:0;}
div.Section3
	{page:Section3;}
@page Section4
	{size:841.9pt 595.3pt;
	mso-page-orientation:landscape;
	margin:42.5pt 56.9pt 84.95pt 56.9pt;
	mso-header-margin:.5in;
	mso-footer-margin:.5in;
	mso-header:url("TH2016_OK_files/header.htm") h1;
	mso-footer:url("TH2016_OK_files/header.htm") f4;
	mso-paper-source:0;}
div.Section4
	{page:Section4;}
 /* List Definitions */
 @list l0
	{mso-list-id:144708887;
	mso-list-type:hybrid;
	mso-list-template-ids:1975026736 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l0:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Segoe UI","sans-serif";}
@list l0:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l0:level3
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l0:level4
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l0:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l0:level6
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l0:level7
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l0:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l0:level9
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l1
	{mso-list-id:198325650;
	mso-list-template-ids:1373284020;}
@list l1:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	mso-ansi-font-weight:bold;
	mso-bidi-font-weight:bold;}
@list l1:level2
	{mso-level-legal-format:yes;
	mso-level-text:"%1\.%2";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:39.0pt;
	text-indent:-21.0pt;
	mso-ansi-font-weight:bold;
	mso-bidi-font-weight:bold;}
@list l1:level3
	{mso-level-legal-format:yes;
	mso-level-text:"%1\.%2\.%3";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.5in;
	mso-ansi-font-weight:bold;
	mso-bidi-font-weight:bold;}
@list l1:level4
	{mso-level-legal-format:yes;
	mso-level-text:"%1\.%2\.%3\.%4";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.5in;
	mso-ansi-font-weight:bold;
	mso-bidi-font-weight:bold;}
@list l1:level5
	{mso-level-legal-format:yes;
	mso-level-text:"%1\.%2\.%3\.%4\.%5";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.0in;
	text-indent:-.75in;
	mso-ansi-font-weight:bold;
	mso-bidi-font-weight:bold;}
@list l1:level6
	{mso-level-legal-format:yes;
	mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.25in;
	text-indent:-1.0in;
	mso-ansi-font-weight:bold;
	mso-bidi-font-weight:bold;}
@list l1:level7
	{mso-level-legal-format:yes;
	mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.25in;
	text-indent:-1.0in;
	mso-ansi-font-weight:bold;
	mso-bidi-font-weight:bold;}
@list l1:level8
	{mso-level-legal-format:yes;
	mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.5in;
	text-indent:-1.25in;
	mso-ansi-font-weight:bold;
	mso-bidi-font-weight:bold;}
@list l1:level9
	{mso-level-legal-format:yes;
	mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.5in;
	text-indent:-1.25in;
	mso-ansi-font-weight:bold;
	mso-bidi-font-weight:bold;}
@list l2
	{mso-list-id:212351905;
	mso-list-type:hybrid;
	mso-list-template-ids:-1286172924 67698689 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l2:level1
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l2:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l2:level3
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l2:level4
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l2:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l2:level6
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l2:level7
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l2:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l2:level9
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l3
	{mso-list-id:307516515;
	mso-list-type:hybrid;
	mso-list-template-ids:-601471896 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l3:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Segoe UI","sans-serif";}
@list l3:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l3:level3
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l3:level4
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l3:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l3:level6
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l3:level7
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l3:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l3:level9
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l4
	{mso-list-id:425271250;
	mso-list-type:hybrid;
	mso-list-template-ids:-1021384566 67698713 1007580060 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l4:level1
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l4:level2
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l4:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l4:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l4:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l4:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l4:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l4:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l4:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l5
	{mso-list-id:440417588;
	mso-list-type:hybrid;
	mso-list-template-ids:573624624 67698713 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l5:level1
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l5:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l5:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l5:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l5:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l5:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l5:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l5:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l5:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l6
	{mso-list-id:565804228;
	mso-list-type:hybrid;
	mso-list-template-ids:-2043501418 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l6:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Segoe UI","sans-serif";}
@list l6:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l6:level3
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l6:level4
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l6:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l6:level6
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l6:level7
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l6:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l6:level9
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l7
	{mso-list-id:618148372;
	mso-list-type:hybrid;
	mso-list-template-ids:-282166522 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l7:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Segoe UI","sans-serif";}
@list l7:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l7:level3
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l7:level4
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l7:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l7:level6
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l7:level7
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l7:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l7:level9
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l8
	{mso-list-id:689725236;
	mso-list-template-ids:891716240;}
@list l8:level1
	{mso-level-start-at:2;
	mso-level-number-format:arabic-leading-zero;
	mso-level-text:%1;
	mso-level-tab-stop:399.0pt;
	mso-level-number-position:left;
	margin-left:399.0pt;
	text-indent:-399.0pt;}
@list l8:level2
	{mso-level-number-format:arabic-leading-zero;
	mso-level-text:%1-%2;
	mso-level-tab-stop:399.0pt;
	mso-level-number-position:left;
	margin-left:399.0pt;
	text-indent:-399.0pt;}
@list l8:level3
	{mso-level-start-at:2014;
	mso-level-text:%1-%2-%3;
	mso-level-tab-stop:399.0pt;
	mso-level-number-position:left;
	margin-left:399.0pt;
	text-indent:-399.0pt;}
@list l8:level4
	{mso-level-text:"%1-%2-%3\.%4";
	mso-level-tab-stop:399.0pt;
	mso-level-number-position:left;
	margin-left:399.0pt;
	text-indent:-399.0pt;}
@list l8:level5
	{mso-level-text:"%1-%2-%3\.%4\.%5";
	mso-level-tab-stop:399.0pt;
	mso-level-number-position:left;
	margin-left:399.0pt;
	text-indent:-399.0pt;}
@list l8:level6
	{mso-level-text:"%1-%2-%3\.%4\.%5\.%6";
	mso-level-tab-stop:399.0pt;
	mso-level-number-position:left;
	margin-left:399.0pt;
	text-indent:-399.0pt;}
@list l8:level7
	{mso-level-text:"%1-%2-%3\.%4\.%5\.%6\.%7";
	mso-level-tab-stop:399.0pt;
	mso-level-number-position:left;
	margin-left:399.0pt;
	text-indent:-399.0pt;}
@list l8:level8
	{mso-level-text:"%1-%2-%3\.%4\.%5\.%6\.%7\.%8";
	mso-level-tab-stop:399.0pt;
	mso-level-number-position:left;
	margin-left:399.0pt;
	text-indent:-399.0pt;}
@list l8:level9
	{mso-level-text:"%1-%2-%3\.%4\.%5\.%6\.%7\.%8\.%9";
	mso-level-tab-stop:399.0pt;
	mso-level-number-position:left;
	margin-left:399.0pt;
	text-indent:-399.0pt;}
@list l9
	{mso-list-id:782849263;
	mso-list-type:hybrid;
	mso-list-template-ids:1203139284 -1832880768 1712776884 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l9:level1
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	mso-ansi-font-weight:bold;
	mso-bidi-font-weight:bold;}
@list l9:level2
	{mso-level-start-at:2;
	mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-fareast-font-family:"Times New Roman";}
@list l9:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l9:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l9:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l9:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l9:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l9:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l9:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l10
	{mso-list-id:916330241;
	mso-list-type:hybrid;
	mso-list-template-ids:1536867988 1007580060 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l10:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.25in;}
@list l10:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:.75in;
	text-indent:-.25in;}
@list l10:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	margin-left:1.25in;
	text-indent:-9.0pt;}
@list l10:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:1.75in;
	text-indent:-.25in;}
@list l10:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.25in;
	text-indent:-.25in;}
@list l10:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	margin-left:2.75in;
	text-indent:-9.0pt;}
@list l10:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:3.25in;
	text-indent:-.25in;}
@list l10:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:3.75in;
	text-indent:-.25in;}
@list l10:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	margin-left:4.25in;
	text-indent:-9.0pt;}
@list l11
	{mso-list-id:954751789;
	mso-list-type:hybrid;
	mso-list-template-ids:1213472776 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l11:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Segoe UI","sans-serif";}
@list l11:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l11:level3
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l11:level4
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l11:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l11:level6
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l11:level7
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l11:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l11:level9
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l12
	{mso-list-id:1023897208;
	mso-list-type:hybrid;
	mso-list-template-ids:-699522860 67698697 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l12:level1
	{mso-level-number-format:bullet;
	mso-level-text:\F076;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l12:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l12:level3
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l12:level4
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l12:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l12:level6
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l12:level7
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l12:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l12:level9
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l13
	{mso-list-id:1264220165;
	mso-list-type:hybrid;
	mso-list-template-ids:-485305024 67698713 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l13:level1
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l13:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l13:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l13:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l13:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l13:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l13:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l13:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l13:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l14
	{mso-list-id:1343817520;
	mso-list-type:hybrid;
	mso-list-template-ids:-106647496 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l14:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Segoe UI","sans-serif";}
@list l14:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l14:level3
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l14:level4
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l14:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l14:level6
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l14:level7
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l14:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l14:level9
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l15
	{mso-list-id:1429540574;
	mso-list-type:hybrid;
	mso-list-template-ids:-113444498 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l15:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Segoe UI","sans-serif";}
@list l15:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l15:level3
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l15:level4
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l15:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l15:level6
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l15:level7
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l15:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l15:level9
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l16
	{mso-list-id:1484128657;
	mso-list-type:hybrid;
	mso-list-template-ids:484359456 1391332658 67698713 67698715 67698703 67698713 67698715 67698703 67698713 67698715;}
@list l16:level1
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:63.0pt;
	text-indent:-.25in;}
@list l16:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:99.0pt;
	text-indent:-.25in;}
@list l16:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	margin-left:135.0pt;
	text-indent:-9.0pt;}
@list l16:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:171.0pt;
	text-indent:-.25in;}
@list l16:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:207.0pt;
	text-indent:-.25in;}
@list l16:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	margin-left:243.0pt;
	text-indent:-9.0pt;}
@list l16:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:279.0pt;
	text-indent:-.25in;}
@list l16:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:315.0pt;
	text-indent:-.25in;}
@list l16:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	margin-left:351.0pt;
	text-indent:-9.0pt;}
@list l17
	{mso-list-id:1518345912;
	mso-list-type:hybrid;
	mso-list-template-ids:1678557098 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l17:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Segoe UI","sans-serif";}
@list l17:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l17:level3
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l17:level4
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l17:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l17:level6
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l17:level7
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l17:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l17:level9
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l18
	{mso-list-id:1577544246;
	mso-list-type:hybrid;
	mso-list-template-ids:-905287692 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l18:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Segoe UI","sans-serif";}
@list l18:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l18:level3
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l18:level4
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l18:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l18:level6
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l18:level7
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l18:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l18:level9
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l19
	{mso-list-id:1670474548;
	mso-list-type:hybrid;
	mso-list-template-ids:45261044 195199762 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l19:level1
	{mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Segoe UI","sans-serif";}
@list l19:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l19:level3
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l19:level4
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l19:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l19:level6
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l19:level7
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Symbol;
	mso-bidi-font-family:Symbol;}
@list l19:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:"Courier New";}
@list l19:level9
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;
	mso-bidi-font-family:Wingdings;}
@list l20
	{mso-list-id:1960256230;
	mso-list-type:hybrid;
	mso-list-template-ids:348699598 67698701 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l20:level1
	{mso-level-number-format:bullet;
	mso-level-text:\F0FC;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	font-family:Wingdings;}
@list l21
	{mso-list-id:1973290062;
	mso-list-template-ids:-1507425740;}
@list l21:level1
	{mso-level-start-at:5;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:19.5pt;
	text-indent:-19.5pt;
	mso-ansi-font-weight:bold;
	mso-bidi-font-weight:bold;}
@list l21:level2
	{mso-level-text:"%1\.%2\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.5in;}
@list l21:level3
	{mso-level-text:"%1\.%2\.%3\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.5in;}
@list l21:level4
	{mso-level-text:"%1\.%2\.%3\.%4\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.25in;
	text-indent:-.75in;}
@list l21:level5
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:2.75in;
	text-indent:-.75in;}
@list l21:level6
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:3.5in;
	text-indent:-1.0in;}
@list l21:level7
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:4.0in;
	text-indent:-1.0in;}
@list l21:level8
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:4.75in;
	text-indent:-1.25in;}
@list l21:level9
	{mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9\.";
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:5.25in;
	text-indent:-1.25in;}
</style>



</head>

</script>
<link rel="stylesheet" type="text/css" href="select2.css">
<link rel="stylesheet" type="text/css" href="demo.css">
<script src="jquery-1.8.0.min.js"></script>
<script src="select2.js"></script>
<script src="myselect.js"></script>

<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script src="date.js"></script>

<script type="text/javascript">
    function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
		var backButton = document.getElementById("back");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
		backButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        //Set the print button to 'visible' again 
        //[Delete this line if you want it to stay hidden after printing]
        printButton.style.visibility = 'visible';
		backButton.style.visibility = 'visible';
    }
</script>
<script type="text/javascript">
function check_uncheck_checkbox(isChecked) {
	if(isChecked) {
		$('input[name="chkDel[]"]').each(function() { 
			this.checked = true; 
		});
	} else {
		$('input[name="chkDel[]"]').each(function() {
			this.checked = false;
		});
	}
}
</script>
<script type="text/javascript">
function check_checkbox(isChecked) {
	if(isChecked) {
		$('input[name="chkstt[]"]').each(function() { 
			this.checked = true; 
		});
	} else {
		$('input[name="chkstt[]"]').each(function() {
			this.checked = false;
		});
	}
}

$('#tbl').find('input:checkbox[id$="chkDelete"]').click(function() {
    var isChecked = $(this).prop("checked");
    var $selectedRow = $(this).parent("td").parent("tr");

    if (isChecked) $selectedRow.css({
        "background-color": "#D4FFAA",
        "color": "GhostWhite"
    });
    else $selectedRow.css({
        "background-color": '',
        "color": "black"
    });
});
</script>
<body>



<?php if($thietbihc1==""&&$them==""&&$lapkh==""&&$savefile==""&&$del==""&&$kehoach=="lapkehoach"&&$delcopy==""){ 
$solan=0;

if(isset($_GET['year'])){
$y=$_GET['year'];
}else{
$y="";
}

if(isset($_GET['copy'])){
$copy=$_GET['copy'];
}

if(isset($_GET['firstyear'])){
$firstyear=$_GET['firstyear'];
}

if(isset($_GET['username'])){
$username=$_GET['username'];
}else{
$username= isset($_POST['username']) ? $_POST['username'] : '';
}

if(isset($_GET['password'])){
$password=$_GET['password'];
}else{
$password= isset($_POST['password']) ? $_POST['password'] : '';
}

?>
<form method="post" action="KehoachKD.php" enctype="multipart/form-data">
<center><b> LẬP KẾ HOẠCH HIỆU CHUẨN/KIỂM ĐỊNH THIẾT BỊ <br/><BR/> NĂM 
<select name="year" style="width:100px;height:30px;border:1px solid black;">
<option value="<?php echo $y; ?>"> <?php echo $y; ?> </option>
<option value="2015"> 2015 </option>
<option value="2016"> 2016 </option>
<option value="2017"> 2017 </option>
<option value="2018"> 2018 </option>
<option value="2019"> 2019 </option>
<option value="2020"> 2020 </option>
<option value="2021"> 2021 </option>
<option value="2022"> 2022 </option>
<option value="2023"> 2023 </option>
<option value="2024"> 2024 </option>
<option value="2025"> 2025 </option>
<option value="2026"> 2026 </option>
<option value="2027"> 2027 </option>
<option value="2028"> 2028 </option>
<option value="2029"> 2029 </option>
<option value="2030"> 2030 </option>
<option value="2031"> 2031 </option>
<option value="2032"> 2032 </option>
<option value="2033"> 2033 </option>
<option value="2034"> 2034 </option>
<option value="2035"> 2035 </option>
<option value="2036"> 2036 </option>
<option value="2037"> 2037 </option>
<option value="2038"> 2038 </option>
<option value="2039"> 2039 </option>
<option value="2040"> 2040 </option>

</select></b></center>
<br/>


<table width="988" class="table1" align="center">
  <tr>
    <td width="35" height="105" bgcolor="#005fbf"><div align="center" class="style17">Stt</div></td>
    <td width="120" bgcolor="#005fbf"><div align="center">
      <p class="style17">Tên thiết bị, mẫu chuẩn/vật chuẩn </p>
    </div></td>
    <td width="150" bgcolor="#005fbf"><div align="center" class="style17">Ký/Mã hiệu </div></td>
    <td width="72" bgcolor="#005fbf"><div align="center" class="style17">Số máy </div></td>
    <td width="80" bgcolor="#005fbf"><div align="center" class="style17">Nước/Hãng SX </div></td>
    <td width="80" bgcolor="#005fbf"><div align="center" class="style17">Nơi thực hiện</div></td>
    <td width="80" bgcolor="#005fbf"><div align="center" class="style17">Tháng Kiểm Định </div></td>
    <td width="70" bgcolor="#005fbf"><div align="center" class="style17">Chủ sở hữu </div></td>
  </tr>
  <?php $i=1;while($i<=10){ ?>
  <tr>
    <td height="41"><center> <?php echo $i; ?> </center></td>
    <td>
	  </td>
    <td>
	 <select name="thietbihc<?php echo $i;?>" style="width:100%;height:30px;border:none;" onChange="this.form.submit()" id="states<?php echo $i;?>">
	<option value=""></option>
	<?php $r1=mysql_query("SELECT DISTINCT tenthietbi FROM thietbihckd_iso ");
		while($row = mysql_fetch_array($r1))
		{
			$tentb=$row['tenthietbi']; ?>
	
	<optgroup style="display:table-row;" label="<?php echo $tentb; ?>">
	 <?php $r4=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE tenthietbi='$tentb'");
		while($row = mysql_fetch_array($r4))
		{
			$mavt =$row['mavattu'];
			$tenvt =$row['tenviettat'];
			$sm=$row['somay'];
			?>
			<option value="<?php echo $mavt; ?>"> <?php echo $tenvt;?>  <?php echo $sm;?> </option>
		<?php }}?> 
		</optgroup>
		</select>
	  </td>
     <td> <input name="somay<?php echo $i; ?>" style="width:100%;border:none;">
	</td>
    <td></td>
    <td width="124"><select name="noithuchien<?php echo $i; ?>" style="width:100%;border:none;">
	<option value=""> </option>
	<option value="TT3"> Trung tâm 3</option>
	<option value="MN"> CT TNHH DV&giám định MN</option>
	<option value="XNKT"> Xí nghiệp Khai thác </option>
	<option value="XNĐVLGK"> Xí nghiệp Địa vật lý GK</option>
	</select></td>
    <td width="2">
	<select name="thangkd<?php echo $i; ?>" style="width:100%;border:none;">
	<option value=""> </option>
	<option value="1"> Tháng 1</option>
	<option value="2"> Tháng 2</option>
	<option value="3"> Tháng 3</option>
	<option value="4"> Tháng 4</option>
	<option value="5"> Tháng 5</option>
	<option value="6"> Tháng 6</option>
	<option value="7"> Tháng 7</option>
	<option value="8"> Tháng 8</option>
	<option value="9"> Tháng 9</option>
	<option value="10"> Tháng 10</option>
	<option value="11"> Tháng 11</option>
	<option value="12"> Tháng 12</option>
	</select>
	</td>
    <td width="2"></td>
  </tr>
 <?php $i++;} ?>
 <tr>
 <td bgcolor="#005fbf"> </td>
 <td bgcolor="#005fbf"> </td>
 <td bgcolor="#005fbf"><div align="center"><a href="danhmucHCKD.php" class="style19" target="_blank"> Thêm thiết bị mới </a></div></td>
 <td bgcolor="#005fbf"> </td>
 <td bgcolor="#005fbf"> </td>
 <td bgcolor="#005fbf"> </td>
 <td bgcolor="#005fbf"> </td>
 <td bgcolor="#005fbf"> </td>
 </tr>
</table>
<br/>
    <input type="image" name="them" value ="Thêm" src="upload/add.jpg" alt="Xem" onClick="this.form.them.value = this.value"/></td>
	<input type=hidden name=them value="">
  <center><input type="image" name="lapkh" value ="Lập kế hoạch" src="upload/kh.jpg" alt="lapkh" /></center>	
<input type=hidden name=copy value="<?php echo $copy;?>">
<input type=hidden name=firstyear value="<?php echo $firstyear;?>">
<input type=hidden name=username value="<?php echo $username;?>">
<input type=hidden name=password value="<?php echo $password;?>">
</form>

<?php } ?>
<?php if($thietbihc1!=""&&$them==""&&$lapkh==""&&$savefile==""&&$del==""){ 

$year = isset($_POST['year']) ? $_POST['year'] : '';

for($i=1;$i<=10+$solan;$i++){
$thietbihc[$i]= isset($_POST["thietbihc$i"]) ? $_POST["thietbihc$i"] : '';
$somay[$i]= isset($_POST["somay$i"]) ? $_POST["somay$i"] : '';
$noithuchien[$i]= isset($_POST["noithuchien$i"]) ? $_POST["noithuchien$i"] : '';
$thangkd[$i]= isset($_POST["thangkd$i"]) ? $_POST["thangkd$i"] : '';
}

$copy = isset($_POST['copy']) ? $_POST['copy'] : '';
$firstyear = isset($_POST['firstyear']) ? $_POST['firstyear'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
?>


<form method="post" action="KehoachKD.php" enctype="multipart/form-data">
<center><b> LẬP KẾ HOẠCH HIỆU CHUẨN/KIỂM ĐỊNH THIẾT BỊ <br/><BR/> NĂM 
<select name="year" style="width:100px;height:30px;border:1px solid black;">
<option value="<?php echo $year; ?>"> <?php echo $year; ?> </option>
<option value="2015"> 2015 </option>
<option value="2016"> 2016 </option>
<option value="2017"> 2017 </option>
<option value="2018"> 2018 </option>
<option value="2019"> 2019 </option>
<option value="2020"> 2020 </option>
<option value="2021"> 2021 </option>
<option value="2022"> 2022 </option>
<option value="2023"> 2023 </option>
<option value="2024"> 2024 </option>
<option value="2025"> 2025 </option>
<option value="2026"> 2026 </option>
<option value="2027"> 2027 </option>
<option value="2028"> 2028 </option>
<option value="2029"> 2029 </option>
<option value="2030"> 2030 </option>
<option value="2031"> 2031 </option>
<option value="2032"> 2032 </option>
<option value="2033"> 2033 </option>
<option value="2034"> 2034 </option>
<option value="2035"> 2035 </option>
<option value="2036"> 2036 </option>
<option value="2037"> 2037 </option>
<option value="2038"> 2038 </option>
<option value="2039"> 2039 </option>
<option value="2040"> 2040 </option>

</select></b></center>
<br/>

<table width="988" class="table1" align="center">
  <tr>
    <td width="35" height="105" bgcolor="#005fbf"><div align="center" class="style17">Stt</div></td>
    <td width="120" bgcolor="#005fbf"><div align="center">
      <p class="style17">Tên thiết bị, mẫu chuẩn/vật chuẩn </p>
    </div></td>
    <td width="150" bgcolor="#005fbf"><div align="center" class="style17">Ký/Mã hiệu </div></td>
    <td width="72" bgcolor="#005fbf"><div align="center" class="style17">Số máy </div></td>
    <td width="80" bgcolor="#005fbf"><div align="center" class="style17">Nước/Hãng SX </div></td>
    <td width="80" bgcolor="#005fbf"><div align="center" class="style17">Nơi thực hiện</div></td>
    <td width="80" bgcolor="#005fbf"><div align="center" class="style17">Tháng Kiểm Định </div></td>
    <td width="70" bgcolor="#005fbf"><div align="center" class="style17">Chủ sở hữu </div></td>
  </tr>
  <?php $i=1;while($i<=10+$solan){ ?>
  <tr>
    <td height="41"><center> <?php echo $i; ?> </center></td>
    <td>
	 <?php if($thietbihc[$i]!=""){
	 $r1=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$thietbihc[$i]'");
		while($row = mysql_fetch_array($r1))
		{
			$ten[$i]=$row['tenthietbi'];
			$somay[$i]=$row['somay'];
			$tenviettat[$i]=$row['tenviettat'];
		}	?>
		<p style="margin-left:10px"><?php echo $ten[$i];  ?>
		<?php } ?>
	  </td>
	<td>  <select name="thietbihc<?php echo $i;?>" style="width:100%;height:30px;border:none;" onChange="this.form.submit()" id="states<?php echo $i;?>">
	<?php  if($thietbihc[$i]!=""){ ?>
	<option value="<?php echo $thietbihc[$i];  ?>"><?php echo $tenviettat[$i];  ?></option>
    <?php }else { ?> <option value=""></option> <?php } ?>
	<?php $r1=mysql_query("SELECT DISTINCT tenthietbi FROM thietbihckd_iso ");
		while($row = mysql_fetch_array($r1))
		{
			$tentb=$row['tenthietbi']; ?>
	
	<optgroup style="display:table-row;" label="<?php echo $tentb; ?>">
	 <?php $r4=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE tenthietbi='$tentb'  ");
		while($row = mysql_fetch_array($r4))
		{
			$mavt =$row['mavattu'];
			$tenvt =$row['tenviettat'];
			$sm=$row['somay'];
			?>
			<option value="<?php echo $mavt; ?>"> <?php echo $tenvt;?>  <?php echo $sm;?> </option>
		<?php }}?> 
		</optgroup>
		</select>
		</td>
	 <td>
	 <input name="somay<?php echo $i;?>" style="width:100%;border:none;text-align:center;" value="<?php echo $somay[$i]; ?>">
	</td>
     <td> <?php if($thietbihc[$i]!=""){
	 $r5=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$thietbihc[$i]'");
		while($row = mysql_fetch_array($r5))
		{
			$hangsx[$i]=$row['hangsx'];
		}	?>
		<center> <?php echo $hangsx[$i];  ?>  </center>
		<?php } ?> </td>
    <td width="124"><select name="noithuchien<?php echo $i; ?>" style="width:100%;border:none;">

	<option value="<?php echo $noithuchien[$i]; ?>"><?php echo $noithuchien[$i]; ?></option>
	<option value="TT3"> Trung tâm 3</option>
	<option value="MN"> CT TNHH DV&giám định MN</option>
	<option value="XNKT"> Xí nghiệp Khai thác </option>
	<option value="XNĐVLGK"> Xí nghiệp Địa vật lý GK</option>
	</select> </td>
    <td ><select name="thangkd<?php echo $i; ?>" style="width:100%;border:none;">
	<?php if($thangkd[$i]!=""){ ?>
	<option value="<?php echo $thangkd[$i]; ?>">Tháng <?php echo $thangkd[$i]; ?> </option>
	<?php }else{ ?>
	<option value=""> </option>
	<?php } ?>
	<option value="1"> Tháng 1</option>
	<option value="2"> Tháng 2</option>
	<option value="3"> Tháng 3</option>
	<option value="4"> Tháng 4</option>
	<option value="5"> Tháng 5</option>
	<option value="6"> Tháng 6</option>
	<option value="7"> Tháng 7</option>
	<option value="8"> Tháng 8</option>
	<option value="9"> Tháng 9</option>
	<option value="10"> Tháng 10</option>
	<option value="11"> Tháng 11</option>
	<option value="12"> Tháng 12</option>
	</select>
	</td>
    <td> 
	
	<?php 
	if($thietbihc[$i]!=""&&$somay[$i]!=""){
	$r5=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$thietbihc[$i]'");
		while($row = mysql_fetch_array($r5))
		{
			$bophan[$i] =$row['bophansh'];
			$chush[$i] =$row['chusohuu'];
		}?>
		<p style="margin-left:10px"> <?php if($bophan[$i]!="XDT"){ echo $bophan[$i]; }else{ echo $chush[$i]; }?> </p>
	<?php } ?>
	</td>
  </tr>
 <?php $i++;} ?>
  <tr>
 <td bgcolor="#005fbf"> </td>
 <td bgcolor="#005fbf"> </td>
 <td bgcolor="#005fbf"><div align="center"><a href="danhmucHCKD.php" class="style19" target="_blank"> Thêm thiết bị mới </a></div></td>
 <td bgcolor="#005fbf"> </td>
 <td bgcolor="#005fbf"> </td>
 <td bgcolor="#005fbf"> </td>
 <td bgcolor="#005fbf"> </td>
 <td bgcolor="#005fbf"> </td>
 </tr>
</table>
<br/>
    <input type="image" name="them" value ="Thêm" src="upload/add.jpg" alt="Xem" onClick="this.form.them.value = this.value"/></td>
	<input type=hidden name=them value="">
	
<input type=hidden name=solan value="<?php echo $solan; ?>">
<br/>
    <center><input type="image" name="lapkh" value ="Lập kế hoạch" src="upload/kh.jpg" alt="Xem" onClick="this.form.lapkh.value = this.value"/>
	<input type=hidden name=lapkh value="">
	<input type=hidden name=copy value="<?php echo $copy;?>">
	<input type=hidden name=firstyear value="<?php echo $firstyear;?>">
	<input type=hidden name=username value="<?php echo $username;?>">
<input type=hidden name=password value="<?php echo $password;?>">
</form>

<?php } ?>

<?php if($them!=""&&$lapkh==""&&$savefile==""&&$del==""){

$solan++;

for($i=1;$i<=10+$solan;$i++){
$thietbihc[$i]= isset($_POST["thietbihc$i"]) ? $_POST["thietbihc$i"] : '';
$somay[$i]= isset($_POST["somay$i"]) ? $_POST["somay$i"] : '';
$noithuchien[$i]= isset($_POST["noithuchien$i"]) ? $_POST["noithuchien$i"] : '';
$thangkd[$i]= isset($_POST["thangkd$i"]) ? $_POST["thangkd$i"] : '';
}

$year = isset($_POST['year']) ? $_POST['year'] : '';
$firstyear = isset($_POST['firstyear']) ? $_POST['firstyear'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
?>


<form method="post" action="KehoachKD.php" enctype="multipart/form-data">
<center><b> LẬP KẾ HOẠCH HIỆU CHUẨN/KIỂM ĐỊNH THIẾT BỊ <br/><BR/> NĂM 
<select name="year" style="width:100px;height:30px;border:1px solid black;">
<option value="<?php echo $year; ?>"> <?php echo $year; ?> </option>
<option value="2015"> 2015 </option>
<option value="2016"> 2016 </option>
<option value="2017"> 2017 </option>
<option value="2018"> 2018 </option>
<option value="2019"> 2019 </option>
<option value="2020"> 2020 </option>
<option value="2021"> 2021 </option>
<option value="2022"> 2022 </option>
<option value="2023"> 2023 </option>
<option value="2024"> 2024 </option>
<option value="2025"> 2025 </option>
<option value="2026"> 2026 </option>
<option value="2027"> 2027 </option>
<option value="2028"> 2028 </option>
<option value="2029"> 2029 </option>
<option value="2030"> 2030 </option>
<option value="2031"> 2031 </option>
<option value="2032"> 2032 </option>
<option value="2033"> 2033 </option>
<option value="2034"> 2034 </option>
<option value="2035"> 2035 </option>
<option value="2036"> 2036 </option>
<option value="2037"> 2037 </option>
<option value="2038"> 2038 </option>
<option value="2039"> 2039 </option>
<option value="2040"> 2040 </option>

</select></b></center>
<br/>

<table width="988" class="table1" align="center">
  <tr>
    <td width="35" height="105" bgcolor="#005fbf"><div align="center" class="style17">Stt</div></td>
    <td width="120" bgcolor="#005fbf"><div align="center">
      <p class="style17">Tên thiết bị, mẫu chuẩn/vật chuẩn </p>
    </div></td>
    <td width="150" bgcolor="#005fbf"><div align="center" class="style17">Ký/Mã hiệu </div></td>
    <td width="72" bgcolor="#005fbf"><div align="center" class="style17">Số máy </div></td>
    <td width="80" bgcolor="#005fbf"><div align="center" class="style17">Nước/Hãng SX </div></td>
    <td width="80" bgcolor="#005fbf"><div align="center" class="style17">Nơi thực hiện</div></td>
    <td width="80" bgcolor="#005fbf"><div align="center" class="style17">Tháng Kiểm Định </div></td>
    <td width="70" bgcolor="#005fbf"><div align="center" class="style17">Chủ sở hữu </div></td>
  </tr>
  <?php $i=1;while($i<=10+$solan){ ?>
  <tr>
    <td height="41"><center> <?php echo $i; ?> </center></td>
    <td>
	 <?php if($thietbihc[$i]!=""){
	 $r1=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$thietbihc[$i]'");
		while($row = mysql_fetch_array($r1))
		{
			$ten[$i]=$row['tenthietbi'];
			$somay[$i]=$row['somay'];
			$tenviettat[$i]=$row['tenviettat'];
		}	?>
		<p style="margin-left:10px"><?php echo $ten[$i];  ?>
		<?php } ?>
	  </td>
	<td> <select name="thietbihc<?php echo $i;?>" style="width:100%;height:30px;border:none;" onChange="this.form.submit()" id="states<?php echo $i;?>">
	<?php  if($thietbihc[$i]!=""){ ?>
	<option value="<?php echo $thietbihc[$i];  ?>"><?php echo $tenviettat[$i];  ?></option>
    <?php }else { ?> <option value=""></option> <?php } ?>
	<?php $r1=mysql_query("SELECT DISTINCT tenthietbi FROM thietbihckd_iso ");
		while($row = mysql_fetch_array($r1))
		{
			$tentb=$row['tenthietbi']; ?>
	
	<optgroup style="display:table-row;" label="<?php echo $tentb; ?>">
	 <?php $r4=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE tenthietbi='$tentb'  ");
		while($row = mysql_fetch_array($r4))
		{
			$mavt =$row['mavattu'];
			$tenvt =$row['tenviettat'];
			$sm=$row['somay'];
			?>
			<option value="<?php echo $mavt; ?>"> <?php echo $tenvt;?>  <?php echo $sm;?> </option>
		<?php }}?> 
		</optgroup>
		</select>
		</td>
	 <td>
	 <input name="somay<?php echo $i;?>" style="width:100%;border:none;text-align:center;" value="<?php echo $somay[$i]; ?>">
	</td>
     <td><?php if($thietbihc[$i]!=""){
	 $r5=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$thietbihc[$i]'");
		while($row = mysql_fetch_array($r5))
		{
			$hangsx[$i]=$row['hangsx'];
		}	?>
		<center><?php echo $hangsx[$i];  ?>  </center>
		<?php } ?>  </td>
    <td width="124"> 
	<select name="noithuchien<?php echo $i; ?>" style="width:100%;border:none;">
	<option value="<?php echo $noithuchien[$i]; ?>"><?php echo $noithuchien[$i]; ?></option>
	<option value="TT3"> Trung tâm 3</option>
	<option value="MN"> CT TNHH DV&giám định MN</option>
	<option value="XNKT"> Xí nghiệp Khai thác </option>
	<option value="XNĐVLGK"> Xí nghiệp Địa vật lý GK</option>
	</select> </td>
    <td><select name="thangkd<?php echo $i; ?>" style="width:100%;border:none;">
	<?php if($thangkd[$i]!=""){ ?>
	<option value="<?php echo $thangkd[$i]; ?>">Tháng <?php echo $thangkd[$i]; ?> </option>
	<?php }else{ ?>
	<option value=""> </option>
	<?php } ?>
	<option value="1"> Tháng 1</option>
	<option value="2"> Tháng 2</option>
	<option value="3"> Tháng 3</option>
	<option value="4"> Tháng 4</option>
	<option value="5"> Tháng 5</option>
	<option value="6"> Tháng 6</option>
	<option value="7"> Tháng 7</option>
	<option value="8"> Tháng 8</option>
	<option value="9"> Tháng 9</option>
	<option value="10"> Tháng 10</option>
	<option value="11"> Tháng 11</option>
	<option value="12"> Tháng 12</option>
	</select>
	</td>
    <td> 
	
	<?php 
	if($thietbihc[$i]!=""){
	$r5=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$thietbihc[$i]'");
		while($row = mysql_fetch_array($r5))
		{
			$bophan[$i] =$row['bophansh'];
			$chush[$i] =$row['chusohuu'];
		}?>
		<p style="margin-left:10px"> <?php if($bophan[$i]!=""){ echo $bophan[$i]; }else{ echo $chush[$i]; } ?> </p>
	<?php } ?>
	</td>
  </tr>
 <?php $i++;} ?>
  <tr>
 <td bgcolor="#005fbf"> </td>
 <td bgcolor="#005fbf"> </td>
 <td bgcolor="#005fbf"><div align="center"><a href="danhmucHCKD.php" class="style19" target="_blank"> Thêm thiết bị mới </a></div></td>
 <td bgcolor="#005fbf"> </td>
 <td bgcolor="#005fbf"> </td>
 <td bgcolor="#005fbf"> </td>
 <td bgcolor="#005fbf"> </td>
 <td bgcolor="#005fbf"> </td>
 </tr>
</table>
<br/>
    <input type="image" name="them" value ="Thêm" src="upload/add.jpg" alt="Xem" onClick="this.form.them.value = this.value"/></td>
	<input type=hidden name=them value="">
	 <br/>
	 
	 <center><input type="image" name="lapkh" value ="Lập kế hoạch" src="upload/kh.jpg" alt="Xem" onClick="this.form.lapkh.value = this.value"/>
	<input type=hidden name=lapkh value="">
	
<input type=hidden name=solan value="<?php echo $solan; ?>">
<input type=hidden name=copy value="<?php echo $copy;?>">
	<input type=hidden name=firstyear value="<?php echo $firstyear;?>">
	<input type=hidden name=username value="<?php echo $username;?>">
<input type=hidden name=password value="<?php echo $password;?>">
</form>

<?php } ?>

<?php if($lapkh!=""&&$savefile=="") {


for($i=1;$i<=10+$solan;$i++){
$thietbihc[$i]= isset($_POST["thietbihc$i"]) ? $_POST["thietbihc$i"] : '';
$somay[$i]= isset($_POST["somay$i"]) ? $_POST["somay$i"] : '';
$noithuchien[$i]= isset($_POST["noithuchien$i"]) ? $_POST["noithuchien$i"] : '';
$thangkd[$i]= isset($_POST["thangkd$i"]) ? $_POST["thangkd$i"] : '';


$r10=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$thietbihc[$i]'");
while($row = mysql_fetch_array($r10))
{
	$tenthietbi[$i] =$row['tenthietbi'];
	$hangsx[$i] =$row['hangsx'];
	$chush[$i] =$row['chusohuu'];
	$loaitb[$i] =$row['loaitb'];
	$bophansh[$i]=$row['bophansh'];
	if($chush[$i]==""){
		$chush[$i]=$bophansh[$i];
	}
}
}

if(isset($_GET['year'])){
$y=$_GET['year'];
}else{
$y = isset($_POST['year']) ? $_POST['year'] : '';
}


if(isset($_GET['copy'])){
$copy=$_GET['copy'];
}else{
$copy= isset($_POST['copy']) ? $_POST['copy'] : '';
}

if(isset($_GET['firstyear'])){
$firstyear=$_GET['firstyear'];
}else{
$firstyear= isset($_POST['firstyear']) ? $_POST['firstyear'] : '';
}

if(isset($_GET['username'])){
$username=$_GET['username'];
}else{
$username= isset($_POST['username']) ? $_POST['username'] : '';
}

if(isset($_GET['password'])){
$password=$_GET['password'];
}else{
$password= isset($_POST['password']) ? $_POST['password'] : '';
}

for($i=1;$i<=10+$solan;$i++){
$check=0;
$r8=mysql_query("SELECT DISTINCT mahieu,thang FROM kehoach_iso where namkh='$y'");
while($row = mysql_fetch_array($r8))
{
	$mahieu=$row['mahieu'];
        $thang=$row['thang'];
	if(($mahieu==$thietbihc[$i])&&($thang==$thankkd[$i])){
		$check=1;
		break;
	}
}
if ($check==0) {
if($thietbihc[$i]!=""){
$insert = "insert into kehoach_iso(
tenthietbi,
mahieu,
somay,
hangsx,
noithuchien,
thang,
namkh,
loaitb,
ghichu
) values (
'$tenthietbi[$i]',
'$thietbihc[$i]',
'$somay[$i]',
'$hangsx[$i]',
'$noithuchien[$i]',
'$thangkd[$i]',
'$y',
'$loaitb[$i]',
'DK'
)" ;
mysql_query($insert) or die(mysql_error());
}
}else {
$update = "update kehoach_iso SET  
tenthietbi='$tenthietbi[$i]',
mahieu='$thietbihc[$i]',
somay='$somay[$i]',
hangsx='$hangsx[$i]',
noithuchien='$noithuchien[$i]',
thang='$thangkd[$i]',
namkh='$y',
loaitb='$loaitb[$i]',
ghichu='DK'
WHERE mahieu='$thietbihc[$i]' and namkh='$y'" ;
mysql_query($update) or die(mysql_error());
}
}

?>
 
<center><b> KẾ HOẠCH HIỆU CHUẨN/KIỂM ĐỊNH THIẾT BỊ THIẾT BỊ;<br/> KIỂM TRA MẪU CHUẨN /VẬT CHUẨN, THIẾT BỊ ĐO LƯỜNG CHUYỂN DỤNG <BR/>XÍ NGHIỆP ĐỊA VẬT LÝ GIẾNG KHOAN <br/> <u>NĂM <?php echo $y;?></u> </b></center>
<br/>
<br/>
<?php if($copy!=""){ ?>
<table >
<tr>
<td> <strong>Sao lưu kế hoạch năm </strong> <select name="firstyear" style="width:100px;height:30px;border:1px solid black;">
<option value="<?php echo $firstyear; ?>"> <?php echo $firstyear; ?> </option>
<option value="2015"> 2015 </option>
<option value="2016"> 2016 </option>
<option value="2017"> 2017 </option>
<option value="2018"> 2018 </option>
<option value="2019"> 2019 </option>
<option value="2020"> 2020 </option>
<option value="2021"> 2021 </option>
<option value="2022"> 2022 </option>
<option value="2023"> 2023 </option>
<option value="2024"> 2024 </option>
<option value="2025"> 2025 </option>
<option value="2026"> 2026 </option>
<option value="2027"> 2027 </option>
<option value="2028"> 2028 </option>
<option value="2029"> 2029 </option>
<option value="2030"> 2030 </option>
<option value="2031"> 2031 </option>
<option value="2032"> 2032 </option>
<option value="2033"> 2033 </option>
<option value="2034"> 2034 </option>
<option value="2035"> 2035 </option>
<option value="2036"> 2036 </option>
<option value="2037"> 2037 </option>
<option value="2038"> 2038 </option>
<option value="2039"> 2039 </option>
<option value="2040"> 2040 </option>
</select>
</td>
<td><strong>sang năm </strong><select name="lastyear" style="width:100px;height:30px;border:1px solid black;">
<option value="<?php echo $y; ?>"> <?php echo $y; ?> </option>
<option value="2015"> 2015 </option>
<option value="2016"> 2016 </option>
<option value="2017"> 2017 </option>
<option value="2018"> 2018 </option>
<option value="2019"> 2019 </option>
<option value="2020"> 2020 </option>
<option value="2021"> 2021 </option>
<option value="2022"> 2022 </option>
<option value="2023"> 2023 </option>
<option value="2024"> 2024 </option>
<option value="2025"> 2025 </option>
<option value="2026"> 2026 </option>
<option value="2027"> 2027 </option>
<option value="2028"> 2028 </option>
<option value="2029"> 2029 </option>
<option value="2030"> 2030 </option>
<option value="2031"> 2031 </option>
<option value="2032"> 2032 </option>
<option value="2033"> 2033 </option>
<option value="2034"> 2034 </option>
<option value="2035"> 2035 </option>
<option value="2036"> 2036 </option>
<option value="2037"> 2037 </option>
<option value="2038"> 2038 </option>
<option value="2039"> 2039 </option>
<option value="2040"> 2040 </option>

</select>
</td>

<td style="margin-right:20px;width:65%" align="right">
<a href="KehoachKD.php?kehoach=lapkehoach&&year=<?php echo $y;?>&&copy=Lập kế hoạch&&firstyear=<?php echo $firstyear; ?>&&username=<?php echo $username; ?>&&password=<?php echo $password; ?>"><img src="upload/themtb.jpg" >	 </a>
</td>
</tr>
</table>

<?php } ?>

<form method="post" action="KehoachKD.php" enctype="multipart/form-data">
<?php 
$r1=mysql_query("select count(*) as sum from kehoach_iso where namkh='$y'");
while($row=mysql_fetch_array($r1)){
	$rows=$row['sum'];
}
$row_per_page=10; //Số dòng trên 1 trang
//tính số dòng cần hiển thị
//$rows=mysql_num_rows($tin);
//tính số trang cần để hiển thị
if ($rows>$row_per_page) $page=ceil($rows/$row_per_page); 
else $page=1; //nếu số dòng trong CSDL nhỏ hơn hoặc bằng số dòng trên 1 trang thì chỉ có 1 trang để hiển thị

if(isset($_GET['start']) && (int)$_GET['start'])
     $start=$_GET['start']; //dòng bắt đầu từ nơi ta muốn lấy
else $start=0;

      
 	  

$sql1=mysql_query("select * from kehoach_iso WHERE namkh='$y' order by thang asc,noithuchien asc  "); //bắt đầu lấy dữ liệu (^)_(^)

?>
 <br/>
  <table width="100%" cellpadding="0" cellspacing="0" class="table1" id="dataTable">
<tr>
<th width="6%" rowspan="2">  </th>
<th width="4%" rowspan="2"> Stt </th>
<th width="10%" rowspan="2">Tên thiết bị,mẫu chuẩn/vật chuẩn </th>
<th width="5%" rowspan="2">Ký/Mã hiệu </th>
<th width="5%" rowspan="2">Số máy </th>
<th width="3%" rowspan="2">Nước/Hãng SX </th>
<th width="10%" rowspan="2">Nơi thực hiện </th>
<th width="7%" colspan="12">THÁNG</th>
<th width="5%" rowspan="2"> Chủ sở hữu</th>
 </tr>
      <tr>
<th width="3%"> 1</th>
<th width="3%"> 2</th>
<th width="3%"> 3</th>
<th width="3%"> 4 </th>
<th width="3%"> 5</th>
<th width="3%"> 6</th>
<th width="3%"> 7</th>
<th width="3%"> 8</th>
<th width="3%"> 9</th>
<th width="3%"> 10</th>
<th width="3%"> 11</th>
<th width="3%"> 12</th>
</tr>
<tr>
<td colspan="19" style="padding-left:10px;background:#CCCCCC;"><b> Thiết bị theo dõi và đo lường, máy bắn mìn, máy kiểm tra kíp mìn, máy đo độ lệch do Liên bang Nga sản xuất </b></td>
</tr>
<?php   $number=$start+1;
	while($row=mysql_fetch_array($sql1)){
	
	$mahieu=$row['mahieu'];
	$sm= $row['somay'];
	$noith= $row['noithuchien'];
	$thang=$row['thang'];
	$tentb =$row['tenthietbi'];
	$hangsanxuat =$row['hangsx'];
	$loaitb =$row['loaitb'];
	$stt =$row['stt'];
	
	$r19=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$mahieu'");
	while($row=mysql_fetch_array($r19)){
		$tenvt1=$row['tenviettat'];
		$chusohuu =$row['chusohuu'];
		$bophansh =$row['bophansh'];
	}
	
    ?>
	 <tr>
	 <td> <input type="checkbox" name="chkDel[]" value="<?php echo $stt; ?>" class="chkDelete">
<input type="submit" name="del" WIDTH=20 HEIGHT=16 BORDER=0 ALT='' style="border:none;background:url(images/del.png) no-repeat;" value="&nbsp;&nbsp;&nbsp;Xóa"></td>
	<td height="76" style="text-align:center;"> <?php echo $number; ?> </td>
	<td style="padding-left:10px;"> <?php echo $tentb; ?></td>
	<td style="padding-left:10px;"> <?php echo $tenvt1; ?></td>
	<td style="padding-left:10px;"><?php echo $sm; ?> </td>
	<td style="text-align:center;"> <?php echo $hangsanxuat; ?></td>
	<td style="padding-left:10px;"> 
	<?php if($noith=="TT3"){
		?><b><font size="-1"><?php echo "Trung tâm 3"; ?></font></b>
	 <?php }elseif($noith=="MN"){
		?><b><font size="-1"><?php echo "CT TNHH DV&giám định MN"; ?></font></b>
	 <?php }elseif($noith=="XNKT"){ ?>
	  <b><?php	echo "Xí nghiệp KT"; ?></b>
	 <?php }elseif($noith=="XNĐVLGK"||$noith=="XSCCMDVL"){?>
	  <b><?php  echo "XNĐVLGK";?></b>
	 <?php } ?>
</td>
<?php 
if($thang==1){ ?>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<?php }elseif($thang==2){?>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<?php  }elseif($thang==3){?>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<?php }elseif($thang==4){?>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<?php }elseif($thang==5){?>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==6){?>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==7){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==8){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==9){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==10){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td  > </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==11){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td> 
<?php }elseif($thang==12){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td> 
<?php } ?>
<td style="padding-left:10px;"> <?php if($bophansh!="XDT"){ echo $bophansh; }else{echo $chusohuu; } ?> </td>
</tr>
   <?php $number++; } ?>

</table>
  <div class="footer" style="border:1px solid #666666;background:#CCCCCC">

<?php
//bắt đầu phân trang

//$page_cr=($start/$row_per_page)+1;

//for($i=1;$i<=$page;$i++)
//{
// if ($page_cr!=$i) echo "<a href='KehoachKD.php?start=".$row_per_page*($i-1)."&&lapkh=Lập kế hoach&&year=$y&&copy=$copy&&firstyear=$firstyear&&username=$username&&password=$password'>$i&nbsp;</a>";
// else echo $i." ";
//}
?>
</div>
<br/>
<label><input type="checkbox" name="checkall" id="checkall" style="margin-left:22px;" onClick="check_uncheck_checkbox(this.checked);"/> <font size="+0">Chọn tất cả</font></label>
<input type="submit" name="del" WIDTH=20 HEIGHT=16 BORDER=0 ALT='' style="border:none;background:url(images/del.png) no-repeat;" value="&nbsp;&nbsp;&nbsp;Xóa">	
<br/>

<table align="center">
<tr>
<td>
<input type="image" name="savefile" value ="SaveFile" src="upload/inkh.jpg" alt="Xem" onClick="this.form.savefile.value = this.value"/>
	<input type=hidden name=savefile value=""> </td>
	<input type=hidden name=year value="<?php echo $y;?>">
	<input type=hidden name=copy value="<?php echo $copy;?>">
	<input type=hidden name=firstyear value="<?php echo $firstyear;?>">
</form>
<form action="index.php" method="post">
<input type=hidden name=username value="<?php echo $username;?>">
<input type=hidden name=password value="<?php echo $password;?>">
  	<td> <input type=hidden name="submit" value="Kế hoạch HC/KD">
 	<input type="image" id="back" src="upload/backkh.jpg" /></td>
   </form>
   </center>
  </tr>
  </table>

<?php } ?>

<?php if($del!=""){ 

if(isset($_GET['year'])){
$y=$_GET['year'];
}else{
$y = isset($_POST['year']) ? $_POST['year'] : '';
}


if(!empty($_POST["chkDel"])){
for($i=0;$i<count($_POST["chkDel"]);$i++)
{
	if($_POST["chkDel"][$i] != "")
	{
		$strSQL = "DELETE FROM kehoach_iso ";
		$strSQL .="WHERE stt = '".$_POST["chkDel"][$i]."' ";
		$objQuery = mysql_query($strSQL);
	} 
}
}
/*}else{
for($i=0;$i<count($_POST["chkDel"]);$i++)
{
	if($_POST["chkDel"][$i] != "")
	{
		$strSQL = "DELETE FROM thietbi_temp ";
		$strSQL .="WHERE mathietbi = '".$_POST["chkDel"][$i]."' ";
		$objQuery = mysql_query($strSQL);
	} 
}*/

if(isset($_GET['number'])){
$number=$_GET['number'];
}

if(isset($_GET['copy'])){
$copy=$_GET['copy'];
}else{
$copy= isset($_POST['copy']) ? $_POST['copy'] : '';
}

if(isset($_GET['firstyear'])){
$firstyear=$_GET['firstyear'];
}else{
$firstyear= isset($_POST['firstyear']) ? $_POST['firstyear'] : '';
}


if(isset($_GET['username'])){
$username=$_GET['username'];
}else{
$username= isset($_POST['username']) ? $_POST['username'] : '';
}

if(isset($_GET['password'])){
$password=$_GET['password'];
}else{
$password= isset($_POST['password']) ? $_POST['password'] : '';
}

?>

<center><b> KẾ HOẠCH HIỆU CHUẨN/KIỂM ĐỊNH THIẾT BỊ THIẾT BỊ;<br/> KIỂM TRA MẪU CHUẨN /VẬT CHUẨN, THIẾT BỊ ĐO LƯỜNG CHUYỂN DỤNG <BR/>XÍ NGHIỆP ĐỊA VẬT LÝ GIẾNG KHOAN <br/> <u>NĂM <?php echo $y;?></u> </b></center>
<br/>
<br/>

<?php if($copy!=""){ ?>
<table >
<tr>
<td> <strong>Sao lưu kế hoạch năm</strong>  <select name="firstyear" style="width:100px;height:30px;border:1px solid black;">
<option value="<?php echo $firstyear; ?>"> <?php echo $firstyear; ?> </option>
<option value="2015"> 2015 </option>
<option value="2016"> 2016 </option>
<option value="2017"> 2017 </option>
<option value="2018"> 2018 </option>
<option value="2019"> 2019 </option>
<option value="2020"> 2020 </option>
<option value="2021"> 2021 </option>
<option value="2022"> 2022 </option>
<option value="2023"> 2023 </option>
<option value="2024"> 2024 </option>
<option value="2025"> 2025 </option>
<option value="2026"> 2026 </option>
<option value="2027"> 2027 </option>
<option value="2028"> 2028 </option>
<option value="2029"> 2029 </option>
<option value="2030"> 2030 </option>
<option value="2031"> 2031 </option>
<option value="2032"> 2032 </option>
<option value="2033"> 2033 </option>
<option value="2034"> 2034 </option>
<option value="2035"> 2035 </option>
<option value="2036"> 2036 </option>
<option value="2037"> 2037 </option>
<option value="2038"> 2038 </option>
<option value="2039"> 2039 </option>
<option value="2040"> 2040 </option>

</select>
</td>
<td><strong>sang năm</strong> <select name="lastyear" style="width:100px;height:30px;border:1px solid black;">
<option value="<?php echo $y; ?>"> <?php echo $y; ?> </option>
<option value="2015"> 2015 </option>
<option value="2016"> 2016 </option>
<option value="2017"> 2017 </option>
<option value="2018"> 2018 </option>
<option value="2019"> 2019 </option>
<option value="2020"> 2020 </option>
<option value="2021"> 2021 </option>
<option value="2022"> 2022 </option>
<option value="2023"> 2023 </option>
<option value="2024"> 2024 </option>
<option value="2025"> 2025 </option>
<option value="2026"> 2026 </option>
<option value="2027"> 2027 </option>
<option value="2028"> 2028 </option>
<option value="2029"> 2029 </option>
<option value="2030"> 2030 </option>
<option value="2031"> 2031 </option>
<option value="2032"> 2032 </option>
<option value="2033"> 2033 </option>
<option value="2034"> 2034 </option>
<option value="2035"> 2035 </option>
<option value="2036"> 2036 </option>
<option value="2037"> 2037 </option>
<option value="2038"> 2038 </option>
<option value="2039"> 2039 </option>
<option value="2040"> 2040 </option>

</select>
</td>

<td style="margin-right:20px;width:65%" align="right">
<a href="KehoachKD.php?kehoach=lapkehoach&&year=<?php echo $y;?>&&copy=Lập kế hoạch&&firstyear=<?php echo $firstyear; ?>&&username=<?php echo $username; ?>&&password=<?php echo $password; ?>"><img src="upload/themtb.jpg" >	 </a>
</td>
</tr>
</table>

<?php } ?>

<form method="post" action="KehoachKD.php" enctype="multipart/form-data">
<?php 
$r1=mysql_query("select count(*)as sum from kehoach_iso where namkh='$y'");
while($row=mysql_fetch_array($r1)){
	$rows=$row['sum'];
}
$row_per_page=10; //Số dòng trên 1 trang
//tính số dòng cần hiển thị
//$rows=mysql_num_rows($tin);
//tính số trang cần để hiển thị
if ($rows>$row_per_page) $page=ceil($rows/$row_per_page); 
else $page=1; //nếu số dòng trong CSDL nhỏ hơn hoặc bằng số dòng trên 1 trang thì chỉ có 1 trang để hiển thị

if(isset($_GET['start']) && (int)$_GET['start'])
     $start=$_GET['start']; //dòng bắt đầu từ nơi ta muốn lấy
else $start=0;

      

$sql1=mysql_query("select * from kehoach_iso WHERE namkh='$y' order by thang asc,noithuchien asc"); //bắt đầu lấy dữ liệu (^)_(^)

?>

 <br/>
  <table width="100%" cellpadding="0" cellspacing="0" class="table1" id="dataTable">
<tr>
<th width="6%" rowspan="2">  </th>
<th width="4%" rowspan="2"> Stt </th>
<th width="10%" rowspan="2">Tên thiết bị,mẫu chuẩn/vật chuẩn </th>
<th width="5%" rowspan="2">Ký/Mã hiệu </th>
<th width="5%" rowspan="2">Số máy </th>
<th width="3%" rowspan="2">Nước/Hãng SX </th>
<th width="10%" rowspan="2">Nơi thực hiện </th>
<th width="7%" colspan="12">THÁNG</th>
<th width="5%" rowspan="2"> Chủ sở hữu</th>
 </tr>
      <tr>
<th width="3%"> 1</th>
<th width="3%"> 2</th>
<th width="3%"> 3</th>
<th width="3%"> 4 </th>
<th width="3%"> 5</th>
<th width="3%"> 6</th>
<th width="3%"> 7</th>
<th width="3%"> 8</th>
<th width="3%"> 9</th>
<th width="3%"> 10</th>
<th width="3%"> 11</th>
<th width="3%"> 12</th>
</tr>
<tr>
<td colspan="19" style="padding-left:10px;background:#CCCCCC;"><b> Thiết bị theo dõi và đo lường, máy bắn mìn, máy kiểm tra kíp mìn, máy đo độ lệch do Liên bang Nga sản xuất </b></td>
</tr>
<?php  $number=$start+1;
	while($row=mysql_fetch_array($sql1)){
	
	$mahieu=$row['mahieu'];
	$sm= $row['somay'];
	$noith= $row['noithuchien'];
	$thang=$row['thang'];
	$tentb =$row['tenthietbi'];
	$hangsanxuat =$row['hangsx'];
	$loaitb =$row['loaitb'];
	$stt =$row['stt'];
	
	$r19=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$mahieu'");
	while($row=mysql_fetch_array($r19)){
		$tenvt1=$row['tenviettat'];
		$chusohuu =$row['chusohuu'];
		$bophansh =$row['bophansh'];
	}
	
	
   ?>
			

	 <tr>
	 <td> <input type="checkbox" name="chkDel[]" value="<?php echo $stt; ?>" class="chkDelete">
<input type="submit" name="del" WIDTH=20 HEIGHT=16 BORDER=0 ALT='' style="border:none;background:url(images/del.png) no-repeat;" value="&nbsp;&nbsp;&nbsp;Xóa"></td>
	<td height="76" style="text-align:center;"> <?php echo $number; ?> </td>
	<td style="padding-left:10px;"> <?php echo $tentb; ?></td>
	<td style="padding-left:10px;"> <?php echo $tenvt1; ?></td>
	<td style="padding-left:10px;"><?php echo $sm; ?> </td>
	<td style="text-align:center;"> <?php echo $hangsanxuat; ?></td>
	<td style="padding-left:10px;"> 
	<?php if($noith=="TT3"){
		?><b><font size="-1"><?php echo "Trung tâm 3"; ?></font></b>
	 <?php }elseif($noith=="MN"){
		?><b><font size="-1"><?php echo "CT TNHH DV&giám định MN"; ?></font></b>
	 <?php }elseif($noith=="XNKT"){ ?>
	  <b><?php	echo "Xí nghiệp KT"; ?></b>
	 <?php }elseif($noith=="XNĐVLGK"){?>
	  <b><?php  echo "XNĐVLGK";?></b>
	 <?php } ?>
</td>
<?php 
if($thang==1){ ?>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<?php }elseif($thang==2){?>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<?php  }elseif($thang==3){?>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<?php }elseif($thang==4){?>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<?php }elseif($thang==5){?>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==6){?>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==7){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==8){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==9){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==10){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==11){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td> 
<?php }elseif($thang==12){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td> 
<?php } ?>
<td style="padding-left:10px;"><?php if($bophansh!="XDT"){ echo $bophansh; }else{ echo $chusohuu; } ?> </td>
</tr>
   <?php $number++; } ?>

</table>
  <div class="footer" style="border:1px solid #666666;background:#CCCCCC">
<?php
//bắt đầu phân trang
/*
$page_cr=($start/$row_per_page)+1;

for($i=1;$i<=$page;$i++)
{
 if ($page_cr!=$i) echo "<a href='KehoachKD.php?start=".$row_per_page*($i-1)."&&lapkh=Lập kế hoach&&year=$y&&copy=$copy&&firstyear=$firstyear&&username=$username&&password=$password'>$i&nbsp;</a>";
 else echo $i." ";
}*/
?>
</div>
<br/>
<label><input type="checkbox" name="checkall" id="checkall" style="margin-left:22px;" onClick="check_uncheck_checkbox(this.checked);"/> <font size="+0">Chọn tất cả</font>
<input type="submit" name="del" WIDTH=20 HEIGHT=16 BORDER=0 ALT='' style="border:none;background:url(images/del.png) no-repeat;" value="&nbsp;&nbsp;&nbsp;Xóa">
</label>	
<br/>

<table align="center">
<tr>
<td>
<input type="image" name="savefile" value ="SaveFile" src="upload/inkh.jpg" alt="Xem" onClick="this.form.savefile.value = this.value"/>
	<input type=hidden name=savefile value=""> </td>
	<input type=hidden name=year value="<?php echo $y; ?>">
	<input type=hidden name=copy value="<?php echo $copy; ?>">
	<input type=hidden name=firstyear value="<?php echo $firstyear; ?>">
</form>
<form action="index.php" method="post">
   <input type=hidden name=username value="<?php echo $username;?>">
    <input type=hidden name=password value="<?php echo $password;?>">
  	<td> <input type=hidden name="submit" value="Kế hoạch HC/KD">
 	<input type="image" id="back" src="upload/backkh.jpg" /></td>
   </form>
   </center>
  </tr>
  </table>

<?php } ?>


<?php if($savefile!=""&&$delcopy==""){ 

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$y = isset($_POST['year']) ? $_POST['year'] : '';



$r11=mysql_query("SELECT count(*) as sum FROM kehoach_iso WHERE namkh='$y' ");
while($row = mysql_fetch_array($r11))
{
	
	$sum=$row['sum'];
}

?>

<table>
<tr>
<td><img
width=118 height=88 src="images/logo.jpg" alt="Logo DVL" v:shapes="_x0000_s1042"></span> </td>
<td>
<center><b> KẾ HOẠCH HIỆU CHUẨN/KIỂM ĐỊNH THIẾT BỊ THIẾT BỊ;<br/> KIỂM TRA MẪU CHUẨN /VẬT CHUẨN, THIẾT BỊ ĐO LƯỜNG CHUYỂN DỤNG <BR/>XÍ NGHIỆP ĐỊA VẬT LÝ GIẾNG KHOAN <br/> <u>NĂM <?php echo $y;?></u> </b></center>
</td>
</tr>
</table>

<center><p style="font-size:16px;"><b>Phê duyệt<br/>Giám đốc XN Địa vật lý giếng khoan <br/><br/><br/> Ngày ____ tháng ____ năm  </b></center></font>

<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
 style='margin-left:5.4pt;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0in 5.4pt 0in 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=48 rowspan=2 valign=top style='width:.5in;border:solid windowtext 1.0pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span lang=NL
  style='font-size:11.0pt;font-family:"Times New Roman","serif";mso-ansi-language:
  NL'><o:p>&nbsp;</o:p></span></b></p>
  <p class=MsoNormal align=center style='text-align:center'><b><span lang=NL
  style='font-size:11.0pt;font-family:"Times New Roman","serif";mso-ansi-language:
  NL'>Stt<o:p></o:p></span></b></p>
  <p class=MsoNormal align=center style='text-align:center'><b><span lang=NL
  style='font-size:11.0pt;font-family:"Times New Roman","serif";mso-ansi-language:
  NL'><span style='mso-spacerun:yes'> </span><o:p></o:p></span></b></p>
  </td>
  <td width=144 rowspan=2 valign=top style='width:1.5in;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><b><span lang=NL style='font-size:12.0pt;font-family:"Times New Roman","serif";
  mso-ansi-language:NL'>Tên thi&#7871;t b&#7883;, m&#7851;u chu&#7849;n
  /v&#7853;t chu&#7849;n<o:p></o:p></span></b></p>
  </td>
  <td width=96 rowspan=2 valign=top style='width:1.0in;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span lang=NL
  style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-ansi-language:
  NL'><o:p>&nbsp;</o:p></span></b></p>
  <p class=MsoNormal align=center style='text-align:center'><b><span lang=NL
  style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-ansi-language:
  NL'>Ký/Mã hi&#7879;u<o:p></o:p></span></b></p>
  </td>
  <td width=84 rowspan=2 valign=top style='width:63.0pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span lang=NL
  style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-ansi-language:
  NL'><o:p>&nbsp;</o:p></span></b></p>
  <p class=MsoNormal align=center style='text-align:center'><b><span lang=NL
  style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-ansi-language:
  NL'>S&#7889; máy<o:p></o:p></span></b></p>
  </td>
  <td width=72 rowspan=2 valign=top style='width:.75in;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span lang=NL
  style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-ansi-language:
  NL'>N&#432;&#7899;c/ Hãng<o:p></o:p></span></b></p>
  <p class=MsoNormal align=center style='text-align:center'><b><span lang=NL
  style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-ansi-language:
  NL'>SX<o:p></o:p></span></b></p>
  </td>
  <td width=108 rowspan=2 valign=top style='width:81.0pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span lang=NL
  style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-ansi-language:
  NL'><o:p>&nbsp;</o:p></span></b></p>
  <p class=MsoNormal align=center style='text-align:center'><b><span lang=NL
  style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-ansi-language:
  NL'>N&#417;i th&#7921;c hi&#7879;n<o:p></o:p></span></b></p>
  <p class=MsoNormal><b><span lang=NL style='font-size:12.0pt;font-family:"Times New Roman","serif";
  mso-ansi-language:NL'><o:p>&nbsp;</o:p></span></b></p>
  </td>
  <td width=432 colspan=12 valign=top style='width:4.5in;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span lang=NL
  style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-ansi-language:
  NL'>THÁNG<o:p></o:p></span></b></p>
  </td>
  <td width=96 rowspan=2 valign=top style='width:1.0in;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span lang=NL
  style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-ansi-language:
  NL'><o:p>&nbsp;</o:p></span></b></p>
  <p class=MsoNormal align=center style='text-align:center'><b><span lang=NL
  style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-ansi-language:
  NL'>Ch&#7911; s&#7903; h&#7919;u<o:p></o:p></span></b></p>
  <p class=MsoNormal align=center style='text-align:center'><b><span lang=NL
  style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-ansi-language:
  NL'><span style='mso-spacerun:yes'> </span><o:p></o:p></span></b></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1'>
  <td width=36 valign=top style='width:27.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span lang=NL
  style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-ansi-language:
  NL'>1<o:p></o:p></span></b></p>
  </td>
  <td width=36 valign=top style='width:27.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span lang=NL
  style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-ansi-language:
  NL'>2<o:p></o:p></span></b></p>
  </td>
  <td width=36 valign=top style='width:27.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span lang=NL
  style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-ansi-language:
  NL'>3<o:p></o:p></span></b></p>
  </td>
  <td width=36 valign=top style='width:27.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span lang=NL
  style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-ansi-language:
  NL'>4<o:p></o:p></span></b></p>
  </td>
  <td width=36 valign=top style='width:27.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span lang=NL
  style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-ansi-language:
  NL'>5<o:p></o:p></span></b></p>
  </td>
  <td width=36 valign=top style='width:27.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span lang=NL
  style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-ansi-language:
  NL'>6<o:p></o:p></span></b></p>
  </td>
  <td width=36 valign=top style='width:27.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span lang=NL
  style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-ansi-language:
  NL'>7<o:p></o:p></span></b></p>
  </td>
  <td width=36 valign=top style='width:27.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span lang=NL
  style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-ansi-language:
  NL'>8<o:p></o:p></span></b></p>
  </td>
  <td width=36 valign=top style='width:27.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span lang=NL
  style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-ansi-language:
  NL'>9<o:p></o:p></span></b></p>
  </td>
  <td width=36 valign=top style='width:27.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span lang=NL
  style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-ansi-language:
  NL'>10<o:p></o:p></span></b></p>
  </td>
  <td width=36 valign=top style='width:27.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span lang=NL
  style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-ansi-language:
  NL'>11<o:p></o:p></span></b></p>
  </td>
  <td width=36 valign=top style='width:27.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span lang=NL
  style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-ansi-language:
  NL'>12<o:p></o:p></span></b></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2'>
  <td width=1080 colspan=19 valign=top style='width:11.25in;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><b><span lang=NL style='font-size:12.0pt;font-family:"Times New Roman","serif";
  mso-ansi-language:NL'>Thi&#7871;t b&#7883; theo dõi và &#273;o
  l&#432;&#7901;ng, máy b&#7855;n mìn, máy ki&#7875;m tra kíp mìn, máy &#273;o
  &#273;&#7897; l&#7879;ch do Liên bang Nga s&#7843;n xu&#7845;t<o:p></o:p></span></b></p>
  </td>
 </tr>
 <?php 


  $stt=1;
  $r12=mysql_query("SELECT DISTINCT * FROM kehoach_iso WHERE namkh='$y' ORDER BY thang");
  while($row = mysql_fetch_array($r12))
  {

	$tenthietbi =$row['tenthietbi'];	
	$mahieu=$row['mahieu'];
	$somay= $row['somay'];
	$noithuchien= $row['noithuchien'];
	$thangkd=$row['thang'];
	$hangsx =$row['hangsx'];
	$loaitb =$row['loaitb'];
       
	$r15=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$mahieu'");
        while($row = mysql_fetch_array($r15))
 	{
		$tenviettat =$row['tenviettat']; 
		$bophansh =$row['bophansh']; 
		$chush =$row['chusohuu']; 
	}
	$r16=mysql_query("SELECT * FROM donvi_iso WHERE madv='$bophansh'");
        while($row = mysql_fetch_array($r16))
 	{
		$tendv =$row['tendv']; 
	}
?>
 <tr style='mso-yfti-irow:3'>
  <td width=48 valign=top style='width:.5in;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:102.0pt'><span
  lang=NL style='font-size:12.0pt;font-family:"Times New Roman","serif";
  mso-ansi-language:NL'></span><?php echo $stt; ?><o:p></o:p></span></p>
  </td>
  <td width=144 valign=top style='width:1.5in;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='tab-stops:102.0pt'><span lang=NL style='font-size:
  12.0pt;font-family:"Times New Roman","serif";mso-ansi-language:NL'><?php echo $tenthietbi; ?><o:p></o:p></span></p>
  </td>
  <td width=96 valign=top style='width:1.0in;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='tab-stops:102.0pt'><span lang=NL style='font-size:
  12.0pt;font-family:"Times New Roman","serif";mso-ansi-language:NL'><?php echo $tenviettat; ?><o:p></o:p></span></p>
  </td>
  <td width=84 valign=top style='width:63.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='tab-stops:102.0pt'><span lang=NL style='font-size:
  12.0pt;font-family:"Times New Roman","serif";mso-ansi-language:NL'><?php echo $somay; ?><o:p></o:p></span></p>
  </td>
  <td width=72 valign=top style='width:.75in;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='tab-stops:102.0pt'><st1:country-region w:st="on"><st1:place
   w:st="on"><span lang=NL style='font-size:12.0pt;font-family:"Times New Roman","serif";
    mso-ansi-language:NL'><?php echo $hangsx; ?></span></st1:place></st1:country-region><span
  lang=NL style='font-size:12.0pt;font-family:"Times New Roman","serif";
  mso-ansi-language:NL'><o:p></o:p></span></p>
  </td>
 
  <td width=108 valign=top style='width:81.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span lang=NL
  style='font-size:10.0pt;font-family:"Times New Roman","serif";mso-ansi-language:
  NL'> <?php if($noithuchien=="TT3"){
		?><b><font size="-1"><?php echo "Trung tâm 3"; ?></font></b>
	 <?php }elseif($noithuchien=="MN"){
		?><b><font size="-1"><?php echo "CT TNHH DV&giám định MN"; ?></font></b>
	 <?php }elseif($noithuchien=="XNKT"){ ?>
	  <b><?php	echo "Xí nghiệp KT"; ?></b>
	 <?php }elseif($noithuchien=="XNĐVLGK"||$noithuchien=="XSCCMDVL"){?>
	  <b><?php  echo "XNĐVLGK";?></b>
	 <?php } ?> <b style='mso-bidi-font-weight:normal'><span
  lang=NL style='font-size:10.0pt;mso-ansi-language:NL'><o:p></o:p></span></b></p>
  </td>
  <?php 
if($thangkd==1){ ?>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<?php }elseif($thangkd==2){?>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<?php  }elseif($thangkd==3){?>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<?php }elseif($thangkd==4){?>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<?php }elseif($thangkd==5){?>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thangkd==6){?>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thangkd==7){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thangkd==8){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thangkd==9){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thangkd==10){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td  > </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td> 
<?php }elseif($thangkd==11){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td> 
<?php }elseif($thangkd==12){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td> 
<?php } ?>

  
  <td width=96 valign=top style='width:1.0in;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='tab-stops:102.0pt'><span lang=NL style='font-size:
  11.0pt;font-family:"Times New Roman","serif";mso-ansi-language:NL'><?php if($bophansh!="XDT"){ echo $tendv;   }else{ echo $chush ;} ?><o:p></o:p></span></p>
  </td>
 </tr>
 <?php $stt++;} ?>



<?php 
header("Content-Type: application/msword");
header("Content-Disposition:attchment;filename=\"$y-HCKD.doc\""); 
header("Pragma: no-cache");
header("Expires: 0");
exit;
} ?>


<?php if($kehoach=="copykehoach"){ 
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
?>

<form method="post" action="KehoachKD.php" enctype="multipart/form-data">
<center><b> KẾ HOẠCH HIỆU CHUẨN/KIỂM ĐỊNH THIẾT BỊ THIẾT BỊ;<br/> KIỂM TRA MẪU CHUẨN /VẬT CHUẨN, THIẾT BỊ ĐO LƯỜNG CHUYỂN DỤNG <BR/>XÍ NGHIỆP ĐỊA VẬT LÝ GIẾNG KHOAN <br/> <br/></center>

<table>
<tr>
<td> <strong>Sao lưu kế hoạch năm </strong> <select name="firstyear" style="width:100px;height:30px;border:1px solid black;">
<option value="2015"> 2015 </option>
<option value="2016"> 2016 </option>
<option value="2017"> 2017 </option>
<option value="2018"> 2018 </option>
<option value="2019"> 2019 </option>
<option value="2020"> 2020 </option>
<option value="2021"> 2021 </option>
<option value="2022"> 2022 </option>
<option value="2023"> 2023 </option>
<option value="2024"> 2024 </option>
<option value="2025"> 2025 </option>
<option value="2026"> 2026 </option>
<option value="2027"> 2027 </option>
<option value="2028"> 2028 </option>
<option value="2029"> 2029 </option>
<option value="2030"> 2030 </option>
<option value="2031"> 2031 </option>
<option value="2032"> 2032 </option>
<option value="2033"> 2033 </option>
<option value="2034"> 2034 </option>
<option value="2035"> 2035 </option>
<option value="2036"> 2036 </option>
<option value="2037"> 2037 </option>
<option value="2038"> 2038 </option>
<option value="2039"> 2039 </option>
<option value="2040"> 2040 </option>

</select>
</td>
<td><strong>sang năm</strong> <select name="lastyear" style="width:100px;height:30px;border:1px solid black;">
<option value="2015"> 2015 </option>
<option value="2016"> 2016 </option>
<option value="2017"> 2017 </option>
<option value="2018"> 2018 </option>
<option value="2019"> 2019 </option>
<option value="2020"> 2020 </option>
<option value="2021"> 2021 </option>
<option value="2022"> 2022 </option>
<option value="2023"> 2023 </option>
<option value="2024"> 2024 </option>
<option value="2025"> 2025 </option>
<option value="2026"> 2026 </option>
<option value="2027"> 2027 </option>
<option value="2028"> 2028 </option>
<option value="2029"> 2029 </option>
<option value="2030"> 2030 </option>
<option value="2031"> 2031 </option>
<option value="2032"> 2032 </option>
<option value="2033"> 2033 </option>
<option value="2034"> 2034 </option>
<option value="2035"> 2035 </option>
<option value="2036"> 2036 </option>
<option value="2037"> 2037 </option>
<option value="2038"> 2038 </option>
<option value="2039"> 2039 </option>
<option value="2040"> 2040 </option>

</select>
</td>
<td><input type="image" name="copy" value ="Lập kế hoạch" src="upload/kh.jpg" alt="copy" onClick="this.form.copy.value = this.value"/>
	<input type=hidden name=copy value=""></td>
</tr>
</table>
<input type=hidden name=username value="<?php echo $username;?>">
<input type=hidden name=password value="<?php echo $password;?>">
</form>
<?php } ?>

<?php if($copy!=""&&$kehoach==""&&$them==""&&$thietbihc1==""&&$del==""&&$lapkh=="") {
if(isset($_GET['username'])){
$username=$_GET['username'];
}else{
$username= isset($_POST['username']) ? $_POST['username'] : '';
}

if(isset($_GET['password'])){
$password=$_GET['password'];
}else{
$password= isset($_POST['password']) ? $_POST['password'] : '';
}
if(isset($_GET['lastyear'])){
$lastyear=$_GET['lastyear'];
}else{
$lastyear = isset($_POST['lastyear']) ? $_POST['lastyear'] : '';
}
if(isset($_GET['firstyear'])){
$firstyear=$_GET['firstyear'];
}else{
$firstyear = isset($_POST['firstyear']) ? $_POST['firstyear'] : '';
}

?>


<center><b> KẾ HOẠCH HIỆU CHUẨN/KIỂM ĐỊNH THIẾT BỊ THIẾT BỊ;<br/> KIỂM TRA MẪU CHUẨN /VẬT CHUẨN, THIẾT BỊ ĐO LƯỜNG CHUYỂN DỤNG <BR/>XÍ NGHIỆP ĐỊA VẬT LÝ GIẾNG KHOAN <br/> <br/></center>

<table >
<tr>
<td> <strong>Sao lưu kế hoạch năm</strong>  <select name="firstyear" style="width:100px;height:30px;border:1px solid black;">
<option value="<?php echo $firstyear; ?>"> <?php echo $firstyear; ?> </option>
<option value="2015"> 2015 </option>
<option value="2016"> 2016 </option>
<option value="2017"> 2017 </option>
<option value="2018"> 2018 </option>
<option value="2019"> 2019 </option>
<option value="2020"> 2020 </option>
<option value="2021"> 2021 </option>
<option value="2022"> 2022 </option>
<option value="2023"> 2023 </option>
<option value="2024"> 2024 </option>
<option value="2025"> 2025 </option>
<option value="2026"> 2026 </option>
<option value="2027"> 2027 </option>
<option value="2028"> 2028 </option>
<option value="2029"> 2029 </option>
<option value="2030"> 2030 </option>
<option value="2031"> 2031 </option>
<option value="2032"> 2032 </option>
<option value="2033"> 2033 </option>
<option value="2034"> 2034 </option>
<option value="2035"> 2035 </option>
<option value="2036"> 2036 </option>
<option value="2037"> 2037 </option>
<option value="2038"> 2038 </option>
<option value="2039"> 2039 </option>
<option value="2040"> 2040 </option>

</select>
</td>
<td><strong>sang năm</strong> <select name="lastyear" style="width:100px;height:30px;border:1px solid black;">
<option value="<?php echo $lastyear; ?>"> <?php echo $lastyear; ?> </option>
<option value="2015"> 2015 </option>
<option value="2016"> 2016 </option>
<option value="2017"> 2017 </option>
<option value="2018"> 2018 </option>
<option value="2019"> 2019 </option>
<option value="2020"> 2020 </option>
<option value="2021"> 2021 </option>
<option value="2022"> 2022 </option>
<option value="2023"> 2023 </option>
<option value="2024"> 2024 </option>
<option value="2025"> 2025 </option>
<option value="2026"> 2026 </option>
<option value="2027"> 2027 </option>
<option value="2028"> 2028 </option>
<option value="2029"> 2029 </option>
<option value="2030"> 2030 </option>
<option value="2031"> 2031 </option>
<option value="2032"> 2032 </option>
<option value="2033"> 2033 </option>
<option value="2034"> 2034 </option>
<option value="2035"> 2035 </option>
<option value="2036"> 2036 </option>
<option value="2037"> 2037 </option>
<option value="2038"> 2038 </option>
<option value="2039"> 2039 </option>
<option value="2040"> 2040 </option>

</select>
</td>

<td style="margin-right:20px;width:65%" align="right">
<a href="KehoachKD.php?kehoach=lapkehoach&&year=<?php echo $lastyear;?>&&copy=Lập kế hoạch&&firstyear=<?php echo $firstyear; ?>&&username=<?php echo $username; ?>&&password=<?php echo $password; ?>"><img src="upload/themtb.jpg" >	 </a>
</td>
</tr>
</table>
<input type=hidden name=username value="<?php echo $username;?>">
<input type=hidden name=password value="<?php echo $password;?>">

</form>

<?php 

$check=0;
$r19=mysql_query("SELECT DISTINCT * FROM kehoach_iso WHERE namkh='$firstyear'");
while($row=mysql_fetch_array($r19)){
$mahieu=$row['mahieu'];
$r20=mysql_query("SELECT DISTINCT * FROM kehoach_iso WHERE namkh='$lastyear'");
while($row=mysql_fetch_array($r20)){
$mahieulast=$row['mahieu'];
if($mahieulast==$mahieu){
	$check=1;
}
}
}

 

if($check==0){
/*$r21=mysql_query("SELECT DISTINCT * FROM kehoach_iso WHERE namkh='$firstyear'");
while($row=mysql_fetch_array($r21)){

$tenthietbi=$row['tenthietbi'];
$mahieu=$row['mahieu'];
$somay=$row['somay'];
$hangsx=$row['hangsx'];
$noithuchien=$row['noithuchien'];
$thang=$row['thang'];
$loaitb=$row['loaitb'];
 */
$r22=mysql_query("SELECT DISTINCT * FROM hosohckd_iso WHERE namkh='$firstyear'");
while($row=mysql_fetch_array($r22)){

$ttkt=$row['ttkt'];
$mahieu=$row['tenmay'];
//$somay=$row['somay'];
//$hangsx=$row['hangsx'];
$noithuchien=$row['noithuchien'];
$ngayhc=$row['ngayhc'];
//$loaitb=$row['loaitb'];

if($ttkt=="Tốt"){
$ngaystemp = $ngayhc;
for ($i=0;$i<=strlen($ngaystemp);$i++) {
	$p = stripos($ngaystemp,"-") ;

if ($i==0) {
	$ngays = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i==1) {
	$thangs = trim (substr($ngaystemp,0,$p)) ;
} 	
if ($i==2) {
	$nams = trim ($ngaystemp) ;
} 	
$p++ ;
$ngaystemp = substr($ngaystemp,$p);
}

$r21=mysql_query("SELECT * FROM thietbihckd_iso WHERE mavattu='$mahieu'");
while($row=mysql_fetch_array($r21)){
	$tenthietbi=$row['tenthietbi'];
	$somay=$row['somay'];
	$hangsx=$row['hangsx'];
	$loaitb=$row['loaitb'];

}

$insert = "insert into kehoach_iso(
tenthietbi,
mahieu,
somay,
hangsx,
noithuchien,
thang,
namkh,
loaitb,
ghichu
) values (
'$tenthietbi',
'$mahieu',
'$somay',
'$hangsx',
'$noithuchien',
'$thangs',
'$lastyear',
'$loaitb',
'DK'
)" ;
mysql_query($insert) or die(mysql_error());
}
}
/*} */
}

$r1=mysql_query("select count(*)as sum from kehoach_iso where namkh='$lastyear'");
while($row=mysql_fetch_array($r1)){
	$rows=$row['sum'];
}
$row_per_page=10; //Số dòng trên 1 trang
//tính số dòng cần hiển thị
//$rows=mysql_num_rows($tin);
//tính số trang cần để hiển thị
if ($rows>$row_per_page) $page=ceil($rows/$row_per_page); 
else $page=1; //nếu số dòng trong CSDL nhỏ hơn hoặc bằng số dòng trên 1 trang thì chỉ có 1 trang để hiển thị

if(isset($_GET['start']) && (int)$_GET['start'])
     $start=$_GET['start']; //dòng bắt đầu từ nơi ta muốn lấy
else $start=0;

      
 	  

$sql1=mysql_query("select * from kehoach_iso WHERE namkh='$lastyear' and (loaitb=1 or loaitb=2 or loaitb=3 or loaitb=4) order by stt asc limit $start,$row_per_page "); //bắt đầu lấy dữ liệu (^)_(^)

?>
 <br/>
 <form method="post" action="KehoachKD.php" enctype="multipart/form-data">
  <table width="100%" cellpadding="0" cellspacing="0" class="table1" id="dataTable">
<tr>
<th width="6%" rowspan="2">  </th>
<th width="4%" rowspan="2"> Stt </th>
<th width="10%" rowspan="2">Tên thiết bị,mẫu chuẩn/vật chuẩn </th>
<th width="5%" rowspan="2">Ký/Mã hiệu </th>
<th width="5%" rowspan="2">Số máy </th>
<th width="3%" rowspan="2">Nước/Hãng SX </th>
<th width="10%" rowspan="2">Nơi thực hiện </th>
<th width="7%" colspan="12">THÁNG</th>
<th width="5%" rowspan="2"> Chủ sở hữu</th>
 </tr>
      <tr>
<th width="3%"> 1</th>
<th width="3%"> 2</th>
<th width="3%"> 3</th>
<th width="3%"> 4 </th>
<th width="3%"> 5</th>
<th width="3%"> 6</th>
<th width="3%"> 7</th>
<th width="3%"> 8</th>
<th width="3%"> 9</th>
<th width="3%"> 10</th>
<th width="3%"> 11</th>
<th width="3%"> 12</th>
</tr>
<tr>
<td colspan="19" style="padding-left:10px;background:#CCCCCC;"><b> Thiết bị theo dõi và đo lường, máy bắn mìn, máy kiểm tra kíp mìn, máy đo độ lệch do Liên bang Nga sản xuất </b></td>
</tr>
<?php    $number=$start+1;
	while($row=mysql_fetch_array($sql1)){
	
	$mahieu=$row['mahieu'];
	$sm= $row['somay'];
	$noith= $row['noithuchien'];
	$thang=$row['thang'];
	$tentb =$row['tenthietbi'];
	$hangsanxuat =$row['hangsx'];
	$loaitb =$row['loaitb'];
	$stt =$row['stt'];
	
	$r19=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$mahieu'");
	while($row=mysql_fetch_array($r19)){
		$tenvt1=$row['tenviettat'];
		$chusohuu =$row['chusohuu'];
		$bophansh =$row['bophansh'];
	}
	
    ?>
	 <tr>
	 <td> <input type="checkbox" name="chkDel[]" value="<?php echo $stt; ?>" class="chkDelete">
<input type="submit" name="delcopy" WIDTH=20 HEIGHT=16 BORDER=0 ALT='' style="border:none;background:url(images/del.png) no-repeat;" value="&nbsp;&nbsp;&nbsp;Xóa"></td>
	<td height="76" style="text-align:center;"> <?php echo $number; ?> </td>
	<td style="padding-left:10px;"> <?php echo $tentb; ?></td>
	<td style="padding-left:10px;"> <?php echo $tenvt1; ?></td>
	<td style="padding-left:10px;"><?php echo $sm; ?> </td>
	<td style="text-align:center;"> <?php echo $hangsanxuat; ?></td>
	<td style="padding-left:10px;"> 
	<?php if($noith=="TT3"){
		?><b><font size="-1"><?php echo "Trung tâm 3"; ?></font></b>
	 <?php }elseif($noith=="MN"){
		?><b><font size="-1"><?php echo "CT TNHH DV&giám định MN"; ?></font></b>
	 <?php }elseif($noith=="XNKT"){ ?>
	  <b><?php	echo "Xí nghiệp KT"; ?></b>
	 <?php }elseif($noith=="XNĐVLGK"||$noith=="XSCCMDVL"){?>
	  <b><?php  echo "XNĐVLGK";?></b>
	 <?php } ?>
</td>
<?php 
if($thang==1){ ?>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<?php }elseif($thang==2){?>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<?php  }elseif($thang==3){?>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<?php }elseif($thang==4){?>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<?php }elseif($thang==5){?>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==6){?>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==7){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==8){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==9){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==10){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td  > </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==11){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td> 
<?php }elseif($thang==12){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td> 
<?php } ?>
<td style="padding-left:10px;"> <?php if($bophansh!="XDT"){ echo $bophansh; }else{ echo $chusohuu; } ?> </td>
</tr>
   <?php $number++; } ?>
<?php  if(($start+10)/10==$page){ ?>
	 <tr>
<td colspan="19" style="padding-left:10px;background:#CCCCCC;"><b> Mẫu chuẩn, vật chuẩn, thiết bị đo lường chuyên dụng </b></td>
</tr>
   <?php $r18=mysql_query("SELECT DISTINCT * FROM kehoach_iso WHERE namkh='$lastyear'");
	while($row=mysql_fetch_array($r18)){
	
	$mahieu=$row['mahieu'];
	$sm= $row['somay'];
	$noith= $row['noithuchien'];
	$thang=$row['thang'];
	$tentb =$row['tenthietbi'];
	$hangsanxuat =$row['hangsx'];
	$loaitb =$row['loaitb'];
	$stt =$row['stt'];
			
	$r20=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$mahieu'");
	while($row=mysql_fetch_array($r20)){
		$tenvt=$row['tenviettat'];
		$chusohuu =$row['chusohuu'];
		$bophansh =$row['bophansh'];
	}
	
	
    if($loaitb=="5"||$loaitb=="6"){ ?>
			

	 <tr>
	 <td> <input type="checkbox" name="chkDel[]" value="<?php echo $stt; ?>" class="chkDelete">
<input type="submit" name="delcopy" WIDTH=20 HEIGHT=16 BORDER=0 ALT='' style="border:none;background:url(images/del.png) no-repeat;" value="&nbsp;&nbsp;&nbsp;Xóa"></td>
	<td height="76" style="text-align:center;"> <?php echo $number; ?> </td>
	<td style="padding-left:10px;"> <?php echo $tentb; ?></td>
	<td style="padding-left:10px;"> <?php echo $tenvt; ?></td>
	<td style="padding-left:10px;"><?php echo $sm; ?> </td>
	<td style="text-align:center;"> <?php echo $hangsanxuat; ?></td>
	<td style="padding-left:10px;"> 
	<?php if($noith=="TT3"){
		?><b><font size="-1"><?php echo "Trung tâm 3"; ?></font></b>
	 <?php }elseif($noith=="MN"){
		?><b><font size="-1"><?php echo "CT TNHH DV&giám định MN"; ?></font></b>
	 <?php }elseif($noith=="XNKT"){ ?>
	  <b><?php	echo "Xí nghiệp KT"; ?></b>
	 <?php }elseif($noith=="XNĐVLGK"){?>
	  <b><?php  echo "XNĐVLGK";?></b>
	 <?php } ?>
</td>
<?php 
if($thang==1){ ?>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<?php }elseif($thang==2){?>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<?php  }elseif($thang==3){?>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<?php }elseif($thang==4){?>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<?php }elseif($thang==5){?>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==6){?>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==7){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==8){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==9){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==10){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td  > </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==11){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td> 
<?php }elseif($thang==12){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td> 
<?php } ?>
<td style="padding-left:10px;"> <?php if($bophansh!="XDT"){ echo $bophansh;  }else{ echo $chusohuu; }?> </td>
</tr>
   <?php $number++; }}} ?>
</table>
  <div class="footer" style="border:1px solid #666666;background:#CCCCCC">
<?php
//bắt đầu phân trang

$page_cr=($start/$row_per_page)+1;

for($i=1;$i<=$page;$i++)
{
 if ($page_cr!=$i) echo "<a href='KehoachKD.php?start=".$row_per_page*($i-1)."&&copy=Lập kế hoach&&lastyear=$lastyear&&firstyear=$firstyear&&username=$username&&password=$password'>$i&nbsp;</a>";
 else echo $i." ";
}
?>
</div>
<br/>
<label><input type="checkbox" name="checkall" id="checkall" style="margin-left:22px;" onClick="check_uncheck_checkbox(this.checked);"/> <font size="+0">Chọn tất cả</font>
<input type="submit" name="delcopy" WIDTH=20 HEIGHT=16 BORDER=0 ALT='' style="border:none;background:url(images/del.png) no-repeat;" value="&nbsp;&nbsp;&nbsp;Xóa">
</label>	
<br/>


</div>
<br/>
<table align="center">
<tr>
<td>
<input type="image" name="savefile" value ="SaveFile" src="upload/inkh.jpg" alt="Xem" onClick="this.form.savefile.value = this.value"/>
	<input type=hidden name=savefile value=""> </td>
	<input type=hidden name=year value="<?php echo $lastyear;?>">
	<input type=hidden name=firstyear value="<?php echo $firstyear;?>">
</form>
<form action="index.php" method="post">
  <input type=hidden name=username value="<?php echo $username;?>">
<input type=hidden name=password value="<?php echo $password;?>">
  	<td> <input type=hidden name="submit" value="Kế hoạch HC/KD">
 	<input type="image" id="back" src="upload/backkh.jpg" /></td>
   </form>
   </center>
  </tr>
  </table>
<?php } ?>

<?php if($delcopy!=""){ 

if(isset($_GET['lastyear'])){
$lastyear=$_GET['lastyear'];
}else{
$lastyear = isset($_POST['year']) ? $_POST['year'] : '';
}
if(isset($_GET['firstyear'])){
$firstyear=$_GET['firstyear'];
}else{
$firstyear = isset($_POST['firstyear']) ? $_POST['firstyear'] : '';

}

if(!empty($_POST["chkDel"])){
for($i=0;$i<count($_POST["chkDel"]);$i++)
{
	if($_POST["chkDel"][$i] != "")
	{
		$strSQL = "DELETE FROM kehoach_iso ";
		$strSQL .="WHERE stt = '".$_POST["chkDel"][$i]."' ";
		$objQuery = mysql_query($strSQL);
	} 
}
}
/*}else{
for($i=0;$i<count($_POST["chkDel"]);$i++)
{
	if($_POST["chkDel"][$i] != "")
	{
		$strSQL = "DELETE FROM thietbi_temp ";
		$strSQL .="WHERE mathietbi = '".$_POST["chkDel"][$i]."' ";
		$objQuery = mysql_query($strSQL);
	} 
}*/

if(isset($_GET['username'])){
$username=$_GET['username'];
}else{
$username= isset($_POST['username']) ? $_POST['username'] : '';
}

if(isset($_GET['password'])){
$password=$_GET['password'];
}else{
$password= isset($_POST['password']) ? $_POST['password'] : '';
}
?>


<center><b> KẾ HOẠCH HIỆU CHUẨN/KIỂM ĐỊNH THIẾT BỊ THIẾT BỊ;<br/> KIỂM TRA MẪU CHUẨN /VẬT CHUẨN, THIẾT BỊ ĐO LƯỜNG CHUYỂN DỤNG <BR/>XÍ NGHIỆP ĐỊA VẬT LÝ GIẾNG KHOAN <br/> <br/></center>

<table>
<tr>
<td> <strong>Sao lưu kế hoạch năm</strong>  <select name="firstyear" style="width:100px;height:30px;border:1px solid black;">
<option value="<?php echo $firstyear; ?>"> <?php echo $firstyear; ?> </option>
<option value="2015"> 2015 </option>
<option value="2016"> 2016 </option>
<option value="2017"> 2017 </option>
<option value="2018"> 2018 </option>
<option value="2019"> 2019 </option>
<option value="2020"> 2020 </option>
<option value="2021"> 2021 </option>
<option value="2022"> 2022 </option>
<option value="2023"> 2023 </option>
<option value="2024"> 2024 </option>
<option value="2025"> 2025 </option>
<option value="2026"> 2026 </option>
<option value="2027"> 2027 </option>
<option value="2028"> 2028 </option>
<option value="2029"> 2029 </option>
<option value="2030"> 2030 </option>
<option value="2031"> 2031 </option>
<option value="2032"> 2032 </option>
<option value="2033"> 2033 </option>
<option value="2034"> 2034 </option>
<option value="2035"> 2035 </option>
<option value="2036"> 2036 </option>
<option value="2037"> 2037 </option>
<option value="2038"> 2038 </option>
<option value="2039"> 2039 </option>
<option value="2040"> 2040 </option>

</select>
</td>
<td><strong>sang năm</strong> <select name="lastyear" style="width:100px;height:30px;border:1px solid black;">
<option value="<?php echo $lastyear; ?>"> <?php echo $lastyear; ?> </option>
<option value="2015"> 2015 </option>
<option value="2016"> 2016 </option>
<option value="2017"> 2017 </option>
<option value="2018"> 2018 </option>
<option value="2019"> 2019 </option>
<option value="2020"> 2020 </option>
<option value="2021"> 2021 </option>
<option value="2022"> 2022 </option>
<option value="2023"> 2023 </option>
<option value="2024"> 2024 </option>
<option value="2025"> 2025 </option>
<option value="2026"> 2026 </option>
<option value="2027"> 2027 </option>
<option value="2028"> 2028 </option>
<option value="2029"> 2029 </option>
<option value="2030"> 2030 </option>
<option value="2031"> 2031 </option>
<option value="2032"> 2032 </option>
<option value="2033"> 2033 </option>
<option value="2034"> 2034 </option>
<option value="2035"> 2035 </option>
<option value="2036"> 2036 </option>
<option value="2037"> 2037 </option>
<option value="2038"> 2038 </option>
<option value="2039"> 2039 </option>
<option value="2040"> 2040 </option>

</select>
</td>

	<td style="margin-right:20px;width:65%" align="right">
<a href="KehoachKD.php?kehoach=lapkehoach&&year=<?php echo $lastyear;?>&&firstyear=<?php echo $firstyear; ?>&&copy=Lập kế hoạch&&username=<?php echo $username; ?>&&password=<?php echo $password; ?>"><img src="upload/themtb.jpg" >	 </a>
</td>
</tr>
</table>
</form>

<?php
$r1=mysql_query("select count(*)as sum from kehoach_iso where namkh='$lastyear'");
while($row=mysql_fetch_array($r1)){
	$rows=$row['sum'];
}
$row_per_page=10; //Số dòng trên 1 trang
//tính số dòng cần hiển thị
//$rows=mysql_num_rows($tin);
//tính số trang cần để hiển thị
if ($rows>$row_per_page) $page=ceil($rows/$row_per_page); 
else $page=1; //nếu số dòng trong CSDL nhỏ hơn hoặc bằng số dòng trên 1 trang thì chỉ có 1 trang để hiển thị

if(isset($_GET['start']) && (int)$_GET['start'])
     $start=$_GET['start']; //dòng bắt đầu từ nơi ta muốn lấy
else $start=0;

      
 	  

$sql1=mysql_query("select * from kehoach_iso WHERE namkh='$lastyear' and (loaitb=1 or loaitb=2 or loaitb=3 or loaitb=4) order by stt asc limit $start,$row_per_page "); //bắt đầu lấy dữ liệu (^)_(^)

?>
 <br/>
 <form method="post" action="KehoachKD.php" enctype="multipart/form-data">
  <table width="100%" cellpadding="0" cellspacing="0" class="table1" id="dataTable">
<tr>
<th width="6%" rowspan="2">  </th>
<th width="4%" rowspan="2"> Stt </th>
<th width="10%" rowspan="2">Tên thiết bị,mẫu chuẩn/vật chuẩn </th>
<th width="5%" rowspan="2">Ký/Mã hiệu </th>
<th width="5%" rowspan="2">Số máy </th>
<th width="3%" rowspan="2">Nước/Hãng SX </th>
<th width="10%" rowspan="2">Nơi thực hiện </th>
<th width="7%" colspan="12">THÁNG</th>
<th width="5%" rowspan="2"> Chủ sở hữu</th>
 </tr>
      <tr>
<th width="3%"> 1</th>
<th width="3%"> 2</th>
<th width="3%"> 3</th>
<th width="3%"> 4 </th>
<th width="3%"> 5</th>
<th width="3%"> 6</th>
<th width="3%"> 7</th>
<th width="3%"> 8</th>
<th width="3%"> 9</th>
<th width="3%"> 10</th>
<th width="3%"> 11</th>
<th width="3%"> 12</th>
</tr>
<tr>
<td colspan="19" style="padding-left:10px;background:#CCCCCC;"><b> Thiết bị theo dõi và đo lường, máy bắn mìn, máy kiểm tra kíp mìn, máy đo độ lệch do Liên bang Nga sản xuất </b></td>
</tr>
<?php    $number=$start+1;
	while($row=mysql_fetch_array($sql1)){
	
	$mahieu=$row['mahieu'];
	$sm= $row['somay'];
	$noith= $row['noithuchien'];
	$thang=$row['thang'];
	$tentb =$row['tenthietbi'];
	$hangsanxuat =$row['hangsx'];
	$loaitb =$row['loaitb'];
	$stt =$row['stt'];
	
	$r19=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$mahieu'");
	while($row=mysql_fetch_array($r19)){
		$tenvt1=$row['tenviettat'];
		$chusohuu =$row['chusohuu'];
		$bophansh =$row['bophansh'];
	}
	
    ?>
	 <tr>
	 <td> <input type="checkbox" name="chkDel[]" value="<?php echo $stt; ?>" class="chkDelete">
<input type="submit" name="delcopy" WIDTH=20 HEIGHT=16 BORDER=0 ALT='' style="border:none;background:url(images/del.png) no-repeat;" value="&nbsp;&nbsp;&nbsp;Xóa"></td>
	<td height="76" style="text-align:center;"> <?php echo $number; ?> </td>
	<td style="padding-left:10px;"> <?php echo $tentb; ?></td>
	<td style="padding-left:10px;"> <?php echo $tenvt1; ?></td>
	<td style="padding-left:10px;"><?php echo $sm; ?> </td>
	<td style="text-align:center;"> <?php echo $hangsanxuat; ?></td>
	<td style="padding-left:10px;"> 
	<?php if($noith=="TT3"){
		?><b><font size="-1"><?php echo "Trung tâm 3"; ?></font></b>
	 <?php }elseif($noith=="MN"){
		?><b><font size="-1"><?php echo "CT TNHH DV&giám định MN"; ?></font></b>
	 <?php }elseif($noith=="XNKT"){ ?>
	  <b><?php	echo "Xí nghiệp KT"; ?></b>
	 <?php }elseif($noith=="XNĐVLGK"){?>
	  <b><?php  echo "XNĐVLGK";?></b>
	 <?php } ?>
</td>
<?php 
if($thang==1){ ?>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<?php }elseif($thang==2){?>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<?php  }elseif($thang==3){?>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<?php }elseif($thang==4){?>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<?php }elseif($thang==5){?>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==6){?>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==7){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==8){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==9){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==10){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td  > </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==11){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td> 
<?php }elseif($thang==12){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td> 
<?php } ?>
<td style="padding-left:10px;"> <?php if($bophansh!="XDT"){ echo $bophansh;  }else{ echo $chusohuu; } ?> </td>
</tr>
   <?php $number++; } ?>
<?php  if(($start+10)/10==$page){ ?>
	 <tr>
<td colspan="19" style="padding-left:10px;background:#CCCCCC;"><b> Mẫu chuẩn, vật chuẩn, thiết bị đo lường chuyên dụng </b></td>
</tr>
   <?php $r18=mysql_query("SELECT DISTINCT * FROM kehoach_iso WHERE namkh='$lastyear'");
	while($row=mysql_fetch_array($r18)){
	
	$mahieu=$row['mahieu'];
	$sm= $row['somay'];
	$noith= $row['noithuchien'];
	$thang=$row['thang'];
	$tentb =$row['tenthietbi'];
	$hangsanxuat =$row['hangsx'];
	
	$loaitb =$row['loaitb'];
	$stt =$row['stt'];
			
	$r20=mysql_query("SELECT DISTINCT * FROM thietbihckd_iso WHERE mavattu='$mahieu'");
	while($row=mysql_fetch_array($r20)){
		$tenvt=$row['tenviettat'];
		$bophansh =$row['bophansh'];
	}
	
	
    if($loaitb=="5"||$loaitb=="6"){ ?>
			

	 <tr>
	 <td> <input type="checkbox" name="chkDel[]" value="<?php echo $stt; ?>" class="chkDelete">
<input type="submit" name="delcopy" WIDTH=20 HEIGHT=16 BORDER=0 ALT='' style="border:none;background:url(images/del.png) no-repeat;" value="&nbsp;&nbsp;&nbsp;Xóa"></td>
	<td height="76" style="text-align:center;"> <?php echo $number; ?> </td>
	<td style="padding-left:10px;"> <?php echo $tentb; ?></td>
	<td style="padding-left:10px;"> <?php echo $tenvt; ?></td>
	<td style="padding-left:10px;"><?php echo $sm; ?> </td>
	<td style="text-align:center;"> <?php echo $hangsanxuat; ?></td>
	<td style="padding-left:10px;"> 
	<?php if($noith=="TT3"){
		?><b><font size="-1"><?php echo "Trung tâm 3"; ?></font></b>
	 <?php }elseif($noith=="MN"){
		?><b><font size="-1"><?php echo "CT TNHH DV&giám định MN"; ?></font></b>
	 <?php }elseif($noith=="XNKT"){ ?>
	  <b><?php	echo "Xí nghiệp KT"; ?></b>
	 <?php }elseif($noith=="XNĐVLGK"){?>
	  <b><?php  echo "XNĐVLGK";?></b>
	 <?php } ?>
</td>
<?php 
if($thang==1){ ?>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<?php }elseif($thang==2){?>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<?php  }elseif($thang==3){?>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<?php }elseif($thang==4){?>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<?php }elseif($thang==5){?>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==6){?>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==7){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==8){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==9){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td  bgcolor="#6699CC"> </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==10){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td  > </td>
<td  bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td>
<td> </td> 
<?php }elseif($thang==11){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td> </td> 
<?php }elseif($thang==12){?>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td>
<td bgcolor="#6699CC"> </td> 
<?php } ?>
<td style="padding-left:10px;"> <?php echo $bophansh; ?> </td>
</tr>
   <?php $number++; }}} ?>
</table>
  <div class="footer" style="border:1px solid #666666;background:#CCCCCC">
<?php
//bắt đầu phân trang

$page_cr=($start/$row_per_page)+1;

for($i=1;$i<=$page;$i++)
{
 if ($page_cr!=$i) echo "<a href='KehoachKD.php?start=".$row_per_page*($i-1)."&&copy=Lập kế hoach&&lastyear=$lastyear&&firstyear=$firstyear&&username=$username&&password=$password'>$i&nbsp;</a>";
 else echo $i." ";
}
?>
</div>
<br/>
<label><input type="checkbox" name="checkall" id="checkall" style="margin-left:22px;" onClick="check_uncheck_checkbox(this.checked);"/> <font size="+0">Chọn tất cả</font>
<input type="submit" name="delcopy" WIDTH=20 HEIGHT=16 BORDER=0 ALT='' style="border:none;background:url(images/del.png) no-repeat;" value="&nbsp;&nbsp;&nbsp;Xóa">
</label>	
<br/>


</div>
<br/>
<table align="center">
<tr>
<td>
<input type="image" name="savefile" value ="SaveFile" src="upload/inkh.jpg" alt="Xem" onClick="this.form.savefile.value = this.value"/>
	<input type=hidden name=savefile value=""> </td>
	<input type=hidden name=year value="<?php echo $lastyear;?>">
	<input type=hidden name=firstyear value="<?php echo $firstyear;?>">
</form>
<form action="index.php" method="post">
  <input type=hidden name=username value="<?php echo $username;?>">
<input type=hidden name=password value="<?php echo $password;?>">
  	<td> <input type=hidden name="submit" value="Kế hoạch HC/KD">
 	<input type="image" id="back" src="upload/backkh.jpg" /></td>
   </form>
   </center>
  </tr>
  </table>


<?php } ?>

</body>
<?php 
ob_flush();

?>


 
