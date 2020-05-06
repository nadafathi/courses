<?php
    include "header.php";
    include "config.php";
    
    if(isset($_POST['submit'])){

        $email=$_POST['email'];
        $password=$_POST['password'];

            $getData = mysqli_query($con, "SELECT U_EMAIL, U_PASSWORD FROM USERS WHERE U_EMAIL = '$email' and U_PASSWORD = '$password'");
            $rowData = mysqli_fetch_array($getData);
            
            $getData1 = mysqli_query($con, "SELECT A_USER_NAME, A_PASSWORD FROM ADMIN WHERE A_USER_NAME = '$email' and A_PASSWORD = '$password'");
            $rowData1 = mysqli_fetch_array($getData1);
            
            if(count($rowData) > 0 || count($rowData1) > 0){
                $_SESSION["username"] = $email;
                echo "<script> alert('مرحبا بك من جديد'); </script>" ;
                print'<meta http-equiv="refresh" content="0; URL=index.php">';
            }else{
                print '<p align="center" style="color:red;font-size:10px;font-family:tahoma;font-weight:lighter;" >تأكد من صحة المعلومات المدخلة</p>';
            }
    }
    ?><head>
	<title>تسجيل الدخول</title>
</head>
	
<main>
		<section class="fullwidth-background bg-2">
			<div class="grid-row">
				<div class="login-block">
					<div class="logo">
						<img src="img/logo2.png" alt>
						<h2>تسجيل الدخول</h2>
<!--</br></br><a href="#" class="facebook cws-button border-radius half-button">Facebook</a><a href="#" class="twitter cws-button border-radius half-button">Twitter</a></br>-->
					</div>
				
					<div class="clear-both"></div>
				
					<form method="post"  action="page-login.php" class="login-form">
						<div class="form-group">
							<input type="text" name="email" class="login-input" placeholder="الايميل" style="text-align:center;">
							<span class="input-icon">
								<i class="fa fa-envelope-o"></i>
							</span>
						</div>
						<div class="form-group">
							<input type="text" name="password" class="login-input" placeholder="كلمة المرور" style="text-align:center;">
							<span class="input-icon">
								<i class="fa fa-lock"></i>
							</span>
						</div>

<p class="small">
<a href="forgotPassword.php" style="text-align:right;">نسيت كلمة المرور؟</a>
</p>

						<input type="submit" name="submit" value="تسجيل الدخول" class="button-fullwidth cws-button bt-color-3 border-radius alt">
						<a href="page-register.php" class="button-fullwidth cws-button bt-color-3 border-radius">التسجيل</a>
					</form>
				</div>
			</div>
		</section>
	</main>
<?php
    include "footer.php";
    ?>