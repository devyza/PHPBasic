<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Age</title>
</head>
<body>
    <?php
        // Get Current's Date
        $currentDate = new DateTime();

        /* 
            Get DOB from POST Request and convert it into DateTime object
            Then get differences between current date and DOB
        */
        $diffDate = $currentDate->diff(new DateTime( $_POST['dob']));

        // Get number of year from two different dates
        echo "Your Age is: " . $diffDate->y;
    ?>
</body>
</html>