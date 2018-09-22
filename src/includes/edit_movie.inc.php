<?php
session_start();
include_once 'connect.local.php';
include 'ChromePhp.php';
ChromePhp::log("Entered");

$id = mysqli_real_escape_string($conn, $_GET['id']);
ChromePhp::log($id);
function uploadVideos()
{
    $trailer1name = $_FILES['movie-trailer1']['name'];
    $trailer2name = $_FILES['movie-trailer2']['name'];
    $trailer3name = $_FILES['movie-trailer3']['name'];
    $videoExtensions = array("mp4", "mkv", "avi", "MP4", "MKV", "AVI");
    global $id, $conn;
    ChromePhp::log("entered movies");
    if ($_FILES['movie-trailer1']['error'] == 0 || $_FILES['movie-trailer2']['error'] == 0 || $_FILES['movie-trailer3']['error'] == 0) {
        // Delete earlier trailers
        ChromePhp::log("Deleting movies".$id);

        $sql = "SELECT * FROM trailers WHERE movie_id=".$id;
        ChromePhp::log("Deleting  now ".$sql);
        mysqli_query($conn, $sql) or die(mysqli_errno());

        ChromePhp::log("Deleted");
    }

    ChromePhp::log($trailer1name);
    if ($trailer1name !== "" && $_FILES['movie-trailer1']['error'] == 0) {
        ChromePhp::log("Updating t1 movies");

        $ext = pathinfo($trailer1name, PATHINFO_EXTENSION);
        if (in_array($ext, $videoExtensions)) {

            $escapedFile = mysqli_real_escape_string($conn, $_FILES['movie-trailer1']['name']);
            $newFileName = round(microtime(true)) . '_' . $escapedFile;
            $videoTarget = "../videos/" . round(microtime(true)) . '_' . $escapedFile;

            if (move_uploaded_file($_FILES['movie-trailer1']['tmp_name'], $videoTarget)) {
                $sql = "INSERT INTO trailers(movie_id, trailer_name) VALUES($id, '$newFileName')";
                mysqli_query($conn, $sql) or die(mysqli_error($conn));

            } else {
                header("Location: ../dist/edit-movies.php?status=trailer1");
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
                header("Location: ../dist/edit-movies.php?status=trailer2");
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
                header("Location: ../dist/edit-movies.php?status=trailer3");
                exit();
            }

        }
    }

    header("Location: ../dist/edit-movies.php?status=success");
    exit();
}

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['movie-name']);
    $actors = mysqli_real_escape_string($conn, $_POST['movie-actors']);
    $date = mysqli_real_escape_string($conn, $_POST['movie-date']);
    $desc = mysqli_real_escape_string($conn, $_POST['movie-description']);
    $hours = mysqli_real_escape_string($conn, $_POST['movie-hrs']);
    $minutes = mysqli_real_escape_string($conn, $_POST['movie-mins']);

    $date1 = DateTime::createFromFormat('Y-m-d', $date);
    $date_errors = DateTime::getLastErrors();
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    ChromePhp::log($id);
    ChromePhp::log("id in main" . $id);


    // Form Validation / Error Handlers
    // Check for empty fields
    if (empty($name) || empty($actors) || empty($date) || empty($desc) || $hours == "" || $minutes == "") {
        header("Location: ../dist/edit-movies.php?status=empty");
        exit();
    } else if ($date_errors['warning_count'] + $date_errors['error_count'] > 0) {
        //Check if DOB is valid
        header("Location: ../dist/edit-movies.php?status=date");
        exit();
    } else if ($desc >= 1024) {
        header("Location: ../dist/edit-movies.php?status=desc");
        exit();
    } else {

        // Check if banner is present
        if (file_exists($_FILES['movie-banner']['tmp_name']) && is_uploaded_file($_FILES['movie-banner']['tmp_name'])) {

            // Get image name
            $imagename = $_FILES['movie-banner']['name'];
            // image file directory

            $escapedFile = mysqli_real_escape_string($conn, $_FILES['movie-banner']['name']);
            $newFileName = round(microtime(true)) . '_' . $escapedFile;
            $target = "../images/" . round(microtime(true)) . '_' . $escapedFile;

            $extension = array("jpeg", "jpg", "png", "gif", "JPEG", "JPG", "PNG", "GIF");
            $ext = pathinfo($imagename, PATHINFO_EXTENSION);
         
            // Move the image and video
            if (in_array($ext, $extension)) {
                if (move_uploaded_file($_FILES['movie-banner']['tmp_name'], $target)) {
                    ChromePhp::log("Updating movies");
                    $sql = "UPDATE movies 
                            SET movie_name='$name', movie_actors='$actors', movie_date='$date',
                                movie_desc='$desc', movie_duration='$hours:$minutes', movie_banner='$newFileName'
                            WHERE movie_id=$id";
                    mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    ChromePhp::log("Entering movies");

                    uploadVideos();
                } else {
                    header("Location: ../dist/edit-movies.php?status=image");
                    exit();
                }
            } else {
                header("Location: ../dist/edit-movies.php?status=image");
                exit();
            }
        } else {
            // Image is not uploaded
            $sql = "UPDATE movies 
                    SET movie_name='$name', movie_actors='$actors', movie_date='$date',
                        movie_desc='$desc', movie_duration='$hours:$minutes'
                    WHERE movie_id=$id";
            mysqli_query($conn, $sql) or die(mysqli_error($conn));
            uploadVideos();
        }
    }
} else {
    header("Location: ../login.php");
    exit();
}
