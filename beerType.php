<?php
        /*
         * beerType.php
         *
         * Description: Allows entry of new beer types. Displays beer types.
         * Authors:     Quinton D Miller
         *
         */	
        include 'include.php';
        
        if ($isAdmin){
?>
                
<div class='row'>
        <div class='col-sm-6'>
                <h1>New Beer Type</h1>
                <form action='processNewBeerType.php' method='POST'>
                        <div class='form-group'>
                                <label>Beer Type</label>
                                <input type='text' name='type' placeholder='Type' class='form-control' required='yes' autofocus='yes'>
                        </div>
                        <button type="submit" class="btn btn-info">Submit</button>
                </form>
        </div>
</div>

<?php } ?>
<div class='row'>
        <div class='col-sm-6'>
        	<h1>Beer Types</h1>
                <div class='table-responsive'>
                        <table class='table'>
                                <tr>
                                        <th>Type</th>
                                </tr> 
<?php
        
        // Query
        $sql = "SELECT * FROM beer_type ORDER BY type_id DESC";
        
        // If query is successful
	if ($res = mysqli_query($con, $sql)){
		
		// Loop through all rows
		while ($row = mysqli_fetch_array($res)){
			
			$rowType = $row['type'];
			$rowId = $row['type_id'];
			
                        echo "<tr><td>$rowType</td></tr>";
			
		}
		
	}
        
        
        echo "</table</div></div></div>";
        include 'footer.php';        
?>