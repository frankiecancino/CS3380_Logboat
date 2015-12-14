<?php
        /*
         * beer2.php
         *
         * Description: Allows entry of new beers. Displays beers.
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
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBeerModal">
                  Add Beer
                </button>
                <!-- Modal -->
                <div class="modal fade" id="addBeerModal" tabindex="-1" role="dialog" aria-labelledby="lblModal">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add Beer</h4>
                      </div>
                      <div class="modal-body">
                        <form action='processNewBeer.php' method='POST'>
                                <div class='form-group'>
                                        <label>Beer Name</label>
                                        <input type='text' name='name' placeholder='Name' class='form-control' required='yes' autofocus='yes'>
                                </div>
                                <div class='form-group'>
                                        <label>Beer Type</label>
        				<select name='type' class='form-control'>
        				<?php
                                                
        				//Query
        				$sql = "SELECT * FROM beer_type ORDER BY type;";
                                        
                                        // If query is successful
                                	if ($res = mysqli_query($con, $sql)){
                                		
                                		// Loop through all rows
                                		while ($row = mysqli_fetch_array($res)){
                                                        
                                                        $rowTypeId = $row['type_id'];
                                                        $rowType = $row['type'];
                                                        
                                                        echo "<option value='$rowTypeId'>$rowType</option>";
                                			
                                		}
        
                                       }	
        					
        				?>	
        				</select>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Beer</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
        </div>
</div>
<?php } ?>
<div class='row'>
        <div class='col-sm-6'>
        	<h1>Beers</h1>
                <div class='table-responsive'>
                        <table class='table'>
                                <tr>
                                        <th>Name</th>
                                        <th>Type</th>
                                </tr> 

<?php
        
        // Query
        $sql = "SELECT * FROM beer JOIN beer_type ON beer.beer_type_id=beer_type.type_id ORDER BY beer_id DESC";
        
        // If query is successful
	if ($res = mysqli_query($con, $sql)){
		
		// Loop through all rows
		while ($row = mysqli_fetch_array($res)){
			
			$rowBeerName = $row['beer_name'];
                        $rowBeerType = $row['type'];
			
                        echo "<tr><td>$rowBeerName</td><td>$rowBeerType</td></tr>";
			
		}
                
	}
        
        
        echo "</table></div></div></div>";
        include 'footer.php';        
?>