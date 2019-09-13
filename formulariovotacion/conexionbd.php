<?php 

$host = "localhost";
$port = "5432";
$dbname = "gvejar";
$user = "postgres";
$password = "admin";

try{

    $base_de_datos = new PDO ("pgsql:host=$host;port=$port;dbname=$dbname",$user,$password);
   

}catch(PDOException $e){
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}

?>