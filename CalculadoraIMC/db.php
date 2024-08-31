<?php 
    $host = 'localhost';
    $db = "php";
    $user = "root";
    $pass = "";
    $charset = "utf8mb4";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Error de conexion: ' . $e->getMessage();
        die();
    }
?>