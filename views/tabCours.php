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
            </tr>
        </thead>
        <tbody>';
if(isset($this->model->lesCours[0]))
{
    foreach ($this->model->lesCours as $unCours) {
        $content = $content.'
                <tr>
                    <td>'.$unCours->tuteur->prenom.' '.$unCours->tuteur->nom.'</td>
                    <td>'.$unCours->matiere->libelle.'</td>
                    <td>'.$unCours->theme.'</td>
                    <td class="description">'.$unCours->description.'</td>
                    <td>
                        <form action="'.$this->path.'/index.php?action=save&vue=participants" method="post">
                            <input type="hidden" name="idDemande" value="'.$this->userCo->id.'">
                            <input type="submit" value="S\'inscrire">
                        </form>
                    </td>
                </tr>';
    }
}
$content = $content.'
        </tbody>
    </table>
    </div>';

?>