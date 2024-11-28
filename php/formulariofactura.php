<?php
session_start();
include_once 'db.php';

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html"); 
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Procesar el formulario enviado
    $id_cliente = (int) $_POST['id_cliente'];
    

    $db = new Database();
    $conn = $db->connect();

    $query = " ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param(" ", ;

    if ($stmt->execute()) {
        header("Location: facturacion.php");
        exit;
    } else {
        $error = "Error al registrar el automóvil: " . $conn->error;
    }

    $stmt->close();
    $conn->close();

} else {
    // Mostrar el formulario
    $id_cliente = isset($_GET['id_cliente']) ? (int)$_GET['id_cliente'] : 0;

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Automóvil</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body class="fondo-registroauto">
<header>
    <div class="header-content">
        <a href="../admin.php"><img src="../images/con_fondo-removebg-preview (1).png" alt="Logo Juan Mecanico" class="logo"></a>
        <div class="contact-info">Contactanos: 1234-5678  /  5678-1234</div>
        <div class="hours">Horario de atención: lunes a sábado de 8:00 am a 6:00 pm</div>
    </div>
</header>
<main>
    <?php if (!empty($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
<section class="form-content">
    <form action="registrar_auto.php" method="POST">
        <input type="hidden" name="id_cliente" value="<?php echo $id_cliente; ?>">
        
        <label for="modelo">Nombre del Mecánico:</label>
        <input type="text" id="modelo" name="modelo" required>
        
        <label for="matricula">Servicios:</label>
        <input type="text" id="matricula" name="matricula" required>
        
        <label for="marca">Costo:</label>
        <input type="text" id="marca" name="marca" required>
        
        <input type="submit" name="botonguardar" value="Registrar Automóvil">
    </form>
	<a href="ver_cliente.php?id=<?php echo $id_cliente; ?>" class="btn-resgitroauto">Cancelar</a>
</section>
</main>
</body>
</html>
