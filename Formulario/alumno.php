<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style1.css">
    <title>Página del Alumno</title>
</head>
<body>
    <header>
        <div class="logo"></div>
        <h1>Bienvenido</h1>
    </header>
    <main>
        <div class="boton-con">
            <form method="post" action="realizar_examen.php">
                <button type="submit" name="hacer_examen">Hacer Examen</button>
            </form>
            <form method="post" action="historico_examen.php">
                <button type="submit" name="historico_examen">Historial de Exámenes</button>
            </form>
            <form method="post" action="../portada.html">
                <button type="submit">Cerrar Sesión</button>
            </form>
        </div>
    </main>
    <footer>
        &copy; 2023 AutoEscuela On The Road
    </footer>
</body>
</html>
