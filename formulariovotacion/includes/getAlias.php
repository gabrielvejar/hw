<?php 

#Conexion a base de datos
include_once "../conexionbd.php";

#Obtener alias ingresado
$aliasB = $_GET['aliasIngresado'];

#Query tabla votos
$queryA  = "SELECT * FROM votos";


$stmtAlias= $base_de_datos->prepare($queryA);
$stmtAlias->setFetchMode(PDO::FETCH_ASSOC);
$stmtAlias->execute();

$contador=0;

while ($row = $stmtAlias->fetch()){

    if($row['alias']==$aliasB){
        $contador++;
    }
    

    }

    echo $contador;
    
    #Cerrar conexion
    $base_de_datos=null;

?>