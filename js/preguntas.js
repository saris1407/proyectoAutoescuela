function crearPregunta() {
    // Obtener los valores del formulario
    var enunciado = document.getElementById('pregunta').value;
    var respuestaCorrecta = document.getElementById('respuesta_correcta').value;
    var respuestaIncorrecta1 = document.getElementById('respuesta_incorrecta1').value;
    var respuestaIncorrecta2 = document.getElementById('respuesta_incorrecta2').value;
    var dificultad = document.getElementById('dificultad').value;
    var categoria = document.getElementById('categoria').value;

    // objeto de pregunta
    var nuevaPregunta = {
        enunciado: enunciado,
        respuesta_correcta: respuestaCorrecta,
        respuesta_incorrecta1: respuestaIncorrecta1,
        respuesta_incorrecta2: respuestaIncorrecta2,
        dificultad: dificultad,
        categoria: categoria
    };

    // Enviar los datos directamente en el cuerpo de la solicitud
    fetch("http://localhost/proyectoAutoescuela/Api/Apipregunta.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(nuevaPregunta),
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        if (data === "Pregunta añadida") {
            window.location.href = "index.php?menu=crearpreguntas";
        } else {
            console.error('Error al añadir la pregunta:', data);
        }
    })
    .catch(error => {
        console.error('Error al enviar la solicitud:', error);
    });
}
