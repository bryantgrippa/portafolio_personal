<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/claro/img/favicon.png" type="image/x-icon">
    <title>Modificar Contraseña</title>
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
        <h1 class="h3 mb-0 text-gray-800">Contraseña</h1>
    </div>

    <!-- Page Heading -->
    <div class="col-lg-6 m-auto">
        <div class="card">
            <div class="card-header bg-danger text-white">
                Modificar Contraseña:
            </div>
            <div class="card-body">
                <?php if ($nov == 1) { ?>
                    <form action="?p=claro&c=Pass&a=savepass" method="post" autocomplete="off">
                    <?php } else { ?>
                        <form action="?p=claro&c=Usuario&a=savepass" method="post" autocomplete="off">
                        <?php } ?>
                        <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $alm[0]->id_usuario ?>">
                        <div class="form-group">
                            <label for="cedula">Nueva Contraseña</label>
                            <input required type="password" class="form-control" name="pass" id="pass">
                        </div>
                        <input type="submit" value="Enviar" class="btn btn-success">
                        </form>
            </div>
        </div>

    </div>