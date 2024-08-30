<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "UbuntuDB";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Consultar acompañamientos
$sql = "SELECT id, nombre, detalles FROM acompanamientos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../resources/css/style.css">
    <link rel="shortcut icon" href="../../resources/images/EagSKyL6nmIT5erqWDgzbASr0mrytrYTcFlevFtMJegeA8qwxTpQPhGOr3gchU.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Acompañamiento | Ubuntu</title>
</head>

<body>
    <!-- Menu -->
    <nav class="menu">
        <ul>
            <li><a href="../../index.php">Inicio</a></li>
            <li><a href="../../educational/courses/">Cursos</a></li>
            <li><a href="../../educational/workshops/">Talleres</a></li>
            <li><a href="#">Acompañamientos</a></li>
            <li><a href="../../institutional/consultancy/">Consultoría</a></li>
            <li><a href="../../platform/register.php">Crear Cuenta</a></li>
            <li><a href="../../platform/login.php">Ingresar</a></li>
        </ul>
    </nav>

    <!-- Content -->
    <div class="container mt-4">
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                // Mostrar acompañamientos en las tarjetas
                while ($row = $result->fetch_assoc()) {
                    $id = $row["id"];
                    $nombre = htmlspecialchars($row["nombre"]);
                    $detalles = htmlspecialchars($row["detalles"]);

                    echo '<div class="col-sm-6 mb-3">';
                    echo '  <div class="card">';
                    echo '    <div class="card-body">';
                    echo '      <h5 class="card-title">' . $nombre . '</h5>';
                    echo '      <p class="card-text">' . $detalles . '</p>';
                    echo '      <a href="id/' . $id . '" class="btn btn-primary">Ver detalle</a>';
                    echo '    </div>';
                    echo '  </div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No hay acompañamientos disponibles.</p>';
            }
            $conn->close();
            ?>
        </div>
    </div>

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
</body>
</html>
