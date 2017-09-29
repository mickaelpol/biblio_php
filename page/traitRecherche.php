<?php 

session_start();

$search = htmlspecialchars($_POST['s'], ENT_QUOTES);

include('./connect/connection.php');


$sql = sprintf("SELECT * FROM art_article 
WHERE art_titre LIKE  '%%%s%%'",$search);

$recherche = $bdd->prepare($sql);
$recherche->execute();



?>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 bg-inverse">
			<h1 class="text-uppercase text-center page-header">listes des articles</h1>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-1 col-xs-offset-1">
			<button class="btn btn-md btn-default" type="button" onClick="document.location.href = document.referrer"><span class="glyphicon glyphicon-arrow-left"></span><strong> Back</strong></button>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">

		<div class="col-xs-6">
			<p>Resultat pour votre recherche : <strong>" <?= $search ?> "</strong> </p>
		</div>

			<div id="idlist">
				<div class="text-center">
					<ul class="pagination"></ul>
				</div>
				<table class="table table-bordered table-striped table-hover">

					<!-- titre de chacune des colonnes -->
					<thead id="entete">
						<tr>
							<th class='text-center text-uppercase'><a href='?p=listArt&tri=art_date'>Date</a></th>
							<th class='text-center text-uppercase'><a href='?p=listArt&tri=art_titre'>Titre de l'article</a></th>
							<th class='text-center text-uppercase'><a href='?p=listArt&tri=art_auteur'>Auteur</a></th>
							<th class='text-center text-uppercase'><a href='?p=listArt&tri=art_genre'>Genre</a></th>
						</tr>
					</thead>

					<!-- requete sql qui affiche la valeur de chacun des colonnes du tableau (date/titre/genre) -->
					
					<tbody id="tableau" class="text-center list">

						<?php  
						while ($donnees = $recherche->fetch()){
							$date = $donnees['art_date'];
							$date = new DateTime($date);		
							?>
							<tr class="name">
								<td><?= $date->format('d/m/Y à H:i') ?></td>
								<td><a href='?p=article&&A=<?= $donnees['art_id'] ?>'><?= $donnees['art_titre'] ?></a></td>
								<td><?= $donnees['art_auteur'] ?></td>
								<td><?= $donnees['art_genre'] ?></td>
							</tr>
							<?php }
							$recherche->closeCursor();
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