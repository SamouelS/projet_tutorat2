<?php
ini_set('xdebug.var_display_max_depth', '-1');
ini_set('xdebug.var_display_max_children', '-1');
ini_set('xdebug.var_display_max_data', '-1');



//$utilisateurCo = $_POST['utilisateurCo'];
//$demandeur = $_POST['demandeur'];
$etudiants = $_POST['etudiants'];
$date = new DateTime($date =$_POST['date']);
$date = $date->format('m/d/Y');


for($h=80;$h<190;$h+=5)
{
	$tab [0][$h.'-'.$hf=$h+5]=0;
}
foreach($etudiants as $unEtudiant)
{
	$pageHTML = file_get_contents("http://edtmobilite.wigorservices.net/WebPsDyn.aspx?Action=posETUD&serverid=h&Tel=".$unEtudiant."&date=".$date."%208:00");
	preg_match_all('/<div class="Ligne".*?<div class="Debut">(\d{2}:\d{2}).*?<div class="Fin">(\d{2}:\d{2})/', $pageHTML, $matches);
	for($i=0;$i<count($matches[1]);$i++)
	{
		$hd = $matches[1][$i];
		$hf = $matches[2][$i];
		$hd= preg_replace('/:3/',':5',$hd);
		$hd= preg_replace('/:/','',$hd);
		$hf= preg_replace('/:3/',':5',$hf);
		$hf= preg_replace('/:/','',$hf);

		for($x= intval(substr($hd,0,3));$x < substr($hf,0,3);$x+=5)
		{
			$tab[0][$x.'-'.$xf=$x+5]=1;
		}
		
	}
}
$vretour = array_keys($tab[0],'0');
	foreach ($vretour as $key=>$value){
		$value = preg_replace("/0-\d*/",':00', $value);
		$value = preg_replace("/5-\d*/",':30', $value);

		$vretour[$key]= $value;
	}
echo json_encode($vretour);


?>
