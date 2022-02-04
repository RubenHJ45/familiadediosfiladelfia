<?php

use PHPMailer\PHPMailer\{PHPMailer, SMTP, Exception};

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


if(isset($_POST['submit'])){
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $asunto = $_POST['asunto'];    
    $mensaje = $_POST['mensaje'];

    $errors = array();

    if(empty($nombre)){

        $errors[] = 'El campo nombre es obligatorio';
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

        $errors[] = 'La direccion de coreo no es valida';
    }
    if(empty($asunto)){

        $errors[] = 'El campo asunto es obligatorio';
    }
    if(empty($mensaje)){

        $errors[] = 'El campo mensaje es obligatorio';
    }

    if(count($errors) == 0){

        $msj = "De: $nombre <a href='mailto:$email'>$email</a><br>";
        $msj .= "Asunto: $asunto<br><br>";
        $msj .= "Cuerpo del mesaje:";
        $msj .= '<p>' .$mensaje. '</p>';
        $msj .= "--<p>Este mensaje se a enviado de un formulario de contacto de Familia de dios.</p>";

        $mail = new PHPMailer(true);

        try{

            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'contatofamiliadedios@gmail.com';
            $mail->Password = 'Contacto5733';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom('contatofamiliadedios@gmail.com');
            $mail->addAddress('familiadediosf@gmail.com');
            
            $mail->isHTML(true);
            $mail->Subject = 'Formulario de contacto FDD';
            $mail->Body = $msj;

            $mail->send();

            $respuesta = '!! CORREO ENVIADO !!';



        }catch(Exception $e){
            $respuesta = 'Mensaje ' . $mail->ErrorInfo;
        }
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Registro</title>
        <!-- font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <!--fuente oswal-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400&display=swap" rel="stylesheet">
        <!--Estilo css-->
        <link rel="stylesheet" href="estilo.css">
        <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
    
    <div class="contenedor">
        <nav class="nav-main">
            <img src="imagenes/logo.jpg" alt="familia-logo" class="logo"><h1 id="titulo">Familia de <b>Dios</b></h1> 
            <ul class="nav-menu">
                <li><a href="index.html">Inicio</a></li>
                <li><a href="predicas.html">Predicas</a></li> 
                <li><a href="testimonios.html">Musica</a></li>
                <li><a href="biblioteca.html">Testimonios</a></li>
                <li><a href="conocenos.html">Conocenos</a></li>
                <li><a href="donativos.html">Donativos</a></li>
                <li><a href="contacto1.php">Contacto</a></li>
                <li><a href="inicioSesion.html">Entrar</a></li>   
                <li class="container-submenu">
                    <a href="#" class="submenu-btn">Mas...</a>
                    <ul class="submenu">
                        <li class="menu-item"><a href="eventos.html" class="menu-link">Eventos</a></li>
                        <li class="menu-item"><a href="evangelizacion.html" class="menu-link">Evangelizacion</a></li>
                        <li class="menu-item"><a href="consejeria.html" class="menu-link">Consejeria</a></li>
                        <li class="menu-item"><a href="biblioteca.html" class="menu-link">Biblioteca</a></li>
                        <li class="menu-item"><a href="orientacion.html" class="menu-link">Orientacion</a></li>
                    </ul>    
            </ul>

           
            <div id="ctn-icon-search">
                <i class="fas fa-search" id="icon-search"></i>
            </div>
            <div class="menu-btn">
                <i class="fas fa-bars fa-x2"></i>
            </div>

            <ul class="nav-menu-right">
                <li><a href="#"><i class=""></i></a></li>
            </ul> 
            
        </nav>
        <hr>        

            <div id="ctn-bars-search">
                <input type="text" id="imputSearch" placeholder="¿Que deseas buscar?">
            </div>

            <ul id="box-search">
                <li><a href="index.html"><i class="fas fa-search"></i>INICIO</a></li>
                <li><a href="contacto1.php"><i class="fas fa-search"></i>CONTACTO</a></li>
                <li><a href="predicas.html"><i class="fas fa-search"></i>PREDICAS</a></li>
                <li><a href="eventos.html"><i class="fas fa-search"></i>EVENTOS</a></li>
                <li><a href="inicioSesion.html"><i class="fas fa-search"></i>ENTRAR</a></li>
                <li><a href="elpecado.html"><i class="fas fa-search"></i>PECADO</a></li>
                <li><a href="salvacion.html"><i class="fas fa-search"></i>SALVACION</a></li>
                <li><a href="farmularioRegristo.html"><i class="fas fa-search"></i>REGISTRATE</a></li>
                
            </ul>

            <div id="cover-ctn-search"></div>

     

            

            <form class="form-register"  method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                <div class="form-container">
                    <h2>Formulario Contacto</h2>
                    <label for="nombre" class="form-label">Nombre</label>
                    <input class="controls" type="text" name="nombre" id="nombre" autofocus require>

                    <label for="Asunto" class="form-label">Asunto</label>
                    <input class="controls" type="text" name="asunto" id="asunto" required>

                    <label for="email" class="form-label">Correo Electronico</label>
                    <input class="controls" type="email" name="email" id="email" required>

                    <label for="mensaje" class="form-label">Mensaje</label>
                    <textarea class="controls-text" name="mensaje" id="mensaje" cols="30" rows="5" required></textarea>                
                    
                    <input class="botons" type="submit" name="submit" value="Enviar">
                    <?php if(isset($respuesta)){ ?>
                
                <div class="validacion">
    
                    <h2 class="correo-enviado"><?php echo $respuesta; ?></h2>
    
                </div>
    
                    <?php } ?>
                    
                    <p><a href="inicioSesion.html">¿Ya tienes Cuenta?</a></p>
                    <p><a href="farmularioRegristo.html">¿Aun no tienes Cuenta?</a></p>
                </div>
            </form>

            
                
            <section class="social">
                <p>SIGUENOS EN NUESTRAS REDES</p>
                <div class="links">
                   <a href="https://www.youtube.com/channel/UCxrbxEvpzYYo1zQYhxTJzNw/featured" target="_blank">
                     <i class="fab fa-youtube"></i>
                 </a>
                 <a href="https://www.tiktok.com/@familia_de_dios" target="_blank" >
                     <i class="fab fa-tiktok"></i>
                 </a>
                 <a href="#" target="_blank" >
                     <i class="fab fa-facebook-f"></i>
                 </a>
                 <a href="contacto.html" target="_blank" >
                     <i class="fas fa-envelope"></i>
                 </a>
                 <a href="contacto.html" target="_blank" >
                     <i class="fas fa-user-circle"></i>
                 </a>
                </div>
            </section>

           
        </div>



        <script src="main.js"></script>
        <footer class="footer">
            <h2>Familia de dios Filadelfia Copyright©  2020-2023.</h2>
            <h3>Rubén Hernández Gimenéz</h3>
        </footer>
        
</body>

