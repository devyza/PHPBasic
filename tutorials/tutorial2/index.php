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
  
    $input = 5;         // Assign Input value
    $spltr = "&nbsp;";  // Assign splitter value
    $symbl = "*";       // Assign symbol character

    // Draw Upper Triangle
    for ($row = 0; $row < $input+1; $row++) {
      
      // Ouput Space
      for ($col = $input; $col-$row > 0; $col--) {
        echo "<span>$spltr</span>";
      }

      // Ouput Star using (2n + 1) formula
      for ($col = 0; $col < (2 * $row + 1); $col++) {
        echo  "<span>$symbl</span>";
      }

      echo "<br>";
    }

    // Draw Lower Triangle
    for ($row = 0; $row <  $input; $row++) {

      // Output Space
      for ($col = $row + 1; $col > 0; $col--) {
        echo "<span>$spltr<span>";
      }
      // Output Star using (2n - 1) formula
      for ($col = 2 * ($input - $row) - 1; $col > 0; $col-- ) {
          echo "<span>$symbl<span>";
      }

      echo "<br>";
    }
  ?>
</body>
</html>