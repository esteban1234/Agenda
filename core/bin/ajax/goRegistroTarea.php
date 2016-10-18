<?php

$servidor = "localhost";
$usuario  = "root";
$clave    = "";
$base     = "agenda";
mysql_connect($servidor, $usuario, $clave);
mysql_select_db($base);

if ($POST) {
    $asunto          = $_POST['asunto'];
    $hora_realizarla = $_POST['hora_realizarla'];
    $fecha_alta      = $_POST['fecha_alta'];
    $fecha_realizar  = $_POST['fecha_realizar'];
    $agregar_tarea   = $_POST['agregar_tarea'];

    mysql_query("insert into agregar (asunto,hora_realizarla,fecha_alta,fecha_realizar,agregar_tarea)values ('$asunto','$hora_realizarla','$fecha_alta','$fecha_realizar','$agregar_tarea' )") or die(mysql_error());

    echo "Datos gusradados";
}
