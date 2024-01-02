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
    <title>Изменение продукта</title>
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
<section class="section_add">

    <h1>Изменить продукт</h1>


    <?php
    require_once 'php/DB.php';
    $db = new DB();
    $conn = $db->getConnection();
    $id = $_POST['refactor'];

    $sql = "SELECT * FROM Products WHERE id='$id' ";
    $result = $conn->query($sql);
    $conn->close();

    foreach ($result as $row) {
        echo " <form class='createProduct' action='php/delete_refactor.php' method='post' enctype='multipart/form-data'>
    <label>
                <input placeholder='ID' name='id' type='number' value='$row[id]' readonly>
            <input placeholder='Название' name='name' type='text' value='$row[name]'>
            <textarea placeholder='Описание' name='description' type='text' value='$row[description]'>$row[description]</textarea> 
            <input placeholder='Цена' name='price' value='$row[price]' type='number'>
            <select  name='type' id='type-select'>
                <option value='$row[type]'>$row[type]</option>
                <option value='В капсулах'>В капсулах</option>
                <option value='Плантационный'>Плантационный</option>
                <option value='Ароматизированный'>Ароматизированный</option>
                <option value='Черный'>Черный</option>
                <option value='Зеленый'>Зеленый</option>
                <option value='Пу Эр'>Пу Эр</option>
            </select>
            <select name='type2' id='type2-select'>
                <option value='$row[type2]'>$row[type2]</option>
                <option value='Чай'>Чай</option>
                <option value='Кофе'>Кофе</option>
            </select>
            <select name='country' id='country-select'>
                <option value='$row[country]'>$row[country]</option>
                <option value='Россия'>Россия</option>
                <option value='Африка'>Африка</option>
                <option value='США'>США</option>
                <option value='Англия'>Англия</option>
                <option value='Германия'>Германия</option>
                <option value='Франция'>Франция</option>
            </select>
            <input placeholder='Количество' name='count' type='number'  value='$row[count]'>
            <input placeholder='Фото' name='img' type='file'  value='$row[img]'>
          </label>
              <button name='refactor'>Применить изменения</button>
                <button name='delete'>Удалить</button>
 </form>";
    }

    ?>

</section>
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
</body>
</html>

