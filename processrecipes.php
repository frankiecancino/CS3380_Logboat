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
	$pageOptions["script"] = true;
	$pageOptions["redirectTo"] = "recipes.php";
	
	include 'include.php';
	
	// Check post variable
	if (isset($_POST['beername']) && !empty($_POST['beername'])){
		$beername = $_POST['beername'];
	}
	else{
		die("Name of beer not entered.");
	}
	
	if (isset($_POST['ingredient']) && !empty($_POST['ingredient'])){
		$ingredient = $_POST['ingredient'];
	}
	else{
		die("Ingredient not entered.");
	}
	
	if (isset($_POST['unit']) && !empty($_POST['unit'])){
		$unit = $_POST['unit'];
	}
	else{
		die("Unit not entered.");
	}
	
	if (isset($_POST['amount']) && !empty($_POST['amount'])){
		$amount = $_POST['amount'];
	}
	else{
		die("Amount not entered.");
	}
	
	// Query
	$sql = "INSERT INTO recipe (name, amount, ingredient_name, unit_name) VALUES ('$beername', '$amount', '$ingredient', '$unit');";
	
	// Execute
	mysqli_query($con, $sql) or die("Error: " . mysqli_error($con));
	
	redirect2("Successfully Added an Ingredient to $beername", "success");
	
	//header("Location: recipes.php");
?>