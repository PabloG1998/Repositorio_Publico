<?php 
    require('db.php');

    if($_SERVER['REQUEST_METHOD']==="POST") {
        $peso = $_POST['peso'];
        $altura = $_POST['altura'];

        if ($peso > 0 && $altura > 0) {
            $imc = $peso / ($altura * $altura);
            $clasificacion = "";

            if($imc < 18.5) {
                $clasificacion = "Por debajo del peso ideal";
            }elseif($imc >= 18.5 && $imc < 24.9) {
                $clasificacion = 'Peso normal';
            }elseif($imc >= 25 && $imc < 29.9) {

            }else{
                $clasificacion = 'Obsesidad';
            }

            //SQL
            $sql = "insert into resultados (peso, altura, imc, clasificacion) values(:peso, :altura, :imc, :clasificacion)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['peso' => $peso, 'altura' => $altura, 'imc' => $imc, 'clasificacion' => $clasificacion]);

            $resultado = [
                'imc' =>number_format($imc, 2),
                'clasificacion' => $clasificacion,
                'altura' => $altura
            ];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Calculadora IMC</title>

    <style>
        body{
    background-color: #323333;
}

.container{
    max-width: 500px;
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

button {
    width: 100%;
}
    </style>

</head>
<body>
    <br>
    <div class="container mt-5">
        <h2>Calculadora IMC</h2>
        <form action="index.php" id="imcForm" method="post">
            <div class="mb-3">
                <label for="peso" class="form-label">Peso (kg)</label>
                <input type="number" step="0.1" name="peso" id="peso" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="altura" class="form-label">Altura (m)</label>
                <input type="number" step="0.01" name="altura" id="altura" class="form-control" required>
            </div>
            <button type="submit" class="btn  btn-danger">Calcular IMC</button>
        </form>
        <?php if(isset($resultado)): ?>
            <div class="mt-3">
                <h3>Tu IMC es: <?=$resultado['imc']?></h3>
                <p class="text-<?=($clasificacion == 'Peso normal') ? 'success' : 'warning' ?>">
                <?= $resultado['clasificacion'] ?>
                </p>
            </div>
            <?php endif; ?>
        </div>
       <script>
        document.getElementById('imcForm').addEventListener('submit', function(event){
        let peso = document.getElementById('peso').value;
        let altura = document.getElementById('altura').value;

            if (peso <= 0 || altura <= 0) {
                event.preventDefault();
                alert("Por favor, ingrese valor validos.")
            }
        });
       </script>
</body>
</html>