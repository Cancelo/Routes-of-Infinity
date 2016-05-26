<?php
include_once 'app/config.inc.php';
include_once 'templates/declaracion.inc.php';
?>
<header>
    <div id="main" class="card">
        <div id="logoPrincipal">
            <img class="responsive-img" src="images/logo1.png" alt="logo">
        </div>
        <p id="info">0 rutas creadas.</p>
        <p id="sugerir">Sugerir ruta segúnn mi ubicación.</p>					
        <nav>
            <div class="nav-wrapper cyan">
                <form action="discover.php" method="get">
                    <div class="input-field">
                        <input id="search" type="search" name="b" placeholder="EMPIEZA AQUÍ..." required>
                        <label for="search"><i class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                    </div>
                </form>
            </div>
        </nav>
    </div>
    <div class="row center">
        <a id="continuar" href="<?php echo DISCOVER; ?>">Continuar sin buscar</a>
    </div>
</header>
<footer id="copyR">
    <p>Routes of infinity - <a href="rcancelo.com">rcancelo</a></p>
</footer>
<script type="text/javascript" src="js/scriptIndex.js"></script>
</body>
</html>