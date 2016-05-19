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
		  <li><a href="profile.html">Menú</a></li>
		  <li class="divider"></li>
		  <li><a href="logout.php">Cerrar sesión</a></li>
		</ul>
		<div class="navbar-fixed">
			<nav class="white">
				<div class="nav-wrapper">
					<a href="discover.php" class="brand-logo"><img id="logo" class="responsive-img" src="images/logo1.png"/></a>
					<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons black-text">menu</i></a>
					<ul id="navegacion" class="right hide-on-med-and-down">
						<li><a href="index.html">Inicio</a></li>
						<li><a href="discover.php">Descubrir</a></li>
						<li><a href="create.php">Crear</a></li>
						<?php 
							session_start();

							if(!isset($_SESSION['user'])) {
								echo "<li><a href='login.html'>Log in</a></li>";
							}
							else{
								$user=$_SESSION['user'];
								echo "<li><a class='dropdown-button' href='#!'' data-activates='dropdownNormal'>$user<i class='material-icons right'>arrow_drop_down</i></a></li>";							
							}
						?>					
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
					<a href="#!" class="breadcrumb"></a>
					<a href="#!" class="breadcrumb">Descubrir</a>
				</div>
			</div>
		</nav>
		<div class="container">
			<div class="row card" id="filtro">
				<div class="col s12 m12 l3">
					<nav class="filtroBuscador">
						<div class="nav-wrapper cyan">
						<form action="discover.php" method="get">
							<div class="input-field">
								<input id="search" type="search" name="b" placeholder="BUSCAR" required>
								<label for="search"><i class="material-icons">search</i></label>
								<i class="material-icons">close</i>
							</div>							
						</div>
					</nav>
				</div>
				<div class="filtroSelect col s6 m4 l2">
					<select>
						<option value="" disabled selected>Orden</option>
						<option value="1">Ascendente</option>
						<option value="2">Descendente</option>
					</select>
				</div>
				<div class="filtroSelect col s6 m4 l2">
					<select>
						<option value="" disabled selected>Características</option>
						<option value="1">Valoración</option>
						<option value="2">Fecha</option>
						<option value="3">Tamaño de la ruta</option>
					</select>
				</div>
				<div class="filtroSelect col s6 m4 l2">
					<select>
						<option value="" disabled selected>Tipo</option>
						<option value="1">Ocio</option>
						<option value="2">Cultural</option>
						<option value="3">Otros</option>
					</select>
					</form>
				</div>
				<div class="aplicarFiltro col s6 m12 l3">
					<button class="btn waves-effect waves-light cyan" type="submit" name="action">Aplicar filtro
						<i class="material-icons right">send</i>
					</button>
				</div>				
			</div>
			<div class="row">
				<?php
					if (isset($_GET['b'])) {
						include("discoverConsultaBusqueda.php");
					} else {
						include("discoverConsulta.php");
					}
				?>

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