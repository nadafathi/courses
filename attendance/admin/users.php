<?php
include_once 'includes/db.php';

include ("header.php");

htmlheader();
checkadminAuthority();


$WhereUsers = "" ;


if(isset($_GET["delete"])){
    
    if(delete ("users_courses",$_GET["delete"]))
        header("Refresh:0; url=users.php");
}

$NationalID  ;
$ispay;
$participatetype;
$ClassMsg =  'failureBlock' ;
$icon = 'warning';
$isactive ;
		
if(isset($_POST["btnSearch"])){
$NationalID = $_POST['NationalID_text'];
$ispay = $_POST['checkpay'];
$isactive  = $_POST['isactive'];
$participatetype = $_POST['participatetype'];
$CourseID = $_POST['coursename'];


if($NationalID != 'Search by NationalID' )
	$WhereUsers.= trim($NationalID," ") != '' ? "  and NationalID = $NationalID" : "";
if($ispay != ""){
	$WhereUsers.= " and ispay = $ispay " ;
}

if($isactive != ""){
	$WhereUsers.= " and isactive = $isactive " ;
}
if($participatetype != ""){
	$WhereUsers.= " and participatetype= '$participatetype'" ;
}

if($CourseID != ""){
	$WhereUsers.= " and CourseID= $CourseID" ;
}



}



$Courses = getCourses("",null);

if(isset($_REQUEST['submit_select'])){
    $Success = true;
    $UsersID  = $_REQUEST['UsersID']; 
    foreach ($UsersID as $uid){ 
      $Success = ActiveUserCertificate($uid,"users_courses");    
    }
   if($Success){
		$_GLOBALS['message']= "the Certificate has been sent to (".count($UsersID).") Users";
		$ClassMsg = 'successBlock' ;
        $icon = 'success';
   }else{
	$_GLOBALS['message']= "There is a problem please try later";
   }
    //header("location:courses.php");
}


?>


<style>
td {
    font-size: 13px;
}
td.topTitle.bold {
    font-weight: 600;
}
</style>
<script src='js/jquery-3.1.1.min.js'></script>
<BODY onkeypress="if (window.eF_js_keypress) eF_js_keypress(event);" onbeforeunload="if (window.periodicUpdater) periodicUpdater(false);">


<table class="pageLayout hideLeft" id="pageLayout">
<tbody>
<tr>
<td style="vertical-align: top;">
<table style="width: 100%;">
<tbody>
<?php
tableheader($_SESSION["doc_adminID"],"users","Users to Courses");
?>
<tr>

<td class="layoutColumn centerfull">
<div class="block" style=";" id="Exams">
<div class="blockContents">
<span class="handles"><img src="images/transparent.gif" class="open open-close-handle sprite16 sprite16-navigate_up" alt="Expand/collapse block" title="Expand/collapse block" onclick="toggleBlock(this, '7216436d3089664d526b015b22b42abe')" id="Tests_image"><img src="images/transparent.gif" class="blockMoveHandle sprite16 sprite16-attachment" alt="Move block" title="Move block" onmousedown="createSortable('firstlist');createSortable('secondlist');if (window.showBorders) showBorders(event)" onmouseup="if (window.showBorders) hideBorders(event)"></span>
<span class="title">Users</span>
<span class="subtitle"></span>

<div class="content" style="" id="Tests_content" >
<div class="headerTools">
<span>
<img src="images/transparent.gif" class="sprite16 sprite16-add" title="Add test" alt="Add test">
<a href="./addedituser.php?type=courses">Add Users</a>
</span>
</div>

<div style="padding-top:12px;padding-bottom:12px">
				<form method="post" >
					<input type="text" id= "NationalID_text" name="NationalID_text" style="width:200px" value="<?php echo isset($NationalID) ? $NationalID : 'Search by NationalID' ?>" onclick="if(this.value=='Search by NationalID')this.value='';" onblur="if(this.value=='')this.value='Search by NationalID';" class="searchBox_catalog" >
					
					 

				<select name="checkpay" id="checkpay">
				    <option value="">---Choose is Payed---  </option>
					<option value="1" <?php echo $ispay =="1" ? "selected" : "" ; ?>>Yes</option>
					<option value="0"    <?php echo $ispay =="0" ? "selected" : "" ; ?>>No</option>
				</select>

				 &nbsp;&nbsp;

				<select name="isactive" id="isactive">
				    <option value="">---Choose is Activate---  </option>
					<option value="1" <?php echo $isactive  =="1" ? "selected" : "" ; ?>>Yes</option>
					<option value="0"    <?php echo $isactive  =="0" ? "selected" : "" ; ?>>No</option>
				</select>
 				&nbsp;&nbsp;


				<select name="participatetype" id="participatetype">
				    <option value="">--- المشاركة في الحملات المصاحبة---  </option>
					<option value="الشرح و الحضور" <?php echo $participatetype =="الشرح و الحضور" ? "selected" : "" ; ?>>الشرح و الحضور</option>
					<option value="التنظيم فقط"    <?php echo $participatetype =="التنظيم فقط" ? "selected" : "" ; ?>>التنظيم فقط</option>
					<option value="الحضور فقط"     <?php echo $participatetype =="الحضور فقط" ? "selected" : "" ; ?>>الحضور فقط</option> 
				</select>
				&nbsp;&nbsp;</br></br>
				<select name="coursename" id="coursename">
				    <option value="">---Choose Course Name---  </option>
					<?php while($course=mysqli_fetch_array($Courses )){ ?>
					
					<option value="<?php echo $course["ID"];?>" <?php echo $CourseID == $course["ID"] ? "selected" : "" ; ?>><?php echo $course["Coursename"]; ?></option>
					<?php } ?>
				</select>

    
					<input type="submit" name="btnSearch" value="Search"   />
				</form>
				
				</div>
				
<script type="text/javascript">
</script>
		<?php 
		if(isset($_REQUEST['submit_select'])){ 
		?>			
		<div class="block" id="messageBlock" >
			<div class="blockContents messageContents">
				<table class="messageBlock">
					<tbody><tr><td><img src="images/transparent.gif" class="sprite32 sprite32-<?php echo $icon; ?>"></td>
						<td class="<?php echo $ClassMsg; ?>"><?php echo $_GLOBALS['message'] ; ?></td>
						<td><img src="images/transparent.gif" class="sprite32 sprite32-close" alt="Close" title="Close" onclick="window.Effect ? new Effect.Fade($('messageBlock')) : document.getElementById('messageBlock').style.display = 'none';"></td></tr>
				</tbody>
				</table>
			</div>
        </div>
		<?php } ?>
				
	<form method="post" action=""> 
        <table width="100%" class="sortedTable" style="visibility: visible;">
            <tbody>
			<script>
			   var ActiveflagArr = {};
			   var PayflagArr = {}; 
			</script>
                <tr class="defaultRowHeight">
                    <td class="topTitle bold">Name</td>
					<!--<td class="topTitle">English Name</td>-->
					<td class="topTitle bold">National ID</td>
					<td class="topTitle bold">Mobile Num</td>
					<!--<td class="topTitle">Classification</td>-->
					<td class="topTitle bold">Email</td>
					<!--<td class="topTitle">Work Name</td>-->
					<td class="topTitle bold">Location</td>
					<td class="topTitle bold">Tasneef Num</td>
					<td class="topTitle bold">Course Name</td>
					<td class="topTitle bold">Activate</td>
					<td class="topTitle bold">Certificate</td>
					<td class="topTitle bold">Pay</td>
					<td class="topTitle bold">Date</td>
                    <td class="topTitle bold centerAlign noSort">Functions</td>
                </tr>
                <?php
                $Users = $WhereUsers != "" ? getUsersCourses($WhereUsers ,null) : null;
                $index = 1;
                 while($user=mysqli_fetch_array($Users)) {
                 ?>    
                <tr class="<?php echo $index%2 == 0 ? "oddRowColor" : "evenRowColor" ?> defaultRowHeight">
                     <td><?php 
				$isgroup = $user['isgroup'] > 0 ? " (g)" : "" ;
				echo $index."- ".$user['arabicname'].$isgroup; ?>
			</td>
					 <!--<td><?php //echo $user['engname']; ?></td>-->
					 <td><?php echo $user['nationalid']; ?></td>
					 <td><?php echo $user['mobilenum']; ?></td>
					 <!--<td><?php //echo $user['tasneefnum']; ?></td>-->
                     <td><?php echo $user['email']; ?></td>
					 <!--<td><?php //echo $user['workname']; ?></td>-->
					 <td><?php echo $user['location']; ?></td>
					 <td><?php echo $user['tasneefnum']; ?></td>
					 <td><?php echo $user['Coursename']; ?></td>
					  <?php
                          $activeflag = $user['isactive'] > 0 ? "false" : "true"; 
                          $payflag  = $user['ispay'] > 0 ? "false" : "true"; 
					  ?>
					<script> 
						ActiveflagArr['<?php echo $user['ID']; ?>'] =  <?php echo $activeflag ; ?>; 
						PayflagArr['<?php echo $user['ID']; ?>'] =  <?php echo $payflag ; ?>; 
					</script>
					 <td><img src="images/transparent.gif" id="usera_<?php echo $user['ID']; ?>" class="ajaxHandle sprite16 sprite16-<?php echo $user['isactive'] > 0 ? "success" : "error_delete"; ?>" alt="<?php echo $user['isactive'] > 0 ? "Deactivate" : "Activate"; ?>" title="<?php echo $user['isactive'] > 0 ? "Deactivate" : "Activate"; ?>" onclick="setactive(<?php echo $user['ID']; ?> , ActiveflagArr[<?php echo $user['ID']; ?>],'users_courses');"></td>
					 
					 
					 <td><img src="images/transparent.gif" class="ajaxHandle sprite16 sprite16-<?php echo $user['iscertificate'] > 0? "success" : "error_delete" ;?>"></td>
					 
					 <td><img src="images/transparent.gif" id="userp_<?php echo $user['ID']; ?>" class="ajaxHandle sprite16 sprite16-<?php echo $user['ispay'] > 0 ? "success" : "error_delete"; ?>" alt="<?php echo $user['ispay'] > 0 ? "Not Pay" : "Pay"; ?>" title="<?php echo $user['ispay'] > 0 ? "Not Pay" : "Pay"; ?>" onclick="setpayactive(<?php echo $user['ID']; ?> , PayflagArr[<?php echo $user['ID']; ?>],'users_courses');"></td>
					 <td><?php echo $user['regdate']; ?></td>
                    <td class="noWrap centerAlign">
						<a href="./addedituser.php?type=courses&ID=<?php echo $user['ID'];?>"><img src="images/transparent.gif" class="sprite16 sprite16-edit" alt="Edit" title="Edit"></a>
                        <img src="images/transparent.gif" class="ajaxHandle sprite16 sprite16-error_delete" alt="Delete" title="Delete" onclick="if (confirm('This operation is irreversible! Are you sure?')) location.href = '?delete=<?php echo "ID=".$user['ID']; ?>';">
						<?php //if($user['iscertificate'] == 0 ){ ?>
						<input type="checkbox" name="UsersID[]"<?php echo $user['isactive'] == 0 ? "disabled" : "" ; ?> id="ch_<?php echo $user['ID']; ?>" value="<?php echo $user['ID']; ?>" id="<?php echo $user['ID'] ; ?>" >
						<?php //} ?>
					</td>
                </tr>                  
                 <?php 
                 $index+=1;
                 } 
                 ?>
				 <tr>
				  <td colspan="11" style="text-align:right;">
                        <input class="flatButton" name="submit_select" value="Send Certificate" type="submit">
                    </td>
                 </tr>              
            </tbody>
        </table>
	</form>
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