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

            $ROW_MAX = 8;
            $COLUMN_MAX = 8;

            for ($row = 0; $row < $ROW_MAX; $row++) {
                echo "<tr>";
                    for ($col=0; $col < $COLUMN_MAX; $col++) {
                        /* 
                            $row must also be calculate to prevent 
                            from color reset.
                            Example:    ($row=1 + $col=2) % 2 = 1
                                        ($row=0 + $col=8) % 2 = 0
                        */
                        if (($col + $row) % 2) {
                            $class = "white";
                        } else {
                            $class = "black";
                        }

                        // Assign class name into table column.
                        echo "<td class=$class></td>";
                    }
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>