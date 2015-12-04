<?php
	
	include 'include.php';
	
	if(isset($_POST['barcode'])){
		$barcode = $_POST['barcode'];
	}
	else{
		die("Barcode was not entered correctly.");
	}
	//SELECT sum(price) FROM table2 INNER JOIN table1 ON table2.id = table1.theid WHERE table1.user_id = 'my_id'
	
	$sql = "SELECT * FROM brew_keg INNER JOIN keg ON brew_keg WHERE keg.barcode = '$barcode'";
	mysqli_query($con,$sql) or die("Error description: " . mysqli_error($con));
	
?>