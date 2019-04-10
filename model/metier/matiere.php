<?php
namespace model\metier;
class matiere
{
    private $id;
    private $libelle;

    function __construct($id,$libelle){
        $this->id=$id;
        $this->libelle=$libelle;
    }
    public function __set($propriete, $valeur) {
		switch ($propriete) {
			case 'id' : {
				$this->id = $valeur;
				break;
			}
			case 'libelle' : {
				$this->libelle = $valeur;
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
            case 'libelle' :
    		{
    			return $this->libelle;
    			break;
            }
    	}
    }
}
?>  