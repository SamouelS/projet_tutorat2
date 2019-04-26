<?php
$comboboxMatieres ='<div class="input-field col s12"><select name="idMatiere" required><option value="" disabled selected>Choose your option</option>';      
foreach ($this->model->lesMatieres as $uneMatiere) 
{
    $comboboxMatieres = $comboboxMatieres.'<option value="'.$uneMatiere->id.'">'.$uneMatiere->libelle.'</option>';
}
$comboboxMatieres = $comboboxMatieres.'</select><label>Matières : </label></div>';
?>