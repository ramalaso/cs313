<?php  
$cart_total = 0;
if($_SESSION['new_cart'] != '') {
foreach($_SESSION['new_cart'] as $key => $value)
    {
    $cart_total = $cart_total + $value['price'];
    $name = $value['product_name'];
    $price = $value['price'];
    $image = $value['image_product'];
    $price = $value['price'];
    echo <<<DISP
    <tr>
    <td><img src="$image" class="img-cart" style="width:30px; height:30px;  "> <strong>$name</strong></td>
    <td>1 * $price = $price</td>
    </tr>
    DISP;
    } 
}
$_SESSION['total']=$cart_total;
?>