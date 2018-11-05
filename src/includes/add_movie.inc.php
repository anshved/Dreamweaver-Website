<?php
session_start();
include_once 'connect.local.php';
include 'ChromePhp.php';
include 'functions.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//die(var_dump($_FILES));

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['movie-name']);
    $actors = mysqli_real_escape_string($conn, $_POST['movie-actors']);
    $date = mysqli_real_escape_string($conn, $_POST['movie-date']);
    $desc = mysqli_real_escape_string($conn, $_POST['movie-description']);
    $hours = mysqli_real_escape_string($conn, $_POST['movie-hrs']);
    $minutes = mysqli_real_escape_string($conn, $_POST['movie-mins']);
    $status = mysqli_real_escape_string($conn, $_POST['movie-status']);
    $date_created = date("Y-m-d");

    $date1 = DateTime::createFromFormat('Y-m-d', $date);
    $date_errors = DateTime::getLastErrors();

    // Form Validation / Error Handlers
    // Check for empty fields
    if (empty($name) || empty($actors) || empty($date) || empty($desc)
        || empty($status) || $hours == "" || $minutes == "") {
        header("Location: ../dist/add-movies.php?status=empty");
        exit();
    } //  else if (!file_exists($_FILES['movie-banner']['tmp_name']) || !is_uploaded_file($_FILES['movie-banner']['tmp_name'])) {
    //     header("Location: ../dist/add-movies.php?status=banner");
    //     exit();
    //
    // }
    else if ($date_errors['warning_count'] + $date_errors['error_count'] > 0) {
        //Check if DOB is valid
        header("Location: ../dist/add-movies.php?status=date");
        exit();
    } else if ($desc >= 1024) {
        header("Location: ../dist/add-movies.php?status=desc");
        exit();
    } else {

        $id = mysqli_insert_id($conn);
        $fileArray = reArrayFiles($_FILES['movie-banners']);
        // dd($fileArray);

        $imageName = $file['name'];
        $escapedFile = mysqli_real_escape_string($conn, $imageName);
        $newFileName = round(microtime(true)) . '_' . $escapedFile;
        $target = "../images/" . round(microtime(true)) . '_' . $escapedFile;

        $extension = array("jpeg", "jpg", "png", "gif", "JPEG", "JPG", "PNG", "GIF");
        $ext = pathinfo($imageName, PATHINFO_EXTENSION);

        if (in_array($ext, $extension)) {
            if (move_uploaded_file($file['tmp_name'], $target)) {
                $sql = "INSERT INTO movies(name, actors, date,
                        description, duration, banner, status, date_created)
                        VALUES('$name', '$actors', '$date',
                        '$desc', '$hours:$minutes', '$newFileName', '$status', '$date_created')";

                mysqli_query($conn, $sql) or die(mysqli_error($conn));
            } else {
                header("Location: ../dist/add-movies.php?status=image");
                exit();
            }
        } else {
            header("Location: ../dist/add-movies.php?status=extension");
            exit();
        }

        foreach ($fileArray as $file) {
            $imageName = $file['name'];
            $escapedFile = mysqli_real_escape_string($conn, $imageName);
            $newFileName = round(microtime(true)) . '_' . $escapedFile;
            $target = "../images/" . round(microtime(true)) . '_' . $escapedFile;

            $extension = array("jpeg", "jpg", "png", "gif", "JPEG", "JPG", "PNG", "GIF");
            $ext = pathinfo($imageName, PATHINFO_EXTENSION);

            if (in_array($ext, $extension)) {
                if (move_uploaded_file($file['tmp_name'], $target)) {
                    $stmt = mysqli_prepare($conn, "INSERT INTO images(type, content_id, image) VALUES ('movies', ?, ?)");
                    mysqli_stmt_bind_param($stmt, "is", $id, $newFileName);
                    mysqli_stmt_execute($stmt);
                } else {
                    header("Location: ../dist/add-movies.php?status=image");
                    exit();
                }
            } else {
                header("Location: ../dist/add-movies.php?status=extension");
                exit();
            }
        }

        $trailer1name = $_FILES['movie-trailer1']['name'];
        $trailer2name = $_FILES['movie-trailer2']['name'];
        $trailer3name = $_FILES['movie-trailer3']['name'];

        // Move the image and video

        $videoExtensions = array("mp4", "mkv", "avi", "MP4", "MKV", "AVI");
        $id = mysqli_insert_id($conn);

        if ($trailer1name !== "" && $_FILES['movie-trailer1']['error'] == 0) {
            $ext = pathinfo($trailer1name, PATHINFO_EXTENSION);
            if (in_array($ext, $videoExtensions)) {

                $escapedFile = mysqli_real_escape_string($conn, $_FILES['movie-trailer1']['name']);
                $newFileName = round(microtime(true)) . '_' . $escapedFile;
                $videoTarget = "../videos/" . round(microtime(true)) . '_' . $escapedFile;

                if (move_uploaded_file($_FILES['movie-trailer1']['tmp_name'], $videoTarget)) {
                    $sql = "INSERT INTO trailers(movie_id, trailer_name) VALUES($id, '$newFileName')";
                    mysqli_query($conn, $sql) or die(mysqli_error($conn));

                } else {
                    header("Location: ../dist/add-movies.php?status=trailer1");
                    exit();
                }
            }
        }
        if ($trailer2name !== "" && $_FILES['movie-trailer2']['error'] == 0) {
            $ext = pathinfo($trailer2name, PATHINFO_EXTENSION);
            if (in_array($ext, $videoExtensions)) {

                $escapedFile = mysqli_real_escape_string($conn, $_FILES['movie-trailer2']['name']);
                $newFileName = round(microtime(true)) . '_' . $escapedFile;
                $videoTarget = "../videos/" . round(microtime(true)) . '_' . $escapedFile;

                if (move_uploaded_file($_FILES['movie-trailer2']['tmp_name'], $videoTarget)) {
                    $sql = "INSERT INTO trailers(movie_id, trailer_name) VALUES($id, '$newFileName')";
                    mysqli_query($conn, $sql) or die(mysqli_error($conn));
                } else {
                    header("Location: ../dist/add-movies.php?status=trailer2");
                    exit();
                }

            }
        }
        if ($trailer3name !== "" && $_FILES['movie-trailer3']['error'] == 0) {
            $ext = pathinfo($trailer3name, PATHINFO_EXTENSION);
            if (in_array($ext, $videoExtensions)) {

                $escapedFile = mysqli_real_escape_string($conn, $_FILES['movie-trailer3']['name']);
                $newFileName = round(microtime(true)) . '_' . $escapedFile;
                $videoTarget = "../videos/" . round(microtime(true)) . '_' . $escapedFile;

                if (move_uploaded_file($_FILES['movie-trailer3']['tmp_name'], $videoTarget)) {
                    $sql = "INSERT INTO trailers(movie_id, trailer_name) VALUES($id, '$newFileName')";
                    mysqli_query($conn, $sql) or die(mysqli_error($conn));
                } else {
                    header("Location: ../dist/add-movies.php?status=trailer3");
                    exit();
                }

            }
        }

        header("Location: ../dist/add-movies.php?status=success");
        exit();
    }
} else {
    header("Location: ../login.php");
    exit();
}
