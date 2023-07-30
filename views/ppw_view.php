<?php
session_start();
$count = $_SESSION['count'];
?>

<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style.css" rel="stylesheet" type="text/css">
</head>

<body>

    <?php
    $presentacion = $_SESSION['presentacion'];
    $portada = $presentacion->getData();
    $actualData = $portada[$count];
    echo "<div class='wrapper' style='text-align:{$presentacion->getPosition()}'>";
    if ($actualData->getTitol() != "") {
        echo "<h1 style='color:{$presentacion->getColorTitle()};font-family:{$presentacion->getFont()}'>{$actualData->getTitol()}</h1>";
    }
    if (property_exists($actualData, 'image')) { // comprueba si esta el campo image en el objeto
        if ($actualData->getCover() != "") {
            echo "<p style='font-family:{$presentacion->getFont()}'>{$actualData->getCover()}</p>";
        }
        if ($actualData->getImage() != "") {
            //echo "<h2 style='color:{$presentacion->getColorSubtitle()};font-family:{$presentacion->getFont()}'>{$actualData->getImage()}</h2>";
            echo "<img src='/files/image/{$presentacion->getId()}/{$actualData->getImage()}'><br>";
        }
    } else {
        if ($actualData->getSubtitol() != "") {
            echo "<h2 style='color:{$presentacion->getColorSubtitle()};font-family:{$presentacion->getFont()}'>{$actualData->getSubtitol()}</h2>";
        }
        if ($actualData->getCover() != "") {
            echo "<p style='font-family:{$presentacion->getFont()}'>{$actualData->getCover()}</p>";
        }
    }
    echo '</div>';
    if ($count > 0) {
        echo "<form action=\"/../controllers/controllerPrincipal.php\" method=\"post\">
            <input type=\"submit\" value=\"Atras\" name=\"Atras\">
            </form>";
    }
    if ($count < (count($portada) - 1)) {
        echo "<form action=\"/../controllers/controllerPrincipal.php\" method=\"post\">
            <input type=\"submit\" value=\"Adelante\" name=\"Adelante\">
            </form>";
    }
    echo "<form action=\"../index.php\" method=\"post\">
            <input type=\"submit\" value=\"Inicio\">
            </form>";
    /*echo "<form action=\"/../controllers/controllerPrincipal.php\" method=\"post\">
            <input type=\"submit\" value=\"Siguiente diapositiva automatica\" name=\"Siguiente diapositiva automatica\">
            </form>";
    if ($presentacion->getAutoDiapo()) {
        sleep(2);
        echo "hola";
        header('Location: /../controllers/controllerPrincipal.php');
    }*/
    ?>
    <form action="/../controllers/controllerPrincipal.php" method="post">
        <br><input type="submit" value="Mostrar todas las presentaciones" name="window">
    </form>

</body>

</html>