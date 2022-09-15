<?php

class ProductDb extends Dbh
{
    //properties
    private $sku;
    private $name;
    private $price;
    private $producttype;
    private $attribute;

    //getters
    protected function getProperty($name)
    {
        return $this->$name;
    }

    public function __get($name)
    {
        return "this property $name is not defined";
    }

    //setters
    protected function setProperty($name,$value)
    {
        $this->$name = $value;
    }

    public function __set($name,$value)
    {
        return "this property $name is not defined";
    }

    //Add product to database
    protected function setProduct()
    { 
        $price = round($this->price, 2);
        $stmt = $this->connect()->prepare('INSERT INTO products(sku,name,price,producttype,attribute) VALUES(?, ?, ?, ?, ?);');

        if(!$stmt->execute(array($this->sku,$this->name,$price,$this->producttype,$this->attribute)))
        {
            $stmt = null;
            header("location: ../add-product.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }

    //Check whether SKU exist
    protected function checkSku()
    {
        $stmt = $this->connect()->prepare('SELECT sku FROM products WHERE sku = ?;');

        if(!$stmt->execute(array($this->sku)))
        {
            $stmt = null;
            header("location: ../add-product.php?error=checkSkufailed");
            exit();
        }

        $resultCheck;
        if($stmt->rowCount() > 0)
        {
            $resultCheck = false;
        }
        else
        {
            $resultCheck = true;
        }
        return $resultCheck;
    }

    //Returns the product from databse
    protected function getDataFromDb()
    {
        $stmt = $this->connect()->prepare('SELECT * FROM products ORDER BY sku ASC;');
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_CLASS, 'ProductDb');
        return $data;
    }

    //Combine the object property into a string
    protected function makeString($type)
    {
        $price = number_format($this->price, 2);
        $elements = explode("|", $type);
        return $this->sku. ' <br /> '. $this->name. ' <br /> '. $price. ' $<br /> '.$elements[0].' = '. $this->attribute .' '.$elements[1] . '<br />';
    }

    //Mass Delete
    protected function delProduct($elements)
    {
        foreach ($elements as $value)
        {
            $sql = "DELETE FROM products WHERE sku=?";
            $stmt= $this->connect()->prepare($sql);
            $stmt->execute([$value]);
        }
    }
}
