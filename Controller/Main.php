<?php
namespace Controller;

use Model\Model;
use Products\DVD;
use Products\Book;
use Products\Furniture;

require_once "Model/Model.php";

class Main
{

    public function getData()
    {
        $data = new Model();
        $all = $data->getAll();
        return $all;
    }

    public function delete($data)
    {
        $mod = new Model();
        $mod->delete($data);

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
