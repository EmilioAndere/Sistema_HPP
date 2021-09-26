<?php

namespace App\Controllers;

define("VIEWS", __DIR__."/../../views/marca.php");

use App\Models\Marca;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class MarcaController
{

    private $template;

    public function __construct()
    {
        $loader = new FilesystemLoader("../views");
        $this->template = new Environment($loader);
    }

    public function index(){
        $marcas = Marca::all();
        // var_dump($marcas);
        $name = "Emilio";
        echo $this->template->render('marca.html', compact('name', 'marcas'));
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