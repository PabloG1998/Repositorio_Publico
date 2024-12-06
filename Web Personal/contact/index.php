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
                <li class="nav-item"><a class="nav-link" href="../../">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="../../acerca-de">Sobre Mi</a></li>
                <li class="nav-item"><a class="nav-link" href="../../services">Servicios</a></li>
                <li class="nav-item"><a class="nav-link" href="../../portfolio">Portafolio</a></li>
                <li class="nav-item"><a class="nav-link" href="../../contact">Contacto</a></li>
            </ul>
        </div>
    </div>
</nav>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Telefono</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      
      <td>(+54 9)1127160753</td>
      <td>pablonicolasgarcia@outlook.com</td>
      
    </tr>
    <tr>
</body>
</html>
