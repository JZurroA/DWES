<?php
/*
    Autor: Jabier Zurro Aduriz
    Asignatura: DWES
    UD02 TE01 Página gestión de vehículos.
    Fecha: 06/11/2024
*/

session_start();

require 'datos.php';
include 'funciones.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $dni = $_POST['dni'] ?? '';
    $vehiculo = $_POST['coche'] ?? '';
    $fecha = $_POST['fecha'] ?? '';
    $dias = intval($_POST['dias'] ?? 0);

    // Reiniciar errores
    $_SESSION['errores'] = [];

    // Comprobar errores en cada campo y guardar mensajes específicos
    if (empty($nombre)) {
        $_SESSION['errores']['nombre'] = "Nombre: Este campo no puede estar vacío.";
    }

    if (empty($apellido)) {
        $_SESSION['errores']['apellido'] = "Apellido: Este campo no puede estar vacío.";
    }

    // Validar el DNI (debe cumplir con el módulo 23 y no estar vacío)
    if (empty($dni) || !validarDni($dni)) {
        $_SESSION['errores']['dni'] = "DNI no válido.";
    }

    if ($fecha <= date("Y-m-d")) {
        $_SESSION['errores']['fecha'] = "Fecha: La fecha debe ser posterior a la actual.";
    }

    if ($dias < 1 || $dias > 30) {
        $_SESSION['errores']['dias'] = "Duración de la reserva: Tiene que estar entre el 1 y el 30.";
    }

    // Si hay errores en los campos, redirigir a errores.php
    if (!empty($_SESSION['errores'])) {
        $_SESSION['valores'] = [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'dni' => $dni,
            'fecha' => $fecha,
            'dias' => $dias
        ];
        header("Location: errores.php");
        exit;
    }

    // Comprobar si el usuario está registrado solo después de validar los campos
    $usuarioRegistrado = false;
    foreach (USUARIOS as $usuario) {
        if ($usuario['nombre'] === $nombre && $usuario['apellido'] === $apellido && $usuario['dni'] === $dni) {
            $usuarioRegistrado = true;
            break;
        }
    }

    if (!$usuarioRegistrado) {
        // Redirigir a no_registrado.php si el usuario no está registrado
        header("Location: no_registrado.php");
        exit;
    }

    // Comprobar disponibilidad del vehículo
    $resultadoCoche = obtenerDetallesCoche($vehiculo, $coches, $fecha, $dias);
    if (!$resultadoCoche || !$resultadoCoche['disponible']) {
        // Redirigir a vehiculo_no_disponible.php si el vehículo no está disponible
        header("Location: no_disponible.php");
        exit;
    } else {
        // Guardar el coche como disponible en valores correctos si no hay error
        $_SESSION['valores']['vehiculo'] = "Vehículo disponible";
    }

    // En caso de éxito, guardar datos de la sesión
    $_SESSION['nombre'] = $nombre;
    $_SESSION['apellido'] = $apellido;
    $_SESSION['dni'] = $dni;

    // Guardar la ruta de la imagen del coche y el modelo
    $_SESSION['rutaImagen'] = obtenerRutaImagen($resultadoCoche['detalles']['id']);
    $_SESSION['modeloCoche'] = $resultadoCoche['detalles']['modelo'];
    $_SESSION['valores']['vehiculo'] = "Vehículo disponible";

    header("Location: correcto.php");
    exit;
}