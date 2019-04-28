<?php
$content ='
<form action="'.$this->path.'/index.php?action=save&vue=cours" method="post">
    <div class="row">
        <div class="col s3 "></div>
        <div class="col s6 ">
            <div class="card blue-grey darken-1 s12">
                <div class="card-content white-text">

                    <span class="card-title">
                        <h5>Création d\'un cours</h5>
                    </span>

                    <div class="row" style="margin-top:25px;">

                        '.$comboboxMatieres.'

                        <div class="input-field col s12">
                            <input id="theme" name="theme" type="text" value="'.$theme.'" required>
                            <label for="theme">Thème</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="description" name="description" type="text" value="'.$description.'">
                            <label for="description">Description</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="salle" name="salle" type="text" required>
                            <label for="salle">Salle</label>
                        </div>

                        '.$checkboxesClasses.'
                        <script type="text/javascript">$("input[type=\'checkbox\']").change(function(){myFunction2();});</script>
                           
                        <div class="input-field col s12">
                            <input id="datePicker" name="date" type="text" class="datepicker" onchange="myFunction2()" required>
                            <label for="datePicker">Date du cours ?</label>
                        </div>
                        
                        <div class="input-field col s12">
                            <select id="comboboxHoraires" name="time" required>

                            </select>
                            <label>Quelle heure ?</label>
                        </div>
                        
                    </div>
                </div>
                <div class="card-action">
                    <button class="btn waves-effect waves-light" type="submit">Créer le cours
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </div>
</form>
';
?>