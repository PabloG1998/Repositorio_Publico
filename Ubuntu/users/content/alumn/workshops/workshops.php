<?php
// conexion.php
$host = 'localhost'; // Cambia según tu configuración
$db = 'ubuntudb'; // Cambia según tu base de datos
$user = 'root'; // Cambia según tu usuario
$pass = ''; // Cambia según tu contraseña

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener los talleres
$sql = "SELECT nombre FROM talleres";
$result = $conn->query($sql);

$talleres = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $talleres[] = $row['nombre'];
    }
} else {
    echo "No se encontraron talleres";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Alumno</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

  <style>
    .sidebar {
      height: 100vh;
      background-color: #f8f9fa;
      padding-top: 20px;
    }
    .sidebar a {
      padding: 10px;
      display: block;
      color: #333;
      text-decoration: none;
    }
    .sidebar a.active {
      background-color: #007bff;
      color: white;
    }
    .main-content {
      padding: 20px;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav class="col-md-2 sidebar">
        <h4 class="text-center">Dashboard Alumno</h4>
        <a href="../../../dashboardAlumno.php">Inicio</a>
        <a href="../courses/courses.php">Mis Cursos</a>
        <a href="content/alumn/workshops" class="active">Mis Talleres</a>
       <!-- <a href="#">Perfil</a> -->
        <a href="../../../../config/logout.php">Cerrar Sesión</a>
      </nav>

      <!-- Main Content -->
      <main class="col-md-10 main-content">
       
        <!-- Example of a section -->
        <section>
          <h2>Mis Talleres</h2>
          <table id="talleresTable" class="display">
            <thead>
              <tr>
                <th>Nombre del Taller</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($talleres as $taller) {
                  echo "<tr><td>$taller</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </section>

        <!-- Add more sections as needed -->
      </main>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

  <script>
    $(document).ready( function () {
        $('#talleresTable').DataTable();
    });
  </script>
</body>
</html>