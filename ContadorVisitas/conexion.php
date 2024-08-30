<?php
    $host = '127.0.0.1';
    $db = 'php';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    try {
         $dsn = "mysql:host=$host; dbname=$db; pass=$pass; charset=$charset";
         $pdo = new PDO($dsn, $user, $pass);
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
?>