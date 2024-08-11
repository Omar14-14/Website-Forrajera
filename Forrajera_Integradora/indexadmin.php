<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexp.css">
    <title>Registro de Productos</title>
</head>
<body>
    <form action="" method="POST">
        <h1>Registro de Productos</h1>
        <div>
            <label>ID:</label>
            <input type="text" name="id_producto">
        </div>
        <div>
            <label>Nombre del Producto:</label>
            <input type="text" name="nombre">
        </div>
        <div>
            <label>Precio:</label>
            <input type="text" name="precio">
        </div>
        <div>
            <label>Stock:</label>
            <input type="text" name="stock">
        </div>
        <input type="submit" name="insertar" value="INSERTAR">
        <input type="submit" name="actualizar" value="ACTUALIZAR">
        <input type="submit" name="eliminar" value="ELIMINAR">
        <input type="submit" name="consultar" value="CONSULTAR" formaction="consulta.php" formmethod="GET">
        <input type="submit" name="mejores" value="MEJORES CLIENTES" formaction="mejores_cli.php" formmethod="GET">
        <input type="submit" name="inicio" value="Volver a página de inicio" formaction="index.html" formmethod="GET">
    </form>
    <br>
    <?php
    include 'conexion.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_producto = isset($_POST['id_producto']) ? $_POST['id_producto'] : '';
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        $precio = isset($_POST['precio']) ? $_POST['precio'] : '';
        $stock = isset($_POST['stock']) ? $_POST['stock'] : '';

        $mensaje = '';

        if (isset($_POST['insertar'])) {
            $insertar = "INSERT INTO producto (nombre, precio, stock) VALUES ('$nombre', '$precio', '$stock')";
            if (mysqli_query($mysqli, $insertar)) {
                $mensaje = "Producto insertado con éxito.";
            } else {
                $mensaje = "Error al insertar el producto: " . mysqli_error($mysqli);
            }
        }

        if (isset($_POST['actualizar'])) {
            $actualizar = "UPDATE producto SET nombre='$nombre', precio='$precio', stock='$stock' WHERE id_producto='$id_producto'";
            if (mysqli_query($mysqli, $actualizar)) {
                $mensaje = "Producto actualizado con éxito.";
            } else {
                $mensaje = "Error al actualizar el producto: " . mysqli_error($mysqli);
            }
        }

        if (isset($_POST['eliminar'])) {
            $eliminar = "DELETE FROM producto WHERE id_producto='$id_producto'";
            if (mysqli_query($mysqli, $eliminar)) {
                $mensaje = "Producto eliminado con éxito.";
            } else {
                $mensaje = "Error al eliminar el producto: " . mysqli_error($mysqli);
            }
        }

        $mysqli->close();

        if ($mensaje) {
            echo "<script type='text/javascript'>alert('$mensaje');</script>";
        }

        // Redirigir a la misma página para evitar el reenvío del formulario
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
    ?>
</body>
</html>
