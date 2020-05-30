<?
require "conecta.php";
///Recibe Variables

$file_name = $_FILES['archivo']['name'];	//Nombre real del archivo
$file_tmp  = $_FILES['archivo']['tmp_name'];//Nombre temporal del archivo
$cadena    = explode(".", $file_name);		//Separa el nombre para obtener la extension
$ext       = $cadena[1];					//Extension
$dir       = "archivos/";					//carpeta donde se guardan los archivos
$file_enc  = md5_file($file_tmp);			//Nombre del archivo encriptado

$id         = $_POST["id"];

$nombre     = $_POST['nombre'];
$apellidos  = $_POST['apellidos'];
$pass       = $_POST['pass'];
$correo     = $_POST['correo'];
$rol        = $_POST['rol'];

$clave_md5 = md5($pass);

$fileName1  = "$file_enc.$ext";	



$contra = $pass;
$clave_md5 = md5($pass);


if($contra != "")
{
  $sql = "UPDATE administradores SET nombre = '$nombre', apellidos = '$apellidos', correo = '$correo', pass = '$clave_md5', rol = '$rol' Where id = $id"; 
    
    if($file_name != "" || $file_name == ".")
    {
        $sql = "UPDATE administradores SET nombre = '$nombre', apellidos = '$apellidos', correo = '$correo', pass = '$clave_md5', rol = '$rol', archivo_n = '$fileName1', archivo = '$file_name' Where id = $id";  
    }
    else{
       $sql = "UPDATE administradores SET nombre = '$nombre', apellidos = '$apellidos', correo = '$correo', pass = '$clave_md5', rol = '$rol' Where id = $id";
        }
}

if($contra == "")
{
     $sql = "UPDATE administradores SET nombre = '$nombre', apellidos = '$apellidos', correo = '$correo', rol = '$rol' Where id = $id";
    
    if($file_name != "" || $file_name == ".")
        {
            $sql = "UPDATE administradores SET nombre = '$nombre', apellidos = '$apellidos', correo = '$correo', rol = '$rol', archivo_n = '$fileName1', archivo = '$file_name' Where id = $id";  
        }
    else{
       $sql = "UPDATE administradores SET nombre = '$nombre', apellidos = '$apellidos',
            correo = '$correo', rol = '$rol' Where id = $id";
        }
}


if ($file_name != '') {
	$fileName1  = "$file_enc.$ext";	
	@copy($file_tmp, $dir.$fileName1);	
}
        
$res = mysqli_query($con,$sql);
if ($res)
    echo 1;
else 
    echo 0;
?>