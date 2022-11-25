<?php

    if(session_start()){

        include_once 'db.inc.php';
        
        $id = $_SESSION['id'];
        $cita = $_POST['cita'];
        $msg = $_POST['msg'];

        //Vamos a selecionar la línea sql de la id conectada.
        $sql = mysqli_query($con, "SELECT * FROM usuariostest WHERE id = '{$id}'");
        //Guardamos la línea para usarla luego.
        $row = mysqli_fetch_assoc($sql);
        //Guardamos el nombre del usuario en la variable $nombre.
        $nombre = $row['nombre'];
        // Si el usuario ha rellenado el campo de cita...
        if(!empty($cita)){
            // ...enviar la cita a la BBDD.
            $sql2 = mysqli_query($con, "INSERT INTO mensajes (id, nombre, cita, msg) VALUES ('{$_SESSION['id']}', '{$nombre}', '{$cita}', '{$msg}')");
            echo "success";
        }else{
            echo "Rellene todos los campos";
        }
    }else{
        echo "¡Algo ha salido mal!";
    }

