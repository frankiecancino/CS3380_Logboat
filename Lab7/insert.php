<?php
// Quinton D Miller
// CS3380
// Lab 6
if (isset($_POST['name']) && isset($_POST['district']) && isset($_POST['population']) && isset($_POST['code'])){
  
  // Set variables
  $name = $_POST['name'];
  $district = $_POST['district'];
  $population = $_POST['population'];
  $code = $_POST['code'];
  
  // Establish connection
  $link = mysqli_connect("us-cdbr-azure-central-a.cloudapp.net", "b5cea717424cb3", "e83470c0", "cs3380-qdm8t2") or die("Connect error " . mysqli_error($link));

  // Query
  $query = "INSERT INTO City (Name, District, Population, CountryCode) VALUES (?, ?, ?, ?)";
  
  // Create statement
  $stmt = mysqli_stmt_init($link);
  
  // Prepare statement
  if (!mysqli_stmt_prepare($stmt, $query)){
    die("Unable to prepare statement");
  }
  
  // Bind params
  mysqli_stmt_bind_param($stmt, "ssis", $name, $district, $population, $code);
  
  // Execute statement
  if (mysqli_stmt_execute($stmt)){
    echo "Successfully inserted City";
  }
  else{
    die("Query did not execute correctly: " . mysqli_stmt_error($stmt)); 
  }
  
}
else{
  die("Insertion failed: Not all of the post variables were set"); 
}


?>
<a href='index.php'><button type='button'>Return</button></a>