<?php
include_once 'app/config.inc.php';
include_once 'templates/declaracion.inc.php';
include_once 'templates/navbar.inc.php';
?>

<nav>
    <div class="nav-wrapper cyan">
        <div class="col s12">
            <a href="#" class="breadcrumb"></a>
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

<?php
include_once 'templates/footer.inc.php';
?>

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