<!-- Page Content -->
<link href="./css/style.css" rel="stylesheet">
<div class="container">
<div class="container">
	<div class="row">
		<div class="col-lg-12 text-center">
			<h1 class="mt-5 animated flash">{$tab_get.action} un article</h1>
		</div>
		<div class="col-md-12">
		</br>
		</br>
		</div>
			<div class="col-md-4 text-center">
				{foreach from=$tab_articles item=value}
    		<div class="col-md-4">
      		<div class="card border border-info animated fadeInLeft" style="box-shadow: 10px 10px 5px #999999; width: 20rem;">
						<!-- afficher l'image avec comme valeur celle de l'id -->  
      			<img class="card-img-top border border-info" style="height: 12rem;"src="img/{$value.id}.jpg" alt="{$value.id}.jpg">
	  				<div class="card-body">
							<!-- afficher le titre avec comme valeur celle du titre -->  
	  					<h4 class="card-title">{$value.titre}</h4>
							<!-- afficher le texte avec comme valeur celle du texte -->  
  	  				<p class="card-text">{$value.texte}</p>
							<!-- afficher la date avec comme valeur celle de la date -->  
	  					<p class="card-text">{$value.date_fr}</p>
						</div>
					</div>
				</div>
				{/foreach}
			</div>
			{if $tab_get.action == 'ajouter'}
			<div class="col-md-6">
			</div>
			{/if}
			<div class="col-md-8 text-left animated fadeInUpBig">
				<form action="article.php" method="post" enctype="multipart/form-data" id="form_article">
					<input type="hidden" name="id" value="{$tab_get.id}">
					<input type="hidden" name="action" value="{$tab_get.action}">
  				<div class="form-row">
    				<div class="form-group col-md-12">
      				<label for="inputTitre" name="titre" class="col-form-label">Titre</label>
							<input type="text" class="form-control" id="inputTitre" name="titre" required value="{$value.titre}" placeholder="Titre">
    				</div>
    				<div class="form-group col-md-12">
      				<label for="inputTexte" name="texte" class="col-form-label">Zone texte</label>
							<textarea class="form-control" id="texte" name="texte" required rows="3">{$value.texte}</textarea>
    				</div>
  				</div>
  				<div class="form-group">
    				<label for="inputImg" name="image" class="col-md-12">Image</label>
    				<input type="file" class="form-control" id="inputAddress" name="image" placeholder="Image">
  				</div>
  				<div class="form-group">
    				<div class="form-check">
      				<label class="form-check-label">
							<input class="form-check-input" name="publie" type="checkbox" value="1" {if $tab_articles.0.publie == 1}checked{/if}> Publier l'article</input>
      				</label>
    				</div>
  				</div>
					<button style="box-shadow: 0px 0px 16px #9c9c9c" type="submit" name="submit" class="btn btn-primary">{$tab_get.action}</button>
				</form>
      </div>
    </div>
  </div> 
</div>
<!-- Bootstrap core JavaScript -->
<script src="./vendor/jquery-slim.min.js"></script>
<script src="./vendor/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/jquery.animator-beta.min.js"></script>
<script src="./js/jquery.validate.min.js"></script>
<script src="./js/messages_fr.min.js"></script>
<script>
$(document).ready(function() {
	$("#form_article").validate();
});
</script>
