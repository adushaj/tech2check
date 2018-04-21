<?php
    include('../connect.php');
    
    if (isset($_POST['btn-cancel'])) {
        $rid = $_POST['btn-cancel'];
        
        $sql = "UPDATE reservation_list SET fulfilled_indicator = '-1' WHERE reservation_id = '$rid'";
        
        if (!mysql_query($sql)) {
            $_SESSION['re_error'] = "Error ocurred!";
            
            header('Location: ../user_account.php');
            exit;
        }
        
        $_SESSION['re_success'] = "Reservation cancelled!";
        
        header('Location: ../user_account.php');
        exit;
    }
?>