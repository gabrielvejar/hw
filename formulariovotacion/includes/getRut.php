<?php 

#Conexion a base de datos
include_once "../conexionbd.php";

#Obtener rut ingresado
$rutB = $_GET['rutIngresado'];

#Query tabla votos
$queryR  = "SELECT * FROM votos";


$stmtRut= $base_de_datos->prepare($queryR);
$stmtRut->setFetchMode(PDO::FETCH_ASSOC);
$stmtRut->execute();

$contador=0;

while ($row = $stmtRut->fetch()){

    if($row['rut']==$rutB){
        $contador++;
    }
    

    }

    echo $contador;

    #Cerrar conexion
    $base_de_datos=null;

?>