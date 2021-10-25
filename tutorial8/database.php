<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '123456@mysql');
    define('DB_NAME', 'php-training');
    define('RESULT_PER_PAGE', 10);
  
    function getConnection() {
        // Connect to Database
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($conn->connect_error) {
            die("Connection failed" . $conn->connect_error);
        }
        return $conn;
    }
?>