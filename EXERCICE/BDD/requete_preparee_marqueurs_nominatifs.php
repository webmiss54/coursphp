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

if (!empty($_GET['possesseur']) && !empty($_GET['prixmax']) && !empty($_GET['order'])) {

	$req = $bdd->prepare('SELECT nom, prix FROM jeux_video WHERE possesseur = :possesseur  AND prix <= :prixmax ORDER BY ' . htmlspecialchars($_GET['order']));

	$req->execute(array("possesseur" => htmlspecialchars($_GET['possesseur']), "prixmax" => (int)$_GET['prixmax']));

	echo "<p>Jeux appartenant à : " . $_GET['possesseur'] . "</p>";
	echo '<ul>';
	while ($donnees = $req->fetch())
	{
		echo '<li>' . $donnees['nom'] . ' (' . $donnees['prix'] . ' EUR)</li>';
	}
	echo '</ul>';

	$req->closeCursor();

}

?>
<a href="requete_preparee_marqueurs_nominatifs.php?possesseur=patrick&prixmax=100&order=prix">voir les résultats</a>


