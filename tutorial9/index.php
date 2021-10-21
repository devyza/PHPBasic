<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '123456@mysql');
    define('DB_NAME', 'php-training');
    define('RESULT_PER_PAGE', 10);

    function convertToArray($result) {

        $rows = mysqli_fetch_all($result);

        $i = 0;
        while ($i < $result->num_rows) {
            echo '["' .  $rows[$i][0] . '", ' . $rows[$i][1] . "]";
            if ($i != $result->num_rows-1) {
                echo ',';
            }
            $i++;
        }
    }
    
    // Connect to Database
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) {
       die("Connection failed" . $conn->connect_error);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tutorial 9</title>
</head>
<body>
    <div id="chrtPie"></div>
    <div id="chrtLine"></div>
    <script src="js/loader.js"></script>
    <script>
        // Load the current library release
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawPieChart);
        google.charts.setOnLoadCallback(drawLineChart);

        function drawPieChart() {

            // Convert Array to DataTable to dispaly
            var data = google.visualization.arrayToDataTable([
                ['House', 'Number of Character'],
                // Load query from MySQL Database
                <?php
                    $query = "SELECT house, COUNT(id) as total FROM characters
                        GROUP BY house
                        ORDER BY house;";
                    convertToArray(mysqli_query($conn, $query));
                ?>
            ]);

            // Set options for Pie Chart
            var options = {
                title: 'Total Number of Characters by Houses',
                slices: {0: {color: '#DC3912'}, 1: {color: '#FF9900'}, 2: {color: '#3366CC'}},
                is3D: true,
                width: 1000,
                height: 500
            };

            // Draw Pie chart
            var chart = new google.visualization.PieChart(document.getElementById('chrtPie'));
            chart.draw(data, options);
        }

        function drawLineChart() {

            // Convert Array to DataTable to dispaly
            var data = google.visualization.arrayToDataTable([
                ['House', 'Number of Character'],
                // Load query from MySQL Database
                <?php
                    $query = "SELECT birth, COUNT(id) FROM characters
                    GROUP BY birth ORDER BY birth;";
                    convertToArray(mysqli_query($conn, $query));
                ?>
            ]);

            // Set options for Line Chart
            var options = {
                title: 'Total Number of Character by Birth Year',
                width: 1000,
                height: 600
            };

            // Draw Line chart
            var chart = new google.visualization.LineChart(document.getElementById('chrtLine'));
            chart.draw(data, options);
        }
    </script>
</body>
</html>