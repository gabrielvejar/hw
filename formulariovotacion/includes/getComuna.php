<?php 

#Conexion a base de datos
include_once "../conexionbd.php";

#Obtener region seleccionada
$id_region = $_POST['id_region'];

#Query comunas filtrado por region seleccionada
$queryC  = "SELECT id, name FROM comunas WHERE region_id='$id_region' ORDER BY name ASC";


$stmtComunas = $base_de_datos->prepare($queryC);
$stmtComunas->setFetchMode(PDO::FETCH_ASSOC);
$stmtComunas->execute();

$html = "<option value='0'></option>";

while ($row = $stmtComunas->fetch()){

    $html .= "<option value='".$row['id']."'>".$row['name']."</option>";

    }

    echo $html;

    #Cerrar conexion
    $base_de_datos=null;
    
?>