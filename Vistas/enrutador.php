<?php

$rutabase = $_SERVER['DOCUMENT_ROOT'] . '/proyectoAutoescuela/';

if (isset($_GET['menu'])) {
    $menu = $_GET['menu'];
    
    if ($menu == "portada") {
        require_once $rutabase . './Formulario/portada.php';
    }

    if ($menu == "login" || $menu == "registro") {
        require_once $rutabase . 'Vistas/header.php'; 
        require_once $rutabase .  'Vistas/footer.php';
        require_once $rutabase . './Formulario/login.php';
    }

    if ($menu == "olvidaContraseña") {
        require_once $rutabase . 'Vistas/header.php'; 
        require_once $rutabase .  'Vistas/footer.php';
        require_once $rutabase . './Formulario/recupercontraseña.php';
    }
    if ($menu == "alumno") {
        require_once $rutabase . 'Vistas/header.php'; 
        require_once $rutabase .  'Vistas/footer.php';
        require_once $rutabase . './Formulario/alumno.php';
    }
    if ($menu == "admin") {
        require_once $rutabase . 'Vistas/header.php'; 
        require_once $rutabase .  'Vistas/footer.php';
        require_once $rutabase . './Formulario/admin.php';
    }
    
    if ($menu == "profesor") {
        require_once $rutabase . 'Vistas/header.php'; 
        require_once $rutabase .  'Vistas/footer.php';
        require_once $rutabase . './Formulario/profesor.php';
    }
    if ($menu == "crearpreguntas") {
        require_once $rutabase . 'Vistas/header.php'; 
        require_once $rutabase .  'Vistas/footer.php';
        require_once $rutabase . './Formulario/crearpreguntas.php';
    }
} else {
    // Si $_GET['menu'] está vacío, carga la portada por defecto en index.php
    require_once $rutabase . 'Formulario/portada.php';
}
