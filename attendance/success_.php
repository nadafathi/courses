<?php

include_once 'includes/db.php';

include ("includes/header.php");

htmlheader();
//checkadminAuthority();
htmltopheader();
$WelcomeUser = "";
$WelcomeMsg = "";
$type = isset($_GET) && $_GET['type'] == 'course' ? "دورة" : "مؤتمر";
$type = $_GET['type'] == 'courses' ? '�������' : $type;
if(isset($_GET['uid'])){
    $userID = $_GET['uid'];
    $user = $_GET['type'] == 'course' || $_GET['type'] == 'courses'  ? getUserCourses(" where users_courses.ID= $userID ", "array") : getUserConf(" where users_conferance.ID= $userID ", "array") ;
    
    if(isset($user)){
        $username = $user["arabicname"];
        $name =  $_GET['type'] == 'course' ? $user["Coursename"] : $user["Conferancename"];
		$name = $_GET['type'] == 'courses' ? '' : $name;
		
        $WelcomeUser = "أهلا وسهلا " ;
        $WelcomeUser.=$username;
        $WelcomeMsg.=" تم التسجيل في  ";
        $WelcomeMsg.=$type . " ". $name . " بنجاح";
        if($_GET['type'] == 'course' || $_GET['type'] == 'courses')
            $WelcomeMsg.="</br> يرجى مراجعة البريد الالكتروني الخاص بك " ;	
    }else{
        $WelcomeUser = "لا يوجد اسم مسجل في هذه الدورة";
    }
}

?>
<style>
h3{
    direction: rtl;
    text-align: -webkit-center;
    line-height: initial;
}
</style>

    <!-- register-new -->
    <div class="register-new">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="title-page-h5"><span style="direction: rtl;"><?php echo $WelcomeUser;  ?></span></h1>
            <h3 class="title-page-h4"><span style="direction: rtl;"><?php echo $WelcomeMsg;  ?></span></h2>
          </div>
        </div>
      </div>
    </div>
    <!-- sponsors -->

<?php

echo footer();
?>