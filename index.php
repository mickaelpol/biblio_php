<?php 

	if(isset($_GET['p'])){
		
		$p = $_GET['p'];
	
	} else {
		
		$p = 'accueil';
		
	}


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


	$content = ob_get_clean();
	include('page/template/default.php');

?>