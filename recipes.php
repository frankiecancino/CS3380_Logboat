<?php
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
?>

<div class='row'>
        <div class='col-sm-10'>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addRecipeModal">
                  Create Recipe
                </button>
                <!-- Modal -->
                <div class="modal fade" id="addRecipeModal" tabindex="-1" role="dialog" aria-labelledby="lblModal">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Create Recipe</h4>
                      </div>
                      <div class="modal-body">
                        <form action='processrecipes.php' method='POST'>
                                <div class="form-group">
									<label>Beer Name</label>
								<select type="text" class="form-control" name="beername">
									<?php
										//Query
										$sql = "SELECT * FROM beer;";
                                
                                		// If query is successful
                        				if ($res = mysqli_query($con, $sql)){
                        		
                        					// Loop through all rows
                        					while ($row = mysqli_fetch_array($res)){
                                                
                                                $rowTypeId = $row['beer_id'];
                                                $rowType = $row['beer_name'];
                                                echo "<option value='$rowType'>$rowType</option>";
                        					}
                               			}
									?>
								</select>
							</div>
                        	<div class='form-group'>
                                <label>Ingredient</label>
        						<select class="form-control" name="ingredient" required>
									<?php
										//Query
										$sql = "SELECT * FROM ingredient;";
                                
                                		// If query is successful
                        				if ($res = mysqli_query($con, $sql)){
                        		
                        					// Loop through all rows
                        					while ($row = mysqli_fetch_array($res)){
                                                
                                                $rowTypeId = $row['ingredient_id'];
                                                $rowType = $row['ingredient_name'];
                                                echo "<option value='$rowType'>$rowType</option>";
                        					}
                               			}
									?>
								</select>
                        </div>
						<div class="form-group">
							<label>Unit</label>
							<select class="form-control" name="unit" required>
								<?php
									//Query
									$sql = "SELECT * FROM unit;";
                            
                            		// If query is successful
                    				if ($res = mysqli_query($con, $sql)){
                    		
                    					// Loop through all rows
                    					while ($row = mysqli_fetch_array($res)){
                                            
                                    		$rowTypeId = $row['unit_id'];
                                        	$rowType = $row['unit_type'];
                                        	echo "<option value='$rowType'>$rowType</option>";
                    					}
                           			}	
								?>
							</select>
						</div>
						<div class="form-group">
							<label>Amount</label>
							<input type="number" step=".01" min="0" class="form-control" name="amount" required>
						</div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add to Recipe</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
        </div>
</div>

<br>
<div class='row'>
	<div class='col-sm-4'>
		<h1>Beers</h1>
        <div class='table-responsive'>
        	<table class='table'>
				
		<?php
		        // Query
		        $sql = "SELECT * FROM recipe ORDER BY name ASC, ingredient_name ASC;";
		        
		        // If query is successful
			if ($res = mysqli_query($con, $sql)){
				
				$tempName = $row['name'];
				$count = 0;
				
				// Loop through all rows
				while ($rowName == $tempName && $row = mysqli_fetch_array($res)){
					
					$rowName = $row['name'];
					$rowAmount = $row['amount'];
					$rowIngredient = $row['ingredient_name'];
					$rowUnit = $row['unit_name'];
					
					if ($tempName != $rowName)
					{
						echo "</table></div></div></div>";
						
						echo "
						<div class='row'>
							<div class='col-sm-4'>
								<h2>$rowName</h2>
						        <div class='table-responsive'>
						        	<table class='table'>";
						$count++;
					}
					
					echo "<tr><td>$rowIngredient</td><td>$rowAmount</td><td>$rowUnit</td></tr>";
					//echo "$rowIngredient: $rowAmount $rowUnit<br>";
					//echo "Name: $rowName<br> Ingredient: $rowIngredient<br> Amount: $rowAmount<br> Unit: $rowUnit<br><br>";
					
					$tempName = $row['name'];
				}
			}
		        
	        echo "</table></div></div></div>";
			echo "<br><p class='text-center'>Total beers: $count</p><br>";
	        include 'footer.php';        
		?>