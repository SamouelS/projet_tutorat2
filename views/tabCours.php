<?php
$content = '
<div class="z-depth-5">
    <table class="responsive-table tableDemande">
        <thead>
            <tr>
                <th>Tuteur</th>
                <th>Matière</th>
                <th>Thème</th>
                <th>Description</th>
                <th>Salle</th>
                <th>Date</th>
                <th>Heure</th>
            </tr>
        </thead>
        <tbody>';
if(isset($this->model->lesCours[0]))
{


    foreach ($this->model->lesCours as $unCours) {
        if($this->userCo->id == $unCours->tuteur->id)
        {
            $content = $content.'
            <tr>
                <td>'.$unCours->tuteur->prenom.' '.$unCours->tuteur->nom.'</td>
                <td>'.$unCours->matiere->libelle.'</td>
                <td>'.$unCours->theme.'</td>
                <td class="description">'.$unCours->description.'</td>
                <td>'.$unCours->salle.'</td>
                <td>'.$unCours->date.'</td>
                <td>'.$unCours->time.'</td>
                <td>
                    <form action="'.$this->path.'/index.php?action=save&vue=participants" method="post">
                        <input type="hidden" name="idDemande" value="'.$this->userCo->id.'">
                        <input type="submit" value="Annuler le cours">
                    </form>
                </td>
            </tr>'; 
        }
        else{
            $content = $content.'
            <tr>
                <td>'.$unCours->tuteur->prenom.' '.$unCours->tuteur->nom.'</td>
                <td>'.$unCours->matiere->libelle.'</td>
                <td>'.$unCours->theme.'</td>
                <td class="description">'.$unCours->description.'</td>
                <td>'.$unCours->salle.'</td>
                <td>'.$unCours->date.'</td>
                <td>'.$unCours->time.'</td>
                <td>
                    <form action="'.$this->path.'/index.php?action=save&vue=participants" method="post">
                        <input type="hidden" name="idDemande" value="'.$this->userCo->id.'">
                        <input type="submit" value="S\'inscrire">
                    </form>
                </td>
            </tr>';
        }     
    }






}
$content = $content.'
        </tbody>
    </table>
    </div>';

?>