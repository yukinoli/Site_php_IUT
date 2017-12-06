<!-- Page Content -->
<link href="./css/style.css" rel="stylesheet">
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center animated flash">
		  <h1 class="mt-5">Connectez-vous !</h1>
			</br>
			</br>
		</div>
		<div class="col-md-4">
		</div>
		<div class="col-md-4 text-left animated fadeInUp">
			<form action="connexion.php" method="post" enctype="multipart/form-data" id="form_connexion">
  		<div class="form-group">
				<label for="inputEmail" name="email" class="col-md-12">Adresse Email</label>
    		<input type="email" class="form-control" id="inputEmail" name="email" required placeholder="Email">
  		</div>
  		<div class="form-group">
    		<label for="inputMotdepasse" name="mdp" class="col-md-12">Mot de passe</label>
    		<input type="password" class="form-control" id="inputMotdepasse" name="mdp" required placeholder="Mot de passe de l'utilisateur">
  		</div>
			<button style="box-shadow: 0px 0px 16px #9c9c9c" type="submit" name="submit" class="btn btn-primary">Se connecter</button>
		</form>
	</div>
</div>
<!-- Bootstrap core JavaScript -->
<script src="./vendor/jquery-slim.min.js"></script>
<script src="./vendor/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/jquery.validate.min.js"></script>
<script src="./js/messages_fr.min.js"></script>
<script>
$(document).ready(function(){
	$("#form_connexion").validate();
});
</script>
