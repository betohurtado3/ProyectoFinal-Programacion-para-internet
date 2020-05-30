<center>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/Proyecto_Final/css/CSS.css">
    <style type="text/css"> </style>
        <title>Listado</title>
    <script src="js/jquery-3.3.1.min.js"></script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
        <script>        
            $(document).ready(function(){
                $('.boton').click(function(){
                    var fila = $(this).parent().parent().attr("id");
                    if(confirm('Borrar registro Num: '+fila+'?')){
                    $(this).parent().parent().fadeOut();
                    $.ajax({
                       url  : 'elimina_administradores.php',
                        type : 'post',
                        dataType : 'text',
                        data : 'id=' +fila,
                        success :function(res){
                            if(res == 0){
                                alert ('Error para eliminar');
                            }
                        } ,error: function () {
                            alert ('No se puede conectar al servidor');
                        }
                    });///Termina ajax ()
                }///Termina if confirm ()
                });  
            });
        </script>
        
        <style>  
        .list{
            text-align:center;
            background-color:azure;
            width: 50%;
            }
            
                .link{
              background-color: #fafafa;
              margin: 1rem;
              padding: 1rem;
              border: 1px solid #ccc;
            }
            
            #menu ul{margin:0;padding:0;}
            #menu ul li{display:inline;margin:0 3px;}
        </style>

    </head>
    <body>
        <!---Body con todo el contenido -->
        <?php
        require("isLogin.php");
        if($estado)
        { 
        ?>    
        <h1 align=center>Lista De Administradores</h1>
        
        <!-- Menu -->
        <br>
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
        </div>
        
        <br><br>
        <a class="link"href="Formulario.php">Registrar</a>
        <br><br><hr>

        <?php
            require "conecta.php";
            $sql = "SELECT *
                    FROM administradores
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
                    <td>
                        <?= $objeto->apellidos ?>
                    </td>
                    <td><input class="boton" type="button" value="eliminar"/><br></td>
                    
                    <td>
                        <a href="FormularioEdit.php?ID=<?=$objeto->id?>"><input class="boton2" type="button" value="editar"/></a>   
                    </td>    
                    <td>
                        <a href="listComp_administradores.php?ID=<?=$objeto->id?>"><input class="boton2" type="button" value="info completa"/></a>   
                    </td>    
                </tr>
            </table>


        <?php
        }
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