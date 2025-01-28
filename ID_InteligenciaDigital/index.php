<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ID | Inteligencia Digital</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #1e1e2f;
      color: #ffffff;
      font-family: 'Courier New', Courier, monospace;
    }
    .navbar {
      background-color: #15151e;
    }
    .hero {
      background: linear-gradient(135deg, #282a36, #44475a);
      color: #50fa7b;
      padding: 100px 15px;
      text-align: center;
    }
    .hero h1 {
      font-size: 3rem;
      animation: typing 4s steps(30, end), blink 0.75s step-end infinite;
      white-space: nowrap;
      overflow: hidden;
      border-right: 3px solid;
    }
    @keyframes typing {
      from { width: 0; }
      to { width: 100%; }
    }
    @keyframes blink {
      50% { border-color: transparent; }
    }
    .card {
      background-color: #282a36;
      border: 1px solid #50fa7b;
      color: #f8f8f2;
    }
    .card:hover {
      background-color: #44475a;
    }
    footer {
      background-color: #15151e;
      padding: 20px;
      text-align: center;
      color: #6272a4;
    }
  </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">ID - Inteligencia Digital</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
          <li class="nav-item"><a class="nav-link" href="./servicios/index.php">Services</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="hero">
    <h1>Bienvenido a Inteligencia Digital</h1>
    <p>Especialistas en Reparación de PC y Desarrollo Web</p>
  </div>

  <div class="container my-5">
    <div class="row" id="about">
      <div class="col-md-4">
        <div class="card p-3">
          <h5>Desarrollo Web</h5>
          <p>Lleve sus ideas al vasto universo de Internet. Desde páginas web básicas, hasta páginas web para emprendedores</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card p-3">
          <h5>Seguridad</h5>
          <p>Nos encargamos de que sus WebApps sean robustas y seguras.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card p-3">
          <h5>Servicio Técnico de PC</h5>
          <p>Optimice, solucione y mantenga la integridad de su equipo de cómputo con nuestros servicios</p>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <p>&copy; 2025 Informatic Zone. All rights reserved.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
