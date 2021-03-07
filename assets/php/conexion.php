<?php
$conn = mysqli_connect("localhost", "root","root","arazadb");
if ($conn->connect_errno) {
    die("Hubo un error, no se puede conectar a la base de datos.");
}