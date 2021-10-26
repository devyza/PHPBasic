<?php
    if(isset($_GET['email']) && isset($_GET['token']) ) {

        require 'database.php';
        $email = $_GET['email'];
        $token = $_GET['token'];

        // Check if the email is exist on database
        // Check if the token is expired or not  
        if (($CONN->query("SELECT id FROM users WHERE email='$email' AND 
        token='$token' AND token<>'' AND tokenExpire > NOW()"))->num_rows == 0) {
        echo "Token Has Been Expired";
            return;
        }
    } else {
        return;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <form action="#" method="post">
        <label for="txtPassword">Password:</label>
        <input type="password" name="txtPassword" required>
        <label for="txtConfirmPassword">Confirm Password:</label>
        <input type="password" name="txtConfirmPassword" required><br>
        <input type="submit" value="submit">
    </form>
    <?php
        // Check if confirm password is match with the previous password
        if ($_POST['txtPassword'] != $_POST['txtConfirmPassword']) {
            echo "Password Does Not Match";
            return;
        }

        // Update password to database and reset token
        $sql = "UPDATE users SET password='$_POST[txtPassword]', token='' WHERE email='$email';";
        if ($CONN->query($sql) == true) {
            echo "Password Reset Successfully";
        } else {
            echo "Password Reset Error";
        }
    ?>
</body>
</html>