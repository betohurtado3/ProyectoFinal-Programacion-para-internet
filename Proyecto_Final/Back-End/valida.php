<?php
session_start();
require ("conecta.php");

$mail = $_POST["correo"];
$pass = $_POST["pass"];

$clave_md5 = md5($pass);



$sql = "SELECT * FROM administradores WHERE correo = '$mail' AND pass ='$clave_md5' AND eliminado = '0' ";
$res = mysqli_query($con,$sql);
$fila = mysqli_num_rows($res);

if($fila==0){
    
    echo 0; //Si no genera resultados
}

else{
    $row = mysqli_fetch_assoc($res);
    $nomU = $row['nombre'].' '.$row['apellidos'];
    $_SESSION['user'] = $nomU;
    echo 1;
}
?>  
