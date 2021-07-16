<?php
namespace Model;

use Model\DB;

//require_once "DB.php";

/**
 * Create DB functions INSERT and DELETE and GET
 */

class Model extends DB
{
    public function insert($sql)
    {
        $conn = $this->connect();
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
