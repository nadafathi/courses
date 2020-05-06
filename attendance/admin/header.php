<?php 

include_once 'includes/functions.php';
session_start();
if(isset($_SESSION["doc_adminID"])){
 //header("location:index.php"); 
} 

function checkSession(){
	if(isset($_SESSION["doc_adminID"])){
		header("location:admin.php"); 
	}
}

function htmlheader(){
echo "
<!DOCTYPE ><HTML>";


	echo "<HEAD>

        <meta charset='utf-8'/>
		<META http-equiv='Content-Type' content='text/html; charset = utf-8'>
		<LINK href='images/Capture-Logo.png' rel='shortcut icon'>
		<LINK href='css/css_global.css?build=18016' rel='stylesheet' type='text/css'>
		<TITLE>Doctor Registeration - Admin</TITLE>
		<LINK href='css/bootstrap.css' rel='stylesheet' type='text/css'>
		
		<SCRIPT src='js/jquery.js'></SCRIPT>
		
		<SCRIPT src='js/bootstrap.js'></SCRIPT>

		<SCRIPT src='js/scripts.js'></SCRIPT>
                <SCRIPT src='js/scripts(1).js' type='text/javascript'></SCRIPT>
                <SCRIPT src='js/scripts(2).js' type='text/javascript'></SCRIPT>
		<script type='text/javascript' src='../js/all_option.js' ></script>
		
		</HEAD>
		";
}

/*First Param: to show the logout
  Second Param: Show the subpage link
  third Param: Subpage title*/
function tableheader($userID,$subpage,$subpagetitle){
	echo " 	<td class='header' colspan='3'>
					<div id='logo'>
						<a href='index.php'>
							<img title='learnJava' class='handle' alt='Admission' src='images/Capture-Logo.png'>
						</a>
					</div>
					";
					if(isset($userID) && $userID > 0 )
                    $user = getAdmins(" where ID = $userID","array");
                                        //$user = mysql_fetch_array($user);
					if(isset($user)){
					echo "<div id='logout_link'>
						<span class='headerText dropdown'>Welcome (admin)	                 
						<a class='headerText' href='logout.php'>Logout</a>
						</span>
					</div>";
					}
				$startpage = 'Start page';
				$startpage.= isset($subpage) ? "</a><span>&nbsp;<span>&nbsp;>>&nbsp;</span>" : "</a>";
				$subpage = isset($subpage) ? "<a class='titleLink' href='".$subpage.".php'>".$subpagetitle."</a>" : "";	
				echo"	<div id='path'>
						<div id='path_title'>
							<a class='titleLink' href='index.php'>".$startpage.$subpage."
						</div>
						<div id='tab_handles_div'></div>
					</div>";
	echo"				
				</td>
           ";                                     
}


function footer(){
	echo "<tr>
                <td style='vertical-align: bottom;'>
                    <table style='width: 100%;'>
                        <tbody>
                            <tr>
                                <td class='footer' colspan='3'></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
	    ";
}


?>