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

if(isset($_GET['action'])) 
{
  switch ($action = $_GET['action']) 
  {
    case 'data':
    {
      $monCtrl->afficheData();
      break;
    }
    case 'add':
    {
      $monCtrl->add();
      file_put_contents('cache', serialize($monCtrl));
      $monCtrl->affichePage();  
      break;
    }     
  }
}
else{
  $controller->test();
  
}
