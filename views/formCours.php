<?php
$content ='
<form action="'.$this->path.'/index.php?action=save&vue=demande" method="post">
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

                        <div class="input-field s12">
                            <input id="theme" name="theme" type="text" value="'.$theme.'">
                            <label for="theme">Thème</label>
                        </div>
                        <div class="input-field s12">
                            <input id="description" name="description" type="text">
                            <label for="description">Description</label>
                        </div>
                        <div class="input-field s12">
                            <input id="salle" name="salle" type="text">
                            <label for="salle">Salle</label>
                        </div>

                        '.$checkboxesClasses.'

                        <div class="input-field s12">
                            <input id="picker" type="text" class="datepicker">
                            <label for="picker">Date du cours ?</label>
                        </div>
                        <select id="comboboxHoraires" name="time"></select>

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