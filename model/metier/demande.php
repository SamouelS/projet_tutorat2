<?php
namespace model\metier;
class demande
{
    private $id;
    private $etudiant;
    private $matiere;
    private $theme;
    private $description;

    
    function __construct($id,$matiere,$etudiant,$theme,$description){
        $this->id=$id;
        $this->matiere=$matiere;
        $this->etudiant=$etudiant;      
        $this->theme = $theme;
        $this->description=$description;
    }

    public function __set($propriete, $valeur) {
		switch ($propriete) {
			case 'id' : {
				$this->id = $valeur;
				break;
			}
			case 'id_etudiant' : {
				$this->id_etudiant = $valeur;
				break;
			}
			case 'id_matiere' : {
				$this->id_matiere = $valeur;
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
            case 'id_etudiant' : {
				return $this->id_etudiant;
				break;
			}
			case 'id_matiere' : {
				return $this->id_matiere;
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
    	}
    }
}
?>  