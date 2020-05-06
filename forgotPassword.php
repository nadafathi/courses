<?php
    include "header.php";
    include "config.php";

    
    if(isset($_POST['submit'])){

        $email=$_POST['email'];
      
            $getData = mysqli_query($con, "SELECT * FROM USERS WHERE U_EMAIL = '$email'");
            $rowData = mysqli_fetch_array($getData);
      
            if(count($rowData) > 0){
                $to = $rowData["U_EMAIL"];
                $subject = "كلمة المرور";
                $message = "\nقم باستعمال كلمة المرور التالية\n" . $rowData["U_PASSWORD"];
                if(mail($to, $subject, $message)){
                    echo "<script> alert('تم ارسال كلمة المرور إلى بريدك الإلكتروني'); </script>" ;
                    print'<meta http-equiv="refresh" content="0; URL=page-login.php">';
                }
          
            }else{
                print '<p align="center" style="color:red;font-size:10px;font-family:tahoma;font-weight:lighter;" >تأكد من صحة عنوان البريد الالكتروني المدخل</p>';
            }
    }
    ?>
    
    <head>
	<title>استعادة كلمة المرور</title>
</head>
	

<main>
		<section class="fullwidth-background bg-2">
			<div class="grid-row">
				<div class="login-block">
					<div class="logo">
						<img src="img/logo2.png" alt>
						<h2>لاستعادة كلمة المرور</h2>
<!--</br></br><a href="#" class="facebook cws-button border-radius half-button">Facebook</a><a href="#" class="twitter cws-button border-radius half-button">Twitter</a></br>-->
					</div>
				
					<div class="clear-both"></div>
				
					<form method="post"  action="forgotPassword.php" class="login-form">
						<div class="form-group">
							<input type="text" name="email" class="login-input" placeholder="عنوان البريد الإلكتروني" style="text-align:center;">
							<span class="input-icon">
								<i class="fa fa-envelope-o"></i>
							</span>
						</div>
						<input type="submit" name="submit" value="استعادة" class="button-fullwidth cws-button bt-color-3 border-radius alt">
					</form>
				</div>
			</div>
		</section>
	</main>
<?php
    include "footer.php";
    ?>