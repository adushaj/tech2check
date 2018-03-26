<?php 
    include("../connect.php");
    
    $serial = mysql_real_escape_string($_POST['btn_serial']);
    $notes = mysql_real_escape_string($_POST['notes']);
    $status = mysql_real_escape_string($_POST['status_id']);
    $user = $_SESSION['username_id'];
    
    if (isset($_POST['btn_serial']) && isset($_POST['notes']) && isset($_POST['status_id'])) {
        $sql = "SELECT first_name, last_name FROM employee WHERE username_id = '$user'";
        $re = mysql_query($sql);
        $arr = mysql_fetch_array($re);
        $name = $arr['first_name'] . ' ' . $arr['last_name'];
        
        $updateEquipment = "UPDATE equipment
                            SET notes = CONCAT(IFNULL(notes,''), NOW(), ' by ', '$name', ': ', '$notes', CHAR(13)),
                            status_id = '$status',
                            last_activity_date = NOW(),
                            username_id = '$user'
                            WHERE serial_number = '$serial'";
        
        $updateQuery = mysql_query($updateEquipment);
        
        if ($updateQuery) {
            $_SESSION['service_success'] = "Service Update Completed";
            header("location: ../equipment_servicing.php");
            exit;
        } else {
            $_SESSION['service_error'] = "Service Update Failed";
            header("location: ../equipment_servicing.php");
            exit;
        }
    }
?>