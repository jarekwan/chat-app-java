<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true){
    header("location: zalog.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Zresetuj swoje hasło</a>
        <a href="wylog.php" class="btn btn-danger ml-3">Wyloguj sie</a>
        <a href="products.php" class="btn btn-danger ml-3">idź do sklepu</a>
    </p>
</body>
</html>