<!DOCTYPE html>
<html>
<head>
    <title>Programas de Subsidios - Agregar Departamento</title>
</head>
<body>
    <h1>Programas de Subsidios - Agregar Departamento</h1>
    <form method="POST" action="guardar_departamento.php">
        <label for="id_departamento">ID:</label>
        <input type="text" name="id_departamento" id="id_departamento"><br>
        <label for="nombre_departamento">Nombre:</label>
        <input type="text" name="nombre_departamento" id="nombre_departamento"><br>
        <input type="submit" value="Guardar">
    </form>
    <br>
    <a href="departamentos.php">Volver a ver los departamentos</a> | <a href="index.php">Volver a la página principal</a>
</body>
</html>
