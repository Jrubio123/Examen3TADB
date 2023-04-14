<!DOCTYPE html>
<html>
<head>
    <title>Programas de Subsidios - Página de Inicio</title>
</head>
<body>
    <h1>Programas de Subsidios - Página de Inicio</h1>
   
    <ul>
        <li><a href="municipios.php">Municipios</a></li>
        <li><a href="departamentos.php">Departamentos</a></li>
        <li><a href="programas.php">Programas</a></li>
        <li><a href="beneficiarios.html">Beneficiarios</a></li>
        <li><a href="subsidios.php">Subsidios</a></li>
        <li><a href="busqueda.php">Búsqueda</a></li>
        <li><a href="estadisticas.php">Estadísticas</a></li>
    </ul>
</body>
 <?php
        $db = new PDO('sqlite:examen3.db');
        if ($db) {
            echo '<p>Conexión exitosa a la base de datos.</p>';
        } else {
            echo '<p>Error al conectarse a la base de datos.</p>';
        }
    ?>
</html>
