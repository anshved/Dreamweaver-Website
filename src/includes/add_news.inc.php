<?php
session_start();
include_once 'connect.local.php';
include 'ChromePhp.php';

if (isset($_POST['submit'])){
    $headline = mysqli_real_escape_string($conn, $_POST['news-headline']);
    $desc = mysqli_real_escape_string($conn, $_POST['news-description']);
    $date = date('Y-m-d');

    if( empty($headline) || empty($desc)){
        header("Location: ../dist/add-news.php?status=empty");
        exit();
    } else if(!file_exists($_FILES['news-image']['tmp_name']) || !is_uploaded_file($_FILES['news-image']['tmp_name'])) {
        header("Location: ../dist/add-news.php?status=image");
        exit();
    } else if ($desc >= 1024) {
        header("Location: ../dist/add-newjs.php?status=desc");
        exit();
    } else {
        // Get image name
        $imagename = $_FILES['news-image']['name'];
        // image file directory

        $escapedFile = mysqli_real_escape_string($conn, $_FILES['news-image']['name']);
        $newFileName = round(microtime(true)) . '_' . $escapedFile;
        $target = "../images/" . round(microtime(true)) . '_' . $escapedFile;
        
        $extension = array("jpeg", "jpg", "png", "gif", "JPEG", "JPG", "PNG", "GIF");
        $ext = pathinfo($imagename, PATHINFO_EXTENSION);

        //move the image
        if (in_array($ext, $extension)) {
            if (move_uploaded_file($_FILES['news-image']['tmp_name'], $target)) {
                $sql = "INSERT INTO news( headline , description , image, date) 
                VALUES('$headline','$desc','$newFileName', '$date')";
                
                mysqli_query($conn, $sql) or die(mysqli_error($conn));

                header("Location: ../dist/add-news.php?status=success");
                exit();
            } else {
                header("Location: ../dist/add-news.php?status=image");
                exit();
            }
        } else {
            header("Location: ../dist/add-news.php?status=extension");
            exit();
        }
    }
} else {
    header("Location: ../login.php");
    exit();
}
?>