<?php

session_start();

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'CRUD'
);
//Testeo de conexion
// if (isset($conn)) {
//    echo 'DB is connected';
//}

?>