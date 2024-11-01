<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
</head>
<body>
    <h1>Личный кабинет</h1>
    <p>Добро пожаловать, <?php echo $_SESSION["username"]; ?>!</p>
    <a href="logout.php">Выйти</a>
</body>
</html>