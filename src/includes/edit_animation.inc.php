<?php
session_start();
include_once 'connect.local.php';
include 'ChromePhp.php';

$id = mysqli_real_escape_string($conn, $_GET['id']);

function uploadVideos() {
    header("Location: ../dist/edit-animations.php?status=success");
    exit();
}

if ($_POST['action'] == 'delete') {
    // Delete animation with id
    $sql = "DELETE FROM animation WHERE animation_id=$id";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
    header("Location: ../dist/edit-animations.php?status=deleted");
    exit();
} else if ($_POST['action'] == 'submit') {
    $name = mysqli_real_escape_string($conn, $_POST['animation-name']);
    $desc = mysqli_real_escape_string($conn, $_POST['animation-description']);

    $date1 = DateTime::createFromFormat('Y-m-d', $date);
    $date_errors = DateTime::getLastErrors();

    // Form Validation / Error Handlers
    // Check for empty fields
    if (empty($name) || empty($desc)) {
        header("Location: ../dist/edit-animations.php?status=empty");
        exit();
    } else if ($desc >= 1024) {
        header("Location: ../dist/edit-animations.php?status=desc");
        exit();
    } else {
        // Check if banner is present
        if (file_exists($_FILES['animation-banner']['tmp_name']) && is_uploaded_file($_FILES['animation-banner']['tmp_name'])) {

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
                    ChromePhp::log("Updating animations");
                    $sql = "UPDATE animation
                            SET animation_name='$name',
                                animation_desc='$desc', animation_banner='$newFileName'
                            WHERE animation_id=$id";
                    mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    ChromePhp::log("Entering animations");

                    uploadVideos();
                } else {
                    header("Location: ../dist/edit-animations.php?status=image");
                    exit();
                }
            } else {
                header("Location: ../dist/edit-animations.php?status=image");
                exit();
            }
        } else {
            // Image is not present
            $sql = "UPDATE animation
                    SET animation_name='$name',
                        animation_desc='$desc'
                    WHERE animation_id=$id";
            mysqli_query($conn, $sql) or die(mysqli_error($conn));
            uploadVideos();
        }
    }
} else {
    header("Location: ../login.php");
    exit();
}
