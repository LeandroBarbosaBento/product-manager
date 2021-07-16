<?php
namespace Products;

use Products\MainProduct;
use Model\Model;

class Furniture extends MainProduct
{
    public $width;
    public $height;
    public $length;
    public $dimensions;

    function __construct($request) {
        parent::__construct(
            $request['sku'], $request['name'], $request['price'],
            $request['type']
        );
        $this->width  = $request['width'];
        $this->height = $request['height'];
        $this->length = $request['length'];
    }

    public function insert(){
        $sql = "INSERT INTO products (sku, name, price, type, characteristic, value)
            VALUES ('".$this->sku."','".$this->name."','"
            .$this->price."','".$this->type."','Dimensions','".$this->height.'x'.$this->width.'x'.$this->length."')";

        $db = new Model();
        $db->insert($sql);
    }
}
