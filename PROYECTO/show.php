<?php
	include("showRutas.php");
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
		<link rel="stylesheet" type="text/css" href="css/mapStyle.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript">
			var ubicacionesPHP  = '<?=$ubicaciones?>';			
		</script>
	</head>
	<body>
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
					<a href="show.php" class="breadcrumb">Descubrir</a>
					<a href="#!" class="breadcrumb"><?=$nombre?></a>
				</div>
			</div>
		</nav>
		<!-- MAIN -->
		<div class="container">
			<div class="row card">
				<div class="col s12 m8 l8 paddingCol">
					<div id="mapMostrar"></div>
				</div>
				<div class="col s12 m4 l4">					
					<div class="row">					
						<div class="col s12 m12 l12" id="headerInfoRuta1">
							<h4><?=$nombre?></h4>
							<p>Ruta de <span class="infoRuta"><?=$tipo?></span> en <span class="infoRuta"><?=$ciudad?></span>. Creada por <span class="infoRuta"><?=$autor?></span></p>
						</div>
						<div class="col s12 m12 l12">
							<a class="btnVoto btn tooltipped btn-floating btn-large red" data-position="left" data-delay="50" data-tooltip="16"><i class="material-icons">favorite_border</i></a>
							<div id="bodyInfo">
								<h5>Descripción</h5>
								<p><?=$descripcion?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- FOOTER -->
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
							<li><a class="grey-text text-lighten-3" href="#!">Crear ruta</a></li>
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
		<script type="text/javascript" src="js/mapShow.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDV4MUSp0pmtINyDHJKTIMkWJMen94eaYM&libraries=places"
		async defer></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script>
			$(document).ready(function () {
				$(".button-collapse").sideNav();
			});
		</script>
	</body>
</html>