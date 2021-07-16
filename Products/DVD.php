<?php
namespace Products;

use Products\MainProduct;
use Model\Model;

class DVD extends MainProduct
{

    public $size;

    function __construct($request) {
        parent::__construct(
            $request['sku'], $request['name'], $request['price'],
            $request['type']
        );
        $this->size = $request['size'];
    }

    public function insert(){
        $sql = "INSERT INTO products (sku, name, price, type, characteristic, value)
            VALUES ('".$this->sku."','".$this->name."','"
            .$this->price."','".$this->type."','Size','".$this->size." MB')";

        $db = new Model();
        $db->insert($sql);    
    }

}
