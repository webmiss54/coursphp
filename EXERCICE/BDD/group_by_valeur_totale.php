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

	// Si tout va bien, on peut continuer
	$reponse = $bdd->query('SELECT SUM(prix) AS valeur_total, possesseur FROM jeux_video GROUP BY possesseur');

	echo '<h1>Voici la valeur totale des jeux que possède chaque personne :</h1>';

	// On affiche chaque entrée une à une
	while ($donnees = $reponse->fetch())
	{
	?>
	    <p>
	    <strong>Valeur total</strong> : <?php echo $donnees['valeur_total']; ?>€ ::: <strong>possesseur</strong> : <?php echo $donnees['possesseur']; ?>
	   </p>
	<?php
	}

	$reponse->closeCursor(); // Termine le traitement de la requête
}
catch (Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());	
}

?>
