<?php
//TODO: Instalacion del Sistema
namespace App\Controllers;

use Config\Controller;

class HomeController extends Controller
{

    public function index(){
        echo $this->tmp->render('home.html');
    }

}