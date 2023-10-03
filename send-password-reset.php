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
    $token = bin2hex(random_bytes(16));

    $token_hash = hash("sha256", $token);

    $expiry = date("Y-m-d H:i:s", time() + 60 * 30);

    $sql = "UPDATE users SET reset_token_hash = '$token_hash', reset_token_expires_at = '$expiry' WHERE email = '$email'";
    mysqli_query($conn, $sql);

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'testemailciccio@gmail.com';
    $mail->Password = 'hwuymfmhchalusec';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;


    $mail->setFrom('noreply@example.com');
    $mail->addAddress("testemailciccio@gmail.com", "CICCIO");


    $mail->Subject = 'Password Reset Request';
    $mail->Body    = 'To reset your password, click the following link: <a href="http://localhost/edusogno-task/confirm_reset_password.php?token=' . $token_hash . '">Reset Password</a>';


    $mail->send();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Password Reset</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="alert alert-success">
            Email Sent, check your inbox.
        </div>
    </div>
</body>
</html>