<?php
  include("../connect.php");
  
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    // email or username and password sent from form
    $myloginkey = mysql_real_escape_string($_POST['login-key']);
    $mypassword = mysql_real_escape_string($_POST['password']);
    
    if (filter_var($myloginkey, FILTER_VALIDATE_EMAIL)) {
      // Check for email
      $sql = "SELECT username_id FROM employee WHERE email = '$myloginkey' UNION SELECT username_id FROM student WHERE email = '$myloginkey'";
      $result = mysql_query($sql);
      
      if (mysql_num_rows($result) > 0) {
        $username_id = mysql_fetch_array($result)['username_id'];
      }
    } else {
      // Check for username
      $sql = "SELECT * FROM usernames WHERE username = '$myloginkey'";
      $result = mysql_query($sql);
      
      if (mysql_num_rows($result) > 0) {
        $username_id = mysql_fetch_array($result)['username_id'];
      }
    }
    
    // Username/email not found
    if (!isset($username_id)) {
      $_SESSION['logerror'] = "Username/email not found!";
      header("location: ../login.php");
      exit;
    }
    
    // Check password
    $sql = "SELECT * FROM password WHERE username_id = '$username_id'";
    $result = mysql_query($sql);
    
    while ($row = mysql_fetch_array($result)) {
      if (!password_verify($mypassword, $row['password'])) {
        $_SESSION['logerror'] = "Incorrect password!";
        header("location: ../login.php");
        exit;
      } elseif ($mypassword == $row['password']) {
        // Hash settings
        $options = [
          'cost' => 11,
          'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        ];
        
        // Hash password
        $mypassword = password_hash($mypassword, PASSWORD_BCRYPT, $options);
        
        // Insert hashed password
        $sql = "UPDATE password SET password = '$mypassword' WHERE username_id = '$username_id'";
        mysql_query($sql);
      }
    }
    
    // Check for employee
    $sql_emp = "SELECT * FROM employee WHERE username_id = '$username_id'";
    $result_emp = mysql_query($sql_emp);
    
    // Check for student
    $sql_stu = "SELECT * FROM student WHERE username_id = '$username_id'";
    $result_stu = mysql_query($sql_stu);
    
    // Set session variables
    while ($row = mysql_fetch_array($result_emp)) {
      $_SESSION['employee_type'] = $row['employee_type_id'];
      $_SESSION['username_id'] = $row['username_id'];
    } 
    
    while ($row = mysql_fetch_array($result_stu)) {
      $_SESSION['username_id'] = $row['username_id'];
    }
    
    //sends user back to items details after reserve attempt without being logged in
    $model_id = $_SESSION['modelS'];
    if ($_SESSION['sendback'] == 'yes'){
      header("Location: ../item_details.php?model=$model_id");
      $_SESSION['sendback'] == 'no';
      exit;
    }
    header("location: ../index.php");
    exit;
      
    
    
  }
  
  $_SESSION['logerror'] = "Unknown error";
  header("location: ../login.php");
?>