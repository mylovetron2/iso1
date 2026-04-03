<?php
echo"
<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\" />
		<style type=\"text/css\">
body
{
background-image:url('upload/gradient2.png');
background-repeat:repeat-x;
font-family:\"Times New Roman\";
} 
#main{
width: 100%;
	padding: 0;
	margin-left: auto;
	margin-right: auto;
}
#head-link{
     width:$ws;
     height: 40px;
     line-height: 35px;
     border: 1px solid #CDCDCD;
     margin-bottom:5px;
     margin-left:10px;
     float:left;
     clear: both;
}
#head{
	height: 120px;
	border: 0px ;
	margin-bottom:10px;
}
#left{
     width: $wl;
     min-height: 730px;
     border: 2px solid #4682B4;
     float:left;
     margin-left:10px;
     margin-bottom: 5px;
}
#content{
     width: $wc;
     min-height: 730px;
     border: 1px solid #4682B4;
     float:left;
     margin-left: 5px;
     margin-bottom: 5px;
}	
#content-head{
     width: 100%;
     min-height: 40px;
     float:left; 
     background-color:#6495ED ; 
}	
#content-bottom{
     width: 100%;
     min-height: 30px; 
     float:left;
}	
#content-bottom1{
     width: 65%;
     height:30px;
     float:left   
}
#content-bottom2{
     width: 25%;
     height:30px;
     float:left   
}
#content-bottom3{
     width: 10%;
     height:30px;
     float:left   
}
#scroller{
    width:100%;
    height:690px;
    overflow:auto;
    border-bottom:2px solid #4682B4;
 }
.table
{
border-collapse:collapse;
width:100% ;
}
.table td
{
border: 1px solid #ddd;
text-align:left;
height: 30px;
}
.table th 
{
border-left: 1px solid #87CEEB;
font-weight: bold;
}
.table1
{
border-collapse:collapse;
width:100%;
font-family:Times New Roman;
}
.table1 td
{
border:1px solid black;
text-align:left;
height: 30px
}
.table1 th 
{
border:1px solid black;
color:#ffffff;
font-weight: bold;
height:50px;
background-color:#6495ED;
}
.table2
{
border-collapse:collapse;
width:100% ;
}
.table2 td
{
border: 1px solid black;
text-align:left;
height: 30px
}
.table2 th 
{
border: 1px solid black;
background-color: #6495ED;
font-weight: bold;
height: 50px;
}
.table3
{
border-collapse:collapse;
width:100%;
font-family:Times New Roman;
}
.table3 td
{
border:1px solid black;
text-align:left;
height: 30px
}
.table3 th 
{
border:1px solid black;
font-weight: bold;
height:80px;
}
.table3
{
font-family:Arial, Helvetica, sans-serif;
border-collapse:collapse;
width 100% ;
}
.table3 td
{
text-align:left;
border:1px solid black;
height: 40px
}
.table3 th 
{
border:2px solid black;
background-color:#A7C942;
color:#ffffff;
font-weight: bold;
}
.table4
{
border-collapse:collapse;
width 100% ;
}
.table4 th 
{
border:1px solid black;
background-color:#A7C942;
color:#ffffff;
font-weight: bold;
}
.td1
{
text-align:left;
border-right:1px solid black;
border-top:1px solid black;
border-bottom:1px solid black;
height: 30px
}
.td3
{
text-align:left;
border-left:1px solid black;
border-top:1px solid black;
border-bottom:1px solid black;
height: 30px
}
.td2
{
text-align:center;
border:1px solid black;
height: 30px
}
.td4
{
text-align:left;
border-top:1px solid black;
border-bottom:1px solid black;
height: 30px
}
.td5
{
text-align:left;
border-left:1px solid black;
height: 30px
}
.td6
{
text-align:left;
border-right:1px solid black;
height: 30px
}

.accordion,
.accordion ul,
.accordion li,
.accordion a,
.accordion span {
    margin: 0;
    padding: 0;
    border: none;
    outline: none;
}
.accordion li {
    list-style: none;
	margin-left:5px;
} 
.accordion li > a span {
    display: block;
    position: absolute;
    top: 7px;
    right: 0;
    padding: 0 10px;
    margin-right: 10px;
    font: normal bold 12px/18px Arial, sans-serif;
    background: #404247;

    -webkit-border-radius: 15px;
    -moz-border-radius: 15px;
    border-radius: 15px;

    -webkit-box-shadow: inset 1px 1px 1px rgba(0,0,0, .2), 1px 1px 1px rgba(255,255,255, .1);
    -moz-box-shadow: inset 1px 1px 1px rgba(0,0,0, .2), 1px 1px 1px rgba(255,255,255, .1);
    box-shadow: inset 1px 1px 1px rgba(0,0,0, .2), 1px 1px 1px rgba(255,255,255, .1);
} 
.accordion > li:hover > a,
.accordion > li:target > a,
.accordion > li > a.active {
    color: #3e5706;
    text-shadow: 1px 1px 1px rgba(255,255,255, .2);

    /*background: url(../img/active.png) repeat-x;*/
    background: #a5cd4e;
    background: -moz-linear-gradient(top,  #a5cd4e 0%, #6b8f1a 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#a5cd4e), color-stop(100%,#6b8f1a));
    background: -webkit-linear-gradient(top,  #a5cd4e 0%,#6b8f1a 100%);
    background: -o-linear-gradient(top,  #a5cd4e 0%,#6b8f1a 100%);
    background: -ms-linear-gradient(top,  #a5cd4e 0%,#6b8f1a 100%);
    background: linear-gradient(top,  #a5cd4e 0%,#6b8f1a 100%);
} 
.accordion > li:hover > a span,
.accordion > li:target > a span,
.accordion > li > a.active span {
    color:#FFFFFF;
    text-shadow: 0px 1px 0px rgba(0,0,0, .35);
    background: #3e5706;
} 
.accordion li.files > a:before { background-position: 0px 0px; }
.accordion li.files:hover > a:before,
.accordion li.files:target > a:before,
.accordion li.files > a.active:before { background-position: 0px -24px; }

.accordion li.mail > a:before { background-position: -24px 0px; }
.accordion li.mail:hover > a:before,
.accordion li.mail:target > a:before,
.accordion li.mail > a.active:before { background-position: -24px -24px; }

.accordion li.cloud > a:before { background-position: -48px 0px; }
.accordion li.cloud:hover > a:before,
.accordion li.cloud:target > a:before,
.accordion li.cloud > a.active:before { background-position: -48px -24px; }

.accordion li.sign > a:before { background-position: -72px 0px; }
.accordion li.sign:hover > a:before,
.accordion li.sign:target > a:before,
.accordion li.sign > a.active:before { background-position: -72px -24px; } 

.accordion li.foot > a:before { background-position: -96px -0px; }
.accordion li.foot:hover > a:before,
.accordion li.foot:target > a:before,
.accordion li.foot > a.active:before { background-position: -96px -24px; } 

.accordion li.manage > a:before { background-position: -120px -0px; }
.accordion li.manage:hover > a:before,
.accordion li.manage:target > a:before,
.accordion li.manage > a.active:before { background-position: -120px -24px; } 

.accordion li > .sub-menu {
	background-color: #F0F8FF;
	display: none;
}
.accordion li:target > .sub-menu {
    display: block;
} 


.hvr-fade {
  display: inline-block;
  vertical-align: middle;
  -webkit-transform: translateZ(0);
  transform: translateZ(0);
  box-shadow: 0 0 1px rgba(0, 0, 0, 0);
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  -moz-osx-font-smoothing: grayscale;
  overflow: hidden;
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-property: color, background-color;
  transition-property: color, background-color;
}
.hvr-fade:hover, .hvr-fade:focus, .hvr-fade:active {
  background-color: #6AB3D5;
  color: white;
}

.submitLink {
	background-color: transparent;
	border: none;
cursor: pointer;
padding:0;
margin:0;
color:brown;
font-size: $font_size;
font-family: Time New Romans;
text-align: left;
width:$wsl;
}
.imagehome{
        vertical-align: bottom;
	margin-top:5px;
}
.image{
        vertical-align: bottom;
}
.imagelout{
        vertical-align: bottom;
	margin-bottom:5px;
}	
</style>
<script type=\"text/javascript\" src=\"java/jquery.min.js\"></script>
<script type=\"text/javascript\">

    $(document).ready(function() {

        // Store variables

        var accordion_head = $('.accordion > li > a'),
            accordion_body = $('.accordion li > .sub-menu');

        // Open the first tab on load

accordion_head.first().addClass('active').next().slideDown('normal');

        // Click function
        accordion_head.on('click', function(event) {

            // Disable header links

            event.preventDefault();

            // Show and hide the tabs on click

            if ($(this).attr('class') != 'active'){
                accordion_body.slideUp('normal');
                $(this).next().stop(true,true).slideToggle('normal');
                accordion_head.removeClass('active');
                $(this).addClass('active');
            }
        });
    });
	
</script>";
if ($width=="" && $submit=="")
echo "
	<script type=\"text/javascript\">

width = screen.width;
height = screen.height;

if (width > 0 && height >0) {
    window.location.href = \"index.php?width=\" + width + \"&height=\" + height;
} else { 
	width=1280;
	height=1024;
    }

</script>";
echo"</head>";
?> 
