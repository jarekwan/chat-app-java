<?php


if(!isset($_SESSION['cart'])){
    $_SESSION['cart']=array();
}
 
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);
 

    echo "<div class='col-md-4 m-b-20px'>";
 

        echo "<div class='product-id display-none'>{$id}</div>";
 
        echo "<a href='product.php?id={$id}' class='product-link'>";

            $product_image->product_id=$id;
            $stmt_product_image=$product_image->readFirst();
 
            while ($row_product_image = $stmt_product_image->fetch(PDO::FETCH_ASSOC)){
                echo "<div class='m-b-10px'>";
                    echo "<img src='uploads/images/{$row_product_image['name']}' class='w-100-pct' />";
                echo "</div>";
            }
 

            echo "<div class='product-name m-b-10px'>{$name}</div>";
        echo "</a>";
 

        echo "<div class='m-b-10px'>";
            if(array_key_exists($id, $_SESSION['cart'])){
                echo "<a href='cart.php' class='btn btn-success w-100-pct'>";
                    echo "Zaktualizowany koszyk";
                echo "</a>";
            }else{
                echo "<a href='add_to_cart.php?id={$id}&page={$page}' class='btn btn-primary w-100-pct'>Dodaj do koszyka</a>";
            }
        echo "</div>";
 
    echo "</div>";
}
 
include_once "paging.php";
?>