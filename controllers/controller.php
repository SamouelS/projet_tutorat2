<?php
include_once('autoload.php');

use model\DAL;
use model\model;

class Controller
{
    
    private $model;
    private $utilisateurCo; 
    private $path;
    

    function __construct() {    
        $this->model = new model();
    }
    function test(){
        var_dump($this->model->lesEtudiants);
    }
}