<?php  
    include "includes/db.inc.php";

    session_start();
    if(!isset($_SESSION["id"])){
		header("Location:conectado.php");
	}else{
        $sqlAdmin = mysqli_query($con, "SELECT * FROM usuariostest WHERE id = '{$_SESSION['id']}'");
        $result = mysqli_fetch_assoc($sqlAdmin);

        if($result['admin_status'] == true){
            header("Location:admin.php");
        }
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
    <div class="marco">
        <!-- Signup -->
        <section class="citas">
            <!-- Petición de citas -->
            <div>    
                <form action="#">
                    <select class="estilo" name="cita" id="">
                        <option value="">Seleccione su tipo de cita</option>
                        <option value="personal">Personal</option>
                        <option value="pareja">Pareja</option>
                        <option value="familiar">Familiar</option>
                    </select>
                    <textarea name="msg" id="msg" cols="30" rows="10"></textarea>
                    <input class="btn" id="btnCitas" type="submit">
                    <div class="error-txt">

                    <p class="error-txt">
                    <?php
                            if(isset($error) && $error != ""){
                                echo $error;
                            }
                        ?>
                    </p>
                    <p class="success-txt"></p>
                </div>
                </form>
            </div>
            <!-- Lista de peticíon de citas enviadas. -->
            <div id="listaId" class="usuario">
                <h3>Peticiones activas.</h3>
                <table>
                    <tr>
                        <th>Cita</th>
                        <th>Mensaje</th>
                        <th>Fecha</th>
                    </tr>
                </table>
                <?php

                    $sqlCitas = "SELECT * FROM mensajes WHERE id = '".$_SESSION["id"]."' ORDER BY date DESC";
                    $consultaC = mysqli_query($con, $sqlCitas);
                    // $row = mysqli_fetch_assoc($consultaC);

                    if(mysqli_num_rows($consultaC) > 0){
                        foreach($consultaC as $cita){
                            echo "
                                <table>
                                    <tr>
                                        <td>".$cita['cita']."</td>
                                        <td>".$cita['msg']."</td>
                                        <td>".$cita['date']."</td>
                                    </tr>
                                </table>
                                ";
                        }
                    }else{
                        echo "<h3>No tienes ninguna peticion activa por el momento.</h3>";
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
    </div>
    <script src="js/citas.js"></script>
</body>
</html>