<?php

session_start();
 

$id = isset($_GET['id']) ? $_GET['id'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";
 

unset($_SESSION['cart'][$id]);
 

header('Location: cart.php?action=removed&id=' . $id);
?>