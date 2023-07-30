<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <form action="/../controllers/controlFilterPresentacion.php" method="post">
        <input type="text" placeholder="Filtro de usuario" name="usuario">
        <input type="date" name="fecha1">
        <input type="date" name="fecha2"> <br>
        <input type="submit" value="Mostrar todas las presentaciones" name="presentacionTodas">
        <input type="submit" value="Filtrar presentaciones" name="presentacionFilter">
    </form>
</body>


</html>