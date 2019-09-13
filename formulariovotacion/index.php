<?php 
#Abrir conexión
include_once "conexionbd.php";

//Query Regiones
$queryR  = 'SELECT id, name FROM regiones  ORDER BY name ASC ';

$stmtRegiones = $base_de_datos->prepare($queryR);
$stmtRegiones->setFetchMode(PDO::FETCH_ASSOC);
$stmtRegiones->execute();

//Query Candidatos
$queryCandidatos  = 'SELECT id, name FROM candidatos  ORDER BY id ASC ';

$stmtCandidatos = $base_de_datos->prepare($queryCandidatos);
$stmtCandidatos->setFetchMode(PDO::FETCH_ASSOC);
$stmtCandidatos->execute();

#Cerrar conexion
$base_de_datos=null;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario de votación</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="contenedor">
        <form action="votar.php" name="formulario" method="POST">
            <legend><h1>FORMULARIO DE VOTACION</h1></legend>
            <table>
                <tbody>

                    <tr>
                        <td><label for="nombre">Nombre y Apellido</label></td>
                        <td><input type="text" name="nombre" id="nombre" required></td>
                    </tr>
                    <tr>
                        <td><label for="alias">Alias</label></td>
                        <td><input type="text" name="alias" id="alias" required></td>
                    </tr>
                    <tr>
                        <td><label for="rut">RUT</label></td>
                        <td><input type="text" name="rut" id="rut" required oninput="checkRut(this)"></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email</label></td>
                        <td><input type="email" name="email" id="email" required></td>
                    </tr>
                    <tr>
                        <td><label for="region">Región</label></td>
                        <td> 
                            <select name="region" id="region">
                                <option value="0"></option>

                                <?php //Relleno de regiones desde base de datos ?>
                                <?php  while ($row = $stmtRegiones->fetch()){ ?>

                                    <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>

                                    <?php } ?>

                            </select> 
                        </td>
                    </tr>
                    <tr>
                        <td><label for="comuna">Comuna</label></td>
                        <td> 
                            <select name="comuna" id="comuna">
                            <?php //Se rellena automaticamente al seleccionar región ?>
                            </select> 
                        </td>
                    </tr>
                    <tr>
                        <td><label for="candidato">Candidato</label></td>
                        <td> 
                            <select name="candidato" id="candidato">
                                <option value="0"></option>

                                <?php //Relleno de candidatos desde base de datos ?>
                                <?php  while ($row = $stmtCandidatos->fetch()){ ?>

                                <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>

                                <?php } ?>

                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="conocio">Cómo se enteró de nosotros</label>
                        </td>
                        <td>
                                <input type="checkbox" class="chk" name="web" value="t"> Web
                                <input type="checkbox" class="chk" name="tv" value="t"> TV
                                <input type="checkbox" class="chk" name="rrss" value="t"> Redes Sociales
                                <input type="checkbox" class="chk" name="amigo" value="t"> Amigo
                        </td>
                    </tr>



                </tbody>

            </table>
            <div id="errores"></div>
            <div id="disp_alias"></div>

            <input type="submit" id="btn" value="Votar">


        </form>
    </div>



    
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    <script src="js/regionesComunas.js"></script>
    <script src="js/validarRUT.js"></script>
    <script src="js/validacion.js"></script>

</body>
</html>