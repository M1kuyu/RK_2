<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Здесь можно добавить код для отправки сообщения, например, на email

    // Для демонстрации просто выведем информацию на экран
    echo "<h2>Спасибо, $name!</h2>";
    echo "<p>Ваше сообщение было отправлено.</p>";
} else {
    header("Location: contact.php");
    exit;
}
?>
