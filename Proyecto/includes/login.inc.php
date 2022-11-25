<?php   
    session_start();
    require_once 'db.inc.php';

    $usuario = $_POST["usuario"];//Variable que guarda el usuario introducido.
    $pass = $_POST["pass"];//Variable que guarda la contraseña introducida.

    //Si no se ha introducido toda la información error sino...
    if(!empty($usuario) && !empty($pass)){
        //...nos aseguramos de que las informaciones aportadas existan en la BBDD y coincidan en la misma línea.
        $passHashed = md5($pass);
        $sql = mysqli_query($con, "SELECT * FROM usuariostest WHERE usuario = '{$usuario}'");

        // Si existe...
        if(mysqli_num_rows($sql) > 0){ //Si las informaciones coinciden.
            $row = mysqli_fetch_assoc($sql);//Guardamos la fila de usuario.
            $passHashed = md5($pass);//Pasamos la contraseña en la encriptación md5 para que coincida en la BBDD.
            $enc_pass = $row['pass'];
            
            //Si la contraseña coincide iniciar sesión.
            if($passHashed === $enc_pass){
                    $_SESSION['id'] = $row['id'];
                    // header("location: ../conectado.php");
                    echo "success";
                }else{
                    echo "¡El usuario o contraseña no coinciden!";
                }
            }else{
                echo "¡Este usuario no existe!";
            }
        }else{
            echo "¡Por favor inserte las credenciales en todas las casillas!";
        }