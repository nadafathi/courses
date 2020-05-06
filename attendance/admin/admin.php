<?php
include_once 'includes/db.php';

include ("header.php");

htmlheader();
checkadminAuthority();

?>

<BODY onkeypress="if (window.eF_js_keypress) eF_js_keypress(event);" onbeforeunload="if (window.periodicUpdater) periodicUpdater(false);">


<table class="pageLayout hideLeft" id="pageLayout">
<tbody>
<tr>
<td style="vertical-align: top;">
<table style="width: 100%;">
<tbody>
<?php

tableheader($_SESSION["doc_adminID"],null,null);
?>
<tr>


<td class="layoutColumn center">
									<table class="centerTable">
		
				<tbody><tr>
	    <td class="moduleCell">
	        <div id="sortableList">
				<div style="width:100%; height:100%;">
                    <ul class="sortable" id="firstlist" style="width:100%;">
                                <li id="firstlist_moduleIconFunctions">
                            <table class="singleColumnData">
                                    	<tbody><tr><td class="moduleCell">
        	
    <div class="block" style=";" id="Options">
        <div class="blockContents">
    			<span class="handles"><img src="images/transparent.gif" class="open open-close-handle sprite16 sprite16-navigate_up" alt="Expand/collapse block" title="Expand/collapse block" onclick="toggleBlock(this, '7c439645511a8cec23b90b6fc07c1377')" id="Options_image"><img src="images/transparent.gif" class="blockMoveHandle sprite16 sprite16-attachment" alt="Move block" title="Move block" onmousedown="createSortable('firstlist');createSortable('secondlist');if (window.showBorders) showBorders(event)" onmouseup="if (window.showBorders) hideBorders(event)"></span>
        		<span class="title">Control Panel</span>
        		<span class="subtitle"></span>
        		
        		<div class="content" style=";" id="Options_content" onmousedown="if ($('firstlist')) {Sortable.destroy('firstlist');}if ($('secondlist')) {Sortable.destroy('secondlist');}">
	    		<table class="iconTable"><tbody><tr>
                    	<td style="width:25%;" class="iconData" onclick=";location='conferances.php'">
                        	<a href="conferances.php">
                        		<img src="images/transparent.gif" class="sprite32 sprite32-categories" title="conferances" alt="conferances"><br>
                        		Conferances
                        	</a>
                        </td>
                    	<td style="width:25%;" class="iconData" onclick=";location='usersconf.php'">
                        	<a href="usersconf.php">
                        		<img src="images/transparent.gif" class="sprite32 sprite32-users" title="Users" alt="Users"><br>
                        		Users to Conferance
                        	</a>
                        </td>
                    	<td style="width:25%;" class="iconData" onclick=";location='courses.php'">
                            <a href="courses.php">
                        		<img src="images/transparent.gif" class="sprite32 sprite32-courses" title="Courses" alt="Courses"><br>
                        		Courses
                        	</a>
                        </td>
						<td style="width:25%;" class="iconData" onclick=";location='users.php'">
                        	<a href="users.php">
                        		<img src="images/transparent.gif" class="sprite32 sprite32-users" title="Users" alt="Users"><br>
                        		Users to Courses
                        	</a>
                        </td>
                    	</tr>

						
					</tbody></table>
				</div>
        		<span style="display:none">&nbsp;</span>
        </div>
    </div>
        </td></tr>
        
                            </tbody></table>
                        </li>
    	    
                        <li id="first_empty" style="display:none;"></li>
                    </ul>
                </div>
			</div>
       </td>
   </tr>
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
</table>

</BODY>

</HTML>