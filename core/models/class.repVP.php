<?php  
        
    $db = new conexion();
    $f_inicial = $_GET['fi'];
    $f_final= $_GET['ff'];
    $RP = $_GET['RP'];
    $ID = $_GET['id'];
    $suma = 0;

    if($RP == '1')
    {
      $encabezado = '
        <div class="estilo">
            <div class="img"><img class="imglogo" src="views/app/images/logo.png" alt="">
                <div class="fecha">Fecha:'.date('d-m-Y').'</div>
            </div>
            <div class="contiene">
                <div class="titulo">SISTEMA DE CREDITO</div>
                <div class="titulo centro">PRESTAMIGUITO</div>
                <div class="titulo pequeno">VENTAS NETAS</div><br/>
                <div class="titulo fecha">Del '.$f_inicial.' Al '.$f_final.'</div>
                <div class="num_pag">PAG {PAGENO}</div>
            </div>
        </div>';

        $consulta = $db->query("SELECT * FROM catacli WHERE ULT_COM BETWEEN '$f_inicial' AND '$f_final';");

    $HTML ='<table class="tablac" border="1"><thead>
                    <tr>
                      <th>Codigo/N° Factura</th>
                      <th>Descripcion/Cliente</th>
                      <th>Fecha</th>
                      <th>Total</th>
                    </tr></thead><tbody>';
        while($fila = $db->runs($consulta))
        {
             
            $HTML .= "
                    <tr>
                      <td>".$fila['NUM_CLI']."</td>
                      <td>".$fila['NOM_CLI']."</td>
                      <td>".$fila['ULT_COM']."</td>
                      <td>".$fila['IMP_PRE']."</td>
                    </tr>";
            $suma = $suma + $fila['IMP_PRE'];
        }
            $HTML .= "<tr><td></td>
                          <td></td>
                          <td><strong>TOTAL</strong></td>
                          <td><strong>".$suma."</strong></td>
                      </tr>
                      </tbody></table>";
    }

    if($RP == '2')
    {

          $encabezado = '
        <div class="estilo">
            <div class="img"><img class="imglogo" src="views/app/images/logo.png" alt="">
                <div class="fecha">Fecha:'.date('d-m-Y').'</div>
            </div>
            <div class="contiene">
                <div class="titulo">SISTEMA DE CREDITO</div>
                <div class="titulo centro">PRESTAMIGUITO</div>
                <div class="titulo pequeno">VENTAS POR DIAS</div><br/>
                <div class="titulo fecha">Del '.$f_inicial.' Al '.$f_final.'</div>
                <div class="num_pag">PAG {PAGENO}</div>
            </div>
        </div>';

         $consulta = $db->query("SELECT *,MIN(NUM_CLI) AS min,MAX(NUM_CLI) AS max,SUM(IMP_PRE) AS IMP_PRE 
           FROM catacli 
           WHERE ULT_COM BETWEEN '$f_inicial' AND '$f_final' GROUP BY ULT_COM;");

    $HTML ='<table class="tablav" border="1"><thead>
                    <tr>
                      <th>Fecha</th>
                      <th>Ref. Inicial - Ref. Final</th>
                      <th>Total</th>
                    </tr></thead><tbody>';
        while($fila = $db->runs($consulta))
        {
             
            $HTML .= "
                    <tr>
                      <td>".$fila['ULT_COM']."</td>
                      <td>".$fila['min'].'-'.$fila['max']."</td>
                      <td>".$fila['IMP_PRE']."</td>
                    </tr>";
            $suma = $suma + $fila['IMP_PRE'];
        }
            $HTML .= "<tr><td></td>
                          <td><strong>TOTAL</strong></td>
                          <td><strong>".$suma."</strong></td>
                      </tr>
                      </tbody></table>";

            $tabla2 = '<br/><table class="tablados" border="1"><thead>
                    <tr><th>TOTAL CONTADO</th><td>0</td></tr>
                    <tr><th>TOTAL CREDITO</th><td>'.$suma.'</td></tr>
                    </thead></table>';
    }

    if($RP == '3')
    {

          $encabezado = '
        <div class="estilo">
            <div class="img"><img class="imglogo" src="views/app/images/logo.png" alt="">
                <div class="fecha">Fecha:'.date('d-m-Y').'</div>
            </div>
            <div class="contiene">
                <div class="titulo">SISTEMA DE CREDITO</div>
                <div class="titulo centro">PRESTAMIGUITO</div>
                <div class="titulo pequeno">VENTAS NETAS POR CLIENTE</div><br/>
                <div class="titulo fecha">Del '.$f_inicial.' Al '.$f_final.'</div>
                <div class="num_pag">PAG {PAGENO}</div>
            </div>
        </div>';

         $consulta = $db->query("SELECT FAC.NUM_FAC,FAC.FEC_FAC,FAC.TOT_FAC,CLI.NOM_CLI FROM totfac AS FAC,catacli AS CLI WHERE FAC.FEC_FAC BETWEEN '$f_inicial' AND '$f_final' AND FAC.NUM_CLI='$ID' AND CLI.NUM_CLI='$ID';");

       $HTML ='<table class="tablac" border="1"><thead>
                    <tr>
                      <th>Codigo/N° Factura</th>
                      <th>Descripcion/Cliente</th>
                      <th>Fecha</th>
                      <th>Total</th>
                    </tr></thead><tbody>';
        while($fila = $db->runs($consulta))
        {
             
            $HTML .= "
                    <tr>
                      <td>".$fila['NUM_FAC']."</td>
                      <td>".$fila['NOM_CLI']."</td>
                      <td>".$fila['FEC_FAC']."</td>
                      <td>".$fila['TOT_FAC']."</td>
                    </tr>";
            $suma = $suma + $fila['TOT_FAC'];
        }
            $HTML .= "</tbody></table>";

             $tabla2 = '<br/><table class="tablados" border="1"><thead>
                    <tr><th>TOTAL CREDITO</th><td>'.$suma.'</td></tr>
                    </thead></table>';
    }

    if($RP == '4')
    {

          $encabezado = '
        <div class="estilo">
            <div class="img"><img class="imglogo" src="views/app/images/logo.png" alt="">
                <div class="fecha">Fecha:'.date('d-m-Y').'</div>
            </div>
            <div class="contiene">
                <div class="titulo">SISTEMA DE CREDITO</div>
                <div class="titulo centro">PRESTAMIGUITO</div>
                <div class="titulo pequeno">VENTAS NETAS POR AGENTE</div><br/>
                <div class="titulo fecha">Del '.$f_inicial.' Al '.$f_final.'</div>
                <div class="num_pag">PAG {PAGENO}</div>
            </div>
        </div>';

        // seleccionar de la tabla totfac numero de factura,
        // fecha de factura, total de factura en donde el numero de 
        // agente sea igual al proporcionado por el usuario y de la 
        // tabla catacli seleccionar su n
         $consulta = $db->query("SELECT FAC.NUM_FAC,FAC.FEC_FAC,FAC.TOT_FAC,FAC.NUM_CLI 
           FROM totfac AS FAC
           WHERE FAC.FEC_FAC BETWEEN '$f_inicial' AND '$f_final' AND FAC.NUM_AGE='$ID';");

       $HTML ='<table class="tablac" border="1"><thead>
                    <tr>
                      <th>Codigo/N° Factura</th>
                      <th>Descripcion/Cliente</th>
                      <th>Fecha</th>
                      <th>Total</th>
                    </tr></thead><tbody>';
        while($fila = $db->runs($consulta))
        {
            $nameid = $fila['NUM_CLI'];
            $sql = $db->query("SELECT NOM_CLI FROM catacli WHERE NUM_CLI = '$nameid';");
            $resultado = $db->runs($sql);

            $HTML .= "
                    <tr>
                      <td>".$fila['NUM_FAC']."</td>
                      <td>".$resultado['NOM_CLI']."</td>
                      <td>".$fila['FEC_FAC']."</td>
                      <td>".$fila['TOT_FAC']."</td>
                    </tr>";
            $suma = $suma + $fila['TOT_FAC'];
        }
            $HTML .= "</tbody></table>";

             $tabla2 = '<br/><table class="tablados" border="1"><thead>
                    <tr><th>TOTAL CREDITO</th><td>'.$suma.'</td></tr>
                    </thead></table>';
    }
  
    if($RP == '5')
    {

          $encabezado = '
        <div class="estilo">
            <div class="img"><img class="imglogo" src="views/app/images/logo.png" alt="">
                <div class="fecha">Fecha:'.date('d-m-Y').'</div>
            </div>
            <div class="contiene">
                <div class="titulo">SISTEMA DE CREDITO</div>
                <div class="titulo centro">PRESTAMIGUITO</div>
                <div class="titulo pequeno">VENTAS POR ANO</div><br/>
                <div class="titulo fecha">Del '.$f_inicial.' Al '.$f_final.'</div>
                <div class="num_pag">PAG {PAGENO}</div>
            </div>
        </div>';

         $consulta = $db->query("SELECT MONTH(ULT_COM) AS mes,MIN(NUM_CLI) AS min,MAX(NUM_CLI) AS max,SUM(IMP_PRE) AS IMP_PRE 
           FROM catacli 
           WHERE ULT_COM BETWEEN '$f_inicial' AND '$f_final' AND 
           GROUP BY ULT_COM;");

    $HTML ='<table class="tablav" border="1"><thead>
                    <tr>
                      <th>Fecha</th>
                      <th>Ref. Inicial - Ref. Final</th>
                      <th>Total</th>
                    </tr></thead><tbody>';
        while($fila = $db->runs($consulta))
        {
             
            $HTML .= "
                    <tr>
                      <td>".$fila['mes']."</td>
                      <td>".$fila['min'].'-'.$fila['max']."</td>
                      <td>".$fila['IMP_PRE']."</td>
                    </tr>";
            $suma = $suma + $fila['IMP_PRE'];
        }
            $HTML .= "<tr><td></td>
                          <td><strong>TOTAL</strong></td>
                          <td><strong>".$suma."</strong></td>
                      </tr>
                      </tbody></table>";

            $tabla2 = '<br/><table class="tablados" border="1"><thead>
                    <tr><th>TOTAL CONTADO</th><td>0</td></tr>
                    <tr><th>TOTAL CREDITO</th><td>'.$suma.'</td></tr>
                    </thead></table>';
    }


    $mpdf = new mPDF('C','','','',15,15,55,15,10,10);
    
    $stylesheet = file_get_contents('views/app/css/estiloreporte.css');
    $mpdf->WriteHTML($stylesheet,1);

    $mpdf->SetHeader(utf8_decode($encabezado));
    $mpdf->WriteHTML($HTML);
    $mpdf->WriteHTML($tabla2);
    $mpdf->Output();

?>




 