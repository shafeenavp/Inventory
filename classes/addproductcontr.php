<?php

class AddProductContr extends ProductDb
{

    public function __construct($sku,$name,$price,$productType,$attribute)
    {
        $this->setProperty('sku',$sku);
        $this->setProperty('name',$name);
        $this->setProperty('price',$price);
        $this->setProperty('producttype',$productType);
        $this->setProperty('attribute',$attribute);
    }

    //If SKU not exists then add the product to the database
    public function addingProduct() 
    {
        if($this->skuTakenCheck() == false) 
        {
            echo 'skuTaken';
        }
        else
        {
            $this->setProduct();
        }
    }

    //Check whether SKU already exists
    public function skuTakenCheck() 
    {
        $result;
        if (!$this->checkSku()) 
        {
            $result = false;
        }
        else 
        {
            $result = true;
        }
        return $result;
    }

}
