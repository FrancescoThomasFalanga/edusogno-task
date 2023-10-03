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
    <title>Edit Event</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-lg">
        <header class="d-flex justify-content-between my-4">
            <h1>Edit Event</h1>
            <div>
                <a href="admin.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <?php
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            include("db.php");
            $sql = "SELECT * FROM events WHERE id = $id ";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);

            ?>

            <form action="process.php" method="post">
                <div class="form-element my-4">
                    <input type="text" class="form-control" name="title" value="<?php echo $row["title"]; ?>" placeholder="Event Title">
                </div>
                <div class="form-element my-4">
                    <input type="text" class="form-control" name="attendees" value="<?php echo $row["attendees"]; ?>" placeholder="Attendees">
                </div>
                <div class="form-element my-4">
                    <input type="text" class="form-control" name="description" value="<?php echo $row["description"]; ?>" placeholder="Event Description">
                </div>
                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                <div class="form-element">
                    <input type="submit" class="btn btn-success" name="edit" value="Edit Event">
                </div>
            </form>

        <?php
        }
        ?>
    </div>
</body>
</html>