<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Basic: Control Structures</title>
</head>
<body>
    <?php
        /* If Statement */
        echo "<h2>If Statement</h2><br>";
        $a = 5;
        $b = 2;

        /* Option 1 */
        echo ($a == $b)? "T": "F";
        echo "<br>";

        /* Option 2 */
        if ($a > $b) {
            echo "a is greater";
        } elseif ($a < $b) {
            echo "b is greater";
        } else {
            echo "The Same";
        }
        echo "<br>";
    ?>
</body>
</html>
