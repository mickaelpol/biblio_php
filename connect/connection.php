<?php 

// injection du fichier connection.php qui lis les variable au valeurs utilé pour la connection a la BDD
include('./config/parameters.php');

// connection a la BDD 
try {
	 // connection 
	$bdd = new PDO("pgsql:host=$server port=$port dbname=$dbname user=$user password=$password");
	// $bdd = new PDO('mysql:host='.$server.';dbname=' .$dbname. ';charset=utf8', $user, $password);
} catch (Exception $e) {

// si il y a une erreur j'envoi un message et je stoppe tout processus
	die('Erreur :' .$e->getMessage());

}

?>