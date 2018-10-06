<?php

require 'connect.local.php';

if (isset($_POST['submit'])) {
    $lastName = mysqli_real_escape_string($conn, $_POST['lastname']);
    $firstName = mysqli_real_escape_string($conn, $_POST['firstname']);
    $uploadType = mysqli_real_escape_string($conn, $_POST['typeofupload']);
    $resume = mysqli_real_escape_string($conn, $_POST['resume']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $_SESSION['lastname'] = $lastName;
    $_SESSION['firstname'] = $firstName;
    $_SESSION['uploadType'] = $uploadType;
    $_SESSION['resume'] = $resume;
    $_SESSION['email'] = $email;
    $_SESSION['contact'] = $contact;
    $_SESSION['description'] = $description;

    // die(var_dump($lastName, $firstName, $uploadType, $resume, $email, $contact, $description));

    if (empty($lastName) || empty($firstName) || empty($firstName) || empty($firstName)
        || empty($firstName) || empty($firstName) || empty($firstName)) {
        header("Location: ../dreamer-upload.php?status=empty");
        exit();
    } else {
        $filename = $_FILES['file']['name'];
        // image file directory

        $escapedFile = mysqli_real_escape_string($conn, $_FILES['file']['name']);
        $newFileName = round(microtime(true)) . '_' . $escapedFile;
        $target = "../dreamer-uploads/" . round(microtime(true)) . '_' . $escapedFile;

        $extension = array("txt", "jpeg", "jpg", "png", "gif", "mp4", "mkv", "avi", "MP4", "MKV",
            "AVI", "JPEG", "JPG", "TXT", "PNG", "GIF");
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if (in_array($ext, $extension)) {
            if (($_FILES['file']['size'] / 1000000) > 50) {
                header("Location: ../dreamer-upload.php?status=size");
            } else {
                if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {

                    $sql = "INSERT INTO dreamer_upload(first, last, type, resume, email, contact, description, filename)
                        VALUES('$firstName', '$lastName', '$uploadType', '$resume', '$email', '$contact', '$description', '$newFileName')";

                    mysqli_query($conn, $sql) or die(mysqli_error($conn));

                    header("Location: ../dreamer-upload.php?status=success");
                    exit();
                } else {
                    header("Location: ../dreamer-upload.php?status=file");
                    exit();
                }}
        } else {
            header("Location: ../dreamer-upload.php?status=extension");
            exit();
        }
    }
} else {
    header("Location: /dreamer-upload.php");
    exit();
}
