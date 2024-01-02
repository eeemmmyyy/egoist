<?php
require_once 'DB.php';
$db = new DB();
$conn = $db->getConnection();
if (!empty($_POST['password']) and !empty($_POST['login'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $query = "SELECT * FROM Users WHERE login='$login' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if (!empty($user)) {
        session_start();
        $_SESSION['login'] = $login;
        $_SESSION['auth'] = true;
        header("location: ../LK.php?login");
    } else {
        $message = 'Авторизация не пройдена. Неправильно введен логин или пароль.';
        header("location: ../login.php?message=$message");
    }
}else{
    $message =  "Заполните все поля";
    header("location: ../login.php?message=$message");
}


