<?php

namespace App\Models;

use Config\Conexion;
use Config\Model;

class Marca extends Model
{
    public static function all(){
        
        $conn = new Conexion();
        $data = $conn->query("SELECT * FROM marca");
        return $data;

    }

    public static function where($id){
     
        $conn = new Conexion();
        $data = $conn->query("SELECT * FROM marca WHERE marca_id = {$id}");
        return $data;
        
    }

    public function save(){
        if($_POST){
            $conn = new Conexion();
            $claves = array();
            $vals = array();
            foreach ($this->data as $key => $value) {
                array_push($claves, $key);
                array_push($vals, "'".$value."'");
            }
            if(count($this->data) > 1){
                $atributos = join(", ", $claves);
                $valores = join(", ", $vals);
            }else{
                $atributos = $claves[0];
                $valores = $vals[0];
            }

            $atributos = "(".$atributos.")";
            $valores = "(".$valores.")";
            $query = "INSERT INTO marca ".$atributos." VALUES ".$valores;
            $result = $conn->insert($query);
            return $result;
        }else{
            echo "No es un metodo que se ejecute por el metodo POST";
        }
        

    }

    public function up(){

        if($_SERVER['REQUEST_METHOD'] == "PUT"){

            $conn = new Conexion();
            parse_str(file_get_contents("php://input"), $_PUT);
            $query = "UPDATE marca SET name = '{$_PUT['name']}' WHERE marca_id = {$_PUT['marca_id']}";
            $res = $conn->modificar($query);
            return $res;

        }else{
            echo "No es un metodo que se ejecute por el metodo PUT";
        }

    }

    public function del(){

        if($_SERVER['REQUEST_METHOD'] == "DELETE"){

            $conn = new Conexion();
            parse_str(file_get_contents("php://input"), $_DELETE);
            $query = "DELETE FROM marca WHERE marca_id = {$_DELETE['marca_id']}";
            $res = $conn->modificar($query);
            return $res;

        }else{
            echo "No es un metodo que se ejecute por el metodo DELETE";
        }

    }


}