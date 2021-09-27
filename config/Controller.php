<?php

namespace Config;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class Controller
{

    protected $tmp;

    public function __construct()
    {
        $loader = new FilesystemLoader("../views");
        $this->tmp = new Environment($loader);
    }

}