<?php
class Calendar {  
     
    /**
     * Constructor
     */
    public function __construct(){     
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
    }
     
    /********************* PROPERTY ********************/  
    private $dayLabels = array("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
     
    private $currentYear=0;
     
    private $currentMonth=0;
     
    private $currentDay=0;
     
    private $currentDate=null;
     
    private $daysInMonth=0;
     
    private $naviHref= null;
     
    /********************* PUBLIC **********************/  
        
    /**
    * print out the calendar
    */
    public function show() {
        $year  == null;
         
        $month == null;
        $post =  $_POST['post'] ; 
        if(null==$year&&isset($_GET['year'])){
 
            $year = $_GET['year'];
         
        }else if(null==$year){
 
            if ($post=="post") {
			$year =  $_POST['year'] ;
		}else{

			$year = date("Y",time());  
		}  
         
        }          
         
        if(null==$month&&isset($_GET['month'])){
 
            $month = $_GET['month'];
         
        }else if(null==$month){
 
            if ($post=="post") {
			$month =  $_POST['month'] ;
		}else{

 
            $month = date("m",time());
		} 
         
        }                  
         
        $this->currentYear=$year;
         
        $this->currentMonth=$month;
         
        $this->daysInMonth=$this->_daysInMonth($month,$year);  
         
        $content='<div id="calendar">'.
                        '<div class="box">'.
                        $this->_createNavi().
                        '</div>'.
                        '<div class="box-content">'.
                                '<ul class="label">'.$this->_createLabels().'</ul>';   
                                $content.='<div class="clear"></div>';     
                                $content.='<ul class="dates">';    
                                 
                                $weeksInMonth = $this->_weeksInMonth($month,$year);
                                // Create weeks in a month
                                for( $i=0; $i<$weeksInMonth; $i++ ){
                                     
                                    //Create days in a week
                                    for($j=1;$j<=7;$j++){
                                        $content.=$this->_showDay($i*7+$j);
                                    }
                                }
                                 
                                $content.='</ul>';
                                 
                                $content.='<div class="clear"></div>';     
             
                        $content.='</div>';
                 
        $content.='</div>';
        return $content;   
    }
    /**
    * print out the chamcong
    */
    public function showchamcong() {
        $year  == null;
         
	$month == null;
     
	$post =  $_POST['post'] ;
        if(null==$year&&isset($_GET['year'])){
 
            $year = $_GET['year'];
         
        }else if(null==$year){
		if ($post=="post") {
			$year =  $_POST['year'] ;
		}else{

			$year = date("Y",time());  
		}
         
        }          
         
        if(null==$month&&isset($_GET['month'])){
 
            $month = $_GET['month'];
         
        }else if(null==$month){
		if ($post=="post") {
			$month =  $_POST['month'] ;
		}else{

 
            $month = date("m",time());
		} 
        }                  
        $this->currentDay=0; 
        $this->currentYear=$year;
         
        $this->currentMonth=$month;
         
	$this->daysInMonth=$this->_daysInMonth($month,$year);  
	
         
        $content='<div id="calendar">'.
                        '<div class="box">'.
                        $this->_createNavi().
                        '</div>'.
                        '<div class="box-content">'.
                                '<ul class="label">'.$this->_createLabels().'</ul>';   
                                $content.='<div class="clear"></div>';     
                                $content.='<ul class="dates">';    
                                 
                                $weeksInMonth = $this->_weeksInMonth($month,$year);
				// Create weeks in a month
                                for( $i=0; $i<$weeksInMonth; $i++ ){
                                     
                                    //Create days in a week
                                    for($j=1;$j<=7;$j++){
					     $content.=$this->_showbox($i*7+$j);
                                    }
                                }
                                 
                                $content.='</ul>';
                                 
                                $content.='<div class="clear"></div>';     
             
                        $content.='</div>';
                 
				$content.='</div>';
				$content.="<input type=hidden name=month value=$month>";
				$content.="<input type=hidden name=year value=$year>";
        return $content;   
    }
     
    /********************* PRIVATE **********************/ 
    /**
    * create the li element for ul
    */
    private function _showDay($cellNumber){
         
        if($this->currentDay==0){
             
            $firstDayOfTheWeek = date('N',strtotime($this->currentYear.'-'.$this->currentMonth.'-01'));
                     
            if(intval($cellNumber) == intval($firstDayOfTheWeek)){
                 
                $this->currentDay=1;
                 
            }
        }
         
        if( ($this->currentDay!=0)&&($this->currentDay<=$this->daysInMonth) ){
             
            $this->currentDate = date('Y-m-d',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));
             
            $cellContent = $this->currentDay;
             
            $this->currentDay++;   
             
        }else{
             
            $this->currentDate =null;
 
            $cellContent=null;
        }
             
         
        return '<li id="li-'.$this->currentDate.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
                ($cellContent==null?'mask':'').'">'.$cellContent.'</li>';
    }
    private function _showbox($cellNumber){
        if($this->currentDay==0){
             
            $firstDayOfTheWeek = date('N',strtotime($this->currentYear.'-'.$this->currentMonth.'-01'));
                     
            if(intval($cellNumber) == intval($firstDayOfTheWeek)){
                 
                $this->currentDay=1;
                 
            }
        }
         
        if( ($this->currentDay!=0)&&($this->currentDay<=$this->daysInMonth) ){
		$j =$this->currentDay ;
		if (($_POST['submit']=="Cập nhật dữ liệu")||($_POST['submit']=="Xóa dữ liệu")) {
		$danhso2 = $_POST['danhso'];
	   	$month2 = $_POST['month'];
		$year2 = $_POST['year'];
		}else{
	   $danhso2 = $_GET['danhso'];
	   $month2 = $_GET['month'];
	   $year2 = $_GET['year'];
		}
			if (($_POST['submit']=="Next")||($_POST['submit']=="Skip")) {
				$danhso = $_POST['danhso'];
				$donvi = $_POST['donvi'];
		        $result2 = mysql_query("SELECT  level_dv_sum FROM resume where danhso='$danhso'") ;
		while($row = mysql_fetch_array($result2))
		{
			$level_dv_sum_init=$row['level_dv_sum'];
		}	
		$result2 = mysql_query("SELECT  hoten,danhso,level_dv_sum FROM resume where donvi='$donvi'  ORDER by level_dv_sum ") ;
		$index=0;
		while($row = mysql_fetch_array($result2))
		{
			$level_dv_sum=$row['level_dv_sum'];
			if (($danhso !=$row['danhso'])&&($level_dv_sum>$level_dv_sum_init)) {
			$danhso2=$row['danhso'];
			break;
			}
		}		
	   	$month2 = $_POST['month'];
		$year2 = $_POST['year'];
			}
	   $result2 = mysql_query("SELECT * FROM chamcong where danhso='$danhso2' and month='$month2'and year='$year2'") ;
		while($row = mysql_fetch_array($result2))
		{
			$chamcong=$row["chamcong$j"];
		}  
             
		$this->currentDate = date('Y-m-d',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));
		$DayOfTheWeek = date('N',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));
		$check =  $_POST['check'] ;
		if ($check=="") {
			if( $DayOfTheWeek==7) {
				$value="CN";
				$hienthi="Bx";
			}
		else
			if( $DayOfTheWeek==6) {
				$value="T7";
				$hienthi="--";
			}
		else    {
			$value =8; 
			$hienthi="8";
		}
		}else {
			$value=$_POST["chamcong$cellNumber"];
			if ($value=="congbien") $hienthi="M";
			if ($value=="8") $hienthi="8";
			if ($value=="4.5") $hienthi="4.5";
			if ($value=="3.5") $hienthi="3.5";
			if ($value=="nghiphep") $hienthi="&#1054;";
			if ($value=="nghibu") $hienthi="&#1054;&#1090;";
			if ($value=="nghiom") $hienthi="&#1041;";
			if ($value=="congtac") $hienthi="&#1050;";
			if ($value=="CN") $hienthi="Bx";
			if ($value=="T7") $hienthi="--";
			if ($value=="ngayle") $hienthi="&#1055;";

		}
		if($chamcong!="") {
			$value=$chamcong;
			if ($value=="congbien") $hienthi="M";
			if ($value=="8") $hienthi="8";
			if ($value=="4.5") $hienthi="4.5";
			if ($value=="3.5") $hienthi="3.5";
			if ($value=="nghiphep") $hienthi="&#1054;";
			if ($value=="nghibu") $hienthi="&#1054;&#1090;";
			if ($value=="nghiom") $hienthi="&#1041;";
			if ($value=="congtac") $hienthi="&#1050;";
			if ($value=="CN") $hienthi="Bx";
			if ($value=="T7") $hienthi="--";
			if ($value=="ngayle") $hienthi="&#1055;";
		}
		$cellContent ="<div class=\"customselect\">
			<select style =\"border:none;background-color:#FFF\" name=\"chamcong$cellNumber\">
						    <option value=\"$value\" selected=\"selected\">$hienthi</option>
				                    <option value=\"congbien\" >M</option>
				                    <option value=\"8\">8</option> 
				                    <option value=\"4.5\">4.5</option> 
						    <option value=\"3.5\">3.5</option>
				                    <option value=\"nghiphep\" >&#1054;</option> 
				                    <option value=\"nghibu\">&#1054;&#1090;</option> 
				                    <option value=\"nghiom\">&#1041;</option> 
				                    <option value=\"congtac\">&#1050;</option> 
				                    <option value=\"CN\">Bx</option> 
				                    <option value=\"T7\">--</option> 
				                    <option value=\"ngayle\">&#1055;</option> 
						    </select></div>
						    <input type=hidden name=check value=checked>
						    ";
            //$cellContent = "<input style =\"border:none;background-color:#FFF\"   name=\"chamcong$cellNumber\" size=\"1\" type=\"text\" value=\"$value\"/> ";
            $this->currentDay++;   
             
             
        }else{
             
            $this->currentDate =null;
 
            $cellContent=null;
        }
             
         
        return '<li id="li-'.$this->currentDate.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
                ($cellContent==null?'mask':'').'">'.$cellContent.'</li>';
    }
     
    /**
    * create navigation
    */
    private function _createNavi(){
	    
	$post =  $_POST['post'] ;
	if(($post=="")&&($_POST['submit']=="")) {
	$danhso1 = $_GET['danhso'];
	$donvi1 = $_GET['donvi'];
	$month2 = $_GET['monthfirst'];
	$year2 = $_GET['yearfirst'];
	}else{
	$danhso1 = $_POST['danhso'];
	$donvi1 = $_POST['donvi'];
	$month2 = $_POST['monthfirst'];
	$year2 = $_POST['yearfirst'];
	}
	if($_POST['first']=="first") {
	$month2 =  $_POST['month'] ;
	$year2 =  $_POST['year'] ;
	}
         
        $nextMonth = $this->currentMonth==12?1:intval($this->currentMonth)+1;
         
        $nextYear = $this->currentMonth==12?intval($this->currentYear)+1:$this->currentYear;
         
        $preMonth = $this->currentMonth==1?12:intval($this->currentMonth)-1;
         
        $preYear = $this->currentMonth==1?intval($this->currentYear)-1:$this->currentYear;
         
        return
            '<div class="header">'.
            '<a class="prev" href="'.$this->naviHref.'?month='.sprintf('%02d',$preMonth).'&year='.$preYear.'&danhso='."$danhso1".'&monthfirst='."$month2".'&yearfirst='."$year2".'&donvi='."$donvi1".'"><span style="color:#FFBF00">Prev</span></a>'.
                    '<span class="title">'.date('Y M',strtotime($this->currentYear.'-'.$this->currentMonth.'-1')).'</span>'.
            '<a class="next" href="'.$this->naviHref.'?month='.sprintf("%02d", $nextMonth).'&year='.$nextYear.'&danhso='."$danhso1".'&monthfirst='."$month2".'&yearfirst='."$year2".'&donvi='."$donvi1".'"><span style="color:#FFBF00">Next</span></a>'.
		'</div>';
	
       /* return
            '<div class="header">'.
                    '<span class="title">'.date('Y M',strtotime($this->currentYear.'-'.$this->currentMonth.'-1')).'</span>'.
		    '</div>';*/
	
    }
         
    /**
    * create calendar week labels
    */
    private function _createLabels(){  
                 
        $content='';
         
        foreach($this->dayLabels as $index=>$label){
             
            $content.='<li class="'.($label==6?'end title':'start title').' title"><span style="color:#FFBF00">'.$label.'</span></li>';
 
        }
         
        return $content;
    }
     
     
     
    /**
    * calculate number of weeks in a particular month
    */
    private function _weeksInMonth($month=null,$year=null){
         
        if( null==($year) ) {
            $year =  date("Y",time()); 
        }
         
        if(null==($month)) {
            $month = date("m",time());
        }
         
        // find number of days in this month
        $daysInMonths = $this->_daysInMonth($month,$year);
         
        $numOfweeks = ($daysInMonths%7==0?0:1) + intval($daysInMonths/7);
         
        $monthEndingDay= date('N',strtotime($year.'-'.$month.'-'.$daysInMonths));
         
        $monthStartDay = date('N',strtotime($year.'-'.$month.'-01'));
         
        if($monthEndingDay<$monthStartDay){
             
            $numOfweeks++;
         
        }
         
        return $numOfweeks;
    }
 
    /**
    * calculate number of days in a particular month
    */
    private function _daysInMonth($month=null,$year=null){
         
        if(null==($year))
            $year =  date("Y",time()); 
 
        if(null==($month))
            $month = date("m",time());
             
        return date('t',strtotime($year.'-'.$month.'-01'));
    }
     
}
?> 
