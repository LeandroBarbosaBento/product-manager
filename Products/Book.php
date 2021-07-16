<?php
namespace Products;

use Products\MainProduct;
use Model\Model;

class Book extends MainProduct
{
    public $weight;

    function __construct($request) {
        parent::__construct(
            $request['sku'], $request['name'], $request['price'],
            $request['type']
        );
        
        $this->weight = $request['weight'];
    }

    public function insert(){
        $sql = "INSERT INTO products (sku, name, price, type, characteristic, value)
            VALUES ('".$this->sku."','".$this->name."','"
            .$this->price."','".$this->type."','Weight','".$this->weight." KG')";
        
        $db = new Model();
        $db->insert($sql);
    }
}
