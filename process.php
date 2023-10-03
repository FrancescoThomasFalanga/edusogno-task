<?php
include("db.php");

if (isset($_POST["create"])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $attendees = mysqli_real_escape_string($conn, $_POST["attendees"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $sql = "INSERT INTO events (title, attendees, description) VALUES ('$title', '$attendees', '$description')";
    if (mysqli_query($conn, $sql)) {
        session_start();
        $_SESSION["create"] = "Event Added Successfully";
        header("Location: admin.php");
    } else {
        die("Something went wrong");
    };
}

if (isset($_POST["edit"])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $attendees = mysqli_real_escape_string($conn, $_POST["attendees"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $sql = "UPDATE events SET title = '$title', attendees = '$attendees', description = '$description' WHERE id = $id ";
    if (mysqli_query($conn, $sql)) {
        session_start();
        $_SESSION["edit"] = "Event Updated Successfully";
        header("Location: admin.php");
    } else {
        die("Something went wrong");
    };
}
?>