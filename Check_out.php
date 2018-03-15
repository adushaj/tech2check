<?php
  include("connect.php");
?>
<div class="row">
    <div class="col-xs-12">
        <p id="check_out_error" style=<?php echo isset($_SESSION['check_out_error']) ? "\"color:red;display:block;\"" : "\"display:none;\""; ?>><?php echo $_SESSION['check_out_error']; unset($_SESSION['check_out_error']); ?></p>
        <p id="check_out_success" style=<?php echo isset($_SESSION['check_out_success']) ? "\"color:green;display:block;\"" : "\"display:none;\""; ?>><?php echo $_SESSION['check_out_success']; unset($_SESSION['check_out_success']); ?></p>
        <form action="push/checkoutpush.php" method="post">
            <div class="form-group row" id="selectType">
                <div class="col-xs-4 selectContainer">
                    <select class="form-control" type="text" id="sel_type" name="sel_type" required>
                        <option value="-1" selected disabled>Please Select Equipment Type</option>
                        <?php
                            $TypeList = "SELECT *
                                FROM type
                                ORDER BY type";
                            
                            $TypeID = mysql_query($TypeList);
                            
                            while($row = mysql_fetch_array($TypeID)){
                                if (isset($_GET['type_id'])) {
                                    if ($row['type_id'] == $_GET['type_id']) {
                                        echo "<option value=\"{$row['type_id']}\" selected>{$row['type']}</option>";
                                    } else {
                                        echo "<option value=\"{$row['type_id']}\">{$row['type']}</option>";
                                    }
                                } else {
                                    echo "<option value=\"{$row['type_id']}\">{$row['type']}</option>";
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="col-xs-6 col-xs-offset-2">
                    <div class="from-group row">
                        <div class="col-xs-8">
                            <input class="form-control" id="serial" name="serial" placeholder="Please enter serial number" value=<?php echo isset($_GET['serial']) ? $_GET['serial'] : ''; ?>>
                        </div>
                        <div class="col-xs-4">
                            <button class="form-control btn btn-primary" type="button" onclick="serialSearch()">Search</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row" id="selectModel" style="display:none">
                <div class="col-xs-4 selectContainer">
                    <select class="form-control" type="text" id="sel_model" name="sel_model" required>
                        <option value="-1" selected disabled>Please Select Model</option>
                        
                        <?php
                            $selectedTypeID = mysql_real_escape_string($_GET['type_id']);
                            
                            $ModelList = "SELECT *
                                FROM model LEFT JOIN type
                                ON model.type_id = type.type_id
                                WHERE model.type_id = '$selectedTypeID'
                                ORDER BY model";
                            
                            $Model = mysql_query($ModelList);
                            if (mysql_num_rows($Model) > 0) {
                                if (isset($_GET['model_id'])) {
                                    if ($_GET['model_id'] == 999) {
                                        echo "<option value=\"999\" selected>All Models</option>";
                                    } else {
                                        echo "<option value=\"999\">All Models</option>";
                                    }
                                } else {
                                    echo "<option value=\"999\">All Models</option>";
                                }
                                
                                while($row = mysql_fetch_array($Model)){
                                    if (isset($_GET['model_id'])) {
                                        if ($row['model_id'] == $_GET['model_id']) {
                                            echo "<option value=\"{$row['model_id']}\" selected>{$row['model']}</option>";
                                        } else {
                                            echo "<option value=\"{$row['model_id']}\">{$row['model']}</option>";
                                        }
                                    } else {
                                        echo "<option value=\"{$row['model_id']}\">{$row['model']}</option>";
                                    }
                                }
                            } else {
                                echo "<option selected disabled>None available</option>";
                            }
                            
                        ?>
                    </select>
                </div>
            </div>
            <div id="modals">
                <?php
                    $sql = "SELECT username_id FROM reservation_list WHERE fulfilled_indicator = '0' GROUP BY username_id";
                    $re = mysql_query($sql);
                    
                    while ($row = mysql_fetch_array($re)) {
                        $sql_info = "SELECT first_name, last_name, middle_initial, email, phone_number, street_line_1 FROM student 
                            WHERE username_id = '{$row['username_id']}'
                            UNION 
                            SELECT first_name, last_name, middle_initial, email, phone_number, street_line_1 FROM employee 
                            WHERE username_id = '{$row['username_id']}'";
                        $re_info = mysql_query($sql_info);
                        
                        if ($re_info) {
                            $info = mysql_fetch_array($re_info);
                            
                            $sql_user = "SELECT username FROM usernames WHERE username_id = '{$row['username_id']}'";
                            $user = mysql_fetch_array(mysql_query($sql_user));
                ?>
                <div class="modal fade mfp-hide" id="<?php echo "modal_{$row['username_id']}"; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog bg-white" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h3 class="modal-title">User Information</h3>
                            </div>
                            <div class="modal-body">
                                <?php
                                    echo "<div class='row'>";
                                    echo "<div class='user-info'>";
                                    
                                    echo "<div class='col-xs-4 bold'>Username:</div>";
                                    echo "<div class='col-xs-8'>{$user['username']}</div>";
                                    
                                    $name = $info['middle_initial'] != '' ? $info['first_name'].' '.$info['middle_initial'].'. '.$info['last_name'] : $info['first_name'].' '.$info['last_name'];
                                    echo "<div class='col-xs-4 bold'>Name:</div>";
                                    echo "<div class='col-xs-8'>$name</div>";
                                    
                                    echo "<div class='col-xs-4 bold'>Email:</div>";
                                    echo "<div class='col-xs-8'>{$info['email']}</div>";
                                    
                                    echo "<div class='col-xs-4 bold'>Address:</div>";
                                    echo "<div class='col-xs-8'>{$info['street_line_1']}</div>";
                                    
                                    echo "<div class='col-xs-4 bold'>Phone:</div>";
                                    echo "<div class='col-xs-8'>{$info['phone_number']}</div>";
                                    
                                    echo "</div>";
                                    echo "</div>";
                                ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                        }
                    }
                ?>
            </div>
            <div class ="row" id="reserveIDs" name="reserve_ids" style="display:none">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Make</th>
                                    <th>Model</th>
                                    <th>Serial #</th>
                                    <th>Reserved?</th>
                                    <th>Rental Length</th>
                                    <th>Check Out?</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $selectedTypeID = mysql_real_escape_string($_GET['type_id']);
                                    $selectedModelID = mysql_real_escape_string($_GET['model_id']);
                                    $selectedSerial = mysql_real_escape_string($_GET['serial']);
                                    
                                    $date = date('Y-m-d H:i:s');
                                    
                                    if (isset($_GET['serial'])) {
                                        $sql = "SELECT *
                                            FROM equipment e
                                            LEFT JOIN model m
                                            ON e.model_id = m.model_id
                                            LEFT JOIN make m2
                                            ON m.make_id = m2.make_id 
                                            LEFT JOIN type t
                                            ON m.type_id = t.type_id
                                            LEFT JOIN rental_length r
                                            ON t.rental_length_id = r.rental_length_id
                                            WHERE e.serial_number = '$selectedSerial'
                                            AND e.status_id = '1'
                                            ORDER BY make, model";
                                        
                                        // $sql_reserved = "SELECT *
                                        //     FROM reservation_list r
                                        //     LEFT JOIN model m
                                        //     ON r.model_id = m.model_id
                                        //     LEFT JOIN equipment e
                                        //     ON e.model_id = m.model_id
                                        //     WHERE e.serial_number = '$selectedSerial'
                                        //     AND r.fulfilled_indicator = 0";
                                    } else {
                                        if ($selectedModelID == 999) {
                                            $sql = "SELECT *
                                                FROM equipment e
                                                LEFT JOIN model m
                                                ON e.model_id = m.model_id
                                                LEFT JOIN make m2
                                                ON m.make_id = m2.make_id 
                                                LEFT JOIN type t
                                                ON m.type_id = t.type_id
                                                LEFT JOIN rental_length r
                                                ON t.rental_length_id = r.rental_length_id
                                                WHERE t.type_id = '$selectedTypeID'
                                                AND e.status_id = '1'
                                                ORDER BY make, model";
                                                
                                            $sql_reserved = "SELECT *
                                                FROM reservation_list r
                                                LEFT JOIN model m
                                                ON r.model_id = m.model_id
                                                LEFT JOIN type t
                                                ON m.type_id = t.type_id
                                                WHERE t.type_id = '$selectedTypeID'
                                                AND r.fulfilled_indicator = 0";
                                        } else {
                                            $sql = "SELECT *
                                                FROM equipment e
                                                LEFT JOIN model m
                                                ON e.model_id = m.model_id
                                                LEFT JOIN make m2
                                                ON m.make_id = m2.make_id 
                                                LEFT JOIN type t
                                                ON m.type_id = t.type_id
                                                LEFT JOIN rental_length r
                                                ON t.rental_length_id = r.rental_length_id
                                                WHERE e.model_id = '$selectedModelID'
                                                AND e.status_id = '1'
                                                ORDER BY make, model";
                                            
                                            $sql_reserved = "SELECT *
                                                FROM reservation_list
                                                WHERE model_id = '$selectedModelID'
                                                AND fulfilled_indicator = 0";
                                        }
                                    }
                                    
                                    $equipment = mysql_query($sql);
                                    if (isset($sql_reserved)) {
                                        $result_reserved = mysql_query($sql_reserved);
                                        
                                        while ($rent_row = mysql_fetch_array($result_reserved)) {
                                            $rentals[$rent_row['reservation_id']] = $rent_row;
                                        }
                                    }
                                    
                                    $cnt = 0;
                                    while($row = mysql_fetch_array($equipment)){
                                        echo "<tr id='row_$cnt'>";
                                        echo "<td>" . $row['make'] . "</td>";
                                        echo "<td>" . $row['model'] . "</td>";
                                        echo "<td>" . $row['serial_number'] . "</td>";
                                        
                                        $rented = false;
                                        if (count($rentals) > 0) {
                                            foreach ($rentals as $key => $value) {
                                                if ($value['model_id'] == $row['model_id']) {
                                                    $rented = true;
                                                    
                                                    $sql_user = "SELECT * 
                                                        FROM usernames
                                                        WHERE username_id = '{$value['username_id']}'";
                                                    $re_user = mysql_query($sql_user);
                                                    $user = mysql_fetch_array($re_user);
                                                    
                                                    echo "<td id='reserved' res='{$value['reservation_id']}'>";
                                                    echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modal_{$value['username_id']}'>";
                                                    echo $user['username'];
                                                    echo "</button>";
                                                    echo "</td>";
                                                    
                                                    unset($rentals[$key]);
                                                    break;
                                                }
                                            }
                                        }
                                        
                                        if (!$rented) {
                                            echo "<td id='reserved'>N/A</td>";
                                        }
                                        
                                        echo "<td>" . $row['rental_length'] . " days</td>";
                                        // echo "<td>" . "<button type=\"button\" name=\"btn-checkout\" class=\"btn btn-default\" onClick=\"checkout(this, '#row_$cnt')\" value=\"{$row['serial_number']}\"><i class=\"fa fa-fw fa-angle-right\"></i></button>" . "</td>";
                                        echo "<td>" . "<button type='button' class='btn btn-default' name='btn-checkout' data-toggle='modal' data-target='#modal_{$row['serial_number']}'><i class=\"fa fa-fw fa-angle-right\"></i></button>" . "</td>";
                                        echo "<td id='model' style='display:none;'>" . $row['model_id'] . "</td>";
                                        echo "</tr>";
                                ?>
                                
                                <!-- Equipment Modal -->
                                <div class="modal fade mfp-hide" id="<?php echo "modal_{$row['serial_number']}"; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog bg-white" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h3 class="modal-title">Check Out</h3>
                                            </div>
                                            <form action="push/checkoutpush.php" method="post">
                                                <div class="modal-body">
                                                        <div class="form-group row">
                                                            <div class="col-md-6">
                                                                <label for="username">Username</label>
                                                                <input class="form-control" type="text" id="username" name="username" maxlength="25" required placeholder="Enter username of student" <?php echo isset($user['username']) ? "value='{$user['username']}'" : ""; ?>></input>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="condition">Is the equipment in good condition?</label>
                                                                <br>
                                                                <input type="checkbox" id="condition" name="condition"></input>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" id="serial" name="serial" value="<?= $row['serial_number'] ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                        
                                <?php
                                        unset($user);
                                        $cnt++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>      			
        </form>
    </div>
</div>