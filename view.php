<?php
session_start();

if (!isset($_SESSION["user"]) || $_SESSION["user"] !== "admin") {
    header("Location: login.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">

    <style>
        .event-details {
            background: #e2f6f6;
            padding: 50px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container-lg">
        <header class="d-flex justify-content-between my-4">
            <h1>Event Details</h1>
            <div>
                <a href="admin.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <div class="event-details my-4">
            <?php
                if (isset($_GET["id"])) {
                    $id = $_GET["id"];
                    include("db.php");
                    $sql = "SELECT * FROM events WHERE id = $id ";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                ?>
                <h2>Title</h2>
                <p><?php echo $row["title"]; ?></p>
                <h2>Attendees</h2>
                <p><?php echo $row["attendees"]; ?></p>
                <h2>Description</h2>
                <p><?php echo $row["description"]; ?></p>
                <?php
                };
            ?>
        </div>
    </div>
</body>
</html>