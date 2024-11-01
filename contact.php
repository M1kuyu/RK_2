<?php
session_start();

// Проверка, авторизован ли пользователь
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обратная связь</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Главная</a></li>
                <li><a href="shop.html">Магазин</a></li>
                <li><a href="login.html">Авторизация</a></li>
                <li><a href="cart.php">Корзина</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Форма обратной связи</h1>
        <form action="send_feedback.php" method="POST">
            <label for="name">Ваше имя:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Ваш Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Сообщение:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit">Отправить</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 Магазин. Все права защищены.</p>
    </footer>
</body>
</html>
