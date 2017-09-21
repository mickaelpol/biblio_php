<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>biblio_php</title>
	<link rel="icon" type="image/png" href="favicon.png"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"> -->
	<!-- <link rel="stylesheet" href="page/aide.css"> -->
</head>
<body>

<!-- Inclus la page navbar.php pour l'afficher sur toutes les pages  -->
<?php include('navbar.php'); ?>

<!-- Inclus le contenu de la page ciblé via la navbar avec $content -->
<?= $content ?>

<!-- Inclus la page footer.php pour l'afficher sur toutes les pages -->
<?php include('footer.php'); ?>

<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="page/js/app.js"></script>
</body>
</html>