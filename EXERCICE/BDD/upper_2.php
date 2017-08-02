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

	$reponse = $bdd->query('SELECT UPPER(nom) AS nom_maj, possesseur, console, prix FROM jeux_video');

	echo '<h1>Voici la liste des jeux en lettres minuscules :</h1>';

	while ($donnees = $reponse->fetch())
	{
		echo $donnees['nom_maj'] . ' de ' . $donnees['possesseur'] . ' pour ' . $donnees['console'] . ' vaut ' . $donnees['prix'] . '€<br />';
	}

	$reponse->closeCursor();
}
catch (Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());	
}

?>


