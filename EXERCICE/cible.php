<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);
//print_r($_POST);
if (isset($_POST['tache']) && (string)$_POST['tache'] == "formulaire") {

	if (isset($_POST['prenom']) AND isset($_POST['nom']) AND isset($_POST['age']) AND isset($_POST['sexe'])) {

		// 1 : On force la conversion en nombre entier
		$_POST['age'] = (int) $_POST['age'];

		if (is_string($_POST['prenom']) && is_string($_POST['nom']) && $_POST['age'] > 0 && $_POST['age'] <= 140) {

			echo 'Bonjour ' . $_POST['nom'] . ' ' . $_POST['prenom'] . ' !<br />Vous avez ' . $_POST['age'] . ' ans<br />';

			if ($_POST['sexe'] == "F" || $_POST['sexe'] == "M") {

				$genre = ($_POST['sexe'] == "F") ? "une femme" : "un homme";

				echo "Vous êtes " . $genre;

			} else {
				echo "Vous n'avez pas saisi correctement votre sexe!!!";
			}

		} else {

			echo "un des paramètres ne contient pas la valeur attendue!!!";

		}
	}
	else {

	   echo 'Il faut renseigner un nom, un prénom, age et sexe !';

	}

} else {
	?>
		<span style="color:#f00">
			<?php
			echo "Vous n'êtes pas autorisé à accéder à cette page!!!";
			?>
		</span>
	<?php
}

?> 
 














