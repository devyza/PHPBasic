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

        /* Operators */
        echo "<h2>Operators</h2><br>";
        echo (100 == "100") . "<br>";   // Equal
        echo (100 <> "10") . "<br>";    // Not Equal
        echo (100 === "100") . "<br>";  // Identical
        echo (2 <=> 2) . "<br>";        // Spaceship

        /* String Operator */
        echo "<h3>String Operator</h3><br>";
        echo "Hello " . "World<br>";    // Concatenatioin
        
        $text1 = "AAA";
        $text2 = "BBB";
        echo $text1 .= $text2;          // Concatenation Assignment

        /* Conditional Assignment Operator */
        echo "<h3>Conditional Assignment Operator</h3><br>";
        $name = null;
        echo $user = (($name == null)? "Anomyous" : $name) . "<br>";   // Ternary
        echo $user = ($name ?? "John Doe") . "<br>";                   // Null coalescing

        /* Loops */
        echo "<h2>Loops</h2><br>";

        /* While Loop */
        $i = 0;
        while ($i < 3) {
            printf("Statement in While Loop: %d<br>", ++$i);
        }
        echo "<br>";

        /* Do While Loop */
        $i = 0;
        do {
            printf("Statemnt in Do While Loop: %d<br>", ++$i);
        } while ($i < 3);
        echo "<br>";

        /* For Loop Statement */
        for ($i = 0; $i < 3; $i++) {
            printf("For Loop Statement: %d<br>", $i + 1);
        }
        echo "<br>";

        /* Foreach Loop */
        $arr = ["Apple", "Banana", "Orange"];
        foreach ($arr as $i) {
            printf("$i<br>");
        }
        echo "<br>";

        /* Break and Continue */
        $i = 0;
        while (true) {
            if ($i == 5) {
                break;
            }
            if ($i == 3) {
                $i++;
                continue;
            } 
            printf("While Loop %d<br>", $i);     
            $i++;
        }
        echo "<br>";
    ?>
</body>
</html>
