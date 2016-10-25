<?php
sleep(0);

$db = new Conexion();
$opcion = new Opciones();
$contenido = '';

if(isset($_POST) && !empty($_POST)){
    switch ($_POST['accion']) {
        case 'deleteTAREA':

            $id= $_POST['id'];
            $delete = $db->query("DELETE FROM agregar WHERE id ='$id'");


            //Funcion que devuelve los datos que se encuentran la tabla temporal
            $contenido  = $opcion->getTAREA();
            $msjERROR = 'Dato Borrado Corecctamente';
            break;

        default:
            $msjERROR = "Acción no disponible";
            break;
    }
}


$salida = array(
    "mensaje" => $msjERROR,
    "contenido" => $contenido
);

echo json_encode($salida);
?>