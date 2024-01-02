<?php
session_start();
$_SESSION['auth'] = null;
header('location:../LK.php?logout');

