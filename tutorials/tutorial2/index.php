<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Tutorial 2</title>  
</head>
<body>
  <?php
  
    // Assign Input
    $input = 5;

    // Draw Upper Triangle
    for ($row=0; $row < $input; $row++) { 
      
      // Ouput Space
      for ($col = $input; $col-$row-1 > 0; $col--) {
        echo "<span>&nbsp;</span>";
      }

      // Ouput *
      for ($col = 0; $col < (2 * $row + 1); $col++) {
        echo  "<span>*</span>";
      }

      echo "<br>";
    }

    // Draw Lower Triangle
    for ($row = 0; $row < $input-1; $row++) {

      // Output Sapce
      for ($col = 0; $col < $row+1; $col++) {
        echo "<span>&nbsp;<span>";
      }

      // Output *
      for ($col = $input; $col - (2* $row - 1) >= 0; $col--) {
        echo  "<span>*</span>";
      }

      echo "<br>";
    }

  ?>

</body>
</html>