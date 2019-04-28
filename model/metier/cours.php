<?php
namespace model\metier;
class cours
{
   private $id;
   private $tuteur;
   private $participants;
   private $matiere;
   private $theme;
   private $description;
   private $salle;
   private $date;
   private $time;
   private $statut;
   
   function __construct($id,$tuteur,$participants,$matiere,$theme,$description,$salle,$date,$time,$statut){
      $this->id=$id;
      $this->tuteur = $tuteur;
      $this->participants = $participants;
      $this->matiere=$matiere;    
      $this->theme = $theme;
      $this->description=$description;
      $this->salle = $salle;
      $this->date = $date;
      $this->time = $time;
      $this->statut = $statut; 
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
         case 'date' : {
               $this->date = $valeur;
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
         case 'matiere' : {
            return $this->matiere;
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
         case 'date' : {
            return $this->date;
            break;
         } 
         case 'time' : {
            return $this->time;
            break;
         } 
         case 'participants' : {
            return $this->participants;
         }
         case 'tuteur' : {
            return $this->tuteur;
         }
      }
   }
   function addParticipants(){
      
   }
}
?>  