<?php
/* Smarty version 3.1.30, created on 2017-11-20 15:10:27
  from "/var/www/html/templates/connexion.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a12e253455fa1_62600772',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c51c5c200103a54281ef6afc22cc3feae85478e8' => 
    array (
      0 => '/var/www/html/templates/connexion.tpl',
      1 => 1510739479,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a12e253455fa1_62600772 (Smarty_Internal_Template $_smarty_tpl) {
?>
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
<?php echo '<script'; ?>
 src="./vendor/jquery-slim.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="./vendor/popper.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="./js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="./js/jquery.validate.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="./js/messages_fr.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
$(document).ready(function(){
	$("#form_connexion").validate();
});
<?php echo '</script'; ?>
>
<?php }
}
