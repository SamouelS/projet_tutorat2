<?php
include_once('autoload.php');

use model\DAL;
use model\model;
use \date;
class Controller
{
    
    private $model;
    private $userCo; 
    private $path;
    

    function __construct() {    
        $this->model = new model();
        $this->path = "http://localhost/projet_tutorat2";
    }
    function displayPage($page,$params=null)
    {
        switch ($page) {
            case 'connection':{
                require(dirname(__FILE__).'/../views/connection.php');
                break;
            }
            case 'formDemande':{
                $nom = $this->userCo->nom;
                $prenom = $this->userCo->prenom;

                require_once(dirname(__FILE__).'/../views/comboboxMatieres.php');
                require_once(dirname(__FILE__).'/../views/formDemande.php');
                require(dirname(__FILE__).'/../views/accueil.php');
                break;
            }
            case 'formCours':{
                $nom = $this->userCo->nom;
                $prenom = $this->userCo->prenom;
                $theme ='';
                $description ='';
                $salle ='';
                $date = new DateTime();
                if(isset($params['idDemande'])){
                    $demande = $this->model->getDemandeById($params['idDemande']);
                    $theme = $demande->theme;
                }
                require_once(dirname(__FILE__).'/../views/checkboxesClasses.php'); 
                require_once(dirname(__FILE__).'/../views/comboboxMatieres.php');
                require_once(dirname(__FILE__).'/../views/formCours.php');
                require(dirname(__FILE__).'/../views/accueil.php');
                break;
            }
            case 'demande':{
                $nom = $this->userCo->nom;
                $prenom = $this->userCo->prenom;

                
                require_once(dirname(__FILE__).'/../views/tabDemandes.php');
                require(dirname(__FILE__).'/../views/accueil.php');
                break;
            }
            case 'accueil':{
                $nom = $this->userCo->nom;
                $prenom = $this->userCo->prenom;
                $content='';
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