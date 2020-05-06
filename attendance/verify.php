<?php


include_once 'includes/db.php';

include ("includes/header.php");

htmlheader();
//checkadminAuthority();
htmltopheader();
$userID = 0;
$hashkey = ""; 
$courseID = 0;
$username = "";
$coursename = "";
$isActive = 0;

$WelcomeUser = "";
$WelcomeMsg = "";
if(isset($_GET['cuid'])){
	$userID = $_GET['cuid'];
	$hashkey = $_GET['varify'];
        $user = getUsers(" where ID= $userID and hashkey='$hashkey' ", "array");
        $username = $user["arabicname"];
        $courseID = $user['courseID'];
        $course = getCourses(" where ID=$courseID","array");
        $coursename =  $course["Coursename"];
        
        if(isset($user)){
             $WelcomeUser = "أهلا وسهلا " ;
             $WelcomeUser.=$username;
             $WelcomeUser.=" في دورة ";
             $WelcomeUser.=$coursename;
            if($user["isactive"] > 0){
                $WelcomeMsg = "لقد تم تفعيلك في الدورة من قبل ";
            }else{
                if(ActivateUserCourse($userID,$courseID,$hashkey)){
                    $WelcomeMsg = "لقد تم تفعيل الدورة بنجاح شكرا لك "  ;
                }  else {
                    $WelcomeMsg = "لم يتم تفيعل تسجيلك للدورة ";    
                }         
            }                        
        }else{
            $WelcomeUser = "لا يوجد اسم مسجل في هذه الدورة";
            $WelcomeMsg = "لم يتم تفيعل تسجيلك للدورة ";
        }
}
?>


    <!-- register-new -->
    <div class="register-new">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="title-page-h5"><span style="direction: rtl;"><?php echo $WelcomeUser;  ?></span></h1>
            <h2 class="title-page-h5"><?php echo $WelcomeMsg;  ?></h2>
          </div>
        </div>
      </div>
    </div>
    <!-- sponsors -->

<?php

echo footer();
?>