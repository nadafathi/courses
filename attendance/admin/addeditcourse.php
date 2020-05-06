<?php
include_once 'includes/db.php';

include ("header.php");

htmlheader();
checkadminAuthority();




$pageTitle =  isset($_GET["ID"]) ?  "" :"Add New Course" ;
$CourseID=  isset($_GET["ID"]) ? $_GET["ID"] : 0;
$updateflag = isset($_GET["ID"]) ? true : false;
$CourseName = "";
$Description = "";
$Numofseats = "";
$numofhours = "0";

$latestID = 0;
if(isset($_REQUEST['submit_test']))
{
$CourseName = $_REQUEST["CourseName"] ;
$Description = $_REQUEST["Description"] ;
$Numofseats = $_REQUEST["Numofseats"] ;
$numofhours = $_REQUEST["numofhours"] ;



$CourseArr = array();
$CourseArr['CourseName'] = $CourseName;
$CourseArr['Description'] = $Description;
$CourseArr['Numofseats'] = $Numofseats ;
$CourseArr['numofhours'] = $numofhours ;

//echo $CourseID;
$CourseArr['ID'] = $CourseID;


// print_r($userArr['email']);

$errorAdd = true;
if($errorAdd)
    $latestID = addEditCourses($CourseArr,$updateflag);
    $_GLOBALS['message']=  $latestID >= 1 ? "Operation Done Successfully!" : "There is Error Update" ;

//header("Location: examquestions.php");
}


if(isset($_GET["ID"])){

$CourseArr = getCourses(" where courses.ID=".$CourseID,"array");
$pageTitle =  isset($_GET["ID"]) ?  "Edit Course :{$CourseArr['Coursename']} " :"Add New Course" ;
$latestID = $_GET["ID"];
$CourseName = $CourseArr['Coursename'];
$Description = $CourseArr['Description'];
$Numofseats = $CourseArr['Numofseats'] ;
$numofhours = $CourseArr['numofhours'];

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
tableheader($_SESSION["doc_adminID"],"courses",$pageTitle);
?>

<tr>
<td class="layoutColumn center">
    <table class="centerTable">

<tbody><tr><td class="moduleCell">


<div class="block" style=";" id="Test+options">
<div class="blockContents">
<span class="handles"><img src="images/transparent.gif" class="open open-close-handle sprite16 sprite16-navigate_up" alt="Expand/collapse block" title="Expand/collapse block" onclick="toggleBlock(this, 'cf742b0b4c8978ae1acca9efbc4ee325')" id="Test+options_image"><img src="images/transparent.gif" class="blockMoveHandle sprite16 sprite16-attachment" alt="Move block" title="Move block" onmousedown="createSortable('firstlist');createSortable('secondlist');if (window.showBorders) showBorders(event)" onmouseup="if (window.showBorders) hideBorders(event)"></span>
<span class="title"><?php echo  isset($_GET["ID"]) ?  $pageTitle :"New Course" ; ?></span>
<span class="subtitle"></span>

<div class="content" style=";" id="Test+options_content" onmousedown="if ($('firstlist')) {Sortable.destroy('firstlist');}if ($('secondlist')) {Sortable.destroy('secondlist');}">

<script type="text/javascript">
//<![CDATA[
            function validate_create_form(frm) {
            var value = '';
            var errFlag = new Array();
            var _qfGroups = {};
            _qfMsg = '';

            value = frm.elements['CourseName'].value;
            if (value == '' && !errFlag['name']) {
            errFlag['CourseName'] = true;
            _qfMsg = _qfMsg + '\n - The field \"Course Name\" is mandatory';
            }

	    value = frm.elements['numofhours'].value;
            if (value == '' && !errFlag['numofhours']) {
            errFlag['numofhours'] = true;
            _qfMsg = _qfMsg + '\n - The field \"Number of Hours\" is mandatory';
            }

	    value = frm.elements['Numofseats'].value;
            if (value == '' && !errFlag['Numofseats']) {
            errFlag['Numofseats'] = true;
            _qfMsg = _qfMsg + '\n - The field \"Number of Seats\" is mandatory';
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
                                            Course Name:&nbsp;
                                        </td>
                                        <td class="elementCell">
                                            <input class="inputText" name="CourseName" type="text" value="<?php echo $CourseName; ?>">&nbsp;<span class="formRequired">*</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="labelCell">
                                            Number of Seats:&nbsp;
                                        </td>
                                        <td class="elementCell">
                                            <input class="inputText" name="Numofseats" type="text" value="<?php echo $Numofseats; ?>">&nbsp;<span class="formRequired">*</span>
                                        </td>
                                    </tr>
				    
				   <tr>
                                        <td class="labelCell">
                                            Number of Hours:&nbsp;
                                        </td>
                                        <td class="elementCell">
                                            <input class="inputText" name="numofhours" type="text" value="<?php echo $numofhours; ?>">&nbsp;<span class="formRequired">*</span>
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
                                            <input class="flatButton" name="submit_test" value="Save" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;                                            
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