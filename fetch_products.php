<?php
// Параметры подключения к базе данных
$servername = "localhost";
$username = "root"; // имя пользователя MySQL
$password = ""; // пароль MySQL
$dbname = "shop_db";

// Устанавливаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Запрос на выборку всех товаров
$sql = "SELECT id, name, description, image, price, quantity FROM products"; // Используйте 'image' здесь
$result = $conn->query($sql);

// Проверка наличия товаров
if ($result->num_rows > 0) {
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    echo json_encode($products); // Выводим данные в формате JSON
} else {
    echo json_encode([]); // Пустой массив, если товаров нет
}

// Закрываем соединение
$conn->close();
?>
