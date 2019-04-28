<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Accueil</title>
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
    <script src="http://localhost/projet_tutorat2/public/js/formSelect.js"></script>
    <script src="http://localhost/projet_tutorat2/public/js/datePickers.js"></script>
    <script src="http://localhost/projet_tutorat2/public/js/script.js"></script>
</head>
<body>
    
    <!-- Dropdown Structure -->
<ul id="dropdownDemande" class="dropdown-content">
  <li><a href="<?= $this->path ?>?action=add&vue=demande">Faire une demande</a></li>
  <li class="divider"></li>
  <li><a href="<?= $this->path ?>?action=display&vue=demande">Afficher les demandes</a></li>
</ul>

<!-- Dropdown Structure -->
<ul id="dropdownCours" class="dropdown-content">
  <li><a href="<?= $this->path ?>?action=add&vue=cours">Créer un cours</a></li>
  <li class="divider"></li>
  <li><a href="<?= $this->path ?>?action=display&vue=cours">Afficher les cours</a></li>
</ul>

<!-- Dropdown Structure -->
<ul id="dropdownAnalayse" class="dropdown-content">
  <li><a href="<?= $this->path ?>?action=test&vue=test">test</a></li>
  <li><a href="#!">two</a></li>
  <li class="divider"></li>
  <li><a href="#!">three</a></li>
</ul>

<!-- Dropdown Structure -->
<ul id="dropdownMenu" class="dropdown-content">
  <li><a href="<?= $this->path ?>?action=display&vue=connection">Déconnexion</a></li>

</ul>

<!-- navbar content here  --> 
<ul id="slide-out" class="sidenav">
  <ul class="collapsible">
    <li>
      <div class="collapsible-header"><i class="material-icons">filter_drama</i>Demande</div>
      <div class="collapsible-body valign center"><a href="<?= $this->path ?>?action=add&vue=demande">Faire une demande</a></div>
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
    <a href="<?= $this->path ?>?action=display&vue=accueil" class="brand-logo"><img class="responsive-img" src="<?= $this->path ?>/public/images/logo.png" width="60"></a>
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    <ul class="right hide-on-med-and-down">
    <!-- Dropdown Trigger -->
      <li><a class="dropdown-button" data-target="dropdownDemande"><span class="purple-text text-lighten-3">Demande</span><i class="material-icons purple-text text-lighten-3 right">arrow_drop_down</i></a></li>
      <li><a class="dropdown-button" data-target="dropdownCours"><span class="yellow-text text-darken-2">Cours</span> <i class="material-icons yellow-text text-darken-2 right">arrow_drop_down</i></a></li>     
      <li><a class="dropdown-button" data-target="dropdownAnalayse"><span class="blue-text text text-lighten-1">Analyse</span> <i class="material-icons blue-text text-lighten-1 right ">arrow_drop_down</i></a></li>
      <li><a class="dropdown-button" data-target="dropdownMenu"><i class="material-icons left">person</i><?=$prenom.' '.$nom?></a></li>
    </ul>    
  </div>  
</nav>   
<?=$content?>
</body>
</html>