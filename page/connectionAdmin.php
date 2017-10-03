<?php

function testInput($fichier){
	if(empty($_POST[$fichier])){
		return "<div class='text-danger'> le champ ". $fichier . " est vide</div>";
	}
}


	if(isset($_POST['valid'])) {
		if (empty($_POST['pseudo'])) {
			$erreurPseudo = ": " . testInput('pseudo');
		} if (empty($_POST['password'])) {
			$erreurMdp = ": " .testInput('mot de passe');
		}
		
		if(!empty($_POST['pseudo']) && !empty($_POST['password'])) {
		//Récupération et sécurisation des parametres
		$pseudoCoAdmin = htmlspecialchars($_POST['pseudo'], ENT_QUOTES);
		$passwordCoAdmin = htmlspecialchars($_POST['password'], ENT_QUOTES);
		// var_dump($password);
		//Vérification mot de passe
		
		//connecting at bdd 
		include('./connect/connection.php');
		// 	// 	request sql to verify correspondence of the user
			$sql = sprintf("select uti_pseudo, uti_password from uti_utilisateur where uti_pseudo = '%s';", $pseudoCoAdmin);
			
			$reponse = $bdd->query($sql);
			
			$row = $reponse->fetch();

			if ($passwordCoAdmin === $row['uti_password']) {
				session_start();
				$_SESSION['uti_pseudo'] = $pseudoCoAdmin;
				header('refresh:5;url=index.php?p=listArtAdmin');
				$message = "<div class='container-fluid text-center'" . "<p><span class='text-success text-uppercase'><strong> Connection" . "<br>"."En tant qu'".$pseudoCoAdmin . "</strong></span></p>" ."<br> attendez 5 secondes ou cliquez sur ce <strong><a href='index.php?p=listArtAdmin'>lien</a></strong> pour être rediriger directement" ."</div>";
			} else {
				$message = "<strong class='text-danger'>Identifient incorrect</strong>";
			}
	}
}







?>

<div class="container">
	<div class="row">
		<div class="col-xs-5 col-xs-offset-3 jumbotron">
			<form method="post" id='form'>
				<div class="form-group text-center" id="error1">
				<label for="pseudo">Pseudo <?= isset($erreurPseudo) ? $erreurPseudo: "" ?> <i id="textpseudo" ></i></label>
				<input name="pseudo" type="text" class="champ form-control" id="pseudo">
				</div>
				<div class="form-group text-center" id="error2">
				<label for="mdp">Mot de passe <?= isset($erreurMdp) ? $erreurMdp: "" ?> <i id="textmdp" ></i></label>
				<input name="password" type="password" class="champ2 form-control" id="mdp">
				</div>
				<button class="btn btn-success btn-md pull-right" type="submit" id="envoi" name="valid">Validez</button>
      	<input type="checkbox" id="passClair"> Affichez le mot de passe</label>
			</form>
			<p><?= isset($message) ? $message: "" ?></p>
		</div>	
	</div>
</div>

<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="page/js/loginAdmin.js"></script>