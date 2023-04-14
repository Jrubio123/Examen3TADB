<!DOCTYPE html>
<html>
<head>
    <title>Programas de Subsidios - Municipios</title>
</head>
<body>
    <?php
        $db = new PDO('sqlite:' . __DIR__ . '/examen3.db');
        if (!$db) {
            echo '<p>Error al conectarse a la base de datos.</p>';
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $id = $_POST['id'];
                $query = "DELETE FROM municipios WHERE id_municipio = $id";
                $result = $db->query($query);
                if (!$result) {
                    echo '<p>Error al borrar el municipio.</p>';
                } else {
                    echo '<p>Municipio borrado exitosamente.</p>';
                }
                echo '<a href="municipios.php">Volver a la lista de municipios</a>';
            } else {
                $id = $_GET['id'];
                $query = "SELECT * FROM municipios WHERE id_municipio = $id";
                $result = $db->query($query);
                if (!$result) {
                    echo '<p>Error al realizar la consulta.</p>';
                } else {
                    $row = $result->fetch(PDO::FETCH_ASSOC);
                    echo '<h1>Borrar Municipio</h1>';
                    echo '<p>¿Está seguro de que desea borrar el municipio ' . $row['nombre_municipio'] . '?</p>';
                    echo '<form method="post" action="borrar_municipio.php">';
                    echo '<input type="hidden" name="id" value="' . $id . '">';
                    echo '<input type="submit" value="Borrar">';
                    echo '</form>';
                    echo '<br>';
                    echo '<a href="municipios.php">Cancelar y volver a la lista de municipios</a>';
                }
            }
        }
    ?>
</body>
</html>
