<?php
    require 'database.php';

    // Get MySQL connection
    $conn = getConnection();

    // Add character information to database, if there's POST request
    if (isset($_POST['btnRegister'])) {
        $query = "INSERT INTO characters (name, house, birth) VALUES
            ('$_POST[name]', '$_POST[cmbHouse]', $_POST[birth])";

        if ($conn->query($query) == true) {
            echo("<script>alert('Character Has Been Added')</script>");
            echo("<script>window.location = 'index.php';</script>");
        }
    }

    // Update character information to database, if there's POST request
    if (isset($_POST['btnUpdate'])) {
        $query = "UPDATE characters SET name='$_POST[name]', house='$_POST[cmbHouse]',
            birth=$_POST[birth] WHERE id=$_POST[id]";

        if ($conn->query($query) == true) {
            echo("<script>alert('Character Has Been Updated')</script>");
            echo("<script>window.location = 'index.php';</script>");
        }
    }

    // Delete character information to database, if there's POST request
    if (isset($_POST['btnDelete'])) {
        $query = "DELETE FROM characters WHERE id=$_POST[id]";

        if ($conn->query($query) == true) {
            echo("<script>alert('Character Has Been Deleted')</script>");
            echo("<script>window.location = 'index.php';</script>");
        }
    }
?>