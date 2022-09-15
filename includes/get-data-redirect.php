<?php

//Instantiate AddProductContr
include_once 'autoloader.php';

$get= new ProductContr();

//Running Error Handlers and Add product
$data = $get->getData();

//Assigning session variable to hold data
session_start();
if($data)
    $_SESSION['array'] = $data;
else
    $_SESSION['array'] = 'No records';

//Going to the product list page
header("location: ../index.php");


