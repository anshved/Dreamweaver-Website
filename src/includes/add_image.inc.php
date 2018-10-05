<?php
session_start();
include_once 'connect.local.php';


function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}

if (isset($_POST['submit'])) {

    $file_array = reArrayFiles($_FILES['slider-image']);
    // die(var_dump($file_array));

    foreach($file_array as $file) {
    // Get image name
        $imagename = $file['name'];
        // image file directory

        $escapedFile = mysqli_real_escape_string($conn, $file['name']);
        $newFileName = round(microtime(true)) . '_' . $escapedFile;
        $target = "../slider-images/" . round(microtime(true)) . '_' . $escapedFile;

        $extension = array("jpeg", "jpg", "png", "gif", "JPEG", "JPG", "PNG", "GIF");
        $ext = pathinfo($imagename, PATHINFO_EXTENSION);

        if (in_array($ext, $extension)) {
            if (move_uploaded_file($file['tmp_name'], $target)) {

                $sql = "INSERT INTO slides(image_name) VALUES ('$newFileName')";
                mysqli_query($conn, $sql) or die(mysqli_error($conn));

            } else {    
                header("Location: ../dist/add-images.php?status=image");
                exit();
            }
        } else {
            header("Location: ../dist/add-images.php?status=extension");
            exit();
        }

    }

    header("Location: ../dist/add-images.php?status=success");
    exit();

} else {
    header("Location: ../login.php");
    exit();
}
