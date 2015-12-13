<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Lab 7</title>
  </head>
  <body>
    
<?php

// Quinton D Miller
// CS3380
// Lab 6

// Establish connection
$link = mysqli_connect("us-cdbr-azure-central-a.cloudapp.net", "b5cea717424cb3", "e83470c0", "cs3380-qdm8t2") or die("Connect error " . mysqli_error($link));

// If searching
if ($searching = (isset($_POST["search"]) && isset($_POST["cat"]))){
  
  $category = $_POST["cat"];
  $search_text = $_POST["search"];
  
}

// If inserting into city
if (isset($_POST["insert"])){
  
  // Start form
  echo "<form action='insert.php' method='post'>
          Name: <input type='text' name='name'><br>
          District: <input type='text' name='district'><br>
          Population: <input type='number' name='population'><br>
          Country: <select name='code'>";
  
  // Make drop down box with CountryCodes
  $query = "SELECT Name, Code FROM Country ORDER BY Code ASC";
  $stmt = mysqli_stmt_init($link);
  if (!mysqli_stmt_prepare($stmt, $query)){
    echo "Unable to fetch countries";
    die();
  }
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);  
  while ($row = mysqli_fetch_assoc($result)){
    echo "<option value='",$row["Code"],"'>",$row["Name"],"</option>";
  }
  
  // Finish form
  echo "</select>
        <br><input type='submit' value='Insert'>
        </form>
        <a href='index.php'><button type='button'>Return</button></a>";
  die();
}

// If updating or deleting
if (isset($_POST["action"]) && isset($_POST["category"])){
   
  // Get variables
  $action = $_POST['action'];
  $category = $_POST['category'];
  
  // Updating
  if ($action == "Update"){
    
    // Arrays of what are not editable
    $readOnlyArr = array("Country"         => array("Code", "Name", "Continent", "Region", "SurfaceArea", "LifeExpectancy", "GNP", "GNPOld", "HeadOfState", "Capital", "Code2"),
                         "City"            => array("ID", "Name", "CountryCode"),
                         "CountryLanguage" => array("CountryCode", "Language"));
    
    // Start form
    echo "Update record from the $category table...<br>
          <form action='update.php' method='post'>
          <input type='hidden' name='category' value='$category'>";
          
    // Get fields and if they are editable
    echo "<table border='1'>";
    foreach ($_POST as $n => $v){
      if ($n != "action" && $n != "category"){
        $readOnly = in_array($n, $readOnlyArr[$category]) ? "style='color: #aaa;' readonly" : "";
        echo "<tr><td>$n</td><td><input type='text' name='$n' value='$v' $readOnly></td></tr>";
      }
    }
    echo "</table>";
    
    // Finish form
    echo "<input type='submit' value='Save'></form>";
    
  }
  // Deleting
  else if ($action == "Delete"){
    
    // Query based on what we're deleting
    $query = array("Country"         => "DELETE FROM Country WHERE Code = ? LIMIT 1",
                   "City"            => "DELETE FROM City WHERE ID = ? LIMIT 1",
                   "CountryLanguage" => "DELETE FROM CountryLanguage WHERE Language = ? AND CountryCode = ? LIMIT 1");
    
    // Create statement object
    $stmt = mysqli_stmt_init($link);
    
    // Prepare statement
    if (!mysqli_stmt_prepare($stmt, $query[$category])){
      die("Unable to prepare statement");
    }
    
    // Bind params based on what we're deleting
    if ($category == "Country"){
      mysqli_stmt_bind_param($stmt, "s", $_POST['Code']);
    }
    else if ($category == "City"){
      mysqli_stmt_bind_param($stmt, "i", $_POST['ID']); 
    }
    else if ($category == "CountryLanguage"){
      mysqli_stmt_bind_param($stmt, "ss", $_POST['Language'], $_POST['CountryCode']);
    }
    else{
      die("Impossible category selected"); 
    }
    
    // If statement executes succesfully
    if (mysqli_stmt_execute($stmt)){
      echo "Successfully deleted $category";
    }
    else{
      die("Query did not execute correctly: " . mysqli_stmt_error($stmt)); 
    }
    
  }
  
  echo "<a href='index.php'><button type='button'>Return</button></a>";
  die();
}

?>
    <form action="" method="post">
      <input type="text" name="search" placeholder="Search Text" value="<?php echo $search_text; ?>">
      <br>
      <input type="radio" name="cat" value="Country" <?php if ($category == "Country") echo "checked"; ?> required> Country
      <input type="radio" name="cat" value="City" <?php if ($category == "City") echo "checked"; ?>> City 
      <input type="radio" name="cat" value="CountryLanguage" <?php if ($category == "CountryLanguage") echo "checked"; ?>> Language
      <br><input type="submit" value="Search">
    </form>
    <form action="" method="post">
      <input type="submit" name="insert" value="Insert into City">
    </form>
    
    
<?php

// If user submitted a search
if ($searching){

  // Verify user didn't change the category
  if ($category != "Country" && $category != "City" && $category != "CountryLanguage") die("Incorrect table submitted in form");
  
  // Set search field
  $search_field = "Name";
  if ($category == "CountryLanguage") $search_field = "Language";
  
  // Create query
  $query = "SELECT * FROM `$category`WHERE `$search_field` LIKE CONCAT(?, '%') ORDER BY `$search_field` ASC";
  $stmt = mysqli_stmt_init($link);
  
  // Prepare statement
  if (!mysqli_stmt_prepare($stmt, $query)){
    echo "Failed to prepare statement";
  }
  else{
    // Bind param
    mysqli_stmt_bind_param($stmt, "s", $search_text); 
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    // Create table
    echo mysqli_num_rows($result), " row(s) returned.<br>\n<table border='1'>\n\t<tr>\n<th>Actions</th>";
    foreach(mysqli_fetch_fields($result) as $fi => $f){ echo "\t\t<th>", $f->name, "</th>\n"; $headers[] = $f->name;} // Create field header
    echo "\t</tr>\n";
    while ($row = mysqli_fetch_row($result)){
      echo "\t<tr>\n";
      echo "<form action='' method='post'><td><input type='submit' name='action' value='Update'><input name='action' type='submit' value='Delete'><input type='hidden' name='category' value='$category'></td>";
      for($i = 0; $i < count($row); $i++){ echo "\t\t<td>",current($row),"<input type='hidden' name='",$headers[$i],"' value='",current($row),"'></td>\n"; next($row);}
      echo "</form>";
      echo "\t</tr>\n";
    }
    
  }
  
  // Close statement
  mysqli_stmt_close($stmt);

}

?>
    
  </body>
</html>

<?php
// Close db connection
mysqli_close($link);
?>