<?php
$content = '
<div class="z-depth-5">
    <table class="responsive-table tableDemande">
        <thead>
            <tr>
                <th>Demandeur</th>
                <th>Matière</th>
                <th>Thème</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>';
foreach ($this->model->lesDemandes as $uneDemande) {
    $content = $content.'
            <tr>
                <td>'.$uneDemande->etudiant->prenom.' '.$uneDemande->etudiant->nom.'</td>
                <td>'.$uneDemande->matiere->libelle.'</td>
                <td>'.$uneDemande->theme.'</td>
                <td class="description">'.$uneDemande->description.'</td>
                <td>
                    <form action="'.$this->path.'/index.php?action=add&vue=cours" method="post">
                        <input type="hidden" name="idDemande" value="'.$uneDemande->id.'">
                        <input type="submit" value="repondre a la demande">
                    </form>
                </td>
            </tr>';
}
$content = $content.'
        </tbody>
    </table>
    </div>';

?>