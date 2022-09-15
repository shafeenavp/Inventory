<?php

class Furniture extends ProductType
{

    public function  setProductDetails()
    {
        return "furnitureDiv|height|width|length";
    }

    //Checks the input value is a number and also combines height, length and width
    public function  checkDataType($value)
    {
        $val = explode("|",$value);

        //Numner validation
        for($i=0;$i<count($val)-1;$i++)
        {  
            if (preg_match('/^(0|[1-9]\d*)?(\.\d+)?(?<=\d)$/', $val[$i]))
            {
                $val[$i] = round($val[$i], 0);
                $status = 1;
            }
            else
            {
                $status = 0;
                break;
            }
        }

        //set attribute
        if ($status)
        {
            $attribute = $val[0] .' X '.$val[1].' X '.$val[2];
        }
        else 
        {
            $attribute = 0;
        }
        return $attribute;
    }

    //Return the attribute name and unit to be displayed 
    public function  getAttributeName()
    {
        return "Dimension|";
    }
}

