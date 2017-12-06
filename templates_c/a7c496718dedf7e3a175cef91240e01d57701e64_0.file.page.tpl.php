<?php
/* Smarty version 3.1.30, created on 2017-11-20 14:19:30
  from "/var/www/html/templates/page.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a12d66272efe1_75289062',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7c496718dedf7e3a175cef91240e01d57701e64' => 
    array (
      0 => '/var/www/html/templates/page.tpl',
      1 => 1510739479,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a12d66272efe1_75289062 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			</br>
			</br>
		</div>
  </div>
		<div class="col-lg-12 text-left">
			<div class="row">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_articles']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
      		<div class="card border border-info animated fadeInLeft" style="background-image: url('img/background2.jpg'); background-size:190%; box-shadow: 10px 10px 5px #666666">
						<!-- afficher l'image avec comme valeur celle de l'id -->  
      			<img class="card-img-top border border-info img-thumbnail" src="img/<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
.jpg">
	  				<div class="card-body">
							<!-- afficher le titre avec comme valeur celle du titre -->  
	  					<h4 class="card-title "><?php echo $_smarty_tpl->tpl_vars['value']->value['titre'];?>
</h4>
							<!-- afficher le texte avec comme valeur celle du texte -->  
  	  				<p class="card-text" rows="4"><?php echo $_smarty_tpl->tpl_vars['value']->value['texte'];?>
</p>
							<!-- afficher la date avec comme valeur celle de la date -->  
	  					<p class="card-text"><?php echo $_smarty_tpl->tpl_vars['value']->value['date_fr'];?>
</p>
							<div>
								<a href="page.php?id_article=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
&action=article_complet" class="btn btn-info animated bounce" style="box-shadow: 1px 1px 16px #48e8d8"> Voir article</a>
							</div>
							<div class="col-md-12">
								</br>
							</div>
							<?php if ($_smarty_tpl->tpl_vars['is_connect']->value == TRUE) {?>
								<a style="box-shadow: 1px 1px 16px #48e8d8" href="article.php?action=modifier&id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="btn btn-info animated bounce">Modifier l'article</a>
								</br>
								</br>
								<button style="box-shadow: 1px 1px 16px #48e8d8" type="button" class="btn btn-danger animated bounce" data-toggle="modal" data-target="#exampleModalLong">
									Supprimer l'article 
								</button>
								<!-- Modal -->
								<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  								<div class="modal-dialog" role="document">
    								<div class="modal-content">
      								<div class="modal-header">
       		 							<h5 class="modal-title" id="exampleModalLongTitle">Voulez-vous vraiment supprimer l'article ?</h5>
     		   							<button type="button border border-info" class="close" data-dismiss="modal" aria-label="Close">
   		       							<span aria-hidden="true">&times;</span>
 		       							</button>
												</div>
 		     							<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Non, je me suis trompe</button>
												<a href="article.php?action=supprimer&id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="btn btn-danger">Oui, je veux supprimer !</a>
 		     							</div>
 		     						</div>
	    						</div>
 		 						</div>
								<?php }?>
						</div>
						<h2 class="mt-5 animated flash text-center">Creer un commentaire sur l'article</h2>
						<form action="page.php" id="form_com" method="post" enctype="multipart/form-data">
							<input type="hidden" name="id_article" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">
    					<div class="form-group col-md-12">
      					<label for="inputPseudo" name="pseudo" class="col-form-label">Votre pseudo</label>
								<input type="text" class="form-control" id="inputPseudo" name="pseudo" required placeholder="Pseudo">
    					</div>
    					<div class="form-group col-md-12">
      					<label for="inputMail" name="email" class="col-form-label">Votre e-mail</label>
								<input type="email" class="form-control" id="inputMail" name="email" required placeholder="example@test.com">
    					</div>
    					<div class="form-group col-md-12">
      					<label for="inputCom" name="titre" class="col-form-label">Votre commentaire</label>
								<textarea class="form-control" id="inputCom" name="commentaire" required placeholder="Votre commentaire" rows="3"></textarea>
    					</div>
    					<div class="form-group col-md-12">
								<button style="box-shadow: 0px 0px 16px #9c9c9c" type="submit" name="submit" class="btn btn-primary">Envoyer</button>
    					</div>
						</form>
						<h2 class="mt-5 text-center">Commentaire sur l'article :</h2>
						<div class="col-md-12 btn btn-dark">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_com']->value, 'value_com');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value_com']->value) {
?>
								<p class="mt-5 text-left">Commentaire de <?php echo $_smarty_tpl->tpl_vars['value_com']->value['pseudo'];?>
 :</p>
								<p class="commentaire col-md-12 border border-info btn btn-dark text-left"><?php echo $_smarty_tpl->tpl_vars['value_com']->value['commentaire'];?>
</p>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

						</div>
 	    		</div>
 	    	</div>
				<?php $_smarty_tpl->_assignInScope('e', $_smarty_tpl->tpl_vars['e']->value+1);
?>
				<?php if ($_smarty_tpl->tpl_vars['e']->value == 3) {?>
				<div class="col-md-12">
					</br>
					</br>
				</div>
				<?php }?>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			</div>
		</div>
	<div class="col-md-12">
		</br>
		</br>
	</div>
	<nav aria-label="Page navigation example">
		<ul class="pagination animated fadeInUpBig">
			<?php if ($_smarty_tpl->tpl_vars['page_courante']->value > 1) {?>
			<li style="box-shadow: 1px 1px 20px #48e8d8" class="page-item"><a class="page-link" href="?page=<?php echo $_smarty_tpl->tpl_vars['page_courante']->value-1;?>
&recherche=<?php echo $_smarty_tpl->tpl_vars['tab_get']->value['recherche'];?>
" aria-label="Next">Retour</a></li>
			<?php }?>
			<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['nb_pages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['nb_pages']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
			<li style="box-shadow: 1px 1px 20px #48e8d8" class="page-item <?php if ($_smarty_tpl->tpl_vars['page_courante']->value == $_smarty_tpl->tpl_vars['i']->value) {?>active<?php }?>"><a class="page-link" href="?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
&recherche=<?php echo $_smarty_tpl->tpl_vars['tab_get']->value['recherche'];?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
			<?php }
}
?>

			<?php if ($_smarty_tpl->tpl_vars['page_courante']->value < $_smarty_tpl->tpl_vars['nb_pages']->value) {?>
			<li class="page-item" style="box-shadow: 1px 1px 20px #48e8d8"  ><a class="page-link" href="?page=<?php echo $_smarty_tpl->tpl_vars['page_courante']->value+1;?>
&recherche=<?php echo $_smarty_tpl->tpl_vars['tab_get']->value['recherche'];?>
" aria-label="Next">Suivant</a></li>
			<?php }?>
		</ul>
	</nav>
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
 src="./js/jquery.animator-beta.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="./js/anime.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="./js/souris.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">// <![CDATA[
$(function(){
  $(".p").each(function(i){
    len=$(this).text().length;
    if(len>80)
    {
      $(this).text($(this).text().substr(0,80)+'...');
    }
  });
});

<?php }
}
