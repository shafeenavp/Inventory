<?php

class Dvd extends ProductType
{

    public function  setProductDetails()
    {
        return "dvdDiv|size";
    }

    //Checks the input value is a number
    public function  checkDataType($value)
    {
        $size = trim($value, "|");
        if ($size[0] == '.')
        {
            $size = '0' . $size;
        }   

        if (preg_match('/^(0|[1-9]\d*)?(\.\d+)?(?<=\d)$/', $size))
        {
            if (preg_match('/\.\d{3,}/', $size)) 
            {
                $attribute = round($size, 2);
            }
            else
            {
                $attribute = $size;
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
        return "Size|MB";
    }
}

