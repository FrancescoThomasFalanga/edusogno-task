
<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "root";
$dbName = "edusogno";

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

if (!$conn) {
    die("Something went wrong");
}
