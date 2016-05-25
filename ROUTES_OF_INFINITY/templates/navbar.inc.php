<?php
include_once 'app/config.inc.php';
include_once 'app/ControlSesion.inc.php';
?>

<ul id="dropdownNormal" class="dropdown-content">
    <li><a href="<?php echo PROFILE; ?>">Menú</a></li>
    <li class="divider"></li>
    <li><a href="<?php echo LOGOUT; ?>">Cerrar sesión</a></li>
</ul>
<div class="navbar-fixed">
    <nav class="white">
        <div class="nav-wrapper">
            <a href="<?php echo MAIN; ?>" class="brand-logo"><img id="logo" class="responsive-img" src="images/logo1.png"/></a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons black-text">menu</i></a>
            <ul id="navegacion" class="right hide-on-med-and-down">
                <li><a href="<?php echo DISCOVER; ?>">Descubrir</a></li>
                <li><a href="<?php echo CREATE; ?>">Crear</a></li>
                <?php if(ControlSesion::sesionActiva()) { ?>

                <li><a class="dropdown-button" href="#" data-activates="dropdownNormal"><?php echo $_SESSION['nombre']; ?><i class="material-icons right">arrow_drop_down</i></a></li>

                <?php } else { ?>

                <li><a href="<?php echo LOGIN; ?>">Login</a></li>

                <?php } ?>
                                				
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="<?php echo MAIN; ?>">Inicio</a></li>
                <li><a href="<?php echo DISCOVER; ?>">Descubrir</a></li>
                <li><a href="<?php echo CREATE; ?>">Crear</a></li>
                <?php if(ControlSesion::sesionActiva()) { ?>

                <li><a href="<?php echo PROFILE; ?>">Menú de <?php echo $_SESSION['nombre']; ?></a></li>
                <li><a href="<?php echo LOGOUT; ?>">Logout</a></li>                

                <?php } else { ?>

                <li><a href="<?php echo LOGIN; ?>">Login</a></li>

                <?php } ?>
            </ul>
        </div>
    </nav>
</div>