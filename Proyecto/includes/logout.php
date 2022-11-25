<?php

    //Si tiene la sesión iniciada entrando en este fichero php cerrar la sesión.
    if(session_start()){
        session_destroy();
    }
    // Redirigirlo a la página inicial.
    header("Location: ../index.php");
?>