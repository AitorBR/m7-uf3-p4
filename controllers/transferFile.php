<?php
session_start();

function sendFileToServer($file_name)
{
    $presentacion = $_SESSION['presentacion'];
    $file_name = $_FILES['file']['name'];

    foreach ($_FILES['file']['tmp_name'] as $key => $tmp_name) {
        //condicional si el fuchero existe
        if ($file_name[$key]) {
            // Nombres de archivos de temporales
            $archivonombre = $file_name[$key];
            $fuente = $_FILES['file']["tmp_name"][$key];

            $carpeta = '../files/image/' . $presentacion->getId() . '/'; //Declaramos el nombre de la carpeta que guardara los archivos

            if (!file_exists($carpeta)) {
                mkdir($carpeta, 0777, true) or die("Hubo un error al crear el directorio de almacenamiento");
            }

            $dir = opendir($carpeta);
            $target_path = $carpeta . '/' . $archivonombre; //indicamos la ruta de destino de los archivos


            if (move_uploaded_file($fuente, $target_path)) {
                echo "El fichero es válido y se subió con éxito.\n";
            } else {
                echo "Se ha producido un error";
            }
            closedir($dir); //Cerramos la conexion con la carpeta destino
        }
    }
}

/*
function sendFileToServer($file_name)
{
    $presentacion = $_SESSION['presentacion'];
    $dir_upload = '../files/image/' . $presentacion->getId() . '/';
    $file_name = $_FILES['file']['name'];


    var_dump($file_name);


    foreach ($file_name as $file) {
        if (checkExtension($file) == true) {
            if (!file_exists($dir_upload)) {
                mkdir($dir_upload, 0777, true);
                $error = error_get_last();
                var_dump($error);
            }
            $fichero_subido = $dir_upload . basename($file);
            var_dump($fichero_subido);

            if (move_uploaded_file($_FILES['file']['tmp_name'], $fichero_subido)) {
                echo "El fichero es válido y se subió con éxito.\n";
            } else {
                echo "No se subio";
            }
        }
    }
}


function checkExtension($file_name)
{
    $file_ext = explode('.', $file_name);
    $file_ext_lower = strtolower(end($file_ext));
    $permit_ext = array('jpg', 'png');
    if (in_array($file_ext_lower, $permit_ext)) {
        return true;
    } else {
        return false;
    }
}
*/
