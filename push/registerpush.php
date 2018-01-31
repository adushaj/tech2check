<?php
    include("../connect.php");
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = mysqli_real_escape_string($connection, $_POST['username']);  
        $first_name = mysqli_real_escape_string($connection, $_POST['firstname']);
        $middle_initial = mysqli_real_escape_string($connection, $_POST['middleinitial']);
        $last_name = mysqli_real_escape_string($connection, $_POST['lastname']);
        $street_line1 = mysqli_real_escape_string($connection, $_POST['streetaddress1']);
        $street_line2 = mysqli_real_escape_string($connection, $_POST['streetaddress2']);
        $city = mysqli_real_escape_string($connection, $_POST['city']);
        $state = strtoupper(mysqli_real_escape_string($connection, $_POST['state']));
        $zip = mysqli_real_escape_string($connection, $_POST['zip']);
        $phone_number = mysqli_real_escape_string($connection, $_POST['phonenumber']);
        $email_address = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $password_verify = mysqli_real_escape_string($connection, $_POST['passwordverify']);
        $security_question = mysqli_real_escape_string($connection, $_POST['question']);
        $security_answer = strtolower(mysqli_real_escape_string($connection, $_POST['answer']));
        
        $_SESSION['reg_username'] = $username;
        $_SESSION['reg_firstname'] = $first_name;
        $_SESSION['reg_middleinitial'] = $middle_initial;
        $_SESSION['reg_lastname'] = $last_name;
        $_SESSION['reg_streetaddress1'] = $street_line1;
        $_SESSION['reg_streetaddress2'] = $street_line2;
        $_SESSION['reg_city'] = $city;
        $_SESSION['reg_state'] = $state;
        $_SESSION['reg_zip'] = $zip;
        $_SESSION['reg_phonenumber'] = $phone_number;
        $_SESSION['reg_email'] = $email_address;
        
        //Check for username and email, validate email and verify password
        $sql_user = "SELECT * FROM usernames WHERE username = '$username'";
        $sql_email = "SELECT * FROM student WHERE email = '$email_address'";
        if (mysql_num_rows(mysql_query($sql_user)) > 0) {
            $_SESSION['regerror'] = 'Username taken!';
            header("location: ../register.php");
            exit;
        } elseif (mysql_num_rows(mysql_query($sql_email)) > 0) {
            $_SESSION['regerror'] = 'Email already has an active account!';
            header("location: ../register.php");
            exit;
        } elseif (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['regerror'] = 'Invalid email address!';
            header("location: ../register.php");
            exit;
        } elseif ($password !== $password_verify) {
            $_SESSION['regerror'] = 'Passwords did not match!';
            header("location: ../register.php");
            exit;
        } else {
            // Hash settings
            $options = [
                'cost' => 11,
                'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
            ];
            
            // Hash password
            $password = password_hash($password, PASSWORD_BCRYPT, $options);
            
            // Hash security answer
            $security_answer = password_hash($security_answer, PASSWORD_BCRYPT, $options);
        }
    
        //pass empty input as null
        $middle_initial = empty($middle_initial) ? NULL : $middle_initial;
        $street_line2 = empty($street_line2) ? NULL : $street_line2;
        
        //insert into 'usernames'
        $sql = "INSERT INTO usernames (username) VALUES ('$username')";
        mysql_query($sql);
        
        //get 'username_id'
        $sql = "SELECT username_id FROM usernames WHERE username = '$username'";
        $username_id = mysql_fetch_array(mysql_query($sql))['username_id'];
        
        //insert into 'student'
        $input = "INSERT INTO student (username_id, first_name, middle_initial, last_name, street_line_1, street_line_2, city, state, zip_code, phone_number, email) VALUES ('$username_id', '$first_name', '$middle_initial', '$last_name','$street_line1', '$street_line2', '$city', '$state', '$zip', '$phone_number', '$email_address')";
        $result = mysql_query($input);
        if ($result) {
            //insert password
            $sql_password = "INSERT INTO password VALUES ('$username_id', '$password')";
            mysql_query($sql_password);
            
            //insert security question and answer
            $sql_security = "INSERT INTO security_answers VALUES ('$username_id', '$security_question', '$security_answer')";
            mysql_query($sql_security);
            
            unset($_SESSION['reg_username']);
            unset($_SESSION['reg_firstname']);
            unset($_SESSION['reg_middleinitial']);
            unset($_SESSION['reg_lastname']);
            unset($_SESSION['reg_streetaddress1']);
            unset($_SESSION['reg_streetaddress2']);
            unset($_SESSION['reg_city']);
            unset($_SESSION['reg_state']);
            unset($_SESSION['reg_zip']);
            unset($_SESSION['reg_phonenumber']);
            unset($_SESSION['reg_email']);
            
            header("location: ../index.php");
            exit;
        } else {
            $_SESSION['regerror'] = "Registration unsuccessful. Please try again.<br>" . mysql_error($connection);
            header("location: ../register.php");
            exit;
        }
    }
?>