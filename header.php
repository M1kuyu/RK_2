<?php
session_start();
?>

<header>
    <div class="header-container">
        <div class="logo">
            <a href="index.html">
                <img src="images/logo.png" alt="Логотип" class="logo-image">
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="index.html">Главная</a></li>
                <li><a href="shop.html">Магазин</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="cart.php">Корзина</a></li>
                    <li><a href="contact.php">Обратная связь</a></li>
                    <li><a href="logout.php">Выйти</a></li>
                <?php else: ?>
                    <li><a href="login.html">Авторизация</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>
