<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="consulta.css">
    <title>Consulta de Productos</title>
</head>
<body>
    <h1>Consulta de Productos</h1>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conexion = new mysqli('localhost', 'root', 'Delori4l', 'forrajera');

                if ($conexion->connect_error) {
                    die("Connection failed: " . $conexion->connect_error);
                }

                $consultar = "SELECT * FROM producto";
                $sql = mysqli_query($conexion, $consultar);

                while ($ver = mysqli_fetch_array($sql)) {
                    echo "<tr>";
                    echo "<td>" . $ver['id_producto'] . "</td>";
                    echo "<td>" . $ver['nombre'] . "</td>";
                    echo "<td>$" . $ver['precio'] . "</td>";
                    echo "<td>" . $ver['stock'] . "</td>";
                    echo "</tr>";
                }

                $conexion->close();
                ?>
            </tbody>
        </table>
    </div>
    <br>
    <a href="indexadmin.php">Volver al menú principal</a>
</body>
</html>
