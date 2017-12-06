<?php

// Demarrage de la session
session_start();

// Inclut le fichier si le fichier n'est pas deja inclus bdd.conf.php
require_once './config/bdd.conf.php';
require_once './config/connexion.inc.php';
// Inclure smarty
require_once './libs/Smarty.class.php';

// Condition de verification si la variable $_POST['submit'] existe
if ($is_connect == TRUE)
{
	if ($_GET['action'] == 'supprimer' )
	{
		$supprimer = "DELETE "
								."FROM articles "
								."WHERE id = :id";
		$sth = $bdd->prepare($supprimer);
		$sth->bindValue(':id', $_GET['id_article'], PDO::PARAM_INT);
		if($sth->execute() == TRUE)
		{
			$notification = 'L\'article a ete supprime...';
			$_SESSION['notification'] = $notification;
			$_SESSION['notification_result'] = TRUE;
			header("Location: index.php");
			exit();
		}
	}
	if (isset ($_POST['submit']))
	{
    //print_r($_POST);
  	//print_r($_FILES);
  	// Condition pour verifier si il y a une image dans le formulaire sans erreur
  	if ($_FILES['image']['error'] == 0)
		{
			// Attribuer la valeur date au format americain a la variable $date_du_jour
			$date_du_jour = date("Y-m-d");
			// Attribuer la chaine de caractere 'Aucune modification a afficher' a la variable notification
  		$notification = 'Aucune modification a afficher';
			// Attribuer la valeur booleen FALSE a la variable $_SESSION['notification_result']
			$_SESSION['notification_result'] = FALSE;
			// Condition pour verifier que les champs titre et texte du formulaire ne sont pas vide dans la variable $_POST 
			if (!empty($_POST['titre']) AND !empty ($_POST['texte'])) 	
			{
				// Condition ternaire de verification si la valeur $_POST['publie'] existe alors attribuer la valeur $_POST['publie'] a $publie sinon attribuer la valeur 0 a $publie
				$publie = isset($_POST['publie']) ? $_POST['publie'] : 0;
    		//var_dump($publie);
				// Creation de la requete SQL inserer dans la table articles dans la variable $insert 
				if ($_POST['action'] == 'supprimer')
				{
					$supprimer = "DELETE "
								."FROM articles "
								."WHERE id = :id;";
					$sth = $bdd->prepare($supprimer);
					$sth->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
				}
				if ($_POST['action'] == 'ajouter')
				{
					$sql = "INSERT INTO articles (titre, texte, date, publie) "
								."VALUES (:titre, :texte, :date, :publie)";
				}
				if ($_POST['action'] == 'modifier')
				{
					$sql = "UPDATE articles "
								."SET titre = :titre, "
								."texte = :texte, "
								."publie = :publie "
								."WHERE id = :id;";
				}
				// Preparation de la requete
	  		$sth = $bdd->prepare($sql);
				// Securisation des champs de la requete, attribution des valeur a inserer et detail des types de champs
				$sth->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
				$sth->bindValue(':texte', $_POST['texte'], PDO::PARAM_STR);
				if ($_POST['action'] == 'ajouter')
				{
					$sth->bindValue(':date', $date_du_jour, PDO::PARAM_STR);
				}
				$sth->bindValue(':publie', $publie, PDO::PARAM_BOOL);
				if ($_POST['action'] == 'modifier')
				{
					$sth->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
				}
				// Condition si l'execution de la requete SQL est bonne
				if ($sth->execute() == TRUE)
				{
					// Recherche du dernier ID dans la base de donnees
					if ($_POST['action'] == 'ajouter')
					{
						$id_article = $bdd->lastInsertId();
					}
					if ($_POST['action'] == 'modifier')
					{
						$id_article = $_POST['id'];
					}
					// Recuperation de l'extension de l'image
					$extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
					move_uploaded_file($_FILES['image']['tmp_name'], 'img/' . $id_article . '.jpg');
					// Tableau d'extensions d'image
					/*
			 		* $tab_extension = array(
        		'jpg',
						'png',
						'jpeg'
					);
					$result_extension_image = in_array($extension, $tab_extension);
			 		*/
					// Attribution de message dans la variable notification
					if ($_POST['action'] == 'ajouter')
					{
						$conj = 'ajoute';
					}
					elseif ($_POST['action'] == 'modifier')
					{
						$conj = 'modifie';
					}
      		$notification = '<strong>Felicitation, votre article est ' . $conj . '...</strong>';
					// Attribution TRUE dans la variable
					$_SESSION['notification_result'] = TRUE;
					$_SESSION['notification'] = $notification;
					header('Location: index.php');
					exit();
				}
				else
				{
					// Attribution de message dans la variable notification
      		$notification = 'Une erreur est survenue lors de l\'insertion de l\'article...';
					// Attribution FALSE dans la variable
					$_SESSION['notification_result'] = FALSE;
				}
			}
			else
			{
				// Attribution de message dans la variable notification
				$notification = 'Veuillez renseigner les champs obligatiores...';
				// Attribution FALSE dans la variable
				$_SESSION['notification_result'] = FALSE;
			}
		}
		else
		{			
			// Attribution de message dans la variable notification
			$notification = 'Une erreur est survenu lors du traitement de votre image..';
			// Attribution FALSE dans la variable
			$_SESSION['notification_result'] = FALSE;
		}
		// Attribution de la variable $notification a la la variable $_SESSION['notification']
		$_SESSION['notification'] = $notification;
		// Renvoyer sur la page article.php
		header('Location: article.php');
		// Terminer le script php
		exit();
	}
	else
	{
		// Inclure le script php header.inc.php
		include './includes/header.inc.php';
		if ($_GET['action'] == 'modifier') 
		{
			$select = "SELECT id, "
   				     ."titre, "
       				 ."texte, "
       			 	 ."DATE_FORMAT(date, '%d/%m/%Y') as date_fr, "
			 				 ."publie "
       				 ."FROM articles "
       				 ."WHERE id = :id;";
			$sth = $bdd->prepare($select);
			$sth->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
			if ($sth->execute() == TRUE)
			{
  			$tab_articles = $sth->fetchAll(PDO::FETCH_ASSOC);
			}
		}
	}

$smarty = new Smarty();

$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');

$smarty->assign('tab_articles', $tab_articles);
$smarty->assign('tab_get', $_GET);

//$smarty->debugging = true;

include './includes/header.inc.php';
$smarty->display('templates/article.tpl');
require_once './includes/footer.inc.php';
}
else
{
echo 'interdiction d\'y acceder...';
}
?>
