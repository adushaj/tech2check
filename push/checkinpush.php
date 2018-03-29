<?php
    include("../connect.php");
    
    $rental_id = mysql_real_escape_string($_GET['rental_id']);
    $notes = mysql_real_escape_string($_GET['notes']);
    $status = mysql_real_escape_string($_GET['status_id']);
    
    
    
    //Once I get the button to work I would like to add the option 
    //for employees to enter notes when checking in equipment.
    //They would also be able to change the status to "needs repair"
    //at the time of checking in, maybe just a checkbox when confirming
    //the check in. 
    
    
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
            header("location: ../frontdesk_dashboard.php");
            exit;
        } 
        else {
            $_SESSION['check_in_error'] = "Error checking in equipment!";
            header("location: ../frontdesk_dashboard.php");
            exit;
        }
    }
    else {
        $_SESSION['check_in_error'] = "Error checking in equipment!";
        header("location: ../frontdesk_dashboard.php");
        exit;
    }
?>