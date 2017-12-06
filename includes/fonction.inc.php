<?php
// Fonction de cryptage de mot de passe
function cryptPassword($mdp)
{
	// Attribution de la valeur $mdp en crypte a la variable
	$mdp_crypt = sha1($mdp);
	// Retourner la variable
	return $mdp_crypt;
}

// Fonction de cryptage email + temps pour le sid
function sid($email)
{
	// Attribution de la valeur $email et temps php a la variable
	$sid = md5($email . time());
	// Retourner la variable
	return $sid;
}

// Fonction de retour d'index pour pagination
function pagination($page_courante, $nb_articles_par_pages)
{
	$index = ($page_courante - 1) * $nb_articles_par_pages;
	return $index;
}

function nb_total_article_publie($bdd)
{
	$select = "SELECT COUNT(*) AS nb_articles "
		. "FROM articles "
		. "WHERE publie = 1";
	$sth = $bdd->prepare($select);
	$sth->execute();
	$tab_result = $sth->fetch(PDO::FETCH_ASSOC);
	return $tab_result['nb_articles'];
}
?>
