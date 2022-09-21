<?php

namespace App\DAO;

use \PDO;

abstract class DAO
{

    protected $conexao;

    function __construct() 
    {
        $dsn = "mysql:host=localhost:3307;dbname=db_sistema";
        $user = "root";
        $pass = "etecjau";
        
        $this->conexao = new PDO($dsn, $user, $pass);
    }
}
