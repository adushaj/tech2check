<?php
    include("../connect.php");
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $make = mysqli_real_escape_string($connection, $_POST['make']);
        $type = mysqli_real_escape_string($connection, $_POST['type']); 
        $newmodel = mysqli_real_escape_string($connection, $_POST['model']); 

        $makeid = "SELECT make_id FROM make WHERE make = '$make'";
        $typeid = "SELECT type_id FROM type WHERE type = '$type'";
        
        //Check for new model and ensure it does not already exist
        $sql_model = "SELECT model FROM model WHERE model = '$newmodel'";
        if (mysql_num_rows(mysql_query($sql_model)) > 0) {
            header("location: ../add_equipment.php");
            $_SESSION['inserterror'] = 'Make already exists!';
            exit;
        } else {
            // Insert new model into table
            $input = "INSERT INTO model (make_id, type_id, model) VALUES ('$makeid', '$typeid', '$newmodel')";
            $result = mysql_query($input);
        }
        if ($result){
            header("location: ../index.php");
            exit;
        } else {
            header("location: ../add_equipment.php");
            $_SESSION['inserterror'] = "Insert unsuccessful. Please try again.<br>" . mysql_error($connection);
            exit;
        }

    }
?>