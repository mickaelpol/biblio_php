<?php 
session_start();


include('./connect/connection.php');

$id = $_GET['S'];

$reponse = ("SELECT art_id FROM art_article WHERE 
	art_id='".$id."' ");
$reponse2 = $bdd->prepare($reponse);
$reponse2->execute();

$delete = ("DELETE FROM art_article WHERE art_id='".$id."' ");
$delete2 = $bdd->prepare($delete);
$delete2->execute();



$messagesup = '<p class="text-center text-uppercase">L\'article '.$id.' à bien été supprimer cliquez <a href="?p=listArtAdmin" >ici pour être re diriger directement</a></p>';

header('refresh:5;url=index.php?p=listArtAdmin');

	?>


	<div class="container jumbotron text-success">
		<div class="row">
			<div class="col-xs-12">
			<?= isset($messagesup) ? $messagesup : "" ?>
			</div>
		</div>
	</div>