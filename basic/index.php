<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <title>PHP Basic: </title>
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

        /* Math */
        echo "<h2>Math</h2><br>";
        echo "Absolute: " . abs(-999) . "<br>";
        echo "Hypotenuse: " . hypot(3, 2) . "<br>";
        echo "Pi Value: " . pi() . "<br>";
        echo "Power " . pow(2, 6) . "<br>";
        echo "Random Value: " . rand(1, 6) . "<br>";
        echo "Round a Number: " . round(0.5) . "<br>";
        echo "Square Root: " . sqrt(16) . "<br>";

        /* Arrays */
        echo "<h2>Array</h2><br>";
        $idxArr = [5, true, 1, 2, "A", 67]; //Indexed Array
        echo $idxArr[3] . "<br>";
        echo min($idxArr) . "<br>";
        echo max($idxArr) . "<br>";

        $assArr = [
            "Apple" => "3",
            "Banana" => "2",
            "Orange" => "5"
        ];  // Associated Array     
        echo $assArr['Orange'] . "<br><br>";
        
        $mulArr = [
            ["Mg Mg", 20, "IT"],
            ["Ma Ma", 21, "HR"],
            ["Aye Aye", 22, "Admin"]
        ]; // Multidimensional Array

        foreach ($mulArr as $person) {
            foreach($person as $i) {
                echo $i . "<br>";
            }
            echo "<br>";
        }

        /* Sorting Array */
        echo "<h2>Sorting Array</h2><br>";

        /* Sorting Indexed Array */
        function printArr($arr) {
            foreach ($arr as $i) {
                echo $i . " ";
            }
            echo "<br>";
        }

        sort($idxArr);      // Sort in Acending Order
        printArr($idxArr);

        rsort($idxArr);     // Sort in Decending Order
        printArr($idxArr);  // ???

        $arr = [1, 6, 3, 4, 5];
        rsort($arr);
        printArr($arr);

        
        /* Sorting Accociated Array */
        function printAssArr($arr) {
            foreach($arr as $i => $i_value) {
                echo "Key=" . $i . " Value=" . $i_value . "<br>";
            }
            echo "<br>";
        }

        ksort($assArr);     // Sort in Acending Order by Key
        printAssArr($assArr);

        krsort($assArr);     // Sort in Decending Order by Key
        printAssArr($assArr);

        asort($assArr);    // Sort in Acending Order by Value
        printAssArr($assArr);

        arsort($assArr);    // Sort in Decending Order by Value
        printAssArr($assArr);
    ?>
</body>
</html>