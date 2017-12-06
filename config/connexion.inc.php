<?php
// Attribution de la valeur FALSE a la variable
$is_connect = FALSE;

// Condition de verification si la variable $_COOKIE['sid'] existe et si elle est differente de vide
if (isset($_COOKIE['sid']) AND !empty($_COOKIE['sid']))
{
	// Creation de la requete de selection dans la table utilisateurs des champs nom, prenom et sid ou l'sid est egal a la valeur du cookie sid
	$compare_sid = "SELECT nom, "
				."prenom, "
				."sid "
				."FROM utilisateurs "
				."WHERE sid = :sid";
	// Preparation de la requete
	$result_compare = $bdd->prepare($compare_sid);
	// Securisation des donnees, attribution de la valeur et definition de son type
	$result_compare->bindValue(':sid', $_COOKIE['sid'], PDO::PARAM_STR);
	// Si la requete s'est correctement effectue
	if($result_compare->execute() == TRUE)
	{
		// Compter le nombre de ligne en resultat
		$count = $result_compare->rowCount();
		// Si la variable $count est superieure a 0 
		if ($count > 0)
		{
			// Attribution de la valeur TRUE a la variable
			$is_connect = TRUE;
			// Attribution des donnees retourne par la requete SQL dans un tableau dans la variable
			$donnees = $result_compare->fetch();
			$notification = 'Vous etes connectes en tant que ' . $donnees['prenom'] . ' ' . $donnees['nom'] . ' !';
		}
	}
}
?>
