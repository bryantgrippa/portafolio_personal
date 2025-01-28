<?php
$this->conn->set_charset('utf8');
$sqli = $this->conn; ?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Venta Nueva</title>

    <!-- Custom fonts for this template -->
    <link href="assets/claro/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/claro/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 style="color:red;">VENTA NUEVA</h1>
</div>
<form method="post" action="?p=claro&c=Usuario_tyt&a=save" method="post" enctype="multipart/form-data">
    <input type="hidden" name="cedula_asesor" value="<?php echo $_SESSION['cedula']; ?>"></imput>
    <input type="hidden" name="nombre_asesor" value="<?php echo $_SESSION['nombres']; ?>"></imput>

    <div class="form-group">
        <?php if ($_SESSION['permiso'] == 7) { ?>

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

                                    <label class="form-label">Correo</label>
                                    <input type="email" name="correo" placeholder="ejemplo@email.com" required class="form-control">

                                    <label class="form-label">Telefono de contacto 1</label>
                                    <input name="cel_1" type="number" placeholder="" required class="form-control" required oninput="javascript: if (this.value.length > 10) this.value = this.value.slice(0, 10);" min="0" max="99999999999999999999">

                                    <label class="form-label">Telefono de contacto 2</label>
                                    <input name="cel_2" type="number" placeholder="" class="form-control" oninput="javascript: if (this.value.length > 10) this.value = this.value.slice(0, 10);" min="0" max="99999999999999999999">

                                    <label class="form-label">Nombres de un tercero autorizado</label>
                                    <input type="text" name="nombres_tercero" require class="form-control" required>

                                    <label for="numeroCC" class="form-label">Número de documento de un tercero autorizado</label>
                                    <input type="number" id="numeroCC" name="documento_tercero" placeholder="N° de Cedula" class="form-control" required oninput="javascript: if (this.value.length > 10) this.value = this.value.slice(0, 10);" min="0" max="99999999999999999999">

                                    <label class="form-label">Telefono de un tercero autorizado</label>
                                    <input name="cel_tercero" type="number" placeholder="" required class="form-control" required oninput="javascript: if (this.value.length > 10) this.value = this.value.slice(0, 10);" min="0" max="99999999999999999999">

                                </div>
                            </div>

                            <!-- Card Content - Collapse -->

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
                            
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Direccion
                                </button>
                            <input type="text" class="form-control" name="direccion" id="direccion" readonly required>

                            <label for="" class="form-label">Barrio</label>
                            <input type="text" class="form-control" name="barrio" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardExample5" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample5">
                        <h6 class="m-0 font-weight-bold text-primary">Datos de Producto <strong style="color:red">*</strong></h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse" id="collapseCardExample5">
                        <div class="card-body">
                            <label class="form-label">Referencia del equipo poliedro</label>
                            <input name="referencia_equipo" type="text" placeholder="Referencia del equipo" required class="form-control">

                            <label class="form-label">Material</label>
                            <input name="material" type="number" placeholder="" required class="form-control" oninput="javascript: if (this.value.length > 10) this.value = this.value.slice(0, 10);" min="0" max="99999999999999999999">

                            <label for="" class="form-label">Fabricante</label>
                            <select class="form-control" name="fabricante" required>
                                <option value="" selected disabled>Elegir</option>
                                <option value="ACER">ACER</option>
                                <option value="AIWA">AIWA</option>
                                <option value="APPLE">APPLE</option>
                                <option value="ASUS">ASUS</option>
                                <option value="HONOR">HONOR</option>
                                <option value="HP">HP</option>
                                <option value="KALLEY">KALLEY</option>
                                <option value="LENOVO">LENOVO</option>
                                <option value="MOTOROLA">MOTOROLA</option>
                                <option value="NINTENDO">NINTENDO</option>
                                <option value="OPPO">OPPO</option>
                                <option value="PANASONIC">PANASONIC</option>
                                <option value="SAMSUNG">SAMSUNG</option>
                                <option value="TCL">TCL</option>
                                <option value="TECNO">TECNO</option>
                                <option value="VIVO">VIVO</option>
                                <option value="XIAOMI">XIAOMI</option>
                                <option value="SONY">SONY</option>
                                <option value="MICROSOFT">MICROSOFT</option>
                                <option value="HUAWEI">HUAWEI</option>
                            </select>

                            <label class="form-label">Valor de Equipo SIN IVA</label>
                            <input name="valor" type="number" placeholder="10000" required class="form-control" required oninput="javascript: if (this.value.length > 10) this.value = this.value.slice(0, 10);" min="0" max="99999999999999999999">

                            <label class="form-label">Valor de Equipo CON IVA</label>
                            <input name="valor_iva" type="number" placeholder="15000" required class="form-control" required oninput="javascript: if (this.value.length > 10) this.value = this.value.slice(0, 10);" min="0" max="99999999999999999999">

                            <label class="form-label">Cliente fuera de base</label>
                            <select name="referido" class="form-control" required>
                                <option value="" selected disabled>Selecciona</option>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                            </select>

                            <label class="form-label">Franja horaria recomendada </label>
                            <select name="franja" class="form-control" required>
                                <option value="" selected disabled>Selecciona</option>
                                <option value="AM">AM</option>
                                <option value="PM">PM</option>
                            </select>
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
                            <input name="numero_grabacion_contrato" type="number" id="subopcion" placeholder="N° grabacion de contrato" required class="form-control" oninput="javascript: if (this.value.length > 10) this.value = this.value.slice(0, 11);" min="0" max="99999999999">

                            <label for="" class="form-label">Tipo de Contrato</label>
                            <select class="form-control" name="tipo_contrato" required>
                                <option value="" selected disabled>Elegir</option>
                                <option value="DIGITAL">DIGITAL</option>
                                <option value="GRABADO">GRABADO</option>
                            </select>

                            <label class="form-label">Numero de Cuenta para la Compra</label>
                            <input name="numero_cuenta_venta" type="number" placeholder="N°" required class="form-control" required oninput="javascript: if (this.value.length > 10) this.value = this.value.slice(0, 10);" min="0" max="99999999999999999999">

                            <label for="tipoVenta" class="form-label">Tipo de Venta</label>
                            <select class="form-control" name="tipo_venta" id="tipoVenta" required onchange="mostrarCampotipoventa()">
                                <option value="" selected disabled>Elegir</option>
                                <option value="Tecnologia">Tecnologia</option>
                                <option value="Terminales">Terminales</option>
                            </select>

                            <div id="campoVenta" style="display: none;">
                                <label for="tipoCE" class="form-label">Tipo de Terminal</label>
                                <select name="tipo_venta2" id="tipoCE" class="form-control">
                                    <!-- <option value="N.A">No Aplica</option> -->
                                    <option value="Claro Up">Claro Up</option>
                                    <option value="Claro Lite">Claro Lite</option>
                                </select>
                            </div>

                            <label for="" class="form-label">Medio De Pago</label>
                            <select class="form-control" name="medio_pago" required>
                                <option value="" selected disabled>Elegir</option>
                                <option value="Financiado Factura Hogar">Financiado Factura Hogar</option>
                                <option value="Financiado Factura Postpago">Financiado Factura Postpago</option>
                                <option value="Pin de pago">Pin de pago</option>
                                <option value="Cuota Inicial">Cuota Inicial</option>
                                <option value="Venta Asistida">Venta Asistida</option>
                            </select>

                            <label for="" class="form-label">Tipo de Validacion</label>
                            <select class="form-control" name="tipo_validacion" required>
                                <option value="" selected disabled>Elegir</option>
                                <option value="OTP INTERNO">OTP INTERNO</option>
                                <option value="ID VISION">ID VISION</option>
                                <option value="BIOMETRICA FACIAL">BIOMETRICA FACIAL</option>
                                <option value="NO APLICA">NO APLICA</option>
                            </select>

                            <label for="" class="form-label">Tipo de Validacion secundaria</label>
                            <select class="form-control" name="tipo_validacion_sec" required>
                                <option value="N.A">NO APLICA</option>
                                <option value="OTP INTERNO">OTP INTERNO</option>
                                <option value="ID VISION">ID VISION</option>
                                <option value="BIOMETRICA FACIAL">BIOMETRICA FACIAL</option>
                            </select>

                            <label for="" class="form-label">Meses a Diferir</label>
                            <select class="form-control" name="meses_diferir" required>
                                <option value="6">6</option>
                                <option value="12">12</option>
                                <option value="18">18</option>
                                <option value="24">24</option>
                                <option value="36">36</option>
                            </select>

                            <label class="form-label">Valor Cuota Inicial</label>
                            <input name="valor_cuota_inicial" type="number" id="" placeholder="Cuota" class="form-control" required value="0">

                            <label class="form-label">Valor Cuota Mensual</label>
                            <input name="valor_cuota_mensual" type="number" id="" placeholder="Cuota" class="form-control" required>

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
                        <h6 class="m-0 font-weight-bold text-primary">Evidencias y Comentarios <strong style="color:red">*</strong></h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse" id="collapseCardExample4">
                        <div class="card-body">
                            <div class="container5">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="link" class="form-label">
                                            <h4>Adjuntar imagen del OTP</h4>
                                        </label>
                                        <input class="btn btn-primary btn-icon-split btn-lg" name="link" id="link" type="file" accept="image/*" required>

                                        <br>
                                        <label for="link" class="form-label">
                                            <h4>Adjuntar doble Validacion de identidad (De ser necesario)</h4>
                                        </label>
                                        <input class="btn btn-primary btn-icon-split btn-lg" name="link2" id="link2" type="file" accept="image/*">


                                        <br>
                                        <label for="link" class="form-label">
                                            <h4>Consulta crédito</h4>
                                        </label>
                                        <br>
                                        <input class="btn btn-primary btn-icon-split btn-lg" name="link3" id="link3" type="file" accept="image/*" required>

                                        <label for="" class="form-label">
                                            <h4>Observaciones</h4>
                                        </label>
                                        <textarea class="form-control" rows="6" name="observaciones" placeholder="Si tienes algunas observaciones , escribelas aqui "></textarea>
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

<script src="views/claro.views/tyt/asesor/reporte/pais/peticiones.js"></script>

<script>
    function mostrarCampoCedula() {
        var tipoCedula = document.getElementById("tipoCedula").value;
        var campoCE = document.getElementById("campoCedulaCE");
        var campoTipoCE = document.getElementById("tipoCE");

        if (tipoCedula === "CEDULA DE CIUDADANIA") {
            campoCE.style.display = "none";
            campoTipoCE.removeAttribute("required");
        } else if (tipoCedula === "CEDULA DE EXTRANJERIA") {
            campoCE.style.display = "block";
            campoTipoCE.setAttribute("required", "required");
        }
    }
    document.getElementById("tipoCedula").addEventListener("change", mostrarCampoCedula);

    function mostrarCampotipoventa() {
        var tipoVenta = document.getElementById("tipoVenta").value;
        var campoVenta = document.getElementById("campoVenta");

        if (tipoVenta === "Terminales") {
            campoVenta.style.display = "block";
        } else {
            campoVenta.style.display = "none";
        }
    }

    document.getElementById("tipoVenta").addEventListener("change", mostrarCampotipoventa);

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
</script>