<?php
/*
    Autor: Jabier Zurro Aduriz
    Asignatura: DWES
    UD02 TE01 Página gestión de vehículos.
    Fecha: 06/11/2024
*/

// Definir los usuarios, simulando los datos de una BD
    define('USUARIOS',
    array(
        array(
            "nombre" => "Iker",
            "apellido" => "Arana",
            "dni" => "12345678Z"
        ),
        array(
            "nombre" => "María",
            "apellido" => "Gómez",
            "dni" => "87654321X"
        ),
        array(
            "nombre" => "Carlos",
            "apellido" => "López",
            "dni" => "13579246P"
        ),
        array(
            "nombre" => "Laura",
            "apellido" => "Martínez",
            "dni" => "24681357X"
        )
    ));

    // Definir los coches
    $coches = array(
        array(
            "id" => 1,
            "modelo" => "Lancia Stratos",
            "disponible" => true,
            "fecha_inicio" => null, 
            "fecha_fin" => null      
        ),
        array(
            "id" => 2,
            "modelo" => "Audi Quattro",
            "disponible" => true,
            "fecha_inicio" => null,
            "fecha_fin" => null
        ),
        array(
            "id" => 3,
            "modelo" => "Ford Escort RS1800",
            "disponible" => false,
            "fecha_inicio" => "2024-10-25",
            "fecha_fin" => "2024-11-10"
        ),
        array(
            "id" => 4,
            "modelo" => "Subaru Impreza 555",
            "disponible" => true,
            "fecha_inicio" => null,
            "fecha_fin" => null
        )
    );
