<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <h1>"Bienvenido a PowerDot"</h1>
    <p>A continuación podrás crear tus presentaciones a través de una estructura de codigo como la siguiente
        <br>= Títol 1
        <br>[cover] Example
        <br>((test.png
        <br>>>>
    <p>
    <form action="/controllers/controllerPrincipal.php" method="post" enctype="multipart/form-data">
        <div class="center">
            <textarea name="textarea" rows="15" cols="70" name="obtenerTexto">
= Títol 1
== Subtítol
[cover] Example
((test.png
>>></textarea>
            <br>
            <span>Autor: </span><input type="text" name="autor">
            <ul>
                <li>
                    Color del título: <select name="titulo" id="titulo">
                        <option value="red">Rojo</option>
                        <option value="green">Verde</option>
                        <option value="blue">Azul</option>
                    </select>
                </li>
                <li>
                    Color del subtítulo: <select name="subtitulo" id="subtitulo">
                        <option value="red">Rojo</option>
                        <option value="green">Verde</option>
                        <option value="blue">Azul</option>
                    </select>
                </li>
                <li>
                    Fuente: <select name="font" id="font">
                        <option value="arial">Arial</option>
                        <option value="verdana">Verdana</option>
                    </select>
                </li>
                <li>
                    Posición: <select name="pos" id="pos">
                        <option value="left">Izquierda</option>
                        <option value="center">Centro</option>
                        <option value="right">Derecha</option>
                    </select>
                </li>
                <ul>

                    <input type="file" name="file[]" id="file" multiple>

                    <br><br><input type="submit" value="Generar la presentación" name="window">
                    <input type="submit" value="Mostrar todas las presentaciones" name="window">
                    <input type="submit" value="Seleccion de presentaciones" name="filter">
    </form>
    <!-- <form action="/controllers/controllerSeleccionPresentacion.php" method="post" enctype="multipart/form-data">
    </form> -->
    </div>

</body>

</html>