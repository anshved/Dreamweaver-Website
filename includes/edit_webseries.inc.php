<?php
session_start();
include_once 'connect.local.php';
include 'ChromePhp.php';

$id = mysqli_real_escape_string($conn, $_GET['id']);

function uploadVideos()
{
    global $id, $conn;

    $trailer1name = $_FILES['webseries-trailer1']['name'];
    $trailer2name = $_FILES['webseries-trailer2']['name'];
    $trailer3name = $_FILES['webseries-trailer3']['name'];
    $videoExtensions = array("mp4", "mkv", "avi", "MP4", "MKV", "AVI");

    if ($_FILES['webseries-trailer1']['error'] == 0 || $_FILES['webseries-trailer2']['error'] == 0 || $_FILES['webseries-trailer3']['error'] == 0) {

        // SELECT all existing trailers and delete them from server
        $sql = "SELECT * FROM webseries_trailer WHERE webseries_id =" . $id;
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        while ($ans = mysqli_fetch_assoc($result)) {
            $trailer = "../videos/" . $ans['wb_trailer_name'];
            unlink($trailer) or die("Couldn't delete file");
        }

        // Delete entry from database
        $sql = "DELETE FROM webseries_trailer WHERE webseries_id=" . $id;
        mysqli_query($conn, $sql) or die(mysqli_error($conn));
    }

    if ($trailer1name !== "" && $_FILES['webseries-trailer1']['error'] == 0) {

        $ext = pathinfo($trailer1name, PATHINFO_EXTENSION);
        if (in_array($ext, $videoExtensions)) {

            $escapedFile = mysqli_real_escape_string($conn, $_FILES['webseries-trailer1']['name']);
            $newFileName = round(microtime(true)) . '_' . $escapedFile;
            $videoTarget = "../videos/" . round(microtime(true)) . '_' . $escapedFile;

            if (move_uploaded_file($_FILES['webseries-trailer1']['tmp_name'], $videoTarget)) {
                $sql = "INSERT INTO webseries_trailer(webseries_id, wb_trailer_name) VALUES($id, '$newFileName')";
                mysqli_query($conn, $sql) or die(mysqli_error($conn));

            } else {
                header("Location: ../dist/edit-webseries.php?status=trailer1");
                exit();
            }
        }
    }
    if ($trailer2name !== "" && $_FILES['webseries-trailer2']['error'] == 0) {
        $ext = pathinfo($trailer2name, PATHINFO_EXTENSION);
        if (in_array($ext, $videoExtensions)) {

            $escapedFile = mysqli_real_escape_string($conn, $_FILES['webseries-trailer2']['name']);
            $newFileName = round(microtime(true)) . '_' . $escapedFile;
            $videoTarget = "../videos/" . round(microtime(true)) . '_' . $escapedFile;

            if (move_uploaded_file($_FILES['webseries-trailer2']['tmp_name'], $videoTarget)) {
                $sql = "INSERT INTO webseries_trailer(webseries_id, wb_trailer_name) VALUES($id, '$newFileName')";
                mysqli_query($conn, $sql) or die(mysqli_error($conn));
            } else {
                header("Location: ../dist/edit-webseries.php?status=trailer2");
                exit();
            }

        }
    }
    if ($trailer3name !== "" && $_FILES['webseries-trailer3']['error'] == 0) {
        $ext = pathinfo($trailer3name, PATHINFO_EXTENSION);
        if (in_array($ext, $videoExtensions)) {

            $escapedFile = mysqli_real_escape_string($conn, $_FILES['webseries-trailer3']['name']);
            $newFileName = round(microtime(true)) . '_' . $escapedFile;
            $videoTarget = "../videos/" . round(microtime(true)) . '_' . $escapedFile;

            if (move_uploaded_file($_FILES['webseries-trailer3']['tmp_name'], $videoTarget)) {
                $sql = "INSERT INTO webseries_trailer(webseries_id, wb_trailer_name) VALUES($id, '$newFileName')";
                mysqli_query($conn, $sql) or die(mysqli_error($conn));
            } else {
                header("Location: ../dist/edit-webseries.php?status=trailer3");
                exit();
            }
        }
    }

    header("Location: ../dist/edit-webseries.php?status=success");
    exit();
}

if ($_POST['action'] == 'delete') {
    // Delete webseries with id
    $sql = "DELETE FROM webseries WHERE id=$id";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
    header("Location: ../dist/edit-webseries.php?status=deleted");
    exit();
} else if ($_POST['action'] == 'submit') {
    ChromePhp::log("entered submit");

    $name = mysqli_real_escape_string($conn, $_POST['webseries-name']);
    $actors = mysqli_real_escape_string($conn, $_POST['webseries-actors']);
    $date = mysqli_real_escape_string($conn, $_POST['webseries-date']);
    $desc = mysqli_real_escape_string($conn, $_POST['webseries-description']);
    $season = mysqli_real_escape_string($conn, $_POST['webseries-season']);
    $status = mysqli_real_escape_string($conn, $_POST['webseries-status']);

    $date1 = DateTime::createFromFormat('Y-m-d', $date);
    $date_errors = DateTime::getLastErrors();

    // Form Validation / Error Handlers
    // Check for empty fields
    if (empty($name) || empty($actors) || empty($date) || empty($desc) || empty($season)) {
        header("Location: ../dist/edit-webseries.php?status=empty");
        exit();
    } else if ($date_errors['warning_count'] + $date_errors['error_count'] > 0) {
        //Check if DOB is valid
        header("Location: ../dist/edit-webseries.php?status=date");
        exit();
    } else if ($desc >= 1024) {
        header("Location: ../dist/edit-webseries.php?status=desc");
        exit();
    } else {
        // Check if banner is present
        if (file_exists($_FILES['webseries-banner']['tmp_name']) && is_uploaded_file($_FILES['webseries-banner']['tmp_name'])) {

            // Get image name
            $imagename = $_FILES['webseries-banner']['name'];
            // image file directory

            $escapedFile = mysqli_real_escape_string($conn, $_FILES['webseries-banner']['name']);
            $newFileName = round(microtime(true)) . '_' . $escapedFile;
            $target = "../images/" . round(microtime(true)) . '_' . $escapedFile;

            $extension = array("jpeg", "jpg", "png", "gif", "JPEG", "JPG", "PNG", "GIF");
            $ext = pathinfo($imagename, PATHINFO_EXTENSION);

            // Move the image and video
            if (in_array($ext, $extension)) {
                if (move_uploaded_file($_FILES['webseries-banner']['tmp_name'], $target)) {
                    $sql = "UPDATE webseries
                            SET name='$name', actors='$actors', date='$date',
                                description='$desc', season='$season', banner='$newFileName', status='$status'
                            WHERE id=$id";
                    mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    ChromePhp::log("Entering webseries");

                    uploadVideos();
                } else {
                    header("Location: ../dist/edit-webseries.php?status=image");
                    exit();
                }
            } else {
                header("Location: ../dist/edit-webseries.php?status=image");
                exit();
            }
        } else {
            // Image is not present
            $sql = "UPDATE webseries
                    SET name='$name', actors='$actors', date='$date',
                        description='$desc', season='$season', status='$status'
                    WHERE id=$id";
            mysqli_query($conn, $sql) or die(mysqli_error($conn));
            uploadVideos();
        }
    }
} else {
    header("Location: ../login.php");
    exit();
}
