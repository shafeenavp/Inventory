<?php

include_once '../includes/autoloader.php';

class ProductContr extends ProductDb
{

    /*Get products from database and then combine each product attributes to string and return
        the products as an array*/
    public function getData()
    {
        $obj = new SelectProductType();
        $data = $this->getDataFromDb();
        $array = [];
        foreach($data  as $instance) 
        {
            $type =  $instance->getProperty('producttype');
            $sku = $instance->getProperty('sku');
            $property = $obj->getAttribute(new $type);
            $array[$sku] =  $instance->makeString($property); //Make String
        }
        return $array;
    }

    //Delete the selected items from database
    public function deleteData($elements)
    {
        $this->delProduct($elements);
    }
}
