<?php
$checkboxesClasses = '';

foreach($this->model->lesClasses as $uneClasse)
{
    if($uneClasse->id == $this->userCo->uneClasse->id)
    {
        $checkboxesClasses = $checkboxesClasses.'<div class="col s3"><label><input type="checkbox" name="etudiantRef" value="'.$uneClasse->etudiantRef.'" checked/><span>'.$uneClasse->niveau.$uneClasse->numClasse.'</span></label></div>';
    }
    else{
        $checkboxesClasses = $checkboxesClasses.'<div class="col s3"><label><input type="checkbox" name="etudiantRef" value="'.$uneClasse->etudiantRef.'"/><span>'.$uneClasse->niveau.$uneClasse->numClasse.'</span></label></div>';
    }   
}
?>