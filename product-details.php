<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

$product_id = $_GET['id'];
$stmt = $conn->prepare("SELECT name, description, image, price, quantity, features FROM products WHERE id = ?");
$stmt->bind_param("i", $product_id);
$stmt->execute();
$stmt->bind_result($name, $description, $image, $price, $quantity, $features);
$stmt->fetch();
$stmt->close();
$conn->close();

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name; ?> - Детали продукта</title>
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

    <div class="product-details">
        <h2><?php echo $name; ?></h2>
        <img src="images/<?php echo $image; ?>" alt="<?php echo $name; ?>" class="product-image-large">
        <p><strong>Описание:</strong> <?php echo $description; ?></p>
        <p><strong>Цена:</strong> <?php echo $price; ?> руб.</p>
        <p><strong>В наличии:</strong> <?php echo $quantity; ?> шт.</p>
        <p><strong>Характеристики:</strong> <?php echo $features; ?></p>

        <!-- Кнопка добавить в корзину -->
        <button class="add-to-cart-button">Добавить в корзину</button>
    </div>

    <script>
        document.querySelector('.add-to-cart-button').addEventListener('click', function() {
            // Логика добавления товара в корзину
            alert('Товар добавлен в корзину!');
        });
    </script>
</body>
</html>
