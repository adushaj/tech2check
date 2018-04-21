<?php
    include("../connect.php");
    
    $rental_id = mysql_real_escape_string($_POST['btn_submit']);
    $notes = mysql_real_escape_string($_POST['notes']);
    $status = mysql_real_escape_string($_POST['status_id']);

    
    $sql = "SELECT first_name, last_name FROM employee WHERE username_id = '{$_SESSION['username_id']}'";
    $re = mysql_query($sql);
    $arr = mysql_fetch_array($re);
    $name = $arr['first_name'] . ' ' . $arr['last_name'];
    
    $getserial = "SELECT serial_number FROM rental_record WHERE rental_id = '$rental_id'";
    $serialQuery = mysql_query($getserial);
    $serial = mysql_fetch_array($serialQuery)['serial_number'];
    
    if ($notes != '') {
        $updateEquipment = "UPDATE equipment
                            SET notes = CONCAT(IFNULL(notes,''), NOW(), ' by ', '$name (checkin)', ': ', '$notes', CHAR(13)),
                            last_activity_date = NOW(),
                            username_id = '{$_SESSION['username_id']}'
                            WHERE serial_number = '$serial'";
        
        $updateQuery = mysql_query($updateEquipment);
    }
    
    $updaterental = "UPDATE rental_record
                    SET date_returned = NOW(),
                    checked_in_by = '{$_SESSION['username_id']}',
                    notes = '$notes'
                    WHERE rental_id = '$rental_id'";
    
    $Query1 = mysql_query($updaterental);
    
    if($Query1){
        
        $serialnumber = "SELECT serial_number
                        FROM rental_record
                        WHERE rental_id = '$rental_id'";
        $Query2 = mysql_query($serialnumber);
        $serial = mysql_fetch_array($Query2)['serial_number'];
        
        $updateequipment = "UPDATE equipment
                        SET status_id = '$status'
                        WHERE serial_number = '$serial'";
        $Query3 = mysql_query($updateequipment);
        
        if ($Query3) {
            $_SESSION['check_in_success'] = "Equipment checked in!";
            header("location: ../Check_in.php");
            exit;
        } 
        else {
            $_SESSION['check_in_error'] = "Error checking in equipment!";
            header("location: ../Check_in.php");
            exit;
        }
    }
    else {
        $_SESSION['check_in_error'] = "Error checking in equipment!";
        header("location: ../Check_in.php");
        exit;
    }
?>