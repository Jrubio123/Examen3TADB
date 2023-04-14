<!DOCTYPE html>
<html>
<head>
    <title>Borrar Departamento</title>
</head>
<body>
    <?php
        $db = new PDO('sqlite:examen3.db');
        if (!$db) {
            echo '<p>Error al conectarse a la base de datos.</p>';
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (!isset($_POST['id'])) {
                    echo '<p>No se ha especificado el ID del departamento a borrar.</p>';
                } else {
                    $id_departamento = $_POST['id'];
                    $query = "DELETE FROM departamentos WHERE id_departamento = $id_departamento";
                    $result = $db->exec($query);
                    if (!$result) {
                        echo '<p>Error al realizar la eliminación.</p>';
                    } else {
                        echo '<p>El departamento ha sido eliminado correctamente.</p>';
                    }
                }
            }
        }
    ?>
    <br>
    <a href="departamentos.php">Volver a la lista de departamentos</a>
</body>
</html>
