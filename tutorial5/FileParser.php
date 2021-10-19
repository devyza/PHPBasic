<?php
    require_once("vendor/autoload.php");

    class FileParser {

        public static function parseTxt($filePtr) {
            while(!feof($filePtr)) {
                echo fgets($filePtr) . "<br>";
            }
        }

        public static function parseCsv($filePtr) {
            $isHeader = true;

            echo "<table>";
            while (!feof($filePtr)) {
                echo "<tr>";
                $dataColumn = explode(',', fgets($filePtr));

                if ($isHeader == true) {
                    $tag = "th";
                    $isHeader = false;
                } else {
                     $tag = "td";
                }

                foreach ($dataColumn as $data) {
                    echo "<" . $tag . ">" .$data . "</" . $tag . ">";
                }

                echo "</tr>";
            }
            echo "</table>";
        }

        public static function parseXlxs($file) {
            echo SimpleXLSX::parse($file)->toHTML();
        }
    }
?>