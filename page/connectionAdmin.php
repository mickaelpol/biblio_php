<?php 

// FUNCTION VERIFY IF THE PSEUDO AND PASSWORD ARE EMPTY 
function testInput ($fichier) {
	if (empty($_POST[$fichier])) {
		return "<span class='text-danger'>" ."Le champ " .$fichier. " est vide <br>" . "</span>";
	}
}

if (isset($_POST['valid'])) {
	
	// //  INIT VAR NULL 
	// $erreurPseudo = "";
	// $erreurMdp = "";

	//  VERIFY IF INPUT IS !EMPTY
	$erreurPseudo = ": " .testInput('pseudo');
	$erreurMdp = ": " .testInput('mot de passe');



	if(empty($erreurPseudo && empty($erreurMdp))){

		$pseudo = htmlspecialchars($_POST['pseudo'], ENT_QUOTES);
		$password = htmlspecialchars($_POST['password'], ENT_QUOTES);

			//CONNECTING AT BDD 
		include('./connect/connection.php');

			// 	REQUEST SQL TO VERIFY CORRESPONDENCE OF THE USER
		$sql = sprintf("SELECT * FROM uti_utilisateur WHERE uti_pseudo LIKE '%s';" , $pseudo);

		$query = $bdd->prepare($sql);
		$query->execute();
		$donnees = $query->fetch();

		if ($password = $donnees['uti_password']) {
			session_start();
			$_SESSION['uti_pseudo'] = $pseudo;
			$_SESSION['uti_id'] = $donnees['uti_id'];
			header('refresh:5;url=index.php?p=listArtAdmin');
			$message = "<div class='container-fluid text-center'" . "<p><span class='text-success text-uppercase'><strong> Connection" . "<br>"."En tant qu'".$pseudo . "</strong></span></p>" ."<br> attendez 5 secondes ou cliquez sur ce <strong><a href='index.php?p=listArtAdmin'>lien</a></strong> pour être rediriger directement" ."</div>";
			$erreurPseudo = "";
			$erreurMdp = "";
		} 
		else {
			$message = "<strong class='text-danger'>Identifient incorrect</strong>";
		}
	} 
}


?>


<div class="container">
	<div class="row">
		<div class="col-xs-5 col-xs-offset-3 jumbotron">
			<form action="?p=connectionAdmin" method="post" id='form'>
				<div class="form-group text-center" id="error1">
					<label class="control-label" for="pseudo">Pseudonyme <i id="textPseudo" ></i><?= isset($erreurPseudo) ? $erreurPseudo: "" ?></label>
					<input name="pseudo" type="text" class="champ form-control" id="pseudo">
				</div>
				<div class="form-group text-center" id="error2">
					<label class="control-label" for="password">mot de passe <i id="textMdp" ></i> <?= isset($erreurMdp) ? $erreurMdp: ""  ?></label>
					<input name="password" type="password" class="champ2 form-control" id="mdp">
				</div>
				<input name="valid" class="btn btn-success pull-right" type="submit" value="Envoyer" />
			</form>
			<p><?= isset($message) ? $message: "" ?></p>
		</div>
	</div>
</div>

<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="page/js/loginAdmin.js"></script>