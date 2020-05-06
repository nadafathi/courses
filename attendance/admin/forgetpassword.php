
<?php

error_reporting(0);
session_start();
include_once 'includes/db.php';

include ("header.php");


if(isset($_REQUEST['submit_reset_password']))
{
	$result = getAdmins(" where username='".htmlspecialchars($_REQUEST['login_or_pwd'],ENT_QUOTES)."'","array");
  if(isset($result))
  {
      $_GLOBALS['message'] = "the Password for UserName = {$result['username']} is '{$result['password']}'";
	  $ClassMsg = 'successBlock' ;
  }
  else
  {
      $_GLOBALS['message']="This Login '{$_REQUEST['login_or_pwd']}' does not belong to any user";
	  $ClassMsg = 'failureBlock' ;
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

tableheader($_SESSION["userID"],null,null);
?>
<tr><td class="layoutColumn left">
									</td>
				<td class="layoutColumn center">
		<?php if(isset($_REQUEST['submit_reset_password'])){ ?>			
		<div class="block" id="messageBlock" >
			<div class="blockContents messageContents">
				<table class="messageBlock">
					<tbody><tr><td><img src="images/transparent.gif" class="sprite32 sprite32-warning"></td>
						<td class="<?php echo $ClassMsg; ?>"><?php echo $_GLOBALS['message'] ; ?></td>
						<td><img src="images/transparent.gif" class="sprite32 sprite32-close" alt="Close" title="Close" onclick="window.Effect ? new Effect.Fade($('messageBlock')) : document.getElementById('messageBlock').style.display = 'none';"></td></tr>
				</tbody>
				</table>
			</div>
        </div>
		<?php } ?>
    <div class="block" style=";" id="Reset+password">
        <div class="blockContents">
    			<span class="handles"><img src="images/transparent.gif" class="open open-close-handle sprite16 sprite16-navigate_up" alt="Expand/collapse block" title="Expand/collapse block" id="Reset+password_image"></span>
        		<span class="title">Forget password</span>
        		<span class="subtitle"></span>
        		
        		<div class="content" style=";" id="Reset+password_content" >
					        
<script type="text/javascript">
//<![CDATA[
function validate_reset_password_form(frm) {
  var value = '';
  var errFlag = new Array();
  var _qfGroups = {};
  _qfMsg = '';

  value = frm.elements['login_or_pwd'].value;
  if (value == '' && !errFlag['login_or_pwd']) {
    errFlag['login_or_pwd'] = true;
    _qfMsg = _qfMsg + '\n - The field is mandatory';
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
        <form class="indexForm" action="" method="post" id="reset_password_form" onsubmit="try { var myValidator = validate_reset_password_form; } catch(e) { return true; } return myValidator(this);">

    		<div class="formRow">
        		<div class="formLabel">			
                    <div class="header">Login (username) </div>
                                	</div>
        		<div class="formElement">
                	<div class="field"><input class="inputText" name="login_or_pwd" type="text">            &nbsp;<span class="formRequired">*</span>
        </div>
            		        	    </div>
        	</div>
    		<div class="formRow">	    
            	<div class="formLabel">			
                    <div class="header">&nbsp;</div>
                    <div class="explanation"></div>
            	</div>
        		<div class="formElement">
                	<div class="field"><input class="flatButton" name="submit_reset_password" value="Submit" type="submit"></div>
        	    </div>      		
        	</div>		
    	</form>

				</div>
        		<span style="display:none">&nbsp;</span>
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
</table>
<script>
                hideAll();            
                            </script>
</BODY>

</HTML>