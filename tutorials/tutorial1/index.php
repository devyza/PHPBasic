<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Tutorial 1</title>
</head>
<body>
    <table class="tbl-chess">
        <?php
            for ($row = 0; $row < 8; $row++) {
                echo "<tr>";
                    for($col=0; $col < 8; $col++) {
                        $class = ($col+$row) % 2 ? "white" : "black";
                        echo "<td class=$class></td>";
                    }
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>