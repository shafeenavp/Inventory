<?php

$delSku=$_POST['delSku'];

//Instantiate DelProductContr
include_once 'autoloader.php';

$del= new ProductContr();

//Deleting products
$del->deleteData($delSku);


