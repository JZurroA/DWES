<!--
    Autor: Jabier Zurro Aduriz
    Asignatura: DWES
    UD02 TE01 Página gestión de vehículos.
    Fecha: 06/11/2024
-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>www.reservatucoche.eus</title>
</head>
<body>
    <h1>Validación de Reserva</h1>
    <p>Introduce los datos para poder realizar la reserva.</p>
<?php
// Iniciar la sesión y obtener el array de coches desde la sesión
session_start();
require 'php/datos.php';
?>

    <!-- Formulario de reserva -->
    <form name="input" action="php/validar.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" placeholder="Escribe aquí tu nombre" name="nombre"/><br>

        <label for="apellido">Apellido:</label>
        <input type="text" placeholder="Escribe aquí tu apellido" name="apellido"/><br>

        <label for="dni">DNI:</label>
        <input type="text" placeholder="Escribe aquí tu DNI" name="dni"/><br>

        <!-- Lista de coches para mostrarla en el desplegable -->       
        <label for="vehiculos">Elige un vehículo:</label>
        <select id="coches" name="coche">
            <?php
            // Generar dinámicamente las opciones usando el array de coches en la sesión
            foreach ($coches as $coche) {
                echo "<option value='{$coche['id']}'>{$coche['modelo']}</option>";
            }
            ?>
        </select><br><br>

        <label for="fecha">Fecha de Inicio de Reserva:</label>
        <input type="date" placeholder="Introduce la fecha aquí" name="fecha"/><br>
        <label for="dias">Duración de la Reserva (en días):</label>
        <input type="number" placeholder="Introduce la duración de la reserva (en días) aquí" name="dias"/><br>
        
        <input type="submit" value="Reservar">
    </form>
</body>
</html>