
<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "root";
$dbName = "edusogno-task";

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

if (!$conn) {
    die("Something went wrong");
}
