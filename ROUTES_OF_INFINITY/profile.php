<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/MostrarRutas.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';

if (!ControlSesion::sesionActiva()) {
    Redireccion::redirect(LOGIN);
}

include_once 'templates/declaracion.inc.php';
include_once 'templates/navbar.inc.php';
?>

<nav>
    <div class="nav-wrapper cyan">
        <div class="col s12">
            <a href="#" class="breadcrumb"></a>
            <a href="#" class="breadcrumb"><?php echo $_SESSION['nombre']; ?></a>
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
                            <span class="card-title black-text"><?php echo $_SESSION['nombre']; ?></span>

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
                <ul class="collection with-header">
                    <li class="collection-header"><h4>Rutas creadas</h4></li>
                    <?php
                    Conexion::openConexion();
                    MostrarRutas::mostrarRutasPerfil();
                    Conexion::closeConexion();
                    ?>	
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'templates/footer.inc.php';
?>
<script>
    $(document).ready(function () {
        $(".dropdown-button").dropdown();
        $(".button-collapse").sideNav();
        $('select').material_select();
    });
</script>
</body>
</html>