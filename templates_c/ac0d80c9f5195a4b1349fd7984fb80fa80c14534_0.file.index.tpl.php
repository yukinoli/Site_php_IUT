<?php
/* Smarty version 3.1.30, created on 2017-11-20 15:05:08
  from "/var/www/html/templates/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a12e114a49105_79531059',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ac0d80c9f5195a4b1349fd7984fb80fa80c14534' => 
    array (
      0 => '/var/www/html/templates/index.tpl',
      1 => 1511185836,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a12e114a49105_79531059 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			</br>
			</br>
		</div>
  	</div>
	<div class="col-md-12 text-left">
		<div class="row">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_articles']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
    			<div class="col-md-4">
      				<div class="card border border-info animated fadeInLeft" style="background-image: url('img/background2.jpg'); background-size:190%; width: 20rem; box-shadow: 10px 10px 5px #666666">
				<!-- afficher l'image avec comme valeur celle de l'id -->  
      				<img class="card-img-top border border-info img-thumbnail" style="height: 12rem;" src="img/<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
.jpg">
				<div class="card-body">
					<!-- afficher le titre avec comme valeur celle du titre -->  
  					<h4 class="card-title "><?php echo $_smarty_tpl->tpl_vars['value']->value['titre'];?>
</h4>
					<!-- afficher le texte avec comme valeur celle du texte -->  
    					<p class="card-text longText" rows="4">Apercu : <?php echo $_smarty_tpl->tpl_vars['value']->value['texte'];?>
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
					<a href="article.php?action=supprimer&id_article=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" style="box-shadow: 1px 1px 16px #48e8d8" class="btn btn-danger animated bounce">Supprimer l'article</a>
					<?php }?>
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
<div class="col-md-1">
<div class="col-md-11">
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
// ]]><?php echo '</script'; ?>
>
<?php }
}
