<!DOCTYPE html>
<center>
    <html>

    <head>
        <meta charset="utf-8">
        <title>Información completa</title>
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
        <a class="link" href="pedidos.php">Regresar</a>
        <br><br>
        <hr>

                               <?php
         $folio = $_GET["FOLIO"];
            require "conecta.php";
            $sql = "SELECT *
                    FROM detalle_venta
                    WHERE id_venta = $folio  ";
            $res = mysqli_query($con, $sql);
            $num = mysqli_num_rows($res);

          for ($i = $num; $objeto = $res->fetch_object() ; $i++)
          {
            ?>

            <table border="1" class="List">
                   <tr>
                    <th>Id Venta</th>
                    <th>ID PRODUCTO</th>
                    <th>PRECIO</th>
                    <th>CANTIDAD</th>

                    </tr>
                    <td>
                        <?= $objeto->id_venta ?>
                    </td>
                    <td>
                        <?= $objeto->id_producto ?>
                    </td>
                    <td>
                        <?= $objeto->precio ?>
                    </td>   
                    <td>
                         <?= $objeto->cantidad ?>
                    </td>    
            </table>
            <br>           
        <?php
        }  
        $sql = "SELECT SUM(precio) as total FROM detalle_venta WHERE id_venta = $folio";
        $res = mysqli_query($con,$sql);
        $total = mysqli_num_rows($res);

        if($total){
              $total = $res->fetch_object();
              $total = $total->total;
          }
        echo "<br />";
        echo "Subtotal: ";
        echo $total;
        echo "<br />";
        echo "<br />";
        echo "Total: ";
        $coniva = $total * 0.16; 
        $total = $total + $coniva;
        echo $total;
        
        echo "<br />";
        echo "<br />";echo "<br />";
        echo "<br />";
        echo "<br />";
        echo "Se hace una multiplicacion del subtotal por 0.16";
        echo "<br />";
        echo "y el resultado se le agrega al subtotal";
        
        ?>
        <br>
        <?php
    }
    else{
        header('location: index.php');
    }
    ?>
    </body>

    </html>
</center>
