<?php
class Opciones
{
    public function __construct()
    {
        $this->db = new Conexion();
    }

    public function getTAREA()
    {
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
      $pagina = 2;
    }
    //Define el número 0 para empezar a paginar multiplicado por la cantidad de resultados por página
    $empezar_desde = ($pagina-1) * $cantidad_resultados_por_pagina;

        $sql    = $this->db->query("SELECT * FROM agregar;");
        $salida = '';

        //Cuenta el número total de registros
        // $db->runs($sql)
        $total_registros = $this->db->rows($sql);

        //Obtiene el total de páginas existentes
        $total_paginas = ceil($total_registros / $cantidad_resultados_por_pagina);
        $consulta_resultados = $this->db->query("SELECT * FROM agregar ORDER BY id ASC LIMIT $empezar_desde, $cantidad_resultados_por_pagina;");

        while ($row = $this->db->runs($consulta_resultados)) {

            $salida .= '<tr>
                  <td>' . $row['asunto'] . '</td>
                  <td>' . $row['hora_realizarla'] . '</td>
                  <td>' . $row['fecha_alta'] . '</td>
                  <td>' . $row['fecha_realizar'] . '</td>
                  <td>' . $row['agregar_tarea'] . '</td>
                  <td><a data-accion="deleteTAREA" href="' . $row['id'] . '"><button type="button" class="btn btn-danger" id="" data-toggle="modal" data-target="#dialog-borrar"><i class="icon-trash"></i>&nbsp;Eliminar</button></a>
                  </td></tr>';

        }
        $i=0;
        // $salida2 = '';
        for($i=1; $i<=$total_paginas; $i++) {
        	//En el bucle, muestra la paginación
        $salida .= "<a style='color:#000;' href='?view=lista&g=".$i."'>".$i."</a> |";
      }

      return $salida;
}
}
?>
