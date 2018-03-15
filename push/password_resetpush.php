<?php
    include('../connect.php');
    
    $old_pass = mysql_real_escape_string($_POST['old_password']);
    $new_pass = mysql_real_escape_string($_POST['new_password']);
    $verify = mysql_real_escape_string($_POST['new_password_verify']);
    
    $username_id = $_SESSION['username_id'];
    
    // Check password
    $sql = "SELECT * FROM password WHERE username_id = '$username_id'";
    $result = mysql_query($sql);
    
    while ($row = mysql_fetch_array($result)) {
        if (!password_verify($old_pass, $row['password'])) {
            $_SESSION['reseterror'] = "Incorrect password!";
            
            header("location: ../user_account.php");
            exit;
        } elseif ($old_pass == $row['password'] || password_verify($old_pass, $row['password'])) {
            if ($new_pass != $verify) {
                $_SESSION['reseterror'] = "Password not verified!";
                
                header("location: ../user_account.php");
                exit;
            }
            
            // Hash settings
            $options = [
                'cost' => 11,
                'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
            ];
            
            // Hash password
            $mypassword = password_hash($new_pass, PASSWORD_BCRYPT, $options);
            
            // Insert hashed password
            $sql = "UPDATE password SET password = '$mypassword' WHERE username_id = '$username_id'";
            
            if (mysql_query($sql)) {
                $_SESSION['resetsuccess'] = "Password reset successfully!";
                
                header("location: ../user_account.php");
                exit;
            }
        }
    }
    
    $_SESSION['reseterror'] = "Error occurred!";
    
    header("location: ../user_account.php");
    exit;
?>