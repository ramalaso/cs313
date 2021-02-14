<?php
require_once ("./Product.php");
$product = new Product();
$productArray = $product->getAllProduct();
?>
<table class="table table-striped table-hover" id="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
if (! empty($productArray)) {
    foreach ($productArray as $key => $value) {
        $name = $value['product_name'];
        $price = $value['price'];
        $image = $value['image_product'];
        $sku = $value['sku'];
        $quantity = $value['quantity'];
        ?>
        <tr>
            <td><?php echo $sku; ?></td>
            <td><img src="<?php echo $image; ?>" width="30" height="30"></td>
            <td><?php echo $name; ?></td>
            <td><?php echo $quantity; ?></td>
            <td><?php echo $price; ?></td>
            <td>
                <a href="#editProductModal" class="edit" edit_id="<?php echo $sku; ?>" data-toggle="modal"><i
                        class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                <a href="#deleteProductModal" class="delete" delete_id="<?php echo $sku; ?>" data-toggle="modal"><i
                        class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
            </td>
        </tr>
        <?php
    }
}
?>
    </tbody>
</table>