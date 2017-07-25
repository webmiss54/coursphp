<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

$nom_fichier = 'file.inc';

$monfichier = fopen($nom_fichier, 'r+');

// On lit la première ligne (nombre de pages vues)
$pages_vues = fgets($monfichier); 

// On augmente de 1 ce nombre de pages vues
$pages_vues += 1;

// On remet le curseur au début du fichier
fseek($monfichier, 0); 

// On écrit le nouveau nombre de pages vues
fputs($monfichier, $pages_vues); 
 
fclose($monfichier);
 
echo '<p>Cette page a été vue ' . $pages_vues . ' fois !</p>';
?>