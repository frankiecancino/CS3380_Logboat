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
	if(!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) {
		$url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header('Location: ' . $url);
		//exit;
	}
	include 'include.php';
?>
<html>
	<body>
		<meta charset="utf-8">
  		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  		<link rel="stylesheet" href="/resources/demos/style.css">
  		<script>
  		$(function() {
    		$( "#datepicker" ).datepicker();
  		});
		$(function() {
    		$( "#datepicker2" ).datepicker();
  		});
  		</script>
		  
		<div class="container">
			<h4>Select dates</h4>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-2">
					<h5>Start Date:</h5>
				</div>
				<h5>End Date:</h5>
			</div>
			<div class="row">
				<div class="col-md-1"></div>
				<form action="<?=$_SERVER['PHP_SELF']?>"method="POST">
					<div class="col-md-2">
							<div class="form-group">
								<input type="text" class="form-control" name="startdate" id="datepicker">
							</div>
					</div>
					<div class="col-md-2">
							<div class="form-group">
								<input type="text" class="form-control" name="enddate" id="datepicker2">
							</div>
					</div>
					<div class="col-md-1">
							<div class="form-group">
								<input class="btn btn-info" type="submit" name="submit" value="submit" id="button"/>
							</div>
					</div>
				</form>	
			</div>
			<hr>
	<div class='row'>
	<div class='col-sm-8'>
		<h3>Brew Report</h3>
        <div class='table-responsive'>
        	<table class='table'>
            	<tr>
	                <th>ID</th>
	                <th>Name</th>
	                <th>Start Date</th>
					<th>End Date</th>
					<th>Username</th>
	        	</tr> 
				<br>
<?php
	if(isset($_POST['startdate']) && isset($_POST['enddate'])){
			$startdate = date("Y-m-d H:i:s", strtotime($_POST['startdate']));
			$enddate = date("Y-m-d H:i:s", strtotime($_POST['enddate']));
			print $startdate;
			echo" - to - ";
			print $enddate;
		    // Query
    $sql = "SELECT * FROM brew ORDER BY end_date ASC, start_date ASC, beer_name ASC;";
	
    // If query is successful
	if ($res = mysqli_query($con, $sql))
	{	
		$count = 0;
		
		// Loop through all rows
		while ($row = mysqli_fetch_array($res))
		{	

			$rowId = $row['brew_id'];
			$rowName = $row['beer_name'];
			$rowStart = $row['start_date'];
			$rowEnd = $row['end_date'];
			$rowUser = $row['user'];
			
			if ($rowStart >= $startdate && $rowEnd <= $enddate)
			{
	            echo "<tr><td>$rowId</td><td>$rowName</td><td>$rowStart</td><td>$rowEnd</td><td>$rowUser</td></tr>";
				$count++;
			}
		}   
	}
echo "</table></div></div></div>";
echo "<br><p class='text-center'>Total brews: $count</p><br>";
	}
?>
<?php
	if(isset($_POST['startdate']) && isset($_POST['enddate'])){
		        // Query
			$sql = "";
		    $sql = "SELECT * FROM recipe ORDER BY name ASC, ingredient_name ASC;";
		        
		        // If query is successful
			if ($res = mysqli_query($con, $sql)){
				$count = 0;
				echo "<h3>Ingredients Used</h3>";
				// Loop through all rows
				while ($row = mysqli_fetch_array($res)){
					
					$rowName = $row['name'];
					$rowAmount = $row['amount'];
					$rowIngredient = $row['ingredient_name'];
					$rowUnit = $row['unit_name'];
	
						echo "<div class='row'>
							<div class='col-sm-8'>
								<h3>$rowName</h3>
						        <div class='table-responsive'>
						        	<table class='table'>";
						$count++;
					echo "<tr><td>$rowIngredient</td><td>$rowAmount</td><td>$rowUnit</td></tr>";
					
				}
			}
	        echo "</table></div></div></div>";
		}
		include 'footer.php';   
?>
