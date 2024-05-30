<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema de Gestión Hotelera</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="habitaciones.php">
        <i class="fas fa-home"></i>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="reservas.html">
              <i class="fas fa-calendar-alt"></i>
              Reservas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="clientes.html">
              <i class="fas fa-users"></i>
              Clientes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="proveedores.html">
              <i class="fas fa-truck"></i>
              Proveedores
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="empleados.html">
              <i class="fas fa-users-cog"></i>
              Empleados
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="registro.html">
              <i class="fas fa-clipboard-list"></i>
              Registro
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <div class="container">
    <div class="text-right mb-3">
      <a href="agregar_habitacion.html" class="btn btn-primary"><i class="fas fa-plus"></i> Agregar habitación</a>
    </div>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>Numero</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Estado</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          require_once '../Controller/HabitacionController.php';
          $controller = new HabitacionController();
          $habitaciones = $controller->mostrarHabitaciones();

          if (!empty($habitaciones)) {
              foreach ($habitaciones as $row) {
                  echo '<tr>
                          <td>' . htmlspecialchars($row['NumHabitacion']) . '</td>
                          <td>' . htmlspecialchars($row['Nombre']) . '</td>
                          <td> 346 </td>
                          <td> Desocupada </td>
                          <td>
                              <a href="modificar_habitacion.html?NumHabitacion=' . htmlspecialchars($row['NumHabitacion']) . '"><i class="fas fa-edit"></i></a>
                              <a href="borrar_habitacion.html?NumHabitacion=' . htmlspecialchars($row['NumHabitacion']) . '"><i class="fas fa-trash"></i></a>
                              <a href="ver_habitacion.html?NumHabitacion=' . htmlspecialchars($row['NumHabitacion']) . '"><i class="fas fa-eye"></i></a>
                          </td>
                        </tr>';
              }
          } else {
              echo '<tr><td colspan="5">No se encontraron habitaciones.</td></tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <footer>
    <p>Teléfono: +1 234 567 890</p>
    <p>Email: info@hotel.com</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
