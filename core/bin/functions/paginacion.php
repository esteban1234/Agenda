<?php
// Conexion BD
$db = new Conexion();

//Evitamos que salgan errores por variables vacías
error_reporting(E_ALL ^ E_NOTICE);

//Cantidad de resultados por página (debe ser INT, no string/varchar)
$cantidad_resultados_por_pagina = 3;

//Comprueba si está seteado el GET de HTTP
if (isset($_GET["pagina"])) {

	//Si el GET de HTTP SÍ es una string / cadena, procede
	if (is_string($_GET["pagina"])) {

		//Si la string es numérica, define la variable 'pagina'
		 if (is_numeric($_GET["pagina"])) {

			 //Si la petición desde la paginación es la página uno
			 //en lugar de ir a 'index.php?pagina=1' se iría directamente a 'index.php'
			 if ($_GET["pagina"] == 1) {
				 header("Location: ?view=lista");
				 die();
			 } else { //Si la petición desde la paginación no es para ir a la pagina 1, va a la que sea
				 $pagina = $_GET["pagina"];
			};

		 } else { //Si la string no es numérica, redirige al index (por ejemplo: index.php?pagina=AAA)
			 header("Location: ?view=lista");
			die();
		 };
	};

} else { //Si el GET de HTTP no está seteado, lleva a la primera página (puede ser cambiado al index.php o lo que sea)
	$pagina = 1;
};

//Define el número 0 para empezar a paginar multiplicado por la cantidad de resultados por página
$empezar_desde = ($pagina-1) * $cantidad_resultados_por_pagina;


//Obtiene TODO de la tabla
// $db->query("SELECT * FROM usuario;");
$datos = $db->query("SELECT * FROM agregar;");

//Realiza la consulta
// $consulta_todo = mysqli_query($conexion, $obtener_todo_BD);

//Cuenta el número total de registros
// $db->runs($sql)
$total_registros = $db->rows($datos);

//Obtiene el total de páginas existentes
$total_paginas = ceil($total_registros / $cantidad_resultados_por_pagina);

//Realiza la consulta en el orden de ID ascendente (cambiar "id" por, por ejemplo, "nombre" o "edad", alfabéticamente, etc.)
//Limitada por la cantidad de cantidad por página
$consulta_resultados = mysqli_query($conexion, "
SELECT * FROM `mmv004`
ORDER BY `mmv004`.`id` ASC
LIMIT $empezar_desde, $cantidad_resultados_por_pagina");

$consulta_resultados = $db->query("SELECT * FROM agregar ORDER BY id ASC LIMIT $empezar_desde, $cantidad_resultados_por_pagina;");

//Crea un bluce 'while' y define a la variable 'datos' ($datos) como clave del array
//que mostrará los resultados por nombre
while($datos = $db->runs($consulta_resultados)) {
?>

<span class="persona">
<p><strong><?php echo $datos['nombre']; ?></strong> <br>
<?php echo $datos['edad']; ?></p>
</span>
?>
