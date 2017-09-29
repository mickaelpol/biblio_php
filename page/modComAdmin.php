<?php 
session_start();


include('./connect/connection.php');

$id = $_GET['M'];

$reponse = ("SELECT art_id  FROM art_article WHERE 
	art_id='".$id."'");

$reponse2 = $bdd->prepare($reponse);
$reponse2->execute();

$com = ("SELECT com_pseudo, com_date , com_content, com_id FROM com_commentaires WHERE  art_article_art_id= '$id'");
$com2 = $bdd->prepare($com);
$com2->execute();


?>
<div class="container">
	<?php while ($donnees = $reponse2->fetch()) { ?>
	<h1 class="text-center text-uppercase page-header">Modération des commentaires de l'article <?= $id  ?></h1>
	<?php 
}
$reponse2->closeCursor();
?>
<?= isset($messagesup) ? $messagesup: "" ?>
<div class="row">
	<div class="col-xs-4 col-xs-offset-1">
		<button class="btn btn-md btn-default" type="button" onClick="document.location.href = document.referrer"><span class="glyphicon glyphicon-arrow-left"></span><strong> Back</strong></button>
	</div>
</div>
<br>

<?php  
while ($donnees = $com2->fetch()){
	$date = $donnees['com_date'];
	$date = new DateTime($date);		
	?>
	<div class="container">
		<div class="col-xs-12 jumbotron">

			<!--///////////////////// ESPACE PSEUDO /////////////////////////////////////////////////-->
			<section class=" ">
				<div class="col-xs-4">
					<strong><p><u><i><?= $donnees['com_pseudo'] ?> à écrit</i></u></p></strong>
				</div>

				<!--/////////////////// ESPACE DATE HEURE DU POST ///////////////////////////-->
				<div class="col-xs-6">
					<p><u><i>le <?= $date->format("d/m/Y à H:i") ?></i></u></p>
				</div>
				<div class="col-xs-2">
					<a href="?p=suppression&com=<?= $donnees['com_id'] ?>"><button title="supprimer" class="btn btn-md btn-danger"><span class="glyphicon glyphicon-remove"></span> <strong>Supprimer</strong></button></a>
				</div>

				<!--////////////////////// ESPACE COMMENTAIRE ////////////////////////////////////:-->
				<div class="col-xs-12 text-justify page-header">
					<p>
						<?= $donnees['com_content'] ?>
					</p>
				</div>

			</section>
		</div>
	</div>
	<?php }
	$com2->closeCursor();
	?>
</div>
