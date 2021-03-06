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
		<link rel="stylesheet" type="text/css" href="css/mapStyle.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<!-- Dropdown Structure -->
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
					<li><a class="dropdown-button" href="#!" data-activates="dropdownNormal"><?=$user ?><i class="material-icons right">arrow_drop_down</i></a></li>
				  </ul>
				  <ul class="side-nav" id="mobile-demo">
					<li><a href="index.html">Inicio</a></li>
					<li><a href="discover.php">Descubrir</a></li>
					<li><a href="create.php">Crear</a></li>
					<li><a href="profile.php">Menu de <?=$user ?></a></li>
					<li><a href="logout.php">Cerrar sesión</a></li>
				  </ul>
				</div>
			  </nav>
			</div>
			<nav>
			<div class="nav-wrapper cyan">
				<div class="col s12">
					<a href="create.php" class="breadcrumb"></a>
					<a href="create.php" class="breadcrumb">Crear</a>
				</div>
			</div>
			</nav>
		<!-- MAIN -->
		<div class="container">
			<div class="row card">			
				<div class="col s12 m9 l10 paddingCol">
					<input id="pac-input" class="controls" type="text" placeholder="Search Box">
					<div id="map"></div>
				</div>
				<div class="col s12 m3 l2 paddingCol">
					<div class="row">
						<div class="col s8 m12 l12">
							<div class="input-field">
								<input id="etiqueta" type="text">
								<label for="etiqueta">Nombre ubicación</label>				          
							</div>
						</div>
						<div class="col s4 m12 l12">
							<a id="guardar" class="waves-effect waves-light btn cyan">Guardar</a>
							<a id="undo" class="waves-effect waves-light btn cyan">Deshacer</a>
						</div>
						<div id="chipsLateral" class="col s12 m12 l12 center-align paddingCol">

						</div>
						<div class="col s12 m12 l12">
							<a id="terminar" class="modal-trigger waves-effect waves-light btn cyan" href="#modal1">Continuar</a>
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

		<!-- Modal Structure -->
		<div id="modal1" class="modal">
			<div class="modal-content">
				<div class="row sinMargen">
					<h5>Finalizar ruta</h5>
					<p>Para finalizar introduce el nombre de la ruta, la ciudad en la que se encuentra y una descripción de la misma.</p>
				</div>
				<form method="post" action="save.php" name="datos">
					<div class="row sinMargen">
						<div class="input-field col s6">
							<i class="material-icons prefix">label</i>
							<input id="nombreRuta" name="nombreRuta" type="text" class="validate">
							<label for="nombreRuta">Nombre de la ruta</label>
						</div>
						<div class="input-field col s6">
							<i class="material-icons prefix">location_on</i>
							<input id="ciudadRuta" name="ciudadRuta" type="text" class="validate">
							<label for="ciudadRuta">Ciudad</label>
						</div>    		
					</div>
					<div class="row sinMargen">    
						<div class="input-field col s9">
							<i class="material-icons prefix">description</i>
							<textarea id="descripcion" name="descripcionRuta" class="materialize-textarea"></textarea>
							<label for="descripcion">Descripción</label>
						</div>
						<div lass="input-field col s3">
							<p>
								<input class="with-gap" name="tipo" type="radio" id="ocio" value="Ocio"  />
								<label for="ocio">Ocio</label>
							</p>
							<p>
								<input class="with-gap" name="tipo" type="radio" id="cultural" value="Cultural"  />
								<label for="cultural">Cultural</label>
							</p>
							<p>
								<input class="with-gap" name="tipo" type="radio" id="otros" value="Otros" checked/>
								<label for="otros">Otros</label>
							</p>
						</div>
					</div>
					<div class="row sinMargen">
						<div id="chipsModal" class=" col s12"></div>
					</div>
					<input type="hidden" name="ubicacionesRuta" id="ubicacionesRuta"/>
				</form>
			</div>

			<div class="modal-footer">
				<a href="javascript:enviar_form()" class="modal-action modal-close waves-effect waves-green btn-flat">Finalizar</a>
			</div>
		</div>

		<script type="text/javascript" src="js/map.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDV4MUSp0pmtINyDHJKTIMkWJMen94eaYM&libraries=places&callback=initAutocomplete"
		async defer></script>
		<script type="text/javascript" src="js/scriptCreate.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script>
			$(document).ready(function () {
				$(".dropdown-button").dropdown();
				$(".button-collapse").sideNav();
				$('.modal-trigger').leanModal();
			});
		</script>
	</body>
</html>