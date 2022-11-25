<?php  
    include "includes/db.inc.php";

    // ¡¡¡¡¡¡EL CODIGO DEL SIGUIENTE REQUIRE NO ES MIO !!!!!!!
    require_once ('includes/Mobile_Detect.php');

    session_start();
    if(!isset($_SESSION["id"])){
        session_destroy();
		header("Location:index.php");
	}

    $mobile = new Mobile_Detect();

    if(!$mobile->isiOS()){
        header('Location:admin.php');
    }
    if(!$mobile->isAndroidOS()){
        header('Location:admin.php');
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
    <h2 class="denegado">Para acceder a la interfaz de ADMIN por favor, acceda con un ordenador. :D</h2>
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
</body>
</html>