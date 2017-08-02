<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
//phpinfo();

$new_possesseur = "Florent";
$nom_possesseur = "Michel";

try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=sta15;charset=utf8', 'sta15', 'YnFuJv2AA6ai58hd');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}

try {

	$nb_modifs = $bdd->exec('UPDATE jeux_video SET date_enregistrement = FROM_UNIXTIME(FLOOR(RAND()*UNIX_TIMESTAMP()))');
	//$nb_modifs = $bdd->exec('UPDATE jeux_video SET date_enregistrement = NOW()');

}
catch (Exception $e) {
	// En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());	
}

echo $nb_modifs . ' entrées ont été modifiées !';

?>
<p><a href="select_all.php">cliquez ici pour voir la liste complète</a></p>


