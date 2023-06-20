<?php

session_start();
 

$id = isset($_GET['id']) ? $_GET['id'] : 1;
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : "";
 

$quantity=$quantity<=0 ? 1 : $quantity;
 

unset($_SESSION['cart'][$id]);
 

$_SESSION['cart'][$id]=array(
    'quantity'=>$quantity
);
 

header('Location: cart.php?action=quantity_updated&id=' . $id);
?>