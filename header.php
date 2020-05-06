<?php
	include "config.php";
    
    if (isset($_SESSION["username"])) {
        $logged = $_SESSION["username"];
    }
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Doctor T</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
<!-- style -->
<link rel="shortcut icon" href="img/favicon.png">
<link rel="stylesheet" href="css/font-awesome.css">
<link rel="stylesheet" href="fi/flaticon.css">
<link rel="stylesheet" href="css/main.css">

<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" />
<link rel="stylesheet" href="css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen">
<link rel="stylesheet" href="css/animate.css">
<!--styles -->
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.--><script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/actor:n4:default.js" type="text/javascript"></script>
</head>
<body>

<header class="only-color">
<!-- header top panel -->
<div class="page-header-top">
<div class="grid-row clear-fix">
<div class="header-top-panel">

<a href="http://doctortproject.org/attendance/index.php" class="fa fa-user login-icon"></a>
<div id="top_social_links_wrapper">
<div class="share-toggle-button"><i class="share-icon fa fa-share-alt"></i></div>
<div class="cws_social_links"><a href="http://twitter.com/doctor_tp" class="cws_social_link" title="Twitter"><i class="share-icon fa fa-twitter"></i></a></div>
</div>
<a href="#" class="search-open"><i class="fa fa-search"></i></a>
<form action="#" class="clear-fix">
<input type="text" placeholder="Search" class="clear-fix">
</form>

</div>
</div>
</div>
<!-- / header top panel -->
<!-- sticky menu -->
<div class="sticky-wrapper">
<div class="sticky-menu">
<div class="grid-row clear-fix">
<!-- logo -->
<a href="index.php" class="logo">
<img src="img/logo2.png" alt>
<h1></h1>
</a>
<!-- / logo -->
<nav class="main-nav">
<ul class="clear-fix">

<!-- / sub mega menu -->
<?php
    if(empty($logged)){
        print '<li><a href="page-login.php">تسجيل الدخول </a></li>';
        
    }else{
        $getData = mysqli_query($con, "SELECT U_EMAIL FROM USERS WHERE U_EMAIL = '$logged'");
        $rowData = mysqli_fetch_array($getData);
        if( count($rowData) > 0 ) {
            print '<li><a href="page-logout.php">تسجيل الخروج</a></li>';
            print '<li><a href="page-profile.php">الملف الشخصي </a></li>';
        }else{
            $getData = mysqli_query($con, "SELECT A_USER_NAME FROM ADMIN WHERE A_USER_NAME = '$logged'");
            $rowData = mysqli_fetch_array($getData);
            if( count($rowData) > 0 ){
                print '<li><a href="page-logout.php">تسجيل الخروج</a></li>';
                print '<li><a href="add-course.php">إضافة دورة</a></li>';
            }
        }
    }
    mysqli_close($con);
    ?>
    <li>
<a href="http://doctortproject.org/attendance/index.php" class="active">التسجيل في الدورات التدريبية</a>
</li>
<li>
<a href="#services">خدماتنا</a>
</li>

<li>
<a href="#majors">المجالات</a>
</li>

<li>
<a href="#use">طريقة الاستخدام</a>
</li>

<li>
<a href="#who-us">من نحن</a>
</li>

<li>
<a href="courses-grid.php">الدورات</a>
</li>

<li>
<a href="index.php" class="active">الصفحة الرئيسية</a>
</li>


</ul>
</nav>
</div>
</div>
</div>
<!-- sticky menu -->
</header>	<!-- page header -->

<!-- / page header -->