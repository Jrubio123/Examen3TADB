<!DOCTYPE html>
<html>
<head>
    <title>Programas de Subsidios - Guardar Municipio</title>
</head>
<body>
    <h1>Programas de Subsidios - Guardar Municipio</h1>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre_municipio = $_POST['nombre_municipio'];
            $id_departamento = $_POST['id_departamento'];

            $db = new PDO('sqlite:' . __DIR__ . '/examen3.db');
            if (!$db) {
                echo '<p>Error al conectarse a la base de datos.</p>';
            } else {
                $query = "INSERT INTO municipios (nombre_municipio, id_departamento) VALUES ('$nombre_municipio', $id_departamento)";
                $result = $db->exec($query);
                if (!$result) {
                    echo '<p>Error al guardar el municipio.</p>';
                } else {
                    echo '<p>Municipio guardado correctamente.</p>';
                    echo '<a href="municipios.php">Ver municipios</a>';
                }
            }
        }
    ?>
    <br>
    <a href="index.php">Volver a la página principal</a>
</body>
</html>
