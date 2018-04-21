<?php
    
    // BEGIN FUNCTIONS----------------------------------------------------------
    
    function addEmployee($uid, $eid, $type) {
        if ($type == 'employee') {
            $sql = "UPDATE employee SET employee_type_id = '$eid' WHERE username_id = '$uid'";
            return mysql_query($sql);
        } elseif ($type == 'student') {
            $sql = "SELECT * FROM student WHERE username_id = '$uid'";
            $data = mysql_fetch_array(mysql_query($sql));
            
            if(isset($data['notes'])) {
                $sql_insert = "INSERT INTO employee 
                            (employee_type_id, username_id, first_name, last_name, middle_initial, street_line_1, street_line_2, city, state, zip_code, phone_number, email, notes)
                            VALUES
                            ('$eid', '$uid', '{$data['first_name']}', '{$data['last_name']}', '{$data['middle_initial']}', '{$data['street_line_1']}', '{$data['street_line_2']}', '{$data['city']}', '{$data['state']}', '{$data['zip_code']}', '{$data['phone_number']}', '{$data['email']}', '{$data['notes']}')";
            } else {
                $sql_insert = "INSERT INTO employee 
                            (employee_type_id, username_id, first_name, last_name, middle_initial, street_line_1, street_line_2, city, state, zip_code, phone_number, email)
                            VALUES
                            ('$eid', '$uid', '{$data['first_name']}', '{$data['last_name']}', '{$data['middle_initial']}', '{$data['street_line_1']}', '{$data['street_line_2']}', '{$data['city']}', '{$data['state']}', '{$data['zip_code']}', '{$data['phone_number']}', '{$data['email']}')";
            }
            $re = mysql_query($sql_insert);
            
            if ($re) {
                $sql_remove = "DELETE FROM student WHERE username_id = '$uid'";
                return mysql_query($sql_remove);
            } else {
                return "Could not add employee!";
            }
        } else {
            return "Username ID not found!";
        }
    }
    
    function removeEmployee($uid) {
        $sql = "SELECT * FROM employee WHERE username_id = '$uid'";
        $data = mysql_fetch_array(mysql_query($sql));
        
        if(isset($data['notes'])) {
            $sql_insert = "INSERT INTO student 
                (username_id, first_name, last_name, middle_initial, street_line_1, street_line_2, city, state, zip_code, phone_number, email, notes)
                VALUES
                ('$uid', '{$data['first_name']}', '{$data['last_name']}', '{$data['middle_initial']}', '{$data['street_line_1']}', '{$data['street_line_2']}', '{$data['city']}', '{$data['state']}', '{$data['zip_code']}', '{$data['phone_number']}', '{$data['email']}', '{$data['notes']}')";
        } else {
            $sql_insert = "INSERT INTO student 
                (username_id, first_name, last_name, middle_initial, street_line_1, street_line_2, city, state, zip_code, phone_number, email)
                VALUES
                ('$uid', '{$data['first_name']}', '{$data['last_name']}', '{$data['middle_initial']}', '{$data['street_line_1']}', '{$data['street_line_2']}', '{$data['city']}', '{$data['state']}', '{$data['zip_code']}', '{$data['phone_number']}', '{$data['email']}')";
        }
        $re = mysql_query($sql_insert);
        echo $re;
        echo $sql_insert;
        if ($re) {
            $sql_remove = "DELETE FROM employee WHERE username_id = '$uid'";
            return mysql_query($sql_remove);
        } else {
            return $re;
        }
    }
    
    // END FUNCTIONS -----------------------------------------------------------
    
    
    include("../connect.php");
    
    $old_username_id = $_SESSION['search_id'];
    $old_type = $_SESSION['user_search'];
    
    unset($_SESSION['search_id']);
    unset($_SESSION['user_search']);
    
    if (isset($_POST['btn-clear'])) { header("location: ../configure_user.php"); exit; }
    
    if (isset($_POST['btn-save'])) {
        $username = mysqli_real_escape_string($connection, $_POST['username']);  
        $first_name = mysqli_real_escape_string($connection, $_POST['fname']);
        $middle_initial = mysqli_real_escape_string($connection, $_POST['mi']);
        $last_name = mysqli_real_escape_string($connection, $_POST['lname']);
        $street_line1 = mysqli_real_escape_string($connection, $_POST['address1']);
        $street_line2 = mysqli_real_escape_string($connection, $_POST['address2']);
        $city = mysqli_real_escape_string($connection, $_POST['city']);
        $state = strtoupper(mysqli_real_escape_string($connection, $_POST['state']));
        $zip = mysqli_real_escape_string($connection, $_POST['zip']);
        $phone_number = mysqli_real_escape_string($connection, $_POST['phone']);
        $email_address = mysqli_real_escape_string($connection, $_POST['email']);
        $locked = isset($_POST['locked']) ? 1 : NULL;
        $notes = mysqli_real_escape_string($connection, $_POST['notes']);
        $employee_type_id = mysqli_real_escape_string($connection, $_POST['employee_type']);
        
        // Validate email address
        if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['re_error'] = "Please enter a valid email address!";
            $_SESSION['search_id'] = $old_username_id;
            $_SESSION['user_search'] = $old_type;
            
            header("location: ../configure_user.php");
            exit;
        }
        
        if ($old_type == "employee") {
            $sql = "UPDATE employee 
                SET 
                employee_type_id = '$employee_type_id',
                first_name = '$first_name',
                last_name = '$last_name',
                middle_initial = '$middle_initial',
                street_line_1 = '$street_line1',
                street_line_2 = '$street_line2',
                city = '$city',
                state = '$state',
                zip_code = '$zip',
                phone_number = '$phone_number',
                email = '$email_address',
                locked_indicator = '$locked',
                notes = '$notes'
                WHERE username_id = '$old_username_id'";
                
            if (!mysql_query($sql)) {
                $_SESSION['re_error'] = "Update Failed!";
            } else {
                $_SESSION['re_success'] = "Update successful!";
            }
        } else {
            $sql = "UPDATE student 
                SET 
                first_name = '$first_name',
                last_name = '$last_name',
                middle_initial = '$middle_initial',
                street_line_1 = '$street_line1',
                street_line_2 = '$street_line2',
                city = '$city',
                state = '$state',
                zip_code = '$zip',
                phone_number = '$phone_number',
                email = '$email_address',
                locked_indicator = '$locked',
                notes = '$notes'
                WHERE username_id = '$old_username_id'";
                
            if (!mysql_query($sql)) {
                $_SESSION['re_error'] = "Update Failed!";
            } else {
                $_SESSION['re_success'] = "Update successful!";
            }
        }
        
        header("location: ../configure_user.php");
        exit;
    }
    
    if (isset($_POST['btn-save-emp'])) {
        $employee_id = (int)$_POST['employee_type'];
        $username_id = $old_username_id;
        $type = $old_type;
        
        if ($employee_id > 0) {
            $add_successful = addEmployee($username_id, $employee_id, $type);
            if ($add_successful !== true) {
                $_SESSION['re_error'] = $add_successful;
            } else {
                $_SESSION['re_success'] = "Update successful!";
            }
        } else {
            $remove_successful = removeEmployee($username_id);
            if ($remove_successful !== true) {
                $_SESSION['re_error'] = $remove_successful;
            } else {
                $_SESSION['re_success'] = "Update successful!";
            }
        }
        
        header("location: ../configure_user.php");
        exit;
    }
    
    if (isset($_POST['btn-delete-modal'])) {
        if ($old_type = 'student') {
            $sql = "DELETE FROM student WHERE username_id = '$old_username_id'";
        } else {
            $sql = "DELETE FROM employee WHERE username_id = '$old_username_id'";
        }
        
        if (mysql_query($sql)) {
            $sql = "DELETE FROM usernames WHERE username_id = '$old_username_id'";
            
            if (mysql_query($sql)) {
                $_SESSION['re_success'] = "User deleted!";
            }
        } else {
            $_SESSION['re_error'] = 'User not found!';
        }
        
        header("location: ../configure_user.php");
        exit;
    }
    
    if (isset($_POST['btn-user-save'])) {
        $username_id = $_SESSION['username_id'];
        $old_type = isset($_SESSION['employee_type']) ? 'employee' : null;
        
        $username = mysqli_real_escape_string($connection, $_POST['username']);  
        $first_name = mysqli_real_escape_string($connection, $_POST['fname']);
        $middle_initial = mysqli_real_escape_string($connection, $_POST['mi']);
        $last_name = mysqli_real_escape_string($connection, $_POST['lname']);
        $street_line1 = mysqli_real_escape_string($connection, $_POST['address1']);
        $street_line2 = mysqli_real_escape_string($connection, $_POST['address2']);
        $city = mysqli_real_escape_string($connection, $_POST['city']);
        $state = strtoupper(mysqli_real_escape_string($connection, $_POST['state']));
        $zip = mysqli_real_escape_string($connection, $_POST['zip']);
        $phone_number = mysqli_real_escape_string($connection, $_POST['phone']);
        $email_address = mysqli_real_escape_string($connection, $_POST['email']);
        
        // Validate email address
        if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['re_error'] = "Please enter a valid email address!";
            
            header("location: ../user_account.php");
            exit;
        }
        
        if ($old_type == "employee") {
            $sql = "UPDATE employee 
                SET 
                first_name = '$first_name',
                last_name = '$last_name',
                middle_initial = '$middle_initial',
                street_line_1 = '$street_line1',
                street_line_2 = '$street_line2',
                city = '$city',
                state = '$state',
                zip_code = '$zip',
                phone_number = '$phone_number',
                email = '$email_address'
                WHERE username_id = '$username_id'";
            
            if (!mysql_query($sql)) {
                $_SESSION['re_error'] = "Update Failed!";
            } else {
                $_SESSION['re_success'] = "Update successful!";
            }
        } else {
            $sql = "UPDATE student 
                SET 
                first_name = '$first_name',
                last_name = '$last_name',
                middle_initial = '$middle_initial',
                street_line_1 = '$street_line1',
                street_line_2 = '$street_line2',
                city = '$city',
                state = '$state',
                zip_code = '$zip',
                phone_number = '$phone_number',
                email = '$email_address'
                WHERE username_id = '$username_id'";
                
            if (!mysql_query($sql)) {
                $_SESSION['re_error'] = "Update Failed!";
            } else {
                $_SESSION['re_success'] = "Update successful!";
            }
        }
        
        header("location: ../user_account.php");
        exit;
    }
    
    $username = mysql_real_escape_string($_POST['dlist']);
    
    $sql = "SELECT * FROM usernames WHERE username = '$username'";
    $username_id = mysql_fetch_array(mysql_query($sql))['username_id'];
    
    if (empty($username_id)) {
        $_SESSION['re_error'] = "Please enter a valid username!";
        header("location: ../configure_user.php");
        exit;
    }
    
    // Check employee
    $sql_employee = "SELECT * FROM employee WHERE username_id = '$username_id'";
    $re_employee = mysql_query($sql_employee);
    
    // Check student
    $sql_student = "SELECT * FROM student WHERE username_id = '$username_id'";
    $re_student = mysql_query($sql_student);
    
    if (mysql_num_rows($re_employee) > 0) {
        $_SESSION['user_search'] = 'employee';
    } elseif (mysql_num_rows($re_student) > 0) {
        $_SESSION['user_search'] = 'student';
    } else {
        $_SESSION['re_error'] = "User ID not found!";
        header("location: ../configure_user.php");
        exit;
    }
    
    $_SESSION['search_id'] = $username_id;
    
    header("location: ../configure_user.php");
?>