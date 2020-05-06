<?php
    include "header.php";
    include "config.php";

    $getData = mysqli_query($con, "SELECT * FROM USERS WHERE U_EMAIL = '$logged'");
    $rowData = mysqli_fetch_array($getData);
    
    if(isset($_POST['submit'])){
        
        @$email=$_POST['email'];
        @$password=$_POST['password'];
        @$passwordC=$_POST['passwordC'];
        @$phone=$_POST['phone'];
        @$department=$_POST['department'];
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            print '<p align="center" style="color:red;font-size:10px;font-family:tahoma;font-weight:lighter;" >تأكد من ادخال الايميل بشكلٍ صحيح</p>';
        }else if($password != $rowData["U_PASSWORD"]){
            print '<p align="center" style="color:red;font-size:10px;font-family:tahoma;font-weight:lighter;" >كلمة المرور الأولى غير مطابقة لكلمة المرور القديمة</p>';
        }else{
            $getData = mysqli_query($con, "UPDATE USERS SET `U_EMAIL` = '$email', `U_PASSWORD` = '$passwordC', `U_PHONE` = '$phone', `U_DEPARTMENT` = '$department' WHERE U_ID = '".$rowData['U_ID']."'");
            $update = mysqli_fetch_array($getData);
            if($update){
                echo "<script> alert('تم تحديث معلوماتك بنجاح'); </script>"; 
                print'<meta http-equiv="refresh" content="0; URL=index.php">';
            }
            
        }
    }
    
    if(!empty($logged)){
        print '<main>
				<section class="fullwidth-background bg-2" style="text-align:right;">
        <div class="grid-row">
        <div class="login-block">
        <form method="post"  action="page-profile.php" class="login-form">
        <p style="text-align:center;">معلومات العضوية</p>

        <div class="form-group">
        <input type="text" name="email" class="login-input" value="' . $rowData["U_EMAIL"] . '" style="text-align:center;">
        <span class="input-icon">
								<i class="fa fa-envelope-o"></i>
        </span>
        </div>
        <div class="form-group">
        <input type="text" name="password" class="login-input" placeholder="ادخل كلمة المرور القديمة" style="text-align:center;">
        <span class="input-icon">
								<i class="fa fa-lock"></i>
        </span>
        </div>
        <div class="form-group">
        <input type="text" name="passwordC" class="login-input" placeholder="ادخل كلمة المرور الجديدة" style="text-align:center;">
        <span class="input-icon">
								<i class="fa fa-lock"></i>
        </span>
        </div>
        
        </br>
        <p style="text-align:center;">المعلومات الشخصية</p>
        
        <div class="form-group">
        <input type="text" name="phone" class="login-input" value="'.$rowData["U_PHONE"].'" style="text-align:center;">
        <span class="input-icon">
        <i class="fa fa-phone"></i>
        </span>
        </div>
        
        <div class="form-group">
        <input type="text" name="department" class="login-input" value="' . $rowData["U_DEPARTMENT"] . '" style="text-align:center;">
        </div>
        
        <input type="submit" name="submit" value="تحديث" class="button-fullwidth cws-button bt-color-3 border-radius">
        </form>
        </br>
        <p style="text-align:center;">الاسم الثلاثي</p>
        <div class="form-group">
        <p>'.$rowData["U_FIRST_NAME_A"].' '.$rowData["U_SECOND_NAME_A"].' '.$rowData["U_LAST_NAME_A"].'</p>
        </div>
        
        <div class="form-group">
        <p>'.$rowData["U_FIRST_NAME_E"].' '.$rowData["U_SECOND_NAME_E"].' '.$rowData["U_LAST_NAME_E"].'</p>
        </div>
        
        </div>
        </div>

</section>';
    }else{
    print 'لا توجد لديك عضوية في هذا الموقع';
    }
    
include "footer.php";
?>