<?php 
session_start();


function testInput($fichier){
	if(empty($_POST[$fichier])){
		return "<div class='text-danger'> le champ ". $fichier . " est vide</div>";
	} 
}



if (isset($_POST['valid'])) {

	$erreurTitreArt = ": " . testInput("titre");
	$erreurAuteurArt = ": " . testInput("auteur");
	$erreurGenreArt = ": " . testInput("genre");
	$erreurContentArt = ": " . testInput("contenu");

	if (!empty($_POST['titre']) && !empty($_POST['auteur']) && !empty($_POST['genre']) && !empty($_POST['content'])) {
	

		include('./connect/connection.php');

		$erreur = "";
		$message = "";

		$titre = htmlspecialchars($_POST['titre'], ENT_QUOTES);
		$auteur = htmlspecialchars($_POST['auteur'], ENT_QUOTES);
		$genre = htmlspecialchars($_POST['genre'], ENT_QUOTES);
		$contenu = htmlspecialchars($_POST['content'], ENT_QUOTES);


		$insert = sprintf("INSERT  INTO art_article(art_titre, art_auteur, art_genre, art_content, art_date) 
			VALUES ('%s', '%s', '%s', '%s', now() + interval '2 hours');", $titre, $auteur, $genre, $contenu);

		$insertArt = $bdd->prepare($insert);
		$insertArt->execute();
		$message = '<div class="row"><p class="text-success text-center">article ajouté avec succès cliquez <a href="?p=listArtAdmin" >ici pour être re diriger directement</a></p></div>';
		header('refresh:5;url=?p=listArtAdmin');
	}
}


?>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<h1 class="text-center text-uppercase page-header">Ajouter un article</h1>
		</div>
		<?= isset($message) ? $message : "" ?>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<h3 class="text-center jumbotron">Le Markdown</h3>

			<table class="table table-striped table-bordered table-hover">
				<thead><tr><th>aide au markdown</th></tr></thead>
				<tbody>
					<tr class="text-center">
						<td><strong class="text-danger">Sauter deux lignes <br> avant de commencer à ecrire <br> en markdown</strong><br></td>
						<td><strong>Titre 1 <br> ====</strong><br>(titre en h1)</td>
						<td><strong>Titre 2 <br>------</strong><br>(titre en h2)</td>
						<td><strong>### Titre 3 #</strong><br>(titre en h3)</td>
					</tr>

					<tr class="text-center">
						<td><strong>####  Title 4</strong><br>(titre en h4)</td>
						<td><strong>Deux espaces a la fin <br> d'une ligne pour <br> un retour a la ligne</strong></td>
						<td><strong>*italique* <br> ou _italique_</strong><br>(mots en italique)</td>
						<td><strong>__gras__ <br> ou **gras**</strong><br>(mots en gars)</td>
						
					</tr>
					<tr class="text-center">
						<td><strong> > citation </strong><br> (creer un blockquote)</td>
						<td><strong>* liste <br> * liste</strong><br>(creer une liste)</td>
						<td><strong>+ liste <br> + liste</strong><br>(autre façon de <br>creer une liste)</td>
						<td><strong>- liste <br> - liste</strong><br>(autre façon de <br>creer une liste)</td>
					</tr>

					<tr class="text-center">
						<td><strong>< Lien > </strong><br>(ecrire un lien)</td>
						<td><strong>[mon lien](le lien)</strong><br>autre façon d'ecrire un lien</td>
						<td><strong>![image](lien de mon image)</strong><br>afficher une image</td>
						<td><strong>Pour afficher un bloc de code,<br> sautez deux lignes <br> comme pour un paragraphe,<br> puis indentez avec 4 espaces <br> ou une tabulation</strong><br>(insérer du code)</td>
					</tr>

					<tr class="text-center">
						<td><strong>afficher du code <br> mettre les anti coat `code`</strong><br>code en ligne</td>
						<td><strong>un lien vers une aide <br> pour ecrire du markdown</strong><br><a href="https://blog.wax-o.com/2014/04/tutoriel-un-guide-pour-bien-commencer-avec-markdown/">markdown</a></td>
						<td><strong>sautez deux lignes <br> pour commencer <br> un paragraphe</strong></td>
						<td><strong></strong><br></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>


<div class="container">
	<div class="row">
		<div class="col-xs-12 jumbotron">
			<form class="form-group" method="post" id="ajourArt" action="?p=ajoutArticle">
				<div class="col-xs-3" id="error1">
					<label class="text-uppercase" for="titre">Titre <i id="textTitre"></i> <br>
						<input id="titre" name="titre" placeholder="ecrire sans markdown" class="form-control" type="text">
					</label>
				</div>
				<div class="col-xs-3 col-xs-offset-1" id="error2">
					<label class="text-uppercase" for="titre">Auteur <i id="textAuteur"></i> <br>
						<input id="auteur" name="auteur" placeholder="ecrire sans markdown" class="form-control" type="text">
					</label>
				</div>
				<div class="col-xs-3 col-xs-offset-1" id="error3">
					<label class="text-uppercase" for="titre">Genre <i id="textGenre"></i> <br>
						<input id="genre" name="genre" placeholder="ecrire sans markdown" class="form-control" type="text">
					</label>
				</div>
				<div class="col-xs-12" id="error4">
					<label class="text-uppercase" for="titre">Contenu de l'article <i id="textContenu"></i> <br>
						<textarea id="contenu" class="form-control" name="content" placeholder="SAUTER DEUX LIGNES AVANT DE COMMENCER A ECRIRE EN MARKDOWN" cols="200" rows="10"></textarea>
					</label>

					<input class="btn btn-md btn-success pull-right" type="submit" name="valid">
				</div>


			</form>
		</div>
	</div>
	
</div>

<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="page/js/addArticle.js"></script>