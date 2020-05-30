<?php
if(!defined ('HOST')) define('HOST', 'localhost');
if(!defined ('BD')) define('BD', 'proyecto01');
if(!defined ('USER_BD')) define('USER_BD', 'root');
if(!defined ('PASS_BD')) define('PASS_BD', '');

$con = mysqli_connect(HOST,USER_BD,PASS_BD,BD) or die ("Error".mysqli_error($con));
?>

