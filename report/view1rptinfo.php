<?php

// Global variable for table object
$view1 = NULL;

//
// Table class for view1
//
class crview1 extends crTableBase {

//	var $SelectLimit = TRUE;
	var $maql;
	var $hoso;
	var $mavt;
	var $somay;
	var $cv;
	var $ngayth;
	var $ngaykt;
	var $ngth;
	var $ttktafter;
	var $ghichu;
	var $stt;
	var $lydo;
	var $ngayyc;
	var $madv;
	var $phieu;
	var $solg;
	var $ngyeucau;
	var $ngnhyeucau;
	var $ttktbefore;
	var $honghoc;
	var $khacphuc;
	var $vattusc;
	var $ndbaoduong;
	var $tbdosc;
	var $serialtbdosc;
	var $tbdosc1;
	var $serialtbdosc1;
	var $tbdosc2;
	var $serialtbdosc2;
	var $serialtbdosc3;
	var $tbdosc3;
	var $tbdosc4;
	var $serialtbdosc4;
	var $chiphi;
	var $nhomsc;
	var $curdate;
	var $ip_address;
	var $bg;

	//
	// Table class constructor
	//
	function __construct() {
		global $ReportLanguage;
		$this->TableVar = 'view1';
		$this->TableName = 'view1';
		$this->TableType = 'VIEW';
		$this->ExportAll = FALSE;
		$this->ExportPageBreakCount = 0;

		// maql
		$this->maql = new crField('view1', 'view1', 'x_maql', 'maql', '`maql`', 200, EWR_DATATYPE_STRING, -1);
		$this->fields['maql'] = &$this->maql;
		$this->maql->DateFilter = "";
		$this->maql->SqlSelect = "";
		$this->maql->SqlOrderBy = "";

		// hoso
		$this->hoso = new crField('view1', 'view1', 'x_hoso', 'hoso', '`hoso`', 200, EWR_DATATYPE_STRING, -1);
		$this->fields['hoso'] = &$this->hoso;
		$this->hoso->DateFilter = "";
		$this->hoso->SqlSelect = "";
		$this->hoso->SqlOrderBy = "";

		// mavt
		$this->mavt = new crField('view1', 'view1', 'x_mavt', 'mavt', '`mavt`', 200, EWR_DATATYPE_STRING, -1);
		$this->fields['mavt'] = &$this->mavt;
		$this->mavt->DateFilter = "";
		$this->mavt->SqlSelect = "";
		$this->mavt->SqlOrderBy = "";

		// somay
		$this->somay = new crField('view1', 'view1', 'x_somay', 'somay', '`somay`', 200, EWR_DATATYPE_STRING, -1);
		$this->fields['somay'] = &$this->somay;
		$this->somay->DateFilter = "";
		$this->somay->SqlSelect = "";
		$this->somay->SqlOrderBy = "";

		// cv
		$this->cv = new crField('view1', 'view1', 'x_cv', 'cv', '`cv`', 201, EWR_DATATYPE_MEMO, -1);
		$this->fields['cv'] = &$this->cv;
		$this->cv->DateFilter = "";
		$this->cv->SqlSelect = "";
		$this->cv->SqlOrderBy = "";

		// ngayth
		$this->ngayth = new crField('view1', 'view1', 'x_ngayth', 'ngayth', '`ngayth`', 135, EWR_DATATYPE_DATE, 7);
		$this->ngayth->FldDefaultErrMsg = str_replace("%s", "/", $ReportLanguage->Phrase("IncorrectDateDMY"));
		$this->fields['ngayth'] = &$this->ngayth;
		$this->ngayth->DateFilter = "";
		$this->ngayth->SqlSelect = "";
		$this->ngayth->SqlOrderBy = "";

		// ngaykt
		$this->ngaykt = new crField('view1', 'view1', 'x_ngaykt', 'ngaykt', '`ngaykt`', 135, EWR_DATATYPE_DATE, 7);
		$this->ngaykt->FldDefaultErrMsg = str_replace("%s", "/", $ReportLanguage->Phrase("IncorrectDateDMY"));
		$this->fields['ngaykt'] = &$this->ngaykt;
		$this->ngaykt->DateFilter = "";
		$this->ngaykt->SqlSelect = "";
		$this->ngaykt->SqlOrderBy = "";
/*
		// ngth
		$this->ngth = new crField('view1', 'view1', 'x_ngth', 'ngth', '`ngth`', 200, EWR_DATATYPE_STRING, -1);
		$this->fields['ngth'] = &$this->ngth;
		$this->ngth->DateFilter = "";
		$this->ngth->SqlSelect = "";
		$this->ngth->SqlOrderBy = "";
 */
		// ttktafter
		$this->ttktafter = new crField('view1', 'view1', 'x_ttktafter', 'ttktafter', '`ttktafter`', 201, EWR_DATATYPE_MEMO, -1);
		$this->fields['ttktafter'] = &$this->ttktafter;
		$this->ttktafter->DateFilter = "";
		$this->ttktafter->SqlSelect = "";
		$this->ttktafter->SqlOrderBy = "";

		// ghichu
		$this->ghichu = new crField('view1', 'view1', 'x_ghichu', 'ghichu', '`ghichu`', 201, EWR_DATATYPE_MEMO, -1);
		$this->fields['ghichu'] = &$this->ghichu;
		$this->ghichu->DateFilter = "";
		$this->ghichu->SqlSelect = "";
		$this->ghichu->SqlOrderBy = "";

		// stt
		$this->stt = new crField('view1', 'view1', 'x_stt', 'stt', '`stt`', 3, EWR_DATATYPE_NUMBER, -1);
		$this->stt->FldDefaultErrMsg = $ReportLanguage->Phrase("IncorrectInteger");
		$this->fields['stt'] = &$this->stt;
		$this->stt->DateFilter = "";
		$this->stt->SqlSelect = "";
		$this->stt->SqlOrderBy = "";

		// lydo
		$this->lydo = new crField('view1', 'view1', 'x_lydo', 'lydo', '`lydo`', 200, EWR_DATATYPE_STRING, -1);
		$this->fields['lydo'] = &$this->lydo;
		$this->lydo->DateFilter = "";
		$this->lydo->SqlSelect = "";
		$this->lydo->SqlOrderBy = "";

		// ngayyc
		$this->ngayyc = new crField('view1', 'view1', 'x_ngayyc', 'ngayyc', '`ngayyc`', 133, EWR_DATATYPE_DATE, 7);
		$this->ngayyc->FldDefaultErrMsg = str_replace("%s", "/", $ReportLanguage->Phrase("IncorrectDateDMY"));
		$this->fields['ngayyc'] = &$this->ngayyc;
		$this->ngayyc->DateFilter = "";
		$this->ngayyc->SqlSelect = "";
		$this->ngayyc->SqlOrderBy = "";

		// madv
		$this->madv = new crField('view1', 'view1', 'x_madv', 'madv', '`madv`', 200, EWR_DATATYPE_STRING, -1);
		$this->fields['madv'] = &$this->madv;
		$this->madv->DateFilter = "";
		$this->madv->SqlSelect = "";
		$this->madv->SqlOrderBy = "";

		// phieu
		$this->phieu = new crField('view1', 'view1', 'x_phieu', 'phieu', '`phieu`', 3, EWR_DATATYPE_NUMBER, -1);
		$this->phieu->FldDefaultErrMsg = $ReportLanguage->Phrase("IncorrectInteger");
		$this->fields['phieu'] = &$this->phieu;
		$this->phieu->DateFilter = "";
		$this->phieu->SqlSelect = "";
		$this->phieu->SqlOrderBy = "";

		// solg
		$this->solg = new crField('view1', 'view1', 'x_solg', 'solg', '`solg`', 3, EWR_DATATYPE_NUMBER, -1);
		$this->solg->FldDefaultErrMsg = $ReportLanguage->Phrase("IncorrectInteger");
		$this->fields['solg'] = &$this->solg;
		$this->solg->DateFilter = "";
		$this->solg->SqlSelect = "";
		$this->solg->SqlOrderBy = "";

		// ngyeucau
		$this->ngyeucau = new crField('view1', 'view1', 'x_ngyeucau', 'ngyeucau', '`ngyeucau`', 200, EWR_DATATYPE_STRING, -1);
		$this->fields['ngyeucau'] = &$this->ngyeucau;
		$this->ngyeucau->DateFilter = "";
		$this->ngyeucau->SqlSelect = "";
		$this->ngyeucau->SqlOrderBy = "";

		// ngnhyeucau
		$this->ngnhyeucau = new crField('view1', 'view1', 'x_ngnhyeucau', 'ngnhyeucau', '`ngnhyeucau`', 200, EWR_DATATYPE_STRING, -1);
		$this->fields['ngnhyeucau'] = &$this->ngnhyeucau;
		$this->ngnhyeucau->DateFilter = "";
		$this->ngnhyeucau->SqlSelect = "";
		$this->ngnhyeucau->SqlOrderBy = "";

		// ttktbefore
		$this->ttktbefore = new crField('view1', 'view1', 'x_ttktbefore', 'ttktbefore', '`ttktbefore`', 201, EWR_DATATYPE_MEMO, -1);
		$this->fields['ttktbefore'] = &$this->ttktbefore;
		$this->ttktbefore->DateFilter = "";
		$this->ttktbefore->SqlSelect = "";
		$this->ttktbefore->SqlOrderBy = "";

		// honghoc
		$this->honghoc = new crField('view1', 'view1', 'x_honghoc', 'honghoc', '`honghoc`', 201, EWR_DATATYPE_MEMO, -1);
		$this->fields['honghoc'] = &$this->honghoc;
		$this->honghoc->DateFilter = "";
		$this->honghoc->SqlSelect = "";
		$this->honghoc->SqlOrderBy = "";

		// khacphuc
		$this->khacphuc = new crField('view1', 'view1', 'x_khacphuc', 'khacphuc', '`khacphuc`', 201, EWR_DATATYPE_MEMO, -1);
		$this->fields['khacphuc'] = &$this->khacphuc;
		$this->khacphuc->DateFilter = "";
		$this->khacphuc->SqlSelect = "";
		$this->khacphuc->SqlOrderBy = "";
/*
		// vattusc
		$this->vattusc = new crField('view1', 'view1', 'x_vattusc', 'vattusc', '`vattusc`', 200, EWR_DATATYPE_STRING, -1);
		$this->fields['vattusc'] = &$this->vattusc;
		$this->vattusc->DateFilter = "";
		$this->vattusc->SqlSelect = "";
		$this->vattusc->SqlOrderBy = "";

		// ndbaoduong
		$this->ndbaoduong = new crField('view1', 'view1', 'x_ndbaoduong', 'ndbaoduong', '`ndbaoduong`', 200, EWR_DATATYPE_STRING, -1);
		$this->fields['ndbaoduong'] = &$this->ndbaoduong;
		$this->ndbaoduong->DateFilter = "";
		$this->ndbaoduong->SqlSelect = "";
		$this->ndbaoduong->SqlOrderBy = "";
 */
		// tbdosc
		$this->tbdosc = new crField('view1', 'view1', 'x_tbdosc', 'tbdosc', '`tbdosc`', 200, EWR_DATATYPE_STRING, -1);
		$this->fields['tbdosc'] = &$this->tbdosc;
		$this->tbdosc->DateFilter = "";
		$this->tbdosc->SqlSelect = "";
		$this->tbdosc->SqlOrderBy = "";

		// serialtbdosc
		$this->serialtbdosc = new crField('view1', 'view1', 'x_serialtbdosc', 'serialtbdosc', '`serialtbdosc`', 200, EWR_DATATYPE_STRING, -1);
		$this->fields['serialtbdosc'] = &$this->serialtbdosc;
		$this->serialtbdosc->DateFilter = "";
		$this->serialtbdosc->SqlSelect = "";
		$this->serialtbdosc->SqlOrderBy = "";

		// tbdosc1
		$this->tbdosc1 = new crField('view1', 'view1', 'x_tbdosc1', 'tbdosc1', '`tbdosc1`', 200, EWR_DATATYPE_STRING, -1);
		$this->fields['tbdosc1'] = &$this->tbdosc1;
		$this->tbdosc1->DateFilter = "";
		$this->tbdosc1->SqlSelect = "";
		$this->tbdosc1->SqlOrderBy = "";

		// serialtbdosc1
		$this->serialtbdosc1 = new crField('view1', 'view1', 'x_serialtbdosc1', 'serialtbdosc1', '`serialtbdosc1`', 200, EWR_DATATYPE_STRING, -1);
		$this->fields['serialtbdosc1'] = &$this->serialtbdosc1;
		$this->serialtbdosc1->DateFilter = "";
		$this->serialtbdosc1->SqlSelect = "";
		$this->serialtbdosc1->SqlOrderBy = "";

		// tbdosc2
		$this->tbdosc2 = new crField('view1', 'view1', 'x_tbdosc2', 'tbdosc2', '`tbdosc2`', 200, EWR_DATATYPE_STRING, -1);
		$this->fields['tbdosc2'] = &$this->tbdosc2;
		$this->tbdosc2->DateFilter = "";
		$this->tbdosc2->SqlSelect = "";
		$this->tbdosc2->SqlOrderBy = "";

		// serialtbdosc2
		$this->serialtbdosc2 = new crField('view1', 'view1', 'x_serialtbdosc2', 'serialtbdosc2', '`serialtbdosc2`', 200, EWR_DATATYPE_STRING, -1);
		$this->fields['serialtbdosc2'] = &$this->serialtbdosc2;
		$this->serialtbdosc2->DateFilter = "";
		$this->serialtbdosc2->SqlSelect = "";
		$this->serialtbdosc2->SqlOrderBy = "";

		// serialtbdosc3
		$this->serialtbdosc3 = new crField('view1', 'view1', 'x_serialtbdosc3', 'serialtbdosc3', '`serialtbdosc3`', 200, EWR_DATATYPE_STRING, -1);
		$this->fields['serialtbdosc3'] = &$this->serialtbdosc3;
		$this->serialtbdosc3->DateFilter = "";
		$this->serialtbdosc3->SqlSelect = "";
		$this->serialtbdosc3->SqlOrderBy = "";

		// tbdosc3
		$this->tbdosc3 = new crField('view1', 'view1', 'x_tbdosc3', 'tbdosc3', '`tbdosc3`', 200, EWR_DATATYPE_STRING, -1);
		$this->fields['tbdosc3'] = &$this->tbdosc3;
		$this->tbdosc3->DateFilter = "";
		$this->tbdosc3->SqlSelect = "";
		$this->tbdosc3->SqlOrderBy = "";

		// tbdosc4
		$this->tbdosc4 = new crField('view1', 'view1', 'x_tbdosc4', 'tbdosc4', '`tbdosc4`', 200, EWR_DATATYPE_STRING, -1);
		$this->fields['tbdosc4'] = &$this->tbdosc4;
		$this->tbdosc4->DateFilter = "";
		$this->tbdosc4->SqlSelect = "";
		$this->tbdosc4->SqlOrderBy = "";

		// serialtbdosc4
		$this->serialtbdosc4 = new crField('view1', 'view1', 'x_serialtbdosc4', 'serialtbdosc4', '`serialtbdosc4`', 200, EWR_DATATYPE_STRING, -1);
		$this->fields['serialtbdosc4'] = &$this->serialtbdosc4;
		$this->serialtbdosc4->DateFilter = "";
		$this->serialtbdosc4->SqlSelect = "";
		$this->serialtbdosc4->SqlOrderBy = "";
/*
		// chiphi
		$this->chiphi = new crField('view1', 'view1', 'x_chiphi', 'chiphi', '`chiphi`', 200, EWR_DATATYPE_STRING, -1);
		$this->fields['chiphi'] = &$this->chiphi;
		$this->chiphi->DateFilter = "";
		$this->chiphi->SqlSelect = "";
		$this->chiphi->SqlOrderBy = "";
 */
		// nhomsc
		$this->nhomsc = new crField('view1', 'view1', 'x_nhomsc', 'nhomsc', '`nhomsc`', 200, EWR_DATATYPE_STRING, -1);
		$this->fields['nhomsc'] = &$this->nhomsc;
		$this->nhomsc->DateFilter = "";
		$this->nhomsc->SqlSelect = "";
		$this->nhomsc->SqlOrderBy = "";
/*		
		// curdate
		$this->curdate = new crField('view1', 'view1', 'x_curdate', 'curdate', '`curdate`', 200, EWR_DATATYPE_STRING, -1);
		$this->fields['curdate'] = &$this->curdate;
		$this->curdate->DateFilter = "";
		$this->curdate->SqlSelect = "";
		$this->curdate->SqlOrderBy = "";
		
		// ip_address
		$this->ip_address = new crField('view1', 'view1', 'x_ip_address', 'ip_address', '`ip_address`', 200, EWR_DATATYPE_STRING, -1);
		$this->fields['ip_address'] = &$this->ip_address;
		$this->ip_address->DateFilter = "";
		$this->ip_address->SqlSelect = "";
		$this->ip_address->SqlOrderBy = "";
 */		
		// bg
		$this->bg = new crField('view1', 'view1', 'x_bg', 'bg', '`bg`', 200, EWR_DATATYPE_STRING, -1);
		$this->fields['bg'] = &$this->bg;
		$this->bg->DateFilter = "";
		$this->bg->SqlSelect = "";
		$this->bg->SqlOrderBy = "";
	}

	// Single column sort
	function UpdateSort(&$ofld) {
		if ($this->CurrentOrder == $ofld->FldName) {
			$sLastSort = $ofld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$sThisSort = $this->CurrentOrderType;
			} else {
				$sThisSort = ($sLastSort == "ASC") ? "DESC" : "ASC";
			}
			$ofld->setSort($sThisSort);
		} else {
			if ($ofld->GroupingFieldId == 0) $ofld->setSort("");
		}
	}

	// Get Sort SQL
	function SortSql() {
		$sDtlSortSql = "";
		$argrps = array();
		foreach ($this->fields as $fld) {
			if ($fld->getSort() <> "") {
				if ($fld->GroupingFieldId > 0) {
					if ($fld->FldGroupSql <> "")
						$argrps[$fld->GroupingFieldId] = str_replace("%s", $fld->FldExpression, $fld->FldGroupSql) . " " . $fld->getSort();
					else
						$argrps[$fld->GroupingFieldId] = $fld->FldExpression . " " . $fld->getSort();
				} else {
					if ($sDtlSortSql <> "") $sDtlSortSql .= ", ";
					$sDtlSortSql .= $fld->FldExpression . " " . $fld->getSort();
				}
			}
		}
		$sSortSql = "";
		foreach ($argrps as $grp) {
			if ($sSortSql <> "") $sSortSql .= ", ";
			$sSortSql .= $grp;
		}
		if ($sDtlSortSql <> "") {
			if ($sSortSql <> "") $sSortSql .= ",";
			$sSortSql .= $sDtlSortSql;
		}
		return $sSortSql;
	}

	// Table level SQL
	// From

	var $_SqlFrom = "";

	function getSqlFrom() {
		return ($this->_SqlFrom <> "") ? $this->_SqlFrom : "`view1`";
	}

	function SqlFrom() { // For backward compatibility
		return $this->getSqlFrom();
	}

	function setSqlFrom($v) {
		$this->_SqlFrom = $v;
	}

	// Select
	var $_SqlSelect = "";

	function getSqlSelect() {
		return ($this->_SqlSelect <> "") ? $this->_SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
	}

	function SqlSelect() { // For backward compatibility
		return $this->getSqlSelect();
	}

	function setSqlSelect($v) {
		$this->_SqlSelect = $v;
	}

	// Where
	var $_SqlWhere = "";

	function getSqlWhere() {
		$sWhere = ($this->_SqlWhere <> "") ? $this->_SqlWhere : "";
		return $sWhere;
	}

	function SqlWhere() { // For backward compatibility
		return $this->getSqlWhere();
	}

	function setSqlWhere($v) {
		$this->_SqlWhere = $v;
	}

	// Group By
	var $_SqlGroupBy = "";

	function getSqlGroupBy() {
		return ($this->_SqlGroupBy <> "") ? $this->_SqlGroupBy : "";
	}

	function SqlGroupBy() { // For backward compatibility
		return $this->getSqlGroupBy();
	}

	function setSqlGroupBy($v) {
		$this->_SqlGroupBy = $v;
	}

	// Having
	var $_SqlHaving = "";

	function getSqlHaving() {
		return ($this->_SqlHaving <> "") ? $this->_SqlHaving : "";
	}

	function SqlHaving() { // For backward compatibility
		return $this->getSqlHaving();
	}

	function setSqlHaving($v) {
		$this->_SqlHaving = $v;
	}

	// Order By
	var $_SqlOrderBy = "";

	function getSqlOrderBy() {
		return ($this->_SqlOrderBy <> "") ? $this->_SqlOrderBy : "";
	}

	function SqlOrderBy() { // For backward compatibility
		return $this->getSqlOrderBy();
	}

	function setSqlOrderBy($v) {
		$this->_SqlOrderBy = $v;
	}

	// Select Aggregate
	var $_SqlSelectAgg = "";

	function getSqlSelectAgg() {
		return ($this->_SqlSelectAgg <> "") ? $this->_SqlSelectAgg : "SELECT * FROM " . $this->getSqlFrom();
	}

	function SqlSelectAgg() { // For backward compatibility
		return $this->getSqlSelectAgg();
	}

	function setSqlSelectAgg($v) {
		$this->_SqlSelectAgg = $v;
	}

	// Aggregate Prefix
	var $_SqlAggPfx = "";

	function getSqlAggPfx() {
		return ($this->_SqlAggPfx <> "") ? $this->_SqlAggPfx : "";
	}

	function SqlAggPfx() { // For backward compatibility
		return $this->getSqlAggPfx();
	}

	function setSqlAggPfx($v) {
		$this->_SqlAggPfx = $v;
	}

	// Aggregate Suffix
	var $_SqlAggSfx = "";

	function getSqlAggSfx() {
		return ($this->_SqlAggSfx <> "") ? $this->_SqlAggSfx : "";
	}

	function SqlAggSfx() { // For backward compatibility
		return $this->getSqlAggSfx();
	}

	function setSqlAggSfx($v) {
		$this->_SqlAggSfx = $v;
	}

	// Select Count
	var $_SqlSelectCount = "";

	function getSqlSelectCount() {
		return ($this->_SqlSelectCount <> "") ? $this->_SqlSelectCount : "SELECT COUNT(*) FROM " . $this->getSqlFrom();
	}

	function SqlSelectCount() { // For backward compatibility
		return $this->getSqlSelectCount();
	}

	function setSqlSelectCount($v) {
		$this->_SqlSelectCount = $v;
	}

	// Sort URL
	function SortUrl(&$fld) {
		return "";
	}

	// Table level events
	// Page Selecting event
	function Page_Selecting(&$filter) {

		// Enter your code here	
	}

	// Page Breaking event
	function Page_Breaking(&$break, &$content) {

		// Example:
		//$break = FALSE; // Skip page break, or
		//$content = "<div style=\"page-break-after:always;\">&nbsp;</div>"; // Modify page break content

	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here	
	}

	// Cell Rendered event
	function Cell_Rendered(&$Field, $CurrentValue, &$ViewValue, &$ViewAttrs, &$CellAttrs, &$HrefValue, &$LinkAttrs) {

		//$ViewValue = "xxx";
		//$ViewAttrs["style"] = "xxx";

	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>); 

	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}

	// Load Filters event
	function Page_FilterLoad() {

		// Enter your code here
		// Example: Register/Unregister Custom Extended Filter
		//ewr_RegisterFilter($this-><Field>, 'StartsWithA', 'Starts With A', 'GetStartsWithAFilter'); // With function, or
		//ewr_RegisterFilter($this-><Field>, 'StartsWithA', 'Starts With A'); // No function, use Page_Filtering event
		//ewr_UnregisterFilter($this-><Field>, 'StartsWithA');

	}

	// Page Filter Validated event
	function Page_FilterValidated() {

		// Example:
		//$this->MyField1->SearchValue = "your search criteria"; // Search value

	}

	// Page Filtering event
	function Page_Filtering(&$fld, &$filter, $typ, $opr = "", $val = "", $cond = "", $opr2 = "", $val2 = "") {

		// Note: ALWAYS CHECK THE FILTER TYPE ($typ)! Example:
		// if ($typ == "dropdown" && $fld->FldName == "MyField") // Dropdown filter
		//     $filter = "..."; // Modify the filter
		// if ($typ == "extended" && $fld->FldName == "MyField") // Extended filter
		//     $filter = "..."; // Modify the filter
		// if ($typ == "popup" && $fld->FldName == "MyField") // Popup filter
		//     $filter = "..."; // Modify the filter
		// if ($typ == "custom" && $opr == "..." && $fld->FldName == "MyField") // Custom filter, $opr is the custom filter ID
		//     $filter = "..."; // Modify the filter

	}

	// Email Sending event
	function Email_Sending(&$Email, &$Args) {

		//var_dump($Email); var_dump($Args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		// Enter your code here
	}
}
?>
