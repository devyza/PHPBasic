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
    $input = 5;
    for ($row=0; $row < $input; $row++) {

      for ($col = $input+1; $col > $input-$row; $col--) {
        echo "<span>x</span>";
      }

      for ($col = 0; $col < (2 * $row + 1); $col++) {
        echo  "<span>*</span>";
      }
      echo "<br>";
    }
  ?>

</body>
</html>