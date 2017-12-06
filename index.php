<?php
// Debut de la session
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

$recherche = isset($_GET['recherche']) ? $_GET['recherche'] : '';
$nb_articles_par_pages = 6;
$e = 0;
$page_courante = isset($_GET['page']) ? $_GET['page'] : 1;
$index = pagination($page_courante, $nb_articles_par_pages);
$nb_total_articles_publie = nb_total_article_publie($bdd);
if (!empty($recherche))
{
	$nb_pages = 1;
}
else
{
$nb_pages = ceil($nb_total_articles_publie / $nb_articles_par_pages);
}
if (!empty ($recherche))
{
	$select = "SELECT id, "
		. "titre, "
		. "texte, "
		. "DATE_FORMAT(date, '%d/%m/%Y') as date_fr "
		. "FROM articles "
		. "WHERE (titre LIKE :recherche OR texte LIKE :recherche)" 
		. "AND publie = :publie "
		. "ORDER BY date DESC "
		. "LIMIT :index, :nb_articles_par_pages;";
}
else
{
	$select = "SELECT id, "
		. "titre, "
		. "texte, "
		. "DATE_FORMAT(date, '%d/%m/%Y') as date_fr "
		. "FROM articles "
		. "WHERE publie = :publie "
		. "ORDER BY date DESC "
		. "LIMIT :index, :nb_articles_par_pages;";
}

// Preparer la requete SQL
$sth = $bdd->prepare($select);
// Securiser les donnees, attribuer la valeur a publie et definir son type
if(!empty ($recherche))
{
$sth->bindValue(':recherche', '%' . $recherche . '%', PDO::PARAM_BOOL);
$sth->bindValue(':publie', 1, PDO::PARAM_BOOL);
$sth->bindValue(':index', $index, PDO::PARAM_INT);
$sth->bindValue(':nb_articles_par_pages', $nb_articles_par_pages, PDO::PARAM_INT);
}
else
{
$sth->bindValue(':publie', 1, PDO::PARAM_BOOL);
$sth->bindValue(':index', $index, PDO::PARAM_INT);
$sth->bindValue(':nb_articles_par_pages', $nb_articles_par_pages, PDO::PARAM_INT);
}
// Condition si la requete s'effectue correctement
if ($sth->execute() == TRUE)
{
	// Attribuer les valeurs recupere dans la requete dans un tableau
  $tab_articles = $sth->fetchAll(PDO::FETCH_ASSOC);
}
else
{
	$notification = "Aucun article ne correspond a votre recherche...";
	$_SESSION['notification_result'] = FALSE;
}

$smarty = new Smarty();

$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');

$smarty->assign('is_connect', $is_connect);
$smarty->assign('tab_session_notification', $_SESSION['notification']);
$smarty->assign('tab_session_result', $_SESSION['notification_result']);
$smarty->assign('tab_articles', $tab_articles);
$smarty->assign('tab_get', $_GET);
$smarty->assign('result', $result);
$smarty->assign('nb_pages', $nb_pages);
$smarty->assign('page_courante', $page_courante);
$smarty->assign('e', $e);

//$smarty->debugging = true;

include 'includes/header.inc.php';
$smarty->display('templates/index.tpl');
require_once 'includes/footer.inc.php';
?>
