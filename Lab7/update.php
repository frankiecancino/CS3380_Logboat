<?php
// Quinton D Miller
// CS3380
// Lab 6

// Establish connection
$link = mysqli_connect("us-cdbr-azure-central-a.cloudapp.net", "b5cea717424cb3", "e83470c0", "cs3380-qdm8t2") or die("Connect error " . mysqli_error($link));

// Check if variables were all sent
if (isset($_POST['category']) && (
    (isset($_POST['IndepYear']) && isset($_POST['Population']) && isset($_POST['LocalName']) && isset($_POST['GovernmentForm']) && isset($_POST['Code'])) ||
    (isset($_POST['District']) && isset($_POST['Population']) & isset($_POST['ID'])) || 
    (isset($_POST['IsOfficial']) && isset($_POST['Percentage']) && isset($_POST['Language']) && isset($_POST['CountryCode'])))){
  
  $category = $_POST['category'];
  
  // Create query array
  $query = array("Country"         => "UPDATE Country SET IndepYear = ?, Population = ?, LocalName = ?, GovernmentForm = ? WHERE Code = ?",
                 "City"            => "Update City SET District = ?, Population = ? WHERE ID = ?",
                 "CountryLanguage" => "Update CountryLanguage SET IsOfficial = ?, Percentage = ? WHERE Language = ? AND CountryCode = ?");
  
  // Create statement object
  $stmt = mysqli_stmt_init($link);
  
  // Prepare statement
  if (!mysqli_stmt_prepare($stmt, $query[$category])){
    die("Unable to prepare statement");
  }
  
  // Bind params based on category
  if ($category == "Country"){
      
    $indepYear = $_POST['IndepYear'];
    $population = $_POST['Population'];
    $localName = $_POST['LocalName'];
    $governmentForm = $_POST['GovernmentForm'];
    $code = $_POST['Code'];

    if (!is_numeric($indepYear)){
      echo "Error: IndepYear is not valid"; 
    }
    
    if (!is_numeric($population)){
      echo "Error: Population is not valid"; 
    }
    
    mysqli_stmt_bind_param($stmt, "iisss", $indepYear, $population, $localName, $governmentForm, $code);
    
  }
  else if ($category == "City"){
    
    $district = $_POST['District'];
    $population = $_POST['Population'];
    $id = $_POST['ID'];
    
    if (!is_numeric($population)){
      die("Error: Percentage is not valid"); 
    }
    
    if (!is_numeric($id)){
      die("Error: ID is not valid"); 
    }
    
    mysqli_stmt_bind_param($stmt, "sii", $district, $population, $id);
    
  }
  else if ($category == "CountryLanguage"){
      
    $isOfficial = $_POST['IsOfficial'];
    $percentage = $_POST['Percentage'];
    $language = $_POST['Language'];
    $countryCode = $_POST['CountryCode'];
    
    if ($isOfficial != "T" && $isOfficial != "F"){
      die("Error: IsOfficial is not valid"); 
    }
    
    if (!is_numeric($percentage) || ($percentage < 0 || $percentage > 1)){
      die("Error: Percentage is not valid"); 
    }
    
    mysqli_stmt_bind_param($stmt, "sdss", $isOfficial, $percentage, $language, $countryCode);
    
  }
  else{
    die("No such table: $category");
  }
  
  
  // If statement executes succesfully
  if (mysqli_stmt_execute($stmt)){
    echo "Successfully updated $category";
  }
  else{
    die("Query did not execute correctly: " . mysqli_stmt_error($stmt)); 
  }
  
}
else{
  var_dump($_POST);
  die("Not all Post variables were sent");
}

?>
<br><a href='index.php'><button type='button'>Return</button></a>