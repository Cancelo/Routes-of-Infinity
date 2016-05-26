<?php
include_once 'app/config.inc.php';
include_once 'app/DAOUsuario.inc.php';
include_once 'app/DAORuta.inc.php';
include_once 'app/Ruta.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';

if (!isset($_GET['r'])) {
    Redireccion::redirect(DISCOVER);
} else if ($_GET['r'] == "") {
    Redireccion::redirect(DISCOVER);
} else {
    Conexion::openConexion();
    $ruta = DAORuta::rutaPorId(Conexion::getConexion(), $_GET['r']);
    if ($ruta == null) {
        Redireccion::redirect(DISCOVER);
    }
}

include_once 'templates/declaracion.inc.php';
include_once 'templates/navbar.inc.php';
?>

<nav>
    <div class="nav-wrapper cyan">
        <div class="col s12">
            <a href="#" class="breadcrumb"></a>
            <a href="show.php" class="breadcrumb">Descubrir</a>
            <a href="#" class="breadcrumb"><?php echo $ruta->getNombre(); ?></a>
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
                    <h4><?php echo $ruta->getNombre(); ?></h4>
                    <p>Ruta de <span class="infoRuta"><?php echo $ruta->getTipo(); ?></span> en <span class="infoRuta"><?php echo $ruta->getCiudad(); ?></span>. Creada por <span class="infoRuta"><?php echo DAOUsuario::usuarioPorId(Conexion::getConexion(), $ruta->getIdUsuario())->getNombre(); ?></span></p>
                </div>
                <div class="col s12 m12 l12">
					<p id="votar"></p>
                    <a onclick="getVotos('<?php echo $_GET['r']; ?>');" class="btnVoto btn tooltipped btn-floating btn-large red" data-position="left" data-delay="50" data-tooltip="<?php echo $ruta->getVotos(); ?>"><i class="material-icons">favorite_border</i></a>
                    <div id="bodyInfo">
                        <h5>Descripción</h5>
                        <p><?php echo $ruta->getDescripcion(); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'templates/footer.inc.php';
Conexion::closeConexion();
?>

<script type="text/javascript">
    var ubicacionesPHP = '<?php echo $ruta->getUbicaciones(); ?>';
</script>
<script type="text/javascript" src="js/votacion.js"></script>
<script type="text/javascript" src="js/mapShow.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDV4MUSp0pmtINyDHJKTIMkWJMen94eaYM&libraries=places"
async defer></script>
<script>
    $(document).ready(function () {
        $(".button-collapse").sideNav();
    });
</script>
</body>
</html>