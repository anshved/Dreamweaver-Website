<?php
session_start();
include_once 'connect.local.php';
include 'ChromePhp.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['album-name']);
    $singers = mysqli_real_escape_string($conn, $_POST['album-singers']);
    $date = mysqli_real_escape_string($conn, $_POST['album-date']);
    $desc = mysqli_real_escape_string($conn, $_POST['album-description']);

    $date1 = DateTime::createFromFormat('Y-m-d', $date);
    $date_errors = DateTime::getLastErrors();

    // Form Validation / Error Handlers
    // Check for empty fields
    if (empty($name) || empty($singers) || empty($date) || empty($desc)) {
        header("Location: ../dist/add-albums.php?status=empty");
        exit();
    } else if (!file_exists($_FILES['album-banner']['tmp_name']) || !is_uploaded_file($_FILES['album-banner']['tmp_name'])) {
        header("Location: ../dist/add-albums.php?status=banner");
        exit();
    } else if ($date_errors['warning_count'] + $date_errors['error_count'] > 0) {
        //Check if DOB is valid
        header("Location: ../dist/add-albums.php?status=date");
        exit();
    } else if ($desc >= 1024) {
        header("Location: ../dist/add-albums.php?status=desc");
        exit();
    } else {
        // Get image name
        $imagename = $_FILES['album-banner']['name'];
        // image file directory

        $escapedFile = mysqli_real_escape_string($conn, $_FILES['album-banner']['name']);
        $newFileName = round(microtime(true)) . '_' . $escapedFile;
        $target = "../images/" . round(microtime(true)) . '_' . $escapedFile;
        
        $extension = array("jpeg", "jpg", "png", "gif", "JPEG", "JPG", "PNG", "GIF");
        $ext = pathinfo($imagename, PATHINFO_EXTENSION);

        // Move the image and video

        if (in_array($ext, $extension)) {
            if (move_uploaded_file($_FILES['album-banner']['tmp_name'], $target)) {

                $sql = "INSERT INTO albums(album_name, album_singers,album_desc,album_date
                            , album_banner)
                            VALUES('$name', '$singers','$desc' ,
                             '$date', '$newFileName')";

                mysqli_query($conn, $sql) or die(mysqli_error($conn));

                $videoExtensions = array("mp4", "mkv", "avi", "MP4", "MKV", "AVI");
                $id = mysqli_insert_id($conn);

                header("Location: ../dist/add-albums.php?status=success");
                exit();
            } else {
                header("Location: ../dist/add-albums.php?status=image");
                exit();
            }
        } else {
            header("Location: ../dist/add-albums.php?status=image");
            exit();
        }
    }

} else {
    header("Location: ../login.php");
    exit();
}
