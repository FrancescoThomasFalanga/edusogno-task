<?php
session_start();

if (!isset($_SESSION["user"]) || $_SESSION["user"] !== "admin") {
    header("Location: login.php"); 
    exit();
}
?>

<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    include("db.php");
    $sql = "DELETE FROM events WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        $_SESSION["delete"] = "Event Deleted Successfully";
        header("Location: admin.php");
    }
}
?>