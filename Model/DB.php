<?php
namespace Model;

class DB
{

/**
 * Values replaced when uploaded to Bitbucket
 */
    private $host = 'localhost';
    private $user = 'scandiweb_user';
    private $dbname = 'db_scandiweb_task';
    private $password = 'Bs)A$o|~>+VDh7vd';

    public function connect()
    {
        $conn = mysqli_connect($this->host, $this->user, $this->password, $this->dbname);
        if(!$conn){
            die('Connection failed!');
        } else {
            return $conn;
        }
    }

}
