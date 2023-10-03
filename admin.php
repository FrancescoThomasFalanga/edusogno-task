<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-lg">
        <header class="d-flex justify-content-between my-4">
            <h1>Event List</h1>
            <div>
                <a href="create.php" class="btn btn-primary">Add New Event</a>
            </div>
        </header>
        <?php 
        session_start();
        if (isset($_SESSION["create"])) {
            ?>
            <div class="alert alert-success">
                <?php  
                echo $_SESSION["create"];
                unset($_SESSION["create"]);
                ?>
            </div>
            <?php
        }
        ?>
        <?php 
        if (isset($_SESSION["edit"])) {
            ?>
            <div class="alert alert-success">
                <?php  
                echo $_SESSION["edit"];
                unset($_SESSION["edit"]);
                ?>
            </div>
            <?php
        }
        ?>
        <?php 
        if (isset($_SESSION["delete"])) {
            ?>
            <div class="alert alert-success">
                <?php  
                echo $_SESSION["delete"];
                unset($_SESSION["delete"]);
                ?>
            </div>
            <?php
        }
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Attendees</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("db.php");
                $sql = "SELECT * FROM events";
                $result = mysqli_query($conn, $sql);
                // $row = mysqli_fetch_array($result);
                
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row["id"] ?></td>
                            <td><?php echo $row["title"] ?></td>
                            <td><?php echo $row["attendees"] ?></td>
                            <td><?php echo $row["description"] ?></td>
                            <td>
                                <a href="view.php?id=<?php echo $row["id"] ?>" class="btn btn-info">Read More</a>
                                <a href="edit.php?id=<?php echo $row["id"] ?>" class="btn btn-warning">Edit</a>
                                <a href="delete.php?id=<?php echo $row["id"] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php
                }

                ?>
            </tbody>
        </table>
    </div>
</body>
</html>