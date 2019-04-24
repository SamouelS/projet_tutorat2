<?php
$checkboxesClasses = '';
foreach($this->model->lesClasses as $uneClasse)
{
    $checkboxesClasses = $checkboxesClasses.'<label>';
    if($uneClasse->id == $this->userCo->uneClasse->id)
    {
        $checkboxesClasses = $checkboxesClasses.'<input type="checkbox" name="idClasse" value="'.$uneClasse->id.'" checked/><span>'.$uneClasse->niveau.$uneClasse->numClasse.'</span></label>';
    }
    else{
        $checkboxesClasses = $checkboxesClasses.'<input type="checkbox" name="idClasse" value="'.$uneClasse->id.'"/><span>'.$uneClasse->niveau.$uneClasse->numClasse.'</span></label>';
    }   
        
}

?>