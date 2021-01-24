<?php 
session_start();
$action = (isset($_GET['action'])) ? $_GET['action']: ""; //Ternary operator asking if there is an inputted action
require_once ("Product.php");
$product = new Product();
$products = $product->getAllProduct();
switch($action)
{
    case "deleteitem":
        //this is a quick and dirty way to make a cart! plz if you're ever going to make a cart... don't do this!
        $itemid = (isset($_GET['itemid'])) ? $_GET['itemid']: "";
        if($itemid != "")
        {
            if($_SESSION['cart'] == "")
            {
                unset($_SESSION['cart'][$itemid]);
            } else {
                unset($_SESSION['cart'][$itemid]);
            }
        }
        break;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
        integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
    <title>Shopping cart</title>
</head>

<body>
    <!-- Nav -->
    <?php 
        require_once "navbar.php";
    ?>
    <!-- Main -->
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
<div class="container bootstrap snippets bootdey">
    <div class="col-md-9 col-sm-8 content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info panel-shadow">
                    <div class="panel-heading">
                        <h3>
                            <img class="img-circle img-thumbnail" src="https://bootdey.com/img/Content/user_3.jpg">
                            Shopping Cart
                        </h3>
                    </div>
                    <div class="panel-body"> 
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Description</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                                <!-- Main -->
                                <?php 
                                    require_once "product-shopping.php";
                                ?>
                                <tr>
                                    <td colspan="6">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right">Total Product</td>
                                    <td>$<?php echo $_SESSION['total']?> </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right">Total Shipping</td>
                                    <td>$2.00</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right"><strong>Total</strong></td>
                                    <td>$<?php echo $_SESSION['total'] + 2?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
                <a href="index.php" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Continue Shopping</a>
                <a href="checkout.php" class="btn btn-primary pull-right">Next<span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
    </div>
</div>

    <script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"> </script>
        <script type="text/javascript" language="javascript">
            $(function() {
                $('.delete-item').click(function() {
                    var itemid = $(this).attr("id");
                    var location = "shopping-cart.php?action=deleteitem&itemid="+itemid;
                    window.location.href = location;
                });
                $('#clearcart').click(function() {
                    window.location.href= "index.php?action=clearcart";
                });
            });
        </script>

</body>

</html>