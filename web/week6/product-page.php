<?php 
session_start();
$action = (isset($_GET['action'])) ? $_GET['action']: ""; //Ternary operator asking if there 
require_once './connections.php';
switch($action)
{
    case "update":
        //this is a quick and dirty way to make a cart! plz if you're ever going to make a cart... don't do this!
        $itemid = (isset($_GET['itemid'])) ? $_GET['itemid']: "";
        if($itemid != "")
        {
            $db = connect();
            $image_product  = (isset($_GET['itemimage'])) ? $_GET['itemimage']: "";
            $product_name  = (isset($_GET['itemname'])) ? $_GET['itemname']: "";
            $quantity  = (isset($_GET['itemquantity'])) ? $_GET['itemquantity']: "";
            $price  = (isset($_GET['itemprice'])) ? $_GET['itemprice']: "";
            $product_description = "Fruit";
            $sql = 'UPDATE products SET product_name = :product_name, price = :price, product_description = :product_description, image_product = :image_product, quantity = :quantity WHERE sku = :sku';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':product_name', $product_name, PDO::PARAM_STR);
            $stmt->bindValue(':price', $price, PDO::PARAM_STR);
            $stmt->bindValue(':product_description', $product_description, PDO::PARAM_STR);
            $stmt->bindValue(':image_product', $image_product, PDO::PARAM_STR);
            $stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT);
            $stmt->bindValue(':sku', $itemid, PDO::PARAM_STR);
            $stmt->execute();
            // header('Location: /week6/product-page.php');
        }
        break;
    case "delete":
        //this is a quick and dirty way to make a cart! plz if you're ever going to make a cart... don't do this!
        $itemid = (isset($_GET['itemid'])) ? $_GET['itemid']: "";
        if($itemid != "")
        {
            $db = connect();
            $sql = 'DELETE FROM products WHERE sku = :sku';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':sku', $itemid, PDO::PARAM_STR);
            $stmt->execute();
            $rowsChanged = $stmt->rowCount();
            $stmt->closeCursor();
        }
        break;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Inventory System</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<style>
body {
    padding-top: 80px;
}

.show-cart li {
    display: flex;
}

.card {
    margin-bottom: 20px;
}

.card-img-top {
    width: 200px;
    height: 200px;
    align-self: center;
}

.img-cart {
    display: block;
    max-width: 50px;
    height: auto;
    margin-left: auto;
    margin-right: auto;
}

table tr td {
    border: 1px solid #FFFFFF;
}

table tr th {
    background: #eee;
}

.panel-shadow {
    box-shadow: rgba(0, 0, 0, 0.3) 7px 7px 7px;
}

.btn-header {
    width: 120px;
}
</style>

<body>
    <!-- Nav -->
    <nav class="navbar navbar-inverse bg-inverse fixed-top bg-faded">
        <div class="row">
            <div class="col navbar-shopping" style="width: 700px">
                <a href="./index.php" class="btn btn-info btn-header"><i style="color:white; align: right"
                        class="fas fa-home pl-0"> Home</i></a>
            </div>
        </div>
    </nav>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><b>Products</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addProductsModal" class="btn btn-success" data-toggle="modal"><i
                                    class="material-icons">&#xE147;</i>
                                <span>Add New Product</span></a>
                        </div>
                    </div>
                </div>

                <?php 
                    require_once "./product-crud.php";
                ?>

            </div>
        </div>
    </div>
    <!-- Add Modal HTML -->
    <div id="addProductsModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="products/index.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Product</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Code</label>
                            <input type="text" class="form-control" id="image" name="sku" required />
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="text" class="form-control" id="image" name="image" required />
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" id="addName" name="name" required />
                        </div>
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="number" class="form-control" name="quantity" id="addQuantity" required />
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" class="form-control" id="addPrice" name="price" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-warning" data-dismiss="modal" value="Cancel"
                            data-dismiss="modal" id="cancelAdd" />
                        <input type="submit" class="btn btn-success" value="Add" id="submitAdd" />
                    </div>
                    <input type="hidden" name="action" value="add-product">
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editProductModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Product</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Code</label>
                            <input type="text" class="form-control" id="edit-code" name="edit-sku" required />
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="text" class="form-control" id="edit-image" name="edit-image" required />
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" id="edit-name" name="edit-name" required />
                        </div>
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="number" class="form-control" name="edit-quantity" id="edit-quantity"
                                required />
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" class="form-control" id="edit-price" name="edit-price" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-warning" data-dismiss="modal" value="Cancel" />
                        <input type="submit" class="btn btn-info" id="saveChanges" data-dismiss="modal" value="Save" />
                    </div>
                    <input type="hidden" name="action" value="update-product">
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteProductModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Product</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Are you sure you want to delete these Record:
                            <span id="idDelete"></span> ?
                        </p>
                        <p class="text-warning">
                            <small>This action cannot be undone.</small>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-warning" data-dismiss="modal" aria-label="Close"
                            value="Cancel" />
                        <input type="button" id="deleteAccepted" class="btn btn-danger" data-dismiss="modal"
                            value="Delete" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Inventory-->
    <div id="addInventoryModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="products/index.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Inventory</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Id</label>
                            <input type="text" class="form-control" id="inventoryId" required />
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" id="inventoryName" required />
                        </div>
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="number" class="form-control" id="inventoryQuantity" required />
                        </div>
                    </div>
                    <input type="number" id="inv-quantity" name="inv-quantity" value="add-inventory">
                    <input type="hidden" name="action" value="add-inventory">
                    <div class="modal-footer">
                        <input type="button" class="btn btn-warning" data-dismiss="modal" value="Cancel" />
                        <input type="submit" class="btn btn-info" id="addInventory" data-dismiss="modal" value="Add" />
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- <script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"> </script> -->
    <!-- <script type="text/javascript" language="javascript">
    $(function() {
        $('.delete').click(function() {
            var itemid = $(this).attr("delete_id");
            var location = "product-page.php?action=delete&itemid=" + itemid;
            window.location.href = location;
        });
        $('.edit').click(function() {
            var itemid = $(this).attr("edit_id");
            var location = "product-page.php?action=edit&itemid=" + itemid;
            window.location.href = location;
        });
        $('.update').click(function() {
            var itemid = $(this).attr("update_id");
            var location = "product-page.php?action=update&itemid=" + itemid;
            window.location.href = location;
        });
    });
    </script> -->
    <script src="js/query.js"></script>
</body>

</html>