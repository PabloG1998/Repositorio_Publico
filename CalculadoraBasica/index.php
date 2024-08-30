<?php 

    if(isset($_POST['calculate'])) {
        //Numero de entrada y la operacion
        $numero1 = $_POST['numero1'];
        $numero2 = $_POST['numero2'];
        $operacion = $_POST['operacion'];

        //Se inicializa la variable res
        $res = "";

        //Ejecucion de la operacion segun la opcion
        switch ($operacion) {
            case "suma":
                $resultado = $numero1 + $numero2;
                break;
            case "resta":
                $resultado = $numero1 - $numero2;
                break;
            case "multiplicacion":
                $resultado = $numero1 * $numero2; 
                break;
            case "divsion":
                if ($numero2 != 0) {
                    $resultado = $numero1 / $numero2;
                }else{
                    $resultado = "Error: No se puede dividir por 0";
                }
                break;
        }
        //Se muestra el res
        echo "<h3>Resultado: $resultado </h3>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Básica</title>
</head>
<body>
    <h2>Calculate Me!</h2>
    <form action="" method="POST">
        <input type="number" name="numero1" placeholder="Primer numero" required>
        <select name="operacion">
            <option value="suma">+</option>
            <option value="resta">-</option>
            <option value="multiplacion">*</option>
            <option value="division">-</option>
        </select>
        <input type="number" name="numero2" placeholder="Segundo numero" required>
        <button type="submit" name="calculate">Calcular</button>
    </form>
</body>
</html>