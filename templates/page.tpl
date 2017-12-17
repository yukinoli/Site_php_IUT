<div class="container">
	<div class="row">
		<div class="col-md-12">
			</br>
			</br>
		</div>
  </div>
		<div class="col-lg-12 text-left">
			<div class="row">
				{foreach from=$tab_articles item=value}
      		<div class="card border border-info animated fadeInLeft" style="background-image: url('img/background2.jpg'); background-size:190%; box-shadow: 10px 10px 5px #666666">
						<!-- afficher l'image avec comme valeur celle de l'id -->  
      			<img class="card-img-top border border-info img-thumbnail" src="img/{$value.id}.jpg" alt="{$value.id}.jpg">
	  				<div class="card-body">
							<!-- afficher le titre avec comme valeur celle du titre -->  
	  					<h4 class="card-title ">{$value.titre}</h4>
							<!-- afficher le texte avec comme valeur celle du texte -->  
  	  				<p class="card-text" rows="4">{$value.texte}</p>
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
												<a href="article.php?action=supprimer&id={$value.id}" class="btn btn-danger">Oui, je veux supprimer !</a>
 		     							</div>
 		     						</div>
	    						</div>
 		 						</div>
								{/if}
						</div>
						<h2 class="mt-5 animated flash text-center">Creer un commentaire sur l'article</h2>
						<form action="page.php" id="form_com" method="post" enctype="multipart/form-data">
							<input type="hidden" name="id_article" value="{$value.id}">
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
						{foreach from=$tab_com item=value_com}
								<p class="mt-5 text-left">Commentaire de {$value_com.pseudo} :</p>
								<p class="commentaire col-md-12 border border-info btn btn-dark text-left">{$value_com.commentaire}</p>
						{/foreach}
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
	<div class="col-md-12">
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
<script>
$(document).ready(function() {
	$("#form_inscription").validate();
});
</script>
