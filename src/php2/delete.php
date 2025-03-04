<?php
//Incluye fichero con parámetros de conexión a la base de datos
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baja empleado/a</title>
</head>
<body>
<div>
	<header>
		<h1>ELECTROSHOP S.L.</h1>
	</header>
	<main>

<?php
/*Obtiene el id del registro del empleado a eliminar, idempleado, a partir de su URL. Se recibe el dato utilizando el método: GET 
Recuerda que   existen dos métodos con los que el navegador puede enviar información al servidor:
1.- Método HTTP GET. Información se envía de forma visible. A través de la URL (header HTTP Request )
En PHP los datos se administran con el array asociativo $_GET. En nuestro caso el dato del empleado se obiene a través de la clave: $_GET['idempleado']
2.- Método HTTP POST. Información se envía de forma no visible. A través del cuerpo del HTTP Request 
PHP proporciona el array asociativo $_POST para acceder a la información enviada.
*/

//Recoge el id del empleado a eliminar a través de la clave idempleado del array asociativo $_GET y lo almacena en la variable idempleado
$idempleado = $_GET['idempleado'];

//Con mysqli_real_scape_string protege caracteres especiales en una cadena para ser usada en una sentencia SQL.
$idempleado = $mysqli->real_escape_string($idempleado);

//Se realiza el borrado del registro: delete.
$result = $mysqli->query("DELETE FROM empleados WHERE id = $idempleado");

//Se cierra la conexión de base de datos previamente abierta
$mysqli->close();

//Se redirige a la página principal: index.php
//header("Location:index.php");
?>

    <div>Registro borrado correctamente...</div>
	<a href='index.php'>Ver resultado</a>
    </main>
</div>
</body>
</html>

