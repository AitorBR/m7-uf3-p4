<?php
use AutoTest\Presentacion;
use AutoTest\Portada;
require_once __DIR__ . '/../vendor/autoload.php';
session_start();

require_once  __DIR__ . '/checkDataAndParse.php';

if (isset($_POST["filter"])) {
   require_once  __DIR__ . '/../views/loadPresentaciones.php';
} else {
   if (isset($_POST['window'])) {
      $_SESSION['window'] = $_POST['window'];
   }
   if (isset($_SESSION['presentacion'])) {
      controlScreen();
      loadViews();
   } else { // string $data = "", string $colorTitle = "black", string $colorSubtitle = "black", string $font = "Arial", $position = "center"
      $_SESSION['presentacion'] = new Presentacion("", $_POST['titulo'], $_POST['subtitulo'], $_POST['font'], $_POST['pos'], false, $_POST['autor']); // meter los datos
      $_SESSION["count"] = 0;
      checkAndParse();
      loadViews();
   }
}

function loadViews() {
   if ($_SESSION['window'] == 'Mostrar todas las presentaciones') {
      require_once  __DIR__ . '/../views/allMiniatures_view.php';
   } else {
      require_once  __DIR__ . '/../views/ppw_view.php';
   }
}

function controlScreen() {
   $count = $_SESSION["count"];
   if (isset($_POST["Atras"])) {
      $count = $count - 1;
      $_SESSION['count'] = $count;
   }
   if (isset($_POST["Adelante"])) {
      $count = $count + 1;
      $_SESSION['count'] = $count;
   }
   /*if (isset($_POST["Siguiente diapositiva automatica"])) {
      $count = $count + 1;
      $_SESSION['count'] = $count;
      $presentacion = $_SESSION['presentacion'];
      echo "entraentraentraentraentraentraentraentraentraentraentraentraentraentraentraentraentraentra";
      if ($presentacion->getAutoDiapo() == true) {
         $presentacion->setAutoDiapo(false);
         echo "falso";
      } else {
         $presentacion->setAutoDiapo(true);
         echo "true";
      }
   }*/
}

