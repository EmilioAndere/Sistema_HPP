<?php

namespace App\Controllers;

use App\Models\Config;

class ConfigController
{

    public function testConnection(){

        $config = new Config();
        $config->host = $_POST['host'];
        $config->name = $_POST['dbname'];
        $config->user = $_POST['username'];
        $config->pass = $_POST['pass'];
        $test = $config->test();
        if(is_null($test)){
            echo "Conexion Correcta";
        }else{
            echo $test;
        }

    }

}