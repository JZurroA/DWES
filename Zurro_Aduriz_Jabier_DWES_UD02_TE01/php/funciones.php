<?php
/*
    Autor: Jabier Zurro Aduriz
    Asignatura: DWES
    UD02 TE01 Página gestión de vehículos.
    Fecha: 06/11/2024
*/

// Validar el usuario
    function validarUsuario($nombre, $apellido, $dni) {
        foreach (USUARIOS as $usuario) {
            if ($usuario['dni'] === $dni && $usuario['nombre'] === ucfirst($nombre) && $usuario['apellido'] === ucfirst($apellido)) {
                return true;
            }
        }
        return false;
    }

    // Validar el DNI
    function validarDni($dni) {
        $dni = trim($dni);
        $letra = strtoupper(substr($dni, -1));
        $numeros = substr($dni, 0, -1);
        $letraCalculada = substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros % 23, 1);
        return is_numeric($numeros) && strlen($numeros) == 8 && $letra === $letraCalculada;
    }

    function obtenerDetallesCoche($idCoche, array $coches, $fechaInicioReserva, $duracionDias) {
        foreach ($coches as $coche) {
            if ($coche['id'] == $idCoche) {
                // Calcular la fecha de fin de la reserva solicitada
                $fechaFinReserva = date("Y-m-d", strtotime($fechaInicioReserva . " +$duracionDias days"));
    
                // Verificar disponibilidad del coche
                $cocheDisponible = $coche['disponible'] ||
                                   ($coche['fecha_inicio'] === null && $coche['fecha_fin'] === null) ||
                                   ($fechaFinReserva < $coche['fecha_inicio'] || $fechaInicioReserva > $coche['fecha_fin']);
    
                return [
                    'detalles' => $coche,
                    'disponible' => $cocheDisponible
                ];
            }
        }
        return null;
    }    

    // Obtener la ruta de la imagen del coche
    function obtenerRutaImagen($idCoche) {
        $imagenes = [
            1 => "../img/lancia-stratos.jpg",
            2 => "../img/audi-quattro.jpg",
            3 => "../img/ford-escort.webp",
            4 => "../img/subaru-impreza.jpg"
        ];
        return isset($imagenes[$idCoche]) ? $imagenes[$idCoche] : null;
    }