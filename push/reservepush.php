<?php

include("../connect.php");

//setting variables
$user_id = $_SESSION['username_id'];
$model_id = $_GET['model'];

//check if user is logged in
if (isset($user_id)){
    
    //pull student id 
    // $getID = "SELECT student_id FROM student WHERE username_id = $user_id";
    // $student = mysql_fetch_array(mysql_query($getID))['student_id'];
    
    
    //check to see if user already reserved
    $check = "SELECT * FROM reservation_list 
        WHERE username_id = $user_id 
        AND model_id = $model_id
        AND fulfilled_indicator = 0";
    $result = mysql_query($check);
    $rows = mysql_num_rows($result);
    
    //if not found then reserve
    if ($rows == 0) {
        $ecount = "Select serial_number from equipment where model_id = $model_id";
        $eresult = mysql_query($ecount);
        
        $rcount = "SELECT reservation_id FROM reservation_list WHERE model_id = $model_id AND fulfilled_indicator = 0";
        $rresult = mysql_query($rcount);
        
        $count = mysql_num_rows($eresult) - mysql_num_rows($rresult);
        
        if ($count > 0) {
             //push to database
            $reserve = "INSERT INTO reservation_list (model_id, username_id, date_reserved, fulfilled_indicator)
                VALUES ($model_id, $user_id, NOW(), '0')";
            
            if (mysql_query($reserve)) {
                $_SESSION['res_success'] = "You have reserved the item.";
                
                header("Location: ../item_details.php?model=$model_id");
            } else {
                $_SESSION['res_error'] = "Reservation error! Try again later.";
                
                header("Location: ../item_details.php?model=$model_id");
            }
        } else {
            $_SESSION['res_error'] = "Reservation not made! None in stock.";
            
            header("Location: ../item_details.php?model=$model_id");
        }
    } else {//already reserved
        $_SESSION['res_error'] = "You have already reserved this item.";
        
        header("Location: ../item_details.php?model=$model_id");
    }
    
} else {// not logged in 
    $_SESSION['logerror'] = "You must be logged in to reserve equipment!";
    header("Location: ../login.php");
    exit();
}
?>