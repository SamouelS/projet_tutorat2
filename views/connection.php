<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>LOGIN</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="http://localhost/projet_tutorat2/public/css/styleConnexion.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>

<body>

  <div class="col s12 m6">
    <div class="card blue-grey darken-1">
     <form action="<?= $this->path ?>/index.php?action=check&vue=connection" method="post" >
        <div class="card-content white-text">

          <span class="card-title">
            <h3> Login </h3>
          </span>

          <div class="input-field col s6">
            <input id="username" name="username" type="text" class="validate" required>
            <label class="active" for="username">Username</label>
          </div>
          <div class="input-field col s12">
            <input id="password" name="password"type="password" class="validate" required>
            <label for="password">Password</label>
          </div>
          
          <a href="<?= $this->path ?>/index.php?action=add&vue=compte">Créer un compte ?</a>
        </div>
        <div class="card-action">
          <button class="btn waves-effect waves-light" type="submit">Log on   
            <i class="material-icons right">send</i>
          </button>
        </div>
      </form>
    </div>
  </div>


</body>

</html>