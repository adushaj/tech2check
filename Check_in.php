<?php
include("connect.php");
?>
<form class="row" action="push/checkinpush.php" method="post">
  <div class="col-xs-12">
    <p id="check_out_error" style=<?php echo isset($_SESSION['check_in_error']) ? "\"color:red;display:block;\"" : "\"display:none;\""; ?>><?php echo $_SESSION['check_in_error']; unset($_SESSION['check_in_error']); ?></p>
        <p id="check_out_success" style=<?php echo isset($_SESSION['check_in_success']) ? "\"color:green;display:block;\"" : "\"display:none;\""; ?>><?php echo $_SESSION['check_in_success']; unset($_SESSION['check_in_success']); ?></p>
    <div class="table-responsive">
      <table class="table table-hover table-striped">
        <thead>
          <tr>
            <th>Rental ID</th>
            <th>Serial Number</th>
            <th>Make</th>
            <th>Model</th>
            <th>Student</th>
            <th>Checked out by</th>
            <th>Due Date</th>
            <th>Check in?</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $checkedoutList = "SELECT r.rental_id, r.serial_number, make.make, m.model, u.username, e.first_name, e.last_name, r.due_date
              FROM rental_record r
              JOIN model m
              ON r.model_id = m.model_id
              JOIN employee e
              ON r.checked_out_by = e.username_id
              JOIN usernames u 
              ON r.username_id = u.username_id
              JOIN make
              ON m.make_id = make.make_id
              WHERE date_returned = '0000-00-00 00:00:00'
              ORDER BY date(due_date), r.username_id, r.model_id";
              
            $checkedout = mysql_query($checkedoutList);
            
            while($row = mysql_fetch_array($checkedout)){
              if (date("Y-m-d") == date("Y-m-d", strtotime($row['due_date']))) {
                echo "<tr class = 'warning'>";
              } elseif (date("Y-m-d H:i:s") > $row['due_date']) {
                echo "<tr class = 'danger'>";
              } else{
                echo "<tr class = 'success'>";
              }
              
              echo "<td>" . $row['rental_id'] . "</td>";
              echo "<td>" . $row['serial_number'] . "</td>";
              echo "<td>" . $row['make'] . "</td>";
              echo "<td>" . $row['model'] . "</td>";
              echo "<td>" . $row['username'] . "</td>";
              echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
              echo "<td>" . date('Y-m-d', strtotime($row['due_date'])) . "</td>";
              echo "<td>" . "<button type='button' class='btn btn-default' data-toggle='modal' data-target='#modal_{$row['rental_id']}'><i class=\"fa fa-fw fa-angle-right\"></i></button>" . "</td>";
              
              echo "</tr>";
            
          ?>
                
                <!-- Modal -->
                <div class="modal fade" id="<?php echo "modal_{$row['rental_id']}"; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Rental # <?php echo "{$row['rental_id']}"; ?></h4>
                      </div>
                      <div class="modal-body">
                        <div>
                          <label>Student Information: </label><?php echo " {$row['username']}"; 
                                  //Show Students name/address
                          
                          
                          
                          
                          
                          ?>
                        </div>
                        <div>
                          <label>Equipment: </label><?php echo " {$row['make']} {$row['model']}"; ?>
                        </div>
                        <div>
                          <label>Due Date: </label><?php echo " " . date('Y-m-d', strtotime($row['due_date'])) ?>
                        </div>
                        <div>
                          <label>Equipment status at time of Check in: </label>
                          <div>
                            <label class="radio-inline"><input type="radio" name="status_id" value='1'>Good</label>
                            <label class="radio-inline"><input type="radio" name="status_id" value='2'>Needs Repair</label>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="message-text" class="control-label">Notes: </label>
                          <textarea class="form-control" id="message-text" name='notes'></textarea>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary"value='<?php echo"{$row['rental_id']}";?>' onClick='checkin(this)'>Complete Check In</button>
                      </div>
                    </div>
                  </div>
                </div>
                <?php } ?>
          
        </tbody>
      </table>
    </div>
  </div>
</form>