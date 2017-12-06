<?php

// Debut de la session
session_start();

// Inclure si le fichier n'est pas deja charge le script php bdd.conf.php
require_once './config/bdd.conf.php';
// Inclure si le fichier n'est pas deja charge le script php connexion.inc.php
require_once './config/connexion.inc.php';
// Inclure si le fichier n'est pas deja charge le script php fonction.inc.php
require_once './includes/fonction.inc.php';
// Inclure smarty
require_once './libs/Smarty.class.php';

if ($is_connect == true)
{
// Condition de verification si la variable post submit existe
if (isset ($_POST['submit']))
{
	// Attibuer le message a la variable
  $notification = 'Aucune modification a afficher';
	// Attribuer la valeur FALSE a la variable
	$_SESSION['notification_result'] = FALSE;
	// Condition de verification si les valeur dans le tableau post sont diff de vide
	if (!empty($_POST['nom']) AND !empty ($_POST['prenom']) AND !empty ($_POST['email']) AND !empty($_POST['mdp'])) 	
	{
		// Cryptage du mot de passe
		$mdp = cryptPassword($_POST['mdp']);
		// Creation de la requete d'insertion dans la table utilisateurs
		$insert = "INSERT INTO utilisateurs (nom, prenom, email, mdp) "
					  . "VALUES (:nom, :prenom, :email, :mdp)";
		// Preparation de la requete SQL
	  $sth = $bdd->prepare($insert);
		// Securisation des champs, attribution des valeur et definition du type de champ
		$sth->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
		$sth->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
		$sth->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
		$sth->bindValue(':mdp', $mdp, PDO::PARAM_STR);
		// Condition si l'execution de la requete SQL s'est bien effectue
		if ($sth->execute() == TRUE)
		{
			// Attribution de message
      $notification = '<strong>Felicitation, vous etes inscris...</strong>';
			// Attribution de la valeur TRUE a la variable $_SESSION['notification_result']
			$_SESSION['notification_result'] = TRUE;
		}
		else
		{
			// Attribution de message
      $notification = 'Une erreur est survenue lors de l\'inscription...';
			// Attribution de la valeur FALSE a la variable $_SESSION['notification_result']
			$_SESSION['notification_result'] = FALSE;
		}
  }
	else
	{
		// Attribution de message
		$notification = 'Veuillez renseigner les champs obligatoires...';
		// Attribution de la valeur FALSE a la variable $_SESSION['notification_result']
		$_SESSION['notification_result'] = FALSE;
	}
	// Attribution de la variable $notification a la variable $_SESSION['notification']
	$_SESSION['notification'] = $notification;
	// Redirection vers la page inscription.php
	header('Location: inscription.php');
	exit();
}
// Inclure le script php header.inc.php
$smarty = new Smarty();

$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');

//$smarty->debugging = true;

include './includes/header.inc.php';
$smarty->display('templates/inscription.tpl');
require_once './includes/footer.inc.php';
}
else
{
echo 'interdiction d\'y acceder...';
}
?>
