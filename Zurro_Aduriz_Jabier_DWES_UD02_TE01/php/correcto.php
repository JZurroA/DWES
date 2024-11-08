<?php
/*
    Autor: Jabier Zurro Aduriz
    Asignatura: DWES
    UD02 TE01 Página gestión de vehículos.
    Fecha: 06/11/2024
*/

session_start();

// Mostrar mensaje de reserva correcta si existe
if (isset($_SESSION['nombre'], $_SESSION['apellido'], $_SESSION['rutaImagen'], $_SESSION['modeloCoche'])) {
    echo "<p class='correcto'>¡Reserva realizada con éxito!</p>";
    echo "<h2>Nombre: " . $_SESSION['nombre'] . " " . $_SESSION['apellido'] . "</h2>";
    echo "<img src='" . $_SESSION['rutaImagen'] . "' alt='" . $_SESSION['modeloCoche'] . "' />";
    
    // Limpiar datos de sesión después de mostrarlos, si lo deseas
    unset($_SESSION['nombre'], $_SESSION['apellido'], $_SESSION['dni'], $_SESSION['rutaImagen'], $_SESSION['modeloCoche']);
} else {
    echo "<p>No se encontró información de la reserva.</p>";
}