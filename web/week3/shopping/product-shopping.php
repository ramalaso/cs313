<?php  
$cart_total = 0;
if($_SESSION['cart'] != '') {
foreach($_SESSION['cart'] as $key => $value)
    {
    $cart_total = $cart_total + $value['price'];
    $name = $value['name'];
    $price = $value['price'];
    $image = $value['image'];
    $price = $value['price'];
    echo <<<DISP
    <tr>
    <td><img src="$image" class="img-cart"></td>
    <td><strong>$name</strong></td>
    <td>
    <form class="form-inline">
        <input class="form-control" type="text" value="1">
        <button rel="tooltip" class="btn btn-default"><i class="fa fa-pencil"></i></button>
        <a href="#" id=$key class="btn btn-primary delete-item"><i class="fa fa-trash-o"></i></a>
    </form>
    </td>
    <td>$price</td>
    <td>$price</td>
    </tr>
    DISP;
    } 
}
$_SESSION['total']=$cart_total;
?>