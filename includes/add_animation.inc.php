<?php
session_start();
include_once 'connect.local.php';
include 'ChromePhp.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['animation-name']);
    $desc = mysqli_real_escape_string($conn, $_POST['animation-description']);
    $status = mysqli_real_escape_string($conn, $_POST['animation-status']);
    $date_created = date("Y-m-d");

    $date_errors = DateTime::getLastErrors();

    // Form Validation / Error Handlers
    // Check for empty fields
    if (empty($name) || empty($desc) || empty($status)) {
        header("Location: ../dist/add-animations.php?status=empty");
        exit();
    } else if (!file_exists($_FILES['animation-banner']['tmp_name']) || !is_uploaded_file($_FILES['animation-banner']['tmp_name'])) {
        header("Location: ../dist/add-animations.php?status=banner");
        exit();
    } else if ($desc >= 1024) {
        header("Location: ../dist/add-animations.php?status=desc");
        exit();
    } else {
        // Get image name
        $imagename = $_FILES['animation-banner']['name'];
        // image file directory

        $escapedFile = mysqli_real_escape_string($conn, $_FILES['animation-banner']['name']);
        $newFileName = round(microtime(true)) . '_' . $escapedFile;
        $target = "../images/" . round(microtime(true)) . '_' . $escapedFile;
        
        $extension = array("jpeg", "jpg", "png", "gif", "JPEG", "JPG", "PNG", "GIF");
        $ext = pathinfo($imagename, PATHINFO_EXTENSION);

        // Move the image and video

        if (in_array($ext, $extension)) {
            if (move_uploaded_file($_FILES['animation-banner']['tmp_name'], $target)) {

                $sql = "INSERT INTO animation(name, description, banner, 
                            status, date_created)
                            VALUES('$name', '$desc' ,
                            '$newFileName', '$status', '$date_created')";

                mysqli_query($conn, $sql) or die(mysqli_error($conn));

                $videoExtensions = array("mp4", "mkv", "avi", "MP4", "MKV", "AVI");
                $id = mysqli_insert_id($conn);

                header("Location: ../dist/add-animations.php?status=success");
                exit();
            } else {
                header("Location: ../dist/add-animations.php?status=image");
                exit();
            }
        } else {
            header("Location: ../dist/add-animations.php?status=image");
            exit();
        }
    }

} else {
    header("Location: ../login.php");
    exit();
}
