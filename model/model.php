<?php
namespace model;
ini_set('xdebug.var_display_max_depth', '-1');
ini_set('xdebug.var_display_max_children', '-1');
ini_set('xdebug.var_display_max_data', '-1');
use model\DAL;
use model\metier\etudiant; 
use model\metier\classe; 
use model\metier\matiere;
use model\metier\cours;  
use model\metier\demande;  
use \pdo;
class model 
{
    private $db;
    private $lesClasses;
    private $lesMatieres;
    private $lesEtudiants;
    private $lesCours;

    function __construct() 
    {
        $this->db = new DAL();
        $this->lesClasses = $this->hydrateClasses();
        $this->lesMatieres = $this->hydrateMatieres();
        $this->lesEtudiants = $this->hydrateEtudiants();
        $this->lesDemandes = $this->hydrateDemandes();
    }
    
	public function __get($propriete) {
		switch ($propriete) {
			case 'lesEtudiants' : {
                return $this->lesEtudiants;
                break;
			}
			case 'lesClasses' : {
				return $this->lesClasses;
				break;
            }	
            case 'lesMatieres' : {
				return $this->lesMatieres;
				break;
			}	
		}
    }
    function getParticipations($id){
        $vretour=array();
        $result = $this->db->getParticipations($id);
        while ($row = $result->fetch(PDO::FETCH_OBJ)) {
            $vretour[]= new cours($row->id,$this->getMatiereById($row->idMatiere),$row->theme,$row->description,$row->salle,$row->niveau,$row->statut,$row->dateTime);
        }
        return $vretour;
    }
    function getEnseignements($id){
        $vretour=array();
        $result = $this->db->getEnseignements($id);
        while ($row = $result->fetch(PDO::FETCH_OBJ)) {
            $vretour[]= new cours($row->id,$this->getMatiereById($row->idMatiere),$row->theme,$row->description,$row->salle,$row->niveau,$row->statut,$row->dateTime);
        }
        return $vretour;
    }
    function getClasseById($id){
        foreach($this->lesClasses as $uneClasse)
        {
            if($uneClasse->id == $id)
            {
                return $uneClasse;
                break;
            }
        }
    }
    function getMatiereById($id){
        foreach($this->lesMatieres as $uneMatiere)
        {
            if($uneMatiere->id == $id)
            {
                return $uneMatiere;
                break;
            }
        }
    }
    function getEtudiantById($id){
        foreach($this->lesEtudiants as $unEtudiant)
        {
            if($unEtudiant->id == $id)
            {
                return $unEtudiant;
                break;
            }
        }
    }
    function hydrateMatieres(){
        $result = $this->db->listeMatieres();
        while ($row = $result->fetch(PDO::FETCH_OBJ)) {
            $uneMatiere = new matiere($row->id,$row->libelle);
            $lesMatieres[]=$uneMatiere;
        }
        return $lesMatieres;
        
    }
    function hydrateClasses(){
        $result = $this->db->listeClasses();
        while ($row = $result->fetch(PDO::FETCH_OBJ)) {
            $uneClasse = new classe($row->id,$row->niveau,$row->numClasse,$row->etudiantRef);
            $lesClasses[]=$uneClasse;
        }
        return $lesClasses;
    }
    function hydrateEtudiants(){
        $result = $this->db->listeEtudiants();
        while ($row = $result->fetch(PDO::FETCH_OBJ)) {
            $unEtudiant = new etudiant($row->id,$row->nom,$row->prenom,$row->username,$row->mdp,$row->discord,$row->bts,$row->admin,$this->getClasseById($row->idClasse),$this->getParticipations($row->id),$this->getEnseignements($row->id));
            $lesEtudiants[]=$unEtudiant;
        }
        return $lesEtudiants;
        
    }
    function hydrateDemandes(){
        $result = $this->db->listeDemandes();
        while ($row = $result->fetch(PDO::FETCH_OBJ)) {
            $uneDemande = new demande($row->id,$this->getMatiereById($row->idMatiere),$this->getEtudiantById($row->idEtudiant),$row->theme,$row->description);
            $lesDemandes[]=$uneDemande;
        }
        return $lesDemandes;
        
    }
    function save($vue,$params){
        switch ($vue) {
            case 'etudiant':{
                $mdp = hash('sha256', $params['mdp']);
                $params['mdp']=$mdp;
                $id = $this->db->insertEtudiant($params);
                $uneClasse = $this->getClasseById($params['idClasse']);
                $unEtudiant = new etudiant($id,$params['nom'],$params['prenom'],$params['username'],$mdp,$params['discord'],null,0,$uneClasse,array(),array());             
                $this->lesEtudiants[]=$unEtudiant;
                break;
            }
            case 'demande':{
                $id = $this->db->insertDemande($params);
                $matiere = $this->getMatiereById($params['idMatiere']);
                $etudiant = $this->getEtudiantById($params['idEtudiant']);
                $uneDemande = new demande($id,$matiere,$etudiant,$params['theme'],$params['description']);             
                $this->lesDemandes[]=$uneDemande;
                break;
            }
            default:{
                
                break;
            }
        }
    }
}