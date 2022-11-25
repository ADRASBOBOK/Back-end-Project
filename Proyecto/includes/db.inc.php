<?php

$dbhost = "localhost";
$dbUser = "root";
$dbpass = "";
$dbname = "judit";

$con = mysqli_connect($dbhost, $dbUser, $dbpass, $dbname); //Nos conectamos a la base de datos. Uso variables para que se pueda cambiar esta sin necesidad de tocar el código en un futuro.

// Si no se conecta a la base de datos da error.
if (!$con){
    echo "¡Error al conectarse a la base de datos!".mysqli_connect_error();
}
?>