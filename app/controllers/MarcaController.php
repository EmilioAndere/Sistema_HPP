<?php

namespace App\Controllers;

use App\Models\Marca;
use Config\Controller;

class MarcaController extends Controller
{

    public function index(){
        $marcas = Marca::all();
        echo $this->tmp->render('marca.html', compact('marcas'));
    }

    public function find($args){
        $marca = Marca::where($args[0]);
        
    }

    public function add()
    {
        if($_POST){
            $marca = new Marca();
            $marca->name = $_POST['name'];
            $marca->save();
        }else{
            echo "No es un metodo que se ejecute por el metodo POST";
        }
    }

    public function update(){

        $marca = new Marca();            
        $marca->up();

    }

    public function delete(){

        $marca = new Marca();
        $id = $marca->del();
        echo $id;

    }

}