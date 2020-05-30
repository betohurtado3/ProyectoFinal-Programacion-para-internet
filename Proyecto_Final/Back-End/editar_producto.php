<?
require "conecta.php";
///Recibe Variables

$file_name = $_FILES['archivo']['name'];	//Nombre real del archivo
$file_tmp  = $_FILES['archivo']['tmp_name'];//Nombre temporal del archivo
$cadena    = explode(".", $file_name);		//Separa el nombre para obtener la extension
$ext       = $cadena[1];					//Extension
$dir       = "archivos/";					//carpeta donde se guardan los archivos
$file_enc  = md5_file($file_tmp);			//Nombre del archivo encriptado

$id = $_POST["id"];


$nombre     = $_POST['nombre'];
$codigo  = $_POST['codigo'];
$descripcion     = $_POST['desc'];
$costo     = $_POST['costo'];
$stock       = $_POST['stock'];

echo $nombre;
echo "........";
echo $codigo;
echo "........";
echo $descripcion;
echo "........";
echo $costo;
echo "........";
echo $stock;
echo "........";
echo $file_name;
echo "........";
echo $file_tmp;
echo "........";
echo $id;
echo "........";

$fileName1  = "$file_enc.$ext";	

if($file_name != "" || $file_name == "."){
   $sql = "UPDATE productos SET nombre = '$nombre', codigo = '$codigo', descripcion = '$descripcion', costo = '$costo', stock = '$stock', archivo_n = '$fileName1', archivo = '$file_name' where id = '$id'"; 
}else
{
    $sql = "UPDATE productos SET nombre = '$nombre', codigo = '$codigo', descripcion = '$descripcion', costo = '$costo', stock = '$stock' where id = '$id'"; 
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