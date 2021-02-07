<?php

require_once '../connections.php';

class Product
{
    public $productArray = array(
         array(
            'id' => '1',
            'product_name' => 'Orange',
            'sku' => 'ORA01',
            'image_product' => 'http://www.azspagirls.com/files/2010/09/orange.jpg',
            'price' => '2.5',
            'quantity' => 1
        ),
        array(
            'id' => '2',
            'product_name' => 'Banana',
            'sku' => 'BAN02',
            'image_product' => 'http://images.all-free-download.com/images/graphicthumb/vector_illustration_of_ripe_bananas_567893.jpg',
            'price' => '1.25',
            'quantity' => 4
        ),
        array(
            'id' => '3',
            'product_name' => 'Lemon',
            'sku' => 'LEM03',
            'image_product' => 'https://3.imimg.com/data3/IC/JO/MY-9839190/organic-lemon-250x250.jpg',
            'price' => '5.65',
            'quantity' => 45
        )
    );


    public function getAllProduct()
    {
        $db = connect(); 
        $sql = "SELECT * FROM products";

        // The next line creates the prepared statement using the phpmotors connection      
        $stmt = $db->prepare($sql);
        // The next line runs the prepared statement 
        $stmt->execute(); 
        // The next line gets the data from the database and 
        // stores it as an array in the $classifications variable 
        $products = $stmt->fetchAll(); 
        // The next line closes the interaction with the database 
        $stmt->closeCursor(); 
        // The next line sends the array of data back to where the function 
        // was called (this should be the controller) 
        return $products;
        // return $this->productArray;
    }
}