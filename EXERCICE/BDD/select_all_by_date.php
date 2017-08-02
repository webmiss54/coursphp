<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
//phpinfo();


try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=sta15;charset=utf8', 'sta15', 'YnFuJv2AA6ai58hd');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table jeux_video
//$reponse = $bdd->query('SELECT * FROM jeux_video ORDER BY ID DESC');
$reponse = $bdd->query('SELECT ID,nom, possesseur, prix, console, nbre_joueurs_max, commentaires, DATE_FORMAT(date_enregistrement, \'%d/%m/%Y %H:%i:%s\') AS date_enregistrement_fr FROM jeux_video ORDER BY date_enregistrement');
//$reponse = $bdd->query('SELECT * FROM jeux_video WHERE possesseur = \'Michel\' OR possesseur = \'Florent\' ORDER BY ID DESC');

?>

<table border="1">
	<tr>
		<th><strong>Jeu</strong></th>
		<th>ID</th>
		<th>POSSESSEUR</th>
		<th>PRIX</th>
		<th>CONSOLE</th>
		<th>NB JOUEURS</th>
		<th>COMMENTAIRES</th>
		<th>DATE ENREGISTREENT</th>
	</tr>
<?php
// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
		<tr>
			<td><?php echo $donnees['nom']; ?></td>
			<td><?php echo $donnees['ID']; ?></td>
			<td><?php echo $donnees['possesseur']; ?></td>
			<td><?php echo $donnees['prix']; ?></td>
			<td><?php echo $donnees['console']; ?></td>
			<td><?php echo $donnees['nbre_joueurs_max']; ?></td>
			<td><?php echo $donnees['commentaires']; ?></td>
			<td><?php echo $donnees['date_enregistrement_fr']; ?></td>
		</tr>
<?php
}

?>
	</table>
<?php

$reponse->closeCursor(); // Termine le traitement de la requête

?>
