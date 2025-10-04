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
                        <?php
                        include "controller/cconsultas.php";
                        $res = new Controler;
                        $response = $res->getMedicamentos();
                        ?>
                        <!-- begin -->
                        <div class="card">
                            <div class="card-header">Registro de Recetas Medicas</div>
                            <table class="table card-table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre Medicamento</th>
                                        <th>Cantidad de Recetas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i=1;
                                    foreach ($response as $value) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $i++; ?></th>
                                        <td><?php echo $value['nombre']; ?></td>
                                        <td><?php echo $value['cantidad']; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- end -->
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