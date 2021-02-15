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
                <a data-id="<?php echo $sku; ?>" data-image="<?php echo $image; ?>" data-name="<?php echo $name; ?>"
                    data-quantity="<?php echo $quantity; ?>" data-price="<?php echo $price; ?>" class="edit-product"
                    data-toggle="modal" href="#editProductModal"><i class="material-icons" data-toggle="tooltip"
                        title="Edit">&#xE254;</i></a>
                <a data-id="<?php echo $sku; ?>" href=" #deleteProductModal" class="delete" data-toggle="modal"><i
                        class="material-icons" data-toggle="tooltip" title="Delete"
                        onclick="removeProduct(<?php echo $code; ?>)">&#xE872;</i></a>
                <a data-id="<?php echo $sku; ?>" data-name="<?php echo $name; ?>"
                    data-quantity="<?php echo $quantity; ?>" href="#addInventoryModal" class="inventory"
                    data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Add Inventory"
                        onclick="addInventory(<?php echo $code; ?>)">&#xE147;</i>
                </a>
            </td>
        </tr>
        <?php
    }
}
?>
    </tbody>
</table>