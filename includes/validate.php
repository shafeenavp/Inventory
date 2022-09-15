<?php

//Include files
include_once 'autoloader.php';

$type = new SelectProductType();

//Get the parameter from URL and call the function accordingly
$selectedType = $_REQUEST["selectedType"];
if(isset($_REQUEST["details"]))
{
    $details = $_REQUEST["details"];
    $result = $type->checkDataType(new $selectedType, $details);
}
else
{
    $result = $type->getProductType(new $selectedType);
}

//Output
print $result;

