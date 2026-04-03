<?php

error_reporting('E_ALL & ~E_NOTICE ~E_WARNING');
// no direct access
if(strtolower(basename($_SERVER['PHP_SELF'])) == strtolower(basename(__FILE__))) {
	die('No access...');
}


class MySQLtabledit {

   /**	
    * 
	* MySQL Edit Table
	* 
	* Copyright (c) 2010 Martin Meijer - Browserlinux.com
	* 
	* Permission is hereby granted, free of charge, to any person obtaining a copy
	* of this software and associated documentation files (the "Software"), to deal
	* in the Software without restriction, including without limitation the rights
	* to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
	* copies of the Software, and to permit persons to whom the Software is
	* furnished to do so, subject to the following conditions:
	* 
	* The above copyright notice and this permission notice shall be included in
	* all copies or substantial portions of the Software.
	* 
	* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
	* IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
	* FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
	* AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
	* LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
	* OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
	* THE SOFTWARE.
	* 
	*/
	
	var $version = ''; // 03 jan 2011

	# text 
	var $text;

	# language
	var $language = 'en';

	# database settings
	var $database;
	var $host;
	var $user;
	var $pass;

	# table of the database
	var $table;

	# the primary key of the table
	var $primary_key;
	
	# the fields you want to see in "list view"
	var $fields_in_list_view;

	# numbers of rows/records in "list view"
	var $num_rows_list_view = 15;

	# required fields in edit or add record
	var $fields_required;

	# help text 
	var $help_text;

	# visible name of the fields
	var $show_text;	
	
	var $width_editor = '100%';
	var $width_input_fields = '500px';
	var $width_text_fields = '498px';
	var $height_text_fields = '100px';

	# warning no .htacces ('on' or 'off')
	var $no_htaccess_warning = 'on';


	# Forget this - working on it...
	# needed in Joomla for images/css, example: 'http://www.website.com/administrator/components/com_componentname'
	var $url_base;
	# needed in Joomla, example: 'option=com_componentname' 
	var $query_joomla_component;
	

	
    var $namHC=2015;

	###########################
	function database_connect() {
	###########################

		if (!mysql_connect($this->host, $this->user, $this->pass)) {
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db($this->database);

	}



	##############################
	function database_disconnect() {
	##############################
	
		mysql_close();

	}




	################
	function do_it() {
	################
		
		// Sorry: in Joomla, remove the next two lines and place the language vars instead
		require_once("./lang/en.php");
		require_once("./lang/" . $this->language . ".php");


		# No cache
		if(!headers_sent()) {
			header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
			header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
			header('Cache-Control: no-store, no-cache, must-revalidate');
			header('Cache-Control: post-check=0, pre-check=0', false);
			header('Pragma: no-cache');
			header("Cache-control: private");
		}
	
		if (!$this->url_base) $this->url_base = '.';

		# name of the script
		$break = explode('/', $_SERVER["SCRIPT_NAME"]);
		$this->url_script = $break[count($break) - 1];



		if ($_GET['mte_a'] == 'edit') { 
			$this->edit_rec(); 
		}
		elseif ($_GET['mte_a'] == 'new') {
			$this->edit_rec();
		}
		elseif ($_GET['mte_a'] == 'del') {
			 $this->del_rec(); 
		}
		elseif ($_POST['mte_a'] == 'save') {
			$this->save_rec();
		}
		elseif ($_GET['mte_a'] == 'info') { 
			$this->info_rec(); 
		}
        else { 
			$this->show_list();
		}

		$this->close_and_print();

	}



   	####################
	function show_list() {
	####################
		
       # message after add or edit
		$this->content_saved = $_SESSION['content_saved']; 
		$_SESSION['content_saved'] = '';
				
		# default sort (a = ascending)
		$ad = 'a';

		if ($_GET['sort'] && in_array($_GET['sort'],$this->fields_in_list_view) ) {
			if ($_GET['ad'] == 'a') $asc_des = 'ASC';
			if ($_GET['ad'] == 'd') $asc_des = 'DESC';
			$order_by = "ORDER by " . $_GET['sort'] . ' ' . $asc_des ;	
		}
		else {
			$order_by = "ORDER BY h.noithuchien asc,h.ngayhc asc";	
		}


		# navigation 1/3
		$start = $_GET["start"];
		
		if (!$start) {$start = 0;} else {$start *=1;}

		
		// build query_string
		// query_joomla_component (joomla) 
		if ($this->query_joomla_component) $query_string = '&option=' . $this->query_joomla_component ;
		// navigation
		$query_string .= '&start=' . $start;
		// sorting
		$query_string .= '&ad=' . $_GET['ad']  . '&sort=' . $_GET['sort'] ;
		// searching
		$query_string .= '&s=' . $_GET['s']  . '&f=' . $_GET['f'] . '&n=' . $_GET['n']  . '&v=' . $_GET['v'] .'&baocao=' . $_GET['baocao'] ;
		
		if ($_GET['fromdate'] && $_GET['todate']){
				$fromdate = $_GET['fromdate'];
				$todate = $_GET['todate'];
		}else{
				$curm=date("m");
				$cury=date("Y");
				$d=cal_days_in_month(CAL_GREGORIAN,$curm,$cury);
				$fromdate="$cury-$curm-01";
				$todate="$cury-$curm-$d";
		}
		for ($i=0;$i<=strlen($fromdate);$i++) {
			$p = stripos($fromdate,"-") ;

			if ($i== 0) {
			$yfrom = trim (substr($fromdate,0,$p)) ;
			} 	
			if ($i== 1) {
			$mfrom = trim (substr($fromdate,0,$p)) ;
			} 	
			if ($i== 2) {
			$dfrom = trim ($fromdate) ;
			} 	
			$p++ ;
			$fromdate = substr($fromdate,$p);
			}
			for ($i=0;$i<=strlen($todate);$i++) {
			$p = stripos($todate,"-") ;

			if ($i== 0) {
			$yto = trim (substr($todate,0,$p)) ;
			} 	
			if ($i== 1) {
			$mto = trim (substr($todate,0,$p)) ;
			} 	
			if ($i== 2) {
			$dto = trim ($todate) ;
			} 	
			$p++ ;
			$todate = substr($todate,$p);
			}
		
		if ($_GET['s'] && $_GET['f']) {
	
			$in_search = addslashes(stripslashes($_GET['s']));
			$in_search_field = $_GET['f'];

			if ($in_search_field == $this->primary_key) {
				$where_search = "where h.$in_search_field = '$in_search' ";
			}elseif($in_search_field == "bophansh"){
				$where_search = "where t.bophansh = '$in_search' ";
			}elseif($in_search_field == "somay"){
				$where_search = "where t.somay LIKE '%$in_search%' ";
			}elseif($in_search_field == "dkdx"){
				if ($in_search=="ĐK")
					$where_search = "where h.dinhky = 'on' ";
				else if($in_search=="ĐX")
					$where_search = "where h.dotxuat = 'on' ";
			}elseif($in_search_field == "tenmay"){
				$where_search = "where t.tenviettat LIKE '%$in_search%' ";
			}elseif($in_search_field == "ghichu"){
				$where_search = "inner join kehoach_iso k on h.tenmay = k.mahieu and k.namkh between '$yfrom' and '$yto' and k.thang between '$mfrom' and '$mto' where k.ghichu = '$in_search' ";
			}else{
				$where_search = "where h.$in_search_field LIKE '%$in_search%' ";
			}
		}

		if ($_GET['fromdate'] && $_GET['todate']){
			$field = addslashes(stripslashes($_GET['n']));
		
			if($where_search!=""){
		  		$month_string  = "and h.ngayhc between '$yfrom-$mfrom-$dfrom 00:00:00' and '$yto-$mto-$dto 00:00:00'";
			}else
				$month_string  = "where h.ngayhc between '$yfrom-$mfrom-$dfrom 00:00:00' and '$yto-$mto-$dto 00:00:00'";
		}else{	
			$m = date('m');
			$y = date('Y');
		
			if($where_search!=""){
				$month_string = " ";
			}else
				$month_string  = "where h.ngayhc between '$y-$m-1 00:00:00' and '$y-$m-31 00:00:00'";
		 }	
		
       		 $sql="select h.stt,h.sohs,t.tenthietbi,t.tenviettat as tenmay,t.somay,t.mavattu,h.congviec,h.namkh,h.noithuchien,date_format(h.ngayhc,'%d/%m/%Y') as ngayhcvn,h.ngayhc,date_format(h.ngayhctt,'%d/%m/%Y') as nghctt,h.ttkt,left(ttkt,2) as dkdx,t.bophansh,t.chusohuu,h.dotxuat,h.dinhky from hosohckd_iso h inner join thietbihckd_iso t on h.tenmay = t.mavattu $where_search $month_string order by h.noithuchien asc,h.ttkt desc,h.ngayhc asc,h.sohs asc ";
        
		$result = mysql_query($sql);

		# navigation 2/3
		$hits_total = mysql_num_rows($result); 

		$sql .= "limit $start, $this->num_rows_list_view";
		$result = mysql_query($sql);

		if (mysql_num_rows($result)>0) {
			$count = 0;$stt=$start+1;
			while ($rij = mysql_fetch_assoc($result)) {
				$count++;
				$this_row = '';
				
				
				if ($background == '#eee') {$background='#fff';} 
					else {$background='#eee';}
							
				
				foreach ($rij AS $key => $value) {
					
					$sort_image = '';
					if (in_array($key, $this->fields_in_list_view)) {
						if ($count == 1) {
							
							// show nice text of a value 
							if ($this->show_text[$key]) {$show_key = $this->show_text[$key];}
								else {$show_key = $key;}

							// sorting
							if ($_GET['sort'] == $key && $_GET['ad'] == 'a') {
								$sort_image = "<IMG SRC='$this->url_base/images/sort_a.png' WIDTH=9 HEIGHT=8 BORDER=0 ALT=''>";
								$ad = 'd';
							}
							if ($_GET['sort'] == $key && $_GET['ad'] == 'd') {
								$sort_image = "<IMG SRC='$this->url_base/images/sort_d.png' WIDTH=9 HEIGHT=8 BORDER=0 ALT=''>";
								$ad = 'a';
							}

							// remove sort  and ad and add new ones
							$query_sort = preg_replace('/&(sort|ad)=[^&]*/','', $query_string) . "&sort=$key&ad=$ad";	

							
                            
                            if($key==$this->primary_key){
                             //   $head .= "<td visibility:collapse><font color='black'><b>STT</b></font></td>";
                            }else
                                     
                                $head .= "<td NOWRAP><a href='$this->url_script?$query_sort' class='mte_head'><font color='black'><center>$show_key</center></font></a> $sort_image</td>";
								
						}
						if ($key == $this->primary_key) {
						
							//$buttons = "<td NOWRAP> </td>";
							 
							/*$buttons = "<td NOWRAP><a href='javascript:void(0)' onclick='del_confirm($value)' title='Delete {$this->show_text[$key]} $value'><IMG SRC='$this->url_base/images/del.png' WIDTH=16 HEIGHT=16 BORDER=0 ALT=''></a>
                                        &nbsp;<a href='?$query_string&mte_a=edit&id=$value' title='Edit {$this->show_text[$key]} $value'><IMG SRC='$this->url_base/images/edit.png' WIDTH=16 HEIGHT=16 BORDER=0 ALT=''></a>
                                     &nbsp;<a href='javascript:void(0)' onclick='info_confirm($value)'  title='Download' ><IMG SRC='$this->url_base/images/info.png' WIDTH=16 HEIGHT=16 BORDER=0 ALT=''></a></td>";*/
									   
									   
                           $link = "<a href='javascript:void(0)' onclick='document_confirm($value)' style='text-decoration:none'>";

                           $this_row .= "<td><center>$stt</center></td>";
                            //$this_row .= "<td style='background:$background'><p style='visibility:hidden'>$value</p></td>";
						   $stt++;
						}
						else {
							$tenmay=$rij['tenmay'];
							$mavattu=$rij['mavattu'];
							$ttkt=$rij['ttkt'];
							$sohs=$rij['sohs'];
							$namkh=$rij['namkh'];
							$ngayhcvn=$rij['ngayhcvn'];
							$ngayhc=$rij['ngayhc'];
							$nghctt=$rij['nghctt'];
							$dinhky=$rij['dinhky'];
							$dotxuat=$rij['dotxuat'];
							if($key=="sohs"){
							//	if($ttkt=="Hỏng"){
							//		$this_row .= '<td></td>';
							//	}else{
									$this_row .="<td ><a  href='bangcanhbao.php?hosohc=hoso&&tenthietbi=$mavattu&&ngayhc=$ngayhc'  title='HOSHC' ><span style=\"color:blue;\">$sohs</span></a></td>";
							//	}
							}elseif($key=="ngayhc"){
							//	if($ttkt=="Hỏng"){
							//		$this_row .= '<td></td>';
							//	}else{
									$this_row .= '<td><center>' . substr(strip_tags($ngayhcvn), 0, 300) . '</center></td>';
							//	}
							}elseif($key=="nghctt"){
								if($ttkt=="Hỏng"){
									$this_row .= '<td></td>';
								}else{
									$this_row .= '<td><center>' . substr(strip_tags($nghctt), 0, 300) . '</center></td>';
								}
							}elseif($key=="dkdx"){
								if($dinhky=="on")
									$this_row .= '<td><center>' . substr(strip_tags("ĐK"), 0, 300) . '</center></td>';
								else
								if($dotxuat=="on")
									$this_row .= '<td style="background:#33afff"><center>' . substr(strip_tags("ĐX"), 0, 300) . '</center></td>';
								else
									$this_row .= '<td><center>' . substr(strip_tags(""), 0, 300) . '</center></td>';
							}elseif($key=="tenmay")
							{
								$tenviettat=$rij['tenmay'];
								$this_row .= '<td> '. substr(strip_tags($tenviettat), 0, 300) . '</td>';
							}elseif($key=="ttkt")
							{
								if($ttkt=="Hỏng"){
									$bk="#FFC0CB";
								}else{
									$bk="#FFFFFF";
								}
								$this_row .= '<td><center>' . substr(strip_tags($ttkt), 0, 300) . '</center></td>';
							}elseif($key=="ngayhc")
							{
									$this_row .= '<td><center>' . substr(strip_tags($value), 0, 300) . '</center></td>';

							}elseif($key=="chusohuu"){
								$bpsh=$rij['bophansh'];
								$chush=$rij['chusohuu'];
								if($bpsh=="XDT"){
									$this_row .= '<td><center>' . substr(strip_tags($chush), 0, 300) . '</center></td>';
								}else{
									$this_row .= '<td><center>' . substr(strip_tags($bpsh), 0, 300) . '</center></td>';
								}
							}else
								$this_row .= '<td><center>' . substr(strip_tags($value), 0, 300) . '</center></td>';
							
						}
					}
				}
				
				$rows .= "<tr style='background:$bk'>$buttons $this_row</tr>";

			}
		}
		else {
			
			$head = "<td style='padding:50px'>{$this->text['Nothing_found']}...</td>";

		}
		
		# navigation 3/3

		# remove start= from url
		$query_nav = preg_replace('/&(start|mte_a|id)=[^&]*/','', $query_string );	


		# this page
		$this_page = ($this->num_rows_list_view + $start)/$this->num_rows_list_view;


		# last page
		$last_page = ceil($hits_total/$this->num_rows_list_view);


		# navigatie numbers
		if ($this_page>10) {
			$vanaf = $this_page - 10;
		}
		else {$vanaf = 1;}
		if ($last_page>$this_page + 10) {
			$tot = $this_page + 10;
		}
		else {$tot = $last_page; }


		for ($f=$vanaf;$f<=$tot;$f++) {
			
		
			$nav_toon = $this->num_rows_list_view * ($f-1);

			if ($f == $this_page) {
				$navigation .= "<td class='mte_nav' style='color:#fff;background: #808080;font-weight: bold'>$f</td> "; 
			}
			else {
				$navigation .= "<td class='mte_nav' style='background: #fff'><A HREF='$this->url_script?$query_nav&start=$nav_toon&baocao=lietke&fromdate=$yfrom-$mfrom-$dfrom&todate=$yto-$mto-$dto'>$f</A></td>"; 
			}
		}
		if ($hits_total<$this->num_rows_list_view) { $navigation = '';}




		# Previous if
		if ($this_page > 1) {
			$last =  (($this_page - 1) * $this->num_rows_list_view) - $this->num_rows_list_view;
			$last_page_html = "<A HREF='$this->url_script?$query_nav&start=$last&fromdate=$yfrom-$mfrom-$dfrom&todate=$yto-$mto-$dto class='mte_nav_prev_next'>{$this->text['Previous']}</A>";
		}

		# Next if: 
		if ($this_page != $last_page && $hits_total>1) {
			$next =  $start + $this->num_rows_list_view;
			$next_page_html =  "<A HREF='$this->url_script?$query_nav&start=$next&fromdate=$yfrom-$mfrom-$dfrom&todate=$yto-$mto-$dto class='mte_nav_prev_next'>{$this->text['Next']}</A>";
		}

		
			if ($navigation) {
			$nav_table = "
				<table cellspacing=5 cellpadding=0 style='border: 0px solid white'>
					<tr>
						<td style='padding-right:6px;vertical-align: middle'>$last_page_html</td>
						      $navigation
						<td style='padding-left:6px;vertical-align: middle'>$next_page_html</td>
					</tr>
				</table>	
			";
			$this->nav_bottom = "
				<div style='margin: 20px 0 0 0;width: $this->width_editor'><div class=\"noprint\">
				<center>
					$nav_table
				</center>
				</div>
				</div>
			";
		}
		
		
		
		
		# Search form + Add Record button
			foreach ($this->fields_in_list_view AS $option) {
			
			if ($this->show_text[$option]) {$show_option = $this->show_text[$option];}
			else {$show_option = $option;}
            
            if ($option == "stt") {   // Ko search Cot Number
                
            }
            
            elseif ($option == $in_search_field) {
					$options .= "<option selected value='$option'>$show_option</option>";
				}
				else {
					$options .= "<option value='$option'>$show_option</option>";
				}
			}
		$in_search_value = htmlentities(trim(stripslashes($_GET['s'])), ENT_QUOTES);
		
		$fromdate=$_GET['fromdate'];
		$todate=$_GET['todate'];
		$f=$_GET['f'];
		$s=$_GET['s'];
		$submit=$_GET['submit'];
		$curm=date("m");
		$cury=date("Y");
		$d=cal_days_in_month(CAL_GREGORIAN,$curm,$cury);
		if($fromdate=="") $ngayfrom="$cury-$curm-01"; else $ngayfrom=$fromdate;
		if($todate=="") $ngayto="$cury-$curm-$d";else $ngayto=$todate;
		
		
		$seach_form = "
			<table cellspacing=0 cellpadding=0 border=0>
			<tr>
				<td nowrap>
					<form method=get action='$this->url_script' style='padding: 15px'>
						<select name='f'>$options</select> 
						<input type='text' name='s' value='$in_search_value' style='width:200px'>
						<input type='hidden' name='baocao' value=lietke>
						Từ ngày <input type='date' name='fromdate' style='width:200px' value='$ngayfrom'>
						Đến ngày <input type='date' name='todate' style='width:200px' value='$ngayto'>
						<input type='submit' value='{$this->text['Search']}' style='width:80px; border: 1px solid #000'>
					
						"; 	

		if ($this->query_joomla_component) $seach_form .= "<input type='hidden' value='$this->query_joomla_component' name='option'>";
		$seach_form .= "</form>";
		
		if ($_GET['s'] && $_GET['f']) {		
			if ($this->query_joomla_component) $add_joomla = '?option=' . $this->query_joomla_component;
			$seach_form .= "<button onclick='window.location=\"$this->url_script$add_joomla?baocao=lietke\"' style='margin: 0 0 15px 15px; border: 1px solid #000;'>{$this->text['Clear_search']}</button>
			";
			
		}
		
		$seach_form .= "
				</td>

				<td style='padding: 15px; text-align: right; width: $this->width_editor'>
				<button onclick='window.location=\"xuatfile.php?from=$fromdate&to=$todate&search=$s&field=$f\"' style='margin: 0 0 15px 15px; border: 1px solid #000;'>In ấn và xuất file</button>";
		/*echo"<input  style='width:120px;color:red;border: 1px solid #000;height:20px' type=\"submit\" value='In ấn và xuất file' onClick='export($fromdate,$todate,$in_search,$in_search_field)' />";*/
				
				//$seach_form .= "<button onclick='window.location=\"index.php\"' style='margin: 0 0 15px 15px; border: 1px solid #000;'>Quay lại trang chủ</button>";
				
				$seach_form .= "</td>
				
			</tr>
			</table>
		";

        $this->javascript = "
			
            function info_confirm(id) {
                   
                  window.location='filetlkt.php?ID_HoSoKiemDinh=' + id
		}    

	    function export(fromdate,todate,in_search,in_search_field) {
                   
                  window.location='xuatfile.php?from='+ fromdate +'&to=' + todate + '&s=' +in_search +'&f='+in_search_field;
		}    
           	

            function del_confirm(id) {

                if (confirm('Bạn muốn xóa công việc này...?')) {
					window.location='$this->url_script?$query_string&mte_a=del&id=' + id				
				}
			}
			
			 function exportfile() {

               			var firstdate = prompt('Từ ngày','');
				var lastdate = prompt('Đến ngày','');
				if (firstdate!= null&&lastdate!=null) {
  					  window.location ='xuatfile.php?firstdate='+ firstdate + '&lastdate=' + lastdate;
   					 
				}	
			}
	
		";
		# page content
		$this->content = "
			<div style='width: $this->width_editor;background:#99CCFF; margin: 0'>$seach_form</div>
			<table border=1 BORDERCOLOR=black cellspacing=0 cellpadding=10 style='margin: 0; width: $this->width_editor;'>
				<tr style='background:#99CCFF; color: #fff;border:1px solid black;' ><td></td>$head</tr>
				$rows
			</table>
                                                        
			$this->nav_bottom
		";
		
		
	}


	##################
	function del_rec() {
	##################

	$in_id = $_GET['id'];
        $in_sql=mysql_query("SELECT `tenmay`,`sohs` FROM `hosohckd_iso` WHERE `stt`='$in_id'");
        $in_SoMay=mysql_fetch_array($in_sql);
        //$in_SoMay='TseT';
		if (mysql_query("DELETE FROM $this->table WHERE `$this->primary_key` = '$in_id'")) {
			$this->content_deleted = "
				<div style='width: $this->width_editor'>
					<div style='padding: 10px; color:#fff; background: #FF8000; font-weight: bold'>{$this->text['deleted']} </br>  Tên Khoa Học $in_SoMay[0] </br>  </div>
				</div>
			";
			$this->show_list();
		}
		else {
			$this->content = "
			</div>
				<div style='padding:2px 20px 20px 20px;margin: 0 0 20px 0; background: #DF0000; color: #fff;'><h3>Error</h3>" .
				mysql_error(). 
				"</div><a href='$this->url_script'>List records...</a>
			</div>";
		}

	}




	###################
	function edit_rec() {
	###################

		$in_id = $_GET['id'];

		# edit or new?
		if ($_GET['mte_a'] == 'edit') $edit=1;
		
		$count_required = 0;
		
		$result = mysql_query("SHOW COLUMNS FROM `$this->table`");
		//$result = mysql_query("SHOW COLUMNS MaHieu FROM `$this->table`");
		
		# get field types
		while ($rij = mysql_fetch_array($result)) {
			extract($rij);
			$field_type[$Field] = $Type;
		} 

		if (!$edit) {
			$rij = $field_type;
		}
		else {
			if ($edit) $where_edit = "WHERE `$this->primary_key` = $in_id";
			$result = mysql_query("SELECT * FROM `$this->table` $where_edit LIMIT 1 ;");
			//$result = mysql_query("SELECT `SoMay`,`MaHieu` FROM `$this->table` $where_edit LIMIT 1 ;");
			
            	$rij = mysql_fetch_assoc($result);
		}
		
		
		foreach ($rij AS $key => $value) {
			if (!$edit) $value = '';
			$field = '';
			$options = '';
			$style = '';
			$field_id = '';
			$readonly = '';
			$value_htmlentities = '';
			
			if (in_array($key, $this->fields_required)) {
				$count_required++;
				$style = "class='mte_req'";
				$field_id = "id='id_" . $count_required . "'";
			}


			$field_kind = $field_type[$key];

			# different fields
			# textarea
			if (preg_match("/text/", $field_kind)) {
				$field = "<textarea name='$key' $style $field_id>$value</textarea>";
			}
			# select/options
			elseif (preg_match("/enum\((.*)\)/", $field_kind, $matches)) {
				$all_options = substr($matches[1],1,-1);
				$options_array = explode("','",$all_options);
				foreach ($options_array AS $option) {
					if ($option == $value) {
						$options .= "<option selected>$option</option>";
					}
					else {
						$options .= "<option>$option</option>";
					}
				} 
				$field = "<select name='$key' $style $field_id>$options</select>";
			}
			# input
			elseif (!preg_match("/blob/", $field_kind)) {
				if (preg_match("/\(*(.*)\)*/", $field_kind, $matches)) {
					if ($key == $this->primary_key) {
						$style = "style='background:#ccc'";
						$readonly = 'readonly';
					}
					$value_htmlentities = htmlentities($value, ENT_QUOTES);
					if (!$edit && $key == $this->primary_key) {
						$field = "<input type='hidden' name='$key' value=''>[auto increment]";
					}
					

				}
			}
			# blob: don't show
			elseif (preg_match("/blob/", $field_kind)) {
				$field = '[<i>binary</i>]';
			}
	
            if ($background == '#eee') {$background='#fff';} 
				else {$background='#eee';}
			if ($this->show_text[$key]) {$show_key = $this->show_text[$key];}
				else {$show_key = $key;}
		
            //    LOAD DU LIEU BO PHAN


            if($show_key=="Bộ Phận"){
                $in_sql="SELECT `madv`, `tendv` FROM `DonVi_ISO`";
                $in_result=mysql_query($in_sql);
               
                while($row = mysql_fetch_array($in_result))
                    {
                        if($row[madv]==$value)
                            $options .= "<option selected value=$row[madv]>$row[tendv]</option>"; 
                        else
                            $options .= "<option value=$row[madv]>$row[tendv]</option>"; 
                
                
                    }
               $field = "<select name='$key' $style $field_id>$options</select>";
                
            }
            
        
            if($show_key!="active" && $show_key!="BoPhanSuDung")   // Dong muon an di
            {
                if($show_key=="Ngày đã k/đ")
                    $field="<input type='date' name='$key' value=$value>";
                if($show_key=="Ngày k/đ tiếp")
                    $field="<input type='date' name='$key' value=$value>";    
                
                $rows .= "\n\n<tr style='background:$background'>\n<td><b>$show_key</b></td>\n<td>$field</td>\n<td style='width:50%'>{$this->help_text[$key]}</td>\n</tr>";
                
            }
            else{
                
                if ($background == '#eee') {$background='#fff';} 
				    else {$background='#eee';}
                    
            }
             
   		
        }// Cua fore
		
	     
        
        $this->javascript = "
			function submitform() {
				var ok = 0;
				for (f=1;f<=$count_required;f++) {
					
					var elem = document.getElementById('id_' + f);
					
					if(elem.options) {
						if (elem.options[elem.selectedIndex].text!=null && elem.options[elem.selectedIndex].text!='') {
							ok++;
						}
					}
					else {
						if (elem.value!=null && elem.value!='') {
							ok++;
						}
					}
				}
	//alert($count_required + ' ' + ok);

				if (ok == $count_required) {
					return true;
				}
				else {
					alert('{$this->text['Check_the_required_fields']}...')
					return false;
				}	
			}
		";


		$this->content = "
			

				<div style='width: $this->width_editor;background:#454545'>
				
					<table cellspacing=0 cellpadding=0 style='border: 0px solid white'>
						<tr>
						<td>
							<button onclick='window.location=\"{$_SESSION['hist_page_baocaohckd']}\";' style='margin: 20px 15px 25px 15px; border: 1px solid #000;'>{$this->text['Go_back']}</button></td>
						<td>
							<form method=post action='$this->url_script' onsubmit='return submitform()'>
							<input type='submit' value='{$this->text['Save']}' style='width: 80px;border: 1px solid #000; margin: 20px 0 25px 0'></td>
						</tr>
					</table>
					
				</div>
			
				<div style='width: $this->width_editor'>
					<table cellspacing=0 cellpadding=10 style='100%; margin: 0'>
						$rows
					</table>
				</div>
		";
			
		if (!$edit) $this->content .= "<input type='hidden' name='mte_new_rec' value='1'>";
		if ($this->query_joomla_component) $this->content .= "<input type='hidden' name='option' value='$this->query_joomla_component'>";
		
		$this->content .= "
				<input type='hidden' name='mte_a' value='save'>
				
			</form>
		";

		
	}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// FUNCTION INFO REC
    ###################
	function info_rec() {
	###################

		$in_id = $_GET['id'];

		# edit or new?
		if ($_GET['mte_a'] == 'info') $edit=1;
		
		$count_required = 0;
		
		$result = mysql_query("SHOW COLUMNS FROM `$this->table`");
		//$result = mysql_query("SHOW COLUMNS MaHieu FROM `$this->table`");
		
		# get field types
		while ($rij = mysql_fetch_array($result)) {
			extract($rij);
			$field_type[$Field] = $Type;
		} 

		if (!$edit) {
			$rij = $field_type;
		}
		else {
			if ($edit) $where_edit = "WHERE `$this->primary_key` = $in_id";
			$result = mysql_query("SELECT * FROM `$this->table` $where_edit LIMIT 1 ;");
			//$result = mysql_query("SELECT `SoMay`,`MaHieu` FROM `$this->table` $where_edit LIMIT 1 ;");
			
            $rij = mysql_fetch_assoc($result);
		}
		
		
		foreach ($rij AS $key => $value) {
			if (!$edit) $value = '';
			$field = '';
			$options = '';
			$style = '';
			$field_id = '';
			$readonly = '';
			$value_htmlentities = '';
			
			if (in_array($key, $this->fields_required)) {
				$count_required++;
				$style = "class='mte_req'";
				$field_id = "id='id_" . $count_required . "'";
			}


			$field_kind = $field_type[$key];

			# different fields
			# textarea
			if (preg_match("/text/", $field_kind)) {
				$field = "<textarea name='$key' $style $field_id>$value</textarea>";
			}
			# select/options
			elseif (preg_match("/enum\((.*)\)/", $field_kind, $matches)) {
				$all_options = substr($matches[1],1,-1);
				$options_array = explode("','",$all_options);
				foreach ($options_array AS $option) {
					if ($option == $value) {
						$options .= "<option selected>$option</option>";
					}
					else {
						$options .= "<option>$option</option>";
					}
				} 
				$field = "<select name='$key' $style $field_id>$options</select>";
			}
			# input
			elseif (!preg_match("/blob/", $field_kind)) {
				if (preg_match("/\(*(.*)\)*/", $field_kind, $matches)) {
					if ($key == $this->primary_key) {
						$style = "style='background:#ccc'";
						$readonly = 'readonly';
					}
					$value_htmlentities = htmlentities($value, ENT_QUOTES);
					if (!$edit && $key == $this->primary_key) {
						$field = "<input type='hidden' name='$key' value=''>[auto increment]";
					} 
					else {
						$field = "<input type='text' name='$key' value='$value_htmlentities' maxlength='{$matches[1]}' $style $readonly $field_id>";
					}
				}
			}
			# blob: don't show
			elseif (preg_match("/blob/", $field_kind)) {
				$field = '[<i>binary</i>]';
			}
	
            if ($background == '#eee') {$background='#fff';} 
				else {$background='#eee';}
			if ($this->show_text[$key]) {$show_key = $this->show_text[$key];}
				else {$show_key = $key;}
		
            //    LOAD DU LIEU BO PHAN


            if($show_key=="Bộ Phận"){
                $in_sql="SELECT `madv`, `tendv` FROM `DonVi_ISO`";
                $in_result=mysql_query($in_sql);
               
                while($row = mysql_fetch_array($in_result))
                    {
                        if($row[madv]==$value)
                           
                             $field =$row[tendv];
                    }
                
            }
            
        
            if($show_key!="active")   // Dong muon an di
            {
                if($show_key=="Ngày đã k/đ")
                    $field="<input type='date' name='$key' value=$value>";
               
                
                $rows .= "\n\n<tr style='background:$background'>\n<td><b>$show_key</b></td>\n<td>$field</td>\n<td style='width:50%'>{$this->help_text[$key]}</td>\n</tr>";
                
            }
            else{
                
                if ($background == '#eee') {$background='#fff';} 
				    else {$background='#eee';}
                    
            }
             
   		
        }// Cua fore
		
	     
        
        $this->javascript = "
			function submitform() {
				var ok = 0;
				for (f=1;f<=$count_required;f++) {
					
					var elem = document.getElementById('id_' + f);
					
					if(elem.options) {
						if (elem.options[elem.selectedIndex].text!=null && elem.options[elem.selectedIndex].text!='') {
							ok++;
						}
					}
					else {
						if (elem.value!=null && elem.value!='') {
							ok++;
						}
					}
				}
//	alert($count_required + ' ' + ok);

				if (ok == $count_required) {
					return true;
				}
				else {
					alert('{$this->text['Check_the_required_fields']}...')
					return false;
				}	
			}
		";


		$this->content = "
			

				<div style='width: $this->width_editor;background:#454545'>
				
					<table cellspacing=0 cellpadding=0 style='border: 0px solid white'>
						<tr>
						<td>
							<button onclick='window.location=\"{$_SESSION['hist_page_baocaohckd']}\";' style='margin: 20px 15px 25px 15px; border: 1px solid #000;'>{$this->text['Go_back']}</button></td>
						<td>
							<form method=post action='$this->url_script' onsubmit='return submitform()'>
							<input type='submit' value='{$this->text['Save']}' style='width: 80px;border: 1px solid #000; margin: 20px 0 25px 0'></td>
						</tr>
					</table>
					
				</div>
			
				<div style='width: $this->width_editor'>
					<table cellspacing=0 cellpadding=10 style='100%; margin: 0'>
						$rows
					</table>
				</div>
		";
			
		if (!$edit) $this->content .= "<input type='hidden' name='mte_new_rec' value='1'>";
		if ($this->query_joomla_component) $this->content .= "<input type='hidden' name='option' value='$this->query_joomla_component'>";
		
		$this->content .= "
				<input type='hidden' name='mte_a' value='save'>
				
			</form>
		";

		
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



	###################
	function save_rec() {
	###################


		$in_mte_new_rec = $_POST['mte_new_rec'];
		
		$updates = '';
		
		
        
        
        
        
        /*$result_nam=mysql_query('SELECT namHC FROM namHC_iso');
        
        if (!$result_nam) {
                die('Could not query:' . mysql_error());
            }
           */ 
        foreach($_POST AS $key => $value) {
			if ($key == $this->primary_key) {
				$in_id = $value;
				$where = "$key = $value";
			}
            if ($key=="sohs")
            {
                $temp=$value;               // GIU LAI MASOMAY DE THONG BAO SAU KHI UPDATE HOAC EDIT
            }
            if ($key=="tenmay"){
                
               
                $in_TenThietBi=$value;        // GIU LAI TEN THIET BI DE THONG BAO SAU KHI UPDATE HOAC EDIT              
            }
            
            /*
            if ($key=="BoPhanSuDung")
            {
                
                $value="TestBoPhanSuDung";
                
            }*/
            

            
            
			if ($key != 'mte_a' && $key != 'mte_new_rec' && $key != 'option') {
				if ($in_mte_new_rec) {
					$insert_fields .= " `$key`,";
					$insert_values .= " '" . addslashes(stripslashes($value)) . "',";
				}
				else {
					$updates .= " `$key` = '" . addslashes(stripslashes($value)) . "' ,";
				}
			}
		}
		$insert_fields = substr($insert_fields,0,-1);
		$insert_values = substr($insert_values,0,-1);
		$updates = substr($updates,0,-1);
		

		# new record:
		if ($in_mte_new_rec) {
			$sql =  "INSERT INTO `$this->table` ($insert_fields) VALUES ($insert_values);";	
            //$tset="ljfal";
            //$sql2 = "INSERT INTO `kehoachhc` (`NamHC`,`MaSoMay`) VALUES ($this->namHC,'$temp');";
            //$sql2 .="INSERT INTO `kehoachhc` (`NamHC`,`MaSoMay`) VALUES (2014,'$temp')";   
            
            
            
                    	
		}
		# edit record:
		else {
			$sql = "UPDATE `$this->table` SET $updates WHERE $where LIMIT 1; ";	
            //$sql2="";
            //$sql = "ON UPDATE CASCADE `$this->table` SET $updates WHERE $where LIMIT 1; ";
            //$sql2="UPDATE `kehoachhc` SET  WHERE $where LIMIT 1;";
		}
		
       // if($sql2!='')
		//echo $sql; exit;
        //Neu la INSERT
       // {		
                
                
                
                
                // THEM VAO BANG hososcbd_iso    
                if (mysql_query($sql)) {
                    
                                  
                    
        			if ($in_mte_new_rec) {
        				$saved_id = mysql_insert_id();
        				$_GET['s'] = $saved_id;
        				$_GET['f'] = $this->primary_key;
                        
                       /* // THEM BAO BANG kehoachhc
                        while($row_nam = mysql_fetch_array($result_nam)){
                            $sql2 = "INSERT INTO `kehoachhc` (`NamHC`,`MaSoMay`) VALUES ($row_nam[namHC],'$temp');";
                            mysql_query($sql2);
                        }
                        */
                       
                        
        			}
        			else {
        				$saved_id = $in_id;
        			}
        			if ($this->show_text[$this->primary_key]) {$show_primary_key = $this->show_text[$this->primary_key];}
        				else {$show_primary_key = $this->primary_key;}
        
        			$_SESSION['content_saved_baocaohckd'] = "
        				<div style='width: $this->width_editor'>
        					<div style='padding: 10px; color:#fff; background: #67B915; font-weight: bold'>{$this->text['saved']} </br> Tên Khoa Học $in_TenThietBi </br>  </div>
        				</div>
        				";
        			if ($in_mte_new_rec) {
        				echo "<script>window.location='?start=0&f=&sort=" . $this->primary_key . "&ad=d";
        				if ($this->query_joomla_component) {
        					echo '&option=' . $this->query_joomla_component ;
        				}
        				echo "'</script>";
        			}
        			else {
        				echo "<script>window.location='" . $_SESSION['hist_page_baocaohckd'] . "'</script>";
        			}
        		}
        		else {
        			$this->content = "
        				<div style='width: $this->width_editor'>
        					<div style='padding:2px 20px 20px 20px;margin: 0 0 20px 0; background: #DF0000; color: #fff;'><h3>Lỗi nhập liệu:</h3>" .
        				//	mysql_error() . 'Tset' .
                                 'Tên khoa học này đã tồn tại...' .
        					"</div><a href='{$_SESSION['hist_page_baocaohckd']}'>{$this->text['Go_back']}...</a>
        				</div>";
        		}
         // }
    /*      //else{
            // Neu la EDIT
            if (mysql_query($sql)) {
        			if ($in_mte_new_rec) {
        				$saved_id = mysql_insert_id();
        				$_GET['s'] = $saved_id;
        				$_GET['f'] = $this->primary_key;
        			}
        			else {
        				$saved_id = $in_id;
        			}
        			if ($this->show_text[$this->primary_key]) {$show_primary_key = $this->show_text[$this->primary_key];}
        				else {$show_primary_key = $this->primary_key;}
        
        			$_SESSION['content_saved'] = "
        				<div style='width: $this->width_editor'>
        					<div style='padding: 10px; color:#fff; background: #67B915; font-weight: bold'>{$this->text['saved']} </br> Thiết bị $in_TenThietBi </br> Số Máy $temp</div>
        				</div>
        				";
        			if ($in_mte_new_rec) {
        				echo "<script>window.location='?start=0&f=&sort=" . $this->primary_key . "&ad=d";
        				if ($this->query_joomla_component) {
        					echo '&option=' . $this->query_joomla_component ;
        				}
        				echo "'</script>";
        			}
        			else {
        				echo "<script>window.location='" . $_SESSION['hist_page'] . "'</script>";
        			}
        		}
        		else {
        			$this->content = "
        				<div style='width: $this->width_editor'>
        					<div style='padding:2px 20px 20px 20px;margin: 0 0 20px 0; background: #DF0000; color: #fff;'><h3>Lỗi nhập liệu:</h3>" .
        					//mysql_error() . 'Tset' .
                                'Thiết bị này có số máy đã tồn tại...' .
                                //'Ma thiet bi nay da ton tai...'
        					"</div><a href='{$_SESSION['hist_page']}'>{$this->text['Go_back']}...</a>
                            
        				</div>";
        		}
            
            */
            
            
            
            
            
            
            
         // }
	}




	##########################
	function close_and_print() {
	##########################


		# debug and warning no htaccess
		if ($this->debug) $this->debug .= '<br />';
		//if (!file_exists('./.htaccess') && $this->no_htaccess_warning == 'on') $this->debug .= "{$this->text['Protect_this_directory_with']} .htaccess";
        if (!file_exists('./.htaccess') && $this->no_htaccess_warning == 'on') $this->debug .= "";

		if ($this->debug) 
		$this->debug_html = "
			<div style='width: $this->width_editor'>
				<div class='mte_mess' style='background: #0C3C70'>$this->debug</a></div>
			</div>";

                                                                                                                    
		# save page location
		$session_hist_page = $this->url_script . '?' . $_SERVER['QUERY_STRING'];
		if ($this->query_joomla_component && !preg_match("/option=$this->query_joomla_component/",$session_hist_page)) {
			$session_hist_page .= '&option=' . $this->query_joomla_component;
		}
		
		// no page history on the edit page because after refresh the Go Back is useless 
		if (!$_GET['mte_a']) {
			$_SESSION['hist_page_baocaohckd'] = $session_hist_page;
		}


		
		if ($this->query_joomla_component) $add_joomla = '?option=' . $this->query_joomla_component;
		
		echo "
		<script language='javascript'>
			$this->javascript
		</script>

		<link href='$this->url_base/css/mte.css' rel='stylesheet' type='text/css'>

		<style type='text/css'>
			.mte_content input {
				width: $this->width_input_fields;
			}
			.mte_content textarea {
				width: $this->width_text_fields;
				height: $this->height_text_fields;
			}
		</style>	

		<div class='mte_content'>
			<div class='mte_head_1'><a href='$this->url_script$add_joomla' style='text-decoration: none;color: #707070'>
           </a> <span style='color: #ddd'>$this->version</span></div>
			$this->nav_top
			$this->debug_html
			$this->content_saved
			$this->content_deleted
			$this->content
		</div> 
		
		<div>
		<br/>
		
		</div>
		";	
		
	}  
}
?>
