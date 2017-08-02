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

	$reponse = $bdd->query('SELECT LENGTH(nom) AS longueur_nom, nom FROM jeux_video');

	echo '<h1>Nombre de caractères de chaque jeux :</h1>';

	while ($donnees = $reponse->fetch())
	{
		echo "Le jeu : " . $donnees['nom'] . ' comporte ' . $donnees['longueur_nom'] . ' caractères<br />';
	}

	$reponse->closeCursor();
}
catch (Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());	
}

?>


