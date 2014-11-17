<?php

session_start();
//VARIABLE DEL FORMULARIO
require_once './conex.php';
conectar();
$usuario = addslashes($_POST["usuario"]);
$clave   = addslashes($_POST["clave"]);
$query   = "SELECT * FROM usuarios WHERE usuario='$usuario'  and contrasena='$clave'";
$result  = mysql_query($query);
$total   = mysql_num_rows($result);
if ($total == 0) {
    echo 0;
    exit;
} else {
    $array = mysql_fetch_assoc($result);
    $_SESSION["usuario"]    = $usuario;
    $_SESSION["contrasena"] = $clave;
    $_SESSION["apellido"]   = $array["apellido"];
    $_SESSION["nivel"]      = $array["nivel"];
    $_SESSION["nombre"]     = $array["nombre"];
    $_SESSION["estatus"]    = $array["estatus"];
    $_SESSION["email"]      = $array["email"];
    $_SESSION["cod_usu"]    = $array["cod_usu"];
    echo 1;
}