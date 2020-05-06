<?php 

include_once 'functions.php';
session_start();

function htmlheader(){

echo '
 <!DOCTYPE html>
<html>
<head>
    <title>تسيجل Doctor Courses</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="img/logo.png">

    <meta property="og:image" content="img/logo.png" />
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-rtl.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/responsive-nav.css">
    <script src="js/responsive-nav.min.js"></script>
    <link href="css/jquery.bxslider.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="highslide/highslide.css" />
    <script type="text/javascript" src="highslide/highslide-with-gallery.js"></script>
    <script type="text/javascript" src="js/all_option.js" ></script>
    <link href="css/jquery.msg.css" rel="stylesheet" media="screen"  type="text/css" />
    <script src="js/jquery.center.min.js" type="text/javascript"></script>
        
<style>
	.bx-wrapper img{
		height: auto !important;
	}
</style>
</head>' ; 

}

function unicode(){
    
    
}
function htmltopheader(){
    $userID = 0; 
    echo '<body>
            <div class="top-head">
              <div class="container">
                <div class="row">
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="logo">
                      <a href="index.php"><img src="img/logo.png" alt="logo"></a>
                    </div>
                  </div>
                 <div class="col-md-5 col-sm-6 col-xs-12">
                 </div>';
                 
            if(isset($_SESSION['tarsheeh_UserID'])){    
                $userID = $_SESSION['tarsheeh_UserID']; 
                $user = getUsers(" where users.ID=$userID", "array");
                
             echo '<div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="user-login">
                            <!--<img src="cv/1518685919.jpg" style="width: 60px;height: 60px;float: right;margin-top: 5px;" align="left">-->
                            <div>
                                <h4 style="line-height:25px">اهلاً و سهلاً <a href="user.php?UserID='.$userID.'"><span>'.$user["Fullname"].'</span></a></h4>
                                <h5><span><a href="user.php?UserID='.$userID.'"><b>عرض الملف الشخصي </b> </a></span></h5>
                                <h6><a href="edituser.php?UserID='.$userID.'">تعديل الملف</a> - <a href="logout.php" class="out">تسجيل الخروج</a></h6>
                            </div>
                        </div>
                    </div>';
            }
            
            echo '
              </div>
            </div>

            <div class="top-menu">
              <div class="container">
                <div class="in-top-menu">
                  <div class="row">
                    <div class="col-md-9 col-sm-12 col-xs-12">
                      <nav class="nav-collapse">
                        <ul>
                          <li><a href="index.php">الرئيسية</a></li>
						  <li><a href="https://goo.gl/forms/jOczBuFR8JuK7AGQ2" target="_blank">استبيان تسجيل المتحدثين</a></li>
                        </ul>
                      </nav>
                    </div>
                    ';
             if($userID <= 0){
            echo '
                    <div class="col-md-3 col-sm-12 col-xs-12">                    
                    </div>';
                    }
            echo '
                  </div>
                </div>
              </div>
            </div>';
}


function footer(){
	echo ' <div class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-7 col-sm-12 col-xs-12">
        <div class="right-footer">
          <img src="img/logo.png" alt="logo">
          <ul>
            <li><a href="javascript:void(0)" class="backtotop" style="font-weight:bold"><i class="fa fa-arrow-up" aria-hidden="true"></i>
 للأعلى </a> </li>
          </ul>
          <p class="copy-right"></p>
        </div>
      </div>
      <div class="col-md-5 col-sm-12 col-xs-12">
        <div class="left-footer">
            <img src="img/vision.png" alt="الرؤية 2030">
        </div>
      </div>
    </div>
  </div>
</div>
<script src="js/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/jquery.bxslider.min.js"></script>
     <script src="js/custom.js"></script>
</body>
</footer>
';
}


?>