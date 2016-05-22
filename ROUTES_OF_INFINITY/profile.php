<?php
include_once 'app/config.inc.php';
include_once 'templates/declaracion.inc.php';
include_once 'templates/navbar.inc.php';
?>

<nav>
    <div class="nav-wrapper cyan">
        <div class="col s12">
            <a href="#" class="breadcrumb"></a>
            <a href="#" class="breadcrumb"><?= $user ?></a>
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
                            <span class="card-title black-text"><?= $user ?></span>

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
                <ul class="collection">
                    <?php include("profileConsulta.php"); ?>	
                </ul>
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
        $(".dropdown-button").dropdown();
        $(".button-collapse").sideNav();
        $('select').material_select();
    });
</script>
</body>
</html>