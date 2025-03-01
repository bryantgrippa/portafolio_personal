<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Usuarios</title>

    <link rel="shortcut icon" href="assets/claro/img/favicon.png" type="image/x-icon">

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

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Asesores</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de Asesores</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Fecha de Ingreso</th>
                            <th>Nombre</th>
                            <th>Cedula</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Fecha de Ingreso</th>
                            <th>Nombre</th>
                            <th>Cedula</th>
                            <th>Opciones</th>
                        </tr>
                    </tfoot>

                    <tbody>
                        <tr>
                            <?php foreach ($this->model->asesores() as $j) : ?>
                                <td><?php echo $j->fecha_registro ?></td>
                                <td><?php echo $j->nombres ?></td>
                                <td><?php echo $j->cedula ?></td>
                                <td>
                                    <a href="?p=claro&c=Back_tyt&a=asesor&cedula=<?php echo $j->cedula ?>" class="btn btn-success">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="?p=claro&c=Excel_tyt&a=Asesorventa&cedula=<?php  echo $j->cedula ?>&nombre=<?php  echo $j->nombres ?>" class="btn btn-primary">
                                        <i class="fas fa-download"></i>
                                    </a>
                                </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->