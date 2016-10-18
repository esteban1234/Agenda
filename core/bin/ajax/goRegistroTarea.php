<?php

$db         = new Conexion();
$user       = $_POST['user'];
$venta      = $_POST['venta'];
$zona       = $_POST['zona'];
$comision   = $_POST['comision'];
$fecha_alta = date('Y-m-d');
date_default_timezone_set("America/Lima");
$hora = date('H:i:s');
// $hora =

$sql = $db->query("INSERT INTO cataage(NOM_AGE,VTA_AGE,NUM_ZON,POR_COM,FEC_HA,HOR_A,CLA_USR)
			VALUES ('$user','$venta','$zona','$comision','$fecha_alta','$hora','SUP')");

if ($sql) {
    $html = '<div class="alert alert-dismissible alert-success">
	  			  <button type="button" class="close" data-dismiss="alert">&times;</button>
	              <strong>Datos</strong> guardados Correctamente.
	              </div>';
} else {
    $html = '<div class="alert alert-dismissible alert-danger">
	  			  <button type="button" class="close" data-dismiss="alert">&times;</button>
	              <strong>Error</strong> al guardar los datos.
	              </div>';
}

$db->close();

else{
    $html = '<div class="alert alert-dismissible alert-danger">
	  			  <button type="button" class="close" data-dismiss="alert">&times;</button>
	              <strong>Error</strong> Todos los campos deben estar llenos.
	              </div>';
}

echo $html;
