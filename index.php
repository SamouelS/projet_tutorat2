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
    case 'show':
    {

      break;
    }
    case 'add':
    {

      break;
    }   
    case 'save':
    {

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