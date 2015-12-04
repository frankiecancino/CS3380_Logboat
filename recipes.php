<?php
	include 'include.php';
?>

<html>
	<head>
		<title>Brew</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>
	<body>
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
					<form action="<?=$_SERVER['PHP_SELF']?>"method="POST">
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
                                                echo "<option value='$rowTypeId'>$rowType</option>";
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
                                                $rowType = $row['name'];
                                                echo "<option value='$rowTypeId'>$rowType</option>";
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
                                            	echo "<option value='$rowTypeId'>$rowType</option>";
                        					}
                               			}	
									?>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<input type="number" class="form-control" name="amount" required>
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
		        <div class='col-sm-6'>
		        	<h1>Recipes</h1>
		<?php
		        // Query
		        $sql = "SELECT * FROM recipe;";
		        
		        // If query is successful
			if ($res = mysqli_query($con, $sql)){
				
				// Loop through all rows
				while ($row = mysqli_fetch_array($res)){
					
					$rowName = $row['name'];
					$rowAmount = $row['amount'];
					$rowIngredient = $row['ingredient_id'];
					$rowUnit = $row['unit_id'];
					
					// Query
		        	//$result = "SELECT beer_name FROM beer WHERE beer_id='$rowName';";
					//if ($res = mysqli_query($con, $result)){
						
					//}
					
		            echo "Name: $rowName<br> Ingredient: $rowIngredient<br> Amount: $rowAmount<br> Unit: $rowUnit<br><br>";
				}
			}
		        
		        echo "</div></div>";
		        include 'footer.php';        
		?>
	</body>
</html>