<?php
session_start();
include_once 'connect.local.php';
include 'ChromePhp.php';

$id = mysqli_real_escape_string($conn, $_GET['id']);

function uploadVideos()
{
    header("Location: ../dist/edit-news.php?status=sucess");
    exit();
    }

if ($_POST['action'] == 'delete') {
    // Delete news with id
    $sql = "DELETE FROM news WHERE id=$id";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
    header("Location: ../dist/edit-news.php?status=deleted");
    exit();
} else if ($_POST['action'] == 'submit') {
    $headline = mysqli_real_escape_string($conn, $_POST['news-headline']);
    $desc = mysqli_real_escape_string($conn, $_POST['news-description']);

    // Form Validation / Error Handlers
    // Check for empty fields
    if (empty($headline) || empty($desc) ) {
        header("Location: ../dist/edit-news.php?status=empty");
        exit();
    } else if ($desc >= 1024) {
        header("Location: ../dist/edit-news.php?status=desc");
        exit();
    } else {
        // Check if image is present
        if (file_exists($_FILES['news-image']['tmp_name']) && is_uploaded_file($_FILES['news-image']['tmp_name'])) {

            // Get image name
            $imagename = $_FILES['news-image']['name'];
            // image file directory

            $escapedFile = mysqli_real_escape_string($conn, $_FILES['news-image']['name']);
            $newFileName = round(microtime(true)) . '_' . $escapedFile;
            $target = "../images/" . round(microtime(true)) . '_' . $escapedFile;

            $extension = array("jpeg", "jpg", "png", "gif", "JPEG", "JPG", "PNG", "GIF");
            $ext = pathinfo($imagename, PATHINFO_EXTENSION);

            // Move the image and video
            if (in_array($ext, $extension)) {
                if (move_uploaded_file($_FILES['news-image']['tmp_name'], $target)) {
                    ChromePhp::log("Updating news");
                    $sql = "UPDATE news
                            SET headline='$headline', description='$desc',  
                                image='$newFileName'
                            WHERE id=$id";
                    mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    ChromePhp::log("Entering news");

                    uploadVideos();
                } else {
                    header("Location: ../dist/edit-news.php?status=image");
                    exit();
                }
            } else {
                header("Location: ../dist/edit-news.php?status=image");
                exit();
            }
        } else {
            // Image is not present
            $sql = "UPDATE news
                    SET headline='$headline', 
                        description='$desc'
                    WHERE id=$id";
            mysqli_query($conn, $sql) or die(mysqli_error($conn));
            uploadVideos();
        }
    }
} else {
    header("Location: ../login.php");
    exit();
}
