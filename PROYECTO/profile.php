<?php
	session_start();

	if(!isset($_SESSION['user'])) {
		header("Location:login.html");
	}
	else {
		$user=$_SESSION['user'];
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<title>Routes of infinity</title>
		<meta name="keywords" content=""/>
		<meta name ="description" content=""/>
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body id="discoverBg">
		<ul id="dropdownNormal" class="dropdown-content">
		  <li><a href="profile.php">Menú</a></li>
		  <li class="divider"></li>
		  <li><a href="logout.php">Cerrar sesión</a></li>
		</ul>
		<div class="navbar-fixed">
			<nav class="white">
				<div class="nav-wrapper">
					<a href="index.html" class="brand-logo"><img id="logo" class="responsive-img" src="images/logo1.png"/></a>
					<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons black-text">menu</i></a>
					<ul id="navegacion" class="right hide-on-med-and-down">
						<li><a href="discover.php">Descubrir</a></li>
						<li><a href="create.php">Crear</a></li>
						<li><a class="dropdown-button" href="#!" data-activates="dropdownNormal"><?=$user?><i class="material-icons right">arrow_drop_down</i></a></li>				
					</ul>
					<ul class="side-nav" id="mobile-demo">
						<li><a href="index.html">Inicio</a></li>
						<li><a href="discover.php">Descubrir</a></li>
						<li><a href="create.php">Crear</a></li>
						<?php
							if(!isset($_SESSION['user'])) {
								echo "<li><a href='login.html'>Log in</a></li>";
							}
							else{
								$user=$_SESSION['user'];
								echo "<li><a href='profile.php'>Menú de $user</a></li>";
								echo "<li><a href='logout.php'>Cerrar sesión</a></li>";						
							}
						?>	
					</ul>
				</div>
			</nav>
		</div>
		<nav>
			<div class="nav-wrapper cyan">
				<div class="col s12">
					<a href="profile.php" class="breadcrumb"></a>
					<a href="profile.php" class="breadcrumb"><?=$user?></a>
					<a href="profile.php" class="breadcrumb">Menú</a>
				</div>
			</div>
		</nav>
		<div class="container">
			<div class="row">
				<div class="col s12 m3 l3">
					<div class="row">
						<div class="col">
						  <div class="card">
							<div class="card-image">
							  <img src="images/profile2.png">
							  <span class="card-title black-text"><?=$user?></span>
							  
							</div>
							<div class="card-action">
							  <a href="#" class="cyan-text">Eliminar cuenta</a>
							</div>
						  </div>
						</div>
					</div>
				</div>
				<div class="col s12 m9 l9">
					<div class="row card">
					<ul class="collection">
						<li class="collection-item avatar">
						  <i class="material-icons circle blue">local_bar</i>
						  <span class="title">Ruta 1</span>
						  <p>First Line <br>
							 Second Line
						  </p>
						  <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
						</li>
						<li class="collection-item avatar">
						  <i class="material-icons circle blue">local_bar</i>
						  <span class="title">Ruta 2</span>
						  <p>First Line <br>
							 Second Line
						  </p>
						  <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
						</li>
						<li class="collection-item avatar">
						  <i class="material-icons circle green">account_balance</i>
						  <span class="title">Ruta 3</span>
						  <p>First Line <br>
							 Second Line
						  </p>
						  <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
						</li>
						<li class="collection-item avatar">
						  <i class="material-icons circle green">account_balance</i>
						  <span class="title">Ruta 4</span>
						  <p>First Line <br>
							 Second Line
						  </p>
						  <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
						</li>
						<li class="collection-item avatar">
						  <i class="material-icons circle orange">map</i>
						  <span class="title">Ruta 5</span>
						  <p>First Line <br>
							 Second Line
						  </p>
						  <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
						</li>
						<li class="collection-item avatar">
						  <i class="material-icons circle orange">map</i>
						  <span class="title">Ruta 6</span>
						  <p>First Line <br>
							 Second Line
						  </p>
						  <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
						</li>
						<li class="collection-item avatar">
						  <i class="material-icons circle orange">map</i>
						  <span class="title">Ruta 6</span>
						  <p>First Line <br>
							 Second Line
						  </p>
						  <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
						</li>
						
					  </ul>
					</div>
				</div>
			</div>
		</div>
		<footer class="page-footer grey darken-2">
			<div class="container">
				<div class="row">
					<div class="col l6 s12">
						<h5 class="white-text">¿Te gustaría participar?</h5>
						<p class="grey-text text-lighten-4">Routes of infinity es una plataforma destinada a las personas que les gusta viajar y descubrir lugares nuevos.</br></br><a href="">Registrarse</a> es muy simple, sólo necesitas un nombre de usuario y una contraseña. A partir de ahí ya podrás crear rutas de todo tipo; rutas de vinos o cañas, rutas gastronómicas, lugares que visitar en una ciudad determinada...
						</p>
					</div>
					<div class="col l4 offset-l2 s12">
						<h5 class="white-text">Mapa web</h5>
						<ul>
							<li><a class="grey-text text-lighten-3" href="#!">Principal</a></li>
							<li><a class="grey-text text-lighten-3" href="#!">Buscar rutas</a></li>
							<li><a class="grey-text text-lighten-3" href="create.html">Crear ruta</a></li>
							<li><a class="grey-text text-lighten-3" href="#!">Registrarse</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="footer-copyright">
				<div class="container">
					© 2016 Routes of infinity
					<a class="grey-text text-lighten-4 right" href="#!">powered by rcancelo</a>
				</div>
			</div>
		</footer>
		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script>
			$(document).ready(function () {
				$(".dropdown-button").dropdown();
				$(".button-collapse").sideNav();
				$('select').material_select();
			});
		</script>
	</body>
</html>