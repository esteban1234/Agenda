<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de tareas</title>
    <link rel="stylesheet" href="views/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="views/app/css/estiloss.css">
<!-- <link rel="stylesheet" href="views/app/css/font-awesome.css"> -->
<link rel="stylesheet" href="views/app/fonts/style.css">
<link href="https://fonts.googleapis.com/css?family=Oswald|Roboto" rel="stylesheet">
</head>

<body>

<div class="modal fade" id="dialog-borrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">- Eliminar Producto</h4>
            </div> <!-- Cierra modal-header-->
            <div class="modal-body">
                <p>Realmente Deseas Borar?</p>
                <!-- <fieldset id="ajaxLoader" class="ajaxLoader oculto">
                  <img src="views/app/img/loader.gif">
                  <p>Espere un momento</p>
                </fieldset> -->

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="eliminar">Eliminar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div> <!-- cierra modal-body-->
        </div> <!--Cierra modal-content-->
    </div> <!--Cierra modal-dialog-->
</div><!--Cierra modal fade-->

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
                <div id="_AJAX_REG_"></div><br>
            <form class="formdos"   action="" method="POST">
                <h1 class="agregal">Lista de tareas</h1>

                <table><thead>
                    <tr>
                        <th>Asunto</th>
                        <th>Hora a Realizar</th>
                        <th>Fecha de alta</th>
                        <th>Fecha a realizar</th>
                        <th>Tarea</th>
                        <th>Acciones</th>
                    </tr></thead>
                    <tbody id="refresca">
                <?php
                    $getsTAREAS = new Opciones();
                    echo $lista  = $getsTAREAS->getTAREA();
                ?>
                    </tbody>
                </table>
<!-- oye we una pregunta cada tarea quese agena tiene un id? si we
esta en la bd we , ok, ya vi -->
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
    <script src="views/app/js/goRESULTADO.js"></script>
    <script src="views/bootstrap/js/bootstrap.min.js"></script>
</body>







</html>
