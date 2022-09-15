<?php

spl_autoload_register('setAutoloader');

//Include files
function setAutoloader($classname)
{
    $path = "../classes/";
    $extension = ".php";
    $fullpath = $path . $classname  . $extension;

    if(!file_exists($fullpath))  
    {
        $path = "../classes/products/";
        $fullpath = $path . $classname . $extension;
    }

    include_once $fullpath;
}
?>
