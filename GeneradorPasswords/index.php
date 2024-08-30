<?php 
  //Conexion
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "password_generator";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
        die("Conexion fallida: " . $conn->connect_error);
  }

  //Funcion para generacion de password
  function generatePassword($length = 12) {
      $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#%^&*()';
      $password = substr(str_shuffle($chars), 0, $length);
      return $password;
  }

  //Generacion y almacenamientos de Passwords
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $password = generatePassword();
      $sql = "insert into password(password) values('$password')";
      
      if($conn->query($sql) === TRUE) {
        $message = "Contraseña generada exitosamente: $password";
      }else{
        $message = "Error al generar la contraseña: " . $conn->error;
      }
      //Redirije a la misma página
      header("Location: " . $_SERVER['PHP_SELF']);
      }

      
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generador de Contraseñas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-center">Generador de Contraseñas</h1>
    <?php if(isset($message)): ?>
      <div class="alert alert-info text-center">
        <?php echo $message ?>
      </div>
      <?php endif; ?>

      <form method="POST" class="text-center">
        <button type="submit" class="btn btn-primary">Generar Contraseña</button>
      </form>

      <h5 class="mt-5 text-center">Contraseñas Generadas</h5>
      <table class="table table-bordered mt-3">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Contraseña</th>
            <th>Fecha de Creacion</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $sql = "select * from password order by created_at desc";
            $result = $conn->query($sql);

            if($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "<td>" . $row['created_at'] . "</td>";
                echo "</tr>";
              }
            }else{
              echo "<tr><td colspan='3' class='text-center'> No se han generado contraseñas aun. </td></tr>";
            }
          ?>
        </tbody>
      </table>
  </div>
</body>
</html>
<?php $conn->close(); ?>