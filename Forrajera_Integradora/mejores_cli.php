<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="consulta.css">
    <title>Consulta de Clientes</title>
</head>
<body>
    <h1>Consulta de Clientes</h1>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conexion = new mysqli('localhost', 'root', 'Delori4l', 'forrajera');

                if ($conexion->connect_error) {
                    die("Connection failed: " . $conexion->connect_error);
                }

                $consultar = "
                    SELECT cliente.id_cliente, cliente.nombre, cliente.apellido_P, cliente.apellido_M, cliente.telefono, cliente.correo 
                    FROM cliente 
                    JOIN (
                        SELECT id_cliente, COUNT(*) as num_factura 
                        FROM factura 
                        GROUP BY id_cliente 
                        HAVING num_factura > 5
                    ) as facturas 
                    ON cliente.id_cliente = facturas.id_cliente";
                
                $sql = mysqli_query($conexion, $consultar);

                while ($ver = mysqli_fetch_array($sql)) {
                    echo "<tr>";
                    echo "<td>" . $ver['id_cliente'] . "</td>";
                    echo "<td>" . $ver['nombre'] . "</td>";
                    echo "<td>" . $ver['apellido_P'] . "</td>";
                    echo "<td>" . $ver['apellido_M'] . "</td>";
                    echo "<td>" . $ver['telefono'] . "</td>";
                    echo "<td>" . $ver['correo'] . "</td>";
                    echo "</tr>";
                }

                $conexion->close();
                ?>
            </tbody>
        </table>
    </div>
    <a href="indexadmin.php">Volver al menú principal</a>
</body>
</html>
