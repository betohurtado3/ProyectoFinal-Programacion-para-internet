<?php

require "conecta.php";

        $sql = "SELECT folio FROM venta ORDER BY folio DESC LIMIT 1";
        $res = mysqli_query($con,$sql);
        $fila = mysqli_num_rows($res);

          if($fila){
              $id_venta = $res->fetch_object();
              $id_venta = $id_venta->folio;
          }

        $sql = "UPDATE venta SET status = 1 ;";
$res = mysqli_query($con, $sql);

if ($res)
    echo 1;
else 
    echo 0;

 header("location:index.php")    ///Y se regresa a la pagina principal
    
?>


