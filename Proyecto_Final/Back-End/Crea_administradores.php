<?
require "conecta.php";
///Recibe Variables

$file_name = $_FILES['archivo']['name'];	//Nombre real del archivo
$file_tmp  = $_FILES['archivo']['tmp_name'];//Nombre temporal del archivo
$cadena    = explode(".", $file_name);		//Separa el nombre para obtener la extension
$ext       = $cadena[1];					//Extension
$dir       = "archivos/";					//carpeta donde se guardan los archivos
$file_enc  = md5_file($file_tmp);			//Nombre del archivo encriptado


$nombre     = $_POST['nombre'];
$apellidos  = $_POST['apellidos'];
$pass       = $_POST['pass'];
$correo     = $_POST['correo'];
$rol        = $_POST['rol'];

$clave_md5 = md5($pass);

$fileName1  = "$file_enc.$ext";	

//Inserta en DB
$sql = "INSERT INTO administradores VALUES (0,'$nombre','$apellidos','$correo','$clave_md5',$rol,'$fileName1','$file_name',1,0)";

$res = mysqli_query($con, $sql);

if ($file_name != '') {
	$fileName1  = "$file_enc.$ext";	
	@copy($file_tmp, $dir.$fileName1);	
}

if ($res)
    echo 1;
else 
    echo 0;

?>






mysql = venta 
    
    selext * from venta order by desc limit 1 
    ordenar en descendente y tomar el ultimo
    
    
mysql = detalle ventvar

if (pendiente = activo)
    puedo insertar 
        si al insertar ya hay un producto, se hace un update
            si no hay producto se agrega
else
    abrir otro venta