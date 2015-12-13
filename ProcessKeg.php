<?php
	
	$pageOptions["redirectTo"] = "kegs.php";
	
	include 'include.php';
	
	if(isset($_POST['barcode'])){
		$barcode = $_POST['barcode'];
	}
	else{
		die("Barcode was not entered correctly.");
	}
	
	$sql = "INSERT INTO keg (barcode) VALUES ('$barcode')";
	mysqli_query($con,$sql) or redirect2("Error description: " . mysqli_error($con), "warning");
	
	$sql = "SELECT keg_id FROM keg ORDER BY keg_id DESC LIMIT 1;"; 
	//mysqli_query($con,$sql) or die("Error description: " . mysqli_error($con));
	
				if ($res = mysqli_query($con, $sql)){
		
		
				$row = mysqli_fetch_array($res);
			
				$keg_id = $row['keg_id'];
			
			}
		
	$sql = "INSERT INTO brew_keg (keg_id) VALUES ('$keg_id');";
	mysqli_query($con,$sql) or redirect2("Error description: " . mysqli_error($con), "warning");
	
	redirect2("Successfully added new keg: $barcode", "success");
	die();
?>