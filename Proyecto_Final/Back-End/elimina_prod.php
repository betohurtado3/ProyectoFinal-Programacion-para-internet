<?
require "conecta.php";
$id = $_POST["id"];

//$sql = "DELETE FROM administradores WHERE id = $id";
$sql = "UPDATE productos
        Set eliminado = 1 Where id = $id";
$res = mysqli_query($con,$sql);
if ($res)
    echo 1;
else 
    echo 0;
?>