<?php 
$conexion = mysqli_connect("localhost:3306","root", "", "gestionhumana");
?>
</div>
<nav class="navbar navbar-expand-sm bg navbar fixed-top">
    <a class="navbar-brand" href="?p=rrhh&c=Novedades&a=main"><img src="assets/gestionhumana/img/icono-logo.png" alt="Logo ARCOS" class="img-thumbnail rounded-circle logo" /></a>

        <a class="nav-link" href="#" id="session" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo $_SESSION['foto']; ?>" alt="Mi perfil" class="img-thumbnail rounded-circle logo" /></a>
        <div class="dropdown-menu dropdown-menu-session" aria-labelledby="session">
            <a class="dropdown-item" href="?p=rrhh&c=Perfiles&a=main&id_usuario=<?php echo $_SESSION['id_usuario']; ?>">Mi perfil</a>
            <a class="dropdown-item" href="?p=rrhh&c=Perfiles&a=Pass&id_usuario=<?php echo $_SESSION['id_usuario']; ?>">Cambiar Contrase&ntilde;a</a>
            <a class="dropdown-item" href="?p=rrhh&c=Login&a=log">Cerrar Sesi&oacute;n</a>

        </div>
        <h4 style="color:white;">
        <?php echo $_SESSION['nombres']; ?>
        </h4>
    <button class="navbar-toggler text-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span><i class="fa fa-navicon" style="color:#fff; font-size:28px;"></i></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
<!-- index -->
    
            <ul class="navbar-nav menu-p">
                <li class="nav-item active text-center">
                    <a class="nav-link" href="?p=rrhh&c=Novedades&a=main">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown text-center">
                    <a class="nav-link dropdown-toggle" href="#" id="solicitudes" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Solicitudes</a>
                    <div class="dropdown-menu" aria-labelledby="solicitudes">
                        <a class="dropdown-item" href="?p=rrhh&c=Certificados_PDF&a=Certificado_laboral&id=<?php echo $_SESSION['id_usuario']; ?>" target="_blank">Certificado laboral</a>
                        <a class="dropdown-item" href="?p=rrhh&c=Solicitudes_permisos&a=main">Solicitud de permisos</a>

                    </div>
                </li>
                
<?PHP if ($_SESSION['permiso'] == 1 || $_SESSION['permiso'] == 2) { ?>
                    <li class="nav-item dropdown text-center">
                        <a class="nav-link dropdown-toggle" href="#" id="configuracion_mod" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Configuraci&oacute;n
                        </a>
                        <div class="dropdown-menu" aria-labelledby="configuracion_mod">
                            <a class="dropdown-item" href="?p=rrhh&c=Cargos&a=main">Cargos</a>
                            <a class="dropdown-item" href="?p=rrhh&c=Areas&a=main">Áreas</a>
                            <a class="dropdown-item" href="?p=rrhh&c=Usuarios&a=main">Usuarios</a>

                        </div>
                    </li>
<?PHP } ?>


<?PHP if ($_SESSION['permiso'] == 1 || $_SESSION['permiso'] == 4 || $_SESSION['permiso'] == 2) { ?>
                    <li class="nav-item dropdown text-center">
                        <a class="nav-link dropdown-toggle" href="#" id="noticias_mod" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Noticias
                        </a>
                        <div class="dropdown-menu" aria-labelledby="noticias_mod">
                            <a class="dropdown-item" href="?p=rrhh&c=Destacados&a=main">Destacados</a>
                            <a class="dropdown-item" href="?p=rrhh&c=Noticias&a=main">Noticias</a>
                            <a class="dropdown-item" href="?p=rrhh&c=Sobresalientes&a=main">Sobresaliente</a>
                        </div>
                    </li>
<?PHP } ?>
        
                <li class="nav-item dropdown text-center">
                    <a class="nav-link dropdown-toggle" href="#" id="valores_arcos" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Institucional
                    </a>
                    <div class="dropdown-menu" aria-labelledby="valores_arcos">
                        <a class="dropdown-item" href="?p=rrhh&c=Novedades&a=institucional">Politica de Tratamiento de Datos</a>
                    </div>
                </li>
                <?PHP if ($_SESSION['permiso'] == 1 || $_SESSION['permiso'] == 4) { ?>

                    <li class="nav-item dropdown text-center">
                        <button class="notificacion" class="nav-link dropdown-toggle" class="noti_number" class="icon-button" href="#" id="inventario-arcos" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <!-- esto es el icono de la campana de notificaciones -->
                            <i class="bi bi-bell-fill"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                            </svg>
                            <span class="icon-button__badge">

                            <?php


if ($_SESSION['cargo'] == 3){
    $sql='SELECT COUNT(*) AS total FROM solicitudes_permisos_laborales WHERE (autorizado_rrhh > 0 AND autorizado_nomina = 0) OR (supervisor = ' .$_SESSION['id_usuario']. ' AND autorizado_sup = 0);';
    $result=mysqli_query($conexion,$sql);
    while($mostrar=mysqli_fetch_array($result)){
        echo $mostrar['total'];
}
}else{
    if ($_SESSION['cargo'] == 4){
        $sql='SELECT COUNT(*) AS total FROM solicitudes_permisos_laborales WHERE (autorizado_ope > 0 AND autorizado_rrhh = 0) OR (supervisor = ' .$_SESSION['id_usuario']. ' AND autorizado_sup = 0);';
        $result=mysqli_query($conexion,$sql);
        while($mostrar=mysqli_fetch_array($result)){
            echo $mostrar['total'];
    }
    }else{
        if ($_SESSION['cargo'] == 2 || $_SESSION['cargo'] == 5 || $_SESSION['cargo'] == 6){
            $sql='SELECT COUNT(*) AS total FROM solicitudes_permisos_laborales WHERE (autorizado_sup > 0 AND autorizado_ope = 0 AND jefe_area = ' .$_SESSION['id_usuario']. ') OR  (supervisor = ' .$_SESSION['id_usuario']. ' AND autorizado_sup = 0);';
            $result=mysqli_query($conexion,$sql);
            while($mostrar=mysqli_fetch_array($result)){
                echo $mostrar['total'];
        }
        }else{
            if ($_SESSION['permiso'] == 1 || $_SESSION['permiso'] == 4){
                $sql='SELECT COUNT(*) AS total FROM solicitudes_permisos_laborales WHERE supervisor = ' .$_SESSION['id_usuario']. ' AND autorizado_sup = 0';
                $result=mysqli_query($conexion,$sql);
                while($mostrar=mysqli_fetch_array($result)){
                    echo $mostrar['total'];
                }
            }
        }
    }
}
                            ?>

                            </span>
                        </button>

                        <div class="dropdown-menu" aria-labelledby="inventario_arcos">
                            <a class="dropdown-item" href="?p=rrhh&c=Notificaciones&a=main">Permisos Pendientes</a>
                        <?PHP if ($_SESSION['cargo'] <= 4) { ?>
                            <a class="dropdown-item" href="?p=rrhh&c=Historiales&a=main">Historial de Permisos</a>
                        </div>

                        <?php }?>
                    </li>

<?PHP } ?>

                    <!-- esta etiqueta style  le da estilo al boton de campana de notificaciones -->
                    <style>
                        .notificacion {
                            background-color: red;
                            border: none;
                            outline: none;
                            background-color: #555EE6;
                            color: azure;

                        }

                        .icon-button__badge {
                            position: absolute;
                            top: -2px;
                            right: -3px;
                            width: 15px;
                            height: 15px;
                            background: red;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            border-radius: 40px;
                        }
                    </style>
            </ul>
    </div>
    </div>
</nav>