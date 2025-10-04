<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>
<!DOCTYPE html>
<html lang="en" class="material-style layout-fixed">

<head>
    <?php include "components/head.html"; ?>
</head>

<body>
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <div class="layout-wrapper layout-2">
        <div class="layout-inner">
            <?php include "components/menu-lateral.html"; ?>
            <div class="layout-container">
                <?php include "components/nav-top.html"; ?>
                <div class="layout-content">
                    <div class="container-fluid flex-grow-1 container-p-y">

                        <!-- TU CONTENIDO -->
                        <form method="GET" action="controller/cconsultas.php">
                            <input type="text" class="form-control" name="id" hidden value='<?php echo $_GET["id_inter"] ?>'>
                            <div class="form-group">
                                <label class="form-label">Paciente</label>
                                <input type="text" class="form-control" readonly placeholder="paciente" value='<?php echo rawurldecode($_GET["pac_inter"]); ?>'>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Fecha Inicio</label>
                                <input type="text" class="form-control" readonly name="fecha" value='<?php echo date("d-m-Y"); ?>'>
                                <div class="clearfix"></div>
                            </div>
                            <?php
                            include "controller/cconsultas.php";
                            $res = new Controler;
                            $response = $res->getSalas();
                            ?>
                            <div class="form-group">
                                <label class="form-label">Sala Disponible</label>
                                <select class="custom-select" name="idsala">
                                    <?php foreach ($response as $value) { ?>
                                        <option><?php echo  $value["id"]; ?></option>
                                    <?php }; ?>
                                </select>

                                <div class="clearfix"></div>
                            </div>
                            <button type="submit" name="reg_internacion" class="btn btn-primary waves-effect">
                                Registrar Internacion
                            </button>
                            <!-- TU CONTENIDO -->
                        </form>
                        <!-- TU CONTENIDO -->

                    </div>
                    <?php include "components/footer.html"; ?>
                </div>
            </div>
        </div>
    </div>
    <?php include "components/scrips.html"; ?>
</body>

</html>