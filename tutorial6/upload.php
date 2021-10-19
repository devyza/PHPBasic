<?php

    $ROOT_DIR = 'uploads/';
    $IMG_SIZE_LIMIT = 5242880;  // 5MB (5 * 1024^2)
    
    // Check if there's POST request or not
    if (!isset($_POST['submit'])) {
        return;
    }
    
    $TARGET_DIR = $ROOT_DIR . $_POST['txtPath'] . "/";
    $TARGET_FILE = $TARGET_DIR . $_FILES['imgUpload']['name'];

    // Check if root directory is exist
    if (!is_dir($ROOT_DIR)) {
        mkdir($ROOT_DIR);
    }

    // Check if the image is already uploaded
    if (file_exists($TARGET_FILE)) {
        echo "File Already Exist";
        return;
    }

    // Check File Size
    if ($_FILES['imgUpload']['size'] > $IMG_SIZE_LIMIT) {
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
    if (!is_dir($TARGET_DIR)) {
        mkdir($TARGET_DIR);
    }
    
    // Upload the image file
    if (move_uploaded_file($_FILES['imgUpload']['tmp_name'], $TARGET_FILE)) {
        echo "File Has Been Successfully Uploaded";
        header('');
    } else {
        echo "Error in Uploading Image File";
    }
?>