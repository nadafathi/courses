<?php
session_start();
$email=$_POST['email'];
$email_check=mysql_query("SELECT U_PASSWORD FROM users WHERE U_EMAIL ='$email'");
$count=mysql_num_rows($email_check);
$subject="معلومات تسجيل الدخول";
$message="كلمة المرور هي .$count";
$from="From: youremail@gmail.com";
mail($email, $subject, $message, $from);
echo "تم ارسال كلمة المرور الخاصة بك";
?>
