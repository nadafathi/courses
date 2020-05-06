<?php
    include "header.php";
    include "config.php";
    
    if(isset($_POST['submit'])){
        
        @$user=$_POST['user'];
        @$email=$_POST['email'];
        @$password=$_POST['password'];
        @$passwordC=$_POST['passwordC'];
        
        @$firstNameA=$_POST['firstNameA'];
        @$secondNameA=$_POST['secondNameA'];
        @$lastNameA=$_POST['lastNameA'];
        
        @$firstNameE=$_POST['firstNameE'];
        @$secondNameE=$_POST['secondNameE'];
        @$lastNameE=$_POST['lastNameE'];
        
        @$phone=$_POST['phone'];
        @$department=$_POST['department'];
        
        if(empty($firstNameA) || empty($secondNameA) || empty($lastNameA) || empty($firstNameE) || empty($secondNameE) || empty($lastNameE) || empty($phone) || empty($department)){
            print '<p align="center" style="color:red;font-size:10px;font-family:tahoma;font-weight:lighter;" > تأكد من ادخال كامل معلوماتك الشخصية</p>';
        }else if(empty($user)){
            print '<p align="center" style="color:red;font-size:10px;font-family:tahoma;font-weight:lighter;" > تأكد من ادخال اسم المستخدم</p>';
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            print '<p align="center" style="color:red;font-size:10px;font-family:tahoma;font-weight:lighter;" >تأكد من ادخال الايميل بشكلٍ صحيح</p>';
        }else if($password != $passwordC){
            print '<p align="center" style="color:red;font-size:10px;font-family:tahoma;font-weight:lighter;" >تأكد من تطابق كلمة المرور</p>';
        }else{
            $getData = mysqli_query($con, "SELECT U_USER_NAME FROM USERS WHERE U_USER_NAME = '$user'");
            $getData1 = mysqli_query($con, "SELECT U_EMAIL FROM USERS WHERE U_EMAIL = '$email'");
            $getData2 = mysqli_query($con, "SELECT U_PHONE FROM USERS WHERE U_PHONE = '$phone'");
            
            $rowData = mysqli_fetch_array($getData);
            $rowData1 = mysqli_fetch_array($getData1);
            $rowData2 = mysqli_fetch_array($getData2);
            
            if(count($rowData) > 0){
                echo "<script> alert('اسم المستخدم مسجل من قبل'); </script>" ;
                print'<meta http-equiv="refresh" content="0; URL=page-register.php">';
            }else if(count($rowData1) > 0){
                echo "<script> alert('الايميل المستخدم مسجل من قبل'); </script>" ;
                print'<meta http-equiv="refresh" content="0; URL=page-register.php">';
            }else if(count($rowData2) > 0){
                echo "<script> alert('رقم الجوال مستخدم من قبل'); </script>" ;
                print'<meta http-equiv="refresh" content="0; URL=page-register.php">';
            }else{
                $sql = "INSERT INTO USERS (`U_USER_NAME`, `U_EMAIL`, `U_PASSWORD`, `U_FIRST_NAME_A`, `U_SECOND_NAME_A`, `U_LAST_NAME_A`, `U_FIRST_NAME_E`, `U_SECOND_NAME_E`, `U_LAST_NAME_E`, `U_PHONE`, `U_DEPARTMENT`) VALUES ('$user', '$email', '$password', '$firstNameA', '$secondNameA', '$lastNameA', '$firstNameE', '$secondNameE', '$lastNameE', '$phone', '$department')";
                $insert = mysqli_query($con, $sql);
                if($insert){
                    echo "<script> alert('تم تسجيلك بنجاح'); </script>" ;
                    print'<meta http-equiv="refresh" content="0; URL=index.php">';
                }
            }
            mysqli_close($con);
        }
    }
    ?><head>
	<title>التسجيل</title>
</head>

	
<main>
		<section class="fullwidth-background bg-2">
			<div class="grid-row">
				<div class="login-block">
					<div class="logo">
						<img src="img/logo2.png" alt>
						<h2>يمكنك التسجيل من هنا</h2>
					</div>
					<form method="post"  action="page-register.php" class="login-form">
<p style="text-align:center;">معلومات العضوية</p>
						<div class="form-group">
							<input type="text" name="user" class="login-input" placeholder="اسم المستخدم" style="text-align:center;">
							<span class="input-icon">
								<i class="fa fa-user"></i>
							</span>
						</div>
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
						<div class="form-group">
							<input type="text" name="passwordC" class="login-input" placeholder="إعادة كلمة المرور" style="text-align:center;">
							<span class="input-icon">
								<i class="fa fa-lock"></i>
							</span>
						</div>
</br>
<p style="text-align:center;">المعلومات الشخصية</p>
<p align="center" style="color:red;font-size:10px;font-family:tahoma;font-weight:lighter;" > مهمة للحصول على الشهادات</p>
<div class="form-group">
<input type="text" name="firstNameA" class="login-input" placeholder="الاسم الأول" style="text-align:center;">
<span class="input-icon">
<i class="fa fa-user"></i>
</span>
</div>

<div class="form-group">
<input type="text" name="secondNameA" class="login-input" placeholder="الاسم الثاني" style="text-align:center;">
<span class="input-icon">
<i class="fa fa-user"></i>
</span>
</div>

<div class="form-group">
<input type="text" name="lastNameA" class="login-input" placeholder="الاسم الاخير" style="text-align:center;">
<span class="input-icon">
<i class="fa fa-user"></i>
</span>
</div>

<div class="form-group">
<input type="text" name="firstNameE" class="login-input" placeholder="First name" style="text-align:center;">
<span class="input-icon">
<i class="fa fa-user"></i>
</span>
</div>

<div class="form-group">
<input type="text" name="secondNameE" class="login-input" placeholder="Second name" style="text-align:center;">
<span class="input-icon">
<i class="fa fa-user"></i>
</span>
</div>

<div class="form-group">
<input type="text" name="lastNameE" class="login-input" placeholder="Last name" style="text-align:center;">
<span class="input-icon">
<i class="fa fa-user"></i>
</span>
</div>

<div class="form-group">
<input type="text" name="phone" class="login-input" placeholder="رقم الجوال" style="text-align:center;">
<span class="input-icon">
<i class="fa fa-phone"></i>
</span>
</div>

<div class="form-group">
<input type="text" name="department" class="login-input" placeholder="التخصص الدراسي" style="text-align:center;">
</div>



						<input type="submit" name="submit" value="التسجيل" class="button-fullwidth cws-button bt-color-3 border-radius">
					</form>
				</div>
			</div>
		</section>
	</main>
<?php
    include "footer.php";
    ?>