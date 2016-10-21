<?php
	if(!empty($_POST['asunto']) and !empty($_POST['hora_realizarla']) and !empty($_POST['fecha_alta']) and !empty($_POST['fecha_realizar']) and !empty($_POST['agregar_tarea'])){
        $db = new Conexion();
        $asunto          = $_POST['asunto'];
        $hora_realizarla = $_POST['hora_realizarla'];
        $fecha_alta      = $_POST['fecha_alta'];
        $fecha_realizar  = $_POST['fecha_realizar'];
        $agregar_tarea   = $_POST['agregar_tarea'];
				//$agregar_tarea = '1';


        $sql = $db->query("INSERT INTO agregar(asunto,hora_realizarla,fecha_alta,fecha_realizar,agregar_tarea)
			VALUES ('$asunto','$hora_realizarla','$fecha_alta','$fecha_realizar','$agregar_tarea')");

        if ($sql)
        {
            $html = '<div class="alert alert-dismissible alert-success">
	  			  <button type="button" class="close" data-dismiss="alert">&times;</button>
	              <strong>Datos</strong> guardados Correctamente.
	              </div>';
        }
        else
        {
            $html = '<div class="alert alert-dismissible alert-danger">
	  			  <button type="button" class="close" data-dismiss="alert">&times;</button>
	              <strong>Error</strong> al guardar los datos.
	              </div>';
        }

        $db->close();
    }


    else{
        $html= '<div class="alert alert-dismissible alert-danger">
	  			  <button type="button" class="close" data-dismiss="alert">&times;</button>
	              <strong>Error</strong> Todos los campos deben estar llenos.
	              </div>';
    }

	echo $html;
?>
