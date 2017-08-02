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

	$reponse = $bdd->query('SELECT AVG(prix) AS prix_moyen, console FROM jeux_video GROUP BY console');


	echo '<h1>Voici la liste des consoles et le prix moyen des jeux associés :</h1>';

	// On affiche chaque entrée une à une
	while ($donnees = $reponse->fetch())
	{
	?>
	    <p>
	    <strong>Prix moyen</strong> : <?php echo $donnees['prix_moyen']; ?> ::: <strong>Console</strong> : <?php echo $donnees['console']; ?>
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
