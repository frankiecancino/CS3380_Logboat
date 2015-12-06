<?
	$pageOptions["script"] = true;
	$pageOptions["redirectTo"] = "inventory.php";
	
	include 'include.php';
	
	if(!empty($_POST['name'])){
		$name = $_POST['name'];
	} else {
		die("Unit Type Not Entered");
	}
	
	$sql = "INSERT INTO unit (unit_type) VALUES ('$name');";
	
	mysqli_query($con, $sql) or die("Error description: " . mysqli_error($con));
	
	redirect2("Successfully Added Unit: $name", "success");
	
?>