<?php
session_start();

function calcularPromedio($notas) {
    $suma = array_sum($notas);
    $cantidad = count($notas);
    return $suma / $cantidad;
}

function contarAprobados($notas) {
    return count(array_filter($notas, function($nota) {
        return $nota >= 10;  // Asumiendo que 10 es la nota mínima para aprobar
    }));
}

function contarAplazados($notas) {
    return count(array_filter($notas, function($nota) {
        return $nota < 10;  // Asumiendo que menos de 10 es aplazado
    }));
}

function notaMaximaEnCadaMateria($notas) {
    return max($notas);
}

if(isset($_POST['promedioCadaMat'])){

    if (!isset($_SESSION['alumnos']['Nota de matemáticas']) || empty($_SESSION['alumnos']['Nota de matemáticas'])) {
        echo "No hay datos para calcular el promedio de matemáticas.";
    } else {
        $promedioMate = calcularPromedio($_SESSION['alumnos']['Nota de matemáticas']);
        $promedioFis = calcularPromedio($_SESSION['alumnos']['Nota de física']);
        $promedioProg = calcularPromedio($_SESSION['alumnos']['Nota de programación']);
        echo "El promedio de matemáticas es: $promedioMate <br>";
        echo "El promedio de física es: $promedioFis <br>";
        echo "El promedio de programación es: $promedioProg <br>";
    }
}

if(isset($_POST['promedioCadaMat'])){
    if (!isset($_SESSION['alumnos']['Nota de matemáticas']) || empty($_SESSION['alumnos']['Nota de matemáticas'])) {
        echo "No hay datos para calcular el promedio de matemáticas.";
    } else {
        $promedioMate = calcularPromedio($_SESSION['alumnos']['Nota de matemáticas']);
        echo "El promedio de matemáticas es: $promedioMate";
    }
}

// Haz lo mismo para los demás botones


if(isset($_POST['aprobadosCadaMat'])){

    if (empty($_SESSION['alumnos']['Nota de matemáticas'])) {
        echo "No hay datos para contar los aprobados en matemáticas.";
    } else {
        $aprobadosMate = contarAprobados($_SESSION['alumnos']['Nota de matemáticas']);
        $aprobadosFis = contarAprobados($_SESSION['alumnos']['Nota de física']);
        $aprobadosProg = contarAprobados($_SESSION['alumnos']['Nota de programación']);
        echo "El número de aprobados en matemáticas es: $aprobadosMate <br>" ;
        echo "El número de aprobados en física es: $aprobadosFis <br>";
        echo "El número de aprobados en programación es: $aprobadosProg <br>";   
    }
}

if(isset($_POST['aplazadosCadaMat'])){

    if (empty($_SESSION['alumnos']['Nota de matemáticas'])) {
        echo "No hay datos para contar los aplazados en matemáticas.";
    } else {
        $aplazadosMate = contarAplazados($_SESSION['alumnos']['Nota de matemáticas']);
        $aplazadosFis = contarAplazados($_SESSION['alumnos']['Nota de física']);
        $aplazadosProg = contarAplazados($_SESSION['alumnos']['Nota de programación']);
        echo "El número de aplazados en matemáticas es: $aplazadosMate <br>";
        echo "El número de aplazados en física es: $aplazadosFis <br>";
        echo "El número de aplazados en programación es: $aplazadosProg <br>";
    }
}

if(isset($_POST['totalAprobadosTodasMat'])){
    if (empty($_SESSION['alumnos'])) {
        echo "No hay datos para calcular el número total de alumnos que aprobaron todas las materias.";
    } else {
        $totalAprobadosTodasMat = 0;
        for($i = 0; $i < count($_SESSION['alumnos']['Numero de Cédula']); $i++) {
            if ($_SESSION['alumnos']['Nota de matemáticas'][$i] >= 10 && $_SESSION['alumnos']['Nota de física'][$i] >= 10 && $_SESSION['alumnos']['Nota de programación'][$i] >= 10) {
                $totalAprobadosTodasMat++;
            }
        }
        echo "El número total de alumnos que aprobaron todas las materias es: $totalAprobadosTodasMat";
    }
}

if(isset($_POST['aprobadosUnaMate'])){
    if (empty($_SESSION['alumnos'])) {
        echo "No hay datos para calcular el número total de alumnos que aprobaron una sola materia.";
    } else {
        $aprobadosUnaMate = 0;
        for($i = 0; $i < count($_SESSION['alumnos']['Numero de Cédula']); $i++) {
            $numAprobadas = 0;
            if ($_SESSION['alumnos']['Nota de matemáticas'][$i] >= 10) {
                $numAprobadas++;
            }
            if ($_SESSION['alumnos']['Nota de física'][$i] >= 10) {
                $numAprobadas++;
            }
            if ($_SESSION['alumnos']['Nota de programación'][$i] >= 10) {
                $numAprobadas++;
            }
            if ($numAprobadas == 1) {
                $aprobadosUnaMate++;
            }
        }
        echo "El número total de alumnos que aprobaron una sola materia es: $aprobadosUnaMate";
    }
}


if(isset($_POST['aprobadosDosMate'])){
    if (empty($_SESSION['alumnos'])) {
        echo "No hay datos para calcular el número total de alumnos que aprobaron dos materias.";
    } else {
        $aprobadosDosMate = 0;
        for($i = 0; $i < count($_SESSION['alumnos']['Numero de Cédula']); $i++) {
            $numAprobadas = 0;
            if ($_SESSION['alumnos']['Nota de matemáticas'][$i] >= 10) {
                $numAprobadas++;
            }
            if ($_SESSION['alumnos']['Nota de física'][$i] >= 10) {
                $numAprobadas++;
            }
            if ($_SESSION['alumnos']['Nota de programación'][$i] >= 10) {
                $numAprobadas++;
            }
            if ($numAprobadas == 2) {
                $aprobadosDosMate++;
            }
        }
        echo "El número total de alumnos que aprobaron dos materias es: $aprobadosDosMate";
    }
}



if(isset($_POST['notaMaxCadaMate'])){
    if (empty($_SESSION['alumnos']['Nota de matemáticas']) || empty($_SESSION['alumnos']['Nota de física']) || empty($_SESSION['alumnos']['Nota de programación'])) {
        echo "No hay datos para calcular la nota máxima en cada materia.";
    } else {
        $notaMaxMate = notaMaximaEnCadaMateria($_SESSION['alumnos']['Nota de matemáticas']);
        echo "La nota máxima en matemáticas es: $notaMaxMate <br>";
        
        $notaMaxFis = notaMaximaEnCadaMateria($_SESSION['alumnos']['Nota de física']);
        echo "La nota máxima en física es: $notaMaxFis <br>";
        
        $notaMaxProg = notaMaximaEnCadaMateria($_SESSION['alumnos']['Nota de programación']);
        echo "La nota máxima en programación es: $notaMaxProg <br>";
    }
}

?>