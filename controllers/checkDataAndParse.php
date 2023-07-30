<?php

use AutoTest\Presentacion;
use AutoTest\DefaultPortada;
use AutoTest\ImageSlide;
use MongoDB\Client;

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/transferFile.php';

function checkAndParse()
{
    $valor = $_POST["textarea"];
    $file_name[] = $_FILES['file']['name'];
    //var_dump($file_name);
    $cicleEnd = false;
    $cicleEnd = checkSyntax($valor, $file_name);
    if (!$cicleEnd) {
        splitSyntax($valor);
    } else {
        include_once __DIR__ . '/../index.php';
    }
}

function checkSyntax($text, $file)
{
    $endofline = explode("\n", $text);
    $jumpLine = false;
    foreach ($endofline as $line) {
        //global $cicleEnd;
        $subtitol = "";
        $image = "";
        if (str_contains($line, "==")) {
            $subtitol = explode("==", $line);
            if (count($subtitol) > 2) {
                alert("subtitol");
                return true;
            }
            if (str_contains($subtitol[1], "=")) {
                alert("subtitol");
                return true;
            }
        } else if (str_contains($line, "=")) {
            $titol = explode("=", $line);
            if (count($titol) > 2) {
                alert("titol");
                return true;
            }
        } else if (str_contains($line, "[cover]")) {
            $text = explode("[cover]", $line);
            if (count($text) > 2) {
                alert("[cover]");
                return true;
            }
        } else if (str_contains($line, "((")) {
            $image = explode("((", $line);
            if (count($image) > 2) {
                alert("((");
                return true;
            }

            foreach ($file as $file_name) {
                if (checkImage($image, $file_name)) {
                    alert("fichero, no encontrado");
                    return true;
                };
            }
        } else if (str_contains($line, ">>>")) {
            $nextLine = explode(">>>", $line);
            $jumpLine = true;
            if (count($nextLine) > 2) {
                alert(">>>");
                return true;
            } else if ($image !== "" && $subtitol !== "") {
                alert("subtitulo e imagen en la misma diapositiva");
                return true;
            }
        }
    }
    if (!$jumpLine) {
        return true;
    }
}

function checkImage($image, $file)
{
    foreach ($file as $nameFile) {
        if ($image === $nameFile) {
            return false;
        }
    }
}

function alert($message)
{
    echo '<script language="javascript">';
    echo 'alert("Error en el ' . $message . '")';
    echo '</script>';
}


function splitSyntax($text)
{
    $portada = [];
    $titol = "";
    $subtitol = "";
    $cover = "";
    $image = "";
    //var_dump($text);
    $endofline = explode("\n", $text);
    foreach ($endofline as $line) {
        if (str_contains($line, "==")) {
            $subtitol = explode("==", $line)[1];
            //var_dump($subtitol);
        } else if (str_contains($line, "=")) {
            $titol = explode("=", $line)[1];
            //var_dump($titol);
        } else if (str_contains($line, "[cover]")) {
            $cover = explode("[cover]", $line)[1];
            //var_dump($cover);
        } else if (str_contains($line, "((")) {
            $image = explode("((", $line)[1];
            //var_dump($image);
        } else if (str_contains($line, ">>>")) {
            if ($image !== "") {
                $portada[] = new ImageSlide($titol, $cover, $image);
            } else {
                $portada[] = new DefaultPortada($titol, $cover, $subtitol);
            }
        }
    }

    //var_dump($portada);
    $moment = $_SESSION['presentacion'];
    $moment->setData($portada);
    $_SESSION['presentacion'] = $moment;
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $collection = $client->practicaM7->presentacion;
    $result = $collection->insertOne($moment);
    /*foreach ($portada as $data) {
        sendFileToServer($data->getImage());
    }*/
    foreach ($portada as $data) {
        if (property_exists($data, 'image')) {
            sendFileToServer($data->getImage());
        }
    }
}
