<?php
session_start();
require_once 'DB.php';
$db = new DB();
$conn = $db->getConnection();

$user_id = $_SESSION['user_id']; // или получение id пользователя из базы данных
$product_id = $_POST['product_id'];
$count = $_POST['count'];
$price = $_POST['price'];
// Проверяем, есть ли уже данный товар в корзине
$sql = "SELECT * FROM Basket WHERE user_id='$user_id' AND product_id='$product_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Обновляем количество товара в корзине
    $sql = "UPDATE Basket SET count = count + '$count' and price = price+'$price'  WHERE user_id = '$user_id' AND product_id = '$product_id'";
} else {
    // Добавляем новый товар в корзину
    $sql = "INSERT INTO Basket (user_id, product_id, count, price) VALUES ('$user_id', '$product_id', '$count', '$price')";
}

// Выполняем запрос к базе данных
$conn->query($sql);

?>