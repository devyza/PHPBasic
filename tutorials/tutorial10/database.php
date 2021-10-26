<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '123456@mysql');
    define('DB_NAME', 'php-training');
  
    // Connect to Database
    $CONN = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($CONN->connect_error) {
        die("Connection failed" . $CONN->connect_error);
    }
?>