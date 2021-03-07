<?php
include_once('assets/php/conexion.php');

    if (!empty($_POST['busqueda'])) {
        $busqueda =explode(" ", $_POST['busqueda']);
        $sql = "SELECT * FROM comercios WHERE nombre LIKE '%".$busqueda[0]."%'";

        $size = count($busqueda);
        for ($i=1; $i < $size; $i++) { 
            if (!empty($busqueda[$i])) {
                $sql .="AND nombre LIKE '%".$busqueda[$i]."%'";
            }
        }
        $sql .= "LIMIT 12";

        $result = mysqli_query($conn,$sql);
        while($item = mysqli_fetch_assoc($result)) {
            echo '
            <li class="item">
                <div class="box-search">
                    <img src="" alt="">
                    <div class="box-img-search">
                        <p>'.$item['id'].'</p>
                    </div>                 
                    <h3>'.$item['nombre'].'</h3>
                    <p class="listado-tel-search"><i class="fa fa-mobile-alt"></i> '.$item['telefono'].'</p>
                    <a href="detalle-listado.php?id='.$item['id'].'"><button type="button" class="btn btn-primary-search">+ info</button></a>
                </div>
            </li>
                ';
        }
    }