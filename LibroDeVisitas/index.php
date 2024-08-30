<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libro de Visitas</title>
</head>
<body>
    <h1>Deja tu comentario</h1>

    <form action="procesar.php" method="post">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required>

        <label for="comentario">Comentario:</label>
        <textarea name="comentario" id="comentario" rows="4" cols="50" required></textarea>
        <input type="submit" value="Enviar Comentario">
    </form>

    <h2>Comentarios recientes:</h2>
    <?php 
        $conn = new mysqli("localhost", "root", "", "librodevisitas");

        //verificar
        if($conn->connect_error) {
            die("Connection Failed" . $conn->connect_error);
        }

        //Consulta de comentarios
        $sql = "select nombre, comentario, fecha from comentarios order by fecha desc";
        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<p><strong>". htmlspecialchars($row['nombre']) . "</strong> (" .$row['fecha'] . ")</p>";
                echo "<p>" . htmlspecialchars($row['comentario']) . "</p><hr>";
            }
        }else{
            echo "<p> No hay comentarios aun</p>";

        }
        $conn->close();
    ?>
</body>
</html>