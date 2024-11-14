<?php
// Conexión a la base de datos
$host = 'localhost';
$dbname = 'u810780627_ubuntudb';
$user = 'u810780627_ubuntudb';
$password = 'Ubuntu2020sql';

// Crear conexión
$conn = new mysqli($host, $user, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtener datos del formulario
$email = $_POST['email'];
$password = $_POST['password'];

// Preparar y ejecutar consulta
$stmt = $conn->prepare("SELECT id, nombre, password, role FROM usuarios WHERE email = ?");
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si el usuario existe
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    
    // Verificar la contraseña
    if (password_verify($password, $user['password'])) {
        // Iniciar sesión
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['nombre'];
        $_SESSION['user_role'] = $user['role']; // Guardar el rol en la sesión
        
        // Redirigir según el rol
        if ($_SESSION['user_role'] === 'admin') {
            header("Location: ../users/content/admin/dashboardAdmin.php");
        } else {
            header("Location: ../users/dashboardAlumno.php");
        }
        exit();
    } else {
        echo "<script>alert('Contraseña incorrecta.') </script>";
        header("Location: ../platform/login.php");
    }
} else {
    echo "No se encontró el usuario.";
}

$conn->close();
?>
