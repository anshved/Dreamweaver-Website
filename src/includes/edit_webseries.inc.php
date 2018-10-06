<?php
session_start();
include_once 'connect.local.php';
include 'ChromePhp.php';

$id = mysqli_real_escape_string($conn, $_GET['id']);

function uploadVideos() {
    //Implement video upload here
    //Naya table bana webseries_trailers aur usme dal trailers
    //okay
    //lekin albums and animation me toh  trailers h ai hi nai
    //toh bhi usme same scene ho rha hai
    //Tune ye function call kiya lekin declare hi nahi kiya
    // ab hoga?
    //ha
    header("Location: ../dist/edit-webseries.php?status=success");
    exit();
}

if ($_POST['action'] == 'delete') {
    // Delete webseries with id
    ChromePhp::log("entered delete");
    $sql = "DELETE FROM webseries WHERE webseries_id=$id";
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
                    ChromePhp::log("Updating webseries");
                    $sql = "UPDATE webseries
                            SET webseries_name='$name', webseries_actors='$actors', webseries_date='$date',
                                webseries_desc='$desc', webseries_season='$season', webseries_banner='$newFileName'
                            WHERE webseries_id=$id";
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
                    SET webseries_name='$name', webseries_actors='$actors', webseries_date='$date',
                        webseries_desc='$desc', webseries_season='$season'
                    WHERE webseries_id=$id";
            mysqli_query($conn, $sql) or die(mysqli_error($conn));
            uploadVideos();
        }
    }
} else {
    header("Location: ../login.php");
    exit();
}

//ab wohi use kar fast hai
//kkk aur upload trailers ka dalde
//woh webseries ka na?
/*ha
kk
aur branch bana
lekin branch ka karega kya?
yeh toh imp hai hi na
Ha lekin abhi master stable rakhte hai
okay
chalega

lemkaitlan me error nai karunga tension mat le
Me kar sakta hu :P
Kal ko host karne stable version hona chahiye
kal karna hai host?
Karte hai
Week me time nhi milega 
mujhe
thike chalega
aws?ha
ab news + product baki hai aur edit jo baki hai wo
me karta hu abhi edit
then news and press
prodcut kya hai?
upcpormoing etc
haa projectss ha
thike
ek bar last me dekh le dreamers upload hogaya hai front end thoda baki hai polishing
unko dreamers upload ekdum acha laga tha
me change nai kar raha
oh
thoda width alag hai inputs <ka class="">
ha dekh leta hu chalaur 
upload admin kko kaha dikh raha hai?
battata hu
</ka>