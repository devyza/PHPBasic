<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <?php
        $UNAME_DEFAULT = "johndoe";
        $PWD_DEFAULT = "12345";

        session_start();

        // Check whether the user is logged in or not
        if (isset($_SESSION['logged_in'])) {
            echo "<h2>Welcome " . $_SESSION['uname'] . "</h2>";
        } 
        else {
            // Match Username and Password, if not redirect to index page
            if ($UNAME_DEFAULT == $_POST['username'] && $PWD_DEFAULT == $_POST['password']) {
                $_SESSION['uname'] = $_POST['username'];
                echo "<h2>Welcome " . $_SESSION['uname'] . "</h2>";
            }
            else {
                echo "<script>alert('Incorrect Username and Password')</script>";
                echo "<script>window.location.href = 'index.php'</script>";
            }
        }
    ?>
    <form action="logout.php" method="post">
        <input type="submit" value="Logout">
    </form>
</body>
</html>