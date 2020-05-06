<?php 
if (file_exists('db.php')){
    include_once 'db.php';
}elseif (file_exists('db.php')) {
     include_once 'db.php';
}

function checkuserAuthority(){
    if($_SESSION['TypeID'] == "admin")
        header("location:admin.php");
 //   die;
}

function checkadminAuthority(){
    if($_SESSION['UserType'] != "admin")
        header("location:user.php");
   // die;
}

function getUsers($WhereSt,$format){
    $sqlStr = "SELECT
                users_courses.ID,
                users_courses.arabicname,
                users_courses.engname,
                users_courses.nationalid,
                users_courses.mobilenum,
                users_courses.tasneefnum,
                users_courses.email,
                users_courses.workname,
                users_courses.location,
                users_courses.studentlevel,
                users_courses.courseID,
                users_courses.isactive,
                users_courses.iscertificate,
                users_courses.hashkey
                FROM
                users_courses $WhereSt" ; 
        $result= executeQuery($sqlStr,$format);
        return $result;
}



function getUserCourses($WhereSt,$format){
     $sqlStr = "SELECT
                users_courses.ID,
                users_courses.arabicname,
                users_courses.engname,
                users_courses.nationalid,
                users_courses.mobilenum,
                users_courses.tasneefnum,
                users_courses.email,
                users_courses.workname,
                users_courses.location,
                users_courses.studentlevel,
                users_courses.courseID,
                users_courses.isactive,
                users_courses.iscertificate,
                users_courses.hashkey,
                users_courses.regdate,
                users_courses.ispay,
		users_courses.participatetype,
                courses.Coursename
                FROM
                users_courses
                INNER JOIN courses ON users_courses.courseID = courses.ID $WhereSt" ; 
        $result= executeQuery($sqlStr,$format);
        return $result;
}


function addEditUser_course($Userarr){
    if ($Userarr['ID'] > 0){
        $sqlstr = "update users_courses set ";
        $sqlstr.="
                users_courses.arabicname = '{$Userarr['arabicname']}',
                users_courses.engname =  '{$Userarr['engname']}',
                users_courses.nationalid =  '{$Userarr['nationalid']}',
                users_courses.mobilenum =  '{$Userarr['mobilenum']}',
                users_courses.tasneefnum =  '{$Userarr['tasneefnum']}',
                users_courses.email =  '{$Userarr['email']}',
                users_courses.workname =  '{$Userarr['workname']}',
                users_courses.location =  '{$Userarr['location']}',
                users_courses.studentlevel =  '{$Userarr['studentlevel']}',
		users_courses.participatetype =  '{$Userarr['participatetype']}',
                users_courses.courseID =  {$Userarr['courseID']}                
                where ID = {$Userarr['ID']}";
                
        if(executeQuery($sqlstr,null))
             $result = $Userarr['ID'];
         else 
           $result = 0;
           
    }else{

        $sqlstr = "insert into users_courses (arabicname,engname,nationalid,mobilenum,tasneefnum,email,workname,location,studentlevel,participatetype,courseID,hashkey,regdate,ispay) VALUE "
                . "('{$Userarr['arabicname']}','{$Userarr['engname']}','{$Userarr['nationalid']}','{$Userarr['mobilenum']}',"
                . "'{$Userarr['tasneefnum']}','{$Userarr['email']}','{$Userarr['workname']}','{$Userarr['location']}',"
                . "'{$Userarr['studentlevel']}','{$Userarr['participatetype']}',{$Userarr['courseID']},'{$Userarr['hashkey']}','{$Userarr['regdate']}',0)";
            $result= executeInsertQuery($sqlstr,null);
        }

        return $result;
}

function addEditUser_conf($Userarr){
    if ($Userarr['ID'] > 0){
        $sqlstr = "update users_conferance set ";
        $sqlstr.="
                users_conferance.arabicname = '{$Userarr['arabicname']}',
                users_conferance.engname =  '{$Userarr['engname']}',
                users_conferance.nationalid =  '{$Userarr['nationalid']}',
                users_conferance.mobilenum =  '{$Userarr['mobilenum']}',
                users_conferance.postertitle =  '{$Userarr['postertitle']}',
                users_conferance.email =  '{$Userarr['email']}',
                users_conferance.workname =  '{$Userarr['workname']}',
                users_conferance.conftype =  '{$Userarr['conftype']}',
                users_conferance.postersummery =  '{$Userarr['postersummery']}',
                users_conferance.posterfile =  '{$Userarr['posterfile']}',
                users_conferance.confID =  {$Userarr['confID']}                
                where ID = {$Userarr['ID']}";
         if(executeQuery($sqlstr,null))
             $result = $Userarr['ID'];
         else 
           $result = 0;
    }else{

        $sqlstr = "insert into users_conferance (arabicname,engname,nationalid,mobilenum,postertitle,email,workname,postersummery ,posterfile,confID,hashkey,regdate,conftype) VALUE "
                . "('{$Userarr['arabicname']}','{$Userarr['engname']}','{$Userarr['nationalid']}','{$Userarr['mobilenum']}',"
                . "'{$Userarr['postertitle']}','{$Userarr['email']}','{$Userarr['workname']}','{$Userarr['postersummery']}',"
                . "'{$Userarr['posterfile']}',{$Userarr['confID']},'{$Userarr['hashkey']}','{$Userarr['regdate']}','{$Userarr['conftype']}')";
            $result=executeInsertQuery($sqlstr,null);
        }
        return $result;
}

function getUserConf($WhereSt, $format){
    $sqlstr = "SELECT
				users_conferance.ID,
                                users_conferance.arabicname,
                                users_conferance.engname,
                                users_conferance.nationalid,
                                users_conferance.mobilenum,
                                users_conferance.postertitle,
                                users_conferance.email,
                                users_conferance.workname,
                                users_conferance.postersummery,
                                users_conferance.posterfile,
                                users_conferance.confID,
                                users_conferance.isactive,
                                users_conferance.iscertificate,
                                users_conferance.regdate,
                                users_conferance.hashkey,
                                users_conferance.conftype,
				conferances.Conferancename
				FROM
				conferances
				INNER JOIN users_conferance ON users_conferance.confID = conferances.ID $WhereSt";
    $result=executeQuery($sqlstr,$format);
    return($result);
    
}

function getCourses($WhereSt,$format){
    $sqlstr = "SELECT
                ID,
                Coursename
                FROM
                courses $WhereSt";

    $result=executeQuery($sqlstr,$format);
    return($result);
}

function getConferances($WhereSt,$format){
    $sqlstr = "SELECT
                ID,
                Conferancename
                FROM
                conferances $WhereSt";

    $result=executeQuery($sqlstr,$format);
    return($result);
}

function ActivateUserCourse($userID,$courseID,$hashkey){
    $sqlstr = "update users_courses
               set isactive = 1 where ID = $userID and courseID=$courseID and hashkey='$hashkey' ";
//echo $sqlstr;
    $result=executeQuery($sqlstr,null);
    return($result);    
}


if(isset($_POST["submit_frmregsigle"])){
    $Dataarr= array();

    $hash = md5( rand(0,1000) );
    $Dataarr['ID'] = $_POST["userID"];
    $Dataarr['arabicname'] = $_POST['arabicname'];
    $Dataarr['engname']= $_POST['engname'] ;
    $Dataarr['nationalid']=$_POST['nationalid'] ;
    $Dataarr['mobilenum']= $_POST['mobilenum'];
    $Dataarr['tasneefnum']= $_POST['tasneefnum'];
    $Dataarr['email']= $_POST['email'];
    $Dataarr['workname']= $_POST['workname'] ;
    $Dataarr['location']= $_POST['location'] ;
    $Dataarr['studentlevel'] =$_POST['studentlevel'] ;
    $Dataarr['participatetype'] =$_POST['participatetype'] ;
    

    $Dataarr['hashkey'] = $hash;
    $Dataarr['regdate'] = date("y-m-d H:i:s"); 
    
//var_dump($_POST['coursename']);
   // echo addEditUser_course($Dataarr) ; 
    foreach ($_POST['coursename'] as $courseid){
	$Dataarr['courseID'] = $courseid;
	$CurrentUserID = addEditUser_course($Dataarr) ;
    }

    if($CurrentUserID > 0 &&   $Dataarr['ID'] == 0 ){
         if(sendvarificationEmail($Dataarr,$CurrentUserID))
            echo $CurrentUserID;
         else
            echo 2;
    }else {
        echo  $CurrentUserID ;
    }

}

if(isset($_POST["submit_confregsigle"])){
    $Dataarr= array();
    $hash = md5( rand(0,1000) );

    $Dataarr['ID'] = $_POST["userID"];
    $Dataarr['arabicname'] = $_POST['arabicname'];
    $Dataarr['engname']= $_POST['engname'] ;
    $Dataarr['nationalid']=$_POST['nationalid'] ;
    $Dataarr['mobilenum']= $_POST['mobilenum'];
    //$Dataarr['tasneefnum']= $_POST['tasneefnum'];
    $Dataarr['email']= $_POST['email'];
    $Dataarr['workname']= $_POST['workname'] ;
    //$Dataarr['location']= $_POST['location'] ;
    //$Dataarr['studentlevel'] =$_POST['studentlevel'] ;
    $Dataarr['confID'] = $_POST['confname'] ;
    //$Dataarr['postertitle']= $_POST['postertitle'];
    //$Dataarr['postersummery']= $_POST['postersummery'] ;

    $Dataarr['hashkey'] = $hash;
    $Dataarr['regdate'] = date("y-m-d H:i:s"); 

    //$Dataarr['posterfile']= $_FILES['posterfile']['size'] > 0 ? uploadfile($_FILES['posterfile']) : $_POST['postertxtfile'];
    $Dataarr['conftype'] = $_POST['confparticipatetype'] ;
	if($Dataarr['conftype'] == "مشارك"){
		$Dataarr['postertitle']=  $_POST['postertitle'] ;
		$Dataarr['postersummery']=  $_POST['postersummery'] ;
		$Dataarr['posterfile']= $_FILES['posterfile']['size'] > 0 ? uploadfile($_FILES['posterfile']) : $_POST['postertxtfile'];
	}else{
		$Dataarr['postertitle']=  "";
		$Dataarr['postersummery']=  "" ;
		$Dataarr['posterfile']= "";
	}
	
	if(isset($Dataarr['posterfile'])){
	    $result = addEditUser_conf($Dataarr);
        if($result > 0)
		echo $result;
            else 
		echo 0;
	}else{
		echo 0;
	}
}

function uploadfile($file){
    $target_dir = "../uploads/";
    $filename = round(microtime(true)).".". basename($file['type']);
    $target_file = $target_dir. $filename;
         
    if (move_uploaded_file($file['tmp_name'], $target_file)) {
	return $filename;
    }else
    return false;
}

function sendvarificationEmail($Userarr,$current_id){

    $recipient = "{$Userarr['email']}" ;
    $subject = "Register | Verification";
	$course = getCourses(" where ID = {$Userarr['courseID']}","array");
	$coursename  = $course["Coursename"] ; 
	$username = $Userarr["arabicname"] ; 
    // Build the email content.
	$email_content = "<html lang='ar'>
                <head>
                <title>
                    Register | Verification
                </title>
				<style>
					td {
						float: right;
						text-align:right;
					}
				</style>
                </head>
                <body style='text-align:right; direction:rtl;'>
                    <table>
                        <tr>
                            <td style='text-align:right; float:right;'><h4>عزيزي</h4></td>
							<td style='text-align:right; float:right;'><h4>$username</h4></td>
                        </tr>
                        <tr>
                            <td style='text-align:right; float:right;'>تم تسجيلك بنجاح في كورس</td>
							<td style='text-align:right; float:right;'>$coursename</td>
                        </tr>
                        <tr>
							<td colspan='2'>لن يتم تأكيد التسجيل إلا في حال دفع رسوم الكورس ومن ثم إرسال صورة التحويل للرقم التالي 0560465430</td>
                        </tr>

                        <tr>
                            <td colspan='2'>شكرا لكم</td>
                        </tr>
                        <tr>
                            <td colspan='2'>ادارة مشروع doctor T </td>
                        </tr>
                    </table>
                </body>
            </html>";
            
     // Build the email headers.

    $email_headers = "From:noreply@doctortproject.org". "\r\n";
    $email_headers .= "MIME-Version: 1.0\r\n";
    $email_headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            return true;
        } else {
            return false;
        }
        
}
     
?>