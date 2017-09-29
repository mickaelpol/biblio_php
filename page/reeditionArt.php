<?php 

session_start();

$id = $_GET['R'];

include('./connect/connection.php');

$sql = sprintf("SELECT * FROM art_article WHERE art_id='%d';" , $id);

$query = $bdd->prepare($sql);
$query->execute();


if (isset($_POST['valid'])) {

	include('./connect/connection.php');

	$titre = htmlspecialchars($_POST["titre"], ENT_QUOTES);
	$auteur = htmlspecialchars($_POST["auteur"], ENT_QUOTES);
	$genre = htmlspecialchars($_POST["genre"], ENT_QUOTES);
	$contenu = htmlspecialchars($_POST["contenu"], ENT_QUOTES);

	$reedit = sprintf("UPDATE art_article SET art_titre='%s', art_auteur='%s', art_genre='%s',art_content='%s', art_date=now()+interval'2 hours' WHERE art_id='%d'", $titre, $auteur, $genre, $contenu, $id);

	$reeditArt = $bdd->prepare($reedit);
	$reeditArt->execute();

	$message = '<div class="row"><p class="text-success text-center">article modifié avec succès patientez pendant la redirection ou cliquez sur ce <a href="?p=listArtAdmin">Lien</a> </p></div>';
	header('refresh:3;url=?p=listArtAdmin');
}


?>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<?php while ($donnees = $query->fetch()) { ?>
			<h1 class="text-center text-uppercase page-header">Reedition de l'article <?= $donnees['art_titre']  ?></h1>
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
	<div class="col-xs-1 col-xs-offset-1">
		<button class="btn btn-md btn-default" type="button" onClick="document.location.href = document.referrer"><span class="glyphicon glyphicon-arrow-left"></span><strong> Back</strong></button>
	</div>
	<div class="row">
		<div class="col-xs-12 jumbotron">
			<form class="form-group" id="reedit" action='?p=reediter&R=<?= $id ?>' method="post">
				<?= isset($message) ? $message : "" ?>
				<div class="col-xs-3" id="error1">
					<label class="text-uppercase" for="titre">Titre <i id="textTitre"></i> <br>
						<input id="titre" value="<?= $donnees['art_titre'] ?>" name="titre" class="form-control" type="text">
					</label>
				</div>
				<div class="col-xs-3 col-xs-offset-1" id="error2">
					<label class="text-uppercase" for="auteur">Auteur <i id="textAuteur"></i> <br>
						<input id="auteur" value="<?= $donnees['art_auteur'] ?>" name="auteur" class="form-control" type="text">
					</label>
				</div>
				<div class="col-xs-3 col-xs-offset-1" id="error3">
					<label class="text-uppercase" for="genre">Genre <i id="textGenre"></i> <br>
						<input id="genre" value="<?= $donnees['art_genre'] ?>" name="genre" class="form-control" type="text">
					</label>
				</div>
				<div class="col-xs-12" id="error4">
					<label class="text-uppercase" for="contenu">Contenu de l'article <i id="textContenu"></i> <br>
						<textarea id="contenu" class="form-control" name="contenu" cols="200" rows="10"><?= $donnees['art_content'] ?></textarea>
					</label>

					<input class="btn btn-md btn-success pull-right" type="submit" id="valider" name="valid">
				</div>
			</form>
		</div>
	</div>
</div>
<?php
}
$query->closeCursor();
?>

<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="page/js/reedit.js"></script>