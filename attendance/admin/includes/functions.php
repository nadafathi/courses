<?php 
if (file_exists('../db.php')){
    include_once '../db.php';
}elseif (file_exists('db.php')) {
     include_once 'db.php';
}


function checkadminAuthority(){
    if($_SESSION['doc_adminID'] != 1)
        header("location:index.php");
   // die;
}


function getAdmins($WhereSt,$format){
	$sqlstr = "SELECT
                ID,username,password
                FROM
                admins $WhereSt" ;
				
    $result=executeQuery($sqlstr,$format);
    return($result);
}

function getMessages($WhereSt,$format){
    $sqlstr = "SELECT
                ID,SenderName,SenderEmail,Message
                FROM
                messages
                $WhereSt" ;
    
    
    $result=executeQuery($sqlstr,$format);
    return($result);
}

function addEditConferance($Confarr,$updateflag){
    if ($updateflag){
        $sqlstr = "update  conferances set ";
        $sqlstr.="Conferancename = '{$Confarr['Conferancename']}' ,
                Description = '{$Confarr['Description']}'
                where ID = {$Confarr['ID']}";  
    }else{
        $sqlstr = "insert into  conferances (Conferancename,Description) VALUE "
                . "('{$Confarr['Conferancename']}','{$Confarr['Description']}')";
    }
        $result=executeQuery($sqlstr,null);
        return $result;
}

 
function addEditCourses($Courserr,$updateflag){
    if ($updateflag){
        $sqlstr = "update  courses set ";
        $sqlstr.="CourseName = '{$Courserr['CourseName']}' ,
                  Numofseats = {$Courserr['Numofseats']} ,
		 numofhours = {$Courserr['numofhours']} ,
                Description = '{$Courserr['Description']}'
                where ID = {$Courserr['ID']}";  
		$result=executeQuery($sqlstr,null);		
				
    }else{
        $sqlstr = "insert into  courses (CourseName,Numofseats,numofhours,Description) VALUE "
                . "('{$Courserr['CourseName']}',{$Courserr['Numofseats']},{$Courserr['numofhours']},'{$Courserr['Description']}')";
			
		 $result= executeInsertQuery($sqlstr,null);
    }
   
    return $result;
}

function getCofnerances($WhereSt,$format){
    $sqlstr = "SELECT
				Conferancename,
				Description,
				ID
				FROM
				conferances $WhereSt";
    $result=executeQuery($sqlstr,$format);
    return($result);

}

function getUsersConf($WhereSt,$format){
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

function getUsersCourses($WhereSt,$format){
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
 		users_courses.isgroup,
                courses.Coursename
                FROM
                users_courses
                INNER JOIN courses ON users_courses.courseID = courses.ID $WhereSt" ; 
        $result= executeQuery($sqlStr,$format);
        return $result;
}

function getCourses($WhereSt,$format){
    $sqlstr = "SELECT
                courses.ID,
                courses.Coursename,
                courses.Numofseats,
		numofhours,
                courses.Description
                FROM
                courses  $WhereSt";
    $result=executeQuery($sqlstr,$format);
    return($result);

}

function ActiveUserCertificate($UserID,$tablename){
    $sqlstr = "update $tablename set iscertificate = 1 where ID = $UserID ";
    $result=executeQuery($sqlstr,null);
	if($result)
	{
		$user = ($tablename == "users_courses") ? getUsersCourses(" where users_courses.ID=$UserID","array") : getUsersConf(" where users_conferance.ID=$UserID","array") ;
		return sendCertificateEmail($user,$tablename);
	}
  return $result;
}


function sendCertificateEmail($Userarr,$tablename){
	 $recipient = "{$Userarr['email']}" ;
	 $userlink = ($tablename == "users_courses") ? "cuid=" : "coid=";
	 $type = ($tablename == "users_courses") ? "course {$Userarr["Coursename"]}" : "conferance {$Userarr["Conferancename"]}"; 
	 
	 
	 $subject = "Certificate | Verification";
	 $email_content = "Thanks {$Userarr["engname"]} for joining us in the $type \n";
	 $email_content .= "Please click on the link below in order to get your Certificate \n";
	 $email_content .= "http://doctortproject.org/attendance/print.php?$userlink{$Userarr['ID']}&varify={$Userarr['hashkey']}";
	 $email_headers = "From:noreply@doctortproject.org";
	 // Send the email.
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        return true;
    } else {
        return false;
    }
	 
}

/*Activate Users*/
if(isset($_POST['active']) && isset($_POST['userID']) && isset($_POST['flag'])){
	     $tablename = $_POST['tname'];
	     $sqlstr = "update $tablename set ";
		$sqlstr.=" isactive = {$_POST['flag']}
                where ID = {$_POST['userID']}";
		$result =   executeQuery($sqlstr,null);
		echo $result;
}


if(isset($_POST['pay']) && isset($_POST['userID']) && isset($_POST['flag'])){
	$tablename = $_POST['tname'];
	$sqlstr = "update $tablename set ";
	$sqlstr.=" ispay = {$_POST['flag']}
            where ID = {$_POST['userID']}";
		$result =   executeQuery($sqlstr,null);
	echo $result;
}

function delete($tablename,$ID){
    $sqlstr = "Delete from $tablename where  ".$ID ;
    $result=executeQuery($sqlstr,null);
    return($result);
}
?>