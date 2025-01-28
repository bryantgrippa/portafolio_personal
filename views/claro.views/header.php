<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/claro/img/favicon.png" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="assets/claro/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/claro/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="assets/claro/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?p=claro&c=Login&a=Dashboard">
                <div class="sidebar-brand-icon rotate-n-0">
                    <!-- <i class="fas fa-laugh-wink" style="color:white;"></i> -->
                    <img src="assets/claro/img/claro_logo.png" class="img-thumbnail" width="100">
                </div>
            </a>
            <?php if ($_SESSION['permiso'] == 6 || $_SESSION['permiso'] == 1) { ?>
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading text-gray-200">
                    Asesor Portabilidad
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAsesorPorta" aria-expanded="true" aria-controls="collapseAsesorPorta">
                        <i class="fas fa-fw fa-dollar-sign" style="color:white;"></i> <span class="text-gray-100">Venta</span>
                    </a>
                    <div id="collapseAsesorPorta" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Tipo de Venta:</h6>
                            <a class="collapse-item" href="?p=claro&c=Usuario_porta&a=portabilidad">Portabilidad</a>
                            <a class="collapse-item" href="?p=claro&c=Usuario_porta&a=linea_nueva">Linea Nueva</a>
                            <a class="collapse-item" href="?p=claro&c=Usuario_porta&a=migracion">Migracion</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="?p=claro&c=Usuario_porta&a=main">
                        <i class="fas fa-fw fa-briefcase" style="color:white;"></i> <span class="text-gray-100">Ventas Personales</span></a>
                </li>
            <?php } ?>

            <?php if ($_SESSION['permiso'] == 7 || $_SESSION['permiso'] == 1) { ?>
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <div class="sidebar-heading text-gray-200">
                    Asesor Tecnologia
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAsesorTyT" aria-expanded="true" aria-controls="collapseAsesorTyT">
                        <i class="fas fa-fw fa-dollar-sign" style="color:white;"></i> <span class="text-gray-100">Venta</span>
                    </a>
                    <div id="collapseAsesorTyT" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Tipo de Venta:</h6>
                            <a class="collapse-item" href="?p=claro&c=Usuario_tyt&a=new">Venta Nueva</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="?p=claro&c=Usuario_tyt&a=main">
                        <i class="fas fa-fw fa-briefcase" style="color:white;"></i> <span class="text-gray-100">Ventas Personales</span></a>
                </li>
            <?php } ?>

            <?php if ($_SESSION['permiso'] < 6 || $_SESSION['permiso'] == 8) { ?>
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <div class="sidebar-heading text-gray-200">
                    Administrativo
                </div>

                <?php if ($_SESSION['permiso'] == 2 || $_SESSION['permiso'] == 4 || $_SESSION['permiso'] == 3 || $_SESSION['permiso'] == 1 || $_SESSION['permiso'] == 8) { ?>

                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdminPorta" aria-expanded="true" aria-controls="collapseAdminPorta">
                            <i class="fas fa-fw fa-phone" style="color:white;"></i> <span class="text-gray-100">Registros Portabilidad</span>
                        </a>
                        <div id="collapseAdminPorta" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Opciones:</h6>
                                <a class="collapse-item" href="?p=claro&c=Back_porta&a=today">Ventas de Hoy</a>
                                <a class="collapse-item" href="?p=claro&c=Back_porta&a=asesores">Asesores</a>
                                <a class="collapse-item" href="?p=claro&c=Back_porta&a=total">Ventas Totales</a>
                                <a class="collapse-item" href="?p=claro&c=Back_porta&a=fecha">Generar reportes</a>
                            </div>
                        </div>
                    </li>
                <?php } ?>

                <?php if ($_SESSION['permiso'] == 2 || $_SESSION['permiso'] == 5 || $_SESSION['permiso'] == 3 || $_SESSION['permiso'] == 1 || $_SESSION['permiso'] == 8) { ?>

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdminTyT" aria-expanded="true" aria-controls="collapseAdminTyT">
                            <i class="fas fa-fw fa-tv" style="color:white;"></i> <span class="text-gray-100">Registros Tecnologia</span>
                        </a>
                        <div id="collapseAdminTyT" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Opciones:</h6>
                                <a class="collapse-item" href="?p=claro&c=Back_tyt&a=today">Ventas de Hoy</a>
                                <a class="collapse-item" href="?p=claro&c=Back_tyt&a=asesores">Asesores</a>
                                <a class="collapse-item" href="?p=claro&c=Back_tyt&a=total">Ventas Totales</a>
                                <a class="collapse-item" href="?p=claro&c=Back_tyt&a=fecha">Generar reportes</a>
                            </div>
                        </div>
                    </li>
                <?php } ?>

                <?php if ($_SESSION['permiso'] == 1) { ?>

                    <li class="nav-item">
                        <a class="nav-link" href="?p=claro&c=Usuario&a=main">
                            <i class="fas fa-fw fa-user" style="color:white;"></i>
                            <span>Usuarios</span>
                        </a>
                    </li>
                <?php } ?>
            <?php } ?>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars" style="color:white;"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">

                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw" style="color:white;"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm" style="color:white;"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <div id="timer" style="display:block">10:00</div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nombres'] ?></span>
                                <img class="img-profile rounded-circle" src="assets/claro/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400" style="color:white;"></i>
                                    Cerrar Sesion
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->