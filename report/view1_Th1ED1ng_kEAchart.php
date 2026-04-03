<?php

// Set up chart
//$Chart = &$Table->Th1ED1ng_kEA;
// Initialize chart data

$Chart->ID = "view1_Th1ED1ng_kEA"; // Chart ID
$Chart->SetChartParms(array(array("type", "1", FALSE),
	array("seriestype", "0", FALSE)));  // Chart type / Chart series type
$Chart->SetChartParm("bgcolor", "DC143C", TRUE); // Background color
$Chart->SetChartParms(array(array("caption", $Chart->ChartCaption()),
	array("xaxisname", $Chart->ChartXAxisName()))); // Chart caption / X axis name
$Chart->SetChartParm("yaxisname", $Chart->ChartYAxisName(), TRUE); // Y axis name
$Chart->SetChartParms(array(array("shownames", "1"),
	array("showvalues", "1"),
	array("showhovercap", "0"))); // Show names / Show values / Show hover
$Chart->SetChartParm("alpha", "50", FALSE); // Chart alpha
$Chart->SetChartParm("colorpalette", "#FF0000|#FF0080|#FF00FF|#8000FF|#FF8000|#FF3D3D|#7AFFFF|#0000FF|#FFFF00|#FF7A7A|#3DFFFF|#0080FF|#80FF00|#00FF00|#00FF80|#00FFFF", FALSE); // Chart color palette
?>
<?php
$Chart->SetChartParms(array(array("showLimits", "1"),
	array("showDivLineValues", "1"),
	array("yAxisMinValue", "0"),
	array("yAxisMaxValue", "0"),
	array("showAlternateVGridColor", "0"),
	array("isSliced", "1"),
	array("showAsBars", "0"),
	));
$Chart->ChartGridConfig = '{}';
$Chart->Trends[] = array(0, 0, "FF0000", "", 1, "0", "1", 100, "", "0", "0", 0, 0, "");
?>
<?php

	// Setup chart series data
	if ($Chart->ChartSeriesSql <> "") {
		ewr_LoadChartSeries($Chart->ChartSeriesSql, $Chart);
		if (EWR_DEBUG_ENABLED)
			echo "<p>(Chart Series SQL): " . $Chart->ChartSeriesSql . "</p>";
	}

	// Setup chart data
	if ($Chart->ChartSql <> "") {
		ewr_LoadChartData($Chart->ChartSql, $Chart);
		if (EWR_DEBUG_ENABLED)
			echo "<p>(Chart SQL): " . $Chart->ChartSql . "</p>";
	}
	ewr_SortChartData($Chart->Data, 0, "");

	// Render chart
	$Chart->LoadChartParms();
	$chartxml = $Chart->ChartXml();
?>
<span class="ewChartBottom">
<?php

	// Show page break content
	if ($Chart->PageBreak && $Chart->PageBreakType == "before")
		echo $Chart->PageBreakContent;
	if ($Chart->ShowChart) { // Show actual chart
		echo $Chart->ShowChartFC($chartxml, FALSE, $Chart->DrillDownInPanel);
	} elseif ($Chart->ShowTempImage) { // Show temp image
		$TmpChartImage = ewr_TmpChartImage("chart_view1_Th1ED1ng_kEA", FALSE);
		$TmpGridImage = ewr_TmpChartImage("chart_view1_Th1ED1ng_kEA_grid", FALSE);
		if ($TmpChartImage <> "") {
?>
<?php if ($Page->Export == "word" && defined('EWR_USE_PHPWORD') || $Page->Export == "excel" && defined('EWR_USE_PHPEXCEL')) { ?>
<table class="ewChart" data-page-break="before">
<tr><td><img src="<?php echo $TmpChartImage ?>" alt=""><br><?php if ($TmpGridImage <> "") { ?>
<img src="<?php echo $TmpGridImage ?>" alt=""><?php } ?></td></tr>
</table>
<?php } else { ?>
<div class="ewChart" data-page-break="before"><img src="<?php echo $TmpChartImage ?>" alt=""><br><?php if ($TmpGridImage <> "") { ?>
<img src="<?php echo $TmpGridImage ?>" alt=""><?php } ?></div>
<?php } ?>
<?php
		}
	}

	// Show page break content
	if ($Chart->PageBreak && $Chart->PageBreakType == "after")
		echo $Chart->PageBreakContent;
?>
</span>
