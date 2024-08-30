<?php
try {
    $dbConnection = new PDO('mysql:host=localhost;dbname=tu_base_de_datos', 'usuario', 'contraseña');
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
    exit;
}
?>