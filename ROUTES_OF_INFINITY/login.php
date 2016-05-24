<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/DAOUsuario.inc.php';
include_once 'app/ValidadorLogin.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';

if (ControlSesion::sesionActiva()) {
    Redireccion::redirect(PROFILE);
}

if (isset($_POST['registro'])) {
    Conexion::openConexion();

    if (!isset($_POST['user']) || !isset($_POST['pass']) || !isset($_POST['repass'])) {
        echo "No se han recibido datos";
        #header("Location:index.php");
    } else if ($_POST['user'] == "" || $_POST['pass'] == "" || $_POST['repass'] == "") {
        echo "Campos vacíos";
        #header("Location:index.php");
    } else if ($_POST['pass'] != $_POST['repass']) {
        echo "No coincide";
    } else if (DAOUsuario::nombreRepetido(Conexion::getConexion(), $_POST['user'])) {
        echo "Nombre repetido";
    } else {
        $usuario = new Usuario('', $_POST['user'], password_hash($_POST['pass'], PASSWORD_DEFAULT), '', 0, 0);
        $control = DAOUsuario::insertarUsuario(Conexion::getConexion(), $usuario);

        if ($control) {
            echo "Correcto";
        }
    }
    Conexion:: closeConexion();
}

if (isset($_POST['login'])) {
    Conexion::openConexion();
    $validador = new ValidadorLogin(Conexion::getConexion(), $_POST['user'], $_POST['pass']);

    // Si no hay ningun error y usuario no es null, hemos recuperado el usuario y los datos son correctos
    if ($validador->getError() === "" && !is_null($validador->getUsuario())) {
        ControlSesion::startSesion($validador->getUsuario()->getId(), $validador->getUsuario()->getNombre());

        Redireccion::redirect(PROFILE);
    }
    Conexion::closeConexion();
}

include_once 'templates/declaracion.inc.php';
include_once 'templates/navbar.inc.php';
?>

<nav>
    <div class="nav-wrapper cyan">
        <div class="col s12">
            <a href="#!" class="breadcrumb"></a>
            <a href="#!" class="breadcrumb">Login</a>
        </div>
    </div>
</nav>
<div class="container loginContainer">
    <div class="row card">
        <div class="col s12 m6 l6">
            <div class="row login">
                <h5>Acceder</h5>
                <form method="post" action="login.php">
                    <div class="col s12">
                        <div class="input-field">
                            <input id="user" type="text" name="user" class="validate">
                            <label for="user">Usuario</label>
                        </div>
                    </div>
                    <div class="col s12">
                        <div class="input-field">
                            <input id="pass" type="password" name="pass" class="validate">
                            <label for="pass">Contraseña</label>
                        </div>
                    </div>						
                    <div class="col s12">
                        <button class="btn waves-effect waves-light cyan" type="submit" name="login">Acceder
                            <i class="material-icons right">send</i>
                        </button>
                </form>
            </div>
        </div>
    </div>
    <div class="col s12 m6 l6">
        <div class="row login">
            <h5>Registrarse</h5>
            <form method="post" action="login.php">
                <div class="col s12">
                    <div class="input-field">
                        <input id="usuario" type="text" name="user" class="validate">
                        <label for="usuario">Usuario</label>
                    </div>
                </div>
                <div class="col s12">
                    <div class="input-field">
                        <input id="passR" type="password" name="pass" class="validate">
                        <label for="passR">Contraseña</label>
                    </div>
                </div>
                <div class="col s12">
                    <div class="input-field">
                        <input id="repass" type="password" name="repass" class="validate">
                        <label for="repass">Repita la contraseña</label>
                    </div>
                </div>
                <div class="col s12">
                    <button class="btn waves-effect waves-light cyan" type="submit" name="registro">Registrarse
                        <i class="material-icons right">send</i>
                    </button>
            </form>
        </div>
    </div>					
</div>
</div>
</div>

<?php
include_once 'templates/footer.inc.php';
?>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script>
    $(document).ready(function () {
        $(".button-collapse").sideNav();
    });
</script>
</body>
</html>