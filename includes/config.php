<?php
    $con=mysqli_connect("localhost", "root", "", "general");
    if(mysqli_connect_errno()){
    echo "Conexión Fallida".mysqli_connect_error();
    }
?>