<?php 
    include('conexion.php');
    function incrementarVisitas($pdo, $page) {
        //Verifica si la página ya tiene un registro en la DB
        $sql = "select visitas from visitas where page = :page";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['page' => $page]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            //Si la página tiene visitas, incrementa el contador
            $sql = "update visitas set visitas = visitas + 1 where page = :page";
        }else{
            //Si la página no  tiene un registro, se crea e inicia el contador en 1
            $sql = "insert into visitas (page, visitas) values (:page, 1)";
        }

        $stmt = $pdo->prepare($sql);
        $stmt ->execute(['page' => $page]);
    }

    function obtenerVisitas($pdo, $page) {
        $sql = "select visitas from visitas where page = :page";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['page' => $page]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado ? $resultado['visitas'] : 0;
    }

    //Nombre de la página o identificador único
    $page = 'first_page';

    //Incrementar el contador
    incrementarVisitas($pdo, $page);

    //Obtener el total
    $totalVisitas = obtenerVisitas($pdo, $page);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador visitas</title>
</head>
<body>
    <div class="container mt5">
        <h2>Ha visitado esta página: <?= $totalVisitas ?> veces.</h2>
    </div>
</body>
</html>