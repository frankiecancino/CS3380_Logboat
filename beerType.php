<?php
        /*
         * beerType.php
         *
         * Description: Allows entry of new beer types. Displays beer types.
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