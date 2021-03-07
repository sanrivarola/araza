<form action="" id="form">
    <div class="input-group rounded">
        <input type="text" name="busqueda" id="search" class="form-control rounded color-buscador" placeholder="Qué proveedor estás buscando?" aria-label="Search"
            aria-describedby="search-addon" />
         <ul id="response"></ul>
    </div>
</form>

<?php
    if (!empty($_GET['busqueda'])) {
        $busqueda = $_GET['busqueda'];
        $sql = "SELECT * FROM comercios WHERE nombre LIKE '%".$busqueda."%'";
        $result = mysqli_query($conn,$sql);

        while($item = mysqli_fetch_assoc($result)) {
            echo '
                <div class="box">
                    <img src="" alt="">
                    <div class="box-img">
                        <p>'.$item['id'].'</p>
                    </div>                 
                    <h3>'.$item['nombre'].'</h3>
                    <p class="listado-tel"><i class="fa fa-mobile-alt"></i> '.$item['telefono'].'</p>
                    <a href="detalle-listado.php?id='.$item['id'].'"><button type="button" class="btn btn-primary">+ info</button></a>
                </div>
                ';
        }
    }
?>