<?php
$dbServername= "localhost";
$dbUsername= "phpmyadmin";
$dbPassword= "methipak";
$dbName= "dreamweaverDb";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die("Connection failed");
