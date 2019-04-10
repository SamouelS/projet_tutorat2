<?php
namespace model\metier;
class classe
{
    private $id;
    private $niveau;
    private $numClasse;
	private $etudiantRef;
    
    function __construct($id,$niveau,$numClasse,$etudiantRef){
        $this->id=$id;
        $this->niveau = $niveau;
		$this->numClasse = $numClasse;
		$this->etudiantRef = $etudiantRef;
    }
    public function __set($propriete, $valeur) {
		switch ($propriete) {
			case 'id' : {
				$this->id = $valeur;
				break;
			}
			case 'niveau' : {
				$this->niveau = $valeur;
				break;
			}
			case 'numClasse' : {
				$this->numClasse = $valeur;
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
            case 'niveau' :
    		{
    			return $this->niveau;
    			break;
            }
            case 'numClasse' :
    		{
    			return $this->numClasse;
    			break;
			}
			case 'etudiantRef' : 
			{
				return $this->etudiantRef;
			}
    	}
	}
}
?>  