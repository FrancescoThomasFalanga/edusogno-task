<?php

require_once "db.php";

$token = $_POST["token"];

$sql = "SELECT * FROM users WHERE reset_token_hash = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $token);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

if ($user === null) {
    die("Token not found");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("Token has expired");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords do not match");
}

$passwordHash = password_hash($_POST["password"], PASSWORD_DEFAULT);
$userId = $user["id"];

$sql = "UPDATE users SET password = ?, reset_token_hash = NULL, reset_token_expires_at = NULL WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "si", $passwordHash, $userId);
mysqli_stmt_execute($stmt);

header("Location: login.php?password_changed=1");
exit();