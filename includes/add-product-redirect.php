<?php

if(isset($_POST["sku"]))
{
    //Grabbing the data
    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $productType = $_POST['productType'];
    $attribute= $_POST['attribute'];

    //Instantiate AddProductContr
    include_once 'autoloader.php';
    $add= new AddProductContr($sku,$name,$price,$productType,$attribute);

    //Running Error Handlers and Add product
    $add->addingProduct();


}

