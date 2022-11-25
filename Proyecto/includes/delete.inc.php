<?php
    session_start();
    require_once 'db.inc.php';

    $idCita = $_POST['idCita']; //Esta variable nos recoge la id de la cita introducida en el form.
    
    // Buscamos si la cita existe en la BBDD.
    $sql = mysqli_query($con, "SELECT * FROM mensajes WHERE id_cita = '{$idCita}'");

    // Si existe...
    if(mysqli_num_rows($sql) > 0){
        
        // ...ejecutar la eliminación de esta.
        $sqlDel = "DELETE FROM mensajes WHERE id_cita = '{$idCita}'";
        $consulta = mysqli_query($con, $sqlDel);
        
        echo 'success';

    }else{
        echo 'Algo ha salido mal!';
    }