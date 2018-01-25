<?php
    include("../connect.php");
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $newmake = mysqli_real_escape_string($connection, $_POST['make']);  

        
        
        //Check for new make and ensure it does not already exist
        $sql_make = "SELECT * FROM make WHERE make = '$newmake'";
        if (mysql_num_rows(mysql_query($sql_make)) > 0) {
            $_SESSION['inserterror'] = 'Make already exists!';
            header("location: ../add_equipment.php");
            exit;
        } else {
            // Insert new make into table
            $input = "INSERT INTO make (make) VALUES ('$newmake')";
            $result = mysql_query($input);
        }
        if ($result){
            header("location: ../index.php");
            exit;
        } else {
            $_SESSION['inserterror'] = "Insert unsuccessful. Please try again.<br>" . mysql_error($connection);
            header("location: ../register.php");
            exit;
        }

    }
?>