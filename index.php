<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}

$userName = $_SESSION["user"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to Dashboard <?php echo "<div class='text-warning'>$userName</div>"; ?></h1>
        <?php 
        if($userName === "admin") {
            echo "<a href='admin.php' class='btn btn-secondary'>Event List</a>";
        }
        ?>
        <a href="logout.php" class="btn btn-warning">Logout</a>
    </div>

    <div class="my-5">
        <h2 class="text-center mb-5">Event List</h2>
        <div class="container-lg d-flex flex-row flex-wrap justify-content-center">
            <?php
            include("db.php");
            $email = $_SESSION["email"];
            $sql = "SELECT * FROM events WHERE attendees LIKE '%$email%' ";
            $result = mysqli_query($conn, $sql);
            // $row = mysqli_fetch_array($result);

            if ($result->num_rows > 0) {
                
                while ($row = mysqli_fetch_array($result)) {
                    $eventTitle = $row['title'];
                    $eventDescription = $row['description'];
                    $eventAttendees = $row['attendees'];
            ?>
                    <div class="card container">
                        <h3 class="card_title">
                            Title: <?= $eventTitle; ?>
                        </h3>
                        <span class="my-2">
                            Description: <?= $eventDescription; ?>
                        </span>
                        <span class="my-2">
                            Attendees: <?= $eventAttendees; ?>
                        </span>
                        <button class="btn btn-primary">
                            Join
                        </button>
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="card_wrapper">
                    <h3 class="card_title">
                        No Events Yet
                    </h3>
                </div>
        </div>
    </div>
    <?php
            }
    ?>
</body>
</html>