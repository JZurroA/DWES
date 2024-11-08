<!--
    Autor: Jabier Zurro Aduriz
    Asignatura: DWES
    UD02 TE01 Página gestión de vehículos.
    Fecha: 06/11/2024
-->
    
<!DOCTYPE html>
<html>
<head>
    <title>www.reservatucoche.eus</title>
    <style>
        .correcto { color: green; }
        .incorrecto { color: red; }
        img { max-width: 600px; }
    </style>
</head>
<body>
    <h1>Validación de Reserva</h1>
    <?php
session_start();

echo "<h3>Resultados de la reserva:</h3>";

// Definir el orden de los campos y sus etiquetas
$campos = [
    'nombre' => 'Nombre',
    'apellido' => 'Apellido',
    'dni' => 'DNI',
    'coche_nombre' => 'Vehículo seleccionado',
    'fecha' => 'Fecha',
    'dias' => 'Duración de la reserva'
];

// Mostrar cada campo en el orden correcto con su valor o mensaje de error
foreach ($campos as $campo => $etiqueta) {
    if (isset($_SESSION['errores'][$campo])) {
        // Mostrar solo el mensaje de error si existe
        echo "<p class='incorrecto'>{$_SESSION['errores'][$campo]}</p>";
    } elseif (isset($_SESSION['valores'][$campo])) {
        // Mostrar el valor correcto si no hay error
        echo "<p class='correcto'>$etiqueta: {$_SESSION['valores'][$campo]}</p>";
    }
}

// Limpiar errores y valores de la sesión después de mostrarlos
unset($_SESSION['errores'], $_SESSION['valores']);
?>
</body>
</html>