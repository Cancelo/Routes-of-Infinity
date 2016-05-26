<?php
include_once 'app/ControlVotos.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Conexion.inc.php';

Conexion::openConexion();
session_start();

if(isset($_REQUEST['id']) && isset($_SESSION['id'])) {
	$control = ControlVotos::haVotado(Conexion::getConexion(), $_REQUEST['id'], $_SESSION['id']);

	if($control){
		echo "Ya has votado esta ruta";
	}
	else {
		$control = ControlVotos::votar(Conexion::getConexion(), $_REQUEST['id'], $_SESSION['id']);

		if($control) {
			echo "Voto guardado";
		}
		else {
			echo "Algo ha salido mal, vuelve a intentarlo mas tarde";
		}
	}
}
else {
	echo "Debes iniciar sesión para votar";
}
Conexion::closeConexion();