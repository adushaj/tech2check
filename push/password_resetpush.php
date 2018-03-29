<?php
    include('../connect.php');
    
    if (isset($_POST['btn-update'])) {
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
    } elseif (isset($_POST['btn-reset'])) {
        $user = mysql_real_escape_string($_POST['username']);
        
        $sql = "SELECT * FROM usernames WHERE username = '$user'";
        $re = mysql_query($sql);
        
        if (mysql_num_rows($re) == 0) {
            $sql = "SELECT username_id FROM student WHERE email = '$user'
                UNION
                SELECT username_id FROM employee WHERE email = '$user'";
            $re = mysql_query($sql);
            
            if (mysql_num_rows($re) == 0) {
                $_SESSION['reset-error'] = "Username/Email not found!";
                
                header("location: ../password_reset.php");
                exit;
            }
        }
        
        $username_id = mysql_fetch_array($re)['username_id'];
        
        header("location: ../password_reset.php?id=$username_id");
        exit;
    } elseif (isset($_POST['btn-reset2'])) {
        $username_id = $_GET['id'];
        $question_id = mysql_real_escape_string($_POST['question']);
        $sub_answer = mysql_real_escape_string($_POST['answer']);
        
        $sql = "SELECT * FROM security_answers WHERE username_id = '$username_id'";
        $result = mysql_query($sql);
        
        $arr = mysql_fetch_array($result);
        $answer = $arr['answer'];
        
        if (!password_verify($sub_answer, $answer)) {
            $_SESSION['reset-error'] = "Incorrect answer!";
            
            header("location: ../password_reset.php?id=$username_id");
            exit;
        }
        
        $sql = "SELECT email FROM student WHERE username_id = '$username_id'
            UNION
            SELECT email FROM employee WHERE username_id = '$username_id'";
        $re = mysql_query($sql);
        $user = mysql_fetch_array($re);
        
        $salt = "498#2D83B631%380SDF56G400D*7E3CC13";
        $emailsalt = hash('sha512', $salt.$user['email']);
        
        header("location: ../password_reset.php?id=$username_id&q=$emailsalt");
        exit;
    } elseif (isset($_POST['btn-reset3'])) {
        $username_id = $_GET['id'];
        $emailhash = $_GET['q'];
        $new_pass = mysql_real_escape_string($_POST['new_password']);
        $verify = mysql_real_escape_string($_POST['new_password_verify']);
        
        $salt = "498#2D83B631%380SDF56G400D*7E3CC13";
        
        $sql = "SELECT email FROM student WHERE username_id = '$username_id'
            UNION
            SELECT email FROM employee WHERE username_id = '$username_id'";
        $re = mysql_query($sql);
        $email = mysql_fetch_array($re)['email'];
        
        $emailverify = hash('sha512', $salt.$email);
        
        if ($emailverify != $emailhash) {
            $_SESSION['reset-error'] = "Error ocurred!";
            
            header("location: ../password_reset.php");
            exit;
        }
        
        if ($new_pass != $verify) {
            $_SESSION['reset-error'] = "Password not verified!";
            
            header("location: ../password_reset.php?id=$username_id&q=$emailhash");
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
            $_SESSION['logsuccess'] = "Password reset successfully!";
            
            header("location: ../login.php");
            exit;
        }
    }
?>