<?
require "conecta.php";

$file_name = $_FILES['archivo']['name'];

$file_tmp = $_FILES['archivo']['tmp_name'];

$cadena = explode(".",$file_name);

$ext = $cadena[1];
$dir = "archivos/";
$file_enc = md5_file($file_tmp);

$nombre = $_POST['nombre'];
$fileName1  = "$file_enc.$ext";	

$sql = "INSERT INTO banners VALUES (0,'$nombre','$file_name','$fileName1','1',0)";

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