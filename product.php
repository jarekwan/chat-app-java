<?php

session_start();
 

include_once "database.php";
include_once "functions.php";
include_once "functions_image.php";


$database = new Database();
$db = $database->getConnection();
 

$product = new Product($db);
$product_image = new ProductImage($db);

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: brakujace ID.');
 

$product->id = $id;
 

$product->readOne();
 

$page_title = $product->name;

$product_image->product_id=$id;
 

$stmt_product_image = $product_image->readByProductId();
 

$num_product_image = $stmt_product_image->rowCount();
 
echo "<div class='col-md-1'>";

    if($num_product_image>0){

        while ($row = $stmt_product_image->fetch(PDO::FETCH_ASSOC)){

            $product_image_name = $row['name'];
            $source="uploads/images/{$product_image_name}";
            echo "<img src='{$source}' class='product-img-thumb' data-img-id='{$row['id']}' />";
        }
    }else{ echo "No images."; }
echo "</div>";

echo "<div class='col-md-4' id='product-img'>";
 

    $stmt_product_image = $product_image->readByProductId();
    $num_product_image = $stmt_product_image->rowCount();
 

    if($num_product_image>0){

        $x=0;
        while ($row = $stmt_product_image->fetch(PDO::FETCH_ASSOC)){

            $product_image_name = $row['name'];
            $source="uploads/images/{$product_image_name}";
            $show_product_img=$x==0 ? "display-block" : "display-none";
            echo "<a href='{$source}' target='_blank' id='product-img-{$row['id']}' class='product-img {$show_product_img}'>";
                echo "<img src='{$source}' style='width:100%;' />";
            echo "</a>";
            $x++;
        }
    }else{ echo "No images."; }
echo "</div>";

echo "<div class='col-md-5'>";
 
    echo "<div class='product-detail'>Price:</div>";
    echo "<h4 class='m-b-10px price-description'>$" . number_format($product->price, 2, '.', ',') . "</h4>";
 
    echo "<div class='product-detail'>Opis produktu:</div>";
    echo "<div class='m-b-10px'>";

        $page_description = htmlspecialchars_decode(htmlspecialchars_decode($product->description));
 

        echo $page_description;
    echo "</div>";
 
    echo "<div class='product-detail'>Opis produktu:</div>";
    echo "<div class='m-b-10px'>{$product->category_name}</div>";
 
echo "</div>";

echo "<div class='col-md-2'>";

    if(array_key_exists($id, $_SESSION['cart'])){
        echo "<div class='m-b-10px'>Ten produkt juz jest w twoim koszyku</div>";
        echo "<a href='cart.php' class='btn btn-success w-100-pct'>";
            echo "Update Cart";
        echo "</a>";
 
    }
 

    else{
 
        echo "<form class='add-to-cart-form'>";

            echo "<div class='product-id display-none'>{$id}</div>";
 
            echo "<div class='m-b-10px f-w-b'>Ilość:</div>";
            echo "<input type='number' value='1' class='form-control m-b-10px cart-quantity' min='1' />";
 

            echo "<button style='width:100%;' type='submit' class='btn btn-primary add-to-cart m-b-10px'>";
                echo "<span class='glyphicon glyphicon-shopping-cart'></span> Dodaj do koszyka";
            echo "</button>";
 
        echo "</form>";
    }
echo "</div>";

include_once 'layout_header.php';
 

include_once 'layout_footer.php';
?>