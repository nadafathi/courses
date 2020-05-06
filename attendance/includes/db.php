<?php



include_once 'dbsettings.php';

$conn=false;


function executeQuery($query,$format)
{
    global $conn,$dbserver,$dbname,$dbpassword,$dbusername;
    global $message;
    if (!($conn = mysqli_connect ($dbserver,$dbusername,$dbpassword,$dbname)))
         $message="Cannot connect to server";
    
      $conn->set_charset("utf8");
    //$result=mysql_query($query,$conn);
	 $result= mysqli_query($conn,$query);

    if($result)
        return isset($format) && $format=="array"? mysqli_fetch_array($result) : $result ;
    else
        $message ="Error while executing query";
		
    echo $message;
}


function executeInsertQuery($query,$format)
{
    global $conn,$dbserver,$dbname,$dbpassword,$dbusername;
    global $message;
    if (!($conn = mysqli_connect ($dbserver,$dbusername,$dbpassword,$dbname)))
         $message="Cannot connect to server";
    //mysql_query("SET NAMES 'utf8'");
    //mysql_query('SET CHARACTER SET utf8');
    $conn->set_charset("utf8");
    //$result=mysql_query($query,$conn);
	 $result= mysqli_query($conn,$query);

    if(!$result)
        $message="Error while executing query.<br/>Mysql Error: ";
    else
        return isset($format) && $format=="array"? mysqli_fetch_array($result) : mysqli_insert_id($conn) ;
}


function closedb()
{
    global $conn;
    if(!$conn)
   mysqli_close($conn);
}

/*if(isset($_SESSION)){
    if($_SESSION['TypeID'] == 1){
          Admin page
          header('Location: www/admin.php');
    }elseif($_SESSION['TypeID'] == 2 || $_SESSION['TypeID'] == 3){
          UserPage
         header('Location: www/user.php');
    }
    
}*/
?>
