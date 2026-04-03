<?php

error_reporting('E_ALL & ~E_NOTICE ~E_WARNING');
// no direct access
if(strtolower(basename($_SERVER['PHP_SELF'])) == strtolower(basename(__FILE__))) {
	die('No access...');
}


class MySQLtabledit {
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
	var $url_base;
	# needed in Joomla, example: 'option=com_componentname' 
	var $query_joomla_component;

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
			$order_by = "ORDER by $this->primary_key DESC";	
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
		$query_string .= '&s=' . $_GET['s']  . '&f=' . $_GET['f'] . '&v=' . $_GET['v'] ;
			# search
		if ($_GET['s']!="") {
                     
			$in_search = addslashes(stripslashes($_GET['s']));
			$in_search_field = $_GET['f'];
			$where_search = "and $in_search_field LIKE '%$in_search%' ";
		}
		if ($_GET['v']){
			$field = addslashes(stripslashes($_GET['n']));
			$v =  $_GET['v'];
			$y = date('Y');
			$month_string  = "WHERE ngayyc BETWEEN '$y-$v-01 00:00:00' AND '$y-$v-31 00:00:00' ";
				
		}else{	
			$m = date('m');
			$y = date('Y');
			$month_string = "WHERE ngayyc BETWEEN '$y-$m-01 00:00:00' AND '$y-$m-31 00:00:00'";
		 }	
        		$sql="SELECT `stt`, `mavt`,`somay`,date_format(`ngayyc`,'%d-%m-%Y') as ngayyc ,`hoso`,date_format(`ngayth`,'%d-%m-%Y') as ngayth,date_format(`ngaykt`,'%d-%m-%Y') as ngaykt, `ngth`,left(ngaykt,2) as tiendo,  `nhomsc`, `ghichu` ,`ttktafter`,`bg` FROM `hososcbd_iso` $month_string $where_search  $order_by";
        
        
		$result = mysql_query($sql);

		# navigation 2/3
		$hits_total = mysql_num_rows($result); 

		$sql .= " LIMIT $start, $this->num_rows_list_view";
		$result = mysql_query($sql);


		if (mysql_num_rows($result)>0) {
			$count = 0;
			$stt=0;
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
                               $head .= "<td visibility:collapse>STT</td>";
                            }
							else
                                     
                                $head .= "<td NOWRAP><a href='$this->url_script?$query_sort' class='mte_head'>$show_key</a> </td>";
						} 
						if ($key == $this->primary_key) {
						
                           //$link = "<a href='javascript:void(0)' onclick='info_confirm($value)' style='text-decoration:none;color:blue'>";  
                           $stt++;
                           //$this_row .= "<td><p style='visibility:hidden'</p></td>";
                           $this_row .= "<td>$stt</td>";
                            	
						}
						else {
							 
						
							if($key=="ngayth")  {
								 $ngayth = $value;
								 if($ngayth=="00-00-0000") $value="";
								 
							 }
							 if($key=="ngaykt")  {
							    $ngaykt =  $value;
							    if($ngaykt=="00-00-0000") $value="";
							 }	
						
							 $ttktafter = $rij['ttktafter'];
							

							 if($key=="tiendo"){
							 	if($ngayth=="00-00-0000"&&$ngaykt=="00-00-0000"){  
									$bkcanhbao = '#FFD700' ;
									$td = "Máy đang chờ sửa chữa ";	
								}
							    if($ngayth!="00-00-0000"&&$ngaykt=="00-00-0000"){
									$bkcanhbao = '#FFD700';
								    $td = "Máy đang Sửa chữa";
								}
							 	if($ngayth!="00-00-0000"&&$ngaykt!="00-00-0000"){
									$bkcanhbao = '#00BFFF';
									$td = "Máy đã sửa chữa xong";	
								}
								if($ttktafter=="Hỏng") {
									$bkcanhbao = '#DC143C';
									$td = "Máy hỏng không khắc phục được ";
								}
								if($ttktafter=="Chờ vật tư thay thế") {
									$bkcanhbao = '#FFD700';
									$td = "Máy đang chờ phụ tùng thay thế ";
								}
							
						
								//$this_row .= '<td>' $text '</td>';
								 $this_row .= ' <td> ' . $td  .' </td>';
							 }elseif($key=="mavt"){
							 	$mavt=$value;
								$this_row .="<td><a href='TLKT/$mavt'  title='TLKT' ><span style=\"color:blue;\">$mavt</span></a></td>";
								//$this_row .= "<td> ". $link . $value  ." </td>";
								
							 }else if($key=="hoso"){
								 $hoso= $value;
								$this_row .="<td><a href='formsc.php?readhoso=$hoso'  title='Hosomay' ><span style=\"color:blue;\">$hoso</span></a></td>";                            }
							 else
								 $this_row .= '<td>' . substr(strip_tags($value), 0, 300) . '</td>';
						}
					}
				}
				
			$rows .= "<tr style='background:$bkcanhbao'>$buttons $this_row</tr>";

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
				$navigation .= "<td class='mte_nav' style='background: #fff'><A HREF='$this->url_script?$query_nav&start=$nav_toon'>$f</A></td>"; 
			}
		}
		if ($hits_total<$this->num_rows_list_view) { $navigation = '';}

		# Previous if
		if ($this_page > 1) {
			$last =  (($this_page - 1) * $this->num_rows_list_view ) - $this->num_rows_list_view;
			$last_page_html = "<A HREF='$this->url_script?$query_nav&start=$last' class='mte_nav_prev_next'>{$this->text['Previous']}</A>";
		}

		# Next if: 
		if ($this_page != $last_page && $hits_total>1) {
			$next =  $start + $this->num_rows_list_view;
			$next_page_html =  "<A HREF='$this->url_script?$query_nav&start=$next' class='mte_nav_prev_next'>{$this->text['Next']}</A>";
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
/*
			$this->nav_top = "

				<div style='margin: -10px 0 20px 0;width: $this->width_editor'>
				<center>
					$nav_table
				</center>
				</div>	
			";
*/
			$this->nav_bottom = "
				<div style='margin: 20px 0 0 0;width: $this->width_editor'>
				<center>
					$nav_table
				</center>
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

	echo"<table style=\"align:right;width:100%;background:white;\">
		   <tr>
			<td style='height:25px;padding-right: 15px; text-align: right; width: $this->width_editor'><a href='report/view1rpt.php' title='Xuất báo cáo'>
		
			</td>
			</tr>
			</table>";

		$seach_form = "
		        <div class=\"noprint\"> 
			<table cellspacing=0 cellpadding=0 border=0>
			<tr>
				<td nowrap>
					<form method=get action='$this->url_script' style='padding: 15px'>
						<select name='f'>$options</select> 
						<input type='text' name='s' value='$in_search_value' style='width:200px'>";
						//<input type='submit' value='{$this->text['Search']}' style='width:80px; border: 1px solid #000'>"; 
		
		if ($this->query_joomla_component) $seach_form .= "<input type='hidden' value='$this->query_joomla_component' name='option'>";
		$v=$_GET['v'];
	        if ($v=="") 	
			$curm=date("m");
		else    $curm=$v;	
		$seach_form .= "
				</td>
				<form method=get action='$this->url_script' style='padding: 15px'>
				<td style='padding: 15px;  width: $this->width_editor'>
			
						<select name='v' style='width:200px'>  
						<option value=\"$curm\"> Tháng $curm </option>
						<option value=\"1\"> Tháng 1 </option>
						<option value=\"2\"> Tháng 2 </option>
						<option value=\"3\"> Tháng 3 </option>
						<option value=\"4\"> Tháng 4 </option>
						<option value=\"5\"> Tháng 5 </option>
						<option value=\"6\"> Tháng 6 </option>
						<option value=\"7\"> Tháng 7 </option>
						<option value=\"8\"> Tháng 8 </option>
						<option value=\"9\"> Tháng 9 </option>
						<option value=\"10\"> Tháng 10 </option>
						<option value=\"11\"> Tháng 11 </option>
						<option value=\"12\"> Tháng 12 </option>
						</select>
						<input type='submit' value='Xuất báo cáo' style='width:100px; border: 1px solid #000'>
			"; 	
		$seach_form .= "</td> </form></tr></table>";
						
        $this->javascript = "
			
            function info_confirm(id) {
                   
                  window.location='filetdcv.php?ID_HoSoKiemDinh=' + id
			}    
            
            function del_confirm(id) {
				               
                
                if (confirm('Bạn muốn xóa Số Máy này...?')) {
					window.location='$this->url_script?$query_string&mte_a=del&id=' + id				
				}
			}
		";
        
		# page content
		$this->content = "
			<div style='width: $this->width_editor;background:#20517b; margin: 0'>$seach_form</div>
			<table cellspacing=0 cellpadding=10 style='margin: 0; width: $this->width_editor;'>
				<tr style='background:#5299c6; color: #fff'>$head</tr>
				$rows
			</table>
                                                        
			$this->nav_bottom
		";
		
		
	}

	##################
	function del_rec() {
	##################

		$in_id = $_GET['id'];
        $in_sql=mysql_query("SELECT `tenvt`,`somay` FROM `thietbi_iso` WHERE `stt`='$in_id'");
        $in_SoMay=mysql_fetch_array($in_sql);
        //$in_SoMay='TseT';
		if (mysql_query("DELETE FROM $this->table WHERE `$this->primary_key` = '$in_id'")) {
			$this->content_deleted = "
				<div style='width: $this->width_editor'>
					<div style='padding: 10px; color:#fff; background: #FF8000; font-weight: bold'>{$this->text['deleted']} </br> Thiết bị $in_SoMay[0] </br> Số Máy $in_SoMay[1] </div>
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
		echo $this->username;
		
		
		
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
					else {
						$field = "<input type='text' name='$key' value='$value_htmlentities' maxlength='{$matches[1]}' $style $readonly $field_id>";
					}
				}
			}
			# blob: don't show
			elseif (preg_match("/blob/", $field_kind)) {
				$field = '[<i>binary</i>]';
			}
	       
           
           
            /////////////////////////////////////////////////////////////////////////////////////
            
            if ($background == '#eee') {$background='#fff';} 
				else {$background='#eee';}
			if ($this->show_text[$key]) {$show_key = $this->show_text[$key];}
				else {$show_key = $key;}
		
            //    LOAD DU LIEU BO PHAN


            if($show_key=="Bộ Phận"){
                $in_sql="SELECT `tendv` FROM `DonVi_ISO`";
                $in_result=mysql_query($in_sql);
               
                while($row = mysql_fetch_array($in_result))
                    {
                        if($row[tendv]==$value)
                            $options .= "<option selected value='$row[tendv]'>$row[tendv]</option>"; 
                        else
                            $options .= "<option value='$row[tendv]'>$row[tendv]</option>"; 
                
                
                    }
               //$options .= "<option value='other'>other</option>";      
               $field = "<select name='$key' $style $field_id>$options</select>";
                
            }
            
        
            if($show_key!="active")   // Dong muon an di
            {
                if($show_key=="Ngày k/đ")
                {   
                    //$field="<input type='date' name='$key' value=$value>";
                    //$rows .= "\n\n<tr style='background:$background'>\n<td><b>$show_key</b></td>\n<td>$field</td>\n<td style='width:50%'>{$this->help_text[$key]}</td>\n</tr>";
                    //$field="";    
                    //$show_key="";
                }
                elseif($show_key=="Ngày k/đ tiếp")
                {    //$field="<input type='date' name='$key' value=$value>";
                        //$field="";    
                        //$show_key="";
                }
                else 
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
							<button onclick='window.location=\"{$_SESSION['hist_page']}\";' style='margin: 20px 15px 25px 15px; border: 1px solid #000;'>{$this->text['Go_back']}</button></td>
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
                if($show_key=="Ngày đã kiểm định")
                    $field="<input type='date' name='$key' value=$value>";
                if($show_key=="Ngày kiểm định tiếp")
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
							<button onclick='window.location=\"{$_SESSION['hist_page']}\";' style='margin: 20px 15px 25px 15px; border: 1px solid #000;'>{$this->text['Go_back']}</button></td>
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
        foreach($_POST AS $key => $value) {
			if ($key == $this->primary_key) {
				$in_id = $value;
				$where = "$key = $value";
			}
            if ($key=="somay")
            {
                $temp=$value;               // GIU LAI MASOMAY DE THONG BAO SAU KHI UPDATE HOAC EDIT
            }
            if ($key=="tenvt"){

                $in_TenThietBi=$value;        // GIU LAI TEN THIET BI DE THONG BAO SAU KHI UPDATE HOAC EDIT              
            }
            
            
            if ($key=="mavt")
            {
                $in_mavt=$value;
            }
            
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
		
		$check=0;
		
		# new record:
		if ($in_mte_new_rec) {
			$result=mysql_query("SELECT * FROM `$this->table`");
			//$result = mysql_query("SELECT `SoMay`,`MaHieu` FROM `$this->table` $where_edit LIMIT 1 ;");
            while ($rij = mysql_fetch_array($result))
			{
				if($in_mavt== $rij['mavt']&&$temp==$rij['somay'])	
						$check=1;
			} 
			if($check==0){
				$sql =  "INSERT INTO `$this->table` ($insert_fields) VALUES ($insert_values);";	
            //$tset="ljfal";
            //$sql2 = "INSERT INTO `kehoachhc` (`NamHC`,`MaSoMay`) VALUES ($this->namHC,'$temp');";
            //$sql2 .="INSERT INTO `kehoachhc` (`NamHC`,`MaSoMay`) VALUES (2014,'$temp')";   
            }
		}
		# edit record:
		else {
			$sql = "UPDATE `$this->table` SET $updates WHERE $where LIMIT 1; ";	
		}
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
        					<div style='padding: 10px; color:#fff; background: #67B915; font-weight: bold'>{$this->text['saved']} </br> Thiết bị $in_TenThietBi </br> Số Máy $temp </div>
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
        				//	mysql_error() . 'Tset' .
                                 'Số máy này đã tồn tại...' .
        					"</div><a href='{$_SESSION['hist_page']}'>{$this->text['Go_back']}...</a>
        				</div>";
        		}
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
			$_SESSION['hist_page'] = $session_hist_page;
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
		<br/>
	        <p  style=\"color:red;font-size: 15;margin-left:15px\">0: Chưa bàn giao</p>	
	        <p  style=\"color:red;font-size: 15;margin-left:15px\">1: Đã bàn giao</p>";	
 	/*	echo"<form method=post action='index.php'>
		<input type=hidden name=username value=\"$_SESSION[username]\">
		<input type=hidden name=password value=\"$_SESSION[password]\">
  		<input type=hidden name=\"submit\" value=\"Tiến độ công việc\">
 		<button style='margin: 0 0 15px 15px; border: 1px solid #000;'>Quay lại trang chủ</button>
  		</form> 
		";*/	
	}  
}
?>
