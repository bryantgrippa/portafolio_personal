<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
require_once("DataBase.php");
$db_handle = new DBController();

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
// if (isset($_POST["column"]) && ($_POST["column"] == "empleado_mes")) {
//     $year = date("Y");
//     $mes_actual = date("n");
//     $concatmy = $mes_actual . "/" . $year;
//     $sql = "SELECT id_historico, count(*) as empleado_mes FROM historico_empleado_mes WHERE id_usuario = " . $_POST["id_user"] . " AND id_mes_historico = " . $_POST["editval"] . " AND mes_year = '" . $concatmy . "';";

//     // echo "SELECT id_historico, count(*) as empleado_mes FROM historico_empleado_mes WHERE id_usuario = " . $_POST["id_user"] . " AND id_mes_historico = " . $_POST["editval"] . " AND mes_year = '" . $concatmy . "';";
//     $faq = $db_handle->runQuery($sql);
//     foreach ($faq as $k => $v) {
//         $user_work = $faq[$k]["empleado_mes"];
//     }
//     //echo $user_work;
//     if ($user_work == 0) {
//         $result = $db_handle->executeUpdate("INSERT INTO historico_empleado_mes (id_usuario, id_mes_historico, year_historico,mes_year, activo) VALUES (" . $_POST["id_user"] . "," . $_POST["editval"] . "," . $year . ",'" . $concatmy . "',1);");
// //        echo "INSERT INTO historico_empleado_mes (id_usuario, id_mes_historico, year_historico,mes_year, activo) VALUES (" . $_POST["id_user"] . "," . $_POST["editval"] . "," . $year . ",'" . $concatmy . "',1);";
//     } else {
//         $result = $db_handle->executeUpdate("DELETE FROM historico_empleado_mes WHERE id_usuario=" . $_POST["id_user"] . ";");
//     }
// }
if (isset($_POST["column"]) && ($_POST["column"] == "rango fecha permisos")) {
    $fechas = $_POST["editval"];
    $fechas_sel = explode(" al ", $fechas);
    $fecha_desde = new DateTime($fechas_sel[0]);
    $fecha_hasta = new DateTime($fechas_sel[1]);
    //echo $fecha_desde." ".$fecha_hasta;
    $intvl = $fecha_desde->diff($fecha_hasta);
    // crea un período de fecha iterable (P1D equivale a 1 día)
    $period = new DatePeriod($fecha_desde, new DateInterval('P1D'), $fecha_hasta);
    // almacenado como matriz, por lo que puede agregar más de una fecha feriada
    $holidays = array('2022-12-08', '2021-12-25', '2022-01-01', '2022-01-10', '2022-03-21', '2022-04-14', '2022-04-15', '2022-05-15', '2022-05-30', '2022-06-20', '2022-06-27', '2022-07-04', '2022-07-20', '2022-08-15', '2022-10-17', '2022-11-07', '2022-11-14', '2022-12-08');
    if ($intvl->h >= 10) {
        $intvl->d += 1;
        $intvl->h = 0;
    }
    foreach ($period as $dt) {
        $curr = $dt->format('D');
        //print_r($curr);
        // obtiene si es Sábado o Domingo
        if ($curr == 'Sun') {
            $intvl->d -= 1;
        }
        if ($curr == 'Sat' && $intvl->h >= 3) {
            $intvl->d += 1;
            $intvl->h = 0;
        }
        if (in_array($dt->format('Y-m-d'), $holidays)) {
            $intvl->d -= 1;
        }
    }
    echo $intvl->m . " meses, " . $intvl->d . " día(s) y " . $intvl->h . " hora(s)";
//echo "\n";
// Total amount of days
    // print_r($intvl);
//echo $intvl->days . " days ";
}