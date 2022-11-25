<?php  
    include "includes/db.inc.php";

    // ¡¡¡¡¡¡EL CODIGO DEL SIGUIENTE REQUIRE NO ES MIO !!!!!!!
    require_once ('includes/Mobile_Detect.php');

    session_start();
    if(!isset($_SESSION["id"])){
        session_destroy();
		header("Location:../index.php");
	}else{
        $sqlAdmin = mysqli_query($con, "SELECT * FROM usuariostest WHERE id = '{$_SESSION['id']}'");
        $result = mysqli_fetch_assoc($sqlAdmin);

        if($result['admin_status'] == false){
            header("Location:conectado.php");
        }
    }

    $mobile = new Mobile_Detect();

    if($mobile->isiOS()){
        header('Location:denegado.php');
    }
    if($mobile->isAndroidOS()){
        header('Location:denegado.php');
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JuditM</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <!-- logo -->
        <a class="logo" href="">JuditM</a>
        <!-- Foto perfil -->
        <a href="includes/logout.php">
            Cerrar session
        </a>
    </header>
    <!-- Signup -->
    <h2>ADMIN</h2>
    <section class="citas admin">
        <div>
            <h3>Inserte la Id de cita que quiera borrar:</h3>
            <form action="#" method="POST" enctype="multipart/form-data" class="citasAdmin">
                <input type="text" name="idCita">
                <button id="btnDelete" type="submit">Delete</button>
            </form>
            <p class="error-txt">
            <?php
                    if(isset($error) && $error != ""){
                        echo $error;
                    }
                ?>
            </p>
            <p class="success-txt"></p>
        </div>
        <!-- Lista de peticíon de citas enviadas. -->
        <div id="listaId">
            <h3>Peticiones activas.</h3>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Cita</th>
                    <th>Mensaje</th>
                    <th>Fecha</th>
                </tr>
            </table>
            <?php

                $sqlCitas = "SELECT * FROM mensajes ORDER BY date ASC";
                $consultaC = mysqli_query($con, $sqlCitas);
                // $row = mysqli_fetch_assoc($consultaC);

                if(mysqli_num_rows($consultaC) > 0){ 
                    foreach($consultaC as $cita){ ?>
                        <table>
                            <tr>
                                <td><?php echo $cita['id_cita'];?></td>
                                <td><?php echo $cita['nombre'];?></td>
                                <td><?php echo $cita['cita'];?></td>
                                <td><?php echo $cita['msg'];?></td>
                                <td><?php echo $cita['date'];?></td>
                            </tr>
                        </table>
                    <?php }
                }else{
                    echo "<h3>¡No hay ninguna petición de cita de momento!</h3>";
                }
            ?>
        </div>
        
    </section>
    <footer>
        <h2>Blogs</h2>
        <section class="footer">
            <ul>
                <li>Estrés laboral, trabajo sin límites.</li>
                <li>Ruptura de pareja: aspectos emocionales de la separación y cómo superarla.</li>
                <li>Comer por ansiedad, cuando la alimentación está guiada por las emociones.</li>
                <li>Coronavirus y ansiedad</li>
                <li>Crecimiento personal e Identidad.</li>
            </ul>
            <ul>
                <li>El mejor psicólogo en Barcelona</li>
                <li>Tratamiento para la depresión en Barcelona</li>
                <li>Tratamiento de la Ansiedad en Barcelona</li>
                <li>El millor psicòleg a Barcelona</li>
                <li>Psicoterapia Barcelona</li>
            </ul>
        </section>
    </footer>
    <!-- Scripts -->
    <script src="js/citas_admin.js"></script>
</body>
</html>