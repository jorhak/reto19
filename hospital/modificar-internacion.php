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

                    <?php
                        include "controller/cconsultas.php";
                        $res = new Controler;
                        $doc = str_replace(" ","%20",$_SESSION['nombre']);
                        $response = $res->getInternacion();
                        //  echo $_SESSION['nombre'];
                        ?>
                        <!-- begin -->
                        <div class="card">
                            <div class="card-header">Registro de Recetas Medicas</div>
                            <table class="table card-table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Sala</th>
                                        <th>Paciente</th>
                                        <th>Doctor</th>
                                        <th>Fecha de Internacion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($response as $value) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $value['id']; ?></th>
                                        <td><?php echo $value['paciente']; ?></td>
                                        <td><?php echo $value['doctor']; ?></td>
                                        <td><?php echo $value['fechaini']; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- end -->
                    </div>
                    <?php include "components/footer.html"; ?>
                </div>
            </div>
        </div>
    </div>
    <?php include "components/scrips.html"; ?>
</body>

</html>