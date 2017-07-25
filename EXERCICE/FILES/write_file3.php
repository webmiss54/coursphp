<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

$direBonjour = false;

if (isset($_COOKIE['nom'])) {
	$direBonjour = true;
}

//httponly = true pour plus de sécurité : cookie accessible uniquement par HTTP
setcookie('nom', 'mon nom', time() + 365*24*3600, null, null, false, true);

if ($direBonjour) {
	echo "Bonjour " . $_COOKIE['nom'] . "<br />";
}

$monfichier = fopen('file.inc', 'r+'); 

fseek($monfichier, 0); // On remet le curseur au début du fichier

//on écrit dans le fichier file.inc
//le contenu de $contacts
$contenuFile = "<?php \n";
$contenuFile .= '$contacts["Dupont"]  = array("Paul","Paris",27);' . "\n";
$contenuFile .= '$contacts["Schmoll"]  = array("Kirk","Berlin",35);' . "\n";
$contenuFile .= '$contacts["Smith"]  = array("Stan","Londres",45);' . "\n";
$contenuFile .= "?>";

// On écrit le texte créé dans le fichier file.inc
fputs($monfichier, $contenuFile); 
 
fclose($monfichier);

require_once("file.inc");

echo "<pre>";
print_r($contacts);
echo "</pre>";
?>