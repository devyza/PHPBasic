<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
   <title>Tutorial 8</title>
</head>
<body>
   <?php

      $DB_HOST = 'localhost';
      $DB_USER = 'root';
      $DB_PASS = '123456@mysql';
      $DB_NAME = 'php-training';
      $RESULT_PER_PAGE = 10;
      
      // Connect to Database
      $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
      if ($conn->connect_error) {
         die("Connection failed" . $conn->connect_error);
      }

      // Check if the query result is empty or not
      $query = "SELECT * FROM characters";
      $result = mysqli_query($conn, $query);
      if ($result == false) {
         echo "No Data was Found";
         return;
      }

      // Get result count and calcuate for pagination
      $rowCount = mysqli_num_rows($result);
      $numOfPage = $rowCount / $RESULT_PER_PAGE;
      
      // Set Page Number for Pagination
      if (!isset($_GET['page'])) {
         $pageNo = 1;
      } else {
         $pageNo = $_GET['page'];
      }

      // Set data range and get query results
      $offset = ($pageNo - 1) * $RESULT_PER_PAGE;
      $query .= " LIMIT " . $offset . ', ' . $RESULT_PER_PAGE;
      $result = mysqli_query($conn, $query);

      // Show query results with table
      if (mysqli_num_rows($result) > 0) {
         echo "<table>";

         while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            foreach ($row as $value) {
               echo "<td>" . $value . "</td>";
            }
            echo '</tr>';
         }
         echo "</table>";
      }

      // Display page number for pagination system
      for ($pageNo = 1; $pageNo <= $numOfPage; $pageNo++) {
         echo '<a class="pgn" href="index.php?page=' . $pageNo . '">' . $pageNo . '</a>';
      }
   ?>
</body>
</html>