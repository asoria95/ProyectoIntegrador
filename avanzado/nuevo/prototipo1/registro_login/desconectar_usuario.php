<?php

 include 'conectar.php';
session_start();

    session_destroy(); 
    header("location: /avanzado/nuevo/prototipo1/index.html");



?>