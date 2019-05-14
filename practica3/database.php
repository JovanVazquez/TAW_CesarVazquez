<?php

class Database{
    private $con;
    private $dbhost="localhost";
    private $dbuser="root";
    private $dbpass="root";
    private $dbname="poo_bd";

    function_construct(){
        $this-connect_db();
    }
    public function connect_db(){
        $this->con = mysql_connect($this->dbhost, $this->dbuser,
        $this->dbpass, $this->dbname);
        if(mysqli_connect_error()){
            
        }
    }
}

?>