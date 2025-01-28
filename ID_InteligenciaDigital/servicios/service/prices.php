<?php 
    // Configuración de la conexión a la base de datos
    $host = "localhost";
    $dbname = "inteligencia_digital";
    $username = "root";
    $password = "";

    // Crear conexión
    $conn = mysqli_connect($host, $username, $password, $dbname);

    // Comprobar si la conexión es exitosa
    if (!$conn) {
        die("Error al conectar a la base de datos: " . mysqli_connect_error());
    }

    // Consulta a la base de datos
    $query = "SELECT * FROM id_precios_service_pc";
    $result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ID | Inteligencia Digital | Service PC | Tabla de Precios</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #1e1e2f;
      color: #ffffff;
      font-family: 'Courier New', Courier, monospace;
    }
    .navbar {
      background-color: #15151e;
    }
    .hero {
      background: linear-gradient(135deg, #282a36, #44475a);
      color: #50fa7b;
      padding: 100px 15px;
      text-align: center;
    }
    .hero h1 {
      font-size: 3rem;
      animation: typing 4s steps(30, end), blink 0.75s step-end infinite;
      white-space: nowrap;
      overflow: hidden;
      border-right: 3px solid;
    }
    @keyframes typing {
      from { width: 0; }
      to { width: 100%; }
    }
    @keyframes blink {
      50% { border-color: transparent; }
    }
    .table {
      background-color: #282a36;
      color: #50fa7b;
    }
    .table thead {
      background-color: #44475a;
    }
    .table tbody tr:hover {
      background-color: #6272a4;
    }
    footer {
      background-color: #15151e;
      padding: 20px;
      text-align: center;
      color: #6272a4;
    }
  </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">ID - Inteligencia Digital</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
          <li class="nav-item"><a class="nav-link" href="./servicios/index.php">Services</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="hero">
    <h1>Tabla de Precios - Service PC</h1>
    <p>Consulta nuestros servicios y precios.</p>
  </div>

  <div class="container my-5">
    <div class="table-responsive">
      <table id="tablaPrecios" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Servicio</th>
            <th>Precio</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($result && mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>
                          <td>{$row['id']}</td>
                          <td>{$row['servicio']}</td>
                          <td>{$row['precio']}</td>
                        </tr>";
              }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <footer>
    <p>&copy; 2025 Informatic Zone. All rights reserved.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#tablaPrecios').DataTable({
        "language": {
          "url": "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
        }
      });
    });
  </script>
</body>
</html>
