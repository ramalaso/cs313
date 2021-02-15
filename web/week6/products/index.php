<?php
/***********************************************
 * Vehicles  Controller
 *********************************************/

// Get the database connection file
require_once '../connections.php';
// Get the accounts model
require_once '../models/product-model.php';

 $action = filter_input(INPUT_GET, 'action');
 if($action == NULL) {
     $action = filter_input(INPUT_POST, 'action');
 }

 switch ($action) {
     case 'add-product':
         // Filter and store the data
        $sku = filter_input(INPUT_POST, 'sku', FILTER_SANITIZE_STRING);
        $image_product = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING);
        $product_name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_INT);
        $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $product_description = "Fruit";
        $category_id = 1;
        $created_at = '02/13/2021';

        // Send the data to the model
        $productOutcome =  regProduct($sku, $product_name, $price, $product_description, $image_product, $category_id, $created_at, $quantity);

        header('Location: /week6/product-page.php');
        break;
      case "update":
        echo "We are upddating";
        //this is a quick and dirty way to make a cart! plz if you're ever going to make a cart... don't do this!
        $itemid = (isset($_POST['itemid'])) ? $_POST['itemid']: "";
        if($itemid != "")
        {
            $sku = filter_input(INPUT_POST, 'sku', FILTER_SANITIZE_STRING);
            $image_product = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING);
            $product_name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_INT);
            $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $product_description = "Fruit";
            $db = connect();
            $sql = 'UPDATE products SET product_name = :product_name, price = :price, product_description = :product_description, image_product = :image_product, quantity = :quantity WHERE sku = :sku';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':product_name', $product_name, PDO::PARAM_STR);
            $stmt->bindValue(':price', $price, PDO::PARAM_STR);
            $stmt->bindValue(':product_description', $product_description, PDO::PARAM_STR);
            $stmt->bindValue(':image_product', $image_product, PDO::PARAM_STR);
            $stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT);
            $stmt->bindValue(':sku', $sku, PDO::PARAM_STR);
            $stmt->execute();
            header('Location: /week6/product-page.php');
        }
        break;
      case "delete":
        break;
      case "edit":
        break;
 }