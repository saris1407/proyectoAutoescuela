<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/proyectoAutoescuela/cargadores/Autoload.php';
Autoload::autoload();
?>



<h2>Crear Preguntas</h2>
<main>
    <div class="contenedor-preguntas">
        <div class="preguntas">
            <form id="FormularioPregunta" action="crearpreguntas.php" method="POST">
                <label for="pregunta">Pregunta:</label>
                <textarea name="pregunta" id="pregunta" rows="4" required></textarea>

                <label for="respuesta_correcta">Respuesta Correcta:</label>
                <input type="text" name="respuesta_correcta" id="respuesta_correcta" required>

                <label for="respuesta_incorrecta1">Respuesta Incorrecta 1:</label>
                <input type="text" name="respuesta_incorrecta1" id="respuesta_incorrecta1" required>

                <label for="respuesta_incorrecta2">Respuesta Incorrecta 2:</label>
                <input type="text" name="respuesta_incorrecta2" id="respuesta_incorrecta2" required>

                <label for="dificultad">Dificultad:</label>
                <select name="dificultad" id="dificultad" required>
                    <option value="INICIAL">Inicial</option>
                    <option value="MEDIA">Media</option>
                    <option value="ALTA">Alta</option>
                </select>

                <label for="categoria">Categoría:</label>
                <input type="text" name="categoria" id="categoria" required>

                <label for="imagen">Imagen :</label>
                <input type="file" name="imagen" id="imagen">

                <button class="clicpregunta" type="button" onclick="crearPregunta()">Crear Pregunta</button>
            </form>
        </div>
    </div>
</main>
