<?php
if(!session_id()) session_start();

        $servername = "localhost";
        $username = "root";
        $password = " ";
        $dbname = "databasename";

        //Create connection
        $con = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
        // Change character set to utf8
        mysqli_set_charset($con,"utf8");

        //Home page file name
        $url_home = 'index.php';

        ?>
