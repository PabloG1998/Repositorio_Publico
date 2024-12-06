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
    <title>Pablo Nicolas Garcia | Desarrollador Web - Técnico Informático</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">Pablo Garcia</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Sobre Mí</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../services">Servicios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../portfolio">Portafolio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../blog">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../contact">Contacto</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Main content -->
<div class="container mt-5">
    <div class="text-center">
        <h1 class="display-4">Sobre mí</h1>
        <p class="lead">Pablo Nicolás Garcia, un apasionado por el conocimiento continuo.</p>
    </div>
</div>



<br>
<hr>

<center>
    <h1>Quién soy</h1>
    <p>Soy un programador y técnico informático, apasiondo por la informática desde sus comienzos. Un entusiasta del conocimiento continuo,
     alguien al que le gustan los retos técnicos. Me gusta estudiar acerca de temas relacionados y mantenerme siempre a la vanguardia de la materia. <br>
    </p>
</center>
</hr>
<br>
<center>
    <hr>
    <h1>Mis estudios</h1>
    <p>Estudie 3 años de desarrollo web y 1 años de servicio técnico de PC con <b>amplia experiencia en ambos campos</b></p><br>
</hr>
</center>
<center>
<h1>Resumen de mis estudios</h1>
</center>
<thead>
   <table class="table table-dark">
  <tr>
    <th scope="col">Duración</th>
    <th scope="col">Insititución</th>
    <th scope="col">Materia</th>
    <th scope="col">Año</th>
  </tr>
</thead>
  <tbody>
    <tr>
      <th scope="row">3 años</th>
      <td>EducacionIT</td>
      <td>Desarrollo Web Frontend y Backend</td>
      <td>2020-2023</td>
    </tr>
    <tr>

    <tr>
      <th scope="row">1 año</th>
      <td>IAC Olivos</td>
      <td>Reparación de PC</td>
      <td>2023-2024</td>
    </tr>
    <tr>
<hr>
  </table>
    <br>

  <hr>
  <center>
  <h1>Resumen Laboral</h1>
  </center>
  <table class="table table-dark">
  <tr>
    <th scope="col">Duración</th>
    <th scope="col">Lugar</th>
    <th scope="col">Obligaciones</th>
    <th scope="col">Año</th>
  </tr>
</thead>
  <tbody>
    <tr>
      <th scope="row">5 meses</th>
      <td>Centro de Capacitación y Formación Ubuntu</td>
      <td>Desarrollo Web</td>
      <td>2024-2024</td>
    </tr>
    <tr>

    <tr>
      <th scope="row">1 año</th>
      <td>Desarrollo Web - Negocio Familiar</td>
      <td>Desarrollo Web</td>
      <td>2020-2022</td>
    </tr>
    <tr>
<hr>
  </table>
    

<!-- Footer -->
<footer class="bg-primary text-white text-center py-3 mt-5">
    <p class="mb-0">© 2024 Pablo Nicolás García. Todos los derechos reservados.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
