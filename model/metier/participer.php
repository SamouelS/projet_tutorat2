<?php
namespace model\metier;
class participer
{
    private $id_cours;
    private $id_etudiant;


    function __construct($id_cours,$id_etudiant){
        $this->id_cours = $id_cours;
        $this->id_etudiant = $id_etudiant;
    }

    public function __set($propriete, $valeur) {
		switch ($propriete) {
			case 'id_cours' : {
				$this->id_cours = $valeur;
				break;
			}
			case 'id_etudiant' : {
				$this->id_etudiant = $valeur;
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
    		case 'id_cours' :
    		{
    			return $this->id_cours;
    			break;
            }
            case 'id_etudiant' :
    		{
    			return $this->id_etudiant;
    			break;
            }
    	}
    }
}
?>  