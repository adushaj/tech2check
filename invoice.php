<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php  
include("connect.php");
$rental = $_GET["rental_id"];

$employeeorstudent = "SELECT employee_id
                    FROM employee
                    WHERE username_id = (SELECT username_id
                                        FROM rental_record
                                        WHERE rental_id = '$rental')";

$check = mysql_query($employeeorstudent);
if (mysql_num_rows($check) > 0){
                                        


$rental_query = "SELECT rr.rental_id, em.first_name, em.last_name, em.street_line_1, em.city, em.state, em.zip_code, checked_out_date, due_date, rr.serial_number, m.model, make.make, type, em.email, em.phone_number
                FROM rental_record rr
                JOIN employee em
                ON rr.username_id = em.username_id
                JOIN equipment e
                ON rr.serial_number = e.serial_number
                JOIN model m
                ON e.model_id = m.model_id
                JOIN make
                ON m.make_id = make.make_id
                JOIN type
                ON m.type_id = type.type_id
                WHERE rental_id = '$rental'";
              
$rental_details = mysql_query($rental_query);
}


else {
    $rental_query = "SELECT rr.rental_id, em.first_name, em.last_name, em.street_line_1, em.city, em.state, em.zip_code, checked_out_date, due_date, rr.serial_number, m.model, make.make, type, em.email, em.phone_number
                FROM rental_record rr
                JOIN student em
                ON rr.username_id = em.username_id
                JOIN equipment e
                ON rr.serial_number = e.serial_number
                JOIN model m
                ON e.model_id = m.model_id
                JOIN make
                ON m.make_id = make.make_id
                JOIN type
                ON m.type_id = type.type_id
                WHERE rental_id = '$rental'";
                
$rental_details = mysql_query($rental_query);
}
while($row = mysql_fetch_array($rental_details)){

?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<img class="img" alt="Brand" src="img/logo.png" height="75"><h3 class="pull-right">Rental# <?php echo "{$row['rental_id']}"; ?></h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Student Information:</strong><br>
    					<?php echo "{$row['first_name']}" . " " . "{$row['last_name']}"; ?><br>
    					<?php echo "{$row['street_line_1']}"; ?><br>
    					<?php echo "{$row['city']}" . ", " . "{$row['state']}" . " " . "{$row['zip_code']}"; ?><br>
    					<?php echo "{$row['phone_number']}"; ?><br>
    					<?php echo "{$row['email']}"; ?>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Checkout Date:</strong><br>
    					<?php echo date('F d, Y', strtotime($row['checked_out_date'])); ?><br><br>
    				</address>
    				<address>
    					<strong>Due Date:</strong><br>
    					<?php echo date('F d, Y', strtotime($row['due_date'])); ?><br><br>
    				</address>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Rental Summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td class="text-center"><strong>Type</strong></td>
        							<td class="text-center"><strong>Serial Number</strong></td>
        							<td class="text-center"><strong>Make</strong></td>
        							<td class="text-center"><strong>Model</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<tr>
    								<td class="text-center"><?php echo "{$row['type']}"; ?></td>
    								<td class="text-center"><?php echo "{$row['serial_number']}"; ?></td>
    								<td class="text-center"><?php echo "{$row['make']}"; ?></td>
    								<td class="text-center"><?php echo "{$row['model']}"; ?></td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    <div class ="row">
        <div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Comments</strong></h3>
    			</div>
    			<div class="panel-body">
    			    <br>
    			    <br>
    			    <br>
    			    <br>
    			    <br>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <em>Renter acknowledges receiving the equipment in good condition, expect as noted above. Renter will return the equipment to owner in good condition expect as noted above. If the equipment is damaged while in renter's possession, renter will be responsible for the cost of repair, up to the current value of the equipment. If the equipment is lost while in the renter's possession, renter will pay owner its current value.
            </em>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="col-xs-6">
                <strong>Student Signature:</strong>
            </div>
    		<div class="col-xs-6">
    			<strong>Date:</strong>	
    		</div>
        </div>
    </div>
</div>
<?php 
}
?>