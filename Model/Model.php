<?php
namespace Model;

use Model\DB;

require_once "DB.php";

/**
 * Create DB functions INSERT and DELETE and GET
 */

class Model extends DB
{
    public function insert($data)
    {
        $conn = $this->connect();

        switch ($data['type']) {
            case 'DVD':
                $sql = "INSERT INTO products (sku, name, price, type, Size)
                        VALUES ('".$data['sku']."','".$data['name']."','"
                        .$data['price']."','".$data['type']."','".$data['size']."')";
                break;

            case 'Furniture':

                $dimensions = $data['height'].'x'.$data['width'].'x'.$data['height'];

                $sql = "INSERT INTO products (sku, name, price, type, Dimensions)
                        VALUES ('".$data['sku']."','".$data['name']."','".$data['price']."','"
                        .$data['type']."','".$dimensions."')";
                break;

            case 'Book':

                $sql = "INSERT INTO products (sku, name, price, type, Weight)
                VALUES ('".$data['sku']."','".$data['name']."','".$data['price']."','"
                .$data['type']."','".$data['weight']."')";
                break;
                
        }
        if (!mysqli_query($conn, $sql)) {
            echo "<br><br><br>Error: <br>" . $sql . "<br>" . mysqli_error($conn);
        } else {
            mysqli_close($conn);
        }
    }

    public function getAll()
    {
        $conn = $this->connect();
        $sql = "SELECT * FROM products";
        return $conn->query($sql);
    }

    public function delete($data)
    {
        $conn = $this->connect();
        foreach ($data as $sku) {
            $sql = "DELETE FROM products WHERE sku = '". $sku."'";
            $conn->query($sql);
        }
        mysqli_close($conn);
    }
}
