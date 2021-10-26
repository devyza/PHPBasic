<?php
    require_once("vendor/autoload.php");

    class FileParser {

        /**
         * Parse TXT file into HTML format.
         * 
         * @param $filePtr
         * @return null
         */
        public static function parseTxt($filePtr) {
            while(!feof($filePtr)) {
                echo fgets($filePtr) . "<br>";
            }
        }

         /**
         * Parse CSV file into HTML format.
         * 
         * @param $filePtr
         * @return null
         */
        public static function parseCsv($filePtr) {

            // Set header for first row
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

         /**
         * Parse TXT file into HTML format.
         * 
         * @param $file
         * @return null
         */
        public static function parseXlxs($file) {
            echo SimpleXLSX::parse($file)->toHTML();
        }
    }
?>