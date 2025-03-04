<?php
//Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Velvet Maillots</title>
</head>
<body>
<div>
	<header>
		<h1>Velvet Maillots</h1>
	</header>
	
	<main>				
	<ul>
		<li><a href="index.php" >Inicio</a></li>
		<li><a href="add.html" >Alta</a></li>
	</ul>
	<h2>Modificación maillot</h2>


<?php


/*Obtiene el id del registro del empleado a modificar, idempleado, a partir de su URL. Este tipo de datos se accede utilizando el método: GET*/

//Recoge el id del empleado a modificar a través de la clave idempleado del array asociativo $_GET y lo almacena en la variable idempleado
$idempleado = $_GET['idempleado'];

//Con mysqli_real_scape_string protege caracteres especiales en una cadena para ser usada en una sentencia SQL.
$idempleado = $mysqli->real_escape_string($idempleado);


//Se selecciona el registro a modificar: select
$resultado = $mysqli->query("SELECT nombre, categoria, talla, precio, stock, descripcion FROM maillots WHERE maillot_id = $idempleado");

//Se extrae el registro y lo guarda en el array $fila
//Nota: También se puede utilizar el método fetch_assoc de la siguiente manera: $fila = $resultado->fetch_assoc();
$fila = $resultado->fetch_array();
$nombre = $fila['nombre'];
$categoria = $fila['categoria'];
$talla = $fila['talla'];
$precio = $fila['precio'];
$stock = $fila['stock'];
$descripcion = $fila['descripcion'];

//Se cierra la conexión de base de datos
$mysqli->close();
?>

<!--FORMULARIO DE EDICIÓN. Al hacer click en el botón Guardar, llama a la página (form action="edit_action.php"): edit_action.php
-->

	<form action="edit_action.php" method="post">
		<div>
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" id="nombre" value="<?php echo $nombre;?>" required>
		</div>

		<div>
			<label for="categoria">Categoria</label>
			<select name="categoria" id="categoria" placeholder="categoria">
				<option value="<?php echo $categoria;?>" selected><?php echo $categoria;?></option>
				<option value="Gimnasia">Gimnasia Ritmica</option>
				<option value="Patinaje">Patinaje</option>
				<option value="Acrobatica">Acrobática</option>
			</select>	
		</div>
		<div>
		    <label for="talla">Talla</label>
			<select name="talla" id="talla" placeholder="talla">
				<option value="<?php echo $talla;?>" selected><?php echo $talla;?></option>
			    <option value="XS">XS</option>
				<option value="S">S</option>
				<option value="M">M</option>
				<option value="L">L</option>
				<option value="XL">XL</option>
		</div>
		<div>
			<label for="precio">Precio</label>
			<input type="number" name="precio" id="precio" value="<?php echo $precio;?>" required>
		</div>
		<div>
			<label for="stock">Stock</label>
			<input type="number" name="stock" id="stock" value="<?php echo $stock;?>" required>
		</div>
		<div>
			<label for="descripcion">Descripcion</label>
			<input type="text" name="descripcion" id="descripcion" value="<?php echo $descripcion;?>" required>
		</div>

		<div >
			<input type="hidden" name="idempleado" value=<?php echo $idempleado;?>>
			<input type="submit" name="modifica" value="Guardar">
			<input type="button" value="Cancelar" onclick="location.href='index.php'">
		</div>
	</form>
	</main>	
	<footer>
		Created by Laura Alonso &copy; 2024
  	</footer>
</div>
</body>
</html>

