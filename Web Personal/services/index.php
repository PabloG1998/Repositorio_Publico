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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios | Pablo Nicolas Garcia</title>
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
                <li class="nav-item"><a class="nav-link" href="../index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="../acerca-de">Sobre Mi</a></li>
                <li class="nav-item"><a class="nav-link active" href="../services">Servicios</a></li>
                <li class="nav-item"><a class="nav-link" href="../portfolio">Portafolio</a></li>
                <li class="nav-item"><a class="nav-link" href="../contact">Contacto</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h1 class="text-center mb-4">Nuestros Servicios</h1>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <img src="../media/tecnico.webp" class="card-img-top" alt="Servicio Técnico">
                <div class="card-body">
                    <h5 class="card-title">Servicio Técnico</h5>
                    <p class="card-text">Brindamos soporte técnico completo para resolver problemas de hardware y software, asegurando el funcionamiento óptimo de tus dispositivos.</p>
                    <a href="./technical-service" class="btn btn-primary">Más Información</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <img src="../media/dev.webp" class="card-img-top" alt="Diseño Web">
                <div class="card-body">
                    <h5 class="card-title">Diseño Web</h5>
                    <p class="card-text">Creamos sitios web modernos, responsivos y adaptados a tus necesidades, con el mejor diseño y funcionalidades.</p>
                    <a href="./web-design" class="btn btn-primary">Más Información</a>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="bg-primary text-white text-center py-3 mt-5">
    <p class="mb-0">© 2024 Pablo Nicolás García. Todos los derechos reservados.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
