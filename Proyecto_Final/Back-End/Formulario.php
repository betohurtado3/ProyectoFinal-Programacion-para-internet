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
                var user = document.forma1.nombre.value;
                var apellidos = document.forma1.apellidos.value;
                var contra = document.forma1.pass.value;
                var mail = document.forma1.correo.value;
                var rol = document.forma1.rol.value;
                var pic = document.forma1.archivo.value;

                if (user == "" || apellidos == "" || contra == "" || mail == "" || rol == "0" || pic == "") {
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
                            url: 'Crea_administradores.php',
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
                                    location.href = "listado.php";
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
        <h1>Alta De administradores</h1>
        <br>
        <div id="menu">
            <ul>
                <li><a href="inicio.php">Inicio</a></li>
                <li> | </li>
                <li><a href="listado.php">Administradores</a></li>
                <li> | </li>
                <li><a href="productos.php">Productos</a></li>
                <li> | </li>
                <li><a href="#">Pedidos</a></li>
                <li> | </li>
                <li> <?php
            session_start();
            if (isset($_SESSION['user'])) {                               
            echo "".$_SESSION['user'];
            }
            ?>
                </li>
                <li> | </li>
                <li>
                    <a href="cerrar.php"><input class="boton2" type="button" value="Cerrar Sesión">
                    </a>
                </li>
            </ul>
        </div>
        <br>
        <br>
        <br><br>
        <hr>
        <form id="forma1" name="forma1"  enctype="multipart/form-data">
            <label>
                <hr>
                Nombre : <input id="campo1" type="text" name="nombre" placeholder="Escribe tu nombre">
                <br><br>
                Apellidos : <input id="campo2" type="text" name="apellidos" placeholder="Escribe Tu apellido">
                <br><br>
                Contraseña : <input id="campo3" type="password" name="pass">
                <br><br>
                Correo : <input id="campo4" type="text" name="correo" placeholder="Escribe tu Correo">
                <br><br>
                <label for="Rol"></label>
                <select name="rol">
                    <option value="0" selected>Selecciona un rol</option>
                    <option value="1">Gerente</option>
                    <option value="2">Ejecutivo</option>
                </select>
                
                <input type="file" id="archivo" name="archivo" required><br><br>
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
        <a class="link" href="listado.php">Regresar</a>
    </body>

    </html>
</center>