<?
$to = 'localhost.doctortcources@gmail.com';
$subject = 'شكرا لالتحاقك بالدورة';
$message = 'sent from localhost';
$headers = 'from : doctortcources@gmail.com';

if(mail($to, $subject, $message, $headers))
echo "email sent";

else

echo "email sending failed";
?>
