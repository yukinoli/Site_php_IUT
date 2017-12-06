<div class="container">
	<div class="row">
		<div class="col-md-12">
			</br>
			</br>
		</div>
  	</div>
	<div class="col-md-12 text-left">
		<div class="row">
		{foreach from=$tab_articles item=value}
    			<div class="col-md-4">
      				<div class="card border border-info animated fadeInLeft" style="background-image: url('img/background2.jpg'); background-size:190%; width: 20rem; box-shadow: 10px 10px 5px #666666">
				<!-- afficher l'image avec comme valeur celle de l'id -->  
      				<img class="card-img-top border border-info img-thumbnail" style="height: 12rem;" src="img/{$value.id}.jpg" alt="{$value.id}.jpg">
				<div class="card-body">
					<!-- afficher le titre avec comme valeur celle du titre -->  
  					<h4 class="card-title ">{$value.titre}</h4>
					<!-- afficher le texte avec comme valeur celle du texte -->  
    					<p class="card-text longText" rows="4">Apercu : {$value.texte}</p>
					<!-- afficher la date avec comme valeur celle de la date -->  
  					<p class="card-text">{$value.date_fr}</p>
					<div>
						<a href="page.php?id_article={$value.id}&action=article_complet" class="btn btn-info animated bounce" style="box-shadow: 1px 1px 16px #48e8d8"> Voir article</a>
					</div>
					<div class="col-md-12">
						</br>
					</div>
					{if $is_connect == TRUE}
					<a style="box-shadow: 1px 1px 16px #48e8d8" href="article.php?action=modifier&id={$value.id}" class="btn btn-info animated bounce">Modifier l'article</a>
					</br>
					</br>
					<a href="article.php?action=supprimer&id_article={$value.id}" style="box-shadow: 1px 1px 16px #48e8d8" class="btn btn-danger animated bounce">Supprimer l'article</a>
					{/if}
				</div>
     			</div>
     		</div>
		{$e = $e + 1}
		{if $e == 3}
		<div class="col-md-12">
			</br>
			</br>
		</div>
		{/if}
		{/foreach}
	</div>
</div>
<div class="col-md-1">
<div class="col-md-11">
		</br>
		</br>
	</div>
	<nav aria-label="Page navigation example">
		<ul class="pagination animated fadeInUpBig">
			{if $page_courante > 1}
			<li style="box-shadow: 1px 1px 20px #48e8d8" class="page-item"><a class="page-link" href="?page={$page_courante - 1}&recherche={$tab_get.recherche}" aria-label="Next">Retour</a></li>
			{/if}
			{for $i=1 to $nb_pages}
			<li style="box-shadow: 1px 1px 20px #48e8d8" class="page-item {if $page_courante == $i}active{/if}"><a class="page-link" href="?page={$i}&recherche={$tab_get.recherche}">{$i}</a></li>
			{/for}
			{if $page_courante < $nb_pages}
			<li class="page-item" style="box-shadow: 1px 1px 20px #48e8d8"  ><a class="page-link" href="?page={$page_courante + 1}&recherche={$tab_get.recherche}" aria-label="Next">Suivant</a></li>
			{/if}
		</ul>
	</nav>
</div>
<!-- Bootstrap core JavaScript -->
<script src="./vendor/jquery-slim.min.js"></script>
<script src="./vendor/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/jquery.animator-beta.min.js"></script>
<script src="./js/anime.min.js"></script>
<script src="./js/souris.js"></script>
<script type="text/javascript">// <![CDATA[
$(function(){
  $(".p").each(function(i){
    len=$(this).text().length;
    if(len>80)
    {
      $(this).text($(this).text().substr(0,80)+'...');
    }
  });
});
// ]]></script>
