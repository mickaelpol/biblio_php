<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="?p=accueil">Accueil Bibliotheque</a>
		</div>
		<ul id="activeLien" class="nav navbar-nav">
			<li class="active"><a href="?p=listArt"><span class="glyphicon glyphicon-align-justify"></span> Liste des articles</a></li>
			<li><a href="?p=genre"><span class="glyphicon glyphicon-bookmark"></span> Genres</a></li>
			<form class="navbar-form navbar-left">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search">
					<div class="input-group-btn">
						<button class="btn btn-default" type="submit">
							<i class="glyphicon glyphicon-search"></i>
						</button>
					</div>
				</div>
			</form>

		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="?p=listArtAdmin">Liste article(admin)</a></li>
			<li><a href="?p=modComAdmin">Modération des com(admin)</a></li>
			<li><a href="#"><span class="glyphicon glyphicon-user"></span> Login</a></li>
			<li><a href="#"><span class="glyphicon glyphicon-off"></span> Log Out</a></li>
		</ul>
	</div>
</nav>