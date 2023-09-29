<?php

session_start();

if (!isset($_SESSION['alumnos'])) {
    $_SESSION['alumnos'] = Array('Numero de Cédula' => Array(), 'Nombre' => Array(), 'Nota de matemáticas' => Array(), 'Nota de física' => Array(), 'Nota de programación' => Array());
}

function validarNota($nota) {
    return $nota >= 1 && $nota <= 20;
}

function cedulaRepetida($cedula) {
    return in_array($cedula, $_SESSION['alumnos']['Numero de Cédula']);
}

if(isset($_POST['btnG'])){
    $cedula = $_POST['txtCedula'];
    $nombre = $_POST['txtNombre'];
    $notaMate = $_POST['txtNotaMate'];
    $notaFis = $_POST['txtNotaFis'];   
    $notaProg = $_POST['txtNotaProg'];

    if (cedulaRepetida($cedula)) {
        // Almacenar el mensaje en una variable de sesión
        $_SESSION['mensaje'] = "La cédula de identidad ya ha sido registrada con anterioridad, por favor intente con otra.";
    } else if (validarNota($notaMate) && validarNota($notaFis) && validarNota($notaProg)) {
        array_push($_SESSION['alumnos']['Numero de Cédula'], $cedula);
        array_push($_SESSION['alumnos']['Nombre'], $nombre);
        array_push($_SESSION['alumnos']['Nota de matemáticas'], $notaMate);
        array_push($_SESSION['alumnos']['Nota de física'], $notaFis);
        array_push($_SESSION['alumnos']['Nota de programación'], $notaProg);

        // Incrementar el número de registros
        if (!isset($_SESSION['numRegistros'])) {
            $_SESSION['numRegistros'] = 0;
        }
        $_SESSION['numRegistros']++;

        $_SESSION['mensaje'] = "El registro número ".$_SESSION['numRegistros']." se ha guardado de forma temporal en la sesión actual.";
    } else {
        $_SESSION['mensaje'] = "Por favor, introduzca notas válidas (01 al 20).";
    }

    // Redirige a la misma página para evitar duplicados al recargar
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}

// Mostrar el mensaje después de la redirección
if(isset($_SESSION['mensaje'])){
    echo "<br>".$_SESSION['mensaje'];
    unset($_SESSION['mensaje']);  // Eliminar el mensaje después de mostrarlo
}
?>
