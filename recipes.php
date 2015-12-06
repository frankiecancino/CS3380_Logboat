<?php
	include 'include.php';
?>
		<div class="container">
			<h3>Make a new recipe (one ingredient at a time)</h3>
			<div class="row">
				<div class="col-md-1"></div>
					<form action="processrecipes.php" method="POST">
					<div class="col-md-2">
						<h5>Beer Name:</h5>
					</div>
					<div class="col-md-2">
						<h5>Ingredient:</h5>
					</div>
					<div class="col-md-2">
						<h5>Unit:</h5>
					</div>
					<div class="col-md-2">
						<h5>Amount:</h5>
					</div>
				</div>
				<div class="row">
					<div class="col-md-1"></div>
						<div class="col-md-2">
							<div class="form-group">
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
						</div>
						<div class="col-md-2">
							<div class="form-group">
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
						</div>
						<div class="col-md-2">
							<div class="form-group">
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
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<input type="number" step=".01" min="0" class="form-control" name="amount" required>
							</div>
						</div>
						<div class="col-md-1">
							<div class="form-group">
								<input class="btn btn-info" type="submit" name="submit" value="submit" id="button"/>
							</div>
						</div>
			</form>	
		</div>
		<div class='row'>
		        <div class='col-sm-12'>
		        	<h1 class="text-center">Recipes</h1>
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
						echo "<h2>$rowName</h2>";
						$count++;
					}
					
					echo "$rowIngredient: $rowAmount $rowUnit<br>";
					//echo "Name: $rowName<br> Ingredient: $rowIngredient<br> Amount: $rowAmount<br> Unit: $rowUnit<br><br>";
					
					$tempName = $row['name'];
				}
				echo "<br><p class='text-center'>Total beers: $count</p>";
			}
		        
		        echo "</div></div>";
		        include 'footer.php';        
		?>
	</body>
</html>