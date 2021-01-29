<?php


if (isset($_FILES['file'])) {

    // print_r($_FILES['file']);

    $file = $_FILES['file'];

    $uploadPath = 'uploads';

    // only image files ad less then 2mb

    if ($file['type'] == 'image/jpeg') {
        if ($file['size'] <= 2000000) {
            if (move_uploaded_file($file['tmp_name'], $uploadPath . '/' . $file['name'])) {
                echo "file uploaded";
            } else {
                echo "server error 500";
            }
        } else {
            echo "file should be less than 2mb";
        }
    } else {
        echo "File should be image";
    }
}


?>














<form method="post" enctype="multipart/form-data">

    <input type="file" name="file" id="file">
    <input type="submit" value="upload">

</form>