<?php

namespace Config;

use PDO;
use PDOException;

class Conexion
{

    private $connection;

    public function __construct()
    {
        $this->connection = new PDO(
            "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}",
            $_ENV['DB_USER'],
            $_ENV['DB_PASS']
        );
    }

    public function query($sql){

        $res = $this->connection->query($sql);
        $error = $this->connection->errorInfo();

        if($error[0] === "00000"){
            $res->execute();
            $data = array();
            while($row = $res->fetch(PDO::FETCH_ASSOC)){
                array_push($data, $row);
            }
            return $data;
        }else{
            return $error;
        }

    }

    public function insert($sql){

        $res = $this->connection->query($sql);
        $error = $this->connection->errorInfo();

        if($error[0] === "00000"){
            $res->execute();
            return $this->connection->lastInsertId();
        }else{
            return $error;
        }

    }

    public function modificar($sql){

        $res = $this->connection->prepare($sql);
        $error = $this->connection->errorInfo();

        if($error[0] === "00000"){
            $res->execute();
            $count = $res->rowCount();
            return $count;
        }else{
            return $error;
        }

    }

}