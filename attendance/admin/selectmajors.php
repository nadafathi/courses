  ﻿<?php
include_once 'includes/db.php';

include ("header.php");

htmlheader();
checkadminAuthority();
$CourseID = 0;
if(isset($_GET["CourseID"]))
$CourseID  = $_GET["CourseID"];


if(isset($_REQUEST['submit_select'])){
    $Success = true;
    $CourseID = $_REQUEST["CourseID"];
    if(delete("courses_to_majors", " CourseID= $CourseID")){
        $MajorsID  = $_REQUEST['MajorsID']; 
        foreach ($MajorsID as $mid){ 
           $Success =  EnrollCourseMajor($CourseID,$mid);    
        }   
    }
   if($Success)
    header("location:courses.php");
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
tableheader($_SESSION["userID"],"selectmajors","Select Majors");
?>
<tr>

<td class="layoutColumn centerfull">
<div class="block" style=";" id="Exams">
<div class="blockContents">
<span class="handles"><img src="images/transparent.gif" class="open open-close-handle sprite16 sprite16-navigate_up" alt="Expand/collapse block" title="Expand/collapse block" onclick="toggleBlock(this, '7216436d3089664d526b015b22b42abe')" id="Tests_image"><img src="images/transparent.gif" class="blockMoveHandle sprite16 sprite16-attachment" alt="Move block" title="Move block" onmousedown="createSortable('firstlist');createSortable('secondlist');if (window.showBorders) showBorders(event)" onmouseup="if (window.showBorders) hideBorders(event)"></span>
<span class="title">Select Majors</span>
<span class="subtitle"></span>

<div class="content" style="" id="Tests_content" >
<div class="headerTools">

</div>
    <FORM action="" method="post">
         <input class="inputText" name="CourseID" type="hidden" value="<?php echo $CourseID; ?>">
        <table width="100%" class="sortedTable" style="visibility: visible;">
            <tbody>
                <tr class="defaultRowHeight">
                    <td class="topTitle "><a href="javascript:void(0)" tableindex="0" order="asc" column_name="null" style="vertical-align: middle;">Major Name</a></td>
                    <td class="topTitle centerAlign"><a href="javascript:void(0)" tableindex="0" order="asc" column_name="null" style="vertical-align: middle;">Faculty Name</a></td>
                    <td class="topTitle centerAlign"><a href="javascript:void(0)" tableindex="0" order="asc" column_name="null" style="vertical-align: middle;">Description</a></td>
                    <td class="topTitle centerAlign noSort">Select</td>
                </tr>
                
                <?php
                
                $Majors = getMajors("",null);
                $index = 1;
                 while($major=mysql_fetch_array($Majors)) {
                 ?>    
                <tr class="<?php echo $index%2 == 0 ? "oddRowColor" : "evenRowColor" ?> defaultRowHeight">
                   
                    <td ><?php echo $major['MajorName']; ?></td>                                                              
                    <td class="centerAlign"><?php echo $major['FacultyName']; ?></td>
                    <td class="centerAlign"><?php echo $major['Description']; ?></td>
                    <td class="centerAlign">
                        <?php 
                            $selected = getCoursestoMajors(" where courses.CourseID={$CourseID} and Majors.MajorID= {$major['ID']}", null);
                            
                            $selected = isset($selected) ? mysql_num_rows($selected) : 0 ;
                        ?>
			<input type="checkbox"  name="MajorsID[]"   value="<?php echo $major['ID']; ?>" id="<?php echo $major['ID'] ; ?>" <?php echo $selected > 0 ? "checked": "" ; ?>  > 									
                    </td>
                </tr>                  
                 <?php 
                 $index+=1;
                 } 
                 ?>
                <tr>
                    <td class="elementCell">
                        <input class="flatButton" name="submit_select" value="Save" type="submit">
                    </td>
                </TR>
            </tbody>
        </table>
        
    </FORM>
</div>
<span style="display:none">&nbsp;</span>
</div>
</div>
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