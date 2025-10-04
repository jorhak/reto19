<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
} ?>
<!DOCTYPE html>
<html lang="en" class="material-style layout-fixed">

<head>
    <?php
    include "components/head.html"; ?>

    <style>
        .leyendaH {
            text-align: center;
        }

        .leyenda ul {
            list-style-type: none;
            padding: 0 10px;
        }

        .leyendaH ul {
            display: inline-block;
        }

        .leyenda ul>li {
            font-size: 14px;
        }

        .leyendaH ul>li {
            float: left;
            margin-right: 10px;
        }

        .leyenda ul>li>span {
            width: 12px;
            height: 12px;
            display: inline-block;
            margin-right: 3px;
        }
    </style>
</head>

<body>
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

    <!-- [ Layout wrapper ] Start -->
    <div class="layout-wrapper layout-2">
        <div class="layout-inner">
            <?php include "components/menu-lateral.html"; ?>
            <!-- [ Layout container ] Start -->
            <div class="layout-container">
                <?php include "components/nav-top.html"; ?>
                <!-- [ Layout content ] Start -->
                <div class="layout-content">
                    <div class="container-fluid flex-grow-1 container-p-y">
                        <form action="" method="get">
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label class="form-label">Fecha Inicio</label>
                                    <input type="date" name="fechaini" required pattern="\d{4}-\d{2}-\d{2}" value='<?php echo $_SESSION['fechainidash'] ?>' max="2023-12-31">
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="form-label">Fecha Final</label>
                                    <input type="date" name="fechafin" required pattern="\d{4}-\d{2}-\d{2}" value='<?php echo $_SESSION['fechafindash'] ?>' max="2023-12-31">
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <button type="submit" name="btn_filtro" class="btn btn-primary waves-effect">
                                Aplicar filtro
                            </button>
                            <!-- TU CONTENIDO -->
                        </form>
                    </div>
                    <?php
                    if (isset($_GET['btn_filtro'])) {
                       
                        $_SESSION['fechainidash'] = "".$_GET['fechaini']."";
                        $_SESSION['fechafindash'] = "".$_GET['fechafin']."";
                        // echo  $_SESSION['fechainidash'];
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4" style="align-items: flex-end;">
                                <div class="card-body">
                                    <br>
                                    <h3>Cantidad de medicamentos mas solicitados</h3>
                                    <canvas id="canvas1"></canvas>
                                    <div id="leyenda1" class="leyenda"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4" style="align-items: center;">
                                <div class="card-body">
                                    <br>
                                    <h3>Cantidad de pacientes atendidos por doctor</h3>
                                    <canvas id="canvas2"></canvas>
                                    <div id="leyenda2" class="leyenda"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        var miPastel = function(canvasId, width, height, valores) {
                            this.canvas = document.getElementById(canvasId);;
                            this.canvas.width = width;
                            this.canvas.height = height;
                            this.radio = Math.min(this.canvas.width / 2, this.canvas.height / 2)
                            this.context = this.canvas.getContext("2d");
                            this.valores = valores;
                            this.colores = colores = [{
                                    color: "green"
                                },
                                {
                                    color: "red"
                                },
                                {
                                    color: "orange"
                                },
                                {
                                    color: "skyblue"
                                },
                                {
                                    color: "blue"
                                },
                                {
                                    color: "grey"
                                },
                                {
                                    color: "black"
                                },
                                {
                                    color: "purple"
                                },
                                {
                                    color: "yellow"
                                },
                                {
                                    color: "ligtblue"
                                },
                                {
                                    color: "skygreen"
                                },
                            ];
                            this.tamanoDonut = 0;

                            /**
                             * Dibuja un gráfico de pastel
                             */
                            this.dibujar = function() {
                                this.total = this.getTotal();
                                var valor = 0;
                                var inicioAngulo = 0;
                                var angulo = 0;

                                // creamos los quesos del pastel
                                for (var i in this.valores) {
                                    valor = valores[i]["cantidad"];
                                    color = colores[i]["color"];
                                    angulo = 2 * Math.PI * valor / this.total;

                                    this.context.fillStyle = color;
                                    this.context.beginPath();
                                    this.context.moveTo(this.canvas.width / 2, this.canvas.height / 2);
                                    this.context.arc(this.canvas.width / 2, this.canvas.height / 2, this.radio, inicioAngulo, (inicioAngulo + angulo));
                                    this.context.closePath();
                                    this.context.fill();
                                    inicioAngulo += angulo;
                                }
                            }
                            this.ponerPorCiento = function(color) {
                                var valor = 0;
                                var etiquetaX = 0;
                                var etiquetaY = 0;
                                var inicioAngulo = 0;
                                var angulo = 0;
                                var texto = "";
                                var incrementar = 0;

                                // si hemos dibujado un donut, tenemos que incrementar el valor del radio
                                // para que quede centrado
                                if (this.tamanoDonut)
                                    incrementar = (this.radio * this.tamanoDonut) / 2;

                                this.context.font = "bold 12pt Calibri";
                                this.context.fillStyle = color;
                                for (var i in this.valores) {
                                    valor = valores[i]["cantidad"];
                                    angulo = 2 * Math.PI * valor / this.total;

                                    // calculamos la posición del texto
                                    etiquetaX = this.canvas.width / 2 + (incrementar + this.radio / 2) * Math.cos(inicioAngulo + angulo / 2);
                                    etiquetaY = this.canvas.height / 2 + (incrementar + this.radio / 2) * Math.sin(inicioAngulo + angulo / 2);

                                    texto = Math.round(100 * valor / this.total);

                                    // movemos la posición unos pixels si estamos en la parte izquierda
                                    // del pastel para que quede mas centrado
                                    if (etiquetaX < this.canvas.width / 2)
                                        etiquetaX -= 10;

                                    // ponemos los valores
                                    this.context.beginPath();
                                    this.context.fillText(texto + "% ", etiquetaX, etiquetaY);
                                    this.context.stroke();

                                    inicioAngulo += angulo;
                                }
                            }

                            /**
                             * Function que devuelve la suma del total de los valores recibidos en el array
                             */
                            this.getTotal = function() {
                                var total = 0;
                                for (var i in this.valores) {
                                    total += valores[i]["cantidad"];
                                }
                                return total;
                            }

                            /**
                             * Función que devuelve una lista (<ul><li>) con la leyenda
                             * Tiene que recibir el id donde poner la leyenda
                             */
                            this.ponerLeyenda = function(leyendaId) {
                                var codigoHTML = "<ul class='leyenda'>";
                                var ttotal = 0;
                                for (var i in this.valores) {
                                    codigoHTML += "<li><span style='background-color:" + colores[i]["color"] + "'></span>" + valores[i]["nombre"] + "  =  " + valores[i]["cantidad"] + "</li>";
                                    ttotal = ttotal + valores[i]["cantidad"];
                                }
                                codigoHTML += "<li> TOTAL = " + ttotal + "</li>";
                                codigoHTML += "</ul>";
                                document.getElementById(leyendaId).innerHTML = codigoHTML;
                            }
                        }
                        const xhr = new XMLHttpRequest();
                        xhr.open("GET", "http://23.23.183.202:8080/kpi5/'" + '<?php echo $_SESSION["fechainidash"] ?>' + "'/'" + '<?php echo $_SESSION["fechafindash"] ?>' + "'");
                        xhr.send();
                        xhr.responseType = "json";
                        xhr.onload = () => {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                var data = xhr.response;
                                var pastel = new miPastel("canvas2", 300, 300, data);
                                pastel.dibujar();
                                pastel.ponerPorCiento("white");
                                pastel.ponerLeyenda("leyenda2");
                            } else {
                                console.log(`Error: ${xhr.status}`);
                            }

                        };
                        const xhr2 = new XMLHttpRequest();
                        xhr2.open("GET", "http://23.23.183.202:8080/kpi1/'" + '<?php echo $_SESSION["fechainidash"] ?>' + "'/'" + '<?php echo $_SESSION["fechafindash"] ?>' + "'");
                        xhr2.send();
                        xhr2.responseType = "json";
                        xhr2.onload = () => {
                            if (xhr2.readyState == 4 && xhr2.status == 200) {
                                const data2 = xhr2.response;
                                var pastel2 = new miPastel("canvas1", 300, 300, data2);
                                pastel2.dibujar();
                                pastel2.ponerPorCiento("white");
                                pastel2.ponerLeyenda("leyenda1");
                            } else {
                                console.log(`Error: ${xhr2.status}`);
                            }
                        };

                        // definimos los valores de nuestra gráfica
                    </script>
                    <!-- [ Layout footer ] End -->
                </div>
                <!-- [ Layout content ] Start -->
            </div>
            <!-- [ Layout container ] End -->
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-sidenav-toggle"></div>
    </div>
    <!-- [ Layout wrapper] End -->

    <!-- Core scripts -->
    <script src="assets/js/pace.js"></script>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/libs/popper/popper.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/sidenav.js"></script>
    <script src="assets/js/layout-helpers.js"></script>
    <script src="assets/js/material-ripple.js"></script>

    <!-- Libs -->
    <script src="assets/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/libs/eve/eve.js"></script>
    <script src="assets/libs/flot/flot.js"></script>
    <script src="assets/libs/flot/curvedLines.js"></script>
    <script src="assets/libs/chart-am4/core.js"></script>
    <script src="assets/libs/chart-am4/charts.js"></script>
    <script src="assets/libs/chart-am4/animated.js"></script>

    <!-- Demo -->
    <script src="assets/js/demo.js"></script>
    <script src="assets/js/analytics.js"></script>
    <script src="assets/js/pages/dashboards_index.js"></script>
</body>

</html>