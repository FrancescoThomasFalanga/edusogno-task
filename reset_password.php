<?php
session_start();

if (isset($_SESSION["user"])) {
    header("Location: index.php");
}

require_once "db.php";
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST["reset"])) {
    $email = $_POST["email"];


    $sql = "SELECT * FROM users WHERE email = '$email' ";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $token = bin2hex(random_bytes(32));

    $sql = "UPDATE users SET reset_token = '$token' WHERE email = '$email'";
    mysqli_query($conn, $sql);

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.example.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'your_email@example.com';
    $mail->Password = 'your_email_password';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;


    $mail->setFrom('your_email@example.com', 'Your Name');
    $mail->addAddress($email, $user["full_name"]);


    $mail->Subject = 'Password Reset Request';
    $mail->Body    = 'To reset your password, click the following link: <a href="http://example.com/reset_password_confirm.php?token=' . $token . '">Reset Password</a>';


    $mail->send();

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div>
            <h4>Send Email</h4>
        </div>
        <form action="reset_password.php" method="post">
            <div class="form-group">
                <input type="email" placeholder="Enter Email:" name="email" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit" value="Reset Password" name="reset" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>
