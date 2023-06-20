<?php

session_start();
 

include 'database.php';
 


include_once "functions.php";
include_once "functions_image.php";
 

$database = new Database();
$db = $database->getConnection();
 

$product = new Product($db);
$product_image = new ProductImage($db);
 

$page_title="KASA";
 

include 'layout_header.php';
 
if(count($_SESSION['cart'])>0){
 

    $ids = array();
    foreach($_SESSION['cart'] as $id=>$value){
        array_push($ids, $id);
    }
 
    $stmt=$product->readByIds($ids);
 
    $total=0;
    $item_count=0;
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
 
        $quantity=$_SESSION['cart'][$id]['quantity'];
        $sub_total=$price*$quantity;
 

        echo "<div class='cart-row'>";
            echo "<div class='col-md-8'>";
 
                echo "<div class='product-name m-b-10px'><h4>{$name}</h4></div>";
                echo $quantity>1 ? "<div>{$quantity} sztuk</div>" : "<div>{$quantity} sztuka</div>";
 
            echo "</div>";
 
            echo "<div class='col-md-4'>";
                echo "<h4>$" . number_format($price, 2, '.', ',') . "</h4>";
            echo "</div>";
        echo "</div>";

 
        $item_count += $quantity;
        $total+=$sub_total;
    }
 

    echo "<div class='col-md-12 text-align-center'>";
        echo "<div class='cart-row'>";
            if($item_count>1){
                echo "<h4 class='m-b-10px'>Całkowita ilość: ({$item_count} sztuk)</h4>";
            }else{
                echo "<h4 class='m-b-10px'>Całkowita ilość: ({$item_count} sztuka)</h4>";
            }
            echo "<h4>$" . number_format($total, 2, '.', ',') . "</h4>";
            echo "<a href='place_order.php' class='btn btn-lg btn-success m-b-10px'>";
                echo "<span class='glyphicon glyphicon-shopping-cart'></span> Złóż zamówienie";
            echo "</a>";
        echo "</div>";
    echo "</div>";
 
}
 
else{
    echo "<div class='col-md-12'>";
        echo "<div class='alert alert-danger'>";
            echo "Brk produktów w twoim koszyku";
        echo "</div>";
    echo "</div>";
}
 
include 'layout_footer.php';
?>