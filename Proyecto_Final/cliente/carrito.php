<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="/Proyecto_Final/css/cliente.css">
    <title>Carrito</title>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap" rel="stylesheet">  
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
               
    $sql = "SELECT folio FROM venta ORDER BY folio DESC LIMIT 1";
    $res = mysqli_query($con,$sql);
    $fila = mysqli_num_rows($res);

        if($fila){
          $id_venta = $res->fetch_object();
          $id_venta = $id_venta->folio;
            }
    
    $sql = "SELECT status FROM venta ORDER BY folio DESC LIMIT 1";
    $res = mysqli_query($con,$sql);
    $fila = mysqli_num_rows($res);

        if($fila){
          $status = $res->fetch_object();
          $status = $status->status;
            }
    if($status==0){
        
    
               $sql = "SELECT *
                    FROM detalle_venta
                    WHERE id_venta=$id_venta";
            $res = mysqli_query($con, $sql);
            $num = mysqli_num_rows($res);
        ?>
        <?php
          for ($i = $num; $objeto = $res->fetch_object() ; $i++)
          {
              
            ?> 
            <center>
            <table >
                        <br>
                    <td>
                        Id de venta:<br><?= $objeto->id_venta?>
                        
                    </td>
                        <br>
                    <td>
                        Id Del Producto<br><?= $objeto->id_producto ?>
                    </td>
                        <br>
                    <td>
                       Precio<br> <?= $objeto->precio ?>
                    </td>   
            </table>
                </center>
     <?php
        }
    
        }
    ?>
    <center>
     <a href="cerrar_pedido.php"><input class="boton2" type="button" value="Cerrar Pedido"></a>
     </center>
    <br>
    <br>
    <br>
    <hr>

    <div class="footer">
        <p>Derechos reservados | términos y condiciones | @betohurtado48</p>
    </div>
</body>

</html>
