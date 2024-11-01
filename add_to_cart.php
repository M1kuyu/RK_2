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
    echo json_encode(['success' => false, 'message' => 'Пользователь не авторизован']);
    exit;
}

// Получаем данные из запроса
$data = json_decode(file_get_contents("php://input"));
$product_id = $data->product_id;
$user_id = $_SESSION['user_id'];
$quantity = $data->quantity;

// Добавляем товар в корзину
$stmt = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)
    ON DUPLICATE KEY UPDATE quantity = quantity + VALUES(quantity)");
$stmt->bind_param("iii", $user_id, $product_id, $quantity);
$result = $stmt->execute();
$stmt->close();
$conn->close();

echo json_encode(['success' => $result]);
?>
