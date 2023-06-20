        </div>


 
    </div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<script>
$(document).ready(function(){

    $('.add-to-cart-form').on('submit', function(){
 

        var id = $(this).find('.product-id').text();
        var quantity = $(this).find('.cart-quantity').val();
 

        window.location.href = "add_to_cart.php?id=" + id + "&quantity=" + quantity;
        return false;
    });

$('.update-quantity-form').on('submit', function(){
 

    var id = $(this).find('.product-id').text();
    var quantity = $(this).find('.cart-quantity').val();
 

    window.location.href = "update_quantity.php?id=" + id + "&quantity=" + quantity;
    return false;
});


$(document).on('mouseenter', '.product-img-thumb', function(){
    var data_img_id = $(this).attr('data-img-id');
    $('.product-img').hide();
    $('#product-img-'+data_img_id).show();
});
});
</script>
 
</body>
</html>