<?php

// Script para gestionar notas de alumnos en una clase

// Definir un array de alumnos con sus notas
$alumnos = [
    ['nombre' => 'Juan Pérez', 'notas' => [8.5, 9.0, 7.5, 8.0]],
    ['nombre' => 'María García', 'notas' => [9.5, 8.5, 9.0, 9.5]],
    ['nombre' => 'Carlos López', 'notas' => [7.0, 8.0, 6.5, 7.5]],
    ['nombre' => 'Ana Rodríguez', 'notas' => [10.0, 9.5, 10.0, 9.0]],
    ['nombre' => 'Luis Martínez', 'notas' => [6.0, 7.0, 6.5, 7.0]]
];

// Función para calcular el promedio de notas
function calcularPromedio($notas) {
    $suma = array_sum($notas);
    $cantidad = count($notas);
    return $suma / $cantidad;
}

// Función para determinar si el alumno aprueba (promedio >= 7)
function aprueba($promedio) {
    return $promedio >= 7.0 ? 'Aprobado' : 'Reprobado';
}

// Mostrar resultados
echo "<h1>Notas de los Alumnos</h1>";
echo "<table border='1'>";
echo "<tr><th>Nombre</th><th>Notas</th><th>Promedio</th><th>Estado</th></tr>";

foreach ($alumnos as $alumno) {
    $promedio = calcularPromedio($alumno['notas']);
    $estado = aprueba($promedio);
    $notasStr = implode(', ', $alumno['notas']);
    
    echo "<tr>";
    echo "<td>{$alumno['nombre']}</td>";
    echo "<td>{$notasStr}</td>";
    echo "<td>" . number_format($promedio, 2) . "</td>";
    echo "<td>{$estado}</td>";
    echo "</tr>";
}

echo "</table>";

// Calcular promedio de la clase
$promediosClase = array_map(function($alumno) {
    return calcularPromedio($alumno['notas']);
}, $alumnos);
$promedioClase = calcularPromedio($promediosClase);

echo "<p><strong>Promedio de la clase:</strong> " . number_format($promedioClase, 2) . "</p>";

?>
