<?php

class Product
{
    public $productArray = array(
         array(
            'id' => '1',
            'name' => 'Orange',
            'code' => 'ORA01',
            'image' => 'http://www.azspagirls.com/files/2010/09/orange.jpg',
            'price' => '2.5'
        ),
        array(
            'id' => '2',
            'name' => 'Banana',
            'code' => 'BAN02',
            'image' => 'http://images.all-free-download.com/images/graphicthumb/vector_illustration_of_ripe_bananas_567893.jpg',
            'price' => '1.25'
        ),
        array(
            'id' => '3',
            'name' => 'Lemon',
            'code' => 'LEM03',
            'image' => 'https://3.imimg.com/data3/IC/JO/MY-9839190/organic-lemon-250x250.jpg',
            'price' => '5.65'
        )
    );

    public function getAllProduct()
    {
        return $this->productArray;
    }
}