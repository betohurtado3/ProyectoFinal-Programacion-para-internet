<?php
    $result="";
    if(isset($_POST['submit'])){
        require 'phpmailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host='smtp.gmail.com';
        $mail->Port=587;
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='tls';
        $mail->Username='b.hurtado1998@gmail.com';
        $mail->Password='Lecheconcereal123';
        
        $mail->setFrom($_POST['email'],$_POST['nombre']);
        $mail->addAddress('b.hurtado1998@gmail.com');
        $mail->addReplyTo($_POST['email'],$_POST['nombre']);
        
        $mail->isHTML(true);
        $mail->Subject='Enviado por '.$_POST['nombre'];
        $mail->Body='<h1 align=center>Nombre: '.$_POST['nombre'].'<br>Email'.$_POST['email'].'<br>Mensaje: '.$_POST['mensaje'].'</h1>';
        
        if(!$mail->send()){
            $result="Algo esta mal, intentelo de nuevo";
        }
        else
        {
            $result = "Gracias";
        }
    }
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="/Proyecto_Final/css/cliente.css">
    <title>Contacto</title>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap" rel="stylesheet">

           <script>
            function recibe() {
                var user = document.forma1.nombre.value;
                var apellidos = document.forma1.apellidos.value;
                var mail = document.forma1.correo.value;
                var message = document.forma1.texto.value;

                if (user == "" || apellidos == ""  || mail == "" || message == "0") {
                    alert("Datos Incompletos")
                    return false;
                } else
                    return true;

            }
        </script> 

    <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: rgb(0, 0, 255);
            color: white;
            text-align: center;
        }

    </style>
</head>

<body>
    <ul class="menu">
        <li> <a href="index.php">Home</a></li>
        <li> <a href="productos.php">Productos</a></li>
        <li> <a href="contacto.php">Contacto</a></li>
        <li> <a href="carrito.php">Carrito</a></li>
    </ul>
    <br>
    <br>
    <br>
    <?php

        $a=rand(10,15);
            require "conecta.php";
            $sql = "SELECT *
                    FROM banners
                    WHERE id=$a AND status = 1 AND eliminado = 0";
            $res = mysqli_query($con, $sql);
            $num = mysqli_num_rows($res);
            $objeto = $res->fetch_object()
            ?>
    <table class="List">
        <tr id="<?= $objeto->id?> ">
            <td><img width="400" src="../Back-End/archivos/<?= $objeto->archivo_n ?>"> </td>
        </tr>
        <a href="archivos/<?= $objeto->archivo_n ?>">
        </a>
    </table>
    <?php     
        ?>

    <center>
    <div class="upcont">
        <section class="l-section s-100 contac" id="">
            <div class="contac__content">
                <h1 class="center-content">Envío de correo con PHP, SMTP y PHPMailer.</h1>
            </div>
        </section>
    </div>
    <section class="l-section cont">
        <div class="espcont center-content center-block">
            <div class="espform s-30 center-block center-content">
                <form action="" method="post">
                    <div class="espnom">
                        <label for="nombre">Nombre y primer apellido</label>
                        <input id="nombre" name="nombre" type="text"  maxlength="50" data-length="50" required />
                    </div>
                    <div class="espema">
                        <label for="email">E-mail</label>
                        <input id="email" name="email" type="email"  maxlength="50" data-length="50" required />
                    </div>
                    <div class="espmen">
                        <label for="titmensaje">Mensaje</label>
                        <div class="alturaMensa">
                            <textarea name="mensaje" id="mensaje" class="ESPmensaje center-content" required></textarea>
                        </div>
                    </div>
                    <div class="espenv">
                        <button type="submit" name="submit">Enviar</button>
                        <h5 class="notifCorrecto"></h5>
                    </div>
                </form>
                <section class="btn-in-con" id="btn-in">
                    <a href="../index.html">Regresar</a>
                </section>                    
            </div> 
        </div>                     
    </section>
    </center>
    <div class="footer">
        <p>Derechos reservados | términos y condiciones | @betohurtado48</p>
    </div>
</body>

</html>
