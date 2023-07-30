<?php
require_once __DIR__ . '/../vendor/autoload.php';

use MongoDB\Client;

function mostrarTodasLasPresentaciones()
{
    $collection = genericConection();
    $cursor = $collection->find();
    var_dump($cursor);
    $_SESSION['presentacionFilter'] = $cursor;
    //createArrayObjectPresentacion($cursor);
}
function mostrarFiltroTodo($autor, $fecha, $fecha2)
{
    $collection = genericConection();
    var_dump($fecha);
    $cursor = $collection->find(['author' => $autor, 'date' => $fecha]);
    var_dump($cursor);
    $_SESSION['presentacionFilter'] = $cursor;
    //createArrayObjectPresentacion($cursor);
}
function mostrarFiltroFecha($fecha, $fecha2){
    $collection = genericConection();
    var_dump($fecha);
    $cursor = $collection->find(['date' => $fecha]);
    var_dump($cursor);
    $_SESSION['presentacionFilter'] = $cursor;
    //reateArrayObjectPresentacion($cursor);
}

function mostrarFiltroUsuario($autor)
{
    $collection = genericConection();
    //var_dump($autor);
    $cursor = $collection->find(['author' => $autor]);
    var_dump($cursor);
    $_SESSION['presentacionFilter'] = $cursor;
    //createArrayObjectPresentacion($cursor);
}

function genericConection()
{
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $collection = $client->practicaM7->presentacion;
    return $collection;
}
/*
function createArrayObjectPresentacion($cursor)
{
    $_SESSION['presentacionFilter'] = $cursor;
    //var_dump($cursor);
    /*
    $doc = [];
    foreach ($cursor as $document) {
        $doc[] = $document;
    }
    //echo '<input type="hidden" style="display: none"'.var_dump($doc).'"/>';
    //var_dump($doc);
    $_SESSION['presentacionFilter'] = $doc;
    //var_dump($_SESSION['presentacionFilter']);
    
}
*/
/*
$fechaInicio=strtotime("25-02-2008");
$fechaFin=strtotime("01-04-2008");
for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
    echo date("d-m-Y", $i)."<br>";
}
*/


/*
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->practicaM7->presentacion;
$cursor = $collection->find(['position' => 'right', 'font' => 'verdana']);
//var_dump($cursor);

foreach ($cursor as $document) {
    var_dump($document);
    //echo $document -> getTitol();
    
     foreach ($dataArray as $portadaObjeto) {
           $dataArray = $document->getData();
        $valor = $portadaObjeto->getTitol();
        var_dump($valor);
    }
*/