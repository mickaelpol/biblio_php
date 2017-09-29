<?php 
session_start();

if (!isset($_SESSION['uti_pseudo'])) {
	header("Location: index.php?p=connectionAdmin");
}

	///////////////////////////////// CONNECTION A LA BDD ////////////////////////////////////////////
include('./connect/connection.php');

$tri ="";
if(!empty($_GET['tri'])){

	$tri = ' order by  "'.$_GET['tri'].'" DESC ';
}


$sql = "SELECT art_id, art_date, art_titre FROM art_article".$tri;

$query = $bdd->prepare($sql);
$query->execute();

$compter = "SELECT FROM (*) com_commentaires GROUP BY art_article_art_id";
$compter2 = $bdd->prepare($compter);
$compter2->execute();

?>






<!--/////////////////////// DÉBUT DU CONTENU DU TABLEAU DES ARTICLES COTÉ ADMIN /////////////////////////////-->
<div class="container">
	<div class="row">
		<div class="col-xs-12 bg-inverse">

				<h1 class="text-uppercase text-center page-header">listes des articles</h1>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-xs-4 col-xs-offset-1">
				<button class="btn btn-md btn-default" type="button" onClick="document.location.href = document.referrer"><span class="glyphicon glyphicon-arrow-left"></span><strong> Back</strong></button>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-xs-4 col-xs-offset-1">
				<p><a href="?p=ajoutArticle"><button title="Ajouter" class="btn btn-md btn-success" type="submit"><span class="glyphicon glyphicon-plus"></span></button></a><strong> Ajouter un article</strong></p>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-xs-3 col-sm-10 col-sm-offset-1">

				<div id="idlistAdmin">
					<div class="text-center">
						<ul class="pagination"></ul>
					</div>
					<table class="table table-bordered table-striped table-hover">

						<thead id="enteteAdmin">
							<tr>
								<th class="text-center text-uppercase"><a href='?p=listArtAdmin&tri=art_date'>Date</a></th>
								<th class="text-center text-uppercase"><a href='?p=listArtAdmin&tri=art_titre'>Moderer un commentaire de l'article</a></th>
								<!-- <th class="text-center text-uppercase">Nombres de commentaires</th> -->
								<th class="text-center text-uppercase">Reediter</th>
								<th class="text-center text-uppercase">Supprimer</th>
							</tr>
						</thead>

						<tbody id="tableauAdmin" class="text-center list-inline list">
							<!--////////////// DÉBUT DE L'AFFICHAGE EN REQUETE SQL ET PHP //////////////////-->
							<?php  
							while ($donnees = $query->fetch()){
								$date = $donnees['art_date'];
								$date = new DateTime($date);		
								?>
								<tr class="nameAdmin">
									<!--/////////// AFFICHAGE DE LA DATE OU L'ARTICLÉ A ÉTÉ POSTÉ /////////////////-->
									<td><?= $date->format("d/m/Y à H:i") ?></td>


									<!--/////////// AFFICHAGE DU TITRE DE L'ARTICLE //////////////////////-->
									<td><a href='?p=modCom&M=<?= $donnees['art_id'] ?>'><?= $donnees['art_titre'] ?></a></td>

									<!-- ////////////// NOMBRE DE COMMENTAIRE //////////////////////////////////
									<td></td>
 -->
									<!--//////////// BOUTON DE REEDITION DE L'ARTICLE //////////////////////////////-->
									<td><a href="?p=reediter&R=<?= $donnees['art_id'] ?>"><button title="reediter" class="btn btn-md btn-warning" type="submit"><span class="glyphicon glyphicon-cog"></span></button></a></td>

									<!--//////////// BOUTON DE SUPPRESSION DE L'ARTICLE ////////////////////-->
									<td><a href="?p=supprimer&S=<?= $donnees['art_id'] ?>"><button title="supprimer" class="btn btn-md btn-danger"><span class="glyphicon glyphicon-remove"></span></button></a></td>
								</tr>
								<?php }
								$query->closeCursor();
								?>

							</tbody>

						</table>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
		<script type="text/javascript" src="node_modules/list.js/dist/list.js" ></script>
		<script type="text/javascript" src="page/js/paginate.js"></script>
