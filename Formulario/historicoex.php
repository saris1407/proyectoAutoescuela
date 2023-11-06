<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Historico de Examen</title>
</head>
<body>
    <header>
        <h1>Historico de Examen</h1>
        <div class="logo"></div>
    </header>
    <main>
        <div class="resultado-examen">
            <h2>Resultados del Examen</h2>
            <td>
            <li> <p>Nombre del Examen: </p>
            <li> <p>Nombre del Alumno: </p></li>
            </td>
        </div>
        <table>
            <tr>
                <th>Pregunta</th>
                <th>Respuesta del Alumno</th>
                <th>Respuesta Correcta</th>
                <th>Nota</th>
            </tr>
           
            
        </table>
        <form method="post" action="alumno.php">
            <button type="submit" name="volver">Volver</button>
        </form>
    </main>
    <footer>
        &copy; 2023 AutoEscuela On The Road
    </footer>
</body>
</html>
