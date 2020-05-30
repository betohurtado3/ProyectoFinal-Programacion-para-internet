<center>
    <html>
        <head>
            <link REL="SHORTCUT ICON" href="/Proyecto_Final/iconos/home_icon_131771.ico">
           
            <link rel="stylesheet" type="text/css" href="/Proyecto_Final/css/CSS.css">
            <style type="text/css"> </style>
            <title>Index</title>
            <script src="js/jquery-3.3.1.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
            
            
       <script>
        function recibe() {
            var mail = document.forma1.correo.value;
            var contra = document.forma1.pass.value;
            if (mail == "" || contra == "")
                {
                    alert("Datos Incompletos")
                    return false;
                }

            else
                return true;
        }

        $(document).ready(function() {
            $("#boton").on('click', function() {
                if (recibe()) {
                    var form = $('#forma1')[0];
                    var data = new FormData(form);

                    $.ajax({
                        url: 'valida.php',
                        type: 'POST',
                        dataType: 'text',
                        data: data,
                        enctype: 'multipart/form-data',
                        processData: false,
                        contentType: false,
                        cache: false,
                        success: function(res) {
                            if (res == 0) 
                            {
                                alert('No existe el registro');
                            } 
                            else 
                            { 
                                location.href="inicio.php";   
                            }
                        }
                            });
                        }
                    });
                });
            </script>
            
        </head>
        <body>
            <?php
                require("isLogin.php");
                
                if($estado){
                    header('Location: inicio.php'); 
                }else{
            ?>
            <br>
            
            <form id="forma1" name="forma1" action="" method="POST">
            <h2>Iniciar Sesión</h2>
            <p>Dirección de Correo:<br>
            <input type="text" name="correo"></p>
            <p>Password: <br>
            <input type="password" name="pass"></p>
            <p class="center"><input onclick="recibe()" id="boton" class="boton" type="button" value="Iniciar Sesión"></p>
                <?php
                                    
                }
            
                ?>

            </form>
        </body>
    </html>
</center>