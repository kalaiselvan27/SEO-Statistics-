<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "tbl_backlink_statinfo.php" ?>
<?php include "tbl_userinfo.php" ?>
<?php include "userfn7.php" ?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php

// Create page object
$tbl_backlink_stat_view = new ctbl_backlink_stat_view();
$Page =& $tbl_backlink_stat_view;

// Page init
$tbl_backlink_stat_view->Page_Init();

// Page main
$tbl_backlink_stat_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($tbl_backlink_stat->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_backlink_stat_view = new ew_Page("tbl_backlink_stat_view");

// page properties
tbl_backlink_stat_view.PageID = "view"; // page ID
tbl_backlink_stat_view.FormID = "ftbl_backlink_statview"; // form ID
var EW_PAGE_ID = tbl_backlink_stat_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
tbl_backlink_stat_view.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_backlink_stat_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
tbl_backlink_stat_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_backlink_stat_view.ValidateRequired = false; // no JavaScript validation
<?php } ?>

// search highlight properties
tbl_backlink_stat_view.ShowHighlightText = ewLanguage.Phrase("ShowHighlight"); 
tbl_backlink_stat_view.HideHighlightText = ewLanguage.Phrase("HideHighlight");

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<?php } ?>
<p><span class="phpmaker"><?php echo $Language->Phrase("View") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_backlink_stat->TableCaption() ?>
<br><br>
<?php if ($tbl_backlink_stat->Export == "") { ?>
<a href="<?php echo $tbl_backlink_stat_view->ListUrl ?>"><?php echo $Language->Phrase("BackToList") ?></a>&nbsp;
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $tbl_backlink_stat_view->AddUrl ?>"><?php echo $Language->Phrase("ViewPageAddLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $tbl_backlink_stat_view->EditUrl ?>"><?php echo $Language->Phrase("ViewPageEditLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $tbl_backlink_stat_view->CopyUrl ?>"><?php echo $Language->Phrase("ViewPageCopyLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a onclick="return ew_Confirm(ewLanguage.Phrase('DeleteConfirmMsg'));" href="<?php echo $tbl_backlink_stat_view->DeleteUrl ?>"><?php echo $Language->Phrase("ViewPageDeleteLink") ?></a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$tbl_backlink_stat_view->ShowMessage();
?>
<p>
<?php if ($tbl_backlink_stat->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<?php if (!isset($tbl_backlink_stat_view->Pager)) $tbl_backlink_stat_view->Pager = new cPrevNextPager($tbl_backlink_stat_view->lStartRec, $tbl_backlink_stat_view->lDisplayRecs, $tbl_backlink_stat_view->lTotalRecs) ?>
<?php if ($tbl_backlink_stat_view->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="phpmaker"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($tbl_backlink_stat_view->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_backlink_stat_view->PageUrl() ?>start=<?php echo $tbl_backlink_stat_view->Pager->FirstButton->Start ?>"><img src="images/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($tbl_backlink_stat_view->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_backlink_stat_view->PageUrl() ?>start=<?php echo $tbl_backlink_stat_view->Pager->PrevButton->Start ?>"><img src="images/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo EW_TABLE_PAGE_NO ?>" id="<?php echo EW_TABLE_PAGE_NO ?>" value="<?php echo $tbl_backlink_stat_view->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($tbl_backlink_stat_view->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_backlink_stat_view->PageUrl() ?>start=<?php echo $tbl_backlink_stat_view->Pager->NextButton->Start ?>"><img src="images/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($tbl_backlink_stat_view->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_backlink_stat_view->PageUrl() ?>start=<?php echo $tbl_backlink_stat_view->Pager->LastButton->Start ?>"><img src="images/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $tbl_backlink_stat_view->Pager->PageCount ?></span></td>
	</tr></table>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_backlink_stat_view->sSrchWhere == "0=101") { ?>
	<span class="phpmaker"><?php echo $Language->Phrase("EnterSearchCriteria") ?></span>
	<?php } else { ?>
	<span class="phpmaker"><?php echo $Language->Phrase("NoRecord") ?></span>
	<?php } ?>
	<?php } else { ?>
	<span class="phpmaker"><?php echo $Language->Phrase("NoPermission") ?></span>
	<?php } ?>
<?php } ?>
		</td>
	</tr>
</table>
</form>
<br>
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($tbl_backlink_stat->id_profile->Visible) { // id_profile ?>
	<tr<?php echo $tbl_backlink_stat->id_profile->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $tbl_backlink_stat->id_profile->FldCaption() ?></td>
		<td<?php echo $tbl_backlink_stat->id_profile->CellAttributes() ?>>
<div<?php echo $tbl_backlink_stat->id_profile->ViewAttributes() ?>><?php echo $tbl_backlink_stat->id_profile->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_backlink_stat->stat_date->Visible) { // stat_date ?>
	<tr<?php echo $tbl_backlink_stat->stat_date->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $tbl_backlink_stat->stat_date->FldCaption() ?></td>
		<td<?php echo $tbl_backlink_stat->stat_date->CellAttributes() ?>>
<div<?php echo $tbl_backlink_stat->stat_date->ViewAttributes() ?>><?php echo $tbl_backlink_stat->stat_date->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_backlink_stat->year->Visible) { // year ?>
	<tr<?php echo $tbl_backlink_stat->year->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $tbl_backlink_stat->year->FldCaption() ?></td>
		<td<?php echo $tbl_backlink_stat->year->CellAttributes() ?>>
<div<?php echo $tbl_backlink_stat->year->ViewAttributes() ?>><?php echo $tbl_backlink_stat->year->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_backlink_stat->month->Visible) { // month ?>
	<tr<?php echo $tbl_backlink_stat->month->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $tbl_backlink_stat->month->FldCaption() ?></td>
		<td<?php echo $tbl_backlink_stat->month->CellAttributes() ?>>
<div<?php echo $tbl_backlink_stat->month->ViewAttributes() ?>><?php echo $tbl_backlink_stat->month->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_backlink_stat->week->Visible) { // week ?>
	<tr<?php echo $tbl_backlink_stat->week->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $tbl_backlink_stat->week->FldCaption() ?></td>
		<td<?php echo $tbl_backlink_stat->week->CellAttributes() ?>>
<div<?php echo $tbl_backlink_stat->week->ViewAttributes() ?>><?php echo $tbl_backlink_stat->week->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_backlink_stat->backlink1->Visible) { // backlink1 ?>
	<tr<?php echo $tbl_backlink_stat->backlink1->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $tbl_backlink_stat->backlink1->FldCaption() ?></td>
		<td<?php echo $tbl_backlink_stat->backlink1->CellAttributes() ?>>
<div<?php echo $tbl_backlink_stat->backlink1->ViewAttributes() ?>><?php echo $tbl_backlink_stat->backlink1->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_backlink_stat->backlink2->Visible) { // backlink2 ?>
	<tr<?php echo $tbl_backlink_stat->backlink2->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $tbl_backlink_stat->backlink2->FldCaption() ?></td>
		<td<?php echo $tbl_backlink_stat->backlink2->CellAttributes() ?>>
<div<?php echo $tbl_backlink_stat->backlink2->ViewAttributes() ?>><?php echo $tbl_backlink_stat->backlink2->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_backlink_stat->backlink3->Visible) { // backlink3 ?>
	<tr<?php echo $tbl_backlink_stat->backlink3->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $tbl_backlink_stat->backlink3->FldCaption() ?></td>
		<td<?php echo $tbl_backlink_stat->backlink3->CellAttributes() ?>>
<div<?php echo $tbl_backlink_stat->backlink3->ViewAttributes() ?>><?php echo $tbl_backlink_stat->backlink3->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($tbl_backlink_stat->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<?php if (!isset($tbl_backlink_stat_view->Pager)) $tbl_backlink_stat_view->Pager = new cPrevNextPager($tbl_backlink_stat_view->lStartRec, $tbl_backlink_stat_view->lDisplayRecs, $tbl_backlink_stat_view->lTotalRecs) ?>
<?php if ($tbl_backlink_stat_view->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="phpmaker"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($tbl_backlink_stat_view->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_backlink_stat_view->PageUrl() ?>start=<?php echo $tbl_backlink_stat_view->Pager->FirstButton->Start ?>"><img src="images/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($tbl_backlink_stat_view->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_backlink_stat_view->PageUrl() ?>start=<?php echo $tbl_backlink_stat_view->Pager->PrevButton->Start ?>"><img src="images/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo EW_TABLE_PAGE_NO ?>" id="<?php echo EW_TABLE_PAGE_NO ?>" value="<?php echo $tbl_backlink_stat_view->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($tbl_backlink_stat_view->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_backlink_stat_view->PageUrl() ?>start=<?php echo $tbl_backlink_stat_view->Pager->NextButton->Start ?>"><img src="images/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($tbl_backlink_stat_view->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_backlink_stat_view->PageUrl() ?>start=<?php echo $tbl_backlink_stat_view->Pager->LastButton->Start ?>"><img src="images/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $tbl_backlink_stat_view->Pager->PageCount ?></span></td>
	</tr></table>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_backlink_stat_view->sSrchWhere == "0=101") { ?>
	<span class="phpmaker"><?php echo $Language->Phrase("EnterSearchCriteria") ?></span>
	<?php } else { ?>
	<span class="phpmaker"><?php echo $Language->Phrase("NoRecord") ?></span>
	<?php } ?>
	<?php } else { ?>
	<span class="phpmaker"><?php echo $Language->Phrase("NoPermission") ?></span>
	<?php } ?>
<?php } ?>
		</td>
	</tr>
</table>
</form>
<?php } ?>
<p>
<?php if ($tbl_backlink_stat->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$tbl_backlink_stat_view->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_backlink_stat_view {

	// Page ID
	var $PageID = 'view';

	// Table name
	var $TableName = 'tbl_backlink_stat';

	// Page object name
	var $PageObjName = 'tbl_backlink_stat_view';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $tbl_backlink_stat;
		if ($tbl_backlink_stat->UseTokenInUrl) $PageUrl .= "t=" . $tbl_backlink_stat->TableVar . "&"; // Add page token
		return $PageUrl;
	}

	// Page URLs
	var $AddUrl;
	var $EditUrl;
	var $CopyUrl;
	var $DeleteUrl;
	var $ViewUrl;
	var $ListUrl;

	// Export URLs
	var $ExportPrintUrl;
	var $ExportHtmlUrl;
	var $ExportExcelUrl;
	var $ExportWordUrl;
	var $ExportXmlUrl;
	var $ExportCsvUrl;

	// Update URLs
	var $InlineAddUrl;
	var $InlineCopyUrl;
	var $InlineEditUrl;
	var $GridAddUrl;
	var $GridEditUrl;
	var $MultiDeleteUrl;
	var $MultiUpdateUrl;

	// Message
	function getMessage() {
		return @$_SESSION[EW_SESSION_MESSAGE];
	}

	function setMessage($v) {
		if (@$_SESSION[EW_SESSION_MESSAGE] <> "") { // Append
			$_SESSION[EW_SESSION_MESSAGE] .= "<br>" . $v;
		} else {
			$_SESSION[EW_SESSION_MESSAGE] = $v;
		}
	}

	// Show message
	function ShowMessage() {
		$sMessage = $this->getMessage();
		$this->Message_Showing($sMessage);
		if ($sMessage <> "") { // Message in Session, display
			echo "<p><span class=\"ewMessage\">" . $sMessage . "</span></p>";
			$_SESSION[EW_SESSION_MESSAGE] = ""; // Clear message in Session
		}
	}

	// Validate page request
	function IsPageRequest() {
		global $objForm, $tbl_backlink_stat;
		if ($tbl_backlink_stat->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_backlink_stat->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_backlink_stat->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_backlink_stat_view() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (tbl_backlink_stat)
		$GLOBALS["tbl_backlink_stat"] = new ctbl_backlink_stat();

		// Table object (tbl_user)
		$GLOBALS['tbl_user'] = new ctbl_user();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'tbl_backlink_stat', TRUE);

		// Start timer
		$GLOBALS["gsTimer"] = new cTimer();

		// Open connection
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $UserProfile, $Language, $Security, $objForm;
		global $tbl_backlink_stat;

		// Security
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel($this->TableName);
		$Security->TablePermission_Loaded();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		if (!$Security->CanView()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("tbl_backlink_statlist.php");
		}

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();
	}

	//
	// Page_Terminate
	//
	function Page_Terminate($url = "") {
		global $conn;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		 // Close connection
		$conn->Close();

		// Go to URL if specified
		$this->Page_Redirecting($url);
		if ($url <> "") {
			if (!EW_DEBUG_ENABLED && ob_get_length())
				ob_end_clean();
			header("Location: " . $url);
		}
		exit();
	}
	var $lDisplayRecs = 1;
	var $lStartRec;
	var $lStopRec;
	var $lTotalRecs = 0;
	var $lRecRange = 10;
	var $lRecCnt;
	var $arRecKey = array();

	//
	// Page main
	//
	function Page_Main() {
		global $Language, $tbl_backlink_stat;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["id_profile"] <> "") {
				$tbl_backlink_stat->id_profile->setQueryStringValue($_GET["id_profile"]);
				$this->arRecKey["id_profile"] = $tbl_backlink_stat->id_profile->QueryStringValue;
			} else {
				$bLoadCurrentRecord = TRUE;
			}
			if (@$_GET["stat_date"] <> "") {
				$tbl_backlink_stat->stat_date->setQueryStringValue($_GET["stat_date"]);
				$this->arRecKey["stat_date"] = $tbl_backlink_stat->stat_date->QueryStringValue;
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$tbl_backlink_stat->CurrentAction = "I"; // Display form
			switch ($tbl_backlink_stat->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					if ($rs = $this->LoadRecordset()) // Load records
						$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage($Language->Phrase("NoRecord")); // Set no record message
						$this->Page_Terminate("tbl_backlink_statlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($tbl_backlink_stat->id_profile->CurrentValue) == strval($rs->fields('id_profile')) AND strval($tbl_backlink_stat->stat_date->CurrentValue) == strval($rs->fields('stat_date'))) {
								$tbl_backlink_stat->setStartRecordNumber($this->lStartRec); // Save record position
								$bMatchRecord = TRUE;
								break;
							} else {
								$this->lStartRec++;
								$rs->MoveNext();
							}
						}
					}
					if (!$bMatchRecord) {
						$this->setMessage($Language->Phrase("NoRecord")); // Set no record message
						$sReturnUrl = "tbl_backlink_statlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "tbl_backlink_statlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$tbl_backlink_stat->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $tbl_backlink_stat;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$tbl_backlink_stat->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$tbl_backlink_stat->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $tbl_backlink_stat->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$tbl_backlink_stat->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$tbl_backlink_stat->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$tbl_backlink_stat->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_backlink_stat;

		// Call Recordset Selecting event
		$tbl_backlink_stat->Recordset_Selecting($tbl_backlink_stat->CurrentFilter);

		// Load List page SQL
		$sSql = $tbl_backlink_stat->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$tbl_backlink_stat->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_backlink_stat;
		$sFilter = $tbl_backlink_stat->KeyFilter();

		// Call Row Selecting event
		$tbl_backlink_stat->Row_Selecting($sFilter);

		// Load SQL based on filter
		$tbl_backlink_stat->CurrentFilter = $sFilter;
		$sSql = $tbl_backlink_stat->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$tbl_backlink_stat->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $tbl_backlink_stat;
		$tbl_backlink_stat->id_profile->setDbValue($rs->fields('id_profile'));
		$tbl_backlink_stat->stat_date->setDbValue($rs->fields('stat_date'));
		$tbl_backlink_stat->year->setDbValue($rs->fields('year'));
		$tbl_backlink_stat->month->setDbValue($rs->fields('month'));
		$tbl_backlink_stat->week->setDbValue($rs->fields('week'));
		$tbl_backlink_stat->backlink1->setDbValue($rs->fields('backlink1'));
		$tbl_backlink_stat->backlink2->setDbValue($rs->fields('backlink2'));
		$tbl_backlink_stat->backlink3->setDbValue($rs->fields('backlink3'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $tbl_backlink_stat;

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print&" . "id_profile=" . urlencode($tbl_backlink_stat->id_profile->CurrentValue) . "&stat_date=" . urlencode($tbl_backlink_stat->stat_date->CurrentValue);
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html&" . "id_profile=" . urlencode($tbl_backlink_stat->id_profile->CurrentValue) . "&stat_date=" . urlencode($tbl_backlink_stat->stat_date->CurrentValue);
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel&" . "id_profile=" . urlencode($tbl_backlink_stat->id_profile->CurrentValue) . "&stat_date=" . urlencode($tbl_backlink_stat->stat_date->CurrentValue);
		$this->ExportWordUrl = $this->PageUrl() . "export=word&" . "id_profile=" . urlencode($tbl_backlink_stat->id_profile->CurrentValue) . "&stat_date=" . urlencode($tbl_backlink_stat->stat_date->CurrentValue);
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml&" . "id_profile=" . urlencode($tbl_backlink_stat->id_profile->CurrentValue) . "&stat_date=" . urlencode($tbl_backlink_stat->stat_date->CurrentValue);
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv&" . "id_profile=" . urlencode($tbl_backlink_stat->id_profile->CurrentValue) . "&stat_date=" . urlencode($tbl_backlink_stat->stat_date->CurrentValue);
		$this->AddUrl = $tbl_backlink_stat->AddUrl();
		$this->EditUrl = $tbl_backlink_stat->EditUrl();
		$this->CopyUrl = $tbl_backlink_stat->CopyUrl();
		$this->DeleteUrl = $tbl_backlink_stat->DeleteUrl();
		$this->ListUrl = $tbl_backlink_stat->ListUrl();

		// Call Row_Rendering event
		$tbl_backlink_stat->Row_Rendering();

		// Common render codes for all row types
		// id_profile

		$tbl_backlink_stat->id_profile->CellCssStyle = ""; $tbl_backlink_stat->id_profile->CellCssClass = "";
		$tbl_backlink_stat->id_profile->CellAttrs = array(); $tbl_backlink_stat->id_profile->ViewAttrs = array(); $tbl_backlink_stat->id_profile->EditAttrs = array();

		// stat_date
		$tbl_backlink_stat->stat_date->CellCssStyle = ""; $tbl_backlink_stat->stat_date->CellCssClass = "";
		$tbl_backlink_stat->stat_date->CellAttrs = array(); $tbl_backlink_stat->stat_date->ViewAttrs = array(); $tbl_backlink_stat->stat_date->EditAttrs = array();

		// year
		$tbl_backlink_stat->year->CellCssStyle = ""; $tbl_backlink_stat->year->CellCssClass = "";
		$tbl_backlink_stat->year->CellAttrs = array(); $tbl_backlink_stat->year->ViewAttrs = array(); $tbl_backlink_stat->year->EditAttrs = array();

		// month
		$tbl_backlink_stat->month->CellCssStyle = ""; $tbl_backlink_stat->month->CellCssClass = "";
		$tbl_backlink_stat->month->CellAttrs = array(); $tbl_backlink_stat->month->ViewAttrs = array(); $tbl_backlink_stat->month->EditAttrs = array();

		// week
		$tbl_backlink_stat->week->CellCssStyle = ""; $tbl_backlink_stat->week->CellCssClass = "";
		$tbl_backlink_stat->week->CellAttrs = array(); $tbl_backlink_stat->week->ViewAttrs = array(); $tbl_backlink_stat->week->EditAttrs = array();

		// backlink1
		$tbl_backlink_stat->backlink1->CellCssStyle = ""; $tbl_backlink_stat->backlink1->CellCssClass = "";
		$tbl_backlink_stat->backlink1->CellAttrs = array(); $tbl_backlink_stat->backlink1->ViewAttrs = array(); $tbl_backlink_stat->backlink1->EditAttrs = array();

		// backlink2
		$tbl_backlink_stat->backlink2->CellCssStyle = ""; $tbl_backlink_stat->backlink2->CellCssClass = "";
		$tbl_backlink_stat->backlink2->CellAttrs = array(); $tbl_backlink_stat->backlink2->ViewAttrs = array(); $tbl_backlink_stat->backlink2->EditAttrs = array();

		// backlink3
		$tbl_backlink_stat->backlink3->CellCssStyle = ""; $tbl_backlink_stat->backlink3->CellCssClass = "";
		$tbl_backlink_stat->backlink3->CellAttrs = array(); $tbl_backlink_stat->backlink3->ViewAttrs = array(); $tbl_backlink_stat->backlink3->EditAttrs = array();
		if ($tbl_backlink_stat->RowType == EW_ROWTYPE_VIEW) { // View row

			// id_profile
			if (strval($tbl_backlink_stat->id_profile->CurrentValue) <> "") {
				$sFilterWrk = "`id` = " . ew_AdjustSql($tbl_backlink_stat->id_profile->CurrentValue) . "";
			$sSqlWrk = "SELECT DISTINCT `name` FROM `tbl_profile`";
			$sWhereWrk = "";
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . "is_active = '1'" . ")";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `name` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_backlink_stat->id_profile->ViewValue = $rswrk->fields('name');
					$rswrk->Close();
				} else {
					$tbl_backlink_stat->id_profile->ViewValue = $tbl_backlink_stat->id_profile->CurrentValue;
				}
			} else {
				$tbl_backlink_stat->id_profile->ViewValue = NULL;
			}
			$tbl_backlink_stat->id_profile->CssStyle = "";
			$tbl_backlink_stat->id_profile->CssClass = "";
			$tbl_backlink_stat->id_profile->ViewCustomAttributes = "";

			// stat_date
			$tbl_backlink_stat->stat_date->ViewValue = $tbl_backlink_stat->stat_date->CurrentValue;
			$tbl_backlink_stat->stat_date->ViewValue = ew_FormatDateTime($tbl_backlink_stat->stat_date->ViewValue, 5);
			$tbl_backlink_stat->stat_date->CssStyle = "";
			$tbl_backlink_stat->stat_date->CssClass = "";
			$tbl_backlink_stat->stat_date->ViewCustomAttributes = "";

			// year
			$tbl_backlink_stat->year->ViewValue = $tbl_backlink_stat->year->CurrentValue;
			$tbl_backlink_stat->year->CssStyle = "";
			$tbl_backlink_stat->year->CssClass = "";
			$tbl_backlink_stat->year->ViewCustomAttributes = "";

			// month
			$tbl_backlink_stat->month->ViewValue = $tbl_backlink_stat->month->CurrentValue;
			$tbl_backlink_stat->month->CssStyle = "";
			$tbl_backlink_stat->month->CssClass = "";
			$tbl_backlink_stat->month->ViewCustomAttributes = "";

			// week
			$tbl_backlink_stat->week->ViewValue = $tbl_backlink_stat->week->CurrentValue;
			$tbl_backlink_stat->week->CssStyle = "";
			$tbl_backlink_stat->week->CssClass = "";
			$tbl_backlink_stat->week->ViewCustomAttributes = "";

			// backlink1
			$tbl_backlink_stat->backlink1->ViewValue = $tbl_backlink_stat->backlink1->CurrentValue;
			$tbl_backlink_stat->backlink1->CssStyle = "";
			$tbl_backlink_stat->backlink1->CssClass = "";
			$tbl_backlink_stat->backlink1->ViewCustomAttributes = "";

			// backlink2
			$tbl_backlink_stat->backlink2->ViewValue = $tbl_backlink_stat->backlink2->CurrentValue;
			$tbl_backlink_stat->backlink2->CssStyle = "";
			$tbl_backlink_stat->backlink2->CssClass = "";
			$tbl_backlink_stat->backlink2->ViewCustomAttributes = "";

			// backlink3
			$tbl_backlink_stat->backlink3->ViewValue = $tbl_backlink_stat->backlink3->CurrentValue;
			$tbl_backlink_stat->backlink3->CssStyle = "";
			$tbl_backlink_stat->backlink3->CssClass = "";
			$tbl_backlink_stat->backlink3->ViewCustomAttributes = "";

			// id_profile
			$tbl_backlink_stat->id_profile->HrefValue = "";
			$tbl_backlink_stat->id_profile->TooltipValue = "";

			// stat_date
			$tbl_backlink_stat->stat_date->HrefValue = "";
			$tbl_backlink_stat->stat_date->TooltipValue = "";

			// year
			$tbl_backlink_stat->year->HrefValue = "";
			$tbl_backlink_stat->year->TooltipValue = "";

			// month
			$tbl_backlink_stat->month->HrefValue = "";
			$tbl_backlink_stat->month->TooltipValue = "";

			// week
			$tbl_backlink_stat->week->HrefValue = "";
			$tbl_backlink_stat->week->TooltipValue = "";

			// backlink1
			$tbl_backlink_stat->backlink1->HrefValue = "";
			$tbl_backlink_stat->backlink1->TooltipValue = "";

			// backlink2
			$tbl_backlink_stat->backlink2->HrefValue = "";
			$tbl_backlink_stat->backlink2->TooltipValue = "";

			// backlink3
			$tbl_backlink_stat->backlink3->HrefValue = "";
			$tbl_backlink_stat->backlink3->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($tbl_backlink_stat->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$tbl_backlink_stat->Row_Rendered();
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	function Message_Showing(&$msg) {

		// Example:
		//$msg = "your new message";

	}
}
?>
