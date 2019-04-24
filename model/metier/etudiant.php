<?php
namespace model\metier;
class etudiant
{
	private $id;
    private $nom;
    private $prenom;
    private $username;
    private $mdp;
	private $discord;
	private $bts;	
	private $admin;
	private $uneClasse;
	private $lesParticipations;
	private $lesEnseignements;
    
    function __construct($id,$nom,$prenom,$username,$mdp,$discord,$bts,$admin,$uneClasse,$lesParticipations,$lesEnseignements){
		$this->id = $id;
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->username = $username;
		$this->mdp = $mdp;
		$this->discord = $discord;
		$this->bts = $bts;
		$this->admin = $admin;
		$this->uneClasse = $uneClasse;
		$this->lesParticipations = $lesParticipations;
		$this->lesEnseignements = $lesEnseignements;
	}
	
    public function __set($propriete, $valeur) {
		switch ($propriete) {
			case 'nom' : {
				$this->nom = $valeur;
				break;
			}
			case 'prenom' : {
				$this->prenom = $valeur;
				break;
			}
			case 'username' : {
				$this->username = $valeur;
				break;
			}
			case 'mdp' : {
				$this->mdp = $valeur;
				break;
			}
			case 'discord' : {
				$this->discord = $valeur;
				break;
			}
			case 'num_secu' : {
				$this->num_secu = $valeur;
				break;
			}
			case 'admin' : {
				$this->admin = $valeur;
				break;
            }
            
			default:
			{
				$trace = debug_backtrace();
				trigger_error(
            'Propriété non-accessible via __set() : ' . $propriete .
            ' dans ' . $trace[0]['file'] .
            ' à la ligne ' . $trace[0]['line'],
            E_USER_NOTICE);

				break;
			}

		}
	}
	public function __get($propriete) {
		switch ($propriete) {
			case 'id' : {
				return $this->id;
			}
			case 'nom' : {
				return $this->nom;
				break;
			}
			case 'prenom' : {
				return $this->prenom ;
				break;
			}
			case 'username' : {
				return $this->username;
				break;
			}
			case 'mdp' : {
				return $this->mdp;
				break;
			}
			case 'discord' : {
				return $this->discord;
				break;
			}
			case 'bts' : {
				return $this->bts;
				break;
			}
			case 'uneClasse' : {
				return $this->uneClasse;
				break;
			}
			case 'admin' : {
				return $this->admin;
				break;
            }
		}
	}
}
?>  