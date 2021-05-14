<?php

session_start();

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'php_mysql_crud'
);

//Para confirmar si esta conectada la base de datos
// if (isset($conn)) {
//     echo 'DB is connected';
// }