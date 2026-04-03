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


	# Forget this - working on it...
	# needed in Joomla for images/css, example: 'http://www.website.com/administrator/components/com_componentname'
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
		$query_string .= '&s=' . $_GET['s']  . '&f=' . $_GET['f'] . '&from=' . $_GET['from']  . '&to=' . $_GET['to'] ;
		
		
		# search
		if ($_GET['s'] && $_GET['f']) {

			$in_search = addslashes(stripslashes($_GET['s']));
			$in_search_field = $_GET['f'];
			$where_search = "and $in_search_field LIKE '%$in_search%' ";
		}
		if ($_GET['from'] && $_GET['to']){
			$from = $_GET['from'];
			$to = $_GET['to'];
			echo"<Span class=\"printspan\"><center>Từ ngày: $from &nbsp; &nbsp; &nbsp;  Đến ngày: $to</center></br></span>";
			for ($i=0;$i<=strlen($from);$i++) {
			$p = stripos($from,"/") ;

			if ($i== 0) {
			$dfrom = trim (substr($from,0,$p)) ;
			} 	
			if ($i== 1) {
			$mfrom = trim (substr($from,0,$p)) ;
			} 	
			if ($i== 2) {
			$yfrom = trim ($from) ;
			} 	
			$p++ ;
			$from = substr($from,$p);
				}
			for ($i=0;$i<=strlen($to);$i++) {
			$p = stripos($to,"/") ;

			if ($i== 0) {
			$dto = trim (substr($to,0,$p)) ;
			} 	
			if ($i== 1) {
			$mto = trim (substr($to,0,$p)) ;
			} 	
			if ($i== 2) {
			$yto = trim ($to) ;
			} 	
			$p++ ;
			$to = substr($to,$p);
				}
			$month_string  = "WHERE ngaygui BETWEEN '$yfrom-$mfrom-$dfrom' AND '$yto-$mto-$dto' ";
		}else{	
			$m = date('m');
			$y = date('Y');
			$month_string = "WHERE ngaygui BETWEEN '$y-$m-01' AND '$y-$m-31'";
		}	
        
		$sql="SELECT `stt`,`tenviettat`,`pn`,`ngaygui`,`nguoigui`,`soluong`,`ghichu` FROM `nhapxuat_iso` $month_string $where_search ";
		$result = mysql_query($sql);
		# navigation 2/3
		$hits_total = mysql_num_rows($result); 
		$sql .= " LIMIT $start, $this->num_rows_list_view";
		$result = mysql_query($sql);
	        $stt=0;	
		if (mysql_num_rows($result)>0) {
			$count = 0;
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
                                $head .= "<td visibility:collapse><span style=\"font-weight:bold;\"></span></td>";
                            }else{
                                
                               
					if($key=="ngaygui") if ($value=="00/00/0000") $value="";
				    
					    $head .= "<td NOWRAP><a href='$this->url_script?$query_sort' class='mte_head'>$show_key</a> $sort_image</td>";
			    }
						}
						if ($key == $this->primary_key) {
							$buttons = "<td NOWRAP  style='border:0px solid white'><div class=\"noprint\"><a href='javascript:void(0)' onclick='del_confirm($value)' title='Delete {$this->show_text[$key]} $value'><IMG SRC='$this->url_base/images/del.png' WIDTH=16 HEIGHT=16 BORDER=0 ALT=''></a>
                                        &nbsp;<a href='?$query_string&mte_a=edit&id=$value' title='Edit {$this->show_text[$key]} $value'><IMG SRC='$this->url_base/images/edit.png' WIDTH=16 HEIGHT=16 BORDER=0 ALT=''></a></div></td>";
                            
						}
						else {
								
							if($key=="tenviettat"){
							$this_row .= "<td><a href='bangchitiet.php?tenviettat=$value' style='color:blue'>" . substr(strip_tags($value), 0, 300) . '</a></td>';
							}else if($key=="ngaygui"){
								$newDate = date("d-m-Y", strtotime($value));
							$this_row .= '<td>' . substr(strip_tags($newDate), 0, 300) . '</td>';	
								
							}else
	
								$this_row .= '<td>' . substr(strip_tags($value), 0, 300) . '</td>';
						}
					}
				}
				
				$rows .= "<tr style='background:$background'>$buttons $this_row</tr>";
				
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
            
		    if ($option == $in_search_field) {
						$options .= "<option selected value='$option'>$show_option</option>";
				}
		    else {
		    			if (($option=="stt")||($option=="soluong")||($option=="ngaygui")){}else 
					$options .= "<option value='$option'>$show_option</option>";
			}
			}
		$in_search_value = htmlentities(trim(stripslashes($_GET['s'])), ENT_QUOTES);
		$seach_form = "
		        <div class=\"noprint\"> 
			<table cellspacing=0 cellpadding=0 border=0>
			<tr>
				<td nowrap>
					<form method=get action='$this->url_script' style='padding: 15px' name=\"example\">
						<select name='f'>$options</select> 
						<input type='text' name='s' value='$in_search_value' style='width:200px'>";
		
		if ($this->query_joomla_component) $seach_form .= "<input type='hidden' value='$this->query_joomla_component' name='option'>";
		$from=$_GET['from'];
		$to=$_GET['to'];
		$f=$_GET['f'];
		$s=$_GET['s'];
		$submit=$_GET['submit'];
		$curm=date("m");
		$cury=date("Y");
		$d=cal_days_in_month(CAL_GREGORIAN,$curm,$cury);
		if ($from=="") $ngayfrom="01/$curm/$cury"; else $ngayfrom=$from;
		if ($to=="") $ngayto="$d/$curm/$cury";else $ngayto=$to;
		$seach_form .= "
				</td>
				<td style='padding: 15px; width: $this->width_editor'>
					<input name=\"from\" style='width:150px' type=\"text\" value=\"$ngayfrom\" />
				        <A HREF=\"#\" onClick=\"cal.select(document.forms['example'].from,'anchor1','dd/MM/yyyy'); return false;\"
					NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A>
					<input name=\"to\" style='width:150px' type=\"text\" value=\"$ngayto\" />
					<A HREF=\"#\" onClick=\"cal.select(document.forms['example'].to,'anchor1','dd/MM/yyyy'); return false;\"
					NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A>
					<input name ='submit' type='submit' value='Tìm kiếm' style='width:130px; border: 1px solid #000'>
					</form></td>
			</tr>
			</table>
			</div>
			";
		 
        
        $this->javascript = "
			
            function info_confirm(id) {
                   
                  window.location='download.php?hoso=' + id
			}    
            
            function del_confirm(id) {
				               
                if (confirm('Bạn muốn xóa Số Máy này...?')) {
					window.location='$this->url_script?$query_string&mte_a=del&id=' + id				
				}
			}
			
			function document_confirm(id) {
                   
                  window.location='filebctk.php?ID_HoSoKiemDinh=' + id
			}    
            
		";
		# page content
		$this->content = "
			<div style='width: $this->width_editor;background:#20517b; margin: 0'>$seach_form</div>
			<table border=1 BORDERCOLOR=black cellspacing=0 cellpadding=10 style='margin: 0; width: $this->width_editor;'>
				<tr style='background:#5299c6; color: #fff ;border:1px solid black'>$head</tr>
				$rows
			</table>
                                                        
			$this->nav_bottom
		";
		
		
	}

	##################
	function del_rec() {
	##################

		$in_id = $_GET['id'];
        $in_sql=mysql_query("SELECT `tenviettat`,`pn` FROM `nhapxuat_iso` WHERE `stt`='$in_id'");
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
		if($show_key=="NGƯỜI XUẤT"){
		$donvi="chuẩn chỉnh máy địa vật lý";
                $in_sql="SELECT hoten,danhso FROM resume where donvi like'%$donvi%' and nghiviec !='yes'";
                $in_result=mysql_query($in_sql);
               
                while($row = mysql_fetch_array($in_result))
		{
                        if($row[hoten]==$value)
                            $options .= "<option selected value='$row[hoten]'>$row[danhso]-$row[hoten]</option>"; 
                        else
                            $options .= "<option value='$row[hoten]'>$row[danhso]-$row[hoten]</option>"; 
                
                    }
               $field = "<select name='$key' $style $field_id><option  value=''></option>$options</select>";
                
	    }
            if($key=="ngaygui")

	    { 
		    if (($value=="")||($value=="0000-00-00")) $value="";
		    else $value = date("d/m/Y",strtotime("$value")); 
		    $field = "<input name='ngaygui'  type='text' value=\"$value\">
				       <A HREF=\"#\" onClick=\"cal.select(document.forms['example'].ngaygui,'anchor1','dd/MM/yyyy'); return false;\"
					NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A>"; 
                } 
        
            if($show_key!="active")   
            {
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
							<button onclick='window.location=\"baocaolinhkien.php\";' style='margin: 20px 15px 25px 15px; border: 1px solid #000;'>{$this->text['Go_back']}</button></td>
						<td>
							<form method=post enctype=\"multipart/form-data\" action='$this->url_script' onsubmit='return submitform()' name=\"example\">
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
							<button onclick='window.location=\"{$_SESSION['hist_page_baocaothongke']}\";' style='margin: 20px 15px 25px 15px; border: 1px solid #000;'>{$this->text['Go_back']}</button></td>
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
		$in_mte_new_rec=1;
		$updates = '';
		
        foreach($_POST AS $key => $value) {
			if ($key == $this->primary_key) {
				$in_id = $value;
				$where = "$key = $value";
			}
            if($key=="ngaygui")
            {
                for ($i=0;$i<=strlen($value);$i++) {
			$p = stripos($value,"/") ;

		if ($i== 0) {
			$ngays = trim (substr($value,0,$p)) ;
		} 	
		if ($i== 1) {
			$thangs = trim (substr($value,0,$p)) ;
		} 	
		if ($i== 2) {
			$nams = trim ($value) ;
		} 	
			$p++ ;
			$value = substr($value,$p);
		}
		$value="$nams-$thangs-$ngays";		    
	    }
	    if ($key=="tenviettat")
            {
                $in_mavt=$value;
            }
            if ($key=="pn")
            {
                $in_somay=$value;
            }
	    if($key !="mte_a") 
	    $updates .= " `$key` = '" . addslashes(stripslashes($value)) . "' ,";
	}
		$updates = substr($updates,0,-1);

		# edit record:
	
		$sql = "UPDATE `$this->table` SET $updates WHERE $where LIMIT 1";
		
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
        					<div style='padding: 10px; color:#fff; background: #67B915; font-weight: bold'>{$this->text['saved']} </br> Thiết bị $in_mavt </br> Số Serial Number $in_somay </div>
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
                                 'Thiết bị này đã tồn tại...' .
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
			$_SESSION['hist_page_baocaothongke'] = $session_hist_page;
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
		</div>"; 
		
	}  
}

/*error_reporting('E_ALL & ~E_NOTICE ~E_WARNING');
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
	# Forget this - working on it...
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
		require_once("./lang/en.php");
		require_once("./lang/" . $this->language . ".php");
		# No cache
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
			$order_by = "ORDER by stt ";	
		}
		# navigation 1/3
		$start = $_GET["start"];
		if (!$start) {$start = 0;} else {$start *=1;}
		if ($this->query_joomla_component) $query_string = '&option=' . $this->query_joomla_component ;
		// navigation
		$query_string .= '&start=' . $start;
		// sorting
		$query_string .= '&ad=' . $_GET['ad']  . '&sort=' . $_GET['sort'] ;
		// searching
		$query_string .= '&s=' . $_GET['s']  . '&f=' . $_GET['f'] . '&n=' . $_GET['n']  . '&v=' . $_GET['v'] ;
		# search
		if ($_GET['s'] && $_GET['f']) {

			$in_search = addslashes(stripslashes($_GET['s']));
			$in_search_field = $_GET['f'];
			$where_search = "and $in_search_field LIKE '%$in_search%' ";
		}
		if ($_GET['from'] && $_GET['to']){
			$from = $_GET['from'];
			$to = $_GET['to'];
			for ($i=0;$i<=strlen($from);$i++) {
			$p = stripos($from,"/") ;

			if ($i== 0) {
			$dfrom = trim (substr($from,0,$p)) ;
			} 	
			if ($i== 1) {
			$mfrom = trim (substr($from,0,$p)) ;
			} 	
			if ($i== 2) {
			$yfrom = trim ($from) ;
			} 	
			$p++ ;
			$from = substr($from,$p);
				}
			for ($i=0;$i<=strlen($to);$i++) {
			$p = stripos($to,"/") ;

			if ($i== 0) {
			$dto = trim (substr($to,0,$p)) ;
			} 	
			if ($i== 1) {
			$mto = trim (substr($to,0,$p)) ;
			} 	
			if ($i== 2) {
			$yto = trim ($to) ;
			} 	
			$p++ ;
			$to = substr($to,$p);
				}
			$month_string  = "WHERE ngaygui BETWEEN '$yfrom-$mfrom-$dfrom 00:00:00' AND '$yto-$mto-$dto 00:00:00' ";
		}else{	
			$m = date('m');
			$y = date('Y');
			$month_string = "WHERE ngaygui BETWEEN '$y-$m-01 00:00:00' AND '$y-$m-31 00:00:00'";
		}	
		
		//	$sql="SELECT `stt`,`tenviettat`,`left(tenviettat,2) as tenmota`,`pn`,`date_format(`ngaygui`,'%d/%m/%Y') as ngaygui`,`nguoigui`,`soluong`,`ghichu`,`left(tenviettat,2) as tlkt` FROM `nhapxuat_iso` $month_string $where_search ";
		$sql="SELECT `stt`,`ngaygui`,`nguoigui`,`ghichu`,`tenviettat`,`soluong`,`pn`  FROM `nhapxuat_iso`";
//	$sql=	"SELECT * FROM `nhapxuat_iso`"; 
	//	echo $sql;
	//	exit;
		$result = mysql_query($sql);
		# navigation 2/3
		$hits_total = mysql_num_rows($result); 
		$sql .= " LIMIT $start, $this->num_rows_list_view";
		$result = mysql_query($sql);
		if (mysql_num_rows($result)>0) {
			$count = 0;
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
							$query_sort = preg_replace('/&(sort|ad)=[^&]','', $query_string) . "&sort=$key&ad=$ad";	

                            if($key==$this->primary_key){
                                //$head .= "<td visibility:collapse></td>";
			    }
			    else {
				    if($key=="ngaygui") if ($value=="00/00/0000") $value="";
				    if ($key=="tlkt") 
					    $head .= "<td NOWRAP style='border:0px solid white;border-bottom:1px solid black'><a href='$this->url_script?$query_sort' class='mte_head'><div class=\"noprint\">$show_key</div></a> $sort_image</td>";
				    else
					    $head .= "<td NOWRAP><a href='$this->url_script?$query_sort' class='mte_head'>$show_key</a> $sort_image</td>";
			    }
						}
						if ($key == $this->primary_key) {
							$buttons = "<td NOWRAP  style='border:0px solid white'><div class=\"noprint\"><a href='javascript:void(0)' onclick='del_confirm($value)' title='Delete {$this->show_text[$key]} $value'><IMG SRC='$this->url_base/images/del.png' WIDTH=16 HEIGHT=16 BORDER=0 ALT=''></a>
                                        &nbsp;<a href='?$query_string&mte_a=edit&id=$value' title='Edit {$this->show_text[$key]} $value'><IMG SRC='$this->url_base/images/edit.png' WIDTH=16 HEIGHT=16 BORDER=0 ALT=''></a>&nbsp;<a href='?$query_string&mte_a=copy&id=$value' title='Copy {$this->show_text[$key]} $value'><IMG SRC='$this->url_base/images/copy.png' WIDTH=16 HEIGHT=16 BORDER=0 ALT=''></a></div></td>";
						}
						else {
							if($key=="tenviettat"){
							$mavt=$value;	
							$this_row .= "<td><a href='bangchitiet.php?tenviettat=$value' style='color:blue'>" . substr(strip_tags($value), 0, 300) . '</a></td>';
							}elseif ($key=='pn') {
								$this_row .= '<td>' . substr(strip_tags($value), 0, 300) . '</td>';
								$pn=$value;
							}
							elseif ($key=='tenmota') {
							$r6=mysql_query("SELECT tenmota FROM linhkien_iso WHERE tenviettat='$mavt' and pn='$pn'");
							while($row = mysql_fetch_array($r6))
							{
							$temmota =$row['tenmota'];	
							}
							$this_row .= "<td style='background:#DC143C'>" . substr(strip_tags($temmota), 0, 300) . '</td>';
							}
							elseif($key=="tlkt"){
							 	
								$this_row .="<td style='border:0px solid white;border-bottom:1px solid black'><a  href='download.php?mavttlkt=$mavt'  title='TLKT' ><span style=\"color:blue;\"><div class=\"noprint\">download</div></span></a></td>";
							}else
	
								$this_row .= '<td>' . substr(strip_tags($value), 0, 300) . '</td>';
						}
					}
				}
				
				$rows .= "<tr style='background:$background'>$buttons $this_row</tr>";
				
			}
		}
		else {
			$head = "<td style='padding:50px'>{$this->text['Nothing_found']}...</td>";
		}

		
		# navigation 3/3

		# remove start= from url
		$query_nav = preg_replace('/&(start|mte_a|id)=[^&]','', $query_string );	


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
            
		    if ($option == $in_search_field) {
						$options .= "<option selected value='$option'>$show_option</option>";
				}
		    else {
		    			if (($option=="stt")||($option=="soluong")||($option=="ngaygui")){}else 
					$options .= "<option value='$option'>$show_option</option>";
			}
			}
		$in_search_value = htmlentities(trim(stripslashes($_GET['s'])), ENT_QUOTES);
		$seach_form = "
		        <div class=\"noprint\"> 
			<table cellspacing=0 cellpadding=0 border=0>
			<tr>
				<td nowrap>
					<form method=get action='$this->url_script' style='padding: 15px' name=\"example\">
						<select name='f'>$options</select> 
						<input type='text' name='s' value='$in_search_value' style='width:200px'>";
		
		if ($this->query_joomla_component) $seach_form .= "<input type='hidden' value='$this->query_joomla_component' name='option'>";
		$from=$_GET['from'];
		$to=$_GET['to'];
		$f=$_GET['f'];
		$s=$_GET['s'];
		$submit=$_GET['submit'];
		$curm=date("m");
		$cury=date("Y");
		$d=cal_days_in_month(CAL_GREGORIAN,$curm,$cury);
		if ($from=="") $ngayfrom="01/$curm/$cury"; else $ngayfrom=$from;
		if ($to=="") $ngayto="$d/$curm/$cury";else $ngayto=$to;
		$seach_form .= "
				</td>
				<td style='padding: 15px; width: $this->width_editor'>
					<input name=\"from\" style='width:150px' type=\"text\" value=\"$ngayfrom\" />
				        <A HREF=\"#\" onClick=\"cal.select(document.forms['example'].from,'anchor1','dd/MM/yyyy'); return false;\"
					NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A>
					<input name=\"to\" style='width:150px' type=\"text\" value=\"$ngayto\" />
					<A HREF=\"#\" onClick=\"cal.select(document.forms['example'].to,'anchor1','dd/MM/yyyy'); return false;\"
					NAME=\"anchor1\" ID=\"anchor1\"><img src=\"upload/calendar.gif\" ></A>
					<input name ='submit' type='submit' value='Tìm kiếm' style='width:130px; border: 1px solid #000'>
					</form></td>
			</tr>
			</table>
			</div>
			";
		 
        
        $this->javascript = "
			
            function info_confirm(id) {
                   
                  window.location='download.php?hoso=' + id
			}    
            
            function del_confirm(id) {
				               
                if (confirm('Bạn muốn xóa Số Máy này...?')) {
					window.location='$this->url_script?$query_string&mte_a=del&id=' + id				
				}
			}
			
			function document_confirm(id) {
                   
                  window.location='filebctk.php?ID_HoSoKiemDinh=' + id
			}    
            
		";
		# page content
		$this->content = "
			<div style='width: $this->width_editor;background:#20517b; margin: 0'>$seach_form</div>
			<table border=1 BORDERCOLOR=black cellspacing=0 cellpadding=10 style='margin: 0; width: $this->width_editor;'>
				<tr style='background:#5299c6; color: #fff ;border:1px solid black'>$head</tr>
				$rows
			</table>
                                                        
			$this->nav_bottom
		";
		
		
	}
	##########################
	function close_and_print() {
	##########################


		# debug and warning no htaccess
		if ($this->debug) $this->debug .= '<br />';
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
			$_SESSION['hist_page_baocaothongke'] = $session_hist_page;
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
		";
	}  
}
 */
?>
