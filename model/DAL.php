<?php
namespace model;
use \PDO;
class DAL
{
    private $hote;
    private $dbname;
	private $username;
	private $password;
    private $pdo;
    
    function __construct()
    {
        $this->hote="localhost";
		$this->username="root";
		$this->password="";
        $this->dbname="projet_tutorat";
        $this->connect();
        
        //$this->db = new PDO('mysql:host=localhost;dbname=projet_tutorat;charset=utf8', 'root');
    }
    private function connect()
    {
        $this->pdo = new PDO('mysql:host='.$this->hote.';dbname='.$this->dbname, $this->username, $this->password);
    }
    public function __sleep()
    {
        return array('hote','dbname','username','password');
    }

    public function __wakeup()
    {
        $this->connect();
    }

    private function connexion()
	{
		if($conn=mysqli_connect($this->hote,$this->login,$this->passwd,$this->base))
		{
			return $conn;
		}
		else
		{
            echo "Fail<br>";
            die(mysql_error());
		}
    }
    private function execRequete($uneRequete)
    {		
        $result = $this->pdo->query($uneRequete);
        if($result){
           return $result; 
        }
        else{
            echo "\nPDO::errorInfo():\n";
            print_r($this->pdo->errorInfo());
        }
        
    }

    public function insertEtudiant($params){      
        $requete = 'CALL insertEtudiant("'.$params['nom'].'","'.$params['prenom'].'","'.$params['username'].'","'.$params['mdp'].'","'.$params['discord'].'",'.$params['idClasse'].')';      
        $this->execRequete($requete);

        $result = $this->execRequete('SELECT id FROM etudiant ORDER BY id DESC LIMIT 1');
        return $result->fetch()[0];
    }
    public function insertDemande($param)
    {
        $requete = 'INSERT INTO demander(idMatiere,idEtudiant,theme,description) VALUES ('.$param['idMatiere'].','.$param['idEtudiant'].',\''.$param['theme'].'\',\''.$param['description'].'\')';      
        $resultat = $this->execRequete($requete);

        $result = $this->execRequete('SELECT id FROM demander ORDER BY id DESC LIMIT 1');
        return $result->fetch()[0];
    }
    public function insertCours($params)
    {
        $requete = 'CALL insertCours('.$params['idMatiere'].',"'.$params['theme'].'","'.$params['description'].'","'.$params['salle'].'","'.$params['date'].'","'.$params['time'].'","'.$params['statut'].'")';      
        $this->execRequete($requete);

        $result = $this->execRequete('SELECT id FROM cours ORDER BY id DESC LIMIT 1');
        return $result->fetch()[0];
    }
    public function insertMener($idTuteur,$idCours)
    {
        $requete = 'INSERT INTO mener(id_cours,id_etudiant) VALUES ('.$idCours.','.$idTuteur.')';
        $this->execRequete($requete);
    }
    public function ajoutParticiper($id_cours,$id_etudiant)
    {
        $requete = 'INSERT INTO participer(id_cours,id_etudiant) VALUES ('.$id_cours.','.$id_etudiant.')';
        $resultat = $this->execInsertRequete($requete);
        return $resultat;
    }
    public function listeClasses()
    {
        return $this->execRequete('SELECT * FROM classe');

    }
    public function listeEtudiants()
    {
        return $this->execRequete('SELECT * FROM etudiant');
    }  
    public function listeMener()
    {
        return $this->execRequete('SELECT * FROM mener');
    }   
    public function listeMatieres()
    {
        return $this->execRequete('SELECT * FROM matiere');
    }
    public function listeDemandes()
    {
        return $this->execRequete('SELECT * FROM demander');
    }
    public function listeCours()
    {
        return $this->execRequete('SELECT * FROM cours');
    }
    public function listeParticiper()
    {
        return $this->execRequete('SELECT * FROM participer');
    }
    public function getLastIdCours()
    {
        $resultat = $this->execRequete('SELECT id FROM cours ORDER BY id DESC LIMIT 1');
        return mysqli_fetch_array($resultat, MYSQLI_NUM)[0];
    }
    public function getParticipations($id)
    {
        return $this->execRequete('CALL getParticipations('.$id.')');
    }
    public function getEnseignements($id)
    {
        return $this->execRequete('CALL getEnseignements('.$id.')');
    }
    public function getTuteur($id)
    {
        return $this->execRequete('CALL getTuteur('.$id.')');
    }
    public function getParticipants($id)
    {
        return $this->execRequete('CALL getParticipants('.$id.')');
    }
}