<?php
session_start();

$login = $_POST['login'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
$email = $_POST['email'];
$phone = $_POST['phone'];

require_once 'DB.php';
$db = new DB();
$conn = $db->getConnection();

if (!empty($login) and !empty($password) and !empty($password_confirm)and !empty($email)and !empty($phone)) {
    if ($password == $password_confirm) {
        $_SESSION['auth'] = true;
        $id = mysqli_insert_id($conn);
        $_SESSION['id'] = $id;

        $query = "SELECT * FROM Users WHERE login='$login'";
        $user = mysqli_fetch_assoc(mysqli_query($conn, $query));
        if (empty($user)) {
            $query = "INSERT INTO Users (login,password, email, phone) VALUES ('$login','$password','$email', '$phone')";
            $conn->query($query);
            $_SESSION['auth'] = true;
            $_SESSION['login'] = $login;
            header("location: ../LK.php?regist");
        } else {
            $message =  "Логин занят";
            header("location: ../regist.php?message=$message");
        }
    }
    else {
        $message =  "Пароли не совпадают";
        header("location: ../regist.php?message=$message");
    }
}
else{
    $message =  "Заполните все поля";
    header("location: ../regist.php?message=$message");
}
$conn->close();


