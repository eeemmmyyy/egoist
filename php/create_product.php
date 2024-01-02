<?php
try {
    // подключение к базе данных
    require_once 'DB.php';
    $db = new DB();
    $conn = $db->getConnection();
    // проверка соединения
    if ($conn->connect_error) {
        throw new Exception("Ошибка подключения к базе данных: " . $conn->connect_error);
    }
    // выполнение запроса на добавление товара в базу данных
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $count = $_POST['count'];
    $type = $_POST['type'];
    $type2 = $_POST['type2'];
    $country = $_POST['country'];

    $pathRandom = str_shuffle('reweretrujerterthmzxclpadwjfdfsdfsdklglksldgkdsioqwejiqrrwer');
    $uploaddir = "../img/pathes/$pathRandom/" . basename($_FILES['img']['name']);
    mkdir("../img/pathes/$pathRandom/");
    move_uploaded_file($_FILES['img']['tmp_name'], $uploaddir);
    if (!empty($name) and !empty($description) and !empty($uploaddir) and !empty($price) and !empty($count) and !empty($type) and !empty($country) and !empty($type2))  {
        $sql = "INSERT INTO Products (name, description, price, img, count, type, country, type2) VALUES ('$name','$description','$price','$uploaddir', '$count','$type', '$country','$type2')";

        $conn->query($sql);
        $conn->close();

        $message = "Товар успешно добавлен в базу данных.";
        header("location: ../catalog.php?message=$message");
    }
    if (empty($message)) {
        throw new Exception("Вы ввели не все поля. " . $conn->connect_error);
    }
} catch (Exception $e) {
    $message = "Произошла ошибка при добавлении Товара. " . $e->getMessage();
    header("location: ../catalog.php?message=$message");
}