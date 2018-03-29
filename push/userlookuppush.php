<?php
    include('../connect.php');
    
    $lname = mysql_real_escape_string($_POST['lname']);
    
    $sql = "SELECT username_id FROM student WHERE last_name = '$lname'
        UNION
        SELECT username_id FROM employee WHERE last_name = '$lname'"
    $result = 
?>