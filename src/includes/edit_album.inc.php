<?php
session_start();
include_once 'connect.local.php';
include 'ChromePhp.php';

$id = mysqli_real_escape_string($conn, $_GET['id']);

function uploadVideos() {
    header("Location: ../dist/edit-albums.php?status=success");
    exit();
}

if ($_POST['action'] == 'delete') {
    // Delete album with id
    $sql = "DELETE FROM albums WHERE id=$id";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
    header("Location: ../dist/edit-albums.php?status=deleted");
    exit();
} else if ($_POST['action'] == 'submit') {
    $name = mysqli_real_escape_string($conn, $_POST['album-name']);
    $singers = mysqli_real_escape_string($conn, $_POST['album-singers']);
    $date = mysqli_real_escape_string($conn, $_POST['album-date']);
    $desc = mysqli_real_escape_string($conn, $_POST['album-description']);
    $status = mysqli_real_escape_string($conn, $_POST['album-status']);

    $date1 = DateTime::createFromFormat('Y-m-d', $date);
    $date_errors = DateTime::getLastErrors();

    // Form Validation / Error Handlers
    // Check for empty fields
    if (empty($name) || empty($singers) || empty($date) || empty($desc)) {
        header("Location: ../dist/edit-albums.php?status=empty");
        exit();
    } else if ($date_errors['warning_count'] + $date_errors['error_count'] > 0) {
        //Check if DOB is valid
        header("Location: ../dist/edit-albums.php?status=date");
        exit();
    } else if ($desc >= 1024) {
        header("Location: ../dist/edit-albums.php?status=desc");
        exit();
    } else {
        // Check if banner is present
        if (file_exists($_FILES['album-banner']['tmp_name']) && is_uploaded_file($_FILES['album-banner']['tmp_name'])) {

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
                    ChromePhp::log("Updating albums");
                    $sql = "UPDATE albums
                            SET name='$name', singers='$singers', date='$date',
                                desc='$desc', duration='$hours:$minutes', banner='$newFileName', status='$status'
                            WHERE id=$id";
                    mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    ChromePhp::log("Entering albums");

                    uploadVideos();
                } else {
                    header("Location: ../dist/edit-albums.php?status=image");
                    exit();
                }
            } else {
                header("Location: ../dist/edit-albums.php?status=image");
                exit();
            }
        } else {
            // Image is not present
            $sql = "UPDATE albums
                    SET name='$name', singers='$singers', date='$date',
                        desc='$desc', status='$status'
                    WHERE id=$id";
            mysqli_query($conn, $sql) or die(mysqli_error($conn));
            uploadVideos();
        }
    }
} else {
    header("Location: ../login.php");
    exit();
}
