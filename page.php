<?php
session_start();
// Inclure la connection a la base de donnees et l'affichage d'erreur
require_once './config/bdd.conf.php';
//require_once './config/init.conf.php';
require_once './config/connexion.inc.php';
// Inclure les fonctions
require_once './includes/fonction.inc.php';
// Inclure smarty
require_once './libs/Smarty.class.php';
// Selectionner les arcticles de la table 
if (isset($_POST['submit']))
{
	$sql = "INSERT INTO commentaire (pseudo, email, commentaire, id_article) "
				."VALUES (:pseudo, :email, :commentaire, :id_article) ";
	$sth = $bdd->prepare($sql);
	$sth->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
	$sth->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
	$sth->bindValue(':commentaire', $_POST['commentaire'], PDO::PARAM_STR);
	$sth->bindValue(':id_article', $_POST['id_article'], PDO::PARAM_STR);
	if ($sth->execute() == TRUE)
	{
		$notification = '<strong>Felicitation, votre commentaire est publie !</strong>';
		$_SESSION['notification_result'] = TRUE;
		$_SESSION['notification'] = $notification;
		header('Location: page.php?action=article_complet&id_article=' . $_POST['id_article'] . '');
		exit();
	}
	else
	{
		$notification = '<strong> Une erreur s\'est passe lors de l\'envoi de votre commentaire ...</strong>';
		$_SESSION['notification_result'] = FALSE;
		$_SESSION['notification'] = $notification;
		header('Location: page.php?action=article_complet&id=' . $_POST['id_article'] . '');
		exit();
	}
}
if (isset($_GET['action']) && $_GET['action'] == 'article_complet')
{
	$selectArticle = "SELECT id, "
 		      . "titre, "
 		      . "texte, "
 		      . "DATE_FORMAT(date, '%d/%m/%Y') as date_fr "
 		      . "FROM articles "
					. "WHERE id = :id " 
		. "AND publie = :publie ";
	$sth = $bdd->prepare($selectArticle);
	$sth->bindValue(':id', $_GET['id_article'], PDO::PARAM_INT);
	$sth->bindValue(':publie', 1, PDO::PARAM_BOOL);
	$selectCom = "SELECT commentaire, pseudo "
							."FROM commentaire AS c "
							."INNER JOIN articles AS a ON c.id_article = a.id "
							."WHERE c.id_article = :id ";
	$sth2 = $bdd-> prepare($selectCom);
	$sth2->bindValue(':id', $_GET['id_article'], PDO::PARAM_INT);
	if ($sth->execute() == TRUE)
	{
		if ($sth2->execute() == TRUE)
		{
			$tab_articles = $sth->fetchALl(PDO::FETCH_ASSOC);
			$tab_com = $sth2->fetchALl(PDO::FETCH_ASSOC);
		}
	}
}
$smarty = new Smarty();

$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');

$smarty->assign('is_connect', $is_connect);
$smarty->assign('tab_session_notification', $_SESSION['notification']);
$smarty->assign('tab_session_result', $_SESSION['notification_result']);
$smarty->assign('tab_articles', $tab_articles);
$smarty->assign('tab_com', $tab_com);
$smarty->assign('tab_get', $_GET);
$smarty->assign('result', $result);
$smarty->assign('nb_pages', $nb_pages);
$smarty->assign('page_courante', $page_courante);
$smarty->assign('e', $e);

//$smarty->debugging = true;

include 'includes/header.inc.php';
$smarty->display('templates/page.tpl');
require_once 'includes/footer.inc.php';
?>
