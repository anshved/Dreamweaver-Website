<?php
session_start();
include_once 'connect.local.php';

if (isset($_SESSION['privilege'])) {
    if (strcmp($_SESSION['privilege'], "admin") !== 0) {
        // User is not an admin
        header("Location: ../login.php");
        exit();
    }
} else {
    //User is not signed in
    header("Location: ../login.php");
    exit();
}

$id = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "DELETE FROM slides WHERE id=$id";
mysqli_query($conn, $sql) or die("We're facing some issues");

header("Location: ../dist/edit-images.php");
exit();