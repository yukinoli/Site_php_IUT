<?php
// Test de connexion a la base de donnees
try 
{
	$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
	$bdd->exec("set names utf8");
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
// Afficher les erreurs si la connexion a la base echoue
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}
?>
