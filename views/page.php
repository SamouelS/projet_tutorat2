<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <link rel="stylesheet" href="http://localhost/projet_tutorat2/public/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" >
    <link rel="stylesheet" href="http://localhost/projet_tutorat2/public/css/materialize.css">
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://localhost/projet_tutorat2/public/js/materialize.js"></script>
    <script src="http://localhost/projet_tutorat2/public/js/dropdown.js"></script>
</head>
<body>    
    <!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
  <li><a href="#!">one</a></li>
  <li><a href="#!">two</a></li>
  <li class="divider"></li>
  <li><a href="#!">three</a></li>
</ul>
<nav>
  <div class="nav-wrapper">
    <a href="#!" class="brand-logo">Logo</a>
    <ul class="right hide-on-med-and-down">
      <li><a href="#">Sass</a></li>
      <li><a href="#">Components</a></li>
      <!-- Dropdown Trigger -->
      <li><a class="dropdown-button" href="#!" data-target="dropdown1">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>
  </div>
</nav>    
</body>
</html>