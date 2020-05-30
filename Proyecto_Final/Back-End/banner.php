<!DOCTYPE html>
<center>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Registro</title>
        <link rel="stylesheet" type="text/css" href="/Proyecto_Final/css/CSS.css">
        <style type="text/css"> </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <script>
            function recibe() {
                var nam = document.forma1.nombre.value;
                var file = document.forma1.archivo.value;


                if (nam == "" || file == "") {
                    alert("Datos Incompletos")
                    return false;
                } else
                    return true;

            }

            $(document).ready(function () {
                $("#boton").on('click', function () {
                    if (recibe()) {
                        var form = $('#forma1')[0];
                        var data = new FormData(form);

                        $.ajax({
                            url: 'crea_banner.php',
                            type: 'POST',
                            dataType: 'text',
                            data: data,
                            enctype: 'multipart/form-data',
                            processData: false,
                            contentType: false,
                            cache: false,
                            success: function (res) {
                                if (res == 0) {
                                    alert('');
                                } else {
                                    location.href = "inicio.php";
                                }
                            }
                        });
                    } ///Termina if confirm ()

                });
            });
        </script>
        <style>
            .link {
                background-color: #fafafa;
                margin: 1rem;
                padding: 1rem;
                border: 1px solid #ccc;
                /* IMPORTANTE */
                text-align: center;
            }

            #menu ul {
                margin: 0;
                padding: 0;
            }

            #menu ul li {
                display: inline;
                margin: 0 3px;
            }
        </style>
    </head>

    <body>
       <br>
        <a class="link" href="inicio.php">Regresar</a>
        <br><br>
        <hr>
        <form id="forma1" name="forma1" action="crea_banner.php" enctype="multipart/form-data">
            <label>
                <hr>
                Nombre : <input id="campo1" type="text" name="nombre" placeholder="Escribe nombre del producto">
                <br><br>
                <input type="file" id="archivo" name="archivo">
                <br><br>
            </label>
            <br>
            <hr> <input id="boton" class="boton" type="button" value="Mandar">
        </form>

        <?php
            if (isset($_SESSION['user'])) {                               
                echo "<h3>Logueado como: ".$_SESSION['user']."</h3>";
                }
            ?>
        <br>
    </body>

    </html>
</center>