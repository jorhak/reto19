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
                        <form action="" method="get">
                            <div class="form-group">
                                <label class="form-label">Paciente</label>
                                <input type="text" class="form-control" name="paciente" placeholder="paciente a buscar" autofocus>
                                <div class="clearfix"></div>
                            </div>
                            <button type="submit" name="btn_consultarPaciente" class="btn btn-primary waves-effect">
                                buscar Paciente
                            </button>
                            <!-- TU CONTENIDO -->
                        </form>
                        </br></br>
                        <?php 
                        include "controller/cconsultas.php";
                        if (isset($_GET["btn_consultarPaciente"]) && $_GET["paciente"] != '') {
                            $res = new Controler;
                            // $pac = urlencode($_GET["paciente"]);
                            $pac = str_replace(" ","%20",$_GET["paciente"]);
                            $response = $res->getConsultasPaciente($pac);
                            // var_dump($response[0]);
                            //   echo $response[0]["id"];
                            ?>
                            <div class="form-group">
                                <label class="form-label">Paciente</label>
                                <input type="text" class="form-control" readonly placeholder="paciente" value='<?php echo rawurldecode($_GET["paciente"]); ?>'>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Diagnostico</label>
                                <input type="text" class="form-control" placeholder="diagnostico" readonly value='<?php echo rawurldecode($response[0]["diagnostico"]); ?>'>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Recomendacion</label>
                                <input type="text" class="form-control" placeholder="recomendacion" readonly value='<?php echo rawurldecode($response[0]["recomendacion"]); ?>'>
                                <div class="clearfix"></div>
                            </div>
                            <?php  foreach ($response as $value) {?>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                
                                    <label class="form-label">Medicamento</label>
                                        <input type="text" class="form-control" placeholder="medicamento" readonly value='<?php echo rawurldecode($value["nombre"]); ?>'>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label">Cantidad</label>
                                    <input type="number" class="form-control" placeholder="cantidad" readonly value='<?php echo rawurldecode($value["cantidad"]); ?>'>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label">Indicacion</label>
                                    <input type="text" class="form-control"  placeholder="indicacion" readonly value='<?php echo rawurldecode($value["indicacion"]); ?>'>
                                    <div class="clearfix"></div>
                                </div>
                                
                            </div>
                            <?php }; ?>
                        <?php }; ?>
                    </div>
                    <?php include "components/footer.html"; ?>
                </div>
            </div>
        </div>
    </div>
    <?php include "components/scrips.html"; ?>
</body>

</html>