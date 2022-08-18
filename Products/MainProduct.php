<?php
namespace Products;
abstract class MainProduct
{
    public $sku;
    public $name;
    public $price;
    public $type;
    public $characteristic;
    public $value;
    public $db;

    function __construct($sku, $name, $price, $type) {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->type = $type;
    }

    public abstract function insert();
}
