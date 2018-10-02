<?php
session_start();
include_once 'connect.local.php';
include 'ChromePhp.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['webseries-name']);
    $actors = mysqli_real_escape_string($conn, $_POST['webseries-actors']);
    $date = mysqli_real_escape_string($conn, $_POST['webseries-date']);
    $desc = mysqli_real_escape_string($conn, $_POST['webseries-description']);
    $season = mysqli_real_escape_string($conn, $_POST['webseries-season']);

    $date1 = DateTime::createFromFormat('Y-m-d', $date);
    $date_errors = DateTime::getLastErrors();

    // Form Validation / Error Handlers
    // Check for empty fields
    if (empty($name) || empty($actors) || empty($date) || empty($desc) || empty($season)) {
        header("Location: ../dist/add-webseries.php?status=empty");
        exit();
    } else if (!file_exists($_FILES['webseries-banner']['tmp_name']) || !is_uploaded_file($_FILES['webseries-banner']['tmp_name'])) {
        header("Location: ../dist/add-webseries.php?status=banner");
        exit();
    } else if ($date_errors['warning_count'] + $date_errors['error_count'] > 0) {
        //Check if DOB is valid
        header("Location: ../dist/add-webseries.php?status=date");
        exit();
    } else if ($desc >= 1024) {
        header("Location: ../dist/add-webseries.php?status=desc");
        exit();
    } else {
        // Get image name
        $imagename = $_FILES['webseries-banner']['name'];
        // image file directory

        $escapedFile = mysqli_real_escape_string($conn, $_FILES['webseries-banner']['name']);
        $newFileName = round(microtime(true)) . '_' . $escapedFile;
        $target = "../images/" . round(microtime(true)) . '_' . $escapedFile;
        
        $extension = array("jpeg", "jpg", "png", "gif", "JPEG", "JPG", "PNG", "GIF");
        $ext = pathinfo($imagename, PATHINFO_EXTENSION);

        $trailer1name = $_FILES['webseries-trailer1']['name'];
        $trailer2name = $_FILES['webseries-trailer2']['name'];
        $trailer3name = $_FILES['webseries-trailer3']['name'];

        // Move the image and video

        if (in_array($ext, $extension)) {
            if (move_uploaded_file($_FILES['webseries-banner']['tmp_name'], $target)) {

                $sql = "INSERT INTO webseries(webseries_name, webseries_actors, webseries_date,
                            webseries_desc, webseries_season, webseries_banner)
                            VALUES('$name', '$actors', '$date',
                            '$desc', '$season', '$newFileName')";

                mysqli_query($conn, $sql) or die(mysqli_error($conn));

                $videoExtensions = array("mp4", "mkv", "avi", "MP4", "MKV", "AVI");
                $id = mysqli_insert_id($conn);

                if ($trailer1name !== "" && $_FILES['webseries-trailer1']['error'] == 0) {
                    $ext = pathinfo($trailer1name, PATHINFO_EXTENSION);
                    if (in_array($ext, $videoExtensions)) {

                        $escapedFile = mysqli_real_escape_string($conn, $_FILES['webseries-trailer1']['name']);
                        $newFileName = round(microtime(true)) . '_' . $escapedFile;
                        $videoTarget = "../videos/" . round(microtime(true)) . '_' . $escapedFile;

                        if (move_uploaded_file($_FILES['webseries-trailer1']['tmp_name'], $videoTarget)) {
                            $sql = "INSERT INTO trailers(webseries_id, trailer_name) VALUES($id, '$newFileName')";
                            mysqli_query($conn, $sql) or die(mysqli_error($conn));

                        } else {
                            header("Location: ../dist/add-webseries.php?status=trailer1");
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
                            $sql = "INSERT INTO trailers(webseries_id, trailer_name) VALUES($id, '$newFileName')";
                            mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        } else {
                            header("Location: ../dist/add-webseries.php?status=trailer2");
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
                            $sql = "INSERT INTO trailers(webseries_id, trailer_name) VALUES($id, '$newFileName')";
                            mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        } else {
                            header("Location: ../dist/add-webseries.php?status=trailer3");
                            exit();
                        }

                    }
                }

                header("Location: ../dist/add-webseries.php?status=success");
                exit();
            } else {
                header("Location: ../dist/add-webseries.php?status=image");
                exit();
            }
        } else {
            header("Location: ../dist/add-webseries.php?status=image");
            exit();
        }
    }

} else {
    header("Location: ../login.php");
    exit();
}
