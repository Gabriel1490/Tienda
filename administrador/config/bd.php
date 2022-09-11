<?php
$host="localhost";
$bd="tiendaropa";
$usuario="root";
$contraseña="";


$conexion  = new mysqli($host, $usuario, $contraseña, $bd);
if ($conexion->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
}
// try{
// $conexion= new PDO("mysql:host=$host;dbname=$bd", $usuario,$contraseña);
// if($conexion){echo "Conectado a sistema";}
// } catch(Exception $ex){
//     echo $ex->getMessage();
// }
?>