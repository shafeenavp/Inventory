<?php

class Book extends ProductType
{
        
    public function  setProductDetails()
    {
        return "bookDiv|weight";
    }

    //Checks the input value is a number
    public function  checkDataType($value)
    {
        $weight = trim($value, "|");
        if ($weight[0] == '.')
        {
            $weight = '0' . $weight;
        }   
        if (preg_match('/^(0|[1-9]\d*)?(\.\d+)?(?<=\d)$/', $weight))
        {
            if (preg_match('/\.\d{3,}/', $weight)) 
            {
                $attribute = number_format($weight, 2);
            }
            else
            {
                $attribute = $weight;
            }
        }
        else 
        {
            $attribute  = 0;
        }
        return $attribute;
    }

    //Return the attribute name and unit to be displayed 
    public function  getAttributeName()
    {
        return "Weight|KG";
    }
}

