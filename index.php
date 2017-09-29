<?php 


if(isset($_GET['p'])){

	$p = $_GET['p'];
	
} else {

	$p = 'accueil';

}

	// démarre la memoire tampon pour garder les valeurs des superglobale en memoire pour charger une page
ob_start();

	// si la variable $p vaut ?p=accueil renvoi vers la page accueil.php
if($p === 'accueil'){
	include('page/accueil.php');
}

	// si la variable $p vaut ?p=listArt renvoi vers la page listArt.php
if($p === 'listArt'){
	include('page/listArt.php');
}

	// si la variable $p vaut ?p=genre renvoi vers la page genre.php
if($p === 'genre'){
	include('page/genre.php');
}

	// si la variable $p vaut ?p=listArtAdmin renvoi vers la page listArtAdmin.php
if($p === 'listArtAdmin'){
	include('page/listArtAdmin.php');
}

	// si la variable $p vaut ?p=modComAdmin renvoi vers la page modComAdmin.php
if ($p === 'modComAdmin') {
	include('page/modComAdmin.php');
}

	// si la variable $p vaut ?p=connectionAdmin renvoi vers la page connectionAdmin.php
if ($p === 'connectionAdmin') {
	include('page/connectionAdmin.php');
}

	// si la variable $p vaut ?p=decoAdmin renvoi vers la page decoAdmin.php
if ($p === 'decoAdmin') {
	include('page/decoAdmin.php');
}
	// si la varibale $p vaut ?p=article&&A= id de l'article alors renvoi vers la page pageArticle.php avec en include l'article selectionnée
if 	($p === 'article'&&$_GET['A']){
	include('page/pageArticle.php');
}

	// si la varibale $p vaut ?p=supprimer&&S= id de l'article alors renvoi vers la page de suppression de l'article selectionnée
if  ($p === 'supprimer'&&$_GET['S']) {
	include('page/suppressionArticle.php');
}

if ($p === 'suppression'&&$_GET['com']) {
	include('page/supprimerCom.php');
}

	// si la varibale $p vaut ?p=ajouterArticle alors renvoi vers la page d'ajout d'un article 
if ($p === 'ajoutArticle') {
	include('page/ajoutArt.php');
}

	// si la varibale $p vaut ?p=reediter&&R= id de l'article alors renvoi vers la page de reedition de l'article selectionnée
if ($p === 'reediter'&&$_GET['R']) {
	include('page/reeditionArt.php');
}

if ($p === 'modCom'&&$_GET['M']) {
	include('page/modComAdmin.php');
}

if ($p === 'traitementRecherche') {
	include('page/traitRecherche.php');
}


// if ($p === 'listArt'&&$_GET['tri']&&$_GET['search']) {
// 	include('page/listArt.php');
// }
	// vide la memoire tampon
$content = ob_get_clean();
include('page/template/default.php');

?>