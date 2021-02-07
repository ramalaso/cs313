<?php
require_once ("Product.php");
$product = new Product();
$productArray = $product->getAllProduct();
?>
<div id="product-grid">
    <div class="container">
        <div class="row">
            <?php
if (! empty($productArray)) {
    foreach ($productArray as $key => $value) {
        $name = $value['product_name'];
        $price = $value['price'];
        $image = $value['image_product'];
        $code = $value['sku'];
        $quantity = $value['quantity'];
        ?>
            <tr>
                <td><?php echo $code; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $$quantity; ?></td>
                <td><?php echo $price; ?></td>
                <td>
                    <a href="#editProductModal" class="edit" data-toggle="modal"><i class="material-icons"
                            data-toggle="tooltip" title="Edit"
                            onclick="selectProduct(<?php echo $code; ?>)">&#xE254;</i></a>
                    <a href="#deleteProductModal" class="delete" data-toggle="modal"><i class="material-icons"
                            data-toggle="tooltip" title="Delete"
                            onclick="removeProduct(<?php echo $code; ?>)">&#xE872;</i></a>
                    <a href="#addInventoryModal" class="inventory" data-toggle="modal"><i class="material-icons"
                            data-toggle="tooltip" title="Add Inventory"
                            onclick="addInventory(<?php echo $code; ?>)">&#xE147;</i>
                    </a>
                </td>
            </tr>
            <?php
    }
}
?>
        </div>
    </div>
</div>