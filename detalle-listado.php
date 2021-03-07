<?php
  include("assets/php/conexion.php");
  $id = $_REQUEST['id'];
    $consulta = "SELECT * FROM comercios WHERE id=$id";
    $resultado = mysqli_query($conn,$consulta);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Arazá</title>
<link rel="shortcut icon" href="assets/img/favicon.ico">
<link rel="apple-touch-icon" type="image/png" href="assets/img/icon-57.png">
<link rel="apple-touch-icon" type="image/png" sizes="72x72" href="assets/img/icon-72.png">
<link rel="apple-touch-icon" type="image/png" sizes="114x114" href="assets/img/icon-114.png">
<link rel="icon" type="image/png" href="assets/img/icon-114.png">
</head>
<body>
    <header>
        <a href="index.php"><img src="assets/img/araza.jpg" alt=""></a>
        <a href="index.php"><p>Arazá <span class="light">Autogestión</span></p></a>
    </header>
    <section id="buscador">
      <?php include('buscador.php'); ?>
    </section>
    <section id="lista">
        <div class="row">
            <?php
              while ($item = mysqli_fetch_assoc($resultado)) {
                echo '
                  <div class="detalle-box">
                    <h3>'. $item['nombre'].'</h3>
                    <div class="datos">
                        <div class="box_detail">
                          <ul>';
                              if (!empty($item['contacto'])) {
                                echo '<li><p><i class="far fa-user"></i> <strong>Contacto:</strong> '. $item['contacto'].'</p></li>';
                              }
                              if (!empty($item['telefono'])) {
                                echo '<li><p><i class="fas fa-mobile-alt"></i> <strong>Teléfono:</strong> '. $item['telefono'].'</p></li>';
                              }
                              if (!empty($item['localidad'])) {
                                echo '<li><p><i class="fas fa-map-marker-alt"></i> <strong>Localidad:</strong> '. $item['localidad'].'</p></li>';
                              }
                              echo '
                          </ul>
                        </div>
                        <div class="box_gral">
                          <strong>Producto/s que vende/n:</strong><br><br>
                            <ul>
                              <li><i class="fas fa-caret-right"></i> Producto 1 x Kilo (ej.)</li>
                              <li><i class="fas fa-caret-right"></i> Producto 1 x 1/2Kilo (ej.)</li>
                              <li><i class="fas fa-caret-right"></i> Producto x bolsa (ej.)</li>
                              <li><i class="fas fa-caret-right"></i> Producto x unidad (ej.)</li>
                            </ul>
                        </div>
                    </div>
                  </div>
                  ';
                }
            ?>
        </div>
        <div class="row back">
            <a href="index.php"><button class="btn-listado">volver al listado</button></a>
        </div>
    </section>
    <?php
        include_once("assets/php/footer.php");
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script src="assets/js/main.js"></script> 
</body>
</html>