<?php
include_once('controllers/controller.php');

if (empty(file_get_contents('cache')))
{
  $controller=new controller();
  file_put_contents('cache', serialize($controller));
}
else
{
  $controller = unserialize(file_get_contents('cache'));
}

if(isset($_GET['action']) && isset($_GET['vue'])) 
{
  switch ($action = $_GET['action']) 
  {
    case 'display':{
      switch ($vue = $_GET['vue']) {
        case 'accueil':{
          $controller->displayPage('accueil'); 
          break;
        }
        case 'connection':{
          $controller->displayPage('connection');
          break;
        }
        case 'demande':{
          $controller->displayPage('demande');
          break;
        }
      }
    break;
    }
    case 'add':{
      switch ($vue = $_GET['vue']) {
        case 'compte':{
          $controller->displayPage('compte');
          break;
        }    
        case 'demande':{
          $controller->displayPage('formDemande');
          break;
        }  
        case 'cours':{
          if(isset($_POST['idDemande'])){
            $params['idDemande']=$_POST['idDemande'];
          }
          else{
            $params = '';
          }
          $controller->displayPage('formCours',$params);
          break;
        }      
        default:{
          echo 'error vue';
          break;
        }
      }
    break;
    }   
    case 'save':{
      switch ($vue = $_GET['vue']) {
        case 'etudiant':{
          $params['nom']=$_POST['nom'];
          $params['prenom']=$_POST['prenom'];
          $params['username']=$_POST['username'];
          $params['mdp']=$_POST['mdp'];
          $params['discord']=$_POST['discord'];
          $params['idClasse']=$_POST['idClasse'];

          $controller->save($vue,$params);
          break;
        }
        case 'demande':{
          $params['idMatiere']=$_POST['idMatiere'];
          $params['theme']=$_POST['theme'];
          $params['description']=$_POST['description'];


          $controller->save($vue,$params);
          break;
        }
        default:{
          echo 'error vue';
          break;
        }
      }
      break;
    } 
    case 'check':
    {
      $params['username']= $_POST['username'];
      $params['password']=$_POST['password'];
      $controller->check($params); 
      break;
    }
    default :
    {
      echo "vue ou action erroné";
    }  
  } 
}
else{
  $controller->displayPage('connection');
}