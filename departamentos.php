<!DOCTYPE html>
<html>
<head>
    <title>Programas de Subsidios - Departamentos</title>
</head>
<body>
    <h1>Programas de Subsidios - Departamentos</h1>
    <?php
        $db = new PDO('sqlite:' . __DIR__ . '/examen3.db');
        if (!$db) {
            echo '<p>Error al conectarse a la base de datos.</p>';
        } else {
            echo '<p>Conexión exitosa a la base de datos.</p>';
            $query = "SELECT * FROM departamentos";
            $result = $db->query($query);
            if (!$result) {
                echo '<p>Error al realizar la consulta.</p>';
            } else {
                echo '<table>';
                echo '<tr><th>ID</th><th>Nombre</th><th>Acciones</th></tr>';
                foreach ($result as $row) {
                    echo '<tr>';
                    echo '<td>' . $row['id_departamento'] . '</td>';
                    echo '<td>' . $row['nombre'] . '</td>';
                    echo '<td><a href="editar_departamento.php?id=' . $row['id_departamento'] . '">Editar</a> | <a href="borrar_departamento.php?id=' . $row['id_departamento'] . '">Borrar</a></td>';
                    echo '</tr>';
                }
                echo '</table>';
            }
        }
    ?>
    <br>
    <a href="agregar_departamento.php">Agregar departamento</a>
    <br>
    <a href="index.php">Volver a la página principal</a>
</body>
</html>
