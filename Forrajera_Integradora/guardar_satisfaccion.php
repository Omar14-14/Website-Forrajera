<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Obtener los datos del formulario
$satisfaccion = $_POST['satisfaccion'];
$comentario = $_POST['comentario'];

// Preparar la consulta SQL
$sql = "INSERT INTO satisfaccion (satisfaccion, comentario) VALUES (?, ?)";

// Preparar la sentencia
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("is", $satisfaccion, $comentario);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Registro guardado exitosamente.";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$mysqli->close();
?>
