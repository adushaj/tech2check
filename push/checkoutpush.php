<!DOCTYPE html>
<html lang="en">
    <head>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <h1 id="h1">
                    Please enable popups and then refresh this page.
                </h1>
            </div>
        </div>
<?php
    include("../connect.php");
    
    // Get URL parameters
    $username_id = mysql_real_escape_string($_POST['btn-checkout']);
    $serial = mysql_real_escape_string($_POST['serial']);
    $lname = mysql_real_escape_string($_POST['lname']);
    $q = mysql_real_escape_string($_POST['q']);
    
    // Get type_id and model_id
    $sql = "SELECT m.type_id, m.model_id 
        FROM equipment e
        JOIN model m
        ON e.model_id = m.model_id
        WHERE e.serial_number = '$serial'";
    $type_id = mysql_fetch_array(mysql_query($sql))['type_id'];
    $model_id = mysql_fetch_array(mysql_query($sql))['model_id'];
    
    // Check condition of equipment
    if (!isset($_POST['condition'])) {
        $_SESSION['modal_error'] = "Please verify good condition of equipment!";
        header("location: ../Check_out.php?type_id=$type_id&model_id=$model_id&lname=$lname&q=$q");
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
            header("location: ../Check_out.php?type_id=$type_id&model_id=$model_id");
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
        (serial_number, username_id, checked_out_date, due_date, checked_out_by) 
        VALUES 
        ('$serial', '$username_id', NOW(), NOW()+INTERVAL $rental_length DAY, '{$_SESSION['username_id']}')";
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
        
        $invoice_sql = "SELECT MAX(rental_id) AS rid FROM rental_record WHERE serial_number = '$serial'";
        $rental_id = mysql_fetch_array(mysql_query($invoice_sql))['rid'];
?>

        <script type="text/javascript">
            var popup = window.open("../invoice.php?rental_id=<?= $rental_id ?>", "_blank");
            
            if (history.pushState) {
                window.history.pushState("object or string", "Title", "../Check_out.php");
            } else {
                document.location.href = "../Check_out.php";
            }
            
            if (!popup || popup.closed || typeof popup.closed=='undefined') {
                document.getElementById("h1").innerHTML = "Please enable popups and then refresh this page.";
            } else {
                location.reload();
            }
        </script>

<?php
        // header("location: ../Check_out.php");
    } else {
        $_SESSION['check_out_error'] = "Error checking out equipment!";
        header("location: ../Check_out.php?type_id=$type_id&model_id=$model_id");
        exit;
    }
?>
    </body>
</html>