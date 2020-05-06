<?php
include_once 'includes/db.php';

include ("header.php");

htmlheader();
checkadminAuthority();


$WhereUsers = "" ; 
$tablename = "users_conferance";
if(isset($_GET["delete"])){
    
    if(delete ($tablename,$_GET["delete"]))
        header("Refresh:0; url=usersconf.php");
}

$mobilenum  ;
$ClassMsg =  'failureBlock' ;
$icon = 'warning';
		
if(isset($_POST["btnSearch"])){
$mobilenum = $_POST['MobileNum_text'];

if($mobilenum != 'Search by Mobile Num'  )
	$WhereUsers.= trim($mobilenum," ") != '' ? "  and mobilenum = $mobilenum" : "";
}

if(isset($_REQUEST['submit_select'])){
    $Success = true;
    $UsersID  = $_REQUEST['UsersID']; 
    foreach ($UsersID as $uid){ 
      $Success = ActiveUserCertificate($uid,"users_conferance");    
    }
   if($Success){
		$_GLOBALS['message']= "the Certificate has been sent to (".count($UsersID).") Users";
		$ClassMsg = 'successBlock' ;
        $icon = 'success';
   }else{
	$_GLOBALS['message']= "There is a problem please try later";
   }
}


?>

<script src='js/jquery-3.1.1.min.js'></script>
<style>
td {
    font-size: 13px;
}
td.topTitle.bold {
    font-weight: 600;
}
</style>
<BODY onkeypress="if (window.eF_js_keypress) eF_js_keypress(event);" onbeforeunload="if (window.periodicUpdater) periodicUpdater(false);">


<table class="pageLayout hideLeft" id="pageLayout">
<tbody>
<tr>
<td style="vertical-align: top;">
<table style="width: 100%;">
<tbody>
<?php
tableheader($_SESSION["doc_adminID"],"usersconf","Users to Conferance");
?>
<tr>

<td class="layoutColumn centerfull">
<div class="block" style=";" id="Exams">
<div class="blockContents">
<span class="handles"><img src="images/transparent.gif" class="open open-close-handle sprite16 sprite16-navigate_up" alt="Expand/collapse block" title="Expand/collapse block" onclick="toggleBlock(this, '7216436d3089664d526b015b22b42abe')" id="Tests_image"><img src="images/transparent.gif" class="blockMoveHandle sprite16 sprite16-attachment" alt="Move block" title="Move block" onmousedown="createSortable('firstlist');createSortable('secondlist');if (window.showBorders) showBorders(event)" onmouseup="if (window.showBorders) hideBorders(event)"></span>
<span class="title">Conferances Users</span>
<span class="subtitle"></span>

<div class="content" style="" id="Tests_content" >
<div class="headerTools">
<span>
<img src="images/transparent.gif" class="sprite16 sprite16-add" title="Add test" alt="Add test">
<a href="./addedituser.php?type=conf">Add Users</a>
</span>
</div>

<div style="padding-top:12px;padding-bottom:12px">
				<form method="post" >
					<input type="text" id= "MobileNum_text" name="MobileNum_text" style="width:200px" value="<?php echo isset($mobilenum) ? $mobilenum: 'Search by Mobile Num' ?>" onclick="if(this.value=='Search by Mobile Num')this.value='';" onblur="if(this.value=='')this.value='Search by Mobile Num';" class="searchBox_catalog" >
					<input type="submit" name="btnSearch" value="Search"   />
				</form>
				
				</div>
				
<script type="text/javascript">
</script>
			<script>
			   var ActiveflagArr = {};
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
                <tr class="defaultRowHeight">
                    <td class="topTitle bold">Arabic Name</td>
					<!--<td class="topTitle">English Name</td>-->
					<td class="topTitle bold">Search Title</td>
					<td class="topTitle bold">Mobile Num</td>
					<!--<td class="topTitle">Classification</td>-->
					<td class="topTitle bold">Email</td>
					<td class="topTitle bold">Major</td>
					<td class="topTitle bold">Participate</td>
					<td class="topTitle bold">Poster Title (Summery)</td>
					<td class="topTitle bold">Conferance Name</td>
					<td class="topTitle bold">Activate</td>
					<td class="topTitle bold">Certificate</td>
					<td class="topTitle bold">Reg Date</td>
                    <td class="topTitle bold centerAlign noSort">Functions</td>
                </tr>
                
                <?php
                
                $Users = getUsersConf($WhereUsers ,null);
                $index = 1;
                 while($user=mysqli_fetch_array($Users)) {
                 ?>    
                <tr class="<?php echo $index%2 == 0 ? "oddRowColor" : "evenRowColor" ?> defaultRowHeight">
                     <td><?php echo $user['arabicname']; ?></td>
					 <!--<td><?php //echo $user['engname']; ?></td>-->
					 <td><?php echo $user['nationalid']; ?></td>
					 <td><?php echo $user['mobilenum']; ?></td>
                     <td><?php echo $user['email']; ?></td>
                     <td><?php echo $user['workname']; ?></td>
					  <td><?php echo $user['conftype']; ?></td>
					  <?php if( $user['conftype'] == "مشارك"){ ?>
					 <td><?php echo $user['postertitle']; ?> <a href="../uploads/<?php echo $user['posterfile'];?>"><img src="images/download.png"  alt="Download" title="Download"></a></br>
						(<?php echo $user['postersummery']; ?>)
						</td>
					<?php }else {
						echo "<td></td>";
					} ?>
					 <td><?php echo $user['Conferancename']; ?></td>
					  <?php
                          $activeflag = $user['isactive'] > 0 ? "false" : "true"; 
					  ?>
					<script> 
						ActiveflagArr['<?php echo $user['ID']; ?>'] =  <?php echo $activeflag ; ?>; 
					</script>
					 <td><img src="images/transparent.gif" id="usera_<?php echo $user['ID']; ?>" class="ajaxHandle sprite16 sprite16-<?php echo $user['isactive'] > 0 ? "success" : "error_delete"; ?>" alt="<?php echo $user['isactive'] > 0 ? "Deactivate" : "Activate"; ?>" title="<?php echo $user['isactive'] > 0 ? "Deactivate" : "Activate"; ?>" onclick="setactive(<?php echo $user['ID']; ?> , ActiveflagArr[<?php echo $user['ID']; ?>],'<?php echo $tablename; ?>');"></td>
					 <td><img src="images/transparent.gif" class="ajaxHandle sprite16 sprite16-<?php echo $user['iscertificate'] > 0? "success" : "error_delete" ;?>"></td>
					 
					 <td><?php echo $user['regdate']; ?></td>
                    <td class="noWrap centerAlign">
						<a href="./addedituser.php?type=conf&ID=<?php echo $user['ID'];?>"><img src="images/transparent.gif" class="sprite16 sprite16-edit" alt="Edit" title="Edit"></a>
                        <img src="images/transparent.gif" class="ajaxHandle sprite16 sprite16-error_delete" alt="Delete" title="Delete" onclick="if (confirm('This operation is irreversible! Are you sure?')) location.href = '?delete=<?php echo "ID=".$user['ID']; ?>';">
						<input type="checkbox" name="UsersID[]"<?php echo $user['isactive'] == 0 ? "disabled" : "" ; ?> id="ch_<?php echo $user['ID']; ?>" value="<?php echo $user['ID']; ?>" id="<?php echo $user['ID'] ; ?>" >
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