<?php 
$host = 'localhost';
$dbname = 'web_trabajo';
$user = 'root';
$password = 'root';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}

// Procesar formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $problemas = isset($_POST['problemas']) ? implode(', ', $_POST['problemas']) : '';
    $descripcion = $_POST['descripcion'] ?? '';

    try {
        $stmt = $pdo->prepare("INSERT INTO servicio_tecnico (cliente_nombre, cliente_email, cliente_telefono, problemas, descripcion) VALUES (:nombre, :email, :telefono, :problemas, :descripcion)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':problemas', $problemas);
        $stmt->bindParam(':descripcion', $descripcion);

        $stmt->execute();
        $mensaje = "¡Solicitud enviada con éxito!";
    } catch (PDOException $e) {
        $mensaje = "Error al enviar la solicitud: " . $e->getMessage();
        $notificacion = false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicio Técnico | Pablo Nicolas Garcia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">Pablo Garcia</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="./">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="../../acerca-de">Sobre Mi</a></li>
                <li class="nav-item"><a class="nav-link" href="../../services">Servicios</a></li>
                <li class="nav-item"><a class="nav-link" href="../../portfolio">Portafolio</a></li>
                <li class="nav-item"><a class="nav-link" href="../../contact">Contacto</a></li>
            </ul>
        </div>
    </div>
</nav>


<div class="container mt-5">
    <h1 class="text-center mb-4">Servicio Técnico</h1>
    <p>Ofrecemos servicios técnicos confiables para equipos de escritorio, portátiles, incluyendo:</p>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Reparación de hardware y software.</li>
        <li class="list-group-item">Optimización de rendimiento.</li>
        <li class="list-group-item">Instalación y configuración de sistemas operativos.</li>
        <li class="list-group-item">Soporte técnico remoto y presencial.</li>
    </ul>
    <div class="text-center mt-4">
        
    </div>
</div>

<form action="index.php" method="POST" class="border p-4 bg-white shadow-sm rounded">
<div class="container mt-5">
    <h1 class="text-center mb-4">Servicio Técnico</h1>
    <?php if (isset($mensaje)): ?>
        <div class="alert alert-info text-center"><?php echo $mensaje; ?></div>
    <?php endif; ?>
    <form action="index.php" method="POST" class="border p-4 bg-white shadow-sm rounded">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Cliente</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre completo" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su correo electrónico" required>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Ingrese su número de teléfono" required>
        </div>
        <div class="mb-3">
            <label for="problemas" class="form-label">Seleccione los problemas de su equipo:</label>
            <!-- Checkboxes -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="lento" name="problemas[]" value="Equipo lento">
                <label class="form-check-label" for="lento">Equipo lento</label>
            </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="virus" name="problemas[]" value="Infección por virus">
                    <label class="form-check-label" for="virus">Infección por virus</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="pantalla_azul" name="problemas[]" value="Pantalla azul (BSOD)">
                    <label class="form-check-label" for="pantalla_azul">Pantalla azul (BSOD)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="no_inicia" name="problemas[]" value="El equipo no inicia">
                    <label class="form-check-label" for="no_inicia">El equipo no inicia</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="disco_llenado" name="problemas[]" value="Disco lleno sin motivo aparente">
                    <label class="form-check-label" for="disco_llenado">Disco lleno sin motivo aparente</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="hardware" name="problemas[]" value="Problemas de hardware">
                    <label class="form-check-label" for="hardware">Problemas de hardware</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="internet" name="problemas[]" value="Problemas con la conexión a Internet">
                    <label class="form-check-label" for="internet">Problemas con la conexión a Internet</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="software" name="problemas[]" value="Problemas de software">
                    <label class="form-check-label" for="software">Problemas de software</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="otros" name="problemas[]" value="Otros problemas">
                    <label class="form-check-label" for="otros">Otros problemas</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción adicional</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="4" placeholder="Proporcione detalles adicionales sobre los problemas de su equipo"></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Solicitar Servicio</button>
        </form>
    </div>

<footer class="bg-primary text-white text-center py-3 mt-5">
    <p class="mb-0">© 2024 Pablo Nicolás García. Todos los derechos reservados.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    // Verificar si el navegador soporta las notificaciones
    if ("Notification" in window) {
        // Función para pedir permiso para mostrar notificaciones
        function pedirPermiso() {
            Notification.requestPermission().then(function(permission) {
                if (permission === "granted") {
                    console.log("Permiso concedido para las notificaciones");
                }
            });
        }

        // Si ya se ha dado el permiso
        if (Notification.permission === "granted" && <?php echo isset($notificacion) && $notificacion ? 'true' : 'false'; ?>) {
            new Notification("¡Nuevo servicio técnico solicitado!", {
                body: "Un nuevo servicio técnico ha sido creado.",
                icon: "https://via.placeholder.com/50",  // Aquí puedes poner un ícono si lo deseas
            });
        } else if (Notification.permission !== "denied") {
            pedirPermiso();
        }
    }
</script>
</body>
</html>
