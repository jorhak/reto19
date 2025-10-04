<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>
<!DOCTYPE html>
<html lang="en" class="material-style layout-fixed">

<head>
    <?php 
    include "./components/head.html"; ?>
</head>

<body>
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <div class="layout-wrapper layout-2">
        <div class="layout-inner">
            <?php include "./components/menu-lateral.html"; ?>
            <div class="layout-container">
                <?php include "./components/nav-top.html"; ?>
                <div class="layout-content">
                    <div class="container-fluid flex-grow-1 container-p-y">
                        <?php
                        include "./controller/cconsultas.php";
                        $res = new Controler;
                        $doc = str_replace(" ","%20",$_SESSION['nombre']);
                        $fechaHoy = date("d-m-Y", strtotime("+1 day"));
                        $response = $res->getPacientesporDoctor($doc,$fechaHoy);
                        //  echo $_SESSION['nombre'];
                        ?>
                        <!-- begin -->
                        <div class="card">
                            <div class="card-header">Registro de Recetas Medicas</div>
                            <table class="table card-table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Paciente</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($response as $value) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $value['id']; ?></th>
                                        <td><?php echo $value['fecha']; ?></td>
                                        <td><?php echo $value['hora']; ?></td>
                                        <td><?php echo $value['paciente']; ?></td>
                                        <td><a href=<?php echo 'atender-paciente.php?id='.$value['id'].'&paciente='.urlencode($value['paciente'])?>>Atender</a></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- end -->
                    </div>
                    <?php include "./components/footer.html"; ?>
                </div>
            </div>
        </div>
    </div>
    <?php include "./components/scrips.html"; ?>
</body>

</html>