<?php if (@$gsExport == "email" || @$gsExport == "pdf") ob_clean(); ?>
<?php

// Responsive layout
if (ewr_IsResponsiveLayout()) {
	$gsHeaderRowClass = "hidden-xs ewHeaderRow";
	$gsMenuColumnClass = "hidden-xs ewMenuColumn";
	$gsSiteTitleClass = "hidden-xs ewSiteTitle";
} else {
	$gsHeaderRowClass = "ewHeaderRow";
	$gsMenuColumnClass = "ewMenuColumn";
	$gsSiteTitleClass = "ewSiteTitle";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $ReportLanguage->ProjectPhrase("BodyTitle") ?></title>
<meta charset="utf-8">
<script type="text/javascript">
var EWR_RELATIVE_PATH = "<?php echo $EWR_RELATIVE_PATH ?>";
</script>
<?php if (@$gsExport == "" || @$gsExport == "print" || @$gsExport == "email" && @$gsEmailContentType == "url") { ?>
<script type="text/javascript">

function ewr_GetScript(url) { document.write("<" + "script type=\"text/javascript\" src=\"" + EWR_RELATIVE_PATH + url + "\"><" + "/script>"); }

function ewr_GetCss(url) { document.write("<link rel=\"stylesheet\" type=\"text/css\" href=\"" + EWR_RELATIVE_PATH + url + "\">"); }
var EWR_LANGUAGE_ID = "<?php echo $gsLanguage ?>";
var EWR_DATE_SEPARATOR = "/"; // Default date separator
var EWR_DECIMAL_POINT = "<?php echo $EWR_DEFAULT_DECIMAL_POINT ?>";
var EWR_THOUSANDS_SEP = "<?php echo $EWR_DEFAULT_THOUSANDS_SEP ?>";
var EWR_DISABLE_BUTTON_ON_SUBMIT = true;
var EWR_IMAGES_FOLDER = "phprptimages/"; // Image folder
var EWR_LOOKUP_FILE_NAME = "ewrajax8.php"; // Lookup file name
var EWR_AUTO_SUGGEST_MAX_ENTRIES = <?php echo EWR_AUTO_SUGGEST_MAX_ENTRIES ?>; // Auto-Suggest max entries
var EWR_USE_JAVASCRIPT_MESSAGE = false;
<?php if (ewr_IsMobile()) { ?>
var EWR_IS_MOBILE = true;
<?php } else { ?>
var EWR_IS_MOBILE = false;
<?php } ?>
var EWR_PROJECT_STYLESHEET_FILENAME = "<?php echo EWR_PROJECT_STYLESHEET_FILENAME ?>"; // Project style sheet
var EWR_PDF_STYLESHEET_FILENAME = "<?php echo (EWR_PDF_STYLESHEET_FILENAME == "" ? EWR_PROJECT_STYLESHEET_FILENAME : EWR_PDF_STYLESHEET_FILENAME) ?>"; // Export PDF style sheet
var EWR_TOKEN = "<?php echo @$gsToken ?>";
var EWR_CSS_FLIP = <?php echo (EWR_CSS_FLIP) ? "true" : "false" ?>;
</script>
<?php } ?>
<?php if (@$gsExport == "" || @$gsExport == "print") { ?>
<script type="text/javascript">
if (!window.jQuery || !jQuery.fn.alert) {
	ewr_GetCss("bootstrap3/css/<?php echo ewr_CssFile("bootstrap.css") ?>");
	ewr_GetCss("bootstrap3/css/<?php echo ewr_CssFile("bootstrap-theme.css") ?>"); // Optional theme
}
ewr_GetCss("colorbox/colorbox.css");
<?php if (!@$gbDrillDownInPanel) { ?>
ewr_GetCss("<?php echo ewr_CssFile(EWR_PROJECT_STYLESHEET_FILENAME) ?>");
<?php } ?>
</script>
<?php if (ewr_IsMobile()) { ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php } ?>
<?php } else { ?>
<style type="text/css">
<?php $cssfile = (@$gsExport == "pdf") ? (EWR_PDF_STYLESHEET_FILENAME == "" ? EWR_PROJECT_STYLESHEET_FILENAME : EWR_PDF_STYLESHEET_FILENAME) : EWR_PROJECT_STYLESHEET_FILENAME ?>
<?php echo file_get_contents($cssfile) ?>
</style>
<?php } ?>
<?php if (@$gsExport == "") { ?>
<script type="text/javascript">
if (!window.Calendar) {
	ewr_GetCss("jscalendar/calendar.css");
	ewr_GetScript("jscalendar/calendar.min.js");
	ewr_GetScript("jscalendar/lang/calendar-en.js");
	ewr_GetScript("jscalendar/calendar-setup.js");
}
</script>
<?php } ?>
<?php if (@$gsExport == "" || @$gsExport == "print" || @$gsExport == "email" && @$gsEmailContentType == "url") { ?>
<script type="text/javascript">if (!window.jQuery) ewr_GetScript("jquery/jquery-1.11.1.min.js");</script>
<?php } ?>
<?php if (@$gsExport == "" || @$gsExport == "print" || @$gsExport == "email" && @$gsEmailContentType == "url") { ?>
<?php if (@$gsCustomExport == "") { ?>
<script type="text/javascript" src="<?php echo $EWR_RELATIVE_PATH . EWR_FUSIONCHARTS_PATH ?>fusioncharts.js"></script>
<script type="text/javascript" src="<?php echo $EWR_RELATIVE_PATH . EWR_FUSIONCHARTS_PATH ?>themes/fusioncharts.theme.ocean.js"></script>
<script type="text/javascript" src="<?php echo $EWR_RELATIVE_PATH . EWR_FUSIONCHARTS_PATH ?>themes/fusioncharts.theme.carbon.js"></script>
<script type="text/javascript" src="<?php echo $EWR_RELATIVE_PATH . EWR_FUSIONCHARTS_PATH ?>themes/fusioncharts.theme.zune.js"></script>
<script type="text/javascript" src="<?php echo $EWR_RELATIVE_PATH . EWR_FUSIONCHARTS_FREE_JSCLASS_FILE ?>"></script>
<script type="text/javascript">
var EWR_CHART_EXPORT_HANDLER = "<?php echo ewr_ConvertFullUrl("fcexporter8.php") ?>";
</script>
<?php } ?>
<script type="text/javascript">if (window.jQuery && !window.jQuery.browser) ewr_GetScript("jquery/jquery.browser.js");</script>
<script type="text/javascript">if (window.jQuery && !window.jQuery.iframeAutoHeight) ewr_GetScript("jquery/jquery.iframe-auto-height.js");</script>
<script type="text/javascript">if (window.jQuery && !window.jQuery.localStorage) ewr_GetScript("jquery/jquery.storageapi.min.js");</script>
<?php if (@$gsExport == "") { ?>
<script type="text/javascript">if (window.jQuery && !jQuery.colorbox) ewr_GetScript("colorbox/jquery.colorbox-min.js");</script>
<?php } ?>
<script type="text/javascript">ewr_GetScript("phprptjs/ewr8.js");</script>
<script type="text/javascript">
if (window._jQuery) ewr_Extend(jQuery);
if (window.jQuery && !jQuery.fn.alert) ewr_GetScript("bootstrap3/js/bootstrap.min.js");
if (window.jQuery && !jQuery.typeahead) ewr_GetScript("phprptjs/typeahead.bundle.min.js");	
</script>
<?php } ?>
<?php if (@$gsExport == "" || @$gsExport == "print") { ?>
<script type="text/javascript">
<?php echo $ReportLanguage->ToJSON() ?>
</script>
<script type="text/javascript">ewr_GetScript("phprptjs/ewrusrfn8.js");</script>
<script type="text/javascript">

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<meta name="generator" content="PHP Report Maker v8.0.1">
</head>
<body>
<?php if (@!$gbSkipHeaderFooter) { ?>
<?php if (@$gsExport == "") { ?>
<div class="ewLayout">
	<!-- header (begin) --><!-- *** Note: Only licensed users are allowed to change the logo *** -->
	<div id="ewHeaderRow" class="<?php echo $gsHeaderRowClass ?>"><img src="<?php echo $EWR_RELATIVE_PATH ?>phprptimages/phprptmkrlogo8.png" alt=""></div>
<?php if (ewr_IsResponsiveLayout()) { ?>
<nav id="ewMobileMenu" role="navigation" class="navbar hidden-print navbar-default visible-xs">
	<div class="container-fluid"><!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button data-target="#ewMenu" data-toggle="collapse" class="navbar-toggle" type="button">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"><?php echo $ReportLanguage->ProjectPhrase("BodyTitle") ?></a>
		</div>
		<div id="ewMenu" class="collapse navbar-collapse" style="height: auto;"><!-- Begin Main Menu -->
<?php
	$RootMenu = new crMenu("MobileMenu");
	$RootMenu->MenuBarClassName = "";
	$RootMenu->MenuClassName = "nav navbar-nav";
	$RootMenu->SubMenuClassName = "dropdown-menu";
	$RootMenu->SubMenuDropdownImage = "";
	$RootMenu->SubMenuDropdownIconClassName = "icon-arrow-down";
	$RootMenu->MenuDividerClassName = "divider";
	$RootMenu->MenuItemClassName = "dropdown";
	$RootMenu->SubMenuItemClassName = "dropdown";
	$RootMenu->MenuActiveItemClassName = "active";
	$RootMenu->SubMenuActiveItemClassName = "active";
	$RootMenu->MenuRootGroupTitleAsSubMenu = TRUE;
	$RootMenu->MenuLinkDropdownClass = "ewDropdown";
	$RootMenu->MenuLinkClassName = "icon-arrow-right";
?>
<?php include_once $EWR_RELATIVE_PATH . "ewrmobilemenu.php" ?>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
<?php } ?>
	<!-- header (end) -->
	<!-- content (begin) -->
	<!-- content (begin) -->
	<div id="ewContentTable" class="ewContentTable">
		<div id="ewContentRow">
			<div id="ewMenuColumn" class="<?php echo $gsMenuColumnClass ?>">
				<!-- left column (begin) -->
				<div class="ewMenu">
<?php include_once "menu.php" ?>
				</div>
				<!-- left column (end) -->
			</div>
			<div id="ewContentColumn" class="ewContentColumn">
				<!-- right column (begin) -->
				<h4 class="<?php echo $gsSiteTitleClass ?>"><?php echo $ReportLanguage->ProjectPhrase("BodyTitle") ?></h4>
<?php } ?>
<?php } ?>
