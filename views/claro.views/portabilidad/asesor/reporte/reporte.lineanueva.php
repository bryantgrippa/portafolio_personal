<?php
$this->conn->set_charset('utf8');
$sqli = $this->conn; ?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Linea Nueva</title>

    <!-- Custom fonts for this template -->
    <link href="assets/claro/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/claro/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 style="color:red;">LINEA NUEVA</h1>
</div>
<form method="post" action="?p=claro&c=Usuario_porta&a=savelineanueva" method="post" enctype="multipart/form-data">
    <input type="hidden" name="tipo_solicitud" value="LINEA NUEVA"></imput>
    <input type="hidden" name="cedula_asesor" value="<?php echo $_SESSION['cedula']; ?>"></imput>
    <input type="hidden" name="nombre_asesor" value="<?php echo $_SESSION['nombres']; ?>"></imput>

    <div class="form-group">
    <?php if($_SESSION['permiso'] == 6){ ?>

        <button type="submit" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-check"></i>
            </span>
            <span class="text">Subir Venta</span>
            <!-- <div>
                    <small>*Dar Doble click para registrar la venta *</small>

                </div> -->
        </button>
        <?php } ?>

    </div>

    <!--  -->
    <div class="row">

        <div class="col-lg-6">

            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample1">
                        <h6 class="m-0 font-weight-bold text-primary">Datos del Cliente <strong style="color:red">*</strong></h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse" id="collapseCardExample1">
                        <div class="card-body">
                            <div class="container2">
                                <div class="mb-3">

                                    <label class="form-label">Nombres y apellidos del cliente</label>
                                    <input type="text" name="nombres" require class="form-control" required>

                                    <label for="tipoCedula" class="form-label">Tipo de Documento</label>
                                    <select id="tipoCedula" name="tipo_cedula" class="form-control" required onchange="mostrarCampoCedula()">
                                        <option value="CEDULA DE CIUDADANIA">CC</option>
                                        <option value="CEDULA DE EXTRANJERIA">CE</option>
                                    </select>

                                    <div id="campoCedulaCE" style="display: none;">
                                        <label for="tipoCE" class="form-label">Tipo de CE</label>
                                        <select id="tipoCE" name="tipo_cedula_ce" class="form-control">
                                            <option value="M">Migrante (M)</option>
                                            <option value="R">Residente (R)</option>
                                            <option value="TP">Trabajador Permanente (TP)</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="numeroCC" class="form-label">Número de documento</label>
                                        <input type="number" id="numeroCC" name="numero_cedula" placeholder="N° de Cedula" class="form-control" required oninput="javascript: if (this.value.length > 10) this.value = this.value.slice(0, 10);" min="0" max="99999999999999999999">
                                    </div>

                                    <label class="form-label">Fecha de nacimiento</label>
                                    <input type="date" name="fecha_nacimiento" required class="form-control" max="<?php echo date('Y-m-d'); ?>" min="1900-01-01">

                                    <label class="form-label">Fecha de expedicion</label>
                                    <input type="date" name="fecha_expedicion" required class="form-control" max="<?php echo date('Y-m-d'); ?>" min="1900-01-01">

                                    <label class="form-label">Correo</label>
                                    <input type="email" name="correo" placeholder="ejemplo@email.com" required class="form-control">

                                    <label class="form-label">Telefono de contacto 1</label>
                                    <input name="cel_1" type="number" placeholder="CEL 1" required class="form-control" required oninput="javascript: if (this.value.length > 10) this.value = this.value.slice(0, 10);" min="0" max="99999999999999999999">

                                    <label class="form-label">Telefono de contacto 2</label>
                                    <input name="cel_2" type="number" placeholder="CEL 2" class="form-control" oninput="javascript: if (this.value.length > 10) this.value = this.value.slice(0, 10);" min="0" max="99999999999999999999">

                                    <label class="form-label">Referido</label>
                                    <select name="referido" class="form-control" required>
                                        <option value="" selected disabled>Selecciona</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardExample2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample2">
                        <h6 class="m-0 font-weight-bold text-primary">Direccion Cliente <strong style="color:red">*</strong></h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse" id="collapseCardExample2">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Departamento</label>
                                <select name="departamento" id="departamento" class="form-control" required>
                                    <option value="" selected disabled>Selecciona</option>
                                    <?php
                                    $estado = $sqli->query("SELECT DISTINCT departamento FROM operador_logico ORDER BY departamento ASC");
                                    while ($row = $estado->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $row['departamento']; ?>"><?php echo $row['departamento']; ?></option>
                                    <?php }
                                    ?>
                                </select>

                                <label class="form-label">Ciudad</label>
                                <select name="ciudad" id="ciudad" class="form-control" required>
                                    <option value="" selected disabled>Selecciona departamento</option>
                                </select>

                                <label class="form-label">Operador</label>
                                <select name="operador" id="operador" class="form-control" required>
                                    <option value="" selected disabled>Selecciona ciudad</option>
                                </select>

                                <label class="form-label">Día hábil de entrega</label>
                                <input name="dias" type="date" id="subopcion" min="<?php echo date('Y-m-d'); ?>" required class="form-control">

                                <label class="form-label">Día hábil de Ventana de Cambio</label>
                                <input name="ventana_cambio" type="date" id="subopcion" min="<?php echo date('Y-m-d'); ?>" required class="form-control">
                                <br>

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Direccion
                                </button>
                                <input type="text" class="form-control" name="direccion" id="direccion" readonly required>

                                <label class="form-label">Barrio</label>
                                <input name="barrio" type="text" placeholder="barrio" required class="form-control">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-lg-6">

            <!-- Dropdown Card Example -->
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardExample3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample3">
                        <h6 class="m-0 font-weight-bold text-primary">Datos de Venta <strong style="color:red">*</strong></h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse" id="collapseCardExample3">
                        <div class="card-body">
                            <label class="form-label">N° grabacion de contrato</label>
                            <input name="numero_grabacion_contrato" type="number" id="subopcion" placeholder="N° grabacion de contrato" required class="form-control" oninput="javascript: if (this.value.length > 12) this.value = this.value.slice(0, 12);" min="0" max="99999999999">

                            <label for="" class="form-label">Tipo de Contrato</label>
                            <select class="form-control" name="tipo_contrato" required>
                                <option value="" selected disabled>Elegir</option>
                                <option value="DIGITAL">DIGITAL</option>
                                <option value="GRABADO">GRABADO</option>
                            </select>

                            <label class="form-label">Codigo del Plan</label>
                            <input name="codigo_plan" type="number" id="subopcion" placeholder="Codigo" class="form-control" required oninput="javascript: if (this.value.length > 5) this.value = this.value.slice(0, 5);" min="0" max="999999999999999">

                            <label class="form-label">Valor del plan sin IVA</label>
                            <input name="valor" type="number" id="subopcion" placeholder="10000" class="form-control" required></iput>

                            <label class="form-label">Valor del plan con IVA</label>
                            <input name="valor_iva" type="number" id="subopcion" placeholder="10000" class="form-control" required>

                            <label class="form-label">Descuento</label>
                            <input name="descuento" type="text" id="subopcion" placeholder="descuento" class="form-control" required>

                            <label class="form-label">Estado lineal de operador Donante</label>
                            <select class="form-control" name="estado_actual_operador_donante" required>
                                <option value="" selected disabled>Elegir</option>
                                <option value="POSTPAGO">POSTPAGO</option>
                                <option value="PREPAGO">PREPAGO</option>
                            </select>
                            <label class="form-label">Detalles del plan</label>
                            <input name="detalles_plan" type="text" id="subopcion" placeholder="Detalles del plan" class="form-control" required>

                            <label for="" class="form-label">Tipo de Validacion</label>
                            <select class="form-control" name="tipo_validacion" required>
                                <option value="" selected disabled>Elegir</option>
                                <option value="OTP INTERNO">OTP INTERNO</option>
                                <option value="ID VISION">ID VISION</option>
                                <option value="BIOMETRICA FACIAL">BIOMETRICA FACIAL</option>
                            </select>

                            <label for="" class="form-label">Tipo de venta</label>
                            <select class="form-control" name="venta_tp" required>
                                <option value="" selected disabled>Elegir</option>
                                <option value="PLANTA">PLANTA</option>
                                <option value="SEMILLEROS">SEMILLEROS</option>                            </select>

                            <label for="" class="form-label">SIM</label>
                            <select class="form-control" name="sim" required>
                                <option value="" selected disabled>Elegir</option>
                                <option value="ENVIADA">ENVIADA</option>
                                <option value="COMPRADA">COMPRADA</option>
                            </select>

                        </div>
                    </div>
                </div>

            </div>

            <!-- Collapsable Card Example -->
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardExample4" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample4">
                        <h6 class="m-0 font-weight-bold text-primary">Comentarios del Asesor <strong style="color:red">*</strong></h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse" id="collapseCardExample4">
                        <div class="card-body">
                            <div class="container5">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="" class="form-label">
                                            <h4>Observaciones</h4>
                                        </label>

                                        <textarea class="form-control" rows="6" name="observaciones" placeholder="Si tienes algunas observaciones , escribelas aqui "></textarea>
                                        <br>
                                        <label for="link" class="form-label">
                                            <h4>VALIDACION DE IDENTIDAD</h4>
                                        </label>
                                        <input class="btn btn-primary btn-icon-split btn-lg" name="link" id="link" type="file" accept="image/*" required>
                                        <label for="link" class="form-label">
                                            <h4>VALIDACION DE CREDITOS</h4>
                                        </label>
                                        <input class="btn btn-primary btn-icon-split btn-lg" name="link2" id="link2" type="file" accept="image/*" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    </div>

</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

<script src="views/claro.views/portabilidad/asesor/reporte/pais/peticiones.js"></script>

<script>
    function mostrarCampoCedula() {
        var tipoCedula = document.getElementById("tipoCedula").value;
        var campoCE = document.getElementById("campoCedulaCE");
        var campoTipoCE = document.getElementById("tipoCE");

        if (tipoCedula === "CEDULA DE CIUDADANIA") {
            campoCE.style.display = "none";
        } else if (tipoCedula === "CEDULA DE EXTRANJERIA") {
            campoCE.style.display = "block";
        }
    }
    document.getElementById("tipoCedula").addEventListener("change", mostrarCampoCedula);

    function actualizar() {
        var tipo_via = document.getElementById("tipo_via").value;
        var via_principal = document.getElementById("via_principal").value;
        var letra_1 = document.getElementById("letra_1").value;
        var prefijo_1 = document.getElementById("prefijo_1").value;
        var letra_2 = document.getElementById("letra_2").value;
        var cuadrante = document.getElementById("cuadrante").value;
        var via_generadora = document.getElementById("via_generadora").value;
        var letra_3 = document.getElementById("letra_3").value
        var prefijo_2 = document.getElementById("prefijo_2").value;
        var numero_placa = document.getElementById("numero_placa").value;
        var cuadrante_2 = document.getElementById("cuadrante_2").value;
        var nomenclatura = document.getElementById("nomenclatura").value;

        var direccion = tipo_via + " " + via_principal + letra_1 + " " + prefijo_1 + " " + letra_2 + " " + cuadrante + " " + via_generadora +
            " " + letra_3 + " " + prefijo_2 + " " + numero_placa + " " + cuadrante_2 + " " + nomenclatura;
        document.getElementById("direccion").value = direccion;
    }

    function handleChange() {
        var checkbox = document.getElementById("miCheckbox");
        var valor = checkbox.checked ? "RECUPERADA" : null;
        console.log("Valor actual del checkbox:", valor);
    }
</script>