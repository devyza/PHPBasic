<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tutorial 7</title>
</head>
<body>
   <form action="#" method="post" enctenctype="multipart/form-data">
      <label for="txtInput">Enter Your Input</label>
      <input type="text" name="txtInput" required>
      <input type="submit" value="Generate QR" name="submit"><br>

      <?php
         include  'phpqrcode/qrlib.php';
         $ROOT_DIR = 'img/';

         // Check if there's POST request
         if (!isset($_POST['submit'])) {
            return;
         }

         // Check whether root directory exist or not
         if (!is_dir($ROOT_DIR)) {
            mkdir($ROOT_DIR);
         }

         // Generate QR code from user input
         $fileName = $ROOT_DIR.uniqid().".png";
         QRcode::png($_POST['txtInput'], $fileName);

         // Display QR Code
         echo "<img src='" . $fileName . "'>";
      ?>
   </form>
</body>
</html>