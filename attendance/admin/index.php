<?php

//error_reporting(0);
//session_start();
include_once 'includes/db.php';

include ("header.php");

checkSession();

$ClassMsg =  'failureBlock' ;
$icon = 'warning';
if(isset($_REQUEST['submit_login']))
{
  $result = getAdmins( "where username='".htmlspecialchars($_REQUEST['login'],ENT_QUOTES)."' and password='".htmlspecialchars($_REQUEST['password'],ENT_QUOTES)."'","array");
  if(isset($result))
  {
      $_SESSION['doc_adminID']=$result['ID'];
      unset($_GLOBALS['message']);
	  header('Location: admin.php');
  }
  else
  {
      $_GLOBALS['message']="Check Your User name and Password.";
  }
  closedb();
}


htmlheader();

?>

<BODY onkeypress="if (window.eF_js_keypress) eF_js_keypress(event);" onbeforeunload="if (window.periodicUpdater) periodicUpdater(false);">


<table class="pageLayout hideLeft" id="pageLayout">
<tbody>
<tr>
<td style="vertical-align: top;">
<table style="width: 100%;">
<tbody>
<?php
$userID = isset($_SESSION["doc_adminID"]) ? $_SESSION["doc_adminID"] : null;
tableheader($userID ,null,null);
?>

<tr><td class="layoutColumn left">
					
    <div class="block" style=";" id="Login">
    </div>
			</td>
			
			<td class="layoutColumn center">
								
				<div class="block" style=";" id="Login">
					<div class="blockContents">
							<span class="handles"><img src="images/transparent.gif" class="open open-close-handle sprite16 sprite16-navigate_up" alt="Expand/collapse block" title="Expand/collapse block" onclick="toggleBlock(this, '99dea78007133396a7b8ed70578ac6ae')" id="Login_image"></span>
							<span class="title">Login</span>
							<span class="subtitle"></span>
							
							<div class="content" style=";" id="Login_content" onmousedown="if ($('firstlist')) {Sortable.destroy('firstlist');}if ($('secondlist')) {Sortable.destroy('secondlist');}">
									
			<script type="text/javascript">
			//<![CDATA[
			function validate_login_form(frm) {
			  var value = '';
			  var errFlag = new Array();
			  var _qfGroups = {};
			  _qfMsg = '';

			  value = frm.elements['login'].value;
			  if (value == '' && !errFlag['login']) {
				errFlag['login'] = true;
				_qfMsg = _qfMsg + '\n - The field \"Login\" is mandatory';
			  }

			  value = frm.elements['password'].value;
			  if (value == '' && !errFlag['password']) {
				errFlag['password'] = true;
				_qfMsg = _qfMsg + '\n - The field \"Password\" is mandatory';
			  }

			  if (_qfMsg != '') {
				_qfMsg = 'The following errors occured:' + _qfMsg;
				_qfMsg = _qfMsg + '\nPlease correct the above errors';
				alert(_qfMsg);
				return false;
			  }
			  return true;
			}
			//]]>
			</script>
			<?php 
				if(isset($_REQUEST['submit_login'])){ 
				?>			
				<div class="block" id="messageBlock" >
					<div class="blockContents messageContents">
						<table class="messageBlock">
							<tbody><tr><td><img src="images/transparent.gif" class="sprite32 sprite32-<?php echo $icon; ?>"></td>
								<td class="<?php echo $ClassMsg; ?>"><?php echo $_GLOBALS['message'] ; ?></td>
								<td><img src="images/transparent.gif" class="sprite32 sprite32-close" alt="Close" title="Close" onclick="window.Effect ? new Effect.Fade($('messageBlock')) : document.getElementById('messageBlock').style.display = 'none';"></td></tr>
						</tbody>
						</table>
					</div>
				</div>
				<?php } ?>
				<form class="indexForm" action="" method="post" id="login_form" onsubmit="try { var myValidator = validate_login_form; } catch(e) { return true; } return myValidator(this);">
					<input name="_qf__login_form" type="hidden" value="">
					<div class="formRow">
						<div class="formLabel">
							<div class="header">Login</div>
										</div>
						<div class="formElement">
							<div class="field"><input class="inputText" id="login_box" name="login" type="text"></div>
										</div>
					</div>
					<div class="formRow">
						<div class="formLabel">
							<div class="header">Password</div>
										</div>
						<div class="formElement">
							<div class="field"><input class="inputText" tabindex="0" name="password" type="password"></div>
										</div>
					</div>
					
					<div class="formRow">
						<div class="formLabel">
							<div class="header">&nbsp;</div>
							<div class="explanation"></div>
						</div>
						<div class="formElement">
							<div class="field"><input class="flatButton" name="submit_login" value="Login" type="submit"></div>
							<br>										
							<div class="small note"><a href="forgetpassword.php">I forgot my password</a></div>            	
						</div>
					</div>
				 </form>
					  


							</div>
							<span style="display:none">&nbsp;</span>
					</div>
				</div>
			</td>
			
			<td class="layoutColumn right">
					
			</td>
</tr>
</tbody>
</table>
</td>
</tr>
<?php

footer();
?>
</tbody>
</table>
<script>
                hideAll();            
                            </script>
</BODY>

</HTML>