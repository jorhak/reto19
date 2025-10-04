<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>
<!DOCTYPE html>
<html lang="en" class="material-style layout-fixed">

<head>
    <?php 
    include "components/head.html"; ?>
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
                        <div class="layout-content">
                            <!-- [ content ] Start -->
                            <div class="container-fluid flex-grow-1 container-p-y">
                                <div class="row mt-4">
                                    <div class="col-lg-4 col-xl-3">
                                        <div>
                                            <img src='<?php echo $_SESSION['foto']; ?>' style="width: 280px;;height:280px;">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="media align-items-center mb-4 h4">
                                            <div class="ion ion-ios-person ui-w-60 text-center text-large"></div>
                                            <div class="media-body ml-1">
                                                Datos del Usuario
                                                
                                            </div>
                                        </div>
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <form>
                                                    <div class="form-group">
                                                        <label class="form-label">Username</label>
                                                        <input type="text" class="form-control" placeholder="Email" readonly value='<?php echo $_SESSION['usuario']; ?>'>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Nombre Completo</label>
                                                        <input type="text" class="form-control" placeholder="Email" readonly value='<?php echo $_SESSION['nombre']; ?>'>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Correo Electronico</label>
                                                        <input type="text" class="form-control" placeholder="Password" readonly value='<?php echo $_SESSION['email']; ?>'>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Tipo de Usuario</label>
                                                        <input type="text" class="form-control" placeholder="Password" readonly value='<?php echo $_SESSION['tipo']; ?>'>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include "components/footer.html"; ?>
                </div>
            </div>
        </div>
    </div>
    <?php include "components/scrips.html"; ?>
</body>

</html>