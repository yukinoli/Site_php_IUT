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

class appManager {

	private $_afficherArticle;
	private $_afficherResultRecherche;
	private $_pagination;

	public function articleAfficher()
	{
		$nb_articles_par_pages = 6;
		$index = pagination($page_courante, $nb_articles_par_pages);
		$select = "SELECT id, "
			. "titre, "
			. "texte, "
			. "DATE_FORMAT(date, '%d/%m/%Y') as date_fr "
			. "FROM articles "
			. "WHERE (titre LIKE :recherche OR texte LIKE :recherche) " 
			. "AND publie = :publie "
			. "ORDER BY date DESC "
			. "LIMIT :index, :nb_articles_par_pages";

		$sth = $bdd->prepare($select);
		$sth->bindValue(':publie', 1, PDO::PARAM_BOOL);
		$sth->bindValue(':index', $index, PDO::PARAM_INT);
		$sth->bindValue(':nb_articles_par_pages', $nb_articles_par_pages, PDO::PARAM_INT);

		if ($sth->execute() == TRUE)
		{
  			$tab_articles = $sth->fetchAll(PDO::FETCH_ASSOC);
		}
		$this->_afficherArticle = $tab_articles;
		return $this->_afficherArticle;
	}
}
$app = new appManager;
$app->articleAfficher();
?>
