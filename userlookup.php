<?php
    include('connect.php');
?>

<p id="searcherror" style=<?php echo isset($_SESSION['searcherror']) ? "\"color:red;display:block;\"" : "\"display:none;\""; ?>><?php echo $_SESSION['searcherror']; unset($_SESSION['searcherror']); ?></p>
<form class="row" name="lookupForm" id="lookupForm" autocomplete="off">
    <div class="form-group col-xs-8">
        <input class="form-control capitalize" list="user_list" id="lname" name="lname" maxlength="50" placeholder="Enter user's last name">
        
        <datalist id="user_list">
            <?php 
                $sql = "SELECT last_name FROM student
                    UNION
                    SELECT last_name FROM employee
                    ORDER BY last_name";
                $result = mysql_query($sql);
                
                while ($row = mysql_fetch_array($result)) {
                    echo "<option>{$row['last_name']}</option>";
                }
            ?>
        </datalist>
    </div>
    <div class="form-group col-xs-4">
        <button class="form-control btn btn-primary" type="button" id="btn-search" name="btn-search" onclick="lookup(this)">Search</button>
    </div>
</form>
<br>
<?php
    if (isset($_GET['lname'])) {
        // echo "<div class='well'>";
        
        $sql = "SELECT username_id, first_name, last_name, middle_initial, email, street_line_1, phone_number
            FROM student WHERE last_name = '{$_GET['lname']}'
            UNION
            SELECT username_id, first_name, last_name, middle_initial, email, street_line_1, phone_number
            FROM employee WHERE last_name = '{$_GET['lname']}'";
        $result = mysql_query($sql);
        
        while ($row = mysql_fetch_array($result)) {
            echo "<div class='row user-info well'>";
            
            $sql_user = "SELECT username FROM usernames WHERE username_id = '{$row['username_id']}'";
            $username = mysql_fetch_array(mysql_query($sql_user))['username'];
            
            echo "<div class='col-xs-4 bold'>Username:</div>";
            echo "<div class='col-xs-8'>$username</div>";
            
            $name = $row['middle_initial'] != '' ? $row['first_name'].' '.$row['middle_initial'].'. '.$row['last_name'] : $row['first_name'].' '.$row['last_name'];
            echo "<div class='col-xs-4 bold'>Name:</div>";
            echo "<div class='col-xs-8'>$name</div>";
            
            echo "<div class='col-xs-4 bold'>Email:</div>";
            echo "<div class='col-xs-8'>{$row['email']}</div>";
            
            echo "<div class='col-xs-4 bold'>Address:</div>";
            echo "<div class='col-xs-8'>{$row['street_line_1']}</div>";
            
            echo "<div class='col-xs-4 bold'>Phone:</div>";
            echo "<div class='col-xs-8'>{$row['phone_number']}</div>";
            
            echo "</div>";
        }
        
        // echo "</div>";
    }
?>