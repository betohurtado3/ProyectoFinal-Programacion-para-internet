<?
require "conecta.php";

$id = $_POST["id"];
$nombre = $_POST["name"];
$value = $_POST["valor"];

ini_set('date.timezone','America/Mexico_City'); ///Esta es una funcion que toma la direccion geografica
$time = date('Y-m-d', time());                  ///y en una variable, ingresa la fecha
    
$a=rand(1,100);

$sql = "SELECT status FROM venta ORDER BY folio DESC LIMIT 1";
$res = mysqli_query($con,$sql);
$fila = mysqli_num_rows($res);
   
if($fila){
      $status = $res->fetch_object();
      $status = $status->status;
  }

if($status==0)
{
    $sql = "SELECT folio FROM venta ORDER BY folio DESC LIMIT 1";
$res = mysqli_query($con,$sql);
$fila = mysqli_num_rows($res);
   
  if($fila){
      $id_venta = $res->fetch_object();
      $id_venta = $id_venta->folio;
  }

$sql = "INSERT INTO detalle_venta VALUES ('$id_venta','$id','$value','1')";
    
}
else
    {
      $sql = "INSERT INTO venta VALUES (0,'$time','$a','0')";
    
    $res = mysqli_query($con, $sql);

            $sql = "SELECT folio FROM venta ORDER BY folio DESC LIMIT 1";
        $res = mysqli_query($con,$sql);
        $fila = mysqli_num_rows($res);

          if($fila){
              $id_venta = $res->fetch_object();
              $id_venta = $id_venta->folio;
          }

        $sql = "INSERT INTO detalle_venta VALUES ('$id_venta','$id','$value','1')";

    }

$res = mysqli_query($con, $sql);



if ($res)
    echo 1;
else 
    echo 0;
    

?>