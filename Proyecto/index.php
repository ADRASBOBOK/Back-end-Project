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
        <a class="logo" href="">JuditM</a>
        <?php
        //Dependiendo de si el usuario tiene la sesión iniciada o no le saldrá el botón de loguearse o el de cerrar sesión.
        if(!isset($_SESSION['id'])){
            echo '<button id="login" class="btn login">Iniciar Sesión</button>';
        }
        if(isset($_SESSION['id'])){
            echo '<a href="includes/logout.php" id="logout" class="btn">Cerrar Sesión</a>';
        }
        ?>
    </header>
    <div class="marco">
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
            <div class="login-reg">
                <h2>¡Regístrate!</h2>
                <p>Si no tienes una cuenta ya ¡registrate en nuestra web!</p>
                <p>¡Es completamente gratis!</p>
                <a href="signup.php">¡Click Registrate!</a>
            </div>
        </div>
        <!-- Main -->
        <section class="main">
            <article>
                <h1>Toma el control de tu vida!</h1>
                <p>El sufrimiento del hombre no se debe a la falta de certidumbres, sino a la de la confianza. Hemos perdido la confianza en el mundo, y como perdimos la confianza queremos control, y como queremos control queremos certidumbres, y como queremos certidumbres no reflexionamos...</p>
            </article>
            <button class="btn btncita">Pide cita!</button>
        </section>
        <!-- Sobre mí -->
        <section class="sobremi">
            <h1>Judit March</h1>
            <figure>
                <img src="img/judit.jpg" alt="Judit March">
            </figure>
            <article>
                
                <h2>Doctora en Psicología Clínica de la Salud UAB</h2>
                <p>Soy Doctora en Psicología Clínica y de la Salud por la UAB, Máster en Psicopatología Clínica por la UAB, acreditada como Psicóloga General Sanitaria, Máster en Logopedia y posgrado en Terapia de Pareja. Dispongo de varios cursos de actualización y el Diploma de Estudios Avanzados en Evaluación, Intervención y Tratamiento Psicológico por la UAB.
                <p>He trabajado como psicóloga en diferentes fundaciones y centros de día especializados en salud mental y he llevado la dirección técnica de diferentes entidades sin ánimo de lucro. También he organizado y participado en cursos de formación, en jornadas y congresos dirigidos a profesionales del ámbito de la psicología y de la educación, compaginando la labor clínica y educativa con el mundo de la investigación.</p>
                <p>Nacida en una pequeña población de la provincia de Lleida, el año 1998 llegué a Barcelona para estudiar la licenciatura en psicología. A lo largo de más de quince años me he ido formando en mi profesión a nivel académico, aunque considero que un buen psicólogo no solamente es aquel que dispone de los conocimientos teóricos. Sin lugar a dudas la experiencia, la capacidad empática, la madurez y la sensibilidad son componentes esenciales para llegar a ser un buen psicólogo.</p>
                <p>Mi vocación y mi pasión son mi trabajo, por eso me siento muy afortunada.</p>
            </article>
        </section>
        <!-- Contáctanos -->
        <section class="contacto">
            <article class="artcont">
                <h1>Contacto</h1>
                <p>Ponte en contacto conmigo por lo que sea que quieras saber o hablar.</p>
            </article>
            <ul>
                <li>Tel: XXX XXX XXX</li>
                <li>Email: empresajudith@xxxx.com</li>
            </ul>
            <div>
                <iframe class="inframe" src="https://www.google.com/maps/embed?pb=!1m19!1m8!1m3!1d5985.181900946664!2d2.1768265!3d41.4046889!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x12a4a2870b3e4e9d%3A0xdeb036daa0734fcf!2sJM%20Psicolog%C3%ADa%20-%20Dra%20Judit%20March%20C%2F%20de%20Mallorca%2C%20419%2008013%20Barcelona%20Espa%C3%B1a!3m2!1d41.4046889!2d2.1768264999999998!5e0!3m2!1ses!2sfr!4v1658048470893!5m2!1ses!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            
        </section>
        <!-- Tarifas -->
        <section id="tarifas" class="tarifas">
            <h1>Tarifas</h1>
            <div class="flexc">
                <div class="card">
                    <figure>
                        <img src="img/personal.jpeg" alt="Personal">
                    </figure>
                    <article>
                        <h3>Personal</h3>
                        <h4>70€</h4>
                        <p>Lo mejor que puedes hacer es contar tus problemas lo ante sposible para quitarte el peso de encima.</p>
                    </article>
                    <button class="btn cita">Pedir cita!</button>
                </div>
                <div class="card">
                    <figure>
                        <img src="img/parejas.jpg" alt="Parejas">
                    </figure>
                    <article>
                        <h3>Parejas</h3>
                        <h4>80€</h4>
                        <p>Nunca es tarde para arreglar los problemas de una pareja feliz xd...</p>
                    </article>
                    <button class="btn cita">Pedir cita!</button>
                </div>
                <div class="card">
                    <figure>
                        <img src="img/familiar.jpg" alt="Familiar">
                    </figure>
                    <article>
                        <h3>Familiar</h3>
                        <h4>90€</h4>
                        <p>La familia es lo más importante en este universo y por eso hay que tratarla con lo mejor posible y entendernos los unos a los otros.</p>
                    </article>
                    <button class="btn cita">Pedir cita!</button>
                </div>
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
    <!-- Scripts -->
<script src="js/main.js"></script>
<script src="js/login.js"></script>
</body>
</html>

