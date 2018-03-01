<?php
    include("../connect.php");
    
    // Get URL parameters
    $type_id = mysql_real_escape_string($_GET['type_id']);
    $model_id = mysql_real_escape_string($_GET['model_id']);
    $username = mysql_real_escape_string($_GET['username']);
    $serial = mysql_real_escape_string($_GET['serial']);
    $res_id = mysql_real_escape_string($_GET['reserved']);
    
    // Get type_id if not set
    if (!isset($_GET['type_id'])) {
        $sql = "SELECT type_id FROM model WHERE model_id = '$model_id'";
        $type_id = mysql_fetch_array(mysql_query($sql))['type_id'];
    }
    
    // Search for username
    $sql = "SELECT username_id FROM usernames WHERE username = '$username'";
    $result = mysql_query($sql);
    if (mysql_num_rows($result) > 0) {
        $username_id = mysql_fetch_array($result)['username_id'];
    } else {
        $_SESSION['check_out_error'] = "Username not found!";
        header("location: ../frontdesk_dashboard.php?type_id=$type_id&model_id=$model_id");
        exit;
    }
    
    // Check if user has this model reserved (serial search)
    $sql = "SELECT reservation_id FROM reservation_list WHERE username_id = '$username_id' AND model_id = '$model_id' AND fulfilled_indicator = '0'";
    $result = mysql_query($sql);
    if (mysql_num_rows($result) > 0) {
        $res_id = mysql_fetch_array($result)['reservation_id'];
    } else {
        // Verify there are enough devices including reservations
        $sql_ecnt = "SELECT COUNT(*) AS cnt FROM equipment WHERE model_id = '$model_id' AND status_id = '1'";
        $sql_rcnt = "SELECT COUNT(*) AS cnt FROM reservation_list WHERE model_id = '$model_id' AND fulfilled_indicator = '0'";
        
        $re_ecnt = mysql_query($sql_ecnt);
        $re_rcnt = mysql_query($sql_rcnt);
        
        $ecnt = mysql_fetch_array($re_ecnt)['cnt'];
        $rcnt = mysql_fetch_array($re_rcnt)['cnt'];
        
        if ($ecnt <= $rcnt) {
            $_SESSION['check_out_error'] = "Equipment is reserved!";
            header("location: ../frontdesk_dashboard.php?type_id=$type_id&model_id=$model_id");
            exit;
        }
    }
    
    // Get rental length
    $sql = "SELECT * 
        FROM rental_length r
        LEFT JOIN type t
        ON t.rental_length_id = r.rental_length_id
        WHERE t.type_id = '$type_id'";
    $result = mysql_query($sql);
    $rental_length = mysql_fetch_array($result)['rental_length'];
    
    // Add to rental_record
    $checkedOut = "INSERT INTO rental_record 
        (serial_number, model_id, username_id, checked_out_date, due_date, checked_out_by) 
        VALUES 
        ('$serial', '$model_id', '$username_id', NOW(), NOW()+INTERVAL $rental_length DAY, '{$_SESSION['username_id']}')";
    $result = mysql_query($checkedOut);
    
    if ($result) {
        // Change equipment status to checked out
        $sql = "UPDATE equipment SET status_id = '4' WHERE serial_number = '$serial'";
        mysql_query($sql);
        
        // Update reservation to fulfilled
        if ($res_id != -1) {
            $sql = "UPDATE reservation_list SET fulfilled_indicator = '1' WHERE reservation_id = '$res_id'";
            mysql_query($sql);
        }
        
        $_SESSION['check_out_success'] = "Equipment checked out!";
        header("location: ../frontdesk_dashboard.php");
    } else {
        $_SESSION['check_out_error'] = "Error checking out equipment!";
        header("location: ../frontdesk_dashboard.php?type_id=$type_id&model_id=$model_id");
        exit;
    }
?>