<?php
require_once 'DB.php';
$db = new DB();
$conn = $db->getConnection();

$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$count = $_POST['count'];
$type = $_POST['type'];
$type2 = $_POST['type2'];
$country = $_POST['country'];
$refactor = $_POST['refactor'];
$delete = $_POST['delete'];
$image = $_FILES['img']['name'];
if (isset($delete)) {
    $sql = "DELETE FROM Products WHERE id='$id'";
    $conn->query($sql);
    $conn->close();
} elseif (isset($refactor)) {


    if (empty($image)) {
        $sql = "UPDATE Products SET name='$name', description='$description', price='$price', count='$count', type='$type', country='$country', type2='$type2' WHERE id='$id'";

        $conn->query($sql);
    } else {
        $pathRandom = str_shuffle('reweretrujerterthmzxclpadwjfdfsdfsdklglksldgkdsioqwejiqrrwer');
        $uploaddir = "../img/pathes/$pathRandom/" . basename($_FILES['img']['name']);
        mkdir("../img/pathes/$pathRandom/");
        move_uploaded_file($_FILES['img']['tmp_name'], $uploaddir);

        $sql = "UPDATE Products SET name='$name', description='$description', price='$price', img='$uploaddir', count='$count', type='$type', country='$country', type2='$type2' WHERE id='$id'";
        $conn->query($sql);
    }
    $conn->close();
}

header('location: ../catalog.php');
