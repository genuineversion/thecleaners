<?php
    define("DBSERVER", "localhost");
    define("DBUSER", "root");
    define("DBPASS", "");
    define("DBNAME", "thecleaner");

  //CONNECTING TO THE SERVER
    $db_connect = mysqli_connect(DBSERVER,DBUSER,DBPASS);

    if (!$db_connect) {
    	
    	die("could not connect to server " .mysqli_error($db_connect));
    }

    //CONNECT TO THE DATABASE

    $database = mysqli_select_db($db_connect, DBNAME);

    if (!$database) {
    	
    	die("could not connect to database " .mysqli_error($connect));
    }
?>