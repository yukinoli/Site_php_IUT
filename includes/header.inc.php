<?php
require_once 'config/connexion.inc.php';
?>
<!DOCTYPE html>
<html lang="fr"> 

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mon site</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/animate.css" rel="stylesheet">
    <link href="./css/length.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
      body {
        padding-top: 54px;
      }
      @media (min-width: 992px) {
        body {
          padding-top: 56px;
        }
      }

    </style>

  </head>

  <body style="background-image: url('img/background.jpg'); background-size:100%; background-repeat: yes; width: 100%;">

    <!-- Navigation -->
    <nav class="col-lg-12 navbar navbar-expand-lg navbar-light fixed-top border border-info rounded bg-dark">
      <div class="container">
        <a class="navbar-brand text-info" href="index.php">Site</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
					</button>
				<div class="container">
					<div class="row align-items-start">
				<?php
				// Condition Verifier si la variable existe 
				if (isset ($_SESSION['notification']))
				// condition ternaire si la variable $_SESSION['notification_result'] est egale a TRUE alors attribuer alert-success a la variable sino attrbuer alert-danger
				$result = $_SESSION['notification_result'] == TRUE ? 'alert-success' : 'alert-danger';
				{
				?>
					<!-- Attribution de la variable $result a la class de la div -->
					<div class="col-md-6 alert <?php echo $result; ?>" role="alert">
					<?php
					// Afficher la variable
  				echo $_SESSION['notification'];
					// Supprimer la valeur de la variable
					unset($_SESSION['notification']);
					}
					?> </div>

				<?php
				if ($is_connect == TRUE)
				{
        echo '<ul class="navbar-nav ml-auto">';
				echo '<li>';
        echo '<div class="alert collapse navbar-collapse alert-info" role="alert">';
				echo $notification;
				echo '</div>';
				echo'</li>';
				}
				?>
				</div>
				</div>
				</div>
        <div class="collapse navbar-collapse" id="navbarResponsive">
				<div class="container">
				<div class="col-md-12">
				<form class="navbar-form" role="search" action="index.php" method="get" enctype="multipart/form-data" id="recherche">
				<div class="input-group add-on">
				<input class="form-control border border-info" placeholder="Rechercher article" name="recherche" id="recherche" type="search">
				<div class="input-group-btn">
				<button class="btn btn-default border border-info" type="submit">Recherche</button>
				</div>
				</div>
				</form>
				</div>
				</div>
				
          <ul class="navbar-nav ml-auto col-md-6">
            <li class="nav-item">
              <a class="nav-link text-info" href="index.php">Accueil
              </a>
            <?php
						// Condition si is_connect est egal a TRUE
						if ($is_connect == TRUE)
						{
						?>
            <li class="nav-item">
              <a class="nav-link text-info" href="article.php?action=ajouter">Ajouter un article</a>
						</li>
						<?php
						}
						?>
            <?php
						// Condition si is_connect est egal a TRUE
						if ($is_connect == TRUE)
						{
						?>
            <li class="nav-item">
              <a class="nav-link text-info" href="inscription.php">Inscription</a>
            </li>
						<?php
						}
						// Condition si is_connect est egal a TRUE
						if ($is_connect == TRUE)
						{
							// Afficher Deconnexion
							echo '<li class="nav-item">
								<a class="nav-link text-info" href="deconnexion.php">Deconnexion</a>
            </li>';
						}
						// Sinon
						else
						{
						// Afficher Connexion
            echo '<li class="nav-item">
              <a class="nav-link text-info" href="connexion.php">Connexion</a>
            </li>';
						}
						?>
          </ul>
        </div>
      </div>
    </nav>
			<div class="col-md-12">
				</br>
			</div>


