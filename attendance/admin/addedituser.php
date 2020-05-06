<?php
include_once 'includes/db.php';
include ("header.php");

htmlheader();

$arabicname = "";
$engname= "";
$nationalid= "";
$mobilenum= "";
$tasneefnum= "";
$email= "";
$workname= "";
$location= "";
$studentlevel= "";
$typeID = 0;
$isactive= "";
$iscertificate= "";
$regdate= "";
$participatetype = "";

$postertitle = "";
$postersummery = "";
$posterfile = "";

$conftype = "";
$type = $_GET["type"] ; 
$userID = 0;

$results = $type == "courses" ? getCourses("",null) : getCofnerances("",null);  
$lblTitle = $type == "courses" ? "Course Name" : "Conferance Name";  
$ddlName =  $type == "courses" ? "coursename[]" : "confname";  
$ddlID =  $type == "courses" ? "coursename" : "confname"; 
$urlLink=  $type == "courses" ? "users" : "usersconf";  
$functionname = $type == "courses" ? "send_reg" : "send_conf";  
$SubmitTitle = $type == "courses" ? "submit_frmregsigle" : "submit_confregsigle";  
$SubmitValue = $type == "courses" ? "frmregsigle" : "confregsigle";  
$pagebackname = $type == "courses" ? "users" : "usersconf";


$user ;
if(isset($_GET["ID"]) && !isset($_REQUEST['submit_personal_details'])){
$userID = $_GET["ID"];
$user = $type == "courses" ? getUsersCourses(" where users_courses.ID=".$userID,"array") : getUsersConf(" where users_conferance.ID=".$userID,"array");
 
 
$arabicname = $user["arabicname"];
$engname= $user["engname"];
$nationalid= $user["nationalid"];
$mobilenum= $user["mobilenum"];
$tasneefnum= $user["tasneefnum"];
$email= $user["email"];
$workname= $user["workname"];
$location= $user["location"];
$studentlevel= $user["studentlevel"];
$participatetype = $user["participatetype"];

$postertitle = isset($user["postertitle"]) ? $user["postertitle"] : "" ;
$postersummery = isset($user["postersummery"]) ? $user["postersummery"] : "" ;
$posterfile = isset($user["posterfile"]) ? $user["posterfile"] : "" ;
$conftype =  isset($user["conftype"]) ? $user["conftype"] : "" ;
$typeID = $type == "courses" ?  $user["courseID"] : $user["confID"];
}




?>
<script src='js/jquery-3.1.1.min.js'></script>
<BODY onkeypress="if (window.eF_js_keypress) eF_js_keypress(event);" onbeforeunload="if (window.periodicUpdater) periodicUpdater(false);">

<script src='js/jquery-3.1.1.min.js'></script>
<table class="pageLayout hideLeft" id="pageLayout">
<tbody>
<tr>
<td style="vertical-align: top;">
<table style="width: 100%;">
<tbody>
<?php
tableheader($_SESSION["doc_adminID"],$urlLink,"Users List");

?>
<tr>
<td class="layoutColumn left">
</td>
<td class="layoutColumn center">
<div class="block" style=";" id="New+user+account">
<div class="blockContents">
<div class="blockContents">

            <div class="content" >
                    <form action="" method="post" name="user_form" id="user_form" enctype="multipart/form-data">

					<input class="inputText" name="UserID" type="hidden" >
					<input type="hidden" name="ptype" id="ptype" value="pa">
<table class="formElements">

    <tbody>
        <tr>
            <td  class="labelCell">
                <div id="results" align="right"></div>
		<input type="hidden" name="userID" id="userID" value="<?php echo $userID; ?>" >
                <input type="hidden" name="<?php echo $SubmitTitle; ?>" id="<?php echo $SubmitTitle; ?>" value="<?php echo $SubmitValue; ?>" >
            </td>
        </tr>
	<tr><td class="labelCell">Arabic Name:&nbsp;</td>
            <td class="elementCell"><input type="text" name="arabicname" id="arabicname" placeholder="* الاسم الثلاثي" value="<?php echo $arabicname;?>">&nbsp;<span class="formRequired">*</span></td></tr>
    
    <tr><td class="labelCell">English Name:&nbsp;</td>
            <td class="elementCell"><input type="text" name="engname" id="engname" placeholder="English Name *" value="<?php echo $engname;?>">&nbsp;<span class="formRequired">*</span></td></tr>
            
	<tr><td class="labelCell">Phone/Mobile:&nbsp;</td>
            <td class="elementCell"><input type="number" onkeypress="if(this.value.length==10) return false;" name="mobilenum" value=<?php echo $mobilenum;?> id="mobilenum" placeholder="* رقم الجوال 0500000000" >&nbsp;<span class="formRequired">*</span></td></tr>
	
	<tr><td class="labelCell">Email address:&nbsp;</td>
            <td class="elementCell"><input type="text" name="email" id="email" placeholder="* الإيميل" value=<?php echo $email;?>>&nbsp;<span class="formRequired">*</span></td></tr>
    

    <?php if($type == "courses") { ?>
	
	<tr><td class="labelCell">National ID:&nbsp;</td>
            <td class="elementCell"><input type="text" name="nationalid" id="nationalid" placeholder="* السجل المدني أو الإقامة" value=<?php echo $nationalid;?>>&nbsp;<span class="formRequired">*</span></td></tr>
	
	<tr><td class="labelCell">Work Name:&nbsp;</td>
            <td class="elementCell"><input type="text" name="workname" id="workname" placeholder="* جهة العمل" value=<?php echo $workname;?>>&nbsp;<span class="formRequired">*</span></td></tr>
    
	
    <tr><td class="labelCell">Classification Number:&nbsp;</td>
            <td class="elementCell"><input type="text" name="tasneefnum" id="tasneefnum" placeholder="رقم تصنيف الهيئة ان وجد" value=<?php echo $tasneefnum;?>></td></tr>
    
    <tr>
        <td class="labelCell">Location:&nbsp;</td>
		<td class="elementCell">
         <select name="location" id="location">
					<option value="">* --- اختر مقر الدورة---  </option>
					<option value="أون لاين" <?php echo $location == "أون لاين" ? "selected" : ""; ?> >أون لاين </option>
					<option value="بجدة - فندق الحمرا" <?php echo $location == "بجدة - فندق الحمرا" ? "selected" : ""; ?>>بجدة - فندق الحمرا</option>
		</select>
		</td>
    </tr>
	<tr>
        <td class="labelCell">Participate Type:&nbsp;</td>
		<td class="elementCell">
         <select name="participatetype" id="participatetype">
				    <option value="">--- هل تود المشاركة في الحملات المصاحبه---  </option>
					<option value="الشرح و الحضور" <?php echo $participatetype == "الشرح و الحضور" ? "selected" : ""; ?>>الشرح و الحضور</option>
					<option value="التنظيم فقط" <?php echo $participatetype == "التنظيم فقط" ? "selected" : ""; ?>>التنظيم فقط</option>
					<option value="الحضور فقط" <?php echo $participatetype == "الحضور فقط" ? "selected" : ""; ?>>الحضور فقط</option> 
				</select>
		</td>
    </tr>
    <tr>    
        <td class="labelCell">Study Level:&nbsp;</td>
        <td class="elementCell">
            <select name="studentlevel" id="studentlevel">
                <option value="">---اختر المرحلة الدراسية---</option>
                <option value="طالب" <?php echo $studentlevel == 'طالب' ? "selected" : ""; ?> >طالب</option>
                <option value="طالب امتياز" <?php echo $studentlevel == 'طالب امتياز' ? "selected" : ""; ?> >طالب امتياز</option>
                <option value="طبيب عام" <?php echo $studentlevel == 'طبيب عام' ? "selected" : ""; ?> >طبيب عام</option>
            </select>
	</td>
    </tr>
    <?php }elseif($type == "conf"){ ?>
	
	<tr><td class="labelCell">Research Title:&nbsp;</td>
            <td class="elementCell"><input type="text" name="nationalid" id="nationalid" placeholder="* اسم عنوان البحث بالكامل أو بالانجليزي" value=<?php echo $nationalid;?>>&nbsp;<span class="formRequired">*</span></td></tr>
	
	
	<tr><td class="labelCell">Major Name:&nbsp;</td>
            <td class="elementCell"><input type="text" name="workname" id="workname" placeholder="* التخصص" value=<?php echo $workname;?>>&nbsp;<span class="formRequired">*</span></td></tr>
    
	
	<tr>
        <td class="labelCell">Participate type:&nbsp;</td>
		<td class="elementCell">
         <select name="confparticipatetype" id="confparticipatetype">
					<option value="">* ---اختر نوع الحضور--- </option>
					<option value="مشارك" <?php echo $conftype == "مشارك" ? "selected" : ""; ?>>مشارك</option>
					<option value="حضور فقط" <?php echo $conftype == "حضور فقط" ? "selected" : ""; ?>>حضور فقط</option>
		</select>
		</td>
    </tr>
	
		<tr class="participate"><td class="labelCell">Poster Title:&nbsp;</td>
				<td class="elementCell"><input type="text" name="postertitle" id="postertitle" placeholder="* عنوان البوستر"  value="<?php echo $postertitle; ?>">&nbsp;<span class="formRequired">*</span></td></tr>
		<tr class="participate"><td class="labelCell">Poster Summery:&nbsp;</td>
				<td class="elementCell"> <input type="text" name="postersummery" id="postersummery" placeholder="* ملخص البوستر"  value="<?php echo $postersummery; ?>">&nbsp;<span class="formRequired">*</span></td></tr>		
		<tr class="participate"><td class="labelCell">Upload Poster File</br> only JPG/PNG < 2MB:&nbsp;</td>
			<td class="elementCell">
				<input id="postertxtfile" name="postertxtfile" type="hidden" value="<?php echo $user['posterfile']?>" />
				<input id="posterfile" name="posterfile" type="file" /> <a href="../uploads/<?php echo $user['posterfile'];?>"><img src="images/download.png"  alt="Download" title="Download"></a></td>
		</tr>
    <?php } ?>
    
    
			
	<tr><td class="labelCell"><?php echo $lblTitle; ?></td>
            <td class="elementCell">
                <SELECT name="<?php echo $ddlName; ?>" id="<?php echo $ddlID; ?>">
				<OPTION value=""> -- Choose the Value--- </OPTION>				
                     <?php 
                while($typ=mysqli_fetch_array($results)) {
                ?>
                    <OPTION value="<?php echo $typ["ID"]; ?>" name="<?php echo $typ["ID"]; ?>" <?php echo ($typeID == $typ["ID"]) ? "selected" : ""; ?> > <?php echo $type == "courses" ? $typ["Coursename"] : $typ["Conferancename"]; ?> </OPTION>                                                                                                                      
            <?php
                }
            ?>
                </SELECT> 
    </td></tr>
    <tr><td class="labelCell"></td>
            <td class="submitCell"><input class="flatButton" name="submit_personal_details" value="Submit" type="button" onclick="return <?php echo $functionname;?>(document.getElementById('user_form'))">
            &nbsp;&nbsp;
            <input class="flatButton" value="Back" type="button" onclick="openpage('<?php echo $pagebackname?>.php');">&nbsp;
            </td></tr>
</tbody></table>
</form>
<script>
    function openpage(pagelink){
        
        location.href = pagelink;
    }
    $(document).ready(function () {
	$(".participate").hide();
	$("#confparticipatetype").change(function () {
		if(this.value == "مشارك"){
			$(".participate").show(800);
		}else{
			$(".participate").hide(800);
		}
	});

});

</script>

            </div>
            <span style="display:none">&nbsp;</span>
</div>



                            </div>
</div>
</td>
<td class="layoutColumn right">
</td></tr>	
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