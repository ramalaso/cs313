<?php 
session_start();
//now in a normal php application of logging in or handling of login requests, i don't suggest doing this, but this is quick and easy(ish)
$action = (isset($_GET['action'])) ? $_GET['action']: ""; //Ternary operator asking if there is an inputted action
require_once ("Product.php");
$product = new Product();
$products = $product->getAllProduct();
switch($action)
{
    case "additem":
        //this is a quick and dirty way to make a cart! plz if you're ever going to make a cart... don't do this!
        $itemid = (isset($_GET['itemid'])) ? $_GET['itemid']: "";
        if($itemid != "")
        {
            if($_SESSION['cart'] == "")
            {
                $_SESSION['cart'] = array($products[$itemid]);
            } else {
                array_push($_SESSION['cart'], $products[$itemid]);
            }
        }
        break;
    case "deleteitem":
        //this is a quick and dirty way to make a cart! plz if you're ever going to make a cart... don't do this!
        echo "We are deleting an item";
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
    case "clearcart":
        $_SESSION['cart'] = "";
        break;
    case "new":
        $_SESSION['cart'] = "";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
    <title>Shopping cart</title>
</head>

<body>
    <!-- Nav -->
    <?php 
        require_once "navbar.php";
    ?>
    <!-- Main -->
    <?php 
        require_once "product-gallery.php";
    ?>

    <script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"> </script>
    <script type="text/javascript" language="javascript">
    $(function() {
        $('.button').mouseover(function() {
                $(this).animate({
                    opacity: 1
                }, 200);
            })
            .mouseleave(function() {
                $(this).animate({
                    opacity: .6
                }, 200);
            });
        $('.cart-action').click(function() {
            var itemid = $(this).attr("id");
            var location = "index.php?action=additem&itemid=" + itemid;
            window.location.href = location;
        });
        $('.disp_item').mouseover(function() {
                $(this).css("background-color", "#CCC");
            })
            .mouseleave(function() {
                $(this).css("background-color", "transparent");
            });
        $('#clearcart').click(function() {
            window.location.href = "index.php?action=clearcart";
        });
    });
    </script>

</body>

</html>