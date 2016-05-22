<ul id="dropdownNormal" class="dropdown-content">
    <li><a href="<?php echo $profilePath; ?>">Menú</a></li>
    <li class="divider"></li>
    <li><a href="<?php echo $logoutPath; ?>">Cerrar sesión</a></li>
</ul>
<div class="navbar-fixed">
    <nav class="white">
        <div class="nav-wrapper">
            <a href="<?php echo $mainPath; ?>" class="brand-logo"><img id="logo" class="responsive-img" src="images/logo1.png"/></a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons black-text">menu</i></a>
            <ul id="navegacion" class="right hide-on-med-and-down">
                <li><a href="<?php echo $discoverPath; ?>">Descubrir</a></li>
                <li><a href="<?php echo $createPath; ?>">Crear</a></li>
                <?php
                session_start();

                if (!isset($_SESSION['user'])) {
                    echo "<li><a href='$loginPath'>Log in</a></li>";
                } else {
                    $user = $_SESSION['user'];
                    echo "<li><a class='dropdown-button' href='#'' data-activates='dropdownNormal'>$user<i class='material-icons right'>arrow_drop_down</i></a></li>";
                }
                ?>					
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="<?php echo $mainPath; ?>">Inicio</a></li>
                <li><a href="<?php echo $discoverPath; ?>">Descubrir</a></li>
                <li><a href="<?php echo $createPath; ?>">Crear</a></li>
                <?php
                if (!isset($_SESSION['user'])) {
                    echo "<li><a href='$loginPath'>Log in</a></li>";
                } else {
                    $user = $_SESSION['user'];
                    echo "<li><a href='$profilePath'>Menú de $user</a></li>";
                    echo "<li><a href='$logoutPath'>Cerrar sesión</a></li>";
                }
                ?>	
            </ul>
        </div>
    </nav>
</div>