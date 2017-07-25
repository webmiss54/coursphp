<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
//phpinfo();

if (!isset($_GET['limit']) || !isset($_GET['limitstart'])) {

	//on sélectionne les 10 premiers enregistrements par défaut
	$limit 		= 10;
	$limitstart = 0;

	?>
	<p style="color: #f00">On sélectionne les 10 premiers enregistrements par défaut!!!</p>
	<?php

} else {

	$limit 		= (int)$_GET['limit'];
	$limitstart = (int)$_GET['limitstart'];

	if ($limitstart == $limit && $limit == 0) {

		//on sélectionne les 10 premiers enregistrements par défaut
		$limit = 10;

	} elseif ($limit < $limitstart) {

		?>
		<p style="color: #f00">LIMIT doit être supérieur à LIMITSTART</p>
		<p style="color: #f00">On sélectionne les 10 premiers enregistrements par défaut!!!</p>
		<?php
		//ON PREND LES DIX PREMIERS ENREGISTREMENTS
		$limit 		= 10;
		$limitstart = 0;

	}
}

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

// Si tout va bien, on peut continuer

$reponse = $bdd->query('SELECT nom, possesseur, console, prix FROM jeux_video WHERE console=\'Xbox\' OR console=\'PS2\' ORDER BY prix DESC LIMIT ' . $limitstart . ','. $limit);

echo '<p>Voici les 10 premières entrées de la table jeux_video :</p>';

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
    <p>
    <strong>Jeu</strong> : <?php echo $donnees['nom']; ?> appartient à <?php echo $donnees['possesseur']; ?> fonctionne sur <?php echo $donnees['console']; ?> et vaut <?php echo $donnees['prix']; ?> €
   </p>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
<a href="criteres_de_selection.php?limitstart=<?php echo $limit ?>&limit=<?php echo $limit+10 ?>">voir les 10 suivants</a>


