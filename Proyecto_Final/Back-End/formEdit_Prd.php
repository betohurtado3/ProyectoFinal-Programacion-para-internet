<center>
    <html>

    <head>
        <meta charset="utf-8">
        <title>Edición</title>
        <link rel="stylesheet" type="text/css" href="/Proyecto_Final/css/CSS.css">
        <style type="text/css"></style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <?php require "conecta.php";
            $id=$_GET["ID"];

            $sql="SELECT * FROM productos WHERE id='$id'AND eliminado=0";

            $res=mysqli_query($con, $sql);
            $row=mysqli_fetch_assoc($res);

            ?>
        <script>
            function recibe() {
                var name = document.forma1.nombre.value;
                var code = document.forma1.codigo.value;
                var desc = document.forma1.desc.value;
                var costo = document.forma1.costo.value;

                if (name == "") {
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

                                        url: 'editar_producto.php',
                                        type: 'POST',
                                        dataType: 'text',
                                        data: data,
                                        enctype: 'multipart/form-data',
                                        processData: false,
                                        contentType: false,
                                        cache: false,
                                        success: function(res) {
                                            if (res == 0) {} else {
                                                location.href = "productos.php";
                                            }
                                        }
                                    }

                                );
                            }

                            ///Termina if confirm ()

                        }

                    );
                }

            );

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

        </style>
    </head>

    <body>
        <!--body con el contenido para editar-->
        <?php require("isLogin.php");

            if($estado) {
                ?><h1>Editar Productos</h1>
        <div id="menu">
            <ul>
                <li><a href="inicio.php">Inicio</a></li>
                <li>| </li>
                <li><a href="listado.php">Administradores</a></li>
                <li>| </li>
                <li><a href="productos.php">Productos</a></li>
                <li>| </li>
                <li><a href="#">Pedidos</a></li>
                <li>| </li>
                <li><?php if (isset($_SESSION['user'])) {
                    echo "".$_SESSION['user'];
                }

                ?></li>
                <li>| </li>
                <li><a href="cerrar.php"><input class="boton2" type="button" value="Cerrar Sesión"></a></li>
            </ul>
        </div><br><br><a class="link" href="productos.php">Regresar</a><br><br>
        <hr>
        <form id="forma1" name="forma1" action="vaFotoProd.php" enctype="multipart/form-data">
               <label>
                <hr>
                    <input id="Campo0" type="text" name="id" style="display:none" value="<?= $id ?>">
                    Nombre : <input id="campo1" type="text" name="nombre" value="<?= $row['nombre'] ?>">
                    <br><br>
                    codigo:<input id="campo2" type="text" name="codigo" value="<?= $row['codigo'] ?>">
                    <br>
                    <br>
                    Descripcion : <input id="campo3" type="text" name="desc" value="<?= $row['descripcion'] ?>">
                    <br>
                    <br>
                    costo : <input id="campo4" type="number" name="costo" value="<?= $row['costo'] ?>">
                    <br>
                    <br>
                    stock : <input id="campo4" type="number" name="stock" value="<?= $row['stock'] ?>">
                    <br>
                    <br>
                    <br>
                    </label>
                <td>
                <br>
                <br>
                Foto actual:<br><img width="200" src="archivos/<?= $row['archivo_n'] ?>"></td>
                <br>
                <input type="file" id="archivo" name="archivo" value>
                <br>
                <hr>
                <input id="boton" class="boton" type="button" value="Mandar">
        </form>
                   <?php if (isset($_SESSION['user'])) {
                    echo "<h3>Logueado como: ".$_SESSION['user']."</h3>";
                }

                ?><br><?php
            }

            else {
                header('location: index.php');
            }

            ?>
    </body>

    </html>
</center>
