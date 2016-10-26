<?php
class Opciones
{
    public function __construct()
    {
        $this->db = new Conexion();
    }

    public function getTAREA()
    {
        $sql    = $this->db->query("SELECT * FROM agregar;");
        $salida = '';
        while ($row = $this->db->runs($sql)) {

            $salida .= '<tr>
                  <td>' . $row['asunto'] . '</td>
                  <td>' . $row['hora_realizarla'] . '</td>
                  <td>' . $row['fecha_alta'] . '</td>
                  <td>' . $row['fecha_realizar'] . '</td>
                  <td>' . $row['agregar_tarea'] . '</td>
                  <td><a data-accion="deleteTAREA" href="' . $row['id'] . '"><button type="button" class="btn btn-danger" id="" data-toggle="modal" data-target="#dialog-borrar"><i class="icon-trash"></i>&nbsp;Eliminar</button></a>
                  </td></tr>';

        }
        //}<td><a data-accion="deleteTAREA"  href="'.$row['id'].'"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dialog-borrar"><i class="icon-trash"></i>&nbsp;Eliminar</button></a>'

        // <a class="btn btn-danger" href="#">
        // <i class="icon-trash"></i>&nbsp;Eliminar</a>

        return $salida;
    }
}
