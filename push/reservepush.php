<?php

include("../connect.php");

//setting variables
$user_id = $_SESSION['username_id'];
$model_id = $_SESSION['model'];

//check if user is logged in
if (isset($user_id)){
    
    //pull student id 
    $getID = "SELECT student_id FROM student WHERE username_id = $user_id";
    $student = mysql_fetch_array(mysql_query($getID))['student_id'];

    //check to see if user already reserved
    $check = "SELECT * FROM reservation_list 
    WHERE student_id = $student && model_id = $model_id";
    $result1 = mysql_query($check);
    $rows1 = mysql_num_rows($result1);
    
    //if not found then reserve
    if ($rows1 == 0){
         //push to database
        $reserve = "INSERT INTO reservation_list (model_id, student_id, fulfilled_indicator)
        VALUES ($model_id, $student, '0')";
        mysql_query($reserve);
        
        $message = "You have reserved item.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header("Location: ../item_details.php");
        
    }else{//already reserved
        $message = "You have already reserved this item.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        
        header("Location: ../item_details.php");
        //header("Location: " . $_SERVER['HTTP_REFERER']);
    }
    
}else{// not logged in 
    header("Location: ../login.php");
    Exit();
}
?>