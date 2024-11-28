<?php
session_start();
include_once 'db.php';

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../login.html");
    exit();
}

$db = new Database();
$conn = $db->connect();

$id_cliente = $_SESSION['usuario_id']; // Obtener el ID del cliente de la sesión

// Obtener las facturas del cliente
$query_facturas = "SELECT * FROM FACTURA WHERE ID_CLIENTE = ?";
$stmt_facturas = $conn->prepare($query_facturas);
$stmt_facturas->bind_param('i', $id_cliente);
$stmt_facturas->execute();
$result_facturas = $stmt_facturas->get_result();

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturas del Cliente</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<header>
    <div class="header-content">
        <a href="../admin.php"><img src="../images/con_fondo-removebg-preview (1).png" alt="Logo Juan Mecanico" class="logo"></a>
        <div class="contact-info">Contáctanos: 1234-5678 / 5678-1234</div>
        <div class="hours">Horario de atención: lunes a sábado de 8:00 am a 6:00 pm</div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">&#9776; Opciones</button>
        <div class="dropdown-content">
            <a href="../admin.php">Inicio</a>
            <a href="ver_calendario.php">Consultar Calendario de Citas</a>
            <a href="detalle_cliente.php">Lista de Clientes</a>
            <a href="ver_mecanicos.php">Lista de Mecánicos</a>
            <a href="../registromecanico.html">Registro de Mecánico</a>
            <a href="logout.php">Cerrar Sesión</a>
        </div>
    </div>
</header>
<main>
    <h1>Facturas del Cliente</h1>
    <?php if ($result_facturas->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID Factura</th>
                    <th>Fecha</th>
                    <th>Monto Total</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($factura = $result_facturas->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($factura['ID_FACTURA']); ?></td>
                        <td><?php echo htmlspecialchars($factura['FECHA_EMISION']); ?></td>
                        <td><?php echo htmlspecialchars($factura['TOTAL']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No se encontraron facturas para este cliente.</p>
    <?php endif; ?>
    <a href="detalle_cliente.php" class="btn">Volver</a>
</main>
<footer>
    <p>Todos los derechos reservados © Universidad Tecnológica de Panamá 2024</p>
</footer>
</body>
</html>
