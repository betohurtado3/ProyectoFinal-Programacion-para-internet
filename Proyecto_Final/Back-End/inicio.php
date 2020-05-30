<center>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/Proyecto_Final/css/CSS.css">
    <style type="text/css"> </style>
        <title>Bienvenida</title>
    <script src="js/jquery-3.3.1.min.js"></script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
        
        <style>
            #menu ul{margin:0;padding:0;}
            #menu ul li{display:inline;margin:0 3px;}
        </style>

    </head>
    <body>
    <br>
    <br>
    <!--Body con todo el contenido -->    
        <?php
            require("isLogin.php");
            if($estado)
            {   
            ?>
                <div id="menu">
                    <ul>
                         <li><a href="inicio.php">Inicio</a></li>
                         <li> | </li>
                         <li><a href="listado.php">Administradores</a></li>
                         <li> | </li>
                         <li><a href="productos.php">Productos</a></li>
                         <li> | </li>
                         <li><a href="pedidos.php">Pedidos</a></li>
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
                    <br>
                    <br>
                    <p1>Administradores</p1>
                    <p1><br>Heriberto Hurtado Valle<br>Programación para internet</p1>
                    <br>
                    <hr>
                    <br>
                    <p1>Módulo</p1>
                    <a href="banner.php">Banners</a>
                </div>  
                        <?php
            require "conecta.php";
            $sql = "SELECT *
                    FROM banners
                    WHERE status = 1 AND eliminado = 0";
            $res = mysqli_query($con, $sql);
            $num = mysqli_num_rows($res);

          for ($i = $num; $objeto = $res->fetch_object() ; $i++)
          {
            ?>

            <table border="1" class="List">
                <tr id="<?= $objeto->id?> ">
                    <td>
                        <?= $objeto->id ?>
                    </td>
                    <td>
                        <?= $objeto->nombre ?>
                    </td>
                    <td><img width="200" src="archivos/<?= $objeto->archivo_n ?>"> </td>
                </tr>
                <a href="archivos/<?= $objeto->archivo_n ?>">
                    </a>
            </table>


        <?php
        }
        ?>
            <?php
            }
        else{
             header('Location: index.php'); 
            
            }
            ?>

    </body>
    
</html>
    </center>