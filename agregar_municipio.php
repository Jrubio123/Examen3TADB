<!DOCTYPE html>
<html>
<head>
    <title>Programas de Subsidios - Agregar Municipio</title>
</head>
<body>
    <h1>Programas de Subsidios - Agregar Municipio</h1>
    <?php
        $db = new PDO('sqlite:' . __DIR__ . '/examen3.db');
        if (!$db) {
            echo '<p>Error al conectarse a la base de datos.</p>';
        } else {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id_municipio = $_POST['id_municipio'];
                $nombre_municipio = $_POST['nombre_municipio'];
                $id_departamento = $_POST['id_departamento'];
                $stmt = $db->prepare("SELECT COUNT(*) FROM municipios WHERE id_municipio = :id_municipio");
                $stmt->bindParam(':id_municipio', $id_municipio, PDO::PARAM_INT);
                $stmt->execute();
                if ($stmt->fetchColumn() > 0) {
                    echo '<p>Error: El ID de municipio ingresado ya existe.</p>';
                } else {
                    $stmt = $db->prepare("INSERT INTO municipios (id_municipio, nombre_municipio, id_departamento) VALUES (:id_municipio, :nombre_municipio, :id_departamento)");
                    $stmt->bindParam(':id_municipio', $id_municipio, PDO::PARAM_INT);
                    $stmt->bindParam(':nombre_municipio', $nombre_municipio, PDO::PARAM_STR);
                    $stmt->bindParam(':id_departamento', $id_departamento, PDO::PARAM_INT);
                    if ($stmt->execute()) {
                        echo '<p>Municipio agregado exitosamente.</p>';
                    } else {
                        echo '<p>Error al agregar el municipio.</p>';
                    }
                }
            }
        }
    ?>
    <form method="post" action="guardar_municipio.php">
        <label for="id_municipio">ID Municipio:</label>
        <input type="number" id="id_municipio" name="id_municipio" required>
        <br>
        <label for="nombre_municipio">Nombre Municipio:</label>
        <input type="text" id="nombre_municipio" name="nombre_municipio" required>
        <br>
        <label for="id_departamento">ID Departamento:</label>
        <input type="number" id="id_departamento" name="id_departamento" required>
        <br>
        <input type="submit" value="Guardar">
    </form>
    <br>
    <a href="municipios.php">Ver Municipios</a>
</body>
</html>
