<?php


include_once 'includes/db.php';

include ("header.php");

htmlheader();
checkadminAuthority();


if(isset($_GET["delete"])){
    
    if(delete ("courses",$_GET["delete"]))
        header("Refresh:0; url=courses.php");
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
tableheader($_SESSION["doc_adminID"],"courses","List of Courses");
?>
<tr>

<td class="layoutColumn centerfull">
<div class="block" style=";" id="Exams">
<div class="blockContents">
<span class="handles"><img src="images/transparent.gif" class="open open-close-handle sprite16 sprite16-navigate_up" alt="Expand/collapse block" title="Expand/collapse block" onclick="toggleBlock(this, '7216436d3089664d526b015b22b42abe')" id="Tests_image"><img src="images/transparent.gif" class="blockMoveHandle sprite16 sprite16-attachment" alt="Move block" title="Move block" onmousedown="createSortable('firstlist');createSortable('secondlist');if (window.showBorders) showBorders(event)" onmouseup="if (window.showBorders) hideBorders(event)"></span>
<span class="title">Courses List</span>
<span class="subtitle"></span>

<div class="content" style="" id="Tests_content" >
<div class="headerTools">
<span>
<img src="images/transparent.gif" class="sprite16 sprite16-add" title="Add test" alt="Add test">
<a href="./addeditcourse.php">Add Course</a>
</span>
</div>

        <table width="100%" class="sortedTable" style="visibility: visible;">
            <tbody>
                <tr class="defaultRowHeight">
                    <td class="topTitle"><a href="javascript:void(0)" tableindex="0" order="asc" column_name="null" style="vertical-align: middle;">Course Name</a></td>
                    <td class="topTitle centerAlign noSort">Num of Seats</td>
                    <td class="topTitle centerAlign noSort">Num of Attendance</td>
                    <td class="topTitle centerAlign noSort">Description</td>
					<td class="topTitle centerAlign noSort">Functions</td>
                </tr>
                
                <?php
                
                $Courses = getCourses("",null);
                $index = 1 ;
                if(isset($Courses))
                 while($course=mysqli_fetch_array($Courses)) {
                 ?>    
                <tr  class="<?php echo $index%2 == 0 ? "oddRowColor" : "evenRowColor" ?> defaultRowHeight">
                    <td><a class="editLink" href="./addeditcourse.php?ID=<?php echo $course['ID'];?>"><?php echo $course['Coursename']; ?></a></td>                                                              
                    <td class="centerAlign"><?php  echo $course['Numofseats']; ?></td>
                    <td class="centerAlign"><?php 
						$users = getUsersCourses(" where courseID={$course['ID']}",null);
						echo mysqli_num_rows($users); ?></td>
					<td class="centerAlign"><?php  echo $course['Description']; ?></td>
                    <td class="noWrap centerAlign">
                        <a href="./addeditcourse.php?ID=<?php echo $course['ID'];?>"><img src="images/transparent.gif" class="sprite16 sprite16-edit" alt="Edit" title="Edit"></a>
                        <img src="images/transparent.gif" class="ajaxHandle sprite16 sprite16-error_delete" alt="Delete" title="Delete" onclick="if (confirm('This operation is irreversible! Are you sure?')) location.href = '?delete=<?php echo "ID=".$course['ID']; ?>';">
                    </td>
                </tr>                  
                 <?php 
                 $index+=1;
                        } ?>
                               
            </tbody>
        </table>
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