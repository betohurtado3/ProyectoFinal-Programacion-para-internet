<?php
    session_start();

    $estado = false;

    if(isset($_SESSION['user']))
    {
        $estado = true;
        
    }

?>