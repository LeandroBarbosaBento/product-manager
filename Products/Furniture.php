<?php
namespace Products;

use Products\MainProduct;
use Model\DB;

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
        
        $db = new DB();
        $conn = $db->connect();
        
        $query = "INSERT INTO products
                    SET
                        sku=:sku,
                        name=:name,
                        price=:price,
                        type=:type,
                        characteristic=:characteristic,
                        value=:value";
      
        $stmt = $conn->prepare($query);
      
        $this->sku=htmlspecialchars(strip_tags($this->sku));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->price=htmlspecialchars(strip_tags($this->price));
        $this->type=htmlspecialchars(strip_tags($this->type));
        $this->characteristic= 'Dimensions';
        $this->value=htmlspecialchars(strip_tags($this->height.'x'.$this->width.'x'.$this->length));
      
        $stmt->bindParam(":sku", $this->sku);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":type", $this->type);
        $stmt->bindParam(":characteristic", $this->characteristic);
        $stmt->bindParam(":value", $this->value);
      
        if($stmt->execute()){
            return true;
        }
      
        return false;
    }
}
