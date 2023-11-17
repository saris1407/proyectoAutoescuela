<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/proyectoAutoescuela/cargadores/Autoload.php';
Autoload::autoload();

?>

<h2>Bienvenido Alumno</h2>
<main>
    <div class="boton-hacerexamen">
        <form method="post" action="index.php?examen">
            <button class="botonhacerexamen" type="submit" name="hacer_examen">Hacer Examen</button>
        </form>
        <form method="post" action="index.php?menu=historicoex">
            <button class="botonhistorialexamenes" type="submit" name="historico_examen">Historial de Exámenes</button>
        </form>
        <form method="post" action="index.php?menu=portada">
        <button class="botoncerrarsesion" type="submit">Cerrar Sesión</button>
        </form>

    </div>
</main>
