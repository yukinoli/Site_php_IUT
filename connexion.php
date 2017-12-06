<?php

// Debut de la session
session_start();

//require_once './config/init.conf.php';
// Inclure si le fichier n'est pas deja charge le script php bdd.conf.php
require_once './config/bdd.conf.php';
// Inclure si le fichier n'est pas deja charge le script php fonction.inc.php
require_once './includes/fonction.inc.php';
// Inclure si le fichier n'est pas deja charge le script php connexion.inc.php
require_once './config/connexion.inc.php';
// Inclure smarty
require_once './libs/Smarty.class.php';

// Condition de verification si la variable post submit existe
if (isset($_POST['submit']))
{
	//print_r($_POST);
	// Attibuer le message a la variable
	$notification = 'Aucune modification a afficher';
	// Attribuer la valeur FALSE a la variable
	$_SESSION['notification_result'] = FALSE;

	// Condition de verification si les valeur dans le tableau post sont diff de vide
	if (!empty($_POST['email']) AND !empty($_POST['mdp']))
	{
		//crypter le mot de passe
		$mdp_hash = cryptPassword($_POST['mdp']);
		// Creation de la requete de selection SQL pour recuperer email et mot de passe
		$select_user = "SELECT email, "
							."mdp "
							."FROM utilisateurs "
							."WHERE email = :email " 
							."AND mdp = :mdp";
		// Preparation de la requete
		$sth = $bdd->prepare($select_user);
		// Securisation des champs, attribution des valeur et definition du type de champ
		$sth->bindValue(':email',$_POST['email'], PDO::PARAM_STR);
		$sth->bindValue(':mdp', $mdp_hash, PDO::PARAM_STR);
		// Condition si la requete est bien execute
		if($sth->execute() == TRUE)
		{
			// Compter le nombre de ligne recuperer
			$count = $sth->rowCount();
			// Condition si le nombre de ligne recuperer est superieure a 0
			if ($count > 0)
			{
				// Attribuer a la variable sid la valeur de l'email en chiffre
				$sid = sid($_POST['email']);
				// Creation de la requete SQL de mise a jour de la table utilisateurs
				$update_sid = "UPDATE utilisateurs "
							."SET sid = :sid "
							."WHERE email = :email";
				// Preparation de la requete
				$sth_update = $bdd->prepare($update_sid);
				// Securisation des champs, attribution des valeur et definition du type de champ
				$sth_update->bindValue(':sid', $sid, PDO::PARAM_STR);
				$sth_update->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
				// Condition si l'excution de la requete est bonne
				if ($sth_update->execute() == TRUE)
				{
					// Creation du cookie avec nom, valeur et temps d'existance
					setcookie('sid', $sid, time() + 86400); 
					// Attribution du message
					$notification = 'Felicitation vous etes connecte !';
					// Attribution de la variable notification a la variable $_SESSION['notification']
					$_SESSION['notification'] = $notification;
					// Attribution de la valeur TRUE a la variable
					$_SESSION['notification_result'] = TRUE;
					// Redirection vers index.php
					header("Location: index.php");
					// Terminer le script php
					exit();
				}
				else
				{
					// Attribution du message
					$notification = 'Une erreur technique est survenue';
					// Attribution de la valeur FALSE a la variable
					$_SESSION['notification_result'] = FALSE;
					$_SESSION['notification'] = $notification;
				}
			}
			else
			{
			// Attribution du message
			$notification = 'L\email ou le mot de passe ne sont pas valide';
			// Attribution de la valeur FALSE a la variable
			$_SESSION['notification_result'] = FALSE;
			$_SESSION['notification'] = $notification;
			}

		}
		else
		{	
			// Attribution du message
			$notification = 'Une erreur technique est survenue';
			// Attribution de la valeur FALSE a la variable
			$_SESSION['notification_result'] = FALSE;
			$_SESSION['notification'] = $notification;

		}
	}
	else
	{
		// Attribution du message
		$notification = 'Veuillez renseigner les champs obligatoires...';
		// Attribution de la valeur FALSE a la variable
		$_SESSION['notification_result'] = FALSE;
	}
	// Attribution de la variable notification a la variable $_SESSION
	$_SESSION['notification'] = $notification;
	// Redirection vers la page connexion.php
	header('Location: connexion.php');
	exit();
}

$smarty = new Smarty();

$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');

//$smarty->debugging = true;

include './includes/header.inc.php';
$smarty->display('templates/connexion.tpl');
require_once './includes/footer.inc.php';
?>

