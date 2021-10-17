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
        /**
         * Calculate the user's age
         * 
         * @param $dateOfBirth
         * @return integer
         */
        function calculateAge($dateOfBirth){
            return (new DateTime())->diff($dateOfBirth)->y;
        }

        // Calculate user's DOB from post request
        $dateOfBirth = new DateTime($_POST['dob']);
        echo "Year Age is: " . calculateAge($dateOfBirth);
    ?>
</body>
</html>