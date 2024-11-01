<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop_db";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Проверка, авторизован ли пользователь
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT products.name, products.image, cart.quantity, products.price FROM cart 
    JOIN products ON cart.product_id = products.id WHERE cart.user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$cart_items = [];
while ($row = $result->fetch_assoc()) {
    $cart_items[] = $row;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Главная</a></li>
                <li><a href="shop.html">Магазин</a></li>
                <li><a href="contact.php">Обратная связь</a></li>
                <li><a href="logout.php">Выйти</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Корзина</h1>
        <section class="cart-items">
            <?php if (empty($cart_items)): ?>
                <p>Ваша корзина пуста.</p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>Товар</th>
                            <th>Количество</th>
                            <th>Цена</th>
                            <th>Сумма</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cart_items as $item): ?>
                            <tr>
                                <td>
                                    <img src="images/<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" class="cart-product-image">
                                    <?php echo $item['name']; ?>
                                </td>
                                <td><?php echo $item['quantity']; ?></td>
                                <td><?php echo $item['price']; ?> руб.</td>
                                <td><?php echo $item['price'] * $item['quantity']; ?> руб.</td>
                                <td>
                                    <form action="remove_from_cart.php" method="POST">
                                        <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                                        <button type="submit" class="remove-button">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Магазин. Все права защищены.</p>
    </footer>
</body>
</html>
