<?php
session_start();
include_once 'connect.local.php';
if (isset($_POST['submit']) && isset($_SESSION['privilege'])) {
    $name = mysqli_real_escape_string($conn, $_POST['movie-name']);
    $actors = mysqli_real_escape_string($conn, $_POST['movie-actors']);
    $date = mysqli_real_escape_string($conn, $_POST['movie-date']);
    $desc = mysqli_real_escape_string($conn, $_POST['movie-description']);
    $hours = mysqli_real_escape_string($conn, $_POST['movie-hrs']);
    $minutes = mysqli_real_escape_string($conn, $_POST['movie-mins']);

    $date1 = DateTime::createFromFormat('Y-m-d', $date);
    $date_errors = DateTime::getLastErrors();

    // Form Validation / Error Handlers
    // Check for empty fields
    if (empty($name) || empty($actors) || empty($date) || empty($desc) || empty($hours) || empty($minutes)) {
        header("Location: ../dist/add-movies.php?status=empty");
        exit();
    } else if (!file_exists($_FILES['movie-banner']['tmp_name']) || !is_uploaded_file($_FILES['movie-banner']['tmp_name'])) {
        header("Location: ../dist/add-movies.php?status=banner");
        exit();
    } else if ($date_errors['warning_count'] + $date_errors['error_count'] > 0) {
        //Check if DOB is valid
        header("Location: ../dist/add-movies.php?status=date");
        exit();
    } else if ($desc >= 1024) {
        header("Location: ../dist/add-movies.php?status=desc");
        exit();
    } else {
        // Get image name
        $imagename = $_FILES['move-banner']['name'];
        // image file directory
        $target = "../images/" . basename($imagename);
        //Insert the image name and image content in image_table
        if (move_uploaded_file($_FILES['movie-banner']['tmp_name'], $target)) {
            $sql = "INSERT INTO movies(movie_name, movie_actors, movie_date,
                        movie_desc, movie_duration, movie_banner)
                        VALUES('$name', '$actors', '$date',
                        '$desc', '$hours:$minutes', '$imagename')";
            mysqli_query($conn, $sql) or die(mysqli_error($conn));
            header("Location: ../dist/add-movies.php?status=success");
            exit();
        } else {
            header("Location: ../dist/add-movies.php?status=image");
            exit();
        }
    }

} else {
    header("Location: ../index.html");
    exit();
}
