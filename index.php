<?php
  $inc = include("assets/php/conexion.php");
  if ($inc) {
    $consulta = "SELECT * FROM comercios ORDER BY nombre ASC";
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
        <div class="container">
        <div class="row">
            <div class="listado">
              <?php
                  if ($resultado) {
                    while ($row = $resultado->fetch_array()) {
                      $id = $row['id'];
                      $nombre = $row['nombre'];
                      $telefono = $row['telefono'];
                      $img = $row['imagen'];
                      $letras = $row['letras'];
                      $fecha = $row['fecha'];

              ?>
                <div class="box">
                    <img src="" alt="">
                    <div class="box-img">
                        <p><?php echo $letras; ?></p>
                    </div>                 
                    <h3><?php echo $nombre; ?></h3>
                    <a href="tel:+598<?php echo $telefono; ?>"><p class="listado-tel"><i class="fa fa-mobile-alt"></i> <?php echo $telefono; ?></p></a>
                    <a href="detalle-listado.php?id=<?php echo $id; ?>"><button type="button" class="btn btn-primary">ver +</button></a>
                </div>
                <?php
                  }
                }
              }
              ?>
            </div>
        </div>
        </div>
    </section>
    <?php
        include_once("assets/php/footer.php");
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script src="assets/js/main.js"></script> 
</body>
</html>