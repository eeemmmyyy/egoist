<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Эгоист</title>
    <link rel="stylesheet" href="main.css">

</head>
<body>

<header>
    <div class="wrapper">
        <div class="header_inner">
            <a href="index.php"><img src="img/images/logo.png" alt="logo"></a>
            <a href="catalog.php">Каталог</a>
            <a href="about.php">О нас</a>
            <a href="LK.php">Личный кабинет</a>
            <div class="icons">
                <a href="basket.php"><img src="img/images/basket.png" alt="logo"></a>
                <div class="icons_inner">
                    <img src="img/images/tg.png" alt="logo">
                    <img src="img/images/vk.png" alt="logo">
                </div>
            </div>
        </div>
    </div>

</header>
<div class="wrapper">

    <section class="sec_prod">

        <?php


        require_once 'php/DB.php';
        $db = new DB();
        $conn = $db->getConnection();
        $id = $_GET['id'];

        $sql = "SELECT * FROM Products WHERE id='$id' ";
        $result = $conn->query($sql);
        $conn->close();
        foreach ($result as $row) {
            echo " <div class='bread'>
            <a href='index.php'>Главная/</a>
            <a href='catalog.php'>Каталог/</a>
            <a href='tea.php'>$row[type2]/</a>
            <span>$row[name]</span>
        </div>";
            echo "<div class='product'>
                        <div class='one'>
                            <img src='$row[img]'>
                            <h1>$row[name]</h1>
                            <h1>$row[price] Р/унц.</h1>
                        </div>
                        <div class='two'>
                            <div>
                                <p>$row[description]</p>
                                <form action='basket.php' method='get'>
                                <button name='basket' type='submit' value='$row[id]'>В корзину</button>
                                </form>
                                    </div>
                        </div>
                    </div>";
        }
        ?>

    </section>
</div>
<footer>
    <div class="footer1">
        <div>
            <h2>Навигация</h2>
            <p><a href="index.php">Главная</a>
                <a href="about.php">О нас</a>
                <a href="catalog.php">Каталог</a>
                <a href="login.php">Вход</a>
                <a href="regist.php"> Регистрация</a>
                <a href="LK.php">ЛК</a>
            </p>
        </div>
        <div>
            <h2>Производители</h2>
            <p>Akbar Jacobs Nescafe Lipton Ahmad Другие</p>
        </div>
    </div>
    <div class="footer2">
        <p>©️EmilyProject</p>
    </div>
</footer>
<script src="index.js" defer></script>
</body>
</html>



