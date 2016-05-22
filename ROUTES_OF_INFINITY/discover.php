<?php
include_once 'app/config.inc.php';
include_once 'templates/declaracion.inc.php';
include_once 'templates/navbar.inc.php';
?>

<nav>
    <div class="nav-wrapper cyan">
        <div class="col s12">
            <a href="#" class="breadcrumb"></a>
            <a href="discover.php" class="breadcrumb">Descubrir</a>
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
                            <input id="search" type="search" name="b" placeholder="BUSCAR">
                            <label for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                        </div>							
                </div>
            </nav>
        </div>
        <div class="filtroSelect col s6 m4 l2">
            <select name="orden" class="browser-default">
                <option value="" disabled selected>Orden</option>
                <option value="ASC">Ascendente</option>
                <option value="DESC">Descendente</option>
            </select>
        </div>
        <div class="filtroSelect col s6 m4 l2">
            <select name="caract" class="browser-default">
                <option value="" disabled selected>Características</option>
                <option value="votos">Valoración</option>
                <option value="fecha">Fecha</option>
                <option value="tamano">Tamaño de la ruta</option>
            </select>
        </div>
        <div class="filtroSelect col s6 m4 l2">
            <select name="tipo" class="browser-default">
                <option value="" disabled selected>Tipo</option>
                <option value="Ocio">Ocio</option>
                <option value="Cultural">Cultural</option>
                <option value="Otros">Otros</option>
            </select>
        </div>
        <div class="aplicarFiltro col s6 m12 l3">
            <button class="btn waves-effect waves-light cyan" type="submit">Aplicar
                <i class="material-icons right">filter_list</i>
            </button>
            </form>	
            <button id="limpiar" class="btn waves-effect waves-light cyan" type="submit">
                <i class="material-icons right">cancel</i>
            </button>								
        </div>		
    </div>
    <div class="row">
        <?php include("discoverFiltro.php"); ?>
    </div>
</div>

<?php
include_once 'templates/footer.inc.php';
?>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/scriptDiscover.js"></script>
<script>
    $(document).ready(function () {
        $(".dropdown-button").dropdown();
        $(".button-collapse").sideNav();
    });
</script>
</body>
</html>