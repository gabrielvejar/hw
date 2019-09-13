<?php

#checkboxes falsos por defecto
$web ='f';
$tv ='f';
$rrss ='f';
$amigo ='f';

#conexion a base de datos
include_once "conexionbd.php";

#obtener valores
$nombre = $_POST["nombre"];
$alias = $_POST["alias"];
$rut = $_POST["rut"];
$email = $_POST["email"];
$region = $_POST["region"];
$comuna = $_POST["comuna"];
$candidato = $_POST["candidato"];

#checkboxes seleccionados
if(isset($_POST['web'])){
    $web = $_POST['web'];
}
if(isset($_POST['tv'])){
    $tv = $_POST['tv'];
}
if(isset($_POST['rrss'])){
    $rrss = $_POST['rrss'];
}
if(isset($_POST['amigo'])){
    $amigo = $_POST['amigo'];
}



#Se prepara la sentencia SQL
$sentencia = $base_de_datos->prepare("INSERT INTO votos(rut,nombre,alias,email,region,comuna,candidato,web,tv,rrss,amigo) VALUES (?,?,?,?,?,?,?,?,?,?,?);");
#Se ejecuta la sentencia con los valores obtenidos
$resultado = $sentencia->execute([$rut , $nombre , $alias , $email , $region , $comuna , $candidato , $web , $tv , $rrss , $amigo]);


if ($resultado === true) {
    # Redireccionar si es correcto
    $base_de_datos=null;
    header("Location: includes/success.html");
} else {
    echo "Algo salió mal.";
}

#Cerrar conexion
$base_de_datos=null;
?>