<?php
session_start();
include "includes/db.inc.php";

if(isset($_SESSION['id'])){
    header("location: conectado.php");
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
        <a class="logo" href="index.php">JuditM</a>
        <!-- Iniciar Sesion -->
        <button id="login" class="btn">Iniciar Sesión</button>
    </header>
    <!-- Pop up inicio de sesión -->
    <div id="popupses" class="popup center">
            <div class="lineasep login">
                <button id="cerrar">X</button>
                <h2>Iniciar sesión</h2>
                <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <input class="estilo" type="text" name="usuario" placeholder="Usuario" required>
                    <input class="estilo" type="password" name="pass" placeholder="Contraseña" required>
                    <!-- Usamos una condicional por si el usuario no introduce la información correctamente -->
                    <p class="error-txt"></p>
                    <input id="btnLogin" type="submit" >
                </form>
            </div>
    </div>
    <!-- Signup -->
    <section class="signup">
        <h2>¡Registrate!</h2>
        <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
            <input class="estilo" type="text" name="nombre" placeholder="Nombre completo" required>
            <input class="estilo" type="email" name="email" placeholder="Email" required>
            <input class="estilo" type="text" name="usuario" placeholder="Usuario" required>
            <input class="estilo" type="password" name="pass" placeholder="Contraseña" required>
            <input class="estilo" type="password" name="passrepeat" placeholder="Repite la contraseña" required>
            <!-- Usamos una condicional por si el usuario no introduce la información correctamente -->
            <div class="error-txt">
                <?php
                    if(isset($error) && $error != ""){
                        echo $error;
                    }
                ?>
            </div>

            <button class="btnSignup" type="submit" name="submit">Registrarse</button>
        </form>
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
    <script src="js/main.js"></script>
    <script src="js/signup.js"></script>
</body>
</html>

<!-- Errores solucionados -->

<!-- 
    Los problemas que he tenido han sido mayoritariamente y simplemente por errores de sintaxis como los siguientes:

    Varios errores de sintaxis como ; o las "".

    No me detectaba el valor de los inputs, fue porque en ajax no envié nada en xhr.send.

    No podía iniciar sesion devido a que me olvide un * entre el SELECT y FROM en la consulta de sql.
-->