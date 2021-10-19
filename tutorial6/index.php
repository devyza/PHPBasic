<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tutorial 6</title>
</head>
<body>
   <form action="upload.php" method="post" enctype="multipart/form-data">
      <label for="imgUpload">Upload Imge</label>
      <input type="file" name="imgUpload" required><br><br>
      <label for="txtPath">Folder Name</label>
      <input type="text" name="txtPath" required>
      <input type="submit" value="Upload" name="submit">
   </form>
</body>
</html>