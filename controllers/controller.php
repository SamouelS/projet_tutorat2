<?php
include_once('autoload.php');

use model\DAL;
use model\model;

class Controller
{
    
    private $model;
    private $userCo; 
    private $path;
    

    function __construct() {    
        $this->model = new model();
        $this->path = "http://localhost/projet_tutorat2";
    }
    function displayPage($page)
    {
        switch ($page) {
            case 'connection':{
                require(dirname(__FILE__).'/../views/connection.php');
                break;
            }
            case 'accueil':{
                require(dirname(__FILE__).'/../views/page.php');
                break;
            }
            case 'compte':{
                $combobox ='<div class="input-field col s12"><select required><option value="" disabled selected>Choose your option</option>';      
                foreach ($this->model->lesClasses as $uneClasse) 
                {
                    $combobox = $combobox.'<option value="'.$uneClasse->id.'">'.$uneClasse->niveau.$uneClasse->numClasse.'</option>';
                }
                $combobox = $combobox.'</select><label>Classes : </label></div>';

                require(dirname(__FILE__).'/../views/compte.php');
                break;
            }
            default: {
                echo "page introuvable";
                break;  
            }                
        }
    }
    function save($vue,$params)
    {
        switch ($vue) {
            case 'etudiant':{
                //$model->save($vue,$params);
                break;
            }
            
            default:{
                echo 'vue incorrect';
                break;
            }
        }
    }
    function check($params)
    {
        $trouver=false;
        foreach($this->model->lesEtudiants as $unEtudiant)
        {
            if ($unEtudiant->username == $params['username'] && $unEtudiant->mdp == hash('sha256',$params['password']))
            {
                $this->userCo = $unEtudiant;
                file_put_contents('cache', serialize($this));
                $trouver=true;
                $this->displayPage('accueil');
                $this->popup('Vous etes connecté !');

                
                break; 
            }          
        }
        if($trouver==false)
        {          
            $this->popup('t nul ');
        }
    }
    function popup($message)
    {
        echo '<script language="javascript">alert("'.$message.'")</script>';
    }
    function test(){
        var_dump($this->model->lesEtudiants);
    }
}