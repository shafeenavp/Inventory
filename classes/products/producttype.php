<?php

abstract class ProductType
{
    abstract public function setProductDetails();
    abstract public function checkDataType($value);
    abstract public function getAttributeName();
}
