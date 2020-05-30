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
                var name = document.forma1.nombre.value;
                var code = document.forma1.codigo.value;
                var descr = document.forma1.desc.value;
                var price = document.forma1.cost.value;
                var stk = document.forma1.stock.value;
                var pic = document.forma1.archivo.value;

                if (name == "" || code == "" || descr == "" || price == "" || stk == "0" || stk == "" ||pic == "") {
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
                            url: 'Crea_producto.php',
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
                                    location.href = "productos.php";
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
        <h1>Alta De Productos</h1>
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
        <a class="link" href="productos.php">Regresar</a>
        <br><br>
        <hr>
        <form id="forma1" name="forma1" action="Crea_administradores.php" enctype="multipart/form-data">
            <label>
                <hr>
                Nombre : <input id="campo1" type="text" name="nombre" placeholder="Escribe nombre del producto">
                <br><br>
                Codigo : <input id="campo2" type="text" name="codigo">
                <br><br>
                Descripcion : <input id="campo3" type="text" name="desc">
                <br><br>
                costo : <input id="campo4" type="number" name="cost">
                <br><br>
                stock : <input id="campo5" type="number" name="stock">
                <br>
                <br>
                <input type="file" id="archivo" name="archivo" required>
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