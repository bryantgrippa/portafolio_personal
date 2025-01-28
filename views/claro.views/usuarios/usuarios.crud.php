<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/claro/img/favicon.png" type="image/x-icon">

    <title><?php if (isset($alm[0])) {
                echo $alm[0]->nombres;
            } else {
                echo "Registrar Usuario";
            } ?></title>

    <!-- Custom fonts for this template-->
    <link href="assets/claro/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/claro/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="assets/claro/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Usuario</h1>
    </div>

    <!-- Page Heading -->
    <div class="col-lg-6 m-auto">
        <div class="card">
            <div class="card-header bg-danger text-white">
                <?php if (isset($alm[0])) { ?>
                    Modificar Usuario: <?php echo $alm[0]->nombres; ?>
                <?php } else { ?>
                    Registrar Usuario
                <?php } ?>
            </div>
            <div class="card-body">
                <form action="?p=claro&c=Usuario&a=save" method="post" autocomplete="off">
                    <?php if (isset($alm[0])) { ?>
                        <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $alm[0]->id_usuario ?>">
                    <?php } else { ?>
                        <input type="hidden" name="id_usuario" id="id_usuario" value="">
                    <?php } ?>

                    <div class="form-group">
                        <label for="nombres">Nombres y Apellidos</label>
                        <input required type="text" class="form-control" name="nombres" id="nombres" value="<?php if (isset($alm[0])) {
                                                                                                                echo $alm[0]->nombres;
                                                                                                            } else {
                                                                                                                echo "";
                                                                                                            } ?>">
                    </div>
                    <div class="form-group">
                        <label for="cedula">Cedula</label>
                        <input required type="number" class="form-control" name="cedula" id="cedula" value="<?php if (isset($alm[0])) {
                                                                                                                echo $alm[0]->cedula;
                                                                                                            } else {
                                                                                                                echo "";
                                                                                                            } ?>">
                    </div>
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input required type="text" class="form-control" name="usuario" id="usuario" value="<?php if (isset($alm[0])) {
                                                                                                                echo $alm[0]->usuario;
                                                                                                            } else {
                                                                                                                echo "";
                                                                                                            } ?>">
                    </div>

                    <div class="form-group">
                        <label for="permiso">Permisos Otorgado</label>
                        <select class="form-control" name="permiso" id="permiso" required>
                            <option selected disabled value="">selecciona un permiso</option>
                            <?php foreach ($this->model->Permisos() as $p) :
                            ?>
                                <option value="<?php echo $p->id_permiso ?>" <?php if (isset($alm[0]->permiso) && ($alm[0]->permiso == $p->id_permiso)) { ?>selected<?php } ?>>
                                    <?php echo $p->detalle; ?>
                                </option>
                            <?php endforeach;
                            ?>
                        </select>
                    </div>


                    <input type="submit" value="Enviar" class="btn btn-success">
                </form>
            </div>
        </div>

    </div>