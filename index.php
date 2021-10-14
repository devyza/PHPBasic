<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Basic</title>
</head>
<body>
    <?php
        /* Variable */
        echo "<h2>Variable</h2><br>";
        $name = "John Doe";
        echo "Hello, $name<br>";

        /* Data Types */
        echo "<h2>Data Types</h2><br>";
        $intVar = 5;
        $doubleVar = 3.14;
        $stringVar = "Hello World";
        $boolVar = true;
        $arrVar = array("Apple", "Banana", "Orange");

        echo $intVar . "<br>";
        echo $doubleVar . "<br>";
        echo $stringVar . "<br>";
        echo $boolVar . "<br>";
        echo $arrVar[1] . "<br>";

        /* String, Numbers */
        echo "<h2>String, Numbers</h2><br>";
        echo $stringVar[7] . $stringVar[9] . "<br>";

        echo $intVar + $doubleVar . "<br>";
        echo $intVar - $doubleVar . "<br>";
        echo $intVar * $doubleVar . "<br>";
        echo $intVar / $doubleVar . "<br>";

        /* Constants */
        echo "<h2>Constants</h2><br>";
        define("PI", 3.14);
        define("NUMBER_OF_LEG", 4);
        define("TITLE", "Git Basic");

        echo PI . "<br>";
        echo NUMBER_OF_LEG . "<br>";
        echo TITLE . "<br>";
    ?>
</body>
</html>