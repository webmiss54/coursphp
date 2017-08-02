<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
//phpinfo();

$nom = "Jeu de foot";
$possesseur = "Robert";
$console = "XBOX";
$prix = "150kkk";
$nbre_joueurs_max = 2;
$commentaires = "Très bon jeu";

try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=sta15;charset=utf8', 'sta15', 'YnFuJv2AA6ai58hd');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDException $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}

try {

	// On ajoute une entrée dans la table jeux_video
	$req = $bdd->prepare('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES(:nom, :possesseur, :console, :prix, :nbre_joueurs_max, :commentaires)');
	
	$req->execute(array(
		'nom' => $nom,
		'possesseur' => $possesseur,
		'console' => $console,
		'prix' => $prix,
		'nbre_joueurs_max' => $nbre_joueurs_max,
		'commentaires' => $commentaires
		));

	/*$req->bindParam(':nom', $nom);
	$req->bindParam(':possesseur', $possesseur);
	$req->bindParam(':console', $console);
	$req->bindParam(':prix', $prix, PDO::PARAM_INT);
	$req->bindParam(':nbre_joueurs_max', $nbre_joueurs_max, PDO::PARAM_INT);
	$req->bindParam(':commentaires', $commentaires);

	$req->execute ();*/

}
catch (Exception $e) {
	// En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());	
}

echo 'Le jeu a bien été ajouté !';

?>
<p><a href="select_all.php">cliquez ici pour voir la liste complète</a></p>


