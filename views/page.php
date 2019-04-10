<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <!-- style.css -->
    <link rel="stylesheet" href="http://localhost/projet_tutorat2/public/css/style.css">
    <!-- icons.css -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" >
    <!-- materialize.css -->
    <link rel="stylesheet" href="http://localhost/projet_tutorat2/public/css/materialize.css">
    <!-- jquery.js -->
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <!-- materialize.js -->
    <script src="http://localhost/projet_tutorat2/public/js/materialize.js"></script>
    <!-- dropdown.js -->
    <script src="http://localhost/projet_tutorat2/public/js/dropdown.js"></script>
    <!-- dropdown.js -->
    <script src="http://localhost/projet_tutorat2/public/js/sidenav.js"></script>
    <!-- collapsible.js -->
    <script src="http://localhost/projet_tutorat2/public/js/collapsible.js"></script>
</head>
<body>
    
    <!-- Dropdown Structure -->
<ul id="dropdownDemande" class="dropdown-content">
  <li><a href="#!">Faire une demande</a></li>
  <li class="divider"></li>
  <li><a href="#!">Afficher les demandes</a></li>
</ul>

<!-- Dropdown Structure -->
<ul id="dropdownCours" class="dropdown-content">
  <li><a href="#!">Créer un cours</a></li>
  <li class="divider"></li>
  <li><a href="#!">Afficher les cours</a></li>
</ul>

<!-- Dropdown Structure -->
<ul id="dropdownAnalayse" class="dropdown-content">
  <li><a href="#!">one</a></li>
  <li><a href="#!">two</a></li>
  <li class="divider"></li>
  <li><a href="#!">three</a></li>
</ul>

<!-- navbar content here  --> 
<ul id="slide-out" class="sidenav">
  <ul class="collapsible">
    <li>
      <div class="collapsible-header"><i class="material-icons">filter_drama</i>Demande</div>
      <div class="collapsible-body valign center"><a href="#!">Faire une demande</a></div>
      <div class="collapsible-body valign center"><a href="#!">Afficher les demandes</a></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">place</i>Cours</div>
      <div class="collapsible-body valign center"><a href="#!">Créer un cours</a></div>
      <div class="collapsible-body valign center"><a href="#!">Afficher les cours</a></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">whatshot</i>Analyse</div>
      <div class="collapsible-body valign center"><a href="#!">Annalyse 1</a></div>
    </li>
  </ul>
        
  
</ul>
  
  
<nav>
  <div class="nav-wrapper grey darken-2">
    <a href="#!" class="brand-logo"><img class="materialboxed" width="60" src="http://localhost/projet_tutorat2/public/images/logo.png"></a>
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    <ul class="right hide-on-med-and-down">
    <!-- Dropdown Trigger -->
      <li><a class="dropdown-button" data-target="dropdownDemande"><span class="purple-text text-lighten-3">Demande</span><i class="material-icons purple-text text-lighten-3 right">arrow_drop_down</i></a></li>
      <li><a class="dropdown-button" data-target="dropdownCours"><span class="yellow-text text-darken-2">Cours</span> <i class="material-icons yellow-text text-darken-2 right">arrow_drop_down</i></a></li>     
      <li><a class="dropdown-button" data-target="dropdownAnalayse"><span class="blue-text text text-lighten-1">Analyse</span> <i class="material-icons blue-text text-lighten-1 right ">arrow_drop_down</i></a></li>
    </ul>    
  </div>  
</nav>   
<div class="col s12 m2">
  <div class="z-depth-5">
    <div class="content">
      <ul class="collection with-header">
        <li class="collection-header"><h4>First Names</h4></li>
        <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
        <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
        <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
        <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
      </ul>
    </div>
  </div>
</div>
</body>
</html>