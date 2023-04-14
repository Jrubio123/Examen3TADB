<!DOCTYPE html>
<html>
<head>
    <title>Programas de Subsidios - Editar Departamento</title>
</head>
<body>
    <h1>Programas de Subsidios - Editar Departamento</h1>
    <?php
        $db = new PDO('sqlite:examen3.db');
        if (!$db) {
            echo '<p>Error al conectarse a la base de datos.</p>';
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                if (!isset($_GET['id'])) {
                    echo '<p>No se ha especificado el ID del departamento a editar.</p>';
                } else {
                    $id_departamento = $_GET['id'];
                    $query = "SELECT * FROM departamentos WHERE id_departamento = $id_departamento";
                    $result = $db->query($query);
                    if (!$result) {
                        echo '<p>Error al realizar la consulta.</p>';
                    } else {
                        $departamento = $result->fetch();
                        if (!$departamento) {
                            echo '<p>No se ha encontrado el departamento especificado.</p>';
                        } else {
                            ?>
                            <form method="post" action="guardar_departamento.php">
                                <label for="id">ID:</label>
                                <input type="text" id="id" name="id" value="<?php echo $departamento['id_departamento']; ?>" readonly><br><br>
                                <label for="nombre">Nombre:</label>
                                <input type="text" id="nombre" name="nombre" value="<?php echo $departamento['nombre_departamento']; ?>"><br><br>
                                <input type="submit" value="Guardar">
                            </form>
                            <br>
                            <a href="departamentos.php">Volver a la lista de departamentos</a>
                            <?php
                        }
                    }
                }
            }
        }
    ?>
</body>
</html>
