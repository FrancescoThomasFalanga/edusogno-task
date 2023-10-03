<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Event</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-lg">
        <header class="d-flex justify-content-between my-4">
            <h1>Add New Event</h1>
            <div>
                <a href="admin.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <form action="process.php" method="post">
            <div class="form-element my-4">
                <input type="text" class="form-control" name="title" placeholder="Event Title">
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="attendees" placeholder="Attendees">
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="description" placeholder="Event Description">
            </div>
            <div class="form-element">
                <input type="submit" class="btn btn-success" name="create" value="Add Event">
            </div>
        </form>
    </div>
</body>
</html>