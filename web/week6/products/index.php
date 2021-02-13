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
        $sku = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_STRING);
        $image_product = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING);
        $product_name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_INT);
        $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $product_description = "Fruit";
        $category_id = 1;
        $created_at = '02/13/2021';

        // Send the data to the model
        $productOutcome =  regProduct($sku, $product_name, $price, $product_description, $image_product, $category_id, $created_at, $quantity);

        if($productOutcome === 1){
          $message = "<div class='alert alert-success' role='alert'>
                        Product added...
                      </div>";
          include '../product-page.php';
          exit;
        } else {
          $message = "<div class='alert alert-primary' role='alert'>
                        Error: Product not added.
                      </div>";
          include '../product-page.php';
          exit;
        }
        break;
      default:
        echo "Page not found";
 }