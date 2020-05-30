<!DOCTYPE html>
<center>
    <html>

    <head>
        <meta charset="utf-8">
        <title>Información completa</title>
        <link rel="stylesheet" type="text/css" href="/Proyecto_Final/css/CSS.css">
        <style type="text/css"> </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <?php
            require "conecta.php";
            $id = $_GET["ID"];


             $sql = "SELECT *
                            FROM administradores
                            WHERE id = '$id' AND eliminado = 0";

                $res = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($res);
        ?>

        <script>
            function recibe() {
                var user = document.forma1.nombre.value;
                var apellidos = document.forma1.apellidos.value;
                var contra = document.forma1.pass.value;
                var mail = document.forma1.correo.value;
                var rol = document.forma1.rol.value;

                if (user == "" || apellidos == "" || contra == "" || mail == "" || rol == "0") {
                    alert("Datos Incompletos")
                    return false;
                } else
                    return true;
            }

            $(document).ready(function() {
                $("#boton").on('click', function() {
                    if (recibe()) {
                        var form = $('#forma1')[0];
                        var data = new FormData(form);
                        $.ajax({
                            url: 'editar_administradores.php',
                            type: 'POST',
                            dataType: 'text',
                            data: data,
                            enctype: 'multipart/form-data',
                            processData: false,
                            contentType: false,
                            cache: false,
                            success: function(res) {
                                if (res == 0) {} else {

                                }
                            }
                        });
                    } ///Termina if confirm ()

                });
            });

        </script>
        <style>
            .list {
                text-align: center;
                background-color: azure;
                width: 50%;
            }

            .link {
                background-color: #fafafa;
                margin: 1rem;
                padding: 1rem;
                border: 1px solid #ccc;
            }

            #menu ul {
                margin: 0;
                padding: 0;
            }

            #menu ul li {
                display: inline;
                margin: 0 3px;
            }

            .info {
                width: 50%;
            }

        </style>

    </head>

    <body>
        <!--Body con contenido-->
        <?php
    require("isLogin.php");
    if($estado)
    { 
    ?>
        <h1>Información del usuario</h1>
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

        <br><br>
        <a class="link" href="listado.php">Regresar</a>
        <br><br>
        <hr>
        <br>
        <table class="info">
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Status</th>
                <th>rol</th>
                <th>Imagen</th>
            </tr>
            <tr>
                <td><?= $row['nombre'] ?> <?= $row['apellidos'] ?></td>
                <td><?= $row['correo'] ?></td>
                <td><?= $row['status'] ?></td>
                <td><?= $row['rol'] ?></td>
                <td><img width="200" src="archivos/<?= $row['archivo_n'] ?>"></td>
            </tr>
        </table>
        <?php
    }
    else{
        header('location: index.php');
    }
    ?>
    </body>

    </html>
</center>
