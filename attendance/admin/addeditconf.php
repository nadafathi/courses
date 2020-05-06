<?php
include_once 'includes/db.php';

include ("header.php");
htmlheader();
checkadminAuthority();


$pageTitle =  isset($_GET["ID"]) ? "" : "Add New Conferance" ;
$ConfID=  isset($_GET["ID"]) ? $_GET["ID"] : 0;
$updateflag = isset($_GET["ID"]) ? true : false;
$Conferancename= "";
$Description = "";

$latestID = 0;
if(isset($_REQUEST['submit_lvl']))
{
$Conferancename = $_REQUEST["Conferancename"] ;
$Description = $_REQUEST["Description"] ;


$ConArr = array();
$ConArr['ID'] = $ConfID;
$ConArr['Conferancename'] = $Conferancename;
$ConArr['Description'] = $Description;


// print_r($userArr['email']);
$errorAdd = true;

if($errorAdd)
    $latestID = addEditConferance($ConArr,$updateflag);
    $_GLOBALS['message']=  $latestID >= 1 ? "Operation Done Successfully!" : "There is Error Update" ;
	
//header("Location: examquestions.php");
}

$ConArr;
if(isset($_GET["ID"]) && !isset($_REQUEST['submit_lvl'])){
$ConArr = getCofnerances(" where ID=".$ConfID,"array");
$pageTitle =  isset($_GET["ID"]) ? "Edit Conferance :{$ConArr['Conferancename']} " :"Add New Conferance"  ;
$Conferancename = $ConArr['Conferancename'];
$Description = $ConArr['Description'];
}
?>
<BODY onkeypress="if (window.eF_js_keypress) eF_js_keypress(event);" onbeforeunload="if (window.periodicUpdater) periodicUpdater(false);">


<table class="pageLayout hideLeft" id="pageLayout">
<tbody>
<tr>
<td style="vertical-align: top;">
<table style="width: 100%;">
<tbody>
<?php
tableheader($_SESSION["doc_adminID"],"addeditconf",$pageTitle);
?>

<tr>
<td class="layoutColumn center">
    <table class="centerTable">

<tbody><tr><td class="moduleCell">

<div class="block" style=";" id="Add+test">
<div class="blockContents">
<span class="handles"><img src="images/transparent.gif" class="open open-close-handle sprite16 sprite16-navigate_up" alt="Expand/collapse block" title="Expand/collapse block" onclick="toggleBlock(this, '155bdd7375af910812093b53b26fb488')" id="Add+test_image"><img src="images/transparent.gif" class="blockMoveHandle sprite16 sprite16-attachment" alt="Move block" title="Move block" onmousedown="createSortable('firstlist');createSortable('secondlist');if (window.showBorders) showBorders(event)" onmouseup="if (window.showBorders) hideBorders(event)"></span>
<span class="title"><?php echo $pageTitle;?></span>
<span class="subtitle"></span>

<div class="content" style=";" id="Add+test_content" onmousedown="if ($('firstlist')) {Sortable.destroy('firstlist');}if ($('secondlist')) {Sortable.destroy('secondlist');}">
<div class="tabberlive"><ul class="tabbernav"><li class="tabberactive"><a href="javascript:void(null);" title="Test options">Conferance options</a></li></ul>
<div class="tabbertab " id="test_options" title="">


<div class="block" style=";" id="Test+options">
<div class="blockContents">




<div class="content">

<script type="text/javascript">
//<![CDATA[
            function validate_create_form(frm) {
            var value = '';
            var errFlag = new Array();
            var _qfGroups = {};
            _qfMsg = '';

            value = frm.elements['Conferancename'].value;
            if (value == '' && !errFlag['Conferancename']) {
            errFlag['Conferancename'] = true;
            _qfMsg = _qfMsg + '\n - The field \"Conferance name\" is mandatory';
            }
           
            if (_qfMsg != '') {
            _qfMsg = 'The following errors occured:' + _qfMsg;
            _qfMsg = _qfMsg + '\nPlease correct the above errors';
            alert(_qfMsg);
            return false;
            }
            return true;
            }
//]]>
</script>
      <form action="" method="post" name="test_form" id="test_form" onsubmit="try { var myValidator = validate_create_form; } catch(e) { return true; } return myValidator(this);">
                            <table class="formElements">
                                <tbody>
                                    <tr>
                                        <td> </td>
                                        <td><span id="errorLogin" name="errorLogin"><?php echo isset($_GLOBALS['message']) ? $_GLOBALS['message'] : ""; ?> </span></td>
                                    </tr>
                                    <tr>
                                        <td class="labelCell">
                                            Conferance Name:&nbsp;
                                        </td>
                                        <td class="elementCell">
                                            <input class="inputText" name="Conferancename" type="text" value="<?php echo $Conferancename; ?>">&nbsp;<span class="formRequired">*</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="labelCell">Description:&nbsp;</td>
                                        <td class="elementCell"><textarea style="height:10em;" class="inputText" id="Description" name="Description" cols="40" rows="2"><?php echo $Description ;?></textarea></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="elementCell"> 
                                            <input class="flatButton" name="submit_lvl" value="Save" type="submit">&nbsp;&nbsp;&nbsp;&nbsp; 
                                            <input class="flatButton" value="Back to Faculty List" type="button" onclick="location.href = 'conferances.php';"> 
                                        </td>                                         
                                    </tr>

                                </tbody>
                            </table>                              
			</form>


</div>
<span style="display:none">&nbsp;</span>
</div>
</div>
</div>

</div>

</div>

</div>
</div>

</td></tr>
</tbody></table>

</td>
</tr>	
</tbody>
</table>
</td>
</tr>
<?php

footer();
?>
</tbody>  	
</BODY>


</HTML>