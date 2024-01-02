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
    <title>Кофе</title>
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
    <form action="" method="post" class="search">
        <input name="search" type="search" placeholder="Поиск среди товаров">
        <input name="save" type="submit" value="Найти"></form>


    <section class="catalog">
        <div class="options">
            <form action="" method="post">
                <label>
                    <select name="type" id="type-select">
                        <option value="">Тип</option>
                        <option value="В капсулах">В капсулах</option>
                        <option value="Плантационный">Плантационный</option>
                        <option value="Ароматизированный">Ароматизированный</option>
                        <option value="Черный">Черный</option>
                        <option value="Зеленый">Зеленый</option>
                        <option value="Пу Эр">Пу Эр</option>
                    </select>
                    <select name="price" id="price-select">
                        <option value="">Цена</option>
                        <option value="<= 300">до 300</option>
                        <option value="<= 500">до 500</option>
                        <option value="<= 800"> до 800</option>
                        <option value="<= 1000">до 1000</option>
                        <option value="> 1000">свыше 1000</option>
                    </select>
                    <select name="country" id="country-select">
                        <option value="">Страна</option>
                        <option value="Россия">Россия</option>
                        <option value="Африка">Африка</option>
                        <option value="США">США</option>
                        <option value="Англия">Англия</option>
                        <option value="Германия">Германия</option>
                        <option value="Франция">Франция</option>
                    </select>
                    <input type="submit" name="see" value="Показать">
                    <input type="submit" value="Сбросить фильтры">
                </label></form>

        </div>
        <div class="products">
            <div class="bread">
                <a href="index.php">Главная/</a>
                <a href="catalog.php">Каталог/</a>
                <span>Кофе</span>
            </div>
            <div class="products_cards">
                <?php
                require_once 'php/DB.php';
                $db = new DB();
                $conn = $db->getConnection();
                if (!empty($_POST['search'])) {
                    if (isset($_POST['save'])) {
                        $search = $_POST['search'];
                        $sql = "select * from Products where type2 ='Кофе' and name like '%$search%'";
                        $result1 = $conn->query($sql);
                        if ($result = $conn->query($sql)) {
                            $rowsCount = $result->num_rows;
                            foreach ($result as $row1) {
                                echo "<form  action='refactor.php' method='post' class='products_card'>
                                 <form  action='product.php' method='get' class='products_card'>
                                 <a id='product' target='_blank'  href='product.php?id=$row1[id]'>
                                 <img src='$row1[img]'>
                                 <p>$row1[name]</p>
                                 <p>$row1[price] Р/унц.</p></a>
                                 <input name='basket' type='submit' value='В корзину'></form></form>";
                            }
                        } else {
                            echo "<h1>Никаких совпадений не найдено</h1>";
                        }
                    }
                } else{
                    if (isset($_POST['see'])) {
                        $type = $_POST['type'] ?? '';
                        $price = $_POST['price'] ?? '';
                        $country = $_POST['country'] ?? '';
                        $sql = "SELECT * FROM Products WHERE type2 ='Кофе' ";

                        if($type != ''){
                            $sql .= "AND type = '".$type."' ";
                        }
                        if($price != ''){
                            $sql .= "AND price ".$price." ";
                        }
                        if($country != ''){
                            $sql .= "AND country = '".$country."' ";
                        }
                        $result2 = $conn->query($sql);

                        if ($result2 = $conn->query($sql)) {
                            $rowsCount = $result2->num_rows;
                            foreach ($result2 as $row2) {
                                echo "<form  action='refactor.php' method='post' class='products_card'>
                                                 <form  action='product.php' method='get' class='products_card'>
                                                 <a id='product' target='_blank'  href='product.php?id=$row2[id]'>
                                                 <img src='$row2[img]'>
                                                 <p>$row2[name]</p>
                                                 <p>$row2[price] Р/унц.</p></a>
                                                 <input name='basket' type='submit' value='В корзину'></form></form>";
                            }
                        } else {
                            echo "<h1>Никаких совпадений не найдено</h1>";
                        }
                    }

                    else{
                        $sql = "SELECT * FROM Products WHERE type2 ='Кофе';";
                        if ($result = $conn->query($sql)) {
                            $rowsCount = $result->num_rows;
                            foreach ($result as $row) {
                                echo "<form  action='refactor.php' method='post' class='products_card'>
                                 <form  action='product.php' method='get' class='products_card'>
                                 <a id='product' target='_blank'  href='product.php?id=$row[id]'>
                                 <img src='$row[img]'>
                                 <p>$row[name]</p>
                                 <p>$row[price] Р/унц.</p></a>
                                 <input name='basket' type='submit' value='В корзину'>

                                 ";
                                if (!empty($_SESSION['auth']) and !empty($_SESSION['login'] == 'admin')) {
                                    echo "<button name='refactor' type='submit' value='$row[id]'>Изменить</button>";
                                }
                                echo "</form></form>";
                            }
                            $result->free();
                        }
                        $conn->close();
                    }
                    $conn->close();
                }
                ?>

            </div>
        </div>
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




