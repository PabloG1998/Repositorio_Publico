<?php
session_start(); // Inicia la sesión para almacenar el mensaje.

$host = 'localhost';
$dbname = 'web_trabajo';
$user = 'root';
$password = 'root';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recibir los datos del formulario
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $empresa = $_POST['empresa'];
        $servicios = isset($_POST['servicios']) ? implode(', ', $_POST['servicios']) : '';
        $colores = $_POST['colores'];
        $funcionalidades = $_POST['funcionalidades'];
        $presupuesto = $_POST['presupuesto'];
        $descripcion = $_POST['descripcion'];

        // Insertar los datos en la base de datos
        $sql = "INSERT INTO formulario_diseno (nombre, email, telefono, empresa, servicios, colores, funcionalidades, presupuesto, descripcion)
                VALUES (:nombre, :email, :telefono, :empresa, :servicios, :colores, :funcionalidades, :presupuesto, :descripcion)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':empresa', $empresa);
        $stmt->bindParam(':servicios', $servicios);
        $stmt->bindParam(':colores', $colores);
        $stmt->bindParam(':funcionalidades', $funcionalidades);
        $stmt->bindParam(':presupuesto', $presupuesto);
        $stmt->bindParam(':descripcion', $descripcion);

        if ($stmt->execute()) {
            // Almacenar el mensaje en la sesión antes de redirigir
            $_SESSION['mensaje'] = "Formulario enviado correctamente.";
            // Redirigir a la misma página para evitar el reenvío del formulario
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit();
        } else {
            $_SESSION['mensaje'] = "Hubo un problema al enviar el formulario.";
        }
    }
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diseño Web | Pablo Nicolas Garcia</title>
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
                <li class="nav-item"><a class="nav-link" href="../../">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="../../acerca-de">Sobre Mi</a></li>
                <li class="nav-item"><a class="nav-link" href="./../services">Servicios</a></li>
                <li class="nav-item"><a class="nav-link" href="./../portfolio">Portafolio</a></li>
                <li class="nav-item"><a class="nav-link" href="./../contact">Contacto</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h1 class="text-center mb-4">Diseño Web</h1>

    <div class="mb-3">
        <p>Desarrollamos sitios web modernos y optimizados para todo tipo de dispositivos, incluyendo:</p>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Páginas corporativas y personales.</li>
            <li class="list-group-item">Tiendas en línea (e-commerce).</li>
            <li class="list-group-item">Blogs y portafolios.</li>
            <li class="list-group-item">Sistemas personalizados.</li>
        </ul>
    </div>

    <?php if (isset($_SESSION['mensaje'])): ?>
        <div class="alert alert-info text-center"><?php echo $_SESSION['mensaje']; ?></div>
        <?php unset($_SESSION['mensaje']); // Eliminar el mensaje después de mostrarlo ?>
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
            <label for="empresa" class="form-label">Nombre de la Empresa o Proyecto</label>
            <input type="text" class="form-control" id="empresa" name="empresa" placeholder="Ingrese el nombre de su empresa o proyecto">
        </div>
        <div class="mb-3">
            <label for="servicios" class="form-label">Seleccione los servicios que necesita:</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="pagina_estatica" name="servicios[]" value="Página estática">
                <label class="form-check-label" for="pagina_estatica">Página estática</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="pagina_dinamica" name="servicios[]" value="Página dinámica">
                <label class="form-check-label" for="pagina_dinamica">Página dinámica</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="tienda_online" name="servicios[]" value="Tienda online">
                <label class="form-check-label" for="tienda_online">Tienda online</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="blog_personal" name="servicios[]" value="Blog personal">
                <label class="form-check-label" for="blog_personal">Blog personal</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="optimizacion" name="servicios[]" value="Optimización para motores de búsqueda (SEO)">
                <label class="form-check-label" for="optimizacion">Optimización para motores de búsqueda (SEO)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="redes_sociales" name="servicios[]" value="Redes Sociales">
                <label class="form-check-label" for="redes_sociales">Redes Sociales</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="colores" class="form-label">Colores preferidos</label>
            <input type="text" class="form-control" id="colores" name="colores" placeholder="Ingrese sus colores preferidos">
        </div>
        <div class="mb-3">
            <label for="funcionalidades" class="form-label">Funcionalidades deseadas</label>
            <textarea class="form-control" id="funcionalidades" name="funcionalidades" rows="3" placeholder="Describa las funcionalidades que desea en su sitio web"></textarea>
        </div>
        <div class="mb-3">
            <label for="presupuesto" class="form-label">Presupuesto estimado</label>
            <input type="text" class="form-control" id="presupuesto" name="presupuesto" placeholder="Ingrese su presupuesto aproximado">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción adicional</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Describa sus necesidades o preguntas adicionales"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-5o/0bbrgHp9ALrRlrtoYjo6YP8qMfrpR07FkM6wY3jH9Jhgsd5Lz5TVU74oU6x4c" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-c3PvM4u2FJS4WmDp7FkpGg5xqx4NCHoec7pRbI5ZGklPXMIIp4SKy0tZEm5m2iW5" crossorigin="anonymous"></script>
</body>
</html>
