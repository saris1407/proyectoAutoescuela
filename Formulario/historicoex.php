
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/proyectoAutoescuela/cargadores/Autoload.php';
Autoload::autoload();
?>

        <h2>Historico de Examen</h2>
       
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
    