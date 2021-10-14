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
    ?>
</body>
</html>