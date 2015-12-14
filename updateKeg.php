<?php
        /*
        * updateKeg.php
        *
        * Description: Update a keg.
        * Authors:     Quinton D Miller
        *
        */
         /*Copyright (c) 2015 Frankie Cancino, Quinton Miller, Trent Broeker, Sydney Bates, Matt Haruza



Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:



The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.



THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.  IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/		
	$pageOptions["redirectTo"] = "kegInfo.php?kegId=" . $_GET['kegId'];
        
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
        <div class='col-sm-12'>
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
                                <div class='input-group date' id='datetimepicker'>
                                        <input type='text' class="form-control" name='datetime' required='yes' id='datePicker' />
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
        <div class='col-sm-12'>
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
                                <div class='input-group date' id='datetimepicker'>
                                        <input type='text' class="form-control" name='datetime' required='yes' id='datePicker'/>
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
        <div class='col-sm-12'>
                <h1>Receive Keg : <?php echo $barcode; ?></h1>
                <form action='processUpdateKeg.php' method='POST'>
                        <input type='hidden' name='rowId' value='<?php echo $rowId; ?>'>
                        <input type='hidden' name='kegId' value='<?php echo $kegId; ?>'>
                        <input type='hidden' name='kegState' value='2'>
                        <div class="form-group">
                                <label>Return Date</label>
                                <div class='input-group date' id='datetimepicker'>
                                        <input type='text' class="form-control" name='datetime' required='yes' id='datePicker'/>
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
<script>
$(function() {
	$("#datetimepicker").datetimepicker();
});
</script>