<?php
require_once __DIR__ . '/../vendor/autoload.php';

use MongoDB\Client;
use AutoTest\Presentacion;
use AutoTest\DefaultPortada;
use AutoTest\ImageSlide;

require_once __DIR__ . '/getDataPresentacionMongo.php';
/*
isset($_POST["usuario"]);
isset($_POST["fecha1"]);
isset($_POST["fecha2"]);
isset($_POST["presentacionFilter"]);
*/
if (isset($_POST["presentacionTodas"])) {
    echo 'mostrar todo';
    mostrarTodasLasPresentaciones();
    require_once  __DIR__ . '/../views/filterPresentacion.php';
} else {
    $boolUsuario;
    $boolFecha1;
    $boolFecha2;
    if (isset($_POST["usuario"])) {
        if ($_POST["usuario"] != "") {
            $boolUsuario = true;
        }
    }
    if (isset($_POST["fecha1"])) {
        if ($_POST["fecha1"] != "") {
            $boolFecha1 = true;
        }
    }
    if (isset($_POST["fecha2"])) {
        if ($_POST["fecha2"] != "") {
            $boolFecha2 = true;
        }
    }
    if ($boolFecha1 && $boolFecha2 /*&& $_POST["fecha1"] != "" && $_POST["fecha2"] != ""*/) {
        if ($boolUsuario) {
            echo 'todos los filtros';
            mostrarFiltroTodo($_POST["usuario"], $_POST["fecha1"], $_POST["fecha2"]);
            require_once  __DIR__ . '/../views/filterPresentacion.php';
        } else {
            echo 'fechas';
            mostrarFiltroFecha($_POST["fecha1"], $_POST["fecha2"]);
            require_once  __DIR__ . '/../views/filterPresentacion.php';
        }
    } else if ($boolFecha1 && !$boolFecha2 || !$boolFecha1 && $boolFecha2) {
        echo '<script type="text/javascript">
        alert("Introduce dos fechas!");
         window.location.href="/../views/filterPresentacion.php";
        </script>';
        
        // error poner 2 fechas
    } else if ($boolUsuario) {
        echo 'filtrar usuario';
        //var_dump($_POST["usuario"]);
        mostrarFiltroUsuario($_POST["usuario"]);
        require_once  __DIR__ . '/../views/filterPresentacion.php';
    } else {
        echo 'no has puesto filtro (o mostrar todo)';
        mostrarTodasLasPresentaciones();
        require_once  __DIR__ . '/../views/filterPresentacion.php';
    }
}
