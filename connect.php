<?php  
    $server_connection_error = "Server is down, Sir!";
    $host = "127.0.0.1";
    $user = "woodle";                          
    $pass = "";                                
    $db = "T2C";                                
    $port = 3306;                               
    
    $connection = mysqli_connect($host, $user, $pass, $db, $port)or die($server_connection_error);
    $dbhandle = mysql_connect($host, $user, $pass) or die("Unable to connect to MySQL");
    $selected = mysql_select_db($db, $dbhandle) or die("Could not select examples");
    
    session_start();
?>