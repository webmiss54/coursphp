<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
//phpinfo();

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

try
{

	$reponse = $bdd->query('SELECT AVG(prix) AS prix_moyen FROM jeux_video');
	//$reponse = $bdd->query('SELECT ROUND(AVG(prix), 0) AS prix_moyen FROM jeux_video');

	$donnees = $reponse->fetch();

	echo '<h1>Prix moyen des jeux :</h1>';

	echo $donnees['prix_moyen'] .  "€";

	$reponse->closeCursor();
}
catch (Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());	
}

?>


