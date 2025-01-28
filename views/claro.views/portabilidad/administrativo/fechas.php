<head>
    <title>Ventas por fechas</title>
</head>
<div class="col-lg-6 m-auto">
        <div class="card">
            <div class="card-header bg-danger text-white">
                <h3>
                    Buscar Registros por fechas
                </h3>
            </div>
            <div class="card-body border-bottom-danger">
                <form action="?p=claro&c=Excel_porta&a=Fechas" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="nombre">Desde:</label>
                        <input type="date" class="form-control" name="fecha_1" pattern="\d{4}-\d{2}-\d{2}" title="Formato Valido YYY-MM-DD" required>
                    </div>
                    <div class="form-group">
                        <label for="cedula">Hasta</label>
                        <input type="date" class="form-control" name="fecha_2" pattern="\d{4}-\d{2}-\d{2}" title="Formato Valido YYY-MM-DD">
                    </div>

                    <input type="submit" value="Generar" class="btn btn-primary">
                </form>

            </div>
        </div>
    </div>