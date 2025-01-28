<?php 
//Localhost
$host = 'localhost';
$pass = '';
$db = 'inteligencia_digital';
$user = 'root';

$connection = mysqli_connect($host, $user,  $pass, $db);

if (!$connection) {
    die("Error en la conexion: " . mysqli_connect_error());
}else{
  //  echo "Conexion exitosa";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="config/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="config/js/redir.js"></script>
    <title>ID | Home</title>
</head>
<body>
   <!--Bootrstrap Navbar-->
   <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;>
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ID-Inteligencia Digital</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Registrarse</a>
        </li>
        <li class="nav-item">
            <a href="login.php" class="nav-link">Entrar</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Servicios
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="servicios/recovery">Recuperacion de Datos</a></li>
            <li><a class="dropdown-item" href="servicios/service">Service de PC</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="servicios/diseno">Desarrollo Web</li>
          </ul>
        </li>
        
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true"></a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav> <!--Fin Bootstrap Navbar-->

<!--Register form-->
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow" style="width: 100%; max-width: 400px;">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Registrarse</h3>
                <form id="registerForm" method="POST" action="procesar_registro.php">
                    <!-- Nombre Completo -->
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Nombre Completo</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Tu nombre completo" required>
                    </div>
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@correo.com" required>
                    </div>
                    <!-- Contraseña -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="********" required>
                    </div>
                    <!-- Botón Registrarse -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">Crear Cuenta</button>
                    </div>
                    <!-- Enlace para iniciar sesión -->
                    <div class="text-center mt-3">
                        <a href="login.php">¿Ya tienes cuenta? Inicia sesión</a>
                    </div>
                </form>
            </div>
        </div>
    </div>