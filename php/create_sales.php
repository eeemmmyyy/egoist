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

    $pathRandom = str_shuffle('reweretrujerterthmzxclpadwjfdfsdfsdklglksldgkdsioqwejiqrrwer');
    $uploaddir = "../img/pathes/$pathRandom/" . basename($_FILES['img']['name']);
    mkdir("../img/pathes/$pathRandom/");
    move_uploaded_file($_FILES['img']['tmp_name'], $uploaddir);
    if (!empty($name) and !empty($description) and !empty($uploaddir))  {
        $sql = "INSERT INTO Sales (name, description, img) VALUES ('$name','$description','$uploaddir')";

        $conn->query($sql);
        $conn->close();

        $message = "Акция успешно добавлена в базу данных.";
        header("location: ../catalog.php?message=$message");
    }
    if (empty($message)) {
        throw new Exception("Вы ввели не все поля. " . $conn->connect_error);
    }
} catch (Exception $e) {
    $message = "Произошла ошибка при добавлении акции. " . $e->getMessage();
    header("location: ../catalog.php?message=$message");
}


