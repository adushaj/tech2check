<div class="col-xs-9">
    <div class="modal fade mfp-hide" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog bg-white" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title">Are you sure you want to cancel?</h3>
                </div>
                <form action="push/view_reservationspush.php" method="POST">
                    <div class="modal-body">
                        You are requesting to cancel your reservation for a(n) 
                        <strong><span id="modal_info">Make</span></strong>.
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" name="btn-cancel" id="btn-cancel" value="-1">Cancel Reservation</button>
                        <button type="button" class="btn" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><strong>Active Reservations</strong></h3>
        </div>
        <div class="panel-body">
            <table class="table table-condensed table-center">
                <thead>
                    <tr>
                        <td><strong>Make</strong></td>
                        <td><strong>Model</strong></td>
                        <td><strong>Date Reserved</strong></td>
                        <td><strong>Cancel?</strong></td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $username_id = $_SESSION['username_id'];
                        
                        $sql = "SELECT * FROM reservation_list WHERE username_id = '$username_id' AND fulfilled_indicator = 0";
                        $re = mysql_query($sql);
                        
                        while ($row = mysql_fetch_array($re)) {
                            $infoarr = mysql_fetch_array(mysql_query("SELECT make, model FROM model LEFT JOIN make ON model.make_id = make.make_id WHERE model_id = '{$row['model_id']}'"));
                            
                            echo "<tr id='row_{$row['reservation_id']}'>";
                            
                            echo "<td id='make'>{$infoarr['make']}</td>";
                            echo "<td id='model'>{$infoarr['model']}</td>";
                            echo "<td>{$row['date_reserved']}</td>";
                            echo "<td><button class='btn btn-danger btn-sm' type='button' onclick='cancelRes({$row['reservation_id']})'><i class='fa fa-times'/></button></td>";
                            
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>