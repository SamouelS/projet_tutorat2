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
            case 'formDemande':{
                $nom = $this->userCo->nom;
                $prenom = $this->userCo->prenom;

                $combobox ='<div class="input-field s12"><select name="idMatiere" required><option value="" disabled selected>Choose your option</option>';      
                foreach ($this->model->lesMatieres as $uneMatiere) 
                {
                    $combobox = $combobox.'<option value="'.$uneMatiere->id.'">'.$uneMatiere->libelle.'</option>';
                }
                $combobox = $combobox.'</select><label>Matières : </label></div>';
                require(dirname(__FILE__).'/../views/formDemande.php');
                break;
            }
            case 'accueil':{
                $nom = $this->userCo->nom;
                $prenom = $this->userCo->prenom;
                require(dirname(__FILE__).'/../views/accueil.php');
                break;
            }
            case 'compte':{
                $combobox ='<div class="input-field col s12"><select name="idClasse" required><option value="" disabled selected>Choose your option</option>';      
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
                $this->model->save($vue,$params);
                file_put_contents('cache', serialize($this));
                $this->displayPage('connection');
                //$this->test();
                break;
            }
            case 'demande':{
                $params['idEtudiant'] = $this->userCo->id;
                $this->model->save($vue,$params);
                file_put_contents('cache', serialize($this));
                $this->displayPage('accueil');
                //$this->test();
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
                //$this->test();
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
        var_dump($this->model->lesDemandes);
    }
}