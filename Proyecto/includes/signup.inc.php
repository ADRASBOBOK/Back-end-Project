<?php
    session_start();
//Este es el documento php que recibirá ajax para el form de signup.
    include_once 'db.inc.php';

    //Variables que almacenarán la información de los inputs del formulario de signup.
    $nombre = mysqli_real_escape_string($con, $_POST['nombre']);// Input de nombre.
    $email = mysqli_real_escape_string($con, $_POST['email']);// Input de email.
    $usuario = mysqli_real_escape_string($con, $_POST['usuario']);// Input de usuario.
    $pass = mysqli_real_escape_string($con, $_POST['pass']);// Input de contraseña.
    $passRepeat = mysqli_real_escape_string($con, $_POST['passrepeat']);// Input de contraseña repetida.
    $admin = false;
    //El mysqli_real_escape_string lo uso para evitar un sql inject.

    if(!empty($nombre) && !empty($email) && !empty($usuario) && !empty($pass) && !empty($passRepeat)){
        //Veamos si las contraseñas introducidas coinciden.
        if($pass == $passRepeat){
            //Veamos si el email se puede usar.
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                //Vamos a ver si este email ya existe en la BBDD.
                $sql = mysqli_query($con, "SELECT email FROM usuariostest WHERE email = '{$email}'");
                if(!mysqli_num_rows($sql) > 0){//Si el email no existe

                    $passHashed = md5($pass);
                    //Si todo está correcto ejecutar la consulta.
                    $sql2 = mysqli_query($con, "INSERT INTO usuariostest (nombre, email, usuario, pass, admin_status) VALUES ('{$nombre}', '{$email}', '{$usuario}', '{$passHashed}', '{$admin}')");
    
                    if($sql2){ //Si la consulta se añade correctamente...
                        $sql3 = mysqli_query($con, "SELECT * FROM usuariostest WHERE email = '{$email}'");
                        if(mysqli_num_rows($sql3) > 0){
                            $result = mysqli_fetch_assoc($sql3);
                            $_SESSION['id'] = $result['id']; //Usamos la id para iniciar session.
                            echo "success";
                        }
                    }else{
                        echo "¡Algo salió mal!";
                    }
                }else{
                    echo "¡Este email ya está en uso!";
                }
            }else{
                echo "¡Este email no es válido!";
            }
        }else{
            echo "¡Las contraseñas no coinciden!";
        }
    }else{
        echo "¡Por favor inserte toda la información requerida!";
    }

?>