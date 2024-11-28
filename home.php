<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}

// Actualizar la cookie de última sesión
setcookie('ultima_sesion', date('d-m-Y H:i:s'), time() + (86400 * 30), "/"); // Expira en 30 días
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juan Mecanico</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body id="home">
<header>
    <div class="header-content">
        <a href="home.php"><img src="images/con_fondo-removebg-preview (1).png" alt="Logo Juan Mecanico" class="logo"></a>
        <div class="contact-info">Contactanos: 1234-5678 / 5678-1234</div>
        <div class="hours">Horario de atención: lunes a sábado de 8:00 am a 6:00 pm</div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">&#9776; Opciones</button>
        <div class="dropdown-content">
            <a href="home.php">Inicio</a>
            <a href="registrocitas.html">Registro de Citas</a>
            <a href="soporte.html">Soporte</a>
            <a href="logout.php">Cerrar sesión</a>
        </div>
    </div>
</header>

<main>
<section class="Enlaces-paginas">
            <div class="hero-image" style="background-image: url('images/agendarcita.jpg');">
                <div class="hero-content">
                    <h2>Agendar Cita</h2>
                    <p>Aquí podrá agendar nuevas citas con nuestros especialistas de manera rápida y sencilla. <br> Programe su cita en línea y obtenga confirmación inmediata.</p>
                    <div class="button-container">
                        <a href="registrocitas.html" class="hero-button">Agendar</a>
                    </div>
                </div>
               
            </div>
    
            <div class="hero-image" style="background-image: url('images/soporteimagen.jpg');">
                <div class="hero-content">
                    <h2>Soporte</h2>
                    <p>Acceda a nuestro centro de soporte para resolver cualquier duda o inconveniente. <br> Nuestro equipo de asistencia está disponible para ayudarle en todo momento.</p>
                    <div class="button-container">
                        <a href="soporte.html" class="hero-button">Obtener Soporte</a>
                    </div>
       
            </div>
        </section>

        <a href="php/facturacliente.php">Mis Facturas</a>
</main>

<section class="carousel">
        <div class="carousel-content">
            <div class="carousel-item">
                <h2>Plantean que se haga una reglamentación <br> sobre cantidad de trabajadores de acuerdo al tamaño de los talleres</h2>
                <img src="images/noticiacantidadtrabajadores.webp" alt="Imagen 1">
                <p>El empresario y dueño de talleres de reparación de autos, Felipe Rodríguez, manifestó este viernes que, como parte de la reapertura del sector, su empresa ha enfrentado varios retos. Rodríguez detalló que las nuevas medidas implementadas por las autoridades sanitarias, como la limitación de un máximo de diez trabajadores por empresa, han presentado desafíos significativos. Estas restricciones están generando complicaciones operativas y logísticas para mantener la eficiencia en el servicio, y podrían impactar en la sostenibilidad a largo plazo de los talleres.</p>
            </div>
        
            <div class="carousel-item">
                <h2>Pocos talleres de mecánica se reactivan en Chiriquí</h2>
                <div class="video-container">
                    <iframe width="500" height="255" src="https://www.youtube.com/embed/AX-H7PJ5Auw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <p>
                    Su nombre es Ariel Álvarez, su pasión son los autos. Desde los 8 años comenta que se encuentra envuelto en los vehículos junto con su hermano. <br>
                    Se graduaron de bachilleres automotrices en la parte mecánica y una parte de automotriz o electromecánica. La razón por la cual forma parte de Jóvenes Brillantes es que quiere aprovechar el momento <br>
                    y mostrarle a Panamá y al mundo el proyecto en el que forma parte: la transformación de un vehículo de combustión a eléctrico, aprovechando el alto costo del combustible que se presenta hoy en día en nuestro país y aprovechando que recientemente se aprobó una ley sobre movilidad eléctrica.
                </p>
            </div>
            
            <div class="carousel-item">
                <h2>El secreto del éxito del fabricante de autos eléctricos chino que ya vende más que Tesla</h2>
                <img width="900" height="600" src="images/teslanoticia.jpg" alt="Imagen 3">
                <p>La empresa china BYD vendió más vehículos eléctricos que Tesla en los últimos tres meses de 2023, mientras las dos compañías luchan por el primer puesto en el sector.
                    BYD dijo este lunes que había vendido un récord de 526.000 vehículos en el último trimestre de 2023, el primero en el que las ventas de la empresa china superaron a las de Tesla.
                    Sin embargo, durante todo 2023, Tesla vendió más vehículos que BYD. El martes, Tesla dijo que había entregado 484.500 vehículos eléctricos en los últimos tres meses de 2023 y 1,8 millones para todo el año.</p>
            </div>
        </div>
        <button class="carousel-button left" onclick="moveCarousel(-1)">&#9664;</button>
        <button class="carousel-button right" onclick="moveCarousel(1)">&#9654;</button>
    </section>

    <section class="news-section">
        <h2>Servicios</h2>
        <article class="news-article">
            <img src="images/Diagnostico.png" alt="Noticia 1">
            <div>
                <h3>Diagnostico</h3>
                <p>En Juan Mecánico contamos con un equipo de tecnología de punta donde tenemos la posibilidad de diagnosticar tu carro:</p>
                <ul>
                    <li>Diagnóstico de motor</li>
                    <li>Diagnóstico eléctrico</li>
                    <li>Diagnóstico de Sistemas de frenos</li>
                    <li>Diagnóstico de transmisión</li>
                    <li>Diagnostico de Suspensión y Dirección</li>
                </ul>
            </div>
        </article>
        <article class="news-article">
            <img src="images/Mantenimiento y reparaciones.png" alt="Noticia 2">
            <div>
                <h3>Mantenimiento y Reparaciones</h3>
                <p>En Juan Mecánico ofrecemos una amplia variedad de servicios preventivos, mantenimientos y reparaciones correctivas que su auto requiera:</p>
                <ul>
                    <li>Mantenimiento de motor</li>
                    <li>Mantenimiento de transmision</li>
                    <li>Frenos</li>
                    <li>Suspension</li>
                    <li>Diagnostico Computarizado</li>
                </ul>
            </div>
        </article>
        <article class="news-article">
            <img src="images/Pintura.png" alt="Noticia 2">
            <div>
                <h3>Chapisteria y Pintura</h3>
                <p>Los mejores profesionales de al pintura y chapisteria automotriz a su disposicion</p>
                <ul>
                    <li>Reparacion de chapisteria </li>
                    <li>Reparacion de pintura</li>
                    <li>Cambio de color</li>
                    <li>Pintura y/o reparacion de rines</li>
                </ul>
            </div>
        </article>  
    </section>
</main>

<footer>
    <nav class="main-nav">
        <ul>
            <li><a href="home.php">Inicio</a></li>
            <li><a href="registrocitas.html">Registrar Cita</a></li>
            <li><a href="soporte.html">Soporte</a></li>
            <li><a href="logout.php">Cerrar sesión</a></li>
        </ul>
    </nav>
    <p>Todos los derechos reservados © Universidad Tecnologica de Panama 2024</p>
    <?php if (isset($_COOKIE['ultima_sesion'])): ?>
        <p>Última sesión: <?php echo htmlspecialchars($_COOKIE['ultima_sesion']); ?></p>
    <?php else: ?>
        <p>Bienvenido, esta es tu primera sesión.</p>
    <?php endif; ?>
</footer>
</body>
</html>