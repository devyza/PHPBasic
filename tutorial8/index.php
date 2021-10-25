<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/style.css">
   <title>Tutorial 8</title>
</head>
<body>
   <form action="crud.php" method="post">
      <h2>Enter Character Information</h2>
      <div class="form-group">
         <label for="id">ID:</label>
         <input class="form-control" type="text" name="id">
      </div>
      <div class="form-group">
         <label for="name">Name:</label>
         <input class="form-control" type="text" name="name">
      </div>
      <div class="form-group">
         <label for="cmbHouse">House:</label>
         <select class="form-control"name="cmbHouse" required>
            <option value="Gryffindor">Gryffindor</option>
            <option value="Hufflepuff">Hufflepuff</option>
            <option value="Ravenclaw">Ravenclaw</option>
            <option value="Slytherin">Slytherin</option>
         </select>
      </div>
      <div class="form-group">
         <label for="birth">Birth:</label>
         <input class="form-control" type="number" placeholder="YYYY" min="1960" max="2100" name="birth">
      </div>
      <input  class="btn btn-primary" type="submit" value="Register" name="btnRegister">
      <input  class="btn btn-primary" type="submit" value="Update" name="btnUpdate">
      <input  class="btn btn-primary" type="submit" value="Delete" name="btnDelete">
   </form>

   <div class="container-fluid">
      
      <?php
         require 'database.php';
      
         // Get connection
         $conn = getConnection();
         // Check if the query result is empty or not
         $query = "SELECT * FROM characters";
         $result = mysqli_query($conn, $query);
         if ($result == false) {
            echo "No Data was Found";
            return;
         }
         // Get result count and calcuate for pagination
         $rowCount = mysqli_num_rows($result);
         $numOfPage = $rowCount / RESULT_PER_PAGE;
         // Add one page for remainder
         if ($rowCount % RESULT_PER_PAGE > 0) {
            $numOfPage += 1;
         }
      
         // Set Page Number for Pagination
         if (!isset($_GET['page'])) {
            $pageNo = 1;
         } else {
            $pageNo = $_GET['page'];
         }
         // Set data range and get query results
         $offset = ($pageNo - 1) * RESULT_PER_PAGE;
         $query .= " LIMIT " . $offset . ', ' . RESULT_PER_PAGE;
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

         echo "<div class=pgn-box>";
         // Display page number for pagination system
         for ($pageNo = 1; $pageNo <= $numOfPage; $pageNo++) {
            echo '<a class="pgn" href="index.php?page=' . $pageNo . '">' . $pageNo . '</a>';
         }
         echo "</div>"
      ?>
   </div>
   <script src="js/common.js"></script>
</body>
</html>