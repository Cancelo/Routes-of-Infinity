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
	<body>
		<nav class="transparent">
			<div class="nav-wrapper">
				<a href="#!" class="brand-logo center"><img id="logoShow" class="responsive-img" src="images/logo1.png"/></a>
				<a href="#" data-activates="mobile-demo" id="button-collapse"><i class="material-icons">menu</i></a>
				<ul class="side-nav" id="mobile-demo">
					<li><a href="index.html">Inicio</a></li>
					<li><a href="discover.html">Descubrir</a></li>
					<li><a href="create.html">Crear</a></li>
					<li><a href="profile.html">Mi perfil</a></li>
					<li><a href="logout.html">Cerrar sesión</a></li>
				</ul>
			</div>
		</nav>
		<div class="container">
			<div class="row">
				<div class="s12 m12 l12 card">
					aaa
				</div>
				<?php 
					if(isset($_GET['b'])){
						include("mostrarRutasBusqueda.php");
					}
					else{
						include("mostrarRutas.php");
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
		<script type="text/javascript" src="js/script.js"></script>
		<script>
			$(document).ready(function () {
				$("#button-collapse").sideNav();
			});
		</script>
	</body>
</html>