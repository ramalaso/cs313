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
        $name = $value['name'];
        $price = $value['price'];
        $image = $value['image'];
        $code = $value['code'];
        ?>
            <div class="col">
                <div class="card" style="width: 20rem;">
                    <form id="frmCart">
                        <img class="card-img-top" src="<?php echo $image; ?>">
                        <div class="card-block">
                            <h4 class="card-title"><?php echo $name; ?></h4>
                            <p class="card-text">Price: <?php echo "$".$price; ?></p>
                            <div class="product-info">
                                <button type="button" id="<?php echo $key; ?>"
                                    class=" btnAddAction cart-action btn btn-primary"
                                    onClick="cartAction('add','<?php echo $code; ?>')"
                                    >
                                    Add to cart
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php
    }
}
?>
        </div>
    </div>
</div>