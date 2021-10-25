<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Tutorial 5</title>
</head>
<body>
    <div class="file-container container-fluid">
        <?php
            $ROOT_DIR = 'res/';
            echo "<h2>$ROOT_DIR Directory</h2>";
            foreach (glob("$ROOT_DIR*.*") as $file) {
                echo "<ul class='list-group'><li class='list-group-item'>
                <a href='http://localhost:8080/PHPBasic/tutorial5/index.php?
                    file=$file'>$file</a></li></ul>";
            }
        ?>
    </div>
    <div class="content container-fluid">
        <?php

            function println($text) {
                echo $text . "<br>";
            }

            // Check there's POST request
            if (!isset($_GET['file'])) {
                return;
            }

            // Get file name from POST request
            $file = $_GET['file'];
            if ($file == null) {
                return;
            }
            
            $filePtr = fopen($file, "r") or die("Unable to open file!");
            include 'FileParser.php';
            $reader = new FileParser();
            $fileType = pathinfo($file)['extension'];

            println("<b>File Name:</b> $file");
            switch ($fileType) {
                case "txt":
                    $reader::parseTxt($filePtr);
                    break;
                case "csv":
                    $reader::parseCsv($filePtr);
                    break;
                case "xlsx":
                    $reader::parseXlxs($file);
                    break;
                default:
                    println("File Does Support");
                    break;
            }
        ?>
    </div>
</body>
</html>