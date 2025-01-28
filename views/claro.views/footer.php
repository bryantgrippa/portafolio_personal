<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Desea Cerrar sesion?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pulsa ACEPTAR para cerrar sesion</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Volver</button>
                <a class="btn btn-primary" href="?p=claro&c=Login&a=log">ACEPTAR</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: rgb(48, 94, 91);">Registro de Direcciones</h5>
            </div>
            <div class="modal-body" style="color: rgb(48, 94, 91);">
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label">Tipo de vía</label>
                        <select class="form-control" id="tipo_via" oninput="actualizar()">
                            <option value="">Elegir</option>
                            <option value="Autopista">Autopista</option>
                            <option value="Avenida">Avenida</option>
                            <option value="Calle">Calle</option>
                            <option value="Carrera">Carrera</option>
                            <option value="Circunvalar">Circunvalar</option>
                            <option value="Diagonal">Diagonal</option>
                            <option value="Transversal">Transversal</option>
                            <option value="Kilometro">Kilometro</option>
                            <option value="Manzana">Manzana</option>
                        </select>

                        <label class="form-label">Número o nombre de la vía principal</label>
                        <input type="text" class="form-control" id="via_principal" oninput="actualizar()">

                        <label class="form-label">Letra</label>
                        <select class="form-control" id="letra_1" oninput="actualizar()">
                            <option value="">Elegir</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                            <option value="I">I</option>
                            <option value="J">J</option>
                            <option value="K">K</option>
                            <option value="L">L</option>
                            <option value="M">M</option>
                            <option value="N">N</option>
                            <option value="O">O</option>
                            <option value="P">P</option>
                            <option value="Q">Q</option>
                            <option value="R">R</option>
                            <option value="S">S</option>
                            <option value="T">T</option>
                            <option value="U">U</option>
                            <option value="V">V</option>
                            <option value="W">W</option>
                            <option value="X">X</option>
                            <option value="Y">Y</option>
                            <option value="Z">Z</option>
                        </select>

                        <label class="form-label">Prefijo BIS</label>
                        <select class="form-control" id="prefijo_1" oninput="actualizar()">
                            <option value="">Elegir</option>
                            <option value="-">-</option>
                            <option value="BIS">BIS</option>
                        </select>

                        <label class="form-label">Letra</label>
                        <select class="form-control" id="letra_2" oninput="actualizar()">
                            <option value="">Elegir</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                            <option value="I">I</option>
                            <option value="J">J</option>
                            <option value="K">K</option>
                            <option value="L">L</option>
                            <option value="M">M</option>
                            <option value="N">N</option>
                            <option value="O">O</option>
                            <option value="P">P</option>
                            <option value="Q">Q</option>
                            <option value="R">R</option>
                            <option value="S">S</option>
                            <option value="T">T</option>
                            <option value="U">U</option>
                            <option value="V">V</option>
                            <option value="W">W</option>
                            <option value="X">X</option>
                            <option value="Y">Y</option>
                            <option value="Z">Z</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Cuadrante</label>
                        <select class="form-control" id="cuadrante" oninput="actualizar()">
                            <option value="">Elegir</option>
                            <option value="Este">Este</option>
                            <option value="Norte">Norte</option>
                            <option value="Oeste">Oeste</option>
                            <option value="Sur">Sur</option>
                            <option value="Occidente">Occidente</option>
                            <option value="Oriente">Oriente</option>
                        </select>

                        <label class="form-label">Número de la vía generadora</label>
                        <input type="text" class="form-control" id="via_generadora" oninput="actualizar()">

                        <label class="form-label">Letra</label>
                        <select class="form-control" id="letra_3" oninput="actualizar()">
                            <option value="">Elegir</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                            <option value="I">I</option>
                            <option value="J">J</option>
                            <option value="K">K</option>
                            <option value="L">L</option>
                            <option value="M">M</option>
                            <option value="N">N</option>
                            <option value="O">O</option>
                            <option value="P">P</option>
                            <option value="Q">Q</option>
                            <option value="R">R</option>
                            <option value="S">S</option>
                            <option value="T">T</option>
                            <option value="U">U</option>
                            <option value="V">V</option>
                            <option value="W">W</option>
                            <option value="X">X</option>
                            <option value="Y">Y</option>
                            <option value="Z">Z</option>
                        </select>
                        
                        <label class="form-label">Prefijo BIS</label>
                        <select class="form-control" id="prefijo_2" oninput="actualizar()">
                            <option value="">Elegir</option>
                            <option value="BIS">BIS</option>
                        </select>

                        <label class="form-label">Número de la placa</label>
                        <input type="text" class="form-control" id="numero_placa" oninput="actualizar()">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Cuadrante</label>
                        <select class="form-control" id="cuadrante_2" oninput="actualizar()">
                            <option value="">Elegir</option>
                            <option value="Este">Este</option>
                            <option value="Norte">Norte</option>
                            <option value="Oeste">Oeste</option>
                            <option value="Sur">Sur</option>
                            <option value="Occidente">Occidente</option>
                            <option value="Oriente">Oriente</option>
                        </select>

                        <label class="form-label">Nomenclatura adicional (apartado, apto o bloque)</label>
                        <select class="form-control" id="nomenclatura" oninput="actualizar()">
                            <option value="">Elegir</option>
                            <option value="Adelante">Adelante</option>
                            <option value="Apartamento">Apartamento</option>
                            <option value="Barrio">Barrio</option>
                            <option value="Bloque">Bloque</option>
                            <option value="Bodega">Bodega</option>
                            <option value="Casa">Casa</option>
                            <option value="Centro comercial">Centro comercial</option>
                            <option value="Ciudadela">Ciudadela</option>
                            <option value="Consultorio">Consultorio</option>
                            <option value="Deposito">Deposito</option>
                            <option value="Edificio">Edificio</option>
                            <option value="Etapa">Etapa</option>
                            <option value="Exterior">Exterior</option>
                            <option value="Local">Local</option>
                            <option value="Lote">Lote</option>
                            <option value="Manzana">Manzana</option>
                            <option value="Oficina">Oficina</option>
                            <option value="Parque">Parque</option>
                            <option value="Piso">Piso</option>
                            <option value="Torre">Torre</option>
                            <option value="Zona">Zona</option>
                            <option value="Apartado">Apartado</option>
                            <option value="Glorieta">Glorieta</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="button" data-bs-dismiss="modal">Registrar Direccion</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="assets/claro/vendor/jquery/jquery.min.js"></script>
<script src="assets/claro/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="assets/claro/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="assets/claro/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="assets/claro/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="assets/claro/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="assets/claro/js/demo/datatables-demo.js"></script>

<!-- Page level plugins -->
<script src="assets/claro/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="assets/claro/js/demo/chart-area-demo.js"></script>
<script src="assets/claro/js/demo/chart-pie-demo.js"></script>

<script>
        let timeInSeconds = 10 * 60; // 10 minutos en segundos
        let intervalId;
        const timerElement = document.getElementById('timer');

        function updateTimer() {
            let minutes = Math.floor(timeInSeconds / 60);
            let seconds = timeInSeconds % 60;

            // Formatear los minutos y segundos con dos dígitos
            let minutesFormatted = minutes < 10 ? `0${minutes}` : minutes;
            let secondsFormatted = seconds < 10 ? `0${seconds}` : seconds;

            timerElement.textContent = `${minutesFormatted}:${secondsFormatted}`;

            if (timeInSeconds === 0) {
                clearInterval(intervalId);
                alert("La sesión se ha acabado");
                location.href = "index.php";
            } else {
                timeInSeconds--; // Decrementar el tiempo en segundos
            }
        }

        function startTimer() {
            intervalId = setInterval(updateTimer, 1000); // Actualizar el temporizador cada segundo
        }

        function resetTimer() {
            clearInterval(intervalId); // Limpiar el intervalo existente
            timeInSeconds = 10 * 60; // Reiniciar el temporizador a 20 minutos
            startTimer(); // Iniciar un nuevo intervalo
        }

        // Iniciar el temporizador al cargar la página
        startTimer();

        // Escuchar eventos de actividad del usuario para reiniciar el temporizador
        document.addEventListener('click', resetTimer);
        document.addEventListener('keydown', resetTimer);
    </script>