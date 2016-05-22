<?php
include("showRutas.php");

include_once 'app/config.inc.php';
include_once 'templates/declaracion.inc.php';
include_once 'templates/navbar.inc.php';
?>

<nav>
    <div class="nav-wrapper cyan">
        <div class="col s12">
            <a href="#" class="breadcrumb"></a>
            <a href="show.php" class="breadcrumb">Descubrir</a>
            <a href="#" class="breadcrumb"><?= $nombre ?></a>
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
                    <h4><?= $nombre ?></h4>
                    <p>Ruta de <span class="infoRuta"><?= $tipo ?></span> en <span class="infoRuta"><?= $ciudad ?></span>. Creada por <span class="infoRuta"><?= $autor ?></span></p>
                </div>
                <div class="col s12 m12 l12">
                    <a class="btnVoto btn tooltipped btn-floating btn-large red" data-position="left" data-delay="50" data-tooltip="16"><i class="material-icons">favorite_border</i></a>
                    <div id="bodyInfo">
                        <h5>Descripción</h5>
                        <p><?= $descripcion ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'templates/footer.inc.php';
?>

<script type="text/javascript">
    var ubicacionesPHP = '<?= $ubicaciones ?>';
</script>
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