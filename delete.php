<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    include("db.php");
    $sql = "DELETE FROM events WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        session_start();
        $_SESSION["delete"] = "Event Deleted Successfully";
        header("Location: admin.php");
    }
}
?>