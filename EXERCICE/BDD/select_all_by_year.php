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
$reponse = $bdd->query('SELECT COUNT(date_enregistrement) AS nb_by_year, YEAR(date_enregistrement) AS year_enregistrement FROM jeux_video GROUP BY year_enregistrement HAVING year_enregistrement >= 2000 ORDER BY year_enregistrement DESC');
//$reponse = $bdd->query('SELECT * FROM jeux_video WHERE possesseur = \'Michel\' OR possesseur = \'Florent\' ORDER BY ID DESC');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
    <strong>Aneée</strong> : <?php echo $donnees['year_enregistrement']; ?> - nombre : <?php echo $donnees['nb_by_year']; ?> 
   <br />
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
