<?php
include("connect.php");
?>
<!--<form class="row" action="push/checkinpush.php" method="post">-->
    	<div class="col-md-9">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Currently Checked Out</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td class="text-center"><strong>Make</strong></td>
        							<td class="text-center"><strong>Model</strong></td>
        							<td class="text-center"><strong>Serial Number</strong></td>
        							<td class="text-center"><strong>Due Date</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							              <?php 
                                              $username_id = $_SESSION['username_id'];
                                                $checkedoutList = "SELECT rr.rental_id, rr.serial_number, rr.due_date, make.make, m.model
                                                    FROM rental_record rr
                                                    JOIN equipment e
                                                    ON rr.serial_number = e.serial_number
                                                    JOIN model m
                                                    ON e.model_id = m.model_id
                                                    JOIN make
                                                    ON m.make_id = make.make_id
                                                    JOIN type
                                                    ON m.type_id = type.type_id
                                                    WHERE rr.username_id = '$username_id' AND
                                                    rr.date_returned = '0000-00-00 00:00:00'
                                                    ORDER BY date(rr.due_date)";
                                                    
                                                $checkedout = mysql_query($checkedoutList);
                                                
                                                while($row = mysql_fetch_array($checkedout)){ 
                                                echo "<tr>";    
                								echo "<td class=\"text-center\">{$row['make']} </td>";
                								echo "<td class=\"text-center\">{$row['model']} </td>";
                								echo "<td class=\"text-center\">{$row['serial_number']} </td>";
                								echo "<td class=\"text-center\">" . date('F d, Y', strtotime($row['due_date'])) . " </td>";
                								echo "</tr>";
    								} ?>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="col-md-9">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Rental History</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td class="text-center"><strong>Make</strong></td>
        							<td class="text-center"><strong>Model</strong></td>
        							<td class="text-center"><strong>Serial Number</strong></td>
        							<td class="text-center"><strong>Returned Date</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							              <?php 
                                              $username_id = $_SESSION['username_id'];
                                                $checkedoutList = "SELECT rr.rental_id, rr.serial_number, rr.date_returned, make.make, m.model
                                                    FROM rental_record rr
                                                    JOIN equipment e
                                                    ON rr.serial_number = e.serial_number
                                                    JOIN model m
                                                    ON e.model_id = m.model_id
                                                    JOIN make
                                                    ON m.make_id = make.make_id
                                                    JOIN type
                                                    ON m.type_id = type.type_id
                                                    WHERE rr.username_id = '$username_id' AND
                                                    rr.date_returned != '0000-00-00 00:00:00'
                                                    ORDER BY date(rr.date_returned) DESC";
                                                    
                                                $checkedout = mysql_query($checkedoutList);
                                                
                                                while($row = mysql_fetch_array($checkedout)){ 
                                                echo "<tr>";    
                								echo "<td class=\"text-center\">{$row['make']} </td>";
                								echo "<td class=\"text-center\">{$row['model']} </td>";
                								echo "<td class=\"text-center\">{$row['serial_number']} </td>";
                								echo "<td class=\"text-center\">" . date('F d, Y', strtotime($row['date_returned'])) . " </td>";
                								echo "</tr>";
    								} ?>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>

<!--</form>-->