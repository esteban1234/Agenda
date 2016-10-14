<?php  
        
    $db = new conexion();
    $f_inicial = $_GET['fi'];
    $f_final= $_GET['ff'];
    $RP = $_GET['RP'];
    $ID = $_GET['id'];
    $suma = 0;
    $agente = 0;

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

        $consulta = $db->query("SELECT * FROM movpag WHERE FEC_PAG BETWEEN '$f_inicial' AND '$f_final';");

    $HTML ='<table class="tablac" border="1"><thead>
                    <tr>
                      <th>Folio</th>
                      <th>Cliente</th>
                      <th>Tipo Pago</th>
                      <th>Fact. No</th>
                      <th>Fecha</th>
                      <th>Importe Pago</th>
                    </tr></thead><tbody>';
        while($fila = $db->runs($consulta))
        {
            $num_cli = $fila['NUM_CLI'];
             $cns = $db->query("SELECT * FROM catacli WHERE NUM_CLI='$num_cli';");
             $Cliente = $db->runs($cns);
             $num = $Cliente['NUM_CLI'];
             $nombre = $Cliente['NOM_CLI'];
            $HTML .= "
                    <tr>
                      <td>".$fila['NUM_PAG']."</td>
                      <td>". '<'.$num.'>' .' '.$nombre."</td>
                      <td>".$fila['TIP_PAG']."</td>
                      <td>".$fila['NUM_FAC']."</td>
                      <td>".$fila['FEC_PAG']."</td>
                      <td>".$fila['IMP_PAG']."</td>
                    </tr>";
            $suma = $suma + $fila['IMP_PAG'];
        }
            $HTML .= "<tr><td></td>
                          <td></td>
                          <td></td>
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

         $consulta = $db->query("SELECT * FROM movpag WHERE NUM_CLI= '$ID';");

    $HTML ='<table class="tablac" border="1"><thead>
                    <tr>
                      <th>Folio</th>
                      <th>Cliente</th>
                      <th>Tipo Pago</th>
                      <th>Fact. No</th>
                      <th>Fecha</th>
                      <th>Importe Pago</th>
                    </tr></thead><tbody>';
        while($fila = $db->runs($consulta))
        {
            $num_cli = $fila['NUM_CLI'];
             $cns = $db->query("SELECT * FROM catacli WHERE NUM_CLI='$num_cli';");
             $Cliente = $db->runs($cns);
             $num = $Cliente['NUM_CLI'];
             $nombre = $Cliente['NOM_CLI'];
            $HTML .= "
                    <tr>
                      <td>".$fila['NUM_PAG']."</td>
                      <td>". '<'.$num.'>' .' '.$nombre."</td>
                      <td>".$fila['TIP_PAG']."</td>
                      <td>".$fila['NUM_FAC']."</td>
                      <td>".$fila['FEC_PAG']."</td>
                      <td>".$fila['IMP_PAG']."</td>
                    </tr>";
            $suma = $suma + $fila['IMP_PAG'];
        }
            $HTML .= "<tr><td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td><strong>TOTAL</strong></td>
                          <td><strong>".$suma."</strong></td>
                      </tr>
                      </tbody></table>";
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
                <div class="titulo pequeno">VENTAS POR DIAS</div><br/>
                <div class="titulo fecha">Del '.$f_inicial.' Al '.$f_final.'</div>
                <div class="num_pag">PAG {PAGENO}</div>
            </div>
        </div>';

         $consulta = $db->query("SELECT * FROM movpag WHERE NUM_CLI= '$ID';");

    $HTML ='<table class="tablac" border="1"><thead>
                    <tr>
                      <th>Folio</th>
                      <th>Cliente</th>
                      <th>Tipo Pago</th>
                      <th>Fact. No</th>
                      <th>Fecha</th>
                      <th>Importe Pago</th>
                    </tr></thead><tbody>';
        while($fila = $db->runs($consulta))
        {
            $num_cli = $fila['NUM_CLI'];
             $cns = $db->query("SELECT * FROM catacli WHERE NUM_CLI='$num_cli';");
             $Cliente = $db->runs($cns);
             $num = $Cliente['NUM_CLI'];
             $nombre = $Cliente['NOM_CLI'];
            $HTML .= "
                    <tr>
                      <td>".$fila['NUM_PAG']."</td>
                      <td>". '<'.$num.'>' .' '.$nombre."</td>
                      <td>".$fila['TIP_PAG']."</td>
                      <td>".$fila['NUM_FAC']."</td>
                      <td>".$fila['FEC_PAG']."</td>
                      <td>".$fila['IMP_PAG']."</td>
                    </tr>";
            $suma = $suma + $fila['IMP_PAG'];
        }
            $HTML .= "<tr><td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td><strong>TOTAL</strong></td>
                          <td><strong>".$suma."</strong></td>
                      </tr>
                      </tbody></table>";    }

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

        
       $consulta = $db->query("SELECT * FROM catacli;");

       $HTML ='<table class="tablac" border="1"><thead>
                    <tr>
                      <th># Cliente</th>
                      <th>Cliente</th>
                      <th>Credito</th>
                      <th>Pago Diario</th>
                      <th>Telefono</th>
                    </tr></thead><tbody>';

        $HTML2 ='<table class="tablac" border="1"><thead>
                    <tr>
                      <th># Cliente</th>
                      <th>Cliente</th>
                      <th>Credito</th>
                      <th>Pago Diario</th>
                      <th>Telefono</th>
                    </tr></thead><tbody>';


        while($fila = $db->runs($consulta))
        {
          $agente = $fila['NUM_AGE'];


            if($agente == 1)
            {
                $HTML .= "
                    <tr>
                      <td>".$fila['NUM_CLI']."</td>
                      <td>".$fila['NOM_CLI']."</td>
                      <td>".$fila['NUM_FAC']."</td>
                      <td>".$fila['IMP_PAGD']."</td>
                      <td>".$fila['TEL_CLI']."</td>
                    </tr>";
                $suma = $suma + $fila['TOT_FAC'];
                $uno = "<b>AGENTE <01></b>";
            }

            if($agente == 2)
            {
                $HTML2 .= "
                    <tr>
                      <td>".$fila['NUM_CLI']."</td>
                      <td>".$fila['NOM_CLI']."</td>
                      <td>".$fila['NUM_FAC']."</td>
                      <td>".$fila['IMP_PAGD']."</td>
                      <td>".$fila['TEL_CLI']."</td>
                    </tr>";
                $suma = $suma + $fila['TOT_FAC'];
                $dos = "<b>AGENTE <02></b>";
            }


        }

                $HTML .= "</tbody></table><br/>";
                $HTML2 .= "</tbody></table><br/>";

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
    $mpdf->WriteHTML($uno);

    $mpdf->WriteHTML($HTML2);
    $mpdf->WriteHTML($dos);

    $mpdf->WriteHTML($tabla2);
    $mpdf->Output();

?>




 