<?php
// Vehicle model
function regProduct($sku, $product_name, $price, $product_description, $image_product, $category_id, $created_at, $quantity){
    // Create a connection object using the phpmotors connection function
    $db = connect();
    // The SQL statement
    $sql = 'INSERT INTO products (sku, product_name, price, product_description, image_product, category_id, created_at, quantity)
        VALUES (:sku, :product_name, :price, :product_description, :image_product, :category_id, :created_at, :quantity)';
    // Create the prepared statement using the phpmotors connection
    $stmt = $db->prepare($sql);
    // The next four lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':sku', $sku, PDO::PARAM_STR);
    $stmt->bindValue(':product_name', $product_name, PDO::PARAM_STR);
    $stmt->bindValue(':price', $price, PDO::PARAM_STR);
    $stmt->bindValue(':product_description', $product_description, PDO::PARAM_STR);
    $stmt->bindValue(':image_product', $image_product, PDO::PARAM_STR);
    $stmt->bindValue(':category_id',$category_id, PDO::PARAM_STR);
    $stmt->bindValue(':created_at', $created_at, PDO::PARAM_STR);
    $stmt->bindValue(':quantity', $quantity, PDO::PARAM_STR);
    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
   }

function deleteProduct($sku) {
    $db = connect();
    $sql = 'DELETE FROM products WHERE sku = :sku';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':sku', $sku, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

// Update a vehicle
function updateVehicle($invMake, $invModel, $invDescription, $invImage,  $invThumbnail, $invPrice, $invStock, $invColor, $classificationId, $invId) {
    $db = connect();
    $sql = 'UPDATE inventory SET invMake = :invMake, invModel = :invModel, invDescription = :invDescription, invImage = :invImage, invThumbnail = :invThumbnail, invPrice = :invPrice, invStock = :invStock, invColor = :invColor, classificationId = :classificationId WHERE invId = :invId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':classificationId', $classificationId, PDO::PARAM_INT);
    $stmt->bindValue(':invMake', $invMake, PDO::PARAM_STR);
     $stmt->bindValue(':invModel', $invModel, PDO::PARAM_STR);
    $stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
    $stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
    $stmt->bindValue(':invThumbnail', $invThumbnail, PDO::PARAM_STR);
    $stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_STR);
    $stmt->bindValue(':invStock', $invStock, PDO::PARAM_INT);
    $stmt->bindValue(':invColor', $invColor, PDO::PARAM_STR);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
  }

// Get vehicle information by invId
function getProduct($sku){
    $db = connect();
    $sql = 'SELECT * FROM products WHERE sku = :sku';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':sku', $sku, PDO::PARAM_STR);
    $stmt->execute();
    $invInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $invInfo;
   }