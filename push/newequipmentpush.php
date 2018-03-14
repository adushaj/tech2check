<?php
    include("../connect.php");
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $model = mysqli_real_escape_string($connection, $_POST['model']);
        $newserialnumber = mysqli_real_escape_string($connection, $_POST['serialnumber']); 
        
        //Check for new model and ensure it does not already exist
        $sql_newequip = "SELECT serial_number FROM equipment WHERE serial_number = '$newserialnumber'";
        if (mysql_num_rows(mysql_query($sql_newequip)) > 0) {
            header("location: ../new_equipment.php");
            $_SESSION['inserterror'] = 'Serial number already exists!';
            exit;
        } else {
            // Insert new model into table
            $input = "INSERT INTO equipment (serial_number, model_id, status_id) VALUES ( '$newserialnumber', (SELECT model_id from model WHERE model ='$model'), 1 )";
            $result = mysql_query($input);
        }
        if ($result){
            header("location: ../admin_tools.php");
            exit;
        } else {
            header("location: ../new_equipment.php");
            $_SESSION['inserterror'] = "Insert unsuccessful. Please try again.<br>" . mysql_error($connection);
            exit;
        }

    }
?>