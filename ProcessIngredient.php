<?php
	$pageOptions["script"] = true;
	$pageOptions["redirectTo"] = "inventory.php";
	
	include 'include.php';
	
	if(!empty($_POST['name']) && !empty($_POST['type'])){
		$name = $_POST['name'];
		$typeId = $_POST['type'];
	} else {
		die("Ingredient Name Not Entered");
	}
	