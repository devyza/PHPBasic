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

        /* Switch Statement */
        echo "<h2>Switch Statement</h2><br>";
        $num = rand(64, 66);

        echo "Decimal " . $num . "<br>";
        switch($num) {
            case 64:
                echo "Your ASCII value is a";
                break;
            case 65:
                echo "Your ASCII value is b";
                break;
            case 66:
                echo "Your ASCII value is c";
                break;
            default:
                echo "Nothing";
        }
        echo "<br>";
    ?>
</body>
</html>
