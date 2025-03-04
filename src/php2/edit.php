<?php
//Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");

/*Se comprueba si se ha llegado a esta página PHP a través del formulario de edición. 
Para ello se comprueba la variable de formulario: "modifica" enviada al pulsar el botón Guardar de dicho formulario.
Los datos del formulario se acceden por el método: POST
*/



if(isset($_POST['modifica'])) {
/*Se obtienen los datos del empleado (id, nombre, apellido, edad y puesto) a partir del formulario de edición (idempleado, name, surname, age y job)  por el método POST.
Se envía a través del body del HTTP Request. No aparecen en la URL como era el caso del otro método de envío de datos: GET
Recuerda que   existen dos métodos con los que el navegador puede enviar información al servidor:
1.- Método HTTP GET. Información se envía de forma visible. A través de la URL (header HTTP Request )
En PHP los datos se administran con el array asociativo $_GET. En nuestro caso el dato del empleado se obiene a través de la clave: $_GET['idempleado']
2.- Método HTTP POST. Información se envía de forma no visible. A través del cuerpo del HTTP Request 
PHP proporciona el array asociativo $_POST para acceder a la información enviada.
*/

	$idempleado = $mysqli->real_escape_string($_POST['idempleado']);
	$name = $mysqli->real_escape_string($_POST['name']);
	$surname = $mysqli->real_escape_string($_POST['surname']);
	$age = $mysqli->real_escape_string($_POST['age']);
	$job = $mysqli->real_escape_string($_POST['job']);

/*Con mysqli_real_scape_string protege caracteres especiales en una cadena para ser usada en una sentencia SQL.
Esta función es usada para crear una cadena SQL legal que se puede usar en una sentencia SQL. 
Los caracteres codificados son NUL (ASCII 0), \n, \r, \, ', ", y Control-Z.
Ejemplo: Entrada sin escapar: "O'Reilly" contiene una comilla simple (').
Escapado con mysqli_real_escape_string(): Se convierte en "O\'Reilly", evitando que la comilla se interprete como el fin de una cadena en SQL.
*/	

//Se comprueba si existen campos del formulario vacíos
	if(empty($name) || empty($surname) || empty($age) || empty($job))	{
		if(empty($name)) {
			echo "<font color='red'>Campo nombre vacío.</font><br/>";
		}

		if(empty($surname)) {
			echo "<font color='red'>Campo apellido vacío.</font><br/>";
		}

		if(empty($age)) {
			echo "<font color='red'>Campo edad vacío.</font><br/>";
		}

		if(empty($job)) {
			echo "<font color='red'>Campo puesto vacío.</font><br/>";
		}
	} //fin si
	else //Se realiza la modificación de un registro de la BD. 
	{
		//Se actualiza el registro a modificar: update
		$mysqli->query("UPDATE empleados SET nombre = '$name', apellido = '$surname',  edad = '$age', puesto = '$job' WHERE id = $idempleado");
		$mysqli->close();
		header("Location: index.php");
	}// fin sino
}//fin si
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Electroshop S.L.</title>
</head>
<body>
<div>
	<header>
		<h1>ELECTROSHOP S.L.</h1>
	</header>
	
	<main>				
	<ul>
		<li><a href="index.php" >Inicio</a></li>
		<li><a href="add.html" >Alta</a></li>
	</ul>
	<h2>Modificación empleado/a</h2>


<?php


/*Obtiene el id del registro del empleado a modificar, idempleado, a partir de su URL. Este tipo de datos se accede utilizando el método: GET*/

//Recoge el id del empleado a modificar a través de la clave idempleado del array asociativo $_GET y lo almacena en la variable idempleado
$idempleado = $_GET['idempleado'];

//Con mysqli_real_scape_string protege caracteres especiales en una cadena para ser usada en una sentencia SQL.
$idempleado = $mysqli->real_escape_string($idempleado);




//Se selecciona el registro a modificar: select
$resultado = $mysqli->query("SELECT apellido, nombre, edad, puesto FROM empleados WHERE id = $idempleado");

//Se extrae el registro y lo guarda en el array $fila
//Nota: También se puede utilizar el método fetch_assoc de la siguiente manera: $fila = $resultado->fetch_assoc();
$fila = $resultado->fetch_array();
$surname = $fila['apellido'];
$name = $fila['nombre'];
$age = $fila['edad'];
$job = $fila['puesto'];

//Se cierra la conexión de base de datos
$mysqli->close();
?>

<!--FORMULARIO DE EDICIÓN. Al hacer click en el botón Guardar, llama a esta misma página (form action="edit.php"): edit.php
Esta misma página (edit.php), además de editar el formulario, se encargará de proceder a la modificación del registro correspondiente en la tabla de empleados.
-->

	<form action="edit.php" method="post">
		<div>
			<label for="name">Nombre</label>
			<input type="text" name="name" id="name" value="<?php echo $name;?>" required>
		</div>

		<div>
			<label for="surname">Apellido</label>
			<input type="text" name="surname" id="surname" value="<?php echo $surname;?>" required>
		</div>

		<div>
			<label for="age">Edad</label>
			<input type="number" name="age" id="age" value="<?php echo $age;?>" required>
		</div>

		<div>
			<label for="job">Puesto</label>
			<select name="job" id="job" placeholder="puesto">
				<option value="<?php echo $job;?>" selected><?php echo $job;?></option>
				<option value="Administrativo">Administrativo</option>
				<option value="Contable">Contable</option>
				<option value="Dependiente">Dependiente</option>
				<option value="Gerente">Gerente</option>
				<option value="Repartidor">Repartidor</option>
			</select>	
		</div>

		<div >
			<input type="hidden" name="idempleado" value=<?php echo $idempleado;?>>
			<input type="submit" name="modifica" value="Guardar">
			<input type="button" value="Cancelar" onclick="location.href='index.php'">
		</div>
	</form>

	</main>	
	<footer>
		Created by the IES Miguel Herrero team &copy; 2024
  	</footer>
</div>
</body>
</html>

