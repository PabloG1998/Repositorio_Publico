<?php
$servername = "localhost";
$username = "root";
$password = ""; // Cambia esto si tienes una contraseña
$dbname = "UbuntuDB";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Configuración de paginación
$limit = 4; // Número de talleres por página
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Página actual
$offset = ($page - 1) * $limit; // Desplazamiento

// Consulta con paginación
$sql = "SELECT * FROM talleres LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

// Consulta para contar el total de talleres
$total_sql = "SELECT COUNT(*) as total FROM talleres";
$total_result = $conn->query($total_sql);
$total_row = $total_result->fetch_assoc();
$total_talleres = $total_row['total']; // Total de talleres
$total_pages = ceil($total_talleres / $limit); // Total de páginas

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../resources/css/style.css">
    <link rel="shortcut icon" href="../../resources/images/EagSKyL6nmIT5erqWDgzbASr0mrytrYTcFlevFtMJegeA8qwxTpQPhGOr3gchU.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Talleres | Ubuntu</title>
</head>

<body>
    <!-- Menu -->
    <nav class="menu">
      <ul>
        <li><a href="../../index.php">Inicio</a></li>
        <li><a href="../../educational/courses/">Cursos</a></li>
        <li><a href="#">Talleres</a></li>
        <li><a href="../../institutional/accomaniment/">Acompañamientos</a></li>
        <li><a href="../../institutional/consultancy/">Consultoria</a></li>
        <li><a href="../../platform/register.php">Crear Cuenta</a></li>
        <li><a href="../../platform/login.php">Ingresar</a></li>
        <!-- Search -->
        <input class="search" type="search" placeholder="Buscar..." id="search" >
        <button class="btn btn-success">Buscar</button>
      </ul>
    </nav>

    <br> <br>

    <!-- Content -->
    <div class="row">
      <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
          <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($row['nombre']); ?></h5>
                <p class="card-text"><?php echo htmlspecialchars($row['descripcion']); ?></p>
                <a href="workshop_id/<?php echo $row['id']; ?>/" class="btn btn-primary">Ver detalle</a>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p>No se encontraron talleres.</p>
      <?php endif; ?>
    </div>

    <br>
    <!-- Paginación -->
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item <?php echo $page <= 1 ? 'disabled' : ''; ?>">
          <a class="page-link" href="?page=<?php echo $page - 1; ?>">Anterior</a>
        </li>
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
          <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
          </li>
        <?php endfor; ?>
        <li class="page-item <?php echo $page >= $total_pages ? 'disabled' : ''; ?>">
          <a class="page-link" href="?page=<?php echo $page + 1; ?>">Siguiente</a>
        </li>
      </ul>
    </nav>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center text-lg-start">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                   <h5 class="text-uppercase"></h5>
                    <p>
                        
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Enlaces útiles</h5>
                    <ul class="list-unstyled mb-0">
                        <li><a href="./helpful-links/scopes/" class="text-white">Alcances</a></li>
                        <li><a href="./helpful-links/pricing/" class="text-white">Precios</a></li>
                        <li><a href="./jobs" class="text-white">Trabaja con nosotros</a></li>
                        <li><a href="#" class="text-white"></a></li> 
                     </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Contacto</h5>
                    <ul class="list-unstyled mb-0">
                        <li><a href="#" class="text-white">Correo: direccioncentro@centrodeformacionubuntu.com</a></li>
                        <li><a href="#" class="text-white">Teléfono: 1165300745 - 45545310</a></li>
                        <li><a href="#" class="text-white">Dirección: Santiago Parodi 4330 - Caseros, 3 de Febrero. Pcia.Buenos Aires</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            &copy; 2024 CENTRO DE CAPACITACION Y FORMACION UBUNTU. Todos los derechos reservados.
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../resources/js/script.js"></script>
    <script type="text/javascript" src="../../resources/js/search.js"></script>
</body>
</html>

<?php $conn->close(); ?>
