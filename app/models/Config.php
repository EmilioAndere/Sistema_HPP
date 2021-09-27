<?php

namespace App\Models;

use config\Env;
use Config\Model;
use Dotenv\Dotenv;
use PDOException;

class Config extends Model
{
    
    public function test(){

        if($_POST){
            try{
                $new = new \PDO("mysql:host={$this->host};dbname={$this->name}", $this->user, $this->pass);
                $new = null;
                return $new;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }

    }

}