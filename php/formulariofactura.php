<?php
session_start();
include_once 'db.php'; 

$db = new Database();
$conn = $db->connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_cliente = (int)$_POST['id_cliente'];
    $fecha_emision = $_POST['fecha_emision'];
    $importe = (float)$_POST['importe'];
    $impuesto = (float)$_POST['impuesto'];
    $total = $importe + $impuesto;
    $comentario = trim($_POST['comentario']);

    // Insertar en la tabla FACTURA
    $query_factura = "INSERT INTO FACTURA (ID_CLIENTE, FECHA_EMISION, IMPORTE, IMPUESTO, TOTAL) VALUES (?, ?, ?, ?, ?)";
    $stmt_factura = $conn->prepare($query_factura);
    $stmt_factura->bind_param("isddd", $id_cliente, $fecha_emision, $importe, $impuesto, $total);

    if ($stmt_factura->execute()) {
        $id_factura = $stmt_factura->insert_id; // Obtener el ID de la factura recién creada

        // Insertar comentario si existe
        if (!empty($comentario)) {
            $query_comentario = "INSERT INTO COMENTARIO_FACTURA (ID_FACTURA, COMENTARIO) VALUES (?, ?)";
            $stmt_comentario = $conn->prepare($query_comentario);
            $stmt_comentario->bind_param("is", $id_factura, $comentario);

            if (!$stmt_comentario->execute()) {
                $error = "Error al registrar el comentario: " . $conn->error;
            }

            $stmt_comentario->close();
        }

        header("Location: facturacion.php?success=true");
        exit;
    } else {
        $error = "Error al registrar la factura: " . $conn->error;
    }

    $stmt_factura->close();
    $conn->close();
} else {
    $id_cliente = isset($_GET['id_cliente']) ? (int)$_GET['id_cliente'] : 0;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Factura</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body class="fondo-registroauto">
<header>
    <div class="header-content">
        <a href="../admin.php"><img src="../images/con_fondo-removebg-preview (1).png" alt="Logo Juan Mecanico" class="logo"></a>
        <div class="contact-info">Contactanos: 1234-5678 / 5678-1234</div>
        <div class="hours">Horario de atención: lunes a sábado de 8:00 am a 6:00 pm</div>
    </div>
</header>
<main>
    <?php if (!empty($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    <section class="form-content">
        <form action="formulariofactura.php" method="POST">
            <input type="hidden" name="id_cliente" value="<?php echo $id_cliente; ?>">

            <label for="fecha_emision">Fecha de Emisión:</label>
            <input type="date" id="fecha_emision" name="fecha_emision" required>

            <label for="importe">Importe:</label>
            <input type="number" step="0.01" id="importe" name="importe" required>

            <label for="impuesto">Impuesto:</label>
            <input type="number" step="0.01" id="impuesto" name="impuesto" required>

            <label for="comentario">Comentario:</label>
            <textarea id="comentario" name="comentario" rows="4" placeholder="Agrega un comentario opcional..."></textarea>

            <input type="submit" name="botonguardar" value="Registrar Factura">
        </form>
        <a href="ver_cliente.php?id=<?php echo $id_cliente; ?>" class="btn-registroauto">Cancelar</a>
    </section>
</main>
</body>
</html>
