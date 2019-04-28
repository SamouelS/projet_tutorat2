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
    private $lesDemandes;
    private $lesCours;

    function __construct() 
    {
        $this->db = new DAL();
        $this->lesClasses = $this->hydrateClasses();
        $this->lesMatieres = $this->hydrateMatieres();
        $this->lesEtudiants = $this->hydrateEtudiants();
        $this->lesDemandes = $this->hydrateDemandes();
        $this->lesCours = $this->hydrateCours();
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
            case 'lesDemandes' : {
				return $this->lesDemandes;
				break;
            }	
            case 'lesCours' : {
				return $this->lesCours;
				break;
			}	
		}
    }

    function getTuteur($id){

        $result = $this->db->getTuteur($id);
        while ($row = $result->fetch(PDO::FETCH_OBJ)) {
            $vretour= new etudiant($row->id,$row->nom,$row->prenom,$row->username,$row->mdp,$row->discord,$row->bts,$row->admin,$this->getClasseById($row->idClasse));
        }
        return $vretour;
    }
    function getParticipants($id){
        $vretour=array();
        $result = $this->db->getParticipants($id);
        while ($row = $result->fetch(PDO::FETCH_OBJ)) {
            $vretour[]= new etudiant($row->id,$row->nom,$row->prenom,$row->username,$row->mdp,$row->discord,$row->bts,$row->admin,$this->getClasseById($row->idClasse));
        }
        return $vretour;
    }
    function getDemandeById($id){
        foreach($this->lesDemandes as $uneDemande)
        {
            if($uneDemande->id == $id)
            {
                return $uneDemande;
                break;
            }
        }
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
            $unEtudiant = new etudiant($row->id,$row->nom,$row->prenom,$row->username,$row->mdp,$row->discord,$row->bts,$row->admin,$this->getClasseById($row->idClasse));
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
    function hydrateCours(){
        $result = $this->db->listeCours();
        while ($row = $result->fetch(PDO::FETCH_OBJ)) {
            $unCours = new cours($row->id,$this->getTuteur($row->id),$this->getParticipants($row->id),$this->getMatiereById($row->idMatiere),$row->theme,$row->description,$row->salle,$row->date,$row->time,$row->statut);
            $lesCours[]=$unCours;
        }
        return $lesCours;
    }
    function insert($vue,$params){
        switch ($vue) {
            case 'etudiant':{
                $mdp = hash('sha256', $params['mdp']);
                $params['mdp']=$mdp;
                $id = $this->db->insertEtudiant($params);
                $uneClasse = $this->getClasseById($params['idClasse']);
                $unEtudiant = new etudiant($id,$params['nom'],$params['prenom'],$params['username'],$mdp,$params['discord'],null,0,$uneClasse);             
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
            case 'cours':{
                $idCours = $this->db->insertCours($params);
                $matiere = $this->getMatiereById($params['idMatiere']);
                $tuteur = $params['tuteur'];
                $unCours = new Cours($idCours,$tuteur,array(),$matiere,$params['theme'],$params['description'],$params['salle'],$params['date'],$params['time'],$params['statut']);             
                $this->lesCours[]=$unCours;

                $this->db->insertMener($tuteur->id,$idCours);


                
                break;
            }


            default:{
                
                break;
            }
        }
    }
}