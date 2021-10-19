<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Tutorial 5</title>
</head>
<body>
    <form action="#" method="post">
        <label for="file">Choose a File: </label>
        <input type="file" name="file">
        <input type="submit">
    </form>
    <div id="content">
        <?php
            include 'FileParser.php';

            function println($text) {
                echo $text . "<br>";
            }

            // Assign absolute file path
            $ABSOLUTE_PATH = "res/";

            // Check there's POST request
            if (!isset($_POST['file'])) {
                return;
            }
            // Get file name from POST request
            $file = $_POST['file'];
            if ($file == null) {
                return;
            }

            $filePath = realpath($ABSOLUTE_PATH . $file);
            $filePtr = fopen($filePath, "r") or die("Unable to open file!");
            
            $reader = new FileParser();
            $fileType = pathinfo($filePath)['extension'];

            switch ($fileType) {
                case "txt":
                    $reader::parseTxt($filePtr);
                    break;
                case "csv":
                    $reader::parseCsv($filePtr);
                    break;
                case "xlsx":
                    $reader::parseXlxs($filePath);
                    break;
                default:
                    println("File Does Support");
                    echo $fileType;
                    break;
            }
        ?>
    </div>
</body>
</html>