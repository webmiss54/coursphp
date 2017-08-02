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

	$req = $bdd->prepare('UPDATE jeux_video SET possesseur = :new_possesseur WHERE possesseur = :nom_possesseur');
	$req->execute(array(
		'new_possesseur' => $new_possesseur,
		'nom_possesseur' => $nom_possesseur
		));

	$nb_modifs = $req->rowCount();

}
catch (Exception $e) {
	// En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());	
}

echo $nb_modifs . ' entrées ont été modifiées !';

?>
<p><a href="select_all.php">cliquez ici pour voir la liste complète</a></p>


