<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

require_once("file.inc");

if (isset($a)) {
	echo "----".$a . "----<br/>";
} else {
	$a = 0;
}

$monfichier = fopen('file.inc', 'r+');

$a += 1; // On augmente de 1 ce nombre de pages vues
fseek($monfichier, 0); // On remet le curseur au début du fichier
fputs($monfichier, '<?php $a='.$a.'; ?>'); // On écrit le nouveau nombre de pages vues
 
fclose($monfichier);
 
echo '<p>Cette page a été vue ' . $a . ' fois !</p>';
?>