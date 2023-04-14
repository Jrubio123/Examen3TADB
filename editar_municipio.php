<!DOCTYPE html>
<html>
<head>
    <title>Programas de Subsidios - Editar Municipio</title>
</head>
<body>
    <h1>Programas de Subsidios - Editar Municipio</h1>
    <?php
        // Verificar que se recibió el id del municipio a editar
        if (!isset($_GET['id'])) {
            echo '<p>No se recibió el id del municipio a editar.</p>';
            exit;
        }

        $id_municipio = $_GET['id'];

        $db = new PDO('sqlite:' . __DIR__ . '/examen3.db');
        if (!$db) {
            echo '<p>Error al conectarse a la base de datos.</p>';
        } else {
            // Obtener los datos del municipio a editar
            $query = "SELECT * FROM municipios WHERE id_municipio = $id_municipio";
            $result = $db->query($query);
            if (!$result) {
                echo '<p>Error al realizar la consulta.</p>';
            } else {
                $row = $result->fetch();
                $nombre_municipio = $row['nombre_municipio'];
                $id_departamento = $row['id_departamento'];
            }

            // Procesar el formulario de edición cuando se envía
            if (isset($_POST['submit'])) {
                $nombre_municipio_nuevo = $_POST['nombre_municipio'];
                $id_departamento_nuevo = $_POST['id_departamento'];

                $query = "UPDATE municipios SET nombre_municipio = '$nombre_municipio_nuevo', id_departamento = $id_departamento_nuevo WHERE id_municipio = $id_municipio";
                $result = $db->query($query);

                if ($result) {
                    echo '<p>Municipio actualizado correctamente.</p>';
                    echo '<p><a href="municipios.php">Volver a la lista de municipios</a></p>';
                } else {
                    echo '<p>Error al actualizar el municipio.</p>';
                }
            } else {
                // Mostrar el formulario de edición
                ?>
                <form method="post">
                    <label for="nombre_municipio">Nombre:</label>
                    <input type="text" id="nombre_municipio" name="nombre_municipio" value="<?php echo $nombre_municipio; ?>"><br>
                    <label for="id_departamento">ID Departamento:</label>
                    <input type="number" id="id_departamento" name="id_departamento" value="<?php echo $id_departamento; ?>"><br>
                    <input type="submit" name="submit" value="Actualizar">
                </form>
                <?php
            }
        }
    ?>
</body>
</html>
