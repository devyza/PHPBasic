<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Out</title>
</head>
<body>    
    <h2>Bye Bye</h2>
    <form action="index.php" method="post"><input type="submit" value="Go to Login Page"></form>
    <?php
        session_unset();    // Remove all variable from session
        session_destroy();  // Destory the session
    ?>
</body>
</html>