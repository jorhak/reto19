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
                        <div class="card mb-4">
                            <h6 class="card-header">Agendar una consulta medica</h6>
                            <div class="card-body">
                                <form method="GET" action="controller/cconsultas.php">
                                    <div class="form-row">
                                        <input type="hidden" name="nombre" value="<?php echo $_SESSION['nombre']; ?>"/>
                                        <div class="form-group col-md-6">
                                            <label class="form-label">Fecha</label>
                                            <input type="date" name="fecha" required pattern="\d{4}-\d{2}-\d{2}" <?php echo "value='" . date("Y-m-d", strtotime("+1 day")) . "' min= '" . date("Y-m-d", strtotime("+1 day")) . "'" ?> max="2023-12-31">
                                            <div class="clearfix"></div>
                                        </div>
                                        <?php
                                        include "controller/cconsultas.php";
                                        $res = new Controler;
                                        $response = $res->getDoctores();
                                        ?>
                                        <div class="form-group col-md-6">
                                            <label class="form-label">Hora</label>
                                            <select class="custom-select" name="hora">
                                                <option>8:00</option>
                                                <option>8:30</option>
                                                <option>9:00</option>
                                                <option>9:30</option>
                                                <option>10:00</option>
                                                <option>10:30</option>
                                                <option>11:00</option>
                                                <option>11:30</option>
                                                <option>14:00</option>
                                                <option>14:30</option>
                                                <option>15:00</option>
                                                <option>15:30</option>
                                                <option>16:00</option>
                                                <option>16:30</option>
                                                <option>17:00</option>
                                                <option>17:30</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Doctor</label>
                                        <select class="custom-select" name="doctor">
                                            <?php foreach ($response as $value) { ?>
                                                <option><?php echo  $value["nombre"]; ?></option>
                                            <?php }; ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-xl btn-primary waves-effect" name="btn_sacarficha">
                                        Reservar ficha medica</button>
                                </form>
                            </div>
                        </div>
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