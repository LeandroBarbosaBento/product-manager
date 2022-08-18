<?php
namespace Controller;

use Model\DB;
use Products\DVD;
use Products\Book;
use Products\Furniture;


class Main
{

    public function getData()
    {
        $db = new DB();
        $conn = $db->connect();

        $query = "SELECT * FROM products";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $products = [];

        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)){

            extract($row);
    
            $product_item = [
                "sku"            => $sku,
                "type"           => html_entity_decode($type),
                "name"           => $name,
                "price"          => $price,
                "characteristic" => $characteristic,
                "value"          => $value,
            ];

            array_push($products, $product_item);
        }

        return $products;
        
    }

    public function delete($data)
    {
        unset($data[0]);

        $db = new DB();
        $conn = $db->connect();

       $query = "DELETE FROM products WHERE sku = ?";

       foreach($data as $sku){

            $stmt = $conn->prepare($query);
            $stmt->execute([$sku]);
    
        }

        // Redirect to the Produc List page
        echo '<script type="text/javascript">
                window.location = "index.php"
                </script>';
    }

    public function insert($data)
    {
        $type = "Products\\".$_POST['type'];
        $obj = new $type($data);
        $obj->insert();

        // Redirect to the Produc List page
        echo '<script type="text/javascript">
                window.location = "index.php"
                </script>';
    }
}
