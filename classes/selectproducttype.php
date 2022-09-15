<?php

class SelectProductType 
{
    //Get product type to display attributes according to the product
    public function getProductType(ProductType $type)
    {
        $productType = $type->setProductDetails();
        return $productType;
    }

    //Check if the user input is correct
    public function checkDataType(ProductType $type, $details)
    {
        $attribute = $type->checkDataType($details);
        return $attribute;
    }

    //Return attribute name and unit to display
    public function getAttribute(ProductType $type)
    {
        $attrName = $type->getAttributeName();
        return $attrName;
    }

}

