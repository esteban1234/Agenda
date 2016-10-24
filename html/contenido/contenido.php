<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de tareas</title>

<link rel="stylesheet" href="views/app/css/estiloss.css">
<!-- <link rel="stylesheet" href="views/app/css/font-awesome.css"> -->
<link rel="stylesheet" href="views/app/fonts/style.css">
<link href="https://fonts.googleapis.com/css?family=Oswald|Roboto" rel="stylesheet">
</head>

    <body>

<article class="panel">

 <article class="panelizquierda">
    <!-- <figure class="contienelogo">
        <img class="logo" src="views/app/images/logo.png" alt="">
    </figure> -->
    <article class="ppanel">
       <!-- <p class="ppanel3">Quantto</p> -->
        <p class="ppanel2">Agenda de Tareas</p>
    </article>
  </article>

   <article class="panelderecha">
    <div class="wrap">
            <div class="widget">
                <div class="fecha">
                    <p id="diaSemana" class="diaSemana">Martes</p>
                    <p id="dia" class="dia">27</p>
                    <p>de </p>
                    <p id="mes" class="mes">Octubre</p>
                    <p>del </p>
                    <p id="year" class="year">2015</p>
                </div>

                <div class="reloj">
                    <p id="horas" class="horas">11</p>
                    <p>:</p>
                    <p id="minutos" class="minutos">48</p>
                    <p>:</p>
                    <div class="caja-segundos">
                        <p id="ampm" class="ampm">AM</p>
                        <p id="segundos" class="segundos">12</p>
                    </div>
                </div>
            </div>
        </div>
    </article>
    </article>

    <article class="contenedor">

    <article class="menu">

        <nav>
            <ul>
                <li><a href="#"><span class="icon-list"></span>Menú</a></li>
        </nav>

    </article>

        <article class="contpanel">

            <article class="contpanelizqui">
             <div class="">
          <p class="bienid">Bienvenido <strong><?=$users[$_SESSION['app_id']]['user']?></strong></p>
        </div>

                <ul id="accordion" class="accordion">
                    <li>
                     <li class="link"><a href="?view=index"><i class="icon-new-message"></i>Agregar una Tarea</a><!-- <i class="icon-chevron-down"></i> --></li>
                    </li>

                    <li>
                     <li class="link"><a href="?view=lista"><i class="icon-add-to-list"></i>Lista de Tareas</a><!-- <i class="icon-chevron-down"></i> --></li>
                    </li>
                    <li>
                     <li class="link"><a href="?view=logout"><i class="icon-lock"></i>Cerrar Sesion</a><!-- <i class="icon-chevron-down"></i> --></li>
                    </li>
                </ul>

            </article>

            <article class="contpaneldere">

            <form class="formdos"   action="" method="POST">
                <h1 class="agregal">Lista de tareas</h1>

                <?php
$db  = new Conexion();
$sql = $db->query("SELECT * FROM agregar;");
echo "<table><thead>
                        <tr>
                          <th>Asunto</th>
                          <th>Hora a Realizar</th>
                          <th>Fecha de alta</th>
                          <th>Fecha a realizar</th>
                          <th>Tarea</th>
                          <th>Acciones</th>
                        </tr></thead><tbody>";
while ($row = $db->runs($sql)) {

    echo "<tr>
                  <td>" . $row['asunto'] . "</td>
                  <td>" . $row['hora_realizarla'] . "</td>
                  <td>" . $row['fecha_alta'] . "</td>
                  <td>" . $row['fecha_realizar'] . "</td>
                  <td>" . $row['agregar_tarea'] . "</td>
                  <td>" . '<a class="btn btn-danger" href="#"><i class="icon-trash"></i>&nbsp;Eliminar</a>' . "</td></tr>";

}
echo "</tbody></table>";
?>

                 <!-- <table>
            <thead>
                <tr>
                    <th>
                        Asunto
                    </th>
                    <th>
                        Hora a realizar
                    </th>
                    <th>
                        Fecha de alta
                    </th>
                    <th>
                        Fecha a realizar
                    </th>
                    <th>
                        Tarea
                    </th>
                    <th>
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        Cita con noel
                    </td>
                    <td>
                        05:55:55 pm
                    </td>
                    <td>
                        20/10/2016
                    </td>
                    <td>
                        20/10/2016
                    </td>
                    <td>
                        Revisar las correciones del sistema quantto
                    </td>
                    <td>
                        <a class="btn btn-danger" href="#">
                        <i class="icon-trash"></i>&nbsp;Eliminar</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        Cita con carolina
                    </td>
                    <td>
                        05:55:55 pm
                    </td>
                    <td>
                        20/10/2016
                    </td>
                    <td>
                        20/10/2016
                    </td>
                    <td>
                        Revisar los formatos de los contratos de los clientes
                    </td>
                    <td>
                        <a class="btn btn-danger" href="#">
                        <i class="icon-trash"></i>&nbsp;Eliminar</a>
                    </td>
                </tr>
            </tbody>
        </table>
 -->



            </form>



            </article>

        </article>


    </article>

    <!-- <a href="?view=logout">Cerrar Sesion</a> -->

    <script src="views/app/js/jquery.js"></script>
    <script src="views/app/js/reloj.js"></script>
    <!-- <script src="views/app/js/main.js"></script> -->
</body>







</html>
