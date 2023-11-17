
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/proyectoAutoescuela/cargadores/Autoload.php';
Autoload::autoload();
?>


<h2>Bienvenido profesor</h2>
<nav id="botones-profesor">
    <ul>
        <li><a href="index.php?menu=crearpreguntas"><button type="button">Crear Preguntas</button></a></li>
        <li><a href="index.php?menu=gestionexamenes"><button type="button">Gestión de Exámenes</button></a></li>
        <li><a href="index.php?menu=verresultados"><button type="button">Ver Resultados</button></a></li>
        <li><a href="index.php?menu=portada" class="cerrar-sesion"><button type="button">Cerrar Sesión</button></a></li>
    </ul>
</nav>

