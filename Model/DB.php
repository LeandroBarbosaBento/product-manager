<?php
namespace Model;

/**
 * Set DB connection
 */


class DB
{

    private $host = 'localhost';
    private $user = 'root';
    private $dbname = 'db_scandiweb_task';
    private $password = '';

    public function connect()
    {
        $conn = mysqli_connect($this->host, $this->user, $this->password, $this->dbname);

        if(!$conn){
            die('Connection failed!');
        } else {
            return $conn;
        }
    }
    /*
        private $host = 'localhost';
    private $user = 'id17252565_scandiweb_user';
    private $dbname = 'id17252565_db_scandiweb_task';
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
    */
}
