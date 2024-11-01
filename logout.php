<?php
session_start();
session_destroy(); // Удаляет все данные сессии
header("Location: index.html"); // Перенаправление на главную страницу
exit;
?>
