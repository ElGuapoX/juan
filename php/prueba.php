<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "juan_mecanico";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener los datos de los clientes
$sql = "SELECT ID_CLIENTE, NOMBRE, APELLIDO, EMAIL, TELEFONO, FECHA_CREACION FROM CLIENTE";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Clientes</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="table-container">
        <h1>Lista de Clientes</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Fecha de Creación</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['ID_CLIENTE'] . "</td>";
                        echo "<td>" . $row['NOMBRE'] . "</td>";
                        echo "<td>" . $row['APELLIDO'] . "</td>";
                        echo "<td>" . $row['EMAIL'] . "</td>";
                        echo "<td>" . $row['TELEFONO'] . "</td>";
                        echo "<td>" . $row['FECHA_CREACION'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No se encontraron clientes</td></tr>";
                }
                ?>


<?php
// Cerrar conexión
$conn->close();
?>
