<?php
include_once 'includes/db.php';
include ("header.php");

htmlheader();
$updateflag = isset($_SESSION["userID"]) ? true : false;

$UserName = "";
$Password = "";
$email = "";
$address = "";
$phone = "";
$Firstname = "";
$Lastname = "";
$userID = 0;
$TypeID = "";
$Type = "";

if(isset($_REQUEST['submit_personal_details']))
{
    
    $userID =  isset($_SESSION["userID"]) ? $_SESSION["userID"] : 0; 
    $UserName =  $_REQUEST["login"] ;
    $Password = $_REQUEST["password_"] ;
    $email = $_REQUEST["email"];
    $address = $_REQUEST["address"];
    $phone = $_REQUEST["phone"];
    $Firstname = $_REQUEST["firstname"];
    $Lastname = $_REQUEST["lastname"];
    $TypeID = isset($_REQUEST["userTypeID"]) ? $_REQUEST["userTypeID"] : $_SESSION["TypeID"];
    

    $DataArr = array();
    $DataArr["UserID"] =  $userID;  
    $DataArr['Firstname']  = $Firstname;
    $DataArr['Lastname'] = $Lastname;
    $DataArr['Address'] = $address;
    $DataArr['MobileNumber']   = $phone;
    $DataArr['Username']   = $UserName;    
    $DataArr['Password'] = $Password;
    $DataArr['Email'] = $email;
    $DataArr['UserTypeID'] = $TypeID;
   
   // print_r($userArr['email']);
    $errorAdd = true;

    $userExist = getUsers(" where username='{$UserName}' or phone='{$phone}' or email='{$email}' ", "array"); 
    if($userExist['UserID'] > 0){    
        $errorAdd = false; 
         $_GLOBALS['message'] = "The user is Exist please check the username , email or phone";
    }
    if($errorAdd)
   $_GLOBALS['message']= addEditUser($DataArr) == 1 ? "Operation Done Successfully!" : "There is Error Update" ;

}



$user ;
if(isset($_SESSION["userID"]) && !isset($_REQUEST['submit_personal_details'])){
$userID = $_SESSION["userID"];
$user = getUsers(" where users.UserID=".$userID,"array");
   
$UserName= $user["Username"];
$Password= $user["Password"];
$email= $user["Email"];
$address= $user["Address"];
$phone= $user["MobileNumber"];
$Firstname= $user["Firstname"];
$Lastname= $user["Lastname"];
$TypeID= $user["UserTypeID"];
$Type= $user["Type"];
}




?>

<BODY onkeypress="if (window.eF_js_keypress) eF_js_keypress(event);" onbeforeunload="if (window.periodicUpdater) periodicUpdater(false);">


<table class="pageLayout hideLeft" id="pageLayout">
<tbody>
<tr>
<td style="vertical-align: top;">
<table style="width: 100%;">
<tbody>
<?php
tableheader($_SESSION["userID"],null,null);

?>
<tr>
<td class="layoutColumn left">
</td>
<td class="layoutColumn center">
<div class="block" style=";" id="New+user+account">
<div class="blockContents">
<div class="blockContents">

            <div class="content" >

            <script type="text/javascript">
                

            //<![CDATA[
            function validate_user_form(frm) {
                document.getElementById("errorLogin").innerHTML = "";
              var value = '';
              var errFlag = new Array();
              var _qfGroups = {};
              _qfMsg = '';

              value = frm.elements['password_'].value;
              if (value != '' && value.length < 4 && !errFlag['password_']) {
                    errFlag['password_'] = true;
                    _qfMsg = _qfMsg + '\n - Password must be at least 4 characters';
              }

              value = new Array();
               
               
              
              value[0] = frm.elements['password_'].value;
              value[1] = frm.elements['passrepeat'].value;
              if ('' != value[0] && !(String(value[0]) === String(value[1])) && !errFlag['password_']) {
                    errFlag['password_'] = true;
                    _qfMsg = _qfMsg + '\n - The passwords do not match';
              }
              
              value = frm.elements['login'].value;
              if (value == '' && !errFlag['login']) {
                    errFlag['login'] = true;
                    _qfMsg = _qfMsg + '\n - The field login  is mandatory';
              }
              
              value = frm.elements['firstname'].value;
              if (value == '' && !errFlag['firstname']) {
                    errFlag['firstname'] = true;
                    _qfMsg = _qfMsg + '\n - The field First name is mandatory';
              }

              value = frm.elements['lastname'].value;
              if (value == '' && !errFlag['lastname']) {
                    errFlag['lastname'] = true;
                    _qfMsg = _qfMsg + '\n - The field Last name is mandatory';
              }

              value = frm.elements['email'].value;
              if (value == '' && !errFlag['email']) {
                    errFlag['email'] = true;
                    _qfMsg = _qfMsg + '\n - The field Email address is mandatory';
              }
              
              
              value = frm.elements['phone'].value;
              if (value == '' && !errFlag['phone']) {
                    errFlag['phone'] = true;
                    _qfMsg = _qfMsg + '\n - The field Phone  is mandatory';
              }

              if (_qfMsg != '') {
                    _qfMsg = 'Invalid information entered.' + _qfMsg;
                    _qfMsg = _qfMsg + '\nPlease correct these fields.';
                    alert(_qfMsg);
                    return false;
              }
              return true;
            }
            //]]>
            </script>
                    <form action="" method="post" name="user_form" id="user_form" enctype="multipart/form-data" onsubmit="try { var myValidator = validate_user_form; } catch(e) { return true; } return myValidator(this);">

<table class="formElements">

    <tbody>
        <tr>
            <td  class="labelCell">
                <span  id="errorLogin" name="errorLogin" ><?php echo isset($_GLOBALS['message']) ? $_GLOBALS['message'] : ""; ?> </span>
            </td>
        </tr>
    <tr><td class="labelCell">Login:&nbsp;</td>
            <td class="elementCell">
                
                <?php 
                    if($updateflag){
                        echo $UserName;
                        echo "<input type='hidden' name='login' value='$UserName'>";
                    }else {
                ?>
                <input type="inputText" name="login" value="<?php echo $UserName; ?>">&nbsp;<span class="formRequired">*</span>    
                    <?php }?>
                
            </td></tr>
    <tr><td class="labelCell">Password:&nbsp;</td>
            <td class="elementCell"><input autocomplete="off" class="inputText" name="password_" type="password">&nbsp;<?php echo $updateflag ? "Blank to leave unchanged" : "" ; ?></td></tr>
    <tr><td class="labelCell"></td>
            <td class="infoCell">Password must be at least 4 characters</td></tr>
    <tr><td class="labelCell">Repeat password:&nbsp;</td>
            <td class="elementCell"><input class="inputText " name="passrepeat" type="password"></td></tr>
    <tr><td class="labelCell">First name:&nbsp;</td>
            <td class="elementCell"><input class="inputText" name="firstname" type="text" value="<?php echo $Firstname; ?>">&nbsp;<span class="formRequired">*</span></td></tr>
    <tr><td class="labelCell">Last name:&nbsp;</td>
            <td class="elementCell"><input class="inputText" name="lastname" type="text" value="<?php echo $Lastname; ?>">&nbsp;<span class="formRequired">*</span></td></tr>
    <tr><td class="labelCell">Email address:&nbsp;</td>
            <td class="elementCell"><input class="inputText" name="email" type="text" value="<?php echo $email ; ?>">&nbsp;<span class="formRequired">*</span></td></tr>
    <tr><td class="labelCell">Phone/Mobile:&nbsp;</td>
            <td class="elementCell"><input class="inputText" name="phone" type="text" value="<?php echo $phone; ?>">&nbsp;<span class="formRequired">*</span></td></tr>
    <tr><td class="labelCell">User type:&nbsp;</td>
            <td class="elementCell">
                <SELECT name="userTypeID" id="userTypeID" <?php echo $_SESSION["TypeID"] != 1 ? "disabled" : "" ;  ?> > 
                     <?php 
                $TypesArr = getTypes("",null);
                while($typ=mysql_fetch_array($TypesArr)) {
                ?>
                    <OPTION value="<?php echo $typ["ID"]; ?>" name="<?php echo $typ["ID"]; ?>" <?php echo ($TypeID == $typ["ID"]) ? "selected" : ""; ?> > <?php echo $typ["Type"]; ?> </OPTION>                                                                                                                      
            <?php
                }
            ?>
                </SELECT> 
            </td></tr>
    <tr><td class="labelCell">Address:&nbsp;</td>
            <td class="elementCell"><textarea class="inputContentTextarea" style="width:100%;height:5em;" name="address"><?php echo $address;?></textarea></td></tr>

    <tr><td class="labelCell"></td>
            <td class="submitCell"><input class="flatButton" name="submit_personal_details" value="Submit" type="submit"></td></tr>
</tbody></table>
</form>

            </div>
            <span style="display:none">&nbsp;</span>
</div>



                            </div>
</div>
</td>
<td class="layoutColumn right">
</td></tr>	
</tbody>
</table>

</td>
</tr>
<?php

footer();
?>
</tbody>  	
</BODY>


</HTML>