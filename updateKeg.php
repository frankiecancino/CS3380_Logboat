<?php
        /*
        * updateKeg.php
        *
        * Description: Update a keg.
        * Authors:     Quinton D Miller
        *
        */		
	$pageOptions["redirectTo"] = "kegs.php";
        
	include 'include.php';
	
	// Check if keg was submitted
	if (isset($_GET['kegId'])){
		
		$kegId = $_GET['kegId'];
		
	}
	else{
		
		die("No Keg Id supplied");
		
	}
	
	// Query
        $sql = "SELECT * FROM brew_keg JOIN keg USING(keg_id) 
                WHERE keg_id = $kegId AND (fill_date IS NULL OR ship_date IS NULL OR return_date IS NULL OR brew_id IS NULL) LIMIT 1";
        
        // If query is successful
        if ($res = mysqli_query($con, $sql)){
        
        	// Loop through all rows
        	while ($row = mysqli_fetch_array($res)){
        	
                        $barcode = $row['barcode'];
        		$fillDate = $row['fill_date'];
                        $brewId = $row['brew_id'];
                        $shipDate = $row['ship_date'];
                        $returnDate = $row['return_date'];
                        $rowId = $row['row_id'];
        		
        	}
        	
        }
        
        /* Determine Keg State */
        // Unfilled Keg
        if ($fillDate == NULL){
?>
<div class='row'>
        <div class='col-sm-6'>
                <h1>Fill Keg : <?php echo $barcode; ?></h1>
                <form action='processUpdateKeg.php' method='POST'>
                        <input type='hidden' name='rowId' value='<?php echo $rowId; ?>'>
                        <input type='hidden' name='kegState' value='0'>
                        <div class='form-group'>
                                <label>Brew Filling With</label>
                                <select name='brewId' class='form-control'>
<?php
                                        // Query
                                        // ToDo: Keep it from selecting unfinished brews (end_date IS NOT NULL)
                                        $sql = "SELECT * FROM brew";
                                        
                                        // If query is successful
                                        if ($res = mysqli_query($con, $sql)){

                                                // Loop through all rows
                                                while ($row = mysqli_fetch_array($res)){

                                                        $brewId = $row['brew_id'];
                                                        $brewName = $row['beer_name'];
                                                        // $endDate = $row['end_date'];
                                                        
                                                        echo "<option value='$brewId'>$brewName</option>";
                                                        
                                                }

                                        }                        
        
?>
                                </select>
                        </div>
                        <div class="form-group">
                                <label>Fill Date</label>
                                <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" name='datetime' required='yes' />
                                        <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                </div>
                        </div>
                        <button type="submit" class="btn btn-info">Add Brew</button>
                </form>
        </div>
</div>
<?php
        }
        // Filled Keg
        else if ($shipDate == NULL){
?>
<div class='row'>
        <div class='col-sm-6'>
                <h1>Ship Keg : <?php echo $barcode; ?></h1>
                <form action='processUpdateKeg.php' method='POST'>
                        <input type='hidden' name='rowId' value='<?php echo $rowId; ?>'>
                        <input type='hidden' name='kegState' value='1'>
                        <div class='form-group'>
                                <label>Shipping To</label>
                                <input type='text' class='form-control' name='location' placeholder='Location' autofocus='yes' required='yes'>
                        </div>
                        <div class="form-group">
                                <label>Ship Date</label>
                                <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" name='datetime' required='yes' />
                                        <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                </div>
                        </div>
                        <button type="submit" class="btn btn-info">Ship</button>
                </form>
        </div>
</div>
<?php
        }
        // Shipped Keg
        else if ($returnDate == NULL){
?>
<div class='row'>
        <div class='col-sm-6'>
                <h1>Receive Keg : <?php echo $barcode; ?></h1>
                <form action='processUpdateKeg.php' method='POST'>
                        <input type='hidden' name='rowId' value='<?php echo $rowId; ?>'>
                        <input type='hidden' name='rowId' value='<?php echo $kegId; ?>'>
                        <input type='hidden' name='kegState' value='2'>
                        <div class="form-group">
                                <label>Return Date</label>
                                <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" name='datetime' required='yes' />
                                        <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                </div>
                        </div>
                        <button type="submit" class="btn btn-info">Receive</button>
                </form>
        </div>
</div>
<?php
        }
        else{
                redirect2("Incorrect state", "warning");                              
        }	
        

?>	