<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resources/css/style.css">
    <link rel="shortcut icon" href="../resources/images/EagSKyL6nmIT5erqWDgzbASr0mrytrYTcFlevFtMJegeA8qwxTpQPhGOr3gchU.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Registrarse | Ubuntu</title>
</head>
<body>
<nav class="menu">
  <ul>
    <li><a href="../index.php">Inicio</a></li>
    <li><a href="../educational/courses/">Cursos</a></li>
    <li><a href="../educational/workshops/">Talleres</a></li>
    <li><a href="../institutional/accompaniment/">Acompañamientos</a></li>
    <li><a href="../institutional/consultancy/">Consultoría</a></li>
    <li><a href="../platform/register.php">Crear Cuenta</a></li>
    <li><a href="../platform/login.php">Ingresar</a></li>
  </ul>
</nav>

<!-- FORMULARIO DE REGISTRO -->

  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Crear Cuenta</h2>

              <form id="registerForm" action="reg_user.php" method="POST" onsubmit="return validateForm()">

                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="text" id="nombre" name="nombre" class="form-control form-control-lg" required />
                  <label class="form-label" for="nombre">Nombre</label>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="email" id="mail" name="email" class="form-control form-control-lg" required />
                  <label class="form-label" for="mail">Mail</label>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="password" id="password" name="password" class="form-control form-control-lg" required />
                  <label class="form-label" for="password">Contraseña</label>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="password" id="password-confirm" name="password-confirm" class="form-control form-control-lg" required />
                  <label class="form-label" for="password-confirm">Confirmar Contraseña</label>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="tel" id="phoneNumber" name="telefono" class="form-control form-control-lg" required />
                  <label class="form-label" for="phoneNumber">Teléfono</label>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-success">Registrarse</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">¿Ya tiene una cuenta? <a href="../platform/login.php" class="fw-bold text-body"><u>Iniciar Sesión</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
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
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!--<script type="text/javascript" src="../resources/js/script.js"></script> -->

<!-- Validación en JavaScript -->
<script>
function validateForm() {
    var nombre = document.getElementById("nombre").value;
    var email = document.getElementById("mail").value;
    var password = document.getElementById("password").value;
    var passwordConfirm = document.getElementById("password-confirm").value;
    var telefono = document.getElementById("phoneNumber").value;

    if (password !== passwordConfirm) {
        alert("Las contraseñas no coinciden.");
        return false;
    }

    if (nombre && email && password && passwordConfirm && telefono) {
        alert("Registro exitoso");
        return true;
    }

    alert("Por favor, complete todos los campos.");
    return false;
}
</script>
</html>
