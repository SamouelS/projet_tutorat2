<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Page Title</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="http://localhost/projet_tutorat2/public/css/styleConnexion.css">
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


</head>

<body>
    <form class="col s12">
        <div class="card blue-grey darken-1">

            <div class="card-content white-text">

                <span class="card-title">
                    <h5>Create account</h5>
                </span>

                <div class="row">
                    <div class="input-field col s6">
                        <input id="first_name" type="text" class="validate">
                        <label for="first_name">First Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="last_name" type="text" class="validate">
                        <label for="last_name">Last Name</label>
                    </div>
                </div>

                <div class="input-field col s12">
                    <input id="username" type="text" class="validate">
                    <label for="username">Username</label>
                </div>

                <div class="input-field col s12">
                    <input id="password" type="password" class="validate" minlength=6>
                    <label for="password">Password</label>
                    <span class="helper-text" data-error="6 characters required" data-success="right"></span>
                </div>

                <div class="input-field col s12">
                    <input id="discord" type="text" class="validate">
                    <label for="discord">Discord</label>
                </div>

                <div class="card-action">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Create
                        <i class="material-icons right">send</i>
                    </button>
                </div>

            </div>
        </div>
    </form>
</body>

</html>