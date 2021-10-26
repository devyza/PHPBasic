<?php

    define('ROOT_DIR', 'uploads/');
    define('IMG_SIZE_LIMIT', 5242880);  // 5MB (5 * 1024^2)
    
    // Check if there's POST request or not
    if (!isset($_POST['submit'])) {
        return;
    }
    
    $targetDir = ROOT_DIR . $_POST['txtPath'] . "/";
    $targetFile = $targetDir . $_FILES['imgUpload']['name'];

    // Check if root directory is exist
    if (!is_dir(ROOT_DIR)) {
        mkdir(ROOT_DIR);
    }

    // Check if the image is already uploaded
    if (file_exists($targetFile)) {
        echo "File Already Exist";
        return;
    }

    // Check File Size
    if ($_FILES['imgUpload']['size'] > IMG_SIZE_LIMIT) {
        echo "File Size is too Large";
        return;
    }

    // Check File extention
    $fileType = strtolower(pathinfo($_FILES['imgUpload']['name'], PATHINFO_EXTENSION));

    if ($fileType != 'jpg' && $fileType != 'jpeg' && $fileType != 'png' 
    && $fileType != 'gif') {
        echo "Only JPG, JPEG, PNG and GIF are allowed";
        return;
    }

    // Check if the folder is exist.
    if (!is_dir($targetDir)) {
        mkdir($targetDir);
    }
    
    // Upload the image file
    if (move_uploaded_file($_FILES['imgUpload']['tmp_name'], $targetFile)) {
        echo "File Has Been Successfully Uploaded";
    } else {
        echo "Error in Uploading Image File";
    }
?>