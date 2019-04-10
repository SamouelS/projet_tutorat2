<?php
namespace model\metier;
class cours
{
    private $id;
    private $idMatiere;
    private $theme;
    private $description;
    private $niveau;
    private $salle;
    private $statut;
    private $dateTime;

    
    function __construct($id,$idMatiere,$theme,$description,$salle,$niveau,$statut,$dateTime){
        $this->id=$id;
        $this->idMatiere=$idMatiere;    
        $this->theme = $theme;
        $this->description=$description;
        $this->niveau = $niveau;
        $this->salle = $salle;
        $this->statut = $statut;
        $this->dateTime=$dateTime;
        //$this->dateTime = new DateTime();
        //$this->dateTime = DateTime::createFromFormat('d/m/Y H:i', $dateTime);
    }

    public function __set($propriete, $valeur) {
		switch ($propriete) {
			case 'id' : {
				$this->id = $valeur;
				break;
			}
			case 'idMatiere' : {
				$this->idMatiere = $valeur;
				break;
            } 
            case 'theme' : {
				$this->theme = $valeur;
				break;
			}
			case 'description' : {
				$this->description = $valeur;
				break;
            }    
            case 'salle' : {
                $this->salle = $valeur;
                break;
            }   
            case 'niveau' : {
                $this->niveau= $valeur;
                break;
            }  
            case 'dateTime' : {
                $this->dateTime = $valeur;
                break;
            }     
            case 'statut' : {
                $this->statut = $valeur;
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
    		case 'id' :
    		{
    			return $this->id;
    			break;
            }
            case 'niveau' : {
				return $this->niveau;
				break;
			}
			case 'idMatiere' : {
				return $this->idMatiere;
				break;
            } 
            case 'theme' : {
				return $this->theme;
				break;
			}
			case 'description' : {
				return $this->description;
				break;
            } 
            case 'salle' : {
				return $this->salle;
				break;
            }
            case 'statut' : {
				return $this->statut;
				break;
            }    
            case 'dateTime' : {
				return $this->dateTime;
				break;
            } 
    	}
    }
}
?>  