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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $product_id = $_POST['product_id'];

    $stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ? AND product_id = ?");
    $stmt->bind_param("ii", $user_id, $product_id);
    $stmt->execute();
    $stmt->close();

    header("Location: cart.php"); // Перенаправление обратно в корзину
    exit;
} else {
    header("Location: login.html"); // Если не авторизован, перенаправить на страницу входа
    exit;
}

$conn->close();
?>
